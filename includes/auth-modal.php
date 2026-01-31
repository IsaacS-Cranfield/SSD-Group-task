<!-- Login Modal -->
<div id="id01" class="modal">
    <form class="modal-content animate" action="authenticate.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'"
                class="close" title="Close Modal">&times;</span>
            <img src="assets/images/FitLife-logo.png" alt="logo" class="logo">
        </div>
        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<p class="success">' . htmlspecialchars($_SESSION['success_message']) . '</p>';
            unset($_SESSION['success_message']);
        } elseif (isset($_SESSION['login_fail'])) {
            echo '<p class="error">' . htmlspecialchars($_SESSION['login_fail']) . '</p>';
            unset($_SESSION['login_fail']);
        }
        ?>
        <div class="container">

            <label for="email"><b>Email</b></label>
            <input type="email" class="form-input" name="email" id="login_email" placeholder="Enter Email" required autocomplete="email" 
                value="<?php echo $_SESSION['temp_email'] ?? ''; ?>"> <!-- retain input value after failed submission -->

            <div class="password-container">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-input" id="loginPassword" placeholder="Enter Password" name="password" required>
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
            <label for="first_name"><b>First Name</b></label>
            <input type="text" class="form-input" id="first_name" name="first_name" placeholder="Enter First Name" required 
                value="<?php echo $_SESSION['temp_first_name'] ?? ''; ?>"> <!-- retain input value after failed submission -->


            <label for="last_name"><b>Last Name</b></label>
            <input type="text" class="form-input" id="last_name" name="last_name" placeholder="Enter Last Name" required 
                value="<?php echo $_SESSION['temp_last_name'] ?? ''; ?>">
            
            <!-- Display email error if set -->
            <?php 
            if (isset($_SESSION['email_error'])) {
                echo '<p class="error">' . htmlspecialchars($_SESSION['email_error']) . '</p>';
                unset($_SESSION['email_error']);
            }
            ?>
            <label for="email"><b>Email</b></label>
            <input type="email" class="form-input" name="email" id="signup_email" placeholder="Enter Email" autocomplete="email" required
                value="<?php echo $_SESSION['temp_email'] ?? ''; ?>">


            <!-- Display mobile number error if set -->
            <?php 
            if (isset($_SESSION['mobile_error'])) {
                echo '<p class="error">' . htmlspecialchars($_SESSION['mobile_error']) . '</p>';
                unset($_SESSION['mobile_error']);
            }
            ?>
            <label for="mobile"><b>Mobile Number (Optional)</b></label>
            <input type="text" class="form-input" name="mobile" id="signup_mobile" placeholder="Enter Mobile Number"
                value="<?php echo $_SESSION['temp_mobile'] ?? ''; ?>">

            <div class="password-container">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-input" id="signPassword"  name="password" placeholder="Enter Password" required>
                <span class="signVisibility" onclick="toggleSignupPasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
            <div class="password-container">
                <label for="Cpassword"><b>Confirm Password</b></label>
                <input type="password" class="form-input" id="Cpassword" name="Cpassword" placeholder="Confirm password" required>
                <span class="Cvisibility" onclick="toggleCpasswordVisibility()">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
            <!-- Display match error if passwords dont match -->
            <?php 
            if (isset($_SESSION['match_error'])) {
                echo '<p class="error">' . htmlspecialchars($_SESSION['match_error']) . '</p>';
                unset($_SESSION['match_error']);
            }
            ?>

            
            <div class="role-container">
                <label for="role">I am a:</label>
                <select name="role" id="role">
                    <!-- Retain selected role after failed submission -->
                    <option value="client"<?php echo (isset($_SESSION['temp_role']) && $_SESSION['temp_role'] === 'client') ? ' selected' : ''; ?>>Client</option>
                    <option value="trainer"<?php echo (isset($_SESSION['temp_role']) && $_SESSION['temp_role'] === 'trainer') ? ' selected' : ''; ?>>Trainer</option>
                    <option value="admin"<?php echo (isset($_SESSION['temp_role']) && $_SESSION['temp_role'] === 'admin') ? ' selected' : ''; ?>>Admin</option>
                </select>
            </div>

            <?php 
            if (isset($_SESSION['admin_code_error'])) {
                echo '<p class="error">' . htmlspecialchars($_SESSION['admin_code_error']) . '</p>';
                unset($_SESSION['admin_code_error']);
            }
            ?>

            <div class="admin-code-container" id="admin-code-container" style="display: <?php echo (isset($_SESSION['temp_role']) && $_SESSION['temp_role'] === 'admin') ? 'block' : 'none'; ?>;">
                <label for="admin_code"><b>Admin Code</b></label>
                <input type="password" class="form-input" id="admin_code" name="admin_code" placeholder="Enter 4-digit Code">
            </div>

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

    <?php if (!empty($_SESSION['open_signup_modal'])): ?>

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('id01').style.display = 'none';
            document.getElementById('id02').style.display = 'block';
        });

    <?php unset($_SESSION['open_signup_modal']); endif; ?>


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

    document.getElementById('role').addEventListener('change', function() {
        const adminSection = document.getElementById('admin-code-container');
        const adminInput = document.getElementById('admin_code');
        
        if (this.value === 'admin') {
            adminSection.style.display = 'block';
            adminInput.setAttribute('required', 'required'); // Make it mandatory
        } else {
            adminSection.style.display = 'none';
            adminInput.removeAttribute('required'); // Remove requirement for Clients/Trainers
        }
    });

</script>