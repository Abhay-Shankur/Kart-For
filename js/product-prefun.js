
// Function to open the Full Spec
function openspec() {
    document.getElementById("full-spec-div").classList.add("opening-div");
}

// Function to close the Full Spec
function closespec() {
    document.getElementById("full-spec-div").classList.replace("opening-div","closing-div");
    // document.getElementById("full-spec-div").classList.add("opening-div");
}

// Function to close the overlay
function closeoverlay() {
    document.getElementById("order-overlay").style.display="none";
}

