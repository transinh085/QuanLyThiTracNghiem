Dashmix.helpersOnLoad(["jq-select2", "js-ckeditor"]);
CKEDITOR.replace("option-content");

$(document).ready(function(){

    $(".js-select2").select2({
        dropdownParent: $("#modal-add-assignment"),
    });

    function loadAssignment(){
        $.get("./assignment/getAssignment",
            function (data) {
                console.log(data)
                let html = '';
                let index = 1;
                data.forEach(element => {
                    html += `<tr>
                    <td class="text-center fs-sm">
                        <a class="fw-semibold" href="#">
                            <strong>${index++}</strong>
                        </a>
                    </td>
                    <td class="text-center">
                        ${element['hoten']}
                    </td>
                    <td class="text-center">
                        <a class="fw-semibold">${element['tenmonhoc']}</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-alt-secondary btn-edit-question" data-bs-toggle="modal" data-bs-target="#modal-add-assignment" aria-label="Edit" data-bs-original-title="Edit" data-id="3">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                        <a class="btn btn-sm btn-alt-secondary btn-delete-question" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete" data-id="3">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                    </td>
                </tr>`
                });
                $("#listAssignment").html(html);
            },
            "json"
        );
    }

    loadAssignment();
    
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
                loadAssignment();
            }
        });
    }
})

