<?php
Route::rule('sell/index', 'index/sell/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/sell/index",
 *   tags={"Sell"},
 *   summary="寄卖记录",
 *   @SWG\Parameter(name="mobile", type="string",in="query",description="手机号 该用户所有单子"),
 *   @SWG\Parameter(name="type", type="integer",in="query",description=" 0所有 1寄售  2买入"),
 *   @SWG\Parameter(name="status", type="integer",in="query",description="状态0 添加单子 1 等待打款 2 等待收款 3 已完成 4 已取消"),
 *    @SWG\Parameter(name="cold", type="integer",in="query",description="1 投诉单"),
 *    @SWG\Parameter(name="page", type="integer",in="query",description="第几页"),
 *    @SWG\Parameter(name="limit", type="integer",in="query",description="每页显示多少"),
 *   @SWG\Response(
 *     response=200,
 *     description="查询成功"
 *   ),
 * )
 */
Route::rule('sell/add', 'index/sell/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/sell/add",
 *   tags={"Sell"},
 *   summary="寄售瓜子币",
 *   @SWG\Parameter(name="jine", type="integer",in="formData",description="寄售金额"),
 *   @SWG\Parameter(name="safe_password", type="string",in="formData",description="安全密码"),
 *   @SWG\Response(
 *     response=200,
 *     description="寄售成功或失败"
 *   ),
 * )
 */
Route::rule('sell/buy', 'index/sell/buy', 'post|options');
/**
 * @SWG\Post(
 *   path="/sell/buy",
 *   tags={"Sell"},
 *   summary="买入瓜子币",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Parameter(name="safe_password", type="string",in="formData",description="安全密码"),
 *   @SWG\Response(
 *     response=200,
 *     description="下单成功或失败"
 *   ),
 * )
 */
Route::rule('sell/detail', 'index/sell/detail', 'get|options');
/**
 * @SWG\Get(
 *   path="/sell/detail",
 *   tags={"Sell"},
 *   summary="寄售单详情",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="单子id"),
 *   @SWG\Response(
 *     response=200,
 *     description="查询成功或失败"
 *   ),
 * )
 */
Route::rule('sell/dakuan', 'index/sell/dakuan', 'post|options');
/**
 * @SWG\Post(
 *   path="/sell/dakuan",
 *   tags={"Sell"},
 *   summary="确认打款",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Parameter(name="pic", type="integer",in="formData",description="打款凭证地址"),
 *   @SWG\Response(
 *     response=200,
 *     description="打款成功或失败"
 *   ),
 * )
 */
Route::rule('sell/shoukuan', 'index/sell/shoukuan', 'post|options');
/**
 * @SWG\Post(
 *   path="/sell/shoukuan",
 *   tags={"Sell"},
 *   summary="确认收款",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *     response=200,
 *         description="收款成功或失败"
 *   ),
 * )
 */
Route::rule('sell/tousu', 'index/sell/tousu', 'post|options');
/**
 * @SWG\Post(
 *   path="/sell/tousu",
 *   tags={"Sell"},
 *   summary="未收到款投诉",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *     response=200,
 *         description="投诉成功或失败"
 *   ),
 * )
 */
Route::rule('sell/del', 'index/sell/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/sell/del",
 *   tags={"Sell"},
 *   summary="记录删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *     response=200,
 *     description="删除成功或失败"
 *   ),
 * )
 */
Route::rule('sell/quxiao', 'index/sell/quxiao', 'post|options');
/**
 * @SWG\Post(
 *   path="/sell/quxiao",
 *   tags={"Sell"},
 *   summary="寄售取消",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *     response=200,
 *     description="寄售取消"
 *   ),
 * )
 */