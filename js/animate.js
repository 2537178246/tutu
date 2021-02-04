function animate(ele, attr, end, aniType, fn) {   // 1000
    // var cur = ele.offsetLeft;  //  初始值 记录盒子当前的位置(left)
    var cur = parseFloat(getStyle(ele, attr));  //  初始值 记录盒子当前的位置(left)

    var end = parseFloat(end);

    if (attr == "opacity") {  // 如果是opacity  取值时 扩大100倍
        cur *= 100;
        end *= 100;
    }

    // cur 
    // 1. 点击时 记录盒子的初始位置 (初始值)
    // 2. 每隔固定的时间,进行累加/累减  (记录每次运动之后位置)

    var speed = 0;

    // 问题  公用一个全局timer  多个元素同时运动时  会相互影响
    // ele  元素节点  => 本质(对象)  => 可以自定义属性
    // 解决办法 :  把计时器的编号存到元素自己本身上 

    clearInterval(ele.timer);
    ele.timer = setInterval(function () {

        if (aniType == "linear") {
            // 匀速运动 linear  (normal)
            speed = end > cur ? 20 : -20;
        } else if (aniType == "ease-in") {
            // 加速    ease-in  (fast)
            // end > cur ? speed++ : speed--;
            speed = end > cur ? speed + 5 : speed - 5;
        } else if (aniType == "ease-out") {

            // 缓冲运动  ease-out  (slow) 
            // (终点值 - 当前值)/缓冲因子    => 剩余的距离 / 缓冲因子  
            // 缓冲因子 一般在8-12
            // 正向运动  (0-1000  speed正值)
            // speed = (end - cur) / 10;
            // speed = Math.ceil(speed);   // 0.1111  => 1
            // console.log(speed);

            // 反向运动  (1000-0  speed负值)
            // speed = (end - cur) / 10;
            // speed = Math.floor(speed);  // -0.11111  => -1
            // console.log(speed);

            speed = (end - cur) / 10;
            speed = end > cur ? Math.ceil(speed) : Math.floor(speed);
        }

        cur += speed;

        if (attr == "opacity") {   //   如果是opacity  赋值时 缩小100倍
            ele.style[attr] = cur / 100;
        } else {
            ele.style[attr] = cur + "px";
        }

        // 临界值
        if (Math.abs(end - cur) < Math.abs(speed)) {    // 理想情况  cur == end
            clearInterval(ele.timer);

            if (attr == "opacity") {   //   如果是opacity  赋值时 缩小100倍
                ele.style[attr] = end / 100;
            } else {
                ele.style[attr] = end + "px";
            }

            if (fn) { // 本次运动结束 如果传入了函数  就执行
                fn();
            }
        }

    }, attr == "opacity" ? 50 : 10);
}


function getStyle(ele, attr) {
    if (window.getComputedStyle) {
        return window.getComputedStyle(ele)[attr];
    } else {
        return ele.currentStyle[attr];
    }
}