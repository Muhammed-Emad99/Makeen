<x-mail::message>
    {{ $data['message'] }}
    {{ $data['link'] }}

@component('mail::button', ['url' => $data['link']])
        اضغط هنا لمشاهدة الخدمة الجديدة
    @endcomponent
</x-mail::message>
