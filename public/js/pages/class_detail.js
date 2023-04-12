Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker']);
$(document).ready(function () {
    const manhom = $(".content").data("id")
    console.log(manhom)
const showList = function (students) {
    let html = "";
    $(".number-participants").html(students.length);
    if(students.length == 0) {
        html += `<tr><td colspan="7" class="text-center">Không có dữ liệu</td></tr>`;
    } else {
        students.forEach((student,index) => {
            html += `
            <tr>
                <td class="text-center">${index + 1}</td>
                <td class="fs-sm d-flex align-items-center">
                        <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/${student.avatar == null ? `avatar2.jpg`: student.avatar}"
                            alt="">
                        <div class="d-flex flex-column">
                            <a class="fw-semibold" href="be_pages_generic_profile.html">${student.hoten}</a>
                            <span class="fw-normal fs-sm text-muted">${student.email}</span>
                        </div>
                    </td>
                <td class="text-center">${student.id}</td>
                    <td class="text-center fs-sm">${student.gioitinh == 1 ? "Nam" : "Nữ"}</td>
                    <td class="text-center fs-sm">${student.ngaysinh}</td>
                    <td class="text-center">1</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                data-bs-toggle="tooltip" title="Edit">
                                <i class="fa fa-fw fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                data-bs-toggle="tooltip" title="Delete">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        });
    }
    $("#list-student").html(html);
    $('[data-bs-toggle="tooltip"]').tooltip();
};


function loadList() {
    $.ajax({
        type: "post",
        url: "./module/getSvList",
        data: {
            manhom: manhom
        },
        dataType: "json",
        success: function (response) {
            console.log(response.length)
            showList(response);
        }
    });
}


loadList();

function showListTest(tests) {
    let html = ``;
    if(tests.length != 0) {
        tests.forEach(test => {
            html += `<div class="block block-rounded block-fx-pop mb-2">
                <div class="block-content block-content-full border-start border-3 border-primary">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="p-1 p-md-2">
                            <h3 class="h4 fw-bold mb-3">
                                <a href="./test/detail/${test.made}" class="text-dark link-fx">${test.tende}</a>
                            </h3>
                            <p class="fs-sm text-muted mb-0">
                                <i class="fa fa-clock me-1"></i> Diễn ra từ <span>${test.thoigianbatdau}</span> đến <span>${test.thoigianketthuc}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>`;
        });
    } else {
        html += `<p class="text-center">Chưa có đề thi...</p>`
    }
    $(".list-test").html(html);
}

function loadDataTest(manhom) {
    $.ajax({
        type: "post",
        url: "./test/getTestGroup",
        data: {
            manhom: manhom
        },
        dataType: "json",
        success: function (response) {
            showListTest(response);
        }
    });
}

$("[data-bs-target='#offcanvasSetting']").click(function (e) { 
    e.preventDefault();
    loadDataTest(manhom)
});

showInvitedCode()

function showInvitedCode() {
    $.ajax({
        type: "post",
        url: "./module/getInvitedCode",
        data: {
            manhom: manhom
        },
        success: function (response) {
            $("#show-ma-moi").text(response);
        }
    });
}

$(".btn-reset-invited-code").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./module/updateInvitedCode",
        data: {
            manhom: manhom
        },
        success: function (response) {
            showInvitedCode()
        }
    });
});

})
