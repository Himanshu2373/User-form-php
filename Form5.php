<?php
$Region =$_POST['Region'];
$Branch =$_POST['Branch'];
$Department =$_POST['Department'];
$Role =$_POST['Role'];
$Employee_Code =$_POST['Employee_Code'];
$Employee_Name=$_POST['Employee_Name'];
$Mobile=$_POST['Mobile'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$Confirm=$_POST['Confirm'];

if($Password === $Confirm)
{

  if(!empty($Region) || !empty($Branch) || !empty($Department) || !empty($Role) || !empty($Employee_Code) || !empty($Employee_Name) || !empty($Mobile) || !empty($Email) || !empty($Password))
  {
   $host="localhost";
   $dbUsername="root";
   $dbPassword="";
   $dbname="form";
 
   $conn=new mysqli($host, $dbUsername, $dbPassword,$dbname);

   if(mysqli_connect_error()){
    die('Connet Error('.mysqli_connect_error().')'. mysqli_connect_error());
   }
   else{
    
     $INSERT=" insert into details ( Region, Branch, Department, Role, Employee_Code, Employee_Name, Mobile, Email, Password ) values(?,?,?,?,?,?,?,?,?)";

    
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("ssssisiss", $Region, $Branch, $Department,  $Role , $Employee_Code, $Employee_Name , $Mobile, $Email, $Password );
        $stmt->execute();
        echo "Information Saved Successfully";
        $stmt->close();
        $conn->close();

    }

}
else{
    echo "All fields are required";
    die();
}
}
else{
    echo "Password not matched with confirem password please try again !!!!!!";
    die();
}
