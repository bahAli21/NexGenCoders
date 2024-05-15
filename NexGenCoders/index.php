<?php 

/**
 * Fichier d'entrée de l'application NexGenCoders.
 * 
 * Ce fichier gère le routage des différentes pages de l'application
 * et inclut les contrôleurs et les modèles de template en fonction
 * de la page demandée.
 *
 * @package NexGenCoders
 */

// Inclusion des dépendances nécessaires
require_once 'inc/Database.php';
require_once 'models/SignIn.php';
require_once 'models/SignUp.php';
require_once './inc/Routes.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexGen Coders</title>
    <meta name="description" content="NexGen Coders by Sidy&&mamad">

    <?php /** J'inclue mes style css en fonction de la page afficher */ ?>

    <link rel="stylesheet" href="assets/css/style.css">
    <?php  if(($page = $_GET['page'] ?? 'home') == 'home') :?>
    <link rel="stylesheet" href="assets/css/home.css">
    <style>

        main{
            position: fixed;
            top: 17%;
            width: 100%;
            height: 80%;
            justify-content: center;
            text-align: center;
            display: flex;
        }

        @media screen and (max-width: 520px) {
            main{
                position: fixed;
                top: 9%;
            }
        }

    </style>
    <?php endif; ?>
    <?php  if(($page = $_GET['page'] ?? 'home') == 'signup' || ($page = $_GET['page'] ?? 'home') == 'signin' || ($page = $_GET['page'] ?? 'home') == 'resetpassword' ) :?>
        <link rel="stylesheet" href="assets/css/login.css">
    <?php endif; ?>

    <meta name="keywords" content="N-E-X-G-E-N-C-O-D-E-R-S, NeXgEnCoDers">
    <meta name="author" content="Votre Nom">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="assets/img/miniLogo.png">
    <!-- [type="module"] indique au compilateur que je travaille avec des modules en JavaScript et non du JS Native -->
    <script type="module" src="assets/js/script.js" defer></script>
</head>

<body>

<div class="header">
    <?php
    //J'inclue le header de la page
   // require_once "./static/header.php";
    ?>
</div>

<!-- le contenu principal de ma page -->
<main>
    <?php
    //require_once "./template/home.php";

    //Expresion simplifier du isset($_Get['page']) ? $_Get['page'] : 'home'
    $page = $_GET['page'] ?? 'home';

    //require_once "./template/$page.php";
    if(isset($Routes[$page])){
        
        $controller = $Routes[$page]['controller'];
        $template = $Routes[$page]['template'];
    }
    require_once './controllers/'.$controller.'.php' ;
    require_once './template/'.$template.'.php' ;
   
    


    ?>
</main>

<!-- le contenu de mon pied de page -->
<footer>

</footer>
</body>
</html>