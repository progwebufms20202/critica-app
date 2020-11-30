<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('app/views/head.php') ?>
  <title>Register</title>

  <head>

  <body>
    <main class="container">
      <section id="register-page" class="content auth">
        <a href="index.php?Home=index">
          <img class="logo" src="publico/imgs/logo-amarela.png" alt="" />
        </a>
        <form method="POST">
          <?php require 'app/views/alert.php'?>
          <input class="regular-input" id="name" name="nome" type="text" placeholder="Nome" pattern=".{4,}" required  autocomplete="off" />
          <input class="regular-input" id="email" type="email" name="email" placeholder="email" required  autocomplete="off"/>
          <input class="regular-input" type="password" id="password" name="senha" type="password" placeholder="Senha" pattern=".{4,}" required   autocomplete="off"/>
          <input class="regular-input" type="password" id="password" name="confirmarsenha" type="password" placeholder="Confirmar senha" pattern=".{4,}" required   autocomplete="off"/>
          <button class="btn-primary" class="submit">Criar conta</button>
        </form>
        <a href="index.php?User=login" class="auth-a">Já possuo Conta</a>
      </section>
    </main>
  </body>

</html>