<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('app/views/head.php') ?>
  <title>Login</title>

  <head>

  <body>
    <main class="container">
      <section id="login-page" class="content auth">
        <a href="index.php?Home=index">
          <img class="logo" src="publico/imgs/logo-amarela.png" alt="" />
        </a>
        <form method="POST">
          <?php require 'app/views/alert.php' ?>
          <input class="regular-input" placeholder="E-mail" id="email" name="email" type="text"  autocomplete="off"/>
          <input type="password"  class="regular-input"  placeholder="Senha" id="senha" name="senha"  autocomplete="off"/>
          <button class="btn-primary" type="submit">Entrar</button>
        </form>
        <a href="index.php?User=register" class="auth-a">Não possuo Conta</a>
      </section>
    </main>    
  </body>

</html>