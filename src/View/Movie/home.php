<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Home Movie</title>
</head>
<body>
    <h1>Liste des films</h1>
    <form method="post" action="">
        <input type="text" name="titre" placeholder="Nouveau film">
        <input type="text" name="resum" placeholder="Résumé">
        <input type="submit" value="Ajouter un film" name="add_film">
    </form>
    <?php if(isset($error)):?>
        <p><?=$error?></p>
    <?php endif;?>
    <br/>
        <table>
            <tr>
                <td>Titre du film</td>
            </tr>
            <?php
            foreach ($films as $value){?>
            <tr>
                <td><a href="detail?id_film=<?=$value["id_film"]?>"><?=$value["titre"]?></a></td>
                <td><form method="post" action="">
                    <input type="checkbox" name="del[]" value="<?php echo $value["id_film"];?>"></tr>
            <?php }?>
        </table>
        <input type="submit" value="Supprimer" name="delete">
        </form>
</body>
</html>