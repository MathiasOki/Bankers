<?php
if(!defined('CONFIG')){
	header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
	exit();
}

/*
 * This database class is only made for one database connection
 *
 * Last updated 29.03.2016 by Mathias Tollerud
 *
 *	- Updated escape() to accept arrays
 *	- Fixed IF null error in insert and update
 *  - Added escapeArray
 */

class Database{

	private $host, $user, $pass, $name, $prefix, $type, $listing;
	public static $settings = array('utf8' => false);
	private static $availableTypes = array(
		'object',
		'assoc',
		'row',
		'array'
	);
	private static $defaults = array(
		'type' => 'object'
	);
	private $options = array();
	private static $raw_queries = array();

    private static $instance;

    public static function init(){
		if(self::$instance == NULL){
			$className = __CLASS__;
			self::$instance = new $className();
		}
		return self::$instance;
    }

	private function __construct(){
	}

	public function connect($db, $user = NULL, $pass = NULL, $name = NULL, $prefix = NULL, $type = NULL, $list = false){
		if(is_array($db)){
			$this->putSettings($db['host'], $db['user'], $db['pass'], $db['name'], $db['prefix'], $db['list']);
			$this->setType($db['type']);
		}
		else{
			$this->putSettings($db, $user, $pass, $name, $prefix, $list);
			$this->setType($type);
		}
	}

	public function setType($type){
		$this->type = self::checkType($type);
		self::$defaults = $this->type;
	}

	public function setSettings($name, $value){
		self::$settings[$name] = $value;
	}

	private function putSettings($host, $user, $pass, $name, $prefix, $list){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->name = $name;
		$this->prefix = $prefix;
		$this->listing = $list;

		if(!function_exists('mysqli_connect')) self::kill('Missing Mysqli addon. Please install Mysqli to continue');
		$this->_connection = @mysqli_connect($this->host, $this->user, $this->pass, $this->name) or die(self::kill("Could not connect to database"));
	}

	public function escape($value){
		if(is_array($value)) return $this->escapeArray($value);
		else return @mysqli_real_escape_string($this->_connection, $value);
	}

	public function escapeArray($value){
		if(is_array($value)){
			foreach($value as $a=>$b){

				if(is_array($b)) $value[$a] = $this->escapeArray($b);
				else $value[$a] = $this->escape($b);
			}
		}
		return $value;
	}

	public function query($raw_query, $type = false){
		array_push(self::$raw_queries, $raw_query);

		$raw_query = self::utf8($raw_query, true, true);
		if(empty($type)) $type = $this->type;
		else $type = self::checkType($type);

		return new Query($raw_query, $type, $this->_connection);
	}

	public function insert($table, $value = NULL, $kill = true){
		if(!is_array($value)) self::kill('Second parameter has to be array with field => value');
		$rows = array();
		$values = array();

		if(isset($value[0])){
			foreach($value as $a=>$b){
				foreach($b as $c=>$d){
					if(!in_array("`".$c."`", $rows)) $rows[] = "`".$c."`";
					if(is_null($d)) $values[$a][] = "NULL";
					else $values[$a][] = "'".self::utf8($d, true, true)."'";
				}
			}
			$valuesPart = "";
			foreach($values as $a){
				if(!empty($valuesPart)) $valuesPart .= ", ";
				$valuesPart .= "(".implode(", ", $a).")";
			}
			$sql = "INSERT INTO `".$this->prefix.$table."` (".implode(", ", $rows).") VALUES $valuesPart";

		}
		else{
			foreach($value as $a=>$b){
				$rows[] = "`".$a."`";
				if(is_null($b)) $values[] = "NULL";
				else $values[] = "'".self::utf8($b, true, true)."'";
			}

			$sql = "INSERT INTO `".$this->prefix.$table."` (".implode(", ", $rows).") VALUES (".implode(", ", $values).")";
		}
		array_push(self::$raw_queries, $sql);

		if($kill == true) return @mysqli_query($this->_connection, $sql) or die(self::kill(mysqli_error($this->_connection)));
		else return @mysqli_query($this->_connection, $sql);
	}

	public function delete($table, $where = false, $limit = false){
		$sql = "DELETE FROM `".$this->prefix.$table."`".((!empty($where))? " WHERE ".$where : "").((!empty($limit))? " LIMIT ".$limit : "");
		array_push(self::$raw_queries, $sql);

		@mysqli_query($this->_connection, $sql) or die(self::kill(mysqli_error($this->_connection)));

		return @mysqli_affected_rows($this->_connection);
	}

