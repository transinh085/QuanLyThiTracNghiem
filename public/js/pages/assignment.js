Dashmix.helpersOnLoad(["jq-select2", "js-ckeditor"]);
CKEDITOR.replace("option-content");

$(document).ready(function(){

    $(".js-select2").select2({
        dropdownParent: $("#modal-add-assignment"),
    });
    
    $.get("./assignment/getGiangVien",
        function (data) {
            let html = "<option></option>";
            data.forEach(element => {
                html += `<option value="${element['id']}">${element['hoten']}</option>`;
            });
            $("#giang-vien").html(html);
        },
        "json"
    );

    $.get("url", data,
        function (data, textStatus, jqXHR) {
            
        },
        "dataType"
    );
})

