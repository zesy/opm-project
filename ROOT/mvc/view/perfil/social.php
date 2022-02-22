<?php
$ativosocial = "Quando selecionado ativará em seu card o link social do";
$linksocial = "Digite a barra e seu usuário.\nEx:";
include_once(DIR_RAIZ."/mvc/model/membro.php");
include_once(DIR_RAIZ."/mvc/model/social.php");
include_once(DIR_RAIZ."/mvc/controller/membro_dao.php");
include_once(DIR_RAIZ."/mvc/controller/social_dao.php");
$membrodao = new MembroDAO();
$socialdao = new SocialDAO();

$membro = $membrodao->selectMembroByUser($_SESSION["user_id"]);
$social = $socialdao->selectSocial($membro->getIdSocial());


$cfb = $social->getFbAtivo() == 1 ? 'checked="true"' : '';
$dfb = $social->getFbAtivo() == 1 ? '' : 'readonly="true"';

$cin = $social->getInstaAtivo() == 1 ? 'checked="true"' : '';
$din = $social->getInstaAtivo() == 1 ? '' : 'readonly="true"';

$ctw = $social->getTwitAtivo() == 1 ? 'checked="true"' : '';
$dtw = $social->getTwitAtivo() == 1 ? '' : 'readonly="true"';

$cyt = $social->getYtAtivo() == 1 ? 'checked="true"' : '';
$dyt = $social->getYtAtivo() == 1 ? '' : 'readonly="true"';

