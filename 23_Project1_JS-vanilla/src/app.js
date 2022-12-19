import { search } from './selectors';
import { searchInKeyUp } from './filter';
import { renderListAndHeader } from './render';
import { removeProduct } from './remove';
import products from "./products";
import _ from 'lodash';

search.addEventListener('keyup', _.debounce(searchInKeyUp, 400));

document.body.addEventListener('click', function(e){
    e.preventDefault();

    const productId = e.target.getAttribute('data-remove');
    if(productId){
        removeProduct(productId);
    }
});

renderListAndHeader(products);