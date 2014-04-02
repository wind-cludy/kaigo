<div class="panel_block" >
<table class="table" cellspacing=0 >
<?php if(is_array($records )){?>
  <tr>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>单位</th>
    <th>数量</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>ekuid</th>
    <th>库存</th>
    <th>ekuid</th>
    <th>
      操作
    </th>
  </tr>
<?php  foreach ($records as $r ){?>
  <tr>
    <td><?php echo  $r['eku_id'];?></td>
    <td><?php echo  $r['pid'];?></td>
    <td><?php echo  $r['pname'];?></td>
    <td><?php echo  $r['unit'];?></td>
    <td><?php echo  $r['num'];?></td>
    <td><?php echo  $r['action'];?></td>
    <td><?php echo  $r['action_label'];?></td>
    <td><?php echo  $r['alert_level'];?></td>
    <td><?php echo  $r['kuwei'];?></td>
    <td><?php echo  $r['datetime'];?></td>
    <td><?php echo  $r['doer'];?></td>
    <td><?php echo  $r['remark'];?></td>
    <td><?php echo  $r['category'];?></td>
    <td><?php echo  $r['balance'];?></td>
    <td><?php echo  $r['cur_balance'];?></td>
    <td>
      <a href="/eku/view/<?php echo  $r['id'];?>" >查看</a>
      <a href="/eku/edit/<?php echo  $r['id'];?>" >编辑</a> 
    </td>
  </tr>
<?php  }
}?>
</table>
<?php echo  $pagination;?>
</div>
