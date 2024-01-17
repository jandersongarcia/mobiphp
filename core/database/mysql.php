<?php

namespace Sql;

use PDO;
use PDOException;

class MySQL {

    private $host;
    private $username;
    private $password;
    private $database;
    private $port;
    private $driver;

    private $pdo;

    function __construct() {
        $this->configureConnection(CONN);
        $this->connect();
    }

    private function configureConnection(array $connectionDetails) {
        $this->driver = $connectionDetails['driver'];
        $this->host = $connectionDetails['host'];
        $this->username = $connectionDetails['username'];
        $this->password = $connectionDetails['password'];
        $this->database = $connectionDetails['database'];
        $this->port = $connectionDetails['port'];
    }

    private function connect() {
        try {
            $this->pdo = new PDO(
                $this->driver . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->database,
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->handleConnectionError($e);
        }
    }

    private function handleConnectionError(PDOException $e) {
        $error = "Não foi possível conectar ao banco de dados <strong>{$this->driver}</strong>.<br><strong>Erro: </strong><span>{$e->getMessage()}</span>";
        require_once("./core/php/error.php");
        exit();
    }

    // Adicione métodos públicos para realizar operações no banco de dados, por exemplo:
    public function query($sql, $params = []) {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Lidar com erros de consulta
            // Exemplo: logar o erro, lançar exceção personalizada, etc.
            return false;
        }
    }

    // Outros métodos para INSERT, UPDATE, DELETE, etc.
}
