# coinmarketcap-wrapper
PHP wrapper for CoinMarketCap API

currently support only for cryptocurrency API https://coinmarketcap.com/api/documentation/v1/#tag/cryptocurrency

<h3>INSTALLATION</h3>
<pre>composer require utopictown/coinmarketcap-api-wrapper</pre>
<h3>USAGE</h3>

<pre>use Utopictown\CMCWrapper\CMCWrapper;</pre>
<pre>$cmc = new CMCWrapper(YOUR_API_KEY);</pre>
get list of all active cryptocurrencies with latest market data.
<pre>$cmc->getCryptocurrencyListingsLatest(['convert' => 'IDR']);</pre>
for more params please see https://coinmarketcap.com/api/documentation/v1/

<h4>Available Hook</h4>
<ul>
  <li>getCryptocurrencyMap</li>
  <li>getCryptocurrencyInfo</li>
  <li>getCryptocurrencyListingsHistorical</li>
  <li>getCryptocurrencyListingsLatest</li>
  <li>getCryptocurrencyMarketPairs</li>
  <li>getCryptocurrencyOHLCVHistorical</li>
  <li>getCryptocurrencyOHLCVLatest</li>
  <li>getCryptocurrencyPerformanceStats</li>
  <li>getCryptocurrencyQuotesHistorical</li>
  <li>getCryptocurrencyQuotesLatest</li>
</ul>
