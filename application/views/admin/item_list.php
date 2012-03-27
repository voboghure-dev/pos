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
            <table cellspacing="0" border="0" style="border-collapse: collapse;" id="gvCustomers" class="GridView">
              <tbody>
                <tr align="left" style="font-family: Arial; text-decoration: none;">
                  <th align="center" scope="col" style="width: 50px;">&nbsp;</th>
                  <th align="left" scope="col">Code</th>
                  <th align="left" scope="col">Name</th>
                  <th align="left" scope="col">Category</th>
                  <th align="left" scope="col">Description</th>
                  <th align="left" scope="col">Price</th>
                  <th align="left" scope="col">Re-Order</th>
                </tr>
                <tr>
                  <td colspan="7"><a href="item/add?height=250&width=400&modal=true" class="thickbox" title="Item Entry"><img src="images/btn_add.gif" border="0" /></a></td>
                </tr>
                <?php
                  $i = 1;
                  foreach($items as $key=>$value){
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center">
                    <a href="item/edit/<?php echo $value['id']; ?>?height=250&width=400&modal=true" class="thickbox" title="Item Edit"><img src="images/icon_edit.gif" border="0" /></a>
                    <a href="item/delete/<?php echo $value['id']; ?>" title="Item Delete"><img src="images/icon_delete.gif" border="0" /></a>
                  </td>
                  <td align="left"><?php echo $value['code']; ?></td>
                  <td align="left"><?php echo $value['name']; ?></td>
                  <td align="left"><?php echo $value['categoryname']; ?></td>
                  <td align="left"><?php echo $value['description']; ?></td>
                  <td align="right"><?php echo $value['sale_price']; ?></td>
                  <td align="right"><?php echo $value['re_order']; ?></td>
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