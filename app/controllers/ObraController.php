<?php

require_once 'app/models/Critica.php';
require_once 'app/models/Obra.php';
require_once 'app/controllers/Controller.php';

/**
 * Controlador do login.
 */
class ObraController extends Controller
{


    function __construct()
    {
    }

    public function inserir()
    {



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {





            if (isset($_SESSION['user'])) {




                $imagemname = NULL;
                if (isset($_FILES["imagem"])) {

                    $imagemname = isset($_FILES["imagem"]) ? time() . '-' . $_FILES["imagem"]["name"] : NULL;

                    $target_dir = "publico/servidor/";
                    $target_file = $target_dir . basename($imagemname);

                    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
                }



                $dt = DateTime::createFromFormat('d/m/Y', $_POST['dataLancamento'])->format('d M Y');
                $obra = new Obra(

                    $_POST['titulo'],
                    isset($_POST['duracao']) && $_POST['duracao'] != "" ? (int)$_POST['duracao'] : 0,
                    $_POST['genero'],
                    $dt,
                    $_POST['classificacaoIndicativa'],
                    $_POST['enredo'],
                    $imagemname,
                    $_POST['categoria'],
                    $_SESSION['user']->email,
                    isset($_POST['episodios']) && $_POST['episodios'] != "" ? (int)$_POST['episodios'] : 0,
                    isset($_POST['temporadas']) && $_POST['temporadas'] != "" ? (int)$_POST['temporadas'] : 0,
                    isset($_POST['paginas']) && $_POST['paginas'] != "" ? (int)$_POST['paginas'] : 0,
                );


                try {
                    $obra->salvar();



                    header('Location:index.php?Home=index&success=Cadastrado com sucesso');
                } catch (PDOException $erro) {
                    header('Location:index.php?Home=index&error=Ocorreu algum erro');
                }
            } else {

                header('Location:index.php?mensagem=Você precisa estar logado para executar esta ação');
            }
        }

        $this->view('obras/inserir');
    }



    public function consultar()
    {

        // TODO - Implementar sua lógica

        $obras = Obra::buscarTodos();


        $this->view('obras/consultar', $obras);
    }

    public function consultarPorTitulo(string $titulo)
    {

        $obras = Obra::buscarPorNome($titulo);

        $this->view('obras/consultar', $obras);
    }






    public function detalhe(int $id)
    {

        $obra = Obra::buscarPorID($id);

        $criticas = Critica::buscarPorObra($id);



        $data = [$obra, $criticas];



        $this->view('obras/detalhe', $data);
    }


    public function excluir()
    {

        try {
            $url = $_SERVER['REQUEST_URI'];           
             $obra = Obra::buscarPorID($_POST['obraID']);
            Obra::excluir($_POST['obraID']);

            unlink('publico/servidor/' . $obra->imagem);            

           if($obra->categoria == 'Serie')
           header('Location:'.$url.'&success=Serie excluída com sucesso');
           else 
           header('Location:'.$url.'&success='.$obra->categoria.' excluído com sucesso');
        } catch (PDOException $erro) {

            header('Location:'.$url.'&error=Ocorreu algum erro');
        }
    }

    public function imagem(int $id)
    {
        $obra = Obra::buscarPorID($id);

        Header("Content-type: image/jpg");
        echo $obra->imagem;
    }
}
