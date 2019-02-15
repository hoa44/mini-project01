<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 2/12/19
 * Time: 5:27 AM
 */

$levels = array('low', 'medium', 'high');
$attributes = array('fat', 'quantity', 'ratio', 'label');

foreach ($levels as $key => $level):
    foreach ($attributes as $k =>$attribute):
        $variables[$level][] = $attribute . '_' . $level; // changed $variables[] to $variables[$level][]
    endforeach;
endforeach;

echo '<pre>' . print_r($levels,1) . '</pre>';
echo '<pre>' . print_r($variables,1) . '</pre>';
?>



<div class="container">
    <html>
    <head>
        <title>  My Dynamic Table </title>
    </head>
    <body>

    </body>
    </html>
    <table class="table table-striped table-hover">
        <?php foreach($variables as $x=>$y): ?>
            <tr>
                <td><?php echo ($x); ?></td>
                <td><?php echo ($y); ?></td>
            </tr>

        <?php  endforeach; ?>
    </table>
