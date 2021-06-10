<?php
  class Mercadoria{
    private $idmercadoria;
    private $idremetentepk;
    private $mercadoria;
    private $peso;
    private $fragil;

    public function __construct($idmercadoria = false){
      if($idmercadoria){
        $sql = "SELECT * FROM mercadoria where idmercadoria = :idmercadoria";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->bindParam(":idmercadoria", $idmercadoria, PDO::PARAM_INT);
        $stmt->execute();
        
        foreach($stmt as $registro){
          $this->setIdmercadoria($registro['idmercadoria']);
          $this->setIdremetentepk($registro['idremetentepk']);
          $this->setMercadoria($registro['mercadoria']);
          $this->setPeso($registro['peso']);
          $this->setFragil($registro['fragil']);
        }
      }
    }

    public function setIdmercadoria($id){
      $this->idmercadoria = $id;
    }

    public function getIdmercadoria(){
      return $this->idmercadoria;
    }

    public function setIdremetentepk($rpk){
      $this->idremetentepk =  $rpk;
    }

    public function getIdremetentepk(){
      return $this->idremetentepk;
    }

    public function setMercadoria($mer){
      $this->mercadoria =  $mer;
    }

    public function getMercadoria(){
      return $this->mercadoria;
    }

    public function setPeso($peso){
      $this->peso =  $peso;
    }

    public function getPeso(){
      return $this->peso;
    }

    public function setFragil($fr){
      $this->fragil =  $fr;
    }

    public function getFragil(){
      return $this->fragil;
    }

    public static function listar(){
      $sql = "SELECT * FROM mercadoria";
      $stmt = DB::conexao()->prepare($sql);
      $stmt->execute();       
      $registros = $stmt->fetchAll();
      
      if($registros){
        $itens = array();
        foreach($registros as $registro){
          $temporario = new Mercadoria();
          $temporario->setIdmercadoria($registro['idmercadoria']);
          $temporario->setIdremetentepk($registro['idremetentepk']);
          $temporario->setMercadoria($registro['mercadoria']);
          $temporario->setPeso($registro['peso']);
          $temporario->setFragil($registro['fragil']);
          $itens[] = $temporario;
        }    
        return $itens;
      }
      return false;
    }

    public function adicionar(){
      
      $sql = "INSERT INTO mercadoria(idremetentepk, mercadoria, peso, fragil) VALUES (:idremetentepk, :mercadoria, :peso, :fragil)";
      
      try{
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idremetentepk', $this->idremetentepk);
          $stmt->bindParam(':mercadoria', $this->mercadoria);
          $stmt->bindParam(':peso', $this->peso);
          $stmt->bindParam(':fragil', $this->fragil);
          $stmt->execute();
      }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
      }
    }

    public function excluir(){
      if($this->idmercadoria){
        $sql = "DELETE FROM mercadoria WHERE idmercadoria = :idmercadoria";
        try{
          $stmt = DB::conexao() -> prepare($sql);
          $stmt -> bindParam(':idmercadoria', $this -> idmercadoria);
          $stmt -> execute();
          echo "O Nº de Registro " . $this->idmercadoria . " foi excluido";
        }catch(PDOException $e){
          echo "Erro: ".$e->getMessage();
        }
      }
    }
  }
?>