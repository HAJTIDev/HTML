function chColor(elem) {
    document.getElementById("edytor").style.backgroundColor = elem.value;
}

function chFont(elem) {
    document.getElementById("edytor").style.color = elem.value;
}

function chSize(elem) {
    console.log("value: " + elem.value);
    document.getElementById("edytor").style.fontSize = elem.value;
}

function chFrame(){
    if (document.getElementById("ramka").checked) document.getElementById("edytor").style.border = "7px dashed red";
    else                                          document.getElementById("edytor").style.border = "0px";
}
function inp(){
    let text=document.getElementById("text").value;
    document.getElementById("edytor").innerHTML=text;
}