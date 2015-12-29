<?php

/**
 * Desc: 功能描述
 * Created by PhpStorm.
 * User: <gaolu@yundun.cn>
 * Date: 2015/11/24 22:03
 */
use Illuminate\Database\Seeder;
use App\Article;
class ArticleTableSeeder extends Seeder{
    public function run(){
        DB::table('articles')->delete();

        for($i=0;$i<10;$i++){
            Article::create([
               'title' =>  'Title'.$i,
                'slug'=> 'first-page',
                'body' => 'Body'.$i,
                'image' => 'http://xyui.me/assets/img/works/theme/01.png',
                'user_id' =>1
            ]);
        }
    }
}