Dashmix.helpersOnLoad(["jq-select2", "js-ckeditor"]);
CKEDITOR.replace("option-content");

let options = [];

$("[data-bs-target='#add_option']").on('click', function () {
    $("#update-option").hide();
    $("#save-option").show();
});

$("#save-option").click(function (e) {
    e.preventDefault();
    let content_option = CKEDITOR.instances["option-content"].getData();
    let true_option = $("#true-option").prop("checked");
    let option = {
        content: content_option,
        check: true_option,
    };
    options.push(option);
    $("#add_option").collapse("hide");
    resetForm();
    showOptions(options);
});


$("#update-option").click(function (e) { 
    e.preventDefault();
    options[$(this).data('id')].content = CKEDITOR.instances["option-content"].getData();
    showOptions(options);
    resetForm();
    $("#add_option").collapse("hide");
});

function showOptions(options) {
    let data = "";
    options.forEach((item, index) => {
        data += `<tr>
                <th class="text-center" scope="row">${index + 1}</th>
                <td>
                ${item.content}
                </td>
                <td class="d-none d-sm-table-cell">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="da-dung" data-id="${index}" id="da-${index}" onchange="changeOptionTrue(this)" ${item.check == true ? `checked` : ``}>
                        <label class="form-check-label" for="da-${index}">
                            Đáp án đúng
                        </label>
                    </div>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-alt-secondary"
                            data-bs-toggle="tooltip" title="Edit" onclick="editOption(${index})">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-alt-secondary"
                            data-bs-toggle="tooltip" title="Delete" onclick="deleteOption(${index})">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </td>
            </tr>`;
    });
    $("#list-options").html(data);
}

function resetForm() {
    CKEDITOR.instances["option-content"].setData("");
    $("#true-option").prop("checked",false);
}

function editOption(index) {
    $("#update-option").show();
    $("#save-option").hide();
    $("#update-option").data('id', index)
    $("#add_option").collapse("show");
    CKEDITOR.instances["option-content"].setData(options[index].content);
    if(options[index].check == true) {
        $("#true-option").prop("checked",true);
    }
}

function deleteOption(index) {
    if(confirm("Bạn có chắc chắn muốn xoá lựa chọn ?") == true) {
        options.splice(index,1);
        showOptions(options);
    }
}

function changeOptionTrue(x) {
    let index = $(x).data('id');
    options.forEach(item => {
        item.check = false;
    });
    options[index].check = true;
}

$.get("./subject/getData",function (data) {
    let html = "<option></option>";
    data.forEach(item => {
        html += `<option value="${item.mamonhoc}">${item.tenmonhoc}</option>`
    });
    $("#mon-hoc").html(html);
},"json");



$("#add_question").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "./question/addQues",
        data: {
            mamon: $("#mon-hoc").val(),
            machuong: $("#chuong").val(),
            dokho: $("#dokho").val(),
            noidung: CKEDITOR.instances["js-ckeditor"].getData(),
            cautraloi: options,
        },
        success: function (response) {
            console.log(response);
        }
    });
});