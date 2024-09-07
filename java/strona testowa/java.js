function add(){
    let a= Number(document.getElementById("x").value)
    let b= Number(document.getElementById("y").value)

    if(a<0 || b<0){
    document.getElementById("xx").innerHTML=a;
    document.getElementById("yy").innerHTML=b;
    document.getElementById("wynik").innerHTML="zla liczba";
    }
    else{
    document.getElementById("xx").innerHTML=a;
    document.getElementById("yy").innerHTML=b;
    document.getElementById("wynik").innerHTML=((a+b)/2 + Math.sqrt(b/2)) ;
    }


}