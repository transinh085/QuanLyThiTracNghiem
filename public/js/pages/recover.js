/*!
 * dashmix - v5.5.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2022
 */
Dashmix.onLoad((()=>class{static initValidation(){Dashmix.helpers("jq-validation"),jQuery(".js-validation-reminder").validate({rules:{"reminder-credential":{required:!0,minlength:3}},messages:{"reminder-credential":{required:"Please enter a valid credential"}}})}static init(){this.initValidation()}}.init()));