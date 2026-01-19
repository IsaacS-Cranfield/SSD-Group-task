<!-- Login Modal -->
<div id="id01" class="modal">
    <form class="modal-content animate" action="/authenticate.php"method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'"
                class="close" title="Close Modal">&times;</span>
            <img src="assets/images/FitLife-logo.png" alt="logo" class="logo">
        </div>

        <div class="container">

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <div class="password-container">
                <label for="psw"><b>Password</b></label>
                <input type="password" id="password" placeholder="Enter Password" name="psw" required>
                <span class="visibility" onclick="togglePasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color: rgb(241, 241, 241); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <button type="button" id="cancelBtn" class="cancelbtn">Cancel</button>
                <button type="button" class="signbtn" id="signupBtn">Sign Up</button>
            </div>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
</div>
<!-- Signup modal -->
<div id="id02" class="modal" style="display:none;">
    <form class="modal-content animate" action="/signup.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'"
                class="close" title="Close Modal">&times;</span>
            <img src="assets/images/FitLife-logo.png" alt="logo" class="logo">
        </div>

        <div class="container">

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <div class="password-container">
                <label for="psw"><b>Password</b></label>
                <input type="password" id="password" placeholder="Enter Password" name="psw" required>
                <span class="visibility" onclick="togglePasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
            <button type="submit">Sign Up</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color: rgb(241, 241, 241); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <button type="button" id="cancelBtn" class="cancelbtn">Cancel</button>
                <button type="button" class="backToLogin" id="backToLogin">Back to Login</button>
            </div>
        </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var loginModal = document.getElementById('id01');
        var signupModal = document.getElementById('id02');

        // Open login modal
        document.getElementById('loginBtn').onclick = function () {
            signupModal.style.display = "none"; // hide signup if open
            loginModal.style.display = "block"; // show login
        };

        // Close login modal
        document.getElementById('cancelBtn').onclick = function() {
            loginModal.style.display = "none";
        };

        // Open signup modal
        document.getElementById('signupBtn').onclick = function() {
            loginModal.style.display = "none"; // hide login
            signupModal.style.display = "block"; // show signup
        };

        // Close signup modal
        document.getElementById('cancelSignup').onclick = function() {
            signupModal.style.display = "none";
        };

        // Back to login
        document.getElementById('backToLogin').onclick = function() {
            signupModal.style.display = "none";
            loginModal.style.display = "block";
        };

        // Click outside closes modal
        window.onclick = function(event) {
            if (event.target == loginModal) {
                loginModal.style.display = "none";
            }
            if (event.target == signupModal) {
                signupModal.style.display = "none";
            }
        }
    });

    function togglePasswordVisibility(passwordId, iconElement) {
        var passwordInput = document.getElementById(passwordId);
        var icon = iconElement.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }
</script>