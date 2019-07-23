<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PIE PHP</title>
</head>
<body>
    <h1>Register</h1>
    <div class="">
        <form method="post" action="">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="log_in" name="log_in">
        </form>
        <?php if(isset($error)):?>
            <p><?=$error?></p>
        <?php endif;?>
    </div>
</body>
</html>