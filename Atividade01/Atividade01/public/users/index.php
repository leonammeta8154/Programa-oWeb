<html>

<head>
  <title>Usuário</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
  <h1>Cadastro de Usuários</h1>
  <h3>Lista</h3>

  <table>
    <tr>
      <th>Email</th>
      <th>Nome</th>
      <th>Sobrenome</th>
    </tr>
    <tr>
      <td>marcio@gmail.com</td>
      <td>Márcio</td>
      <td>Andrade</td>
    <tr>
      <td>andre@gmail.com</td>
      <td>André</td>
      <td>Silva</td>
    <tr>
      <td>carla@gmail.com</td>
      <td>Carla</td>
      <td>Peixoto</td>
    <tr>
      <td>regina@gmail.com</td>
      <td>Regina</td>
      <td>Oliva</td>
    <tr>
      <td>roberta@gmail.com</td>
      <td>Robarta</td>
      <td>Trindade</td>
    </tr>

  </table>
  <BR>
  <BR>

  <h3>Formulário</h3>

  <form name="form1" method="post" action="enviar.php">
    <p>Email:
      <input name="email" type="text" id="email">
    </p>
    <p>Nome:
      <input name="nome" type="text" id="nome">
    </p>
    <p>Sobrenome:
      <input name="sobrenome" type="text" id="sobrenome">
    </p>
    <p>Senha:<br>
      <textarea name="senha" wrap="VIRTUAL" id="senha"></textarea>
    </p>
    <p>Confirmação de Senha:<br>
      <textarea name="confirmSenha" wrap="VIRTUAL" id="confirmSenha"></textarea>
    </p>
    <p>
      <input type="submit" name="Submit" value="Enviar">
    </p>
  </form>
</body>

</html>