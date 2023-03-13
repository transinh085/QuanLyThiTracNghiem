Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-select2']);
$(document).ready(function () {
    $.get(
        "./subject/getData",
        function (data) {
            let html = "<option></option>";
            data.forEach((item) => {
                html += `<option value="${item.mamonhoc}">${item.tenmonhoc}</option>`;
            });
            $("#mon-hoc").html(html);
        },
        "json"
    );

    $("#mon-hoc").on("change", function () {
        let selectedValue = $(this).val();
        let html = "<option value=''></option>";
        $("#chuong").val("").trigger("change");
        $.ajax({
            type: "post",
            url: "./subject/getAllChapper",
            data: {
                mamonhoc: selectedValue,
            },
            dataType: "json",
            success: function (data) {
                data.forEach((item) => {
                    html += `<option value="${item.machuong}">${item.tenchuong}</option>`;
                });
                $("#chuong").html(html);
            },
        });
    });
});