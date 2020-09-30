<?php
    
    $file = $_FILES['file'];
    $tmp_name=$file['tmp_name'];
    $name=$file['name'];
    $target_dir = "uploads/";
    $randomTrail = rand();
    $urlGenerated = $target_dir.$randomTrail;
    $destination=$urlGenerated.$name;
    $fileSize = $file['size'];
    $result = '';

    if(isset($_POST['count']))
    {
        $count = $_POST['count'];
        $image = $_POST['image'];
        if($count != 0)
        {
            unlink($image);
        }
        
    }
    
    if(($fileSize < 2000000)){
        $res=move_uploaded_file($tmp_name, $destination);
        if($res){
            $result = $urlGenerated;
           
        }
        else{
            $result = 'Error Uploading';
        }
    }
    else{
        $result = 'File too large';
    }
    print_r($result);