<h2>This is my blog</h2>
<?php if($query):foreach($query as $post):?>
<h4><?php echo $post->title;?> (<?php echo $post->date;?>)</h4>
<?php echo $post->description;?>
<?php endforeach; else:?>
<h4>Categoria vacia!</h4>
<?php endif;?>
<br>  
<a href="<?php echo site_url('welcome') ?>" >Volver</a><?php

