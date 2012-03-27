<?php echo form_open('category/add'); ?>
<div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center;">
  New Category Entry
</div>
<table width="100%" cellpadding="5" cellspacing="5">
  <tr>
    <td width="100"><b>Category Code :</b></td>
    <td><input type="text" class="text" name="code" style="width: 250px;" /></td>
  </tr>
  <tr>
    <td><b>Category Name :</b></td>
    <td><input type="text" class="text" name="name" style="width: 250px;" /></td>
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