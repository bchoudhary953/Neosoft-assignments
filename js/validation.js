$(document).ready(function(){
	   $('form').submit(function(e) {
	    e.preventDefault();
	    var first_name = $('#firstname').val();
	    var last_name = $('#lastname').val();
	    var email = $('#email').val();
	    var office = $('#office').val();
	    var phone = $('#phone').val();
	    var password = $('#password').val();
	    var pwd = $('#pwd').val();
	    var radioValue = $("input[name='gender']:checked").val();
	    var checkValue = $("input[name='interest']:checked").val();
	    $(".error").remove();

	    
	    if (first_name.length < 1) {
	     alert("Enter name");
	     firstname.focus();
	     return false;
	    }
	    if (last_name.length < 1) {
	      alert("Enter last name");
	      lastname.focus();
	     return false;
	    }
	    
	    if ($('#phone').val().length < 1) {
	      alert("Enter phone number");
	      phone.focus();
	     return false;
	    }
	    else{
		var validphone = /^[0-9]+$/.test(phone);
		if (phone.length < 10 || !validphone ) {
	      	   alert("Enter valid phone number");
		   phone.focus();
	           return false;
		}
	    }
	   var valid = /^[0-9]+$/.test(office);
		
	   if( !valid){
		alert("Enter valid office number");
		office.focus();
	        return false;
	   }
	   if(!radioValue){
                alert("Enter gender");
	        return false;
            }
	    if(!checkValue){
                alert("Enter at least one interest");
		return false;
            }
	    if ($('#password').val().length < 1) {
	        alert("Enter password");
		password.focus();
	        return false;
	    }
	    else{
		var pattern=  /^[A-Za-z]\w{8,12}$/;
		if (!pattern.test(password)){
		   alert("Password Range should be between 8 to 12 charachers, only Alphanumeric characters, No Special characters");
		   password.focus();
	           return false;
		}
	    }
	    if (pwd.length < 1 || pwd != password ) {
	        alert("Confirm the password");
		pwd.focus();
	        return false;
	    }
	    
	    if ($('#month').val() == 0 || $('#day').val() == 0 || $('#year').val() == 0) {
         	alert("Enter DOB");
		return false;
	    }
	     
	    if ($('#about').val().length < 1) {
	        alert("Enter about you");
		about.focus();
	        return false;
	    }
	    if (email.length < 1) {
	        alert("Enter email id");
		email.focus();
	        return false;
	    } else {
	    
 	      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	      var validEmail = regEx.test(email);
	      if (!validEmail) {
		alert("Enter valid email id");
		email.focus();
		return false;
	      }
	    }
	   
           return true;
        
        });
});
$(document).ready(function(){
	$("#year").mouseleave(function(){
	var today = new Date();
	var birthday = new Date($("#year").val(), $("#month").val(),$("#day").val());
        
        var differenceInMilisecond = today - birthday;
       
        var year_age = Math.floor(differenceInMilisecond / 31536000000);
        var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
        
        
        var month_age = ((Math.floor(day_age/30))+1);
        
        day_age = day_age % 30;
        var age = year_age +"."+month_age;
	
        $("#age").val(age);
	});


   
});



