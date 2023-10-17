function onbodyload() {
    let elems=document.querySelectorAll("div.order-status");
    elems.forEach(element => {
        if (element.innerText === "In Cart") {
            element.style.color="goldenrod";
        }
        if (element.innerText === "Order Placed") {
            element.style.color="forestgreen";
        }
    });
}