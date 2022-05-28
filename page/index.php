<?php
    include ('../include/header.php');
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0");
?>

    <!-- google map iframe -->

    <iframe src="googlemap.php"  style="overflow:hidden; height:100vh; width:100%"  scrolling="no"></iframe>


    <?php
    include ('../include/footer.php');
    ?>


    <!-- back to top -->
    <script src="../js/back_to_top.js"></script>