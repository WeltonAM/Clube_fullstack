const { MASTER_DIR } = require("../helpers/constants");
const db = require('../database/models');
const { findBy } = require("../repository/repository");
const { Op } = require("sequelize"); 
const { posts } = require('../repository/post');

const index = async function(request, response) {
    
    try {

        const data = await posts(request);

        console.log(data);

        return response.render("home", { layout: MASTER_DIR, title:'Home', data });

        // const data = await db.user.findAll({
        //     where:{
        //         id:{
        //             [Op.gt]: 5,
        //         }
        //     }
        // });

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

        // request.session.name = 'Welton';
        // response.redirect('/login');

    } catch (error) {
        console.log(error);
    }
}

const show = function(request, response) {
    const { name, age } = request.query;
    return response.json(name);
}

module.exports = { index, show };