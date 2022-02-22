<?php

/**
 * 
 */
class Apresentacao
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

	function __constructor($idApresentacao, $datahora, $cidade, $estado, $endereco, $numero, $local, $idVertente, $idRepertorio)
	{
		$this->idApresentacao = $idApresentacao;
		$this->datahora = $datahora;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->endereco = $endereco;
		$this->numero = $numero;
		$this->local = $local;
		$this->idVertente = $idVertente;
		$this->idRepertorio = $idRepertorio;
	}

	private $idApresentacao;
	private $datahora;
	private $cidade;
	private $estado;
	private $endereco;
	private $numero;
	private $local;
	private $idVertente;
	private $idRepertorio;

	function setIdApresentacao($idApresentacao) { $this->idApresentacao = $idApresentacao; }
	function getIdApresentacao() { return $this->idApresentacao; }

	function setDatahora($datahora) { $this->datahora = $datahora; }
	function getDatahora() { return $this->datahora; }

	function setCidade($cidade) { $this->cidade = $cidade; }
	function getCidade() { return $this->cidade; }

	function setEstado($estado) { $this->estado = $estado; }
	function getEstado() { return $this->estado; }

	function setEndereco($endereco) { $this->endereco = $endereco; }
	function getEndereco() { return $this->endereco; }

	function setNumero($numero) { $this->numero = $numero; }
	function getNumero() { return $this->numero; }

	function setLocal($local) { $this->local = $local; }
	function getLocal() { return $this->local; }

	function setIdVertente($idVertente) { $this->idVertente = $idVertente; }
	function getIdVertente() { return $this->idVertente; }

	function setIdRepertorio($idRepertorio) { $this->idRepertorio = $idRepertorio; }
	function getIdRepertorio() { return $this->idRepertorio; }

}

?>