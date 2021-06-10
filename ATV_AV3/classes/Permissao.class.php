<?php
    class Permissao{
        private $idpermissao;
        private $descricao;
        private $acao;
        
        public function setIdpermissao($id){
            $this->idpermissao =  $id;
        }
      
        public function getIdpermissao(){
            return $this->idpermissao;
        }
      
        public function setDescricao($des){
            $this->descricao =  $des;
        }
      
        public function getDescricao(){
            return $this->descricao;
        }
      
        public function setAcao($acao){
            $this->acao =  $acao;
        }
      
        public function getAcao(){
            return $this->acao;
        }

        public static function listar(){
            $sql = "SELECT * FROM permissao";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll();
            if($registros){
                $itens = array();
                foreach($registros as $objeto){
                    $temporario = new Permissao();
                    $temporario->setIdpermissao($objeto['idpermissao']);
                    $temporario->setDescricao($objeto['descricao']);
                    $temporario->setAcao($objeto['acao']);
                    $itens[] = $temporario;
                }
                return $itens;
            }else{
                return false;
            }
        }
    }
?>