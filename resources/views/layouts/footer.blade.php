@php
    $footer_logo = App\Models\WebConfig::where('name', 'footer_logo')->first();
@endphp
<footer class="flex justify-center mt-auto pb-3">
    <p class="me-2">by </p>
    <img src="{{$footer_logo->value}}" class="w-auto h-6" alt="kw">
</footer>