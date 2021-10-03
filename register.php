<?php require './templates/header.php'; ?>
<?php session_start(); ?>

<div class="register">
    <form action="./controllers/register_controller.php" method="post">
        
        <h1>Register</h1>
        <p class="error">
            <?php
                if (isset($_SESSION['register-error']))
                {
                    echo $_SESSION['register-error'];
                } 
            ?>
        </p>
        <div class="input">
            <label for="username">name:</label>
            <input
                type="text"
                name="username"
                id='username'
                placeholder= 'Your name ...'
                >
        </div>
        <div class="input">
            <label for="email">email:</label>
            <input
                type="email"
                name="email"
                id='email'
                placeholder="Your email ..."
            >
        </div>
        <div class="input">
            <label for="pwd">password:</label>
            <input
                type="password"
                name="pwd"
                id='pwd'
                placeholder="Your password ..."    
            >
        </div>
        <button type='submit' name='submit'>register</button>
        <a href="login.php">Already have an account ? login here</a>
    </form>
</div>

<?php require './templates/footer.php'; ?>
