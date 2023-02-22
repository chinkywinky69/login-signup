<?php

if (empty($_POST["firstname"])) {
    die("First Name is required");
}

if (empty($_POST["lastname"])) {
    die("Last Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["confirmpassword"]) {
    die("Passwords do not match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

var_dump($password_hash);

$mysqli = require __DIR__ . "/conn.php";

$sql = "INSERT INTO user(firstname, lastname, email, password_hash)
        VALUES(?,?,?,?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssss",
    $_POST["firstname"],
    $_POST["lastname"],
    $_POST["email"],
    $_POST["password_hash"]
);

if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
