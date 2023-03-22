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
                        if(response) {
                            e.fire("Deleted!", "Xóa môn học thành công!", "success")
                            loadData();
                        } else {
                            e.fire("Lỗi !", "Xoá môn học không thành công !)", "error")
                        }
                    }
                });
            }
        }))
    });
    
    
    //chapter
    $(document).on("click", ".subject-info", function () {
        var id = $(this).data("id");
        $("#mamon_chuong").val(id)
        showChapter(id);
    });
    

    function resetFormChapter() {
        $("#collapseChapter").collapse('hide');
        $("#name_chapter").val("");
    }

    $("#modal-chapter").on('hidden.bs.modal', function () {
        resetFormChapter()
    });


    function showChapter(mamonhoc){
        $.ajax({
            type: "post",
            url: "./subject/getAllChapter",
            data: {
                mamonhoc: mamonhoc
            },
            dataType: "json",
            success: function (response) {
                let html = '';
                if(response.length > 0) {
                    response.forEach((chapter, index) =>{
                        html += `<tr>
                        <td class="text-center fs-sm"><strong>${index+1}</strong></td>
                        <td>${chapter['tenchuong']}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-alt-secondary chapter-edit"
                                data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit" data-id="${chapter['machuong']}">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                            <a class="btn btn-sm btn-alt-secondary chapter-delete" href="javascript:void(0)"
                                data-bs-toggle="tooltip" aria-label="Delete"
                                data-bs-original-title="Delete" data-id="${chapter['machuong']}">
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
    
    $("#btn-add-chapter").click(function(){
        $("#add-chapter").show();
        $("#edit-chapter").hide();
        $("#name_chapter").val("")
    })

    
    $("#add-chapter").on("click", function(e){
        e.preventDefault();
        let mamonhoc = $("#mamon_chuong").val()
        $.ajax({
            type: "post",
            url: "./subject/addChapter",
            data: {
                mamonhoc: mamonhoc,
                tenchuong: $("#name_chapter").val()
            },
            success: function (response) {
                if(response) {
                    resetFormChapter();
                    showChapter(mamonhoc);
                    showData();
                }
            }
        });
    })

    $(".close-chapter").click(function (e) { 
        e.preventDefault();
        $("#collapseChapter").collapse('hide')
    });
    
    $(document).on("click", ".chapter-delete", function(){
        let machuong = $(this).data("id");
        $.ajax({
            type: "post",
            url: "./subject/chapterDelete",
            data: {
                machuong: machuong
            },
            success: function (response) {
                if(response) {
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Xoá chương thành công!' });
                    showChapter($("#mamon_chuong").val());
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Xoá chương không thành công!' });
                }
            }
        });
    })
    
    
    $(document).on("click", ".chapter-edit", function(){
        $("#add-chapter").hide();
        $("#edit-chapter").show();
        let id = $(this).data("id");
        $("#machuong").val(id);
        $("#collapseChapter").collapse('show');
        let name = $(this).closest("td").closest("tr").children().eq(1).text()
        $("#name_chapter").val(name);
    })
    
    $("#edit-chapter").on("click", function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./subject/updateChapter",
            data: {
                machuong: $("#machuong").val(),
                tenchuong: $("#name_chapter").val()
            },
            success: function (response) {
                if(response) {
                    showChapter($("#mamon_chuong").val());
                    resetFormChapter();
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Cập nhật chương thành công!' });
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Cập nhật chương không thành công!' });
                }
            }
        });
    })    
});