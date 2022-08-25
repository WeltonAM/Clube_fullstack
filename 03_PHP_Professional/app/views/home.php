<?php $this->layout('master', ['title' => $title]) ?>

<h2>Clientes</h2>

<div x-data="">
    
</div>

<ul id="users-home">
    <?php foreach ($users as $user): ?>
        <li>
            <?php echo $user->nomecompleto; ?> | 
            <a href="/user/<?php echo $user->clienteID; ?>">Detalhes</a>
        </li>
    <?php endforeach; ?>
</ul>