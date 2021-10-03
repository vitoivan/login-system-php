<?php require './templates/header.php'; ?>

<div class="register">
    <form action="./controllers/login_controller.php" method="post">

        <h1>Log in</h1>
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
        <button type='submit' name='submit'>log in</button>
        <a href="register.php">Don't have an account ? register here</a>
    </form>
</div>

<?php require './templates/footer.php'; ?>
