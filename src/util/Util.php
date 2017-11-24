<?php

class Util {

    /** Redirect to previous page if set, or to index page, if prev page is not set
     */
    public static function redirectToPreviousPage() {

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

    public static function redirectTo($path) {
        echo '<script type="text/javascript">
            window.location = "/src/view/'.$path.'"
            </script>';
    }
}
?>
