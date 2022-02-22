<?php

/**
 * 
 */
class User
{
	// function set() $this->;
	// function get() return $this->;

	private $id;
	private $user;
	private $pass;
	private $naccess;
	private $ativo;

	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }
	
	function __constructor($id, $user, $pass, $naccess, $ativo)
	{
		$this->id = $id;
		$this->user = $user;
		$this->pass = $pass;
		$this->naccess = $naccess;
		$this->ativo = $ativo;
	}

	public function setId($id) {$this->id = $id;}
	public function getId() {return $this->id;}

	public function setUser($user) {$this->user = $user;}
	public function getUser() {return $this->user;}
	
	public function setPass($pass) {$this->pass = $pass;}
	public function getPass() {return $this->pass;}

	public function setNaccess($naccess) {$this->naccess = $naccess;}
	public function getNaccess() {return $this->naccess;}

	public function setAtivo($ativo) {$this->ativo = $ativo;}
	public function getAtivo() {return $this->ativo;}

}

?>