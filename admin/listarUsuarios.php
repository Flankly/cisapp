<br>
<div class="card" style="padding:10px;">
  <div class="row">
    <div class="col-md-5">
      <div class="navbar-nav mr-auto mt-2 mt-lg-0">
        <form class="form-inline ml-3" method="post" action="?p=pes">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="" aria-label="Search" name="pesq" required>
            &nbsp;
            <input class="btn btn-navbar btn-danger btn-sm" type="submit" value="Pesquisar">
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-5">
      <div class="text-right">
        <a href="?p=adicionarusuario" data-toggle='tooltip' data-placement='top' title='Adicionar Usuario'><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Adicionar</a>
      </div>
    </div>
  </div>
</div>
<br>
<!--erros reportados apos a edição e deletação kkk-->
<?php
if($erro=@$_GET['e']){
  if($erro == ''){echo "<div class='alert alert-success' role='alert'>Usuario cadastrado com sucesso!</div>";}
  if($erro == ''){echo "<div class='alert alert-warning' role='alert'>Este usuario já se encontra cadastrado</div>";}
  if($erro == ''){echo "<div class='alert alert-danger' role='alert'>Algo deu errado, não cadastrado!</div>";}
}
?>
<!--div da tabela-->
<div class="card" style="padding:10px;">

  <table class="table table-striped table-sm">
    <thead class="bg-info">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Contactos</th>
        <th scope="col">Data de Registro</th>
        <th scope="col">Ultimo Acesso</th>
        <th scope="col">Acção</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //visualizar dados da tabela usuario
      $sql = "select * from tb_usuario left join tb_acesso on us_email = ac_nome group by us_nome order by ac_id desc";
      $stmt = $db->prepare($sql);
      $stmt->execute();

      $verificacao = $stmt->rowCount();
      $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($verificacao < 1) {
        echo "<h3>Sem Cadastro</h3>";
      } else {


        foreach ($dados as $d) {
          echo "<tr style='font-size:12px;'>";
          echo "<td>" . $d['us_nome'] . "</td>";
          echo "<td>" . $d['us_email'] . "</td>";
          echo "<td>" . $d['us_contact1'] . "/" . $d['us_contact2'] . "</td>";
          echo "<td>" . $d['us_created'] . "</td>";
          echo "<td>" . $d['ac_created']. "</td>";
          echo "<td>
            <a href='?p=editarusuario&id=" . $d['us_id'] . "' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-edit'></i></a> &nbsp;
            <a href='?p=informacao&id=" . $d['us_id'] . "' data-toggle='tooltip' data-placement='top' title='Informação'><i class='fa fa-info' aria-hidden='true'></i></a>&nbsp;
            <a  data-toggle='tooltip' data-placement='top' title='Apagar'><i class='fa fa-times' aria-hidden='true'></i></a>
            </td>";
          echo "</tr>";
        }
      }
      ?>

    </tbody>
  </table>

  <style>
    tr:hover {
      color: blue;

    }
  </style>

</div>