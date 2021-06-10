<?php
  class Remetente{
    private $idremetente;
    private $remetente;
    private $cpfcnpj;
    private $cep;
    private $logradouro;
    private $numero;
    private $bairro;
    private $estado;
    private $cidade;
    private $telefone;
    private $email;

    public function __construct($idremetente = false){
      if($idremetente){
        $sql = "SELECT * FROM remetente where idremetente = :idremetente";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->bindParam(":idremetente", $idremetente, PDO::PARAM_INT);
        $stmt->execute();
        
        foreach($stmt as $registro){
          $this->setIdremetente($registro['idremetente']);
          $this->setRemetente($registro['remetente']);
          $this->setCpfcnpj($registro['cpfcnpj']);
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

    public function setIdremetente($id){
      $this->idremetente =  $id;
    }

    public function getIdremetente(){
      return $this->idremetente;
    }

    public function setRemetente($rem){
      $this->remetente =  $rem;
    }

    public function getRemetente(){
      return $this->remetente;
    }

    public function setCpfcnpj($cpfcnpj){
      $this->cpfcnpj =  $cpfcnpj;
    }

    public function getCpfcnpj(){
      return $this->cpfcnpj;
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
      $sql = "SELECT * FROM remetente";
      $stmt = DB::conexao()->prepare($sql);
      $stmt->execute();       
      $registros = $stmt->fetchAll();
      
      if($registros){
        $itens = array();
        foreach($registros as $registro){
          $temporario = new Remetente();
          $temporario->setIdremetente($registro['idremetente']);
          $temporario->setRemetente($registro['remetente']);
          $temporario->setCpfcnpj($registro['cpfcnpj']);
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
      
      $sql = "INSERT INTO remetente(remetente, cpfcnpj, cep, logradouro, numero, bairro, estado, cidade, telefone, email) VALUES (:remetente, :cpfcnpj, :cep, :logradouro, :numero, :bairro, :estado, :cidade, :telefone, :email)";
      
      try{
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':remetente', $this->remetente);
          $stmt->bindParam(':cpfcnpj', $this->cpfcnpj);
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
      if($this->idremetente){
        $sql = "DELETE FROM remetente WHERE idremetente = :idremetente";
        try{
          $stmt = DB::conexao() -> prepare($sql);
          $stmt -> bindParam(':idremetente', $this -> idremetente);
          $stmt -> execute();
          echo "O Nº de Registro " . $this->idremetente . " foi excluido";
        }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    }
  }
?>