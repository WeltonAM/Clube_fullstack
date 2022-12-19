const edit = function(request, response) {
    return response.json("edit");
}

const show = function(request, response) {
    const { name, age } = request.query;
    return response.json(name);
}

module.exports = { edit, show };