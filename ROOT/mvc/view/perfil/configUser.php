<?php 

include_once(DIR_RAIZ."/mvc/view/funcs/modal_submit.php");

ModalSubmit::doModalUpdate('Senha');
 ?>
<!-- <hr style="width: 100%"> -->
<div class="row" style="padding: 0; padding-right: 10px;">
<form class="form-row col-md-12" id="updateSenha" method="post" role="form" post="../mvc/controller/user_updatePass.php" spec="false">
  <input type="hidden" name="idu" value="<?php echo $_SESSION['user_id']; ?>">
  <h3><i class="fa fa-key"></i> Alterar Senha</h3>
  <hr>
  <div class="form-group col-md-12">
    <div class="form-group col-md-6">
      <label for="senha"><i class="fas fa-lock"></i> Nova Senha</label>
      <input type="password" class="form-control greenShadow bordersquared" id="senha" name="senha">
    </div>
    <div class="form-group col-md-6">
      <label for="senha"><i class="fas fa-lock"></i> Confirme a Senha</label>
      <input type="password" class="form-control greenShadow bordersquared" id="senha2">
    </div>
  </div>
  <div class="alert alert-danger col-md-6 text-center" role="alert" style="display: none;">
  As senhas não conferem!
  </div>
  <div class="form-group col-md-12">
    <div class="form-group col-md-6">
      <button type="button" class="btn btn-success bordersquared" id="botaoAlterarSenha" style="width: 200px;" onclick="validaSenhas()"><i class="fas fa-save"></i> Salvar</button>
    </div>
  </div>

</form>
</div>
<script type="text/javascript">
  function validaSenhas(){
    if($('#senha').val() != $('#senha2').val()){
      $('.alert').css('display', 'block');
    }else{
      $('.alert').css('display', 'none');
      doFormUpdate('updateSenha');
    }

  }
</script>