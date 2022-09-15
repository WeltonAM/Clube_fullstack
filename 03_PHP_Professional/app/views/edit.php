<?php $this->layout('master', ['title' => $title]) ?>

<?php echo getFlash('updated_success', 'color:green'); ?>
<?php echo getFlash('updated_error'); ?>

<form method="post" action="/user/<?php echo $user->id ?>">
    <input type="text" name="nomecompleto" value="<?php echo $user->nomecompleto ?>">
    <?php echo getFlash('nomecompleto') ?>
    <input type="text" name="cidade" value="<?php echo $user->cidade ?>">
    <?php echo getFlash('cidade') ?>
    <input type="text" name="email" value="<?php echo $user->email ?>">
    <?php echo getFlash('email') ?>
    
    <button type="submit">Atualizar</button>
</form>

<hr>
<?php echo getFlash('password_success','color:green'); ?>
<?php echo getFlash('password_error'); ?>
<form action="/password/user/<?php echo $user->id ?>" method="post">
    
    <?php echo getCsrf(); ?>
    <input type="text" name="senha" placeholder="Nova senha">
    <?php echo getFlash('senha') ?>
    <input type="text" name="senha_confirmada" placeholder="Confirmar nova senha">
    <?php echo getFlash('senha_confirmada') ?>
    <button type="submit">Atualizar</button>
</form>

<hr>

<?php if($user->path): ?>
    <img src="/<?php echo $user->path ?>" width="80%" alt="">
<?php endif; ?>

<form method="post" action="/user/profile/update"></form>

<hr>

<?php echo getFlash('upload_error') ?>
<?php echo getFlash('upload_success', 'color:green') ?>

<form method="post" action="/user/image/update" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/gif, image/jpeg, image/png">

    <button type="submit">Alterar foto</button>
</form>