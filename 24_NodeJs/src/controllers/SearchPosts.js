const { MASTER_DIR } = require("../helpers/constants");
const { search } = require("../repository/post");

exports.index = async function(request, response){
   try {
    const searched = request.query['s'];
    const data = await search(request, searched);

    return response.render("home", { layout: MASTER_DIR, title:'Home', data });

   } catch (error) {
    console.log(error);
   } 
}