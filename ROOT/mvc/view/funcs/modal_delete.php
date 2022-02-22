<?php
/**
 * 
 */
class ModalSubmit
{
  
  static function doModalDel($tela, $spec, $specerro)
  {
    

echo '<div class="modal fade" id="display-modal-del" tabindex="-1" role="dialog" aria-labelledby="modalLabel">';


  echo '<div class="modal-dialog" role="document">';
    echo '<div class="modal-content">';
      //<!-- TÍTULO -->
      echo '<div class="modal-header" align="center">';
        echo '<h4>Cadastro de '.utf8_encode(ucfirst(strtolower($tela))).'</h4>';
        echo '<button id="butclosemodal" style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
      echo '</div>';

      echo '<div class="modal-body text-center">';
        //<!-- AO SUBMETER - LOADDING -->
        echo '<div id="display-modal-loading" style="display: none;">';
          echo '<h3>Cadastrando '.utf8_encodeucfirst(strtolower($tela))).'...<br>';
            echo '<i class="fa fa-spinner fa-pulse text-success"></i>';
          echo '</h3>';
        echo '</div>';
        //<!-- AO OBTER SUCESSO -->
        echo '<div id="display-modal-success" style="display: none;">';
          echo '<h3>'.utf8_encode(ucfirst(strtolower($tela))).' cadastrado com sucesso!<br>';
            echo '<i class="fas fa-check text-success"></i>';
          echo '</h3>';
        echo '</div>';
        
        //<!-- AO OBTER UM ERRO -->
        echo '<div id="display-modal-error" style="display: none;">';
          echo '<h3><i class="fas fa-exclamation-triangle text-danger"></i></h3>';
          echo '<h4>Erro ao cadastrar '.utf8_encode(ucfirst(strtolower($tela))).':</h4>';
        echo '</div>';
        
      echo '</div>';

    echo '</div>';
  echo '</div>';

echo '</div>';
//<!-- End Modal -->

  }

}
?>