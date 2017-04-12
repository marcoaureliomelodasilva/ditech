<?php
class AutoLoader{

	public  $_fileExtension = '.php';
	public  $_namespace;
	public  $_includePath;
	public  $_namespaceSeparator = '\\';

	public function __construct($namespace = null, $includePath = null){
		$this->_namespace = $namespace;
		$this->_includePath = $includePath;		
		spl_autoload_register(array($this, 'loader'));
	}

	public function setNamespaceSeparator($sep){
		$this->_namespaceSeparator = $sep;
	}

	public function getNamespaceSeparator(){
		return $this->_namespaceSeparator;
	}

	public function setIncludePath($includePath){
		$this->_includePath = $includePath;
	}

	public function getIncludePath(){
		return $this->_includePath;
	}

	public function setFileExtension($fileExtension){
		$this->_fileExtension = $fileExtension;
	}

	public function getFileExtension(){
		return $this->_fileExtension;
	}

	public function register(){
		spl_autoload_register(array($this, 'loader'));
	}

	public function unregister(){
		spl_autoload_unregister(array($this, 'loader'));
	}

	public function loader($className){
	    $className = ltrim($className, '\\');
	    $fileName  = '';
	    $namespace = '';
	    if ($lastNsPos = strrpos($className, '\\')) {
	        $namespace = substr($className, 0, $lastNsPos);
	        $className = substr($className, $lastNsPos + 1);
	        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	    }
	    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
		require_once($fileName);
	}	

	public function verificaIncludeAutoLoader(){
		return 'AutoLoader:true';
	} 

}
?>