function showData(data) {
  // console.log(data);
  let html = "";
  let index = 1;
  data.forEach((Element) => {
    var totalSeconds = Element["thoigianlambai"] || 0;
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
        <td class="text-center">${Element["manguoidung"]}</td>
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
        <td class="text-center">${Element["diemthi"] || "(Chưa nộp bài)"}</td>
        <td class="text-center">${
          Element["thoigianvaothi"] || "(Vắng thi)"
        }</td>
        <td class="text-center">${formattedTime}</td>
        <td class="text-center">${Element["solanchuyentab"] || 0}</td>
        <td class="text-center">
            <a class="btn btn-sm btn-alt-secondary show-exam-detail" href="javascript:void(0)" data-bs-toggle="tooltip" aria-label="Xem chi tiết" data-bs-original-title="Xem chi tiết" data-id="${
              Element["makq"] || ""
            }">
                <i class="fa fa-fw fa-eye"></i>
            </a>
            <a class="btn btn-sm btn-alt-secondary print-pdf" href="javascript:void(0)" data-bs-toggle="tooltip" aria-label="In bài làm" data-bs-original-title="In bài làm" data-id="${
              Element["makq"] || ""
            }">
                <i class="fa fa-fw fa-print"></i>
            </a>
        </td>
    </tr>`;
  });
  $("#took_the_exam").html(html);
  $('[data-bs-toggle="tooltip"]').tooltip();
}

const made = document.getElementById("chitietdethi").dataset.id;

// Lấy danh sách mã nhóm
const listGroupID = [];
document.querySelectorAll(".filtered-by-group").forEach(function (element) {
  const id = element.dataset.value;
  listGroupID.push(+id);
});
let currentGroupID = listGroupID[0];

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

  var made = $("#chitietdethi").data("id");
  function showTookTheExam(made) {
    $.ajax({
      type: "post",
      url: "./test/tookTheExam",
      data: {
        made: made,
      },
      dataType: "json",
      success: function (response) {
        console.log(response);
        showData(response);
      },
    });
  }

  var made = $("#chitietdethi").data("id");
  // showTookTheExam(made);

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
  $(".filtered-by-group").click(function (e) {
    e.preventDefault();
    $(".btn-filtered-by-group").text($(this).text());
    currentGroupID = $(this).data("value");
    currentPaginationOptions.manhom = currentGroupID;
    resetFilterState();
    renderTableTitleColumns();
    resetSortIcons();
    getPagination(currentPaginationOptions, valuePage.curPage);
  });

  $(".filtered-by-state").click(function (e) {
    e.preventDefault();
    $(".btn-filtered-by-state").text($(this).text());
    const state = $(this).data("state");
    if (state !== "present") {
      currentPaginationOptions.filter = state;
    } else {
      delete currentPaginationOptions.filter;
    }

    renderTableTitleColumns(state);
    resetSortIcons();

    getPagination(currentPaginationOptions, valuePage.curPage);
  });

  // Hiển thị đề kiểm tra đáp án + câu trả lời của thí sinh đó
  function showTestDetail(questions) {
    let data = ``;
    questions.forEach((item, index) => {
      let dadung = item.cautraloi.find((op) => op.ladapan == 1);
      data += `<div class="question rounded border mb-3">
            <div class="question-top p-3">
                <p class="question-content fw-bold mb-3">${index + 1}. ${
        item.noidung
      } </p>
                <div class="row">`;
      item.cautraloi.forEach((op, i) => {
        data += `<div class="col-6 mb-1">
                <p class="mb-1"><b>${String.fromCharCode(i + 65)}.</b> ${
          op.noidungtl
        }</p></div>`;
      });
      data += `</div></div>`;
      data += `<div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center"><p class="mb-0 text-white me-4">Đáp án của bạn:</p>`;
      item.cautraloi.forEach((op, i) => {
        let check =
          item.dapanchon == op.macautl
            ? op.ladapan == 1
              ? "btn-answer-true"
              : "btn-answer-false"
            : "";
        data += `<button class="btn btn-light rounded-pill me-2 btn-answer-question ${check}" for="option-c${index}_${i}">${String.fromCharCode(
          i + 65
        )}</button>`;
      });
      data +=
        dadung.macautl == item.dapanchon
          ? `<span class="h2 mb-0 ms-1"><i class="fa fa-check" style="color:#76BB68;"></i></span>`
          : `<span class="h2 mb-0 ms-1"><i class="fa fa-xmark" style="color:#FF5A5F;"></i></span><span class="mx-2 text-white">Đáp án đúng: ${String.fromCharCode(
              item.cautraloi.indexOf(dadung) + 65
            )}</span>`;
      data += `</div></div>`;
    });
    $("#content-file").html(data);
  }

  $(document).on("click", ".show-exam-detail", function () {
    $("#modal-show-test").modal("show");
    let makq = $(this).data("id");
    // console.log(makq)
    if (makq === "" || currentPaginationOptions.filter === "interrupted") {
      let html = `<h5 class="text-center mb-2 fw-normal">Không thể xem kết quả</h5>`;
      $("#content-file").html(html);
      return;
    }
    $.ajax({
      type: "post",
      url: "./test/getResultDetail",
      data: {
        makq: makq,
        made: made,
      },
      dataType: "json",
      success: function (response) {
        console.log(response);
        showTestDetail(response);
      },
    });
  });

  function resetSortIcons() {
    document.querySelectorAll(".col-sort").forEach((column) => {
      column.dataset.sortOrder = "default";
    });
  }

  function resetFilterState() {
    delete currentPaginationOptions.filter;
    $(".btn-filtered-by-state").text("Đã nộp bài");
  }

  function renderTableTitleColumns(state = "present") {
    let html = `
    <th class="text-center col-sort" data-sort-column="manguoidung" data-sort-order="default">MSSV</th>
    <th class="col-sort" data-sort-column="hoten" data-sort-order="default">Họ tên</th>
    `;

    switch (state) {
      case "present":
        html += `
        <th class="text-center col-sort" data-sort-column="diemthi" data-sort-order="default">Điểm</th>
        <th class="text-center col-sort" data-sort-column="thoigianvaothi" data-sort-order="default">Thời gian vào thi</th>
        <th class="text-center col-sort" data-sort-column="thoigianlambai" data-sort-order="default">Thời gian thi</th>
        <th class="text-center col-sort" data-sort-column="solanchuyentab" data-sort-order="default">Số lần thoát</th>
        `;
        break;
      case "absent":
        html += `
        <th class="text-center">Điểm</th>
        <th class="text-center">Thời gian vào thi</th>
        <th class="text-center">Thời gian thi</th>
        <th class="text-center">Số lần thoát</th>
        `;
        break;
      case "interrupted":
        html += `
        <th class="text-center">Điểm</th>
        <th class="text-center col-sort" data-sort-column="thoigianvaothi" data-sort-order="default">Thời gian vào thi</th>
        <th class="text-center">Thời gian thi</th>
        <th class="text-center">Số lần thoát</th>
        `;
        break;
      default:
    }
    html += `
    <th class="text-center">Hành động</th>
    `;
    $(".table-col-title").html(html);
  }

  $(".table-col-title").click(function (e) {
    if (!e.target.classList.contains("col-sort")) {
      return;
    }
    const column = e.target.dataset.sortColumn;

    switch (currentPaginationOptions.filter) {
      case "absent":
        switch (column) {
          case "diemthi":
          case "thoigianvaothi":
          case "thoigianlambai":
          case "solanchuyentab":
            return;
          default:
        }
        break;
      case "interrupted":
        switch (column) {
          case "diemthi":
          case "thoigianlambai":
          case "solanchuyentab":
            return;
          default:
        }
        break;
      default:
    }

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
      currentPaginationOptions.custom = {};
    } else {
      currentPaginationOptions.custom.function = "sort";
      currentPaginationOptions.custom.column = column;
      currentPaginationOptions.custom.order = currentSortOrder;
    }

    // AJAX call (with pagination)
    valuePage.curPage = 1;
    getPagination(currentPaginationOptions, valuePage.curPage);

    // Display icon
    resetSortIcons();
    e.target.dataset.sortOrder = currentSortOrder;
  });

  $(document).on("click", ".print-pdf", function () {
    let makq = $(this).data("id");
    $.ajax({
      url: `./test/exportPdf/${makq}`,
      method: "POST",
      success: function (response) {
        // Tạo tệp blob từ chuỗi base64
        var binaryString = atob(response);
        var binaryLen = binaryString.length;
        var bytes = new Uint8Array(binaryLen);

        for (var i = 0; i < binaryLen; i++) {
          bytes[i] = binaryString.charCodeAt(i);
        }
        // Tạo đối tượng Blob
        var blob = new Blob([bytes], { type: "application/pdf" });

        // Tạo đường dẫn URL tới blob
        var url = URL.createObjectURL(blob);

        // Tạo một liên kết ẩn để tải xuống tệp
        var a = document.createElement("a");
        a.href = url;
        a.download = "ket_qua_thi.pdf";
        a.style.display = "none";
        document.body.appendChild(a);
        // Kích hoạt liên kết và xóa nó sau khi tải xuống
        a.click();
        setTimeout(function () {
          document.body.removeChild(a);
          URL.revokeObjectURL(url);
        }, 100);
      },
    });
  });
  $("#export_excel").click(function () {
    $.ajax({
      method: "post",
      url: "./test/exportExcel",
      dataType: "json",
      success: function (response) {
        var $a = $("<a>");
        $a.attr("href", response.file);
        $("body").append($a);
        $a.attr("download", "file.xls");
        $a[0].click();
        $a.remove();
      },
    });
  });
});

