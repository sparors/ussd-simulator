<div>
    <div>
        {{-- In work, do what you enjoy. --}}
        <h1>
            <span>USSD</span>
            <span>Simulator</span>
        </h1>
        <div>
            <div>
                <h3>
                    Intended for use by developers to test their
                    endpoint implementations before integrations.
                </h3>
                <div>
                    <div>
                        <label>Host URL</label>
                        <input wire:model="url" type="url" name="url" placeholder="eg. https://a924d784.ngrok.io" />
                    </div>
                    <div>
                        <label>Method</label>
                        <select wire:model="method" name="method">
                            <option value="">Select request method</option>
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                        </select>
                    </div>
                    <div>
                        <label>Network Operator</label>
                        <select wire:model="network" name="network">
                            <option value="">select network operator</option>
                            <option value="airteltigo">AirtelTigo</option>
                            <option value="glo">Glo</option>
                            <option value="mtn">MTN</option>
                            <option value="vodafone">Vodafone</option>
                        </select>
                    </div>
                    <div>
                        <label>Phone Number</label>
                        <input wire:model="phoneNumber" type="tel" name="phone_number" placeholder="eg. 0546628393" />
                    </div>
                    <div>
                        <label>Aggregator</label>
                        <select wire:model="aggregator" name="aggregator">
                            <option value="">Select aggregator</option>
                            <option value="korba">Korba</option>
                            <option value="nsano">Nsano</option>
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div>
                        <pre><code>{{ $output }}</code></pre>
                        <h4>USSD Code</h4>
                        <input wire:model="input" type="text" name="input" />
                        <button type="button" wire:click="sendRequest">Send</button>
                        <button type="button" wire:click="cancelRequest">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div>
            <span>Made with love by</span>
            <span>yawmanford</span>
            <span>cybersai</span>
            <span>maxxsas</span>
        </div>
        <div>
            v0.1.0
        </div>
    </div>
</div>
