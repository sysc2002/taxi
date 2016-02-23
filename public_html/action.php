<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$servername = "localhost";
$username = "testtest12345";
$password = "testtest12345";
$dbname = "taxi_db";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// define variables and set to empty values
$adType = $Title = $Description = $Email = $Phone = $Country = $Province = $PostalCode= $City = $Licenseincluded = $Carincluded= "";



if (!empty($_POST["adType"])) { $adType = test_input($_POST["adType"]); }

if (!empty($_POST["Title"])) { $Title = test_input($_POST["Title"]); }

if (!empty($_POST["Description"])) { $Description = test_input($_POST["Description"]); }

if (!empty($_POST["Email"])) { $Email = test_input($_POST["Email"]); }

if (!empty($_POST["Phone"])) { $Phone = test_input($_POST["Phone"]); }

if (!empty($_POST["Country"])) { $Country = test_input($_POST["Country"]); }

if (!empty($_POST["Province"])) { $Province = test_input($_POST["Province"]); }

if (!empty($_POST["PostalCode"])) { $PostalCode = test_input($_POST["PostalCode"]); }

if (!empty($_POST["City"])) { $City = test_input($_POST["City"]); }

if (!empty($_POST["Licenseincluded"])) { $Licenseincluded = test_input($_POST["Licenseincluded"]); }

if (!empty($_POST["Carincluded"])) { $Carincluded = test_input($_POST["Carincluded"]); }


upload_image();


$sql = "INSERT INTO ad (adType, Title, Description, Email, Phone, Country, Province, PostalCode, City, Licenseincluded, Carincluded)
VALUES ('".$adType."', '".$Title."' , '".$Description."', '".$Email."', '".$Phone."', '".$Country."', '".$Province."', '".$PostalCode."', '".$City."', ".$Licenseincluded.", ".$Carincluded.")";

//echo "<br>".$adType ;
//echo "<br>".$Title;
//echo "<br>".$Description;
//echo "<br>".$Email;
//echo "<br>".$Phone;
//echo "<br>".$Country;
//echo "<br>".$Province;
//echo "<br>".$PostalCode;
//echo "<br>".$City;
//echo "<br>".$Licenseincluded;
echo "<br>".$Carincluded;

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}//end if



/*if($result){

    while($row = $result->fetch_assoc()){
        echo "id is ".$row['id']."<br>";
    }
}*/

//echo "Connected successfully";


function test_input($data) {
  $data = trim($data); //remove extra spaces tabs and new line
  $data = stripslashes($data);//remove slashes
  $data = htmlspecialchars($data);//
  return $data;
}


function upload_image(){

echo "77";

$extension=array("jpeg","jpg","png","gif"); //extensions of the image that could be accepted
$target_dir = ""; //directory where to upload file to
$target_file = $target_dir . basename($_FILES["image-input"]["name"]); 
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

     if(in_array($imageFileType,$extension)){
		  $check = getimagesize($_FILES["image-input"]["tmp_name"]);
		
		  if($check !== false) {
        		echo "File is an image - " . $check["mime"] . ".";
        		$uploadOk = 1;
    		  } else {
        		echo "File is not an image.";
        		$uploadOk = 0;
    		  }
    		  
    		  
    		  
    		  if ($uploadOk == 0) {
                     echo "Sorry, your file was not uploaded.";
                   // if everything is ok, try to upload file
                 } else {
                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["image-input"]["name"]). " has been uploaded.";
                 } else {
                      echo "Sorry, there was an error uploading your file.";
                      }
                }
    		  
    		  
     }

    

}//end if
}//end function

?>