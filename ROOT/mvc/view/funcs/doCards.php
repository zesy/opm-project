<?php
/**
 * 
 */
class doCards 
{

	//////////////////////************* INSTRUMENTOS *************////////////////////////
	//ROW PARA TABELA DE INSTRUMENTOS CADASTRADOS 
	static function doInstruRow(){
		include_once(DIR_RAIZ.'/mvc/controller/instrumento_dao.php');
		$table = "'instrumento'";
		$instrudao = new InstrumentoDAO();
		$row = $instrudao->selectAllInstrumento();
        if($row == false || $row == null)
        	echo '<tr></tr>';
        else
	        foreach ($row as $r) {
	        	echo '<tr>';
		        if($r['ativo'] == 1){
		        	echo '<td><i class="fas fa-check-circle text-success" data-toggle="tooltip" data-placement="top" title="Ativo"></i></td>';
		        	$tta = "Desativar";
		        	$txtc = "btn-secondary";
		        }
		    	else{
		    		echo '<td><i class="fas fa-minus-circle text-secondary" data-toggle="tooltip" data-placement="top" title="Inativo"></i></td>';
		    		$tta = "Ativar";
		    		$txtc = "btn-success";
		    	}
		    	
	        	echo '<td>';
				doCards::doInstruDiv($r['nomeExibicao'],$r['icone']);
	        	echo '</td><td>'.$r["nome"].'</td>';
	        	echo '<td><button class="btn btn-sm '.$txtc.' btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="'.$tta.' Instrumento" onclick="confirmUpdate('.$r["idInstrumento"].', '.$table.')"><i class="fas fa-retweet"></i></button></td>';
	        	echo '<td><button class="btn btn-sm btn-danger btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="confirmDel('.$r["idInstrumento"].', '.$table.')"><i class="fas fa-trash-alt"></i></button></td>';
		        echo '</tr>';
	    	}
	}

	//ÍCONE DO INSTRUMENTO
	static function doInstruDiv($name, $icon){
		echo '<div class="btn-instru" data-toggle="tooltip" data-placement="top" title="'.$name.'"><span style="display: none;">'.$name.'</span>
			<img src="'.IMG_INSTRU.$icon.'">
			</div>';
			//echo DIR_RAIZ.IMG_INSTRU.$icon;
		//}
	}

	//LISTA DE INSTRUMENTO DO MEMBRO
	static function doMembroInstruListDiv($instrus){
		include_once(DIR_RAIZ.'/mvc/controller/instrumento_dao.php');
		$instrudao = new InstrumentoDAO();
		$vinstru = explode(';', $instrus);
		foreach ($vinstru as $i) {
			$instru = $instrudao->selectInstrumentoAtv($i);
			if ($instru != false)
				doCards::doInstruDiv($instru->getNomeExibicao(),$instru->getIcone());
		}
	}
	//////////////////////************* FIM-CARGOS *************////////////////////////

	//////////////////////************* CARGOS *************//////////////////////// 
	//TABELA DOS CARGOS CADASTRADOS
	static function doCargoRow($id, $nome){
		$table = "'cargo'";
		echo '<tr><td>'.$nome.'</td><td>';
		echo '<button class="btn btn-sm btn-danger btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="confirmDel('.$id.', '.$table.')"><i class="fas fa-trash-alt"></i></button></td></tr>';
	}

	static function doCargoOption($id, $nome, $mc){
		$selec = ($id == $mc) ? 'selected' : '';
		echo '<option value="'.$id.'" '.$selec.'>'.$nome.'</option>';
		//echo $id." ".$nome;
	}
	//////////////////////************* FIM-CARGOS *************////////////////////////

