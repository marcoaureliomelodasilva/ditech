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

	public function setPostArray($array)
	{
		$this->post = new stdClass();
		$this->post->action='';
		if (is_array($array)) {
			foreach ($array as $attr => $value) {
				$attr = $this->converterString($attr,array('-' => '_'));
				if ($value!='') {
					$this->post->{$attr} = $value;
				}
			}
		}
	}

	public function converterString($str,$filtro)
	{
		$result = strTr($str, $filtro);
		return $result;
	}

	public function boolResult($bool,$true,$false)
	{
		return ($bool==true) ? $true : $false ;
	}

	public function headerLocation($destino, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	    	header('Location: ' . $destino, true, ($permanent === true) ? 301 : 302);
	    }else{
			echo '<script type="text/javascript">window.location.href = "'.$destino.'"</script>';
	    }
	}

}
?>
