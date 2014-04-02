<ul class="eku-list" >
<?php
if(is_array($records )){
foreach ($records as $r ){ ?>
  <li>
    <div>ekuid <?php echo  $r['eku_id'];?></div>
    <div>ekuid <?php echo  $r['pid'];?></div>
    <div>ekuid <?php echo  $r['pname'];?></div>
    <div>ekuid <?php echo  $r['unit'];?></div>
    <div>ekuid <?php echo  $r['num'];?></div>
    <div>ekuid <?php echo  $r['action'];?></div>
    <div>ekuid <?php echo  $r['action_label'];?></div>
    <div>ekuid <?php echo  $r['alert_level'];?></div>
    <div>ekuid <?php echo  $r['kuwei'];?></div>
    <div>ekuid <?php echo  $r['datetime'];?></div>
    <div>ekuid <?php echo  $r['doer'];?></div>
    <div>ekuid <?php echo  $r['remark'];?></div>
    <div>ekuid <?php echo  $r['category'];?></div>
    <div>ekuid <?php echo  $r['balance'];?></div>
    <div>ekuid <?php echo  $r['cur_balance'];?></div>
    <div>
      <a href="/eku/view/<?php echo  $r['id'];?>" >查看</a>
      <a href="/eku/edit/<?php echo  $r['id'];?>" >编辑</a> 
    </div>
  </li>
<?php  }
}?>
</ul>
<?php echo  isset($pagination)?$pagination:'';?>