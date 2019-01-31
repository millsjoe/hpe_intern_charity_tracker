<?php

// include '../app/vendor/autoload.php';
// $foo = new App\Acme\Foo();
$foo = "hello world"

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Docker <?php echo $foo//->getName(); ?></title>
        
    </head>
    <body>
        <h1>Docker <?php echo $foo//->getName(); ?></h1>
        <form action="form_processing.php" method="post" enctype="multipart/form-data">
            Name: <input type="text" name="name"><br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="submit">
        </form>

        </be>

        <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form> -->
    </body>
</html>
