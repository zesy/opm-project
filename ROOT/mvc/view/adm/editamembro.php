<?php 
include_once(DIR_RAIZ."/mvc/controller/cargo_dao.php");
include_once(DIR_RAIZ."/mvc/controller/membro_dao.php");
include_once(DIR_RAIZ."/mvc/controller/user_dao.php");
include_once(DIR_RAIZ."/mvc/model/membro.php");
include_once(DIR_RAIZ."/mvc/model/user.php");
include_once(DIR_RAIZ."/mvc/view/funcs/doCards.php");
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');

$membrodao = new MembroDAO();
$cargodao = new CargoDao();
$userdao = new UserDAO();

if(!isset($_GET['idMembro'])){
  echo '<script type="text/javascript">window.location.replace("../perfil/membros.php");</script>';
}

$idm = $_GET['idMembro'];

$membro = new Membro();
$m_user = new User();
$membro = $membrodao->selectMembroById($idm);
if($membro == false)
  echo '<script type="text/javascript">window.location.replace("../perfil/membros.php");</script>';
$m_user = $userdao->selectUserById($membro->getIdUser());

?>

<!-- Modal Search Member -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body" align="center">
        <button style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <?php
        include("../mvc/view/adm/buscamembro.php");
        ?>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal Email -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" align="center">
        <button style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" style="width: 100%;" id="myModalLabel">Gerar nova senha:</h4>
      </div>
      <form id="updateMPass" method="post" role="form" post="../mvc/controller/user_updatePassByAdm.php" spec="false">
        <div class="modal-body">
          <div class="form-row row">
            <input type="hidden" name="idu" value="<?php echo $membro->getIdUser(); ?>">
            <input type="hidden" name="membronome" value="<?php echo $membro->getNome(); ?>">
            <input type="hidden" name="membroemail" value="<?php echo $membro->getEmail(); ?>">
            <div class="form-group">
              <input type="password" class="form-control greenShadow bordersquared" id="senha" name="pasenha" onlyread="true" value="xxxxxxxxx">
            </div>
            <div class="form-group">
              <span class="btn btn-success bordersquared" id="botaoGerar" onclick="gerarSenha();">Gerar Nova</span>
            </div>

          </div>

        </div>

        <hr class="colorgraph" />
        <div class="modal-footer bordersquared">
          <button type="button" class="btn btn-lg btn-success btn-block bordersquared" onclick="doFormUpdate('updateMPass')"><i class="far fa-envelope"></i> Enviar</button>
        </div>
      </form> 
    </div>
  </div>
</div>
<!-- End Modal -->
<?php 
ModalSubmit::doModal('membro', 'Membro Atualizado!', 'Erro ao Atualizar Membro!');
ModalSubmit::doModalUpdate('membro');
ModalSubmit::doModalDel('Membro');
 ?>
