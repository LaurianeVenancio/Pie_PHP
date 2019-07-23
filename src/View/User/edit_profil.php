<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edit profile</title>
</head>
<body>
    <h1>Edit profile</h1>
    <table>
        <tr>
        <form method="post" action="">
            <td><label for="email">New email :</label></td>
            <td><input type="text" name="email" value="" placeholder="New email"></td>
            <td><input type="submit" value="Edit email" name="edit_profile"></td>
        </form>
        </tr>
        <tr>
        <form method="post" action="">
            <td><label for="password">New password :</label></td>
            <td><input type="password" name="password" value="" placeholder="New password"></td>
            <td><input type="submit" value="Edit password" name="edit_pw"></td>
            <?php if(isset($error)):?>
                <p><?=$error?></p>
            <?php endif;?>
        </form>
        </tr>
        <tr>
        <form method="post" action="profil">
            <td><input type="submit" value="Page profil" name="edit_profile"></td>
        </form>
        </tr>
    </form>
    </table>
</body>
</html>