
<h1><?php echo $post->getTitle(); ?></h1>

<p><?php echo $post->getContent(); ?></p>
<p><?php echo $post->getUserId(); ?></p>


<pre>
<?php
print_r($comments) ;
print_r($comments[0]->getId());
?>
</pre>
