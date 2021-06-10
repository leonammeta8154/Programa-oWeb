<?php
    class Modulo{
        private $idmodulo;
        private $descricao;
        private $diretorio;
        
        public function setIdmodulo($id){
            $this->idmodulo =  $id;
        }
      
        public function getIdmodulo(){
            return $this->idmodulo;
        }
      
        public function setDescricao($des){
            $this->descricao =  $des;
        }
      
        public function getDescricao(){
            return $this->descricao;
        }
      
        public function setDiretorio($dir){
            $this->diretorio =  $dir;
        }
      
        public function getDiretorio(){
            return $this->diretorio;
        }
      
        public static function listar(){
            $sql = "SELECT * FROM modulos";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll();
            if($registros){
                $itens = array();
                foreach($registros as $objeto){
                    $temporario = new Modulo();
                    $temporario->setIdmodulo($objeto['idmodulo']);
                    $temporario->setDescricao($objeto['descricao']);
                    $temporario->setDiretorio($objeto['diretorio']);
                    $itens[] = $temporario;
                }  
                return $itens;
            }else{
                return false;
            }
        }
    }
?>