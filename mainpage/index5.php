<?php
include("cods/baglan.php");
include("cods/yonlendir.php");
include("cods/head.php");
?>
<body>
    <div class="container-sm">
        <?php
        include("cods/navbar.php")
            ?>
        <div class="row">
            <?php
            include("cods/" . $page);
            ?>
        </div>
    </div>
    <?php
    include("cods/footer.php");
    ?>