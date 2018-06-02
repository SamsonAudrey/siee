
	<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('types/create'); ?>

    <label for="nomtype">Nom du type</label>
    <input type="input" name="nomtype" placeholder="particulier" /><br />

    <input type="submit" name="submit" value="Création type" />

</form>