<h3>Su archivo se a cargado correctamente</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('utilerias/validaxml', 'Subir otro Xml!'); ?></p>