<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div class="">
        <form method="post" action="login">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="connect" name="connect">
        </form>
        <?php if(isset($error)):?>
            <p><?=$error?></p>
        <?php endif;?>
    </div>
</body>
</html>