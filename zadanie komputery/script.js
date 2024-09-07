    let zamówienie=0
    let a=Number(document.getElementById("a").innerHTML)
    let b=Number(document.getElementById("b").innerHTML)
    let c=Number(document.getElementById("c").innerHTML)
    let d=Number(document.getElementById("d").innerHTML)

    if (a==0)              document.getElementById("a").style.backgroundColor = "red";
    //else                 document.getElementById("a").style.backgroundColor = "honeydew"
    else if (a>=1 && a<=5) document.getElementById("a").style.backgroundColor="yellow"
    else                   document.getElementById("a").style.backgroundColor="lime";//"honeydew"
    
    if(b==0){
        document.getElementById("b").style.backgroundColor="red"
    }
    else{
        document.getElementById("b").style.backgroundColor="honeydew"
    }
    
    if(c==0){
        document.getElementById("c").style.backgroundColor="red"
    }
    else{
        document.getElementById("c").style.backgroundColor="honeydew"
    }
    if(d==0){
        document.getElementById("d").style.backgroundColor="red"
    }
    else{
        document.getElementById("d").style.backgroundColor="honeydew"
    }
    
    
    if(b>=1 && b<=5){
        document.getElementById("b").style.backgroundColor="yellow"
    }
    else{
        document.getElementById("b").style.backgroundColor="honeydew"
    }
    if(c>=1 && c<=5){
        document.getElementById("c").style.backgroundColor="yellow"
    }
    else{
        document.getElementById("c").style.backgroundColor="honeydew"
    }
    if(d>=1 && d<=5){
        document.getElementById("d").style.backgroundColor="yellow"
    }
    else{
        document.getElementById("d").style.backgroundColor="honeydew"
    }
function spr(){
    let a=Number(document.getElementById("a").innerHTML)
    let b=Number(document.getElementById("b").innerHTML)
    let c=Number(document.getElementById("c").innerHTML)
    let d=Number(document.getElementById("d").innerHTML)

    if(a==0){
        document.getElementById("a").style.backgroundColor="red"
    }
    else{
        document.getElementById("a").style.backgroundColor="honeydew"
    }
    if(b==0){
        document.getElementById("b").style.backgroundColor="red"
    }
    else{
        document.getElementById("b").style.backgroundColor="honeydew"
    }
    if(c==0){
        document.getElementById("c").style.backgroundColor="red"
    }
    else{
        document.getElementById("c").style.backgroundColor="honeydew"
    }
    if(d==0){
        document.getElementById("d").style.backgroundColor="red"
    }
    else{
        document.getElementById("d").style.backgroundColor="honeydew"
    }
    if(a>=1 && a<=5){
        document.getElementById("a").style.backgroundColor="yellow"
    }
    if(b>=1 && b<=5){
        document.getElementById("b").style.backgroundColor="yellow"
    }
    else{
        document.getElementById("b").style.backgroundColor="honeydew"
    }
    if(c>=1 && c<=5){
        document.getElementById("c").style.backgroundColor="yellow"
    }
    else{
        document.getElementById("c").style.backgroundColor="honeydew"
    }
    if(d>=1 && d<=5){
        document.getElementById("d").style.backgroundColor="yellow"
    }
    else{
        document.getElementById("d").style.backgroundColor="honeydew"
    }
}
function akt1(){
    let b=prompt("podaj nową wartość")
    if(b>=0) document.getElementById("a").innerHTML=b
    else alert("zła wartość")
    //spr()

}
function akt2(){
    let b=prompt("podaj nową wartość")
    if(b>=0) document.getElementById("b").innerHTML=b
    else alert("zła wartość")
    spr()

}
function akt3(){
    let b=prompt("podaj nową wartość")
    if(b>=0) document.getElementById("c").innerHTML=b
    else alert("zła wartość")
    spr()

}
function akt4(){
    let b=prompt("podaj nową wartość")
    if(b>=0) document.getElementById("d").innerHTML=b
    else alert("zła wartość")
    spr()

}
function ord1(){
    zamówienie++
    alert("zamówienie nr "+ zamówienie + " produkt "+" Skrętka U/UTP drut")
}
function ord2(){
    zamówienie++
    alert("zamówienie nr "+ zamówienie + " produkt "+" Skrętka U/UTP linka")
}
function ord3(){
    zamówienie++
    alert("zamówienie nr "+ zamówienie + " produkt "+" Wtyki 8P8C")
}
function ord4(){
    zamówienie++
    alert("zamówienie nr "+ zamówienie + " produkt "+" Moduły Keystone")
}

// =====================================================================================
console.log(document.getElementsByClassName("value"));
console.log(document.getElementsByTagName("td:nth-child(3)"));

const colection = document.getElementsByClassName("value");
const arr = Array.from(colection);

function bgChange(i) {
    console.log(i.innerHTML);
    //i.style.backgroundColor = "red";

    let v = Number(i.innerHTML);
    //let bg = i.style.backgroundColor;

    if (v==0)              i.style.backgroundColor = "red";
    else if (v>=1 && v<=5) i.style.backgroundColor = "yellow"
    else                   i.style.backgroundColor = "lime";

    //i.style.backgroundColor = fun(i.innerHTML);
}

//arr.forEach(element => {
Array.from(document.getElementsByClassName("value")).forEach(bgChange);
Array.from(document.getElementsByClassName("value")).forEach(item => {item.onchange = bgChange});
//  jQuery:  (dlaczego warto stosować)
// $(".value").forEach(i => {});
// $("td:nth-child(3)").forEach(i => {});


// function funkcja2() {

// }

// funkcja1(zmienna A, funkcja2);
// funkcja1(zmA, function() {
//     ...;
// })