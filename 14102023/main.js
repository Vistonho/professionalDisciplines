/* 
* Простые типы данных:
number - 1, 2, 3, 2.5
bigInt 
boolean - true, false
string - 'a'
null - тоже значение
undefined - неопределено, пустое значение
NaN - неправильная математическая операция (ошибка выполнения функции с числовыми данными)

* Сложные типы данных:
array []
object {}
...new Date
*/

// Объявление переменной
let a = 'text'; //string
let aa; 
const b = 1; // не изменяет определённого значения
let c = Number(5);

// c += 5;
// c++; //пост инкремент, сначала использует переменную
// ++c;
// console.log(3+5);
// console.log(3-5);
// console.log(3*5);
// console.log(3/5);
// console.log(3%5);
// console.log(3**5);

// console.log(typeof c);

let s1 = '10';
let s2 =  "text 'text'";
let s3 = 'text "text"';
let s4 = '<div class="text"></div>';

let s5 = `
    <div>
        <span>${b + b /* это интерполяция */}</span> 
    </div>`;

console.log(s5 + s2);
console.log(5 + +s1); //унарный плюс, плюс перед строкой переводит её в число
console.log(s1 + 5);
console.log(s4.length)

if (4) {

} else if (4) {

} else {
// локальный контекст
}

// Глобальные объекты
/* 
document
window
*/

// b = a ?? 1  //?? проверка на null и undefined

// function definition
// можно вызывать до того, как была определена в коде
function sumNumber(x = 0, y = 0) {
    return x + y;
}
console.log(sumNumber(5,5));

//function expression
const func = function(x = 0, y = 0) {
    return x + y;
};
console.log(func(5,5));

const $row3 = (x, y) => {
    return x + y;
}
const $row2 = (x, y) => x + y;
const $row1 = x => x**2;

(() => console.log('ok'))();

{
    let vitalik = 5555;
    console.log(vitalik);
}
/* 
( ) - логическая структура
{ } - локальный контекст
*/

// ЗАМЫКАНИЕ
// ...

