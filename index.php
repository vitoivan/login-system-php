<?php session_start()  ?>
<?php require('templates/header.php')  ?>
<?php 
    if (!isset($_SESSION['user_name']))
    {
        header ('location: login.php');
    }    
?>
<div class="home">
    <h1>Seja bem vindo <span class='username'>
        <?php echo $_SESSION['user_name']; ?></span>!
    </h1>
    <a href="logout.php"><button type='button'>Logout</button></a>
</div>

<?php require('templates/footer.php')  ?>