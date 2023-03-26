$(document).ready(function () {
    function getData() {
        $.ajax({
            type: "post",
            url: "./test/getData",
            dataType: "json",
            success: function (data) {
                console.log(data);
                showListTest(data);
            }
        });
    }
    getData()
    function showListTest(tests) {
        html = ``;
        tests.forEach(test => {
            let nhom = test.nhom.join(", ");
            html += `<div class="block block-rounded block-fx-pop mb-2">
                <div class="block-content block-content-full border-start border-3 border-primary">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="p-1 p-md-3">
                            <h3 class="h4 fw-bold mb-3">
                                <a href="javascript:void(0)" class="text-dark link-fx">${test.tende}</a>
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
                            <a class="btn btn-sm btn-alt-danger rounded-pill px-3 my-1" href="javascript:void(0)">
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
});