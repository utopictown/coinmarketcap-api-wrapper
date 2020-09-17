<?php

namespace Utopictown\CMCWrapper\Test;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Utopictown\CMCWrapper\CMCWrapper;

class CMCWrapperTest extends TestCase
{
  private $client;

  protected function setUp(): void
  {

    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    $key = $_ENV['CMC_API_KEY'];

    $this->client = new CMCWrapper($key);
  }

  public function testCryptocurrencyMap()
  {

    $ccMap = $this->client->getCryptocurrencyMap();
    $this->assertArrayHasKey('status', (array) $ccMap);
    $this->assertIsObject($ccMap);
  }
}
