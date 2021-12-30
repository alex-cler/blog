<h1>Home</h1>


<?php
if (isset($_SESSION['LOGOUTMESSAGE'])){
    echo ('<p style="color:red">' . $_SESSION['LOGOUTMESSAGE'] . '</p>');
    unset($_SESSION['LOGOUTMESSAGE']);
}
if (isset($_SESSION['LOGINMESSAGE'])){
    echo ('<p style="color:green">' . $_SESSION['LOGINMESSAGE'] . '</p>');
    unset($_SESSION['LOGINMESSAGE']);
}

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
