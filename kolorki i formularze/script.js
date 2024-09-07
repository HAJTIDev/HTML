document.querySelector("#send").addEventListener("click", send);
document.querySelector("#clear").addEventListener("click", erase);

function send() {
    let fav = document.querySelector('input[name="fav"]:checked')
    let bad = document.querySelector('input[name="bad"]:checked')
    let other = document.querySelector("#other").checked ? "Tak" : "Nie";
    if (fav && bad) {
        document.querySelector("#result").innerHTML =
            `Twoje preferencje:<br/> 
    Lubisz kolor: ${fav.value}<br/> Nie lubisz koloru: ${bad.value}</br>
    Lubisz inne kolory: ${other}</br>`
    }
    else document.querySelector("#result").innerHTML = "wybierz oba kolory"
}
function erase() {
    document.querySelector("#result").innerHTML = "";
}