	//////////////////////************* MEMBROS *************////////////////////////
	//ROW PARA TABELA DE MEMBROS CADASTRADOS
	static function doMemberRow($idMembro, $nome, $snome, $instru, $atv, $vis){
		//<!-- NOME -->
		if($vis ==1 ){
			$icovis = '<i class="fas fa-eye text-primary" data-toggle="tooltip" data-placement="top" title="Visível"></i>';
		}
		else{
			$icovis = '<i class="fas fa-eye-slash text-secondary" data-toggle="tooltip" data-placement="top" title="Não Visível"></i>';
		}
		if($atv == 1){
        	$ico = '<i class="fas fa-check-circle text-success" data-toggle="tooltip" data-placement="top" title="Ativo"></i>';
        }
    	else{
    		$ico = '<i class="fas fa-minus-circle text-secondary" data-toggle="tooltip" data-placement="top" title="Inativo"></i>';
    		$icovis = '<i class="fas fa-eye-slash text-secondary" data-toggle="tooltip" data-placement="top" title="Não Visível"></i>';
    	}

		echo '<tr><td>'.$ico.' '.$icovis.' '.$nome.' '.$snome.'</td><td class="row">';
		if (!is_null($instru)) {
			doCards::doMembroInstruListDiv($instru);
		}
		
		echo '</td><td><a href="editamembro.php?idMembro='.$idMembro.'"><button nameid="'.$idMembro.'" class="btn btn-sm btn-success bordersquared greenShadow" data-toggle="tooltip" data-placement="top" title="Ir para cadastro"><i class="fas fa-chevron-circle-right"></i></button></a>';
		echo '</td></tr>';
	}
	static function doMemberCard($row){
		include_once(DIR_RAIZ.'/mvc/controller/cargo_dao.php');
		echo '<div class="column"><div class="cards"><div class="avatarc">';
		//img
		$foto_perfil = $row["fotoPerfil"];
		echo '<img class="avatarimgc" src="img/perfil_users/'.$foto_perfil.'?v='.filemtime('img/perfil_users/'.$foto_perfil).'" alt="'.$row["nome"].'" />';
		//nome
		echo '<div class="avatarname">'.$row["nome"].'</div>';

		echo '</div><div class="container">';

		//cargo
		$cargodao = new CargoDAO();
		$cargo = $cargodao->selectCargoRow($row['idCargo']);
		echo '<span class="cargo">'.$cargo["nome"].'</span>';

		echo '<hr class="separator2"/><div class="row">';
		doCards::doMembroInstruListDiv($row["idInstrumento"]);
		echo '</div>';

		echo '<div class="social-btn btn-group">';
		//AQUI VAI O SOCIAL
		$link_fb = "'https://www.facebook.com/'";
		doCards::doMembroSocialButton($row["idSocial"]);
		echo '</div></div></div></div>';
	}

	static function doMembroSocialButton($id){
		include_once(DIR_RAIZ."/mvc/controller/social_dao.php");
		include_once(DIR_RAIZ."/mvc/model/social.php");
		$socialdao = new SocialDAO();
		$social = $socialdao->selectSocial($id);
		
		if($social->getFbAtivo() == 1)
			echo '<button class="facebook" onClick="openLink(true, \'https://www.facebook.com'.$social->getFacebook().'\')"><i class="fab fa-facebook-f"></i></button>';

		if($social->getInstaAtivo() == 1)
			echo '<button class="instagram" onClick="openLink(true, \'https://www.instagram.com'.$social->getInstagram().'\')"><i class="fab fa-instagram"></i></button>';
		if($social->getTwitAtivo() == 1)
			echo '<button class="twitter" onClick="openLink(true, \'https://www.twitter.com'.$social->getTwitter().'\')"><i class="fab fa-twitter"></i></button>';
		if($social->getYtAtivo() == 1)
			echo '<button class="youtube" onClick="openLink(true, \'https://www.youtube.com'.$social->getYoutube().'\')"><i class="fab fa-youtube"></i></button>';
	}
	//////////////////////************* FIM-MEMBROS *************////////////////////////

