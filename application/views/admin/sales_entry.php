<div id="site">
  <div id="content">
    <?php $this->load->view('admin/middle_menu'); ?>
    
    <div id="itemlisting">
      <div id="customerheader">
        <form name="sales" method="post" action="sales/add">
          <div style="width: 100%; height: 50px; float: left;">
            <b>Item Code : </b><input type="text" name="item_code" id="item_code" style="width: 150px;" <?php if (isset($code)) { ?>value="<?php echo $code; ?>"<?php } ?> />&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Quantity : </b><input type="text" name="quantity" style="width: 150px;" />&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" value="Add Item" />
          </div>
          <?php
          if (isset($sales['id'])) {
            echo form_hidden('sales_id', $sales['id']);
          }
          ?>
        </form>
        <div style="width: 100%; float: left; font-size: 15px; font-weight: bold;">
          Customer : <?php if (isset($customer)) {
            echo $customer['title'] . ' ' . $customer['first_name'] . ' ' . $customer['last_name'];
          } else {
            echo 'Annynimous';
          } ?>
        </div>
      </div>
      <div id="itemheader">
        <table class="itemtable" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <th width="22">&nbsp;</th>
              <th width="80">&nbsp;Item</th>
              <th width="168">&nbsp;Description</th>
              <th width="36">&nbsp;Qty</th>
              <th width="52">&nbsp;Tax %</th>
              <th width="73">&nbsp;Price</th>
              <th>&nbsp;Total</th>
            </tr>
          </tbody>
        </table>
      </div>
      <div id="items">
        <table class="itemtable" id="tblItems" border="0" cellpadding="0" cellspacing="0" width="554">
          <tbody>
            <?php
            $i = 1;
            $total = 0;
            if (isset($details)) {
              foreach ($details as $key => $value) {
            ?>
                <tr <?php if ($i == 1) { ?>class="row"<?php } else { ?>class="rowalternate"<?php } ?>>
                  <td align="center" width="23">
                    <a href="sales/delete_item/<?php echo $value['id'] . '/' . $this->uri->segment(3); ?>"><img src="images/icon_delete.gif" name="delete" id="delete" border="0" height="20" width="20"></a>
                  </td>
                  <td width="81"><?php echo $value['item_code']; ?></td>
                  <td width="172"><?php echo $value['item_name']; ?></td>
                  <td width="37"><?php echo $value['quantity']; ?></td>
                  <td width="53"></td>
                  <td width="75" align="right"><?php echo number_format($value['item_price'], 2); ?></td>
                  <td width="75" align="right"><?php echo number_format($value['quantity'] * $value['item_price'], 2); ?></td>
                </tr>
            <?php
                $total = $total + $value['quantity'] * $value['item_price'];
                if ($i == 1) {
                  $i = 0;
                } else {
                  $i = 1;
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <div id="itemtotal" style="text-align: right;">
        <table align="right" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="top">
                <div id="discount">
                  <span id="lblDiscount" style="display: inline-block; border-style: none; color: rgb(138, 138, 138);"></span>
                </div>
              </td>
              <td width="20px">&nbsp;</td>
              <td>
                <div id="totalprice"> <?php echo number_format($total, 2); ?> /=
                  <div class="totallabel" id="totallabel">TOTAL</div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div id="mainsalenav">
      <ul>
        <li><a href="sales/find_item/<?php echo $this->uri->segment(3); ?>?height=400&width=400&modal=true" class="thickbox" title="Find Item"><img src="images/btn_add_item.png" border="0" height="105" width="113"></a></li>
        <li><a href="sales/set_customer/<?php echo $this->uri->segment(3); ?>?height=400&width=400&modal=true" class="thickbox" title="Set Customer"><img src="images/btn_set_customer.png" border="0" height="105" width="113"></a></li>
        <!--
        <li><a href="#"><img src="images/btn_return_void.png" border="0" height="105" width="113"></a></li>
        <li><a href="#"><img src="images/btn_tender_sale.png" border="0" height="105" width="113"></a></li>
        <li><a href="#"><img src="images/btn_secure.png" border="0" height="105" width="113"></a></li>
        -->
      </ul>
    </div>
    <div id="secondarysalenav">
      <ul>
        <!--<li><a href="#">Open Store</a></li>-->
        <li><a href="sales/new_item/?height=250&width=400&modal=true" class="thickbox" title="New Item">New Item</a></li>
        <!--<li><a href="#">Hold Transaction</a></li>-->
        <li><?php if($this->uri->segment(3)){ ?><a href="sales/delete/<?php echo $this->uri->segment(3); ?>">Cancel Transaction</a><?php }else{ ?>Cancel Transaction<?php } ?></li>
        <!--<li><a href="#">Open Drawer</a></li>-->
        <li><?php if($this->uri->segment(3)){ ?><a href="sales/payout/<?php echo $this->uri->segment(3); ?>?height=170&width=300&modal=true" class="thickbox" title="Payout">Payout</a><?php }else{ ?>Payout<?php } ?></li>
        <li><a id="showCalc" href="javascript:void(0)">Calculator</a></li><div id="calc"></div>
        <!--
        <li><a href="#">Discount</a></li>
        <li><a href="#">Time Clock</a></li>
        -->
      </ul>
    </div>

  </div>
</div>
<script language=javascript>
  document.sales.item_code.focus();
  function change_amount(){
    document.payout.change.focus();
  }
</script>