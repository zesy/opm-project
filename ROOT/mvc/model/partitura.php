<?php

/**
 * 
 */
class Partitura
{
	private $idPartitura;
	private $idMusica;
	private $idInstrumento;
	private $caminho;
	private $idUser;

	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }
	
	function __constructor($idPartitura, $idMusica, $idInstrumento, $caminho, $idUser)
	{
		$this->idPartitura = $idPartitura;
		$this->idMusica = $idMusica;
		$this->idInstrumento = $idInstrumento;
		$this->caminho = $caminho;
		$this->idUser = $idUser;
	}

	public function getIdPartitura(){return $this->idPartitura;}
	public function setIdPartitura($idPartitura){$this->idPartitura = $idPartitura;}

	public function getIdMusica(){return $this->idMusica;}
	public function setIdMusica($idMusica){$this->idMusica = $idMusica;}

	public function getIdInstrumento(){return $this->idInstrumento;}
	public function setIdInstrumento($idInstrumento){$this->idInstrumento = $idInstrumento;}

	public function getCaminho(){return $this->caminho;}
	public function setCaminho($caminho){$this->caminho = $caminho;}

	public function getIdUser(){return $this->idUser;}
	public function setIdUser($idUser){$this->idUser = $idUser;}
}

?>