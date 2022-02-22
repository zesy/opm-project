<?php
include_once(DIR_RAIZ.'/mvc/controller/instrumento_dao.php');
include_once(DIR_RAIZ.'/mvc/model/instrumento.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');

ModalSubmit::doModal('instrumento', 'Instrumento Atualizado!', 'Erro ao Atualizar Instrumento!');
ModalSubmit::doModalDel('instrumento');
ModalSubmit::doModalUpdate('instrumento');

$atvtt = "Instrumento ativo ou não para cadastro de membros.";
$nett = "Nome que será exibido ao passar o mouse por cima.";
$instruicon = "icons8-violino.png";
?>
</script>
<style type="text/css">
.input-group-text{
  font-size: 1.5em;
}
</style>
<div class="wid100 form-row">

  <!-- MODAL ICONS -->
  <div class="modal" id="modalIcons">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Selecione o Ícone</h4>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <button type="button" class="btn bg-btn-green noradius" data-dismiss="modal">Fechar <i class="fas fa-times"></i></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <!-- RADIOS -->
            <?php
            include_once("instruicontable.php");
            ?>
            <!-- FIM RADIOS -->
          </div>
        </div>

        <!-- Modal footer -->
      <!-- <div class="modal-footer" align="center">
        <button type="button" class="btn bg-btn-green noradius" data-dismiss="modal">Fechar</button>
      </div> -->

    </div>
  </div>
</div>
<!-- FIM MODAL -->


<!-- INSTRUMENTOS -->
<div class="col-md-12" style="margin-bottom: 20px;">
  <h3><i class="fas fa-drum"></i> Instrumentos</h3>
  <hr>
</div>
<div class="col-md-5">
  <!-- TABELA INTRUMENTO -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="vertenteth"></th>
        <th class="vertenteth"></th>
        <th>Cadastros:</th>
        <th class="vertenteth"></th>
        <th class="vertenteth"></th>
      </tr>
    </thead>
    <tbody class="table-sm vertentetd"> 
      <!-- INCLUIR TABELA COM OS INSTRUMENTOS CADASTRADOS -->
      <?php doCards::doInstruRow(true); ?>
      <!-- FIM TABELA DE INSTRUMENTOS -->
    </tbody>
  </table>
  <!-- FIM TABLEA -->
</div>
<div class="col-md-1"></div>
<!-- ADD -->
<div class="col-md-6" style="margin-bottom: 20px;">
  <form id="formok" style="width: 100%" method="post" role="form" post="../mvc/controller/instrumento_cadastra.php" spec="false">
  <div class="form-group wid100" style="padding-top: 10px;">
    <h5>Cadastrar</h5>
  </div>
  <hr>
  <div style="float: left; width: 75%;">
    <label class="wid100" for="instrunome">Nome - Disposição do Naipe</label>
  </div>
  <div style="float: right; width: 20%; margin-left: 5%;">
    <input class="greenShadow" type="checkbox" id="checkatv" name="checkatv" checked="true">
    <label class="" for="checkatv">Ativo <i data-toggle="tooltip" data-placement="top" title="<?php echo $atvtt;?>" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
  </div>
  <input id="instrunome" name="instrunome" type="text" class="form-control bordersquared greenShadow" placeholder="Ex: Violino 1, Violino 2" />


  <label for="naipe">Naipe</label>
  <input id="naipe" name="naipe" type="textbox" class="form-control bordersquared greenShadow" placeholder="Ex: Cordas" />

  <label for="nomeexib">Nome de Exibição <i data-toggle="tooltip" data-placement="top" title="<?php echo $nett;?>" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
  <input id="nomeexib" name="nomeexib" type="textbox" class="form-control bordersquared greenShadow" placeholder="Nome para exibição nos cards" />

  <div class="form-row">
    <div class="col-md-12">
      <label for="selectedicon">Ícone</label>
    </div>
    <div class="col input-group">
      <div class="btn-instru" style="margin-right: 5px;"><img id="instrumentIcon" src="../img/instruments/blank.png"></div>
      <input id="selectedicon" name="selectedicon" type="text" class="form-control bordersquared greenShadow" placeholder="Nenhum" readonly />
      
    </div>
    <input type="text" name="sicon" id="sicon" value="blank.png" style="display: none;">
    <div class="col" style="margin-left: 5px;">
      <a data-toggle="modal" data-target="#modalIcons"><button class="btn bg-btn-green btn-block bordersquared"><i class="fas fa-search"></i> Selecionar</button></a>
    </div>
  </div>

  <hr>

  <div class="col-md-6">
    <button class="btn bg-btn-green btn-block bordersquared"><i class="fas fa-save"></i> Salvar</button>
  </div>
  </form>
</div>
<!-- FIM ADD -->

</div>
