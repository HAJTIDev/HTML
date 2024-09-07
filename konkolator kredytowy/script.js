function obl() {
    let cel = document.getElementById("cel").value
    let kwota = Number(document.getElementById("kwota").value)
    let raty = Number(document.getElementById("rata").value)
    let opr
    if (raty != 0 && kwota != 0) {
        if (document.getElementById("1").checked) opr = Number(document.getElementById("1").value)
        else if (document.getElementById("2").checked) opr = Number(document.getElementById("2").value)
        else if (document.getElementById("3").checked) opr = Number(document.getElementById("3").value)
        else alert("musisz wybrać oprocentowanie")
        opr = opr / 100
        let k = 12 * (1 - (Math.pow((12 / (12 + opr)), raty)))
        let l = (kwota * opr) / k
        l = Number(Math.round(l + 'e+2') + 'e-2')
        l = l.toFixed(2)
        alert("cel: " + cel + "\n" +
            "kwota: " + kwota + "zł" +
            "\n" + "liczba rat: " + raty +
            '\n' + "oprocentowanie: " + opr * 100 + "%" +
            "\n" + "jedna rata kosztuje: " + l + "zł")
    }
    else alert("wszystkie pola muszą być wypełnione")
}