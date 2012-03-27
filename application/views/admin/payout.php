<form name="payout" action="sales" method="post">
  <div style="font-weight: bold;">
    <table width="100%" border="0" cellpadding="2" cellspacing="2">
      <tr>
        <td>Total :</td>
        <td><input type="text" name="total" id="total" value="<?php echo $total; ?>" readonly /></td>
      </tr>
      <tr>
        <td>Paid :</td>
        <td><input type="text" name="paid" id="paid" onchange="javascript:document.payout.change.value = document.payout.paid.value - document.payout.total.value" /></td>
      </tr>
      <tr>
        <td>Change :</td>
        <td><input type="text" name="change" id="change" readonly /></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Payout" onclick="tb_remove()" /></td>
      </tr>
    </table>
  </div>
</form>