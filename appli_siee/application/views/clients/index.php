<h2><?php echo $title; ?></h2>

<?php foreach ($clients as $clients_item): ?>

        <h3><?php echo $clients_item['idclient']; ?></h3>
        <div class="main">
                <?php 
                echo $clients_item['nomclient']." ".$clients_item['prenomclient']; ?>
        </div>
        <p><a href="<?php echo site_url('clients/'.$clients_item['idclient']); ?>">Voir le client</a></p>

<?php endforeach; ?> 
