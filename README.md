# coinmarketcap-wrapper
PHP wrapper for CoinMarketCap API

currently support only for cryptocurrency API https://coinmarketcap.com/api/documentation/v1/#tag/cryptocurrency

<h3>USAGE</h3>

<pre>$cmc = new CMCWrapper(YOUR_API_KEY)</pre>
get list of all active cryptocurrencies with latest market data.
<pre>$cmc->getCryptocurrencyListingsLatest(['convert' => 'IDR']);</pre>
for more params please see https://coinmarketcap.com/api/documentation/v1/
