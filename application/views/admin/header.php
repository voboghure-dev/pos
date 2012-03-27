<div id="mastheadholder">
  <div id="masthead">
    <div id="logo"><a href=""><img src="images/cart.png" alt="ERP Online BD" border="0" width="125" /></a></div>
    <div id="storeinfo">
      <table cellpadding="0" cellspacing="5">
        <tbody>
          <tr>
            <td align="left"><b>Current User :</b>&nbsp;&nbsp;<span id="headerControl_lblCashierName" style="display: inline-block; border-style: none;"><?php echo $this->session->userdata('full_name'); ?></span></td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <div class="topnav">
      <ul>
        <li><a href="sales" <?php if($menu=='sales'){ ?>class="current"<?php } ?>>Sales</a></li>
        <li><a href="item" <?php if($menu=='manager'){ ?>class="current"<?php } ?>>Manager</a></li>
        <li><a href="reports" <?php if($menu=='reports'){ ?>class="current"<?php } ?>>Report</a></li>
        <li><a href="user" <?php if($menu=='dashboard'){ ?>class="current"<?php } ?>>Dashboard</a></li>
      </ul>
    </div>
  </div>
</div>