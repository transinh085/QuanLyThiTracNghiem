Dashmix.helpersOnLoad(["jq-select2"]);

Dashmix.onLoad(() =>
    class {
        static initValidation() {
            Dashmix.helpers("jq-validation"),
            jQuery(".form-taodethi").validate({
                rules: {
                    "giang-vien": {
                        required: !0,
                    }
                },
                messages: {
                    "giang-vien": {
                        required: "Vui lòng chọn giảng viên",
                    }
                },
            });
        }
        static init() {
            this.initValidation();
        }
    }.init()
);

// Store assigned (checked) subjects while modal is opening
let subject = new Set();

function showAssignment(data) {
    if (data.length === 0) {
        $("#listAssignment").html("");
        $('[data-bs-toggle="tooltip"]').tooltip();
        return;
    }
    let html = '';
    let index = 1;
    let offset = (this.valuePage.curPage - 1) * (this.option.limit || 5);
    data.forEach(element => {
        html += `<tr>
        <td class="text-center fs-sm">
            <a class="fw-semibold" href="#">
                <strong>${offset + index++}</strong>
            </a>
        </td>
        <td>
            ${element['hoten']}
        </td>
        <td class="text-center">
            ${element['mamonhoc']}
        </td>
        <td>
            <a class="fw-semibold">${element['tenmonhoc']}</a>
        </td>
        <td class="text-center">
            <a class="btn btn-sm btn-alt-secondary btn-delete-assignment" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete" data-id="${element['manguoidung']}">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </td>
    </tr>`
    });
    $("#listAssignment").html(html);
    $('[data-bs-toggle="tooltip"]').tooltip();
}

function showSubject(data) {
    if (data.length == 0) {
        $("#list-subject").html("");
        return;
    }
    let html = "";
    data.forEach(element => {
        html += `<tr>
        <td class="text-center">
            <input class="form-check-input" type="checkbox" name="selectSubject" value="${element['mamonhoc']}">
        </td>
        <td class="text-center">${element['mamonhoc']}</td>
        <td>${element['tenmonhoc']}</td>
        <td class="text-center">${element['sotinchi']}</td>
        <td class="text-center">${element['sotietlythuyet']}</td>
        <td class="text-center">${element['sotietthuchanh']}</td>
    </tr>`
    });
    $("#list-subject").html(html);

    if ($("#giang-vien").val() !== '') {
        updateCheckmarkSubject(subject);
    }
}

function updateCheckmarkSubject(checkedSubjects) {
    $("input:checkbox[name=selectSubject]:checked").removeAttr('checked');
    checkedSubjects.forEach(function (subject) {
        $(`input:checkbox[value=${subject}]`).attr("checked", "checked");
    });
}

