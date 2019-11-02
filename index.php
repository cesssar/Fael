<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>Fael</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Webflow" name="generator"/>
    <link href="lib/css/fael.css" rel="stylesheet" type="text/css"/>
    <script src="lib/js/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Roboto:300,regular","Roboto Condensed:regular"]  }});</script>
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script>
    <![endif]-->

    </head>
    <body>
        <div class="navbar">
            <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar-2 w-nav">
                <div class="container-2 w-container">
                    <a href="#" class="w-nav-brand">
                        <img src="img/logo_prog.png" width="70" alt=""/>
                    </a>
                    <nav role="navigation" class="w-nav-menu">
                        <a href="index.php?pagina=polos" class="w-nav-link">Polos</a>
                        <a href="index.php?pagina=alunos" class="w-nav-link">Alunos</a>
                        <a href="index.php?pagina=disciplinas" class="w-nav-link">Disciplinas</a>
                        <a href="index.php?pagina=sair" class="w-nav-link">Sair</a> 
                    </nav>
                    <div class="w-nav-button">
                        <a href="index.php?pagina=polos" class="w-nav-link">Polos</a>
                        <a href="index.php?pagina=alunos" class="w-nav-link">Alunos</a>
                        <a href="index.php?pagina=disciplinas" class="w-nav-link">Disciplinas</a>
                        <a href="index.php?pagina=sair" class="w-nav-link">Sair</a> 
                    </div>
                    <h1 class="heading-2">Fael</h1>
                </div>
            </div>
        </div>
        <div class="section hero">
            
        <?php
            $pagina = $_GET['pagina'];
            switch($pagina){
                case "login": include("login.php"); break;
                case "polos": include("polos.php"); break;
                case "alunos": include("alunos.php"); break;
                case "disciplinas"; include("disciplinas.php"); break;
                case "sair"; include("sair.php"); break;
                case "": include("login.php"); break;
            }
        ?>

        </div>
            
        <div class="social-section">
            <div class="w-container">
                <p><span class="text-span-2">Trabalho referente a disciplina de Programação Web</span></p>
            </div>
        </div>
        
    </body>
</html>
