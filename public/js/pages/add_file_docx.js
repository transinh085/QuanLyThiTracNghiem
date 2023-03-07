Dashmix.helpersOnLoad(["jq-select2", "js-ckeditor"]);

let questions = [];

$("#form-upload").submit(function (e) { 
    e.preventDefault();
    var file = $("#file-cau-hoi")[0].files[0];
    var formData = new FormData();
    formData.append("fileToUpload", file);
    $.ajax({
        type: "post",
        url: "./question/xulyDocx",
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function() {
            Dashmix.layout('header_loader_on');    
        },
        success: function (response) {
            console.log(response);
            questions = response;
            loadDataQuestion(response);
        },
        complete: function() {
            Dashmix.layout('header_loader_off');
        },
    });
});

function loadDataQuestion(questions) {
    let data = ``;
    questions.forEach((item,index) => {
        data += `<div class="question rounded border mb-3">
        <div class="question-top p-3">
            <p class="question-content fw-bold mb-3">${index + 1}. ${item.question} </p>
            <div class="row">`;
        item.option.forEach((op,i) => {
            data += `<div class="col-6 mb-1">
            <p class="mb-1"><b>${String.fromCharCode(i + 65)}.</b> ${op}</p></div>`;
        });
        data += `</div></div>`;
        data += `<div class="test-ans bg-primary rounded-bottom py-2 px-3 d-flex align-items-center"><p class="mb-0 text-white me-4">Đáp án của bạn:</p>`
        item.option.forEach((op,i) => {
            data += `<input type="radio" class="btn-check" name="options-c${index}" id="option-c${index}_${i}" autocomplete="off" ${(i + 1) == item.answer ? `checked` : ``}>
            <label class="btn btn-light rounded-pill me-2 btn-answer" for="option-c${index}_${i}">${String.fromCharCode(i + 65)}</label>`;
        });
        data += `</div></div>`
    });
    $("#content-file").html(data);
}