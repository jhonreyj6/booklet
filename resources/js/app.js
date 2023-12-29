import './bootstrap';

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

