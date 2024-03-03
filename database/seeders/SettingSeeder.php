<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Setting::insert([

            [
                'key' => 'site_name_ar',
                'key_ar' => 'الاسم باللغه العربية بالصفحة الرئيسية',
                'type' => 'text',
                'value' => 'شركة مكين للاستشارات',
            ],
            [
                'key' => 'site_name_en',
                'key_ar' => 'الاسم باللغه الانجليزية بالصفحة الرئيسية',
                'type' => 'text',
                'value' => 'Maken Consultations Company',
            ],
            [
                'key' => 'logo',
                'key_ar' => 'شعار الموقع',
                'type' => 'file',
                'value' => 'setting/logo.png',
            ],
            [
                'key' => 'favicon',
                'key_ar' => 'ايقونة الموقع',
                'type' => 'file',
                'value' => 'setting/logo.png',
            ],
            [
                'key' => 'about_us_image',
                'key_ar' => 'صورة نبذة عنا',
                'value' => 'settings/logo-f.png',
                'type' => 'file'
            ],
            [
                'key' => 'our_feature_image',
                'key_ar' => 'صورة مميزاتنا',
                'type' => 'file',
                'value' => 'setting/logo.png',
            ],
            [
                'key' => 'our_training_image',
                'key_ar' => 'صورة تدريبنا',
                'value' => 'settings/logo-f.png',
                'type' => 'file'
            ],
            [
                'key' => 'phone',
                'key_ar' => 'رقم الجوال',
                'value' => '+966 56 677 2077',
                'type' => 'number',
            ],
            [
                'key' => 'other_phone',
                'key_ar' => 'رقم الجوال الاخر',
                'value' => '+945 12 235 2056',
                'type' => 'number',
            ],
            [
                'key' => 'experience',
                'key_ar' => 'سنوات الخبرة',
                'value' => '+20',
                'type' => 'number',
            ],
            [
                'key' => 'email',
                'key_ar' => 'البريد الالكتروني',
                'value' => 'info@aldgelbelawfirm.com.sa',
                'type' => 'email',
            ],

            [
                'key' => 'website',
                'key_ar' => 'الموقع الالكتروني',
                'value' => 'www.maken.com',
                'type' => 'text',
            ],
            [
                'key' => 'facebook',
                'key_ar' => 'فيسبوك',
                'value' => 'https://facebook.com',
                'type' => 'text',
            ],
            [
                'key' => 'instagram',
                'key_ar' => 'انستاجرام',
                'value' => 'https://instagram.com',
                'type' => 'text',
            ],
            [
                'key' => 'snapchat',
                'key_ar' => 'سناب شات',
                'value' => 'https://snapshat.com',
                'type' => 'text',
            ],
            [
                'key' => 'twitter',
                'key_ar' => 'تويتر',
                'value' => 'https://twitter.com',
                'type' => 'text',
            ],
            [
                'key' => 'about_us_ar',
                'key_ar' => 'نبذة عنا باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'about_us_en',
                'key_ar' => 'نبذة عنا باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],
            [
                'key' => 'description_ar',
                'key_ar' => 'الوصف باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'description_en',
                'key_ar' => 'الوصف باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],
            [
                'key' => 'our_vision_ar',
                'key_ar' => 'رؤيتنا باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'our_vision_en',
                'key_ar' => 'رؤيتنا باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],
            [
                'key' => 'our_message_ar',
                'key_ar' => 'رسالتنا باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'our_message_en',
                'key_ar' => 'رسالتنا باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],

            [
                'key' => 'our_service_ar',
                'key_ar' => 'خدماتنا باللغة العربية',
                'value' => 'في ما يلي امثلة عن الخدمات االستشارية التي تقدمها شركة مكين لالستشارات بالتعاون مع شركائها',
                'type' => 'textarea'
            ],
            [
                'key' => 'our_service_en',
                'key_ar' => 'خدماتنا باللغة الانجليزية',
                'value' => "Below are examples of consulting services provided by Makeen Consulting Company in cooperation with its partners",
                'type' => 'textarea'
            ],

            [
                'key' => 'our_feature_ar',
                'key_ar' => 'مميزاتنا باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'our_feature_en',
                'key_ar' => 'مميزاتنا باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],
            [
                'key' => 'our_feature_desc_ar',
                'key_ar' => 'وصف مميزاتنا باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'our_feature_desc_en',
                'key_ar' => 'وصف مميزاتنا باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],
            [
                'key' => 'our_training_desc_ar',
                'key_ar' => 'تدريبنا باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'our_training_desc_en',
                'key_ar' => 'تدريبنا باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],

            [
                'key' => 'call_us_desc_ar',
                'key_ar' => 'وصف تواصل معنا باللغة العربية',
                'value' => 'مكين لالستشارات هي شركة استشارية سعودية تقدم خدمات استشارية وحلول شاملة في المجاالت اإلدارية والتعليمية والتكنولوجية والثورة الرابعة مثل )الذكاء االصطناعي ، وإنترنت األشياء والروبوتات',
                'type' => 'textarea'
            ],
            [
                'key' => 'call_us_desc_en',
                'key_ar' => 'وصف تواصل معنا باللغة الانجليزية',
                'value' => "Makeen Consulting is a Saudi consulting company that provides consulting services and comprehensive solutions in the administrative, educational, technological and fourth revolution fields such as (artificial intelligence, the Internet of Things and robotics).",
                'type' => 'textarea'
            ],
            [
                'key' => 'copy_right_ar',
                'key_ar' => 'حقوق النشر باللغة العربية',
                'value' => 'لشركة مكين للاستشارات',
                'type' => 'text'
            ],
            [
                'key' => 'copy_right_en',
                'key_ar' => 'حقوق النشر باللغة الانجليزية',
                'value' => 'For Makeen Consulting Company',
                'type' => 'text'
            ],

            [
                'key' => 'address',
                'key_ar' => 'الموقع الحالي',
                'value' => 'المملكة العربية السعودية - الرياض - برج الفيصلية - الدور رقم 18',
                'type' => 'text',
            ],
            [
                'key' => 'lat',
                'key_ar' => 'lat',
                'value' => '24.71517',
                'type' => 'hidden',
            ],
            [
                'key' => 'lng',
                'key_ar' => 'lng',
                'value' => '56.71517',
                'type' => 'hidden',
            ],
        ]);
    }
}
