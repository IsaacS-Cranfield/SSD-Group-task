<div id="id01" class="modal">

    <form class="modal-content animate" action="/action_page.php"
        method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'"
                class="close" title="Close Modal">&times;</span>
            <img src="assets/images/FitLife-logo.png" alt="logo" class="logo">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
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

                <div class="container" style="background-color: rgb(241, 241, 241);">
                    <button type="button" id="cancelBtn" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
<script>
    var modal = document.getElementById('id01');
    document.getElementById('loginBtn').onclick = function () {
        modal.style.display = "block";
    };
    document.getElementById('cancelBtn').onclick = function() {
        document.getElementById('id01').style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var visibility = document.querySelector('.visibility i');

        if (passwordInput.type === 'password'){
            passwordInput.type = 'text';
            visibility.classList.remove('fa-eye-slash');
            visibility.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            visibility.classList.remove('fa-eye');
            visibility.classList.add('fa-eye-slash');
        }   
    }
</script>
