<style>
label{
    font-weight: bold;
}
</style>

<?php
 $id = $_GET['id'];

 $sql = "SELECT * FROM tb_usuario inner join tb_login on us_id=id_us WHERE us_id = ?";
 $stmt = $db ->prepare ($sql); 
 $stmt->bindParam(1, $id);
 $stmt -> execute();
 $dados = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    foreach($dados as $d){
?>



<div class="card">
<div class="card-header">
<h3>Editar Usuario</h3>
</div>
<br>
<div class="container-sm">

<form>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nome </label>
    <div class="col-sm-10">
      <input type="name" class="form-control form-control-sm" id="colFormLabelSm" name="nome" value="<?php echo $d['us_nome']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email </label>
    <div class="col-sm-10">
      <input type="email" class="form-control form-control-sm" id="colFormLabelSm" name="email" value="<?php echo $d['us_email']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Profissão </label>
    <div class="col-sm-10">
      <input type="name" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $d['us_profissao']; ?>" name="profissao">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Morada </label>
    <div class="col-sm-10">
      <input type="name" class="form-control form-control-sm" id="colFormLabelSm" name="morada" value="<?php echo $d['us_morada']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Contactos</label>
    <div class="col-sm-10">

    <div class="form-row">
    <div class="form-group col-md-6">
      <input type="number" class="form-control form-control-sm" id="inputEmail4" min="0" name="contacto1" value="<?php echo $d['us_contact1']; ?>" >
    </div>
    <div class="form-group col-md-6">
      <input type="number" class="form-control form-control-sm" id="inputPassword4" min="0" name="contacto2" value="<?php echo $d['us_contact2']; ?>" >
    </div>
  </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Estado da Conta</label>
    <div class="col-sm-10">
      <select class="form-control form-control-sm">
      <option value="Activa" <?php echo ($d['lo_estado'] == "Activa")? "selected": null;?>>Activa</option>
      <option value="Desactivada" <?php echo ($d['lo_estado'] == "Desactiva")? "selected": null;?>>Inactiva</option>
      </select>
    </div>
  </div>
  
  <input type="submit" value="Actualizar" name="actualizar" class="btn btn-success">
  

</form>

</div>
<br>
</div>

</div>

<?php
    }
    ?>