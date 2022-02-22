<?php
/**
 * 
 */
class Membro
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

	function __constructor($id, $nome, $snome, $email, $tel, $cidade, $logradouro, $bairro, $numero, $cep, $estado, $idCargo, $idUser, $idSocial, $idInstrumento, $idVertente, $fotoPerfil, $freelancer, $visivel, $nivelAfinidade, $ativo)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->snome = $snome;
		$this->email = $email;
		$this->tel = $tel;
		$this->cidade = $cidade;
		$this->logradouro = $logradouro;
		$this->bairro = $bairro;
		$this->numero = $numero;
		$this->cep = $cep;
		$this->estado = $estado;
		$this->idCargo = $idCargo;
		$this->idUser = $idUser;
		$this->idSocial = $idSocial;
		$this->idInstrumento = $idInstrumento;
		$this->idVertente = $idVertente;
		$this->fotoPerfil = $fotoPerfil;
		$this->freelancer = $freelancer;
		$this->visivel = $visivel;
		$this->nivelAfinidade = $nivelAfinidade;
		$this->ativo = $ativo;
	}

	private $id;
	private $nome;
	private $snome;
	private $email;
	private $tel;
	private $cidade;
	private $logradouro;
	private $bairro;
	private $numero;
	private $cep;
	private $estado;
	private $idCargo;
	private $idUser;
	private $idSocial;
	private $idInstrumento;
	private $idVertente;
	private $fotoPerfil;
	private $freelancer;
	private $visivel;
	private $nivelAfinidade;
	private $ativo;

	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}

	public function getNome(){return $this->nome;}
	public function setNome($nome){$this->nome = $nome;}

	public function getSnome(){return $this->snome;}
	public function setSnome($snome){$this->snome = $snome;}

	public function getEmail(){return $this->email;}
	public function setEmail($email){$this->email = $email;}

	public function getTel(){return $this->tel;}
	public function setTel($tel){$this->tel = $tel;}

	public function getCidade(){return $this->cidade;}
	public function setCidade($cidade){$this->cidade = $cidade;}

	public function getLogradouro(){return $this->logradouro;}
	public function setLogradouro($logradouro){$this->logradouro = $logradouro;}

	public function getBairro(){return $this->bairro;}
	public function setBairro($bairro){$this->bairro = $bairro;}

	public function getNumero(){return $this->numero;}
	public function setNumero($numero){$this->numero = $numero;}

	public function getCep(){return $this->cep;}
	public function setCep($cep){$this->cep = $cep;}

	public function getEstado(){return $this->estado;}
	public function setEstado($estado){$this->estado = $estado;}

	public function getIdCargo(){return $this->idCargo;}
	public function setIdCargo($idCargo){$this->idCargo = $idCargo;}

	public function getIdUser(){return $this->idUser;}
	public function setIdUser($idUser){$this->idUser = $idUser;}

	public function getIdSocial(){return $this->idSocial;}
	public function setIdSocial($idSocial){$this->idSocial = $idSocial;}

	public function getIdInstrumento(){return $this->idInstrumento;}
	public function setIdInstrumento($idInstrumento){$this->idInstrumento = $idInstrumento;}

	public function getIdVertente(){return $this->idVertente;}
	public function setIdVertente($idVertente){$this->idVertente = $idVertente;}

	public function getFotoPerfil(){return $this->fotoPerfil;}
	public function setFotoPerfil($fotoPerfil){$this->fotoPerfil = $fotoPerfil;}

	public function getFreelancer(){return $this->freelancer;}
	public function setFreelancer($freelancer){$this->freelancer = $freelancer;}

	public function getVisivel(){return $this->visivel;}
	public function setVisivel($visivel){$this->visivel = $visivel;}

	public function getNivelAfinidade(){return $this->nivelAfinidade;}
	public function setNivelAfinidade($nivelAfinidade){$this->nivelAfinidade = $nivelAfinidade;}

	public function getAtivo(){return $this->ativo;}
	public function setAtivo($ativo){$this->ativo = $ativo;}
}
?>