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
    showTookTheExam()
    function showTookTheExam(){
        var made = $('a[data-bs-target="#modal-cau-hoi"]').data('id');
        $.ajax({
            type: "post",
            url: "./test/tookTheExam",
            data: {
                made: made
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                let html = '';
                response.forEach(Element => {
                    html += `<tr>
                    <td class="text-center">${Element['id']}</td>
                    <td class="fs-sm d-flex align-items-center">
                        <img class="img-avatar img-avatar48 me-3"
                            src="./public/media/avatars/${Element['avatar']}" alt="${Element['hoten']}">
                        <div class="d-flex flex-column">
                            <strong class="text-primary">${Element['hoten']}</strong>
                            <span class="fw-normal fs-sm text-muted">${Element['email']}</span>
                        </div>
                    </td>
                    <td class="text-center">${Element['diemthi']}</td>
                    <td class="text-center">${Element['thoigianlambai']}s</td>
                    <td class="text-center">${Element['thoigianvaothi']}</td>
                    <td class="text-center">${Element['solanchuyentab']}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)"
                            data-bs-toggle="tooltip" aria-label="View"
                            data-bs-original-title="View">
                            <i class="fa fa-fw fa-eye"></i>
                        </a>
                    </td>
                </tr>`
                })
                $("#took_the_exam").html(html)
            }
        });
    }

});