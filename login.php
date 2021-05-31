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
        <section class="form login">
            <header class="talk">TALK Here</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for="">Email:</label>
                    <input type="text" name="email" placeholder="Enter email">
                </div>
                <div class="field input">
                    <label for="">Password:</label>
                    <input type="password" name="password" placeholder="Enter password">
                    <i class="fas fa-eye" ></i>
                </div>
                <div class="field button">
                    <input type="submit" value="LogIn">
                </div>
            </form>
            <div class="link">Didn't have an account? <a href="index.php">Signup here</a></div>
        </section>
    </div>


    <script src="JS/pass-show-hide.js"></script>
    <script src="JS/login.js"></script>
</body>

</html>