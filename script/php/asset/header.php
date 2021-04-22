<header>
    <nav>
        <?php
        if(isset($_SESSION["matricule"])){
            ?>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <?php
        }
        ?>
        <label class="logo">BT</label>
        <?php
        if(isset($_SESSION["matricule"])){
        ?>
        <ul>
            <li class="firstLi"><a href="index.php">Acceuil</a></li>
            <li><a href="script/php/global/deconnexion.php">Deconnexion</a></li>
        </ul>
        <?php
        }
        ?>

    </nav>
</header>