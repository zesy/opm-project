<?php 
include_once('social_dao.php');
include_once('../model/social.php');
$socialdao = new SocialDAO();

$soc = new Social();

$soc->setIdSocial($_POST["idSocial"]);

$soc->setFacebook($_POST["linkfb"]);
$soc->setFbAtivo((isset($_POST["checkfb"]) == true ? 1 : 0));
$soc->setInstagram($_POST["linkinsta"]);
$soc->setInstaAtivo((isset($_POST["checkinsta"]) == true ? 1 : 0));
$soc->setTwitter($_POST["linktwit"]);
$soc->setTwitAtivo((isset($_POST["checktwit"]) == true ? 1 : 0));
$soc->setYoutube($_POST["linkyt"]);
$soc->setYtAtivo((isset($_POST["checkyt"]) == true ? 1 : 0));

//return var_dump($imploded_instru);
echo $socialdao->updateSocial($soc);

 ?>