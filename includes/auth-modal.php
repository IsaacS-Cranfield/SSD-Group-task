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
                <input type="password" id="loginPassword" placeholder="Enter Password" name="password" required>
                <span class="loginVisibility" onclick="toggleLoginPasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>

            <button type="submit" name="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color: rgb(241, 241, 241); display: flex; justify-content: space-between; align-items: center;">
            
            <button type="button" class="signbtn" id="signupBtn">Sign Up</button>
            
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
                <input type="password" id="signPassword"  name="password" placeholder="Enter Password" required>
                <span class="signVisibility" onclick="toggleSignupPasswordVisibility()">
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

            <label for="role">I am a:</label>
            <select name="role" id="role">
                <option value="client">Client</option>
                <option value="trainer">Trainer</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="signup" id="signupSubmitBtn" class="submit" value="Sign Up">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color: rgb(241, 241, 241); display: flex; justify-content: space-between; align-items: center;">
            
            <button type="button" id="signupBackBtn" class="backToLogin" >Back to Login</button>
            
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
        var navLinks = document.querySelector('.nav-links');
        var hamburgerIcon = document.querySelector('.hamburger i');

        // function to close hamburger menu when modals are opened
        function closeHamburgerMenu() {
            if (navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                document.body.classList.remove('no-scroll');
                // Change hamburger icon back to bars
                if (hamburgerIcon) {
                    hamburgerIcon.classList.replace('fa-xmark', 'fa-bars');
                }
            }
        }

        // Open login modal
        document.getElementById('navLogin').onclick = function () {
            closeHamburgerMenu(); // Close hamburger menu if open
            signupModal.style.display = "none"; // hide signup if open
            loginModal.style.display = "block"; // show login
        };

        // Open signup modal
        document.getElementById('signupBtn').onclick = function() {
            closeHamburgerMenu(); // Close hamburger menu if open
            loginModal.style.display = "none"; // hide login
            signupModal.style.display = "block"; // show signup
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

    function toggleLoginPasswordVisibility() {
        var passwordInput = document.getElementById('loginPassword');
        var icon = document.querySelector('.loginVisibility i');

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
 

    function toggleSignupPasswordVisibility() {
        var passwordInput = document.getElementById('signPassword');
        var icon = document.querySelector('.signVisibility i');

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