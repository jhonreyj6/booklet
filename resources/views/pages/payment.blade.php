{{-- deleted --}}
@extends('../layouts/app')
@section('content')
    <div class="mt-20 max-w-6xl mx-auto border border-blue-200 rounded py-4 px-8 mb-8">
        <div class="flex flex-col items-center justify-between border-b bg-white py-4 sm:flex-row">
            <div class="text-2xl font-bold text-gray-800">Payment</div>
            <div>
                <button type="button" class="px-4 py-1 border-red-700 bg-red-500 text-white text-lg rounded">Cancel
                    Order</button>
            </div>
        </div>
        <div class="grid lg:grid-cols-2">
            <div class="px-4 pt-8">
                <p class="text-xl font-medium">Order Summary</p>
                <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
                <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                    @foreach ($items as $item)
                        <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                            <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
                                src="https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                alt="" />
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="font-semibold">{{ $item->name }}</span>
                                <span class="float-right text-gray-400">by: {{ $item->author }}</span>
                                <p class="text-lg font-bold">₱{{ $item->price }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <form action="{{ route('single.charge', ['id' => $order->id]) }}" method="POST" id="subscribe-form" class="mt-10 mb-8 bg-gray-50 px-4 pt-8 lg:mt-0">
                @csrf
                <p class="text-xl font-medium">Payment Details</p>
                <p class="text-gray-400">Complete your order by providing your payment details.</p>
                <label for="card-holder-name" class="mt-4 block font-semibold">Card Holder Name</label>
                <div class="flex flex-col gap-2 relative">
                    <input id="card-holder-name" type="text" placeholder="Full name" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:border-blue-500 focus:ring-blue-500">
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <i class="fa-solid fa-address-card fa-lg text-gray-400"></i>
                    </div>
                </div>

                <div>
                    <label for="card-element" class="mt-4 block font-semibold">Credit or debit card</label>
                    <div id="card-element" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm uppercase shadow-sm outline-none focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <div class="stripe-errors"></div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                    @endforeach
                </div>
                @endif

                <div class="mt-6 border-t border-b py-2">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Subtotal</p>
                        <p class="font-semibold text-gray-900">₱{{ $items->pluck('price')->sum() }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Discount</p>
                        <p class="font-semibold text-gray-900">₱0</p>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Total</p>
                    <p class="text-2xl font-semibold text-gray-900">₱{{ $items->pluck('price')->sum() }}</p>
                </div>

                <div class="form-group text-center">
                    <button  id="card-button" data-secret="{{ $intent->client_secret }}" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>

@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {
            hidePostalCode: true,
            style: style
        });
        card.mount('#card-element');
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );
            if (error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                paymentMethodHandler(setupIntent.payment_method);
            }
        });

        function paymentMethodHandler(payment_method) {
            var form = document.getElementById('subscribe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
@endsection

@endsection
