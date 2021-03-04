<html>

<head>
  <title>Filmes</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
  <h1>Cadastro de Filmes</h1>
  <h3>Lista</h3>

  <table>
    <tr>
      <th>Título</th>
      <th>Duração</th>
      <th>Categoria</th>
    </tr>
    <tr>
      <td>Mulher-Maravila</td>
      <td>01:40</td>
      <td>Ação</td>
    <tr>
    <tr>
      <td>O Rei Leão</td>
      <td>01:30</td>
      <td>Infantil</td>
    <tr>
    <tr>
      <td>Nasce Uma Estrela</td>
      <td>01:40</td>
      <td>Romance</td>
    <tr>
    <tr>
      <td>Logan</td>
      <td>01:50</td>
      <td>Ação</td>
    <tr>
    <tr>
      <td>Um Lugar Silencioso</td>
      <td>01:30</td>
      <td>Suspence</td>
    <tr>


  </table>
  <BR>
  <BR>

  <h3>Formulário</h3>

  <form name="form1" method="post" action="enviar.php">
    <p>Título:
      <input name="titulo" type="text" id="titulo">
    </p>
    <p>Duração:
      <input name="duracao" type="text" id="duracao">
    </p>
    <p>Categoria:
      <input name="categoria" type="text" id="categoria">
    </p>
    <p>Trailer:<br>
      <input name="trailer" type="text" id="trailer">
    </p>
    <p>
      <input type="submit" name="Submit" value="Enviar">
    </p>
  </form>
</body>

</html>