<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<form method="post" action="">
   <input type="text" name="name">
   <input type="text" name="age">
   <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

if(isset($_POST['submit']))
{
   if(empty($_SESSION['addMultiple']))
   {
      $_SESSION['addMultiple'][0] = $_POST;
   } else {
      $count = count($_SESSION['addMultiple']);
      $_SESSION['addMultiple'][$count] = $_POST;
   }
}

$sql = "INSERT INTO tabel VALUES ";
$value = null;
$field = null;
$dataSession = $_SESSION['addMultiple'];
for($i = 0; $i < count($dataSession); $i++)
{
   for($j = 0; $j < count($dataSession[$i]); $j++)
   {
      $value .= ", (". $dataSession[$i]['name'] .",". $dataSession[$i]['age'] .")";
   }
   $field = substr($value, 1);

}
print_r($sql ."". $field);
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
