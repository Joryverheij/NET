<?php  include('server.php'); 
        require_once('users.php')?>
<?php
$firstName = '';
$lastName = '';
$email = '';
$password = '';
$users = new users();
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $user = $users->getUserById($id);

    if ($user) {
        $firstName = $user['Naam'];
        $lastName = $user['Achternaam'];
        $email = $user['Email'];
        $password = $user['Password'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>

<table>
    <thead>
    <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

    <?php   $allUsers = $users->getAllUsers();
     foreach($allUsers as $user) { ?>
       <?php print_r($user); ?>
        <tr>
            <td><?php echo $user['Naam']; ?></td>
            <td><?php echo $user['Achternaam']; ?></td>
            <td><?php echo $user['Email']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $user['Id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $user['Id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="server.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
        <label>Voornaam</label>
        <input type="text" name="firstName" value="<?php echo $firstName; ?>">
    </div>
    <div class="input-group">
        <label>Achternaam</label>
        <input type="text" name="lastName" value="<?php echo $lastName; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Wachtwoord</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
    </div>
    <div class="input-group">
        <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save" >Save</button>
        <?php endif ?>
    </div>
</form>
</body>
</html>