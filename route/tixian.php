<?php
Route::rule('tixian/index', 'index/tixian/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/tixian/index",
 *   tags={"Tixian"},
 *   summary="提现记录",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="用户id"),
 *   @SWG\Parameter(name="mobile", type="string",in="query",description="手机号"),
 *   @SWG\Parameter(name="status", type="string",in="query",description="状态0待审核 1审核通过 2已驳回"),
 *   @SWG\Parameter(name="page", type="integer",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="integer",in="query",description="每页显示"),
 *   @SWG\Response(
 *         response=200,
 *         description="查询成功"
 *   ),
 * )
 */
Route::rule('tixian/add', 'index/tixian/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/tixian/add",
 *   tags={"Tixian"},
 *   summary="提现操作",
 *   @SWG\Parameter(name="jine", type="integer",in="formData",description="提现金额"),
 *   @SWG\Parameter(name="type", type="integer",in="formData",description="类型0支付宝 1微信"),
 *   @SWG\Parameter(name="safe_password", type="string",in="formData",description="安全密码"),
 *   @SWG\Response(
 *          response=200,
 *          description="提现成功"
 *   ),
 * )
 */
Route::rule('tixian/check', 'index/tixian/check', 'post|options');
/**
 * @SWG\Post(
 *   path="/tixian/check",
 *   tags={"Tixian"},
 *   summary="提现审核",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Parameter(name="status", type="integer",in="formData",description="状态1通过2驳回"),
 *   @SWG\Response(
 *          response=200,
 *          description="查询成功"
 *   ),
 * )
 */
Route::rule('tixian/del', 'index/tixian/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/tixian/del",
 *   tags={"Tixian"},
 *   summary="记录删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *          response=200,
 *          description="查询成功"
 *   ),
 * )
 */
