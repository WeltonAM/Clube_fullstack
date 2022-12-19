const index = function(request, response){
    request.session.destroy();
    response.send('test');
};

module.exports = { index };