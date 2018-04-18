<?php
Route::rule('carouse/index', 'index/carouse/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/carouse/index",
 *   tags={"Carouse"},
 *   summary="轮播列表",
 *   @SWG\Parameter(name="page", type="integer",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="integer",in="query",description="每页显示"),
 *   @SWG\Response(
 *         response=200,
 *         description="轮播列表"
 *   ),
 * )
 */
Route::rule('carouse/add', 'index/carouse/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/carouse/add",
 *   tags={"Carouse"},
 *   summary="轮播添加",
 *   @SWG\Parameter(name="path", type="string",in="formData",description="图片地址"),
 *   @SWG\Parameter(name="url", type="string",in="formData",description="图片链接"),
 *   @SWG\Parameter(name="name", type="string",in="formData",description="图片名称"),
 *   @SWG\Response(
 *          response=200,
 *          description="添加成功"
 *   ),
 * )
 */
Route::rule('carouse/edit', 'index/carouse/edit', 'get|options');
/**
 * @SWG\Get(
 *   path="/carouse/edit",
 *   tags={"Carouse"},
 *   summary="轮播详情",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="轮播id"),
 *   @SWG\Response(
 *          response=200,
 *          description="轮播详情"
 *   ),
 * )
 */
Route::rule('carouse/edit', 'index/carouse/edit', 'post|options');
/**
 * @SWG\Post(
 *   path="/carouse/edit",
 *   tags={"Carouse"},
 *   summary="轮播修改",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="轮播id"),
 *   @SWG\Parameter(name="path", type="string",in="formData",description="图片"),
 *   @SWG\Parameter(name="name", type="string",in="formData",description="名称"),
 *   @SWG\Parameter(name="url", type="string",in="formData",description="链接"),
 *   @SWG\Parameter(name="sort", type="string",in="formData",description="排序"),
 *   @SWG\Parameter(name="status", type="string",in="formData",description="状态0不显示 1显示"),
 *   @SWG\Response(
 *          response=200,
 *          description="轮播修改"
 *   ),
 * )
 */
Route::rule('carouse/del', 'index/carouse/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/Carouse/del",
 *   tags={"Carouse"},
 *   summary="轮播删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="轮播id"),
 *   @SWG\Response(
 *          response=200,
 *          description="轮播删除"
 *   ),
 * )
 */