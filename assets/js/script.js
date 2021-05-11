const scriptURL =
  "https://script.google.com/macros/s/AKfycbwMYDkbYISft1sUe0SHXZEoPGY_n77ZXNUc4enEjUkMma6DRjWr1cywCbTGU2HYlfhJGw/exec";
const nav = document.querySelector(".navbar ul");
const btn = document.querySelector(".icon-bars");
const form = document.forms["form-feedback"];
const alertSuccess = document.querySelector(".alert");
const alertError = document.querySelector(".alert-error");
const btnKirim = document.querySelector(".btn-kirim");
const btnLoading = document.querySelector(".btn-loading");

btn.addEventListener("click", () => {
  nav.classList.toggle("menu-show");
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Hilangkan Tombol Kirim Ganti dengan Tombol Loading
  btnKirim.classList.toggle("d-none");
  btnLoading.classList.toggle("d-none");

  fetch(scriptURL, { method: "POST", body: new FormData(form) })
    .then((response) => {
      form.reset();
      alertSuccess.classList.toggle("d-none");
      btnLoading.classList.toggle("d-none");
      btnKirim.classList.toggle("d-none");
      setTimeout("alertSuccess.classList.toggle('d-none')", 6000);
    })
    .catch((error) => {
      alertError.classList.toggle("d-none");
      btnLoading.classList.toggle("d-none");
      btnKirim.classList.toggle("d-none");
      setTimeout("alertError.classList.toggle('d-none')", 6000);
    });
});
