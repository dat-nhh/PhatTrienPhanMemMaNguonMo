<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Faker\Factory;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        require_once 'vendor/autoload.php';
        require_once 'vendor\fakerphp\faker\src\autoload.php';
        $faker = Factory::create();

        for($i=1;$i<=200;$i++){
            $article = new Article;
            $article->title = 'Bai viet '.$i;
            $article->content = $faker->text;
            $article->save();
        }
    }
}
