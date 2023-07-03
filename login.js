function forgotPassword()
{
    alert("A request has been received to change the password for your MAIYIFUDE account." + '\n\n' +
    "We have sent a password reset code to your email.");
}

function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function valid_name(){
    var name = document.getElementById('name');
    
    if (lengthRestriction(name, 6, 8))
        {
            if (isAlphanumeric(name, "Please enter a valid name with numbers and letters only.")){ 
                return true;
            }
        }
    
    function lengthRestriction(elem,min,max)
    {
        var uInput = elem.value;
        if (uInput.length >= min && uInput.length <= max)
        {
                return true;
        }
        else{
            alert("Please enter your name between " + min + " and " + max + " characters");
            elem.focus;
            return false;
        }
    }
    
    // alphanumeric
    function isAlphanumeric(elem, helperMsg)
    {
        var alphaExp = /^[a-zA-Z0-9]+$/;
        if (elem.value.match(alphaExp)){
                return true;
        }
        else
        {
            alert(helperMsg);
            elem.focus;
            return false;
        }
    } 
}