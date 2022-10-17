<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User id</th>
            <th>User name</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>