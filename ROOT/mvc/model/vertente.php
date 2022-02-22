<?php

/**
 * 
 */
class Vertente
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

	function __constructor($idVertente, $nome, $descricao, $descPqn, $preco, $foto, $ativo)
	{
		$this->idVertente = $idVertente;
		$this->nome = $descricao;
		$this->descricao = $descricao;
		$this->descPqn = $descPqn;
		$this->preco = $preco;
		$this->foto = $foto;
		$this->ativo = $ativo;
	}


	private $idVertente;
	private $nome;
	private $descricao;
	private $descPqn;
	private $preco;
	private $foto;
	private $ativo;

	function setIdVertente($idVertente) { $this->idVertente = $idVertente; }
	function getIdVertente() { return $this->idVertente; }

	function setNome($nome) { $this->nome = $nome; }
	function getNome() { return $this->nome; }

	function setDescricao($descricao) { $this->descricao = $descricao; }
	function getDescricao() { return $this->descricao; }

	function setDescPqn($descPqn) { $this->descPqn = $descPqn; }
	function getDescPqn() { return $this->descPqn; }

	function setPreco($preco) { $this->preco = $preco; }
	function getPreco() { return $this->preco; }
	
	function setFoto($foto) { $this->foto = $foto; }
	function getFoto() { return $this->foto; }

	function setAtivo($ativo) { $this->ativo = $ativo; }
	function getAtivo() { return $this->ativo; }
}

?>