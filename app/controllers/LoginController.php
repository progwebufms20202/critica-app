<?php


require_once 'app/models/Usuario.php';
require_once 'app/controllers/Controller.php';


class LoginController extends Controller
{

    /**
     * @var Usuario armazena o usuário logado no momento.
     */
    private $loggedUser;

    
    function __construct()
    {
        
   
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            
            $usuario = Usuario::buscar($_POST['email']);
            print_r('teste');
            if (!is_null($usuario) && $usuario->igual($_POST['email'], $_POST['senha'])) {
                $_SESSION['user'] = $this->loggedUser = $usuario;
            }


            if ($this->loggedUser) {
                header('Location: index.php?acao=cadastrarObras');
            } else {
                header('Location: index.php?email=' . $_POST['email'] . '&mensagem=Usuário e/ou senha incorreta!');
            }
        } else {
            if (!$this->loggedUser) {
                $this->view('users/login');
            } else {
                header('Location:index.php?Home=index');
            }
        }
    }

 
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Usuario($_POST['email'], $_POST['senha'], $_POST['nome']);

            if ($_POST['senha'] != $_POST['confirmarsenha']) {
                header('Location:index.php?User=register&mensagem=senhas desiguais');
            } else {

                try {
                    $user->salvar();
                    header('Location:index.php?email=' . $_POST['email'] . '&mensagem=Usuário cadastrado com sucesso!');
                } catch (PDOException $erro) {
                    header('Location:index.php?User=register&mensagem=Email já cadastrado!');
                }
            }
        }

        $this->view('users/register');
    }

  
    public function info()
    {
        if (!$this->loggedUser) {
            header('Location:index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');
            return;
        }
        $this->view('users/info', $this->loggedUser);
    }

   
    public function sair()
    {
        if (!$this->loggedUser) {
            header('Location:index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');
            return;
        }
        session_destroy();
        header('Location:index.php?mensagem=Usuário deslogado com sucesso!');
    }


    public function listar()
    {
        
        $usuarios = Usuario::buscarTodos();

      
        $this->view('users/listar', $usuarios);
    }
}
