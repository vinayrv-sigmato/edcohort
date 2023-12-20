<style type="text/css">
		.messagebox {
			height: 250px;
			padding: 5px;
			overflow: auto;
			border: 1px solid #304465;
            margin-left: 25px;
            margin-top: 25px;
            padding: 10px;
		}
		.left{
		    padding:5px;
		    display:block;
		    color:#304465;
		    width:100%;
		}
		.right{
		    padding:5px;
		    display:block;
		    color:black;
		    width:100%;
		}
		.inputbox{
		        margin-left: 25px;
                margin-right: 0;
                padding: 0;
		}
		#wrapper {
			margin: auto;
			width: 438px;
		}
		.left{text-align:left;}
		.right{text-align:right;}
	</style>
<section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-8">
            <h2>Online <small>Visitor Chat List</small></h2>
            </div>
        </div>
        <?php message(); ?>
        <!-- Basic Examples -->
<div class="row collapse" id="collapseExample" aria-expanded="false">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body ">
                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">                        
                        <a href="<?php echo base_url() ?>admin_chat" class="btn bg-red btn-block waves-effect" ><i class="material-icons">refresh</i><span>RESET</span></a>
                    </div>
                </div>

                <div class="row clearfix"></div>               
                </form>
            </div>
        </div>
    </div>
</div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Online Visitors</span>
                    </div> 
                                         
                    <div class="body">
                        <div class="table-responsive1">
                            <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                              <thead class="bg-teal">
                              <tr>
                                  <th>IP</th>
                                    <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                    <?php foreach($result as $data){
                                    ?>
                                    <tr>
                                    <td><?php echo $data->ip; ?></td>
                                    <td><button type="button" data-id="<?php echo $data->ip; ?>" class="btn btn-primary reply_this">Reply</button></td>
                                    </tr>
                                    <?php
                                    } ?>         
                              </tbody>          
                            </table>
                        </div>
                        <div class="row" id="reply-box">
                            <div class="col-md-6 messagebox" id="message-box">
                                <span id="loading">Loading...</span>    
                            </div>
                            <div class="col-md-6 inputbox" id="txt">
                            <input type="hidden" id="current_ip" value="">
                        	<input type="text" class="form-control" name="msg" id="msg" value="" placeholder="Message..." /><br/>
                        	<input type="button" id="insert-btn" class="btn btn-primary" value="Submit" />
                        	</div>
                        	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>

<!-- Custom JS -->

<script type="text/javascript">

    window.setInterval(function(){
        loadMsg();
    }, 5000);
    $(document).ready(function(){
        $("#reply-box").hide();
		hideLoading();
		setTimeout('loadMsg()', 4000);
    });
    $(".reply_this").on("click",function(){
        var ip = $(this).data("id");
        $("#current_ip").val(ip);
        $("#reply-box").show();
        loadMsg();
    });
    
    
    $("#insert-btn").click(function(){
	    
	    msg = $("#msg").val();
	    ip_address = $("#current_ip").val();
	    
	    jQuery.ajax({
            url: '<?php echo base_url(); ?>admin_chat/update',
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {'msg':msg,'ip_address':ip_address},
            success: function( data, textStatus, jQxhr ){
                $("#message-box").append("<p class='right'>"+$("#msg").val()+"</p>");
    			$("#msg").val("");					
    			$("#msg").focus();
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });					
		return false;
	});
    function loadMsg() 
    {
        ip = $("#current_ip").val();
        $.ajax({
            url: '<?php echo base_url(); ?>admin_chat/get_all',
            dataType: 'text',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            data: {'ip':ip},
            success: function( data, textStatus, jQxhr ){
                $("#loading").remove();				
			    $("#message-box").html(data);
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
	}
	function showLoading(){
		$("#loading").show();
	}
	function hideLoading(){
		$("#loading").hide();
	}
    
</script>





