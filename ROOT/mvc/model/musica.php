<?php
	/**
	 * 
	 */
	class Musica
	{
		
		function __construct()
		{
			$args = func_get_args();
        	$numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
		}

		function __constructor($id, $nome, $autor){
			$this->idMusica = $id;
			$this->nome = $nome;
			$this->autor = $autor;

		}

		private $idMusica;
		private $nome;
		private $autor;

		function setIdMusica($idMusica) { $this->idMusica = $idMusica; }
		function getIdMusica() { return $this->idMusica; }
		function setNome($nome) { $this->nome = $nome; }
		function getNome() { return $this->nome; }
		function setAutor($autor) { $this->autor = $autor; }
		function getAutor() { return $this->autor; }

	}
?>