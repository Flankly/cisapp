<style>
label{
    font-weight: bold;
}
</style>



<div class="card">
<div class="card-header">
<h3>Adicionar Usuario</h3>
</div>
<br>
<div class="container-sm">

<form>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nome </label>
    <div class="col-sm-10">
      <input type="name" class="form-control form-control-sm" id="colFormLabelSm" name="nome" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email </label>
    <div class="col-sm-10">
      <input type="email" class="form-control form-control-sm" id="colFormLabelSm" name="email" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Profissão </label>
    <div class="col-sm-10">
      <input type="name" class="form-control form-control-sm" id="colFormLabelSm" name="profissao">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Morada </label>
    <div class="col-sm-10">
      <input type="name" class="form-control form-control-sm" id="colFormLabelSm" name="morada">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Contactos</label>
    <div class="col-sm-10">

    <div class="form-row">
    <div class="form-group col-md-6">
      <input type="number" class="form-control form-control-sm" id="inputEmail4" min="0" name="contacto1" >
    </div>
    <div class="form-group col-md-6">
      <input type="number" class="form-control form-control-sm" id="inputPassword4" min="0" name="contacto2" >
    </div>
  </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Estado da Conta</label>
    <div class="col-sm-10">
      <select class="form-control form-control-sm">
      <option></option>
      <option value="Activa">Activa</option>
      <option value="Desactivada">Inactiva</option>
      </select>
    </div>
  </div>
  
  <input type="submit" value="Adicionar" name="adicionar" class="btn btn-info">
  

</form>

</div>
<br>
</div>




</div>