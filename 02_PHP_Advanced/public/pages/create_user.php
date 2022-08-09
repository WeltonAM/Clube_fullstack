<?=get('message');?>

<form action="/pages/forms/create_user.php" method="POST" role="form">
    <legend></legend>

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="">
    </div>

    <div class="form-group">
        <label for="">Sobrenome</label>
        <input type="text" class="form-control" name="sobrenome" placeholder="">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="text" class="form-control" name="password" placeholder="">
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>