<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW portfolio_projects_view AS
        SELECT portfolio.id as Portfolio_id, category_id, title, image, description, category_name, `portfolio_category`.id as categoryId FROM `portfolio`
         inner join `portfolio_category` on `portfolio_category`.`id` = `portfolio`.`category_id`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_projects_view');
    }
};
