<?php $this->layout('master', ['title' => $title]) ?>

<h2>Contact</h2>

<?php echo getFlash('contact_success', 'background-color:green;color:white'); ?>
<?php echo getFlash('contact_error', 'background-color:red;color:white'); ?>

<form id="box-login" method="post" action="/contact">

    <?php echo getCsrf(); ?>

    <input type="text" name="nomecompleto" placeholder="Seu nome completo" value="<?php echo getOld('nomecompleto'); ?>">
    <?php echo getFlash('nomecompleto'); ?>

    <input type="text" name="email" placeholder="Seu email" value="<?php echo getOld('email'); ?>">
    <?php echo getFlash('email'); ?>

    <input type="text" name="subject" placeholder="Assunto" value="<?php echo getOld('subject'); ?>">
    <?php echo getFlash('subject'); ?>

    <textarea placeholder="Mensagem" name="message"><?php echo getOld('message'); ?>
    </textarea>
    <?php echo getFlash('message'); ?>

    <br>
    <button type="submit">Enviar</button>
</form>