let startIndex=0,count;
let imgsdiv=document.getElementsByClassName("imgs-list-items");
let prt=document.getElementById("product-imgs-list");
let no=Math.round( prt.clientWidth/imgsdiv[0].clientWidth);

function nextImg() {
    if (startIndex!=(imgsdiv.length-no) && imgsdiv.length>no) {
        imgsdiv[startIndex].style.display="none";
        startIndex++;
    }
}

function prevImg() {
    if (startIndex!=0) {
        imgsdiv[startIndex-1].style.display="inline-block";
        startIndex--;
    }
}

// document.getElementsByClassName("product-imgs").addEventListener('mouseenter',function(e){console.log(e.target)});
// let img=document.getElementById("product-img");
let img=document.getElementById("product-img-main");
let mainsrc=img.getAttribute("src");
function imgclick(elem) {
    let src=elem.getAttribute("src");
    img.setAttribute("src",src);
}
function imgin(elem) {
    let img=document.getElementById("product-img-main");
    let src=elem.getAttribute("src");
    img.setAttribute("src",src);
}
function imgout() {
    let img=document.getElementById("product-img-main");
    img.setAttribute("src",mainsrc);
}
 
// Function for Add to Cart 
function addToCart(prdid,color) {
    if (isAlreadyLoggedIn()) {
        let xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange= function() {
            if(this.readyState==4 && this.status==200) {
                document.getElementById("order-overlay").style.display="flex";
                document.getElementById("order-overlay").innerHTML=this.responseText;
                // console.log(this.responseText)
            }
        };
        xmlhttp.open("POST","./include/checkout.php?productId="+prdid+"&color="+color,true);
        xmlhttp.send();
    } else {
        let xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange= function() {
            if(this.readyState==4 && this.status==200) {
                document.getElementById("order-overlay").style.display="flex";
                document.getElementById("order-overlay").innerHTML=this.responseText;
            }
        };
        xmlhttp.open("POST","./include/checkout.php?notLoggedIn=true",true);
        xmlhttp.send();
    }
}

// Function for Buy Now 
function buyNow(prdid,color) {
    if (isAlreadyLoggedIn()) {
        sessionStorage.setItem("overlay_alive","true");
        // sessionStorage.setItem("Product Id",prdid);
        // sessionStorage.setItem("Product req",color);
        document.cookie="Product_Id="+prdid.toString()+";";
        document.cookie="Product_req="+color.toString()+";";
        getTabs();
    } else {
        let xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange= function() {
            if(this.readyState==4 && this.status==200) {
                document.getElementById("order-overlay").style.display="flex";
                document.getElementById("order-overlay").innerHTML=this.responseText;
            }
        };
        xmlhttp.open("POST","./include/checkout.php?notLoggedIn=true",true);
        xmlhttp.send();
    }
}

// 
function getlocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((posi)=>{
            fetch("https://apis.mapmyindia.com/advancedmaps/v1/f726fc6d4779e72b617a33b3128ab525/rev_geocode?lat="+posi.coords.latitude+"&lng="+posi.coords.longitude+"&region=IND")
                .then(res=>res.json())
                .then(data => locationdata(data) )
                
        });
    } else {
        console.log("Unable to connect");
    }
}
function locationdata(data) {
    let jsonlocationdata=data["results"][0];
    let arradd=jsonlocationdata["formatted_address"].split(",");
    arradd.pop();arradd.pop();
    document.getElementsByName("fulladdress")[0].value=arradd.toString();
    document.getElementsByName("city")[0].value=jsonlocationdata["city"];
    document.getElementsByName("state")[0].value=jsonlocationdata["state"];
    document.getElementsByName("pincode")[0].value=jsonlocationdata["pincode"];
}


// Funtion to get CheckOut Tabs
function getTabs() {
    document.getElementById("order-overlay").style.display="flex";
    let xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange= function() {
        if(this.readyState==4 && this.status==200) {
            document.getElementById("order-overlay").innerHTML=this.responseText;
        }
    };
    xmlhttp.open("POST","./include/checkout.php?tabs=true",false);
    xmlhttp.send();
}

