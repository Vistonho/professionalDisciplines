/* В js контекстный вызов методов */

let mas = ['mas'];
// mas = mas.concat([1, 2], ['a', 'b'], [true, false]);
// console.log(mas);

// разработаем свой аналогичный метод
// прототип этот тот изначальный объект
Array.prototype.my_concat = function(...$data) {
    let $res = this;
    // console.log(this);
    // console.log(arguments);
    // console.log(data);
    $data.forEach(($item) => {
        $res.push(...$item);
        // $res = [...$res, ...$item];
    });
    return $res;
}
console.log(mas.my_concat([1, 2], ['a', 'b'], [true, false]));