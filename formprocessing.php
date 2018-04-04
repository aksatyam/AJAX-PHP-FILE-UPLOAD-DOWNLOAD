<?php

    $host   = 'localhost';
    $user   = 'root';
    $pass   = '';
    $db     = 'demodb'; 

    $conn=mysqli_connect($host,$user,$pass,$db);
    if($conn){
        $username = $_POST['username'];
        $profileImg = $_FILES['profileImg'];

        //print_r($profileImg);
        if($profileImg['error'][0]>0){
            echo 'File Upload Error? Please,Select your file ';
        }else{
            if($profileImg['type'][0]=='application/x-zip-compressed'){
                move_uploaded_file($profileImg['tmp_name'][0], 'uploads/' . $profileImg['name'][0]);
                //echo "File Uploaded Successfully";
                $imagePath='uploads/' . $profileImg['name'][0];
                $query="INSERT INTO user_master(name,profilepic) VALUES('$username','$imagePath')";
                if (mysqli_query($conn, $query)) {
                    $imagePath='';
                    $profileImg =array();
                    $username = '';
                    echo "New record created successfully";
                   
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
            else{
                echo "Only Zip File Allowed to upload. Please, Select Zip File";
            }
        
        }   
    }   
?>