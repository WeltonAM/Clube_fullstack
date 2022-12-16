let exploded = '1,2,3,4,5,6,7,8,9,10'.split(',');

let order = exploded.reduce(
    (accumulator, value) => {
        if(value <= 5) {
            accumulator.menor.push(+value);
        } else {
            accumulator.maior.push(+value);
        }

        return accumulator;
    },

    {
        menor: [],
        maior: [],
    }
);

console.log(order);