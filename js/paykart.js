// Funtion to load Page
function onload() {
    let tabs=document.querySelectorAll("div.content-side-item i");
    tabs.forEach(tab => {
        if (tab.classList.contains("active-tab")) {
            let reqhttp= new XMLHttpRequest();
            reqhttp.onreadystatechange= function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("content-area-body-content").innerHTML=this.responseText;
                    // document.getElementById("content-area-body-content").innerHTML=document.getElementById("content-area-body-content")..id.includes("add-amount-tab");
                }
            };
            reqhttp.open("POST", "./include/payprocess.php?tab="+tab.dataset['tab'], true);
            reqhttp.send();
        }
    });
    let reqhttp= new XMLHttpRequest();
    reqhttp.onreadystatechange= function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("content-area-head").innerHTML=this.responseText;
            // document.getElementById("content-area-body-content").innerHTML=document.getElementById("content-area-body-content")..id.includes("add-amount-tab");
        }
    };
    reqhttp.open("POST", "./include/payprocess.php?balance=true", true);
    reqhttp.send();
}

// Function for Tab Switch
function switchTab(elem) {
    let tabs=document.querySelectorAll("div.content-side-item i");
    tabs.forEach(tab => {
        tab.parentElement.classList.remove("col-acc-rig-blue");
        tab.classList.remove("active-tab");
        if (tab.dataset['tab']===elem.dataset['tab']) {
            tab.classList.add("active-tab");
            tab.parentElement.classList.add("col-acc-rig-blue");
            // console.log()
            // tab.parentElement.style.backgroundColor="dodgerblue";
        }
    });
    onload();
}
