Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker']);
const accountId = $(".account_ID").attr("data-id");
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

        Dashmix.helpers("jq-validation"), jQuery(".form-update-profile").validate({
            rules: {
                "dm-profile-edit-name": {
                    required: !0,
                },
                "dm-profile-edit-email": {
                    required: !0,
                    emailWithDot: !0
                },
            },
            messages: {
                "dm-profile-edit-name": {
                    required: "Cannot be left blank"
                },
                "dm-profile-edit-email": {
                    required: "Cannot be left blank",
                    emailWithDot: "Please enter correct email format"
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

    var oldName = $("#dm-profile-edit-name").val();
    let email = $("#dm-profile-edit-email").val();
    let oldBirthDay = $("#user_ngaysinh").val();
    let oldGender = $('input[name="user_gender"]:checked').val();
    let resultElement = $(".up-avatar");
    console.log(resultElement)
    let avatarProfile = $(".avatar-Profile");
    let avatarAccount = $(".avatar-Account");

    $("#dm-profile-edit-avatar").change(function (e) { 
        const files = e.target.files
        const file = files[0]

        const fileReader = new FileReader()
        const dk = fileReader.readAsDataURL(file)

        fileReader.onload = function() {
            const url = fileReader.result
            resultElement.html(
                `<img class="img-avatar" src="${url}" alt="${file.name}">`,
                )
            avatarProfile.html(
            `<img class="img-avatar img-avatar128 img-avatar-thumb" src="${url}" alt="${file.name}">`,
            )
            avatarAccount.html(
                `<img class="img-avatar img-avatar48 img-avatar-thumb" src="${url}"
                alt="${file.name}">`,
            )    
        }
    });

$("#update-profile").click(function (e) {
    e.preventDefault();
    let newName = $("#dm-profile-edit-name").val();
    console.log(newName)
    let newBirthDay = $("#user_ngaysinh").val();
    let newGender = $('input[name="user_gender"]:checked').val(); 
    let newAvatar = $('input[name="file-img"]').val();
    let check = (newName != oldName && newName != '') || newGender != oldGender || newBirthDay != oldBirthDay || newAvatar != '';


    if (check) {
    showProfile(newName, newAvatar);
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
                console.log(response)
                Dashmix.helpers('jq-notify', { type: 'success', icon: 'fa fa-check me-1', message: `${response.message}` });
            }
        })
    } else {
        Dashmix.helpers('jq-notify', { type: 'danger', icon: 'fa fa-times me-1', message: `Phải thay đổi ít nhất 1 thông tin` });
    }

    saveFileAvatar();
    
})

function saveFileAvatar() {
    $(document).ready(function() {
                const form_data = new FormData();
                const file_data = $('#dm-profile-edit-avatar')[0].files;
                console.log(file_data)
                const dk = form_data.append('file-img', file_data[0]);
                $.ajax({
                    type: "post",
                    url: "./account/uploadFile",
                    data: 
                        form_data,
                    contentType: false,
                    processData:false,
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                    }
                })
    })
}

function showProfile(newName) {
    let html1 = "";
    let html2 = "";


    
        html1 += `
        <div class="ms-3 flex-grow-1 text-center text-md-start my-3 my-md-0 load-nameProfile">
            <h1 class="fs-4 fw-bold mb-1">${newName}</h1>
            <h2 class="fs-sm fw-medium text-muted mb-0">
                Chỉnh sửa hồ sơ
            </h2>
        </div>
        `;

        html2 += `
            <div class="pt-2 load-nameAccount">
                <a class="fw-semibold">
                ${newName}                          
                </a>
            </div>
        `;

    $(".load-nameProfile").html(html1);
    $(".load-nameAccount").html(html2);

}

