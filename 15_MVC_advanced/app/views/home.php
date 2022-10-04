<h2>Users list - (<?php echo count($users); ?>)</h2>

<ul>
    <?php foreach($users as $user): ?>
        <li>
            <?php echo $user->firstName ?> <?php echo $user->lastName ?> |
            <a href="/user/show/<?php echo $user->id; ?>">See details</a>
        </li>
    <?php endforeach; ?>
</ul>