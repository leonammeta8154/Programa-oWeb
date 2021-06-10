<!DOCTYPE html>
<html>
    <head>
        <?php
            include("classes/Operacao.class.php");
            session_start();
        ?>
        <meta charset="utf-8"/>
        <meta content='width=device-width, initial-scale=1' name='viewport'/>
        <link rel="stylesheet" href="publico/css/stilo.css"/>
        <script src="https://kit.fontawesome.com/7c132864b5.js" crossorigin="anonymous"></script>
        <title>Transporta Brasil</title>
    </head>
    <body>
        <header>
            <h1>Transporta Brasil</h1>
            <p>Levaremos a sua mercadoria até você independentemente do local e da dificuldade</p> 
        </header>
        <input type="checkbox" id="btn_menu"/>
        <label for="btn_menu" id="icone_menu">&#9776</label>
        <div class="menu">
            <ul>
                <?php if(isset($_SESSION["login_usuario"])){ ?>
                <li><span class="far fa-user"></span><span><?php echo $_SESSION["login_usuario"]; ?></span>
                    <ul>
                        <li><a href="?acao=logar"><span class="fas fa-back"></span>Sair</a></li>
                    </ul>
                </li>
                <?php }else{ ?>
                <li><a href="#"><span class="fas fa-user"></span>Login/Cadastro</a>
                    <ul>
                        <li><a href="?acao=cadastrar"><span class="fas fa-plus"></span>Registrar</a></li>
                        <li><a href="?acao=logar"><span class="far fa-user"></span>Logar</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li><a href="#"><span class="far fa-address-card"></span>Remetente</a>
                    <ul>
                        <li><a href="?modulo=remetente&acao=adicionar"><span class="fas fa-plus"></span>Cadastrar</a></li>
                        <li><a href="?modulo=remetente&acao=listar"><span class="fas fa-list"></span>Listar</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="fas fa-box-open"></span>Mercadoria</a>
                    <ul>
                        <li><a href="?modulo=mercadoria&acao=adicionar"><span class="fas fa-plus"></span>Cadastrar</a></li>
                        <li><a href="?modulo=mercadoria&acao=listar"><span class="fas fa-list"></span>Listar</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="fas fa-address-card"></span>Destinatário</a>
                    <ul>
                        <li><a href="?modulo=destinatario&acao=adicionar"><span class="fas fa-plus"></span>Cadastrar</a></li>
                        <li><a href="?modulo=destinatario&acao=listar"><span class="fas fa-list"></span>Listar</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="fas fa-envelope"></span>Envio</a>
                    <ul>
                        <li><a href="?modulo=envio&acao=adicionar"><span class="fas fa-plus"></span>Cadastrar</a></li>
                        <li><a href="?modulo=envio&acao=listar"><span class="fas fa-list"></span>Listar</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="fas fa-shipping-fast"></span>Entrega</a>
                    <ul>
                        <li><a href="?modulo=entrega&acao=adicionar"><span class="fas fa-plus"></span>Cadastrar</a></li>
                        <li><a href="?modulo=entrega&acao=listar"><span class="fas fa-list"></span>Listar</a></li>
                    </ul>
                </li>
                
                <li><a href="?modulo=permissao&acao=editar"><span class="fas fa-shipping-fast"></span>Permissões</a>
                </li>
            </ul>
        </div>
        <div class = "content">
            <?php
                if(isset($_GET["modulo"])){ $modulo = $_GET["modulo"];} else { $modulo = false;}
                if(isset($_GET["acao"])){ $acao= $_GET["acao"];} else { $acao = "logar";}
                
                if($modulo){
                    if(file_exists("modulos/".$modulo."/".$acao.".php")){
                        $operacoes = Operacao::verificaPermissao($_SESSION["idgrupo"], $modulo, $acao);
                        if($operacoes){
                            include("modulos/".$modulo."/".$acao.".php");
                        } else{
                            echo "Você não tem permissão para acessar este modulo";
                        }
                    }
                }elseif(file_exists($acao.".php")){
                    include($acao.".php");
                }else{
                    echo "Página Solicitada não Existe";
                }   
            ?>
        </div>
        <footer>
        </footer>
    </body>
</html>