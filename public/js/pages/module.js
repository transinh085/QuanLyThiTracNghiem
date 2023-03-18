Dashmix.helpersOnLoad(["jq-select2"]);
$(document).ready(function() {
    function loadDataGroup() {
        fetch("./module/loadData")
            .then((response) => response.json())
            .then((result) => {
                showGroup(result);
            })
            .catch((error) => console.error(error));
    }

    loadDataGroup();

    function showGroup(list) {
        let html = "";
        list.forEach((item) => {
            html += `<div>
                <div class="heading-group d-flex align-items-center">
                    <h2 class="content-heading">${item.mamonhoc + " - " + item.tenmonhoc + " - NH" + item.namhoc + " - HK" + item.hocky}</h2>
                </div>
                <div class="row">`;
            item.nhom.forEach((element) => {
                html += `
            <div class="col-sm-6 col-lg-6 col-xl-3">
            <!-- <a class="block block-rounded block-link-shadow" href="./module/detail/${element.manhom}"> </a> -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title block-class-name">${element.tennhom}</h3>
                    <div class="block-options">
                    <div class="dropdown">
                        <button type="button" class="btn btn-alt-secondary dropdown-toggle module__dropdown" id="dropdown-default-light" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id="${element.manhom}">
                        <i class="si si-settings"></i>
                        </button>
                        <div class="dropdown-menu  fs-sm" aria-labelledby="dropdown-default-light" style="">
                        <a class="nav-main-link dropdown-item" href="module/detail/${element.manhom}">
                            <i class="nav-main-link-icon si si-info me-2 text-dark"></i>
                            <span class="nav-main-link-name fw-normal">Danh sách sinh viên</span>
                        </a>
                        <a class="nav-main-link dropdown-item btn-update-group" data-bs-toggle="modal" data-bs-target="#modal-update-group" href="javascript:void(0)" data-id="${element.manhom}" onclick="openModalUpdateGroup(${element.manhom})">
                            <i class="nav-main-link-icon si si-pencil me-2 text-dark"></i>
                            <span class="nav-main-link-name fw-normal">Sửa thông tin</span>
                        </a>
                        <a class="nav-main-link dropdown-item btn-update-group" data-bs-toggle="modal" data-bs-target="#modal-update-group" href="javascript:void(0)" data-id="${element.manhom}" onclick="openModalUpdateGroup(${element.manhom})">
                            <i class="nav-main-link-icon si si-eye me-2 text-dark"></i>
                            <span class="nav-main-link-name fw-normal">Ẩn nhóm</span>
                        </a>
                        <a class="nav-main-link dropdown-item btn-delete-group" href="javascript:void(0)" data-id="${element.manhom}" onclick="deleteClass(${element.manhom})">
                            <i class="nav-main-link-icon si si-trash me-2 text-danger"></i>
                            <span class="nav-main-link-name fw-normal text-danger">Xoá nhóm</span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <p class="block-class-note">${element.ghichu}</p>
                <p>Sỉ số: ${element.siso}</p>
            </div>
            </div>
        </div>`;
            });
            html += `</div></div>`;
        });
        $("#class-group").html(html);
    }

    $.get(
        "./subject/getData",
        function (data) {
            let html = "<option></option>";
            data.forEach((item) => {
                html += `<option value="${item.mamonhoc}">${item.mamonhoc + " - " + item.tenmonhoc}</option>`;
            });
            $("#mon-hoc").html(html);
        },
        "json"
    );

    function renderListYear() {
        let html = "<option></option>";
        let currentYear = new Date().getFullYear();
        let start = currentYear - 10;
        let end = currentYear + 10;
        for(let i = start; i <= end; i++){
            html += `<option value="${i}">${i + " - " + (i + 1)}</option>`;
        }
        $("#nam-hoc").html(html);
        $("#nam-hoc").val(currentYear).trigger("change")
    }
    renderListYear();

    $("#add_class").click(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./module/add",
            data: {
                tennhom: $("#ten-nhom").val(),
                ghichu: $("#ghi-chu").val(),
                monhoc: $("#mon-hoc").val(),
                namhoc: $("#nam-hoc").val(),
                hocky: $("#hoc-ky").val()
            },
            success: function (response) {
                console.log(response);
                if(response) {
                    $("#modal-add-group").modal("hide");
                    loadDataGroup();
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: 'Thêm nhóm thành công!' });
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: 'Thêm nhóm không thành công!' });
                }
            }
        });
    });
});