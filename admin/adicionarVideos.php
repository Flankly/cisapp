<style>
  label {
    font-weight: bold;
  }
</style>

<!--erros reportados apos a inserção-->
<?php
if($erro=@$_GET['e']){
  if($erro == 'cadastrado'){echo "<div class='alert alert-success' role='alert'>Video cadastrado com sucesso!</div>";}
  if($erro == 'existente'){echo "<div class='alert alert-warning' role='alert'>Este video já se encontra cadastrado</div>";}
  if($erro == 'ncadastrado'){echo "<div class='alert alert-danger' role='alert'>Algo deu errado, não cadastrado!</div>";}
}
?>


<div class="card">
  <div class="card-header">
    <h3>Adicionar Video</h3>
  </div>
  <br>
  <div class="container-sm">

    <form method="post" action="adicionarVideoPOST.php">
      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Titulo do Video</label>
        <div class="col-sm-10">
          <input type="name" class="form-control form-control-sm" id="colFormLabelSm" name="titulo" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Link do Video</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="link" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipo de Video</label>
        <div class="col-sm-10">
          <select class="form-control form-control-sm" name="tipovd" required>
            <option></option>
            <option value="live">Live</option>
            <option value="Normal">Normal</option>
          </select>
        </div>
      </div>
      <input type="hidden" name="tipo" value="Normal">
      <input type="submit" value="Adicionar" name="adicionar" class="btn btn-info">


    </form>

  </div>
  <br>
</div>




</div>