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