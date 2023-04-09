Dashmix.helpersOnLoad(["js-flatpickr", "jq-datepicker", "jq-select2"]);

Dashmix.onLoad((() => class {
  static initValidation() {
    Dashmix.helpers("jq-validation"), jQuery(".form-add-user").validate({
      rules: {
        "masinhvien": {
          required: !0,
          digits: true
        },
        "user_email": {
          required: !0,
          emailWithDot: !0
        },
        "user_name": {
          required: !0,
        },
        "user_gender": {
          required: !0,
        },
        "user_ngaysinh": {
          required: !0,
        },
        "user_password": {
          required: !0,
          minlength: 5
        },
      },
      messages: {
        "masinhvien": {
          required: "Please provide your code student",
          digits: "Please enter alphanumeric characters"
        },
        "user_email": {
          required: "Please provide your email",
          emailWithDot: "Nhap dung dinh dang email"
        },
        "user_name": {
          required: "Please provide your full name",

        },
        "user_gender": {
          required: "Please tick 1 out of 2",
        },
        "user_ngaysinh": {
          required: "Please provide your date of birth",
        },
        "user_password": {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
      }
    })
  }

  static init() {
    this.initValidation()
  }
}.init()));


const showData = function (users) {
  let html = "";
  users.forEach((user) => {
    html += `<tr>
                          <td class="text-center">
                              <strong>${user.id}</strong>
                          </td>
                          <td class="fs-sm d-flex align-items-center">
                              <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/${user.avatar == null ? `avatar2.jpg`: user.avatar}" alt="">
                              <div class="d-flex flex-column">
                                  <strong class="text-primary">${
                                    user.hoten
                                  }</strong>
                                  <span class="fw-normal fs-sm text-muted">${
                                    user.email
                                  }</span>
                              </div>
                          </td>
                          <td class="text-center">${
                            user.gioitinh == 1 ? "Nam" : "Nữ"
                          }</td>
                          <td class="text-center">${user.ngaysinh}</td>
                          <td class="text-center">${user.tennhomquyen}</td>
                          <td class="text-center">${user.ngaythamgia}</td>
                          <td class="text-center">
                              <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill ${
                                user.trangthai == 1
                                  ? "bg-success-light text-success"
                                  : "bg-danger-light text-danger"
                              } bg-success-light text-success">${
      user.trangthai == 1 ? "Hoạt động" : "Khoá"
    }</span>
                          </td> 
                          <td class="text-center">
                              <a class="btn btn-sm btn-alt-secondary user-edit" href="javascript:void(0)"
                              data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit" data-id="${
                                user.id
                              }">
                                  <i class="fa fa-fw fa-pencil"></i>
                              </a>
                              <a class="btn btn-sm btn-alt-secondary user-delete" href="javascript:void(0)" data-bs-toggle="tooltip"
                                  aria-label="Delete" data-bs-original-title="Delete" data-id="${
                                    user.id
                                  }">
                                  <i class="fa fa-fw fa-times"></i>
                              </a>
                          </td>
                      </tr>
      `;
  });
  $("#list-user").html(html);
  $('[data-bs-toggle="tooltip"]').tooltip();
};

$(document).ready(function () {
  $("#user_nhomquyen").select2({
    dropdownParent: $("#modal-add-user"),
  });

  $.get(
    "./roles/getAll",
    function (data) {
      let html = `<option></option>`;
      data.forEach((item) => {
        html += `<option value="${item.manhomquyen}">${item.tennhomquyen}</option>`;
      });
      $("#user_nhomquyen").html(html);
    },
    "json"
  );

  function loadData() {
    $.get(
      "./user/getData",
      function (data, textStatus) {
        showData(data);
      },
      "json"
    );
  }

  loadData();

  $("[data-bs-target='#modal-add-user']").click(function (e) {
    e.preventDefault();
    $(".add-user-element").show();
    $(".update-user-element").hide();
  });

  $("#btn-add-user").on("click", function (e) {
    e.preventDefault();
    let mssv = $("#masinhvien").val();
    let hoten = $("#user_name").val();
    let gioitinh = $('input[name="user_gender"]:checked').val();
    let ngaysinh = $("#user_ngaysinh").val();
    let email = $("#user_email").val();
    let role = $("#user_nhomquyen").val();
    let password = $("#user_password").val();
    const check = mssv != '' && hoten != '' && gioitinh != '' && ngaysinh != '' && email != '' &&  role != '' && password != '';


    if (check) {
      $.ajax({
        type: "post",
        url: "./user/add",
        data: {
          masinhvien: $("#masinhvien").val(),
          hoten: $("#user_name").val(),
          gioitinh: $('input[name="user_gender"]:checked').val(),
          ngaysinh: $("#user_ngaysinh").val(),
          email: $("#user_email").val(),
          role: $("#user_nhomquyen").val(),
          password: $("#user_password").val(),
          status: $("#user_status").prop("checked") ? 1 : 0,
        },
        success: function (response) {
          $("#modal-add-user").modal("hide");
          getNumberPage("user", currentPage);
          fetch_data("user", currentPage);
        },
      });
    }
  });

  $(document).on("click", ".user-edit", function () {
    $("#modal-add-user").modal("show");
    let id = $(this).data("id");
    $(".add-user-element").hide();
    $(".update-user-element").show();
    $("#btn-update-user").data("id", id);
    $.ajax({
      type: "post",
      url: "./user/getDetail",
      data: {
        id: id,
      },
      dataType: "json",
      success: function (response) {
        $("#masinhvien").val(response.id)
        $("#masinhvien").prop("disabled",true);
        $("#user_name").val(response.hoten),
          $(`input[name="user_gender"][value="${response.gioitinh}"]`).prop(
            "checked",
            true
          ),
          $("#user_ngaysinh").val(response.ngaysinh);
        $("#user_email").val(response.email);
        $("#user_nhomquyen").val(response.manhomquyen).trigger("change");
        $("#user_status").prop("checked", response.trangthai);
      },
    });
  });

  $("#btn-update-user").click(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "./user/update",
      data: {
        id: $(this).data("id"),
        hoten: $("#user_name").val(),
        gioitinh: $('input[name="user_gender"]:checked').val(),
        ngaysinh: $("#user_ngaysinh").val(),
        email: $("#user_email").val(),
        role: $("#user_nhomquyen").val(),
        password: $("#user_password").val(),
        status: $("#user_status").prop("checked") ? 1 : 0,
      },
      success: function (response) {
        $("#modal-add-user").modal("hide");
        getNumberPage("user", currentPage);
        fetch_data("user", currentPage);
      },
    });
  });

  $(document).on("click", ".user-delete", function () {
    var trid = $(this).data("id");
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
      text: "Bạn có chắc chắn muốn xoá nhóm người dùng?",
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
          url: "./user/deleteData",
          data: {
            id: trid,
          },
          success: function (response) {
            e.fire("Deleted!", "Xóa người dùng thành công!", "success");
            // loadData();
            getNumberPage("user", 1);
            fetch_data("user", 1);
          },
        });
      } else {
        e.fire("Cancelled", "Bạn đã không xóa người dùng :)", "error");
      }
    });
  });

  $(document).on("click", ".page-link", function () {
    var page = $(this).attr("id");
    currentPage = page;
    getNumberPage("user", currentPage);
    fetch_data("user", currentPage);
  });

  $("#search-form").on("input", function (e) {
    e.preventDefault();
    getNumberPage("user", 1);
    fetch_data("user", 1);
  });

  $("#nhap-file").click(function (e) {
    e.preventDefault();
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
        addExcel(response);
      },
      complete: function () {
        Dashmix.layout("header_loader_off");
      },
    });
  });

  function addExcel(data) {
    $.ajax({
      type: "post",
      url: "./user/addFileExcel",
      data: {
        listuser: data,
      },
      success: function (response) {
        $("#modal-add-user").modal("hide");
        getNumberPage("user", currentPage);
        fetch_data("user", currentPage);
        showData();
      },
    });
  }

  let currentPage = 1;
  getNumberPage("user", currentPage);
  fetch_data("user", currentPage);
});
