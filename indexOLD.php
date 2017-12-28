<?php
include_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hospital Emergency Service</title>
        <link rel="stylesheet" href="css/base.css" type="text/css" media="screen">
    </head>

    <body>

        <div class="container">
            <h1>Hospital Emergency Service</h1>

            <section class="main-content">
                <p>Help People Around You!!</p>
                <?php
                $temp = $_GET["action"];
                if($temp != md5('success')) {
                ?>
                <form action="submit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo md5("capture"); ?>" name="action">
                <p>
                    <input type="file" name="file" id="take-picture" accept="image/*" capture="camera">
                </p>
                    <input type="submit" value="Upload" name="upload">
                    <h1>Location Details</h1>
                    <div id="geo" class="geolocation_data"></div>
                    <p id="error"></p>
                </form>
                <h2>Preview:</h2>
                <p>
                    <img width="500px" height="300px" src="about:blank" alt="" id="show-picture">
                </p>
                <?php }else if($temp == md5('success')) {
                    echo '<p>Data Submitted to Nearest Hospitals';
                } ?>

            </section>

            <p class="footer">Help.</p>
        </div>
        <?php
        if($temp != md5('success')) {
        ?>
        <script type="text/JavaScript" src="js/geo.js"></script>
        <?php } ?>
        <script src="js/base.js"></script>


    </body>
</html>
