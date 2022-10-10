<div class="form-div">
    <form action="signup/store" method="post">
        <div class="mb-3">
            <input type="text" class="form-control" name="firstName" placeholder="First Name" value="<?php echo old('firstName') ?>">
            <?php echo flash('firstName') ?>
        </div>
        
        <div class="mb-3">
            <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="<?php echo old('lastName') ?>">
            <?php echo flash('lastName') ?>
        </div>
        
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo old('email') ?>">
            <?php echo flash('email') ?>
        </div>
        
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo old('password') ?>">
            <?php echo flash('password') ?>
        </div>
    
        <button class="btn btn-outline-secondary btn-sm" type="submit">Sign Up</button>
    
    </form>
</div>