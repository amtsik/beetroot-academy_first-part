<?php
$users = [
    [
        'name' => 'Bob',
        'surname' => 'Martin',
        'age' => 75,
        'gender' => 'man',
        'avatar' => 'https://i.ytimg.com/vi/sDnPs_V8M-c/hqdefault.jpg',
        'animals' => ['dog']
    ],
    [
        'name' => 'Alice',
        'surname' => 'Merton',
        'age' => 25,
        'gender' => 'woman',
        'avatar' => 'https://i.scdn.co/image/d44a5d71596b03b5dc6f5bbcc789458700038951',
        'animals' => ['dog', 'cat']
    ],
    [
        'name' => 'Jack',
        'surname' => 'Sparrow',
        'age' => 45,
        'gender' => 'man',
        'avatar' => 'https://pbs.twimg.com/profile_images/427547618600710144/wCeLVpBa_400x400.jpeg',
        'animals' => []
    ],
    [
        'name' => 'Angela',
        'surname' => 'Merkel',
        'age' => 65,
        'gender' => 'woman',
        'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg/330px-Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg',
        'animals' => ['dog', 'parrot', 'horse']
    ]
];

$animals =[];


foreach ($users as $user){
    $animals = array_merge($animals, $user['animals']);
}
$animals = array_unique($animals);

if (!empty($_POST)){
    $_POST['age'] = (int)$_POST['age'];
    $users[] = $_POST;
}

if (!empty($_GET)){
//    $usersCol = $_GET['sort'];
//    var_dump($users);
    switch ($_GET['sort']) {
        case 'id':
            if (!empty($_GET['order']) && $_GET['order'] == 'desk') {
                krsort($users);
            } else {
                ksort($users);
            }
            $users = array_values($users);
            break;
    }
}
if (!empty($_GET) && !empty($_GET['filter'])){
//    $usersCol = $_GET['sort'];
//    var_dump($users);
    switch ($_GET['filter']) {
        case 'man':
            foreach ($users as $key => $user) {
                if ($user['gender'] !== 'man') {
                    unset($users[$key]);
                }
            }
            break;
        case 'woman':
            foreach ($users as $key => $user) {
                if ($user['gender'] !== 'woman') {
                    unset($users[$key]);
                }
            }
            break;
        case 'covid':
            foreach ($users as $key => $user) {
                if ((int)$user['age'] <= 60) {
                    unset($users[$key]);
                }
            }
            break;
        default :
            break;
    }
}
if (!empty($_GET) && !empty($_GET['filter2'])){

    $userAnimal = array_column($users, 'animals');
    $userAnimalID = array_search(SEARCHNAME, $userSurname);
    $userSurnameSearch = $users [$userSurnameID];

    foreach ($animals as $key => $value) {
        if ($_GET['filter2'] == $value) {

        }
    }

    switch ($_GET['filter2']){
        case 'dog':
            break;
    }

}







//print_r($users);

$ages = array_column($users, 'age');

$maxAge = max($ages);
$maxAgeId = array_keys($ages, $maxAge);

define('SEARCHNAME', "Merkel");

$userSurname = array_column($users, 'surname');
$userSurnameID = array_search(SEARCHNAME, $userSurname);
$userSurnameSearch = $users [$userSurnameID];
sort($userSurnameSearch['animals']);

//var_dump($userSurnameSearchSort);
//exit();

//$randomUserId = rand (0, count($users) - 1);
//$randomUser = $users[$randomUserId];



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

    <table class="table table-striped" hidden>
        <thead>
        <tr>
            <th scope="col">#</th>
            <?php
            foreach ($users[0] as $key => $value){
                echo "<th scope=\"col\" value=\""
                    .$key
                    ."\">"
                    .$key
                    ."</th>";
            }
            ?>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($maxAgeId as $key => $value){
                echo "<tr>";
                echo "<th scope=\"row\">" .($key + 1) ."</th>";
                echo "<th scope=\"col\">" .$users[$value]['name'] ."</th>";
                echo "<th scope=\"col\">" .$users[$value]['surname'] ."</th>";
                echo "<th scope=\"col\">" .$users[$value]['age'] ."</th>";
                echo "<th scope=\"col\">" .$users[$value]['gender'] ."</th>";
                if (!empty($users[$value]['avatar'])) {
                    echo "<th scope=\"col\">" .'<img src="' .$users[$value]['avatar'] .'" class="rounded mx-auto d-block" alt="..." style="height: 25px;">' .'</th>';
                }
                else {
                    echo "<th scope=\"col\"></th>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="p"><br><br><br></div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"><a href="?sort=id<?='&order=' .(!empty($_GET['order']) && $_GET['order'] == 'aesk' ? 'desk' : 'aesk')?>">#</a></th>
            <?php
            foreach ($users[0] as $key => $value){
                echo "<th scope=\"col\" value=\""
                    .$key
                    ."\">"
                    .'<a href="?sort=' .$key .'">'
                    .$key
                    ."</a></th>";
            }
            ?>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $key => $value){
                $id = !empty($_GET['order']) && $_GET['order'] == 'aesk' ? count($users) - $key : $key + 1 ;
                echo '<tr style="background-color: ' .($key%2 ===0 ? '#aaa' : '#fff') .'">';
                echo "<th scope=\"row\">" .$id ."</th>";
                echo "<th scope=\"col\">" .$value['name'] ."</th>";
                echo "<th scope=\"col\">" .$value['surname'] ."</th>";
                echo "<th scope=\"col\">" .$value['age'] ."</th>";
                echo "<th scope=\"col\">" .$value['gender'] ."</th>";
                if (!empty($value['avatar'])) {
                    echo "<th scope=\"col\">" .'<img src="' .$value['avatar'] .'" class="rounded mx-auto d-block" alt="..." style="height: 50px;">' .'</th>';
                }
                else {
                    echo "<th scope=\"col\"></th>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <form action="" method="get">
        <select name="filter" id="">
            <option value=""></option>
            <option value="man"<?= (!empty($_GET['filter']) && $_GET['filter'] == 'man') ? ' selected' : '' ?> >Мужчины</option>
            <option value="woman" <?= (!empty($_GET['filter']) && $_GET['filter'] == 'woman') ? ' selected' : '' ?> >Женцины</option>
            <option value="covid" <?= (!empty($_GET['filter']) && $_GET['filter'] == 'covid') ? ' selected' : '' ?> >Риск COVID AGE > 60</option>
        </select>
        <select name="filter2" id="">
            <option value=""></option>
            <?php
            foreach ($animals as $key => $value){
                echo '<option value="'
                    .$value
                    .'" >'
                    .$value
                    .'</option>'
                ;
            }
            ?>
        </select>
        <input type="submit">
    </form>


<p hidden> животные Merkel </p>
    <ul hidden>
        <?php
        foreach ($userSurnameSearch['animals'] as $key => $value){
            echo "<li  value=\""
                .$key
                ."\">"
                .$value
                ."</li>";
        }
        ?>
    </ul>

    <a href="/user_min.php">на страницу регистрации</a>
</div>
</body>
</html>



