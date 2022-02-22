<?php

/**
 * 
 */
class Ensaio
{

	private $idEnsaio;
	private $datahora;
	private $cidade;
	private $local;
	private $idVertente;
	private $idRepertorio;

	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }

	function __constructor($idEnsaio, $datahora, $cidade, $local, $idVertente, $idRepertorio)
	{
		$this->idEnsaio = $idEnsaio;
		$this->datahora = $datahora;
		$this->cidade = $cidade;
		$this->local = $local;
		$this->idVertente = $idVertente;
		$this->idRepertorio = $idRepertorio;
	}


	function setIdEnsaio($idEnsaio) { $this->idEnsaio = $idEnsaio; }
	function getIdEnsaio() { return $this->idEnsaio; }

	function setDatahora($datahora) { $this->datahora = $datahora; }
	function getDatahora() { return $this->datahora; }

	function setCidade($cidade) { $this->cidade = $cidade; }
	function getCidade() { return $this->cidade; }

	function setLocal($local) { $this->local = $local; }
	function getLocal() { return $this->local; }

	function setIdVertente($idVertente) { $this->idVertente = $idVertente; }
	function getIdVertente() { return $this->idVertente; }

	function setIdRepertorio($idRepertorio) { $this->idRepertorio = $idRepertorio; }
	function getIdRepertorio() { return $this->idRepertorio; }
}

?>