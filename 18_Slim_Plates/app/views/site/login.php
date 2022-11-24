<?php $this->layout('site/master', ['title' => $title]) ?>

    <h2>Login</h2>
    <?php echo getFlash('message'); ?>

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

        <button type="submit" class="btn-usual">Log in</button>
    </form>

