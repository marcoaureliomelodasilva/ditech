<?php namespace controller;

use stdClass;

class Controller 
{ 
	public $attr;

	public function __construct()
	{

	}

	public function loadController()
	{
		$this->setGetArray($_GET) ;
	}

	public function includeContent($pathFile, $nameFile)
	{	
		if (($pathFile=='')) $pathFile='home';
		if (($nameFile=='')) $nameFile='index';
		$file = $_SERVER["DOCUMENT_ROOT"].'/content/'.$pathFile.'/'.$nameFile.'.php';
		$file = $this->converterString($file,array('-' => '_' , '//' => '/'));
		if (file_exists($file)) {
			require_once($file);
		}
	}

	public function includeStructure($pathFile='', $nameFile='index')
	{
		$file = $_SERVER["DOCUMENT_ROOT"].'/structure/'.$pathFile.'/'.$nameFile.'.php';
		$file = $this->converterString($file,array('-' => '_' , '//' => '/'));
		if (file_exists($file)) {
			require_once($file);
		}
	}

	public function set($attr, $value)
	{
		$this->{$attr} = $value;
	}

	public function get($attr)
	{
		return $this->{$attr};
	}

	public function setArray($array)
	{
		if (is_array($array)) {
			foreach ($array as $attr => $value) {
				$this->{$attr} = $value;
			}
		}		
	}

	public function setGetArray($array)
	{
		$this->get = new stdClass();
		if (is_array($array)) {
			foreach ($array as $attr => $value) {
				if ($value!='') {
					$this->get->{$attr} = $value;
				}
			}
		}
	}

	public function converterString($str,$filtro)
	{
		$result = strTr($str, $filtro);
		return $result;
	}

}
?>
