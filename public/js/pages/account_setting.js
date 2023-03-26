Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker']);
Dashmix.onLoad((() => class {
    static initValidation() {
        Dashmix.helpers("jq-validation"), jQuery(".form-change-password").validate({
            rules: {
                "current-password": {
                    required: !0,
                    minlength: 5
                },
                "new-password": {
                    required: !0,
                    minlength: 5
                },
                "password-new-confirm": {
                    required: !0,
                    equalTo: "#new-password"
                },
            },
            messages: {
                "current-password": {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                "new-password": {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                "password-new-confirm": {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
            }
        })
    }
    static init() {
        this.initValidation()
    }
}.init()));

$("#update-password").click(function (e) { 
    e.preventDefault();
    if($(".form-change-password").valid()) {
        let currentPass = $("#current-password").val();
        let newPass = $("#new-password").val();
        $.ajax({
            type: "post",
            url: "./account/changePassword",
            data: {
                matkhaucu: currentPass,
                matkhaumoi: newPass
            },
            dataType: "json",
            success: function (response) {
                if(response.valid) {
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: `${response.message}` });
                    $("#current-password").val("");
                    $("#new-password").val("");
                    $("#password-new-confirm").val("");
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `${response.message}` });
                }
            }
        });
    }
});

$("#update-profile").click(function (e) {
    e.preventDefault();
    if ($(".form-update-profile").valid()) {
    let fullName = $("#dm-profile-edit-name").val();
    console.log(fullName);
        $.ajax({
            type: "post",
            url: "./account/changeProfile",
            data: { 
                hoten: $("#dm-profile-edit-name").val(),
                email: $("#dm-profile-edit-email").val(),
                ngaysinh: $("#user_ngaysinh").val(),
                gioitinh: $('input[name="user_gender"]:checked').val(),
            },
            dataType: "json",
            success: function(response) {
                // console.log(response.valid );
                if (response.valid) {
                    Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: `${response.message}` });
                } else {
                    Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `${response.message}` })
                }
            }
        })
    }
})