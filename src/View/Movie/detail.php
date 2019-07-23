
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Home Movie</title>
</head>
<body>
    <h1>Détails du film <?=$film["titre"]?></h1>
    <table>
        <tr>
            <td>Résumé du film</td>
        </tr>
        <tr>
            <td><?=$film["resum"]?></a></td>
        </tr>
    </table>
    <h1>Modifier le film</h1>
    <form method="post" action="">
        <input type="text" name="resum" placeholder="Résumé">
        <input type="submit" value="Modifier le film" name="edit_film">
    </form>
    <?php if(isset($error)):?>
        <p><?=$error?></p>
    <?php endif;?>
</body>
</html>