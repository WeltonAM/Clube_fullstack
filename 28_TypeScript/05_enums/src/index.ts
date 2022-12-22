enum UserStatus {
    Admin = 1,
    Editor = 2,
    User = 3,
}

function checkStatus(status:number){
    switch(status){
        case UserStatus.Admin:
            console.log("Admin");
            break;
        
         case UserStatus.Editor:
            console.log("Editor");
            break;

        case UserStatus.User:
            console.log("User");
            break;
    }
}

checkStatus(3);