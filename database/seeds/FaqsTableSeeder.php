answer<?php

use App\Faq;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faqs = [
          [
              'question'   => 'Penang is composed of which two parts?',
              'answer' => 'Penang is the second smallest state in Malaysia, and is composed of two parts – Penang Island and Seberang Perai on the Malay Peninsula.'
          ],
          [
              'question'   => 'How Penang got its name?',
              'answer' => 'From the Malay word Pinang, means the betel nut tree.'
          ],
          [
              'question'   => 'How Georgetown got its name?',
              'answer' => 'Georgetown, was named after King George III of Great Britain.'
          ],
          [
              'question'   => 'How to have best scene on Georgetown?',
              'answer' => 'Penang Hill offers the best view of Georgetown, and can be reached via a five minute ride on the Penang Hill Railway which was opened in 1923.'
          ],
          [
              'question'   => 'Penang is known for ?',
              'answer' => 'Penang is known for being the “food paradise” of Malaysia.'
          ]
      ];

      foreach($faqs as $faqs)
      {
          Faq::create($faqs);
      }
    }
}
