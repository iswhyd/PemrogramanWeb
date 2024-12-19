let display = document.getElementById('display');
let currentInput = '0';
let operator = '';
let result = '';

function appendNumber(number) {
    if (currentInput === '0') {
        currentInput = number.toString();
    } else {
        currentInput += number;
    }
    display.value = currentInput;
}

function appendOperator(op) {
    if (currentInput !== '0' | currentInput === '0') {
        operator = op;
        currentInput += ' ' + op + ' ';
        display.value = currentInput;
    }
}

function appendDot() {
    if (!currentInput.includes('.')) {
        currentInput += '.';
        display.value = currentInput;
    }
}

function calculate() {
    try {
        currentInput = currentInput.replace('×', '*').replace('÷', '/');  // Replace symbols
        result = eval(currentInput);
        display.value = result;
        currentInput = result.toString();
    } catch (error) {
        display.value = 'Error';
    }
}

function clearDisplay() {
    currentInput = '0';
    display.value = currentInput;
    display.value = currentInput.toString();
}

function invertSign() {
    if (currentInput !== '0') {
        currentInput = (parseFloat(currentInput) * -1).toString();
        display.value = currentInput;
    }
}
