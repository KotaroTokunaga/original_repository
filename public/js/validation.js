/******/ (() => { // webpackBootstrap
/*!************************************!*\
  !*** ./resources/js/validation.js ***!
  \************************************/
document.addEventListener("DOMContentLoaded", function () {
  document.querySelector("form").addEventListener("submit", function (event) {
    var username = document.getElementById("name").value;
    var regex = /[\u3000\s]/; // 全角スペースまたは半角スペースを検出

    if (regex.test(username)) {
      alert("ユーザーネームにスペースを含めることはできません。");
      event.preventDefault(); // フォーム送信を防止
    }
  });
});
/******/ })()
;