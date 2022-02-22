<style type="text/css">
.input-group-text{
  font-size: 1.5em;
}
</style>
<div style="width: 100%" class="form-row">
<?php 
  include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');
  ModalSubmit::doModal('cargo', '', '');
  ModalSubmit::doModalDel('cargo');
  include_once(DIR_RAIZ."/mvc/view/funcs/doCards.php");
  include_once(DIR_RAIZ."/mvc/controller/cargo_dao.php");
?>
    <!-- PARAMETROS -->
    <div class="col-md-12">
      <h3><i class="fas fa-user-tie"></i> Cargos</h3>
      <hr>
    </div>
    <div class="form-row col-md-8">
    <!-- ADD CARGOS -->
      <form id="formok" style="width: 100%" method="post" role="form" post="../mvc/controller/cargo_cadastra.php" spec="false">
          <input type="text" id="ncargo" name="ncargo" class="form-control bordersquared greenShadow" placeholder="Nome Cargo" style="float: left; width: 70%;" required="true" />
          <button class="btn btn-success btn-block bordersquared" style="float: right; width: 30%;"><i class="fas fa-plus"></i> Add Cargo</button>
      </form>
    <!-- FIM ADD -->

    <!-- TABELA CARGOS -->
    <table class="table table-hover">
            <thead>
              <tr>
                <th>Cargo</th>
                <th style="width: 35px;"></th>
              </tr>
            </thead>
            <tbody class="tableList">
              <?php 
                $sql = "select * from cargo";
                //echo 'SQL => '.$sql;
                $con = Conexao::getInstance()->prepare($sql);
                $con->execute();
                $row = $con->fetchAll(PDO::FETCH_ASSOC);

                foreach ($row as $mem) {
                  doCards::doCargoRow($mem['idCargo'], $mem['nome']);
                }//fecha forech
              ?>
            </tbody>
          </table>
    <!-- FIM TABLEA -->

    </div>
</div>