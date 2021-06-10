<?php
  class Destinatario{
    private $iddestinatario;
    private $destinatario;
    private $cpf;
    private $cep;
    private $logradouro;
    private $numero;
    private $bairro;
    private $estado;
    private $cidade;
    private $telefone;
    private $email;

    public function __construct($iddestinatario = false){
      if($iddestinatario){
        $sql = "SELECT * FROM destinatario where iddestinatario = :iddestinatario";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->bindParam(":iddestinatario", $iddestinatario, PDO::PARAM_INT);
        $stmt->execute();
        
        foreach($stmt as $registro){
          $this->setIddestinatario($registro['iddestinatario']);
          $this->setDestinatario($registro['destinatario']);
          $this->setCpf($registro['cpf']);
          $this->setCep($registro['cep']);
          $this->setLogradouro($registro['logradouro']);
          $this->setNumero($registro['numero']);
          $this->setBairro($registro['bairro']);
          $this->setEstado($registro['estado']);
          $this->setCidade($registro['cidade']);
          $this->setTelefone($registro['telefone']);
          $this->setEmail($registro['email']);
        }
      }
    }

    public function setIddestinatario($id){
      $this->iddestinatario =  $id;
    }

    public function getIddestinatario(){
      return $this->iddestinatario;
    }

    public function setDestinatario($des){
      $this->destinatario =  $des;
    }

    public function getDestinatario(){
      return $this->destinatario;
    }

    public function setCpf($cpf){
      $this->cpf =  $cpf;
    }

    public function getCpf(){
      return $this->cpf;
    }

    public function setCep($cep){
      $this->cep =  $cep;
    }

    public function getCep(){
      return $this->cep;
    }

    public function setLogradouro($log){
      $this->logradouro =  $log;
    }

    public function getLogradouro(){
      return $this->logradouro;
    }

    public function setNumero($num){
      $this->numero =  $num;
    }

    public function getNumero(){
      return $this->numero;
    }

    public function setBairro($bai){
      $this->bairro =  $bai;
    }

    public function getBairro(){
      return $this->bairro;
    }

    public function setEstado($est){
      $this->estado =  $est;
    }

    public function getEstado(){
      return $this->estado;
    }

    public function setCidade($cid){
      $this->cidade =  $cid;
    }

    public function getCidade(){
      return $this->cidade;
    }

    public function setTelefone($tel){
      $this->telefone =  $tel;
    }

    public function getTelefone(){
      return $this->telefone;
    }

    public function setEmail($em){
      $this->email =  $em;
    }

    public function getEmail(){
      return $this->email;
    }

    public static function listar(){
      $sql = "SELECT * FROM destinatario";
      $stmt = DB::conexao()->prepare($sql);
      $stmt->execute();       
      $registros = $stmt->fetchAll();
      
      if($registros){
        $itens = array();
        foreach($registros as $registro){
          $temporario = new Destinatario();
          $temporario->setIddestinatario($registro['iddestinatario']);
          $temporario->setDestinatario($registro['destinatario']);
          $temporario->setCpf($registro['cpf']);
          $temporario->setCep($registro['cep']);
          $temporario->setLogradouro($registro['logradouro']);
          $temporario->setNumero($registro['numero']);
          $temporario->setBairro($registro['bairro']);
          $temporario->setEstado($registro['estado']);
          $temporario->setCidade($registro['cidade']);
          $temporario->setTelefone($registro['telefone']);
          $temporario->setEmail($registro['email']);              
          $itens[] = $temporario;
        }    
        return $itens;
      }
      return false;
    }

    public function adicionar(){
      
      $sql = "INSERT INTO destinatario(destinatario, cpf, cep, logradouro, numero, bairro, estado, cidade, telefone, email) VALUES (:destinatario, :cpf, :cep, :logradouro, :numero, :bairro, :estado, :cidade, :telefone, :email)";
      
      try{
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':destinatario', $this->destinatario);
          $stmt->bindParam(':cpf', $this->cpf);
          $stmt->bindParam(':cep', $this->cep);
          $stmt->bindParam(':logradouro', $this->logradouro);
          $stmt->bindParam(':numero', $this->numero);
          $stmt->bindParam(':bairro', $this->bairro);
          $stmt->bindParam(':estado', $this->estado);
          $stmt->bindParam(':cidade', $this->cidade);
          $stmt->bindParam(':telefone', $this->telefone);
          $stmt->bindParam(':email', $this->email);
          $stmt->execute();
      }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
      }
    }

    public function excluir(){
      if($this->iddestinatario){
        $sql = "DELETE FROM destinatario WHERE iddestinatario = :iddestinatario";
        try{
          $stmt = DB::conexao() -> prepare($sql);
          $stmt -> bindParam(':iddestinatario', $this -> iddestinatario);
          $stmt -> execute();
          echo "O Nº de Registro " . $this->iddestinatario . " foi excluido";
        }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    }
  }
?>