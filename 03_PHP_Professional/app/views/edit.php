<form method="post" action="/user/profile/update"></form>

<hr>

<?php echo getFlash('upload_error') ?>

<form method="post" action="/user/image/update" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/gif, image/jpeg, image/png">

    <button type="submit">Alterar foto</button>
</form>