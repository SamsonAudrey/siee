<h2><?php echo $title; ?></h2>

<?php foreach ($types as $types_item): ?>

        <h3><?php echo $types_item['idtype']; ?></h3>
        <div class="main">
                <?php echo $types_item['nomtype']; ?>
        </div>
        <p><a href="<?php echo site_url('types/'.$types_item['idtype']); ?>">Voir type</a></p>

<?php endforeach; ?>