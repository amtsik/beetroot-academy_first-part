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

if (!empty($_POST)){
    $users[] = $_POST;
}

//print_r($users);

$ages = array_column($users, 'age');

//echo "<br> ages: ";
//var_dump($ages);
//echo "<br>";
$maxAge = max($ages);
$maxAgeId = array_search($maxAge, $ages);
//echo "<br> maxAgeId: ";
//var_dump($maxAgeId);
$oldestUser = $users [$maxAgeId];
//echo "<br> oldestUser: ";
//var_dump($oldestUser);

define('SEARCHNAME', "Jack");

$userName = array_column($users, 'name');
$userNameID = array_search(SEARCHNAME, $userName);
$userNameSearch = $users [$userNameID];

$randomUserId = rand (0, count($users) - 1);
$randomUser = $users[$randomUserId];



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
    <ul>
        <?php
        foreach ($oldestUser as $key => $value){
            if (is_array($value) ) {
                continue;
            }
            else {
                echo "<li  value=\""
                    .$key
                    ."\">"
                    .$key
                    ." - "
                    .$value
                    ."</li>";
            }
        }
        ?>
        <li>общее количество пользователей :<?=count($users) ?> </li>
    </ul>
    <ul>
        <?php
        foreach ($userNameSearch as $key => $value){
            if (is_array($value) ) {
                continue;
            }
            else {
                echo "<li  value=\""
                    .$key
                    ."\">"
                    .$key
                    ." - "
                    .$value
                    ."</li>";
            }
        }
        ?>
    </ul>
    <ul>
        <?php
        foreach ($randomUser as $key => $value){
            if (is_array($value) ) {
                continue;
            }
            else {
                echo "<li  value=\""
                    .$key
                    ."\">"
                    .$key
                    ." - "
                    .$value
                    ."</li>";
            }
        }
        ?>
    </ul>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <?php
            foreach ($randomUser as $key => $value){
                if (is_array($value) ) {
                    continue;
                }
                else {
                    echo "<th scope=\"col\" value=\""
                        .$key
                        ."\">"
                        .$key
                        ."</th>";
                }
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <?php
            foreach ($randomUser as $key => $value){
                if (is_array($value) ) {
                    continue;
                }
                else {
                    echo "<th scope=\"col\" value=\""
                        .$key
                        ."\">"
                        .$value
                        ."</th>";
                }
            }
            ?>
        </tr>

        </tbody>
    </table>
    <a href="/user_min.php">на страницу регистрации</a>
</div>
</body>
</html>



