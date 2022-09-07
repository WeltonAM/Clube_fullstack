<ul id="menu_list">
    <li><a href="/">Home</a></li>
    <?php if(!logged()) : ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/user/create">Create</a></li>
    <?php endif; ?>
</ul>

<div id="status_login">
    Bem vindo, 
    <?php if(logged()) : ?>
        <?php echo user()->nomecompleto; ?> | <a href="/logout">Logout</a> | <a href="/user/edit/profile">Edit Profile</a>
    <?php else : ?>
        visitante
    <?php endif; ?>
</div>