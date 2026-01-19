<div id="id01-signup" class="modal">

    <form class="modal-content animate" action="/action_page.php"
        method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01-signup').style.display='none'"
                class="close" title="Close Modal">&times;</span>
            <img src="assets/images/FitLife-logo.png" alt="logo" class="logo">
        </div>

       <div class="container">

            <label for="fn"><b>First Name</b></label>
            <input type="first name" placeholder="Enter First Name" name="FN" required>

            <label for="ln"><b>Last Name</b></label>
            <input type="last name" placeholder="Enter last name" name="LN" required>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            
            <label for="eml"><b>Email</b></label>
            <input type="email" placeholder="Enter email" name="eml" required>

            <label for="mob"><b>Mobile</b></label>
            <input type="mobile" placeholder="mobile number" name="mob" required>
            
            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                </div>

                <div class="container" style="background-color: rgb(241, 241, 241); display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <button type="button" id="cancelBtn" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signbtn">Sign Up</button>
                    </div>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>

<script>
    var signupModal = document.getElementById('id01-signup');

    // Optional: If you want to show this modal from somewhere else, add a trigger here

    document.getElementById('cancelBtn').onclick = function() {
        signupModal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == signupModal) {
            signupModal.style.display = "none";
        }
    }
</script>
