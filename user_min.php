<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

$assoc = [
    'name' => "name",
    'surname' => "surname",
    'age' => "age",
    'email' => "email@email",
    'gender' => [
        "",
        "male",
        "female"
    ],
    'language' => "ru"
];

if (!empty($_POST)) {
    $error = [];
    if (empty($_POST['name'])){
        $error['name'] = "имя не может быть пустым";
    }
    if (empty($_POST['surname'])){
        $error['surname'] = "фамилия не может быть пустым";
    }
    if (empty($_POST['age']) || $_POST['age'] <1 ){
        $error['age'] = "возраст не корректный";
    }
    if (empty($_POST['email'])){
        $error['email'] = "почта не может быть пустой";
    }
}
$lang = (!empty($_GET['lang'])) ? $_GET['lang'] : "ru";

$labels = [
    'ru' => [
        'name' => 'имя',
        'surname' => 'фамилия',
        'age' => 'возраст',
        'email' => 'почта',
        'gender' => 'пол',
    ],
    'ua' => [
        'name' => 'им\'я',
        'surname' => 'фамилия',
        'age' => 'вiк',
        'email' => 'почта',
        'gender' => 'стать',
    ],
    'en' => [
        'name' => 'name',
        'surname' => 'surname',
        'age' => 'age',
        'email' => 'email',
        'gender' => 'gender',
    ],
];

switch ($lang){
    case 'ua':
        $translation = $labels['ua'];
        break;
    case 'en':
        $translation = $labels['en'];
        break;
    default:
        $translation = $labels['ru'];
        break;
}


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
<div class="container">
    <h3 hidden style="color: red"><?=implode("<br />", $error)?></h3>
    <form method="post" action="stats.php">
        <div class="float-right">
            <a href="?lang=ru" class="badge badge-primary">Русский</a>
            <a href="?lang=ua" class="badge badge-secondary">Украинский</a>
            <a href="?lang=en" class="badge badge-success">Английский</a>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Example label</label>
            <div class="">
                <label for=""><?= $translation['name']?></label>
                <input type="text" class="form-control" id="formGroupNameInput" placeholder="<?=$assoc['name']?>" value="<?=$_POST['name'] ?? "" ?>" name="name">
                <?php if (!empty($error['name'])) : ?>
                    <small id="passwordHelpInline" class="text-muted">
                        <?=$error['name'] ?>
                    </small>
                <?php endif; ?>
            </div>
            <div class="">
                <label for=""><?= $translation['surname']?></label>
                <input type="text" class="form-control" id="formGroupSurnameInput" placeholder="<?=$assoc['surname']?>" value="<?= $_POST['surname'] ?? "" ?>" name="surname">
                <?php if (!empty($error['surname'])) : ?>
                    <small id="passwordHelpInline" class="text-muted">
                        <?=$error['surname'] ?>
                    </small>
                <?php endif; ?>
            </div>
            <div class="">
                <label for=""><?= $translation['age']?></label>
                <input type="text" class="form-control" id="formGroupAGEInput" placeholder="<?=$assoc['age']?>" value="<?= $_POST['age'] ?? "" ?>" name="age">
                <?php if (!empty($error['age'])) : ?>
                    <small id="passwordHelpInline" class="text-muted">
                        <?=$error['age'] ?>
                    </small>
                <?php endif; ?>
            </div>
            <div class="">
                <label for=""><?= $translation['email']?></label>
                <input type="email" class="form-control" id="formGroupMailInput" placeholder="<?=$assoc['email']?>" value="<?= $_POST['email'] ?? "" ?>" name="email">
                <?php if (!empty($error['email'])) : ?>
                    <small id="passwordHelpInline" class="text-muted">
                        <?=$error['email'] ?>
                    </small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Язык</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender" >
                    <?php
                    foreach ($assoc['gender'] as $key => $value){
                        echo "<br>key: ";
                        var_dump($key);
                        echo "<br>value: ";
                        var_dump($value);
                        echo "<option  value=\""
                            .$key
                            ."\""
                            .($value ==$_POST['gender'] ? "selected" : "" )
                            .">"
                            .$value
                            ."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>