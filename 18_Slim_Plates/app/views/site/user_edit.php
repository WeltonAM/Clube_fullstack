<?php $this->layout('site/master') ?>

<h2>Edit</h2>

<form action="/user/update/{{ user.id }}" method="post">
    
    <input type="hidden" name="_METHOD" value="PUT">

    <input type="text" name="firstName" class="form-control" value="<?php echo old('firstName')?>">
    <?php echo getFlash('firstName'); ?>
    
    <input type="text" name="lastName" class="form-control" value="<?php echo old('firstName')?>">
    <?php echo getFlash('lastName'); ?>
    
    <input type="email" name="email" class="form-control" value="<?php echo old('firstName')?>">
    <?php echo getFlash('email'); ?>

    <br>
    <button type="submit" class="btn-usual">Update</button>
</form>
