<?php $this->layout('site/master', ['title' => $title]) ?>

<div class="cont-center">
    <h2>Create</h2>

    <?php echo getFlash('message'); ?>
    
    <form action="/user/store" method="post">
        <input type="text" name="firstName" class="form-control" placeholder="Name">
        <?php echo getFlash('firstName'); ?>
        
        <input type="text" name="lastName" class="form-control" placeholder="Last name">
        <?php echo getFlash('lastName'); ?>
        
        <input type="email" name="email" class="form-control" placeholder="Email">
        <?php echo getFlash('email'); ?>
        
        <input type="password" name="password" class="form-control" placeholder="Password">
        <?php echo getFlash('password'); ?>
        
        <br>
        <button type="submit">Sign up</button>
    </form>
</div>
