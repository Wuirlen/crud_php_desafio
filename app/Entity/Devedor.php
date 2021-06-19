<?php 

namespace App\Entity;

use App\Database\Database;
use \PDO;

class Devedor{

    public $id;
    public $nome;
    public $cpf;
    public $data_nascimento;
    public $endereco;
    public $descricao_titulo;
    public $valor;
    public $data_vencimento;
    public $updated;
    

    public function cadastrar(){

        date_default_timezone_set('America/Sao_Paulo');
        $this->updated = date("Y-m-d H:i:s");

        $database = new Database('devedores');
        $this->id = $database->insert([
                                        'nome' => $this->nome,
                                        'cpf' => $this->cpf,
                                        'data_nascimento' => $this->data_nascimento,
                                        'endereco' => $this->endereco,
                                        'descricao_titulo' => $this->descricao_titulo,
                                        'valor' => $this->valor,
                                        'data_vencimento' => $this->data_vencimento,
                                        'updated' => $this->updated
                                    ]);

        return true;
    }

    public function atualizar(){
        date_default_timezone_set('America/Sao_Paulo');
        $this->updated = date("Y-m-d H:i:s");

        return (new Database('devedores'))->update('id = '.$this->id,[
                                                                        'nome' => $this->nome,
                                                                        'cpf' => $this->cpf,
                                                                        'data_nascimento' => $this->data_nascimento,
                                                                        'endereco' => $this->endereco,
                                                                        'descricao_titulo' => $this->descricao_titulo,
                                                                        'valor' => $this->valor,
                                                                        'data_vencimento' => $this->data_vencimento,
                                                                        'updated' => $this->updated
                                                                  ]);
      }

    public function excluir(){
       return (new Database('devedores'))->delete('id = '.$this->id);
    }

    public static function getDevedores($where = null, $order = null, $limit = null) {
        return (new Database('devedores'))->select($where, $order, $limit)
                                          ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getDevedor($id) {
        return (new Database('devedores'))->select('id = '.$id)
                                          ->fetchObject(self::class);
    }
}

?>