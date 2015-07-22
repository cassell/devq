<?php

use Phinx\Migration\AbstractMigration;

class Schema extends AbstractMigration
{

    public function change()
    {
        $this->createSystemKeyValueTable();
    }

    protected function createSystemKeyValueTable()
    {
        $this->table('system_key_value', ['id' => false, 'primary_key' => 'system_key'])
            ->addColumn('system_key', 'integer')
            ->addColumn('system_value', 'string', ['limit' => 100])
            ->create();

        $this->execute('INSERT INTO system_key_value (system_key, system_value) VALUES (1, "DevQ");');

    }

}