<?php

/**
 * 
 */
class Instrumento
{
	private $idInstrumento;
	private $nome;
	private $naipe;
	private $ativo;
	private $icone;
	private $nomeExibicao;
	
	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }

	function __constructor($idInstrumento, $nome, $naipe, $ativo, $icone, $nomeExibicao)
	{
		$this->idInstrumento = $idInstrumento;
		$this->nome = $nome;
		$this->naipe = $naipe;
		$this->ativo = $ativo;
		$this->icone = $icone;
		$this->nomeExibicao = $nomeExibicao;
	}

	public function getIdInstrumento(){return $this->idInstrumento;}
	public function setIdInstrumento($idInstrumento){$this->idInstrumento = $idInstrumento;}

	public function getNome(){return $this->nome;}
	public function setNome($nome){$this->nome = $nome;}

	public function getNaipe(){return $this->naipe;}
	public function setNaipe($naipe){$this->naipe = $naipe;}

	public function getAtivo(){return $this->ativo;}
	public function setAtivo($ativo){$this->ativo = $ativo;}

	public function getIcone(){return $this->icone;}
	public function setIcone($icone){$this->icone = $icone;}

	public function getNomeExibicao(){return $this->nomeExibicao;}
	public function setNomeExibicao($nomeExibicao){$this->nomeExibicao = $nomeExibicao;}
}

?>