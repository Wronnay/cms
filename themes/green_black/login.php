<?php
$codebody .= '<article>';
$title = ''.l36.' - '.$site_title.'';
$codebody .= '<h2>Login:</h2>';
$codebody .=  '<form action="index.php?type=login" method="post"> 
  <input type="text" placeholder="'.l265.'" value="" name="Username">
 <input type="Password" placeholder="'.l266.'" value="" name="Password">
 <input type="submit" value="'.l267.'" name="submit">
</form>';
if(isset($_POST['submit'])){
if (('' == $Username = trim($_POST['Username'])) OR
   ('' == $Password = trim($_POST['Password']))) {
$codebody .= l38;
   }
else {
        $sql22 .= "SELECT
                        id,
			username
                FROM
                        ".$PREFIX."_user
                WHERE
                        username = '".presql(trim($_POST['Username']))."' AND
                        password = '".md5(trim($_POST['Password']))."'
               ";
	if($site_user_act == '1') { $sql22 .= "AND act = 'yes'";}
        $result22 = mysql_query($sql22) OR die("<pre>\n".$sql22."</pre>\n".mysql_error());
        $row22 = mysql_fetch_assoc($result22);
		if (mysql_num_rows($result22)==1){
			$_SESSION["id"] = $row22['id'];
			$_SESSION["username"] = $row22['username'];
			header("Location: index.php");
		}
        else{
$codebody .= l39.
             l40.
	     "\n".
             l41;
        }
}
}
$codebody .= '</article>';
?>
