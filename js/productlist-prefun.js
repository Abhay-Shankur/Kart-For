// Function to get Products for ProductList
function getProducts(categoryId) {
    let elem1 = document.getElementById("center-panel-content");
    // let categoryid=sessionStorage.getItem("Category Id");
    let centralPanel=new XMLHttpRequest();
    centralPanel.onreadystatechange = function () {
        if (this.readyState==4 && this.status==200) {
            let htmlDiv=this.responseText;
            // console.log(htmlDiv)
            elem1.innerHTML= htmlDiv;
            specIcon();
        }
    };
    centralPanel.open("POST","./include/productlistServer.php?categoryIdForProducts="+categoryId,false);
    centralPanel.send();

}

// Function to Show a Product.
function showProduct(elem) {
    productId=elem.getAttribute("data-id");
    window.open("product.php?productId="+productId,"_top");
}

// Fumction for Spec Icon
function specIcon() {
    let icons=document.querySelectorAll("i.icon-area");
    icons.forEach(icon => {
        // console.log(icon.dataset["key"]);
        switch(icon.dataset["key"]) {
            case 'ROM' :
                icon.classList.add("fa-hdd");
                break;

            case 'Display' :
                icon.classList.add("fa-mobile-alt");
                break;

            case 'Camera' :
                icon.classList.add("fa-camera");
                break;

            case 'OS' :
                icon.classList.add("fa-microchip");
                break;

            case 'Warranty' :
                icon.classList.add("fa-award");
                break;
        }
    });
}
