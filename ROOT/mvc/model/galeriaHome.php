<?php

/**
 * 
 */
class GaleriaHome
{
	private $idFoto;
	private $caminho;
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

	function __constructor($idFoto, $caminho, $ativo)
	{
		$this->idFoto = $idFoto;
		$this->caminho = $caminho;
		$this->ativo = $ativo;
	}

	public function getIdFoto(){return $this->idFoto;}
	public function setIdFoto($idFoto){$this->idFoto = $idFoto;}

	public function getCaminho(){return $this->caminho;}
	public function setCaminho($caminho){$this->caminho = $caminho;}

	public function getAtivo(){return $this->ativo;}
	public function setAtivo($ativo){$this->ativo = $ativo;}
}

?>