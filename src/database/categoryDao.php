<?php
require_once('database/DBConnection.php');
$dbSetting = parse_ini_file('config/database.conf');
$db_host = $dbSetting['db.host'];
$db_user = $dbSetting['db.user'];
$db_password = $dbSetting['db.password'];
$db_name = $dbSetting['db.name'];
$dbObj = new DataBaseConnection($db_host, $db_user,$db_password,$db_name);
class CategoryDao
{ 
	
}