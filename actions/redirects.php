<?php
#redirect to previous page if set, or to index page, if prev page is not set
function redirect_to_previous_page() {

    if (!empty($_SESSION['previous_page'])) {
echo '<script type="text/javascript">
    window.location = "'.$_SESSION['previous_page'].'"
    </script>';
    } else {
    echo '<script type="text/javascript">
        window.location = "/index.php"
        </script>';
    }
}
?>
