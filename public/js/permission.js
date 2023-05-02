let role = [];
$.getJSON("./account/getRole",
    function (data, textStatus, jqXHR) {
        role = data;
    }
);
$(document).ajaxStop(function () {
    console.log(role)
    $("[data-role]").each(function() {
        if(!role[`${$(this).data("role")}`].includes($(this).data("action"))) {
            $(this).remove();
        }
    });
});