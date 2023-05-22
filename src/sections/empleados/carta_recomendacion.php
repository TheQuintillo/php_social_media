<?php
include "../../db.php";

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT *,(SELECT nombredelpuesto
    FROM puestos
    WHERE puestos.id=empleados.idpuesto limit 1) as puesto
    FROM empleados WHERE id=:id");
    $sentencia = $conexion->prepare("SELECT * FROM `empleados` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $primernombre = $registro["primernombre"];
    $segundonombre = $registro["segundonombre"];
    $primerapellido = $registro["primerapellido"];
    $segundoapellido = $registro["segundoapellido"];
    $foto = $registro["foto"];
    $cv = $registro["cv"];
    $idpuesto = $registro["idpuesto"];
    $puesto = $registro["puesto"];
    $fechadeingreso = $registro["fechadeingreso"];

    $nombreCompleto = $primernombre . " " . $segundonombre . " " . $primerapellido . " " . $segundoapellido;
    $fechaInicio = new DateTime($fechadeingreso);
    $fechaFin = new DateTime(date('y-m-d'));
    $diferencia = date_diff($fechaInicio, $fechaFin);
    print_r($puesto);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carta de recomendacion</title>
</head>

<body>
  <h1>Carta de recomendación laboral</h1>
  <br /><br />
  España, Málaga a <strong> 01/04/2023 </strong>
  <br /><br />
  A quien pueda interesar:
  <br /><br />
  Reciba un cordial y respetuoso saludo.
  <br /><br />
  A través de estas líneas deseo hacer de su conocmiento que la/el Sr(a) <strong> <?php echo $nombreCompleto ?>
  </strong>,
  quien laboró en mi organización durante <strong> <?php echo $diferencia->y ?> años(s) </strong>
  es un ciudadano con una conducta intachable. Ha demostrado ser un gran trabajador,
  comprometido, responsable y fiel cumplidor de sus tareas.
  Siempre ha manifestado preocupación por mejorar, capacitarse y actualizar sus conocimientos.
  <br /><br />
  Durante estos años se ha desempeñado como: <strong> <?php echo $puesto; ?> </strong>
  Es por ello le sugiero considere esta recomendación, con la confianza de que estará siempre a la altura de sus
  compromisos y responsabilidades.
  <br /><br />
  Sin más nada a que referirme y, esperando que esta misiva sea tomada en cuenta, dejo mi número de contacto para
  cualquier información de interés.
  <br /><br /><br /><br /><br /><br /><br /><br />
  Atentamente,
  <br />
  Ing. José Martinez Uh

</body>

</html>