<form id="formupdate" style="width: 95%" method="post" role="form" post="../mvc/controller/membro_update.php" spec="false">

  <div class="form-row">

    <!-- COLUNA DADOS -->
    <div class="col-lg-11 col-md-11 col-sm-12" style="margin-bottom: 50px;">
      <div class="form-row">
        <div class="col-md-7">
          <h3><i class="far fa-address-card"></i> Dados de Membro</h3>
          <input type="hidden" name="idmembro" value="<?php echo $idm; ?>">
        </div>
        <!-- <div class="col-md-5" style="padding-right: 20px;">
          <div style="float: right; width: 45px;">
            <span class="btn btn-success btn-block bordersquared" data-toggle="modal" data-target="#memberModal"><i class="fas fa-search"></i></span>
          </div>
        </div> -->
      </div>
      <hr>

      <div class="form-row">
        <div style="float: left; width: 60%;">
          <span style="color: gray; font-size: 0.8em; margin: 0; padding: 0;"><i class="fas fa-exclamation-circle"></i> Campos obrigatórios <span style="color: red;">*</span></span><br>
        </div>
        <input type="hidden" name="checkvis" value="<?php echo $membro->getVisivel(); ?>">
        <div style="float: right; width: 15%;">
          <?php if($membro->getAtivo() == 1){ ?>
            <span class="badge badge-success"><i class="fas fa-user-check"></i> Ativo</span>
          <?php }
          else{?>
            <span class="badge badge-secondary"><i class="fas fa-user-clock"></i> Inativo</span>
          <?php } ?>
        </div>
        <div style="float: right; width: 15%;">
          <?php 
          if($membro->getVisivel() == 1){
            echo '<span class="badge badge-primary"><i class="far fa-eye"></i> Visível</span>';
          }
          else{
            echo '<span class="badge badge-secondary"><i class="far fa-eye-slash"></i> Não Visível</span>';
          }
          ?>
        </div>
      </div>
      <!-- NOME/SOBRENOME -->
      <div class="form-row">
        <div class="form-group col-lg-4 col-md-4 col-md-12">
          <label for="nome"><i class="fas fa-user-tag"></i> Nome <span style="color: red;">*</span></label>
          <input type="text" class="form-control greenShadow bordersquared" id="nome" placeholder="Nome" required="true" name="nome" value="<?php echo $membro->getNome(); ?>">
        </div>
        <div class="form-group col-lg-8 col-md-8 col-md-12">
          <label for="sobrenome"><i class="fas fa-user-tag"></i> Sobrenome <span style="color: red;">*</span></label>
          <input type="text" class="form-control greenShadow bordersquared" id="sobrenome" placeholder="Sobrenome" name="snome" required="true" value="<?php echo $membro->getSnome(); ?>">
        </div>
      </div>
      <!-- CONTATO -->
      <div class="form-row">
        <div class="form-group col-lg-7 col-md-7 col-md-12">
          <label for="email"><i class="fas fa-envelope"></i> E-mail <span style="color: red;">*</span></label>
          <input type="email" class="form-control greenShadow bordersquared" id="email" placeholder="exemplo@email.com" name="email" required="true" value="<?php echo $membro->getEmail(); ?>">
        </div>
        <div class="form-group col-lg-4 col-md-4 col-md-12">
          <label for="celular"><i class="fas fa-phone"></i><i class="fas fa-mobile-alt"></i> Telefone</label>
          <input type="text" class="form-control greenShadow bordersquared" id="telefone" name="tel" autocomplete="off" placeholder="(00) 0000-0000" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" value="<?php echo $membro->getTel(); ?>">
          <!-- <script type="text/javascript">
            $(document).ready(function() {
              $("#telefone").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", ],
                keepStatic: true
              });
            });
          </script> -->
        </div>
      </div>
      <!-- ENDERECO -->
      <hr>
      <div class="form-row">
        <div class="form-group col-lg-7 col-md-8 col-md-12">
          <label for="logradouro"><i class="fas fa-road"></i> Logradouro</label>
          <input type="text" class="form-control greenShadow bordersquared" id="logradouro" name="logradouro" placeholder="R. Nossa Sra Aparecida" value="<?php echo $membro->getLogradouro(); ?>">
        </div>
        <div class="form-group col-lg-3 col-md-3 col-md-12">
          <label for="numero"><i class="fas fa-home"></i> Número</label>
          <input type="text" class="form-control greenShadow bordersquared" id="numero" placeholder="12" name="numero" value="<?php echo $membro->getNumero(); ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-lg-7 col-md-7 col-md-12">
          <label for="bairro"><i class="fas fa-map-marked-alt"></i> Bairro</label>
          <input type="text" class="form-control greenShadow bordersquared" id="bairro" placeholder="Centro" name="bairro" value="<?php echo $membro->getBairro(); ?>">
        </div>
        <div class="form-group col-lg-3 col-md-3 col-md-12">
          <label for="cep"><i class="fas fa-map-marker-alt"></i> CEP</label>
          <input type="text" class="form-control greenShadow bordersquared" id="cep" name="cep" placeholder="00000-000" pattern="[0-9]{5}-[0-9]{3}" value="<?php echo $membro->getCep(); ?>">
          <!-- <script type="text/javascript">
            $(document).ready(function() {
              $("#cep").inputmask("99999-999");
            });
          </script> -->
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-lg-7 col-md-7 col-md-12">
          <label for="cidade"><i class="fas fa-building"></i> Cidade <span style="color: red;">*</span></label>
          <input type="text" class="form-control greenShadow bordersquared" id="cidade" required="true" name="cidade" value="<?php echo $membro->getCidade(); ?>">
        </div>
        <div class="form-group col-lg-2 col-md-3 col-md-12">
          <label for="estado"><i class="fas fa-flag"></i> Estado</label>
          <select id="estado" name="estado" class="form-control greenShadow bordersquared">
            <?php
            $estado = array("AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MG", "MS", "MT", "PA", "PB", "PE", "PI", "PR", "RJ", "RN", "RO", "RR", "RS", "SC", "SE", "SP", "TO");
            $suf = $membro->getEstado();
            foreach ($estado as $uf) {
              $op = (strcmp($uf, $suf) == 0) ? 'selected="true"':'';
              echo '<option '.$op.'value="'.$uf.'">'.$uf.'</option>';
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <!-- FIM COLUNA DADOS -->

    <!-- COLUNA OUTROS DADOS -->
    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 50px;">

      <div class="form-row" style="padding-left: 15px;">
        <!-- OUTROS -->
        <div class="form-row">
          <h4><i class="fas fa-cogs"></i> Outras configurações</h4>
          <hr style="width: 100%;">

          <div style="width: 49%; margin-left: 1%; margin-bottom: 20px;" class="dropdown">
            <button style="width: 100%;" class="btn btn-success dropdown-toggle bordersquared ddcheck" type="button" id="dropdownMenuButtonVertente" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vertente</button>
            <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuButton">
              <?php doCards::doMemberVert($_SESSION["user_id"]); ?>
            <!-- <li class="dropdown-item">
              <input class="form-check-input" type="checkbox" id="vert1">
              <label class="form-check-label" for="vert1">Teste1</label>
            </li> -->
            </div>
          </div>

        </div>
        <!-- fim outros? -->
        <!-- SELECTS -->
        <div class="form-row small wid100">

          <!-- CARGOS -->
          <input type="hidden" name="cargohidden" value="<?php echo $membro->getIdCargo(); ?>">
          <div class="halfdiv">
            <label for="cargo"><i class="fas fa-user-tie"></i> Cargo</label>
            <select style="height: 30px;" id="cargo" name="cargo" class="form-control greenShadow bordersquared smalltxtsize">
              <?php 
              $row = $cargodao->selectAllCargo();
              foreach ($row as $mem) {
                doCards::doCargoOption($mem['idCargo'], $mem['nome'], $membro->getIdCargo());
                }//fecha forech
                ?>
              </select>
            </div> 

            <!-- FREELANCER -->
            <div class="halfdiv">
              <label for="freelancer"><i class="fas fa-handshake"></i> Freelancer</label>
              <select style="height: 30px;" id="freelancer" name="freelancer" class="form-control greenShadow bordersquared smalltxtsize">
                <?php
                $fn = ($membro->getFreelancer() == 1) ? '' : 'selected';
                $fs = ($membro->getFreelancer() == 1) ? 'selected' : '';
                ?>
                <option <?php echo $fn; ?> value="0">N</option>
                <option <?php echo $fs; ?> value="1">S</option>
              </select>
            </div>

          </div>
          <!-- HALF SELECT -->
          <div class="form-row small wid100" <?php if($_SESSION['user_access'] < 3){ echo 'style="display: none;"';}?> >

            <!-- NÍVEL DE ACESSO -->
            
            <div class="halfdiv">
              <label for="nivelAcesso"><i class="fas fa-user-check"></i> Nível de Acesso</label>
              <select style="height: 30px;" id="nivelAcesso" name="nivelAcesso" class="form-control greenShadow bordersquared smalltxtsize">
                <?php
                for($i = 1; $i <= 3; $i++){
                  $nas = ($i == $m_user->getNaccess()) ? 'selected' : '';
                  echo '<option '.$nas.' value="'.$i.'">'.$i.'</option>';
                }
                ?>
              </select>
            </div>

            <!-- NÍVEL DE AFINIDADE -->
            <input type="hidden" name="nafihidden" value="<?php echo $membro->getNivelAfinidade(); ?>">
            <div class="halfdiv">
              <label for="nivelAfinidade"><i class="fas fa-star"></i> Nível Afinidade</label>
              <select style="height: 30px;" id="nivelAfinidade" name="nivelAfinidade" class="form-control greenShadow bordersquared smalltxtsize afinidadeselec">
                <?php 
                $ico = '';
                for($i = 1; $i <= 5; $i++){

                  $nafs = ($i == $membro->getNivelAfinidade()) ? 'selected' : '';
                  $ico.='&#xf005;';
                  echo '<option '.$nafs.' value="'.$i.'">'.$ico.'</option>';
                }
                ?>
              </select>
            </div>

          </div>
          <!-- FIM SELECTS -->
          <hr>
          <!-- BOTÃO CONFIRMAR -->
          <div class="form-row wid100">
            <!-- BOTÃO ATIVA/EXLUIR -->
            <div class="form-group col-md-12">
              <?php
              if($membro->getAtivo() == 1){
                $txt = 'Inativar';
                $btn = 'secondary';
                $ico = 'fa-user-clock';
              }
              else{
                $txt = 'Ativar';
                $btn = 'success';
                $ico = 'fa-user-check';
              }
              ?>
              <span style="float: left; width: 49%; margin: 0;" class="btn btn-lg btn-<?php echo $btn; ?> btn-block bordersquared" onclick="confirmUpdate(<?php echo $membro->getId(); ?>, 'membro')"><i class="fas <?php echo $ico; ?>"></i> <?php echo $txt; ?></span>

              <span style="float: right; width: 49%; margin: 0;" class="btn btn-lg btn-danger btn-block bordersquared" onclick="confirmDel(<?php echo $membro->getId(); ?>, 'membro')"><i class="fas fa-user-times"></i> Remover</span>

            </div>
            <!-- FIM BOTÃO ATIVA/EXCLUIR -->

            <button type="submit" class="btn btn-lg btn-success btn-block bordersquared"><i class="fas fa-save"></i> Salvar</button>
          </div>

        </div>

      </div>
      <!-- FIM COLUNA OUTROS DADOS -->
      <div class="col-1"></div>
      <!-- CADASTRO DE USUARIO -->
      <div class="col-lg-5 col-md-5 col-sm-12" style="margin-bottom: 50px;">
        <div class="form-row">
          <div class="form-group" style="margin-bottom: 30px;">
          <h3><i class="fas fa-lock"></i> Senha de Login</h3>
          <hr>

            <div class="form-group">

              <div>
                <span style="margin-left: 10px;" class="btn btn-info bordersquared" id="botaoEnviarEmail" data-toggle="modal" data-target="#emailModal"><i class="fas fa-key"></i> Gerar Nova Senha</span>
              </div>
            </div>
          
          </div>
        </div>
      </div>
      <!-- FIM CADASTRO USUARIO -->
    </div>
  </form>