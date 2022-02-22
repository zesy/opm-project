<form style="width: 100%">
  <!-- Modal Search Member -->
  
  <div class="form-row">
          <h4 class="modal-title" style="width: 100%;" id="buscarModalLabel">Buscar</h4>
          <div style="width: 100%;">
            <input type="text" style="float: left; width: 80%;" class="form-control greenShadow bordersquared" id="searchnome" placeholder="Digite" required="false">

            <button type="button" style="float: right; width: 20%;" class="btn btn-success btn-block bordersquared" ><i class="fas fa-search"></i></button>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Instrumento</th>
                <th style="width: 45px;"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              for($i = 0; $i < 1; $i++){
                include("dadosmembro.php");
              }
              ?>
            </tbody>
          </table>
    </div>
  </form>