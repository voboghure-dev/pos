<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php $this->load->view('head'); ?>
  </head>

  <body>
    <?php echo form_open('homepage/login'); ?>
    <div id="mastheadholder">
      <div id="mastheadlogin">
        <div id="logo_login"><img src="images/cart.png" alt="ERP Online BD" border="0" width="125" /></div>
      </div>
    </div>

    <div id="site">
      <div id="content_login">
        <h1 style="display: block; margin-left: 100px;" id="lblAdminCaption">System Login</h1>
        <ul>
          <li>
            <label id="lblUserName" for="txtUserName">User Email:</label>
            <input name="email" id="txtUserName" type="text" />
          </li>
          <li>
            <label id="lblPassword" for="txtPassword">Password:</label>
            <input name="password" id="txtPassword" type="password" />
          </li>
          <li class="submit">
            <!-- <input type="image" name="btnCancel" id="btnCancel" src="images/btn_cancel.gif" onclick="javascript:return CancelClick();" style="border-width:0px;" />  -->
            <input name="btnLogin" id="btnLogin" src="images/btn_login.gif" onclick="javascript:return SubmitLogin();" style="border-width: 0px;" type="image">
          </li>
        </ul>
        <div id="login_error"><span id="lblErrorMessage"></span></div>
      </div>
      <div style="margin: 0 auto; width: 350px; text-align: centere; padding-right: 30px;">
        <div style="width: 140px; height: 70px; float: right;">
          <a href="http://www.innovativebd.net/" target="_blank"><img src="images/logo.gif" width="130" border="0" /></a>
        </div>
        <div style="width: 200px; padding-top: 10px; height: 50px; float: left; text-align: right; font-weight: bold; font-size: 14px;">
          powered by<br />
          InnovativeBD<br />
          <span style="font-size: 12px;">email : info@innovativebd.net</span>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </body>
</html>