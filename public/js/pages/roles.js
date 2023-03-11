Dashmix.onLoad((() => class {
    static sweetAlert2() {
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
            this.addEventListener("click", (t => {
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
            }))
        });

    }
    static init() {
        this.sweetAlert2()
    }
}.init()));

$(document).ready(function () {
    let roles = [];
    $("#save-role").click(function (e) { 
        e.preventDefault();
        let arr = $(".table-role .form-check-input");
        $.each(arr, function (i, item) {
            let name = $(item).attr("name");
            let action = $(item).val();
            let check = $(item).prop( "checked");
            if(check) {
                let role = {
                    name: name,
                    action: action,
                }
                roles.push(role);
            }
        });

        console.log(roles);

        $.ajax({
            type: "post",
            url: "./roles/add",
            data: {
                name: $("#ten-nhom-quyen").val(),
                roles: roles
            },
            success: function (response) {
                console.log(response);
                if(response) {
                    loadDataTable()
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Tạo nhóm quyền thành công!' });
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-check me-1', message: 'Tạo nhóm quyền không thành công!' });
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
                        <button class="btn btn-sm btn-alt-secondary btn-view" data-id="${item.manhomquyen}" data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                            <i class="fa fa-fw fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-alt-secondary btn-update" data-id="${item.manhomquyen}" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
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

    $(document).on("click", ".btn-view", function () {
        $.ajax({
            type: "post",
            url: "./roles/getDetail",
            data: {
                manhomquyen: $(this).data('id')
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                $("#ten-nhom-quyen").val(response[0].tennhomquyen);
                $.each(response, function (index, item) { 
                    $(`[name="${item.loaiquyen}"][value="${item.hanhdong}"]`).prop('checked',true)
                });
                $("#modal-add-role").modal("show");
            }
        });
    });

    loadDataTable()

});


