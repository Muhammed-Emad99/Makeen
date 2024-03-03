@php use App\Helpers\SiteSetting; @endphp
<x-mail::message>
    {{ SiteSetting::getSetting('site_name_ar')->value }} الرد من خلال موقع
    <x-mail::panel>
        {{ $mailData }}
    </x-mail::panel>
</x-mail::message>



