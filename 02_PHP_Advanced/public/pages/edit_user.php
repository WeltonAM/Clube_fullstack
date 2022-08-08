<?=get('message');?>

<?php
    $user = find('users', 'id', $_GET['id']);
?>

<form action="/pages/forms/update_user.php" method="POST" role="form">
    <legend></legend>

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="" value="<?php $user->name; ?>">
    </div>

    <input type="hidden" name="id" value="<?= $user->id; ?>">

    <div class="form-group">
        <label for="">Sobrenome</label>
        <input type="text" class="form-control" name="sobrenome" placeholder="" value="<?php $user->sobrenome; ?>">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="" value="<?php $user->email; ?>">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="text" class="form-control" name="password" placeholder="">
    </div>

    <button class="btn btn-primary">Cadastrar</button>

</form>