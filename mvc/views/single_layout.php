<?php require "inc/head.php" ?>
<body>
    <!-- Page Container -->
    <div id="page-container">
        <!-- Main Container -->
        <main id="main-container">
        <!-- Page Content -->
        <?php include "./mvc/views/pages/".$data['Page'].".php" ?>
        <!-- END Page Content -->
        </main>
    </div>
    <!-- END Page Container -->
    <?php include "inc/script.php" ?>
</body>
</html>
