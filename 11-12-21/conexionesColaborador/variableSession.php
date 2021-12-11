        <?php
            session_start();
            if(!isset($_SESSION["dni"])){
                header("location:../index.php");
            }
        ?>