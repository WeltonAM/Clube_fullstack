<h2>Create</h2>

<form id="box-login" action="/user/store" method="POST">
    <input type="text" name="firstName" placeholder="Seu nome">
    <?php echo getFlash('firstName'); ?>
    <input type="text" name="lastName" placeholder="Seu sobrenome">
    <?php echo getFlash('lastName'); ?>
    <input type="text" name="email" placeholder="Seu email">
    <?php echo getFlash('email'); ?>
    <input type="password" name="password" placeholder="Sua senha">
    <?php echo getFlash('password'); ?>
    <br>
    <button type="submit">Create</button>
</form>