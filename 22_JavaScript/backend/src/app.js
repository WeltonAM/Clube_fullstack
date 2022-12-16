const express = require("express");
const test = require("./helpers");

const app = express();

app.get("/", function(request, response){
    response.send(test());
});

app.listen(3000);