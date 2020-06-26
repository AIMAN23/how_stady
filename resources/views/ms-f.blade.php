@extends('layouts.admin')
@section('content')
    

<?php
class maxGuestbook{
 public $messageDir = 'messages';
 public $dateFormat = 'Y-m-d g:i:s A';//g=24 hours - g:i:s hoursseconds minutes A AM PM
 public $itemsPerPage = 5;
 public $messageList;

function processGuestbook(){
 if (isset($_POST['submit'])) {
 $this->insertMessage();
 }
 $page = isset($_GET['page']) ? $_GET['page'] : 1;
 
 $this->displayGuestbook($page);
}

function getMessageList(){
 $this->messageList = array();

// Open the actual directory
if ($handle = @opendir($this->messageDir)) {
// Read all file from the actual directory
while ($file = readdir($handle)) {
 if (!is_dir($file)) {
 $this->messageList[] = $file;//save file in the array
}
}
}
rsort($this->messageList);//sorts an array by the values inreverse order h-->d-->c
return $this->messageList;
}
function displayGuestbook($page=1){
 $list = $this->getMessageList();
 //echo "<center><a href='add.php'>Leave a message</a></center>";
 echo "<table class='newsList'>";

 //Get start point(article) and end point
 $startItem = ($page-1)*$this->itemsPerPage;//pagen u are on1*5=0 0 is the first article in the list array index-->1
 if (($startItem + $this->itemsPerPage) > sizeof($list))
$endItem = sizeof($list);//6>5 ,enditem is last item in the list 5-->6 article
 else $endItem = $startItem + $this->itemsPerPage; //0+5=5

 for ($i=$startItem;$i<$endItem;$i++){
 //foreach ($list as $value) {
 $value = $list[$i];
$data = file($this->messageDir.DIRECTORY_SEPARATOR.$value);
//directory_separator=/ \,file:read entire file into an array,file=messages./.nameoffile
$name = trim($data[0]);//first line of file which will be for the name
$email = trim($data[1]);//2nd line................................email
 $submitDate = trim($data[2]);//3rd line..........................submitdate
// ;(['0['data ($unset یعنى شلنا اول سطر اللى هو الاسم من  المصفوفه عشان نستخدمه لوحده
 unset ($data['1']);
 unset ($data['2']);

 $content = "";
 foreach ($data as $value) {
 $content .= $value;//The Concatenation Operator $a = "Hello ";$a .= "World!"; now $a=$a."world" = hello world
 }
 
echo "<tr> <th align='left'><a href=\"mailto:$email\">$name</a></th> <th class='right'>$submitDate</th> </tr>";
echo "<tr><tdcolspan='2'>".nl2br(htmlspecialchars($content))."<br/></td></tr>";//nl2br print </br> automatically,htmlspecialcharac convert special cha &gt; &lt; as spae <>& to entity as &nbsp;
 }
 echo "</table>";
 if (sizeof($list) == 0){
 echo "<center><p>No messages at the
moment!</p><p>&nbsp;</p></center>";
 }
 // Create pagination
 if (sizeof($list) > $this->itemsPerPage){
 echo "<div id=\"navigation\">";
 if ($startItem == 0) {
 if ($endItem < sizeof($list)){
 echo "<div id=\"nright\"><a
href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\" >Next
&raquo;</a></div>";
 } else {
 // Nothing to display
 }
 } else {
 if ($endItem < sizeof($list)){
 echo "<div id=\"nleft\"><a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\" >&laquo;
Prev</a></div>";
 echo "<div id=\"nright\"><a
href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\" >Next
&raquo;</a></div>";
 } else {
 echo "<div id=\"nleft\"><a
href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\" >&laquo;
Prev</a></div>";
 }
 }

 echo "<br/></div><br/>";
 }
 echo "<hr />";
 $this->displayAddForm();
}
function displayAddForm(){
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  Name:<br />
  <input type="text" name="name" size="30" /><br /><br />
  Email:<br />
  <input type="text" name="email" size="30" /><br /><br />
  Your message:<br />
  <textarea name="message" rows="7" cols="49"></textarea><br />
  <center><input type="submit" name="submit" value="Save" /></center>
</form>

<?php
}
function insertMessage(){
 $name = isset($_POST['name']) ? $_POST['name'] : 'Anonymous';
 $email = isset($_POST['email']) ? $_POST['email'] : '';
 $submitDate = date($this->dateFormat);
 $content = isset($_POST['message']) ? $_POST['message'] : '';

 if (trim($name) == '') $name = 'Anonymous';//if empty ,write anonymous
 if (strlen($content)<5) {
 exit();
 }

$filename=date('YmdHis');
 if (!file_exists($this->messageDir)){ //checks file or directory not or present isلو الد مش موجود
 mkdir($this->messageDir);//make adirectory called messages
 }
 $f = fopen($this->messageDir.DIRECTORY_SEPARATOR.$filename.".txt","w+");//w+read+write
 fwrite($f,$name."\n");//write in the file
 fwrite($f,$email."\n");
 fwrite($f,$submitDate."\n");
 fwrite($f,$content."\n");
 fclose($f);

}
}
?>

@endsection