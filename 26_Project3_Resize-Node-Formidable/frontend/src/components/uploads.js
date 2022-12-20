import "alpinejs";

function upload(){
    return {
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
            };

            reader.readAsDataURL(imageData);
        },
    };
}

window.upload = upload;