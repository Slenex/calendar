<?php
use App\Course;
use Illuminate\Database\Seeder;

class CalendarEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
           [
                'title'=>'Rom Event', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2017-05-10', 
                'to_Datetime'=>'2017-05-15'
            ],
            [
                'title'=>'Java Session', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2017-05-10', 
                'to_Datetime'=>'2017-05-15'
            ],
            [
                'title'=>'PHP Session', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2017-05-10', 
                'to_Datetime'=>'2017-05-15'
            ],
            [
                'title'=>'Machine Learning Event', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2017-05-10', 
                'to_Datetime'=>'2017-05-15'
            ],
            [
                'title'=>'AI Event', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2017-05-10', 
                'to_Datetime'=>'2017-05-15'
            ],

        ];

        foreach ($data as $key => $value) {

        	Course::create($value);

        }
    }
}
