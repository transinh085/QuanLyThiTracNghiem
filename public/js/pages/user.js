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
        "./user/getData",
        function (data, textStatus) {
            showData(data);
        },
        "json"
    );
}

loadData();

function showData(users) {
    let html = "";
    users.forEach((user) => {
        html += `
        <tr tid="${user.id}" id="id">
                            <td class="text-center">
                                <strong>${user.id}</strong>
                            </td>
                            <td class="fs-sm d-flex align-items-center">
                                <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/avatar0.jpg" alt="">
                                <div class="d-flex flex-column">
                                    <strong class="text-primary">${user.hoten}</strong>
                                    <span class="fw-normal fs-sm text-muted">${user.email}</span>
                                </div>
                            </td>
                            <td class="text-center">${user.gioitinh}</td>
                            <td class="text-center">${user.ngaysinh}</td>
                            <td class="text-center">${user.tennhomquyen}</td>
                            <td class="text-center">${user.ngaythamgia}</td>
                            <td class="text-center">
                                <span class="badge bg-success badge-pill text-uppercase fw-bold py-2 px-3">${user.trangthai}</span>
                            </td> 
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary delete_roles user-edit" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#modal-edit-chapter" aria-label="Edit" data-bs-original-title="Edit" dataid="${user.id}">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary user-delete" href="javascript:void(0)" data-bs-toggle="tooltip"
                                    aria-label="Delete" data-bs-original-title="Delete" dataid="${user.id}">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
        `;
    });
    $('#list-user').html(html); 
}

$("#add_class").on("click", function () {
    $.ajax({
        type: "post",
        url: "./user/add",
        data: {
            hoten: $("#user_name").val(),
            gioitinh: $("#user_gender").val(),
            ngaysinh: $("#user_ngaysinh").val(),
            email: $("#user_email").val(),
            role: $('input[name="role"]:checked').val(),
        },
        success: function (response) {
                $("#modal-add-user").modal("hide");
                loadData();
        },
    });
});

$(document).on("click", ".user-edit", function () {
    var trid = $(this).attr("dataid");
    console.log(trid)
    $('#hoten').val($(this).closest("td").closest("tr").children().children().eq(2).children().eq(0).text());
    $('#gioitinh').val($(this).closest("td").closest("tr").children().eq(2).text());
    $('#ngaysinh').val($(this).closest("td").closest("tr").children().eq(3).text());
    $('#email').val($(this).closest("td").closest("tr").children().children().eq(2).children().eq(1).text());
});

$(document).on("click", ".user-delete", function () {
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
        text: "Bạn có chắc chắn muốn xoá nhóm người dùng?",
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
                url: "./user/deleteData",
                data: {
                    id: trid
                },
                success: function (response) {
                    e.fire("Deleted!", "Xóa người dùng thành công!", "success")
                    loadData();
                }
            });

        } else {
            e.fire("Cancelled", "Bạn đã không xóa người dùng :)", "error")
        }
    
    }))
});


$("#edit_class").click(function(e){
    $.ajax({
        type: "post",
        url: "./user/update",
        data: {
            hoten: $("#hoten").val(),
            gioitinh: $("#gioitinh").val(),
            ngaysinh: $("#ngaysinh").val(),
            email: $("#email").val()
        },
        success: function (response) {
            loadData();
            $('#modal-edit-chapter').modal('hide');
        }
    });
})