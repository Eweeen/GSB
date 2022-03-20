const btn = document.querySelector('.add-row');
const container = document.querySelector('#table-container');
let nbRowMedocs = document.querySelector('#row_medoc');

let tdGroup = "";
let option = "";

let numberInput = 1;

medicaments.forEach(med => option += `
<option value="${med.medDepotlegal}">${med.medNomcommercial}</option>
`);

btn.addEventListener('click', () => {
    let tr = document.createElement('tr');

    let td1 = document.createElement('td');
    let select = document.createElement('select');
    select.name = "med" + numberInput;
    select.id = "med" + numberInput;
    select.innerHTML = option;

    let td2 = document.createElement('td');
    let inputNumber = document.createElement('input');
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