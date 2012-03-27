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
                  <th align="center" scope="col" width="100">Date</th>
                  <th align="left" scope="col" width="150">Opening Balance</th>
                  <th align="left" scope="col" width="150">Sales</th>
                  <th align="left" scope="col" width="150">Purchase</th>
                  <th align="left" scope="col" width="150">Closing Balance</th>
                </tr>
                <?php
                  $i=1;
                  foreach($inventory as $key=>$value){
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center"><?php echo $value['edate']; ?></td>
                  <td align="left"></td>
                  <td align="center"></td>
                  <td align="right"></td>
                  <td align="right"></td>
                </tr>
                <?php
                    if($i==1){
                      $i=0;
                    }else{
                      $i=1;
                    }
                  }
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center"><b>Grand Total</b></td>
                  <td align="right"></td>
                  <td align="right"></td>
                  <td align="right"></td>
                  <td align="center"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>