include_once(DIR_RAIZ."/mvc/view/funcs/modal_submit.php");
ModalSubmit::doModalUpdate("Social");
?>
<style type="text/css">
.input-group-text{
  font-size: 1.5em;
}
</style>
<div class="row" style="padding: 0; padding-right: 10px;">
<form id="formupdate" style="width: 100%" method="post" role="form" post="../mvc/controller/membro_updateSocial.php" spec="false" class="col-12">
  <input type="hidden" name="idSocial" value="<?php echo $membro->getIdSocial(); ?>">
  <div class="form-row">

    <!-- COLUNA DADOS -->
    <div class="col-md-7">
      <h3><i class="fas fa-globe-americas"></i><i class="fas fa-users"></i> Social</h3>
      <hr style="width: 100%">

      <div class="form-row">

        <!-- FACEBOOK -->
        <div class="col-sm-12 my-1">
          <div style="width: 80%; float: left;">
            <label for="linkfb">Facebook <i data-toggle="tooltip" data-placement="top" title="<?php echo $linksocial;?> /MantiqueiraOrchestra" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div style="width: 20%; float: right;">
            <input class="form-check-input greenShadow" type="checkbox" id="checkfb" name="checkfb" <?php echo $cfb; ?>>
            <label class="form-check-label" for="checkfb">Ativo <i data-toggle="tooltip" data-placement="top" title="<?php echo $ativosocial;?> Facebook" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div class="input-group">
            <div style="margin-bottom: 5px" class="input-group">
              <div class="divbtn bg-green bordersquared socialText1em buticon"><i class="fab fa-facebook"></i>/</div>
              <input id="linkfb" name="linkfb" type="text" class="form-control bordersquared greenShadow" placeholder="/facebooklink" value="<?php echo $social->getFacebook(); ?>" <?php echo $dfb; ?>>
            </div>
          </div>
        </div>
        <!-- INSTAGRAM -->
        <div class="col-sm-12 my-1">
          <div style="width: 80%; float: left;">
            <label for="linkinsta">Instagram <i data-toggle="tooltip" data-placement="top" title="<?php echo $linksocial;?> /MeuPerfilNoInsta" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div style="width: 20%; float: right;">
            <input class="form-check-input greenShadow" type="checkbox" id="checkinsta" name="checkinsta" <?php echo $cin; ?>>
            <label class="form-check-label" for="checkinsta">Ativo <i data-toggle="tooltip" data-placement="top" title="<?php echo $ativosocial;?> Instagram" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div class="input-group">
            <div style="margin-bottom: 5px" class="input-group">
              <div class="divbtn bg-green bordersquared socialText1em"><i class="fab fa-instagram"></i>/</div>
              <input id="linkinsta" name="linkinsta" type="text" class="form-control bordersquared greenShadow" placeholder="/instagramlink" value="<?php echo $social->getInstagram(); ?>" <?php echo $din; ?>>
            </div>
          </div>
        </div>
        <!-- TWITTER -->
        <div class="col-sm-12 my-1">
          <div style="width: 80%; float: left;">
            <label for="linktwit">Twitter <i data-toggle="tooltip" data-placement="top" title="<?php echo $linksocial;?> /MeuPerfilNoTwitter" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div style="width: 20%; float: right;">
            <input class="form-check-input greenShadow" type="checkbox" id="checktwit" name="checktwit" <?php echo $ctw; ?>>
            <label class="form-check-label" for="checktwit">Ativo <i data-toggle="tooltip" data-placement="top" title="<?php echo $ativosocial;?> Twitter" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div class="input-group">
            <div style="margin-bottom: 5px" class="input-group">
              <div class="divbtn bg-green bordersquared socialText1em"><i class="fab fa-twitter"></i>/</div>
              <input id="linktwit" name="linktwit" type="text" class="form-control bordersquared greenShadow" placeholder="/twitterlink" value="<?php echo $social->getTwitter(); ?>" <?php echo $dtw; ?>>
            </div>
          </div>
        </div>
        <!-- YOU TUBE -->
        <div class="col-sm-12 my-1">
          <div style="width: 80%; float: left;">
            <label for="linkyt">YouTube <i data-toggle="tooltip" data-placement="top" title="<?php echo $linksocial;?> /MeuCanalNoYouTube" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div style="width: 20%; float: right;">
            <input class="form-check-input greenShadow" type="checkbox" id="checkyt" name="checkyt" <?php echo $cyt; ?>>
            <label class="form-check-label" for="checkyt">Ativo <i data-toggle="tooltip" data-placement="top" title="<?php echo $ativosocial;?> YouTube" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
          <div class="input-group">
            <div style="margin-bottom: 5px" class="input-group">
              <div class="divbtn bg-green bordersquared socialText1em"><i class="fab fa-youtube"></i>/</div>
              <input id="linkyt" name="linkyt" type="text" class="form-control bordersquared greenShadow" placeholder="/youtubelink" value="<?php echo $social->getYoutube(); ?>" <?php echo $dyt; ?>>
            </div>
          </div>
        </div>


        <!-- BOTÃO CONFIRMAR -->
        <hr style="width: 100%;">
        <div style="margin-top: 10px;" class="input-group-btn">
          <button type="submit" id="butao" class="btn btn-lg btn-success btn-block bordersquared" style="width: 200px;"><i class="fas fa-save"></i> Salvar</button>
        </div>
        <script type="text/javascript">
          var $cfb = document.getElementById("checkfb");
          var $cinsta = document.getElementById("checkinsta");
          var $ctwit = document.getElementById("checktwit");
          var $cyt = document.getElementById("checkyt");

          var $fb = document.getElementById("linkfb");
          var $insta = document.getElementById("linkinsta");
          var $twit = document.getElementById("linktwit");
          var $yt = document.getElementById("linkyt");

          $cfb.addEventListener('change', function(){
            if($('#checkfb').is(':checked')) {
              $fb.readOnly = false;
            }
            else {
              $fb.readOnly = true;
            }
          });
          $cinsta.addEventListener('change', function(){
            if($('#checkinsta').is(':checked')) {
              $insta.readOnly = false;
            }
            else {
              $insta.readOnly = true;
            }
          });
          $ctwit.addEventListener('change', function(){
            if($('#checktwit').is(':checked')) {
              $twit.readOnly = false;
            }
            else {
              $twit.readOnly = true;
            }
          });
          $cyt.addEventListener('change', function(){
            if($('#checkyt').is(':checked')) {
              $yt.readOnly = false;
            }
            else {
              $yt.readOnly = true;
            }
          });

        </script>
      </div>
    </div>

  </div>
</form>
</div>