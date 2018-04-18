<?php
Route::rule('center/index', 'index/center/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/center/index",
 *   tags={"Center"},
 *   summary="报单中心申请列说表",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="用户id"),
 *   @SWG\Parameter(name="mobile", type="string",in="query",description="用户手机号"),
 *   @SWG\Parameter(name="status", type="integer",in="query",description="0未审核1审核通过2驳回"),
 *   @SWG\Response(
 *         response=200,
 *         description="报单中心申请列表"
 *   ),
 * )
 */
Route::rule('center/add', 'index/center/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/center/add",
 *   tags={"Center"},
 *   summary="报单中心申请",
 *   @SWG\Response(
 *         response=200,
 *         description="报单中心申请"
 *   ),
 * )
 */
Route::rule('center/check', 'index/center/check', 'post|options');
/**
 * @SWG\Post(
 *   path="/center/check",
 *   tags={"Center"},
 *   summary="报单中心申请审核",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="申请单id"),
 *   @SWG\Parameter(name="status", type="integer",in="formData",description="状态1审核通过 2驳回"),
 *   @SWG\Response(
 *         response=200,
 *         description="报单中心申请审核"
 *   ),
 * )
 */
Route::rule('center/del', 'index/center/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/center/del",
 *   tags={"Center"},
 *   summary="删除记录",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="申请单id"),
 *   @SWG\Response(
 *         response=200,
 *         description="删除记录"
 *   ),
 * )
 */