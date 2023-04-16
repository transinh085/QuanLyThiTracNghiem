function showData(data) {
  //   console.log(data);
  let html = "";
  let index = 1;
  data.forEach((Element) => {
    var totalSeconds = Element["thoigianlambai"];
    var hours = Math.floor(totalSeconds / 3600);
    var minutes = Math.floor((totalSeconds % 3600) / 60);
    var seconds = Math.floor(totalSeconds % 60);
    var formattedTime =
      hours.toString().padStart(2, "0") +
      ":" +
      minutes.toString().padStart(2, "0") +
      ":" +
      seconds.toString().padStart(2, "0");
    html += `<tr>
        <td class="text-center">${index++}</td>
        <td class="fs-sm d-flex align-items-center">
            <img class="img-avatar img-avatar48 me-3"
                src="./public/media/avatars/${
                  Element["avatar"] == null ? "avatar2.jpg" : Element["avatar"]
                }" alt="${Element["hoten"]}">
            <div class="d-flex flex-column">
                <strong class="text-primary">${Element["hoten"]}</strong>
                <span class="fw-normal fs-sm text-muted">${
                  Element["email"]
                }</span>
            </div>
        </td>
        <td class="text-center">${Element["diemthi"]}</td>
        <td class="text-center">${Element["thoigianvaothi"]}</td>
        <td class="text-center">${formattedTime}</td>
        <td class="text-center">${Element["solanchuyentab"]}</td>
        <td class="text-center">
            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                data-bs-toggle="tooltip" aria-label="View"
                data-bs-original-title="View">
                <i class="fa fa-fw fa-eye"></i>
            </a>
        </td>
    </tr>`;
  });
  $("#took_the_exam").html(html);
  $("a[data-bs-toogle='tooltip']").tooltip();
}

$(document).ready(function () {
  $("[data-bs-target='#modal-cau-hoi']").click(function (e) {
    e.preventDefault();
    let made = $(this).data("id");
    $.ajax({
      type: "post",
      url: "./test/getQuestion",
      data: {
        made: made,
      },
      dataType: "json",
      success: function (response) {
        showListQuestion(response);
      },
    });
  });

  function showListQuestion(questions) {
    let html = ``;
    questions.forEach((question, index) => {
      html += `<div class="question rounded border mb-3 bg-white" id="c${
        index + 1
      }">
        <div class="question-top p-3">
            <p class="question-content fw-bold mb-3">${index + 1}. ${
        question.noidung
      }</p>
            <div class="row">`;
      question.cautraloi.forEach((ctl, i) => {
        html += `<div class="col-6 mb-1">
                <p class="mb-1"><b>${String.fromCharCode(i + 65)}.</b> ${
          ctl.noidungtl
        }</p>
            </div>`;
      });
      html += `</div></div></div>`;
    });
    $("#list-question").html(html);
  }

  function showTookTheExam(made) {
    $.ajax({
      type: "post",
      url: "./test/tookTheExam",
      data: {
        made: made,
      },
      dataType: "json",
      success: function (response) {
        showData(response);
      },
    });
  }
  var made = $("#chitietdethi").data("id");
  //   showTookTheExam(made);

  function showExamineeByGroup(made, manhom) {
    $.ajax({
      type: "post",
      url: "./test/getExamineeByGroup",
      data: {
        made: made,
        manhom: manhom,
      },
      dataType: "json",
      success: function (response) {
        showData(response);
      },
      error: function (error) {
        console.log(error.responseText);
      },
    });
  }

  // Dropdown
  $(".filter-search").click(function (e) {
    e.preventDefault();
    $(".btn-filter").text($(this).text());
    currentGroupID = $(this).data("value");
    defaultPaginationOptions.filter = currentGroupID;
    getPagination(currentPaginationOptions, valuePage.curPage);
  });

  // Lấy danh sách mã nhóm
  const listGroupID = [];
  document.querySelectorAll(".filter-search").forEach(function (element) {
    const id = element.dataset.value;
    listGroupID.push(+id);
  });
  let currentGroupID = listGroupID[0];

  // Pagination initialization
  const defaultPaginationOptions = {
    controller: "test",
    model: "KetQuaModel",
    made,
    filter: currentGroupID,
  };
  let currentPaginationOptions = defaultPaginationOptions;

  document
    .querySelector(".pagination-container")
    .addEventListener("click", function (e) {
      if (e.target.closest(".page-link")) {
        getPagination(currentPaginationOptions, valuePage.curPage);
      }
    });

  $("#search-form").on("input", function (e) {
    e.preventDefault();
    var input = $("#search-input").val();
    if (input == "") {
      delete currentPaginationOptions.input;
    } else {
      currentPaginationOptions.input = input;
      valuePage.curPage = 1;
    }
    getPagination(currentPaginationOptions, valuePage.curPage);
  });

  getPagination(currentPaginationOptions, valuePage.curPage);
});
