<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

//
//function helloWord ($username)
//{
//    return "<h2>hello $username</h2>";
//}

function sortFields($userA, $userB)
{
    if (!empty($_GET['order']) && $_GET['order'] === 'asc') {
        return $userA[$_GET['sort']] <=> $userB[$_GET['sort']];
    }
    return $userB[$_GET['sort']] <=> $userA[$_GET['sort']];
}



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

if (!empty($_GET['sort'])){
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
        case 'name':
            usort ($users, 'sortFields');
            break;
        case 'surname':
        case 'age':
        case 'gender':
            usort ($users, 'sortFields');
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


