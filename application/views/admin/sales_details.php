<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('sales/add_item/'.$sales_id); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Add item for the customer : <?php echo $customer['fname']; ?></th>
      </tr>
      <tr>
        <td class="first" width="120"><b>Item Name</b></td>
        <td class="last">
          <?php echo form_dropdown('item_id', $items, '', 'style="width: 270px;"'); ?>
        </td>
      </tr>
      <input type="hidden" name="sales_id" value="<?php echo $sales_id; ?>" />
      <tr class="bg">
        <td class="first" width="120"><b>Quantity</b></td>
        <td class="last"><input type="text" name="quantity" /></td>
      </tr>
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">
          <input type="submit" name="submit" value="Add Item" />
        </td>
      </tr>
      <?php echo form_close(); ?>
    </table>
  </div>
  <div class="top-bar"></div>
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="5">List of the item</th>
      </tr>
      <tr>
        <td class="first" width="300px;"><b>Item Name</b></td>
        <td><b>Quantity</b></td>
        <td><b>Unit Price</b></td>
        <td><b>Total Price</b></td>
        <td class="last" width="50px;"><b>Action</b></td>
      </tr>
      <?php
        $tqty = 0;
        $tprice = 0;
        $i=1;
        if(!empty($sales_items)){
          foreach($sales_items as $sales_item){
            $tqty = $tqty + $sales_item['quantity'];
            $tprice = $tprice + ($sales_item['price'] * $sales_item['quantity']);
      ?>
      <tr <?php if($i==1){echo 'class="bg"';} ?>>
        <td class="first" width="120"><b><?php echo $sales_item['name']; ?></b></td>
        <td><b><?php echo $sales_item['quantity']; ?></b></td>
        <td><b><?php echo number_format($sales_item['price'], 2); ?></b></td>
        <td><?php echo number_format(($sales_item['quantity'] * $sales_item['price']), 2); ?></td>
        <td class="last" style="text-align: center;"><input type="hidden" value="<?php echo $sales_item['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
      </tr>
      <?php
            if($i==1){$i=0;}else{$i=1;}
          }
        }
      ?>
      <tr>
        <td><b>Grand Total</b></td>
        <td><b><?php echo $tqty; ?></b></td>
        <td>&nbsp;</td>
        <td><b><?php echo number_format($tprice, 2); ?></b></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $('.delete').click(function(){
      $(this).parent().parent().fadeTo(400, 0, function () {
        $(this).remove();
      });
      $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>sales/delete_item",
         data: "id="+$(this).prev().val(),
         success: function(html){
             $(".top-bar").html(html);
             }
      });

      return false
    });
  });
</script>