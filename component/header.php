<?php session_start();

if (isset($index)){
    require_once "./functions/sql.php";
    $oui = "index existe";
} else {
    require_once "../functions/sql.php";
    $oui =  "index existe pas fdp";
}
if (isset($index)){
    require_once "./pages/bdd.php";
    $oui =  "index existe 2";
} else {
    require_once "bdd.php";
    $oui =  "index existe pas fd2p";
}

if (isset($_SESSION) and !empty($_SESSION)) {
    $uid = $_SESSION['id'];

    $user = getClient($dbh, $uid);
    $img = $user['image'];
    $name = $user['prenom'];
}




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar Dashboard Template</title>
    <?php
    //utiliser une seule page css pour plusieurs fichiers (pas au meme niveau de répertoire)
    if(isset($index) and $index = 1){
        ?>
        <link rel="stylesheet" href="./css/style.css">
        <?php
    }else{
        ?>
        <link rel="stylesheet" href="../css/style.css">
        <?php
    }
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>

<input type="checkbox" id="check">
<!--header area start-->
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <h3>Hotel <span>Nom</span></h3>
    </div>
    <?php if (isset($_SESSION['id']) and !empty($_SESSION['id'])){ ?>
        <div class="right_area">
            <a href="<?php echo (isset($index)) ? "./pages/logout.php" : "logout.php" ?>" class="logout_btn">Déconnexion</a>
        </div>
    <?php } else { ?>
        <div class="right_area">
            <a href="<?php echo (isset($index)) ? "./pages/inscription.php" : "inscription.php" ?>" class="logout_btn2">S'inscrire</a>
        </div>
        <div class="right_area">
            <a href="<?php echo (isset($index)) ? "./pages/connexion.php" : "connexion.php" ?>" class="logout_btn">Se connecter</a>
        </div>
    <?php } ?>
</header>
<!--header area end-->
<!--mobile navigation bar start-->
<?php if (isset($_SESSION['id'])){ ?>
    <div class="mobile_nav">
        <div class="nav_bar">
            <img src="<?= $img ?>" class="mobile_profile_image" alt="">
            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href="<?php echo (isset($index)) ? "index.php" : "../index.php"; ?>"><i class="fas fa-desktop"></i><span>Accueil</span></a>
            <a href="#"><i class="fas fa-table"></i><span>Mes Réservations</span></a>
            <a href="<?php echo (isset($index)) ? "./pages/espace_client.php" : "espace_client.php" ?>"><i class="fas fa-sliders-h"></i><span>Espace Client</span></a>
            <!--<a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
            <a href="pages/inscription.php"><i class="fas fa-info-circle"></i><span>About</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>-->
        </div>
    </div>


    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
        <div class="profile_info">
            <img src="<?= $img ?>" class="profile_image" alt="">
            <h4><?= $name ?></h4>
        </div>
        <a href="<?php echo (isset($index)) ? "index.php" : "../index.php"; ?>"><i class="fas fa-desktop"></i><span>Accueil</span></a>
        <a href="#"><i class="fas fa-table"></i><span>Mes Réservations</span></a>
        <a href="<?php echo (isset($index)) ? "./pages/espace_client.php" : "espace_client.php" ?>"><i class="fas fa-sliders-h"></i><span>Espace Client</span></a>
        <!--<a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
        <a href="pages/inscription.php"><i class="fas fa-info-circle"></i><span>About</span></a>
        <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>-->
    </div>
    <!--sidebar end-->
<?php } else{ ?>

    <div class="mobile_nav">
        <div class="mobile_nav_items">
            <a href="<?php echo (isset($index)) ? "index.php" : "../index.php"; ?>"><i class="fas fa-desktop"></i><span>Accueil</span></a>
            <!--<a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
            <a href="pages/inscription.php"><i class="fas fa-info-circle"></i><span>About</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>-->
        </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
        <a href="<?php echo (isset($index)) ? "index.php" : "../index.php"; ?>"><i class="fas fa-desktop"></i><span>Accueil</span></a>
        <!--<a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
        <a href="pages/inscription.php"><i class="fas fa-info-circle"></i><span>About</span></a>
        <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>-->
    </div>

<?php } ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });
    });
</script>