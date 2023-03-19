Dashmix.onLoad((()=>class{static initValidation(){Dashmix.helpers("jq-validation"),jQuery(".js-validation-signin").validate({rules:{"login-username":{required:!0,minlength:3},"login-password":{required:!0,minlength:5}},messages:{"login-username":{required:"Please enter a username",minlength:"Your username must consist of at least 3 characters"},"login-password":{required:"Please provide a password",minlength:"Your password must be at least 5 characters long"}}})}static init(){this.initValidation()}}.init()));


$(".js-validation-signin").submit(function(e){
    e.preventDefault();
    if($(".js-validation-signin").valid()){
        $.ajax({
            type: "POST",
            url: "./auth/checkLogin",
            data: {
                email: $("#login-username").val(),
                password: $("#login-password").val(),
            },
            dataType: "json",
            success: function (response) {
                if(response.valid == 'true') {
                    location.href = "./dashboard";
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `${response.message}` });
                }
            }
        });
    }
})