<?php

namespace App\Database;

use \PDO;
use PDOException;

class Database
{
    const host = 'mysql742.umbler.com';
    const dbname = 'crud_php_desafio';
    const user = 'crudphpuser';
    const password = '123456789w';

    private $tabela;
    private $conexao;

    public function __construct($tabela = null)
    {
        $this->tabela = $tabela;
        $this->setConexao();
    }

    public function setConexao()
    {
        try {
            $this->conexao = new PDO('mysql:host=' . self::host . ';dbname=' . self::dbname, self::user, self::password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->conexao->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function insert($values)
    {
        $campos = array_keys($values);
        $binds = array_pad([], count($campos), '?');
        $query = 'INSERT INTO ' . $this->tabela . ' (' . implode(',', $campos) . ') VALUES(' . implode(',', $binds) . ')';

        //executa o insert
        $this->execute($query, array_values($values));

        return $this->conexao->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $filtros = '*')
    {
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        //MONTA A QUERY
        $query = 'SELECT ' . $filtros . ' FROM ' . $this->tabela . ' ' . $where . ' ' . $order . ' ' . $limit;

        //EXECUTA A QUERY
        return $this->execute($query);
    }

    public function update($where, $values){
        //DADOS DA QUERY
        $filtros = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE ' . $this->tabela . ' SET ' . implode('=?,', $filtros) . '=? WHERE ' . $where;

        //EXECUTAR A QUERY
        $this->execute($query, array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    public function delete($where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$this->tabela.' WHERE '.$where;
    
        //EXECUTA A QUERY
        $this->execute($query);
    
        //RETORNA SUCESSO
        return true;
      }
}
