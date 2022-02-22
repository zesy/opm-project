<?php
$ativosocial = "Quando selecionado ativará o link social do";
$linksocial = "Digite a barra e seu usuário/link.\nEx:";

include_once(DIR_RAIZ."/mvc/view/funcs/modal_submit.php");
include_once(DIR_RAIZ."/mvc/controller/orquestra_dao.php");
include_once(DIR_RAIZ."/mvc/controller/social_dao.php");
include_once(DIR_RAIZ."/mvc/model/social.php");
$orqdao = new OrquestraDAO();
$socdao = new SocialDAO();
$orq = $orqdao->selectOrquestra();
$osoc = $socdao->selectSocial(1);

ModalSubmit::doModalUpdate('Par&#226;metros');

$cfb = $osoc->getFbAtivo() == 1 ? 'checked="true"' : '';
$dfb = $osoc->getFbAtivo() == 1 ? '' : 'readonly="true"';

$cin = $osoc->getInstaAtivo() == 1 ? 'checked="true"' : '';
$din = $osoc->getInstaAtivo() == 1 ? '' : 'readonly="true"';

$ctw = $osoc->getTwitAtivo() == 1 ? 'checked="true"' : '';
$dtw = $osoc->getTwitAtivo() == 1 ? '' : 'readonly="true"';

$cyt = $osoc->getYtAtivo() == 1 ? 'checked="true"' : '';
$dyt = $osoc->getYtAtivo() == 1 ? '' : 'readonly="true"';


?>

