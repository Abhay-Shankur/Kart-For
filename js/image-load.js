function loadImageSize(child,parent) {
    let parentHeight = parent.clientHeight;
    let parentWidth = parent.clientWidth;
    let childHeight = child.naturalHeight;
    let childWidth = child.naturalWidth;
    let newHeight,newWidth,prt;
 
    if(childHeight==childWidth){
        if(parentHeight==parentWidth){newWidth=parentWidth,newHeight=parentHeight;}
        else if(parentHeight>parentWidth){newWidth=newHeight=parentWidth;}
        else {newWidth=newHeight=parentHeight;}
    }
    else if (childHeight > childWidth) {
        prt = (childWidth * 100) / childHeight;
        newWidth = (parentWidth * prt) / 100, newHeight = parentHeight;
    }
    else {
        prt = (childHeight * 100) / childWidth;
        newWidth = parentWidth, newHeight = (parentHeight * prt) / 100;
    }
    // if (parentHeight > parentWidth  && parentHeight > parentWidth) {
    //     newHeight=parentHeight;
    //     prt=childHeight/childWidth;
    //     newWidth=parentWidth/prt;
    // } else if (parentWidth > parentHeight) {
        
    // } else {

    // }
    child.setAttribute("width", newWidth.toString());
    child.setAttribute("height", newHeight.toString());
}

function loadimage(img) {
    let imgHeight = img.naturalHeight;
    let imgWidth = img.naturalWidth;

    let parentHeight = img.parentElement.clientHeight;
    let parentWidth = img.parentElement.clientWidth;

    let prt,newWidth,newHeight;
    
    if (imgHeight>imgWidth && parentHeight>parentWidth) {
        // prt = (imgWidth * 100) / imgHeight;
        // img.setAttribute("width", prt.toString()+"%");
        // img.setAttribute("height", "100%");

        prt = imgHeight / imgWidth;
        newWidth=parentHeight/prt;
        prt=(newWidth * 100) / parentWidth;
        img.setAttribute("height", "100%");
        img.setAttribute("width", prt.toString()+"%");
    } else if (imgHeight<imgWidth && parentHeight<parentWidth) {
        // prt = (imgHeight * 100) / imgWidth;
        // img.setAttribute("height", prt.toString()+"%");
        // img.setAttribute("width", "100%");

        prt = imgWidth / imgHeight;
        newWidth=parentHeight*prt;
        prt=(newWidth * 100) / parentWidth;
        img.setAttribute("height", "100%");
        img.setAttribute("width", prt.toString()+"%");
    } else if (imgHeight>imgWidth && parentHeight<parentWidth) {
        prt = (imgWidth * 100) / imgHeight;
        // prt = (parentWidth * prt) / 100;
        
        img.setAttribute("width", prt.toString()+"%");
        img.setAttribute("height", "100%");
    } else if (imgHeight<imgWidth && parentHeight>parentWidth) {
        prt = (imgHeight * 100) / imgWidth;
        // prt = (parentHeight * prt) / 100;

        img.setAttribute("height", prt.toString()+"%");
        img.setAttribute("width", "100%");
    } else if (imgHeight<imgWidth && parentHeight==parentWidth) {
        prt = imgHeight / imgWidth;
        newWidth=parentHeight/prt;
        prt=(newWidth * 100) / parentWidth;
        img.setAttribute("height", "100%");
        img.setAttribute("width", prt.toString()+"%");

    } else if (imgHeight>imgWidth && parentHeight==parentWidth) {
        prt = imgHeight / imgWidth;
        newWidth=parentHeight/prt;
        prt=(newWidth * 100) / parentWidth;
        img.setAttribute("height", "100%");
        img.setAttribute("width", prt.toString()+"%");
    }
    else if (imgHeight==imgWidth && parentHeight==parentWidth){
        img.setAttribute("height", "100%");
        img.setAttribute("width", "100%");
    }else {
        console.log("else img")
    }
        
    // if (imgHeight>imgWidth) {
    //     prt = (imgWidth * 100) / imgHeight;
        
    //     img.setAttribute("width", prt.toString()+"%");
    //     img.setAttribute("height", "100%");
    // } else if (imgHeight<imgWidth) {
    //     prt = (imgHeight * 100) / imgWidth;
        
    //     img.setAttribute("height", prt.toString()+"%");
    //     img.setAttribute("width", "100%");
    // }

}