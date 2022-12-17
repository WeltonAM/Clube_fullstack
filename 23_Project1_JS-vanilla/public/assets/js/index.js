
search.addEventListener('keyup', _.debounce(searchInKeyUp, 400));

function renderHeader(products){
    const totalProducts = products.length;

    header.innerHTML = totalProducts > 0 ? 
        `${totalProducts} products in stock` :
        "No products in stock";
}

document.body.addEventListener('click', function(e){
    e.preventDefault();

    const productId = e.target.getAttribute('data-remove');
    if(productId){
        removeProduct(productId);
    }
});

renderListAndHeader(products);