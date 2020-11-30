<?php

include_once("Banco.php");

/**

*/
class Obra {


      /**
    * @var int 
    */
    private $obraID;

    
    /**
    * @var string 
    */
    private $titulo;

    
    /**
    * @var int 
    */
    private $duracao;

        /**
    * @var string 
    */
    private $genero;


    
        /**
    * @var string 
    */
    private $dataLancamento;


            /**
    * @var int 
    */
    private $classificacaoIndicativa;

              /**
    * @var string 
    */
    private $enredo;

        /**
    * @var string 
    */
    public $emailUsuario;
    


    /**
    * @var string  
    */
    private $imagem;

    /**
    * @var string 
    */
    private $categoria;

    /**
    *  
    */
    function __construct(
        string $titulo, 
    int $duracao, 
    string $genero,
    string $dataLancamento, 
    int $classificacaoIndicativa, 
    string $enredo, 
    string $imagem, 
    string $categoria,
    string $emailUsuario )
    {
        $this->titulo = $titulo;
        $this->duracao = $duracao;
        $this->genero = $genero;
        $this->dataLancamento = $dataLancamento;
        $this->classificacaoIndicativa = $classificacaoIndicativa;
        $this->enredo = $enredo;
        $this->imagem = $imagem;
        $this->categoria = $categoria;
        $this->emailUsuario = $emailUsuario;
    
    }

    /**
    *  Método mágico para acessar todos os campos
    */
    public function __get($campo) {
        return $this->$campo;
    }

    /**
    *  Método mágico para modificar todos os campos
    */
    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }



    public function salvar() {
        
        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Obra (titulo, 
        duracao, genero,
        dataLancamento, classificacaoIndicativa, 
        enredo, imagem, categoria, emailUsuario)
         VALUES (:titulo, :duracao, :genero, :dataLancamento, :classificacaoIndicativa,
        :enredo, :imagem, :categoria, :emailUsuario)');
    
       
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':duracao', $this->duracao);
        $stmt->bindValue(':genero', $this->genero);
        $stmt->bindValue(':dataLancamento', $this->dataLancamento);
        $stmt->bindValue(':classificacaoIndicativa', $this->classificacaoIndicativa);
        $stmt->bindValue(':enredo', $this->enredo);
        $stmt->bindValue(':imagem', $this->imagem);
        $stmt->bindValue(':categoria', $this->categoria);
        $stmt->bindValue(':emailUsuario', $this->emailUsuario);
       
        $stmt->execute();
       
    }

    /**
  
     * @return Obra 
     */    
    public static function buscarTodos() {
        $db = Banco::getInstance();


        $stmt = $db->prepare('SELECT * FROM Obra');
        $stmt->execute();
        
        $resultado = $stmt->fetchAll();              

        if ($resultado) {
            $i = 0;             
            foreach($resultado as $item) {
                       
                $obras[$i] = new Obra($item['titulo'],
                $item['duracao'], $item['genero'],
                $item['dataLancamento'],
                $item['classificacaoIndicativa'],
                $item['enredo'],
                $item['imagem'],
                $item['categoria'],
                $item['emailUsuario']);
                
                $obras[$i]->__set("obraID", $item['obraID']);
                $i++;
            }                 
             
            return $obras;            
        } else {
            return NULL;
        }
    }

    public static function buscarPorID(int $id) {

        $db = Banco::getInstance();
        
        $stmt = $db->prepare('SELECT * FROM Obra WHERE obraID = :obraID');        
        $stmt->bindValue(':obraID', $id);
        $stmt->execute();

        $resultado = $stmt->fetch();           
        
        if ($resultado) {   
                              
           
                $obra = new Obra($resultado['titulo'],
                $resultado['duracao'], $resultado['genero'],
                $resultado['dataLancamento'],
                $resultado['classificacaoIndicativa'],
                $resultado['enredo'],
                $resultado['imagem'],
                $resultado['categoria'],
                $resultado['emailUsuario']);             
                             
            $obra->__set("obraID",$resultado['obraID']);
            return $obra;            
        }
         else {
            return NULL;
        }

    }

    public static function buscarPorCategoria(string $parametro) {       
        $db = Banco::getInstance();
        
        $stmt = $db->prepare('SELECT * FROM Obra WHERE categoria = :parametro');        
        $stmt->bindValue(':parametro', $parametro);
        $stmt->execute();

        $resultado = $stmt->fetchAll();           
        
        if ($resultado) {   
            $i = 0;                  
            foreach($resultado as $item) {
                $obras[$i] = new Obra($item['titulo'],
                $item['duracao'], $item['genero'],
                $item['dataLancamento'],
                $item['classificacaoIndicativa'],
                $item['enredo'],
                $item['imagem'],
                $item['categoria'],
                $item['emailUsuario']);  
                                
                $obras[$i]->__set("obraID", $item['obraID']);
                
               
                $i++;
               
            }                 
             
            return $obras;            
        } else {
            return NULL;
        }

    }

    public static function buscarUltimosLancamentos() {
        $db = Banco::getInstance();
        
        $stmt = $db->prepare('SELECT * FROM obra ORDER BY obraID desc LIMIT 6');               
        $stmt->execute();

        $resultado = $stmt->fetchAll();           
        
        if ($resultado) {   
             $i = 0;         
            foreach($resultado as $item) {
                $obras[$i] = new Obra($item['titulo'],
                $item['duracao'], $item['genero'],
                $item['dataLancamento'],
                $item['classificacaoIndicativa'],
                $item['enredo'],
                $item['imagem'],
                $item['categoria'],
                $item['emailUsuario']);   

                $obras[$i]->__set("obraID", $item['obraID']);
                $i++;
            }                 
             
            return $obras;            
        } else {
            return NULL;
        }

    }


    public static function buscarPorNome(string $parametro) {
        $db = Banco::getInstance();
        
        $stmt = $db->prepare('SELECT * FROM Obra WHERE titulo like  :parametro  OR genero like  :parametro'  );                
        $stmt->bindValue(':parametro', "%".$parametro."%");
        $stmt->execute();

        $resultado = $stmt->fetchAll();           
        
        if ($resultado) {   
            $i = 0;                  
            foreach($resultado as $item) {
                $obras[$i] = new Obra($item['titulo'],
                $item['duracao'], $item['genero'],
                $item['dataLancamento'],
                $item['classificacaoIndicativa'],
                $item['enredo'],
                $item['imagem'],
                $item['categoria'],
                $item['emailUsuario']);  
                $obras[$i]->__set("obraID", $item['obraID']);
                $i++;
            }                 
             
            return $obras;            
        } else {
            return NULL;
        }

    }
    public static function excluir(int $obraID) {

        $db = Banco::getInstance();
        
        $stmt = $db->prepare('DELETE FROM Critica WHERE obraID = :obraID');        
        $stmt = $db->prepare('DELETE FROM Obra WHERE obraID = :obraID');        
        $stmt->bindValue(':obraID', $obraID);        
        
        $stmt->execute();

    }

}

?>