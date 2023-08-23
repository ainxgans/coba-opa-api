<?php

namespace App\Helpers;

class Helper {
  public function percentageFundsCollected($collected_fund, $fund_target) {
    return number_format(($collected_fund / $fund_target) * 100, 0);
  }
}