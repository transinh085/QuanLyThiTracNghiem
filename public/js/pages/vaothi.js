$(document).ready(function () {
    $("#start-test").click(function (e) { 
        let made = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./test/startTest",
            data: {
                made: made
            },
            dataType: "json",
            success: function (response) {
                if(response) {
                    location.href = `./test/taketest/${made}`
                } else {
                    Dashmix.helpers("jq-notify", {type: "danger", icon: "fa fa-times me-1",message: "Có lỗi gì đó xảy ra!",});
                }
            }
        });
    });
});