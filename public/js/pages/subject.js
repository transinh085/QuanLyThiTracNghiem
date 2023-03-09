Dashmix.onLoad(() =>
    class {
        static sweetAlert2() {
            let e = Swal.mixin({
                buttonsStyling: !1,
                target: "#page-container",
                customClass: {
                    confirmButton: "btn btn-success m-1",
                    cancelButton: "btn btn-danger m-1",
                    input: "form-control",
                },
            });

            document.querySelectorAll(".delete_roles").forEach((item) => {
                item.addEventListener("click", (t) => {
                    e.fire({
                        title: "Are you sure?",
                        text: "Bạn có chắc chắn muốn xoá nhóm quyền!",
                        icon: "warning",
                        showCancelButton: !0,
                        customClass: {
                            confirmButton: "btn btn-danger m-1",
                            cancelButton: "btn btn-secondary m-1",
                        },
                        confirmButtonText: "Vâng, tôi chắc chắn!",
                        html: !1,
                        preConfirm: (e) =>
                            new Promise((e) => {
                                setTimeout(() => {
                                    e();
                                }, 50);
                            }),
                    }).then((t) => {
                        t.value
                            ? e.fire(
                                "Deleted!",
                                "Your imaginary file has been deleted.",
                                "success"
                            )
                            : "cancel" === t.dismiss &&
                            e.fire("Cancelled", "Your imaginary file is safe :)", "error");
                    });
                });
            });
        }
        static init() {
            this.sweetAlert2();
        }
    }.init()
);

function loadData() {
    $.get(
        "./subject/getData",
        function (data, textStatus) {
            showData(data);
        },
        "json"
    );
}

function showData(subjects) {
    let html = "";
    subjects.forEach((subject) => {
        html += `<tr tid="${subject.mamonhoc}">
            <td class="text-center fs-sm"><strong>${subject.mamonhoc}</strong></td>
            <td>${subject.tenmonhoc}</td>
            <td class="d-none d-sm-table-cell text-center fs-sm">10</td>
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

$(document).on("click", ".subject-infor", function () {
    var trid = $(this).attr("dataid");
    $("#mamonhoc").val(trid)
    showChaper(trid)

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
            console.log($("#showChapper"));
            let data = response;
            let html = '';
            data.forEach((chapper) =>{
                html += `<tr>
                <td class="text-center fs-sm"><strong>1</strong></td>
                <td>Quản trị kinh tế</td>
                <td class="text-center">
                    <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                        data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                        <i class="fa fa-fw fa-eye"></i>
                    </a>
                    <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html"
                        data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                    <a class="btn btn-sm btn-alt-secondary delete_roles" href="javascript:void(0)"
                        data-bs-toggle="tooltip" aria-label="Delete"
                        data-bs-original-title="Delete">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </td>
            </tr>`
            })
            $("#showChapper").html(html);
        }
    });
}

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





loadData();