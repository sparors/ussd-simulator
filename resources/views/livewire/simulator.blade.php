{{-- In work, do what you enjoy. --}}
<div class="h-screen flex flex-col font-muli">
    <div class="flex-1 px-40 py-12 bg-blue-700">
        <h1 class="text-lg">
            <span class="bg-yellow-600 text-blue-700 p-2 rounded-lg font-bold">USSD</span>
            <span class="text-white font-semibold">Simulator</span>
        </h1>

        <div class="flex h-full py-12">
            <div class="flex-1">
                <div class="flex flex-col h-full justify-between">
                    <h3 class="text-white font-semibold text-2xl tracking-wide">
                        Intended for use by developers to test their
                        endpoint <br> implementations before integration.
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <label class="sim-label">Host URL</label>
                            <input class="form-input sim-input placeholder-opacity-75 place-holder-white" wire:model="url" type="url" name="url" placeholder="eg. https://a924d784.ngrok.io" autocomplete="off" />
                        </div>
                        <div class="flex items-center">
                            <label class="sim-label">Method</label>
                            <select class="form-select sim-select" wire:model="method" name="method">
                                <option value="">Select request method</option>
                                <option value="GET">GET</option>
                                <option value="POST">POST</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <label class="sim-label">Network Operator</label>
                            <select class="form-select sim-select" wire:model="network" name="network">
                                <option value="">select network operator</option>
                                <option value="airteltigo">AirtelTigo</option>
                                <option value="glo">Glo</option>
                                <option value="mtn">MTN</option>
                                <option value="vodafone">Vodafone</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <label class="sim-label">Phone Number</label>
                            <input class="form-input sim-input placeholder-opacity-75 place-holder-white" wire:model="phoneNumber" type="tel" name="phone_number" placeholder="eg. 0546628393" autocomplete="off" />
                        </div>
                        <div class="flex items-center">
                            <label class="sim-label">Aggregator</label>
                            <select class="form-select sim-select" wire:model="aggregator" name="aggregator">
                                <option value="">Select aggregator</option>
                                <option value="korba">Korba</option>
                                <option value="nsano">Nsano</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-initial max-w-xs w-full relative">
                <div class="absolute bg-white h-screen-80 w-full rounded-2xl px-4 pt-4 pb-12 right-0 bottom-0 -mb-32 shadow-xl">
                    <div class="bg-gray-200 h-full rounded-xl">
                        <div class="flex flex-col h-full space-y-2 p-2">
                            <pre class="flex-1"><code class="font-ubuntu text-xs text-gray-700 leading-tight tracking-tight overflow-hidden">{{ $output }}</code></pre>
                            <h4 class="text-blue-700 font-bold">USSD Code</h4>
                            <input class="form-input bg-gray-400 rounded-md text-gray-800" placeholder="eg.*721#" wire:model="input" type="text" name="input" />
                            <button class="py-2 px-4 bg-blue-700 focus:outline-none focus:shadow-outline rounded-md shadow-lg" type="button" wire:click="sendRequest">
                                <span class="flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4 fill-current text-white" viewBox='0 0 512 512'><path d='M476.59,227.05l-.16-.07L49.35,49.84A23.56,23.56,0,0,0,27.14,52,24.65,24.65,0,0,0,16,72.59V185.88a24,24,0,0,0,19.52,23.57l232.93,43.07a4,4,0,0,1,0,7.86L35.53,303.45A24,24,0,0,0,16,327V440.31A23.57,23.57,0,0,0,26.59,460a23.94,23.94,0,0,0,13.22,4,24.55,24.55,0,0,0,9.52-1.93L476.4,285.94l.19-.09a32,32,0,0,0,0-58.8Z'/></svg>
                                    <span class="font-bold text-white">
                                        Send
                                    </span>
                                </span>
                            </button>
                            <button class="text-blue-800 py-2 px-4 focus:outline-none focus:shadow-outline rounded-md" type="button" wire:click="cancelRequest">
                                <span class="flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    <span class="font-bold">
                                        Reset
                                    </span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-initial flex items-center justify-between py-8 bg-gray-200 text-gray-700 text-sm">
        <div class="space-x-8 ml-40">
            <span class="text-blue-700">Made with <span class="text-xl">&#9829;</span> by</span>
            <span>
                <img class="inline-block w-10 h-10 rounded-full border border-gray-300" src="{{ config('app.env') === 'production' ? secure_asset('img/yawmanford.jpg') : asset('img/yawmanford.jpg') }}" />
                <a href="https://twitter.com/yawmanford" target="_blank">@yawmanford</a>
            </span>
            <span>
                <img class="inline-block w-10 h-10 rounded-full border border-gray-300" src="{{ config('app.env') === 'production' ? secure_asset('img/isaacadzahsai.jpg') : asset('img/isaacadzahsai.jpg') }}" />
                <a href="https://twitter.com/isaacadzahsai" target="_blank">@isaacadzahsai</a>
            </span>
            <span>
                <img class="inline-block w-10 h-10 rounded-full border border-gray-300" src="{{ config('app.env') === 'production' ? secure_asset('img/maxxas.jpg') : asset('img/maxxas.jpg') }}" />
                <a href="https://twitter.com/maxxxsas" target="_blank">@maxxxsas</a>
            </span>
        </div>
        <div class="mr-12">
            v0.1.0
        </div>
    </div>
</div>
