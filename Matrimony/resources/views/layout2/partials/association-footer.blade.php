
  <!-- Bootstrap JS -->
 <!-- Full version of jQuery -->
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  
<script>
   
   function home_validation() {
    let isValid = true;

    function validateMobileNumber(input) {
        const value = input.value;
        const mobileNumberPattern = /^[6-9]\d{0,9}$/;

        if (!mobileNumberPattern.test(value) || value.length > 10) {
            input.value = value.slice(0, -1);
        }
    }

    // Profile created by validation
    if ($('#profilecreatedby').val().trim() === '') {
        $('#profilecreatedby_error').show();
        $('#profilecreatedby').removeClass('border-secondary').addClass('border-danger'); 
        isValid = false;
    } else {
        $('#profilecreatedby_error').hide();
        $('#profilecreatedby').removeClass('border-danger').addClass('border-secondary'); 
    }

    // Name validation
    if ($('input[name="name"]').val().trim() === '') {
        $('#Name_error').show();
        $('#name').removeClass('border-secondary').addClass('border-danger'); 
        isValid = false;
    } else {
        $('#Name_error').hide();
        $('#name').removeClass('border-danger').addClass('border-secondary'); 
    }

    // Mobile number validation
    let contact = $('input[name="mobile_number"]').val();
    if (contact.trim() === '' || contact.length !== 10) {
        $('#mobile_error').show();
        $('#mobile_number').removeClass('border-secondary').addClass('border-danger'); 
        isValid = false;
    } else {
        $('#mobile_error').hide();
        $('#mobile_number').removeClass('border-danger').addClass('border-secondary'); 
    }

    // Email address validation
    let email = $('input[name="email"]').val().trim();
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email == '' || !emailRegex.test(email)) {
        $('#emailerror').show();
        $('#email').removeClass('border-secondary').addClass('border-danger'); 
        isValid = false;
    } else {
        $('#emailerror').hide();
        $('#email').removeClass('border-danger').addClass('border-secondary'); 
    }

    // If form is valid, redirect to the new route
    if (isValid) {
        window.location.href = "{{ route('otp-verification') }}"; 
    }

    return isValid;
}


    document.getElementById('dashboard-toggle').addEventListener('click', function(event) {
  event.preventDefault();
  var subNav = document.getElementById('dashboard-sub-nav');
  var parentNavItem = this.parentElement;

  subNav.classList.toggle('show');
  parentNavItem.classList.toggle('active');
});

document.addEventListener("DOMContentLoaded", () => {
  const reportToggle = document.getElementById("report-toggle");
  const reportSubNav = document.getElementById("report-sub-nav");
  const arrowIcon = reportToggle.querySelector(".fa-angle-left");

  
  const isSubNavVisible = localStorage.getItem("subNavVisible") === "true";
  
 
  if (isSubNavVisible) {
    reportSubNav.style.display = "block";
    arrowIcon.style.transform = "rotate(90deg)";
    reportToggle.parentElement.classList.add("active");
  } else {
    reportSubNav.style.display = "none";
    arrowIcon.style.transform = "rotate(0deg)";
    reportToggle.parentElement.classList.remove("active");
  }

  
  
  reportToggle.addEventListener("click", (e) => {
    e.preventDefault(); 

   
    reportToggle.parentElement.classList.toggle("active");
  if (reportSubNav.style.display === "block") {
      reportSubNav.style.display = "none";
      arrowIcon.style.transform = "rotate(0deg)";
      localStorage.setItem("subNavVisible", "false");
    } else {
      reportSubNav.style.display = "block";
      arrowIcon.style.transform = "rotate(90deg)";
      localStorage.setItem("subNavVisible", "true");
    }
  });
});

document.getElementById('sidebar-toggler').addEventListener('click', function() {
  var sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('collapsed');
});

    
    function confirmdelete(url) {
      if (confirm("Are you sure you want to delete this association?")) {
        window.location.href = url;
      }
    }

    
    $(document).on('click', '.fetchdetails', function() {
    var id = $(this).data('id');
    var type = $(this).data('type');

    $.ajax({
        url: '/fetchdetails',
        method: 'GET',
        data: { id: id, type: type },
        success: function(response) {
            if (response.name) {
               
                $('#profile_id').text(response.profile_id);
                $('#member-name').text(response.name);
                $('#member-gender').text(response.gender);
                $('#member-email').text(response.email);
                $('#member-mobile').text(response.mobile);
                $('#member-religion').text(response.religion);
                $('#member-caste').text(response.caste);
                $('#member-dob').text(response.dob);
                 $('#member-age').text(response.age);
                 $('#member-birthtime').text(response.birth_time);
                 $('#member-designation').text(response.designation);
                 $('#member-education').text(response.qualification);
                 $('#member-mothertongue').text(response.mother_tongue);
                 $('#member-college').text(response.college);
                 $('#member-office').text(response.office);
                 $('#brother-sisters').text(response.siblings);
                $('#member-income').text(response.income);
                $("#member-parents").text(response.parent_names);
                  $('#member-height').text(response.height);
                  $('#parent-contact').text(response.parent_contact);
                $('#member-relation').text(response.created_by_relation);
                $('#member-raasi').text(response.raasi ? response.raasi : 'Not Available');
                  $('#member-star').text(response.star ?response.star :'Not Available');
                  $('#birth_place').text(response.birth_place ?response.birth_place:'Not Available');
                  $('#native_place').text(
    response.permanent_village || response.native_place || 'Not Available'
);


                $('#rasi_1').text(response.horoscope.rasi_1 );
                $('#rasi_2').text(response.horoscope.rasi_2 );
                $('#rasi_3').text(response.horoscope.rasi_3 );
                $('#rasi_4').text(response.horoscope.rasi_4 );
                $('#rasi_5').text(response.horoscope.rasi_5 );
                $('#rasi_6').text(response.horoscope.rasi_6 );
                $('#rasi_7').text(response.horoscope.rasi_7 );
                $('#rasi_8').text(response.horoscope.rasi_8 );
                $('#rasi_9').text(response.horoscope.rasi_9 );
                $('#rasi_10').text(response.horoscope.rasi_10 );
                $('#rasi_11').text(response.horoscope.rasi_11 );
                $('#rasi_12').text(response.horoscope.rasi_12 );

                $('#Navamsam_1').text(response.horoscope.Navamsam_1 );
                $('#Navamsam_2').text(response.horoscope.Navamsam_2 );
                $('#Navamsam_3').text(response.horoscope.Navamsam_3 );
                $('#Navamsam_4').text(response.horoscope.Navamsam_4 );
                $('#Navamsam_5').text(response.horoscope.Navamsam_5 );
                $('#Navamsam_6').text(response.horoscope.Navamsam_6 );
                $('#Navamsam_7').text(response.horoscope.Navamsam_7 );
                $('#Navamsam_8').text(response.horoscope.Navamsam_8 );
                $('#Navamsam_9').text(response.horoscope.Navamsam_9 );
                $('#Navamsam_10').text(response.horoscope.Navamsam_10 );
                $('#Navamsam_11').text(response.horoscope.Navamsam_11 );
                $('#Navamsam_12').text(response.horoscope.Navamsam_12 );

               
                $('#fetchdetails').modal('show');
            } else {
                alert(response.message || 'Error!');
            }
        },
        error: function() {
            alert('Error! Try again');
        }
    });
});
  </script>