$(".filtered-by-static").click(function (e) {
  e.preventDefault();
  $(".filtered-by-static.active").removeClass("active");
  $(this).addClass("active");
  $(".chart-container").html('<canvas id="myChart"></canvas>');
  getStatictical();
});

function getStatictical() {
  $.ajax({
    type: "post",
    url: "./test/getStatictical",
    data: {
      made: made,
      manhom: $(".filtered-by-static.active").data("id"),
    },
    dataType: "json",
    success: function (response) {
      console.log(response);
      $("#da_nop").text(response.da_nop_bai);
      $("#chua_nop").text(response.chua_nop_bai);
      $("#khong_thi").text(response.khong_thi);
      $("#diem_trung_binh").text(response.diem_trung_binh);
      $("#diem_duoi_1").text(response.thong_ke_diem[0]);
      $("#diem_duoi_5").text(
        response.thong_ke_diem[0] +
          response.thong_ke_diem[1] +
          response.thong_ke_diem[2] +
          response.thong_ke_diem[3] +
          response.thong_ke_diem[4]
      );
      $("#diem_lon_5").text(
        response.thong_ke_diem[5] +
          response.thong_ke_diem[6] +
          response.thong_ke_diem[7] +
          response.thong_ke_diem[8] +
          response.thong_ke_diem[9]
      );
      $("#diem_cao_nhat").text(response.diem_cao_nhat);
      showChart(response.thong_ke_diem);
    },
  });
}

