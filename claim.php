<?php
error_reporting(0);
require("config.php");

function line(){
    echo "=================================================\n";
}
function banner(){
    line();
    echo "             SCRIPT FAUCET ALL COIN             \n";
    echo "                 coincycles.com                 \n";
    echo "            OPEN SOURCE  Crypto .INC            \n";
    line();
}
function curl($url, $coki){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $coki);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec ($ch);
    return $result;
}
function timer($x){
    $x--;
    $s = 60;
    while (true) {
        $s--;
        echo "\r                       \r";
        echo " [ TUNGGU {$x}:{$s} ]\r";
        sleep(1);
        if ($s == 0) {
            $x--;
            $s = 61;
            if ($x == -1) {
                break;
            }
        }
    }
}


function claim($coin, $currency, $huruf){

    //warna
    $biru = "\033[1;34m";
    $kuning = "\033[0;33m";
    $ijo = "\033[0;32m";
    $cyan = "\033[0;36m";
    $putih = "\033[0;37m";

    $one = explode('class="col ThirdLayer card bg-success">Balance: <br>', $coin);
    $two = explode(' '.$currency.' Satoshi', $one[1]);
    if ($two[0] == 0){
        $tri = explode('<span>Success! We paid out ', $coin);
        $for = explode(' '.$currency.' Satoshi to', $tri[1]);
        if ($huruf == 4){
            echo " ".$cyan."[".$currency."] ".$ijo."[WD]".$putih."    => ".$cyan."[ ". $biru .$for[0] . $cyan." ".$currency." Sat]".$putih."\n";
        }else{
            echo " ".$cyan."[".$currency."]  ".$ijo."[WD]".$putih."    => ".$cyan."[ ". $biru .$for[0] . $cyan. " ".$currency." Sat]".$putih."\n";
        }

    }else{
        if ($huruf == 4){
            echo " ".$cyan."[".$currency."] ".$kuning."[Delay]".$putih." => ".$cyan."[ ". $biru .$two[0]. $cyan . " ".$currency." Sat]".$putih."\n";
        }else{
            echo " ".$cyan."[".$currency."]  ".$kuning."[Delay]".$putih." => ".$cyan."[ ". $biru .$two[0]. $cyan . " ".$currency." Sat]".$putih."\n";
        }
    }
}


banner();

while (TRUE){

    $doge = curl("https://coincycles.com/doge/claim.php?coin=DOGE", $coki_doge);
    $ltc  = curl("https://coincycles.com/ltc/claim.php?coin=LTC", $coki_ltc);
    $eth  = curl("https://coincycles.com/eth/claim.php?coin=ETH", $coki_eth);
    $dash = curl("https://coincycles.com/dash/claim.php?coin=DASH", $coki_dash);
    $xmr  = curl("https://coincycles.com/xmr/claim.php?coin=XMR", $coki_xmr);
    $trx  = curl("https://coincycles.com/trx/claim.php?coin=TRX", $coki_trx);
    $xrp  = curl("https://coincycles.com/xrp/claim.php?coin=XRP", $coki_xrp);
    $bch  = curl("https://coincycles.com/bch/claim.php?coin=BCH", $coki_bch);
    $bcn  = curl("https://coincycles.com/bcn/claim.php?coin=BCN", $coki_bcn);
    $dgb  = curl("https://coincycles.com/dgb/claim.php?coin=DGB", $coki_dgb);
    $zec  = curl("https://coincycles.com/zec/claim.php?coin=ZEC", $coki_zec);


    claim($doge, 'DOGE', 4);
    claim($ltc, 'LTC', 3);
    claim($eth, 'ETH', 3);
    claim($dash, 'DASH', 4);
    claim($xmr, 'XMR', 3);
    claim($trx, 'TRX', 3);
    claim($xrp, 'XRP', 3);
    claim($bch, 'BCH', 3);
    claim($bcn, 'BCN', 3);
    claim($dgb, 'DGB', 3);
    claim($zec, 'ZEC', 3);

    line();
    timer(1);
}
