* yaf框架运行流程

* gitlab的发布过程（结合docker）

* php的解析过程，分别做了哪些事情

* php的弱类型是如何实现的

* 分别介绍php的几种运行方式

* 谈谈php的垃圾回收，gc存在的问题及解决方案

* php是如何对关联数组进行的存储

* php中foreach和for两种方式遍历数组哪中方式比较快

* 为什么会发生如下现象
    `
        <?php
        
        $arr = array("foo",
                     "bar",
                     "baz");
        
        foreach ($arr as &$item) { /* do nothing by reference */ }
        print_r($arr);
        
        foreach ($arr as $item) { /* do nothing by value */ }
        print_r($arr); // $arr has changed....why?
        
        Array
        (
            [0] => foo
            [1] => bar
            [2] => baz
        )
        Array
        (
            [0] => foo
            [1] => bar
            [2] => bar  // 错误发生？？
        )
    `

* php的数组使用hashtable实现的，那么为什么要使用双向链表

* hash冲突一般解决方式有哪些，php是如何做的

* hash碰撞攻击是怎么回事，php是如何解决的

* php如何进行rehash，数据如何进行迁移的，如果迁移过程中该数据有访问如何进行处理

* 当你输入url之后发生了什么

* php连接redis发生了什么

* 打开app的速度较慢，如何进行优化

* php的局部变量和全局变量是如何实现的

* session的工作原理

* cli模式下如何获取cookie

* 平滑重启是如何实现的

* apache的prefork是如何实现的

* fastcgi如何进行进程管理的

* apache的模块是如何动态加载的（不重启apache的前提下）

* apache的运行过程

* cgi的运行原理
