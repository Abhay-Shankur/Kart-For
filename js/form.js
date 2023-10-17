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

// Function to Keep logged in.
function keepSignIn(id,checkboxValue) {
    if(checkboxValue === "on") {
        // localStorage.setItem("id",id.toString());
        let d=new Date();
        d.setFullYear(d.getFullYear()+10);
        document.cookie="emailid="+id.toString()+";expires="+d.toString();
    }else {
        document.cookie="emailid="+id.toString()+";";
    }
}

// Function to Close OverLay
function closeOverlayForm() {
    document.getElementById("overlay-form").className="closeAnimationClass";
    sessionStorage.removeItem("alive");
    // location.reload();
}

// Function to Switch Forms
function switchForms(elemTitle) {
    let elemTitleClassName=elemTitle.className;
    let elemTitleId=elemTitle.getAttribute("id");
    
    let titles=document.getElementsByClassName(elemTitleClassName);
    for (let index = 0; index < titles.length; index++) {
        titles[index].classList.remove("active-title");
    }
    let elem=document.getElementById(elemTitleId);
    elem.classList.add("active-title");

    if (elemTitleId.includes("login") && elemTitleId.includes("customer")) {
        document.getElementById("customer-login-form").classList.add("active-form");
        document.getElementById("customer-signup-form").classList.remove("active-form");
    } 
    if (elemTitleId.includes("signup") && elemTitleId.includes("customer")) {
        document.getElementById("customer-signup-form").classList.add("active-form");
        document.getElementById("customer-login-form").classList.remove("active-form");
    }
}