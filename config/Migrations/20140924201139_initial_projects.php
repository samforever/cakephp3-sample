<?php

use Phinx\Migration\AbstractMigration;

class InitialProjects extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     */
    public function change()
    {
        $projectsTable = $this->table('projects');
        $projectsTable->addColumn('name', 'string')
            ->addColumn('created', 'datetime')
            ->create();

        $tasksTable = $this->table('tasks');
        $tasksTable->addColumn('name', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('finished', 'datetime')
            ->addColumn('project_id', 'integer')
//            TODO Find why it does not work!
//            ->addForeignKey('project_id', $projectsTable, 'id', ['delete' => 'CASCADE'])
            ->create();
    }

    /**
     * Migrate Up.
     */
    public function up()
    {
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}