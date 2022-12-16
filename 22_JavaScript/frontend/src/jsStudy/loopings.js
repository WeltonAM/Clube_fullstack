let user = {name:'Juliana', age:27};

for(let prop in user){
    console.log(prop);
    console.log(user[prop]);
}

console.log("------------------");

let nums = [1, 2, 3, 4, 5];

for(let num of nums){
    console.log(num);
}

console.log("------------------");

let names = ['Juliana', 'Karla'];

function showNames(index, name){
    console.log(index, name);
}

names.forEach(showNames);