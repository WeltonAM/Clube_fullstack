<h2>Login</h2>
<?php echo getFlash('message'); ?>

<form id="box-login" action="/login" method="POST">
    <input type="text" name="email" placeholder="Seu email">
    <input type="password" name="password" placeholder="Sua senha">
    <button type="submit">Login</button>
</form>
