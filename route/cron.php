<?php
Route::rule('cron/scpz', 'index/cron/scpz', 'post|options');
/**
 * @SWG\Post(
 *   path="/cron/scpz",
 *   tags={"Cron"},
 *   summary="上传图片",
 *   @SWG\Parameter(name="img", type="string",in="formData",description="base64形式的图片字符串"),
 *   @SWG\Response(
 *     response=200,
 *     description="上传图片成功或失败"
 *   ),
 * )
 */
Route::rule('cron/send', 'index/cron/send', 'post|options');
/**
 * @SWG\Post(
 *   path="/cron/send",
 *   tags={"Cron"},
 *   summary="发送验证码",
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="手机号"),
 *   @SWG\Response(
 *     response=200,
 *     description="发送验证码成功或失败"
 *   ),
 * )
 */
Route::rule('cron/forget', 'index/cron/forget', 'post|options');
/**
 * @SWG\Post(
 *   path="/cron/forget",
 *   tags={"Cron"},
 *   summary="忘记密码",
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="手机号"),
 *   @SWG\Parameter(name="pass", type="string",in="formData",description="登录密码"),
 *   @SWG\Parameter(name="pass1", type="string",in="formData",description="确认登录密码"),
 *   @SWG\Parameter(name="code", type="string",in="formData",description="验证码"),
 *   @SWG\Response(
 *     response=200,
 *     description="忘记密码"
 *   ),
 * )
 */
Route::rule('cron/register', 'index/cron/register', 'post|options');
/**
 * @SWG\Post(
 *   path="/cron/register",
 *   tags={"Cron"},
 *   summary="注册",
 *   @SWG\Parameter(name="ptel", type="string",in="formData",description="父账户手机号"),
 *   @SWG\Parameter(name="real_name", type="string",in="formData",description="真实姓名"),
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="手机号"),
 *   @SWG\Parameter(name="password", type="string", in="formData",description="登录密码"),
 *   @SWG\Parameter(name="safe_password", type="string", in="formData",description="安全密码"),
 *   @SWG\Parameter(name="alipay", type="string",in="formData",description="支付宝号"),
 *   @SWG\Parameter(name="wechat", type="string", in="formData",description="微信号"),
 *   @SWG\Parameter(name="id_card", type="string",in="formData",description="身份证正面"),
 *   @SWG\Parameter(name="id_card_fan", type="string", in="formData",description="身份证反面"),
 *   @SWG\Parameter(name="code", type="integer", in="formData",description="验证码"),
 *   @SWG\Response(
 *     response=200,
 *     description="忘记密码"
 *   ),
 * )
 */
Route::rule('cron/token', 'index/cron/token', 'post|options');
/**
 * @SWG\Post(
 *   path="/cron/token",
 *   tags={"Cron"},
 *   summary="获取token",
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="手机号"),
 *   @SWG\Parameter(name="password", type="string",in="formData",description="登录密码"),
 *   @SWG\Parameter(name="url", type="string",in="formData",description="访问路由"),
 *   @SWG\Response(
 *     response=200,
 *     description="获取token"
 *   ),
 * )
 */