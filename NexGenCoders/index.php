<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexGen Coders</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- [type="module"] indique au compilateur que je travaille avec des modules en JavaScript et non du JS Native -->
    <script type="module" src="assets/js/script.js" defer></script>
</head>

<body>

<?php
    //J'inclue le header de la page
    require_once "./template/header.php";
?>

<!-- le contenu principal de ma page -->
<main>
    <?php
    //J'inclue le header de la page
    require_once "./template/login.php";
    ?>
</main>

<!-- le contenu de mon pied de page -->
<footer>

</footer>

</body>
</html>
