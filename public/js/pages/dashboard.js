Dashmix.helpersOnLoad(['jq-slick']);
$(document).ready(function(){
    $.ajax({
        type: "post",
        url: "./dashboard/checkEmail",
        success: function (response) {
            console.log(response);
            let i = document.getElementById("modal-onboarding");
            new bootstrap.Modal(i).show(), i.addEventListener("shown.bs.modal", (i => {
                document.querySelector("#modal-onboarding .js-slider").classList.remove("js-slider-enabled"), Dashmix.helpers("jq-slick")
            }))            
        }
    });
})

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}

function checkEmailExist(email){
    $.ajax({
        type: "post",
        url: "./dashboard/checkEmailExist",
        data: {
            email: email
        },
        success: function (response) {
            console.log(response);
        }
    });
}

$("#btn-email").click(function(){
    let email = $("#email").val();
    if(validateEmail(email)){
       let check =  checkEmailExist(email);
       if(check == 1){
        Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `Vui lòng điền đúng định dạng email` });
       } else {

       }
    } else {
        Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `Vui lòng điền đúng định dạng email` });
    }
})

