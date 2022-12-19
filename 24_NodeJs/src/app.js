require("dotenv").config();

const express = require('express');

const app = express();

console.log(process.env)

app.listen(process.env.PORT  || 3000, () => {
    console.log("Server on");
})