<?php $this->layout('master', ['title' => $title]) ?>

<h2>Create</h2>

<?php echo getFlash('message'); ?>

<form id="box-login" action="/user/store" method="POST">

    <?php echo getCsrf(); ?>

    <input type="text" name="nomecompleto" placeholder="Seu nome completo" value="<?php echo getOld('nomecompleto') ?>">
    <?php echo getFlash('nomecompleto'); ?>

    <input type="text" name="cidade" placeholder="Sua cidade" value="<?php echo getOld('cidade') ?>">
    <?php echo getFlash('cidade'); ?>

    <input type="text" name="email" placeholder="Seu email" value="<?php echo getOld('email') ?>">
    <?php echo getFlash('email'); ?>
    
    <input type="password" name="senha" placeholder="Sua senha" value="<?php echo getOld('senha') ?>">
    <?php echo getFlash('senha'); ?>
    
    <br>
    <button type="submit">Create</button>
</form>