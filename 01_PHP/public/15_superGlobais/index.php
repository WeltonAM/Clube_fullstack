<?php 

// setcookie('name', 'Juliana', time() + 2 * 24 * 60 * 60);

// session_start();

// require '02_session.php';

// $_SESSION['name'] = 'Karla';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de PHP</title>
</head>
<body>

    <form action="03_post.php" method="POST">
        <input type="text" name="name" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>