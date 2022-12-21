exports.paginate = {
    currentPage: 1,
    limit: 5,
    options: {},
    route: '',
    linksPerPage: 5,

    setLimit: function(limit) {
        this.limit = limit;
    },

    setOptions: function(options){
        this.options = options;
    },

    setCurrentPage: function(page){
        this.currentPage = page?? 1;
    },

    paginate: function (model) {
        const offset = this.currentPage * this.limit - this.limit;
        return model.findAndCountAll({
          ...this.options,
          limit: this.limit,
          offset,
        });
      },
    
    render: function(total){
        const totalPages = Math.ceil(total / this.limit);

        let links = `<ul class="pagination">`;
        for (let index = 1; index <= totalPages; index++) {
            links += `<li class="page-item"><a href="?page=${index}" class="page-links">${index}</a><li>`;   
        }
        links += `</ul>`;

        return links;
    },
}