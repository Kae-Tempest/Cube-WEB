import "./bootstrap";
import "../sass/app.scss";

const textarea = document.getElementById("text");
const textremaning = document.getElementById("remaning");

textarea.addEventListener("input", function (e) {
    this.style.height = "auto";
    this.style.height = this.scrollHeight - 90 + "px";
    textremaning.innerHTML = this.length - this.maxLength
});

