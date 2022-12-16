function name(){
    let firstName = 'Juliana';
    let lastName = 'Karla';

    return function(){
        // saving scope data
        console.log(`${firstName} ${lastName}`);
    }
}

name()();