	//////////////////////************* VERTENTES *************////////////////////////
	static function doMemberVert($user){
		include_once(DIR_RAIZ."/mvc/controller/membro_dao.php");
		$membrodao = new MembroDAO();
		$membro_vert = $membrodao->selectVertMembroByUser($user);
		$verts = array('');
		if($membro_vert != false && !is_null($membro_vert)){
			$verts = explode(';', $membro_vert);
		}
		include_once(DIR_RAIZ."/mvc/controller/vertente_dao.php");
		$vertdao = new VertenteDAO();
		$vert = $vertdao->selectAllAtvVertente();

		if ($vert != false && !is_null($vert)) {
			foreach ($vert as $v) {
				$check = '';
				if(in_array($v["idVertente"], $verts))
					$check = 'checked="true"';
				
				echo '<li class="dropdown-item">';
            		echo '<input class="form-check-input" type="checkbox" value="'.$v["idVertente"].'" id="'.$v["idVertente"].'" name="vertente[]" '.$check.'>';
            		echo '<label class="form-check-label" for="'.$v["idVertente"].'">'.$v["nome"].'</label>';
          		echo '</li>';
			}
		}
	}
	static function doVertRow(){
		include_once(DIR_RAIZ.'/mvc/controller/vertente_dao.php');
		$table = "'vertente'";
		$vertdao = new VertenteDAO();
		$row = $vertdao->selectAllVertente();
		if($row!=false && !is_null($row)){
		foreach ($row as $r) {
			if($r['ativo'] == 1){
	        	echo '<tr><td><i class="fas fa-check-circle text-success" data-toggle="tooltip" data-placement="top" title="Ativo"></i></td>';
	        	$vta = "Desativar";
	        	$txtv = "btn-secondary";
	        }
	    	else{
	    		echo '<tr><td><i class="fas fa-minus-circle text-secondary" data-toggle="tooltip" data-placement="top" title="Inativo"></i></td>';
	    		$vta = "Ativar";
	    		$txtv = "btn-success";
	    	}

			echo '<td>'.$r['nome'].'</td>';

	         echo '<td><button class="btn btn-sm '.$txtv.' btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="'.$vta.'" onclick="confirmUpdate('.$r["idVertente"].', '.$table.')"><i class="fas fa-retweet"></i></button></td>';

	          echo '<td><a href="editavertente.php?id='.$r["idVertente"].'"><button class="btn btn-sm btn-primary btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></button></a></td>';

	          echo '<td><button class="btn btn-sm btn-danger btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="confirmDel('.$r["idVertente"].', '.$table.')"><i class="fas fa-trash-alt"></i></button></td>';
	        echo '</tr>';	
		}
	}
	}

	static function doVertOp(){
		include_once(DIR_RAIZ."/mvc/controller/vertente_dao.php");
		$vertsdao = new VertenteDAO();
		$vert = $vertsdao->selectAllAtvVertente();

		if ($vert != false && !is_null($vert)) {
			foreach ($vert as $v) {
				echo '<li class="dropdown-item">';
            		echo '<input class="form-check-input" type="checkbox" value="'.$v["idVertente"].'" id="'.$v["idVertente"].'" name="vertente[]">';
            		echo '<label class="form-check-label" for="'.$v["idVertente"].'">'.$v["nome"].'</label>';
          		echo '</li>';
			}
		}
	}

	static function doVertCard(){
		include_once(DIR_RAIZ.'/mvc/controller/vertente_dao.php');
		$vertdao = new VertenteDAO();
		$vert = $vertdao->selectAllAtvVertente();

		if($vert == false){
			echo '';
		}
		else{
			foreach ($vert as $v) {
			echo '<div class="column2">
	    			<div class="media doGreenBorder">';
	      				echo '<div style="height: 150px; max-width: 40%;" class="media"><img class="avatar align-self-center" src="img/vert_img/'.$v["foto"].'?v='.filemtime("img/vert_img/".$v["foto"]).' alt="'.$v["nome"].'" /></div>';
	     		  echo '<div class="media-body">';
	          		echo '<h4>'.$v["nome"].'</h4>';
	          		echo '<p>'.$v["descPqn"].'</p>
	      				</div>';
	          echo '</div>
	    			<button class="bg-btn-green bordersquared btn-detalhes" onClick="openLink(false, \'vertentes.php#vert'.$v["idVertente"].'\')"><i class="fa fa-arrow-right"></i> Saiba mais</button>
				  </div>';
		}
// 		echo '<div class="column2">
//     <div class="cards2">
//       <div class="avatarcard">';
//       	echo '<img class="avatar" src="img/vert_img/'.$v["foto"].'?v='.filemtime("img/vert_img/".$v["foto"]).' alt="'.$v["nome"].'" />';
//       echo '</div>
//       <div class="container2">';
//         echo '<h4>'.$v["nome"].'</h4>';
//         echo '<p>'.$v["descPqn"].'</p>
//       </div>';
//         echo '<button class="bg-btn-green bordersquared btn-detalhes btn-shadow" onClick="openLink(false, \'vertentes.php#vert'.$v["idVertente"].'\')"><i class="fa fa-arrow-right"></i> Saiba mais</button>
//     </div>
// </div>';
		}
	}

