function Person(){
    let name = 'Juliana';

    this.info = function(){
        console.log(name);
    }

    Object.defineProperty(this, 'name', {
        set: function(newValue){
            name = newValue;
        },

        get: function(){
            return name;
        }

    });
}

let p = new Person;
p.info();

console.log('----------');

p.name = 'Karla';
console.log(p.name);