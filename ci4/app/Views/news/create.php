
<link rel="stylesheet" type="text/css" href="news_style.css" />
<link rel="icon" href="image/profile_picture.png" />

<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<div id="newsform">
<form action="create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    <br>

    <label for="body">Text</label>
    <textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
    <br>

    <input id="submitformnews" type="submit" name="submit" value="Create news item">
</form>
</div>