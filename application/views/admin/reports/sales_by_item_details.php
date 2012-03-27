<div id="site">
  <div id="content_2_column">
    <?php $this->load->view('admin/middle_menu'); ?>
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Reports</h1>
      </div>

      <?php $this->load->view('admin/reports/left'); ?>

      <div id="ManagerWorkArea">
        <div id="mgrFullChannel">
          <div>
            <table cellspacing="0" border="0" style="border-collapse: collapse;" id="GridSuplList" causesvalidation="False" allowediting="True" class="GridView">
              <tbody>
                <tr align="left" style="font-family: Arial; text-decoration: none;">
                  <th align="center" scope="col" width="40">SL #</th>
                  <th align="center" scope="col" width="90">Date</th>
                  <th align="left" scope="col" width="70">Order No</th>
                  <th align="left" scope="col" width="170">Item Name</th>
                  <th align="center" scope="col" width="60">Quantity</th>
                  <th align="center" scope="col" width="70">Unit Price</th>
                  <th align="center" scope="col" width="60">Amount</th>
                  <th align="center" scope="col">Entry Date</th>
                </tr>
                <?php
                  $i=1;
                  $j=1;
                  $qty = 0;
                  $amount = 0;
                  foreach($sales as $key=>$value){
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center"><?php echo $j; ?></td>
                  <td align="center"><?php echo $value['edate']; ?></td>
                  <td align="center"><?php echo $value['id']; ?></td>
                  <td align="left"><?php echo $value['item_name']; ?></td>
                  <td align="center"><?php echo $value['quantity']; ?></td>
                  <td align="center"><?php echo $value['unit_price']; ?></td>
                  <td align="right"><?php echo number_format($value['total_price'], 2); ?></td>
                  <td align="center"><?php echo $value['edate']; ?></td>
                </tr>
                <?php
                    $qty = $qty + $value['quantity'];
                    $amount = $amount + $value['total_price'];
                    $j++;
                    if($i==1){
                      $i=0;
                    }else{
                      $i=1;
                    }
                  }
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center" colspan="4"><b>Grand Total</b></td>
                  <td align="center"><?php echo $qty; ?></td>
                  <td align="center">&nbsp;</td>
                  <td align="right"><?php echo number_format($amount, 2); ?></td>
                  <td align="center">&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>