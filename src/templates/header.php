<?php
session_start();
$url_base = "http://localhost/php/client/src/";
if (!isset($_SESSION['logueado'])) {
    header("Location:" . $url_base . "login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#" aria-current="page">Sitema <span
            class="visually-hidden">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base ?>sections/empleados/">Empleados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base ?>sections/puestos/
">Puestos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base ?>sections/usuarios/
">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base ?>cerrar.php
">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
  <main class="container">