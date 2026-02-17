$(document).ready(function() {
    $('#loginForm input.form-control').each(function() {
        if ($(this).val() !== '') {
            $(this).closest('.form-group').addClass('focused');
        }
    });

    $.validator.addMethod("filetype", function(value, element, param) {
        let fileType = value.split('.').pop().toLowerCase();
        return this.optional(element) || $.inArray(fileType, param) !== -1;
    }, "Invalid file type.");

    // Custom validation method for file size
    $.validator.addMethod("filesize", function(value, element, param) {
        if (element.files.length > 0) {
            let fileSize = element.files[0].size;
            return fileSize <= param;
        }
        return true;
    }, "File size must be less than {0} bytes.");




    $('.editPasswordFiled').on('input change', function() {
        $('.password_error_msg').hide();
    });

    $('.resetPasswordField').on('input change', function() {
        $('.resetPasswordFieldError').hide();
    });
    $('.loginPassword').on('input change', function() {
        $('.loginPassword-error').hide();
    });

    $('.resetCaptchaField').on('input change', function() {
        $('.resetCaptchaFieldError').hide();
    });

    $('#ticket_product_select').on('change', function() {
        $('#ticket_product_select-error').hide();
    });

    $('#ticket_issue_select').on('change', function() {
        $('#ticket_issue_select-error').hide();
    });

    //Add new User Validation
    $('#userAddForm').validate({
        rules: {
            role_id: {
                required: true
            },
            name: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            email: {
                required: true,
                email: true
            },
            username: {
                required: true,
                minlength: 8,
                maxlength: 32
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 16,
                strongPassword: true // Custom rule for strong password
            },
            password_confirmation: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            role_id: {
                required: "Please select a role."
            },
            name: {
                required: "Please enter a Name.",
                minlength: "Name must be at least 3 characters.",
                maxlength: "Name may not exceed 100 characters."
            },
            email: {
                required: "Please enter an Email address.",
                email: "Please enter a valid Email address."
            },
            username: {
                required: "Please enter a Username.",
                minlength: "Username must be at least 8 characters.",
                maxlength: "Username may not exceed 32 characters."
            },
            password: {
                required: "Please enter a password.",
                minlength: "Password must be at least 8 characters.",
                maxlength: "Password may not exceed 16 characters.",
                strongPassword: "Password must contain at least one lowercase letter, one uppercase letter, and one special character."
            },
            password_confirmation: {
                required: "Please confirm your Password.",
                equalTo: "Passwords do not match."
            }
        },
        // Password strength indication
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.input-group-flat'));
        }
    });

    //Edit User Validation
    $('#userEditForm').validate({
        rules: {
            role_id: {
                required: true
            },
            name: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            email: {
                required: true,
                email: true
            },
            username: {
                required: true,
                minlength: 8,
                maxlength: 32
            },
            password: {
                required: false, // Password is not required in edit form
                minlength: 8,
                maxlength: 16,
                strongPassword: true // Custom rule for strong password
            },
            password_confirmation: {
                required: false, // Password confirmation is not required in edit form
                equalTo: '#password'
            }
        },
        messages: {
            role_id: {
                required: "Please select a role."
            },
            name: {
                required: "Please enter a Name.",
                minlength: "Name must be at least 3 characters.",
                maxlength: "Name may not exceed 100 characters."
            },
            email: {
                required: "Please enter an Email address.",
                email: "Please enter a valid Email address."
            },
            username: {
                required: "Please enter a Username.",
                minlength: "Username must be at least 8 characters.",
                maxlength: "Username may not exceed 32 characters."
            },
            password: {
                required: "Please enter a password.",
                minlength: "Password must be at least 8 characters.",
                maxlength: "Password may not exceed 16 characters.",
                strongPassword: "Password must contain at least one lowercase letter, one uppercase letter, and one special character."
            },
            password_confirmation: {
                required: "Please confirm your Password.",
                equalTo: "Passwords do not match."
            }
        },
        // Password strength indication
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.input-group-flat'));
        }
    });

    // Custom rule for strong password
    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/.test(value);
    }, 'Password must contain at least one lowercase letter, one uppercase letter, and one special character.');
    // Custom rule for strong password
    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/.test(value);
    }, 'Password must contain at least one lowercase letter, one uppercase letter, and one special character.');


    var formsTicket = '#addTicketMain, .productAddTicket';

    $(formsTicket).validate({
        rules: {
            product_id: {
                required: true
            },
            issue_id: {
                required: true
            },
            description: {
                required: true,
                minlength: 10,
                maxlength: 1000
            },
            additional_information: {
                required: false,
                minlength: 10,
                maxlength: 150
            },
            attachment: {
                required: false,
                filetype: ['pdf', 'xlsx', 'xls', 'csv', 'jpeg', 'jpg', 'png', 'doc', 'docx', 'txt'], // Add file types here
                filesize: 10485760 // 2 MB in bytes
            },
        },
        messages: {
            product_id: {
                required: "Please select Product."
            },
            issue_id: {
                required: "Please select Issue Type."
            },
            description: {
                required: "Please enter a Description.",
                minlength: "Description must be at least 10 characters.",
                maxlength: "Description may not exceed 1000 characters."
            },
            additional_information: {
                minlength: "Additional information must be at least 10 characters.",
                maxlength: "Additional information may not exceed 150 characters."
            },
            attachment: {
                filetype: "Please upload a valid file type (PDF, Excel, CSV, Image, Word, or Text file).",
                filesize: "File size must be less than 2 MB."
            }
        },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.form-group'));
            if (element.attr("type") == "file" || element.attr("name") == "issue_id") {
                error.insertAfter($(element).closest('.form-group'));
            } else {
                error.insertAfter($(element).closest('.input-group-flat'))
            }
        },
        submitHandler: function(form) {
            $('.pageloader').css('display', 'block');
            form.submit();
        }
    });
    $('#productAddForm').validate({
        rules: {
            name:{
                required: true,
                minlength: 3,
                maxlength: 25
            },
            short_name:{
                required: true,
                minlength: 2,
                maxlength: 10
            },
            description:{
                required: true,
                minlength: 10,
                maxlength: 50
            }
        },
        messages: {
            name:{
                required: "Please enter a Name.",
                minlength: "Name must be at least 3 characters.",
                maxlength: "Name may not exceed 25 characters."
            },
            short_name:{
                required: "Please enter a Shortname.",
                minlength: "Name must be at least 2 characters.",
                maxlength: "Name may not exceed 10 characters."
            },
            description: {
                required: "Please enter a Description.",
                minlength: "Description must be at least 10 characters.",
                maxlength: "Description may not exceed 50 characters."
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.input-group-flat'));
        },
        submitHandler: function(form) {
            $('.pageloader').css('display', 'block');
            form.submit();
        }
    });
    $('#issueTypeAddForm').validate({
        rules: {
            name:{
                required: true,
                minlength: 3,
                maxlength: 25
            }
        },
        messages: {
            name:{
                required: "Please enter a Name.",
                minlength: "Name must be at least 3 characters.",
                maxlength: "Name may not exceed 25 characters."
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.input-group-flat'));
        },
        submitHandler: function(form) {
            $('.pageloader').css('display', 'block');
            form.submit();
        }
    });
    $('#addRouteForm').validate({
        rules: {
            name:{
                required: true,
                minlength: 3,
                maxlength: 100
            },
            path:{
                required: true,
                minlength: 3,
                maxlength: 100
            }
        },
        messages: {
            name:{
                required: "Please enter a Name.",
                minlength: "Name must be at least 3 characters.",
                maxlength: "Name may not exceed 100 characters."
            },
            path:{
                required: "Please enter a Path.",
                minlength: "Path must be at least 3 characters.",
                maxlength: "Path may not exceed 100 characters."
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.input-group-flat'));
        },
        submitHandler: function(form) {
            $('.pageloader').css('display', 'block');
            form.submit();
        }
    });
    $('#settingsAddForm').validate({
        rules: {
            key:{
                required: true,
                minlength: 3,
                maxlength: 50
            },
            value:{
                required: true,
                minlength: 1,
                maxlength: 50
            }
        },
        messages: {
            key:{
                required: "Please enter a key.",
                minlength: "key must be at least 3 characters.",
                maxlength: "key may not exceed 100 characters."
            },
            value:{
                required: "Please enter a Value.",
                minlength: "Value must be at least 1 characters.",
                maxlength: "Value may not exceed 100 characters."
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.input-group-flat'));
        },
        submitHandler: function(form) {
            $('.pageloader').css('display', 'block');
            form.submit();
        }
    });

    function customPreValidationLogic() {
        let isValid = true;

        $('.addNewTicketFormSummery .type-select').each(function() {
            var valueField = $(this).find('.valueField');
            var fieldName = $(this).find('label').text().replace('*', '').trim() || "This field";
            var errorMessage = fieldName + " is required.";

            if (valueField.val().trim() === "") {
                $(this).find('.errorMain').text(errorMessage);
                console.log(errorMessage);
                isValid = false;
            } else {
                $(this).find('.errorMain').text("");
            }
        });

        return isValid;
    }

    $('.addNewTicketFormSummery').validate({
        rules: {
            mobile_no: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true,
            },
            description: {
                required: true,
                minlength: 10,
                maxlength: 1000
            },
            issue_summary: {
                required: true,
                minlength: 10,
                maxlength: 500
            },
            attachment: {
                required: false,
                filetype: ['pdf', 'jpeg', 'jpg', 'png'], // Add file types here
                filesize: 10485760 // 10 MB in bytes
            },
        },
        messages: {
            mobile_no: {
                required: "Please enter Mobile Number.",
                minlength: "Mobile Number must be 10 Digits.",
                maxlength: "Mobile Number must be 10 Digits.",
                digits: "Mobile Number must be a number.",
            },
            description: {
                required: "Please enter a Description.",
                minlength: "Description must be at least 10 characters.",
                maxlength: "Description may not exceed 1000 characters."
            },
            issue_summary: {
                required: "Please enter an Issue Summary.",
                minlength: "Issue Summary must be at least 10 characters.",
                maxlength: "Issue Summary may not exceed 500 characters."
            },
            attachment: {
                filetype: "Please upload a valid file type (PDF, Excel, CSV, Image, Word, or Text file).",
                filesize: "File size must be less than 10 MB."
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.appendTo($(element).closest('.form-group').find('.errorMain'));
        },
        submitHandler: function(form) {

            if (!customPreValidationLogic()) {
                console.log("test");
                return false;
            }
            form.submit();

        }
    });

    $('.forgotEmailFormVal').validate({
        rules: {
            email: {
                required: true,
                maxlength: 80
            },
        },
        messages: {
            email: {
                required: "Please enter a Email/Username",
                  maxlength: "Email/Username may not exceed 80 characters."
            }

        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.appendTo($(element).closest('.form-group').find('.errorMains'));
        },
        submitHandler: function(form) {
            $('.pageloader').css('display', 'block');
            form.submit();
        }
    });

    $('#fileAddModel').validate({
        rules: {
            attachment: {
                required: false,
                filetype: ['pdf', 'jpeg', 'jpg', 'png'], // Add file types here
                filesize: 10485760 // 10 MB in bytes
            },
        },
        messages: {
            attachment: {
                filetype: "Allowed Files to upload are PDF, PNG, JPEG, and JPG formats.",
                filesize: "File size must be less than 10 MB."
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.appendTo($(element).closest('.form-group').find('.errorMain'));
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $('.addNewTicketFormSummery').on('submit', function(e) {
        e.preventDefault();
        $('.addTicketFormLoader').css('display', 'block');
        document.getElementById('addNewTicketSubmit').disabled = !false
        if (!customPreValidationLogic()) {
            return false;
        }
    });

    $('.EditTicketFormSummery').validate({
        rules: {
            mobile_no: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true,
            },
            description: {
                required: true,
                minlength: 10,
                maxlength: 1000
            },
            issue_summary: {
                required: true,
                minlength: 10,
                maxlength: 500
            }
        },
        messages: {
            mobile_no: {
                required: "Please enter Mobile Number.",
                minlength: "Mobile Number must be 10 Digits.",
                maxlength: "Mobile Number must be 10 Digits.",
                digits: "Mobile Number must be a number.",
            },
            description: {
                required: "Please enter a Description.",
                minlength: "Description must be at least 10 characters.",
                maxlength: "Description may not exceed 1000 characters."
            },
            issue_summary: {
                required: "Please enter an Issue Summary.",
                minlength: "Issue Summary must be at least 10 characters.",
                maxlength: "Issue Summary may not exceed 500 characters."
            }

        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            error.appendTo($(element).closest('.form-group').find('.errorMain'));
        },
        submitHandler: function(form) {

            if (!customPreValidationLogic()) {
                return false;
            }
            form.submit();

        }
    });

    $('.EditTicketFormSummery').on('submit', function(e) {
        e.preventDefault();
        $('.editTicketFormLoader').css('display', 'block');

        if (!customPreValidationLogic()) {
            return false;
        }
    });



});

