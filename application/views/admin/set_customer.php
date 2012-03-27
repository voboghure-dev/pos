<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr bgcolor="#C9EAFC">
    <th>ID</th>
    <th>Full Name</th>
    <th>City</th>
    <th>Phone</th>
  </tr>
  <?php foreach($customers as $key=>$value){ ?>
  <tr>
    <td><?php echo $value['id']; ?></td>
    <td><a href="sales/set_customer/<?php echo $sales_id; ?>/<?php echo $value['id']; ?>"><?php echo $value['title'] . ' ' . $value['first_name'] . ' ' . $value['last_name'] ; ?></a></td>
    <td><?php echo $value['city']; ?></td>
    <td><?php echo $value['phone']; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="button" value="Cancel" onclick="tb_remove()" /></td>
  </tr>
</table>