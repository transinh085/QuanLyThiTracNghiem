function dateIsValid(date) {
    return !Number.isNaN(new Date(date).getTime());
}

function showListTest(tests) {
    const format = new Intl.DateTimeFormat(navigator.language, {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "2-digit",
        minute: "2-digit",
    });
    html = ``;
    if(tests.length == 0) {
        html += `<p class="text-center">Không có dữ liệu</p>`
        $(".pagination").hide();
    } else {
        tests.forEach((test) => {
            let htmlTestState = ``;
            const open = new Date(test.thoigianbatdau);
            const close = new Date(test.thoigianketthuc);
            let strOpenTime = "", strCloseTime = "";
            if (dateIsValid(test.thoigianbatdau)) {
                strOpenTime = format.format(open);
            }
            if (dateIsValid(test.thoigianketthuc)) {
                strCloseTime = format.format(close);
            }
            const state = {};
            const now = Date.now();
            if (now < +open) {
                state.color = "secondary";
                state.text = "Chưa mở";
            } else if (now >= +open && now <= +close) {
                state.color = "primary";
                state.text = "Đang mở";
            } else {
                state.color = "danger";
                state.text = "Đã đóng";
            }
            htmlTestState += `<button class="btn btn-sm btn-alt-${state.color} rounded-pill px-3 me-1 my-1" disabled>${state.text}</button>`;
            html += `<div class="block block-rounded block-fx-pop mb-2">
                <div class="block-content block-content-full border-start border-3 border-${state.color}">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="p-1 p-md-3">
                            <h3 class="h4 fw-bold mb-3">
                                <a href="./test/detail/${test.made}" class="text-dark link-fx">${test.tende}</a>
                            </h3>
                            <p class="fs-sm text-muted mb-2">
                                <i class="fa fa-layer-group me-1"></i></i> Giao cho học phần <strong data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="${test.nhom}" style="cursor:pointer">${test.tenmonhoc} - NH${test.namhoc} - HK${test.hocky}</strong>
                            </p>
                            <p class="fs-sm text-muted mb-0">
                                <i class="fa fa-clock me-1"></i> Diễn ra từ <span>${strOpenTime}</span> đến <span>${strCloseTime}</span> 
                            </p>
                        </div>
                        <div class="p-1 p-md-3">
                            ${htmlTestState}
                            <a class="btn btn-sm btn-alt-success rounded-pill px-3 me-1 my-1" href="./test/detail/${test.made}">
                                <i class="fa fa-eye opacity-50 me-1"></i> Xem chi tiết
                            </a>
                            <a data-role="dethi" data-action="update" class="btn btn-sm btn-alt-primary rounded-pill px-3 me-1 my-1" href="./test/update/${test.made}">
                                <i class="fa fa-wrench opacity-50 me-1"></i> Chỉnh sửa
                            </a>
                            <a data-role="dethi" data-action="delete" class="btn btn-sm btn-alt-danger rounded-pill px-3 my-1 btn-delete" href="javascript:void(0)" data-id="${test.made}">
                                <i class="fa fa-times opacity-50 me-1"></i> Xoá đề
                            </a>
                        </div>
                    </div>
                </div>
            </div>`;
        });
    }
    $("#list-test").html(html);
    $('[data-bs-toggle="tooltip"]').tooltip();
}

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
                            // dethi.splice(index,1);
                            // showListTest(dethi);
                            mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
                        } else {
                            e.fire("Lỗi !", "Xoá đề thi không thành công !)", "error");
                        }
                    },
                });
            }
        });
    });

    $(".filtered-by-state").click(function (e) {
        e.preventDefault();
        $(".btn-filtered-by-state").text($(this).text());
        const state = $(this).data("value");
        if (state !== "3") {
            mainPagePagination.option.filter = state;
        } else {
            delete mainPagePagination.option.filter;
        }

        mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
    });
});

// Get current user ID
const container = document.querySelector(".content");
const currentUser = container.dataset.id;
delete container.dataset.id;

// Pagination
const mainPagePagination = new Pagination(null, null, showListTest);
mainPagePagination.option.controller = "test";
mainPagePagination.option.model = "DeThiModel";
mainPagePagination.option.id = currentUser;
mainPagePagination.option.custom.function = "getAllCreatedTest";
mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
