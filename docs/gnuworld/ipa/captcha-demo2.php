<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of a  form showing  Captcha image with random string to user read and enter</title>
<script type="text/javascript">
function reload()
{
img = document.getElementById("capt");
img.src="captcha-image-adv.php?rand_number=" + Math.random();
}
</script>

</head>
<body >

<form type=post action=captcha-demo-data.php><input type=text name=t1>
<img src=captcha-image-adv.php id="capt"><input type=button onClick=reload(); value='Reload image'><input type=submit value='submit'></form>

</body>
</html>
