Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker']);

const showList = function (students) {
    let html = "";
    let d = 0;
    students.forEach((student) => {
        html += `
        <tr>
            <td class="text-center">${d++}</td>
                <td class="fs-sm d-flex align-items-center">
                    <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/${student.avatar == null ? `avatar2.jpg`: user.avatar}"
                        alt="">
                    <div class="d-flex flex-column">
                        <a class="fw-semibold" href="be_pages_generic_profile.html">${student.hoten}</a>
                        <span class="fw-normal fs-sm text-muted">${student.email}</span>
                    </div>
                </td>
                <td class="text-center fs-sm">${student.gioitinh}</td>
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
        },
        "json"
      );
}



loadList();

// Gắn mã mới lên từng nhóm học phần


$(document).on("click", ".page-link", function () {
    var page = $(this).attr("id");
    currentPage = page;
    getNumberPage("class_detail", currentPage);
    fetch_data("class_detail", currentPage);
  });

  let currentPage = 1;
  getNumberPage("class_detail", currentPage);
  fetch_data("class_detail", currentPage);