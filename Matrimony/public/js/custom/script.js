const doshamRadioButtons = document.querySelectorAll('input[name="dosham"]');
const checkboxList = document.getElementById('checkbox-list');

doshamRadioButtons.forEach(radioButton => {
    radioButton.addEventListener('change', () => {
        if (radioButton.value === 'Yes') {
            checkboxList.style.display = 'block';
        } else {
            checkboxList.style.display = 'none';
        }
    });
});

const otherAddress = document.querySelectorAll('input[name="other_address"]');
const permanentAddressSection = document.getElementById('permanentAddressSection');
otherAddress.forEach(radioButton => {
    radioButton.addEventListener('change', () => {
        if (radioButton.value === '2') {
            permanentAddressSection.style.display = 'block';
        } else {
            permanentAddressSection.style.display = 'none';
        }
    });
});


const yesRadio = document.getElementById('employed_yes');
const noRadio = document.getElementById('employed_no');
const noFields = document.getElementById('nofields');

yesRadio.addEventListener('change', () => {
    noFields.style.display = 'block';
});

noRadio.addEventListener('change', () => {
    noFields.style.display = 'none';
});

// const indiaRadio = document.getElementById('india');
//  const otherCountryRadio = document.getElementById('otherCountry');
//  const indiaFields = document.getElementById('indiaFields');
//  const otherCountryFields = document.getElementById('otherCountryFields');

//  indiaRadio.addEventListener('change', () => {
//      indiaFields.style.display = 'block';
//      otherCountryFields.style.display = 'none';
//  });

//  otherCountryRadio.addEventListener('change', () => {
//      indiaFields.style.display = 'none';
//      otherCountryFields.style.display = 'block';
//  });

const indiaRadio = document.getElementById('india');
const otherCountryRadio = document.getElementById('otherCountry');
const indiaFields = document.getElementById('indiaFields');
const otherCountryFields = document.getElementById('otherCountryFields');

indiaRadio.addEventListener('change', () => {
    indiaFields.style.display = 'block';
    otherCountryFields.style.display = 'none';
});

otherCountryRadio.addEventListener('change', () => {
    indiaFields.style.display = 'none';
    otherCountryFields.style.display = 'block';
});


function show_otherhobby(checkbox, id) {
    var othersField = document.getElementById('hobbies_test');
    if (id === 15) { 
        if (checkbox.checked) {
            othersField.style.display = 'block';
        } else {
            othersField.style.display = 'none';
        }
    }
}

 function show_othermusic(checkmusic)
 {
     var music=document.getElementById("music_text");
     music.style.display = checkmusic.checked ? "block" : "none";    
 }
 function show_othersports(checksports)
 {
     var sports=document.getElementById("sports_text");
     sports.style.display = checksports.checked ? "block" : "none";        
 }


