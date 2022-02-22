<?php 
include_once(DIR_RAIZ."/mvc/controller/conection.php");
include_once(DIR_RAIZ."/mvc/view/funcs/doCards.php");
 ?>
<!-- MODAL SUBMIT -->
<div class="modal fade" id="display-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- TÍTULO -->
      <div class="modal-header" align="center">
        <h4>Cadastro de membro</h4>
        <button id="butclosemodal" style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>

      <div class="modal-body text-center"><!-- AO SUBMETER - LOADDING -->
        <div id="display-modal-loading" style="display: none;">
          <h3>Cadastrando Membro...<br>
            <i class="fa fa-spinner fa-pulse text-success"></i>
          </h3>
        </div>
        <!-- AO OBTER SUCESSO -->
        <div id="display-modal-success" style="display: none;">
          <h3>Membro cadastrado com sucesso!<br>
            <i class="fas fa-check text-success"></i>
          </h3>
        </div>
        
        <!-- AO OBTER UM ERRO -->
        <div id="display-modal-error" style="display: none;">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i></h3>
          <h4>Erro ao cadastrar membro:</h4>
        </div>

        <!-- CASOS ESPECIAIS - NÃO DELETAR -->
        <div id="display-modal-specials-success" style="display: none;">
          <h4><i class="fas fa-envelope text-success"></i>
          E-mail contendo a senha e usuário enviado com sucesso!</h4>
        </div>

        <div id="display-modal-specials-error" style="display: none;">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i></h3>
          <h4>Erro enviar e-mail contendo dados de login para o novo membro!</h4>
          <h6>Acesse o cadastro no novo membro e tente o reenvio!</h6>
        </div>
        <!-- FIM CASOS ESPECIAIS - NÃO DELETAR -->
      </div>

    </div>
  </div>

