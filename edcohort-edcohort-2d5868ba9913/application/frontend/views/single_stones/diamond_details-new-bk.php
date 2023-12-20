 
<style>
.shakti-detail-page .table-sm td, .shakti-detail-page .table-sm th {
    padding: 2px;
    font-size: 12px;
}

.shakti-view-box  button.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0 10px;
    font-size: 30px;
}
.color-red {
      color: #fc3a3a;
}

.color-green {
  color: #008000;
}

.color-orange {
      color: #FF6600;
}
.box_price {
    font-size: 35px;
    line-height: 42px;
    color: #ff8f00;
    font-weight: bold;
    text-align: center;
    margin: 20px 0;
}
.box_price .remark {
    color: rgba(0,0,0,1);
    font-size: 11px;
  line-height: 30px;
    font-weight: normal;
}
.table td, .table th, .table-bordered td, .table-bordered th {
    border: 1px solid #b9ac9b !important;
}

section.shakti-detail-page .box_price {
    border: 1px solid #ff8f00;
    padding: 30px 0;
}

</style>
<body>

    <section class="shakti-detail-page mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                          <table class="table table-sm table-bordered">
    <tbody>
                                <tr>
                                    <th>&nbsp;Stone ID</th>
                                    <td>&nbsp;<?php if($records['0']->stock_id != null){ echo $records['0']->stock_id; }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Shape</th>
                                    <td>&nbsp;<?php if($records['0']->shape_full != null){ echo $records['0']->shape_full; }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Carat</th>
                                    <td>&nbsp;<?php if($records['0']->weight != null){ echo number_format($records['0']->weight,2); }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Color</th>
                                    <td>&nbsp;<?php if($records['0']->color != null){ echo $records['0']->color; }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Clarity</th>
                                    <td>&nbsp;<?php if($records['0']->grade != null){ echo $records['0']->grade; }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Rapaport</th>
                                    <td>&nbsp;<?php if($records['0']->rapnet != null){ echo $records['0']->rapnet; }  ?> $</td>
                                </tr>                           
                                <tr>
                                    <th>&nbsp;Rap%</th>
                                    <td class="color-red">&nbsp;<?php if($records['0']->rapnet_discount != null){ echo $records['0']->rapnet_discount; }  ?>%</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Price/cts</th>
                                    <td class="color-green">&nbsp;<?php if($records['0']->cost_carat != null){ echo $records['0']->cost_carat; }  ?> $</td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Amount</th>
                                    <td class="color-orange">&nbsp;<?php if($records['0']->total_price != null){ echo $records['0']->total_price; }  ?> $</td>
                                </tr>
                                                                <tr>
                                    <th>&nbsp;Cut</th>
                                    <td>&nbsp;<?php if($records['0']->cut_full != null){ echo $records['0']->cut_full; }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Polish</th>
                                    <td>&nbsp;<?php if($records['0']->polish_full != null){ echo $records['0']->polish_full; }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Symmetry</th>
                                    <td>&nbsp;<?php if($records['0']->symmetry_full != null){ echo $records['0']->symmetry_full; }  ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;Fluorescence</th>
                                    <td>&nbsp;<?php if($records['0']->flour_full != null){ echo $records['0']->flour_full; }  ?></td>
                                </tr>

                                <tr> 
                                    <th>&nbsp;Lab</th>
                                    <td>&nbsp;<?php if($records['0']->lab != null){ echo $records['0']->lab; }  ?></td>
                                </tr>
                                <tr>
                                      <th>&nbsp;Certificate No.</th>  
                                      <td>&nbsp;<?php if($records['0']->report_no != null){ echo $records['0']->report_no; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Tabel%</th>  
                                      <td>&nbsp;<?php if($records['0']->table_d != null){ echo $records['0']->table_d; }  ?></td>
                                    </tr>
                                    <tr>
                                      <th>&nbsp;Total Depth%</th>
                                      <td>&nbsp;<?php if($records['0']->depth != null){ echo $records['0']->depth; }  ?></td>
                                    </tr>
                                    
                                    <tr>
                                      <th>&nbsp;Measurements</th>  
                                      <td>&nbsp;<?php if($records['0']->measurements != null){ echo $records['0']->measurements; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Girdle</th>  
                                      <td>&nbsp;<?php if($records['0']->girdle != null){ echo $records['0']->girdle; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Girdle% </th>  
                                      <td>&nbsp;<?php if($records['0']->girdle_perct != null){ echo $records['0']->girdle_perct; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Crown Angle</th>  
                                      <td>&nbsp;<?php if($records['0']->crown_angle != null){ echo $records['0']->crown_angle; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Crown Ht</th>  
                                      <td>&nbsp;<?php if($records['0']->crown_ht != null){ echo $records['0']->crown_ht; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Pavillion Angle</th>  
                                      <td>&nbsp;<?php if($records['0']->pavillion_angle != null){ echo $records['0']->pavillion_angle; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Pavillion Depth</th>  
                                      <td>&nbsp;<?php if($records['0']->pavillion_depth != null){ echo $records['0']->pavillion_depth; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;H&A</th>  
                                      <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Milky</th>  
                                      <td>&nbsp;<?php if($records['0']->milky != null){ echo $records['0']->milky; }  ?></td>
                                    </tr>
                                    <tr>
                                      <th>&nbsp;Eye Clean</th>  
                                      <td>&nbsp;<?php if($records['0']->eye_clean != null){ echo $records['0']->eye_clean; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Key to symb</th>  
                                      <td>&nbsp;<?php if($records['0']->keytosymb != null){ echo $records['0']->keytosymb; }  ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;OPTA</th>  
                                      <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;OPCR</th>  
                                      <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;L/W Ratio</th>  
                                      <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;Comment GIA</th>  
                                      <td>&nbsp;<?php echo $rec->member_comment; ?></td>
                                    </tr>

                                    <tr>
                                      <th>&nbsp;FancyColorDescription</th>  
                                      <td>&nbsp;</td>
                                    </tr>
                                
                            </tbody>
  </table>
                </div>
                <div class="col-md-4">
                     <div class="quick-img">
                           <?php  $count=0; foreach($image_array as $k => $value){  ?>
              <img src="<?php echo $value; ?>" class="img-fluid">
              <?php $count++; } ?>

              <?php  foreach($sample_image_array as $k => $value){  ?>
                  <img src="<?php echo $value; ?>" class="img-fluid">
              <?php $count++; } ?>
             <!--  <img src="210439-5.jpg" class="img-fluid"> -->
            </div>
            <div class="box_price">
                        <span>1.00 I SI2</span>
                        <br>
                        <span class="discount color-red">DIS: -69.59%</span>
                        <br>
                        <span>39,609.39 BAHT</span>
                        <br>
                        <p class="remark">Above Amount Can Be Changed, Depend On Current Exchange Rate.</p>
                                            </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
        </div>
    </section>



</body>
<!-- </html> -->