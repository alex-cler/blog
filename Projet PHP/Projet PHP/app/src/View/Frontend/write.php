<?php

?>

<div class="container">
    <h4>Ajouter un article</h4>
    <form action="/add" method="get">
        <input type="hidden" name="userId" value="<?php //$post->getUserId(); ?>">
        <div class="form-group">
            <label for="title">Title : </label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content : </label>
            <textarea type="text" name="content" id="content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
</div>