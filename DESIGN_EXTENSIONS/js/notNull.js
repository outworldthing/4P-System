
function validateForm() {
  var a = document.forms["signupForm"]["signupFirstName"].value;
  var b = document.forms["signupForm"]["signupLastName"].value;
  var c = document.forms["signupForm"]["signupUsername"].value;
  var d = document.forms["signupForm"]["signupConfirmPassword"].value;
  var e = document.forms["signupForm"]["signupPassword"].value;
  var password = document.getElementById("signupPassword").value;
  var confirmPassword = document.getElementById("signupConfirmPassword").value;
  
  if (a == "" || a == null || b == "" || b == null || c == "" || c == null || d == "" || d == null || e == "" || e == null) {
    alert("Please Fill Out The Blank Fields.");
    return false;
  } else if (a == "" || a == null) {
	alert("Please Fill Out The Blank Fields.");
    return false;  
  }	else if (b == "" || b == null) {
	alert("Please Fill Out The Blank Fields.");
    return false;  
  } else if (c == "" || c == null) {
	alert("Please Fill Out The Blank Fields.");
    return false;  
  } else if (d == "" || d == null) {
	alert("Please Fill Out The Blank Fields.");
    return false;  
  } else if (e == "" || e == null) {
	alert("Please Fill Out The Blank Fields.");
    return false;  
  } 
  
	if (password != confirmPassword) {
		alert("Passwords do not match.");
		return false;
	}
	return true;

  
}
