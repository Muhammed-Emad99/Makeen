<x-mail::message>
     {{ $data['message'] }}
    @component('mail::button', ['url' => $data['link']])
        اضغط هنا لمشاهدة الخدمة الجديدة
    @endcomponent
</x-mail::message>
