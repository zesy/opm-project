<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<style type="text/css">
.input-group-text{
  font-size: 1.5em;
}
</style>
<div style="width: 100%" class="form-row">

  <!-- DIV -->
  <div class="col-md-12">
    <h3><i class="far fa-star"></i> Repertórios</h3>
    <hr>
  </div>
  <div class="form-row col-md-5">
    <!-- ADD -->
    <div class="col-md-12">
      <input type="text" id="nespet" name="espet" class="form-control bordersquared greenShadow" placeholder="Nome Repertório" style="float: left; width: 60%;" />
      <button class="btn btn-success btn-block bordersquared" style="float: right; width: 40%;"><i class="fas fa-plus"></i> Novo</button>
    <!-- FIM ADD -->

    <!-- TABELA CARGOS -->
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Repertório</th>

          <th style="width: 30px; margin: 0; padding: 0;"></th>
          <th style="width: 30px; margin: 0; padding: 0;"></th>
        </tr>
      </thead>
      <tbody>
        <tr class="td-pad5px">
          <td></td>
          <td>
            <button class="btn btn-sm btn-primary btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></button>
          </td>
          <td>
            <button class="btn btn-sm btn-danger btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- FIM TABLEA -->

    </div>
  </div>
  <div class="col-md-1"></div>
  <div class="form-row col-md-6" style="border-left: 1px solid lightgray;">
    <!-- ADD CARGOS -->
    <div class="col-md-12">
      <h4>< ESPEC > - Set List</h4>
      <hr>
      <select id="aMusica" placeholder="Musica" class="form-control noradius greenShadow" required="true" style="float: left; width: 80%;">
              <option value="Asd" name="aInstru">Música</option>
              <option value="Asdd" name="aInstru">Música 2</option>
      </select>
      <button class="btn btn-success btn-block bordersquared" style="float: right; width: 20%;">Add <i class="fas fa-plus"></i></button>
    <!-- FIM ADD -->

    <!-- TABELA ué -->
    <div id="divSetlist" class="wid100">
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="width: 50%;">Música</th>
          <th style="width: 50%;">Autor</th>
          <th style="width: 30px;"><div class="btn-instru" data-toggle="tooltip" data-placement="top" title="Partitura"><img src="../img/instruments/partitura_icone.png"></div></th>
        </tr>
      </thead>
      <tbody>
        <tr class="td-pad5px">
          <td></td>
          <td></td>
          <td>
            <button class="btn btn-sm btn-primary btn-block bordersquared" data-toggle="tooltip" data-placement="top" title="Buscar Partituras"><i class="fas fa-chevron-right"></i></button>
          </td>
        </tr>

      </tbody>
    </table>
    </div>
    <!-- FIM TABLEA -->
    </div>

  </div>
</div>