function person(name:string, age:number, isAdmin?:boolean):void{
    console.log(name, age, isAdmin);   
}

person('Juliana', 27);

//  --------- Alias 

type NumberOrString = number|string;

function person1(name: NumberOrString, age: NumberOrString, adress: {street: NumberOrString}):void{
    console.log(name, age, adress);
}

person1('Juliana', 27, {street:231});