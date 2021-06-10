<?php
  class Envio{
    private $idenvio;
    private $idremetentepk;
    private $idmercadoriapk;
    private $iddestinatariopk;
    private $tipoenvio;

    public function __construct($idenvio = false){
      if($idenvio){
        $sql = "SELECT * FROM envio where idenvio = :idenvio";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->bindParam(":idenvio", $idenvio, PDO::PARAM_INT);
        $stmt->execute();
        
        foreach($stmt as $registro){
          $this->setIdenvio($registro['idenvio']);
          $this->setIdremetentepk($registro['idremetentepk']);
          $this->setIdmercadoriapk($registro['idmercadoriapk']);
          $this->setIddestinatariopk($registro['iddestinatariopk']);
          $this->setTipoenvio($registro['tipoenvio']);
        }
      }
    }

    public function setIdenvio($id){
      $this->idenvio = $id;
    }

    public function getIdenvio(){
      return $this->idenvio;
    }

    public function setIdremetentepk($rpk){
      $this->idremetentepk =  $rpk;
    }

    public function getIdremetentepk(){
      return $this->idremetentepk;
    }

    public function setIdmercadoriapk($mpk){
      $this->idmercadoriapk = $mpk;
    }

    public function getIdmercadoriapk(){
      return $this->idmercadoriapk;
    }

    public function setIddestinatariopk($dpk){
      $this->iddestinatariopk =  $dpk;
    }

    public function getIddestinatariopk(){
      return $this->iddestinatariopk;
    }

    public function setTipoenvio($te){
      $this->tipoenvio = $te;
    }

    public function getTipoenvio(){
      return $this->tipoenvio;
    }

    public static function listar(){
      $sql = "SELECT * FROM envio";
      $stmt = DB::conexao()->prepare($sql);
      $stmt->execute();       
      $registros = $stmt->fetchAll();
      
      if($registros){
        $itens = array();
        foreach($registros as $registro){
          $temporario = new Envio();
          $temporario->setIdenvio($registro['idenvio']);
          $temporario->setIdremetentepk($registro['idremetentepk']);
          $temporario->setIdmercadoriapk($registro['idmercadoriapk']);
          $temporario->setIddestinatariopk($registro['iddestinatariopk']);
          $temporario->setTipoenvio($registro['tipoenvio']);
          $itens[] = $temporario;
        }    
        return $itens;
      }
      return false;
    }

    public function adicionar(){
      
      $sql = "INSERT INTO envio(idremetentepk, idmercadoriapk, iddestinatariopk, tipoenvio) VALUES (:idremetentepk, :idmercadoriapk, :iddestinatariopk, :tipoenvio)";
      
      try{
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idmercadoriapk', $this->idmercadoriapk);
          $stmt->bindParam(':idremetentepk', $this->idremetentepk);
          $stmt->bindParam(':iddestinatariopk', $this->iddestinatariopk);
          $stmt->bindParam(':tipoenvio', $this->tipoenvio);
          $stmt->execute();
      }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
      }
    }

    public function excluir(){
      if($this->idenvio){
        $sql = "DELETE FROM envio WHERE idenvio = :idenvio";
        try{
          $stmt = DB::conexao() -> prepare($sql);
          $stmt -> bindParam(':idenvio', $this -> idenvio);
          $stmt -> execute();
          echo "O Nº de Registro " . $this->idenvio . " foi excluido";
        }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    }
  }
?>