<?php require_once "header.php";
$faker = \Faker\Factory::create();
?>
<div class="jumbotron">
    <br>
    <p class="text-center">Blog, total posts <?php echo $post = $db->count($tableName) ?></p>
    <div class="row">
        <div class="col-md-12 vcenter">
            <div class="table table-condensed">
                <table align="center" class="table table-striped">
                    <link rel="stylesheet" type="text/css" href="table.css">
                    <thead>
                    <th style="padding: 40px; vertical-align: center;">#</th>
                    <th style="padding: 40px; vertical-align: center;">User</th>
                    <th style="padding: 40px; word-break: break-all; vertical-align: center;">Text</th>
                    <th style="padding: 40px; vertical-align: center;">Date</th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $i => $r) { ?>
                        <tr>
                            <td style="padding: 40px; vertical-align: center;" align="left"> <?php echo $i + 1; ?></td>
                            <td style="padding: 40px; vertical-align: center;"
                                align="left"><img src="<?php echo $faker->imageUrl(100, 100, 'people') ?>" alt="">
                                <br><?php echo $r['username'] ?></td>
                            <td style="padding: 40px" align="left"> <?php echo $r['text'] ?> </td>
                            <td style="padding: 40px" align="left"> <?php echo $r['Add_date'] ?> </td>
                        </tr>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
</tbody>
</table>

