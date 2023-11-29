<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $fromCurrency = $_POST['fromCurrency'];
    $toCurrency = $_POST['toCurrency'];

    // Fixed exchange rates
    $exchangeRates = [
        'USD' => ['EUR' => 0.85, 'GBP' => 0.74, 'INR' => 75.19],
        'EUR' => ['USD' => 1.18, 'GBP' => 0.87, 'INR' => 88.63],
        'GBP' => ['USD' => 1.35, 'EUR' => 1.15, 'INR' => 101.23],
        'INR' => ['USD' => 0.013, 'EUR' => 0.011, 'GBP' => 0.0099],
    ];

    if (isset($exchangeRates[$fromCurrency][$toCurrency])) {
        $conversionRate = $exchangeRates[$fromCurrency][$toCurrency];
        $convertedAmount = $amount * $conversionRate;
    } else {
        $convertedAmount = 'Invalid conversion';
    }
}
?>
