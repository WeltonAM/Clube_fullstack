"use strict";
var UserStatus;
(function (UserStatus) {
    UserStatus[UserStatus["Admin"] = 1] = "Admin";
    UserStatus[UserStatus["Editor"] = 2] = "Editor";
    UserStatus[UserStatus["User"] = 3] = "User";
})(UserStatus || (UserStatus = {}));
function checkStatus(status) {
    switch (status) {
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
