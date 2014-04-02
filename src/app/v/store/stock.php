
<div class="panel_block" >
   <div class="padding"><a href="<?php echo  BASE;?>store/export/" class="btn btn-primary" >导出</a></div>

<table class="table table-striped" id="jtable" >
<?php
if(is_array($records )){?>
<thead>
  <tr> 
    <th>品号 / 品名 / 型号</th> 
    <th>分类</th>
    <th>库位</th>
    <th>库存</th>
    <th>警戒库存</th>
    <th width="80" >
      操作
    </th>
  </tr>
</thead>

<?php foreach ($records as $r ){ 
if($r['balance'] < $r['alert_level']) {
  ?>
<tbody>
  <tr <?php echo  ($i++%2==1)?'class="odd red"':'class="red"';?> >
    <td><?php echo  $r['pid'];?> / <?php echo  $r['pname'];?> / <?php echo  $r['size'];?></td>
    <td><?php echo  $r['category'];?></td>
    <td><?php echo  $r['kuwei'];?></td>
    <td><?php echo  $r['balance'];?> (警戒!) <?php echo  $r['unit'];?> </td>
    <td><?php echo  $r['alert_level'];?></td>
    <td>
      <a href="<?php echo  BASE;?>store/history/view/<?php echo  $r['pid'];?>"  >明细</a>
      <a href="<?php echo  BASE;?>store/edit/<?php echo  $r['pid'];?>" >编辑</a>
    </td>
  </tr>
<?php  }
} 

foreach ($records as $r ){ 
if($r['balance'] >= $r['alert_level']) {?>
  <tr <?php echo  ($i++%2==1)?'class="odd"':'';?> >
    <td><?php echo  $r['pid'];?> / <?php echo  $r['pname'];?> / <?php echo  $r['size'];?></td>
    <td><?php echo  $r['category'];?></td>
    <td><?php echo  $r['kuwei'];?></td>
    <td><?php echo  $r['balance'];?> <?php echo  $r['unit'];?></td>
    <td><?php echo  $r['alert_level'];?></td>
    <td>
      <a href="<?php echo  BASE;?>store/history_view/<?php echo  $r['pid'];?>" >明细</a>
      <a href="<?php echo  BASE;?>store/edit/<?php echo  $r['pid'];?>"  >编辑</a>
    </td>
  </tr>
<?php }
 }
}?></tbody>
</table>
<?php echo  $pagination;?>
</div>
</div>


<script type="text/javascript" src="static/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#jtable').dataTable({"bPaginate": false,
         "oLanguage": {
            "sLengthMenu": "显示 _MENU_ 条每页",
            "sZeroRecords": "什么都没有找到 - 很抱歉",
            "sInfo": "总共 _TOTAL_ , 显示 _START_ 至 _END_ 条",
            "sSearch": "搜索",
            "sInfoEmpty": "没有数据！",
            "sInfoFiltered": "(过滤自 _MAX_ 条数据)"
        }
        });
} );
</script>



