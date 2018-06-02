<h2><?php echo $title; ?></h2>

<?php foreach ($objets as $objets_item): ?>

        <h3><?php echo $objets_item['idobjet']; ?></h3>
        <div class="main">
                <?php 
                echo $objets_item['appellationobjet']."     type : ".$objets_item['idtype']; ?>
        </div>
        <p><a href="<?php echo site_url('objets/'.$objets_item['idobjet']); ?>">Voir l'objet</a></p>

<?php endforeach; ?>