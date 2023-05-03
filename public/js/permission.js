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
        }
    });
});