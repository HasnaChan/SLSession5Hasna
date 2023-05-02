<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index(){
        $achievements = [
            ['id'=>1, 'name' => 'Kuis Kihajar', 'rankid' => 'C', 'rank' => 'Champion', 'level' => 'Province', 'image' => '1.jpg' ],
            ['id'=>2, 'name' => 'DCombe', 'rankid' => 'R', 'rank' => 'Runner Up', 'level' => 'Province', 'image' => '2.jpg' ],
            ['id'=>3, 'name' => 'Wall Magazine', 'rankid' => 'R','rank' => 'Runner Up', 'level' => 'National', 'image' => '3.jpg' ],
            ['id'=>4, 'name' => 'Interclass English Debate', 'rankid' => 'C', 'rank' => 'Champion', 'level' => 'Internal School', 'image' => '4.jpg' ],
            ['id'=>5, 'name' => 'Kejuaraan Taekwondo Kyorugi', 'rankid' => 'S', 'rank' => 'Second Runner Up', 'level' => 'Province', 'image' => '5.jpg' ],
            ['id'=>6, 'name' => 'Kejuaraan Taekwondo Pomsae', 'rankid' => 'C', 'rank' => 'Champion', 'level' => 'City', 'image' => '6.jpg' ],
            ['id'=>7, 'name' => 'Kejuaraan Taekwondo Kyorugi', 'rankid' => 'S', 'rank' => 'Second Runner Up', 'level' => 'City', 'image' => '7.jpg' ],
            ['id'=>8, 'name' => 'Kejuaraan Taekwondo Kyorugi', 'rankid' => 'C', 'rank' => 'Champion', 'level' => 'City', 'image' => '8.jpg' ],
            ['id'=>9, 'name' => 'Kejuaraan Taekwondo Pomsae', 'rankid' => 'R', 'rank' => 'Runner Up', 'level' => 'City', 'image' => '9.jpg' ]
        ];

        return view('achievement', ["achievements" => $achievements, "title" => 'achievement']);
    }


    public function detail($id){
        $achievements = [

            ['id'=>1,
            'name' => 'Kuis Kihajar',
            'rank' => 'Champion',
            'rankid' => 'C',
            'level' => 'Province',
            'image' => '1.jpg',
            'desc' => 'Kuis Kihajar held by Balai Pengembangan Teknologi Informasi dan Komunikasi Pendidikan dan Kebudayaan (BPTIK DIKBUD) Dinas Penidikan dan Kebudayaan Central Java Province on 10 - 11 September 2019 in Semarang.'
            ],

            ['id'=>2,
            'name' => 'DCombe',
            'rank' => 'Runner Up',
            'rankid' => 'R',
            'level' => 'Province',
            'image' => '2.jpg',
            'desc' => 'DComber Held by Engineering Faculty of Dian Nuswantoro University for Engineering Festival with theme "Euphoria Engineering 2019" on 30 - 31 January 2019.',
            ],

            ['id'=>3,
            'name' => 'Wall Magazine',
            'rank' => 'Runner Up',
            'rankid' => 'R',
            'level' => 'National',
            'image' => '3.jpg',
            'desc' => 'Wall Magazine Competition hel by Dian Nuswantoro University for DINUSFEST with the theme "Together We Achieve the Extraordinary" on 23 - 25 January 2018.'
            ],

            ['id'=>4,
            'name' => 'Interclass English Debate',
            'rank' => 'Champion',
            'rankid' => 'C',
            'level' => 'Internal School',
            'image' => '4.jpg',
            'desc' => 'Internal English Debate Competiton Held by Stemba English Club Extracullicular of SMKN 7 Semarang on 11 & 18 November 2017.',
            ],

            ['id'=>5,
            'name' => 'Kejuaraan Taekwondo Kyorugi',
            'rank' => 'Second Runner Up',
            'rankid' => 'S',
            'level' => 'Province',
            'image' => '5.jpg',
            'desc' => 'Kejuaraan Taekwondo Kyorugi held by Pengkab Taekwondo Kendal on 19 - 20 September 2015.'
            ],

            ['id'=>6,
            'name' => 'Kejuaraan Taekwondo Pomsae',
            'rank' => 'Champion',
            'rankid' => 'C',
            'level' => 'City',
            'image' => '6.jpg',
            'desc' => 'Kejuaraan Taekwondo Pomsae held by Tri Dharma Taekwondo organization in Semarang on 16 March 2014.'
            ],

            ['id'=>7,
            'name' => 'Kejuaraan Taekwondo Kyorugi',
            'rank' => 'Second Runner Up',
            'rankid' => 'S',
            'level' => 'City',
            'image' => '7.jpg',
            'desc' => 'Kejuaraan Taekwondo Kyorugi is an annual competition POPDA (Pekan Olahraga Pelajar Daerah) in Semarang held on 10 - 15 March 2014.'
            ],

            ['id'=>8,
            'name' => 'Kejuaraan Taekwondo Kyorugi',
            'rank' => 'Champion',
            'rankid' => 'C',
            'level' => 'City',
            'image' => '8.jpg',
            'desc' => 'Kejuaraan Taekwondo Kyorugi an annual competition POPDA (Pekan Olahraga Pelajar Daerah) in Semarang held on Fevruary 24 - March 1 2014.'
            ],

            ['id'=>9,
            'name' => 'Kejuaraan Taekwondo Pomsae',
            'rank' => 'Runner Up',
            'rankid' => 'R',
            'level' => 'City',
            'image' => '9.jpg',
            'desc' => 'Kejuaraan Taekwondo Kyorugi an annual competition POPDA (Pekan Olahraga Pelajar Daerah) in Semarang held on Fevruary 24 - March 1 2014.'
            ]

        ];

        $achievement = [];
        foreach($achievements as $a){
            if($a["id"] == $id){
                $achievement = $a;
            }
        }
        return view('detailAchievement', ["achievement" => $achievement, "title" => 'achievement']);

    }
}