getStatictical();

function showChart(data) {
  // Thiết lập các nhãn cho biểu đồ
  const labels = [
    "<= 1",
    "<= 2",
    "<= 3",
    "<= 4",
    "<= 5",
    "<= 6",
    "<= 7",
    "<= 8",
    "<= 9",
    "<= 10",
  ];

  // Thiết lập các tùy chọn cho biểu đồ
  const options = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        position: "bottom",
      },
      title: {
        display: true,
        text: "Thống kê điểm thi",
        font: {
          size: 20,
          weight: "normal",
          family: "Inter",
        },
      },
    },
  };
  // Vẽ biểu đồ dạng pie
  const ctx = document.getElementById("myChart").getContext("2d");
  const chart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [
        {
          label: "Số lượng sinh viên",
          data: data,
          backgroundColor: "rgba(6, 101, 208, 1)",
          borderColor: "rgba(6, 101, 208, 1)",
          borderWidth: 1,
        },
      ],
    },
    options: options,
  });
}

(function () {
  // Pagination
  defaultPaginationOptions.controller = "test";
  defaultPaginationOptions.model = "KetQuaModel";
  defaultPaginationOptions.made = made;
  defaultPaginationOptions.manhom = currentGroupID;
  getPagination(currentPaginationOptions, valuePage.curPage);
})();
