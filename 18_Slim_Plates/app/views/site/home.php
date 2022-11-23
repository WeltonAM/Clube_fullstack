<?php $this->layout('site/master') ?>

<div class="cont-center">
    <h2>Users</h2>

    <ul>
        <?php foreach($users as $user): ?>
            
            <li>
                <?= $user->firstName ?> <?= $user->lastName ?>
                <a class="btn btn-default" href="/user/edit/<?= $user->id ?>">Edit</a> |
                <form action="/user/delete/<?= $user->id ?>" method="post">
                    <input type="hidden" name="_METHOD" value="DELETE">
                    <button class="btn btn-default" type="submit">Delete</button>
                </form>
            </li>
            
        <?php endforeach ?> 
    </ul>
