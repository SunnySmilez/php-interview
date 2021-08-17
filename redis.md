* MySQL主从延迟，导致脏数据缓存，如何解决

* 如何预防缓存雪崩

* redis的rehash是如何做的

* redis的sds是如何实现的，为什么要这样做

* redis的数据是如何落地的

* redis是如何实现的expire

* 用redis做锁，能想到哪几种方式

* FIFO,LRU,LFU的概念及redis如何进行实现的

* redis如何进行内存的管理

* redis是如何实现的set操作的，他的key是如何存储的，value是如何存储的

* redis为什么自己实现sds替代string类型

* redis为什么可以保存二进制数据

* 压缩列表的连锁更新

* 在存储sting对象的时候，有两种编码方式是：raw，embstr；为什么不都使用embstr，他创建字符串只要分配一次内存，所有数据保存在一块连续的内存里面

* 在sds中，long类型的数值转字符串是如何转的(sdsll2str)，为什么要每个数值都要加'\0'

* sds如何做到二进制安全，杜绝缓存区溢出，动态扩展，惰性释放的

* 在adlist中listRelease函数，为什么有zfree还要使用list->free去释放值

* adlist进行节点的变更需要做哪些事情

* adlist是如何进行遍历的

* 为什么adlist和dict要在adlistt和dict的结构体上定义一些函数

* dict中为什么dictSetVal函数，可以直接给节点赋值，还要调用valDup函数

* dict是如何判断是否能进行rehash的

* dict结构中的privdata和dictht中的sizemask有什么用

* dict是如何进行遍历的（如果dict进行了rehash或者dict结构发生了变化呢）

* skiplist是如何插入节点的

* skiplist插入节点的时候span值如何进行计算

