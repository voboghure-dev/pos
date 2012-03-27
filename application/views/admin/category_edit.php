<?php echo form_open('category/edit'); ?>
<div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center; height: 35px; padding-top: 5px;">
  Category Edit
</div>
<table width="100%" cellpadding="5" cellspacing="5">
  <tr>
    <td width="100"><b>Category Name :</b></td>
    <td><input type="text" name="name" value="<?php echo $category['name']; ?>" style="width: 165px;" /></td>
  </tr>
  <tr class="bg">
    <td><b>Code :</b></td>
    <td><input type="text" name="code" value="<?php echo $category['code']; ?>" style="width: 165px;" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input value="Submit" type="submit" />&nbsp;<input type="button" value="Cancel" onclick="tb_remove()" /></td>
  </tr>
</table>
<?php
  echo form_hidden('id', $category['id']);
  echo form_close();
?>