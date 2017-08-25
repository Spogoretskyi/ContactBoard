<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table("users");
        $table->addColumn("name", 'string');
        $table->addColumn("password", 'string');
        $table->addColumn("mail", 'string');
        $table->addColumn("created_at", 'datetime');
        $table->addColumn("updated_at", 'datetime');
        $table->create();
    }
}
