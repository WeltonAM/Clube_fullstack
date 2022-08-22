<h2>Login</h2>
<?php echo getFlash('message'); ?>

<?php if(!logged()) : ?>
    
    <form id="box-login" action="/login" method="POST">
        <input type="text" name="email" placeholder="Seu email">
        <input type="password" name="password" placeholder="Sua senha">
        <button type="submit">Login</button>
    </form>
    
<?php else : ?>
    <h2>Usuário logado</h2>
<?php endif; ?>