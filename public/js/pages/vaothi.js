$(document).ready(function () {
    $("#start-test").click(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "pos",
            url: "",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    });
});