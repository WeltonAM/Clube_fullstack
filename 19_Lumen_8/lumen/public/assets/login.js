import axios from "axios";

const form = document.querySelector("form");
const btnLogin = document.querySelector("#btn-login");
const errors = document.querySelector("#errors")

btnLogin.addEventListener('click', async function(e){
    e.preventDefault();
    
    try {
        const formData = new FormData(form);
        
        const { data } = await axios.post("/login", formData);
        
    } catch (error) {
        const errorsValidate = error.response?.data;

        if(errorsValidate){
            for (const index in errorsValidate) {
                if (errorsValidate.hasOwnProperty(index)) {
                    errors.innerHTML += `
                        <div class="error">${errorsValidate[index]}</div>
                    `;
                }
            }

            setTimeout(() => {
                errors.innerHTML = '';
            }, 3000);
        }

    }
});