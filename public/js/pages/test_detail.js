$(document).ready(function () {
    $("[data-bs-target='#modal-cau-hoi']").click(function (e) { 
        e.preventDefault();
        let made = $(this).data("id");
        $.ajax({
            type: "post",
            url: "./test/getQuestion",
            data: {
                made: made
            },
            dataType: "json",
            success: function (response) {
                showListQuestion(response)
            }
        });
    });

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
            html += `</div></div></div>`;
        });
        $("#list-question").html(html);
    }
});