$(document).ready(function(){

    $('select[name="state"]').on('change', function() {
        var id = $('#state').val();  
        
        $.ajax({
            url: "{{ route('get_sub_city') }}",  
            method: "POST",
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            async: true,
            dataType: 'json',
            success: function(data){
                var html = '';
                html += '<option value="0">Select</option>';  
    
                for (var i = 0; i < data.length; i++) {
                   html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                
                $('#city').html(html);  
            }
        });
        
        return false;  
    });
    
    $('select[name="city"]').on('change', function() {
        var state_id = $('#state').val(); 
        var city_id = $('#city').val();   
        
        $.ajax({
            url: "{{ route('get_taluk_category') }}",
            method: "POST",
            data: {
                city: city_id,
                id: state_id,
                _token: "{{ csrf_token() }}" 
            },
            async: true,
            dataType: 'json',
            success: function(data){
                var html = '';
                html += '<option value="0">Select</option>';  
                for (var i = 0; i < data.length; i++) {
                   html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                
                $('#taluk').html(html);  
            }
        });
        
        return false;
    });
    });

       // Home_page validation

       function home_validation_old() {

        let isValid = true;
    
        // Profile created by validation
        if ($('#profilecreatedby').val().trim() === '') {
            $('#profilecreatedby_error').show();
            document.getElementById('profilecreatedby').style.border = "1px solid red";
            isValid = false;
        } else {
            $('#profilecreatedby_error').hide();
            document.getElementById('profilecreatedby').style.border="1px solid grey";
        }
       
        // Name validation
    
        if ($('input[name="name"]').val().trim() === '') {
            $('#Name_error').show();
            document.getElementById("name").style.border = '1px solid red';
            isValid = false;
        } else {
            $('#Name_error').hide();
            document.getElementById("name").style.border = '1px solid grey';
        }
    
        // mobile_number validation
    
        let contact=$('input[name="mobile_number"]').val();
        if (contact.trim() === '' || contact.length!==10) {
            $('#mobile_error').show();
            document.getElementById("mobile_number").style.border = '1px solid red';
            isValid = false;
        } else {
            $('#mobile_error').hide();
            document.getElementById("mobile_number").style.border = '1px solid gray';
        }
    
    
        // Email_address validation
        let email = $('input[name="email"]').val().trim();
        let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        let emailError = $('#emailerror');
        const emailInput = document.getElementById('email');
    
        if (email = '' || !emailRegex.test(email)) {
            $('#emailerror').show();
            document.getElementById('email').style.border = '1px solid red';
            isValid = false;
        }   // Email exists check
        // Check email exists via AJAX
        fetch("{{ route('check.email.exists') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                errorElem.innerText = 'Email already exists!';
                errorElem.style.display = 'block';
                emailInput.style.border = '1px solid red';
                isValid = false;
            } else {

                errorElem.style.display = 'none';
                emailInput.style.border = '1px solid grey';
                return isValid;
            
            }
        });

    
        return isValid;
    }



    
     // basic information validation

     function basicvalidate() {
         let isValid = true;


         // name validation
         if ($('input[name="name"]').val().trim() === '') {
             $('#name_error').show();
             isValid = false;
         } else {
             $('#name_error').hide();
         }

         // profile created validation

         let createdByRelation = $('select[name="created_by_relation"]').val();

         if (!createdByRelation || createdByRelation === '') {
             $('#created_by_relation_error').show();
             isValid = false;
         } else {
             $('#created_by_relation_error').hide();
         }

         // gender validation

         if (!$('input[name="gender"]:checked').val()) {
             $('#gender_error').show();
             isValid = false;
         } else {
             $('#gender_error').hide();
         }
     
         // Date of birth validation

         if ($("#dob").val() === "" ) {
            $("#dob_error").show();
            isValid = false;
        }else if($("#dob").val() > formattedDate) {
           $("#dob_error").text("You must beat least 18 years old!").show();
        }
        else {
            $("#dob_error").hide();
            }
        
         // mobile_number validation 

         let mobile = $('input[name="mobile"]').val().trim();
         if (mobile === '' || mobile.length !== 10) {
             $('#mobile_error').show();
             isValid = false;
         } else {
             $('#mobile_error').hide();
         }

         let email = $('input[name="email"]').val().trim();
         let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

         if (email = '' || !emailRegex.test(email)) {
           
             $('#email_error').show();
             isValid = false;
         } else {
             $('#email_error').hide();
           
         }
         return isValid;

     }
  
      // ethnicity validation

function ethinicityvalidate() {
    let isValid = true;

    if (!$('input[name="religion"]:checked').val()) {
        $('#religion_error').show();
        isValid = false;
    } else {
        $('#religion_error').hide();
    }


    if (!$('input[name="mothertongue"]:checked').val()) {
        $('#mothertongue_error').show();
        isValid = false;

    } else {
        $('#mothertongue_error').hide();
    }

    if (!$('input[name="caste"]:checked').val()) {
        $('#caste_error').show();
        isValid = false;

    } else {
        $('#caste_error').hide();


    }

    if (!$('input[name="language[]"]:checked').val()) {
        $('#languageerror').show();
        isValid = false;
    } else {
        $('#languageerror').hide();


    }
    return isValid;

}

 
//Horoscope validation
function horoscopevalidation() {
    var isValid = true;

    // Raasi validation
    if ($('select[name="raasi"]').val().trim() === '') {
        $("#raasierror").show();
        isValid = false;
    } else {
        $("#raasierror").hide();
    }

    // Star validation
    if ($("select[name='raasi']").val() === '' && ($('#star_horoscope').val() === '' || $('#star_horoscope').val() === '0')) {
        $("#star_dependend_error").show();
        isValid = false;
        $("#starerror").hide();
    } else if (($("select[name='raasi']").val() !== '') &&
        ($('#star_horoscope').val() === 'Select' || $('#star_horoscope').val() === '0' || $('#star_horoscope').val() === '')) {
        $("#starerror").show();
        isValid = false;
        $("#star_dependend_error").hide();
    } else {
        $('#starerror').hide();
        $("#star_dependend_error").hide();
    }

    // Birth place validation
    if ($('input[name="birth_place"]').val().trim() === '') {
        $("#birthplace_error").show();
        isValid = false;
    } else {
        $("#birthplace_error").hide();
    }

    // Horoscope Image Validation
    let horoscope_img = $("input[name='horoscope_image']")[0]; 
    let file = horoscope_img.files[0]; 
    
    var existingImage = $('#existing_image').val(); 
    if (!file && existingImage === '0') {
        $("#img_error").show();
        isValid = false;
    } else {
        $("#img_error").hide(); 
    }
    if (file) {
        // Allowed file types
        const FileTypes = ['image/jpeg', 'image/png', 'application/pdf'];

        // Validate file type (PNG, JPG, JPEG, PDF)
        if (!FileTypes.includes(file.type)) {
            $("#img_error").text("Please upload a valid file: PNG, JPG, JPEG, or PDF.").show();
            isValid = false;
        } 
        // Validation for file size (max 100MB)
        else if (file.size > 100 * 1024 * 1024) { 
            $("#img_error").text("File size exceeds the 100MB limit. Please upload a smaller file!").show();
            isValid = false;
        }
    }
    
    return isValid;
}
// Profile Validation
function profile_validate() {
    isValid = true;

    if ($("#height").val() === '0') {
        $("#height_error").show();
        isValid = false;
    } else {
        $("#height_error").hide();
    }

    if ($("#weight").val() === '0') {
        $("#weight_error").show();
        isValid = false;
    } else {
        $("#weight_error").hide();
    }

    if ($('textarea[name="about_you"]').val().trim() === '') {
        $("#aboutyou_error").show();
        isValid = false;
    } else {
        $("#aboutyou_error").hide();
    }

    return isValid;

}


     // Personal Validation

