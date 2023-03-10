function updateGroup(id) {
  // check input rỗng: alert không để input rỗng
  const a = document.querySelector(`#tennhom_${id}`);
  $.ajax({
    type: "post",
    url: "./module/updateGroup",
    data: {
      id: id,
      name: a.value,
    },
    success: function (response) {
      loadDataClass();
      //   One.helpers("jq-notify", {
      //     type: "success",
      //     icon: "fa fa-check me-1",
      //     message: "Cập nhật nhóm thành công!",
      //   });
    },
  });
}

function deleteGroup(id) {
  $.ajax({
    type: "post",
    url: "./module/deleteGroup",
    data: {
      id: id,
    },
    success: function (response) {
      loadDataClass();
      // One.helpers("jq-notify", {
      //   type: "success",
      //   icon: "fa fa-check me-1",
      //   message: "Xoá nhóm thành công!",
      // });
    },
  });
}

function loadDataGroup() {
  fetch("./module/loadDataGroup")
    .then((response) => response.json())
    .then((data) => {
      let html = "";
      data.forEach((item) => {
        html += `<div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="${
                      item.manhomhocphan
                    }" id="group-${item.manhomhocphan}" name="ds-grp" ${
          item.manhomhocphan === "0" ? "checked" : ""
        }>
                    <label class="form-check-label" for="group-${
                      item.manhomhocphan
                    }">${item.tennhomhocphan}</label>
                </div>
            </div>`;
      });
      $("#list-group").html(html);
    })
    .catch((error) => console.error(error));
}

function loadDataClass() {
  let html = "";
  fetch("./module/loadDataClass")
    .then((response) => response.json())
    .then((result) => {
      console.log(result);
      result.forEach((item) => {
        html += `<div>
                <div class="heading-group d-flex align-items-center">
                    <h2 class="content-heading">${item.tennhomhocphan}</h2>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-alt-secondary space-x-1 ms-2" id="dropdown-content-rich-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-pencil"></i>
                        </button>
                        <div class="dropdown-menu p-1" aria-labelledby="dropdown-content-rich-primary">
                        <div class="p-2" style="width:200px">
                            <div class="mb-3">
                            <label class="form-label" for="tennhom_${item.manhomhocphan}">Cập nhật nhóm</label>
                            <input type="email" class="form-control" id="tennhom_${item.manhomhocphan}" name="tennhom_${item.manhomhocphan}" value="${item.tennhomhocphan}">
                            </div>
                            <button class="btn btn-sm btn-danger delete_group" onclick="deleteGroup(${item.manhomhocphan})">Xoá</button>
                            <button class="btn btn-sm btn-primary update_group" data-id="${item.manhomhocphan}" onclick="updateGroup(${item.manhomhocphan})">Cập nhật</button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">`;
        if (item.class.length == 0) {
          html += `<p class="text-center">Không có lớp nào</p>`;
        } else {
          item.class.forEach((element) => {
            html += `<div class="col-sm-6 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-shadow" href="./module/detail/${element.manhom}">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">${element.tennhom}</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn btn-sm btn-alt-primary" data-id="${element.manhom}"><i class="si si-pencil"></i></button>
                                        <button type="button" class="btn btn-sm btn-alt-danger" data-id="${element.manhom}"><i class="fa fa-fw fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p>Sỉ số: 0</p>
                                </div>
                            </a>
                        </div>`;
          });
        }
        html += `</div></div>`;
      });
      $("#class-group").html(html);
    })
    .catch((error) => console.error(error));
}

$("#add_group").click(function (e) {
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "./module/addGroup",
    data: {
      name: $("#name_group").val(),
    },
    success: function (response) {
      loadDataGroup();
      $("#collapseExample").collapse("hide");
    },
  });
});

$("#add_class").click(function (e) {
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "./module/addClass",
    data: {
      name: $("#class_name").val(),
      group: $('input[name="ds-grp"]:checked').val(),
    },
    success: function (response) {
      $("#class_name").val("");
      $("#class_note").val("");
      $("#modal-block-vcenter").modal("hide");
      loadDataClass();
      // One.helpers("jq-notify", {
      //   type: "success",
      //   icon: "fa fa-check me-1",
      //   message: "Thêm lớp thành công!",
      // });
    },
  });
});

loadDataClass();
loadDataGroup();
