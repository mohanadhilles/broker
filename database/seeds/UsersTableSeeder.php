
<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        {
            $places = [
                ['id' => 1, 'title' => 'No Selected',],
                ['id' => 2, 'title' => 'House',],
                ['id' => 3, 'title' => 'Villa',],
                ['id' => 4, 'title' => 'Apartment',],
                ['id' => 5, 'title' => 'Palace',],

            ];


            $completions = [

                ['id' => 1, 'title' => 'No Selected',],
                ['id' => 2, 'title' => 'Dark skin',],
                ['id' => 3, 'title' => 'Light skin',],
                ['id' => 4, 'title' => 'Europe',],
                ['id' => 5, 'title' => 'East Asia',],
                ['id' => 6, 'title' => 'Tanning response',],
                ['id' => 7, 'title' => 'Albinism',],


            ];

            $educations = [
                ['id' => 1, 'title' => 'No Selected',],
                ['id' => 2, 'title' => 'primary',],
                ['id' => 3, 'title' => 'secondary',],
                ['id' => 4, 'title' => 'preparatory',],
                ['id' => 5, 'title' => 'Diploma',],

            ];

            $work_types = [
                ['id' => 1, 'title' => 'No Selected',],
                ['id' => 2, 'title' => 'Baby Sitting',],
                ['id' => 3, 'title' => 'Cleaning',],
                ['id' => 4, 'title' => 'Cooking	',],
                ['id' => 5, 'title' => 'Washing',],
                ['id' => 6, 'title' => 'Caring of new born babies',],
                ['id' => 7, 'title' => 'Caring of disabled person',],
                ['id' => 8, 'title' => 'Household chore',],
                ['id' => 9, 'title' => 'Elder Care',],
            ];

            $religions = [
                ['id' => 1, 'title' => 'No Selected',],
                ['id' => 2, 'title' => 'Christian',],
                ['id' => 3, 'title' => 'Hindu',],
                ['id' => 4, 'title' => 'Muslim',],
                ['id' => 5, 'title' => 'Chinese',],
                ['id' => 6, 'title' => 'jewish',],


            ];

            $langs = [
                ['id' => 1, 'title' => 'No Selected',],
                ['id' => 2, 'title' => 'Fluent',],
                ['id' => 3, 'title' => 'Fire',],
                ['id' => 4, 'title' => 'Poor',],

            ];


            foreach ($places as $item) {
                \App\Entities\Place::create($item);
            }


            foreach ($langs as $item) {
                \App\Entities\Language::create($item);
            }


            foreach ($completions as $item) {
                \App\Entities\Completion::create($item);
            }

            foreach ($educations as $item) {
                \App\Entities\Education::create($item);
            }

            foreach ($work_types as $item) {
                \App\Entities\JobType::create($item);
            }
            foreach ($religions as $item) {
                \App\Entities\Religion::create($item);
            }


            factory(\App\Entities\Currency::class, 155)->create();


            $roles = [

                ['id' => 1, 'title' => 'Administrator',],
                ['id' => 2, 'title' => 'Worker',],
                ['id' => 3, 'title' => 'Employer',],
                ['id' => 4, 'title' => 'Agency',],

            ];

            foreach ($roles as $item) {
                \App\Entities\Role::create($item);
            }

            $contract = [

                ['id' => 1, 'title' => 'Full Time',],
                ['id' => 2, 'title' => 'Part Time',],
            ];


            $answer = [

                ['id' => 1, 'title' => 'Yes',],
                ['id' => 2, 'title' => 'No',],
                ['id' => 3, 'title' => 'I have a Date',],
                ['id' => 4, 'title' => 'paragraph',],
            ];

            foreach ($answer as $item) {
                \App\Entities\Answer::create($item);
            }

            $q = [

                ['id' => 1, 'title' => 'Are you interested to work in Saudi Arabia?',],
                ['id' => 2, 'title' => 'Do you have valid passport?',],
                ['id' => 3, 'title' => 'when you will have ready passport?',],
                ['id' => 4, 'title' => 'Have you been contacted  from our local agency partner?',],
                ['id' => 5, 'title' => 'the name of the agency?',],
                ['id' => 6, 'title' => 'the name of the called person?',],
                ['id' => 7, 'title' => 'Have you reported to the agency? ',],
                ['id' => 8, 'title' => 'what is the reason?',],
                ['id' => 9, 'title' => 'what is the date reason?',],
                ['id' => 10, 'title' => 'What is the result of your medical checkup? ',],
                ['id' => 11, 'title' => 'it can be cured by medication?',],
                ['id' => 12, 'title' => 'What is the date of your biometric?  Date',],
                ['id' => 13, 'title' => 'Is there any fee paid from your side to the agency? ',],
                ['id' => 14, 'title' => 'how much the amount?',],
                ['id' => 15, 'title' => 'for what reasion you paid?',],
                ['id' => 16, 'title' => 'Is the visa has been stamped on your passport?',],
                ['id' => 17, 'title' => 'is your air ticket been booked?',],
                ['id' => 18, 'title' => 'what is the date and time of arrival?',],
                ['id' => 19, 'title' => 'what country you are interested for?',],
                ['id' => 20, 'title' => 'if you got a chance to work in saudi arabia will you be interested to work in ?',],
                ['id' => 21, 'title' => 'if yes she will be going to the section 1 to complete the question?',],
                ['id' => 22, 'title' => 'why what is the reasons to be not interested in Saudi Arabia?',],

            ];

            foreach ($q as $item) {
                \App\Entities\Question::create($item);
            }

            foreach ($contract as $item) {
                \App\Entities\Contract::create($item);
            }

            $lang = [
                ['id' => 1, 'title' => 'No Selected',],
                ['id' => 2, 'title' => 'English',],
                ['id' => 3, 'title' => 'Arabic',],
                ['id' => 4, 'title' => 'China',],

            ];

            foreach ($lang as $item) {
                \App\Entities\Lang::create($item);
            }

            $countries = [
                ['id' => 1, 'title' => 'No Selected','code'=> 'no'],
                ['id' => 2, 'title' => 'Saudi Arabia', 'code' => '+966'],
                ['id' => 3, 'title' => 'United Arab Emirates', 'code' => '+971'],
                ['id' => 4, 'title' => 'lebanon', 'code' => '+371'],
                ['id' => 5, 'title' => 'Bahrain', 'code' => '+973'],
                ['id' => 6, 'title' => 'Oman', 'code' => '+968'],
                ['id' => 7, 'title' => 'Qatar', 'code' => '+1787'],
                ['id' => 8, 'title' => 'Philippines', 'code' => '+63'],
                ['id' => 9, 'title' => 'Taiwan', 'code' => '+886'],
                ['id' => 10, 'title' => 'China', 'code' => '+86'],
                ['id' => 11, 'title' => 'indonesia', 'code' => '+62'],
            ];

            foreach ($countries as $item) {
                \App\Entities\Country::create($item);
            }



            factory(\App\User::class, 243)->create();

            $follow = [

                ['id' => 1, 'question_id' => 1, 'answer_id'=> 1, 'user_id'=> 1],
                ['id' => 2, 'question_id' => 1, 'answer_id'=> 1, 'user_id'=> 1],

            ];

            $track = [
                ['id' => 1, 'title' => 'Registration',],
                ['id' => 2, 'title'=>'Complete the profile',],
                ['id' => 3, 'title' => 'Complete the medical examination',],
                ['id' => 4, 'title'=>'Complete the training',],
                ['id' => 5, 'title' => 'An effective passport',],
                ['id' => 6, 'title'=>'Visa is effective',],
                ['id' => 7, 'title' => 'Book your ticket',],
                ['id' => 8, 'title'=>'Reception from the airport',],
                ['id' => 9, 'title' => 'Delivery',],
                ['id' => 10, 'title'=>'Done',],
            ];

            foreach ($track as $item) {
                \App\Entities\TrackCase::create($item);
            }

            factory(\App\Entities\Skill::class, 100)->create();
            factory(\App\Entities\Setting::class, 100)->create();


        }
    }
}
