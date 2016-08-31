<?php

use PragmaRX\Tracker\Support\Migration;

class CreateTrackerDomainsTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_domains';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        $this->builder->create(
            $this->table,
            function ($table) {
                $table->bigIncrements('id');

                $table->string('name')->index();

                $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->index();
                $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->index();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        $this->drop($this->table);
    }
}
