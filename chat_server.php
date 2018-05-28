<?
session_start();
$text = $_POST["text"];
$file=fopen("chat_log.html", 'a');
fwrite($file, "<div class='msgln'><b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
fclose($file);
?>