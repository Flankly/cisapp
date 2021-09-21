<style>
label{
    font-weight: bold;
}
</style>

<?php
 $id = $_GET['id'];

 $sql = "SELECT * FROM tb_video WHERE vd_id = ?";
 $stmt = $db ->prepare ($sql); 
 $stmt->bindParam(1, $id);
 $stmt -> execute();
 $dados = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    foreach($dados as $d){
?>



<div class="card">
<div class="card-header">
<h3>Editar Video</h3>
</div>
<br>
<div class="container-sm">

<form method="post" action="editarvideoPOST.php">
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Titulo do Video </label>
    <div class="col-sm-10">
      <input type="name" class="form-control form-control-sm" id="colFormLabelSm" name="titulo" value="<?php echo $d['vd_titulo']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Link do Video</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="link" value="<?php echo $d['vd_link']; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipo de Video</label>
    <div class="col-sm-10">
      <select class="form-control form-control-sm" name="tipovd">
      <option value="Activa" <?php echo ($d['vd_tipo'] == "live")? "selected": null;?>>Live</option>
      <option value="Desactivada" <?php echo ($d['vd_tipo'] == "Normal")? "selected": null;?>>Normal</option>
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