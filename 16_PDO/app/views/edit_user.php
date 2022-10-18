<form action="/update_user" method="post" role="form">
    <legend>Edit user</legend>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="hidden" name="id" value="<?= $userFound->id; ?>">
        <input type="text" class="form-control" name="name" value="<?= $userFound->name; ?>">
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $userFound->email; ?>">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" value="<?= $userFound->password; ?>">
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Save</button>

</form>