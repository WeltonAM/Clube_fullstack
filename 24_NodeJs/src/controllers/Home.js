const { MASTER_DIR } = require("../helpers/constants");
const db = require('../database/models');
const { findBy } = require("../repository/repository");
const { Op } = require("sequelize"); 

const index = async function(request, response) {
    
    try {

        const data = await db.user.findAll({
            where:{
                id:{
                    [Op.gt]: 5,
                }
            }
        });

        // # belongsToMany
        // const data = await post.findAll({
        //     include: {
        //         through: {attributes:[]},
        //         model: keyword,
        //         as: "keywords",
        //     }
        // });

        // # hasOne
        // const data = await user.findAll({
        //     include: {
        //         model: avatar,
        //         as: "avatar"
        //     }
        // });

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