export class Person
{
    private _myName:string = '';

    set myName(myName:string){
        this._myName = myName; 
    }

    get myName(){
        return this._myName; 
    }

    constructor(public name:string, public age:number|string){};

    info():string{
        return `My name is ${this.name} ${this._myName} and I'm ${this.age} years old`;
    }
}