Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker']);

const showList = function (students) {
    let html = "";
    students.forEach((student,index) => {
        html += `
        <tr>
            <td class="text-center">${index + 1}</td>
                <td class="fs-sm d-flex align-items-center">
                    <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/${student.avatar == null ? `avatar2.jpg`: user.avatar}"
                        alt="">
                    <div class="d-flex flex-column">
                        <a class="fw-semibold" href="be_pages_generic_profile.html">${student.hoten}</a>
                        <span class="fw-normal fs-sm text-muted">${student.email}</span>
                    </div>
                </td>
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
    $("#list-student").html(html);
    $('[data-bs-toggle="tooltip"]').tooltip();
};

//  const mamoi = "";
// var mamoi = "";
// const t = $(".content-heading");
// console.log(t)
function loadList() {
    // var mamoi = "";
    $.get(
        "./module/getSvList",
        // { manhom: },
        function (data, textStatus) {
            console.log(data)
            // const obeject = data[0];
            // mamoi = obeject.mamoi;
            // console.log(mamoi)
            // showList(data);
            showList(data);
        },
        "json"
    );
}



loadList();

// Gắn mã mới lên từng nhóm học phần
function attachMaMoi() {
    let html = "";
    $.ajax({
        type: "POST",
        url: `./class_detail/`,
        data: {
            $hocky = ; 
            $mamonhoc = ; 
            $namhoc = $_POST['namhoc'];
            $tennhom = $_POST['tennhom'];
            $ghichu = $_POST['ghichu'];
        },
    });
}



