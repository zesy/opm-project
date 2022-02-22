<?php

/**
 * 
 */
class Orquestra
{
	private $nome;
	private $logo;
	private $idSocial;

	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }

	function __constructor($nome, $logo, $idSocial)
	{
		$this->nome = $nome;
		$this->logo = $logo;
		$this->idSocial = $idSocial;
	}
	
	public function getNome(){return $this->nome;}
	public function setNome($nome){$this->nome = $nome;}

	public function getLogo(){return $this->logo;}
	public function setLogo($logo){$this->logo = $logo;}

	public function getIdSocial(){return $this->idSocial;}
	public function setIdSocial($idSocial){$this->idSocial = $idSocial;}
}

?>