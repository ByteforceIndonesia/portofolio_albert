<?php
/**
 * Created by PhpStorm.
 * User: JohnNate
 * Date: 08/12/17
 * Time: 23.29
 */
?>
<html>
<body>
<?php echo form_open_multipart('admin/editarticle') ?>

<input type="hidden" name="id" value="<?php echo $article->id ?>">

<div class="form-group">
    <label for="name">Title:</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $article->title ?>">
</div>

<div class="form-group">
    <label for="name">Content :</label>
    <textarea class="form-control" id="content" name="content"><?php echo $article->content ?></textarea>
</div>

<div class="form-group">
    <label for="link">Banner Image:</label>
    <input type="file" class="form-control" id="link" name="new_port">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close() ?>
</body>
</html>