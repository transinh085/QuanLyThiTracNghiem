Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker', "jq-select2"]);

$(document).ready(function () {
    $("#user_nhomquyen").select2({
        dropdownParent: $("#modal-add-user"),
    });

    $.get("./roles/getAll",function (data) {
        let html = `<option></option>`;
        data.forEach(item => {
            html += `<option value="${item.manhomquyen}">${item.tennhomquyen}</option>`;
        });
        $("#user_nhomquyen").html(html);
    },"json"
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
            html += `<tr>
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
                            <td class="text-center">${user.gioitinh == 1 ? "Nam" : "Nữ"}</td>
                            <td class="text-center">${user.ngaysinh}</td>
                            <td class="text-center">${user.tennhomquyen}</td>
                            <td class="text-center">${user.ngaythamgia}</td>
                            <td class="text-center">
                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill ${user.trangthai == 1 ? "bg-success-light text-success" : "bg-danger-light text-danger"} bg-success-light text-success">${user.trangthai == 1 ? "Hoạt động" : "Khoá"}</span>
                            </td> 
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary delete_roles user-edit" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#modal-add-user" aria-label="Edit" data-bs-original-title="Edit" data-id="${user.id}">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary user-delete" href="javascript:void(0)" data-bs-toggle="tooltip"
                                    aria-label="Delete" data-bs-original-title="Delete" data-id="${user.id}">
                                    <i class="fa fa-fw fa-times"></i>
                                </a>
                            </td>
                        </tr>
        `;
        });
        $('#list-user').html(html);
    }

    $("[data-bs-target='#modal-add-user']").click(function (e) { 
        e.preventDefault();
        $(".add-user-element").show();
        $(".update-user-element").hide();
    });

    $("#btn-add-user").on("click", function () {
        $.ajax({
            type: "post",
            url: "./user/add",
            data: {
                hoten: $("#user_name").val(),
                gioitinh: $('input[name="user_gender"]:checked').val(),
                ngaysinh: $("#user_ngaysinh").val(),
                email: $("#user_email").val(),
                role: $('#user_nhomquyen').val(),
                password: $('#user_password').val()
            },
            success: function (response) {
                $("#modal-add-user").modal("hide");
                loadData();
            },
        });
    });

    $(document).on("click", ".user-edit", function () {
        let id = $(this).data('id');
        $(".add-user-element").hide();
        $(".update-user-element").show();
        $("#btn-update-user").data("id",id)
        $.ajax({
            type: "post",
            url: "./user/getDetail",
            data: {
                id: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                $("#user_name").val(response.hoten),
                $(`input[name="user_gender"][value="${response.gioitinh}"]`).prop("checked", true),
                $("#user_ngaysinh").val(response.ngaysinh)
                $("#user_email").val(response.email)
                $("#user_nhomquyen").val(response.manhomquyen).trigger("change");
            }
        });
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
            if (t.value == true) {
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
});