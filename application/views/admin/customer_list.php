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
                  <th scope="col" style="width: 50px;">&nbsp;</th>
                  <th align="left" scope="col">Name</th>
                  <th align="left" scope="col">Phone #</th>
                  <th align="left" scope="col">E-Mail</th>
                  <th align="left" scope="col">Date Created</th>
                </tr>
                <tr>
                  <td colspan="5"><a href="customer/add?height=400&width=500&modal=true" class="thickbox" title="Item Entry"><img src="images/btn_add.gif" border="0" /></a></td>
                </tr>
                <?php foreach ($customers as $key => $value) { ?>
                  <tr class="RowStyle">
                    <td>
                      <a href="customer/edit/<?php echo $value['id']; ?>?height=400&width=500&modal=true" class="thickbox" title="Customer Entry"><img src="images/icon_edit.gif" border="0" /></a>
                      <a href="customer/delete/<?php echo $value['id']; ?>" title="Customer Delete"><img src="images/icon_delete.gif" border="0" /></a>
                    </td>
                    <td align="left"><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></td>
                    <td><?php echo $value['phone']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td align="left"><?php echo $value['edate']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>