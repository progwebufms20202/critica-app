<?php 

/**
* Classe responsável por gerir a conexão com a base de dados.
* Aplica o design pattern Singleton para não sobrecarregar de conexões.
*/
final class Banco {

    /**
    * @var PDO armazena a conexão e retorna quando solicitado
    */
    private static $conexao;

    /**
    *  Construtor privado, pois não desejamos que usuários instanciem esta classe
    */
    private function __construct() {}

    /**
    *  Função (estática) na qual usuários podem obter a conxão. 
    *  Somente uma será criada.
    *
    *  @return PDO conexão com o banco
    */
    public static function getInstance() {
        if (is_null(self::$conexao)) {
            self::$conexao = new PDO('sqlite:login.sqlite3');
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexao;
    }

    /**
    *  Função para criação do modelo do banco (tabela Usuários neste caso). 
    */
    public static function createSchema() {
        $db = self::getInstance();
        $db->exec('
            CREATE TABLE IF NOT EXISTS Usuarios (
                email TEXT PRIMARY KEY,
                senha TEXT,
                nome TEXT
            )
        ');
        $db->exec('
            CREATE TABLE IF NOT EXISTS Obra (
                obraID INTEGER  PRIMARY KEY AUTOINCREMENT,
                titulo TEXT,
                duracao INTEGER,
                genero TEXT,
                dataLancamento TEXT,
                classificacaoIndicativa INTEGER,
                enredo TEXT,
                emailUsuario TEXT,
                imagem BLOB,
                categoria TEXT
            )        
        ');

        $db->exec('                         
            CREATE TABLE IF NOT EXISTS Critica (
                criticaID INTEGER  PRIMARY KEY AUTOINCREMENT,
                titulo TEXT,
                comentario TEXT,                                       
                nota FLOAT,
                data TEXT,   
                nomeUsuario TEXT,             
                emailUsuario TEXT,
                obraID INTEGER                
            )        
        ');
        
        
    }
}

?>