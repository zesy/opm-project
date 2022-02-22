<?php
include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');


?>

<style type="text/css">
.input-group-text{
  font-size: 1.5em;
}
</style>
<!-- MODAL ADD VERTENTE -->
    <div class="modal fade" id="modalAddVert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h4>Cadastro de Vertente <i class="fas fa-exclamation-circle text-success" data-toggle="tooltip" data-placement="top" title="Novos cadastros estarão inativo por padrão. Ative após o cadastro"></i></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form id="formok" style="width: 100%" method="post" role="form" post="../mvc/controller/vertente_cadastra.php" spec="false">
          <div class="modal-body">

            <div class="form-group col-md-12">
              <div class="form-group float-left" style="width: 70%;">
                <label for="vertnome">Nome</label>
                <input id="vertnome" name="vertnome" type="text" class="form-control bordersquared greenShadow" placeholder="Nome Vertente" maxlength="25" required="true" />
              </div>
              <div class="form-group float-right" style="width: 25%;">
                <label for="valor">Valor</label>
                <input id="valor" name="vertvalor" type="number" class="form-control bordersquared greenShadow" placeholder="R$" step="0.01" />
              </div>

              <div class="form-group">
                <label for="vertdescpqn">Descrição de Exibição <i class="fas fa-exclamation-circle text-success" data-toggle="tooltip" data-placement="top" title="Descrição que aparecerá na Página Inicial"></i></label>
                <input id="vertdescpqn" name="vertdescpqn" type="textbox" class="form-control bordersquared greenShadow" placeholder="Pequena Descrição" maxlength="50"/>
              </div>

              <div class="form-group">
                <label for="vertdesc">Descrição</label>
                <textarea id="vertdesc" name="vertdesc" class="form-control bordersquared greenShadow" rows="5"></textarea>
              </div>
            </div>

        <!-- <div class="col-md-12">
          <div class="halfdiv-left">
            <div style="width: 100%;">
              <label for="uploadImagev">Imagem</label>
            </div>
            <div class="fileUpload btn btn-success bordersquared nomargin" style="width: 150px;">
              <span><i class="fas fa-upload"></i> Carregar</span>
              <input id="uploadImagev" type="file" class="upload actionUpload nomargin uploadCroppieFoto" accept="image/png, image/jpeg" onclick="setCroppieViewPort(<?php //echo VERT_H.', '.VERT_W; ?>, 'img-v', false)" />

              
              </div>

              <div class="avatar" style="border: 1px dotted lightgray;">
                <img id="img-v" src="../img/OPM-95px.png" alt="Logo" />
              </div>
            </div>
            <div class="halfdiv-right">
              <button class="btn btn-success btn-block bordersquared halfdiv-right"><i class="fas fa-save"></i> Salvar</button>
            </div>

          </div> -->

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-block bordersquared halfdiv-right"><i class="fas fa-save"></i> Salvar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php 
ModalSubmit::doModal('vertente', 'Vertente Atualizado!', 'Erro ao Atualizar Vertente!');
ModalSubmit::doModalDel('vertente');
ModalSubmit::doModalUpdate('vertente');

   ?>
  <!-- FIM ADD MODAL -->
<div style="width: 100%" class="form-row">

  <!-- Vertentes -->
  <!-- data-toggle="modal" data-target="#exampleModal" -->
  <div class="col-md-12">
    <h3 class="float-left"><i class="fas fa-box"></i> Vertentes</h3>
    <button class="btn btn-success bordersquared float-right" data-toggle="modal" data-target="#modalAddVert"><i class="fas fa-plus"></i> Nova Vertente</button>
  </div>
    <hr>
  <div class="form-row col-md-12">
    

  <div class="col-md-12 row align-items-center">
    <!-- TABELA CARGOS -->
    <div class="col-md-8">
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="vertenteth"></th>
          <th>Cadastros:</th>
          <th class="vertenteth"></th>
          <th class="vertenteth"></th>
          <th class="vertenteth"></th>
        </tr>
      </thead>
      <tbody class="table-sm vertentetd">
      <?php doCards::doVertRow() ?> 
       <!--  <tr><td><i class="fas fa-minus-circle text-secondary" data-toggle="tooltip" data-placement="top" title="Inativo"></i></td>
          <td>Vertente</td>
          <td>
            <button class="btn btn-sm btn-secondary btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Atualizar Instrumento"><i class="fas fa-retweet"></i></button>
          </td>
          <td>
            <button class="btn btn-sm btn-primary btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></button>
          </td>
          <td>
            <button class="btn btn-sm btn-danger btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>
    <!-- FIM TABLEA -->
  </div>

</div>
</div>