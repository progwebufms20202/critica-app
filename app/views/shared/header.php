<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include('app/views/head.php') ?>
</head>

<body">
  <header class="headerNav">
    <div class="header">
      <div class="menu">
        <a href="index.php?Home=index" class="header-actions"><img class="logoNav" src="publico/imgs/logo_free-file.png" />
        </a>
        <button class="buttonNav header-actions" onClick="menubar();">
          <img id="hamburger" src="publico/imgs/hamburger-menu-solid-512.png" />
        </button>
      </div>

      <div class="search">
        <input id="inputSearch" type="text" placeholder="Search" />
      </div>
      <?php if (!isset($_SESSION['user'])) { ?>
        <div id="auth-nav" class="flex">
          <a href="index.php?User=register" class="header-actions">Registre-se </a>
          <div class="separator"></div>
          <a href="index.php?User=login" class="header-actions">Login </a>
        </div>
      <?php } else { ?>
        <div id="perfil-nav" class="flex">
          <img onclick="dropdownPerfil()" src="publico/imgs/unnamed.png" alt="">
          <ul>
            <li id="nome-nav"><?= $_SESSION['user']->nome ?></li>
            <li ><?= $_SESSION['user']->email ?></li>
            <li><a href="index.php?User=sair"> sair -></a></li>
          </ul>
        </div>
      <?php } ?>
    </div>
  </header>
  <nav id="nav">
    <div id="nav-container">
      <a href="index.php?Obra=inserir"><button title="cadastro de filmes séries ou livros" class="buttonClass btnCinza">
          Cadastrar Obra
        </button></a>
      <a href="index.php?home/buscarObraPorCategoria=Filme"><button class="buttonClass btnCinza">Filmes</button></a>
      <a href="index.php?home/buscarObraPorCategoria=Livro"><button class="buttonClass btnCinza">Livros</button></a>
      <a href="index.php?home/buscarObraPorCategoria=Serie"><button class="buttonClass btnCinza">Séries</button></a>
    </div>
  </nav>

  <script type="text/javascript" src="publico/scripts/header.js"></script>