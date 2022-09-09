<?php $this->layout('master', ['title' => $title]) ?>

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