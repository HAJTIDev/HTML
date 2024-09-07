function add(){
    let a= Number(document.getElementById("a").value);
    let b= Number(document.getElementById("b").value);
    let c= Number(document.getElementById("c").value);

    let d= document.getElementById("option").value;

    if(d==1){
        if(a!=0 && c!=-1 && a+b>=0){
        document.getElementById("wynik").innerHTML=(Math.sqrt(a+b)/a)-(1/(c+1));
        }
    }
}