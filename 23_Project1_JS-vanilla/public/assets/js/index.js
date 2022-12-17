const products = [
    {
        id: 1,
        title: 'Mouse',
        price: 19.9,
        poster: 'mouse.png',
    },
    {
        id: 2,
        title: 'Keyboard',
        price: 190.9,
        poster: 'teclado.png',
    },
    {
        id: 3,
        title: 'Screen',
        price: 1900.9,
        poster: 'monitor.png',
    },
    {
        id: 4,
        title: 'Laptop',
        price: 2900.9,
        poster: 'notebook.png',
    },
    {
        id: 5,
        title: 'HD',
        price: 500.0,
        poster: 'hd.png',
    },
    {
        id: 6,
        title: 'Video card',
        price: 1500.0,
        poster: 'placa-de-video.png',
    },
];

const listContainer = document.querySelector("#list");
const header = document.querySelector("header");
const search = document.querySelector("#search");

const formatter = Intl.NumberFormat(undefined, {
    style: 'currency',
    currency: 'USD',
    maximumFractionDigits: 2,
});

function render(products){
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
                        <div class="product-button" data-remove="${product.id}">Remove</div>
                    </a>
                </div>`;
        });
    }

    listContainer.innerHTML = list;
}

function removeProduct(productId){
    const index = products.findIndex((product) => {
        return product.id === +productId;
    });

    if(index > -1){
        products.splice(index, 1);
        render(products);
    }
}

document.body.addEventListener('click', function(e){
    e.preventDefault();

    const productId = e.target.getAttribute('data-remove');
    if(productId){
        removeProduct(productId);
    }
});

render(products);