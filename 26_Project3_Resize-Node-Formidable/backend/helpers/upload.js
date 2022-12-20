const sharp = require("sharp");

exports.upload = async function(files, folder){
    const splitName = files["file"]["originalFilename"].split(".");
    const extension = splitName[splitName.length - 1];
    const fileName = new Date().getTime();
    
    switch(extension){
        case 'pgn':
            await sharp(files['file']['filepath'])
                .resize(350)
                .png({ quality: 50 })
                .toFile(folder + '/' + fileName + '.' + extension);
            break;
            
        case 'jpg':
        case 'jpeg':
            await sharp(files['file']['filepath'])
                .resize(350)
                .jpeg({ quality: 50 })
                .toFile(folder + '/' + fileName + '.' + extension);

            break;

        default:
            throw new Error("Extension not accepted!");
            break;
    }
};