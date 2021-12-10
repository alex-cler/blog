

<div class="container">
    <h4>Modifier</h4>
    <form action="/modify" method="get">
        <input type="hidden" name="id" value="<?php echo $post->getId(); ?>">
        <input type="hidden" name="userId" value="<?php //echo $post->getUserId(); ?>">
        <div class="form-group">
            <label for="title">Title : </label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $post->getTitle(); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content : </label>
            <textarea type="textarea" name="content" id="content" class="form-control" rows="10"><?php echo $post->getContent(); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>