</div>
<!-- End Modal -->
<form id="formok" style="width: 95%" method="post" role="form" post="../mvc/controller/membro_cadastra.php" spec="true">
  <!-- <form style="width: 100%" method="post" action="../mvc/controller/cadastra_membro.php"> -->
    <div class="form-row">

      <!-- COLUNA DADOS -->
      <div class="col-lg-11 col-md-11 col-sm-12" style="margin-bottom: 50px;">
        <h3><i class="fa fa-users"></i><i class="fa fa-plus"></i> Cadastro de Membro</h3>

        <hr style="width: 100%">

        <div class="form-row">
          <div style="float: left; width: 70%;">
            <span style="color: gray; font-size: 0.8em; margin: 0; padding: 0;"><i class="fas fa-exclamation-circle"></i> Campos obrigatórios <span style="color: red;">*</span></span><br>
          </div>
        </div>
        <!-- NOME/SOBRENOME -->
        <div class="form-row">
          <div class="form-group col-lg-4 col-md-5 col-sm-12">

            <label for="nome"><i class="fas fa-user-tag"></i> Nome <span style="color: red;">*</span></label>
            <input type="text" class="form-control greenShadow bordersquared" id="nome" name="nome" placeholder="Nome" maxlength="20" required="true">
          </div>
          <div class="form-group col-lg-8 col-md-7 col-sm-12">
            <label for="sobrenome"><i class="fas fa-user-tag"></i> Sobrenome <span style="color: red;">*</span></label>
            <input type="text" class="form-control greenShadow bordersquared" id="snome" name="snome" placeholder="Sobrenome" maxlength="50" required="true">
          </div>
        </div>
        <!-- CONTATO -->
        <div class="form-row">
          <div class="form-group col-lg-7 col-md-6 col-sm-12">
            <label for="email"><i class="fas fa-envelope"></i> E-mail <span style="color: red;">*</span></label>
            <input type="email" class="form-control greenShadow bordersquared" id="email" name="email" placeholder="exemplo@email.com" maxlength="50" required="true">
          </div>
          <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label for="celular"><i class="fas fa-phone"></i><i class="fas fa-mobile-alt"></i> Telefone</label>
            <input type="text" class="form-control greenShadow bordersquared" id="telefone" name="tel" autocomplete="off" placeholder="(00) 0000-0000" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$">
            
          </div>
        </div>
        <!-- ENDERECO -->
        <hr>
        <div class="form-row">
          <div class="form-group col-lg-7 col-md-6 col-sm-12">
            <label for="logradouro"><i class="fas fa-road"></i> Logradouro</label>
            <input type="text" class="form-control greenShadow bordersquared" id="logradouro" name="logradouro" placeholder="R. Nossa Sra Aparecida" maxlength="50">
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-6">
            <label for="numero"><i class="fas fa-home"></i> Número</label>
            <input type="text" class="form-control greenShadow bordersquared" id="numero" name="numero" placeholder="12" maxlength="7" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-lg-7 col-md-7">
            <label for="bairro"><i class="fas fa-map-marked-alt"></i> Bairro</label>
            <input type="text" class="form-control greenShadow bordersquared" id="bairro" name="bairro" placeholder="Centro" maxlength="20" >
          </div>
          <div class="form-group col-lg-3 col-md-4">
            <label for="cep"><i class="fas fa-map-marker-alt"></i> CEP</label>
            <input type="text" class="form-control greenShadow bordersquared" id="cep" name="cep" placeholder="00000-000" pattern="[0-9]{5}-[0-9]{3}">
            
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-lg-7 col-md-6 col-sm-6">
            <label for="cidade"><i class="fas fa-building"></i> Cidade <span style="color: red;">*</span></label>
            <input type="text" class="form-control greenShadow bordersquared" id="cidade" name="cidade" required="true" maxlength="30">
          </div>
          <div class="form-group col-lg-2 col-md-3 col-sm-3">
            <label for="estado"><i class="fas fa-flag"></i> Estado</label>
            <select id="estado" name="estado" class="form-control greenShadow bordersquared">
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
            </select>
          </div>
        </div>
      </div>
      <!-- FIM COLUNA DADOS -->

      
      <!-- OUTROS -->
      <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 50px;">
        <div class="form-row">
          <h3><i class="fas fa-cogs"></i> Outras configurações</h3>
          <hr>
        
        <div style="width: 49%; margin-left: 1%; margin-bottom: 20px;" class="dropdown">
          <button class="wid100 btn btn-success dropdown-toggle bordersquared ddcheck" type="button" id="dropdownMenuButtonVertente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vertente</button>
          <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton">
            <?php doCards::doVertOp() ?>
            <!-- <li class="dropdown-item">
              <input class="form-check-input" type="checkbox" id="vert1">
              <label class="form-check-label" for="vert1">Teste1</label>
            </li> -->
          </div>
        </div>
      </div>

      <!-- SELECTS -->
      <div class="form-row">
        <div class="halfdiv">
          <label for="cargo"><i class="fas fa-user-tie"></i> Cargo</label>
          <select style="height: 30px;" id="cargo" name="cargo" class="form-control greenShadow bordersquared smalltxtsize">
                <?php 
                  $sql = "select * from cargo";
                  //echo 'SQL => '.$sql;
                  $con = Conexao::getInstance()->prepare($sql);
                  $con->execute();
                  $row = $con->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($row as $mem) {
                    doCards::doCargoOption($mem['idCargo'], $mem['nome'], 0);
                  }//fecha forech
                ?>
          </select>
        </div>

        <div class="halfdiv">
          <label for="freelancer"><i class="fas fa-handshake"></i> Freelancer</label>
          <select style="height: 30px;" id="freelancer" name="freelancer" class="form-control greenShadow bordersquared smalltxtsize">
            <option selected value="0">N</option>
            <option value="1">S</option>
          </select>
        </div>

      </div>

      <div class="form-row" <?php if($_SESSION['user_access'] < 3){ echo 'style="display: none;"';}?>>
        <div class="halfdiv">
          <label for="nivelAcesso"><i class="fas fa-user-tag"></i> Nível de Acesso</label>
          <select style="height: 30px;" id="nivelAcesso" name="nivelAcesso" class="form-control greenShadow bordersquared smalltxtsize">
            <option selected value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </div>
        <div class="halfdiv">
          <label for="nivelAcesso"><i class="fas fa-star"></i> Nível Afinidade</label>
          <select style="height: 30px;" id="nivelAfinidade" name="nivelAfinidade" class="form-control greenShadow bordersquared smalltxtsize afinidadeselec">
            <option selected value="1">&#xf005;</option>
            <option value="2">&#xf005;&#xf005;</option>
            <option value="3">&#xf005;&#xf005;&#xf005;</option>
            <option value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
            <option value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
          </select>
        </div>
      </div>
    <!-- FIM SELECTS -->
    </div>
    <!-- FIM OUTROS -->
    <div class="col-lg-1 col-md-1 col-sm-12"><vl></div>
    <!-- COLUNA USUARIO -->
      <div class="col-lg-5 col-md-5 col-sm-12" style="margin-bottom: 50px;">

        <!-- CADASTRO DE USUARIO -->
        <div class="form-row">
        <h3><i class="fas fa-user-plus"></i> Cadastro de Login</h3>
        <hr style="width: 100%">


          <div class="form-group col-7">
            <label for="senha"><i class="fas fa-lock"></i> Senha <i data-toggle="tooltip" data-placement="top" title="Ao cadastrar, esta senha é encaminhada via e-mail para o e-mail cadastrado." style="color: darkgreen;" class="fas fa-question-circle"></i></label>
            <input type="password" class="form-control greenShadow bordersquared" id="senha" name="senha" readonly="true">
          </div>

          <div class="form-group col-1">
            <label for="botaogerarr"><br></label>
            <button type="button" class="btn btn-success bordersquared" id="botaoGerar" onclick="gerarSenha();">Gerar</button>
          </div>
      </div>
      <!-- FIM CADASTRO USUARIO -->
    <hr>
    <!-- BOTÃO CONFIRMAR -->
    <button type="submit" class="btn btn-lg btn-success btn-block bordersquared"><i class="fas fa-user-plus"></i> Cadastrar</button>
  </div>
  <!-- FIM COLUNA USUARIO -->

</div>
</form>