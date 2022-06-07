fetch('nav.php')
.then(res => res.text())
.then(text => {
    let oldelem = document.querySelector("script#theNavbar");
    let newelem = document.createElement("div");
    newelem.innerHTML = text;
    oldelem.parentNode.replaceChild(newelem,oldelem);
})