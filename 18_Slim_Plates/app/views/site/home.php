<?php $this->layout('site/master', ['title' => $title]) ?>

<h2>Users</h2>

<form action="/" method="get">
    <input type="text" name="s" placeholder="Search">
    <button type="submit">Search</button>
</form>

<ul>
    <?php foreach($users->rows as $user): ?>
        <li>
            
            <div style="padding: 5px; margin: 3px;">
                <?= $user->firstName ?> <?= $user->lastName ?> |
                <a id="btn-edit" href="/user/edit/<?= $user->id ?>">Edit</a>
                
                <form action="/user/delete/<?= $user->id ?>" method="post">
                    
                    <input type="hidden" name="_METHOD" value="DELETE">
                    
                    <button id="btn-delete" type="submit">Delete</button>
    
                </form>
            </div>
        </li>
        
    <?php endforeach ?> 

    <?php echo $users->render; ?> 
</ul>
