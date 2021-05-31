<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);  

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        // let check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // letss check the email already exist
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "this email already exist";
            }else{
                // check if user uploaded file or not 
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name']; //getting user upload img name
                    $img_type = $_FILES['image']['type']; //getting user upload img type
                    $tmp_name = $_FILES['image']['tmp_name']; //this is temporary name used to save file
                    
                    //lets explode image and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);
                    $extensions = ['png','jpg','jpeg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time(); //this will return a current time
                        //lets move the user uploaded image to our particular folder
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"images/".$new_img_name))
                        {
                            
                            $status = "Active now ";
                            $random_id = rand(time(), 100000000);

                            //letisert all users data inside table
                            $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                    VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            
                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }else{
                                    echo "this email address not exist";
                                }
                            }else{
                                echo "something went wrong";
                            }
                        }  
                    }else{
                        echo "please select image of jpg jpeg png";
                    }

                }else{
                    echo "Plese select and image file";
                }
            }
        }else{
            echo "$email - this is not valid email";
        }
    }
    else{
        echo "Please Enter all fields";
    }
?>