$(function () {

    $toDoList = [
        {
            n: 1,
            text: 'text',
            status: 'active',
        },
    ]

    $('.task-button').on('click', function (e) {
        e.preventDefault();
        const input = $('.task-input');
        // console.log('asd');
        $toDoList.push({a: input});
        $toDoList.forEach(element => {
            console.log(element);
        });
    })



    function $setTask() {
        const $taskFuncArr = [
            function SetTask() {
                $toDoList.push()
            },
            function MarkSuccess($task) {

            },
            function MarkDelete($task) {

            },
        ];
        return $taskFuncArr;
    }

    // console.log($setTask()[0])

})
