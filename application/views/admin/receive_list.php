<div id="site">
  <div id="content_full">
    <?php $this->load->view('admin/middle_menu'); ?>
    
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Item List</h1>
      </div>
      
      <?php $this->load->view('admin/manager_left'); ?>
      
      <div id="ManagerWorkArea">
        <div style="overflow: scroll;" id="mgrFullChannel">
          <div>
            <table cellspacing="0" border="0" style="border-collapse: collapse;" id="gvItemList" class="GridView">
              <tbody>
                <tr align="left" style="font-family: Arial; text-decoration: none;">
                  <th align="center" style="width: 50px;" scope="col">&nbsp;</th>
                  <th align="left" scope="col">Receive ID</th>
                  <th align="left" scope="col">Item Name</th>
                  <th align="left" scope="col">Quantity</th>
                  <th align="left" scope="col">Supplier</th>
                  <th align="left" scope="col">Entry Date</th>
                </tr>
                <tr>
                  <td colspan="6"><a href="receive/add?height=200&width=400&modal=true" class="thickbox" title="Receive Entry"><img src="images/btn_add.gif" border="0" /></a></td>
                </tr>
                <?php
                  $i = 1;
                  foreach($receives as $key=>$value){
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center" style="height: 22px;">
                    <a href="receive/edit/<?php echo $value['id']; ?>?height=250&width=400&modal=true" class="thickbox" title="Item Edit"><img src="images/icon_edit.gif" border="0" /></a>
                    <a href="receive/delete/<?php echo $value['id']; ?>" title="Item Delete"><img src="images/icon_delete.gif" border="0" /></a>
                  </td>
                  <td align="left"><?php echo $value['id']; ?></td>
                  <td align="left"><?php echo $value['item_name']; ?></td>
                  <td align="left"><?php echo $value['quantity']; ?></td>
                  <td align="left"><?php echo $value['supplier_name']; ?></td>
                  <td align="left"><?php echo $value['edate']; ?></td>
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