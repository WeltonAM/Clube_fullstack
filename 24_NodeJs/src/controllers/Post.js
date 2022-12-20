const { post, user } = require("../database/models");

const edit = function (request, response) {
    return response.json(request.params);
};

const store = function (request, response) {
    return response.json(request.body);
};

const update = function (request, response) {
    return response.json(request.body);
};

const destroy = function (request, response) {
    return response.json(request.params);
};

const show = async function (request, response) {
    try {
        // ## Relation belongsTo, hasMany

        // const data = await post.findAll({
        //     attributes: ['id', 'title'],
        //     include: {
            //         attributes: ['id', 'firstName'],
        //         model: user,
        //         as: "user"
        //     }
        // });

        const data = await user.findOne({
            attributes: ['id', 'firstName'],
            where: {
                id: 8,
            },
            include:{
                attributes: ['id', 'title'],
                model: post,
                as: 'posts',
            }
        });

        return response.status(200).json(data);

    } catch (error) {
        console.log(error);   
    }
};

module.exports = { edit, store, update, destroy, show };