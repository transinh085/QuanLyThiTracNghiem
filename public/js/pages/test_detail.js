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
            <a class="btn btn-sm btn-alt-secondary show-exam-detail" href="javascript:void(0)" data-bs-toggle="tooltip" aria-label="View"data-bs-original-title="View" data-id="${Element["makq"]}">
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
        console.log(response)
        showData(response);
      },
    });
  }
  var made = $("#chitietdethi").data("id");
    showTookTheExam(made);

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
  showExamineeByGroup(made, currentGroupID);

  // Hiển thị đề kiểm tra đáp án + câu trả lời của thí sinh đó
  function showTestDetail(test) {
    let html = "";
    test.forEach((question, index) => {
      let htmlResult = "";
      const dapandungIndex = question.cautraloi.findIndex(el => el.ladapan == 1);
      let dapanchon = question.cautraloi[0].dapanchon;
      let dapanchonIndex = null;
      if (dapanchon) {
        dapanchonIndex = question.cautraloi.findIndex(el => dapanchon == el.macautl);
      }
      const chonDung = dapanchonIndex === dapandungIndex;

      // if (dapanchonIndex == null) {
      //   question.cautraloi.forEach((ctl,i) => {
      //     htmlResult += `
      //     <input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" disabled="">
      //     <label class="btn btn-light rounded-pill me-2 btn-answer-question ${ctl.ladapan === '1' ? "btn-answer-false" : ""}" for="options-c${index}">${String.fromCharCode(i + 65)}</label>
      //     `;
      //   })
      // } else {
      //   if (chonDung) {
      //     question.cautraloi.forEach((ctl,i) => {
      //       htmlResult += `
      //       <input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" disabled="">
      //       <label class="btn btn-light rounded-pill me-2 btn-answer-question ${ctl.ladapan === '1' ? "btn-answer-true" : ""}" for="options-c${index}">${String.fromCharCode(i + 65)}</label>
      //       `;
      //     });
      //   } else {
      //     question.cautraloi.forEach((ctl,i) => {
      //       htmlResult += `
      //       <input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" disabled="">
      //       <label class="btn btn-light rounded-pill me-2 btn-answer-question ${i === dapanchonIndex ? "btn-answer-chose" : ""}${i === dapandungIndex ? "btn-answer-false" : ""}" for="options-c${index}">${String.fromCharCode(i + 65)}</label>
      //       `;
      //     });
      //   }
      // }

      if (chonDung) {
        question.cautraloi.forEach((ctl,i) => {
          htmlResult += `
          <input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" disabled="">
          <label class="btn btn-light rounded-pill me-2 btn-answer-question ${ctl.ladapan === '1' ? "btn-answer-true" : ""}" for="options-c${index}">${String.fromCharCode(i + 65)}</label>
          `;
        });
        htmlResult += `<span class="h2 mb-0 ms-1"><i class="fa fa-check" style="color:#76BB68;"></i></span>`;
      } else {
        let resultChar = "";
        if (dapanchonIndex == null) {
          question.cautraloi.forEach((ctl,i) => {
            if (i === dapandungIndex) resultChar = String.fromCharCode(i + 65);
            htmlResult += `
            <input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" disabled="">
            <label class="btn btn-light rounded-pill me-2 btn-answer-question" for="options-c${index}">${String.fromCharCode(i + 65)}</label>
            `;
          })
        } else {
          question.cautraloi.forEach((ctl,i) => {
            if (i === dapandungIndex) resultChar = String.fromCharCode(i + 65);
            htmlResult += `
            <input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" disabled="">
            <label class="btn btn-light rounded-pill me-2 btn-answer-question ${i === dapanchonIndex ? "btn-answer-false" : ""}" for="options-c${index}">${String.fromCharCode(i + 65)}</label>
            `;
          });
        }
        htmlResult += `<span class="h2 mb-0 ms-1"><i class="fa fa-xmark" style="color:#FF5A5F;"></i></span><span class="mx-2 text-white">Đáp án đúng: ${resultChar}</span>`;
      }

      html += `<div class="question rounded border mb-3" data-id="${question.macauhoi}" id="c${index + 1}">
                <div class="question-top p-3">
                  <p class="question-content fw-bold mb-3">${index + 1}.${question.noidung} </p>
                  <div class="row">`;
                  question.cautraloi.forEach((ctl,i) => {
                    html += `
                    <div class="col-6 mb-1">
                      <p class="mb-1"><b>${String.fromCharCode(i + 65)}.</b> ${ctl.noidungtl}</p>
                    </div>`;
                  });
                  html += `
                        </div>
                      </div>`;
                      html += `
                      <div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center show-answer-test ">
                        <p class="mb-0 text-white me-4">Đáp án của bạn:</p>
                        `;
                      html += htmlResult;
                      // question.cautraloi.forEach((ctl,i) => {
                      //   html += `
                      //   <input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" disabled="">
                      //   <label class="btn btn-light rounded-pill me-2 btn-answer-question ${ctl.ladapan === '1' ? `btn-answer-true` : ``}" for="option-c0_0">${String.fromCharCode(i + 65)}</label>
                      //   `;
                      // })  
                      
                        // <input type="radio" class="btn-check" name="options-c0" id="option-c0_0" autocomplete="off" disabled="">
                        // <label class="btn btn-light rounded-pill me-2 btn-answer-false btn-answer-question" for="option-c0_0">A</label>
                        // <input type="radio" class="btn-check" name="options-c0" id="option-c0_1" autocomplete="off" disabled="">
                        // <label class="btn btn-light rounded-pill me-2 btn-answer btn-answer-question" for="option-c0_1">B</label>
                        // <input type="radio" class="btn-check" name="options-c0" id="option-c0_2" autocomplete="off" disabled="">
                        // <label class="btn btn-light rounded-pill me-2 btn-answer-true btn-answer-question" for="option-c0_2">C</label>
                        // <input type="radio" class="btn-check" name="options-c0" id="option-c0_3" autocomplete="off" disabled="">
                        // <label class="btn btn-light rounded-pill me-2 btn-answer btn-answer-question" for="option-c0_3">D</label>
                      html += `
                      </div>
                      `;  
                  html += `</div>`;
    });
    $("#content-file").html(html);
  }

  $(document).on("click", ".show-exam-detail", function() {
    $("#modal-show-test").modal("show");
    let makq = $(this).data("id");
    
    console.log(makq)

    $.ajax({
      type: "post",
      url: "./test/getQuestion1",
      data: {
        makq: makq,
        made: made,
      },
      dataType: "json",
      success: function(response) {
        console.log(response)
        showTestDetail(response)
      }
    })

  
  })

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
