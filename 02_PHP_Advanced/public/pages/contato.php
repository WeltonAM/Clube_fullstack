<h2>Contato</h2>

<?= get('message') ?>

<form action="/pages/forms/contato.php" method="POST"  role="form">

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" id="" name="name" placeholder="Digite seu nome">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" id="" name="email" placeholder="Digite seu email">
    </div>

    <div class="form-group">
        <label for="">Assunto</label>
        <input type="text" class="form-control" id="" name="subject" placeholder="Digite o assunto">
    </div>

    <div class="form-group">
        <label for="">Mensagem</label>
        <textarea name="message" id="" cols="30" rows="10" style="resize: none" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Enviar</button>


</form>