function personalvalidate() {
    isValid = true;


    if ($("#paternity").val().trim() === '') {
        $("#paternity_error").show();
        isValid = false;
    } else {
        $("#paternity_error").hide();

    }
    if ($("#mother_status").val().trim() === '') {
        $("#motherstatus_error").show();
        isValid = false;
    } else {
        $("#motherstatus_error").hide();
    }

    if ($("#no_brothers").val().trim() === '') {
        $("#nobrothers_error").show();
        isValid = false;
    } else {
        $("#nobrothers_error").hide();
    }

    if ($("#no_sisters").val().trim() === '') {
        $("#nosisters_error").show();
        isValid = false;
    } else {
        $("#nosisters_error").hide();
    }

    let contact = $("#parent_contact").val().trim();
    if (contact === '' || contact.length !== 10) {
        $("#contact_error").show();
        isValid = false;
    } else {
        $("#contact_error").hide();
    }

    let noBrothers = parseInt($("#no_brothers").val()) || 0;
    let brothersMarried = parseInt($("#brothers_married").val()) || 0;
    let noSisters = parseInt($("#no_sisters").val()) || 0;
    let sistersMarried = parseInt($("#sisters_married").val()) || 0;

    if (brothersMarried > noBrothers) {
        $("#brothers_married_error").show().text("Married brothers cannot exceed total brothers.");
        isValid = false;
    } else {
        $("#brothers_married_error").hide();
    }

    if (sistersMarried > noSisters) {
        $("#sisters_married_error").show().text("Married sisters cannot exceed total sisters.");
        isValid = false;
    } else {
        $("#sisters_married_error").hide();
    }



    return isValid;

}


// Address validation

