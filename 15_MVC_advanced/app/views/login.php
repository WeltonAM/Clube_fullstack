<div class="form-div">

    <form action="/login/store" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="ju@hta.com">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>    
            <input type="password" class="form-control" name="password" value="123">
        </div>
    
        <button class="btn btn-outline-dark btn-sm" type="submit">Login</button>
    
    </form>
</div>

<div class="flash-msg">
    <?php echo flash('login'); ?>
</div>