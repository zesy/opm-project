<?php
/**
 * 
 */
class ModalSubmit
{
  /**
 * @tela = qual tabela é;
 * @spec = mensagem especial;
 * @specerro = mensagem de erro especial;
 */
  static function doModal($tela, $spec, $specerro){
    

    echo '<div class="modal fade" id="display-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" data-focus="true">';


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
              echo '<h3>Cadastrando '.utf8_encode(ucfirst(strtolower($tela))).'...<br>';
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

            //<!-- CASOS ESPECIAIS - NÃO DELETAR -->
            echo '<div id="display-modal-specials-success" style="display: none;">';
              echo '<h4>'.utf8_encode(ucfirst(strtolower($spec))).'</h4>';
            echo '</div>';

            echo '<div id="display-modal-specials-error" style="display: none;">';
              echo '<h4>'.utf8_encode(ucfirst(strtolower($specerro))).'</h4>';
            echo '</div>';
            //<!-- FIM CASOS ESPECIAIS - NÃO DELETAR -->
          echo '</div>';

        echo '</div>';
      echo '</div>';

    echo '</div>';
    //<!-- End Modal -->

  }

  static function doModalDel($tela){
    

    echo '<div class="modal fade" id="display-modal-del" tabindex="-1" role="dialog" aria-labelledby="modalLabel" data-focus="true">';


      echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
          //<!-- TÍTULO -->
          echo '<div class="modal-header" align="center">';
            echo '<h4>Cadastro de '.utf8_encode(ucfirst(strtolower($tela))).'</h4>';
            echo '<button id="butclosemodal" style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
          echo '</div>';

          echo '<div class="modal-body text-center">';
            //<!-- AO SUBMETER - LOADDING -->
            echo '<div id="display-modal-loading-del" style="display: none;">';
              echo '<h3>Excluindo '.utf8_encode(strtolower($tela)).'...<br>';
                echo '<i class="fa fa-spinner fa-pulse text-success"></i>';
              echo '</h3>';
            echo '</div>';
            //<!-- AO OBTER SUCESSO -->
            echo '<div id="display-modal-success-del" style="display: none;">';
              echo '<h3>'.utf8_encode(ucfirst(strtolower($tela))).' excluído com sucesso!<br>';
                echo '<i class="fas fa-check text-success"></i>';
              echo '</h3>';
            echo '</div>';
            
            //<!-- AO OBTER UM ERRO -->
            echo '<div id="display-modal-error-del" style="display: none;">';
              echo '<h3><i class="fas fa-exclamation-triangle text-danger"></i></h3>';
              echo '<h4>Erro ao excluir '.utf8_encode(ucfirst(strtolower($tela))).':</h4>';
            echo '</div>';
            
          echo '</div>';

        echo '</div>';
      echo '</div>';

    echo '</div>';
    //<!-- End Modal -->

  }

  static function doModalUpdate($tela){
    

    echo '<div class="modal fade" id="display-modal-update" tabindex="-1" role="dialog" aria-labelledby="modalLabel" data-focus="true">';


      echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
          //<!-- TÍTULO -->
          echo '<div class="modal-header" align="center">';
            echo '<h4>Cadastro de '.utf8_encode(ucfirst(strtolower($tela))).'</h4>';
            echo '<button id="butclosemodal" style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
          echo '</div>';

          echo '<div class="modal-body text-center">';
            //<!-- AO SUBMETER - LOADDING -->
            echo '<div id="display-modal-loading-update" style="display: none;">';
              echo '<h3>Atualizando '.utf8_encode(strtolower($tela)).'...<br>';
                echo '<i class="fa fa-spinner fa-pulse text-success"></i>';
              echo '</h3>';
            echo '</div>';
            //<!-- AO OBTER SUCESSO -->
            echo '<div id="display-modal-success-update" style="display: none;">';
              echo '<h3>'.utf8_encode(ucfirst(strtolower($tela))).' atualizado com sucesso!<br>';
                echo '<i class="fas fa-check text-success"></i>';
              echo '</h3>';
            echo '</div>';
            
            //<!-- AO OBTER UM ERRO -->
            echo '<div id="display-modal-error-update" style="display: none;">';
              echo '<h3><i class="fas fa-exclamation-triangle text-danger"></i></h3>';
              echo '<h4>Erro ao atualizar '.utf8_encode(strtolower($tela)).':</h4>';
            echo '</div>';
            
          echo '</div>';

        echo '</div>';
      echo '</div>';

    echo '</div>';
    //<!-- End Modal -->

  }


  static function doModalAjaxUpdate(){
    

    echo '<div class="modal fade" id="display-modal-ajax" tabindex="-1" role="dialog" aria-labelledby="modalLabel" data-focus="true">';


      echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';

          echo '<div class="modal-body text-center">';
            //<!-- TEXTO VIA AJAX -->
            //<!-- AO SUBMETER - LOADDING -->
            echo '<div id="display-modal-ajax-loading" style="display: none;">';
              echo '<h3>Atualizando<br>';
                echo '<i class="fa fa-spinner fa-pulse text-success"></i>';
              echo '</h3>';
            echo '</div>';

            echo '<div id="display-modal-ajax-success" style="display: none;"><h4>Imagem atualizada com sucesso!<br><i class="fas fa-check text-success"></i></h4></div>';
            echo '<div id="display-modal-ajax-error" style="display: none;"><h4>Erro ao atualizar Imagem</h4></div>';
          echo '</div>';

        echo '</div>';
      echo '</div>';

    echo '</div>';
    //<!-- End Modal -->

  }

}
?>