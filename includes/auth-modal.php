<!-- Login Modal -->
<div id="id01" class="modal">
    <form class="modal-content animate" action="authenticate.php" method="post" action="">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'"
                class="close" title="Close Modal">&times;</span>
            <img src="assets/images/FitLife-logo.png" alt="logo" class="logo">
        </div>
        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<p class="success">' . htmlspecialchars($_SESSION['success_message']) . '</p>';
            unset($_SESSION['success_message']);
        }
        ?>
        <div class="container">

            <label for="email"><b>Email</b></label>
            <input type="text" name="email" id="login_email" placeholder="Enter Email" required autocomplete="email">
            <div class="password-container">
                <label for="password"><b>Password</b></label>
                <input type="password" id="password" placeholder="Enter Password" name="password" required>
                <span class="visibility" onclick="togglePasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
            <button type="submit" name="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color: rgb(241, 241, 241); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <button type="button" id="loginCancelBtn" class="cancelbtn">Cancel</button>
                <button type="button" class="signbtn" id="signupBtn">Sign Up</button>
            </div>
            <span class="password">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>

<!-- Signup modal -->
<div id="id02" class="modal" style="display:none;">
    <form class="modal-content animate" method="post" action="signup.php">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'"
                class="close" title="Close Modal">&times;</span>
            <img src="assets/images/FitLife-logo.png" alt="logo" class="logo">
        </div>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" name="email" id="signup_email" placeholder="Enter Email" autocomplete="email" required>
            <label for="first_name"><b>First Name</b></label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" required>
            <label for="last_name"><b>Last Name</b></label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" required>
            <div class="password-container">
                <label for="password"><b>Password</b></label>
                <input type="password" id="password"  name="password" placeholder="Enter Password" required>
                <span class="visibility" onclick="togglePasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
            <div class="password-container">
                <label for="Cpassword"><b>Confirm Password</b></label>
                <input type="password" id="Cpassword" name="Cpassword" placeholder="Confirm password" required>
                <span class="Cvisibility" onclick="toggleCpasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
            <input type="submit" name="signup" id="signupSubmitBtn" value="Sign Up">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color: rgb(241, 241, 241); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <button type="button" id="signupCancelBtn" class="cancelbtn">Cancel</button>
                <button type="button" id="signupBackBtn" class="backToLogin" >Back to Login</button>
            </div>
        </div>
    </form>
</div>
<script>

    <?php if (!empty($_SESSION['open_login_modal'])): ?>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('id01').style.display = 'block';
            document.getElementById('id02').style.display = 'none';
        });

    <?php unset($_SESSION['open_login_modal']); endif; ?>

    document.addEventListener('DOMContentLoaded', function() {
        var loginModal = document.getElementById('id01');
        var signupModal = document.getElementById('id02');

        // Open login modal
        document.getElementById('navLogin').onclick = function () {
            signupModal.style.display = "none"; // hide signup if open
            loginModal.style.display = "block"; // show login
        };

        // Close login modal
        document.getElementById('loginCancelBtn').onclick = function() {
            loginModal.style.display = "none";
        };

        // Open signup modal
        document.getElementById('signupBtn').onclick = function() {
            loginModal.style.display = "none"; // hide login
            signupModal.style.display = "block"; // show signup
        };

        // Close signup modal
        document.getElementById('signupCancelBtn').onclick = function() {
            signupModal.style.display = "none";
        };

        // Back to login
        document.getElementById('signupBackBtn').onclick = function() {
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

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var icon = document.querySelector('.visibility i');

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
    function toggleCpasswordVisibility() {
        var passwordInput = document.getElementById('Cpassword');
        var icon = document.querySelector('.Cvisibility i');

        if (passwordInput.type === 'password'){
            passwordInput.type = 'text';
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            passwordInput.type = 'password';
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }   
    }
</script>