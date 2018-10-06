<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>              <!-- display errors of the form validation -->

<?php echo form_open('news/create'); ?>         <!-- <form name=”create” action=”application/views/news/create.php” method=”POST”> -->

    <label for="title">Title</label>
    <input type="input" name="title" /><br />       <!-- field "title" -->

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />         <!-- field "text" -->

    <input type="submit" name="submit" value="Create news item" />

</form>
