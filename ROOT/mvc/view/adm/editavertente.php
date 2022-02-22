<?php
$id_vert = (isset($_GET['id'])) ? $_GET['id'] : null;
if(is_null($id_vert))
  echo '<script type="text/javascript">
location.href="addvertente.php";
</script>';

include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');
//include_once(DIR_RAIZ.'/mvc/model/vertente.php');
include_once(DIR_RAIZ.'/mvc/controller/vertente_dao.php');

ModalSubmit::doModal('vertente', 'Vertente Atualizado!', 'Erro ao Atualizar Vertente!');
ModalSubmit::doModalDel('vertente');
ModalSubmit::doModalUpdate('vertente');

$vertdao = new VertenteDAO();
$vert = $vertdao->selectVertente($id_vert);
if($vert==false)
  echo '<script type="text/javascript">
location.href="addvertente.php";
</script>';

$dir_vfoto = '../img/vert_img/'.$vert->getFoto();
$src_vfoto = $dir_vfoto.'?u='.filemtime($dir_vfoto);
?>

<style type="text/css">
.input-group-text{
  font-size: 1.5em;
}
</style>

<div style="width: 100%" class="form-row">

  <!-- Vertentes -->
  <!-- data-toggle="modal" data-target="#exampleModal" -->
  <div class="col-md-12">
    <h3 class="float-left"><i class="fas fa-box"></i> Vertentes</h3>    
  </div>
  <hr>
  <div class="form-row col-md-8">
    <form id="formupdate" style="width: 100%" method="post" role="form" post="../mvc/controller/vertente_update.php" spec="false">
      <div class="form-group col-md-12">
        <input type="hidden" id="id_vert" name="id_vert" value="<?php echo $vert->getIdVertente(); ?>">
        <div class="form-group float-left" style="width: 55%;">
          <label for="vertnome">Nome</label>
          <input id="vertnome" name="vertnome" type="text" class="form-control bordersquared greenShadow" placeholder="Nome Vertente" maxlength="25" required="true" value="<?php echo $vert->getNome() ?>"/>
        </div>
        <div class="form-group float-left" style="width: 20%; margin-left: 3%">
          <label for="valor">Valor</label>
          <input id="valor" name="vertvalor" type="number" class="form-control bordersquared greenShadow" placeholder="R$" step="0.01" value="<?php echo $vert->getPreco() ?>"/>
        </div>
        <div class="form-group float-right" style="width: 20%;">
          <label>Situação:</label>
          <h6 class="form-control bordersquared">
            <?php
            if($vert->getAtivo() == 1){
              echo '<i class="fas fa-check-circle text-success"></i> Ativo';
              $tta = "Desativar";
              $txtc = "btn-secondary";
            }
            else{
              echo '<i class="fas fa-minus-circle text-secondary"></i> Inativo';
              $tta = "Ativar";
              $txtc = "btn-success";
            }
            ?>
          </h6>
        </div>

        <div class="form-group">
          <label for="vertdescpqn">Descrição de Exibição <i class="fas fa-exclamation-circle text-success" data-toggle="tooltip" data-placement="top" title="Descrição que aparecerá na Página Inicial"></i></label>
          <input id="vertdescpqn" name="vertdescpqn" type="textbox" class="form-control bordersquared greenShadow" placeholder="Pequena Descrição" maxlength="50" value="<?php echo $vert->getDescPqn() ?>"/>
        </div>

        <div class="form-group">
          <label for="vertdesc">Descrição</label>
          <textarea id="vertdesc" name="vertdesc" class="form-control bordersquared greenShadow" rows="5"><?php echo $vert->getDescricao() ?></textarea>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-success bordersquared" style="margin-right: 10px;"><i class="fas fa-save"></i> Salvar</button>
          </div>

          <div class="col">
            <button class="btn <?php echo $txtc; ?> bordersquared" style="margin-right: 10px;" onclick="confirmUpdate(<?php echo $id_vert; ?>, 'vertente')"><i class="fas fa-retweet"></i> <?php echo $tta; ?></button></div>
          </div>
        </div>

      </form>
    </div>
    <div class="col-md-4">

      <h5>Imagem <i class="fas fa-exclamation-circle text-success" data-toggle="tooltip" data-placement="top" title="A foto é atualizada automaticamente ao realizar o upload, não sendo necessário clicar no botão salvar"></i></h5>
      <hr>
      <div class="avatar" style="border: 1px dotted lightgray;">
        <div class="row">
          <img id="img_vert" src="<?php echo $src_vfoto;?>" alt="Logo" />
        </div>
      </div>
      <div class="row"><br></div>
      <div class="row">
        <div class="fileUpload btn btn-success bordersquared nomargin col-md-8">
          <span><i class="fas fa-upload"></i> Carregar</span>
          <input id="uploadImagev" type="file" class="upload actionUpload nomargin uploadCroppieFoto" accept="image/png, image/jpeg" onclick="setCroppieViewPort(<?php echo $id_vert.', '.VERT_H.', '.VERT_W; ?>, 'img_vert')" />
        </div>
      </div>

    </div>

  </div>
</div>