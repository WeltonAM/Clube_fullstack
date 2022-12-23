import http from "./helpers/http";
import { userCreateInterface } from "../interfaces/userCreateInterface";
import { errorValidateInterface } from "../interfaces/errorValidateInterface";
import { USER_CREATED } from "./helpers/constants";
import Swal from 'sweetalert2';

function create():userCreateInterface{
    return {
        created: false,

        user: {
            firstName: '',
            lastName: '',
            email: '',
            password: '',
        },

        createUser: async function(){
            try{
                const {data} = await http.post('/user/store', this.user); 
                console.log(data);

                if(data === USER_CREATED){
                    Swal.fire(
                        'Success!',
                        'User created successfully!',
                        'success',
                    );
                }
                
            }catch (error:any){
                const errors = error.response?.data?.errors;

                if(errors){
                    errors.forEach((element:errorValidateInterface) => {
                        Swal.fire(
                            'Error!',
                            element.msg,
                            'error',
                        );
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