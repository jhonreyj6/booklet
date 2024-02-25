import "./bootstrap";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#logout").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/logout",
        success: function (response) {
            window.location.href = "/login";
        },
    });
});

$(".add-to-cart").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/cart",
        data: {
            id: $(this).data("id"),
        },
        success: function (response) {
            $(e.target).text("Added");
            $(e.target).attr("disabled", true);
            $(e.target).addClass("opacity-50");
            $(e.target).removeClass("add-to-cart");
        },
        error: function (err) {
            if (err.status == 401) {
                window.location.href = "/login";
            }
        },
    });
});

$(".review-star").on("click", function (e) {
    e.preventDefault();
    $(".review-star").each(function (el) {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active bg-blue-500 text-white");
        }
    });

    $("#all-star").removeClass("active bg-blue-500 text-white");
    $(e.target).addClass("active bg-blue-500 text-white");

    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data("id"),
            rating: $(e.target).data("rating"),
        },
        success: function (response) {
            $("#review-content").html(response);
        },
        error: function (data) {
            console.log(data);
        },
    });
});

$("#all-star").on("click", function (e) {
    e.preventDefault();
    $(e.target).addClass("active bg-blue-500 text-white");
    $(".review-star").each(function (el) {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active bg-blue-500 text-white");
        }
    });

    $.ajax({
        type: "GET",
        url: "/book/reviews",
        data: {
            id: $(e.target).data("id"),
        },
        success: function (response) {
            $("#review-content").html(response);
        },
    });
});

$(document).ready(function () {
    $(document).on("click", ".review-next-page", function () {
        $.ajax({
            type: "GET",
            url: $(this).data("next-page"),
            data: {
                id: $("#review-content").data("id"),
            },
            dataType: "html",
            success: function (result) {
                $("#review-content").html(result);
            },
        });
    });
    $(document).on("click", ".review-prev-page", function () {
        $.ajax({
            type: "GET",
            url: $(this).data("prev-page"),
            data: {
                id: $("#review-content").data("id"),
            },
            dataType: "html",
            success: function (result) {
                $("#review-content").html(result);
            },
        });
    });
    $(document).on("click", ".review-current-page", function () {
        $.ajax({
            type: "GET",
            url: $(this).data("current-page"),
            data: {
                id: $("#review-content").data("id"),
            },
            dataType: "html",
            success: function (result) {
                $("#review-content").html(result);
            },
        });
    });
});

$(document).ready(function () {
    if (window.location.pathname == "/book") {
        $.ajax({
            type: "GET",
            url: "/book/reviews",
            data: {
                id: $("#review-content").data("id"),
            },
            dataType: "html",
            success: function (result) {
                $("#review-content").html(result);
            },
        });
    }
});

$('input[name="cart_items_id[]"]').change(function (e) {
    console.log("error");
    let subtotal = 0;
    let voucher = 0;
    let item_selected_count = 0;
    $('input[name="cart_items_id[]"').each(function () {
        if ($(this).is(":checked")) {
            subtotal = subtotal += $(this).data("price");
            item_selected_count = item_selected_count += 1;
        }
    });
    $("#subtotal").text("₱" + subtotal);
    $("#total").text("₱" + (subtotal - voucher));
    $("#items_selected_count").text(item_selected_count);
});

$(".remove-cart-item").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "DELETE",
        url: "/cart",
        data: {
            id: $(e.target).data("id"),
        },
        success: function (response) {
            $(`#div-${$(e.target).data("id")}`).remove();
        },
    });
});

$(".rating-star").click(function (e) {
    let rating = $(e.target).data("value");
    $(`#input-${$(this).data("item-id")}`).val($(e.target).data("value"));
    $(this)
        .children()
        .each(function (e) {
            if ($(this).hasClass("fa-regular") && rating > e) {
                $(this)
                    .removeClass("fa-regular")
                    .addClass("fa-solid text-yellow-400");
            } else if ($(this).hasClass("fa-solid") && e + 1 > rating) {
                $(this)
                    .removeClass("fa-solid text-yellow-400")
                    .addClass("fa-regular");
            }
        });
});

$(".form-review-btn").click(function (e) {
    e.preventDefault();
    let id = $(this).data("form-id");
    let form = $(`#form-id-${id}`);
    $(`#star-content-${id}`).children().remove();

    $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: form.serialize(),
        success: function (res) {
            if ($(`#review-message-${id}`).length) {
                $(`#review-message-${id}`).text($(`#textarea-${id}`).val());

                for (let i = 0; i < $(`#input-${id}`).val(); i++) {
                    $(`#star-content-${id}`).append(
                        '<i class="fa-solid fa-star"></i>'
                    );
                }

                for (let i = $(`#input-${id}`).val(); i < 5; i++) {
                    $(`#star-content-${id}`).append(
                        '<i class="fa-regular fa-star"></i>'
                    );
                }

                $(`#article-${id}`).show();
                form.hide();
            } else {
                form.remove();
            }
        },
        error: function (data) {
            console.log(data);
        },
    });
});

$(".edit-review").click(function (e) {
    $(`#form-id-${$(this).data("id")}`).show();
    $(`#textarea-${$(this).data("id")}`).val(
        $(`#review-message-${$(this).data("id")}`)
            .text()
            .trim()
    );
    $(this).parents("article").first().hide();
});

$(".cancel-edit-review").click(function (e) {
    e.preventDefault();
    $(`#form-id-${$(e.target).data("form-id")}`).hide();
    $(`#article-${$(e.target).data("form-id")}`).show();
});

$("textarea").keydown(function (e) {
    if (e.keyCode == 13 && !e.shiftKey) {
        e.preventDefault();
    }
});

$("#profile-input").change(function (e) {
    let temp_img = URL.createObjectURL(e.target.files[0]);
    const formData = new FormData();
    formData.append("image", $(this).prop("files")[0]);

    $.ajax({
        type: "POST",
        url: "/user/profile/image",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#image-src").attr("src", temp_img);
        },
        error: function (data) {
            console.log(data);
        },
    });
});

// $('input[name="language[]"]').change(function (e) {
//     let url = $('meta[name="url"]').prop('content');

//     return;
//     $.ajax({
//         type: "GET",
//         url: url,
//         params: {

//         },
//         dataType: "dataType",
//         success: function (response) {},
//     });
// });

// $('#form_language').submit(function (e) {
//     e.preventDefault();
//     let formData = $(this).serialize(); //outputs firstname=blah&lastname=moreblah
//     let fullUrl = window.location.href;
//     let queryPart = fullUrl.split("?")[1]; //here you have country=usa&state=ny
//     let finalForm = queryPart + "&" + formData;  //country=usa&state=ny&firstname=blah
//     window.location.href = window.location.origin + '/search?' + finalForm;
// });
