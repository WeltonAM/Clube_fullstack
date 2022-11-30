<?php $this->layout('site/master', ['title' => $title]) ?>

<h2>Resize</h2>

<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>