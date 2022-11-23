<?php $this->layout('site/master') ?>

{% if logged_in %} Already logged! {% else %} 

<div class="cont-center">
    <h2>Login</h2>

    <form action="/login" method="post">
        <input 
            type="text"
            name="email"
            class="form-control"
            placeholder="Email"
            required
        >
            
            {{ message['email']['message'] | message(message['email']['alert']) | raw }}
            
        <input 
            type="password"
            name="password"
            class="form-control"
            placeholder="Password"
            required
        >

        {{ message['password']['message']|message(message['password']['alert']|raw) }}

        <button type="submit" id="btn-create">Log in</button>
        
    </form>
</div>

{% endif %} {% endblock %}
