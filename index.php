<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: user.php");
    }
?>
<?php
    include_once"header.php";
    
?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header class="talk">TALK Here</header>
            <form action="#" method = "POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name:</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name:</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    </div>
                    <div class="field input">
                        <label for="">Email:</label>
                        <input type="email" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="field input">
                        <label for="">Enter new password:</label>
                        <input type="password" name="password"  placeholder="Enter new password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="">Profile Pic:</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Sign up">
                    </div>
            </form>
            <div class="link">Already an account? <a href="login.php">Login here</a></div>
        </section>
    </div>


    <script src="JS/pass-show-hide.js"></script>
    <script src="JS/signup.js"></script>
</body>
</html>