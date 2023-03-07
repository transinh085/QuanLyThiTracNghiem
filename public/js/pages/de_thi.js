$(document).ready(function () {
    $( ".btn-check" ).on( "click", function() {
        let ques = $(this).attr('ques-id');
        $(`a[href$='${ques}']`).addClass('active');
    });
});