<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avaliação</title>
</head>

<body>

  <?php

  $rate = array();

  $rate[] = array("titulo" => "Mulher-Maravila",  "nota" => "8.45");
  $rate[] = array("titulo" => "O Rei Leão",       "nota" => "9.20");
  $rate[] = array("titulo" => "Mulher-Maravila",  "nota" => "7.30");
  $rate[] = array("titulo" => "Logan",            "nota" => "9.20");
  $rate[] = array("titulo" => "Lugar Silenciose", "nota" => "8.30");


  echo "<pre>";
  print_r($rate);
  echo "</pre>";

  ?>

</body>

</html>