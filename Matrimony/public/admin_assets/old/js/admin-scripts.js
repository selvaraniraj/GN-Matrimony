// Doctor form
$(document).ready(function () {
    const form = $("#doctor_form");

    // Validate individual field
    function validateField($field, fieldName) {
        const $formGroup = $field.closest(".mb-3, .card-body, .col-sm-12");
        let value;

        if ($field.is(":radio")) {
            value = $(`input[name='${$field.attr("name")}']:checked`).val();
        } else {
            value = $.trim($field.val());
        }

        $formGroup.find(".error-message").remove();

        if (!value) {
            if (!$formGroup.find(".error-message").length) {
                $formGroup.append(`<span class="text-danger  error-message">Please select ${fieldName}</span>`);
            }

            if ($field.is(":radio")) {
                const radios = $(`input[name='${$field.attr("name")}']`);
                radios.removeClass("is-valid is-invalid").addClass("form-check-input");
            } else {
                $field.addClass("is-invalid").removeClass("is-valid");
            }

            return false;
        } else {
            if ($field.is(":radio")) {
                const radios = $(`input[name='${$field.attr("name")}']`);
                radios.removeClass("is-invalid").addClass("form-check-input is-valid");
            } else {
                $field.removeClass("is-invalid").addClass("is-valid");
            }

            $formGroup.find(".error-message").remove();
            return true;
        }
    }

    // Validate gender (radio button group)
    function validateGender() {
        const genderValue = $("input[name='gender']:checked").val();
        const $formGroup = $("input[name='gender']").closest(".mb-3");

        $formGroup.find(".error-message").remove();

        if (!genderValue) {
            if (!$formGroup.find(".error-message").length) {
                $formGroup.append('<span class="text-danger  error-message">Please select Gender</span>');
            }
            $("input[name='gender']").removeClass("is-valid is-invalid").addClass("form-check-input");
            return false;
        } else {
            $("input[name='gender']").removeClass("is-invalid").addClass("form-check-input is-valid");
            return true;
        }
    }

    // Show error for specific field
    function showError($field, message) {
        const $formGroup = $field.closest(".mb-3, .card-body, .col-sm-12");
        if (!$formGroup.find(".error-message").length) {
            $formGroup.append(`<span class="text-danger  error-message">${message}</span>`);
        }
        $field.addClass("is-invalid").removeClass("is-valid");
    }

    // Remove error from field
    function removeError($field) {
        const $formGroup = $field.closest(".mb-3, .card-body, .col-sm-12");
        $field.removeClass("is-invalid").addClass("is-valid");
        $formGroup.find(".error-message").remove();
    }

    // Validate file fields
    function validateFileField($field, fieldName) {
        if (!$field[0].files.length) {
            showError($field, `${fieldName} is required`);
            return false;
        } else {
            removeError($field);
            return true;
        }
    }

    // Handle field events
    const fields = {
        doctorName: $("#doctor_name"),
        lastName: $("#last_name"),
        gender: $("input[name='gender']"), // Radio button group
        mobileNumber: $("#mobile_number"),
        email: $("#email"),
        speciality: $("#speciality_id"),
        qualification: $("#qualification_id"),
        provider: $("#provider_id"),
        experience: $("#experience"),
        consultationFees: $("#consultation_fees"),
        treatment: $("#treatment_id"),
        profile: $("#doctor_profile"),
        bio: $("#editor")
    };

    $.each(fields, function (key, $field) {
        const eventType = $field.is("select") || $field.is(":radio") ? "change" : "input";

        $field.on(eventType, function () {
            if (key === "gender") {
                validateGender();
            } else if (key === "profile") {
                validateFileField($field, "Profile");
            } else {
                validateField($field, $field.attr("placeholder") || $field.attr("name"));
            }
        });
    });

    // Submit validation
    form.on("submit", function (e) {
        console.log("Form submission triggered");

        let isValid = true;

        $.each(fields, function (key, $field) {
            if (key === "profile") {
                if (!validateFileField($field, "Profile")) {
                    isValid = false;
                }
            } else {
                const result = validateField($field, $field.attr("placeholder") || $field.attr("name"));
                if (!result) isValid = false;
            }
        });

        if (!validateGender()) {
            isValid = false;
        }

        console.log("Form is valid: ", isValid);

        if (!isValid) {
            console.log("Validation failed. Preventing form submission.");
            e.preventDefault();
            return false;
        } else {
            console.log("Form is valid. Submitting form.");
        }
    });
});


  // offer form

  $(document).ready(function () {
    const $form = $("#offer_form");

    $form.on("submit", function (e) {
      let isValid = true;

      const requiredFields = [
        "provider_type",
        "provider_id",
        "offer_name",
        "offer_value",
        "description",
        "image"
      ];

      requiredFields.forEach(function (fieldName) {
        const $field = $form.find(`[name="${fieldName}"]`);
        const $errorSpan = $field.closest(".mb-3").find(".error-message");

        if (!$field.val().trim()) {
          $field.addClass("is-invalid").removeClass("is-valid");
          $errorSpan.show();
          isValid = false;
        } else {
          $field.removeClass("is-invalid").addClass("is-valid");
          $errorSpan.hide();
        }
      });

      if (!isValid) {
        e.preventDefault();
      }
    });

    // Real-time validation
    $form.on("input", "input, textarea, select", function () {
      const $field = $(this);
      const $errorSpan = $field.closest(".mb-3").find(".error-message");

      if ($field.val().trim()) {
        $field.removeClass("is-invalid").addClass("is-valid");
        $errorSpan.hide();
      } else {
        $field.addClass("is-invalid").removeClass("is-valid");
        $errorSpan.show();
      }
    });
  });


  // processor form

  $(document).ready(function () {
    // Real-time validation for provider select
    $('#a11').on('change', function () {
        if ($(this).val().trim()) {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $('#provider-error').hide();
        } else {
            $(this).removeClass('is-valid').addClass('is-invalid');
            $('#provider-error').show();
        }
    });

    // Real-time validation for processor name inputs (existing and future)
    $(document).on('input', 'input[name="processor_names[]"]', function () {
        const $input = $(this);
        let $error = $input.siblings('.processor-error');

        if ($error.length === 0) {
            $input.after('<span class="text-danger processor-error">Please enter a processor name!</span>');
            $error = $input.siblings('.processor-error');
        }

        if ($input.val().trim()) {
            $input.removeClass('is-invalid').addClass('is-valid');
            $error.hide();
        } else {
            $input.removeClass('is-valid').addClass('is-invalid');
            $error.css('display', 'block');
        }
    });

    // On form submit final validation
    $('#processor_form').on('submit', function (e) {
        let isValid = true;

        const provider = $('#a11').val().trim();
        if (!provider) {
            $('#a11').addClass('is-invalid');
            $('#provider-error').show();
            isValid = false;
        } else {
            $('#a11').removeClass('is-invalid');
            $('#provider-error').hide();
        }

        $('input[name="processor_names[]"]').each(function () {
            const $input = $(this);
            let $error = $input.siblings('.processor-error');

            if ($error.length === 0) {
                $input.after('<span class="text-danger is-invalid processor-error">Please enter a processor name!</span>');
                $error = $input.siblings('.processor-error');
            }

            if (!$input.val().trim()) {
                $input.addClass('is-invalid');
                $error.css('display', 'block'); // Show the error message
                isValid = false;
            } else {
                $input.removeClass('is-invalid');
                $error.hide(); // Hide the error message
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });
  });


  // provider form

  $(document).ready(function () {
    const form = $("#provider_form");

    // Validate individual field
    function validateField($field, fieldName) {
        const $formGroup = $field.closest(".mb-3, .card-body, .col-sm-12");
        let value = $.trim($field.val());
        let isSelect = $field.is("select");
        $formGroup.find(".error-message").remove();
        if (!value || (isSelect && value === "")) {

            $field.addClass("is-invalid").removeClass("is-valid");
            $formGroup.append(`<span class="text-danger  error-message">Please enter ${fieldName}!</span>`);
            return false;
        } else {
            $field.removeClass("is-invalid").addClass("is-valid");
            return true;
        }
    }

    // Show error for specific field
    function showError($field, message) {
        const $formGroup = $field.closest(".mb-3, .card-body, .col-sm-12");
        $formGroup.find(".error-message").remove();
        $field.addClass("is-invalid").removeClass("is-valid");
        $formGroup.append(`<span class="text-danger  error-message">${message}</span>`);
    }

    // Remove error from field
    function removeError($field) {
        const $formGroup = $field.closest(".mb-3, .card-body, .col-sm-12");
        $field.removeClass("is-invalid").addClass("is-valid");
        $formGroup.find(".error-message").remove();
    }

    // Validate required file fields
    function validateFileField($field, fieldName) {
        if (!$field[0].files.length) {
            showError($field, `${fieldName} is required`);
            return false;
        } else {
            removeError($field);
            return true;
        }
    }

    // Validate bio field
    function validateBio($field) {
        if (!$.trim($field.val())) {
            showError($field, "Bio is required");
            return false;
        } else {
            removeError($field);
            return true;
        }
    }

    // Handle field events
    const fields = {
        providerName: $("#provider_name"),
        mobileNumber: $("#mobile_number"),
        email: $("#email"),
        address: $("#address"),
        state: $("select[name='state_id']"),
        city: $("select[name='city_id']"),
        postalCode: $("input[name='postal_code']"),
        location: $("input[name='location']"),
        establishedYear: $("input[name='established_year']"),
        providerType: $("select[name='provider_id']"),
        logo: $("#provider_logo"),
        photos: $("#formFileMultiple"),
        bio: $("#editor")
    };

    $.each(fields, function (key, $field) {
        const eventType = $field.is("select") ? "change" : "input";

        $field.on(eventType, function () {
            if (key === "logo" || key === "photos") {
                validateFileField($field, `${key.charAt(0).toUpperCase() + key.slice(1)}`);
            } else if (key === "bio") {
                validateBio($field);
            } else {
                validateField($field, $field.attr("placeholder") || $field.attr("name"));
            }
        });
    });

    // Validate time slots
    function validateTimeSlot($from, $to, label) {
        const fromVal = $.trim($from.val());
        const toVal = $.trim($to.val());

        // Remove existing error messages
        $from.closest(".form-group").find(".error-message").remove();
        $to.closest(".form-group").find(".error-message").remove();

        // Check if the value is empty or the default placeholder
        if (!fromVal || fromVal === "") {
            showError($from, `Please select a valid "From" time for ${label}`);
        } else {
            removeError($from);
        }

        if (!toVal || toVal === "") {
            showError($to, `Please select a valid "To" time for ${label}`);
        } else {
            removeError($to);
        }
    }

    // Time slot event handlers
    for (let i = 1; i <= 7; i++) {
        let mrgFrom = $(`[name="day${i}_mrg_from"]`);
        let mrgTo = $(`[name="day${i}_mrg_to"]`);
        let eveFrom = $(`[name="day${i}_eve_from"]`);
        let eveTo = $(`[name="day${i}_eve_to"]`);

        mrgFrom.add(mrgTo).on("change input", function () {
            validateTimeSlot(mrgFrom, mrgTo, `morning for day ${i}`);
        });

        eveFrom.add(eveTo).on("change input", function () {
            validateTimeSlot(eveFrom, eveTo, `evening for day ${i}`);
        });
    }

    // Submit validation
    form.on("submit", function (e) {
        let isValid = true;

        $.each(fields, function (key, $field) {
            if (key === "logo" || key === "photos") {
                if (!validateFileField($field, `${key.charAt(0).toUpperCase() + key.slice(1)}`)) {
                    isValid = false;
                }
            } else if (key === "bio") {
                if (!validateBio($field)) {
                    isValid = false;
                }
            } else {
                const result = validateField($field, $field.attr("placeholder") || $field.attr("name"));
                if (!result) isValid = false;
            }
        });

        for (let i = 1; i <= 7; i++) {
            const mrgFrom = $(`[name="day${i}_mrg_from"]`);
            const mrgTo = $(`[name="day${i}_mrg_to"]`);
            const eveFrom = $(`[name="day${i}_eve_from"]`);
            const eveTo = $(`[name="day${i}_eve_to"]`);

            if (!mrgFrom.val() || !mrgTo.val()) {
                showError(mrgFrom, `Complete morning slot for day ${i}`);
                showError(mrgTo, `Complete morning slot for day ${i}`);
                isValid = false;
            }

            if (!eveFrom.val() || !eveTo.val()) {
                showError(eveFrom, `Complete evening slot for day ${i}`);
                showError(eveTo, `Complete evening slot for day ${i}`);
                isValid = false;
            }
        }

        if (!isValid) e.preventDefault();
    });
});


$(document).ready(function () {
  // General Real-time Validation Handler
  $(document).on("input change", "input, textarea, select", function () {
    const $field = $(this);
    const $error = $field.closest(".mb-3").find(".error-message, .testimonial-error, .text-danger");

    if ($field.val().trim()) {
      $field.removeClass("is-invalid").addClass("is-valid");
      $error.hide();
    } else {
      $field.removeClass("is-valid").addClass("is-invalid");
      if ($error.length) $error.show();
    }
  });

  // Helper: Check for default time values
  function isDefaultTime(value) {
    return value === 'Morning From' || value === 'Morning To' || value === 'Evening From' || value === 'Evening To';
  }

  // Doctor, Offer, Processor, Provider Forms
  $("#doctor_form, #offer_form, #processor_form, #provider_form").on("submit", function (e) {
    let isValid = true;
    const $form = $(this);

    $form.find("input, textarea, select").each(function () {
      const $field = $(this);
      const value = $field.val();
      const name = $field.attr("name");

      const $error = $field.closest(".mb-3").find(".error-message");

      if (!value || (typeof value === "string" && value.trim() === "")) {
        $field.addClass("is-invalid");
        $error.show();
        isValid = false;
      } else if (
        (name && name.includes("morning_from") && isDefaultTime(value)) ||
        (name && name.includes("morning_to") && isDefaultTime(value)) ||
        (name && name.includes("evening_from") && isDefaultTime(value)) ||
        (name && name.includes("evening_to") && isDefaultTime(value))
      ) {
        $field.addClass("is-invalid");
        $error.show();
        isValid = false;
      } else {
        $field.removeClass("is-invalid");
        $error.hide();
      }
    });

    if (!isValid) e.preventDefault();
  });

  // Specialties Form
  $("#specialties_form").on("submit", function (e) {
    let isValid = true;

    const $providerType = $("#provider_type");
    const $provider = $("#provider");

    if (!$providerType.val()) {
      $providerType.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
      isValid = false;
    }

    if (!$provider.val()) {
      $provider.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
      isValid = false;
    }

    $(".speciality-group").each(function () {
      const $group = $(this);
      const $name = $group.find('input[name="speciality_names[]"]');
      const $image = $group.find('input[name="image[]"]');
      const $desc = $group.find('textarea[name="description[]"]');

      if (!$name.val().trim()) {
        $name.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
        isValid = false;
      }
      if (!$image.val()) {
        $image.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
        isValid = false;
      }
      if (!$desc.val().trim()) {
        $desc.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
        isValid = false;
      }
    });

    if (!isValid) e.preventDefault();
  });

  // Testimonial Form
  $("#testimonial_form").on("submit", function (e) {
    let isValid = true;

    $(".is-invalid").removeClass("is-invalid");
    $(".is-valid").removeClass("is-valid");
    $(".testimonial-error, #provider-error").hide();

    const $providerType = $("#provider_type");
    const $provider = $("#provider");
    const $name = $('input[name="name"]');
    const $image = $("#image");
    const $description = $("#description");

    // Provider Type Validation
    if (!$providerType.val()) {
        $providerType.addClass("is-invalid");
        if (!$providerType.closest(".mb-3").find(".error-message").length) {
            $providerType.closest(".mb-3").append('<span class="text-danger  error-message">Please select a provider type!</span>');
        }
        isValid = false;
    } else {
        $providerType.addClass("is-valid");
    }

    // Provider Validation
    if (!$provider.val()) {
        $provider.addClass("is-invalid");
        $("#provider-error").show();
        isValid = false;
    } else {
        $provider.addClass("is-valid");
    }

    // Name Validation
    if (!$name.val().trim()) {
        $name.addClass("is-invalid").closest(".mb-3").find(".testimonial-error").show();
        isValid = false;
    } else {
        $name.addClass("is-valid");
    }

    // Image Validation
    if (!$image.val()) {
        $image.addClass("is-invalid");
        if (!$image.closest(".mb-3").find(".error-message").length) {
            $image.closest(".mb-3").append('<span class="text-danger  error-message">Please upload an image!</span>');
        }
        isValid = false;
    } else {
        $image.addClass("is-valid");
    }

    // Description Validation
    if (!$description.val().trim()) {
        $description.addClass("is-invalid");
        if (!$description.closest(".mb-3").find(".error-message").length) {
            $description.closest(".mb-3").append('<span class="text-danger  error-message">Please provide a description!</span>');
        }
        isValid = false;
    } else {
        $description.addClass("is-valid");
    }

    if (!isValid) e.preventDefault(); // Prevent form submission if invalid
});


  // Treatment Form
  $("#treatment-form").on("submit", function (e) {
    let isValid = true;

    $(".error-message").hide();
    $("input, select, textarea").removeClass("is-invalid");

    const $providerType = $("#provider_type");
    const $provider = $("#provider");

    if (!$providerType.val()) {
      $providerType.addClass("is-invalid");
      $("#provider-type-error").show();
      isValid = false;
    }

    if (!$provider.val()) {
      $provider.addClass("is-invalid");
      $("#provider-error").show();
      isValid = false;
    }

    $(".treatment-group").each(function () {
      const $group = $(this);
      const $name = $group.find('input[name="treatment_names[]"]');
      const $fee = $group.find('input[name="treatment_fee[]"]');
      const $desc = $group.find('textarea[name="description[]"]');
      const $image = $group.find('input[name="image[]"]');

      if (!$name.val().trim()) {
        $name.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
        isValid = false;
      }

      if (!$fee.val().trim() || isNaN($fee.val())) {
        $fee.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
        isValid = false;
      }

      if (!$desc.val().trim()) {
        $desc.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
        isValid = false;
      }

      if (!$image.val()) {
        $image.addClass("is-invalid").closest(".mb-3").find(".error-message").show();
        isValid = false;
      }
    });

    if (!isValid) e.preventDefault();
  });
}); 
