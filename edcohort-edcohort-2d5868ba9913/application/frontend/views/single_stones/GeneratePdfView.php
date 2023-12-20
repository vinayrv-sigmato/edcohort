<?php //print_ex($records); ?>

<!DOCTYPE html> 
<html> 
<head> 
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
<style type="text/css">
*{margin: 0px}
body{background: #fff;}
.top-header{background: #FFF;}
.logo-bg{background: #FFF;}
.order-list{background: #FFF;}
  td, th{font-size: 12px;text-align: left;vertical-align: top;padding: 3px;}
  .order-list td{font-size: 14px;font-weight: bold;line-height: 20px;}
  .social-list td a {font-size: 12px;line-height: 12px;color: #444;text-decoration: none;}
  .order-list img, .social-list img{    margin-right: 5px;vertical-align: bottom;}
  .order-list{border-right: 1px solid #CCC;border-left: 1px solid #CCC;}
  .social-list td {vertical-align: middle !important;}
  .yellow{color: #ff8f00;}
.orange{color: #ff6600;}
.green{color: #008000;}
.thead-dark th {
    font-size: 25px;
    font-weight: bold;
    background:#333;
    text-align: center;
}
.table-bottom{border: 1px solid #333;text-align: center;}
.table-bottom td{border: 0;font-size: 25px;font-weight: bold;text-align: center;}
.table-bottom td small{font-size: 11px;}
h2.heading-text {font-size: 25px;font-weight: bold;text-align: center;margin-top: 10px;}
.video-button td{text-align: center;}
</style>
</head> 
<?php foreach($records as $rec){ ?>
<body> 
  <table width="100%" class="top-header">
    <tr>
      <td style="width: 20%;" class="logo-bg">
        <img src="<?php echo base_url(); ?>assets/images/home/logo.jpg" width="200px">
      </td>
      <td style="width: 60%;" class="order-list">
        <table cellpadding="0" border="0" cellspacing="0" width="100%">
          <tr>
            <td><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-star.png"> 50,0000 GIA DIAMONDS</td>
            <td><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-star.png"> Direct From Factory</td>
          </tr>
          <tr>
            <td><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-star.png"> Discount To to -70%</td>
            <td><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-star.png"> Video, Photo, Certificate</td>
          </tr>
          <tr>
            <td>Click Here</td>
            <td><a href="<?php echo base_url(); ?>"><?php echo base_url(); ?></a></td>
          </tr> 
        </table>
      </td>
      <td style="width: 20%;">
        <table cellpadding="0" border="0" cellspacing="0" width="100%" class="social-list">
          <tr>
            <td> <a href="#"><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-phone.png"> <?php echo SITE_PHONE; ?></a> </td>
          </tr>
          <tr>
            <td><a href="#"><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-facebook.png"> shakti.diamond</a></td>
          </tr>
          <tr>
            <td><a href="#"><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-insta.png">shakti.diamond</a></td>
          </tr>
          <tr>
            <td><a href="#"><img src="http://192.168.1.81:8080/shakti/assets/images/shakti-email.png">shakti.diamond</a></td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

  <table width="100%">
    <tr>
      <td style="width: 33%;">
        <table cellpadding="0" border="1" cellspacing="0" width="100%" style="border-color: #CCC;">
                    <tr>
                      <th>Stone ID</th>
                      <td><?php echo $rec->stock_id; ?></td>
                    </tr>
                    
                    <tr>
                      <th>Shape </th>  
                      <td><?php echo $rec->shape_full; ?></td>
                    </tr>

                    <tr>
                      <th>Carat</th>  
                      <td><?php echo $rec->weight; ?></td>
                    </tr>

                    <tr>
                      <th>Color</th>  
                      <td><?php echo $rec->color; ?></td>
                    </tr>

                    <tr>
                      <th>Clarity</th>  
                      <td><?php echo $rec->grade; ?></td>
                    </tr>

                    <tr>
                      <th>Color Shade </th>  
                      <td><?php echo $rec->shade; ?></td>
                    </tr>

                    <tr>
                      <th>Rapaport</th>  
                      <td><?php echo $rec->rapnet; ?> $</td>
                    </tr>

                    <tr>
                      <th>Rap% </th>  
                      <td><?php echo $rec->new_discount; ?> %</td>
                    </tr>

                    <tr>
                      <th>Price/cts</th>  
                      <td><?php echo $rec->cost_carat; ?> $</td>
                    </tr>

                    <tr>
                      <th>Amount</th>  
                      <td><?php echo $rec->total_price; ?> $</td>
                    </tr>
                     <tr>
                      <th>Thai Baht</th>  
                      <td><?php echo round($rec->currency); ?>&#3647; </td>
                    </tr>
                    <tr>
                      <th>Cut</th>  
                      <td><?php echo $rec->cut_full; ?></td>
                    </tr>

                    <tr>
                      <th>Polish</th>  
                      <td><?php echo $rec->polish_full; ?></td>
                    </tr>

                    <tr>
                      <th>Symmetry</th>  
                      <td><?php echo $rec->symmetry_full; ?></td>
                    </tr>

                    <tr>
                      <th>Fluorescence</th>  
                      <td><?php echo $rec->fluor_full; ?></td>
                    </tr>

                    <tr>
                      <th>Lab</th>  
                      <td><?php echo $rec->lab; ?></td>
                    </tr>

                    <tr>
                      <th>Certificate No.</th>  
                      <td><?php echo $rec->report_no; ?></td>
                    </tr>

                    <tr>
                      <th>Tabel%</th>  
                      <td><?php echo $rec->table_d; ?></td>
                    </tr>
                    
                  </table>
      </td>
      <td style="width: 33%;">
          <table cellpadding="0" border="1" cellspacing="0" width="100%" style="border-color: #CCC;">
                    <tr>
                      <th>Total Depth%</th>
                      <td><?php echo $rec->depth; ?></td>
                    </tr>
                    
                    <tr>
                      <th>Measurements</th>  
                      <td><?php echo $rec->measurements; ?></td>
                    </tr>

                    <tr>
                      <th>Girdle</th>  
                      <td><?php echo $rec->girdle; ?></td>
                    </tr>

                    <tr>
                      <th>Girdle% </th>  
                      <td><?php echo $rec->girdle_perct; ?></td>
                    </tr>

                    <tr>
                      <th>Crown Angle</th>  
                      <td><?php echo $rec->crown_angle; ?></td>
                    </tr>

                    <tr>
                      <th>Crown Ht</th>  
                      <td><?php echo $rec->crown_ht; ?></td>
                    </tr>

                    <tr>
                      <th>Pavillion Angle</th>  
                      <td><?php echo $rec->pavillion_angle; ?></td>
                    </tr>

                    <tr>
                      <th>Pavillion Depth</th>  
                      <td><?php echo $rec->pavillion_depth; ?></td>
                    </tr>

                    <tr>
                      <th>H&A</th>  
                      <td></td>
                    </tr>

                    <tr>
                      <th>Milky</th>  
                      <td><?php echo $rec->milky; ?></td>
                    </tr>
                    <tr>
                      <th>Eye Clean</th>  
                      <td><?php echo $rec->eye_clean; ?></td>
                    </tr>

                    <tr>
                      <th>Key to symb</th>  
                      <td><?php echo $rec->keytosymb; ?></td>
                    </tr>

                    <tr>
                      <th>OPTA</th>  
                      <td></td>
                    </tr>

                    <tr>
                      <th>OPCR</th>  
                      <td></td>
                    </tr>

                    <tr>
                      <th>L/W Ratio</th>  
                      <td></td>
                    </tr>

                    <tr>
                      <th>Comment GIA</th>  
                      <td><?php echo $rec->member_comment; ?></td>
                    </tr>

                    <tr>
                      <th>FancyColorDescription</th>  
                      <td></td>
                    </tr>
                    
                  </table>
      </td>
      <td style="width: 33%;">
        <img src="<?php echo $rec->diamond_image; ?>" width="100%">
      </td>
    </tr>
  </table>

  <table width="100%" style="padding:10px;">
    <tr>
      <td style="width: 40%;">
        <img src="<?php echo $rec->report_filename; ?>">
      </td>
      <td style="width: 20%;">&nbsp;</td>
      <td style="width: 40%;" class="video-button">
        <table width="100%">
          <tr>
            <td align="center">
              <a href="<?php echo $rec->diamond_video; ?>" target="_blank"> <img src="http://192.168.1.81:8080/shakti/assets/images/button-360.png" style="text-align: center;"> </a>
            </td>
          </tr>
        </table>
        <table class="table-bottom" width="100%">
          <thead class="thead-dark">
            <tr>
              <th class="yellow"> <?php echo $rec->weight; ?> <?php echo $rec->color; ?> <?php echo $rec->grade; ?> <?php echo $rec->cut_full; ?> <?php echo $rec->polish_full; ?> <?php echo $rec->symmetry_full; ?> <?php echo $rec->fluor_full; ?> <?php echo $rec->lab_full; ?></th>
            </tr>
          </thead>
          <tr>
            <td class="green">DIS : <?php echo $rec->new_discount; ?> %</td>
          </tr>
          <tr>
            <td class="orange">814,519.71 BAHT</td>
          </tr>
          <tr>
            <td><small>Above Amount Can Be Changed, Depend On Current Exchange Rate.</small></td>
          </tr>
        </table>
        <h2 class="heading-text orange">FIX PRICE</h2>
      </td>
    </tr>
  </table>

</body> 
<?php } ?>
</html>              

