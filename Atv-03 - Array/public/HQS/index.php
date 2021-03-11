<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filmes</title>
</head>

<body>

  <?php

  $movies = array();

  $movies[] = array("titulo" => "X-MEN: A Saga da Fênix Negra",  "paginas" => "280", "idade" => "16+");
  $movies[] = array("titulo" => "WOLVERINE: INIMIGO DO ESTADO",       "paginas" => "312", "idade" => "18+");
  $movies[] = array("titulo" => "WOLVERINE: ARMA X",  "paginas" => "352", "idade" => "16+");
  $movies[] = array("titulo" => "X-MEN:Deus Ama, o Homem Mata",            "paginas" => "104", "idade" => "16+");
  $movies[] = array("titulo" => "X-MEN:Inferno", "paginas" => "276", "idade" => "18+");


  echo "<pre>";
  print_r($movies);
  echo "</pre>";

  ?>

</body>

</html>