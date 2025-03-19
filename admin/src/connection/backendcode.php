<?php

include("dbcon.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*******add Package *******/
if (isset($_POST["addPack"])) {
    $title = $_POST["packTt"];
    $price = $_POST["packPr"];
    $duration = $_POST["packDu"];
    $avPeople = $_POST["packAp"];
    $leaveDate = $_POST["packDt"] . " : " . $_POST['packTime'];
    $place = $_POST["packPl"];
    $car = $_POST["packCa"];
    $hotel = $_POST["packHo"];
    $guide = $_POST["packGu"];
    $detailInfo = mysqli_real_escape_string($con, $_POST["packDIn"]);
    $created = date(format: "Y-m-d H:i:s");

    // Check if required fields are empty
    if (empty($title) || empty($price) || empty($duration) || empty($avPeople) || empty($leaveDate) || empty($place) || empty($car) || empty($hotel) || empty($guide) || empty($detailInfo)) {
        echo "<script>alert('All fields are required!'); 
              window.location.replace('../addPack.php');</script>";
        exit;
    }

    // Check if file is uploaded
    if (!isset($_FILES['packImg']) || $_FILES['packImg']['error'] != 0) {
        echo "<script>alert('Please select an image file to upload.');
              window.location.replace('../addPack.php');</script>";
        exit;
    }

    $file = $_FILES['packImg'];
    $fileName = $_FILES['packImg']['name'];
    $fileTmpName = $_FILES['packImg']['tmp_name'];

    $fileExt = explode(".", $fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowedExt = array("png", "jpeg", "jpg", "pdf", "webp");

    if (in_array($fileActExt, $allowedExt)) {
        $fileNewName = uniqid('', true) . '.' . $fileActExt;
        $fileDestination = "../../../mainImg/" . $fileNewName;

        if (!move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "<script>alert('Failed to upload image. Please check folder permissions.');
                  window.location.replace('../addPack.php');</script>";
            exit;
        }

        $sqlPack = "INSERT INTO package (pgtitle, pgImg, pgPrice, pgduration, numOfPeo, pgLeaveDate, pgInfo, pgCreated, plID, hotID, guID, carID) VALUES 
                    ('$title', '$fileNewName', '$price', $duration, $avPeople, '$leaveDate', '$detailInfo', '$created', $place, $hotel, $guide, $car)";

        if (mysqli_query($con, $sqlPack)) {
            echo "<script>alert('Package Inserted Successfully.');
                  window.location.replace('../viewPack.php');</script>";
            $_SESSION['created'] = $created;
            exit;
        } else {
            echo "<script>alert('Error inserting package: " . mysqli_error($con) . "');
                  window.location.replace('../addPack.php');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Please upload jpg, png, jpeg, pdf, webp formats only');
              window.location.replace('../addPack.php');</script>";
        exit;
    }
}

/*******update Package *******/
if (isset($_POST["upPg"])) {
    $upPgId = $_POST["upPgId"];
    $upPgTt = $_POST['upPgTt'];
    $upPgPrice = $_POST['upPgPrice'];
    $upPgDu = $_POST["upPgDu"];
    $upPgNumOfPeo = $_POST["upPgNumOfPeo"];
    $upPgDate = $_POST["upPgDate"] . " : " . $_POST['upPgTime'];
    $upPgPl = $_POST['upPgPl'];
    $upPgCa = $_POST['upPgCa'];
    $upPgHo = $_POST['upPgHo'];
    $upPgGu = $_POST['upPgGu'];
    $upPgDIn = mysqli_real_escape_string($con, $_POST['upPgDIn']);
    $updated = date("Y-m-d H:i:s");

    $oldImg = $_POST['oldImg'];
    $oldImgPath = "../../../mainImg/" . $oldImg;

    $file = $_FILES["upPgImg"];
    $filename = $_FILES["upPgImg"]["name"];
    $filetmpName = $_FILES["upPgImg"]["tmp_name"];

    $fileExt = explode(".", $filename);
    $fileActExt = strtolower(end($fileExt));
    $allowedExt = array("png", "jpeg", "jpg", "pdf", "webp");

    if ($filename != "") {
        if (in_array($fileActExt, $allowedExt)) {
            // Create a unique filename and upload the image
            $filenewName = uniqid('', true) . "." . $fileActExt;
            $destination = "../../../mainImg/" . $filenewName;
            move_uploaded_file($filetmpName, $destination);

            $sql = "UPDATE package 
                SET pgtitle='$upPgTt', 
                    pgImg='$filenewName', 
                    pgPrice='$upPgPrice', 
                    pgduration=$upPgDu, 
                    numOfPeo=$upPgNumOfPeo, 
                    pgLeaveDate='$upPgDate', 
                    pgUpdated='$updated',
                    pgInfo='$upPgDIn', 
                    plID=$upPgPl, 
                    hotID=$upPgHo, 
                    guID=$upPgGu, 
                    carID=$upPgCa, 
                    pgStatus='active' 
                WHERE pgID=$upPgId";

            $result = mysqli_query($con, $sql);

            if (!$result) {
                die("<script>alert('SQL Error: " . mysqli_error($con) . "'); window.history.back();</script>");
            } else {
                echo "<script>alert('Package updated successfully');
                  window.location.replace('../viewPack.php');</script>";
            }
        } else {
            echo "<script>alert('please upload jpg,png,jpeg,webp formats only');
            window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Please choose image file!');
            window.history.back();</script>";
    }
}


/*******edit time function *******/
function timeAgo($dateTime)
{
    $timestamp = strtotime($dateTime);
    $timeDiff = time() - $timestamp;

    if ($timeDiff < 60) {
        return $timeDiff . " seconds ago";
    } elseif ($timeDiff < 3600) {
        return floor($timeDiff / 60) . " minutes ago";
    } elseif ($timeDiff < 86400) {
        return floor($timeDiff / 3600) . " hours ago";
    } elseif ($timeDiff < 604800) {
        return floor($timeDiff / 86400) . " days ago";
    } else {
        return date("F j, Y", $timestamp);
    }
}
