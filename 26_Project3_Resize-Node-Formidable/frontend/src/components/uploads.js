import "alpinejs";
import http from '../helpers/http';

function upload(){
    return {
        showButtonUpload: false,
        choose: function(){
            const file = document.querySelector("#file");
            const splitName = file.value.split(".");
            const extension = splitName[splitName.length - 1];
            
            if(!['png','jpeg','jpg'].includes(extension)){
                console.log("Extension not accepted!");
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

        sendImage: async function(){
            try {
                this.showButtonUpload = false;
                const file = document.querySelector("#file");

                if(file.files?.length <= 0){
                    console.log("Choose a image");
                    return;
                }

                const formData = new FormData();
                formData.append("file", file.files[0]);

                const { data } = await http.post('/image', formData);
            } catch (error) {
                console.log(error);
            }
        },
    };
}

window.upload = upload;