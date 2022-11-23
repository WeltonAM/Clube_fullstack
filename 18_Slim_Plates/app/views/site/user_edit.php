<?php $this->layout('site/master') ?>

<div class="cont-center">

    <h2>Edit</h2>

    {{ messages['message']['message'] | message(messages['message']['alert']) | raw }}
    
    <form action="/user/update/{{ user.id }}" method="post">
        
        <input type="hidden" name="_METHOD" value="PUT">

        <input type="text" name="firstName" class="form-control" value="{{ user.firstName }}">
        {{ messages['firstName']['message'] | message(messages['firstName']['alert']) | raw }}
        
        <input type="text" name="lastName" class="form-control" value="{{ user.lastName }}">
        {{ messages['lastName']['message'] | message(messages['lastName']['alert']) | raw }}
        
        <input type="email" name="email" class="form-control" value="{{ user.email }}">
        {{ messages['email']['message'] | message(messages['email']['alert']) | raw }}
    
        <br>
        <button type="submit">Update</button>
    </form>
</div>

{% endblock %}
