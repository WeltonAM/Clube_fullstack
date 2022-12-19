require("dotenv").config();

const { response } = require("express");
const express = require("express");
const path = require("path");
const cors = require("cors");
const bodyParser = require("body-parser");
const { init: initHandlebars } = require("./helpers/handlebars");

const app = express();

initHandlebars(app);
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, "assets")));

app.use((request, response, next) => {
    // if(request.session.user){
    //     response.locals.user = request.session.user;
    // }
    next();
});

// ## CORS
app.use(
    cors({
        origin: "http://localhost:5000",
    })
);

// ## Grouping routes
app.use("/", require("./routes/site"));
app.use("/post", require("./routes/post"));

// ## Middleware
// app.use(function(request, response, next){
//     next();
// });

// app.get('/user/:id', (request, response) => {
//     return response.json(request.params.id);
// });

// app.get('/user', (request, response) => {
//     const { name, age } = request.query;
//     return response.send(name);
// });

// ## Controllers
// app.get('/', Home.index);

// app.post('/login', 
//     function(){
//         return response.json("middleware");
//     }, 
//     Login.store);

app.listen(process.env.PORT || 3000, () => {
    console.log("Server on");
})