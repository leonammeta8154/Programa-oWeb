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

  $rate[] = array("titulo" => "X-MEN: A Saga da Fênix Negra",  "nota" => "9.5");
  $rate[] = array("titulo" => "WOLVERINE: INIMIGO DO ESTADO",       "nota" => "10.0");
  $rate[] = array("titulo" => "WOLVERINE: ARMA X",  "nota" => "9.5");
  $rate[] = array("titulo" => "X-MEN:Deus Ama, o Homem Mata",            "nota" => "9.5");
  $rate[] = array("titulo" => "X-MEN:Inferno", "nota" => "9.2");


  echo "<pre>";
  print_r($rate);
  echo "</pre>";

  ?>

</body>

</html>