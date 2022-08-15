<h2>Clientes</h2>

<ul id="users-home">
    <?php foreach ($users as $user): ?>
        <li>
            <?php echo $user->nomecompleto; ?> | 
            <a href="/user/<?php echo $user->clienteID; ?>">Detalhes</a>
        </li>
    <?php endforeach; ?>
</ul>