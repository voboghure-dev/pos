<div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center; padding-bottom: 10px;">
  New User Entry
</div>
<?php echo form_open('user/add'); ?>
<table cellpadding="5" cellspacing="5">
  <tr>
    <td width="120"><strong>Full Name</strong></td>
    <td><input type="text" name="full_name" autocomplete="off" style="width: 200px;" /></td>
  </tr>
  <tr>
    <td><strong>Email Address</strong></td>
    <td><input type="text" name="email" autocomplete="off" style="width: 200px;" /></td>
  </tr>
  <tr>
    <td><strong>Password</strong></td>
    <td><input type="password" name="password" autocomplete="off" style="width: 200px;" /></td>
  </tr>
  <tr>
    <td><strong>Re-enter Password</strong></td>
    <td><input type="password" name="repassword" autocomplete="off" style="width: 200px;" /></td>
  </tr>
  <tr>
    <td><strong>User Type</strong></td>
    <td>
      <select name="type" style="width: 203px;">
        <option value="admin">Admin</option>
        <option value="employee">Employee</option>
        <option value="employer">Employer</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><strong>Status</strong></td>
    <td>
      <select name="status" style="width: 203px;">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
      </select>
    </td>
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