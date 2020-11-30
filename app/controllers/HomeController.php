<?php 

require_once 'app/models/Obra.php';
require_once 'app/controllers/Controller.php';


class HomeController extends Controller  {
   
    
   
    function __construct() {    
    
    }
       
    public function index() {
        $obras = Obra::buscarUltimosLancamentos();

        
              
        $this->view('home/index', $obras);
    }

    public function consultarObraPorCategoria(string $categoria) {
        
        
        $obras = Obra::buscarPorCategoria($categoria);              
         
        $this->view('obras/consultar', $obras);   
    }
    


   
}

?>