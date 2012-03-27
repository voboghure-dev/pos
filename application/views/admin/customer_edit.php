<div>
  <div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center;">
    Customer Details Edit
  </div>
  <?php echo form_open('customer/edit'); ?>
  <table width="100%" border="0" cellpadding="5" cellspacing="5">
    <tr>
      <td width="100"><b>Title :</b></td>
      <td><input type="text" name="title" style="width: 350px;" value="<?php echo $customer['title']; ?>" /></td>
    </tr>
    <tr>
      <td><b>First Name :</b></td>
      <td><input type="text" name="first_name" style="width: 350px;" value="<?php echo $customer['first_name']; ?>" /></td>
    </tr>
    <tr>
      <td><b>Last Name :</b></td>
      <td><input type="text" name="last_name" style="width: 350px;" value="<?php echo $customer['last_name']; ?>" /></td>
    </tr>
    <tr>
      <td><b>Address 01 :</b></td>
      <td><input type="text" name="address1" style="width: 350px;" value="<?php echo $customer['address1']; ?>" /></td>
    </tr>
    <tr>
      <td><b>Address 02 :</b></td>
      <td><input type="text" name="address2" style="width: 350px;" value="<?php echo $customer['address2']; ?>" /></td>
    </tr>
    <tr>
      <td><b>City :</b></td>
      <td><input type="text" name="city" style="width: 350px;" value="<?php echo $customer['city']; ?>" /></td>
    </tr>
    <tr>
      <td><b>Zip Code :</b></td>
      <td><input type="text" name="zip" style="width: 350px;" value="<?php echo $customer['zip']; ?>" /></td>
    </tr>
    <tr>
      <td><b>Country :</b></td>
      <td><input type="text" name="country" style="width: 350px;" value="<?php echo $customer['country']; ?>" /></td>
    </tr>
    <tr>
      <td><b>Phone :</b></td>
      <td><input type="text" name="phone" style="width: 350px;" value="<?php echo $customer['phone']; ?>" /></td>
    </tr>
    <tr>
      <td><b>Email :</b></td>
      <td><input type="text" name="email" style="width: 350px;" value="<?php echo $customer['email']; ?>" /></td>
    </tr>
    <tr>
      <td valign="top"><b>Notes :</b></td>
      <td><textarea name="notes" style="width: 350px;"><?php echo $customer['notes']; ?></textarea></td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td colspan="2" align="center"><input value="Submit" type="submit" />&nbsp;<input type="button" value="Cancel" onclick="tb_remove()" /></td>
    </tr>
  </table>
  <?php echo form_hidden('id', $customer['id']); ?>
  <?php echo form_close(); ?>
</div>