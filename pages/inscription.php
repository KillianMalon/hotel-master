<?php
require_once '../component/header.php';
require_once '../functions/sql.php';
require_once 'bdd.php';

?>
<div class="content">
<form action="" method="post">
    <label for="" >Nom :</label>
    <input type="text" name="lastName">
    <br>
    <label for="">Prénom :</label>
    <input type="text" name="firstName">
    <br>
    <label for="">Adresse email</label>
    <input type="mail" name="mail">
    <br>
    <label for="">Confirmer Adresse email</label>
    <input type="mail" name="mailVerif">
    <br>
    <label for="">Mot de passe</label>
    <input type="password" name="password">
    <br>
    <label for="">Confirmer mot de passe</label>
    <input type="password" name="passwordVerif">
    <br>
    <label for="">Adresse</label>
    <input type="text" name="address">
    <br>
    <label for="">Code postal</label>
    <input type="number" name="postalCode">
    <br>
    <label for="">Ville</label>
    <input type="text" name="city">
    <br>
    <select name="civility" id="">
    <?php
        $allCountry = getCountry($dbh);
        foreach($allCountry as $country){
            $countryId = $country['id'];
            $countryName = $country['nom_fr_fr'];
<<<<<<< HEAD
    ?>
    <option value="<?php echo $countryId?>"><?php echo $countryName; ?></option>
=======
       
    ?>
        <option value="<?php echo isset($countryId) and !empty($countryId)? $countryId : " "?>"><?php echo isset($countryName) and !empty($countryName)? $countryName : " "?></option>
>>>>>>> origin/master
<?php
 }
?>
    </select>
    <br>
    <label for="">Civilité</label>
    <select name="" id="">
      <option value="1">Monsieur</option>
      <option value="2">Madame</option>
    </select>
</form>

</div>

    </body>
</html>