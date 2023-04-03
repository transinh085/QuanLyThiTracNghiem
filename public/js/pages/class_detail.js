Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker']);

const showList = function (students) {
    let html = "";
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
            manhom: $(".content").data("id")
        },
        dataType: "json",
        success: function (response) {
            showList(response);
        }
    });
}

loadList();