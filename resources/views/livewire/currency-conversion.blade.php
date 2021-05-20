    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h2 class="mb-4">Currency Converter</h2>
            <form wire:submit.prevent="convert">
                <div class="flex flex-wrap mb-2">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Amount
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            id="amount" 
                            name="amount" 
                            type="number" 
                            wire:model="amount"
                            placeholder="Enter Amount" 
                        />
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        From
                        </label>
                        <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            id="from" name="from" wire:model="from"
                        >
                            @if($currencies)
                                @foreach ($currencies as $currency)
                                    <option value="" selected disabled hidden>Choose here</option>
                                    <option>{{ $currency->currency }}</option>
                                @endforeach
                            @else
                                <option>USD</option>
                                <option>MYR</option>
                            @endif
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                            To
                        </label>
                        <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                            id="to" name="to" wire:model="to"
                        >
                            @if($currencies)
                                @foreach ($currencies as $currency)
                                    <option value="" selected disabled hidden>Choose here</option>
                                    <option>{{ $currency->currency }}</option>
                                @endforeach
                            @else
                                <option>USD</option>
                                <option>MYR</option>
                            @endif
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-5 rounded font-medium">Convert</button>
                    </div>
                </div>
            </form>
            @if($result_value)
                <h2 class="flex justify-center">{{ $amount }} {{ $from }} = {{ $result_value }} {{ $to }}</h2>
            @endif
        </div>
    </div>