// Function for Next Arrow
function nextTab() {
    // console.log(document.getElementById("hidden-input-invoice").value)
    setDetails('Invoice_Detail',document.getElementById("hidden-input-invoice").value)
    setDetails('Seller_Detail',document.getElementById("hidden-input-seller").value)
    let tabs=document.querySelectorAll("div.tab");
    for (let index = 0; index < tabs.length; index++) {
        if(tabs[index].classList.contains("active-tab")) {
            tabs[index].classList.remove("active-tab");
            tabs[index+1].classList.add("active-tab");
            tabPos();
            document.getElementById("prev").style.display="block";
            // if(index+2 === tabs.length) {
            //     document.getElementById("next").style.display="none";
            // }
            break;
        }
    }
}

// Function for Previous Arrow
function prevTab() {
    let tabs=document.querySelectorAll("div.tab");
    for (let index = tabs.length-1; index >=0 ; index--) {
        if(tabs[index].classList.contains("active-tab")) {
            tabs[index].classList.remove("active-tab");
            tabs[index-1].classList.add("active-tab");
            tabPos();
            // document.getElementById("next").style.display="block";
            if(index-1 === 0) {
                document.getElementById("prev").style.display="none";
            } 
            break;
        }
    }
}

// Function to 
function tabPos() {
    let head=document.querySelectorAll("div.order-head-nav");
    let tabs=document.querySelectorAll("div.tab");
    for (let index = 0; index < head.length; index++) {
        head[index].firstElementChild.classList.remove("active-tab-head");
        if(tabs[index].classList.contains("active-tab")) {
            let headdiv=document.createElement("div");
            headdiv.classList.add("order-head-nav-item");
            headdiv.classList.add("active-tab-head");
            headdiv.innerText=index+1;
            head[index].firstElementChild.replaceWith(headdiv);
            head[index].lastElementChild.style.color="dodgerblue";
            if(index!=0) {
                let checki=document.createElement("i");
                checki.classList.add("fas");
                checki.classList.add("fa-check-circle");
                checki.style.color="green";
                head[index-1].firstElementChild.replaceWith(checki);
                head[index-1].lastElementChild.style.color="green";
                
                break;
            }
        }
    }
}

// To set the Details as Cookie
function setDetails(id,data) {
    document.cookie=id.toString()+"="+data.toString()+";";
}

// Process Order
function proccessOrder() {
    let id=sessionStorage.getItem("id");
    let prd=sessionStorage.getItem("Product Id");
    let col=sessionStorage.getItem("Product req");
    let seller=sessionStorage.getItem("Seller Detail");
    let customer=sessionStorage.getItem("Customer Detail");
    let invoice=sessionStorage.getItem("Invoice Detail");
    let xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange= function() {
        if(this.readyState==4 && this.status==200) {
            document.getElementById("order-overlay").style.display="flex";
            document.getElementById("order-overlay").innerHTML=this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("POST","./include/processorder.php?id="+id+"&product="+prd+"&color="+col+"&seller="+seller+"&customer="+customer+"&invoice="+invoice,true);
    xmlhttp.send();
}

// Process Order
function proccessOrder(pass) {
    // let id=sessionStorage.getItem("id");
    // let prd=sessionStorage.getItem("Product Id");
    // let col=sessionStorage.getItem("Product req");
    // let seller=sessionStorage.getItem("Seller Detail");
    // let customer=sessionStorage.getItem("Customer Detail");
    // let invoice=sessionStorage.getItem("Invoice Detail");
    // let xmlhttp=new XMLHttpRequest();
    // xmlhttp.onreadystatechange= function() {
    //     if(this.readyState==4 && this.status==200) {
    //         document.getElementById("order-overlay").style.display="flex";
    //         document.getElementById("order-overlay").innerHTML=this.responseText;
    //         // console.log(this.responseText);
    //     }
    // };
    // xmlhttp.open("POST","./include/processorder.php?id="+id+"&product="+prd+"&color="+col+"&seller="+seller+"&customer="+customer+"&invoice="+invoice,true);
    // xmlhttp.send();
    let xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange= function() {
        if(this.readyState==4 && this.status==200) {
            document.getElementById("order-overlay").style.display="flex";
            document.getElementById("order-overlay").innerHTML=this.responseText;
            // console.log(this.responseText);
        }
    };
    xmlhttp.open("POST","./include/processorder.php?password="+pass,true);
    xmlhttp.send();
}