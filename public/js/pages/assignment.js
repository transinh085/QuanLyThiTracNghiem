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

    $("#add_assignment").click(function(){
        $("#giang-vien").val("").trigger("change");
        $.get("./assignment/getMonHoc",
        function (data) {
            console.log(data)
            let html = "";
            data.forEach(element => {
                html += `<tr>
                <td class="text-center">
                    <input class="form-check-input" type="checkbox" name="selectSubject" value="${element['mamonhoc']}">
                </td>
                <td class="text-center">${element['mamonhoc']}</td>
                <td class="text-center">${element['tenmonhoc']}</td>
                <td class="text-center">${element['sotinchi']}</td>
                <td class="text-center">${element['sotietlythuyet']}</td>
                <td class="text-center">${element['sotietthuchanh']}</td>
            </tr>`
            });
            $("#list-subject").html(html);
        },
        "json"
    );
    })

    $("#btn_assignment").click(function(){
        
        let listQuestions = [];
        $("input:checkbox[name=selectSubject]:checked").each(function(){
            let subject = {
                mamonhoc: $(this).val()
            }
            listQuestions.push(subject);
        });
        let giangvien = $("#giang-vien").val();
        addAssignment(giangvien,listQuestions);
    })


    function addAssignment(giangvien,listSubject){
        $.ajax({
            type: "post",
            url: "./assignment/addAssignment",
            data: {
                magiangvien: giangvien,
                listSubject: listSubject
            },
            dataType: "json",
            success: function (response) {
                if(response){
                    $("#modal-add-assignment").modal("hide");
                    Dashmix.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: 'Phân công thành công! :)'});
                } else {
                    $("#modal-add-assignment").modal("hide");
                    setTimeout(function(){
                        Dashmix.helpers('jq-notify', {type: 'danger', icon: 'fa fa-times me-1', message: 'Phân công chưa thành công!'});
                    },10)
                }
            }
        });
    }
})

