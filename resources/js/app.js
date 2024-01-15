import './bootstrap';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
        },
        error: function (err) {
            if(err.status == 401) {
                window.location.href = '/login'
            }
        }
    });
});

$('#all-star').on('click', function (e) {console.log(e);
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data('id'),
            rating: 0,
        },
        success: function (response) {
            $('#review-content').html(response);
        }
    });
});

$('#five-star').on('click', function (e) {console.log(e);
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data('id'),
            rating: 5,
        },
        success: function (response) {
            $('#review-content').html(response);
        }
    });
});

$('#four-star').on('click', function (e) {console.log(e);
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data('id'),
            rating: 4,
        },
        success: function (response) {
            $('#review-content').html(response);
        }
    });
});

$('#three-star').on('click', function (e) {console.log(e);
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data('id'),
            rating: 3,
        },
        success: function (response) {
            $('#review-content').html(response);
        }
    });
});

$('#two-star').on('click', function (e) {console.log(e);
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data('id'),
            rating: 2,
        },
        success: function (response) {
            $('#review-content').html(response);
        }
    });
});

$('#one-star').on('click', function (e) {console.log(e);
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data('id'),
            rating: 1,
        },
        success: function (response) {
            $('#review-content').html(response);
        }
    });
});

$(document).ready(function () {
    if(window.location.pathname == '/book') {
        $.ajax({
            type: "GET",
            url: "/book/reviews",
            data: {
                id: $('#review-content').data('id')
            },
            dataType: "html",
            success: function (result) {
                $('#review-content').html(result);
            },
        });
    }
});

$('input[name="cart_items_id[]"]').change(function (e) {
    let subtotal = 0;
    let voucher = 0;
    let item_selected_count = 0;
    $('input[name="cart_items_id[]').each(function() {
       if($(this).is(':checked')) {
        subtotal = subtotal += $(this).data('price');
        item_selected_count = item_selected_count += 1;
       }
    });
    $('#subtotal').text('₱' + subtotal);
    $('#total').text('₱' + (subtotal - voucher));
    $('#items_selected_count').text(item_selected_count);
})

$('.remove-cart-item').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "DELETE",
        url: "/cart",
        data: {
            id: $(e.target).data('id'),
        },
        success: function (response) {
            $(`#div-${$(e.target).data('id')}`).remove();
        }
    });
});

