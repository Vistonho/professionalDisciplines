// $ это аллиас имени библиотеки JQuery
// $(document).ready(()=>{});
$(function () {
    // основная идея JQuery - работа с дом деревом 
    // console.log('JQuery is ready')
    // const el = $('div');

    // const inner = $('.class').find('.inner');

    // const inner = $('.class')
    //                 .find('inner')
    //                 .html('this inner')
    //                 .parent()
    //                 .html('parent inner');

    // const el = $('.class');
    // let i = 0;
    // el.each(function(){
    //     console.log(this);
    //     const item = $(this);
    //     item.addClass('addedClassWow').html(item.html() + ++i);
    // })
    // console.info(el);

    /* ПРОСЛУШИВАНИЕ СОБЫТИЙ */

    // $('a.a').on('click', function(e) {
    //     e.preventDefault();
    //     console.log($(this));
    // });

    // $('.inner').on('click', function(e) {
    //     $(this).html(`${$(this).html()} click`);
    // });

    $('.a').on('click', function (e) {
        e.preventDefault();
        const a = $('<a href=""/>').html(' added element').addClass('a-inner-added');
        $('.inner').append(a);
    });

    // В момент загрузки js кода у нас нет такого элемента
    // $('.a-inner-added').on('click', function (e) {
    //     e.preventDefault();
    //     console.log(this);
    // });
    // воспользуемся делегированием
    $('.inner').on('click', '.a-inner-added', function (e) {
        e.preventDefault();
        console.log(this);
    });

});