function RGB() {
    let r = Number(document.getElementById("r").value);
    let g = Number(document.getElementById("g").value);
    let b = Number(document.getElementById("b").value);

    if (r > 255 || g > 255 || b > 255 || r < 0 || g < 0 || b < 0) alert("nie moze być więcej niż 255 lub mniejsze niż 0")
    else {
        r = parseInt(r).toString(16);
        g = parseInt(g).toString(16);
        b = parseInt(b).toString(16);

        if (r.length == 1)
            r += "0";
        if (g.length == 1)
            g += "0";
        if (b.length == 1)
            b += "0";
        document.getElementById("war").innerHTML = "#" + r + g + b;
    }
}

function Hex() {
    let r, g, b;
    let hex = document.getElementById("hex").value;

    if (hex.length == 0) alert("nie moze byc puste")
    else {
        if (hex == "") hex = "000000";
        if (hex.charAt(0) == "#") hex = hex.substring(1, hex.length);
        if (hex.length != 6) alert("musi mieć 6 znaków");
        else {
            r = hex.substring(0, 2);
            g = hex.substring(2, 4);
            b = hex.substring(4, 6);
            r = parseInt(r, 16);
            g = parseInt(g, 16);
            b = parseInt(b, 16);
            if (isNaN(r) || isNaN(g) || isNaN(b)) alert("zła wartość")
            else {
                document.getElementById("war2").innerHTML = "rgb(" + r + ", " + g + ", " + b + ")";
            }
        }
    }
}