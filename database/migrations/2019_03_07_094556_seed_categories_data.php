<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $data = [
            [
				'id' => 'daydayup',
                'name' => '天天向上',
                'description' => '😭 悲伤可以自行料理；而欢乐的滋味如果要充分体会，你就必须有人分享才行。',
            ],
            [
				'id' => 'climber',
                'name' => '职场那些事',
                'description' => '✍️ 在寻求真理的长河中，唯有学习，不断地学习，勤奋地学习，有创造性地学习，才能越重山跨峻岭。',
            ],
            [
				'id' => 'bebetter',
                'name' => '闲话生活',
                'description' => '😀 与人交谈一次，往往比多年闭门劳作更能启发心智。思想必定是在与人交往中产生，而在孤独中进行加工和表达。',
            ],
            [
				'id' => 'announcements',
                'name' => '公告',
                'description' => '✅ 我们不应该像蚂蚁，单只收集；也不可像蜘蛛，只从自己肚中抽丝；而应该像蜜蜂，既采集又整理，这样才能酿出香甜蜂蜜来。',
            ],
        ];
        $now = Carbon::now()->toDateTimeString();
        $data = array_map(static function ($value) use ($now) {
            $value['created_at'] = $now;
            $value['updated_at'] = $now;

            return $value;
        }, $data);
        DB::table('categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::table('categories')->truncate();
    }
}
