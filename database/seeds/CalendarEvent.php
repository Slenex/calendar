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
                'from_Datetime'=>'2019-12-30', 
                'to_Datetime'=>'2019-12-01'
            ],
            [
                'title'=>'Java Session', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2019-11-25', 
                'to_Datetime'=>'2019-12-11'
            ],
            [
                'title'=>'PHP Session', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2019-12-05', 
                'to_Datetime'=>'2019-12-08'
            ],
            [
                'title'=>'Machine Learning Event', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2019-11-05', 
                'to_Datetime'=>'2019-11-08'
            ],
            [
                'title'=>'AI Event', 
                'training_method' => 'online', 
                'batch' => 'online',
                'language' => 'online',
                'level' => 'online',
                'partner' => 'online',
                'address' => 'online',
                'from_Datetime'=>'2019-09-05', 
                'to_Datetime'=>'2019-09-08'
            ],

        ];

        foreach ($data as $key => $value) {

        	Course::create($value);

        }
    }
}
