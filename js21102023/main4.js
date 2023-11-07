/* ПЛАНИРОВЩИК СОБЫТИЙ */

/* 
setInterval будет вызывать переданную в параментре
функцию через опр. интервал. Используется очень редко.
Проблема интервала заключается в том, что если функция отработает дольше, 
чем установленный интервал, то произойдет сдвижка*/

// setInterval(function() {
//     console.log('ok');
// }, 1000);

// function interval() {
//     console.log('interval');
// }

// setInterval(interval, 1000);

// SETTIMEOUT
console.log(1);

const id1 = setTimeout(function() {
    console.log('timer1');
}, 1000);

// let id_t;
const id2 = setTimeout(function run() {
    // id_t = setTimeout(run, 1000);
    console.log('timer2');
    setTimeout(run, 1000);
}, 1000);

console.log(id1, id2);
clearTimeout(id1);