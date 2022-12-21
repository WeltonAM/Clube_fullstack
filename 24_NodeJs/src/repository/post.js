const { post, user } = require('../database/models');

exports.posts = function(){
    try {
        return post.findAll({
            include: {
                model: user,
                as: "user"
            }
        });
    } catch (error) {
        console.log(error);
    }
}