<?php $this->titre = "Editer un film préféré"; ?>
<form method="POST" name="editFavoriteMovie" action="index.php?action=editFavoriteMovie">
    <label>Titre :</label>
    <select name="filmID" <?php
    if (!$isItACreation): echo "disabled";
    endif;
    ?>>
                <?php
                // si c'est une création, on crée la liste des films dynamiquement
                if ($isItACreation) {
                    // s'il y a des résultats
                    if ($films) {
                        foreach ($films as $film) {
                            ?>
                    <option value="<?= $film->getFilmId(); ?>"><?= $film->getTitre(); ?></option>
                    <?php
                }
            }
        }
        // sinon, c'est une modification, nous n'avons qu'une seule option dans la liste
        else {
            ?>
            <option selected="selected" value="<?= $preference['filmID'] ?>"><?= $preference['titre'] ?></option>
            <?php
        }
        ?>
    </select>
    <div class="error">
        <?php
        if (!$aFilmIsSelected) {
            echo "Veuillez renseigner un titre de film.";
        }
        ?>
    </div>
    <label>Commentaire :</label>
    <textarea name="comment"><?= $preference['commentaire'] ?></textarea>
    <br/>
    <input type="hidden" value="<?= $preference['userID'] ?>" name="userID"/>
    <?php
    // si c'est une modification, c'est une information dont nous avons besoin
    if (!$isItACreation) {
        ?>
        <input type="hidden" name="modificationInProgress" value="true"/>
        <input type="hidden" name="filmID" value="<?= $preference['filmID'] ?>"/>
        <?php
    }
    ?>
    <input type="submit" name="saveEntry" value="Sauvegarder"/>
    <input type="submit" name="backToList" value="Retour à la liste"/>
</form>
