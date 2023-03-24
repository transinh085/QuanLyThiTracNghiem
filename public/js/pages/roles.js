$(document).ready(function () {

    function getDataForm() {
        let roles = [];
        let arr = $("[type='checkbox']");
        $.each(arr, function (i, item) {
            let name = $(item).attr("name");
            let action = $(item).val();
            let check = $(item).prop("checked");
            if (check) {
                let role = {
                    name: name,
                    action: action,
                }
                roles.push(role);
            }
        });
        return roles;
    }

    $("#save-role").click(function (e) {
        e.preventDefault();
        let roles = getDataForm();
        $.ajax({
            type: "post",
            url: "./roles/add",
            data: {
                name: $("#ten-nhom-quyen").val(),
                roles: roles
            },
            success: function (response) {
                console.log(response);
                if (response) {
                    loadDataTable()
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Tạo nhóm quyền thành công!' });
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Tạo nhóm quyền không thành công!' });
                }
            }
        });
    });


    function loadDataTable() {
        let html = ``;
        $.getJSON("./roles/getAllSl",
            function (data) {
                data.forEach(item => {
                    html += `<tr>
                    <td class="text-center fs-sm"><strong>${item.manhomquyen}</strong></td>
                    <td>${item.tennhomquyen}</td>
                    <td class="text-center fs-sm">${item.soluong}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-alt-secondary btn-show-update" data-id="${item.manhomquyen}" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                            <i class="fa fa-fw fa-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-alt-secondary delete_roles" data-id="${item.manhomquyen}" data-bs-toggle="tooltip" aria-label="Delete"
                            data-bs-original-title="Delete">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </td>
                </tr>`
                });
                $("#list-roles").html(html);
                $('[data-bs-toggle="tooltip"]').tooltip();
            }
        );
    }

    $("[data-bs-target='#modal-add-role']").click(function (e) {
        e.preventDefault();
        $(".add-role-element").show();
        $(".update-role-element").hide();
    });

    let e = Swal.mixin({
        buttonsStyling: !1,
        target: "#page-container",
        customClass: {
            confirmButton: "btn btn-success m-1",
            cancelButton: "btn btn-danger m-1",
            input: "form-control"
        }
    });

    $(document).on("click", ".delete_roles", function () {
        let id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "./roles/delete",
            data: {
                id: id
            },
            success: function (response) {
                alert(response)
            }
        });
        e.fire({
            title: "Are you sure?",
            text: "Bạn có chắc chắn muốn xoá nhóm quyền!",
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
            t.value ? e.fire("Deleted!", "Your imaginary file has been deleted.", "success") : "cancel" === t.dismiss && e.fire("Cancelled", "Your imaginary file is safe :)", "error")
        }))
    });

    $("#modal-add-role").on('hidden.bs.modal', function () {
        $("#ten-nhom-quyen").val("");
        $("[type='checkbox']").prop("checked", false);
    });

    $(document).on("click", ".btn-show-update", function () {
        $(".add-role-element").hide();
        $(".update-role-element").show();
        let manhomquyen = $(this).data('id');
        $("[name='manhomquyen']").val(manhomquyen);
        $.ajax({
            type: "post",
            url: "./roles/getDetail",
            data: {
                manhomquyen: manhomquyen
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                $("#ten-nhom-quyen").val(response.name);
                $.each(response.detail, function (index, item) {
                    $(`[name="${item.chucnang}"][value="${item.hanhdong}"]`).prop('checked', true)
                });
                $("#modal-add-role").modal("show");
            }
        });
    });

    $("#update-role-btn").click(function (e) {
        e.preventDefault();
        let roles = getDataForm();
        console.log(roles);
        $.ajax({
            type: "post",
            url: "./roles/edit",
            data: {
                id: $("[name='manhomquyen']").val(),
                name: $("#ten-nhom-quyen").val(),
                roles: roles
            },
            success: function (response) {
                if (response) {
                    loadDataTable()
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Cập nhật nhóm quyền thành công!' });
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Cập nhật nhóm quyền không thành công!' });
                }
            }
        });
    });

    loadDataTable()
});


