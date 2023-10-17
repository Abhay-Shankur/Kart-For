// Function to Expand Project Box
function expandProjectbox(elem) {
    let dataId=elem.getAttribute("data-id");
    let descElem=document.getElementsByClassName("project-description");

    let iconContent=document.getElementsByClassName("content-icon");
    let icon=iconContent[dataId-1].firstElementChild;
    icon.classList.toggle("expand-collapse");
    console.log()
    if (icon.classList.contains("expand-collapse")) {
        icon.innerText="expand_less";
        descElem[dataId-1].style.display="flex";
    }else {
        icon.innerText="expand_more";
        descElem[dataId-1].style.display="none";
    }    
}
// Function for Rating
function rating(elem) {
    let val=elem.getAttribute("data-val");
    let parent=elem.parentElement;
    for (let index = 0; index < parent.children.length; index++) {
        parent.children[index].innerText="star_border";
    }
    for (let index = 0; index < val; index++) {
        parent.children[index].innerText="star";
    }

    let rate=document.getElementById("review-rate");
    rate.setAttribute("value",val.toString());
}

// Function to bars 
function bars() {
    let bar=document.getElementsByClassName("bar bar-inner");
    for (let index = 0; index < bar.length; index++) {
        let val=bar[index].getAttribute("data-val");
        bar[index].style.width=val.toString()+"%";
    }
}

// Function to get reviews on body load
document.body.onload=()=>{
    let parentMain=document.getElementById("review-me");
    let parentBody=parentMain.children[1];
    // console.log(parentMain.childrens.classList);
    
    let child;
    let xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200) {
            child=this.responseText;
            parentBody.innerHTML=child;
        }
    };
    xmlhttp.open("GET", "server.php?", true);
    xmlhttp.send();

    bars();
};

// Function to load all reviews
function overlayReviews() {
    document.getElementById("overlay-review").style.display="flex";
    let parentBody=document.getElementById("overlay-items-body");
    let child;
    let xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200) {
            child=this.responseText;
            parentBody.innerHTML=child;
        }
    };
    xmlhttp.open("GET", "server.php?Reviews="+true, true);
    xmlhttp.send();
    // console.log(parentBody);
}

// Function to close Overlay
function closeOverlayReviews() {
    document.getElementById("overlay-review").style.display="none";
}