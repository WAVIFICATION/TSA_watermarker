<html>
<head>
<title>
    T.S.A. PRO PIC APP
    </title>    
</head>
<?php
    $url="http://graph.facebook.com/".$_GET["id"]."/picture?width=140&height=140";
 
copy($url, "picture.jpg")


    
    ?>
    
    <img src="<?php echo $url; ?>">

</html>