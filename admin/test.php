<?php
$user1 = "sarjak";
//$user2 = "ronak";
$salt = hash('sha256', $user1);
$password = "SOMEPASSWORD";
//$salt = sha1(md5($password));
$pass =  hash('sha512', $password)."<br/>";
echo hash('sha512', $password)."<br/>";
//$password = md5($password.$salt);
echo $salt.$pass;
echo "<br />". $pass;


?>
onclick="document.location='index.php?std=<?php echo "studntid" ?>'"

$(document).ready(function(){
        $("#resets").on("click",function(){
            $("#category").val("0");
        });
        
    });
function res(){
    var f = document.getElementsByTagName('input');
    for(var i=0;i<f.length;i++){
        if(f[i].getAttribute('type')=='text'){
            f[i].setAttribute('value',"")
        }
    }
    var f = document.getElementsByTagName('textarea');
    for(var i=0;i<f.length;i++){
        if(f[i].getAttribute('type')=='text'){
            f[i].setAttribute('value',"")
        }
    }
    
}