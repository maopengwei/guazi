<?php
/**
 * @SWG\Swagger(
 *   schemes={"http"},
 *   host="192.168.2.183:1237",
 *   consumes={"multipart/form-data"},
 *   produces={"application/json"},
 *   @SWG\Info(
 *     version="2.3",
 *     title="瓜子币",
 *     description="接口文档 参考<br>"
 *   ),
 *   @SWG\Tag(
 *     name="Login",
 *     description="登录",
 *   ),
 *   @SWG\Tag(
 *     name="User",
 *     description="用户",
 *   ),
 *   @SWG\Tag(
 *     name="Center",
 *     description="报单中心",
 *   ),
 *   @SWG\Tag(
 *     name="Purchase",
 *     description="投资",
 *   ),
 *
 *   @SWG\Tag(
 *     name="Profit",
 *     description="收益",
 *   ),
 *   @SWG\Tag(
 *     name="Cron",
 *     description="图片,验证码",
 *   ),
 *   @SWG\Tag(
 *     name="Profit",
 *     description="收益",
 *   ),
 *   @SWG\Tag(
 *     name="Sell",
 *     description="寄售",
 *   ),
 *   @SWG\Tag(
 *     name="Tixian",
 *     description="提现",
 *   ),
 *   @SWG\Tag(
 *     name="Transfer",
 *     description="转账",
 *   ),
 *   @SWG\Tag(
 *     name="Type",
 *     description="分类",
 *   ),
 *   @SWG\Tag(
 *     name="Product",
 *     description="产品",
 *   ),
 *   @SWG\Tag(
 *     name="Attribute",
 *     description="属性",
 *   ),
 *   @SWG\Tag(
 *     name="Order",
 *     description="订单",
 *   ),
 *   @SWG\Tag(
 *     name="Message",
 *     description="公告",
 *   ),
 *   @SWG\Tag(
 *     name="Config",
 *     description="网站配置",
 *   ),
 *   @SWG\Tag(
 *     name="Carouse",
 *     description="轮播图",
 *   ),
 * )
 */

Route::rule('login', 'index/login/login', 'post|options');
// Route::post('login', 'index/login/login')ssssssss
// ->header('Access-Control-Allow-Credentials: true')
// ->header('Access-Control-Allow-Origin:http://192.168.2.215:8000')
// ->header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authToken")
// ->allowCrossDomain();
/**
 * @SWG\Post(
 *   path="/login",
 *   tags={"Login"},
 *   summary="用户登录",
 *   @SWG\Parameter(name="mobile", type="string", required=true, in="formData",description="手机号"),
 *   @SWG\Parameter(name="password", type="string", required=true, in="formData",description="登录密码"),
 *   @SWG\Response(
 *     response=200,
 *     description="登录成功"
 *   ),
 * )
 */
Route::rule('adminLogin', 'index/login/adminLogin', 'post|options');
/**
 * @SWG\Post(
 *   path="/adminLogin",
 *   tags={"Login"},
 *   summary="管理员登录",
 *   @SWG\Parameter(name="mobile", type="string", required=true, in="formData",
 *     description="手机号"
 *   ),
 *   @SWG\Parameter(name="password", type="string", required=true, in="formData",
 *     description="密码"
 *   ),
 *   @SWG\Response(
 *     response=200,
 *     description="登录成功"
 *   ),
 * )
 */
