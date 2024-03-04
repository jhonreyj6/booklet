@extends('layouts.app')
@section('content')
    <div class="mt-24 mx-auto max-w-2xl">
        <!-- Snippet -->
        <section class="antialiased text-gray-600">
            <div class="h-full">
                <div class="relative">
                    <img class="rounded-t shadow-lg w-full" src="https://preview.cruip.com/mosaic/images/pay-bg.jpg"
                        height="180" alt="Pay background" />
                </div>
                <!-- Card body -->
                <div class="relative">
                    <form method="POST" action="/user/membership/{{ $plan }}" id="payment-form"
                        class="bg-white px-8 pb-6 rounded-b shadow-lg">
                        @csrf
                        <div class="text-center mb-6">
                            <div class="mb-2">
                                <img class="-mt-8 inline-flex rounded-full"
                                    src="https://preview.cruip.com/mosaic/images/user-64-13.jpg" width="64"
                                    height="64" alt="User" />
                            </div>
                            <h1 class="text-xl leading-snug text-gray-800 font-semibold mb-2">{{ Str::ucfirst($plan) }}</h1>
                            <div class="text-sm">
                                Read all the books you want.
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="border p-4" id="card-element">

                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1" for="card-holder-name">Name on Card <span
                                        class="text-red-500">*</span></label>
                                <input id="card-holder-name"
                                    class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full"
                                    type="text" placeholder="John Doe" name="name" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1" for="card-email">Email <span
                                        class="text-red-500">*</span></label>
                                <input id="card-email"
                                    class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full"
                                    type="email" placeholder="john@company.com" name="email" />
                            </div>

                            <div class="flex flex-row gap-4">
                                <div class="w-full">
                                    <label class="block text-sm font-medium mb-1" for="card-address">Address <span
                                            class="text-red-500">*</span></label>
                                    <input id="card-address"
                                        class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full"
                                        type="text" placeholder="Purok Lapu-lapu San Pedro Panabo City Philippines" name="address" />
                                </div>
                                <div class="w-64">
                                    <label class="block text-sm font-medium mb-1" for="card-address">Postal Code<span
                                            class="text-red-500">*</span></label>
                                    <input id="card-post"
                                        class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 focus:ring-0 w-full"
                                        type="number" name="postal_code" placeholder="Enter Postal Code" />
                                </div>
                            </div>

                        </div>
                        <!-- Form footer -->
                        <div class="mt-6">
                            <div class="mb-4">
                                <button
                                    class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2"
                                    type="submit" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')
        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if (error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')
                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)
                form.appendChild(token)
                form.submit();
            }
        })
    </script>
@endsection
