<h1>Home</h1>


<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

?>
<table class="table">
    <thead>
    <th>Titre</th>
    <th>Contenu</th>
    <!--<th>Date</th>-->
    <th>Actions</th>
    </thead>
    <tbody>
    <?php
    foreach($posts as $post){

        ?>
        <tr>
            <td><a href="/post/<?php echo $post->getId();?>"><?php  echo $post->getTitle(); ?></a></td>
            <td><?php echo $post->getContent(); ?></td>

            <td><a href="/edit/<?php echo $post->getId();?>" class="btn text-white bg-primary">Modifier</a>
                <a href="/delete/<?php echo $post->getId();?>" class="btn text-white bg-danger">Delete <?php echo $post->getId(); ?></a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
