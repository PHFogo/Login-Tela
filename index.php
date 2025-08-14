<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ibas Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="tela-login">
    <h1> Login </h1>
    <?php
      $usuariosFile = 'usuarios.json';
      $usuarios = [];
      if (file_exists($usuariosFile)) {
        $usuarios = json_decode(file_get_contents($usuariosFile), true);
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"] ?? '';
        $senha = $_POST["senha"] ?? '';
        $encontrado = false;
        foreach ($usuarios as $u) {
          if ($u['usuario'] === $usuario && $u['senha'] === $senha) {
            $encontrado = true;
            break;
          }
        }
        if ($encontrado) {
          header("Location:pag/afterlogin.php");
          exit;
        } else {
          echo "<p style='color:yellow;'>Usuário ou senha incorretos!</p>";
        }
      }
    ?>
    <form method="POST" action="">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <br><br>
      <input type="password" name="senha" placeholder="Senha" required>
      <br><br>
      <button type="submit">LOGAR</button>
      <br><br>
      <a><a href="pag/cadastro.php" class="cadastro-link">Não tem uma conta? Cadastre-se</a></a>
    </form>
  </div>
</body>
</html>