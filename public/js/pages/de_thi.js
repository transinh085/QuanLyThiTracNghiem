$(document).ready(function () {
    let questions = [];
    const made = $("#dethicontent").data("id");
    const tende = "dethi" + made;
    const cautraloi = "cautraloi" + made;
    const solanchuyentab = "solanchuyentab" + made;
    console.log(tende,cautraloi,solanchuyentab);
    function getQuestion() {
        return $.ajax({
            type: "post",
            url: "./test/getQuestion",
            data: {
                made: made,
            },
            dataType: "json",
            success: function (response) {
                console.log("dethi")
                console.log(response)
                questions = response;
            },
        });
    }

    function showListQuestion(questions, answers) {
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
                let check = answers[index].cautraloi == ctl.macautl ? "checked" : "";
                html += `<input type="radio" class="btn-check" name="options-c${index + 1
                    }" id="ctl-${ctl.macautl}" autocomplete="off" data-index="${index + 1
                    }" data-macautl="${ctl.macautl}" ${check}>
                    <label class="btn btn-light rounded-pill me-2 btn-answer" for="ctl-${ctl.macautl
                    }">${String.fromCharCode(i + 65)}</label>`;
            });
            html += `</div></div></div>`;
        });
        $("#list-question").html(html);
    }

    function showBtnSideBar(questions, answers) {
        let html = ``;
        questions.forEach((q, i) => {
            let isActive = answers[i].cautraloi == 0 ? "" : " active";
            html += `<li class="answer-item p-1"><a href="javascript:void(0)" class="answer-item-link btn btn-outline-primary w-100 btn-sm${isActive}" data-index="${i + 1
                }">${i + 1}</a></li>`;
        });
        $(".answer").html(html);
    }

    function initListAnswer(questions) {
        let listAns = questions.map((item) => {
            let itemAns = {};
            itemAns.macauhoi = item.macauhoi;
            itemAns.cautraloi = 0;
            return itemAns;
        });
        return listAns;
    }

    function changeAnswer(index, dapan) {
        let listAns = JSON.parse(localStorage.getItem("cautraloi"));
        listAns[index].cautraloi = dapan;
        localStorage.setItem("cautraloi", JSON.stringify(listAns));
    }

    $.when(getQuestion()).done(function () {
        if (localStorage.getItem("dethi") == null) {
            localStorage.setItem("dethi", JSON.stringify(questions));
        }
        if (localStorage.getItem("cautraloi") == null) {
            localStorage.setItem(
                "cautraloi",
                JSON.stringify(initListAnswer(questions))
            );
        }
        if (localStorage.getItem("solanchuyentab") == null) {
            localStorage.setItem("solanchuyentab", 0);
        }

        let listQues = JSON.parse(localStorage.getItem("dethi"));
        let listAns = JSON.parse(localStorage.getItem("cautraloi"));
        showListQuestion(listQues, listAns);
        showBtnSideBar(listQues, listAns);
    });

    $(document).on("click", ".btn-check", function () {
        let ques = $(this).data("index");
        $(`[data-index='${ques}']`).addClass("active");
        changeAnswer(ques - 1, $(this).data("macautl"));
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
                nopbai();
            }
        });
    });

    function nopbai() {
        let dethi = $("#dethicontent").data("id");
        let thoigian = new Date()
        $.ajax({
            type: "post",
            url: "./test/submit",
            data: {
                listCauTraLoi: JSON.parse(localStorage.getItem("cautraloi")),
                thoigianlambai: thoigian,
                solanchuyentad: localStorage.getItem("solanchuyentab"),
                made: dethi,
            },
            success: function (response) {
                if (response) {
                    localStorage.removeItem("cautraloi");
                    localStorage.removeItem("dethi");
                    localStorage.removeItem("solanchuyentab");
                    location.href = `./test/start/${made}`
                }
            },
        });
    }

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
                location.href = "./dashboard";
            }
        });
    });

    var endTime = -1;
    getTimeTest();

    function getTimeTest() {
        let dethi = $("#dethicontent").data("id");
        $.ajax({
            type: "post",
            url: "./test/getTimeTest",
            data: {
                dethi: dethi,
            },
            success: function (response) {
                endTime = new Date(response).getTime();
                countDown();
            },
        });
    }

    function countDown() {
        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = endTime - now;
            var hours = Math.floor(
                (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            if (hours < 10) hours = "0" + hours;
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            if (minutes < 10) minutes = "0" + minutes;
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (seconds < 10) seconds = "0" + seconds;
            $("#timer").html(hours + ":" + minutes + ":" + seconds);
            if (distance <= 0) {
                clearInterval(x);
                nopbai();
            }
        }, 1000);
    }

    $(window).on("beforeunload", function () {
        countDown();
    });
});

$(window).blur(function () {
    if(localStorage.getItem("solanchuyentab")!==null){
        let sl = localStorage.getItem("solanchuyentab");
        sl++
        localStorage.setItem("solanchuyentab", sl)
    }
});


