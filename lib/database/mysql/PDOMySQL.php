<?php namespace lib\database\mysql;
use \PDO as PDO;
class PDOMySQL{
		
	public $conn;
	private $dbname;    
	private $host;      
	private $user;
	private $password;
	private $port;
	private $configDb;

	public function __construct($string_conn='') {
		$this->defineDataBase('desenv', 'agenda');	
	}

    public function defineDataBase($ambiente='desenv', $dbname='default'){	
    	$this->defineAmbiente = $ambiente;
		$this->defineDbname = $dbname;

		$fileConfig = '../lib/database/mysql/config.php';
		if (file_exists($fileConfig)) {
			$jsonConfig = file_get_contents($fileConfig);
			$jsonConfig = json_decode($jsonConfig, true);
		}

		$this->configDb=$jsonConfig[$this->defineAmbiente][$this->defineDbname];
		$this->host     = $this->configDb['host'];
		$this->port     = $this->configDb['port'];
		$this->dbname   = $this->configDb['dbname'];
		$this->user     = $this->configDb['user'];
		$this->password = $this->configDb['password'];
		//$this->attr = $this->configDb[$banco][$ambiente]['attr'];

	    try {
			$string_conn="mysql:dbname=$this->dbname;host=$this->host;port=$this->port;user=$this->user;
			password=$this->password;";
	        $this->conn=new PDO($string_conn, $this->user, $this->password);
			$this->constantes();
	    } catch(PDOException $e) {
	        die("Erro: <code>" . $e->getMessage() . "</code>");
	    } 
	}

    /*Evita que a classe seja clonada*/
    private function __clone(){}

    /*Método que destroi a conexão com banco de dados e remove da memória todas as variáveis setadas*/
    public function __destruct() {
        $this->disconnect();
        foreach ($this as $key => $value) {
            unset($this->$key);
        }
    }

    private function disconnect(){
        $this->conn = null;
    }

	function constantes() {

		//PDO::setAttribute ( int $attribute , mixed $value )

		@define(PARAM_BOOL, PDO::PARAM_BOOL);
		@define(PARAM_NULL, PDO::PARAM_NULL);
		@define(PARAM_INT, PDO::PARAM_INT);
		@define(PARAM_STR, PDO::PARAM_STR);
		@define(PARAM_LOB, PDO::PARAM_LOB);
		@define(PARAM_STMT, PDO::PARAM_STMT);
		@define(PARAM_INPUT_OUTPUT, PDO::PARAM_INPUT_OUTPUT);

		//PDO::setAttribute ( int $attribute , mixed $value )
		@define(FETCH_ASSOC, PDO::FETCH_ASSOC);
		@define(FETCH_NUM, PDO::FETCH_NUM);
		@define(FETCH_BOTH, PDO::FETCH_BOTH);
		@define(FETCH_OBJ, PDO::FETCH_OBJ);
		@define(FETCH_LAZY, PDO::FETCH_LAZY);
		@define(FETCH_BOUND, PDO::FETCH_BOUND);
		
		//PDO::setAttribute ( int $attribute , mixed $value )
		@define(ATTR_CASE, PDO::ATTR_CASE);
			@define(ATTR_CASE, PDO::CASE_LOWER);
			@define(ATTR_CASE, PDO::CASE_NATURAL);
			@define(ATTR_CASE, PDO::CASE_UPPER);
		@define(ATTR_ERRMODE, PDO::ATTR_ERRMODE);
			@define(ERRMODE_SILENT, PDO::ERRMODE_SILENT);
			@define(ERRMODE_WARNING, PDO::ERRMODE_WARNING);
			@define(ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION);
			
		@define(ATTR_STRINGIFY_FETCHES, PDO::ATTR_STRINGIFY_FETCHES);
		@define(ATTR_STATEMENT_CLASS, PDO::ATTR_STATEMENT_CLASS);
		@define(ATTR_TIMEOUT, PDO::ATTR_TIMEOUT);
		@define(ATTR_AUTOCOMMIT , PDO::ATTR_AUTOCOMMIT );
		@define(ATTR_EMULATE_PREPARES , PDO::ATTR_EMULATE_PREPARES );
		@define(ATTR_AUTOCOMMIT , PDO::ATTR_AUTOCOMMIT );
		@define(ATTR_DEFAULT_FETCH_MODE , PDO::ATTR_DEFAULT_FETCH_MODE );
		
		@define(ATTR_SERVER_VERSION, PDO::ATTR_SERVER_VERSION);
		@define(ATTR_CLIENT_VERSION, PDO::ATTR_CLIENT_VERSION);
		@define(ATTR_SERVER_INFO, PDO::ATTR_SERVER_INFO);
		@define(ATTR_PERSISTENT, PDO::ATTR_PERSISTENT);
		
	}
}
?>