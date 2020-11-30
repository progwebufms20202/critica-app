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

           
           
            $imagemname = NULL;
                if (isset($_FILES["imagem"])) {
                   
                    $imagemname = isset($_FILES["imagem"]) ? time() . '-' .$_FILES["imagem"]["name"] : NULL ;                     
                 
                    $target_dir = "publico/servidor/";
                    $target_file = $target_dir . basename($imagemname);                
              
                    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
                }
            
              
            
            if (isset($_SESSION['user'])) {
           
           
                $dt = DateTime::createFromFormat('d/m/Y',$_POST['dataLancamento'])->format('d M Y'); 
                
                $obra = new Obra(
                    $_POST['titulo'],
                    $_POST['duracao'],
                    $_POST['genero'],                                
                    $dt,
                    $_POST['classificacaoIndicativa'],
                    $_POST['enredo'],
                    $imagemname,
                    $_POST['categoria'],
                    $_SESSION['user']->email
                );

             
                header('Location:index.php?Home=index');
                try {
                    $obra->salvar();       
                         
                } catch (PDOException $erro) {                    
                    print_r($erro);
                }
            }
            else {   
                             
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
        $obra = Obra::buscarPorID($_POST['obraID']);
        Obra::excluir($_POST['obraID']);
        
        unlink('publico/servidor/'.$obra->imagem );

       

        header('Location:index.php?home=index');
    }

    public function imagem(int $id) 
    {
        $obra = Obra::buscarPorID($id);

        Header( "Content-type: image/jpg");
	    echo $obra->imagem;

    }


    





}