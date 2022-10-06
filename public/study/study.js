let one = function (param_1) {
  let result = 'cool';
  return result;
}

let two = (param_1) => {
  let result = 'cool' + param_1;
  return result + ' yeah';
}

let a = 2;
let b = 3;

let three = param_1 => a + b + param_1;

three(5);

// =======================================================

let array_1 = [];

array_1.filter(option => option.selected)

let array_2 = array_1.filter(function (arnold) {
  return !arnold.selected
});

let numbers = [0, 1, 2, 3, 4];

let filtered_numbers = numbers.filter(number => {
  return number % 2 !== 0;
})

// =========================================================

let array_3 = array_1.map(function (arnold) {
  arnold.selected = true;
  return arnold;
});


