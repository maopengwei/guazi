
<?php
Route::rule('message/index', 'index/message/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/message/index",
 *   tags={"Message"},
 *   summary="公告列表",
 *   @SWG\Parameter(name="title", type="string",in="query",description="公告名"),
 *   @SWG\Parameter(name="page", type="integer",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="integer",in="query",description="每页显示"),
 *   @SWG\Response(
 *         response=200,
 *         description="公告列表"
 *   ),
 * )
 */
Route::rule('message/add', 'index/message/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/message/add",
 *   tags={"Message"},
 *   summary="公告添加",
 *   @SWG\Parameter(name="title", type="string",in="formData",description="公告标题"),
 *   @SWG\Parameter(name="content", type="string",in="formData",description="公告内容"),
 *   @SWG\Response(
 *          response=200,
 *          description="添加成功"
 *   ),
 * )
 */
Route::rule('message/edit', 'index/message/edit', 'get|options');
/**
 * @SWG\Get(
 *   path="/message/edit",
 *   tags={"Message"},
 *   summary="公告详情",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="公告id"),
 *   @SWG\Response(
 *          response=200,
 *          description="公告详情"
 *   ),
 * )
 */
Route::rule('message/edit', 'index/message/edit', 'post|options');
/**
 * @SWG\Post(
 *   path="/message/edit",
 *   tags={"Message"},
 *   summary="公告修改",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="公告id"),
 *   @SWG\Parameter(name="title", type="string",in="formData",description="公告标题"),
 *   @SWG\Parameter(name="content", type="string",in="formData",description="公告内容"),
 *   @SWG\Response(
 *          response=200,
 *          description="公告修改"
 *   ),
 * )
 */
Route::rule('message/del', 'index/message/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/message/del",
 *   tags={"Message"},
 *   summary="公告删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="公告id"),
 *   @SWG\Response(
 *          response=200,
 *          description="公告删除"
 *   ),
 * )
 */