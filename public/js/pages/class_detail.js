Dashmix.helpersOnLoad(["js-flatpickr", "jq-datepicker"]);
$(document).ready(function () {
  const manhom = $(".content").data("id");
  const showList = function (students) {
    let html = "";
    $(".number-participants").html(students.length);
    if (students.length == 0) {
      html += `<tr><td colspan="7" class="text-center">Không có dữ liệu</td></tr>`;
    } else {
      students.forEach((student, index) => {
        html += `
            <tr>
                <td class="text-center">${index + 1}</td>
                <td class="fs-sm d-flex align-items-center">
                        <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/${
                          student.avatar == null
                            ? `avatar2.jpg`
                            : student.avatar
                        }"
                            alt="">
                        <div class="d-flex flex-column">
                            <a class="fw-semibold" href="javascript:void(0)">${
                              student.hoten
                            }</a>
                            <span class="fw-normal fs-sm text-muted">${
                              student.email
                            }</span>
                        </div>
                    </td>
                <td class="text-center">${student.id}</td>
                    <td class="text-center fs-sm">${
                      student.gioitinh == 1 ? "Nam" : "Nữ"
                    }</td>
                    <td class="text-center fs-sm">${student.ngaysinh}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-alt-secondary kick-user"
                                data-bs-toggle="Delete" title="Delete" data-id="${
                                  student.id
                                }">
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

  $(document).on("click", ".kick-user", function () {
    var mssv = $(this).data("id");

    let e = Swal.mixin({
      buttonsStyling: !1,
      target: "#page-container",
      customClass: {
        confirmButton: "btn btn-success m-1",
        cancelButton: "btn btn-danger m-1",
        input: "form-control",
      },
    });

    e.fire({
      title: "Are you sure?",
      text: "Bạn có chắc chắn muốn xóa người dùng này ra khỏi nhóm?",
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
          url: "./module/kickUser",
          data: {
            manhom: manhom,
            manguoidung: mssv,
          },
          success: function (response) {
            e.fire("Deleted!", "Xóa người dùng thành công!", "success");
          },
        });
      } 
    });
  });

  function loadList() {
    $.ajax({
      type: "post",
      url: "./module/getSvList",
      data: {
        manhom: manhom,
      },
      dataType: "json",
      success: function (response) {
        showList(response);
      },
    });
  }

  loadList();

  function showListTest(tests) {
    let html = ``;
    if (tests.length != 0) {
      tests.forEach((test) => {
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
      html += `<p class="text-center">Chưa có đề thi...</p>`;
    }
    $(".list-test").html(html);
  }

  function loadDataTest(manhom) {
    $.ajax({
      type: "post",
      url: "./test/getTestGroup",
      data: {
        manhom: manhom,
      },
      dataType: "json",
      success: function (response) {
        showListTest(response);
      },
    });
  }

  $("[data-bs-target='#offcanvasSetting']").click(function (e) {
    e.preventDefault();
    loadDataTest(manhom);
  });

  showInvitedCode();

  function showInvitedCode() {
    $.ajax({
      type: "post",
      url: "./module/getInvitedCode",
      data: {
        manhom: manhom,
      },
      success: function (response) {
        $("#show-ma-moi").text(response);
      },
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
            showInvitedCode();
        }
    });
  });

  $(".btn-add-sv").click(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "./module/addSV",
      data: {
        manhom: manhom,
        mssv: $("#mssv").val(),
        hoten: $("#hoten").val(),
        sdt: $("#sdt").val(),
        email: $("#email").val(),
        ngaysinh: $("#ngaysinh").val(),
        password: $("#matkhau").val(),
        gioitinh: $('input[name="gender"]:checked').val(),
      },
      success: function (response) {
        if(response){
          loadList();
        }
      },
    });
  });

  $("#exportStudents").click(function(){
    $.ajax({
      type: "post",
      url: "./module/exportExcelStudentS",
      data: {
        manhom: manhom,
      },
      dataType: "json",
      success: function (response) {
        var $a = $("<a>");
        $a.attr("href", response.file);
        $("body").append($a);
        $a.attr("download", "Danh sách sinh viên.xls");
        $a[0].click();
        $a.remove();
      },
    });
  })

  $("#exportScores").click(function(){
    $.ajax({
      type: "post",
      url: "./test/getMarkOfAllTest",
      data: {
        manhom: manhom,
      },
      dataType: "json",
      success: function (response) {
        var $a = $("<a>");
        $a.attr("href", response.file);
        $("body").append($a);
        $a.attr("download", "Danh sách điểm.xlsx");
        $a[0].click();
        $a.remove();
      }
    });
  })
  
});

