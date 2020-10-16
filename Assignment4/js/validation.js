
      // Form validation code 
      function validation() {
      
         if( document.myForm.firstname.value == "" ) {
            alert( "Please provide your First name!" );
            document.myForm.firstname.focus() ;
            return false;
         }
	if( document.myForm.lastname.value == "" ) {
            alert( "Please provide your last name!" );
            document.myForm.lastname.focus() ;
            return false;
         }
	if( document.myForm.phone.value == "" ) {
            alert( "Please provide your phone number!" );
            document.myForm.phone.focus() ;
            return false;
         }
	
	if( document.myForm.phone.value.length != 10 ) {
            alert( "Please enter valid phone number!" );
            document.myForm.phone.focus() ;
            return false;
         }
 	

	if( isNaN(document.myForm.phone.value)) {
            alert( "Please enter valid phone number!" );
            document.myForm.phone.focus() ;
            return false;
         }
	
	if( document.myForm.office.value == "" ) {
            alert( "Please provide office number!" );
            document.myForm.office.focus() ;
            return false;
         }
	if( isNaN(document.myForm.office.value)) {
            alert( "Please enter valid office number!" );
            document.myForm.office.focus() ;
            return false;
	}
	if( document.myForm.password.value == "" ) {
            alert( "Please provide password!" );
            document.myForm.password.focus() ;
            return false;
         }
	
	var pattern=  /^[A-Za-z]\w{8,12}$/;
	if( !document.myForm.password.value.match(pattern) ) {
            alert( "Password should contain only alphanumeric value and Range should be between 8 to 12 charachers!" );
            document.myForm.password.focus() ;
            return false;
	}
        if( document.myForm.pwd.value == "" ) {
            alert( "Please confirm the password!" );
            document.myForm.pwd.focus() ;
            return false;
         }   
	
	if( document.myForm.pwd.value != document.myForm.password.value ){
	    alert( "Confirm password again!");
	    document.myForm.pwd.focus() ;
            return false;
         }if(document.myForm.year.value == 0 || document.myForm.day.value == 0 || document.myForm.month.value == 0 ){
	    alert("Enter DOB");
	    return false;
	}
	if(! document.myForm.gender[0].checked && !document.myForm.gender[1].checked ){
	    alert("enter gender");
	    return false;
	}  
	
	var group = document.myForm.interest;
	for (var i=0; i<group.length; i++) {
		if (group[i].checked)
		break;
	}
	if (i==group.length)
	return alert("Select one interest"); 
	if( document.myForm.about.value == "" ) {
            alert( "Please enter something about you!" );
            document.myForm.about.focus() ;
            return false;
         } 
	
         if( document.myForm.email.value == "" ) {
            alert( "Please provide your email!" );
            document.myForm.email.focus() ;
            return false;
         } 
	var atposition = document.myForm.email.value.indexOf("@");  
	var dotposition = document.myForm.email.value.lastIndexOf(".");  
	if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
	    alert("Please enter a valid email address");  
	    document.myForm.email.focus();
 	    return false;  
 	 }  	
}
function getAge(){
	var today = new Date();
	var birthday = new Date(document.myForm.year.value, document.myForm.month.value,document.myForm.day.value);
        
        var differenceInMilisecond = today - birthday;
       
        var year_age = Math.floor(differenceInMilisecond / 31536000000);
        var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
        
        
        var month_age = ((Math.floor(day_age/30))+1);
        
        day_age = day_age % 30;
        var age = year_age +"."+month_age;
	
         document.myForm.age.value = age;
	
} 





