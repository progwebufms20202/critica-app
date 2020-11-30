<?php

include_once("Banco.php");

/**

 */
class Critica
{


    /**
     * @var int  
     */
    public $criticaID;

    /**
     * @var string 
     */
    public $titulo;



    /**
     * @var string 
     */
    public $comentario;


    /**
     * @var float 
     */
    public $nota;

    /**
     * @var string 
     */
    public $nomeUsuario;

    
    /**
     * @var string 
     */
    public $emailUsuario;



    /**
     * @var string 
     */
    public $data;
    /**
     * @var int 
     */
    public $obraID;



    function __construct(
        string $titulo,
        string $comentario,
        float $nota,
        string $nomeUsuario,
        string $emailUsuario,
        string $data,
        int $obraID
    ) {
        $this->titulo = $titulo;
        $this->comentario = $comentario;
        $this->nota = $nota;
        $this->nomeUsuario = $nomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->data = $data;
        $this->obraID = $obraID;
    }

    /**
     *  Método mágico para acessar todos os campos
     */
    public function __get($campo)
    {
        return $this->$campo;
    }

    /**
     *  Método mágico para modificar todos os campos
     */
    public function __set($campo, $valor)
    {
        return $this->$campo = $valor;
    }



    /**

     */

    public function salvar()
    {



        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Critica(titulo, comentario, nota, nomeUsuario, emailUsuario,data, obraID)
         VALUES (:titulo, :comentario, :nota, :nomeUsuario, :emailUsuario, :data, :obraID)');

        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':comentario', $this->comentario);
        $stmt->bindValue(':nota', $this->nota);
        $stmt->bindValue(':nomeUsuario', $this->nomeUsuario);
        $stmt->bindValue(':emailUsuario', $this->emailUsuario);
        $stmt->bindValue(':data', $this->data);
        $stmt->bindValue(':obraID', $this->obraID);

        $stmt->execute();
    }

    /**
     *
     * @return Critica
     */
    public static function buscarPorObra(int $obraID)
    {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Critica where obraID = :obraID');
        $stmt->bindValue(':obraID', $obraID);

        $stmt->execute();

        $resultado = $stmt->fetchAll();

        if ($resultado) {
            $i = 0;
            foreach ($resultado as $item) {
                $criticas[$i] = new Critica(
                    $item['titulo'],
                    $item['comentario'],
                    $item['nota'],
                    $item['nomeUsuario'],
                    $item['emailUsuario'],
                    $item['data'],
                    $item['obraID']
                );
                $criticas[$i]->__set("criticaID", $item['criticaID']);

                $i++;
            }


            return $criticas;
        } else {
            return NULL;
        }
    }

    public static function buscarPorID(int $criticaID)
    {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Critica where criticaID = :criticaID');
        $stmt->bindValue(':criticaID', $criticaID);

        $stmt->execute();

        $resultado = $stmt->fetch();

        if ($resultado) {
            $critica = new Critica(
                $resultado['titulo'],
                $resultado['comentario'],
                $resultado['nota'],
                $resultado['nomeUsuario'],
                $resultado['emailUsuario'],
                $resultado['data'],
                $resultado['obraID']
            );

            $resultado::__set("criticaID", $resultado->criticaID);


            return $resultado;
        } else {
            return NULL;
        }
    }

    public static function excluir(int $criticaID)
    {

        $db = Banco::getInstance();

        $stmt = $db->prepare('DELETE FROM Critica WHERE criticaID = :criticaID');
        $stmt->bindValue(':criticaID', $criticaID);

        $stmt->execute();
    }
}
