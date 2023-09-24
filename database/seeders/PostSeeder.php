<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [] ; 
        for($i = 0  ; $i <= 100 ; $i++) {
            $posts [] = [
                'title'=>'title'.$i, 
                'description'=>'title'.$i.' description '.$i,
                'author'=>'bodawahid' ,
                'created_at'=>now() ,
                'user_id'=> 1
            ] ; 
        }
        DB::table('posts')->insert($posts) ;
    }
}
