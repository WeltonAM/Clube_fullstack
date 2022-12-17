export function removeProduct(index){

    products.splice(index, 1);

    if(search.value !== ''){
        const productFiltered = productsFilterInSearch(search.value);
        renderListAndHeader(productFiltered);
        if(productFiltered.length = 0){
            search.value = '';
        }
        return;
    }

    renderListAndHeader(products);

}