<?php


// Escode erros NOTICE
error_reporting(E_ERROR | E_WARNING | E_PARSE);



/**
 * Conecta ao banco e cria o schema (tabela Usuários)
 */
include_once('app/Models/Banco.php');
Banco::createSchema();

/**
 * Cria uma instância do controlador para uso
 */
include_once('app/controllers/LoginController.php');
$loginController = new LoginController();

include_once('app/controllers/HomeController.php');
$homeController = new HomeController();


include_once('app/controllers/ObraController.php');
$obraController = new ObraController();

include_once('app/controllers/CriticaController.php');
$criticaController = new CriticaController();


if(isset($_POST['critica/method'])) {

$criticaController->inserir();

}

else if(isset($_POST['obra/excluir'])) {

    $obraController->excluir();
}

else if(isset($_POST['critica/excluir'])) {

    $criticaController->excluir();
}

else if(isset($_GET['obra/imagem'])) {

    $obraController->imagem($_GET['obra/imagem']);
}


else if (isset($_GET['Obra'])) {


    switch ($_GET['Obra']) {
        case 'inserir':
            $obraController->inserir();
            break;
        case 'consultar':
            $obraController->consultar();
            break;
        default:
            $controller->login();
    }
} else if (isset($_GET['Home'])) {

    switch ($_GET['Home']) {
        case 'index':
            $homeController->index();
            break;
    }
} else if (isset($_GET['home/buscarObraPorCategoria'])) {

    $homeController->consultarObraPorCategoria($_GET['home/buscarObraPorCategoria']);
} else if (isset($_GET['Obra/detalhe'])) {



    $obraController->detalhe($_GET['Obra/detalhe']);
} else if (isset($_GET['Obra/consultarPorTitulo'])) {

    $obraController->consultarPorTitulo($_GET['Obra/consultarPorTitulo']);
} else if (isset($_GET['Critica'])) {

    switch ($_GET['Critica']) {
        case 'inserir':
            $criticaController->inserir();
            break;
        default:
            $controller->login();
    }
} else if (isset($_GET['Critica/consultar'])) {
    $criticaController->consultar($_GET['Critica/consultar']);
} else if (isset($_GET['User'])) {
    switch ($_GET['User']) {
        case 'register':
            $loginController->register();
            break;
        case 'info':
            $loginController->info();
            break;
        case 'listar':
            $loginController->listar();
            break;
        case 'sair':
            $loginController->sair();
            break;
        default:
            $loginController->login();
    }
} else {
    $loginController->login();
}
