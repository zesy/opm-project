<?php
$visiveltt = "Quando selecionado você fica visível na página de membros.";
include_once(DIR_RAIZ."/mvc/model/membro.php");
include_once(DIR_RAIZ."/mvc/controller/membro_dao.php");
$membrodao = new MembroDAO();
$membro = new Membro();
$membro = $membrodao->selectMembroByUser($_SESSION['user_id']);
// echo "".($_SESSION['user_id']);
// echo var_dump($membro);
?>
<!-- MODAL SUBMIT -->
<div class="modal fade" id="display-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- TÍTULO -->
      <div class="modal-header" align="center">
        <h4>Atualização de Cadastro</h4>
        <button id="butclosemodal" style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>

      <div class="modal-body text-center">
        <!-- AO SUBMETER - LOADDING -->
        <div id="display-modal-loading" style="display: none;">
          <h3>Atualizando...<br>
            <i class="fa fa-spinner fa-pulse text-success"></i>
          </h3>
        </div>
        <!-- AO OBTER SUCESSO -->
        <div id="display-modal-success" style="display: none;">
          <h3>Atualizado!<br>
            <i class="fas fa-check text-success"></i>
          </h3>
        </div>

        <!-- AO OBTER UM ERRO -->
        <div id="display-modal-error" style="display: none;">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i></h3>
          <h4>Erro ao atualizar cadastro:</h4>
        </div>

        <!-- CASOS ESPECIAIS - NÃO DELETAR -->
        <div id="display-modal-specials-success" style="display: none;">
          <!-- <h4>Ops... isso não deveria aparecer!</h4> -->
        </div>

        <div id="display-modal-specials-error" style="display: none;">
          <h4>Ops... isso não deveria aparecer!</h4>
        </div>
        <!-- FIM CASOS ESPECIAIS - NÃO DELETAR -->
      </div>

    </div>
  </div>

