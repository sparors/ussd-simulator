<div class="h-screen flex flex-col font-ubuntu">
    <div class="flex-1 px-32 bg-blue-800">
        <div class="flex flex-col h-full">
            <h1 class="text-lg flex-initial py-10">
                <span class="bg-yellow-500 text-blue-800 p-2 rounded-lg font-bold">USSD</span>
                <span class="text-white font-normal">Simulator</span>
            </h1>

            <div class="flex-1">
                <div class="flex h-full">
                    <div class="flex-1">
                        <h3 class="text-white font-semibold text-xl tracking-wide opacity-75 pb-10">
                            Intended for use by developers to test their endpoint <br>
                            implementations before integration.
                        </h3>

                        <div class="space-y-4">
                            <div class="flex items-center">
                                <label class="sim-label">Host URL</label>
                                <div x-data="{ url: '' }" class="inline-block relative w-full max-w-sm">
                                    <input x-bind:class="{ 'bg-gray-100 text-blue-800 opacity-100': url !== '' }" x-model="url" class="form-input sim-input pl-5 pr-12" wire:model="url" type="url" name="url" placeholder="eg. https://a924d784.ngrok.io" autocomplete="off" />
                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                        <div wire:model="url">
                                            <svg x-on:click="url = '';$dispatch('input', '')" x-show="url !== ''" class="w-6 h-6 text-blue-700 mr-5 cursor-pointer" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <label class="sim-label">Method</label>
                                <div x-data="{ method: '', hide: true }" class="inline-block relative w-full max-w-sm z-30">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <svg x-show="method === 'GET'" class="w-6 h-6 ml-5" viewBox="0 0 15.154 11.996"><g id="Get" transform="translate(-276 -340.683)"><path id="Path_118" data-name="Path 118" d="M-964.929,1105.092l3.86-2.687a.311.311,0,0,1,.488.255v1.819h4.805a.868.868,0,0,1,.868.868.867.867,0,0,1-.868.868h-4.805v1.819a.311.311,0,0,1-.488.255l-3.86-2.687A.31.31,0,0,1-964.929,1105.092Z" transform="translate(1241.062 -761.666)" fill="#1d3f4d"/><path id="Path_119" data-name="Path 119" d="M-964.929,1105.092l3.86-2.687a.311.311,0,0,1,.488.255v1.819h4.805a.868.868,0,0,1,.868.868.867.867,0,0,1-.868.868h-4.805v1.819a.311.311,0,0,1-.488.255l-3.86-2.687A.31.31,0,0,1-964.929,1105.092Z" transform="translate(1246.062 -755.666)" fill="#1d3f4d" opacity="0.4"/></g></svg>
                                        <svg x-show="method === 'POST'" class="w-6 h-6 ml-5" viewBox="0 0 15.154 11.996"><path id="Path_118" data-name="Path 118" d="M-955.041,1105.092l-3.86-2.687a.311.311,0,0,0-.488.255v1.819h-4.805a.868.868,0,0,0-.868.868.867.867,0,0,0,.868.868h4.805v1.819a.311.311,0,0,0,.488.255l3.86-2.687A.31.31,0,0,0-955.041,1105.092Z" transform="translate(970.062 -1102.349)" fill="#22a586"/><path id="Path_119" data-name="Path 119" d="M-955.041,1105.092l-3.86-2.687a.311.311,0,0,0-.488.255v1.819h-4.805a.868.868,0,0,0-.868.868.867.867,0,0,0,.868.868h4.805v1.819a.311.311,0,0,0,.488.255l3.86-2.687A.31.31,0,0,0-955.041,1105.092Z" transform="translate(965.062 -1096.349)" fill="#22a586" opacity="0.4"/></svg>
                                    </div>
                                    <input x-bind:class="{ 'pl-5': method === '', 'pl-16 bg-gray-100 text-blue-800 opacity-100': method !== '' }" x-model="method" x-on:click="hide = false" class="form-input sim-select pr-12 cursor-pointer" wire:model="method" type="text" name="method" placeholder="Select request method" autocomplete="off" readonly />
                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                        <svg class="w-6 h-6 text-blue-700 mr-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div x-bind:class="{ 'hidden': hide === true }" x-on:click.away="hide = true" class="absolute bg-gray-100 inset-x-0 rounded-b">
                                        <div wire:model="method">
                                            <div x-on:click="method = 'GET';$dispatch('input', 'GET');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <svg class="w-6 h-6" viewBox="0 0 15.154 11.996"><g id="Get" transform="translate(-276 -340.683)"><path id="Path_118" data-name="Path 118" d="M-964.929,1105.092l3.86-2.687a.311.311,0,0,1,.488.255v1.819h4.805a.868.868,0,0,1,.868.868.867.867,0,0,1-.868.868h-4.805v1.819a.311.311,0,0,1-.488.255l-3.86-2.687A.31.31,0,0,1-964.929,1105.092Z" transform="translate(1241.062 -761.666)" fill="#1d3f4d"/><path id="Path_119" data-name="Path 119" d="M-964.929,1105.092l3.86-2.687a.311.311,0,0,1,.488.255v1.819h4.805a.868.868,0,0,1,.868.868.867.867,0,0,1-.868.868h-4.805v1.819a.311.311,0,0,1-.488.255l-3.86-2.687A.31.31,0,0,1-964.929,1105.092Z" transform="translate(1246.062 -755.666)" fill="#1d3f4d" opacity="0.4"/></g></svg>
                                                <span class="ml-4 text-blue-800">GET</span>
                                            </div>
                                        </div>
                                        <div wire:model="method">
                                            <div x-on:click="method = 'POST';$dispatch('input', 'POST');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <svg class="w-6 h-6" viewBox="0 0 15.154 11.996"><path id="Path_118" data-name="Path 118" d="M-955.041,1105.092l-3.86-2.687a.311.311,0,0,0-.488.255v1.819h-4.805a.868.868,0,0,0-.868.868.867.867,0,0,0,.868.868h4.805v1.819a.311.311,0,0,0,.488.255l3.86-2.687A.31.31,0,0,0-955.041,1105.092Z" transform="translate(970.062 -1102.349)" fill="#22a586"/><path id="Path_119" data-name="Path 119" d="M-955.041,1105.092l-3.86-2.687a.311.311,0,0,0-.488.255v1.819h-4.805a.868.868,0,0,0-.868.868.867.867,0,0,0,.868.868h4.805v1.819a.311.311,0,0,0,.488.255l3.86-2.687A.31.31,0,0,0-955.041,1105.092Z" transform="translate(965.062 -1096.349)" fill="#22a586" opacity="0.4"/></svg>
                                                <span class="ml-4 text-blue-800">POST</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <label class="sim-label">Network Operator</label>
                                <div x-data="{ network: '', hide: true }" class="inline-block relative w-full max-w-sm z-20">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <img x-show="network === 'airteltigo'" class="inline-block w-6 h-6 ml-5" src="{{ config('app.env') === 'production' ? secure_asset('img/airteltigo.png') : asset('img/airteltigo.png') }}" />
                                        <img x-show="network === 'glo'" class="inline-block w-6 h-6 ml-5" src="{{ config('app.env') === 'production' ? secure_asset('img/glo.png') : asset('img/glo.png') }}" />
                                        <img x-show="network === 'mtn'" class="inline-block w-6 h-6 ml-5" src="{{ config('app.env') === 'production' ? secure_asset('img/mtn.png') : asset('img/mtn.png') }}" />
                                        <img x-show="network === 'vodafone'" class="inline-block w-6 h-6 ml-5" src="{{ config('app.env') === 'production' ? secure_asset('img/vodafone.png') : asset('img/vodafone.png') }}" />
                                    </div>
                                    <input x-bind:class="{ 'pl-5': network === '', 'pl-16 bg-gray-100 text-blue-800 opacity-100': network !== '' }" x-model="network" x-on:click="hide = false" class="form-input sim-select pr-12 cursor-pointer" wire:model="network" type="text" name="network" placeholder="Select request network" autocomplete="off" readonly />
                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                        <svg class="w-6 h-6 text-blue-700 mr-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div x-bind:class="{ 'hidden': hide === true }" x-on:click.away="hide = true" class="absolute bg-gray-100 inset-x-0 rounded-b">
                                        <div wire:model="network">
                                            <div x-on:click="network = 'airteltigo';$dispatch('input', 'airteltigo');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <img class="inline-block w-6 h-6" src="{{ config('app.env') === 'production' ? secure_asset('img/airteltigo.png') : asset('img/airteltigo.png') }}" />
                                                <span class="ml-4 text-blue-800">airteltigo</span>
                                            </div>
                                        </div>
                                        <div wire:model="network">
                                            <div x-on:click="network = 'glo';$dispatch('input', 'glo');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <img class="inline-block w-6 h-6" src="{{ config('app.env') === 'production' ? secure_asset('img/glo.png') : asset('img/glo.png') }}" />
                                                <span class="ml-4 text-blue-800">glo</span>
                                            </div>
                                        </div>
                                        <div wire:model="network">
                                            <div x-on:click="network = 'mtn';$dispatch('input', 'mtn');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <img class="inline-block w-6 h-6" src="{{ config('app.env') === 'production' ? secure_asset('img/mtn.png') : asset('img/mtn.png') }}" />
                                                <span class="ml-4 text-blue-800">mtn</span>
                                            </div>
                                        </div>
                                        <div wire:model="network">
                                            <div x-on:click="network = 'vodafone';$dispatch('input', 'vodafone');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <img class="inline-block w-6 h-6" src="{{ config('app.env') === 'production' ? secure_asset('img/vodafone.png') : asset('img/vodafone.png') }}" />
                                                <span class="ml-4 text-blue-800">vodafone</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <label class="sim-label">Phone Number</label>
                                <div x-data="{ phoneNumber: '' }" class="inline-block relative w-full max-w-sm">
                                    <input x-bind:class="{ 'bg-gray-100 text-blue-800 opacity-100': phoneNumber !== '' }" x-model="phoneNumber" class="form-input sim-input pl-5 pr-12" wire:model="phoneNumber" type="tel" name="phone_number" placeholder="eg. 0546628393" autocomplete="off" />
                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                        <div wire:model="phoneNumber">
                                            <svg x-on:click="phoneNumber = '';$dispatch('input', '')" x-show="phoneNumber !== ''" class="w-6 h-6 text-blue-700 mr-5 cursor-pointer" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <label class="sim-label">Aggregator</label>
                                <div x-data="{ aggregator: '', hide: true }" class="inline-block relative w-full max-w-sm z-10">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <img x-show="aggregator === 'korba'" class="inline-block w-6 h-6 ml-5" src="{{ config('app.env') === 'production' ? secure_asset('img/hubtel.png') : asset('img/hubtel.png') }}" />
                                        <img x-show="aggregator === 'nsano'" class="inline-block w-6 h-6 ml-5" src="{{ config('app.env') === 'production' ? secure_asset('img/nsano.png') : asset('img/nsano.png') }}" />
                                    </div>
                                    <input x-bind:class="{ 'pl-5': aggregator === '', 'pl-16 bg-gray-100 text-blue-800 opacity-100': aggregator !== '' }" x-model="aggregator" x-on:click="hide = false" class="form-input sim-select pr-12 cursor-pointer" wire:model="aggregator" type="text" name="aggregator" placeholder="Select request aggregator" autocomplete="off" readonly />
                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                        <svg class="w-6 h-6 text-blue-700 mr-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div x-bind:class="{ 'hidden': hide === true }" x-on:click.away="hide = true" class="absolute bg-gray-100 inset-x-0 rounded-b">
                                        <div wire:model="aggregator">
                                            <div x-on:click="aggregator = 'korba';$dispatch('input', 'korba');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <img class="inline-block w-6 h-6" src="{{ config('app.env') === 'production' ? secure_asset('img/hubtel.png') : asset('img/hubtel.png') }}" />
                                                <span class="ml-4 text-blue-800">korba</span>
                                            </div>
                                        </div>
                                        <div wire:model="aggregator">
                                            <div x-on:click="aggregator = 'nsano';$dispatch('input', 'nsano');hide = true" class="flex px-5 py-3 cursor-pointer">
                                                <img class="inline-block w-6 h-6" src="{{ config('app.env') === 'production' ? secure_asset('img/nsano.png') : asset('img/nsano.png') }}" />
                                                <span class="ml-4 text-blue-800">nsano</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-none relative">
                        <div class="absolute right-0 bottom-0">
                            <div class="bg-white h-135 w-72 rounded-2xl px-3 pt-3 pb-8 shadow-xl -mb-12">
                                <div class="bg-gray-200 h-full rounded-xl">
                                    <div class="flex flex-col h-full space-y-2 p-2">
                                        <pre class="flex-1 overflow-y-scroll overflow-x-hidden"><code class="text-xs text-gray-700 leading-tight tracking-tight whitespace-pre-wrap break-words">{{ $output }}</code></pre>
                                        <div class="flex-none">
                                            <div class="flex flex-col space-y-2">
                                                <h4 class="text-blue-700 font-bold">USSD Code</h4>
                                                <div x-data="{ input: '' }" class="inline-block relative">
                                                    <input x-bind:class="{ 'bg-gray-100 text-blue-800': input !== '', 'bg-gray-400': input === '' }" x-model="input" class="px-5 py-3 form-input rounded-md focus:bg-gray-100 w-full" placeholder="eg.*721#" wire:model="input" type="text" name="input" />
                                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                                        <div wire:model="input">
                                                            <svg x-on:click="input = '';$dispatch('input', '')" x-show="input !== ''" class="w-6 h-6 text-blue-700 mr-5 cursor-pointer" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="py-3 px-5 bg-blue-700 hover:bg-blue-600 focus:outline-none focus:shadow-outline rounded-md shadow-lg" type="button" wire:click="sendRequest">
                                                    <span class="flex items-center justify-center space-x-2">
                                                        <svg class="w-6 h-6 fill-current text-white" viewBox='0 0 512 512'><path d='M476.59,227.05l-.16-.07L49.35,49.84A23.56,23.56,0,0,0,27.14,52,24.65,24.65,0,0,0,16,72.59V185.88a24,24,0,0,0,19.52,23.57l232.93,43.07a4,4,0,0,1,0,7.86L35.53,303.45A24,24,0,0,0,16,327V440.31A23.57,23.57,0,0,0,26.59,460a23.94,23.94,0,0,0,13.22,4,24.55,24.55,0,0,0,9.52-1.93L476.4,285.94l.19-.09a32,32,0,0,0,0-58.8Z'/></svg>
                                                        <span class="font-bold text-white">
                                                            Send
                                                        </span>
                                                    </span>
                                                </button>
                                                <button class="text-blue-700 hover:text-blue-600 py-3 px-5 focus:outline-none focus:shadow-outline rounded-md" type="button" wire:click="cancelRequest">
                                                    <span class="flex items-center justify-center space-x-2">
                                                        <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
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
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <div class="flex-none flex items-center justify-between py-8 bg-gray-200 text-gray-600 text-xs">
        <div class="space-x-5 ml-32">
            <span class="text-blue-800">Made with
                <img class="inline-block w-3 h-3" src="{{ config('app.env') === 'production' ? secure_asset('img/heart.svg') : asset('img/heart.svg') }}" />
                by
            </span>
            <span>
                <img class="inline-block w-8 h-8 rounded-full border border-gray-300" src="{{ config('app.env') === 'production' ? secure_asset('img/yawmanford.jpg') : asset('img/yawmanford.jpg') }}" />
                <a href="https://twitter.com/yawmanford" target="_blank">@yawmanford</a>
            </span>
            <span>
                <img class="inline-block w-8 h-8 rounded-full border border-gray-300" src="{{ config('app.env') === 'production' ? secure_asset('img/isaacadzahsai.jpg') : asset('img/isaacadzahsai.jpg') }}" />
                <a href="https://twitter.com/isaacadzahsai" target="_blank">@isaacadzahsai</a>
            </span>
            <span>
                <img class="inline-block w-8 h-8 rounded-full border border-gray-300" src="{{ config('app.env') === 'production' ? secure_asset('img/maxxas.jpg') : asset('img/maxxas.jpg') }}" />
                <a href="https://twitter.com/maxxxsas" target="_blank">@maxxxsas</a>
            </span>
        </div>

        <div class="mr-12">
            v0.2.0
        </div>
    </div>
</div>
