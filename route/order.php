<?php
Route::rule('order/index', 'index/order/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/order/index",
 *   tags={"Order"},
 *   summary="订单列表",
 *   @SWG\Parameter(name="mobile", type="string",in="query",description="手机号搜索"),
 *   @SWG\Parameter(name="status", type="integer",in="query",description="状态0已取消 1待发货 2待收货 3已完成"),
 *   @SWG\Parameter(name="page", type="integer",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="integer",in="query",description="每页显示多少条"),
 *   @SWG\Response(
 *         response=200,
 *         description="订单列表"
 *   ),
 * )
 */
Route::rule('order/add', 'index/order/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/order/add",
 *   tags={"Order"},
 *   summary="订单添加",
 *   @SWG\Parameter(name="pd_id", type="integer",in="formData",description="产品id"),
 *   @SWG\Parameter(name="pd_num", type="integer",in="formData",description="产品数量"),
 *   @SWG\Parameter(name="pd_attribute", type="string",in="formData",description="产品属性"),
 *   @SWG\Parameter(name="address", type="string",in="formData",description="地址"),
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="手机号"),
 *   @SWG\Parameter(name="uname", type="string",in="formData",description="收货人"),
 *   @SWG\Response(
 *         response=200,
 *         description="属性列表"
 *   ),
 * )
 */
Route::rule('order/quxiao', 'index/order/quxiao', 'post|options');
/**
 * @SWG\Post(
 *   path="/order/quxiao",
 *   tags={"Order"},
 *   summary="订单取消",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="订单id"),
 *   @SWG\Response(
 *         response=200,
 *         description="订单取消"
 *   ),
 * )
 */
Route::rule('order/detail', 'index/order/detail', 'get|options');
/**
 * @SWG\Get(
 *   path="/order/detail",
 *   tags={"Order"},
 *   summary="订单详情",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="订单id"),
 *   @SWG\Response(
 *         response=200,
 *         description="订单取消"
 *   ),
 * )
 */
Route::rule('order/deliver', 'index/order/deliver', 'post|options');
/**
 * @SWG\Post(
 *   path="/order/deliver",
 *   tags={"Order"},
 *   summary="订单发货",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="订单id"),
 *   @SWG\Parameter(name="deliver_company", type="string",in="formData",description="物流公司"),
 *   @SWG\Parameter(name="deliver_number", type="string",in="formData",description="物流单号"),
 *   @SWG\Response(
 *         response=200,
 *         description="订单取消"
 *   ),
 * )
 */
Route::rule('order/receive', 'index/order/receive', 'post|options');
/**
 * @SWG\Post(
 *   path="/order/receive",
 *   tags={"Order"},
 *   summary="订单收货",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="订单id"),
 *   @SWG\Response(
 *         response=200,
 *         description="订单收货"
 *   ),
 * )
 */
Route::rule('order/del', 'index/order/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/order/del",
 *   tags={"Order"},
 *   summary="订单删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="订单id"),
 *   @SWG\Response(
 *         response=200,
 *         description="订单删除"
 *   ),
 * )
 */