<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topic = Topic::create([
            'name' => 'Alternative medicine, homeopathy and acupuncture'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Anesthesia'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Animal Welfare'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Behavior'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Clinical Pathology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Critical care and emergency medicine'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Dentistry'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Dermatology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Diagnostic imaging'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Endocrinology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'EQUINE MEDICINE & SURGERY'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Exotics'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Feline medicine'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Gastroenterology and hepatology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Hereditary diseases'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Infectious and emerging diseases'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Internal medicine (OTHER)'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Nephrology and Urology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Neurology/Neurosurgery'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Nutrition'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Oncology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'One health'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Ophthalmology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Orthopedics'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Pain management'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Pharmacology'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Practice management'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Reproduction, pediatrics'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Soft tissue surgery and Oncosurgery'
        ]);
        $topic->save();

        $topic = Topic::create([
            'name' => 'Sports Medicine and Rehabilitation'
        ]);
        $topic->save();
    }
}
