<?php
$localhost = "localhost";
$username = "root";
$pass = "";
$conDB = mysqli_connect($localhost, $username, $pass);
if (!$conDB) {
    die("Can't Connect To Database :" . mysqli_connect_error($con));
}

$createDB = "CREATE DATABASE IF NOT EXISTS travel_agency";
$sqlDB = mysqli_query($conDB, $createDB);
if ($sqlDB) {
    echo "Created Database" . "<br>";
}

mysqli_select_db($conDB,"travel_agency");

$createCus = "CREATE TABLE IF NOT EXISTS customer(
    cusID			INT NOT NULL AUTO_INCREMENT,
    cusName		    VARCHAR(50),
    cusEmail		VARCHAR(50),
    cusPh			VARCHAR(20),
    cusPw			VARCHAR(100),
    cusImg          VARCHAR(100),
    cusToken        VARCHAR(64) DEFAULT NULL,
    tokenExp        DATETIME DEFAULT NULL,
    created         TIMESTAMP,
    PRIMARY KEY(cusID))";
$sqlDB = mysqli_query($conDB, $createCus);
if ($sqlDB) {
    echo "Created Database" . "<br>";
}
else {
    echo "". mysqli_error($conDB);
}

$createFee = "CREATE TABLE IF NOT EXISTS Feedback(
    fID			INT NOT NULL AUTO_INCREMENT,
    fDate		TIMESTAMP,
    rate		VARCHAR(20),
    comment     TEXT,
    cusID		INT,
    PRIMARY KEY(fID),
    FOREIGN KEY(cusID) REFERENCES customer(cusID))";
$sqlDB = mysqli_query($conDB, $createFee);
if ($sqlDB) {
    echo "Created Database" . "<br>";
}else {
    echo "". mysqli_error($conDB);
}

$createPay = "CREATE TABLE IF NOT EXISTS payment(
    pyID		INT NOT NULL AUTO_INCREMENT,
    pyType		VARCHAR(20),
    pyNumber    VARCHAR(20),
    pyImg       VARCHAR(100),
    PRIMARY KEY(pyID))";
$sqlDB = mysqli_query($conDB, $createPay);
if ($sqlDB) {
    echo "Created Database" . "<br>";
}else {
    echo "". mysqli_error($conDB);
}

$createBook = "CREATE TABLE IF NOT EXISTS booking(
    bID			INT NOT NULL AUTO_INCREMENT,
    bDate		TIMESTAMP,
    bstatus		VARCHAR(20),
    pyID		INT,
    cusID		INT,
    PRIMARY KEY(bID),
    FOREIGN KEY(pyID) REFERENCES payment(pyID),
	FOREIGN KEY(cusID) REFERENCES customer(cusID))";
$sqlDB = mysqli_query($conDB, $createBook);
if ($sqlDB) {
    echo "Created Database" . "<br>";
}else {
    echo "". mysqli_error($conDB);
}

$createPl = "CREATE TABLE IF NOT EXISTS place(
    plID		    INT NOT NULL AUTO_INCREMENT,
    plName		VARCHAR(50),
    PRIMARY KEY(plID))";
$sqlDB = mysqli_query($conDB, $createPl);
if ($sqlDB) {
    echo "Created Database" . "<br>";
}else {
    echo "". mysqli_error($conDB);
}

$createCar = "CREATE TABLE IF NOT EXISTS car(
   	carID		INT NOT NULL AUTO_INCREMENT,
    carType		VARCHAR(50),
    avaPeople	VARCHAR(100),
    PRIMARY KEY(carID))";
$sqlDB = mysqli_query($conDB, $createCar);
if ($sqlDB) {
    echo "Created Database" . "<br>";
}else {
    echo "". mysqli_error($conDB);
}

$createHot = "CREATE TABLE IF NOT EXISTS hotel(
   	hotID		INT NOT NULL AUTO_INCREMENT,
    hoName		VARCHAR(100),
    hoAdd		VARCHAR(100),
    hoRating	VARCHAR(20),
    PRIMARY KEY(hotID))";
$sqlDB = mysqli_query($conDB, $createHot);
if ($sqlDB) {
 echo "Created Database" . "<br>";
}else {
 echo "". mysqli_error($conDB);
}

$createGui = "CREATE TABLE IF NOT EXISTS guide(
   	guID		INT NOT NULL AUTO_INCREMENT,
    guImg       VARCHAR(100),
    guName		VARCHAR(50),
    guLanguage	VARCHAR(100),
    PRIMARY KEY(guID))";
$sqlDB = mysqli_query($conDB, $createGui);
if ($sqlDB) {
echo "Created Database" . "<br>";
}else {
echo "". mysqli_error($conDB);
}

$createPac = "CREATE TABLE IF NOT EXISTS package(
    pgID		INT NOT NULL AUTO_INCREMENT,
    pgtitle		VARCHAR(100),
    pgImg		VARCHAR(100),
   	pgPrice		VARCHAR(20),
    pgduration  INT(4),
    numOfPeo	INT(4),
    pgLeaveDate VARCHAR(50),
    pgInfo		TEXT,
    pgCreated   TIMESTAMP,
    pgUpdated  TIMESTAMP NULL DEFAULT NULL,
    plID		INT,
    hotID		INT,
    guID		INT,
 	carID		INT,
    pgStatus    VARCHAR(50) DEFAULT 'active',
    PRIMARY KEY(pgID),
    FOREIGN KEY(plID) REFERENCES place(plID),
    FOREIGN KEY(hotID) REFERENCES hotel(hotID),
    FOREIGN KEY(guID) REFERENCES guide(guID),
	FOREIGN KEY(carID) REFERENCES car(carID))";
$sqlDB = mysqli_query($conDB, $createPac);
if ($sqlDB) {
echo "Created Database" . "<br>";
}else {
echo "". mysqli_error($conDB);
}

$createBooDe = "CREATE TABLE IF NOT EXISTS bookingDetail(
    bkID		INT NOT NULL AUTO_INCREMENT,
    payimg      VARCHAR(255),
    bkPQ		INT,
    bID			INT,
    pgID		INT,
    PRIMARY KEY(bkID),
    FOREIGN KEY(bID) REFERENCES booking(bID),
	FOREIGN KEY(pgID) REFERENCES package(pgID))";
$sqlDB = mysqli_query($conDB, $createBooDe);
if ($sqlDB) {
echo "Created Database" . "<br>";
}else {
echo "". mysqli_error($conDB);
}


