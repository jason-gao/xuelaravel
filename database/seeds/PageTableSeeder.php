<?php

/**
 * Desc: 功能描述
 * Created by PhpStorm.
 * User: <gaolu@yundun.cn>
 * Date: 2015/11/24 22:03
 */
use Illuminate\Database\Seeder;
use App\Page;
class PageTableSeeder extends Seeder{
    public function run(){
        DB::table('pages')->delete();

        for($i=0;$i<10;$i++){
            Page::create([
               'title' =>  'Title'.$i,
                'slug'=> 'first-page',
                'body' => 'Body'.$i,
                'user_id' =>1
            ]);
        }
    }
}