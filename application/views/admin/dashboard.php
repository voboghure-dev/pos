<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <?php $this->load->view('admin/head'); ?>
  </head>

  <body>
    <?php $this->load->view('admin/header'); ?>

    <?php $this->load->view($content); ?>

    <div style=" margin: 0 auto; width: 970px; text-align: right; padding-right: 30px;">
      <div style="width: 140px; height: 70px; float: right;">
        <a href="http://www.innovativebd.net/" target="_blank"><img src="images/logo.gif" width="130" border="0" /></a>
      </div>
      <div style="width: 300px; padding-top: 10px; height: 50px; float: right; font-weight: bold; font-size: 14px;">
        powered by<br />
        InnovativeBD<br />
        <span style="font-size: 12px;">email : info@innovativebd.biz</span>
      </div>
    </div>
  </body>
</html>