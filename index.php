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

$flag = true;

echo (isset($_POST['cellrm']));

if(!empty($_POST) && !empty($_POST['chessfigure']) ){
    $chessFigure = json_decode($_POST['chessfigure'], true);

    if ($_POST['celladd'] !== '' && $_POST['cellrm'] !== '') {
        $chessFigure[$_POST['celladd']] = $chessFigure[$_POST['cellrm']];
        unset($chessFigure[$_POST['cellrm']]);
    }

}

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
            height: calc(100% / 9);
            border: 1px solid;
            float: left;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
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
            cursor: grab;
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
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 100%;
            min-height: 100%;
            font-size: 4em;
            font-style: inherit;
            text-transform: uppercase;
        }
        .hide {
            display: none;
        }
        .hovered {
            border-color: aqua;
        }
        form {
            margin: 50px auto;
            text-align: center;
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
            <div class="cell" style="" numofcell="<?=$i?>" >
                <span class="background <?=$flag ? 'while' : 'black'?>"></span>
                <i draggable="true" class="arial figure <?=($chessFigure[$i][0] ?? '') .' ' .($chessFigure[$i][1] ?? '')?>"></i>
            </div>
        <?php endfor; ?>
    </div>
    <form id="form" method="post">
        <textarea type="hidden" name="chessfigure" id="" style="display:none;"><?=json_encode($chessFigure)?></textarea>
        <input type="hidden" value="" name="celladd">
        <input type="hidden" value="" name="cellrm">
        <input type="submit" value="Походить">
    </form>
</div>

<script>
    const dragAndDrop =() => {

        const card = document.querySelectorAll('.figure');
        const cells = document.querySelectorAll('.cell');
        const formCellAdd = document.querySelector('[name="celladd"]');
        const formCellRm = document.querySelector('[name="cellrm"]');

        let figureForDrag;
        let cellForRm;

        const dragstart = function (){
            setTimeout(()=> {
                this.classList.add('hide');
                figureForDrag = this;
                cellForRm = this.parentNode.getAttribute('numofcell');
                console.log(cellForRm);
            }, 100);
        };
        const dragEnd = function (){
            this.classList.remove('hide');
            figureForDrag = null;
        };
        const dragOver = function (event){
            event.preventDefault();
        };
        const dragEnter = function (){
        };
        const dragLeave = function (){
        };

        const dragDrop = function (){
            this.append(figureForDrag);
            formCellRm.setAttribute('value', cellForRm);
            formCellAdd.setAttribute('value', this.getAttribute('numofcell'));
        };

        cells.forEach(cell => {
            cell.addEventListener('dragover', dragOver);
            cell.addEventListener('dragenter', dragEnter);
            cell.addEventListener('dragleave', dragLeave);
            cell.addEventListener('drop', dragDrop);
        });

        card.forEach(input => {
            input.addEventListener('dragstart', dragstart);
            input.addEventListener('dragend', dragEnd);
        });
    };

    dragAndDrop();
</script>

</body>
</html>

