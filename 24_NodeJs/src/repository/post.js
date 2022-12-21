const { post, user, Sequelize } = require('../database/models');
const {paginate} = require('./paginate');

exports.posts = async function(request){
    try {
        paginate.setLimit(4);

        paginate.setRouteInSearch(request);
        
        paginate.setCurrentPage(request.query['page']);
        
        paginate.setOptions(
            {
                attributes:['id', 'title', 'content'],
                where:{},
                limit: 4
            }
        );

        const posts = await paginate.paginate(post);

        const links = paginate.render(posts['count']);

        return {
            posts: posts['rows'],
            links
        }
    } catch (error) {
        console.log(error);
    }
};

exports.search = async function(request, search){
    try {
        paginate.setLimit(4);

        paginate.setRouteInSearch(request);
        
        paginate.setCurrentPage(request.query['page']);
        
        paginate.setOptions(
            {
                attributes:['id', 'title', 'content'],
                where:{
                    [Sequelize.Op.or]:[
                        {
                            title:{[Sequelize.Op.like]:`%${search}%`}
                        },
                        {
                            content:{[Sequelize.Op.like]:`%${search}%`}
                        },
                    ]
                },
                limit: 4
            }
        );

        const posts = await paginate.paginate(post);

        const links = paginate.render(posts['count']);

        return {
            posts: posts['rows'],
            links
        }
    } catch (error) {
        console.log(error);
    }
}