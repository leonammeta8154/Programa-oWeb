<?php    
    class Usuario{

        public static function logar($login = false, $senha = false){
            $sql = "SELECT * FROM usuario where login = :login and senha = :senha";
	        try{    
                $stmt = DB::conexao()->prepare($sql);
	            $stmt->bindParam(":login", $login);
	            $stmt->bindParam(":senha", $senha);
	            $stmt->execute(); 
                foreach($stmt as $obj){
                    $_SESSION["login_usuario"] = $obj["login"];
                    $_SESSION["id_usuario"] = $obj["idusuario"];
                    $_SESSION["idgrupo"] = $obj["idgrupofk"];
                }            
            }catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }    
        }

        public function cadastrar($login = false, $senha = false){
            $sql = "INSERT INTO usuario(login, senha) VALUES (:login, :senha)";   
            try{
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':login', $login);
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }  
    }
?>