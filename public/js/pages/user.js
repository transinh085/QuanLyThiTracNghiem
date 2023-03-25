Dashmix.helpersOnLoad(["js-flatpickr", "jq-datepicker", "jq-select2"]);

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

  function showData(users) {
    let html = "";
    users.forEach((user) => {
      html += `<tr>
                            <td class="text-center">
                                <strong>${user.id}</strong>
                            </td>
                            <td class="fs-sm d-flex align-items-center">
                                <img class="img-avatar img-avatar48 me-3" src="./public/media/avatars/avatar0.jpg" alt="">
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
  }

  $("[data-bs-target='#modal-add-user']").click(function (e) {
    e.preventDefault();
    $(".add-user-element").show();
    $(".update-user-element").hide();
  });

  $("#btn-add-user").on("click", function () {
    $.ajax({
      type: "post",
      url: "./user/add",
      data: {
        hoten: $("#user_name").val(),
        gioitinh: $('input[name="user_gender"]:checked').val(),
        ngaysinh: $("#user_ngaysinh").val(),
        email: $("#user_email").val(),
        role: $("#user_nhomquyen").val(),
        password: $("#user_password").val(),
        status: $("#user_status").prop("checked") ? 1 : 0,
      },
      success: function (response) {
        console.log(response);
        $("#modal-add-user").modal("hide");
        getNumberPage(currentQuery, 1);
        fetch_data(currentQuery, 1);
      },
    });
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
        console.log(response);
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
        getNumberPage(defaultQuery, 1);
        fetch_data(currentQuery, 1);
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
            getNumberPage(currentQuery, 1);
            fetch_data(currentQuery, 1);
          },
        });
      } else {
        e.fire("Cancelled", "Bạn đã không xóa người dùng :)", "error");
      }
    });
  });

  function fetch_data(query, page) {
    $.ajax({
      url: "./user/pagination",
      method: "post",
      data: {
        query: query,
        page: page,
      },
      success: function (data) {
        showData(JSON.parse(data));
      },
      error: function (err) {
        console.error(err);
      },
    });
  }

  function getNumberPage(query, page = 0) {
    page = Number.parseInt(page);
    let html = "";
    $.ajax({
      url: "./user/getNumberPage",
      method: "post",
      data: {
        query: query,
      },
      success: function (numberPages) {
        if (numberPages == 0) return;
        let prev = page > 1 ? page - 1 : 1;
        let next = page < numberPages ? page + 1 : numberPages;
        html += `<li class="page-item ${page == 1 ? "disabled" : "active"}">
                            <a class="page-link" id="${prev}" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                                Prev
                            </a>
                        </li>
                `;
        for (let i = 1; i <= numberPages; i++) {
          html += `
                    <li class="page-item ${i == page ? "active" : ""}">
                        <a class="page-link" id="${i}" href="javascript:void(0)">${i}</a>
                    </li>
                    `;
        }
        html += `
                <li class="page-item ${
                  page == numberPages ? "disabled" : "active"
                }">
                    <a class="page-link" id="${next}" href="javascript:void(0)" aria-label="Next">
                        Next
                    </a>
                </li>
                `;
        $("#getNumberPage").html(html);
      },
    });
  }

  $(document).on("click", ".page-link", function () {
    var page = $(this).attr("id");
    getNumberPage(currentQuery, page);
    fetch_data(currentQuery, page);
  });

  const defaultQuery =
    "SELECT nguoidung.*, nhomquyen.`tennhomquyen` FROM nguoidung, nhomquyen WHERE nguoidung.`manhomquyen` = nhomquyen.`manhomquyen` ORDER BY id";
  let currentQuery = defaultQuery;
  fetch_data(defaultQuery, 1);
  getNumberPage(defaultQuery, 1);
});
