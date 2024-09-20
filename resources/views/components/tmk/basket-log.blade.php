@php
    use App\Helpers\Cart;
@endphp

@props([
    'record' => 15      // default value is 15
])

{{-- show this (debug) code only in development APP_ENV=local  --}}
@env('local')
    <x-tmk.section x-data="{ show: true }" @dblclick="show = !show" class="bg-yellow-50 mt-8 cursor-pointer">
        <p class="font-bold">What's inside my basket?</p>
        <div x-show="show" x-cloak>
            @php
                $detailedCartData = [
                    'Cart::getCart()' => Cart::getCart(),
                    'Cart::getRecords()' => Cart::getRecords(),
                    'Cart::getOneRecord(' . $record . ')' => Cart::getOneRecord((int)$record),
                ];
                $inlineCartData = [
                    'Cart::getKeys()' => Cart::getKeys(),
                    'Cart::getTotalPrice()' => Cart::getTotalPrice(),
                    'Cart::getTotalQty()' => Cart::getTotalQty(),
                ];
            @endphp

            @foreach ($detailedCartData as $label => $data)
                <hr class="my-4">
                <p class="text-rose-800 font-bold">{{ $label }}:</p>
                <pre class="text-sm">@json($data, JSON_PRETTY_PRINT)</pre>
            @endforeach

            <hr class="my-4">
            @foreach ($inlineCartData as $label => $data)
                <p>
                    <span class="text-rose-800 font-bold pr-2">{{ $label }}:</span>
                    @json($data, JSON_PRETTY_PRINT)
                </p>
            @endforeach
        </div>
    </x-tmk.section>
@endenv
{{--@env('local')
    <x-tmk.section
        x-data="{ show: true }"
        @dblclick="show = !show"
        class="bg-yellow-50 mt-8 cursor-pointer">
        <p class="font-bold">What's inside my basket?</p>
        <div x-show="show" x-cloak="">
            <hr class="my-4">
            <p class="text-rose-800 font-bold">Cart::getCart():</p>
            <pre class="text-sm">@json(Cart::getCart(), JSON_PRETTY_PRINT)</pre>
            <hr class="my-4">
            <p class="text-rose-800 font-bold">Cart::getRecords():</p>
            <pre class="text-sm">@json(Cart::getRecords(), JSON_PRETTY_PRINT)</pre>
            <hr class="my-4">
            <p class="text-rose-800 font-bold">Cart::getOneRecord({{$record}}):</p>
            <pre class="text-sm">@json(Cart::getOneRecord((int)$record), JSON_PRETTY_PRINT)</pre>
            <hr class="my-4">
            <p><span
                    class="text-rose-800 font-bold pr-2">Cart::getKeys():</span>@json(Cart::getKeys(), JSON_PRETTY_PRINT)
            </p>
            <p><span
                    class="text-rose-800 font-bold pr-2">Cart::getTotalPrice():</span>@json(Cart::getTotalPrice(), JSON_PRETTY_PRINT)
            </p>
            <p><span
                    class="text-rose-800 font-bold pr-2">Cart::getTotalQty():</span>@json(Cart::getTotalQty(), JSON_PRETTY_PRINT)
            </p></div>
    </x-tmk.section>
@endenv--}}
