<?php

use Phinx\Migration\AbstractMigration;

class CreateCommentsTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('comments');
        $table->addColumn('username', 'string');
        $table->addColumn('text', 'text');
        $table->addColumn('Add_date', 'datetime');
        $table->create();

    }
}
