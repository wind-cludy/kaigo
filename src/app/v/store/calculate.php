


<div class="panel_block" ><form class="padding" method="POST" >
  <input  placeholder="分类"  type="text" name="category" list="category_item" value="<?php echo isset($category)?$category:'';?>" autocomplete="off" />
&nbsp;
日期  <input type="date" name="sdate" class="input-medium" value="<?php echo $sdate;?>"/>
-
<input type="date" name="edate" class="input-medium" value="<?php echo $edate;?>" />  <input type="submit" value="搜索" class="btn btn-primary"/>  
&nbsp;
 <!-- <a href="<?php echo BASE;?>stock/export/" >导出EXCEL</a> -->
</form>

<datalist id="category_item">
  <option value="原料" >
  <option value="产成品" >
  <option value="其他" >
</datalist>

<table class="table" id="jtable" cellspacing=0 >
  <?php if(is_array($records )){?>
  <thead>
  <tr>
    <th>品号 / 品名 / 型号</th>
    <th>单位</th>
    <th>分类</th>
    <th>库位</th>
    <th>入库</th>
    <th>出库</th>
    <th>警戒库存</th>
    <th>
      操作
    </th>
  </tr></thead>
  <tbody>
  
<?php
foreach ($records as $r ){ 
   $pid = $r['pid'];
?>
  <tr <?php echo ($i++%2==1)?'class="odd"':'';?>>
    <td><?php echo $r['pid'];?> / <?php echo $r['pname'];?> / <?php echo $r['size'];?></td>
    <td><?php echo $eku[$pid]['unit'];?></td>
    <td><?php echo $eku[$pid]['category'];?></td>
    <td><?php echo $eku[$pid]['kuwei'];?></td>
    <td><?php echo isset($r['in'])?$r['in']:0;?></td>
    <td><?php echo isset($r['out'])?$r['out']:0;?></td>
    <td><?php echo $eku[$pid]['alert_level'];?></td>
    <td>
      <a href="<?php echo BASE;?>store/history/view/<?php echo $r['pid'];?>" >明细</a>
    </td>
  </tr>
<?php } ?>
</tbody>
<?php
}?>
</table>
<?php echo isset($pagination) ?$pagination:'';?>
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