function addressvalidate() {
    isValid = true;

    if ($("#state").val().trim() === '') {
        $("#state_error").show();
        isValid = false;
    } else {
        $("#state_error").hide();
    }

    // city Validation
    if ($("#state").val() === 'select' || $("#state").val() === '') {
        $("#dependendcity_error").show();
        isValid = false;
        $("#city_error").hide();
    } else if (($('#state').val() !== 'Select' || $('#state').val() !== '') &&
        ($('#city').val() === 'Select' || $('#city').val() === '0')) {
        $("#city_error").show();
        isValid = false;
        $("#dependendcity_error").hide();
    } else {
        $('#city_error').hide();
        $("#dependendcity_error").hide();
    }


    //Taluk validation

    if (($("#taluk").val() === '0' || $("#taluk").val() === 'select') &&
        ($('#city').val() !== 'Select' || $('#city').val() !== '0')) {
        $("#taluk_error").show();
        isValid = false;
        $("#dependendtaluk_error").hide();
    } else if (
        $('#city').val() === 'Select' || $('#city').val() === '0' || $("#state").val() === 'select' || $("#state").val() === '') {
        $("#dependendtaluk_error").show();
        isValid = false;
        $("#taluk_error").hide();
    } else {
        $("#dependendtaluk_error").hide();
        $("#taluk_error").hide();

    }

    // village validation


    if ($("input[name='other_address']:checked").val() === '2') {

        if ($('#permanent_state').val() === 'Select' || $('#permanent_state').val() === '') {
            $('#permanentstate_error').show();
            isValid = false;
        } else {
            $('#permanentstate_error').hide();
        }


        // Permanent_City validation 

        if ($("#permanent_state").val() === 'Select' || $("#permanent_state").val() === '') {
            $("#dependencycity_error").show();
            isValid = false;
            $("#permanentcity_error").hide();
        } else if (($('#permanent_state').val() !== 'Select' || $('#permanent_state').val() !== '') &&
            ($('#permanent_city').val() === 'Select' || $('#permanent_city').val() === '0')) {
            $("#permanentcity_error").show();
            isValid = false;
            $("#dependencycity_error").hide();
        } else {
            $('#permanentcity_error').hide();
            $("#dependencycity_error").hide();
        }




        //Taluk validation

        if (($("#permanent_taluk").val() === '0' || $("#permanent_taluk").val() === 'select') &&
            ($('#permanent_city').val() !== 'Select' || $('#permanent_city').val() !== '0')) {
            $("#permanenttaluk_error").show();
            isValid = false;
            $("#dependencytaluk_error").hide();
        } else if ($('#permanent_city').val() === 'Select' || $('#permanent_city').val() === '0' ||
            $("#permanent_state").val() === 'select' || $("#permanent_state").val() === '') {
            $("#dependencytaluk_error").show();
            isValid = false;
            $("#permanenttaluk_error").hide();
        } else {
            $("#dependencytaluk_error").hide();
            $("#permanenttaluk_error").hide();

        }


    }


    return isValid;
};




   
// Professional Validation

function professionalvalidate() {
    isValid = true;
    if ($('select[name="education"]').val() === '0') {
        $("#education_error").show();
        isValid = false;
    } else {
        $("#education_error").hide();
    }

    if ($("#college_school").val() === '') {
        $("#college_error").show();
        isValid = false;
    } else {
        $("#college_error").hide();
    }
 
    return isValid;
}

function occupationvalidate(){
    isValid = true;
    if ($('#company_name').val() =='') {
        $('#company_error').show();
        isValid = false;
    } else {
        $('#company_error').hide();
    }

    if ($("#designation").val() =='') {
        $("#designation_error").show();
        isValid = false;
    } else {
        $("#designation_error").hide();
    }
    if ($("#income").val() === "") {
        $("#income_error").show();
        isValid = false;
    } else {
        $("#income_error").hide();
    }

if ($("input[name='work_location']:checked").val() === "India") {
    if ($("#state").val() === "") {

        $('#state_error').show();
        isValid = false;
    } else {
        $('#state_error').hide();
    }

    // City Validation
    if ($("#state").val() === '') {
        $("#citydependent_error").show();
        isValid = false;
        $("#city_error").hide();
    } else if (($('#state').val() !== '') && ($('#city').val() === '0')) {
        $("#city_error").show();
        isValid = false;
        $("#citydependent_error").hide();
    } else {
        $('#city_error').hide();
        $("#citydependent_error").hide();
    }


    //Taluk validation

    if (($("#taluk").val() === '0') && ($('#city').val() !== '0')) {
        $("#taluk_error").show();
        isValid = false;
        $("#talukdependent_error").hide();
    } else if (
        ($('#city').val() === '0' || $("#state").val() === '')) {
        $("#talukdependent_error").show();
        isValid = false;
        $("#taluk_error").hide();
    } else {
        $("#talukdependent_error").hide();
        $("#taluk_error").hide();

    }

    // Pincode validation

    let pincode = $("#pincode").val().trim()
    if ( pincode.length != 6) {
        $("#pincode_error").show();
        isValid = false;
    } else {
        $("#pincode_error").hide();
    }
    
}

if ($("input[name='work_location']:checked").val() === 'Other_Country') {
    if ($("#visa_type").val() === "Select") {
        $("#visa_error").show();
        isValid = false;
    } else {
        $("#visa_error").hide();
    }
    if ($("#other_country_address").val() === '') {
        $("#other_country_address_error").show();
        isValid = false;
    } else {
        $("#other_country_address_error").hide();
    }
}
return isValid;
}


     // About Partner Validation
