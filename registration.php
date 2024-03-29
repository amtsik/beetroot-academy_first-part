<?php

if (isset($_POST['name'], $_POST['surname'], $_POST['age'], $_POST['email'], $_POST['password'][0], $_POST['password'][1], $_POST['language'])) {
    $assoc = [
        'name' => [
            'valid' => (bool)$_POST['name'] ? true : false,
            'validClass' => (bool)$_POST['name'] ? 'is-valid' : "is-invalid",
            'value' => $_POST['name'],
        ],
        'surname' => [
            'valid' => (bool)$_POST['surname'] ? true : false,
            'validClass' => (bool)$_POST['surname'] ? 'is-valid' : "is-invalid",
            'value' => $_POST['surname'],
        ],
        'age' => [
            'valid' => (bool)$_POST['age'] ? true : false,
            'validClass' => (bool)$_POST['age'] ? 'is-valid' : "is-invalid",
            'value' => $_POST['age'],
        ],
        'email' => [
            'valid' => (bool)$_POST['email'] ? true : false,
            'validClass' => (bool)$_POST['email'] ? 'is-valid' : "is-invalid",
            'value' => $_POST['email'],
        ],
        'password' => [
            'valid' => (bool)$_POST['password'][0] && ($_POST['password'][0] == $_POST['password'][1])  ? true : false,
            'validClass' => (bool)$_POST['password'][0] && ($_POST['password'][0] == $_POST['password'][1])  ? 'is-valid' : "is-invalid",
            'value' => $_POST['password'][0],
        ],
        'language' => [
            'valid' => (bool)$_POST['language'],
            'validClass' => "",
            'value' => $_POST['language'],
        ],
    ];
}
else {
    $assoc = [
        'name' => [
            'value' => '',
        ],
        'surname' => [
            'value' => '',
        ],
        'age' => [
            'value' => '',
        ],
        'email' => [
            'value' => '',
        ],
        'password' => [
            'value' => '',
        ],
        'language' => [
            'value' => '',
        ],
    ];
}

$validationForm = $assoc['name']['valid'] && $assoc['surname']['valid'] && $assoc['age']['valid'] && $assoc['email']['valid'] && $assoc['password']['valid'] && $assoc['language']['valid'] ;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" >
</head>
<body>
<div class="container">


</div>

<div class="container" >

    <h1 <?= $validationForm ? "": "hidden"?>>
        <?=
         "You name is: " .$assoc['name']['value'] ." " .$assoc['surname']['value']
        ."<br>email is: " .$assoc['email']['value']
        ."<br>age is: " .$assoc['age']['value']
        ."<br>password: " .$assoc['password']['value']
        ."<br>language " .$assoc['language']['value']
        ?>
    </h1>
    <form method="post" action="registration.php" <?= $validationForm ? "hidden": ""?>>
        <div class="form-group">
            <label for="formGroupExampleInput">Registration</label>
            <div class="">
                <label for="">Имя</label>
                <input type="text" class="form-control <?= $assoc['name']['validClass'] ?? ""?>"  id="formGroupNameInput" placeholder="Имя" minlength="2" value="<?= $assoc['name']['value'] ?>" name="name">
            </div>
            <div class="">
                <label for="">Фамилия</label>
                <input type="text" class="form-control <?= $assoc['surname']['validClass'] ?? ""?>" id="formGroupSurnameInput" placeholder="Фамилия" minlength="2" value="<?= $assoc['surname']['value'] ?>" name="surname">
            </div>
            <div class="">
                <label for="">Возраст</label>
                <input type="text" class="form-control <?= $assoc['age']['validClass'] ?? ""?>" id="formGroupAGEInput" placeholder="возраст" min="18" minlength="2" maxlength="2" value="<?= $assoc['age']['value'] ?>" name="age">
            </div>
            <div class="">
                <label for="">Почта</label>
                <input type="email" class="form-control <?= $assoc['email']['validClass'] ?? ""?>" id="formGroupMailInput" placeholder="почта@домен" value="<?= $assoc['email']['value'] ?>" name="email">
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control <?= $assoc['password']['validClass'] ?? ""?>" id="examplePasswordPassword1" minlength="1" value="" name="password[0]">
                <div class="invalid-feedback">
                    Пароли не совпадают
                </div>
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword2">Подтвердить пароль</label>
                <input type="password" class="form-control <?= $assoc['password']['validClass'] ?? ""?>" id="examplePasswordPassword2" minlength="1" value="" name="password[1]">
                <div class="invalid-feedback">
                    Пароли не совпадают
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Язык</label>
                <select class="form-control" id="exampleFormControlSelect1" name="language" >
                    <option >Русский</option>
                    <option >Український</option>
                    <option >English</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
