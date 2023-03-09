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

        document.querySelectorAll(".delete_roles").forEach(item => {
            item.addEventListener("click", (t => {
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
            let role = {
                name: name,
                action: action,
                check: check ? 1 : 0
            }
            roles.push(role);
        });
        console.log(roles);
    });
});


