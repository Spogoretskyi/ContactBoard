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
                            <td style="padding: 40px;"
                                align="left"><img class="img-circle" style="vertical-align:middle"
                                                  src="<?php echo $faker->imageUrl(50, 50, 'people') ?>" alt="">
                                &nbsp;&nbsp;&nbsp;
                                <span>    <?php echo $r['username'] ?></span>
                            </td>
                            <td style="padding: 40px" align="left"> <?php echo $r['text'] ?> </td>
                            <td style="padding: 40px" align="left"> <?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $r['Add_date'])->diffForHumans() ?> </td>
                        </tr>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
</tbody>
</table>

