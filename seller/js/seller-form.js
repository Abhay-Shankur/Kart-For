// Forms Switch (Sign Up / Log In)
document.getElementById("login-signup").addEventListener("click", ()=> {
    for (let index = 0; index < document.getElementById("main-panel").children.length; index++) {
        if (document.getElementById("main-panel").children[index].id.includes("right-panel")) {
            document.getElementById("main-panel").children[index].children.namedItem("signup-form").classList.toggle("active-form");
            document.getElementById("main-panel").children[index].children.namedItem("login-form").classList.toggle("active-form");
            if (document.getElementById("login-signup").innerText.includes("Log In")) {
                document.getElementById("login-signup").innerText="Sign Up";
            } else {
                document.getElementById("login-signup").innerText="Log In";
            }
        }
    }
});

// Function to Show Password 
function showPassword(elem) {
    if (elem.classList.contains("fa-eye")) {
        elem.previousElementSibling.setAttribute("type","text");
        elem.classList.replace("fa-eye","fa-eye-slash");
    } else {
        elem.previousElementSibling.setAttribute("type","password");
        elem.classList.replace("fa-eye-slash","fa-eye");
    }
}