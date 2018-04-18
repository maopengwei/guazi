<?php
Route::rule('attribute/index', 'index/attribute/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/attribute/index",
 *   tags={"Attribute"},
 *   summary="属性列表",
 *   @SWG\Parameter(name="pd_id", type="integer",in="query",description="产品id"),
 *   @SWG\Response(
 *         response=200,
 *         description="属性列表"
 *   ),
 * )
 */
Route::rule('attribute/add', 'index/attribute/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/attribute/add",
 *   tags={"Attribute"},
 *   summary="添加属性",
 *   @SWG\Parameter(name="pd_id", type="integer",in="formData",description="产品id"),
 *   @SWG\Parameter(name="key", type="string",in="formData",description="属性名"),
 *   @SWG\Parameter(name="value", type="string",in="formData",description="属性值"),
 *   @SWG\Response(
 *         response=200,
 *         description="添加属性"
 *   ),
 * )
 */
Route::rule('attribute/edit', 'index/attribute/edit', 'post|options');
/**
 * @SWG\Post(
 *   path="/attribute/edit",
 *   tags={"Attribute"},
 *   summary="添加属性",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="属性id"),
 *   @SWG\Parameter(name="key", type="string",in="formData",description="属性名"),
 *   @SWG\Parameter(name="value", type="string",in="formData",description="属性值"),
 *   @SWG\Response(
 *         response=200,
 *         description="修改属性"
 *   ),
 * )
 */
Route::rule('attribute/del', 'index/attribute/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/attribute/del",
 *   tags={"Attribute"},
 *   summary="属性删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *          response=200,
 *          description="删除成功"
 *   ),
 * )
 */
