<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

$assoc = [
    'name' => "name",
    'surname' => "surname",
    'age' => "age",
    'email' => "email@email",
    'gender' => [],
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


//echo empty($labels['ua']);
//echo "<br>";
//var_dump($labels['ua']);
//echo "<br>";
//echo empty($lang['jp']);
//echo "<br>";
//echo "<br>";
//
//
//$users = [
//    [
//        'name' => 'Bob',
//        'surname' => 'Martin',
//        'age' => 75,
//        'gender' => 'man',
//        'avatar' => 'https://i.ytimg.com/vi/sDnPs_V8M-c/hqdefault.jpg',
//        'animals' => ['dog']
//    ],
//    [
//        'name' => 'Alice',
//        'surname' => 'Merton',
//        'age' => 25,
//        'gender' => 'woman',
//        'avatar' => 'https://i.scdn.co/image/d44a5d71596b03b5dc6f5bbcc789458700038951',
//        'animals' => ['dog', 'cat']
//    ],
//    [
//        'name' => 'Jack',
//        'surname' => 'Sparrow',
//        'age' => 45,
//        'gender' => 'man',
//        'avatar' => 'https://pbs.twimg.com/profile_images/427547618600710144/wCeLVpBa_400x400.jpeg',
//        'animals' => []
//    ],
//    [
//        'name' => 'Angela',
//        'surname' => 'Merkel',
//        'age' => 65,
//        'gender' => 'woman',
//        'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg/330px-Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg',
//        'animals' => ['dog', 'parrot', 'horse']
//    ]
//];
//
//echo "<br>";
//echo "<br>";
//
//$name = array_column($users, 'name');
//$ages = array_column($users, 'age');
//var_dump($name);
//
//echo "<br>";
//var_dump($ages);
//echo "<br>";
//echo "array_search(\"75\", name)";
//echo "<br>";
//echo "<br>";
//
//$key = array_search("75", $ages);
//
//echo "<br>";
//var_dump($ages);
//echo "<br> array_search: ";
//var_dump($key);
//
//if ($key !== false ) {
//    echo "sldkfjslakj";
//} else {
//
//}
//
//echo "<br>";
//echo "<br>";
//var_dump($ages);
//echo "<br> sort: ";
//sort($ages);
//echo "<br>";
//echo "<br>";
//var_dump($ages);
//
//echo "<br>";
//echo "<br> rsort: ";
//rsort($ages);
//var_dump($ages);
//echo "<br>";
//
//echo "<br>";
//echo "<br> min: ";
//var_dump(min($ages));
//echo "<br>";
//
//echo "<br>";
//echo "<br> max: ";
//var_dump(max($ages));
//echo "<br>";
//
//
//
//exit();

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
                    foreach ($formLanguages as $key => $value){
                        echo "<option  value=\""
                            .$key
                            ."\""
                            .($value['value'] == $assoc['language']['value'] ? "selected" : "" )
                            .">"
                            .$value['language']
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
