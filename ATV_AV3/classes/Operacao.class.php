<?php
    include("DB.class.php");
    class Operacao{
        
        private $idoperacao;
        private $idgrupofk;
        private $idmodulofk;
        private $idpermissaofk;
        
        public function setIdoperacao($id){
            $this->idoperacao =  $id;
        }
      
        public function getIdoperacao(){
            return $this->idoperacao;
        }

        public function setIdgrupofk($idgfk){
            $this->idgrupofk =  $idgfk;
        }
      
        public function getIdgrupofk(){
            return $this->idgrupofk;
        }

        public function setIdmodulofk($idmfk){
            $this->idmodulofk =  $idmfk;
        }
      
        public function getIdmodulofk(){
            return $this->idmodulofk;
        }

        public function setIdpermissaofk($idpfk){
            $this->idpermissaofk =  $idpfk;
        }
      
        public function getIdpermissaofk(){
            return $this->idpermissaofk;
        }

        public function verificaPermissao($idgrupo, $modulo, $acao){
            $sql = "SELECT * FROM operacoes INNER JOIN modulos ON modulos.idmodulo = operacoes.idmodulofk INNER JOIN permissao ON permissao.idpermissao = operacoes.idpermissaofk WHERE modulos.diretorio = '$modulo' AND permissao.acao = '$acao' AND operacoes.idgrupofk = '$idgrupo'";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $rg = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($rg){
                return true;
            }else{
                return false;
            }
        }

        public function adicionar(){
            $sql = "INSERT INTO operacoes (idgrupofk, idmodulofk, idpermissaofk) VALUES (:idgrupofk, :idmodulofk, :idpermissaofk)";
            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idgrupofk', $this->idgrupofk);
            $stmt->bindParam(':idmodulofk', $this->idmodulofk);
            $stmt->bindParam(':idpermissaofk', $this->idpermissaofk);
            $stmt->execute();
        }
        
        public function listar($idgrupo, $idmodulo, $idpermissao){
            $sql =
            "SELECT * FROM operacoes WHERE idgrupofk =
            '$idgrupo' AND idmodulofk =
            '$idmodulo' AND idpermissaofk = '$idpermissao'";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($registros){
                $itens = array();
                foreach($registros as $objeto){
                $temporario = new Operacao();
                $temporario->setIdoperacao($objeto['idoperacao']);
                $temporario->setIdGrupofk($objeto['idgrupofk']);
                $temporario->setIdModulofk($objeto['idmodulofk']);
                $temporario->setIdPermissaofk($objeto['idpermissaofk']);
                $itens[] = $temporario;
                }
                return $itens;
            }else{
                return false;
            }
        }
        
        public function excluir(){
            if($this->idoperacao){
                $sql =
                "DELETE FROM operacoes WHERE idoperacao = :idoperacao";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':idoperacao', $this->idoperacao);
                $stmt->execute();
            }
        } 
    }
?>