function zodiak() {
  let dane = new Date(document.getElementById("a").value);
  let day = dane.getDate();
  let month = dane.getMonth()+1;
  let odpowiedz = document.getElementById("wynik");

       if (month == 12 && day >= 22 || month == 1 && day <= 19) odpowiedz.innerHTML = "Twój znak zodiaku: KOZIOROŻEC";
  else if (month == 1 && day >= 20  || month == 2 && day <= 18) odpowiedz.innerHTML= "Twój znak zodiaku: WODNIK"; 
  else if (month == 2 && day >= 19  ||  month == 3 && day <= 20) odpowiedz.innerHTML= "Twój znak zodiaku: RYBY";
  else if (month == 3 && day >= 21  ||  month == 4 && day <= 19) odpowiedz.innerHTML= "Twój znak zodiaku: BARAN"; 
  else if (month == 4 && day >= 20  ||  month == 5 && day <= 20) odpowiedz.innerHTML= "Twój znak zodiaku: BYK";
  else if (month == 5 && day >= 21  ||  month == 6 && day <= 20) odpowiedz.innerHTML= "Twój znak zodiaku: BLIŹNIĘTA"; 
  else if (month == 6 && day >= 21  ||  month == 7 && day <= 22) odpowiedz.innerHTML= "Twój znak zodiaku: RAK"; 
  else if (month == 7 && day >= 23  ||  month == 8 && day <= 22) odpowiedz.innerHTML= "Twój znak zodiaku: LEW"; 
  else if (month == 8 && day >= 23  ||  month == 9 && day <= 22) odpowiedz.innerHTML= "Twój znak zodiaku: PANNA";
  else if (month == 9 && day >= 23  ||  month == 10 && day <= 22) odpowiedz.innerHTML= "Twój znak zodiaku: WAGA";
  else if (month == 10 && day >= 23 ||  month == 11 && day <= 21) odpowiedz.innerHTML= "Twój znak zodiaku: SKORPION"; 
  else if (month == 11 && day >= 22 ||  month == 12 && day <= 21) odpowiedz.innerHTML= "Twój znak zodiaku: STRZELEC";
}