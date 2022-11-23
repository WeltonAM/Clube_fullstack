<?php $this->layout('site/master') ?>

<div class="cont-center">
    <h2>Login</h2>

    <form action="/login" method="post">
        <input 
            type="text"
            name="email"
            class="form-control"
            placeholder="Email"
            required
        >
        <?php echo getFlash('email'); ?>
        
        <input 
        type="password"
        name="password"
        class="form-control"
        placeholder="Password"
        required
        >
        <?php echo getFlash('password'); ?>

        <button type="submit" id="btn-create">Log in</button>
        
    </form>
</div>
