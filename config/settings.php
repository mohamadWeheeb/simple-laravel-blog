<?php

use App\Models\AppSetting;

return  [
    'app' =>[
        'title' => 'Application Settings' ,
        "settings" => [
            'app.name'  =>[
                'lable' => 'Application Title' ,
                'type'  =>  'text' ,
                'validate'  =>  'string|max:255'
            ],
            'app.logo' => [
                'lable' => 'Application logo' ,
                'type'  =>  'image' ,
                'validate'  =>  'image'
            ] ,
            'app.locle' => [
                'lable' => 'Application Language' ,
                'type'  =>  'select' ,
                'validate'  =>  'string' ,
                'options'   =>  config('countries') ,
            ] ,
            'app.timzone' => [
                'lable' => 'Application Timzone' ,
                'type'  =>  'select' ,
                'validate'  =>  'string' ,
                'options'   =>  [AppSetting::class , 'timezoneOptions'] ,
            ] ,
            'app.about'  =>[
                'lable' => 'Application About' ,
                'type'  =>  'textarea' ,
                'validate'  =>  'string|max:255'
            ]
        ]
    ] ,

    'mail' => [
        'title' => "Application Setting" ,
        'settings' =>[
                'mail.from.name'=> [
                    'lable' => 'From Name' ,
                    'type'  =>  'text' ,
                    'validate'  =>  'string|max:255'
                ] ,
                'mail.from.address'=> [
                    'lable' => 'From Address' ,
                    'type'  =>  'text' ,
                    'validate'  =>  'email|max:255'
                ] ,
                'mail.mailer.smtp.host'=> [
                    'lable' => 'SMTP Host' ,
                    'type'  =>  'text' ,
                    'validate'  =>  'string'
                ]
            ]
    ] ,

    'contact' => [
        'title' =>  'Contact Informations' ,
        'settings' => [
            'contact.phone' => [
                'lable' => 'Phone Number' ,
                'type'  =>  'textarea' ,
                'validate'  =>  'string'
                ] ,
            'contact.address' => [
                'lable' => 'Address ' ,
                'type'  =>  'textarea' ,
                'validate'  =>  'string'
                ]
        ]
    ] ,
    'social-networks' =>[

        'title' =>  'Social Networks' ,
        'settings' => [
            'social-networks.facebook' => [
                'lable' => 'Facebook' ,
                'type'  =>  'text' ,
                'validate'  =>  'url'
            ] ,
            'social-networks.twitter' => [
            'lable' => 'Twitter' ,
            'type'  =>  'text' ,
            'validate'  =>  'url'
            ] ,
            'social-networks.linkedin' => [
            'lable' => 'Linkedin' ,
            'type'  =>  'text' ,
            'validate'  =>  'url'
            ]
        ]
    ]


];

