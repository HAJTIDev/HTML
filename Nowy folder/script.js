let val
let ope
function view(x) {
    document.getElementById("wynik").innerHTML += x;
}
function cl() {
    document.getElementById("wynik").innerHTML = " ";
}
function op(x) {
    val = Number(document.getElementById("wynik").innerHTML)
    ope = x
    if(ope=="%"){
        document.getElementById("wynik").innerHTML = val/100;
    }
    else if(ope=="pier"){
        document.getElementById("wynik").innerHTML = Math.sqrt(val);
    }
    else if(ope=="|x|"){
        if(val<0)document.getElementById("wynik").innerHTML = val*(-1);
        else document.getElementById("wynik").innerHTML = val;
    }
    else if(ope=="+/-") document.getElementById("wynik").innerHTML = val*(-1);
    else document.getElementById("wynik").innerHTML = " ";
}
function eq() {
    let a = Number(document.getElementById("wynik").innerHTML)
    switch (ope) {
        case "+":
            document.getElementById("wynik").innerHTML = val + a;
            break
        case "-":
            document.getElementById("wynik").innerHTML = val - a;
            break
        case "/":
            if(a!=0) document.getElementById("wynik").innerHTML = val / a;
            else alert("nie można dzielić przez 0!")
            break
        case "*":
            document.getElementById("wynik").innerHTML = val * a;
            break
        case "pot":
            document.getElementById("wynik").innerHTML = Math.pow(val, a);
            break
        case "mod":
            if (val != 0 && a != 0) {
                document.getElementById("wynik").innerHTML = (((val % a)+a)%a);
            }
            else alert("Nie można dzielic przez 0!")
    }
}