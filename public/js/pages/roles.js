/*!
 * dashmix - v5.5.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2022
 */
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