function about_partner_validate() {
    var isValid = true;

    // Age Validation
    var ageFrom = parseInt($("#age_from").val());
    var ageTo = parseInt($("#age_to").val());


    if (ageFrom === 0 && ageTo === 0) {
        $("#age_error").show();
        isValid = false;
        document.getElementById("age_error").style.textAlign = "center";
        document.getElementById("age_error").style.position = "relative";
        document.getElementById("age_error").style.bottom = "13px";
        document.getElementById("age_error").style.right = "5px";
    } else {
        $("#age_error").hide();
        if (ageFrom === 0) {
            $("#age_from_error").show();
            isValid = false;
        } else {
            $("#age_from_error").hide();
        }

        if (ageTo === 0) {
            $("#age_to_error").show();
            isValid = false;
        } else {
            $("#age_to_error").hide();
        }

        if (ageFrom > ageTo && ageFrom !== 0 && ageTo !== 0) {
            $("#age_error").text("Minimum age cannot be greater than maximum age!").show();
            isValid = false;
            document.getElementById("age_error").style.textAlign = "center";
            document.getElementById("age_error").style.position = "relative";
            document.getElementById("age_error").style.bottom = "13px";
            document.getElementById("age_error").style.right = "5px";
        }
    }

    // Height Validation
    var heightFrom = parseInt($("#height_from").val());
    var heightTo = parseInt($("#height_to").val());


    if (heightFrom === 0 && heightTo === 0) {
        $("#height_error").show();
        isValid = false;
        document.getElementById("height_error").style.textAlign = "center";
        document.getElementById("height_error").style.position = "relative";
        document.getElementById("height_error").style.bottom = "13px";
        document.getElementById("height_error").style.right = "5px";

    } else {
        $("#height_error").hide();
        if (heightFrom === 0) {
            $("#height_from_error").show();
            isValid = false;
        } else {
            $("#height_from_error").hide();
        }

        if (heightTo === 0) {
            $("#height_to_error").show();
            isValid = false;
        } else {
            $("#height_to_error").hide();
        }

        if (heightFrom > heightTo && heightFrom !== 0 && heightTo !== 0) {
            $("#height_error").text("Minimum height cannot be greater than maximum height!").show();
            isValid = false;
            document.getElementById("height_error").style.textAlign = "center";
            document.getElementById("height_error").style.position = "relative";
            document.getElementById("height_error").style.bottom = "13px";
            document.getElementById("height_error").style.right = "2px";
        }
    }

    if (!$("input[name='per_religion']:checked").val()) {
        $("#par_religion_error").show();
        isValid = false;
    } else {
        $("#par_religion_error").hide();
    }

    if ($("input[name='par_mother_tongue']:checked").val() === undefined) {
        $("#par_mother_tongue_error").show();
        isValid = false;
    } else {
        $("#par_mother_tongue_error").hide();
    }

    if ($('#multiselect1').val() == null || $('#multiselect1').val().length === 0) {
        $("#raasi_error").show();
        isValid = false;
    } else {
        $("#raasi_error").hide();
    }

    if ($('#multiselect2').val() == null || $('#multiselect2').val().length === 0) {
        $("#star_error").show();
        isValid = false;
    } else {
        $("#star_error").hide();
    }

    if ($('#multiselect3').val() == null || $('#multiselect3').val().length === 0) {
        $("#par_education_error").show();
        isValid = false;
    } else {
        $("#par_education_error").hide();
    }


    if ($("#about_partner").val().trim() === '') {
        $("#about_partner_error").show();
        isValid = false;
    } else {
        $("#about_partner_error").hide();
    }

    return isValid;
}

  // Relative Validation

function relativevalidate(){
    isValid = true;
    if ($("#first_rel_name").val() === '') {
        $("#first_rel_name_err").show();
        isValid = false;
    } else {
        $("#first_rel_name_err").hide();
    }

    if ($("#first_relation_type").val() === '') {
        $("#first_rel_type_err").show();
        isValid = false;
    } else {
        $("#first_rel_type_err").hide();
    }

    if ($("#first_relative_business").val() === '') {
        $("#first_rel_business_err").show();
        isValid = false;
    } else {
        $("#first_rel_business_err").hide();
    }

    let contact = $("#first_relative_contact").val();

    if (contact.length !== 10 || contact === '') {
        $("#first_rel_contact_err").show();
        isValid = false;
    } else {
        $("#first_rel_contact_err").hide();
    }
    return isValid;
}
// Photo validation 

 function checkIfAnyPhotoUploaded() {
    let anyPhotoUploaded = false;

    // Check new photo inputs
    $("input[type='file'][name='photo[]']").each(function () {
        if ($(this).val() !== "") {
            anyPhotoUploaded = true;
        }
    });

    // Already uploaded ones
    $("input[type='hidden'][name='up_photo[]']").each(function () {
        if ($(this).val() !== "") {
            anyPhotoUploaded = true;
        }
    });

    return anyPhotoUploaded;
}



