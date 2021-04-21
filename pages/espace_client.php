<?php
require_once '../component/header.php';
require_once '../functions/sql.php';
require_once 'bdd.php';

if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $clientinfo = getClient($dbh, $id);

    $fname = $clientinfo['prenom'];
    $lname = $clientinfo['nom'];
    $mail = $clientinfo['mail'];
    $pwd = $clientinfo['password'];
    $address = $clientinfo['adresse'];
    $pc = $clientinfo['codePostal'];
    $town = $clientinfo['ville'];
    $cid = $clientinfo['pays_id'];
    $img = $clientinfo['image'];
    $country = getCountrybyid($dbh, $cid);


    ?>
    <div class="content">
        <div class="client">
            <img class="mobile_profile_image" style="width: 100px; margin-right: 30px;" src="<?= $img ?>">
            <form method="post" action="update.php">
                <div>
                    <label>Prénom</label>
                    <input name="fname" type="text" value="<?= $fname ?>">
                </div>
                <div>
                    <label>Nom</label>
                    <input name="lname" type="text" value="<?= $lname ?>">
                </div>
                <div>
                    <label>Mail</label>
                    <input name="mail" type="email" value="<?= $mail ?>">
                </div>
                <div>
                    <label>Mot de passe</label>
                    <input name="pwd" type="password" value="<?= $pwd ?>">
                </div>
                <div>
                    <label>Adresse</label>
                    <input name="address" type="text" value="<?= $address ?>">
                </div>
                <div>
                    <label>Code Postal</label>
                    <input name="PC" type="text" value="<?= $pc ?>">
                </div>
                <div>
                    <label>Ville</label>
                    <input name="town" type="text" value="<?= $town ?>">
                </div>
                <div>
                    <label>Pays</label>
                    <select name="civility" id="">
                        <option default value="<?php echo $cid?>"><?php echo $country['nom_fr_fr'] ?></option>
                        <?php
                        $allCountry = getCountry($dbh);
                        foreach($allCountry as $country){
                            $countryId = $country['id'];
                            $countryName = $country['nom_fr_fr'];
                            if($countryId != $cid){
                                ?>
                                <option value="<?php echo $countryId?>"><?php echo $countryName; ?></option>

                                <?php
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <button type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>

    </body>
    </html>

    <?php
}
?>