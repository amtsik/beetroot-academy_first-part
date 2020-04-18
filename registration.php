<?php
$assoc = [
    'name' => "name",
    'surname' => "surname",
    'age' => "age",
    'email' => "email@email",
    'password' => [],
    'gender' => [],
];

//var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" >
</head>
<body>
<br />
<h1 <?=$_POST[name] ?? "hidden"?>>You name is:
    <?=$_POST[name] ." " .$_POST[surname]
    ."<br>email is: " .$_POST[email]
    ."<br>year is: " .$_POST[age]
    ."<br>password: " .($_POST[password][0] == $_POST[password][1] ? $_POST[password][0] : "пароль не правильный")
    ."<br>gender "
    .$_POST[gender][0] ?>
</h1>

<div class="container" <?=$_POST[name] ? "hidden" : ""?>>
    <form method="post" action="registration.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Registration</label>
            <div class="">
                <label for="">Имя</label>
                <input type="text" class="form-control" id="formGroupNameInput" placeholder="Example input" value="<?=$_POST['name'] ?? $assoc['name'] ?>" name="name">
            </div>
            <div class="">
                <label for="">Фамилия</label>
                <input type="text" class="form-control" id="formGroupSurnameInput" placeholder="Example input" value="<?= $_POST['surname'] ?? $assoc['surname'] ?>" name="surname">
            </div>
            <div class="">
                <label for="">Год</label>
                <input type="text" class="form-control" id="formGroupAGEInput" placeholder="Example input" value="<?= $_POST['age'] ?? $assoc['age'] ?>" name="age">
            </div>
            <div class="">
                <label for="">Почта</label>
                <input type="email" class="form-control" id="formGroupMailInput" placeholder="Example input" value="<?= $_POST['email'] ?? $assoc['email'] ?>" name="email">
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="examplePasswordPassword1" value="<?= $_POST['password'] ?? $assoc['password'][0] ?>" name="password[0]">
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword2">Password</label>
                <input type="password" class="form-control" id="examplePasswordPassword2" value="<?= $_POST['password'] ?? $assoc['password'][1] ?>" name="password[1]">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender[]" >
                    <option >male</option>
                    <option >female</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
