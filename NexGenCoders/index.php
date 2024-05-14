<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexGen Coders</title>
    <meta name="description" content="NexGen Coders by Sidy&&mamad">
    <link rel="stylesheet" href="assets/css/style.css">

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
    require_once "./static/header.php";
    ?>
</div>

<!-- le contenu principal de ma page -->
<main>
    <?php
    require_once "./template/home.php";
    //J'inclue le header de la page
    if($_GET['page'] == "Home"){
        require_once "./template/home.php";
    }elseif ($_GET['page'] == "SignIn" || $_GET['page'] == "SignUp")
        require_once "./template/login.php";
    ?>
</main>

<!-- le contenu de mon pied de page -->
<footer>

</footer>
hhhhhhhh
</body>
</html>
