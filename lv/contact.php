<?php
# получаем данные и отсекаем пробельные символы в начале и конце:
$name = @ trim ($_POST['name']);
$place = @ trim ($_POST['place']);
$unload = @ trim ($_POST['unload']);
$info = @ trim ($_POST['info']);
$email = @ trim ($_POST['email']);
$tel = @ trim ($_POST['tel']);


$post = (!empty($_POST)) ? true : false;
if($post)
{
$email = trim($_POST["email"]);
$name = htmlspecialchars($_POST["name"]);
$place = htmlspecialchars($_POST["place"]);
$unload = htmlspecialchars($_POST["unload"]);
$info = htmlspecialchars($_POST["info"]);
$email = htmlspecialchars($_POST["email"]);
$tel = htmlspecialchars($_POST["tel"]);
$error = "";
if(!$name)
{
$error .= "- Ievadiet vardu vai uznemuma.<br />";
}
if(!$place)
{
$error .= "- Ievadiet iekrausanas vietu.<br />";
}
if(!$unload)
{
$error .= "- Ievadiet izkrausanas vietu.<br />";
}
if(!$info)
{
$error .= "- Ievadiet informacijas par kravu.<br />";
}
// Check email
function ValidateEmail($value)
{
$regex = "/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/";
if($value == "") {
return false;
} else {
$string = preg_replace($regex, "", $value);
}
return empty($string) ? true : false;
}
if(!$email)
{
$error .= "- Ievadiet savu e-pasta adresi.<br />";
}
if($email && !ValidateEmail($email))
{
$error .= "- Ievadiet derigu e-pasta adresi.<br />";
}
// Check tel
function ValidateTel($valueTel)
{

if($valueTel == "") {
return false;
} else {

}
return empty($string) ? true : false;
}
if(!$tel)
{
$error .= "- Ievadiet talruni.<br />";
}
if($tel && !ValidateTel($tel))
{
$error .= "- Ievadiet derigu talruna.<br />";
}
if(!$error)
{
$subject ="Jauna zina !";
mail ("nbstock1@gmail.com",
      "Jauna zina no MedCargo",
      "Vards/ Kompanija: $name<br><br>
	   Iekrausanas vieta: $place<br>
	   Izkrausanas vieta: $unload<br><br>
	   Info par kravu: $info<br><br>
	  
	   ---------------------------<br>
	   E-pasts: $email <br>
	   Telefons: \n $tel",
	  "Content-Type: text/html; charset=utf-8");	  
	  echo ('<div class="notification_ok">Paldies Jums Par Pieprasijumu !</div>');
if($mail)
{
echo 'OK';
}
}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}
}
?>