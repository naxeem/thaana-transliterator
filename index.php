<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dv2en</title>
    <style type="text/css" media="screen">
        * {
            font-family: sans-serif;
            margin: 0; padding: 0;
            box-sizing: border-box;
        }
        h1 {
            font-size: 20px; text-align: center; margin: 0px 10px 10px;
        }
        .wrap {
            width: 100%; max-width: 600px; margin: 20px auto;
        }
        textarea {
            width: 95%; border: 1px solid #8E8E8E;
            padding: 10px; margin: 5px 10px;
        }
        [type="submit"] {
            color: #fff; cursor: pointer; background-color: #5270e8; margin-bottom: 10px;
            padding: 8px 18px; margin-left: 10px; font-size: 14px; line-height: 14px; border: 0;
        }
        p {
            font-size: 15px; margin: 10px; line-height: 21px;
            color: #222; border-top: 1px dashed #ccc; padding: 10px 0;
        }
    </style>
</head>
<body>
<div class="wrap">
<h1>Dhivehi to Latin Converter</h1>
<form action="/" method="POST">
    <textarea name="a" rows="10"><?php if(isset($_POST['a'])) { echo $_POST['a']; } ?></textarea>
    <br>
    <input type="submit" name="submit" value="Convert">
</form>
<p>
<?php
include "./class-thaana-transliterator.php";

if(isset($_POST['a'])) {
    echo Thaana_Transliterator::transliterate($_POST['a']);
}
?>
</p>
</div>
</body>
</html>