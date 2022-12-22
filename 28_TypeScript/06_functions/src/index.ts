function person(name:string, age:number):string {

    const str:string = `My name is ${name} and my age${age}`
    console.log(name, age);
    return str;
}

person('Juliana', 27);

function sum(num1:number, num2:number):void{
    console.log(num1 + num2)
}

sum(1,2);

// --- Overload
let person1:(a:string, b:number) => number;

person1 = (name:string, age:number) => {
    return age;
}

console.log(person1('Juliana', 27));