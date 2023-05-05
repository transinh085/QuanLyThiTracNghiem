Dashmix.helpersOnLoad(["js-flatpickr", "jq-datepicker"]);

const manhom = $(".content").data("id");
const showData = function (students) {
  let html = "";
  let index = 1;
  let offset = (this.valuePage.curPage - 1) * this.option.limit;
  if (students.length == 0) {
    html += `<tr><td colspan="7" class="text-center">Không có dữ liệu</td></tr>`;
  } else {
    students.forEach((student) => {
      html += `
          <tr>
              <td class="text-center">${offset + index++}</td>
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

$(document).ready(function () {
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
            console.log(response)
            getGroupSize(manhom);
            mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
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
        console.log(response)
        showData(response);
      },
    });
  }

  // loadList();

  function showDataTest(tests) {
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
        showDataTest(response);
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
          getGroupSize(manhom);
          mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
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
        $a.attr("download", "Danh sách điểm.xls");
        $a[0].click();
        $a.remove();
      }
    });
  })
  
  $("#nhap-file").click(function (e) {
    e.preventDefault();
    let password = $("#ps_user_group").val();
    let file_cauhoi = $("#file-cau-hoi").val();
    if(password==""||file_cauhoi==""){
      Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `Vui lòng điền đầy đủ thông tin!` });
    } else {
      var file = $("#file-cau-hoi")[0].files[0];
      var formData = new FormData();
      formData.append("fileToUpload", file);
      $.ajax({
        type: "post",
        url: "./user/addExcel",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
          Dashmix.layout("header_loader_on");
        },
        success: function (response) {
          console.log(response)
          addExcel(response,password);
        },
        complete: function () {
          Dashmix.layout("header_loader_off");
        },
      });
    }
  });

  function addExcel(data,password) {
    $.ajax({
      type: "post",
      url: "./user/addFileExcelGroup",
      data: {
        listuser: data,
        group: manhom,
        password: password
      },
      success: function (response) {
        getGroupSize(manhom);
        mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
        $("#ps_user_group").val("");
        $("#file-cau-hoi").val("");
        Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-times me-1', message: `Thêm người dùng không thành công!` });
        $("#modal-add-user").modal("hide");
      },
    });
  }

  function getGroupSize(id) {
    $.ajax({
      type: "post",
      url: "./module/getGroupSize",
      data: {
        manhom: id,
      },
      success: function (response) {
        $(".number-participants").html(+response);
      },
      error: function (err) {
        console.error(err.responseText);
      }
    });
  }

  getGroupSize(manhom);

  function resetSortIcons() {
    document.querySelectorAll(".col-sort").forEach((column) => {
      column.dataset.sortOrder = "default";
    });
  }

  $(".table-col-title").click(function (e) {
    if (!e.target.classList.contains("col-sort")) {
      return;
    }
    const column = e.target.dataset.sortColumn;
    const prevSortOrder = e.target.dataset.sortOrder;
    let currentSortOrder = "";
    switch (prevSortOrder) {
      case "default":
        currentSortOrder = "asc";
        break;
      case "asc":
        currentSortOrder = "desc";
        break;
      case "desc":
        currentSortOrder = "default";
        break;
    }

    if (currentSortOrder === "default") {
      mainPagePagination.option.custom = {};
    } else {
      mainPagePagination.option.custom.function = "sort";
      mainPagePagination.option.custom.column = column;
      mainPagePagination.option.custom.order = currentSortOrder;
    }

    getGroupSize(manhom);
    
    // AJAX call (with pagination)
    mainPagePagination.valuePage.curPage = 1;
    mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);

    // Display icon
    resetSortIcons();
    e.target.dataset.sortOrder = currentSortOrder;
  });

  function clearInputFields() {
    $("#mssv").val("");
    $("#hoten").val("");
    $("#sdt").val("");
    $("#email").val(""),
    $("#ngaysinh").val(""),
    $("#matkhau").val(""),
    $('input[name="gender"]').prop("checked", false);
    $("#ps_user_group").val("");
  }

  $("[data-bs-target='#modal-add-user']").click(function (e) {
    e.preventDefault();
    clearInputFields();
  });
});

// Pagination
const mainPagePagination = new Pagination();
mainPagePagination.option.controller = "module";
mainPagePagination.option.model = "NhomModel";
mainPagePagination.option.limit = 10;
mainPagePagination.option.manhom = manhom;
mainPagePagination.option.filter = {};
mainPagePagination.getPagination(mainPagePagination.option, mainPagePagination.valuePage.curPage);
