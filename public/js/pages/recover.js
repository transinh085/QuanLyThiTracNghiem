Dashmix.onLoad(() =>
  class {
    static initValidation() {
      Dashmix.helpers("jq-validation"),
        jQuery(".js-validation-reminder").validate({
          rules: { "reminder-credential": { required: !0, emailWithDot: !0 } },
          messages: {
            "reminder-credential": {
              required: "Vui lòng nhập địa chỉ email !",
              emailWithDot: "Địa chỉ email phải đúng định dạng!",
            },
          },
        });
      jQuery("#formOpt").validate({
        rules: {
          txtOpt: {
            required: true,
            digits: true,
            minlength: 6,
            maxlength: 6,
          },
        },
        messages: {
          txtOpt: {
            required: "Vui lòng nhập mã OPT!",
            digits: "Mã OTP chỉ bao gồm chữ số!",
            minlength: "Mã OTP phải có ít nhất 6 chữ số!",
            maxlength: "Mã OTP chỉ được phép có tối đa 6 chữ số!",
          },
        },
      });
      jQuery("#changepass").validate({
        rules: {
          passwordNew: {
            required: true,
            minlength: 6
          },
          comfirm: {
            required: true,
            equalTo: "#passwordNew"
          }
        },
        messages: {
          passwordNew: {
            required: "Vui lòng không để trống",
            minlength: "Mật khẩu ít nhất 6 ký tự"
          },
          comfirm: {
            required: "Vui lòng không để trống",
            equalTo: "Mật khẩu không trùng khớp"
          }
        }
    }
    )}
    static init() {
      this.initValidation();
    }
  }.init()
);

$("#btnRecover").click(function (e) {
  e.preventDefault();
  if ($(".js-validation-reminder").valid()) {
    let mail = $("#reminder-credential").val();
    $.ajax({
      type: "post",
      url: "./auth/checkEmail",
      data: {
        email: mail,
      },
      success: function (response) {
        let data = JSON.parse(response);
        console.log(data)
        if (response == "null") {
          Dashmix.helpers("jq-notify", {
            type: "danger",
            icon: "fa fa-times me-1",
            message: `Tài khoản không tồn tại!`,
          });
        } else {
                if (data["otp"] == null) 
                 {
                    $.ajax({
                  type: "post",
                  url: "./auth/sendOptAuth",
                  data: {
                    email: mail,
                  },
                  success: function (response) {
                       console.log(response)
                        location.href = `./auth/otp`;
                  },
                });
              } else {
                location.href = `./auth/otp`;
            }
        } 
      },
    });
  }
});

$("#opt").click(function (e) {
  e.preventDefault();
  if($("#formOpt").valid()){
    let opt = $("#txtOpt").val();
    $.ajax({
        type: "post",
        url: "./auth/checkOpt",
        data: {
            opt: opt
        },
        success: function (response) {
            let data = response;
            console.log(response)
            if(data==0){
                Dashmix.helpers("jq-notify", {
                    type: "danger",
                    icon: "fa fa-times me-1",
                    message: `Mã OPT không đúng`,
                });
            } else {
                location.href = `./auth/changepass`;
            }
        }
    });
  }
});

$("#btnChange").click(function(e){
    e.preventDefault()
    if($("#changepass").valid()){
        let passwordNew = $("#passwordNew").val()
        $.ajax({
            type: "post",
            url: "./auth/changePassword",
            data: {
                password: passwordNew
            },
            success: function (response) {
                if(response==1){
                    Dashmix.helpers("jq-notify", {
                        type: "success",
                        icon: "fa fa-times me-1",
                        message: `Thay đổi mật khẩu thành công!`,
                      });
                    setTimeout(function(){
                        location.href = `./auth/signin`;
                    },3000)
                }
            }
        });
    }
})

