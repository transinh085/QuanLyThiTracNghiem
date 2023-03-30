let questions = [];
function getQuestion() {
    return $.ajax({
        type: "post",
        url: "./test/getQuestion",
        data: {
            made: $("#dethicontent").data("id"),
        },
        dataType: "json",
        success: function (response) {
            questions = response;
        },
    });
}

function showListQuestion(questions) {
    let html = ``;
    questions.forEach((question, index) => {
        html += `<div class="question rounded border mb-3 bg-white" id="c${index + 1
            }">
        <div class="question-top p-3">
            <p class="question-content fw-bold mb-3">${index + 1}. ${question.noidung
            }</p>
            <div class="row">`;
        question.cautraloi.forEach((ctl, i) => {
            html += `<div class="col-6 mb-1">
                <p class="mb-1"><b>${String.fromCharCode(i + 65)}.</b> ${ctl.noidungtl
                }</p>
            </div>`;
        });
        html += `</div></div><div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center"><p class="mb-0 text-white me-4">Đáp án của bạn:</p><div>`;
        question.cautraloi.forEach((ctl, i) => {
            html += `<input type="radio" class="btn-check" name="options-c${index + 1
                }" id="${ctl.macautl}" autocomplete="off" data-index="${index + 1}">
                    <label class="btn btn-light rounded-pill me-2 btn-answer" for="${ctl.macautl
                }">${String.fromCharCode(i + 65)}</label>`;
        });
        html += `</div></div></div>`;
    });
    $("#list-question").html(html);
}

function showBtnSideBar(questions) {
    let html = ``;
    questions.forEach((q, i) => {
        html += `<li class="answer-item p-1"><a href="javascript:void(0)" class="answer-item-link btn btn-outline-primary w-100 btn-sm" data-index="${i + 1
            }">${i + 1}</a></li>`;
    });
    $(".answer").html(html);
}

$.when(getQuestion()).done(function () {
    console.log(questions);
    showListQuestion(questions);
    showBtnSideBar(questions);
});

$(document).on("click", ".btn-check", function () {
    let ques = $(this).data("index");
    $(`[data-index='${ques}']`).addClass("active");
});

$(document).on("click", ".answer-item-link", function () {
    let ques = $(this).data("index");
    document.getElementById(`c${ques}`).scrollIntoView();
});

$("#btn-nop-bai").click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: "<p class='fs-3 mb-0'>Bạn có chắc chắn muốn nộp bài ?</p>",
        html: "<p class='text-muted fs-6 text-start mb-0'>Khi xác nhận nộp bài, bạn sẽ không thể sửa lại bài thi của mình. Chúc bạn may mắn!</p>",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Vâng, chắc chắn!",
        cancelButtonText: "Huỷ",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Nộp bài thành công!", "Bài làm của bạn đã được nộp thành công.", "success");
        }
    });
});


$("#btn-thoat").click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Bạn có chắc chắn muốn thoát ?",
        html: "<p class='text-muted fs-6 text-start mb-0'>Khi xác nhận thoát, bạn sẽ không được tiếp tục làm bài ở lần thi này. Kết quả bài làm vẫn sẽ được nộp</p>",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Vâng, chắc chắn!",
        cancelButtonText: "Huỷ",
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = "./dashboard"
        }
    });
});