	static function doVertCols(){
		include_once(DIR_RAIZ.'/mvc/controller/vertente_dao.php');
		$vertdao = new VertenteDAO();
		$vert = $vertdao->selectAllAtvVertente();

		if($vert == false)
			echo '';
		else
			foreach ($vert as $v) {
				echo '<div id="vert'.$v["idVertente"].'" class="col-md-12 padding20px media doGreenBorder padding20px mb-3">';
					echo '<img class="align-self-start mr-3" src="img/vert_img/'.$v["foto"].'?v='.filemtime("img/vert_img/".$v["foto"]).'" alt="'.$v["nome"].'" />';

					echo '<div class="media-body">';
						echo '<h4>'.$v["nome"].'</h4>';
						echo '<h6 class="text-success">R$ '.number_format($v["preco"], 2, ',', '.').'</h6>';
						echo '<p>'.nl2br($v["descricao"]).'</p>';
					echo '</div>';
					echo '<button class="btn btn-success align-self-start">Contato</button>';
				echo '</div>';
			}
	}
	//////////////////////************* FIM-VERTENTES *************////////////////////////


	//////////////////////************* PARTITURAS *************////////////////////////
	static function doPartituraRows(){
		include_once(DIR_RAIZ."/mvc/controller/partitura_dao.php");
		include_once(DIR_RAIZ."/mvc/controller/musica_dao.php");
		include_once(DIR_RAIZ."/mvc/controller/instrumento_dao.php");
		include_once(DIR_RAIZ."/mvc/model/musica.php");
		$partdao = new PartituraDAO();
		$musicadao = new MusicaDAO();
		$instrudao = new InstrumentoDAO();
		$partit = $partdao->selectAllPartitura();
		$table = "'partitura'";
		if($partit != false)
		foreach ($partit as $p) {
			$music = $musicadao->selectMusica($p["idMusica"]);
			$instru = $instrudao->selectInstrumento($p["idInstrumento"]);
			
			echo '<tr>';
				echo '<td>'.$music->getNome().'</td>';
				echo '<td>'.$music->getAutor().'</td>';
				echo '<td>';
					echo '<span style="display: none;">'.$instru->getNome().'</span>';
					doCards::doInstruDiv($instru->getNomeExibicao(), $instru->getIcone());
				echo '</td>';
				echo '<td><a href="../../partituras/'.$p["caminho"].'" download><button type="button" class="btn btn-success btn-sm bordersquared greenShadow"><i class="fas fa-download"></i></button></a></td>';
				echo '<td>';
				if ($_SESSION["user_id"] == $p["idUsuario"] || $_SESSION["user_access"] >= 3) {
					echo '<button type="button" class="btn btn-danger btn-sm bordersquared" data-toggle="tooltip" data-placement="top" title="Remover Partitura" onclick="confirmDel('.$p["idPartitura"].', '.$table.')"><i class="fas fa-trash-alt"></i></button>';
				}
				echo '</td>';
			echo '</tr>';
		}
	}


	/////////////////////////////// DATAHORA /////////////////////////////
	static function doApresentacaoRow(){
		$table = "'apresentacao'";
		include_once(DIR_RAIZ.'/mvc/controller/apresentacao_dao.php');
		$datadao = new ApresentacaoDAO();
		$alldata = $datadao->selectAllApresentacao();

		if (is_null($alldata) || $alldata == false)
			echo '';
		else
		foreach ($alldata as $p) {
			$datahora = new DateTime($p["datahora"]);
			echo '<tr>';
			echo '<td><i class="far fa-calendar-alt"></i> '.$datahora->format("d/m/Y").'</td>';
			echo '<td><i class="far fa-clock"></i> '.$datahora->format("H:i").'</td>';
			echo '<td>'.$p["cidade"].'/'.$p["estado"].' - '.$p["local"].'</td>';
			echo '<td><button class="btn btn-sm btn-danger btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="confirmDel('.$p["idApresentacao"].', '.$table.')"><i class="fas fa-trash-alt"></i></button></td>';

			echo '</tr>';
		}
	}
	/////////////////////////////// FIM DATAHORA /////////////////////////

