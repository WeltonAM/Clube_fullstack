exports.messages = (messages) => {
    let messages_validation = {};

    if(messages['errors']){
        messages['errors'].forEach(message => {
            messages_validation[message.param] = message.msg;    
        });
    } else {
        messages_validation['msg'] = messages.msg;    
    }

    return messages_validation;
};