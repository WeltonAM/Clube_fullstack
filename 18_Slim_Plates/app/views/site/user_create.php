<?php $this->layout('site/master') ?>

<div class="cont-center">
    <h2>Create</h2>

    {{ messages['message']['message'] | message(messages['message']['alert']) | raw }}
    
    <form action="/user/store" method="post">
        <input type="text" name="firstName" class="form-control" placeholder="Name">
        {{ messages['firstName']['message'] | message(messages['firstName']['alert']) | raw }}
        
        <input type="text" name="lastName" class="form-control" placeholder="Last name">
        {{ messages['lastName']['message'] | message(messages['lastName']['alert']) | raw }}
        
        <input type="email" name="email" class="form-control" placeholder="Email">
        {{ messages['email']['message'] | message(messages['email']['alert']) | raw }}
        
        <input type="password" name="password" class="form-control" placeholder="Password">
        {{ messages['password']['message'] | message(messages['password']['alert']) | raw }}
    
        <br>
        <button type="submit">Sign up</button>
    </form>
</div>


{% endblock %}