</div>
<!-- End Modal -->
<div class="row" style="padding: 0; padding-right: 10px;">
  <div class="form-row col-12">

    <!-- COLUNA DADOS -->
    <div class="col-md-12"">
      <form id="formok" style="width: 100%" method="post" role="form" post="../mvc/controller/membro_update.php">
        <div class="form-row">
          <div style="float: left; width: 55%;">
            <h3><i class="fa fa-user-tie"></i> Meu Perfil</h3>
            <div style="display: none;">
              <input type="text" name="idmembro" value="<?php echo $membro->getId();?>">
            </div>
          </div>
          <div style="float: right; width: 37%;">
            <button type="submit" class="btn btn-success btn-block bordersquared"><i class="fas fa-save"></i> Salvar Alterações</button>
          </div>
        </div>

        <hr style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
        
        <div class="form-row">

          <div style="float: left; width: 75%;">
            <span style="color: gray; font-size: 0.8em; margin: 0; padding: 0;"><i class="fas fa-exclamation-circle"></i> Campos obrigatórios <span style="color: red;">*</span></span><br>
          </div>

          <div style="float: right; width: 25%;">
            <input class="form-check-input greenShadow" type="checkbox" name="checkvis" id="checkvis"<?php
            if ($membro->getVisivel())
              echo 'checked';
            ?>>
            <label class="form-check-label" for="checkvis">Visível <i data-toggle="tooltip" data-placement="top" title="<?php echo $visiveltt;?>" style="color: darkgreen;" class="fas fa-question-circle"></i></label>
          </div>
        </div>

        <!-- NOME/SOBRENOME -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nome"><i class="fas fa-user-tag"></i> Nome <span style="color: red;">*</span></label>
            <input type="text" class="form-control greenShadow bordersquared" id="nome" name="nome" placeholder="Nome" required="true" <?php
            echo 'value="'.$membro->getNome().'"';
            ?>>
          </div>
          <div class="form-group col-md-8">
            <label for="sobrenome"><i class="fas fa-user-tag"></i> Sobrenome <span style="color: red;">*</span></label>
            <input type="text" class="form-control greenShadow bordersquared" id="sobrenome" name="snome" placeholder="Sobrenome" required="true"<?php
            echo 'value="'.$membro->getSnome().'"';
            ?>>
          </div>
        </div>

        <!-- CONTATO -->
        <div class="form-row">
          <div class="form-group col-md-7">
            <label for="email"><i class="fas fa-envelope"></i> E-mail <span style="color: red;">*</span></label>
            <input type="email" class="form-control greenShadow bordersquared" id="email" name="email" placeholder="exemplo@email.com" required="true" <?php
            echo 'value="'.$membro->getEmail().'"';
            ?>>
          </div>
          <div class="form-group col-md-4">
            <label for="celular"><i class="fas fa-phone"></i><i class="fas fa-mobile-alt"></i> Telefone</label>
            <input type="text" class="form-control greenShadow bordersquared" id="telefone" name="tel" autocomplete="off" placeholder="(00) 0000-0000" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" <?php
            echo 'value="'.$membro->getTel().'"';
            ?>>
          </div>
        </div>

        <!-- ENDERECO -->
        <div class="form-row">
          <div class="form-group col-md-7">
            <label for="logradouro"><i class="fas fa-road"></i> Logradouro</label>
            <input type="text" class="form-control greenShadow bordersquared" id="logradouro" name="logradouro" placeholder="R. Nossa Sra Aparecida" <?php
            echo 'value="'.$membro->getLogradouro().'"';
            ?>>
          </div>

          <div class="form-group col-md-3">
            <label for="numero"><i class="fas fa-home"></i> Número</label>
            <input type="text" class="form-control greenShadow bordersquared" id="numero" name="numero" placeholder="12" <?php
            echo 'value="'.$membro->getNumero().'"';
            ?>>
          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-7">
            <label for="bairro"><i class="fas fa-map-marked-alt"></i> Bairro</label>
            <input type="text" class="form-control greenShadow bordersquared" id="bairro" name="bairro" placeholder="Centro" <?php
            echo 'value="'.$membro->getBairro().'"';
            ?>>
          </div>

          <div class="form-group col-md-3">
            <label for="cep"><i class="fas fa-map-marker-alt"></i> CEP</label>
            <input type="text" class="form-control greenShadow bordersquared" id="cep" name="cep" placeholder="00000-000" pattern="[0-9]{5}-[0-9]{3}" <?php
            echo 'value="'.$membro->getCep().'"';
            ?>>
          </div>

        </div>

        <div class="form-row">

          <div class="form-group col-md-7">
            <label for="cidade"><i class="fas fa-building"></i> Cidade <span style="color: red;">*</span></label>
            <input type="text" class="form-control greenShadow bordersquared" id="cidade" name="cidade" required="true" <?php
            echo 'value="'.$membro->getCidade().'"';
            ?>>
          </div>

          <div class="form-group col-md-2">
            <label for="estado"><i class="fas fa-flag"></i> Estado</label>
            <select id="estado" name="estado" class="form-control greenShadow bordersquared">
              <?php

              $estado = array("AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MG", "MS", "MT", "PA", "PB", "PE", "PI", "PR", "RJ", "RN", "RO", "RR", "RS", "SC", "SE", "SP", "TO");
              $suf = $membro->getEstado();
              foreach ($estado as $uf) {
                $op = ($uf == $suf) ? 'selected="true"':'';
                echo '<option '.$op.'value="'.$uf.'">'.$uf.'</option>';
              }
              ?>
                <!-- 
                <option selected value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AM">AM</option>
                <option value="AP">AP</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MG">MG</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="PR">PR</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="RS">RS</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="SP">SP</option>
                <option value="TO">TO</option>
              -->
            </select>
          </div>

        </div>

        <hr>
      </form>
    </div>

    <!-- FIM COLUNA DADOS -->

      <!-- COLUNA USUARIO --
      <div class="col-md-5" style="border-right: 1px solid lightgray; padding-right: 20px; padding-left: 20px;">
        <h5><i class="fas fa-cogs"></i> Outras Configurações</h5><br>
        <!- OUTROS --
        <div class="form-row">
          <div style="width: 49%; margin-right: 1%;" class="dropdown">
            <button style="width: 100%;" class="btn btn-success dropdown-toggle bordersquared ddcheck" type="button" id="dropdownMenuButtonInstrumento" data-toggle="dropdown" ari a-haspopup="true" aria-expanded="false">Instrumento</button>
            <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-item">
                <input class="form-check-input" type="checkbox" id="instru1">
                <label class="form-check-label" for="instru1">Teste1</label>
              </li>
              <li class="dropdown-item">
                <input class="form-check-input" type="checkbox" id="instru2">
                <label class="form-check-label" for="instru2">Teste2</label>
              </li>
              <li class="dropdown-item">
                <input class="form-check-input" type="checkbox" id="instru3">
                <label class="form-check-label" for="instru3">Teste3</label>
              </li>
            </div>
          </div>

          <div style="width: 49%; margin-left: 1%;" class="dropdown">
            <button style="width: 100%;" class="btn btn-success dropdown-toggle bordersquared ddcheck" type="button" id="dropdownMenuButtonVertente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vertente</button>
            <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-item">
                <input class="form-check-input" type="checkbox" id="vert1">
                <label class="form-check-label" for="vert1">Teste1</label>
              </li>
              <li class="dropdown-item">
                <input class="form-check-input" type="checkbox" id="vert2">
                <label class="form-check-label" for="vert2">Teste2</label>
              </li>
              <li class="dropdown-item">
                <input class="form-check-input" type="checkbox" id="vert3">
                <label class="form-check-label" for="vert3">Teste3</label>
              </li>
            </div>
          </div>

        </div>
        <!- FIM OUTROS -->
        <!-- FIM COLUNA USUARIO --><!-- BOTÃO CONFIRMAR -->

      </div>

    </div>