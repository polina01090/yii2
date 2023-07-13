let count = document.getElementById('count');
let dropDown = document.getElementsByClassName('field-editbouquetform-flowers')[0];
let oldCount = 3;
let flowersDiv = document.getElementById('flowers');

count.addEventListener('click', ()=>{
    if (count.value !== oldCount){
        let query = document.querySelectorAll('.field-editbouquetform-flowers');
        for (const queryElement of query){
            queryElement.remove();
        }
        for (let i = 0; i<count.value; i++){
            flowersDiv.appendChild(dropDown.cloneNode(true));
        }
    }
    oldCount = count.value;

})