	public function update($table, $updates, $where = false, $limit = false, $kill = true){
		if(!is_array($updates)) self::kill('Second parameter has to be array with field => value');

		$update = array();
		foreach($updates as $a=>$b){
			if(!empty($b[0]) && $b[0] === "+" && is_int((int)substr($b, 1, strlen($b)-1))){
				$number = (int)substr($b, 1, strlen($b)-1);
				$update[] = "`".$a."` = ".$a."+".$number;
			}
			elseif(!empty($b[0]) && $b[0] === "-" && is_int((int)substr($b, 1, strlen($b)-1))){
				$number = (int)substr($b, 1, strlen($b)-1);
				$update[] = "`".$a."` = ".$a."-".$number;
			}
			else{
				if(is_null($b)) $update[] = "`".$a."` = NULL";
				else $update[] = "`".$a."` = '".self::utf8($b, true, true)."'";
			}
		}

		$sql = "UPDATE `".$this->prefix.$table."` SET ".implode(",", $update).((!empty($where))? " WHERE ".$where : "").((!empty($limit))? " LIMIT ".$limit : "");
		array_push(self::$raw_queries, $sql);

		if($kill == true) @mysqli_query($this->_connection, $sql) or die(self::kill(mysqli_error($this->_connection)));
		else @mysqli_query($this->_connection, $sql);

		return @mysqli_affected_rows($this->_connection);
	}

	public function last_id(){
		return @mysqli_insert_id($this->_connection);
	}

	public function __toString(){
		echo('Access denied');
		return '';
	}

	public function __destruct(){
		global $conf;
		if($this->listing == true && $conf['json'] != true && !in_array('Content-Type: application/json', headers_list())){
			self::list_queries();
		}
		$this->close();
	}

	public function close(){
		if(self::$instance == true){
			@mysqli_close($this->_connection);
			self::$instance = NULL;
		}
	}

	static function checkType($type){
		if(in_array((string)$type, self::$availableTypes)) return $type;
		else return self::$defaults['type'];
	}

	static function list_queries(){
		self::kill(self::$raw_queries, false);
	}

	static function kill($text, $kill = true){
		if(in_array('Content-Type: application/json', headers_list())) $json = true;
		else $json = false;

		if($json == true){
			if(!is_array($text)) echo json_encode(array('output' => $text));
			else echo json_encode($text);
		}
		else{
			echo '<pre>';
			if(is_array($text)) print_r($text);
			else echo $text;
			echo '</pre>';
		}
		if($kill == true) exit();
	}

	static function utf8($values, $reverse = false, $force = false){
		global $val;
		if(!empty($values) && self::$settings['utf8'] == true){
			if(gettype($values) != "object" && gettype($values) != "array"){
				$values = ($reverse == true)?$val->decode($values, $force):$val->encode($values, $force);
			}
			else{
				foreach($values as &$a){
					$a = ($reverse == true)?$val->decode($a, $force):$val->encode($a, $force);
				}
			}
		}
		return $values;
	}

}

class Query{
	private $rows, $type, $connection, $query, $raw;

	public function __construct($query, $type, $connection){
		$this->raw = $query;
		$this->type = $type;
		$this->connection = $connection;

		$this->query = @mysqli_query($this->connection, $this->raw) or die(Database::kill(mysqli_error($this->connection)));
		$this->rows = @mysqli_num_rows($this->query);

		return $this->query;
	}

	public function __toString(){
		$output = array('rows' => $this->rows, 'type' => $this->type, 'query' => $this->raw);

		Database::kill($output, false);
		return '';
	}

	public function rows(){
		return $this->rows;
	}

	public function fetch($type = false){
		if(empty($type)) $type = $this->type;
		else $type = Database::checkType($type);

		$type = "_".$type;
		return $this->$type();
	}

	public function fetchAll($type = false){
		if(empty($type)) $type = $this->type;
		else $type = Database::checkType($type);

		$type = "_".$type;

		$output = array();
		while($a = $this->$type()){
			$output[] = $a;
		}
		return $output;
	}

	private function _object(){
		return Database::utf8(@mysqli_fetch_object($this->query));
	}
	private function _assoc(){
		return Database::utf8(@mysqli_fetch_assoc($this->query));
	}
	private function _array(){
		return Database::utf8(@mysqli_fetch_array($this->query));
	}
	private function _row(){
		return Database::utf8(@mysqli_fetch_row($this->query));
	}

}
?>
