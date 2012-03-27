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
                  <th align="left" scope="col">Category Name</th>
                  <th align="left" scope="col">Code</th>
                </tr>
                <tr>
                  <td colspan="3"><a href="category/add?height=150&width=400&modal=true" class="thickbox" title="Item Entry"><img src="images/btn_add.gif" border="0" /></a></td>
                </tr>
                <?php
                $i = 1;
                foreach ($categories as $key => $value) {
                  ?>
                  <tr <?php if ($i == 1) { ?>class="RowStyle"<?php } else { ?>class="AlternatingRowStyle"<?php } ?>>
                    <td>
                      <a href="category/edit/<?php echo $value['id']; ?>?height=150&width=280&modal=true" class="thickbox" title="Category Entry"><img src="images/icon_edit.gif" border="0" /></a>
                      <a href="category/delete/<?php echo $value['id']; ?>" title="Category Delete"><img src="images/icon_delete.gif" border="0" /></a>
                    </td>
                    <td><?php echo $value['name'] ?></td>
                    <td align="left"><?php echo $value['code'] ?></td>
                  </tr>
                  <?php
                  if ($i == 1) {
                    $i = 0;
                  } else {
                    $i = 1;
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
