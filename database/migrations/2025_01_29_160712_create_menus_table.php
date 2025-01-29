<?php

use App\Models\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('route')->nullable();
            $table->json('active_routes')->nullable();
            $table->string('pattern')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
        });

        $this->insertMenuData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }

    protected function insertMenuData()
    {
        $assistanceMenu = DB::table('menus')->insertGetId([
            'title' => 'Assistance',
            'icon' => 'fa-solid fa-list',
            'route' => null,
            'active_routes' => json_encode(['assistancce']),
            'pattern' => null,
            'parent_id' => null,
            'order' => 1,
            'is_active' => true,
        ]);
    }
};
