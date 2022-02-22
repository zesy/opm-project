<?php

/**
 * 
 */
class Social
{
	private $idSocial;
	private $facebook;
	private $fbAtivo;
	private $instagram;
	private $instaAtivo;
	private $twitter;
	private $twitAtivo;
	private $youtube;
	private $ytAtivo;
	
	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }
	function __constructor($idSocial, $facebook, $fbAtivo, $instagram, $instaAtivo, $twitter, $twitAtivo, $youtube, $ytAtivo)
	{
		$this->idSocial = $idSocial;
		$this->facebook = $facebook;
		$this->fbAtivo = $fbAtivo;
		$this->instagram = $instagram;
		$this->instaAtivo = $instaAtivo;
		$this->twitter = $twitter;
		$this->twitAtivo = $twitAtivo;
		$this->youtube = $youtube;
		$this->ytAtivo = $ytAtivo;
	}

	public function getIdSocial(){return $this->idSocial;}
	public function setIdSocial($idSocial){$this->idSocial = $idSocial;}

	public function getFacebook(){return $this->facebook;}
	public function setFacebook($facebook){$this->facebook = $facebook;}

	public function getFbAtivo(){return $this->fbAtivo;}
	public function setFbAtivo($fbAtivo){$this->fbAtivo = $fbAtivo;}

	public function getInstagram(){return $this->instagram;}
	public function setInstagram($instagram){$this->instagram = $instagram;}

	public function getInstaAtivo(){return $this->instaAtivo;}
	public function setInstaAtivo($instaAtivo){$this->instaAtivo = $instaAtivo;}

	public function getTwitter(){return $this->twitter;}
	public function setTwitter($twitter){$this->twitter = $twitter;}

	public function getTwitAtivo(){return $this->twitAtivo;}
	public function setTwitAtivo($twitAtivo){$this->twitAtivo = $twitAtivo;}

	public function getYoutube(){return $this->youtube;}
	public function setYoutube($youtube){$this->youtube = $youtube;}

	public function getYtAtivo(){return $this->ytAtivo;}
	public function setYtAtivo($ytAtivo){$this->ytAtivo = $ytAtivo;}
}

?>