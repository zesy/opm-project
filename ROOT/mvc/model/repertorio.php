<?php

/**
 * 
 */
class Repertorio
{
	
	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }

	function __constructor($idRepertorio, $nome, $idMusica)
	{
		$this->idRepertorio = $idRepertorio;
		$this->nome = $nome;
		$this->idMusica = $idMusica;
	}


	private $idRepertorio;
	private $nome;
	private $idMusica;

	function setIdRepertorio($idRepertorio) { $this->idRepertorio = $idRepertorio; }
	function getIdRepertorio() { return $this->idRepertorio; }

	function setNome($nome) { $this->nome = $nome; }
	function getNome() { return $this->nome; }
	
	function setIdMusica($idMusica) { $this->idMusica = $idMusica; }
	function getIdMusica() { return $this->idMusica; }

}

?>