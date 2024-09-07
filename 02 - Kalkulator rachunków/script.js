let buton=document.querySelector('.count');
let reset=document.querySelector('.yes');
const obl = () =>{
    let kwota=Number(document.querySelector("#price").value)
    let ilosc=Number(document.querySelector("#people").value)
    let napiwek=Number(document.querySelector("#tip").value)

    if(kwota!=0 && ilosc!=0 && napiwek!=0){
        document.querySelector(".cost-info").style.display= 'block';
        pomoc=kwota*napiwek
        document.querySelector(".cost").innerHTML=Number(Math.round((kwota+pomoc)/ilosc + 'e+2') + 'e-2')
        document.querySelector(".yes").style.display= 'block';
    }
    else document.querySelector(".error").innerHTML="wszystkie pola muszą być wypełnione lub wybrane"
}
const rest = ()=> location.reload()
reset.addEventListener('click',rest)
buton.addEventListener('click',obl)