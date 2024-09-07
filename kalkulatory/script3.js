let ruch = 0
let tab = []
function fill(x) {
    if (ruch >= 5) {
        if (tab[1] == tab[2] && tab[2] == tab[3] && tab[1] == "X") alert("wygrał krzyżyk")
        else if (tab[1] == tab[2] && tab[2] == tab[3] && tab[1] == "O") alert("wygrało kółko")
        else if (tab[4] == tab[5] && tab[5] == tab[6] && tab[6] == "X") alert("wygrał krzyżyk")
        else if (tab[4] == tab[5] && tab[5] == tab[6] && tab[6] == "O") alert("wygrało kółko")
        else if (tab[7] == tab[8] && tab[8] == tab[9] && tab[7] == "X") alert("wygrał krzyżyk")
        else if (tab[7] == tab[8] && tab[8] == tab[9] && tab[7] == "O") alert("wygrało kółko")
        else if (tab[1] == tab[5] && tab[5] == tab[9] && tab[5] == "X") alert("wygrał krzyżyk")
        else if (tab[1] == tab[5] && tab[5] == tab[9] && tab[5] == "O") alert("wygrało kółko")
        else if (tab[3] == tab[5] && tab[5] == tab[7] && tab[3] == "X") alert("wygrał krzyżyk")
        else if (tab[3] == tab[5] && tab[5] == tab[7] && tab[3] == "O") alert("wygrało kółko")
        else if (tab[1] == tab[4] && tab[4] == tab[7] && tab[1] == "X") alert("wygrał krzyżyk")
        else if (tab[1] == tab[4] && tab[4] == tab[7] && tab[1] == "O") alert("wygrało kółko")
        else if (tab[2] == tab[5] && tab[5] == tab[8] && tab[2] == "X") alert("wygrał krzyżyk")
        else if (tab[2] == tab[5] && tab[5] == tab[8] && tab[2] == "O") alert("wygrało kółko")
        else if (tab[3] == tab[6] && tab[6] == tab[9] && tab[3] == "X") alert("wygrał krzyżyk")
        else if (tab[3] == tab[6] && tab[6] == tab[9] && tab[3] == "O") alert("wygrało kółko")
        if(ruch==9) alert("remis")
    }
    if (ruch % 2 == 0) {
        tab[x] = "X"
        document.getElementById(x).value = "X"
    }
    else {
        tab[x] = "O"
        document.getElementById(x).value = "O"
    }
    ruch++

}