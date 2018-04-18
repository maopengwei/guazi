<?php
Route::rule('config/index', 'index/config/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/config/index",
 *   tags={"Config"},
 *   summary="配置信息",
 *   @SWG\Response(
 *          response=200,
 *          description="查询成功"
 *   ),
 * )
 */
Route::rule('config/index', 'index/config/index', 'post|options');
/**
 * @SWG\Post(
 *   path="/config/index",
 *   tags={"Config"},
 *   summary="修改配置",
 *   @SWG\Parameter(name="status", type="integer",in="formData",description="网站状态"),
 *   @SWG\Parameter(name="recharge", type="integer",in="formData",description="提现手续费%"),
 *   @SWG\Parameter(name="p_profit", type="integer",in="formData",description="静态收益父账号%"),
 *   @SWG\Parameter(name="b_profit", type="integer",in="formData",description="静态收益自己%"),
 *   @SWG\Parameter(name="direct_profit", type="integer",in="formData",description="动态直推奖励%"),
 *   @SWG\Parameter(name="price", type="integer",in="formData",description="每个瓜子币多少人民币"),
 *   @SWG\Response(
 *          response=200,
 *          description="查询成功"
 *   ),
 * )
 */
Route::rule('config/profit', 'index/config/profit', 'post|options');
Route::rule('config/carouse', 'index/config/carouse', 'get|post|options');
/**
 * @SWG\Post(
 *   path="/config/profit",
 *   tags={"Config"},
 *   summary="修改配置",
 *   @SWG\Parameter(name="suibian", type="integer",in="formData",description="集合所有数据的对象"),
 *   @SWG\Response(
 *          response=200,
 *          description="查询成功"
 *   ),
 * )
 */
