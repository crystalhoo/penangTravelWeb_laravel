<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'key'   => 'title',
                'value' => 'Penang<br><span>Travel</span>'
            ],
            [
                'key'   => 'subtitle',
                'value' => 'Penang best travel agency'
            ],
            [
                'key'   => 'youtube_link',
                'value' => 'https://www.youtube.com/watch?v=eMXSers8zGw'
            ],
            [
                'key'   => 'about_description',
                'value' => 'Our goal is to make your trip enjoyable, carefree and memorable. Our team of professional staff are available 24/7 to help guests with leisure travel-related services and booking of vacation packages with a smile. As travel advisors, we go that extra mile to always deliver the best possible services to all our clients at genuinely affordable rates. All you have to do is sit back, relax while we do the work.'
            ],
            [
                'key'   => 'about_where',
                'value' => 'Georgetown, Penang'
            ],
            [
                'key'   => 'about_when',
                'value' => 'Monday to Wednesday<br>10-12 December'
            ],
            [
                'key'   => 'contact_address',
                'value' => '1,Aboo Sittee Lane,10400 Georgetown,Penang'
            ],
            [
                'key'   => 'contact_phone',
                'value' => '+604 – 226 6633'
            ],
            [
                'key'   => 'contact_email',
                'value' => 'travelagency@mail.com'
            ],
            [
                'key'   => 'footer_description',
                'value' => 'Our Company simple and effective philosophy, lies a relationship with the customer so immense that it can only be compared to something that we treasured you most with the best possible way of services. For us, it means heart and soul effort in planning your itinerary. And for us it’s not just a tour, it’s really our pride and joy too.'
            ],
            [
                'key'   => 'footer_address',
                'value' => '1 <br> Aboo Sittee Lane, 10400 <br> Georgetown, Penang'
            ],
            [
                'key'   => 'footer_twitter',
                'value' => '#'
            ],
            [
                'key'   => 'footer_facebook',
                'value' => '#'
            ],
            [
                'key'   => 'footer_instagram',
                'value' => '#'
            ],
            [
                'key'   => 'footer_googleplus',
                'value' => '#'
            ],
            [
                'key'   => 'footer_linkedin',
                'value' => '#'
            ],
        ];

        foreach($settings as $setting)
        {
            Setting::create($setting);
        }
    }
}
