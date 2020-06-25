<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

   /**
   * Auto generated seed file
   *
   * @return void
   */
   public function run()
   {
      $date = now();

      \DB::table('provinces')->delete();

      \DB::table('provinces')->insert([
         [
             'id' => 1,
             'name' => 'Province 1',
         ],
         [
             'id' => 2,
             'name' => 'Province 2',
         ],
         [
             'id' => 3,
             'name' => 'Province 3',
         ],
         [
             'id' => 4,
             'name' => 'Gandaki',
         ],
         [
             'id' => 5,
             'name' => 'Province 5',
         ],
         [
             'id' => 6,
             'name' => 'Karnali',
         ],
         [
             'id' => 7,
             'name' => 'Sudurpaschim',
         ]
      ]);

   }
}
