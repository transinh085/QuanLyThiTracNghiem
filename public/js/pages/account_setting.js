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
            url: "./",
            data: {
                matkhaucu: currentPass,
                matkhaumoi: newPass
            },
            success: function (response) {
                
            }
        });
    }
});