@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-6 mx-auto text-center py-4">
        @if(Request::get('to') == 'btc')
            <h2 class="mt-4">Konversi Rupiah ke Bitcoin</h2>
        @else
            <h2 class="mt-4">Konversi Bitcoin ke Rupiah</h2>
        @endif
        <h5 class="mb-5">Kurs 1 USD = {{ number_format(env('RUPIAH_RATE')) }}</h5>
        <form>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    @if(Request::get('to') == 'btc')
                        <span class="input-group-text">Rp.</span>
                    @else
                        <span class="input-group-text">BTC</span>
                    @endif
                </div>
                <input type="number" id="input-wrapper" onkeyup="process()" class="form-control">
            </div>
        </form>
        @if(Request::get('to') == 'btc')
            <div class="mt-4 d-none" id="result-wrapper">
                Rp. <span id="entered-value"></span> = Bitcoin  <span id="response-value"></span>
            </div>
        @else
        <div class="mt-4 d-none" id="result-wrapper">
            Bitcoin <span id="entered-value"></span> = Rp. <span id="response-value"></span>
        </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
    <script>
        const process = debounce(() => convert());
        const type = "{{ Request::get('to') }}";

        function debounce(func, timeout = 500)
        {
            let timer;

            return(...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    func.apply(this, args);
                }, timeout);
            }
        }

        function convert()
        {
            let input_wrapper = document.getElementById('input-wrapper');
            input_wrapper.disabled = true;

            $.ajax({
                url: 'http://bitcoin.test/api/convert',
                type: 'post',
                data: {
                    value: input_wrapper.value,
                    currency: type
                }
            })
            .done((response) => {
                const entered_wrapper = document.getElementById('entered-value'),
                    response_wrapper = document.getElementById('response-value'),
                    result_wrapper = document.getElementById('result-wrapper');

                result_wrapper.classList.remove('d-none');
                entered_wrapper.innerHTML = input_wrapper.value;
                response_wrapper.innerHTML = response;
                input_wrapper.disabled = false;
            })
            .fail((response) => {
                input_wrapper.disabled = false;
                console.log('fail', response);
            })
        }
    </script>
@endpush
