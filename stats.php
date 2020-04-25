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
        'name' => 'Bob',
        'surname' => 'Sparrow',
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
    $_POST['age'] = (int)$_POST['age'];
    $users[] = $_POST;
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

    <table class="table table-striped">
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
                echo "<th scope=\"col\">" .$users[$value]['surname'] ."</th>";
                echo "<th scope=\"col\">" .$users[$value]['age'] ."</th>";
                echo "<th scope=\"col\">" .$users[$value]['gender'] ."</th>";
                if (!empty($users[$value]['avatar'])) {
                    echo "<th scope=\"col\">" .'<img src="' .$users[$value]['avatar'] .'" class="rounded mx-auto d-block" alt="..." style="height: 50px;">' .'</th>';
                }
                else {
                    echo "<th scope=\"col\"></th>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
<p> животные Merkel </p>
    <ul>
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



