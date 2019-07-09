<?php

/**
 * php实现排序算法
 * Class algorithm
 */
class algorithm {

    /**
     * 顺序查找
     * 思路：从数组的第一个元素开始一个一个向下查找，如果有和目标一致的元素，查找成功；
     *      如果到最后一个元素仍没有目标元素，则查找失败
     * @param $data
     * @return mixed
     */
    function search($data, $target) {
        $len = count($data);

        if ($len < 1) {
            return false;
        }

        for($i=0; $i<$len; $i++) {
            if ($data[$i] == $target) {
                return $data[$i];
            }
        }

        return false;
    }

    /**
     * 二分查找
     * 思路：先取数组中间的值floor((low+top)/2), 然后通过与所需查找的数字进行比较，
     *      若比中间值大，则将首值替换为中间位置下一个位置，继续第一步的操作；
     *      若比中间值小，则将尾值替换为中间位置上一个位置，继续第一步操作 ，重复第二步操作直至找出目标数字
     * @param $data
     * @param $target
     * @return float|int
     */
    function binarySearch($data, $target) {
        $left = 0;
        $right = count($data)-1;//闭区间，数组左右两边的值都取到
        while ($left<=$right) {//注意有等号，当最大，最小值，相等为边界值的时候，需要返回值 例如：[1,2,3,4,5]查找5
            $mid = floor(($right-$left)/2)+$left;//为了防止right+left整数溢出
            echo $left."_".$mid."_".$left."\r\n";
            if ($data[$mid] == $target) {
                return $mid;
            } else if($data[$mid] > $target) {
                $right = $mid-1;//因为中间值已经取过，所以在下次查找中需要将他排除
            } else if($data[$mid] < $target) {
                $left = $mid+1;//因为中间值已经取过，所以在下次查找中需要将他排除
            }
        }

        return -1;
    }

    /**
     * 二分查找 - 递归实现
     * @param $data
     * @param $target
     * @param $left
     * @param $right
     * @return float|int
     */
    function binarySearch1($data, $target, $left, $right) {
        $mid = floor(($right-$left)/2)+$right;
        if ($data[$mid] == $target) {
            return $mid;
        } else if($data[$mid] > $target) {
            return $this->binarySearch1($data, $target, $left, $mid-1);
        } else if($data[$mid] < $target) {
            return $this->binarySearch1($data, $target, $mid+1, $right);
        }

        return -1;
    }

    /**
     * 冒泡算法
     * 思路：对当前还未排好的数组，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒
     * @param $params
     * @return mixed
     */
    function bubble($data) {
        $num        = count($data)-1;
        $sortBorder = $num;
        $lastSortKey= 0;
        for ($i=0;$i<$num;$i++) {
            $isSort = true;
            //for ($k=0;$k<$num-$i;$k++) {//后面的排好序的不要再去比
            for ($k=0;$k<$sortBorder;$k++) {//对上面的优化，找到最后一次交换的位置更好
                if ($data[$k] > $data[$k+1]) {
                    $tmp = $data[$k];
                    $data[$k] = $data[$k+1];
                    $data[$k+1] = $tmp;
                    $lastSortKey = $k;
                    $isSort = false;
                }
            }

            $sortBorder = $lastSortKey;//在这里赋值是不影响本来的每次循环

            if ($isSort) {
                break;//如果不再进行位置交换说明已经排好了所有的顺序了，直接退出大循环
            }
        }

        return $data;
    }

    /**
     * 快速排序
     * https://www.jianshu.com/p/1bd09e10f6db
     * 思路：选择一个基准元素，通常选择第一个元素或者最后一个元素。
     *      通过一趟扫描，将待排序列分成两部分，一部分比基准元素小，一部分大于等于基准元素。
     *      此时基准元素在其排好序后的正确位置，然后再用同样的方法递归地排序划分的两部分
     * @param $params
     * @return mixed
     */
    function quick($data) {
        $len = count($data);

        if ($len<=1) {
            return $data;
        }

        $base = $data[0];
        $left_data = $right_data = array();

        for($i=1; $i<$len; $i++) {
            if ($data[$i] < $base) {
                $left_data[] = $data[$i];
            } else {
                $right_data[] = $data[$i];
            }
        }

        $left_data = $this->quick($left_data);
        $right_data = $this->quick($right_data);

        return array_merge($left_data, array($base), $right_data);
    }


    /**
     * 插入排序
     * http://notepad.yehyeh.net/Content/Algorithm/Sort/Insertion/1.php
     * 思路：在要排序的一组数中，假设前面的数已经是排好顺序的，现在要把第n个数插到前面的有序数中，使得这n个数也是排好顺序的。如此反复循环，直到全部排好顺序
     * @param $data
     * @return mixed
     */
    function insert($data) {
        $len = count($data);

        if ($len<=1) {
            return $data;
        }

        for($i=1; $i<$len; $i++) {
            $tmp = $data[$i];
            for($j=$i-1; $j>=0; $j--) {
                if ($tmp < $data[$j]) {
                    $data[$j+1] = $data[$j];//因为前面的数都是排列好的，如果大于当前的值，则和他交换位置，每次比较的值都是在j+1的位置
                    $data[$j] = $tmp;
                } else {
                    break;//排列好的数是从左到右依次增大，如果比最右边的都大的话，那不需要再比对左边的元素了
                }
            }
        }

        return $data;
    }

    /**
     * 选择排序
     * 思路：在要排序的一组数中，选出最小的一个数与第一个位置的数交换。
     * 然后在剩下的数当中再找最小的与第二个位置的数交换，如此循环到倒数第二个数和最后一个数比较为止
     * @param $data
     * @return mixed
     */
    function select($data) {
        $len = count($data);

        if ($len<=1) {
            return $data;
        }

        for($i=0; $i<$len; $i++) {
            //默认设置$i为最小的元素
            $p = $i;
            for($j=$i+1; $j<$len; $j++) {
                if ($data[$p] > $data[$j]) {
                    $p = $j;
                }
            }

            //$p就是最小的元素，把$i对应的值设置为$p对应的值
            $tmp = $data[$p];
            $data[$p] = $data[$i];
            $data[$i] = $tmp;
        }

        return $data;
    }
}

/*$data = array(5,1,3,2,4);
$result = (new algorithm())->insert2($data);
var_dump($result);exit;*/
