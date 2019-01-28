<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.1/css/uikit.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="/architecture/public/css/style.css" rel="stylesheet">
    <title>ArkhamPG</title>
</head>
<body>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#">Logo</a>

        <ul class="uk-navbar-nav">
            <li><a href="#">Lien 1</a></li>
            <li><a href="#">Lien 1</a></li>
            <li><a href="#">Lien 1</a></li>
        </ul>
    </div>
</nav>

<form action="../../Controller/UserController.php"method="POST">
    <input type="Text" name="email">
    <input type="password" name="password" id="">
    <button type="submit">Connexion</button>
</form>

<?= $content ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.1/js/uikit.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>