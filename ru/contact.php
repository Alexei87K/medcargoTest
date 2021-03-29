<?php
# ïîëó÷àåì äàííûå è îòñåêàåì ïðîáåëüíûå ñèìâîëû â íà÷àëå è êîíöå:
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
$error .= "- Введите имя или предприятие.<br />";
}
if(!$place)
{
$error .= "- Введите место погрузки.<br />";
}
if(!$unload)
{
$error .= "- Введите место разгрузки.<br />";
}
if(!$info)
{
$error .= "- Введите информация о грузе.<br />";
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
$error .= "- Введите ваш e-mail.<br />";
}
if($email && !ValidateEmail($email))
{
$error .= "- Введите действительный адрес электронной почты.<br />";
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
$error .= "- Введите ваш телефон.<br />";
}
if($tel && !ValidateTel($tel))
{
$error .= "- Укажите действительный телефон.<br />";
}
if(!$error)
{
$subject ="Новое сообщение !";
mail ("nbstock1@gmail.com",
      "New message from MedCargo",
      "Name/Company: $name<br><br>
	   Loading Place: $place<br>
	   Unloading Place: $unload<br><br>
	   Cargo Information: $info<br><br>
	  
	   ---------------------------<br>
	   E-mail: $email <br>
	   Telephone: \n $tel",
	  "Content-Type: text/html; charset=utf-8");	  
	  echo ('<div class="notification_ok">Спасибо за Ваш Запрос !</div>');
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