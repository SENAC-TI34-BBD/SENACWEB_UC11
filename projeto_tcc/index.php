<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" type="image/x-icon" href="assets/imgs/favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
    <title>TravelNow - Seu próximo Destino</title>
  </head>
  <body>
    <div class="index-body">
    <header class="menu-container">
      <div class="logo">
        <a href="index.php"
          ><img src="./assets/imgs/logo_normal.png" width="250px" alt="Logo"
        /></a>
      </div>
      <nav class="menu">
        <ul class="menu-list">
          <li>
            <a href="index.html" class="menu-item" id="menu-selected">Home</a>
          </li>
          <li><a href="match.html" class="menu-item">Seu Match</a></li>
          <li><a href="destinos.html" class="menu-item">Destinos</a></li>
          <li><a href="contato.html" class="menu-item">Contato</a></li>
        </ul>
      </nav>
      <?php if (isset($_SESSION["id"]) and isset($_SESSION["nome"])) {
        echo "<div id='dados-usuario'>";
        echo "Bem vindo " . $_SESSION["nome"] . "<br>";
        echo "<a href='./content/logout.php'>Sair</a><br>";
        echo "</div>";
      } else {
        echo "<div class='login-area'>";
        echo "<button type='button' name='btnLogin' class='btnLogin' data-toggle='modal' data-target='#modalLogin'> Login </button>";
        echo "</div>";
      } ?>
      </div>
    </header>
    <div
      class="modal fade"
      id="modalLogin"
      data-backdrop="static"
      data-keyboard="true"
    >
      <div class="modal-dialog modal-xl modal-dialog-centered" id="loginModal">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modal-title-font">Login / Registre-se</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body">
            <div class="areas-modal">
              <div class="area-login">
                <form id="login-usuario-form">
                <span id="msgAlertErroLogin"></span>
                <div class="signin-input">
                  <label for="user"
                    >E-mail: <br /><input
                      type="text"
                      name="user"
                      id="user"
                      required /></label
                  ><br />
                  </div>
                  <div class="signin-input">
                  <label for="password"
                    >Senha: <br />
                    <input
                      type="password"
                      name="password"
                      id="password"
                  /></label>
                  </div>
                  <a href="recuperar-senha.html">Esqueceu sua senha?</a><br />
                  <br />
                  <button type="submit" name="login" class="logarBtn" id="login-usuario-btn">
                    Login
                  </button>
                </form>
              </div>
              <div class="area-register">
                <h4 class="title-registre">Não possui conta?</h4>
                <br />
                <p class="text-registre">
                  Registre-se agora mesmo e tenha acesso a todos os nossos
                  destinos!
                </p>
                <br />
                <a
                  href="signup.html"
                  rel="noopener noreferrer"
                  >Registre-se</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/script.js"></script>
    <footer class="site-footer">
      <nav class="menu-footer">
        <h3 class="title-navegacao">Navegação</h3>
        <ul class="menu-list-footer">
          <li>
            <a href="index.html" class="menu-item-footer">Home</a>
          </li>
          <li><a href="match.html" class="menu-item-footer">Seu Match</a></li>
          <li><a href="destinos.html" class="menu-item-footer">Destinos</a></li>
          <li><a href="contato.html" class="menu-item-footer">Contato</a></li>
        </ul>
      </nav>
      <div class="copy-box">
        <p class="copy-text">
          &copy; Todos direitos reservados a <b>TravelNow - Igor Sardinha.</b>
        </p>
      </div>
    </footer>
    </div>
  </body>
</html>