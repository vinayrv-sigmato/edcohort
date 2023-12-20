<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo SITE_NAME; ?></title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
<style>
body, html {
}
.p-spacer th {
	padding: 0 14px
}
</style>
</head>
<body>
<table cellpadding="0" border="0" align="center" cellspacing="0" class="main-table" style="width:100%; max-width:600px; ">
  <tr>
    <td width="100%">
    <table width="100%" cellpadding="0" border="0" align="center" cellspacing="0" class="header" >
        <tr>
          <td style="padding-top:10px; padding-bottom:5px;" class="heder-left" align="center"><a href="<?php  echo base_url();?>"><img style="display:block;" src="<?php  echo base_url();?>assets/images/logo.png"  alt="<?php echo SITE_NAME; ?>" width="200" /></a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td style="font-size:20px; color:#fff; margin:0px; font-family:Arial; font-weight:600; padding:20px 10px 20px 10px; background-color:#272727;"></td>
  </tr>
  <tr>
    <td style="border:1px solid #ddd;">
   		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="font-size:16px; color:#000000; margin:0px; font-family:Arial; padding:15px 10px 10px 10px;"> Hi <font style="font-weight:600;">
            <?php if(!empty($fname)) { echo ucwords($fname); } ?>
            </font>, </td>
        </tr>
        <tr>
          <td style="font-size:14px; color:#000000; margin:0px; font-family:Arial; font-weight:500; padding:5px 10px"><?php 

	echo $str_final;

?></td>
        </tr>
        
      </table></td>
  </tr>
  
  
  
  
  <tr>
          <td width="100%">
          <table width="100%" cellpadding="0" border="0" align="center" cellspacing="0" class="header" style="border: 1px solid #CCC;border-top: 0;" >
              <tr>
                <td style="font-size:16px; color:#e3273b; margin:0px; font-family:Arial; font-weight:600; padding:20px 10px 0px 10px;"><font color="#000"></font><br>
                 
                  <?php echo SITE_NAME ?>                   <p style="font-size:12px; margin:0px; color:#000000;font-family:Arial; font-weight:600; "><a href="mailto:<?php //echo SITE_EMAIL; ?>" target="_blank" style="color:#888; text-decoration:none; text-align:center; font-weight:400;"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo SITE_EMAIL; ?>,</a> &nbsp; <a href="tel:<?php echo SITE_PHONE; ?>" target="_blank" style="color:#888; text-decoration:none; text-align:center; font-weight:400;"> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo SITE_PHONE; ?> </a></p></td>
              </tr>
              <tr>
                <td style="padding-top:10px;">
                <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#f5f5f5">
                    <tr>
                      <td align="center" class="left-footer" style="font-size:14px; color:#666; margin:0px; font-family:Arial, Helvetica, sans-serif;  font-weight:400; line-height:20px; padding:15px;">Copyright &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</td>
                    </tr>
                  </table>
                 </td>
              </tr>
            </table></td>
        </tr>
  
  
</table>
<!--my table -->

</body>
</html>
