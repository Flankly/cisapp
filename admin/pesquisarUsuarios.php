<br>
<?php
if (extract($_POST)) {
    $pesq = $_POST['pesq'];
}
?>
<div class="card" style="padding:10px;">
    <div class="row">
        <div class="col-md-5">
        <form class="" method="post" action="?p=pes">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="" aria-label="Search" name="pesq" required>
        &nbsp;
          <input class="btn btn-navbar btn-danger btn-sm" type="submit" value="Pesquisar"> 
        </div>
    </form>
        </div>

        <div class="col-md-5">
            <div class="text-right">
                <a href="?p=adicionarusuario" data-toggle='tooltip' data-placement='top' title='Adicionar Usuario'><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Adicionar</a>
            </div>
        </div>
    </div>
</div>
<br>
<!--div da tabela-->
<div class="card" style="padding:10px;">



    <?php

    //visualizar dados da tabela usuario
    $sql = "select * from tb_usuario inner join tb_login on id_us = us_id where us_nome like '%$pesq%' ";
    $stmt = $db->prepare($sql);
    #$stmt->bindParam(1, $pesq);
    $stmt->execute();

    $verificacao = $stmt->rowCount();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($verificacao < 1) {
        echo "<center><h3>Sem Registros</h3></center>";
    } else {

        echo "<table class='table table-striped table-sm'>
        <thead class='bg-info'>
          <tr>
            <th scope='col'>Nome</th>
            <th scope='col'>Email</th>
            <th scope='col'>Contactos</th>
            <th scope='col'>Estado da conta</th>
            <th scope='col'>Data de Registro</th>
            <th scope='col'>Ultimo Acesso</th>
            <th scope='col'>Acção</th>
          </tr>
        </thead>";

        echo "<tbody>";
        foreach ($dados as $d) {
            echo "<tr style='font-size:12px;'>";
            echo "<td>" . $d['us_nome'] . "</td>";
            echo "<td>" . $d['us_email'] . "</td>";
            echo "<td>" . $d['us_contact1'] . "/" . $d['us_contact2'] . "</td>";
            echo "<td>" . $d['lo_estado'] . "</td>";
            echo "<td>" . $d['us_created'] . "</td>";
            echo "<td>" . $d['us_created'] . "</td>";
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