let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  let b = document.querySelector(".progress-bar");
  let width = parseInt(b.style.width);
  let a = 25;

  if (width <= 100) {
    if (n == 1) {
      if (width < 100) {
        a = width + 25;
        b.innerHTML = a + "%";
        b.style.width = a + "%";
        showSlides((slideIndex += n));
      }
    } else {
      if (width > 25) {
        a = width - 25;
        b.innerHTML = a + "%";
        b.style.width = a + "%";
        showSlides((slideIndex += n));
      }
    }
  } else {
    b.style.width = a + "%";
    b.innerHTML = a + "%";
    showSlides((slideIndex += n));
  }
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slide");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
