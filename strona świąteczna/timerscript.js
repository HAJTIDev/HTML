let countDownDate = new Date("Dec 24, 2023 00:00:00").getTime();

let x = setInterval(function() {

    let now = new Date().getTime();

    let distance = countDownDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("days").innerHTML = days + "<span>Dni</span>";
  document.getElementById("hours").innerHTML = hours + "<span>Godzin</span>";
  document.getElementById("minutes").innerHTML = minutes + "<span>minut</span>";
  document.getElementById("seconds").innerHTML = seconds + "<span>sekund</span>";
  document.getElementById("text").innerHTML = "Do Świąt Bożego Narodzenia";

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "Już minęło";
  }
}, 1000);