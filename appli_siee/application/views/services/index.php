<h2><?php echo $title; ?></h2>

<?php foreach ($services as $services_item): ?>

        <h3><?php echo $services_item['idservice']; ?></h3>
        <div class="main">
                <?php echo $services_item['appellationservice']; ?>
        </div>
        <p><a href="<?php echo site_url('services/'.$services_item['idservice']); ?>">Voir le service</a></p>

<?php endforeach; ?>