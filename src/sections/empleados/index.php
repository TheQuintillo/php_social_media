<?php
include "../../db.php";

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT foto,cv FROM `empleados` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    if (isset($registro_recuperado["foto"]) && $registro_recuperado["foto"] != "") {
        if (file_exists("../../media/img/" . $registro_recuperado["foto"])) {
            unlink("../../media/img/" . $registro_recuperado["foto"]);
        }
    }
    if (isset($registro_recuperado["cv"]) && $registro_recuperado["cv"] != "") {
        if (file_exists("../../media/cv/" . $registro_recuperado["cv"])) {
            unlink("../../media/cv/" . $registro_recuperado["cv"]);
        }

    }

    $sentencia = $conexion->prepare("DELETE FROM empleados WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");

}

$sentencia = $conexion->prepare("SELECT *,
(SELECT nombredelpuesto
FROM puestos
WHERE puestos.id=empleados.idpuesto limit 1) as puesto
FROM `empleados`");
$sentencia->execute();
$lista_empleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include "../../templates/header.php";?>
<br />
<div class="card">
  <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="create.php" role="button">
      Agregar registro
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="tabla_id">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Foto</th>
            <th scope="col">CV</th>
            <th scope="col">Puesto</th>
            <th scope="col">Fecha de ingreso</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lista_empleados as $registro) {?>
          <tr class="">
            <td><?php echo $registro['id']; ?>
            </td>
            <td scope="row">
              <?php echo $registro['primernombre'] ?>
              <?php echo $registro['segundonombre'] ?>
              <?php echo $registro['primerapellido'] ?>
              <?php echo $registro['segundoapellido'] ?>

            </td>
            <td><img width="50" src="../../media/img/<?php echo $registro['foto']; ?>" alt="">

            </td>
            <td><a href="../../media/cv/<?php echo $registro['cv']; ?>"><?php echo $registro['cv']; ?></a>

            </td>
            <td><?php echo $registro['puesto']; ?>
            </td>
            <td><?php echo $registro['fechadeingreso']; ?>
            </td>
            <td>
              <a name="" id="boton_carta" class="btn btn-primary"
                href="carta_recomendacion.php?txtID=<?php echo $registro['id']; ?>" role="button">Carta</a>
              <a class="btn btn-primary" href="update.php?txtID=<?php echo $registro['id']; ?>" role="button">Editar</a>
              <a class="btn btn-danger" href="index.php?txtID=<?php echo $registro['id']; ?>" role="button">Eliminar</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include "../../templates/footer.php";?>