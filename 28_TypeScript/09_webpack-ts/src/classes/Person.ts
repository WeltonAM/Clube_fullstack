export class Person
{
    constructor(public name:string, public age:number|string){};

    info():string{
        return `My name is ${this.name} and I'm ${this.age} years old`;
    }
}