$().ready(function(){
  $("#vendor_form").validate({
      rules:
        {
          first_name:
          {
              required:true,
              maxlength:20,
          },
          last_name:
          {
          	required:true,
          	maxlength:20,
          },
          email:
          {
          	required:true,
          	email:true,
          },
          mobile:
          {
          	required:true,
          	number:true,
          	mobile_number:true,
          },
          permanent_address:
          {
          	required:true,
          	maxlength:60,
          	minlength:2,
          },
          present_address:
          {
          	required:true,
          	maxlength:60,
          	minlength:2,
          },
          pencard:
          {
          	required:true,
          	pencard_validate:true,
          },
          gst:
          {
          	required:true,
          	gst_validate:true,
          },
          company_type:
          {
          	required:true,
          },
          technology:
          {
          	required:true,
          },
          full_name:
          {
          	required:true,
          },
          bank_name:
          {
          	required:true,
          },
          branch_name:
          {
          	required:true,
          },
          account_number:
          {
          	required:true,
          	account_validate:true,
          },
          ifsc_code:
          {
          	required:true,
          	ifsc_validate:true,
          },
          image1:
          {
          	required:true,
          }

        },
    });
  //mobile regexz
  jQuery.validator.addMethod("mobile_number", function(value, element){
    if (/^(\+\d{1,3}[- ]?)?\d{10}$/.test(value)) {
        return true;  // FAIL validation when REGEX matches
    } else {
        return false;   // PASS validation otherwise
    };
}, "Please Enter Valid Mobile Number"); 
  //pen  regexz
  jQuery.validator.addMethod("pencard_validate", function(value, element){
    if (/^[A-Z0-9]{10}$/.test(value)) {
        return true;  // FAIL validation when REGEX matches
    } else {
        return false;   // PASS validation otherwise
    };
}, "Please Enter Valid Pencard Number "); 
  //gst regexz
  jQuery.validator.addMethod("gst_validate", function(value, element){
    if (/[0-9]{2}[(a-z)(A-Z)]{5}\d{4}[(a-z)(A-Z)]{1}\d{1}Z\d{1}/.test(value)) {
        return true;  // FAIL validation when REGEX matches
    } else {
        return false;   // PASS validation otherwise
    };
}, "Please Enter Valid Pencard Number ");
//account regexz
  jQuery.validator.addMethod("account_validate", function(value, element){
    if (/^(?:[0-9]{11}|[0-9]{2}-[0-9]{3}-[0-9]{6})$/.test(value)) {
        return true;  // FAIL validation when REGEX matches
    } else {
        return false;   // PASS validation otherwise
    };
}, "Please Enter Valid Valid Account Number ");
  // ifsc reges
  jQuery.validator.addMethod("ifsc_validate", function(value, element){
    if (/^[A-Za-z]{4}[a-zA-Z0-9]{7}$/.test(value)) {
        return true;  // FAIL validation when REGEX matches
    } else {
        return false;   // PASS validation otherwise
    };
}, "Please Enter Valid Valid IFSC CODE ");

});
//----End Validation----//


$.validator.setDefaults({
    submitHandler: function() 
    {
      var proceed=true;
      if(proceed)
      {
        var form = $('form')[0];
        var f_data= new FormData(form);
        f_data.append('first_name', $('input[name=first_name]').val());
        f_data.append('last_name', $('input[name=last_name]').val());
        f_data.append('email', $('input[name=email]').val());
        f_data.append('mobile', $('input[name=mobile]').val());
        f_data.append('permanent_address', $('input[name=permanent_address]').val());
        f_data.append('present_address', $('input[name=present_address]').val());
        f_data.append('pencard', $('input[name=pencard]').val());
        f_data.append('gst', $('input[name=gst]').val());
        f_data.append('technology', $('select[name=technology]').val());
        f_data.append('company_type', $('select[name=company_type]').val());
        f_data.append('full_name', $('input[name=full_name]').val());
        f_data.append('bank_name', $('input[name=bank_name]').val());
        f_data.append('branch_name', $('input[name=branch_name]').val());
        f_data.append('account_number', $('input[name=account_number]').val());
        f_data.append('ifsc_code', $('input[name=ifsc_code]').val());
        g=f_data.append('image', $('input[type=file]')[0].files[0]); 

       
        $.ajax
        ({
          url: 'frontend_controller/insert',
          data:f_data,
          processData: false,
          contentType: false, 
          type: 'POST',
          dataType:'json',
          success: function(response)
          {
            if(response.type == 'success')
            { 
              $('#myDiv_contact_add').show().delay(5000).fadeOut();
                    $('body,html').animate({
                scrollTop: 100
                }, 600);
                    setTimeout(function(){window.location.href=""},5000);
                2
            }
            if(response.type == 'error')
            { 
              alert('Something went wrong in form. Please try after some time')
            }
          }
        });
      }
    }
});