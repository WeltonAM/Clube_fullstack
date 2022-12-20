const { MASTER_DIR } = require("../helpers/constants");
const { post } = require('../database/models');

const index = async function(request, response) {
    try {

        // ## Finders
        // const posts = await post.findAll({
        //     attributes: ['id', 'title'],
        //     limit: 5
        // });

        response.json(posts);        
    } catch (error) {
        console.log(error);
    }
}

module.exports = { index };