<?php

//给你 k 种面值的硬币，面值分别为 c1, c2 ... ck，每种硬币的数量无限，再给一个总金额 amount，问你最少需要几枚硬币凑出这个金额，如果不可能凑出，算法返回 -1

function coinChange($coins, $amount) {
    var_dump(dp($coins, $amount));
}

function dp($coins, $amount) {
    if ($amount == 0) {
        return 0;
    }

    if ($amount < 0) {
        return -1;
    }

    $res = 2555555523424;

    foreach ($coins as $coin) {
        $subProblem = dp($coins, $amount-$coin);
        print('a:coin:'. $coin.'-'.'amount:'. $amount.'-'.'subProblem:'.$subProblem.'-res:'.$res)."\r\n";
        if ($subProblem == -1) {
            continue;
        }

        $res = min($res, 1+$subProblem);

        print('coin:'. $coin.'-'.'amount:'. $amount.'-'.'subProblem:'.$subProblem.'-res:'.$res)."\r\n";
    }

    return $res == 2555555523424 ? -1 : $res;
}

//coinChange([1,5,2], 3);


function demo($coins, $amount) {
    if ($amount == 0) {
        return 0;
    }

    if ($amount < 0) {
        return -1;
    }

    $res = 1000000;

    foreach($coins as $coin) {
        $subProblem = demo($coins, $amount-$coin);
        if ($subProblem == -1) {
            continue;
        }

        $res = min($res, 1+$subProblem);
    }

    return $res == 1000000 ? -1 : $res;
}

var_dump(demo([3,5,2], 11));