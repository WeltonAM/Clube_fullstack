import "alpinejs";
import http from '../helpers/http';

function upload(){
    return {
        showButtonUpload: false,
        message: '',
        choose: function(){
            const file = document.querySelector("#file");
            const splitName = file.value.split(".");
            const extension = splitName[splitName.length - 1];
            
            if(!['png','jpeg','jpg'].includes(extension)){
                this.message = "Extension not accepted!";
                
                setTimeout(() => {
                    this.message = "";
                    
                }, 3000);
                return; 
            }

            const reader = new FileReader();
            const imageData = file.files[0];

            reader.onload = (e)=>{
                const imagePreview = this.$refs.img;
                imagePreview.width = 350;
                imagePreview.height = 250
                imagePreview.src = e.target.result;
                this.showButtonUpload = true;
            };

            reader.readAsDataURL(imageData);
        },

        upload: async function(){
            try {
                this.showButtonUpload = false;
                const file = document.querySelector("#file");

                if(file.files?.length <= 0){
                    this.message = "Choose an image";
                
                    setTimeout(() => {
                        this.message = "";
                        
                    }, 3000);
                    return;
                }
                
                const formData = new FormData();
                formData.append("file", file.files[0]);
                
                const { data } = await http.post("/image", formData);

                console.log(data);
                
                if(data === 'upload'){
                    this.message = "Image uploaded!";
                
                    setTimeout(() => {
                        this.message = "";
                        
                    }, 3000);
                }

            } catch (error) {
                this.message = error.response?.data;
                
                setTimeout(() => {
                    this.message = "";
                    
                }, 3000);
            }
        },
    };
}

window.upload = upload;