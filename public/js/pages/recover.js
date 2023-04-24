Dashmix.onLoad((()=>class{static initValidation(){Dashmix.helpers("jq-validation"),jQuery(".js-validation-reminder").validate({rules:{"reminder-credential":{required:!0,minlength:3}},messages:{"reminder-credential":{required:"Please enter a valid credential"}}})}static init(){this.initValidation()}}.init()));

$(document).submit(function (e) { 
    e.preventDefault();
    let mail = $("#reminder-credential").val();
    $.ajax({
        type: "post",
        url: "./auth/checkEmail",
        data: {
            email: mail
        },
        success: function (response) {
            console.log(response)
            if(response == '1'){
                alert("tai khoan kko ton tai")
            } else {
                alert("tai khoan ton tai")
            }
        }
    });
})