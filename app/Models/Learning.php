<?php

namespace App\Models;


class Learning
{
    private static $kel_learning = [
        [
            'nama'  =>  'Brandon Jacob',
            'nis'   =>  'Designer'
        ],
        [
            'nama'  =>  'Bridie Kessler',
            'nis'   =>  'Developer'
        ],
        [
            'nama'  =>  'Ashleigh Langosh',
            'nis'   =>  'Finance'
        ],
        [
            'nama'  =>  'Angus Grady',
            'nis'   =>  'HR'
        ],
        [
            'nama'  =>  'Raheem Lehner',
            'nis'   =>  'Dynamic Division Officer'
        ],
        [
            'nama'  =>  'Tiger Nixon',
            'nis'   =>  'System Architect'
        ],
        [
            'nama'  =>  'Ashton Cox',
            'nis'   =>  'Junior Technical Author'
        ],
        [
            'nama'  =>  'Brielle Williamson',
            'nis'   =>  'Integration Specialist'
        ],
        [
            'nama'  =>  'Colleen Hurst',
            'nis'   =>  'Javascript Developer'
        ],
        [
            'nama'  =>  'Sonya Frost',
            'nis'   =>  'Software Engineer'
        ],
        [
            'nama'  =>  'Haley Kennedy',
            'nis'   =>  'Senior Marketing Designer'
        ],
        [
            'nama'  =>  'Tatyana Fitzpatrick',
            'nis'   =>  'Software Engineer'
        ],
        [
            'nama'  =>  'Charde Marshall',
            'nis'   =>  'Javascript Developer'
        ],
    ];

    public static function kel2()
    {
        return collect(self::$kel_learning);
    }
}
