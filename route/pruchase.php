<?php
Route::rule('purchase/index', 'index/purchase/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/purchase/index",
 *   tags={"Purchase"},
 *   summary="投资记录",
 *   @SWG\Parameter(name="id", type="string",in="query",description="id"),
 *   @SWG\Parameter(name="mobile", type="string",in="query",description="手机号"),
 *   @SWG\Parameter(name="status", type="string",in="query",description="状态"),
 *   @SWG\Parameter(name="type", type="string",in="query",description="类型"),
 *   @SWG\Response(
 *     response=200,
 *     description="记录信息"
 *   ),
 * )
 */
Route::rule('purchase/add', 'index/purchase/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/purchase/add",
 *   tags={"Purchase"},
 *   summary="添加投资",
 *   @SWG\Parameter(name="level", type="integer",in="formData",description="升级类型1,2,3,4,5"),
 *   @SWG\Parameter(name="type", type="integer",in="formData",description="购买类型 0瓜子币,1现金"),
 *   @SWG\Parameter(name="safe_password", type="string",in="formData",description="安全密码"),
 *   @SWG\Response(
 *     response=200,
 *     description="投资成功或失败"
 *   ),
 * )
 */
Route::rule('purchase/check', 'index/purchase/check', 'post|options');
/**
 * @SWG\Post(
 *   path="/purchase/check",
 *   tags={"Purchase"},
 *   summary="投资审核",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="投资单id"),
 *   @SWG\Parameter(name="status", type="integer",in="formData",description="状态 1审核通过,2驳回"),
 *   @SWG\Response(
 *     response=200,
 *     description="投资成功或失败"
 *   ),
 * )
 */
Route::rule('purchase/del', 'index/purchase/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/purchase/del",
 *   tags={"Purchase"},
 *   summary="投资记录删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="id"),
 *   @SWG\Response(
 *     response=200,
 *     description="删除成功或失败"
 *   ),
 * )
 */
Route::rule('profit/index', 'index/profit/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/profit/index",
 *   tags={"Profit"},
 *   summary="瓜子币记录",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="用户id"),
 *   @SWG\Parameter(name="type", type="integer",in="query",description="类型"),
 *   @SWG\Parameter(name="page", type="integer",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="integer",in="query",description="每页多少"),
 *   @SWG\Response(
 *     response=200,
 *     description="查询成功"
 *   ),
 * )
 */
Route::rule('profit/msc', 'index/profit/msc', 'get|options');
/**
 * @SWG\Get(
 *   path="/profit/msc",
 *   tags={"Profit"},
 *   summary="msc记录",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="用户id"),
 *   @SWG\Parameter(name="type", type="integer",in="query",description="类型"),
 *   @SWG\Parameter(name="page", type="integer",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="integer",in="query",description="每页多少"),
 *   @SWG\Response(
 *     response=200,
 *     description="查询成功"
 *   ),
 * )
 */
Route::rule('profit/jingtai', 'index/profit/jingtai', 'get|options');
/**
 * @SWG\Get(
 *   path="/profit/jingtai",
 *   tags={"Profit"},
 *   summary="静态收益预期",
 *   @SWG\Parameter(name="mobile", type="string",in="query",description="用户手机号"),
 *   @SWG\Parameter(name="days", type="integer",in="query",description="天数"),
 *   @SWG\Response(
 *     response=200,
 *     description="收益额"
 *   ),
 * )
 */
Route::rule('purchase/infoList', 'index/purchase/infoList', 'get|options');
/**
 * @SWG\Get(
 *   path="/purchase/infoList",
 *   tags={"Purchase"},
 *   summary="静态收益",
 *   @SWG\Response(
 *     response=200,
 *     description="查询成功"
 *   ),
 * )
 */
