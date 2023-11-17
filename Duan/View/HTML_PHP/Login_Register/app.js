const sign_in_nut = document.querySelector("#sign-in-nut");
const sign_up_nut = document.querySelector("#sign-up-nut");
const container = document.querySelector(".container");

sign_up_nut.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_nut.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
