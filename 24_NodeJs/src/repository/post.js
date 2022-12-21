const { post, user } = require('../database/models');
const {paginate} = require('./paginate');

exports.posts = async function(request){
    try {
        paginate.setLimit(4);
        
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
}