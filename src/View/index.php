<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PIE PHP</title>
    <link rel="stylesheet" href="webroot/css/style.css"/>
</head>
<body>
<?php if(isset($_SESSION['id']) && !empty($_SESSION["id"])):?>
<nav class="menu">
    <ul>
        <li><a href="profil" class="onglet1 onglet">Profil</a></li>
        <li><a href="home" class= "onglet">Film</a></li>
        <li>
            <form method="post" action="logout">
               <input class="log_out" type="submit" value="Log out" name="logout">
            </form>
        </li>
    </ul><br/>
</nav>
<?php else: ?>
<nav class="menu">
    <ul>
        <li><a href="register" class="onglet1 onglet">Register</a></li>
        <li><a href="login" class="onglet">Log In</a></li>
    </ul><br/>
</nav>
<?php endif; ?>
    <?= $view ?>
</body>
</html>