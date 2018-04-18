<?php
Route::rule('type/index', 'index/type/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/type/index",
 *   tags={"Type"},
 *   summary="分类列表",
 *   @SWG\Response(
 *         response=200,
 *         description="分类列表"
 *   ),
 * )
 */
Route::rule('type/add', 'index/type/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/type/add",
 *   tags={"Type"},
 *   summary="分类添加",
 *   @SWG\Parameter(name="name", type="string",in="formData",description="分类名"),
 *   @SWG\Parameter(name="icon", type="string",in="formData",description="图标路径"),
 *   @SWG\Response(
 *         response=200,
 *         description="分类添加"
 *   ),
 * )
 */
Route::rule('type/edit', 'index/type/edit', 'get|post|options');
/**
 * @SWG\Post(
 *   path="/type/edit",
 *   tags={"Type"},
 *   summary="分类修改",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="分类id"),
 *   @SWG\Parameter(name="name", type="string",in="formData",description="分类名"),
 *   @SWG\Response(
 *         response=200,
 *         description="分类添加"
 *   ),
 * )
 */
Route::rule('type/del', 'index/type/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/Type/del",
 *   tags={"Type"},
 *   summary="分类删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="分类id"),
 *   @SWG\Response(
 *         response=200,
 *         description="分类删除"
 *   ),
 * )
 */
