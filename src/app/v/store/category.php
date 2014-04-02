<div class="panel_block" >
  <div class="submenu" >
<form class="padding" method="POST" >
<h2>検索条件</h2>
<table class="table">
	<tr>
		<th>カテゴリ名</th>
		<td><input  placeholder="カテゴリ名"  type="text" name="category" list="category_item" value="<?php echo  $category;?>" autocomplete="off" /></td>
	</tr>
	<tr>
		<th>親カテゴリ</th>
		<td>
			<select class="input-small" required name="action_label">
        		<option>入库</option>
        		<option>盘盈</option>
      		</select>
      	</td>
	</tr>
</table>
<div>
 <input type="submit" value="搜索" class="btn btn-primary"/>  
</div>
 </form>
</div>

<datalist id="category_item">
  <?php
  $cat = explode("\n",$app['category']);
  if(is_array($cat)){
    foreach($cat as $c)
    {
      ?>
      <option value="<?php echo  $c;?>" >
      <?php
    }
  }
  ?>
</datalist>


<div class="clear" ></div>
<h2>検索結果</h2>
<div class="pagination" ><?php echo  $pagination;?></div>
<table class="table table-striped" id="jtable">
<?php if(is_array($records )){?>
<thead>
  <tr>
    <th>日期</th>
    <th>品号 / 品名 / 型号</th> 
    <th></th>
    <th>数量</th>
    <th>结余</th> 
    <th>分类</th>
    <th>操作员</th>
    <th>备注</th>
  </tr>
</thead>
<tbody>
<?php foreach ($records as $r ){?>
  <tr <?php echo  ($i++%2==1)?'class="odd"':'';?>>
    <td><?php echo  date('m-d H:i',$r['datetime']);?></td>
    <td><?php echo  $r['pid'];?> / <?php echo  $r['pname'];?> / <?php echo  $r['size'];?></td> 
    <td><?php echo  $r['action_label'];?></td>
    <td <?php echo  $r['num']<0?'class="red"':'';?>><?php echo  $r['num'];?></td>
    <td><?php echo  $r['balance'];?> (<?php echo  $r['unit'];?>) </td>
    <td><?php echo  $r['category'];?></td>
    <td><?php echo  $r['doer'];?></td>
    <td><a title="<?php echo  $r['remark'];?>" >备注</a></td>
  </tr>
<?php  }
}?>
</tbody>
</table>
<div class="pagination" ><?php echo  $pagination;?></div>
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



