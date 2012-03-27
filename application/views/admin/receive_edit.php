<?php echo form_open('receive/edit'); ?>
<div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center;">
  Receive From Supplier
</div>
<table width="100%" cellpadding="5" cellspacing="5">
  <tr>
    <td width="120"><b>Select Supplier :</b></td>
    <td><?php echo form_dropdown('supplier_id', $suppliers, $receive['supplier_id'], 'style="width: 250px;"'); ?></td>
  </tr>
  <tr>
    <td><b>Select Category :</b></td>
    <td><?php echo form_dropdown('category_id', $categories, $receive['category_id'], 'style="width: 250px;"'); ?></td>
  </tr>
  <tr>
    <td><b>Select Item :</b></td>
    <td><?php echo form_dropdown('item_id', $items, $receive['item_id'], 'style="width: 250px;"'); ?></td>
  </tr>
  <tr>
    <td><b>Unit Price :</b></td>
    <td><input type="text" name="unit_price" style="width: 247px;" value="<?php echo $receive['unit_price']; ?>" /></td>
  </tr>
  <tr>
    <td><b>Received Quantity :</b></td>
    <td><input type="text" name="quantity" style="width: 247px;" value="<?php echo $receive['quantity']; ?>" /></td>
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
<?php
  echo form_hidden('id', $receive['id']);
  echo form_close();
?>