
<?php 
    include('includes/head.php');
    //session_start();
?>
<p><br><br><br></p>
    <div id="content">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>  

    <div id="form">
    <center>
            
            <form action='loginCheck.php' method='POST'>
            Username: <input type='text' name='username'><br>
            Password: <input type='password' name='password'><br>
            <div class="btn-group">
                <button class="btn" type="submit" name="login" value="Log in"> Log in </button>
            </div>
            </form>
        
        <br><a href="register.php" id="register"><span class="label label-success">Register</span></a><br>
    </center>
    </div>
</body>
</html>