$(document).ready(function(){

    $(".js-select2").select2({
        dropdownParent: $("#modal-add-assignment"),
    });

    // function loadAssignment(){
    //     $.get("./assignment/getAssignment",
    //         function (data) {
    //             showData(data);
    //         },
    //         "json"
    //     );
    // }

    // loadAssignment();
    
    $.get("./assignment/getGiangVien",
        function (data) {
            let html = "<option></option>";
            data.forEach(element => {
                html += `<option value="${element['id']}">${element['hoten']}</option>`;
            });
            $("#giang-vien").html(html);
        },
        "json"
    );

    $("#add_assignment").click(function(){
        $("#giang-vien").val("").trigger("change");
        // $.get("./assignment/getMonHoc",
        // function (data) {
        //     showData(data);
        // },
        // "json"
        // };
        modalAddAssignmentPagination.getPagination(modalAddAssignmentPagination.option, modalAddAssignmentPagination.valuePage.curPage);
    });

    $("#modal-add-assignment").on("hidden.bs.modal", function () {
        subject.clear();
    });

    $("#btn_assignment").click(function(){
        if ($(".form-phancong").valid()) {
            let giangvien = $("#giang-vien").val();
            if(subject.size === 0){
                deleteAssignmentUser(giangvien)
                mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
                $("#modal-add-assignment").modal("hide");
                Dashmix.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: 'Phân công thành công! :)'});
            } else {
                clearAllAndAddAssignmentUser(giangvien, [...subject]);
            }
        }
    })

    $(document).on("change", "#giang-vien", function (e) {
        let giangvien = $("#giang-vien").val();
        $.ajax({
            type: "post",
            url: "./assignment/getAssignmentByUser",
            data: {
                id: giangvien
            },
            dataType: "json",
            success: function (response) {
                subject = new Set(response.map(el => el.mamonhoc));
                modalAddAssignmentPagination.valuePage.curPage = 1;
                modalAddAssignmentPagination.getPagination(modalAddAssignmentPagination.option, modalAddAssignmentPagination.valuePage.curPage);
            }, error: function (err) {
                console.error(err.responseText);
            }
        });
    })

    $("#list-subject").click(function (e) {
        if (!e.target.closest('input[type=checkbox][name="selectSubject"]')) {
            return;
        }
        const el = e.target;
        const mamonhoc = el.value;
        if (el.checked) {
            subject.add(mamonhoc);
            el.setAttribute("checked", "checked");
        } else {
            subject.delete(mamonhoc);
            el.removeAttribute("checked");
        }
    });

    function addAssignment(giangvien, listSubject) {
        $.ajax({
            type: "post",
            url: "./assignment/addAssignment",
            data: {
                magiangvien: giangvien,
                listSubject: listSubject
            },
            dataType: "json",
            success: function (response) {
                if(response){
                    $("#modal-add-assignment").modal("hide");
                    Dashmix.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: 'Phân công thành công! :)'});
                } else {
                    $("#modal-add-assignment").modal("hide");
                    setTimeout(function(){
                        Dashmix.helpers('jq-notify', {type: 'danger', icon: 'fa fa-times me-1', message: 'Phân công chưa thành công!'});
                    },10)
                }
                mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);;
            },
            error: function (err) {
                console.error(err.responseText);
            }
        });
    }

    function deleteAssignmentUser(giangvien){
        $.ajax({
            type: "post",
            url: "./assignment/deleteAll",
            data: {
              id: giangvien,
            },
            success: function (response) {},
        });
    }

    function clearAllAndAddAssignmentUser (giangvien, listSubject) {
        $.ajax({
            type: "post",
            url: "./assignment/deleteAll",
            data: {
              id: giangvien,
            },
            success: function (response) {
                addAssignment(giangvien, listSubject);
            },
        });
    }

    $(document).on("click", ".btn-delete-assignment", function () {
        let id = $(this).data("id");
        let mamon = $(this).closest("td").closest("tr").children().eq(2).text();
        let e = Swal.mixin({
            buttonsStyling: !1,
            target: "#page-container",
            customClass: {
                confirmButton: "btn btn-success m-1",
                cancelButton: "btn btn-danger m-1",
                input: "form-control"
            }
        });
    
        e.fire({
            title: "Are you sure?",
            text: "Bạn có chắc chắn muốn xoá phân công?",
            icon: "warning",
            showCancelButton: !0,
            customClass: {
                confirmButton: "btn btn-danger m-1",
                cancelButton: "btn btn-secondary m-1"
            },
            confirmButtonText: "Vâng, tôi chắc chắn!",
            html: !1,
            preConfirm: e => new Promise((e => {
                setTimeout((() => {
                    e()
                }), 50)
            }))
        }).then((t => {
            if(t.value == true){
                $.ajax({
                    type: "post",
                    url: "./assignment/delete",
                    data: {
                        id: id,
                        mamon: mamon
                    },
                    success: function (response) {
                        if(response) {
                            e.fire("Deleted!", "Xóa phân công thành công!", "success")
                            mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
                        } else {
                            e.fire("Lỗi !", "Xoá phân công thành công !)", "error")
                        }
                    }
                });
            }
        }))
    });

})

// Pagination
const paginationContainer = document.querySelectorAll(".pagination-container");
paginationContainer[0].classList.add(paginationClassName[0]);
paginationContainer[1].classList.add(paginationClassName[1]);

const mainPageNav = document.querySelector(`.${paginationClassName[0]}`);
const mainPageSearchForm = document.getElementById("main-page-search-form");
const modalAssignmentNav = document.querySelector(`.${paginationClassName[1]}`);
const modalAssignmentSearchForm = document.getElementById("modal-add-assignment-search-form");

const mainPagePagination = new Pagination(mainPageNav, mainPageSearchForm, showAssignment);
mainPagePagination.option.controller = "assignment";
mainPagePagination.option.model = "PhanCongModel";
mainPagePagination.option.limit = 10;
mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);

const modalAddAssignmentPagination = new Pagination(modalAssignmentNav, modalAssignmentSearchForm, showSubject);
modalAddAssignmentPagination.option.controller = "assignment";
modalAddAssignmentPagination.option.model = "PhanCongModel";
modalAddAssignmentPagination.option.custom.function = "monhoc";
