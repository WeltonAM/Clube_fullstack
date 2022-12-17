import products from "./products";

export function renderListAndHeader(products){
    render(products);
    renderHeader(products);
}

export function render(products){
    let list = '';

    if(products.length <= 0){
        list += `<div id="no-products">Any products found.</div>`;
    } else {
        products.forEach((product, index) => {
            list += `
                <div class="product">
                    <div class="product-image">
                        <img src="public/assets/images/${product.poster}" alt="">
                    </div>
                    ${product.title} - ${formatter.format(product.price)}
                    <a href="#">
                        <div class="product-button" data-remove="${index}">Remove</div>
                    </a>
                </div>`;
        });
    }

    listContainer.innerHTML = list;
}