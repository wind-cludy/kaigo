<?php
// $dbSetting = parse_ini_file('../confif/database.conf');
// $db_host = $dbSetting['db.host'];
// $db_user = $dbSetting['db.user'];
// $db_password = $dbSetting['db.password'];
// $db_name = $dbSetting['db.name'];
// $twObj = new TwitterOAuth($consumerKey, $consumerSecret);

class DataBaseConnection
{
	const REQUEST_TOKEN_URL = 'https://api.twitter.com/oauth/request_token';
	const AUTHORIZE_URL     = 'https://api.twitter.com/oauth/authorize';
	const ACCESS_TOKEN_URL  = 'http://api.twitter.com/oauth/access_token';
	const STATUS_UPDATE_URL = 'http://api.twitter.com/1.1/statuses/update.json';
	const FRIENDSHIP_LOOKUP_URL = 'http://api.twitter.com/1.1/friendships/lookup.json';
	const FOLLOW_CREATE_URL = 'http://api.twitter.com/1.1/friendships/create.json';

	private $_db_host;
	private $_db_user;
	private $_db_pwd;
	private $db;
	public function __construct($host="localhost",$user="root",$pass="",$db=""){
		$this->db = @mysql_connect($host, $user, $pass);
		if(!$this->db) die(@mysql_error());
		if($db != "") $dbs = @mysql_select_db($db);
		if(!$dbs) die(@mysql_error());
	}

 public function __destruct() {
  @mysql_close($db);
 }
	 

	
public function __call($function, $arguments) {
  array_push($arguments, $this->db);
  $return = call_user_func_array("mysql_".$function, $arguments);
  if(!$return) die(@mysql_error());
 }
	
// 	public function getAuthUrl() {
// 		$http_request = new HTTP_Request2();
// 		$http_request->setConfig('ssl_verify_peer', false);

// 		$consumer_request = new HTTP_OAuth_Consumer_Request();
// 		$consumer_request->accept($http_request);
// 		$this->_oauth_consumer->accept($consumer_request);

// 		session_start();

// 		$this->_oauth_consumer->getRequestToken(self::REQUEST_TOKEN_URL, "");
// 		$_SESSION['request_token'] = $this->_oauth_consumer->getToken();
// 		$_SESSION['request_token_secret'] = $this->_oauth_consumer->getTokenSecret();
// 		return $this->_oauth_consumer->getAuthorizeUrl(self::AUTHORIZE_URL);
// 	}

// 	public function getOAuthAccessToken($verifier) {
// 		session_start();
// 		$this->_oauth_consumer->setToken($_SESSION['request_token']);
// 		$this->_oauth_consumer->setTokenSecret($_SESSION['request_token_secret']);
// 		$this->_oauth_consumer->getAccessToken(self::ACCESS_TOKEN_URL, "$verifier");
// 		$_SESSION['access_token'] = $this->_oauth_consumer->getToken();
// 		$_SESSION['access_token_secret'] = $this->_oauth_consumer->getTokenSecret();
// 	}

// 	public function isFollow($screenName) {
// 		$this->_oauth_consumer->setToken($_SESSION['access_token']);
// 		$this->_oauth_consumer->setTokenSecret($_SESSION['access_token_secret']);

// 		$response = $this->_oauth_consumer->sendRequest(
// 				self::FRIENDSHIP_LOOKUP_URL, array('screen_name' => $screenName), "GET");

// 		$json = json_decode($response->getBody());
// 		return $json[0]->connections[0];
// 	}

// 	public function sendFollowRequest($screenName) {
// 		session_start();
// 		$this->_oauth_consumer->setToken($_SESSION['access_token']);
// 		$this->_oauth_consumer->setTokenSecret($_SESSION['access_token_secret']);

// 		$response = $this->_oauth_consumer->sendRequest(
// 				self::FOLLOW_CREATE_URL, array('screen_name' => $screenName, 'follow' => true), "POST");

// 		return json_decode($response->getBody());
// 	}

// 	public function postTweet($oauth_token, $oauth_secret, $twit){
// 		$this->_oauth_consumer->setToken($oauth_token);
// 		$this->_oauth_consumer->setTokenSecret($oauth_secret);

// 		#        $status = mb_convert_encoding($twit, 'UTF-8');
// 		$status = $twit;
// 		$response = $this->_oauth_consumer->sendRequest(
// 				self::STATUS_UPDATE_URL, array('status' => $status), "POST");

// 		return $response->getBody();
// 	}
}