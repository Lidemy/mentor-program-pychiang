let arr = [];
let result = document.getElementById('result');
let temp = document.getElementById('temp');

//display numbers on the temp div
const numDisplay = (numId) => {
    document.getElementById(numId).addEventListener('click', () => {
        if(temp.innerText === '') {
            temp.innerText = document.getElementById(numId).innerText;
        } else {
            temp.innerText += document.getElementById(numId).innerText;
        } 
    })
}

numDisplay('zero');
numDisplay('one');
numDisplay('two');
numDisplay('three');
numDisplay('four');
numDisplay('five');
numDisplay('six');
numDisplay('seven');
numDisplay('eight');
numDisplay('nine');

//display operators on the temp div
const operatorDisplay= (operatorId) => {
    document.getElementById(operatorId).addEventListener('click', () => {
        temp.innerText += document.getElementById(operatorId).innerText;
    }) 
}

operatorDisplay('plus');
operatorDisplay('minus');
operatorDisplay('multi');
operatorDisplay('divide');
  
//calculate the result (only 2 sets of numbers)                                               
document.getElementById('equal').addEventListener('click', () => {
    if(temp.innerText.includes('+')) {
        arr = temp.innerText.split('+');
        temp.innerText = parseInt(arr[0],10) + parseInt(arr[1],10);
        result.innerText = parseInt(arr[0],10) + parseInt(arr[1],10);
    } else if(temp.innerText.includes('-')) {
        arr = temp.innerText.split('-');
        temp.innerText = arr[0] - arr[1];
        result.innerText = arr[0] - arr[1];
    } else if(temp.innerText.includes('×')) {
        arr = temp.innerText.split('×');
        temp.innerText = arr[0] * arr[1];
        result.innerText = arr[0] * arr[1];
    } else if(temp.innerText.includes('÷')) {
        arr = temp.innerText.split('÷');
        temp.innerText = arr[0] / arr[1];
        result.innerText = arr[0] / arr[1];
    }
    temp.innerText = '';
})

//clear result and temp div
document.getElementById('clear').addEventListener('click', () => {
    result.innerText = '0';
    temp.innerText = '';
})