<?php

require_once 'app/models/Critica.php';
require_once 'app/controllers/Controller.php';


class CriticaController extends Controller
{



    function __construct()
    {
    }



    public function inserir()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            if (isset($_SESSION['user'])) {
                $critica = new Critica(
                    $_POST['titulo'],
                    $_POST['comentario'],
                    $_POST['nota'],
                    $_SESSION['user']->nome,
                    $_SESSION['user']->email,
                    (new DateTime())->format('d/m/Y'),
                    $_POST['obraID'],
                    
                );
                try {
                

                    $critica->salvar();


                    header('Location: index.php?Obra/detalhe=' . $_POST['obraID']);
                } catch (PDOException $erro) {
                    echo 'Exceção Capturada: ', $erro;
                }
            } else {
                header('Location:index.php?mensagem=Você precisa estar logado para executar esta ação');
            }
        }

        $this->view('critica/inserir');
    }



    public function consultar(int $obraID)
    {
       


        $criticas = Critica::buscarPorObra($obraID);


        $this->view('critica/consultar', $criticas);
    }



    public function excluir()
    {

        Critica::excluir($_POST['criticaID']);


        header('Location: index.php?Obra/detalhe=' . $_POST['obraID']);
    }
}
