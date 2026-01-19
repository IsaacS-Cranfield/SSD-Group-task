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

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

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

<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('id01');
    var loginBtn = document.getElementById('loginBtn');
    var cancelBtn = document.getElementById('cancelBtn');
    var signupBtn = document.getElementById('signupBtn');

    if (loginBtn) {
        loginBtn.onclick = function () {
            modal.style.display = "block";
        };
    }
    if (cancelBtn) {
        cancelBtn.onclick = function() {
            modal.style.display = "none";
        };
    }
    if (signupBtn) {
        signupBtn.onclick = function() {
            modal.style.display = "none";
            var signupModal = document.getElementById('id01-signup');
            if (signupModal) {
                signupModal.style.display = "block";
            }
        };
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
</script>
</script>
