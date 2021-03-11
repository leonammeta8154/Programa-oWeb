<!DOCTYPE html>
<html>

<head>
  <title>Formulário Contato</title>
  <meta charset="utf-8" />
  <link href="style.css" rel="stylesheet" media="all" />
</head>

<body>
  <form name="meu_form" method="post">

    <h2>Formulario de Contato</h2>

    <table>
      <tbody>
        <tr>
          <td align="right">Nome Completo</td>
          <td><input type="text" id="nome" name="nome" required></td>
        </tr>
        <tr>
          <td align="right">Email</td>
          <td><input type="email" id="email" name="email"></td>
        </tr>
        <tr>
          <td align="right">Assunto</td>
          <td><input type="text" id="assunto" name="assunto" required></td>
        </tr>
        <tr>
          <td align="right">Opções</td>
          <td>
            <select id="itens" name="itens">
              <option value="1">item_1 da lista</option>
              <option value="2">item_2 da lista</option>
              <option value="3">item_3 da lista</option>
              <option value="4">item_4 da lista</option>
            </select>
          </td>
        </tr>

        <tr>
          <td align="right">Sexo</td>
          <td>
            <input type="radio" id="male" name="sexo" value="masculino">
            <label for="masculino">Masculino</label>
            <input type="radio" id="female" name="sexo" value="feminino">
            <label for="feminino">Feminino</label>
          </td>
        </tr>
        <tr>

        <tr>
          <td align="right">Mensagem</td>
          <td>
            <textarea id="mensagem" name="Mensagem"></textarea><br>

            <input type="submit" class="enviar" value="ENVIAR">
          </td>
        </tr>

      </tbody>
    </table>

  </form>

  <div id="resultado">
    <?php

    if (isset($_POST)) {
      $nome = isset($_POST['nome']) ? $_POST['nome'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $assunto = isset($_POST['assunto']) ? $_POST['assunto'] : false;

      echo '<h1>Nome:' . $nome . '</h1>';
      echo '<h1>Email:' . $email . '</h1>';
      echo '<h1>Assunto:' . $assunto . '</h1>';
    }
    ?>
  </div>
</body>

</html>