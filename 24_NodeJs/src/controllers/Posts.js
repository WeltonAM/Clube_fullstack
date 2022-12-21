const { MASTER_DIR } = require("../helpers/constants");
const { post, user, comment, Sequelize } = require('../database/models');

const index = async function(request, response) {
    try {

        const data = await post.findAll({
            attributes:{
                include: [
                    [
                        Sequelize.fn('count', Sequelize.col('comments.postId')),'commentsCount',
                    ],
                ]
            },
            include:[
                {
                    attributes: ['id', 'firstName', 'lastName'],
                    model: user,
                    as: "user"
                },
                {
                    attributes: [],
                    model: comment,
                    as: "comments"
                },
            ],
            group: ['post.id'],
        });

        // ## Finders
        // const posts = await post.findAll({
        //     attributes: ['id', 'title'],
        //     limit: 5
        // });

        response.json(data);        
    } catch (error) {
        console.log(error);
    }
}

module.exports = { index };