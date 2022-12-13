import "./bootstrap";
import("bootstrap/dist/css/bootstrap.min.css");
import("bootstrap-icons/font/bootstrap-icons.css");
import "../sass/app.scss";

const textarea = document.getElementById("text");
const textremaning = document.getElementById("remaning");

textarea.addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = this.scrollHeight - 90 + "px";
    textremaning.innerHTML = this.maxLength - this.value.length;
});

const textarea2 = document.getElementById("text2");
const textremaning2 = document.getElementById("remaning2");

textarea2.addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = this.scrollHeight - 90 + "px";
    textremaning2.innerHTML = this.maxLength - this.value.length;
});

const myModal = document.getElementById("myModal");
const myInput = document.getElementById("myInput");

myModal.addEventListener("shown.bs.modal", () => {
    myInput.focus();
});
