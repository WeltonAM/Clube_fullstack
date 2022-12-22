"use strict";
function person(name, age) {
    const str = `My name is ${name} and my age${age}`;
    console.log(name, age);
    return str;
}
person('Juliana', 27);
function sum(num1, num2) {
    console.log(num1 + num2);
}
sum(1, 2);
// --- Overload
let person1;
person1 = (name, age) => {
    return age;
};
console.log(person1('Juliana', 27));
