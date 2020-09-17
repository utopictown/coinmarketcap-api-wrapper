<?php

/**
 * (c) Tyo (utopictown)
 */

namespace Utopictown\CMCWrapper;

class CMCWrapper
{
  const BASE_URL = 'https://pro-api.coinmarketcap.com/v1/';

  private $url;

  private $headers;

  private $queryString;

  private $requestURL;

  public function __construct($key = null)
  {
    $this->setHeader($key);
  }

  private function setHeader($key)
  {
    $this->headers = [
      'Accepts: application/object',
      'X-CMC_PRO_API_KEY: ' . $key,
    ];
  }

  private function setURL($url)
  {
    $this->url = self::BASE_URL . $url;
  }

  private function setQueryString($params)
  {
    $this->queryString = http_build_query($params); // query string encode the parameters
  }

  private function setRequestURL()
  {
    $this->requestURL = "{$this->url}?{$this->queryString}"; // create the request URL
  }

  /**
   * Returns a mapping of all cryptocurrencies to unique CoinMarketCap ids.
   * @param array $params
   * @return object
   */

  public function getAnu()
  {
    return "anu";
  }

  public function getCryptocurrencyMap($params = [])
  {
    return $this->execute('cryptocurrency/map', $params);
  }

  /**
   * Returns all static metadata available for one or more cryptocurrencies. This information includes details like logo, description, official website URL, social links, and links to a cryptocurrency's technical documentation.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyInfo($params = [])
  {
    return $this->execute('cryptocurrency/info', $params);
  }

  /**
   * Returns a ranked and sorted list of all cryptocurrencies for a historical UTC date.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyListingsHistorical($params = [])
  {
    return $this->execute('cryptocurrency/listings/historical', $params);
  }

  /**
   * Returns a paginated list of all active cryptocurrencies with latest market data. The default "market_cap" sort returns cryptocurrency in order of CoinMarketCap's market cap rank (as outlined in our methodology) but you may configure this call to order by another market ranking field. Use the "convert" option to return market values in multiple fiat and cryptocurrency conversions in the same call.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyListingsLatest($params = [])
  {
    return $this->execute('cryptocurrency/listings/latest', $params);
  }

  /**
   * Lists all active market pairs that CoinMarketCap tracks for a given cryptocurrency or fiat currency. All markets with this currency as the pair base or pair quote will be returned. The latest price and volume information is returned for each market. Use the "convert" option to return market values in multiple fiat and cryptocurrency conversions in the same call.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyMarketPairs($params = [])
  {
    return $this->execute('cryptocurrency/market-pairs/latest', $params);
  }

  /**
   * Returns historical OHLCV (Open, High, Low, Close, Volume) data along with market cap for any cryptocurrency using time interval parameters. Currently daily and hourly OHLCV periods are supported. Volume is only supported with daily periods at this time.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyOHLCVHistorical($params = [])
  {
    return $this->execute('cryptocurrency/ohlcv/historical', $params);
  }

  /**
   * Returns the latest OHLCV (Open, High, Low, Close, Volume) market values for one or more cryptocurrencies for the current UTC day. Since the current UTC day is still active these values are updated frequently. You can find the final calculated OHLCV values for the last completed UTC day along with all historic days using /cryptocurrency/ohlcv/historical.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyOHLCVLatest($params = [])
  {
    return $this->execute('cryptocurrency/ohlcv/latest', $params);
  }

  /**
   * Returns price performance statistics for one or more cryptocurrencies including launch price ROI and all-time high / all-time low. Stats are returned for an all_time period by default. UTC yesterday and a number of rolling time periods may be requested using the time_period parameter. Utilize the convert parameter to translate values into multiple fiats or cryptocurrencies using historical rates.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyPerformanceStats($params = [])
  {
    return $this->execute('cryptocurrency/price-performance-stats/latest', $params);
  }

  /**
   * Returns an interval of historic market quotes for any cryptocurrency based on time and interval parameters.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyQuotesHistorical($params = [])
  {
    return $this->execute('cryptocurrency/quotes/historical', $params);
  }

  /**
   * Returns the latest market quote for 1 or more cryptocurrencies. Use the "convert" option to return market values in multiple fiat and cryptocurrency conversions in the same call.
   * @param array $params
   * @return object
   */

  public function getCryptocurrencyQuotesLatest($params = [])
  {
    return $this->execute('cryptocurrency/quotes/latest', $params);
  }

  private function execute($url, $params)
  {

    $this->setURL($url);
    $this->setQueryString($params);
    $this->setRequestURL();

    $curl = curl_init(); // Get cURL resource
    // Set cURL options
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->requestURL,            // set the request URL
      CURLOPT_HTTPHEADER => $this->headers,     // set the headers 
      CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
    ));

    $response = curl_exec($curl); // Send the request, save the response
    curl_close($curl); // Close request

    return json_decode($response);
  }
}
