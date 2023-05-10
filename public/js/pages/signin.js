Dashmix.onLoad(() =>
  class {
    static initValidation() {
      Dashmix.helpers("jq-validation"),
        jQuery(".js-validation-signin").validate({
          rules: {
            "login-username": {
              required: !0,
              digits: true,
            },
            "login-password": {
              required: !0,
              minlength: 5,
            },
          },
          messages: {
            "login-username": {
              required: "Vui lòng nhập mã người dùng",
              digits: "Mã người dùng phải là số",
            },
            "login-password": {
              required: "Vui lòng nhập mã mật khẩu",
              minlength: "Mật khẩu phải lớn hơn 5 ký tự",
            },
          },
        });
    }
    static init() {
      this.initValidation();
    }
  }.init()
);

$(".js-validation-signin").submit(function (e) {
  e.preventDefault();
  if ($(".js-validation-signin").valid()) {
    $.ajax({
      type: "POST",
      url: "./auth/checkLogin",
      data: {
        masinhvien: $("#login-username").val(),
        password: $("#login-password").val(),
      },
      dataType: "json",
      success: function (response) {
        console.log(response.valid);
        if (response.valid == "true") {
          location.href = "./dashboard";
        } else {
          Dashmix.helpers("jq-notify", {
            type: "danger",
            icon: "fa fa-times me-1",
            message: `${response.message}`,
          });
        }
      },
    });
  }
});
