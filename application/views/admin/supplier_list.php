<div id="site">
  <div id="content_full">
    <?php $this->load->view('admin/middle_menu'); ?>
    
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Item List</h1>
      </div>
      
      <?php $this->load->view('admin/manager_left'); ?>
      
      <div id="ManagerWorkArea">
        <div id="mgrFullChannel">
          <div>
            <table cellspacing="0" border="0" style="border-collapse: collapse;" id="GridSuplList" causesvalidation="False" allowediting="True" class="GridView">
              <tbody>
                <tr align="left" style="font-family: Arial; text-decoration: none;">
                  <th align="center" scope="col" width="50">&nbsp;</th>
                  <th align="left" scope="col" width="325">Supplier Name</th>
                  <th align="left" scope="col" width="275">Email Address</th>
                  <th align="center" scope="col">Entry Date</th>
                </tr>
                <tr>
                  <td colspan="4" align="left">
                    <a href="supplier/add/?height=150&width=350&modal=true" class="thickbox" title="Supplier Entry"><img src="images/btn_add.gif" border="0" /></a>
                  </td>
                </tr>
                <?php
                  $i=1;
                  foreach($suppliers as $key=>$value){
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center">
                    <a href="supplier/edit/<?php echo $value['id']; ?>?height=150&width=350&modal=true" class="thickbox" title="Supplier Edit"><img src="images/icon_edit.gif" border="0" /></a>
                    <a href="supplier/delete/<?php echo $value['id']; ?>" title="Supplier Delete"><img src="images/icon_delete.gif" border="0" /></a>
                  </td>
                  <td align="left"><?php echo $value['first_name'] . '&nbsp;' . $value['last_name']; ?></td>
                  <td align="left"><?php echo $value['email']; ?></td>
                  <td align="center"><?php echo $value['edate']; ?></td>
                </tr>
                <?php
                    if($i==1){
                      $i=0;
                    }else{
                      $i=1;
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>