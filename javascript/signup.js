function trysignup(){
   
    let em= document.getElementById("email").value;
    let pw= document.getElementById("password").value;

    if(em.trim()!=="" && pw.trim()!==""){
       
        $.ajax({
            url:"AjaxHandler/signupAjax.php",
            type:"POST",
            dataType:"json",
            data:{email:em, password:pw, action:"signupUser"},
            beforeSend:function(){
                //if you want to do something before the call
                // alert("about to make a ajax call");
                
            },
            success:function(rv){
                //if ajax call was successful result will be in rv
                alert(JSON.stringify(rv));

                // if(rv['status']=="ALL OK")
                // {
                //     document.location.replace("attendance.php");
                // }
                // else{
                //     // alert(rv['status']);
                //     $("#errordiv").addClass("applyerrordiv");
                //     $("#errormessage").text(rv['status']);
                // }
            },
            error:function(){
                alert("oops something went wrong");
            }
        })
    }
    else{
        alert ("Username and password must not be empty.");
    }
}
  
  
  
  // 1. Email validation
  function validateEmail(email) {
    // Basic regex: ensures format local@domain.tld
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  document.querySelector('#email').addEventListener('input', e => {
    const ok = validateEmail(e.target.value);
    document.getElementById('email-error').style.display = ok ? 'none' : 'block';
    document.getElementById('submit-btn').disabled = !ok;
  });

  document.getElementById('btnsignup').addEventListener('click', e => {
    // alert("hello");
    e.preventDefault();
    const email = document.getElementById('email').value;
    if (!validateEmail(email)) {
      alert('Please enter a valid email.');
      return;
    }
    // proceed with signup flow (e.g., send to backend)
    // console.log('Valid email, proceed.');
    // alert("hello");
    trysignup();
  });

  

