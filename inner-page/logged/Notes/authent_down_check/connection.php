
<?php
$conn = new mysqli('localhost', 'root','','pdfAuthentication');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
   
}else{
};
?>