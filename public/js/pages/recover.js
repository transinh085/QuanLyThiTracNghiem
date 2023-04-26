Dashmix.onLoad((()=>class{static initValidation(){Dashmix.helpers("jq-validation"),jQuery(".js-validation-reminder").validate({rules:{"reminder-credential":{required:!0,minlength:3}},messages:{"reminder-credential":{required:"Please enter a valid credential"}}})}static init(){this.initValidation()}}.init()));

$(document).submit(function (e) { 
    e.preventDefault();
    let mail = $("#reminder-credential").val();
    $.ajax({
        type: "post",
        url: "./auth/sendOptAuth",
        data: {
            email: mail
        },
        success: function (response) {
            console.log(response)
            if(response == '1'){
                Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `Tài khoản của bạn chưa được đăng ký!` });
            } else {
                Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: `Đã gửi mã thành công mã OTP!` });
                codeOTP();
            }
        }
    });
})

function codeOTP() {
    html = "";
    html += `
                <a class="btn btn-otp btn-sm btn-info" href="./auth/otp">
                    Nhập OTP
                </a>
    `;
    $(".add-btn-otp").html(html);
}