<style type="text/css">
.input-group-text{
  font-size: 1.5em;
}
</style>
<div class="form-row padding0px nomargin">

  <!-- PARAMETROS -->
  <div class="col-lg-12 col-md-12 col-sm-12">
    <h3><i class="fas fa-cogs"></i> Parâmetros</h3>
    <hr>
  </div>
  <!-- DADOS -->
  <div class="col-lg-6 col-md-5 col-sm-12" style="padding: 20px;">

    <div class="form-row card">

      <form id="updateOrqName" method="post" role="form" post="../mvc/controller/orquestra_updateNome.php" spec="false">
        <div class="card-header fixcardheader row">
          <div class="col-6 nomargin">
            <h5><i class="far fa-file-alt"></i> Dados</h5>
          </div>
          <div class="col-6 nomargin">
            <button type="submit" class="btn btn-success btn-block bordersquared nomargin halfdiv-right" style="margin-bottom: 0;" onclick="doFormUpdate('updateOrqName')"><i class="fas fa-save"></i> Salvar</button>
          </div>
        </div>
        <div class="col-12 my-1">
          <label for="orqnome">Nome</label>
          <div class="form-group">
            <input id="orqnome" name="orqnome" type="text" class="form-control bordersquared greenShadow" placeholder="Nome de sua Orquestra/Banda" value="<?php echo $orq['nome']; ?>"/>
          </div>
          <label for="ohistoria">História</label>
          <textarea id="ohistoria" name="ohistoria" rows="7" class="form-control bordersquared greenShadow"><?php echo $orq['historia']; ?></textarea>
        </div>

      </form>
    </div>

  </div>
  <!-- FIM DADOS -->
  <!-- LOGO -->
  <div class="col-lg-6 col-md-5 col-sm-12" style="padding: 20px;">
    <div class="form-row card">
      <div class="card-header fixcardheader">
        <div class="halfdiv nomargin">
          <h5><i class="far fa-image"></i> Logo</h5>
        </div>
        <div class="halfdiv nomargin">
          <div class="fileUpload btn btn-success bordersquared nomargin" style="width: 100%;">
            <span><i class="fas fa-upload"></i> Carregar</span>
            <input id="uploadLogo" type="file" class="upload actionUpload nomargin uploadCroppieFoto" accept="image/png, image/jpeg" onclick="setCroppieViewPort(1, <?php echo LOGO_H.', '.LOGO_W; ?>, 'img_logo')" />
          </div>
        </div>
      </div>
      <div class="col-sm-12 my-1">

        <div class="input-group" style="width: 100%;">
          <d iv class="col-md-4">
              <!-- <div class="fileUpload btn btn-success bordersquared nomargin" style="width: 100%;">
                <span><i class="fas fa-upload"></i> Carregar</span>
                <input id="uploadLogo" type="file" class="upload actionUpload nomargin uploadCroppieFoto" accept="image/png, image/jpeg" onclick="setCroppieViewPort(1, <?php echo LOGO_H.', '.LOGO_W; ?>, 'img_logo')" />
              </div> -->
            </div>
            <div class="col-md-12" style="border: 1px dotted lightgray;">
              <img id="img_logo" src="../img/logo/logo.jpg?v=<?php echo filemtime('../img/logo/logo.jpg'); ?>" alt="Logo"/>
            </div>
          </div>
        </div>
      </div>
      <!-- FIM LOGO -->
      <!-- SOCIAL -->
      <div class="col-lg-6 col-md-5 col-sm-12">
        <form class="form-row card" id="formupdate" method="post" role="form" post="../mvc/controller/orquestra_updateSocial.php" spec="false">

          <div class="card-header fixcardheader">
            <div class="halfdiv nomargin">
              <h5><i class="fas fa-at"></i> Social</h5>
            </div>
            <div class="halfdiv nomargin">
              <button type="submit" class="btn btn-success btn-block bordersquared nomargin halfdiv-right" style="margin-bottom: 0"><i class="fas fa-save"></i> Salvar</button>
            </div>
          </div>
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
                <input id="linkfb" name="linkfb" type="text" class="form-control bordersquared greenShadow" placeholder="/facebooklink" value="<?php echo $osoc->getFacebook(); ?>" <?php echo $dfb; ?>>
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
                <input id="linkinsta" name="linkinsta" type="text" class="form-control bordersquared greenShadow" placeholder="/instagramlink" value="<?php echo $osoc->getInstagram(); ?>" <?php echo $din; ?>>
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
                <input id="linktwit" name="linktwit" type="text" class="form-control bordersquared greenShadow" placeholder="/twitterlink" value="<?php echo $osoc->getTwitter(); ?>" <?php echo $dtw; ?>>
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
                <input id="linkyt" name="linkyt" type="text" class="form-control bordersquared greenShadow" placeholder="/youtubelink" value="<?php echo $osoc->getYoutube(); ?>" <?php echo $dyt; ?>>
              </div>
            </div>
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
        </form>
      </div>
      <!-- FIM SOCIAL -->
      <!-- EMAIL/SMTP -->
      <div class="col-lg-6 col-md-5 col-sm-12">

        <form class="col-sm-12 my-1" id="updateOrqSmtp" method="post" role="form" post="../mvc/controller/orquestra_updateSmtp.php" spec="false">
          <div class="form-row card">
            <div class="card-header fixcardheader nomargin" style="max-height: 50px;">
              <div class="halfdiv nomargin">
                <h5><i class="far fa-envelope"></i> Email/SMTP</h5>
              </div>
              <div class="halfdiv nomargin">
                <button type="submit" class="btn btn-success btn-block bordersquared" onclick="doFormUpdate('updateOrqSmtp')"><i class="fas fa-save"></i> Salvar</button>
              </div>
            </div>
            <div class="col-sm-12 my-1">
              <div class="form-group">
                <label for="orqsmtp">SMTP</label>
                <input id="orqsmtp" name="orqsmtp" type="text" class="form-control bordersquared greenShadow" placeholder="Endereço SMTP" value="<?php echo $orq['smtp']; ?>"/>
                <label for="orqport">Porta</label>
                <input id="orqport" name="orqport" type="number" class="form-control bordersquared greenShadow" placeholder="583" value="<?php echo $orq['port']; ?>"/>
                <label for="orquser">Usuário</label>
                <input id="orquser" name="orquser" type="text" class="form-control bordersquared greenShadow" placeholder="E-mail" value="<?php echo $orq['email']; ?>"/>
                <label for="orqpass">Senha</label>
                <input id="orqpass" name="orqpass" type="password" class="form-control bordersquared greenShadow" placeholder="Senha" value="<?php echo $orq['senha']; ?>"/>
                <div class="form-group">
                  <input class="greenShadow" type="checkbox" id="checkssl" name="checkssl" checked="<?php
                  echo $orq['assl'] == 1 ? 'true':'false';
                  ?>
                  ">

                  <label class="form-check-label" for="checkssl">Autenticação SSL?</label>
                </div>

                
              </div>
            </div>
          </div>
        </form>
        
      </div>
      <!-- FIM EMAIL/SMTP -->
    </div>