function obl(){
    let rodzaj=Number(document.getElementById("rodzaj").value);
    let litry=Number(document.getElementById("litry").value);
    let cena
    if(rodzaj==1) cena=4
   else if(rodzaj==2) cena=3.5
    else cena=0
    document.getElementById("wynik").innerHTML="koszt paliwa: "+(cena*litry)+" zł"
}