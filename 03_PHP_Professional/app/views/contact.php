<?php $this->layout('master', ['title' => $title]) ?>

<h2>Contact</h2>

<?php echo getFlash('message'); ?>

<form id="box-login" action="/contact" method="post">

    <?php echo getCsrf(); ?>

    <input type="text" name="nomecompleto" placeholder="Seu nome completo" value="<?php echo getOld('nomecompleto') ?>">
    <?php echo getFlash('nomecompleto'); ?>

    <input type="text" name="email" placeholder="Seu email" value="<?php echo getOld('email') ?>">
    <?php echo getFlash('email'); ?>

    <input type="text" name="subjact" placeholder="Assunto" value="<?php echo getOld('subjact') ?>">
    <?php echo getFlash('subjact'); ?>

    <textarea placeholder="Mensagem" name="message" id="" cols="30" rows="10" style="resize: none"><?php echo getOld('subjact') ?>
    </textarea>
    <?php echo getFlash('message'); ?>

    
    <br>
    <button type="submit">Enviar</button>
</form>