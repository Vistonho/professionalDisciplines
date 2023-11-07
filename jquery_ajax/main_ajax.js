$(function() {

    setTimeout(function getCount() {
        $.ajax({
            // url: 'https://shared-21083889-229819.pleskbox.com/jquery/get-count',            
            url: 'http://localhost/js/jquery_ajax/api.php?method=get-count',
            method: 'POST',
            data: {
                method: 'get-count',
                user_id: 24,
            },
            dataType: 'json',
            success: function(data) {
                $('.count-info').html(data);
                setTimeout(getCount, 5000);
            },
        });
    }, 5000); 

    $('.get-count').on('click', function(e) {
        $.ajax({
            // url: 'https://shared-21083889-229819.pleskbox.com/jquery/get-count',
            url: 'http://localhost/js/jquery_ajax/api.php?method=get-count',
            method: 'POST',
            data: {
                method: 'get-count',
                user_id: 24,
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
        });
    });

    $('.add-count').on('click', function(e) {
        // for(let i = 0; i < 100; i++) {
            $.ajax({
                // url: 'https://shared-21083889-229819.pleskbox.com/jquery/add-count',
                url: 'http://localhost/js/jquery_ajax/api.php?method=set-count',
                method: 'POST',
                data: {
                    method: 'set-count',
                    user_id: 24,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
            });
        // }
    });

    $('.reset-count').on('click', function(e) {
        // for(let i = 0; i < 100; i++) {
            $.ajax({
                // url: 'https://shared-21083889-229819.pleskbox.com/jquery/add-count',
                url: 'http://localhost/js/jquery_ajax/api.php?method=reset-count',
                method: 'POST',
                data: {
                    method: 'reset-count',
                    user_id: 24,
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
            });
        // }
    });



})

/* 
X - XML
H - HHTP
R - REQUEST 
XMLHttpRequest
*/

