function loadData() {
    $.get("./subject/getData",function (data) {
            console.log(data);
            showData(data);
        },"json"
    );
}

function showData(subjects) {
    let html = "";
    subjects.forEach((subject) => {
        html += `<tr>
            <td class="text-center fs-sm"><strong>${subject.mamonhoc}</strong></td>
            <td>${subject.tenmonhoc}</td>
            <td class="d-none d-sm-table-cell text-center fs-sm">10</td>
            <td class="text-center">
                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                    data-bs-toggle="tooltip" aria-label="Thêm chương" data-bs-original-title="Thêm chương">
                    <i class="fa fa-circle-info"></i>
                </a>
                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                    data-bs-toggle="tooltip" aria-label="Sửa môn học" data-bs-original-title="Sửa môn học">
                    <i class="fa fa-fw fa-pencil"></i>
                </a>
                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                    data-bs-toggle="tooltip" aria-label="Xoá môn học" data-bs-original-title="Xoá môn học">
                    <i class="fa fa-fw fa-times"></i>
                </a>
            </td>
        </tr>`;
    });
    $("#list-subject").html(html);
}

function viewChapter($id) { }

$("#add_class").on("click", function () {
    $.ajax({
        type: "post",
        url: "./subject/add",
        data: {
            mamon: $("#subject_id").val(),
            tenmon: $("#subject_name").val(),
        },
        dataType: "json",
        success: function (response) {
            if (response == true) {
                $("#modal-add-subject").modal("hide");
                alert("Thêm thành công");
            } else {
            }
        },
    });
});

loadData();
