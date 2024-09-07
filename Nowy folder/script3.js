function fill(){
    let ruch=0
    if(ruch%2==0)document.elementFromPoint(0,1).innerHTML="X"
    else{document.elementFromPoint(x,y).innerHTML=")"}
    ruch++
}
document.getElementById("plansza").addEventListener("click",fill)