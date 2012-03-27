<?php echo form_open('supplier/add'); ?>
<div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center;">
  New Supplier Entry
</div>
<table width="100%" cellpadding="5" cellspacing="5">
  <tr>
    <td width="120"><b>First Name :</b></td>
    <td><input type="text" class="text" name="first_name" style="width: 240px;" /></td>
  </tr>
  <tr>
    <td><b>Last Name :</b></td>
    <td><input type="text" class="text" name="last_name" style="width: 240px;" /></td>
  </tr>
  <tr>
    <td><b>Email Address :</b></td>
    <td><input type="text" class="text" name="email" style="width: 240px;" /></td>
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