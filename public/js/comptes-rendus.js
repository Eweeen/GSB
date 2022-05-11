/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/comptes-rendus.js ***!
  \****************************************/
var btn = document.querySelector('.add-row');
var container = document.querySelector('#table-container');
var nbRowMedocs = document.querySelector('#row_medoc');
var tdGroup = "";
var option = "";
var numberInput = 1;
medicaments.forEach(function (med) {
  return option += "\n<option value=\"".concat(med.medDepotlegal, "\">").concat(med.medNomcommercial, "</option>\n");
});
btn.addEventListener('click', function () {
  var tr = document.createElement('tr');
  var td1 = document.createElement('td');
  var select = document.createElement('select');
  select.name = "med" + numberInput;
  select.id = "med" + numberInput;
  select.innerHTML = option;
  var td2 = document.createElement('td');
  var inputNumber = document.createElement('input');
  inputNumber.type = "number";
  inputNumber.name = "quantite" + numberInput;
  inputNumber.id = "quantite" + numberInput;
  inputNumber.min = "1";
  inputNumber.value = "1";
  td1.appendChild(select);
  td2.appendChild(inputNumber);
  tr.appendChild(td1);
  tr.appendChild(td2);
  container.appendChild(tr);
  numberInput++;
  nbRowMedocs.value++;
});
/******/ })()
;