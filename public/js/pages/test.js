$(document).ready(function () {
    let e = Swal.mixin({
        buttonsStyling: !1,
        target: "#page-container",
        customClass: {
            confirmButton: "btn btn-success m-1",
            cancelButton: "btn btn-danger m-1",
            input: "form-control",
        },
    });
    let dethi = []
    function getData() {
        return $.ajax({
            type: "post",
            url: "./test/getData",
            dataType: "json",
            success: function (data) {
                dethi = data
            }
        });
    }

    $.when(getData()).done(function () {
        showListTest(dethi);
    })

    function showListTest(tests) {
        html = ``;
        tests.forEach((test,index) => {
            let nhom = test.nhom.join(", ");
            html += `<div class="block block-rounded block-fx-pop mb-2">
                <div class="block-content block-content-full border-start border-3 border-primary">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="p-1 p-md-3">
                            <h3 class="h4 fw-bold mb-3">
                                <a href="./test/detail/${test.made}" class="text-dark link-fx">${test.tende}</a>
                            </h3>
                            <p class="fs-sm text-muted mb-2">
                                <i class="fa fa-layer-group me-1"></i></i> Giao cho học phần <strong data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="${nhom}" style="cursor:pointer">${test.tenmonhoc} - NH${test.namhoc} - HK${test.hocky}</strong>
                            </p>
                            <p class="fs-sm text-muted mb-0">
                                <i class="fa fa-clock me-1"></i> Diễn ra từ <span>${test.thoigianbatdau}</span> đến <span>${test.thoigianketthuc}</span> 
                            </p>
                        </div>
                        <div class="p-1 p-md-3">
                            <a class="btn btn-sm btn-alt-success rounded-pill px-3 me-1 my-1" href="./test/detail/${test.made}">
                                <i class="fa fa-eye opacity-50 me-1"></i> Xem chi tiết
                            </a>
                            <a class="btn btn-sm btn-alt-primary rounded-pill px-3 me-1 my-1" href="./test/update/${test.made}">
                                <i class="fa fa-wrench opacity-50 me-1"></i> Chỉnh sửa
                            </a>
                            <a class="btn btn-sm btn-alt-danger rounded-pill px-3 my-1 btn-delete" href="javascript:void(0)" data-id="${test.made}" data-index="${index}">
                                <i class="fa fa-times opacity-50 me-1"></i> Xoá đề
                            </a>
                        </div>
                    </div>
                </div>
            </div>`;
        });
        $("#list-test").html(html);
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    $(document).on("click", ".btn-delete", function () {
        let index = $(this).data("index");
        e.fire({
            title: "Are you sure?",
            text: "Bạn có chắc chắn muốn xoá đề thi?",
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
            if (t.value == true) {
                $.ajax({
                    type: "post",
                    url: "./test/delete",
                    data: {
                        made: $(this).data("id")
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response) {
                            e.fire("Deleted!", "Xóa đề thi thành công!", "success");
                            dethi.splice(index,1);
                            showListTest(dethi);
                        } else {
                            e.fire("Lỗi !", "Xoá đề thi không thành công !)", "error");
                        }
                    },
                });
            }
        });
    });
});

