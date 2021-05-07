<?Php
//****************************************************************************
////////////////////////Downloaded from  www.plus2net.com   //////////////////////////////////////////
///////////////////////  Visit www.plus2net.com for more such script and codes.
////////                    Read the readme file before using             /////////////////////
//////////////////////// You can distribute this code with the link to www.plus2net.com ///
/////////////////////////  Please don't  remove the link to www.plus2net.com ///
//////////////////////////
//*****************************************************************************
?>
<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>
<head>
<title>demo of displaying user data & captcha data</title>
</head>

<body >
<?Php
echo "Text as entered by user  : $_GET[t1] <br>";
echo "Captcha shown : $_SESSION[my_captcha] <br>";
if($_GET['t1'] == $_SESSION['my_captcha']){
echo "Captcha validation passed ";
}else {
echo "Captcha validation failed ";
}
unset($_SESSION['my_captcha']);

?>

</body>

</html>
