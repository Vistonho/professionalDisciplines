/* Взвод строгого режима */
// "use strict";

// function func1() {
//     console.log('func1');
//     function func2() {
//         console.log('func2');
//     }
//     func2();
// }
// func1();

function func1() {
    console.log('func1');
    return function () {
        console.log('func2');
    }
}
// func1()();

/* 
Задание: сложить 2 числа. Есть функция в которую передаются
2 числа, а сложение происходит во внутренней функции
*/

function taskPlus(a, b)
{   
    console.log('Это основная функция');
    return function (a, b) {
        console.log(a + b);
    }
}
// taskPlus()(5, 4);

// ЗАМЫКАНИЕ
// function taskC()
// {   
//     // let c = 0;
//     let c = Math.random();
//     return function () {
//         // console.log(++c);
//         console.log(c);
//     }
// }
// taskC()();
// taskC()();
// taskC()();

function taskC()
{   
    const $res = [];
    for(let $i = 0; $i < 10; $i++) {
        $res.push(function () {
            // console.log($i);
            return $i;
        });
    }
    return $res;
}

$res = taskC();
// console.log($res[5]());

// ОБЪЕКТЫ
/* В php чтобы создать объект надо было создать
экземпляр класса */
$user = {
    id: 1,
    name: 'Vitalik',
    age: 24,
    'second name': 'Skorodumov',
    'true': true,
    'null': null,
    getName() {
        return "Имя пользователя: " + this.name;
    },
};
console.log($user.name, $user['second name']);
/* перебор объекта */
for (let $item in $user) {
    console.log($item, $user[$item]);
}
// for (let $item of $user) { только с массивами
//     console.log($item);
// }
console.log(Object.keys($user));
console.log(Object.values($user));
console.log($user.getName());

function func() {
    /* без "use strict"; выведет объект window */
    "use strict";
    return this;
}
console.log(func());