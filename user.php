<?php
$assoc = [
    'name' => "name",
    'surname' => "surname",
    'age' => "age",
    'email' => "email@email",
    'gender' => [],
];

var_dump($_POST);
//var_dump($_GET);

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
<h1>You name <?=$_POST[name] ." " .$_POST[surname] ." gender " .$_POST[gender][0] ?> </h1>
<div class="container">
    <form method="post" action="user.php">
        <div class="form-group">
            <label for="formGroupExampleInput">Example label</label>
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
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender[]" multiple>
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
