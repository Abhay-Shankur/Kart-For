// Function to load Image 
function loadImage(elem) {
    let parent=elem.parentElement;
    let parentWidth=parent.clientWidth, parentHeight=parent.clientHeight;
    let imgWidth=elem.naturalWidth, imgHeight=elem.naturalHeight;
    let prt, newWidth, newHeight;
    if(imgWidth>imgHeight) {
        prt=imgWidth/imgHeight;
        newWidth=parentWidth;
        newHeight=parentWidth/prt;
        elem.setAttribute("width",newWidth.toString());
        elem.setAttribute("height",newHeight.toString());
    } else if (imgHeight>imgWidth) {
        prt=imgHeight/imgWidth;
        newHeight=parentWidth;
        newWidth=parentWidth/prt;
        elem.setAttribute("width",newWidth.toString());
        elem.setAttribute("height",newHeight.toString());
    }
}
