<?php $this->layout('site/master') ?>

<div class="cont-center">

    <h2>Edit</h2>

    {{ messages['message']['message'] | message(messages['message']['alert']) | raw }}
    
    <form action="/user/update/{{ user.id }}" method="post">
        
        <input type="hidden" name="_METHOD" value="PUT">

        <input type="text" name="firstName" class="form-control" value="{{ user.firstName }}">
        <?php echo getFlash('firstName'); ?>
        
        <input type="text" name="lastName" class="form-control" value="{{ user.lastName }}">
        <?php echo getFlash('lastName'); ?>
        
        <input type="email" name="email" class="form-control" value="{{ user.email }}">
        <?php echo getFlash('email'); ?>
    
        <br>
        <button type="submit">Update</button>
    </form>
</div>

{% endblock %}
