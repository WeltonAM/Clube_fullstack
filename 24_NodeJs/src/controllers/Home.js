const { MASTER_DIR } = require("../helpers/constants");
const { user, avatar } = require('../database/models');

const index = async function(request, response) {
    
    try {
        const data = await user.findAll({
            include: {
                model: avatar,
                as: "avatar"
            }
        });

        response.json(data);

    } catch (error) {
        console.log(error);
    }
    
    // request.session.name = 'Welton';
    // response.redirect('/login');
    // return response.render("home", { layout: MASTER_DIR, title:'Home' });
}

const show = function(request, response) {
    const { name, age } = request.query;
    return response.json(name);
}

module.exports = { index, show };