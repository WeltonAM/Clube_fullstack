<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User id</th>
            <th>User name</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td class="text-center">
                    <a href="/edit_user?id=<?= $user->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td class="text-center">
                    <a href="/destroy_user?id=<?= $user->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>