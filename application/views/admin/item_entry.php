<?php
  if($from=='cashier'){
    echo form_open('sales/new_item');
    echo form_hidden('sale_url', $sale_url);
  }else{
    echo form_open('item/add');
  }
?>
<div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center;">
  New Item Entry
</div>
<table width="100%" cellpadding="5" cellspacing="5">
  <tr>
    <td width="100"><b>Item Code :</b></td>
    <td><input type="text" class="text" name="code" style="width: 250px;" /></td>
  </tr>
  <tr>
    <td><b>Item Name :</b></td>
    <td><input type="text" class="text" name="name" style="width: 250px;" /></td>
  </tr>
  <tr>
    <td><b>Description :</b></td>
    <td><input type="text" class="text" name="description" style="width: 250px;" /></td>
  </tr>
  <tr>
    <td><b>Purchase Price :</b></td>
    <td><input type="text" class="text" name="purchase_price" style="width: 250px;" /></td>
  </tr>
  <tr>
    <td><b>Sale Price :</b></td>
    <td><input type="text" class="text" name="sale_price" style="width: 250px;" /></td>
  </tr>
  <tr>
    <td><b>Re Order Level :</b></td>
    <td><input type="text" class="text" name="re_order" style="width: 250px;" /></td>
  </tr>
  <tr>
    <td><b>Category Name :</b></td>
    <?php $width = 'style="width: 250px;"'; ?>
    <td><?php echo form_dropdown('category_id', $categories, 'root', $width); ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="submit" value="Submit" />&nbsp;<input type="button" value="Cancel" onclick="tb_remove()" />
    </td>
  </tr>
</table>
<?php echo form_close(); ?>