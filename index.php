<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$chessFigure = [
    0 => ['black' , 'rook'],
    1 => ['black' , 'horse'],
    2 => ['black' , 'bishop'],
    3 => ['black' , 'ferzin'],
    4 => ['black' , 'king'],
    5 => ['black' , 'bishop'],
    6 => ['black' , 'horse'],
    7 => ['black' , 'rook'],
    8 => ['black' , 'pawn'],
    9 => ['black' , 'pawn'],
    10 => ['black' , 'pawn'],
    11 => ['black' , 'pawn'],
    12 => ['black' , 'pawn'],
    13 => ['black' , 'pawn'],
    14 => ['black' , 'pawn'],
    15 => ['black' , 'pawn'],
    48 => ['while' , 'pawn'],
    49 => ['while' , 'pawn'],
    50 => ['while' , 'pawn'],
    51 => ['while' , 'pawn'],
    52 => ['while' , 'pawn'],
    53 => ['while' , 'pawn'],
    54 => ['while' , 'pawn'],
    55 => ['while' , 'pawn'],
    56 => ['while' , 'rook'],
    57 => ['while' , 'horse'],
    58 => ['while' , 'bishop'],
    59 => ['while' , 'ferzin'],
    60 => ['while' , 'king'],
    61 => ['while' , 'bishop'],
    62 => ['while' , 'horse'],
    63 => ['while' , 'rook'],
];

$flag = true

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" >

    <style type="text/css">
        .desk {
            width: 800px;
            height: 800px;
            background-color: #aaa;
            margin: 0 auto;
        }
        .cell   {
            width: calc(100% / 8);
            height: calc(100% / 8);
            border: 1px solid;
            float: left;
            box-sizing: border-box;
            position: relative;
        }
        .cell .background {
            width: 100%;
            height: 100%;
            display: block;
            position: absolute;
            left: 0;
            top: 0;
        }
        .while {
            background-color: #aaa;
            border-color: #bbb;
        }


        .black {
            background-color: #555;
            border-color: #444;
        }
        .arial {
            font: normal normal normal 42px/1 Arial;
            text-align: center;
            margin: auto;
        }
        .figure {
            position: absolute;
            top: calc( 50% - 20px);
            left: calc( 50% - 21px);
            background-color: transparent;
        }

        .while.figure {
            color: #fff;
        }

        .black.figure {
            color: #000;
        }

        .rook:before {
            content:"♖"
        }
        .horse:before {
            content:"♘"
        }
        .bishop:before {
            content:"♗"
        }
        .ferzin:before {
            content:"♕"
        }
        .king:before {
            content:"♔"
        }
        .pawn:before {
            content:"♙"
        }
        .letters {
            display: block;
            margin: auto;
            position: relative;
        }
        .letters i {
            position: absolute;
            top: 30%;
            left: 30%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="desk" >
        <?php for ($i = ord('a');$i <= ord('h'); $i++) : ?>
            <div class="cell letters" style="" >
                <i class=""><?=chr($i)?></i>
            </div>
        <?php endfor; ?>
        <?php for ($i = 0;$i <64; $i++) : ?>
            <?php
            $flag = !$flag;
            $flag = ($i % 8 === 0) ? !$flag : $flag ;
            ?>
            <div class="cell" style="" >
                <span class="background <?=$flag ? 'while' : 'black'?>"></span>
                <i class="arial figure <?=($chessFigure[$i][0] ?? '') .' ' .($chessFigure[$i][1] ?? '')?>"></i>
            </div>
        <?php endfor; ?>
    </div>
</div>

</body>
</html>

