function pole() {
    let a= Number(document.getElementById("a").value)
    let b= Number(document.getElementById("b").value)
    let c= Number(document.getElementById("c").value)

    if (a+b>c && a+c>b && b+c>a && a>0 && b>0 && c>0){
        let p=(a+b+c)/2;
        document.getElementById("wynik1").innerHTML="Pole " +Math.sqrt(p*(p-a)*(p-b)*(p-c))
        if(a==b && a==c && b==c){
           document.getElementById("cecha").innerHTML="trójkąt jest równoboczny";
           document.getElementById("cecha2").innerHTML=" ";
        }
         else if(a==c || a==b || b==c ){
            document.getElementById("cecha").innerHTML="trójkąt jest równoramienny";
            document.getElementById("cecha2").innerHTML=" ";
        }
         else if(a*a+ b*b==c*c ||b*b+c*c==a*a || c*c + a*a ==b*b){
            document.getElementById("cecha").innerHTML="trójkąt jest prostokątny";
            document.getElementById("cecha2").innerHTML="trójkąt jest różnoboczny";
        }
        else {
            document.getElementById("cecha").innerHTML="trójkąt jest różnoboczny";
            document.getElementById("cecha2").innerHTML=" ";
        }
    }
    else{
        document.getElementById("cecha").innerHTML=" ";
        document.getElementById("wynik1").innerHTML="Z podanych boków nie sposób utworzyć trójkąta!";
    }
}

function random() {
    let a =Math. floor(Math. random() *100 +1)
    document.getElementById("wynik2").innerHTML= "Prawdopodobieństwo, że tak będzie wynosi: " + a + "%";
    if(a<=33){
        document.getElementById("wynik2").style.color="red";
    }
    if(a>=34 && a<=66){
        document.getElementById("wynik2").style.color="blue";
    }
    if(a>=67 && a<=100){
        document.getElementById("wynik2").style.color="green";
    }
}

function replace() {
   let a= document.getElementById("a1").value
   let b= document.getElementById("b1").value
   
   let litera1= a.charAt(0);
   let litera2= b.charAt (0);

   let wynik1 = a.replace(litera1,litera2)
   let wynik2 = b.replace(litera2,litera1)

   //document.getElementById("wynik3").innerHTML= litera2+ "   "+ litera1;
   document.getElementById("wynik3").innerHTML= wynik1 + "  " + wynik2;
}

function sort() {
    //let i4a = document.getElementById("a2");

    let a= Number(document.getElementById("a2").value);
    let b= Number(document.getElementById("b2").value);
    let c= Number(document.getElementById("c2").value);
    let max= 0;
    let min= a;
    let mid = 0;

    if (b<min) min=b;
    if (c<min) min=c;
    if (a>max) max=a;
    if (b>max) max=b;
    if (c>max) max=c;

    document.getElementById("wynik4").innerHTML = "najmniejsza: " + min + "  największa: " +  max;

    // sortowanie wersja 1.0:
    let text = "";
    if (a > b && a > c) {
        text += a + ', ';
        if (b > c) text += b + ", " + c;
        else       text += c + ", " + b;
    }

    if (b > a && b > c) {
        text += b + ', ';
        if (a > c) text += a + ", " + c;
        else       text += c + ", " + a;
    }

    if (c > a && c > b) {
        text += c + ', ';
        if (a > b) text += a + ", " + b;
        else       text += b + ", " + a;
    }

    //let w = document.getElementById("wynik42");
    //w.innerHTML = text;
    document.getElementById("wynik42").innerHTML = text;


    //  sortowanie wersja 2.0 (na tablicy):
    let t = [a, b, c];
    let z; // zmienna tymczasowa

    console.log(t);

    if (t[1] > t[0]) {
        z = t[0];
        t[0] = t[1];
        t[1] = z;
    }

    if (t[2] > t[0]) {
        z = t[0];
        t[0] = t[2];
        t[2] = z;
    }

    if (t[2] > t[1]) {
        z = t[1];
        t[1] = t[2];
        t[2] = z;
    }

    document.getElementById("wynik42").innerHTML = t[0] + ", " + t[1] + ", " + t[2];
}

$(document).ready(function() {
    $("button").click(function() {
        let a = $("#a2").val();
        let b = $("#b2").val();
        let c = $("#c2").val();

        //document.getElementById("s41").innerHTML = Math.min(a, b, c);
        $("#s41").text(Math.min(a, b, c));
        //document.getElementById("s42").innerHTML = Math.max(a, b, c);
        $("#s42").html(Math.max(a, b, c));
    });
});
