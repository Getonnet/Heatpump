<?php

use App\QuestionSet;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $set = [
            'What is your full name?',

            'At what street address do you intend to install a heat pump?',

            'Which mobile phone number can we contact you at?',

            'what e-mail address should we send the offer to?',

            'Approximately how much area do you want to be heated or possibly cooled down by the heat pump? I need answers in square meters and assume that you have normal ceiling height inside.',

            'Do you say that your house is well insulated or is it poorly insulated? If the house is well insulated, you may need a pump with less capacity than if it is poorly insulated. Answer with GOOD, or BAD.',

            'How is the wall that we have to drill through to connect the indoor and outdoor part to the heat pump? Is it made of timber (ordinary wooden wall), concrete / brick or perhaps reinforced concrete? It is allowed to answer "do not know". I ask about wall construction to hear if our fitters need to bring special equipment to drill into the wall.'
        ];


        foreach ($set as $row){
            QuestionSet::firstOrCreate(['name' => $row]);
        }

    }
}
