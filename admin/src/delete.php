<?php
include("connection/dbcon.php");
if (isset($_GET["dePy"])) {
    $dePayId = $_GET["dePy"];

    $sqlChPay = "SELECT * FROM booking WHERE plID = $dePayId";
    $res = mysqli_query($con, $sqlChPay);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Cannot delete this payment because it is linked to a booking system.');
              window.location.replace('viewPayment.php');</script>";
        exit();
    } else {
                echo "<script>
                if (confirm('Do you really want to delete this payment?')) {
                    window.location.href = 'delete.php?confirmDelete=$dePayId';
                } else {
                    window.location.replace('viewPayment.php');
                }
              </script>";
        exit(); 
    }
}

if (isset($_GET["confirmDelete"])) {
    $confirmDePayId = $_GET["confirmDelete"];

    $sqlDePay = "DELETE FROM payment WHERE pyID = $confirmDePayId";
    if (mysqli_query($con, $sqlDePay)) {
        echo "<script>alert('Payment deleted successfully.');
              window.location.replace('viewPayment.php');</script>";
    } else {
        echo "<script>alert('Error: Could not delete this place.');
              window.location.replace('viewPaymeny.php');</script>";
    }
}

if (isset($_GET["dePl"])) {
    $dePlId = $_GET["dePl"];

    $sqlChPl = "SELECT * FROM package WHERE plID = $dePlId";
    $res = mysqli_query($con, $sqlChPl);

    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Cannot delete this place because it is linked to a package.');
              window.location.replace('viewPlace.php');</script>";
        exit();
    } else {
                echo "<script>
                if (confirm('Do you really want to delete this place?')) {
                    window.location.href = 'delete.php?confirmPayDe=$dePlId';
                } else {
                    window.location.replace('viewPlace.php');
                }
              </script>";
        exit(); 
    }
}

if (isset($_GET["confirmPayDe"])) {
    $confirmDePlId = $_GET["confirmPayDe"];

    $sqlDePl = "DELETE FROM place WHERE plID = $confirmDePlId";
    if (mysqli_query($con, $sqlDePl)) {
        echo "<script>window.location.replace('viewPlace.php');</script>";
    } else {
        echo "<script>alert('Error: Could not delete this place.');
              window.location.replace('viewPlace.php');</script>";
    }
}

if (isset($_GET["deGu"])) {
    $deGuId = $_GET["deGu"];

    $sqlChGu = "SELECT * FROM package WHERE guID = $deGuId";
    $res = mysqli_query($con, $sqlChGu);

    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Cannot delete this guide because it is linked to a package.');
              window.location.replace('viewGuide.php');</script>";
        exit();
    } else {
                echo "<script>
                if (confirm('Do you really want to delete this guide?')) {
                    window.location.href = 'delete.php?confirmPlDe=$deGuId';
                } else {
                    window.location.replace('viewGuide.php');
                }
              </script>";
        exit(); 
    }
}

if (isset($_GET["confirmPlDe"])) {
    $confirmDeGuId = $_GET["confirmPlDe"];

    $sqlDeGu = "DELETE FROM guide WHERE guID = $confirmDeGuId";
    if (mysqli_query($con, $sqlDeGu)) {
        echo "<script>window.location.replace('viewGuide.php');</script>";
    } else {
        echo "<script>alert('Error: Could not delete this guide.');
              window.location.replace('viewGuide.php');</script>";
    }
}


if (isset($_GET["deHo"])) {
    $deHoId = $_GET["deHo"];

    $sqlChHo = "SELECT * FROM package WHERE hotID = $deHoId";
    $res = mysqli_query($con, $sqlChHo);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Cannot delete this hotel because it is linked to a package.');
              window.location.replace('viewHotel.php');</script>";
        exit();
    } else {
                echo "<script>
                if (confirm('Do you really want to delete this hotel?')) {
                    window.location.href = 'delete.php?confirmHoDe=$deHoId';
                } else {
                    window.location.replace('viewHotel.php');
                }
              </script>";
        exit(); 
    }
}

if (isset($_GET["confirmHoDe"])) {
    $confirmDeHoId = $_GET["confirmHoDe"];

    $sqlDeHo = "DELETE FROM hotel WHERE hotID = $confirmDeHoId";
    if (mysqli_query($con, $sqlDeHo)) {
        echo "<script>window.location.replace('viewHotel.php');</script>";
    } else {
        echo "<script>alert('Error: Could not delete this hotel.');
              window.location.replace('viewHotel.php');</script>";
    }
}

if (isset($_GET["deCar"])) {
    $deCaId = $_GET["deCar"];

    $sqlChCa = "SELECT * FROM package WHERE carID = $deCaId";
    $res = mysqli_query($con, $sqlChCa);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Cannot delete this car because it is linked to a package.');
              window.location.replace('viewCar.php');</script>";
        exit();
    } else {
                echo "<script>
                if (confirm('Do you really want to delete this car?')) {
                    window.location.href = 'delete.php?confirmCarDe=$deCaId';
                } else {
                    window.location.replace('viewCar.php');
                }
              </script>";
        exit(); 
    }
}

if (isset($_GET["confirmCarDe"])) {
    $confirmDeCaId = $_GET["confirmCarDe"];

    $sqlDeCa = "DELETE FROM car WHERE carID = $confirmDeCaId";
    if (mysqli_query($con, $sqlDeCa)) {
        echo "<script>window.location.replace('viewCar.php');</script>";
    } else {
        echo "<script>alert('Error: Could not delete this car.');
              window.location.replace('viewCar.php');</script>";
    }
}

if (isset($_GET["dePg"])) {
    $dePgId = $_GET["dePg"];

    $sqlDePg = "DELETE FROM package WHERE pgID = $dePgId";
    if (!mysqli_query($con, $sqlDePg)) {
        echo "<script>alert('Can't Deleted');
                    window.location.replace('viewPack.php');</script>";
    } else {
        header("location:viewPack.php");
    }
}

?>
