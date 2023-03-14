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
        console.log(subjects);
        subjects.forEach((subject) => {
            html += `<tr tid="${subject.mamonhoc}">
                <td class="text-center fs-sm"><strong>${subject.mamonhoc}</strong></td>
                <td>${subject.tenmonhoc}</td>
                <td class="d-none d-sm-table-cell text-center fs-sm">${subject.soluong}</td>
                <td class="text-center">
                    <a class="btn btn-sm btn-alt-secondary subject-infor" data-bs-toggle="modal" data-bs-target="#modal-block-vcenter" href="javascript:void(0)"
                        data-bs-toggle="tooltip" aria-label="Thêm chương" data-bs-original-title="Thêm chương" dataid="${subject.mamonhoc}">
                        <i class="fa fa-circle-info"></i>
                    </a>
                    <a class="btn btn-sm btn-alt-secondary subject-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-chapter" href="javascript:void(0)"
                        data-bs-toggle="tooltip" aria-label="Sửa môn học" data-bs-original-title="Sửa môn học" dataid="${subject.mamonhoc}">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                    <a class="btn btn-sm btn-alt-secondary delete_roles subject-delete" href="javascript:void(0)"
                        data-bs-toggle="tooltip" aria-label="Xoá môn học" data-bs-original-title="Xoá môn học" dataid="${subject.mamonhoc}">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </td>
            </tr>`;
        });
        $("#list-subject").html(html);
    }
    
    
    $("#add_class").on("click", function () {
        $.ajax({
            type: "post",
            url: "./subject/add",
            data: {
                mamon: $("#subject_id").val(),
                tenmon: $("#subject_name").val(),
            },
            success: function (response) {
                    $("#modal-add-subject").modal("hide");
                    loadData();
            },
        });
    });
    
    
    
    $(document).on("click", ".subject-edit", function () {
        var trid = $(this).attr("dataid");
        $("#mamon").val(trid);
        $('#tenmon').val($(this).closest("td").closest("tr").children().eq(1).text())
    });
    
    $(document).on("click", ".subject-delete", function () {
        var trid = $(this).attr("dataid");
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
                    url: "./subject/deleteData",
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
    
    $("#edit_class").click(function(e){
        $.ajax({
            type: "post",
            url: "./subject/update",
            data: {
                mamon: $("#mamon").val(),
                tenmon: $("#tenmon").val()
            },
            success: function (response) {
                loadData();
                $('#modal-edit-chapter').modal('hide');
            }
        });
    })
    
    //chapter
    $(document).on("click", ".subject-infor", function () {
        var trid = $(this).attr("dataid");
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
                    let index = 1;
                    response.forEach((chapper) =>{
                        html += `<tr>
                        <td class="text-center fs-sm"><strong>${index++}</strong></td>
                        <td>${chapper['tenchuong']}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-alt-secondary chaper-edit"
                                data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit" dataid="${chapper['machuong']}">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                            <a class="btn btn-sm btn-alt-secondary delete_roles chaper-delete" href="javascript:void(0)"
                                data-bs-toggle="tooltip" aria-label="Delete"
                                data-bs-original-title="Delete" dataid="${chapper['machuong']}">
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
                showChaper($("#mamonhoc").val());
                $("#name_chaper").val("")
                $("#collapseChapter").collapse('hide')
            }
        });
    })    
});