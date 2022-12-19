import products from "./products";
import { renderListAndHeader } from "./render";

export function searchInKeyUp(e){
    const searched = e.target.value;
    
    const productsFound = productsFilterInSearch(searched);

    productsFound.length > 0 ? renderListAndHeader(productsFound) : listContainer.innerHTML = 'Not found';
}

export function productsFilterInSearch(searched){
    return products.filter((product) => {
        return product.title.toLowerCase().includes(searched.toLowerCase());
    });
}