<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorias</title>
</head>

<body>

  <?php

  $categories = array();

  $categories[] = array("id" => 01,   "nome" => "Ação");
  $categories[] = array("id" => 02,   "nome" => "Suspense");
  $categories[] = array("id" => 03,   "nome" => "Romance");
  $categories[] = array("id" => 04,   "nome" => "Adulto");
  $categories[] = array("id" => 05,   "nome" => "Comédia");

  echo "<pre>";
  print_r($categories);
  echo "</pre>";

  ?>

</body>

</html>