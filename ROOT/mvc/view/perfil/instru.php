  <?php
  include_once(DIR_RAIZ.'/mvc/controller/instrumento_dao.php');
  include_once(DIR_RAIZ.'/mvc/controller/membro_dao.php');
  include_once(DIR_RAIZ.'/mvc/model/instrumento.php');
  include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
  include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');

  $membrodao = new MembroDao();
  $instrudao = new InstrumentoDAO();

  ModalSubmit::doModalUpdate('instrumento');

  $table = "'instrumento'";
  $m_instru = $membrodao->selectInstruMembroByUser($_SESSION['user_id']);

  $array_instru[] = '';
  if ($m_instru != false)
  foreach ($m_instru as $mi)
    $array_instru = explode(';', $mi['idInstrumento']);

  $row = $instrudao->selectAllInstrumentoAtv();
  ?>
  <form id="formupdate" class="form-row" method="post" role="form" post="../mvc/controller/membro_updateInstru.php">
  <div class="wid100">
    <h3 style="float: left;"><i class="fas fa-drum"></i> Instrumentos</h3>
    <?php 
      if($row == false || $row == null)
        echo '';
      else
        echo '<button class="btn btn-success greenShadow bordersquared" style="float: right;"><i class="fas fa-save"></i> Salvar</button>';
     ?>
    
  </div>
  <hr>
  <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_id']; ?>">
  <?php
    
    
    if($row == false || $row == null)
      echo '<h6>Sem instrumentos cadastrados</h6>';
    else{
      foreach ($row as $r) {
        echo '<div class="col-2 instrucard" align="center">';
        echo '<div>';
        echo '<input type="checkbox" id="i'.$r["nome"].'" name="instru[]" value="'.$r["idInstrumento"].'" ';

        if(in_array($r["idInstrumento"], $array_instru))
          echo "checked";

        echo '></div><div>';
        echo '<label for="i'.$r["nome"].'">';
        doCards::doInstruDiv($r['nomeExibicao'],$r['icone']);
        echo '<span class="instrucardp">'.$r["nome"].'</span>';
        echo '</label></div></div>';
      }
    }

  ?>
  </form>