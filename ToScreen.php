
<?php require_once "header.php" ?>
<div class="jumbotron">
    <br>
    <p class="text-center">Blog, total posts <?php echo $post = $db->count() ?></p>
    <div class="row">
        <div class="col-md-6 vcenter">
<div class="table table-condensed">
    <table align="center" class="table table-striped" >
        <link rel="stylesheet" type="text/css" href="table.css">
        <thead>
        <th style="padding: 40px; vertical-align: center;">#</th>
        <th style="padding: 40px; vertical-align: center;">User</th>
        <th style="padding: 40px; vertical-align: center;">Text</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($result as $i=>$r) {  ?>
        <tr>
            <td style="padding: 40px; vertical-align: center;" width="50" align="left"> <?php  echo $i + 1; ?></td>
            <td style="padding: 40px; vertical-align: center;" width="150" align="left"> <?php echo $r['username'] ?></td>
            <td style="padding: 40px" width="600" align="left"> <?php echo $r['text'] ?> </td>
        </tr>
    <?php } ?>
        </div>
        </div>
    </div>
</div>
        </tbody>
</table>

