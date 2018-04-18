<?php
Route::rule('transfer/index', 'index/transfer/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/transfer/index",
 *   tags={"Transfer"},
 *   summary="转账记录",
 *   @SWG\Parameter(name="mobile", type="string",in="query",description="用户手机号 "),
 *   @SWG\Parameter(name="type", type="integer",in="query",description="0所有 1转出 2转入"),
 *   @SWG\Parameter(name="page", type="string",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="integer",in="query",description="每页显示多少"),
 *   @SWG\Response(
 *         response=200,
 *         description="查询成功"
 *   ),
 * )
 */
Route::rule('transfer/add', 'index/transfer/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/transfer/add",
 *   tags={"Transfer"},
 *   summary="转账操作",
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="转入用户手机号"),
 *   @SWG\Parameter(name="jine", type="integer",in="formData",description="提现金额"),
 *   @SWG\Parameter(name="safe_password", type="string",in="formData",description="提现金额"),
 *   @SWG\Response(
 *          response=200,
 *          description="转账成功"
 *   ),
 * )
 */
Route::rule('transfer/del', 'index/transfer/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/transfer/del",
 *   tags={"Transfer"},
 *   summary="记录删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *          response=200,
 *          description="查询成功"
 *   ),
 * )
 */