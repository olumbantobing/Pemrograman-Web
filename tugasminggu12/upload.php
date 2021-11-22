<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Submission CV Maker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Detail CV Submitted!</h1>
    </header>

    <?php
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $number = $_POST["number"];
        $birthday = $_POST["birthday"];
        $work = $_POST["work"];
        $linkedin = $_POST["linkedin"];
    ?>
    
	<hr>
    <table>
        <tr>
            <td>Full Name</td>
            <td>: <?php echo $fullname?></td>
        </tr>
        <tr>
            <td>E-mail Address</td>
            <td>: <?php echo $email?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>: <?php echo $address?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>: <?php echo $number?></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td>: <?php echo $birthday?></td>
        </tr>
        <tr>
            <td>Work Experience</td>
            <td>: <?php echo $work?></td>
        </tr>
        <tr>
            <td>LinkedIn</td>
            <td>: <?php if($_POST["linkedin"] == null){
                echo "-";
             }else{echo $linkedin;} ?></td>
        </tr>
    </table>
    <hr>
    <h3>Upload file</h3>
    <?php
        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions) === false){
                $errors[]="extension not allowed, please choose a JPG/JPEG/PNG file.";
            }
            
            if($file_size > 2097152) {
                $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"uploads/".$file_name);
                echo "Success";
                echo "<br>Link directory: <a href='"."uploads/".$file_name."'>".$file_name."</a>";
            }else{
                echo "No file uploaded";
            }
        }
    ?>
</body>
</html>