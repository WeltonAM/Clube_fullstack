require("dotenv").config();

const express = require('express');

const Home = require('./controllers/Home');

const app = express();

// app.get('/user/:id', (request, response) => {
//     return response.json(request.params.id);
// });

app.get('/user', (request, response) => {
    const { name, age } = request.query;
    return response.send(name);
});

app.get('/login', (request, response) => {
    return response.json("login");
});

app.listen(process.env.PORT || 3000, () => {
    console.log("Server on");
})