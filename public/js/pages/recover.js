Dashmix.onLoad((()=>class{static initValidation(){
    Dashmix.helpers("jq-validation"),
    jQuery(".js-validation-reminder").validate({
        rules:{"reminder-credential":{required:!0,emailWithDot: !0}},
        messages:{"reminder-credential":{required:"Vui lòng nhập địa chỉ email !",emailWithDot:"Địa chỉ email phải đúng định dạng!"}}
    })}
    static init(){this.initValidation()}
}.init()));

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
                Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `Tài khoản không tồn tại!` });
            } else {
                location.href = `./auth/otp`;
            }
        }
    });
})