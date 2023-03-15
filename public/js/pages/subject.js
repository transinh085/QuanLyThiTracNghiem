$(document).ready(function () {
    function loadData() {
        $.get(
            "./subject/getData",
            function (data, textStatus) {
                showData(data);
            },
            "json"
        );
    }

    loadData();
    
    function showData(subjects) {
        let html = "";
        subjects.forEach((subject) => {
            html += `<tr tid="${subject.mamonhoc}">
                <td class="text-center fs-sm"><strong>${subject.mamonhoc}</strong></td>
                <td>${subject.tenmonhoc}</td>
                <td class="d-none d-sm-table-cell text-center fs-sm">${subject.sotinchi}</td>
                <td class="d-none d-sm-table-cell text-center fs-sm">${subject.sotietlythuyet}</td>
                <td class="d-none d-sm-table-cell text-center fs-sm">${subject.sotietthuchanh}</td>
                <td class="d-none d-sm-table-cell text-center fs-sm">${subject.soluong}</td>
                <td class="text-center">
                    <a class="btn btn-sm btn-alt-secondary subject-info" data-bs-toggle="modal" data-bs-target="#modal-chapter" href="javascript:void(0)"
                        data-bs-toggle="tooltip" aria-label="Thêm chương" data-bs-original-title="Thêm chương" data-id="${subject.mamonhoc}">
                        <i class="fa fa-circle-info"></i>
                    </a>
                    <a class="btn btn-sm btn-alt-secondary btn-edit-subject" href="javascript:void(0)"
                        data-bs-toggle="tooltip" aria-label="Sửa môn học" data-bs-original-title="Sửa môn học" data-id="${subject.mamonhoc}">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                    <a class="btn btn-sm btn-alt-secondary btn-delete-subject" href="javascript:void(0)"
                        data-bs-toggle="tooltip" aria-label="Xoá môn học" data-bs-original-title="Xoá môn học" data-id="${subject.mamonhoc}">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </td>
            </tr>`;
        });
        $("#list-subject").html(html);
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    $("[data-bs-target='#modal-add-subject']").click(function (e) { 
        e.preventDefault();
        $(".update-subject-element").hide();
        $(".add-subject-element").show();
    });
    
    $("#add_subject").on("click", function () {
        $.ajax({
            type: "post",
            url: "./subject/add",
            data: {
                mamon: $("#mamonhoc").val(),
                tenmon: $("#tenmonhoc").val(),
                sotinchi: $("#sotinchi").val(),
                sotietlythuyet: $("#sotiet_lt").val(),
                sotietthuchanh: $("#sotiet_th").val(),
            },
            success: function (response) {
                if(response) {
                    $("#modal-add-subject").modal("hide");
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Thêm môn học thành công!' });
                    loadData();
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Thêm môn học không thành công!' });
                }
            },
        });
    });
    
    
    $(document).on("click", ".btn-edit-subject", function () {
        $(".update-subject-element").show();
        $(".add-subject-element").hide();
        let mamon = $(this).data("id");
        $.ajax({
            type: "post",
            url: "./subject/getDetail",
            data: {
                mamon: mamon,
            },
            dataType: "json",
            success: function (response) {
                if(response) {
                    $("#mamonhoc").val(response.mamonhoc),
                    $("#tenmonhoc").val(response.tenmonhoc),
                    $("#sotinchi").val(response.sotinchi),
                    $("#sotiet_lt").val(response.sotietlythuyet),
                    $("#sotiet_th").val(response.sotietthuchanh),
                    $("#modal-add-subject").modal("show"),
                    $("#update_subject").data("id", response.mamonhoc)
                }
            },
        });
    });

    // Đóng modal thì reset form
    $("#modal-add-subject").on('hidden.bs.modal', function () {
        $("#mamonhoc").val(""),
        $("#tenmonhoc").val(""),
        $("#sotinchi").val(""),
        $("#sotiet_lt").val(""),
        $("#sotiet_th").val(""),
        $("#update_subject").data("id", "")
    });

    $("#update_subject").click(function (e) { 
        e.preventDefault();
        let mamon = $(this).data("id");
        $.ajax({
            type: "post",
            url: "./subject/update",
            data: {
                id: mamon,
                mamon: $("#mamonhoc").val(),
                tenmon: $("#tenmonhoc").val(),
                sotinchi: $("#sotinchi").val(),
                sotietlythuyet: $("#sotiet_lt").val(),
                sotietthuchanh: $("#sotiet_th").val(),
            },
            success: function (response) {
                if(response) {
                    $("#modal-add-subject").modal("hide");
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Cập nhật môn học thành công!' });
                    loadData();
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Cập nhật môn học không thành công!' });
                }
            }
        });
    });
    
    $(document).on("click", ".btn-delete-subject", function () {
        let trid = $(this).data("id");
        let e = Swal.mixin({
            buttonsStyling: !1,
            target: "#page-container",
            customClass: {
                confirmButton: "btn btn-success m-1",
                cancelButton: "btn btn-danger m-1",
                input: "form-control"
            }
        });
    
        e.fire({
            title: "Are you sure?",
            text: "Bạn có chắc chắn muốn xoá nhóm môn học?",
            icon: "warning",
            showCancelButton: !0,
            customClass: {
                confirmButton: "btn btn-danger m-1",
                cancelButton: "btn btn-secondary m-1"
            },
            confirmButtonText: "Vâng, tôi chắc chắn!",
            html: !1,
            preConfirm: e => new Promise((e => {
                setTimeout((() => {
                    e()
                }), 50)
            }))
        }).then((t => {
            if(t.value == true){
                $.ajax({
                    type: "post",
                    url: "./subject/delete",
                    data: {
                        mamon: trid
                    },
                    success: function (response) {
                        e.fire("Deleted!", "Xóa môn học thành công!", "success")
                        loadData();
                    }
                });
            } else {
                e.fire("Cancelled", "Bạn đã không xóa môn học :)", "error")
            }
        
        }))
    });
    
    
    //chapter
    $(document).on("click", ".subject-info", function () {
        var trid = $(this).data("id");
        $("#mamonhoc").val(trid)
        showChaper(trid)
        $("#collapseChapter").collapse('hide')
    
    });
    
    function showChaper(id){
        $.ajax({
            type: "post",
            url: "./subject/getAllChapper",
            data: {
                mamonhoc: id
            },
            dataType: "json",
            success: function (response) {
                let html = '';
                if(response.length > 0) {
                    response.forEach((chapper, index) =>{
                        html += `<tr>
                        <td class="text-center fs-sm"><strong>${index+1}</strong></td>
                        <td>${chapper['tenchuong']}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-alt-secondary chaper-edit"
                                data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit" data-id="${chapper['machuong']}">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                            <a class="btn btn-sm btn-alt-secondary delete_roles chaper-delete" href="javascript:void(0)"
                                data-bs-toggle="tooltip" aria-label="Delete"
                                data-bs-original-title="Delete" data-id="${chapper['machuong']}">
                                <i class="fa fa-fw fa-times"></i>
                            </a>
                        </td>
                    </tr>`
                    })
                } else {
                    html += `<tr><td class="text-center fs-sm" colspan="3">
                    <img style="width:180px" src="./public/media/svg/empty_data.png" alt=""/>
                    <p class="text-center mt-3">Không có dữ liệu</p>
                    </td>
                    </tr>`
                }
                $("#showChapper").html(html);
            }
        });
    }
    
    $("#btnaddChapper").click(function(){
        $("#addchaper").show();
        $("#editchaper").hide();
        $("#name_chaper").val("")
    })
    
    $("#addchaper").on("click", function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./subject/addChaper",
            data: {
                mamonhoc: $("#mamonhoc").val(),
                tenchuong: $("#name_chaper").val()
            },
            success: function (response) {
                showChaper($("#mamonhoc").val());
                $("#name_chaper").val("")
                $("#collapseChapter").collapse('hide')
                showData();
            }
        });
    })

    $(".close-chapter").click(function (e) { 
        e.preventDefault();
        $("#collapseChapter").collapse('hide')
    });
    
    $(document).on("click", ".chaper-delete", function(){
        let idMH = $(this).attr("dataid");
        deleteChaper(idMH);
    })
    
    function deleteChaper(id){
        $.ajax({
            type: "post",
            url: "./subject/chaperDelete",
            data: {
                dataid: id
            },
            success: function (response) {
                showChaper($("#mamonhoc").val())
            }
        });
    }
    
    $(document).on("click", ".chaper-edit", function(){
        let id = $(this).attr("dataid");
        $("#machuong").val(id)
        $("#addchaper").hide();
        $("#editchaper").show();
        $("#collapseChapter").collapse('show');
        let name = $(this).closest("td").closest("tr").children().eq(1).text()
        $("#name_chaper").val(name);
    })
    
    $("#editchaper").on("click", function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./subject/updateChaper",
            data: {
                machuong: $("#machuong").val(),
                tenchuong: $("#name_chaper").val()
            },
            success: function (response) {
                if(response) {
                    showChaper($("#mamonhoc").val());
                    $("#name_chaper").val("")
                    $("#collapseChapter").collapse('hide')
                }
            }
        });
    })    
});