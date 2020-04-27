<?php

error_reporting(E_ALL);
ini_set('display_errors', trye);
require './functions.php';

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
            <th scope="col"><a href="?sort=id<?='&order=' .(!empty($_GET['order']) && $_GET['order'] === 'desk' ? 'asc' : 'desk')?>">#</a></th>
            <?php
            foreach ($users[0] as $key => $value){
                echo "<th scope=\"col\" value=\""
                    .$key
                    ."\">"
                    .'<a href="?sort=' .$key .'&order=' .(!empty($_GET['order']) && $_GET['order'] === 'desk' ? 'asc' : 'desk') .'">'
                    .$key
                    ."</a></th>";
            }
            ?>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $key => $value){
                $id = !empty($_GET['order']) && $_GET['order'] == 'asc' ? count($users) - $key : $key + 1 ;
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



