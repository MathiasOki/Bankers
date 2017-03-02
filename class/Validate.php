<?php
if(!defined('CONFIG')){
	header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
	exit();
}

class Validate{

	public function number($numb, $descimal = false){
		if($descimal === true) $filter = FILTER_VALIDATE_FLOAT;
		else $filter = FILTER_VALIDATE_INT;

		return filter_var($numb, $filter);
	}

	/****************************/
	/*	String validation start	*/
	/****************************/
	public function alphabet($str, $norwegian = false){

	}
	/****************************/
	/*	String validation end	*/
	/****************************/

	public function email($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	/************************/
	/*	UTF-8 control start	*/
	/************************/
	public function encode($str, $force = false){
		return ($this->isUtf8($str) && $force == false) ? $str : utf8_encode($str);
	}
	public function decode($str, $force = false){
		return ($this->isUtf8($str) && $force == false) ? $str : utf8_decode($str);
	}
	public function isUtf8($string){
		if (preg_match('!!u', $string)) return true;
		else return false;
	}
	/************************/
	/*	UTF-8 control end	*/
	/************************/

	public function regex($str, $regex, $output = false){
		$preg = preg_replace($regex, "", $str);
		if($output === true) return $preg;
		else return (bool)($str == $preg);
	}

	/********************/
	/*	Replacements	*/
	/********************/
	public function noSpaces($str){
		if(!empty($str)) return preg_replace("[ ]", "", $str);
		else return '';
	}
}

$val = new Validate;
?>
