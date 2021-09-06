<?php

//斐波那契数列:斐波那契数列指的是这样一个数列:0、1、1、2、3、5、8、13、21、34、……,这个数列从第3项开始，每一项都等于前两项之和

function fib($n) {
    if ($n == 1 || $n ==2) {
        return 1;
    } else {
        return fib($n-1)+fib($n-2);
    }
}

var_dump(fib(9));


//带备忘录的递归解法
function fibMemo($n) {
    $memo = [];
    return helper($memo, $n);
}

function helper($memo, $n) {
    if ($n == 1 || $n ==2) {
        return 1;
    }

    if ($memo[$n] != 0) {
        return $memo[$n];
    }

    $memo[$n] = helper($memo, $n-1)+helper($memo, $n-2);

    return $memo[$n];
}

var_dump(fibMemo(10));

//dp table
function fibdp($n) {
    if ($n == 0) {
        return 0;
    }

    $dp = [];

    $dp[0] = 0;
    $dp[1] = 1;

    for ($i=2;$i<=$n;$i++) {
        $dp[$i] = $dp[$i-1]+$dp[$i-2];
    }

    return $dp[$n];
}

var_dump(fibdp(10));

//dp table 状态压缩
function fibdp1($n) {
    if ($n<1) {
        return 0;
    }

    if ($n == 2 || $n == 1) {
        return 1;
    }

    $prev = 1;
    $curr = 1;

    for ($i=3;$i<=$n;$i++) {
        $sum = $prev + $curr;
        $prev = $curr;
        $curr = $sum;
    }

    return $curr;
}

var_dump(fibdp1(10));
