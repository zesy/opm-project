<?php 
if(basename($_SERVER["PHP_SELF"])=='uploadArquivo.php'){
echo("<script>window.location=('../../index.php')</script>");
exit;
}


class UploadArquivo
{
	private $tipo;
	private $nome;
	private $tam;

	function __construct()
	{
		//$ code...
	}

	function uploadArqv($arq, $pasta, $tipos)
	{ 
		$arqPermitido = false;
		if(isset($arq))
		{
			$nomeOrig = $arq["name"]; 
			$nomeFinal = md5($nomeOrig . date("dmYHis"));
			$tipo = pathinfo($nomeOrig, PATHINFO_EXTENSION);
			$tam = $arq["size"];

			for($i=0;$i<count($tipos);$i++)
			{ 
				if($tipos[$i] == $tipo)
				{
					$arqPermitido=true;
				}
			}

			if($arqPermitido==false)
			{
				return $tipo;//"Extensão de arquivo não permitido!!";
				//exit;
			}

			if (move_uploaded_file($arq["tmp_name"], $pasta . $nomeFinal .'.'. $tipo))
			{ 
				$this->nome=$nomeFinal;
				$this->tipo=$tipo;
				$this->tam=number_format($arq["size"]/1024, 2) . "KB";
				return 1; 
			}else{ 
				return 2;
			} 
		}
	}

	function getTipo(){return $this->tipo;}
	function getNome(){return $this->nome;}
	function getTam(){return $this->tam;}
}
?>