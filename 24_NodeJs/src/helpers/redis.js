const session = require("express-session");
const redis = require("redis");
const RedisStore = require("connect-redis")(session);
const redisClient = redis.createClient();

const sessionInit = function(app){
    // ## SESSIONS
    app.use(
        session({
            // store: new RedisStore({ client: redisClient }),
            secret: "keyboard cat",
            resave: false,
            saveUninitialized: true,
            cookie: { secure: false },
        })
    );
};

module.exports = { sessionInit, redisClient };