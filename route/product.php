<?php
Route::rule('product/index', 'index/product/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/product/index",
 *   tags={"Product"},
 *   summary="产品列表",
 *   @SWG\Parameter(name="type_id", type="integer",in="query",description="分类id"),
 *   @SWG\Parameter(name="is_hot", type="integer",in="query",description="1热销"),
 *   @SWG\Parameter(name="order", type="string",in="query",description="排序方法 默认是sort倒序加id倒序"),
 *   @SWG\Parameter(name="name", type="integer",in="query",description="产品名称搜索"),
 *   @SWG\Parameter(name="status", type="string",in="query",description="0下架 1上架 2仓库"),
 *   @SWG\Parameter(name="page", type="string",in="query",description="第几页"),
 *   @SWG\Parameter(name="limit", type="string",in="query",description="每页显示多少"),
 *   @SWG\Response(
 *         response=200,
 *         description="产品列表"
 *   ),
 * )
 */
Route::rule('product/add', 'index/product/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/product/add",
 *   tags={"Product"},
 *   summary="产品添加",
 *   @SWG\Parameter(name="name", type="string",in="formData",description="产品名称"),
 *   @SWG\Parameter(name="price", type="integer",in="formData",description="产品单价"),
 *   @SWG\Parameter(name="pic", type="string",in="formData",description="产品主图地址"),
 *   @SWG\Parameter(name="content", type="string",in="formData",description="产品内容"),
 *   @SWG\Parameter(name="inventory", type="integer",in="formData",description="库存"),
 *   @SWG\Response(
 *          response=200,
 *          description="添加成功"
 *   ),
 * )
 */
Route::rule('product/edit', 'index/product/edit', 'get|options');
/**
 * @SWG\Get(
 *   path="/product/edit",
 *   tags={"Product"},
 *   summary="产品修改",
 *   @SWG\Parameter(name="id", type="string",in="query",description="产品id"),
 *   @SWG\Response(
 *          response=200,
 *          description="产品修改"
 *   ),
 * )0
 */
Route::rule('product/edit', 'index/product/edit', 'post|options');
/**
 * @SWG\Post(
 *   path="/product/edit",
 *   tags={"Product"},
 *   summary="产品修改",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="产品id"),
 *   @SWG\Parameter(name="name", type="string",in="formData",description="产品名称"),
 *   @SWG\Parameter(name="price", type="integer",in="formData",description="产品单价"),
 *   @SWG\Parameter(name="pic", type="string",in="formData",description="产品主图地址"),
 *   @SWG\Parameter(name="content", type="string",in="formData",description="产品内容"),
 *   @SWG\Parameter(name="inventory", type="integer",in="formData",description="库存"),
 *   @SWG\Response(
 *          response=200,
 *          description="产品修改"
 *   ),
 * )
 */
Route::rule('product/detail', 'index/product/detail', 'get|options');
/**
 * @SWG\Get(
 *   path="/product/detail",
 *   tags={"Product"},
 *   summary="产品详情",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="产品id"),
 *   @SWG\Response(
 *          response=200,
 *          description="添加成功"
 *   ),
 * )
 */
Route::rule('product/del', 'index/product/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/product/del",
 *   tags={"Product"},
 *   summary="产品删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="单子id"),
 *   @SWG\Response(
 *          response=200,
 *          description="删除成功"
 *   ),
 * )
 */
