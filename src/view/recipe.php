<!DOCTYPE html>
<html>
    <head>
        <?php include 'parts/head.php' ?>
    </head>
    <body>
        <header>
            <?php include 'parts/header.php' ?>
        </header>

        <div class="recipe-site">
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/src/view/parts/recipe_body.php' ?>
            <?php require_once $_SERVER['DOCUMENT_ROOT'].'/src/view/parts/comments.php' ?>
        </div>

        <footer>
            <?php include 'parts/footer.php' ?>
        </footer>
    </body>

</html>
