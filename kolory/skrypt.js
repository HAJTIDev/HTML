function liczenie(){
    let a= Number(document.getElementById("a").value)
    let b= Number(document.getElementById("b").value)

    if(a>0 && a<4 && b>0){
        if(a==1){
            document.getElementById("wynik").innerHTML= "koszt zamówienia wynosi "+5*b;
        }
        if(a==2){
            document.getElementById("wynik").innerHTML= "koszt zamówienia wynosi "+7*b;
        }
        if(a==3){
            document.getElementById("wynik").innerHTML= "koszt zamówienia wynosi "+6*b;
        }
    }
    else{
        document.getElementById("wynik").innerHTML= "złe wartości ";
    }
}