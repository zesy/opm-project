<?php
// 	include_once(DIR_RAIZ.'/mvc/controller/membro_dao.php');
// 	include_once(DIR_RAIZ.'/mvc/controller/instrumento_dao.php');
// 	include_once(DIR_RAIZ.'/mvc/controller/cargo_dao.php');
// 	include_once(DIR_RAIZ.'/mvc/controller/social_dao.php');
	include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
	$nome = "Nome";
	$cargo = "Cargo";
	$instrument = "Violino";
	$fb = "user facebook";
	$insta = "user instagram";
	$twitter = "user twiter";
	$youtube = "user youtube";
	$imgperfil = "img/eu.jpg"; //Foto de perfil
	$instruicon = "icons8-violino"; //Icone do instrumento
?>
<div class="column">
    <div class="cards">
      <div class="avatarc">
      	<img class="avatarimgc" src="<?php echo $imgperfil; ?>" alt="<?php echo $nome; ?>" />
      	<div class="avatarname"><?php echo $nome; ?></div>
      </div>
      <div class="container">
        <span class="cargo"><?php echo $cargo; ?></span>
        <hr class="separator2"/>
        <div class="row">
        	<?php doCards::doInstruDiv($instrument,$instruicon);
        	 ?>
        	
        </div>
        
        
    		<div class="social-btn btn-group">
			  <button class="facebook" onClick="openLink(true, 'https://www.facebook.com/<?php echo $fb; ?>')"><i class="fab fa-facebook-f"></i></button>
			  <button class="instagram" onClick="openLink(true, 'https://www.instagram.com/<?php echo $insta; ?>')"><i class="fab fa-instagram"></i></button>
			  <button class="twitter" onClick="openLink(true, 'https://www.twitter.com/<?php echo $twitter; ?>')"><i class="fab fa-twitter"></i></button>
			  <button class="youtube" onClick="openLink(true, 'https://www.youtube.com/<?php echo $youtube; ?>')"><i class="fab fa-youtube"></i></button>
			</div>
		
      </div>
    </div>
</div>