	/////////////////////////////// APRESENTACAO INDEX /////////////////////////
	static function doFirstApres($row){
		$strdata = strtotime($row['datahora']);
		echo '<div class="col-md-5">
     <div class="text-center">
       <h3>Próxima Apresentação</h3>
       <br></div>';
    echo '<div class="card pad10 border-success bordersquared">';
      echo '<div class="bg-success text-center text-white">';
        echo '<h1>'.utf8_encode(strftime('%d / %b', $strdata)).'</h1>';
        echo '<h2>'.utf8_encode(strftime('%A', $strdata)).'</h2></div>';
      echo '<div class="text-center"><br>';
        echo '<h1 class="text-success">'.utf8_encode(strftime('%Hh%M', $strdata)).'</h1>';
        echo '<h3 class="text-success">'.$row["vert"].'</h3>';
        echo '<hr><h3 class="text-secondary">'.$row["local"].'</h3>';
        echo '<h2 class="text-secondary">'.$row["cidade"].'/'.$row["estado"].'</h2>';
      echo '</div></div></div>';
	}

	static function doAnyApres($row){
		$strdata = strtotime($row['datahora']);
		echo '<div class="row">
        <div class="bg-success text-center text-white col-3">';
          echo '<h3>'.utf8_encode(strftime('%d / %b', $strdata)).'</h3>';
          echo '<h4>'.utf8_encode(strftime('%A', $strdata)).'</h4>';
        echo '</div>
                <div class="text-center text-success col-4">';
          echo '<h2 class="text-success">'.utf8_encode(strftime('%Hh%M', $strdata)).'</h2>';
          echo '<h5>'.$row["vert"].'</h5>';
        echo '</div>
        <div class="text-center text-secondary col-5">';
          echo '<h4>'.$row["local"].'</h4>';
          echo '<h5>'.$row["cidade"].'/'.$row["estado"].'</h5>';
        echo '</div>
        <hr class="w-100">
    </div>';
	}

	/////////////////////////////////////// FIM APRESENTAÇÕES //////////////////////////////////////////


	////////////////////// ENSAIOS ///////////////////////////////////////////

	/////////////////////////////// DATAHORA /////////////////////////////
	static function doEnsaioRow(){
		$table = "'ensaio'";
		include_once(DIR_RAIZ.'/mvc/controller/ensaio_dao.php');
		$dataedao = new EnsaioDAO();
		$alldata = $dataedao->selectAllEnsaio();

		if (is_null($alldata) || $alldata == false)
			echo '';
		else
		foreach ($alldata as $e) {
			$datahora = new DateTime($e["datahora"]);
			echo '<tr>';
			echo '<td><i class="far fa-calendar-alt"></i> '.$datahora->format("d/m/Y").'</td>';
			echo '<td><i class="far fa-clock"></i> '.$datahora->format("H:i").'</td>';
			echo '<td>'.$e["cidade"].' - '.$e["local"].'</td>';
			echo '<td><button class="btn btn-sm btn-danger btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Excluir" onclick="confirmDel('.$e["idEnsaio"].', '.$table.')"><i class="fas fa-trash-alt"></i></button></td>';

			echo '</tr>';
		}
	}
	/////////////////////////////// FIM DATAHORA /////////////////////////

	/////////////////////////////// ENSAIO ROW /////////////////////////
	static function doAnyEnsaio($row){
		$strdata = strtotime($row['datahora']);
		echo '<div class="row">
        <div class="bg-success text-center text-white col-3">';
          echo '<h3>'.utf8_encode(strftime('%d / %b', $strdata)).'</h3>';
          echo '<h4>'.utf8_encode(strftime('%A', $strdata)).'</h4>';
        echo '</div>
                <div class="text-center text-success col-4">';
          echo '<h2 class="text-success">'.utf8_encode(strftime('%Hh%M', $strdata)).'</h2>';
          echo '<h5>'.$row["vert"].'</h5>';
        echo '</div>
        <div class="text-center text-secondary col-5">';
          echo '<h4>'.$row["local"].'</h4>';
          echo '<h5>'.$row["cidade"].'</h5>';
        echo '</div>
        <hr class="w-100">
    </div>';
	}
	////////////////////////////////////////// FIM ENSAIOS///////////////////////
}
?>
	
