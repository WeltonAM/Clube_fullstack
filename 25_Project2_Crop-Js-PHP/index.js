function Crop(){
    return {
        previewImage: null,
        saveImage: false,
        showRemoveCrop: true,
        crop: null,
        cropper(){
            this.crop = new Cropper(this.previewImage, {
                aspectRatio: 1/1,
                
            });
        },
        preview(){

            const image = this.$refs.image;
            const reader = new FileReader();
            reader.readAsDataURL(image.files[0]);

            setTimeout(() => {
                this.previewImage = this.$refs.image_preview;
                this.previewImage.src = reader.result;
                this.previewImage.setAttribute('width', '350px');
                this.previewImage.setAttribute('height', '250px');
                this.saveImage = true;
                this.cropper();
            }, 500);
        },

        removeCrop(){
            this.crop.destroy();
            this.showRemoveCrop = false;
        },
        
        addCrop(){
            this.showRemoveCrop = true;
            this.cropper();
        }
    };
}