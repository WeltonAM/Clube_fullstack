<?php $this->layout('site/master', ['title' => $title]) ?>

<h2>Create</h2>

<form action="/user/store" method="post">
    <input type="text" name="firstName" class="form-control" placeholder="Name" value="<?php echo old('firstName')?>">
    <?php echo getFlash('firstName'); ?>
    
    <input type="text" name="lastName" class="form-control" placeholder="Last name" value="<?php echo old('lastName')?>">
    <?php echo getFlash('lastName'); ?>
    
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo old('emailName')?>">
    <?php echo getFlash('email'); ?>
    
    <input type="password" name="password" class="form-control" placeholder="Password">
    <?php echo getFlash('password'); ?>
    
    <br>
    <button type="submit" class="btn-usual">Sign up</button>
</form>
