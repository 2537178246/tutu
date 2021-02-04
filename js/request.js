
// 将所有的ajax请求  用Promise 封装  => 返回一个Promise实例


// request 相当于对ajax进行了二次封装   先引入ajax.js  在引入此文件  
// 函数封装过程中  => 请求接口  => 传递数据

function request(url, params, type = "get") {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type,
            url,
            data: {
                ...params
            },
            dataType: "json",
            success: function (result) {  // result  形式参数  表示请求成功时返回的数据
                resolve(result);
            }
        })
    })
}


// function register(params) {
//     return request("../php/register.php", params, "post");
// }
// function login(params) {  //{user, pwd}
//     return request("../php/login.php", params, "post");
// }

// function deleteGradeById(params) {   // {ids}
//     return request("../php/deleteGradeById.php", params);
// }

// const register = (params) => { return request("../php/register.php", params, "post") }

// 注册验证页面
const isExistUser = params => request("../php/userJudge.php", params, "post");
const isExistPhone = params => request("../php/phoneJudge.php", params, "post");
const isExistEmail = params => request("../php/emailJudge.php", params, "post");

const register = params => request("../php/register.php", params, "post");

// 登录页面
const login = params => request("../php/login.php", params, "post");

// 主页面 数据
// 动态生成
const dataRequestAll = params => request("../php/dataRequest.php",params,"post");
// 商品详情动态生成
const goodsDetail = params => request("../php/goodsDetail.php",params,"post");
// 购物车添加
const addGoods = params => request("../php/addGoods.php",params,"post");
// 购物车显示数据
const selectGoods = params => request("../php/selectGoods.php",params,"post");
// 购物车渲染
const selectShoppingCar = params => request("../php/selectShoppingCar.php",params,"post");
// 删除购物车
const delGoods = params => request("../php/delGoods.php",params,"post");





