<?php $this->layout('master', ['title' => $title]) ?>

<h2>Clientes</h2>

<ul id="users-home">
    <?php foreach ($users as $user): ?>
        <li>
            <?php echo $user->nomecompleto; ?> | 
            <a href="/user/<?php echo $user->clienteID; ?>">Detalhes</a>
        </li>
    <?php endforeach; ?>
</ul>

<?php $this->start('scripts') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    axios.defaults.headers = {
        "Content-type":"application/json",
        HTTP_X_REQUESTED_WITH: "XMLHttpRequest",
    }

    async function loadUsers(){
        try {
            const {data} = await axios.get('/users');
            console.log(data);
        } catch (error) {
            console.log(error);
        }
    }

    loadUsers();
</script>

<?php $this->stop() ?>