<style>

    .radius-flat{

        border-radius: 0px !important;

    }

    .panel-info>.panel-heading {

        color: #ffffff;

        background-color: #03619e;

        border-color: #03619e;

    }

    .panel-info {

        border-color: #03619e;

    }

    .form-control.radius-flat{

        color: #333;

    }

    .steps {

    margin-top: -41px;

    display: inline-block;

    float: right;

    font-size: 16px

}

.step {

    float: left;

    background: white;

    padding: 10px 7px;

    border-radius: 0px;

    text-align: center;

    width: 102px;

    position: relative;

    font-weight: 700;

    line-height: 100%;

}

.step_line {

    margin: 0;

    width: 0;

    height: 0;

    border-left: 16px solid #fff;

    border-top: 16px solid transparent;

    border-bottom: 16px solid transparent;

    z-index: 2;

    position: absolute;

    left: 99px;

    top: 1px;



}

.step_line.backline {

    border-left: 20px solid #f7f7f7;

    border-top: 20px solid transparent;

    border-bottom: 20px solid transparent;

    z-index: 1;

    position: absolute;

    left: 99px;

    top: -3px

}

.step_complete {

    background: #03619e;

}

.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{

    color: #fff;

     margin-left: 12px;

}

.step_line.step_complete {

    background: 0;

    border-left: 16px solid #03619e;

}

.step_thankyou {

    float: left;

    background: #5b5150;

    padding: 10px 11px;

    border-radius: 1px;

    text-align: center;

    width: 100px;

    font-weight: 700;

    color: #fff;

    line-height: 100%;

}

.step.check_step {

    margin-left: 5px;

}

.checkbox-ch .form-control {

    float: left;

    line-height: 12px;

    margin: -6px 3px 0;

    width: 15px;

}



</style>

<div id="breadcrumb" class="breadcrumb">

  <div itemprop="breadcrumb" class="container">

    <div class="row">

      <div class="col-md-24"> <a href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a> <span>/</span> <span class="page-title"><?php echo $page_head; ?></span> </div>

    </div>

  </div>

</div>

<div class="container wrapper">

            <div class="row cart-head">

                <div class="container">

                <div class="row">

                    <p></p>

                </div>

                <div class="row">

                    <div style="display: table; margin: auto;margin-bottom: 6px;">

                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>

                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span></span>

                        <span class="step step_complete"> <a href="#" class="check-bc">Payment </a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span></span>

                        <span class="step step_complete"> <a href="#" class="check-bc">Thank you </a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span></span>



                    </div>

                </div>

                <div class="row">

                    <p></p>

                </div>

                </div>

            </div>    

            <div class="row cart-body">

                <form class="form-horizontal" method="post" action="">

	                <div class="col-lg-2 col-md-2 col-sm-2 col-12">



	                </div>

	                <div class="col-lg-8 col-md-8 col-sm-8 col-12">



	                

	                  

	                </div>

	                <div class="col-lg-2 col-md-2 col-sm-2 col-12">



	                </div>

                </form>

            </div>

            <div class="row cart-footer">

        

            </div>

    </div>

<div class="container">    

        <div class="tab-pane active" id="tab_c">

            <div class="panel panel-info radius-flat">

                        <div class="panel-heading radius-flat"><span><i class="fa fa-lock"></i></span> Finish</div>

                        <div class="panel-body">

                             <h4>Confirmation</h4>

                            <p>Order Successfully Placed!</p>

                            <?php //print_ex($order_details); 
                                if(!empty($order_details))
                                {
                                     echo '<p>Order Reference : '.$order_details[0]->order_reference.'</p>';
                                    foreach ($order_details as $row) { ?>

                                        <p><?php echo $row->order_product_name; ?></p>

                                  <?php  }
                                }
                            ?>


                           

</div>

</div>

</div>

</div>







