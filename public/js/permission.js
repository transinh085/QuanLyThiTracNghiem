let role = [];
$.getJSON("./account/getRole",
    function (data, textStatus, jqXHR) {
        role = data;
    }
);

$(document).ajaxStop(function () {
    $("[data-role]").each(function() {
        if(!role[`${$(this).data("role")}`].includes($(this).data("action"))) {
            $(this).remove();
        } else {
            $(this).addClass("show");
        }
    });
    $(".col-action").each(function() {
        if($(this).children().length == 0) {
            $(this).remove();
        }
    });
    $(".col-header-action").each(function() {
        if($(this).closest("table").find(".col-action").length != 0) {
            $(this).show()
        }
    });
    
});