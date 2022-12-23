import http from "./helpers/http";

function create(){
    return {

        user: {
            firstName: '',
            lastName: '',
            email: '',
            password: '',
        },

        createUser: async function(){
            try{
                // console.log( await this.user);
                
                const {data} = await http.post('/user/create', this.user); 
                console.log(data);
                
            }catch (error:any){
                const errors = error.response?.data?.errors;
                const elementValidation = document.querySelector('#error') as HTMLSpanElement;

                if(errors){
                    errors.forEach((element) => {
                        elementValidation.innerHTML = element.msg;
                        setTimeout(() => {
                            elementValidation.innerHTML = '';
                            
                        }, 3000);
                    });
                    
                    // errors.forEach(element => {
                    //     const elementValidation = document.querySelector(`#error-${element.param}`) as HTMLSpanElement;
                    //     elementValidation.innerHTML = element.msg;
                    // });
                }
            }
        }
    }
}

export default create;