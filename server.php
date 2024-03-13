<?php
require_once('users.php');
session_start();
$db = new mysqli('localhost', 'root', '', 'gc_festival');
$users = new users();
// initialize variables
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->query(getAllUsers());
    $_SESSION['message'] = "User saved";
    header('location: index.php');
}

if (isset($_POST['update'])) {
    print_r($_POST);
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users->updateUser($firstName, $lastName, $email, $id);
    
    // $db->query(updateUser());

    $_SESSION['message'] = "User updated!";
    header('location: index.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $users->deleteUser($id);

    $_SESSION['message'] = "User deleted!";
    header('location: index.php');
}
if (isset($_POST['save'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users->createUser($firstName, $lastName, $email, $password);

    $_SESSION['message'] = "User saved";
    header('location: index.php');
}