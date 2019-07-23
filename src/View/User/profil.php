<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h1>Profil</h1>
    <p>Adresse email : 
    <?php if(isset($email)):?>
        <?=$email?></p>
    <?php endif;?>
    <form method="post" action="edit_profil">
        <input type="submit" value="edit" name="edit">
    </form>
    <form method="post" action="">
        <input type="submit" value="delete" name="delete">
    </form>
</body>
</html>