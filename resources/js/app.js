import './bootstrap';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('#english').click(function (e) {
    if($(this).is(':checked') && !window.location.href.includes('language')) {
        if(window.location.search) {
            window.location.href = window.location.href + '&language=english';
        } else {
            window.location.href = window.location.href + 'search?language=english';
        }
    } else {
        // window.history.back(-1);
    }
});

$('#french').click(function (e) {
    if($(this).is(':checked') && !window.location.href.includes('language')) {
        if(window.location.search) {
            window.location.href = window.location.href + '&language=french';
        } else {
            window.location.href = window.location.href + 'search?language=french';
        }
    }
});

$('#spanish').click(function (e) {
    if($(this).is(':checked') && !window.location.href.includes('language')) {
        if(window.location.search) {
            window.location.href = window.location.href + '&language=spanish';
        } else {
            window.location.href = window.location.href + 'search?language=spanish';
        }
    }
});

$('#user-menu-button').click(function() {
   $('#user-dropdown').toggle();
});

$('#logout').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/logout",
        success: function (response) {
            window.location.href = '/login';
        }
    });
});

$('.add-to-cart').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/cart",
        data: {
            id: $(this).data('id'),
        },
        success: function (response) {
            $(e.target).text('Added');
            $(e.target).attr('disabled', true);
            $(e.target).addClass('opacity-50');
            $(e.target).removeClass('add-to-cart');
        }
    });
});
