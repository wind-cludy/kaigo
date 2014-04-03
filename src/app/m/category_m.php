<?php
class category_m extends m {
	function __construct()
	{
		global $app_id;
		parent::__construct();
		$this->table = 'category';
		$this->fields = array('categoryCd','name','parentCd','productCount','level','url','regestTime');
		
	}

	function category()
	{
		global $app_id;
		return $this->get(" and app_id = '".$app_id."' and cur_balance = 1",0,9999);
	}

	function getbypid($categoryCd)
	{
		global $app_id;
		$categoryCd = mysql_escape_string(trim($categoryCd));
		$r = $this->get(" and  categoryCd = '$categoryCd' ",0,1);
		return $r[0];
	}

	function getbypname($name)
	{
		global $app_id;
		$name = mysql_escape_string(trim($name));
		$r = $this->get("  name like '$name' ",0,1);
		return $r[0];
	}


	function truncate($categoryCd)
	{
		$this->db->query("delete from category where app_id = $categoryCd");
	}
}