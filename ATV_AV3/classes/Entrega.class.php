<?php
  class Entrega{
    private $identrega;
    private $idenviopk;
    private $statusenvio;

    public function __construct($identrega = false){
      if($identrega){
        $sql = "SELECT * FROM entrega where identrega = :identrega";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->bindParam(":identrega", $identrega, PDO::PARAM_INT);
        $stmt->execute();
        
        foreach($stmt as $registro){
          $this->setIdentrega($registro['identrega']);
          $this->setIdenviopk($registro['idenviopk']);
          $this->setStatusenvio($registro['statusenvio']);
        }
      }
    }

    public function setIdentrega($id){
      $this->identrega =  $id;
    }

    public function getIdentrega(){
      return $this->identrega;
    }

    public function setIdenviopk($epk){
      $this->idenviopk =  $epk;
    }

    public function getIdenviopk(){
      return $this->idenviopk;
    }

    public function setStatusenvio($se){
      $this->statusenvio =  $se;
    }

    public function getStatusenvio(){
      return $this->statusenvio;
    }

    public static function listar(){
      $sql = "SELECT * FROM entrega";
      $stmt = DB::conexao()->prepare($sql);
      $stmt->execute();       
      $registros = $stmt->fetchAll();
      
      if($registros){
        $itens = array();
        foreach($registros as $registro){
          $temporario = new Entrega();
          $temporario->setIdentrega($registro['identrega']);
          $temporario->setIdenviopk($registro['idenviopk']);
          $temporario->setStatusenvio($registro['statusenvio']);            
          $itens[] = $temporario;
        }    
        return $itens;
      }
      return false;
    }

    public function adicionar(){
      
      $sql = "INSERT INTO entrega(idenviopk, statusenvio) VALUES (:idenviopk, :statusenvio)";
      
      try{
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idenviopk', $this->idenviopk);
          $stmt->bindParam(':statusenvio', $this->statusenvio);
          $stmt->execute();
      }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
      }
    }

    public function excluir(){
      if($this->identrega){
        $sql = "DELETE FROM entrega WHERE identrega = :identrega";
        try{
          $stmt = DB::conexao() -> prepare($sql);
          $stmt -> bindParam(':identrega', $this -> identrega);
          $stmt -> execute();
          echo "O Nº de Registro " . $this->identrega . " foi excluido";
        }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    }
  }
?>