<?php
Route::rule('/user/index', 'index/user/index', 'get|options');
/**
 * @SWG\Get(
 *   path="/user/index",
 *   tags={"User"},
 *   summary="用户列表",
 *   @SWG\Parameter(name="pmobile", type="string", in="query",description="父账户手机号 查询下级"),
 *   @SWG\Parameter(name="pid", type="integer", in="query",description="父id 查询下级"),
 *   @SWG\Parameter(name="mobile", type="integer", in="query",description="手机号"),
 *   @SWG\Parameter(name="status", type="integer", in="query",description="0被禁用 1正常 2未认证 3待审核 4未通过审核"),
 *   @SWG\Parameter(name="whether", type="integer", in="query",description="是否管理员0用户 1管理员"),
 *   @SWG\Parameter(name="level", type="integer", in="query",description="0未投资 1 500,2 2000,3 5000,4 10000,5 50000"
 *   ),
 *   @SWG\Response(
 *     response=200,
 *     description="用户列表"
 *   ),
 * )
 */
Route::rule('user/user', 'index/user/user', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/user",
 *   tags={"User"},
 *   summary="用户信息",
 *   @SWG\Parameter(name="mobile", type="string", in="formData",description="手机号"),
 *   @SWG\Parameter(name="id", type="integer", in="formData",description="用户id"),
 *   @SWG\Response(
 *     response=200,
 *     description="用户信息"
 *   ),
 * )
 */
Route::rule('user/add', 'index/user/add', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/add",
 *   tags={"User"},
 *   summary="用户添加",
 *   @SWG\Parameter(name="ptel", type="string",in="formData",description="父账户手机号"),
 *   @SWG\Parameter(name="real_name", type="string",in="formData",description="真实姓名"),
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="手机号"),
 *   @SWG\Parameter(name="password", type="string", in="formData",description="登录密码"),
 *   @SWG\Parameter(name="safe_password", type="string", in="formData",description="安全密码"),
 *   @SWG\Parameter(name="alipay", type="string",in="formData",description="支付宝号"),
 *   @SWG\Parameter(name="wechat", type="string", in="formData",description="微信号"),
 *   @SWG\Parameter(name="id_card", type="string",in="formData",description="身份证正面"),
 *   @SWG\Parameter(name="id_card_fan", type="string", in="formData",description="身份证反面"),
 *   @SWG\Parameter(name="whether", type="string", in="formData",description="0 用户,1 管理员"),
 *   @SWG\Parameter(name="code", type="integer", in="formData",description="验证码"),
 *   @SWG\Response(
 *     response=200,
 *     description="添加成功或失败"
 *   ),
 * )
 */
Route::rule('user/edit', 'index/user/edit', 'get|options');
/**
 * @SWG\Get(
 *   path="/user/edit",
 *   tags={"User"},
 *   summary="用户修改",
 *   @SWG\Parameter(name="id", type="integer",in="query",description="id"),
 *   @SWG\Response(
 *     response=200,
 *     description="添加成功或失败"
 *   ),
 * )
 */
Route::rule('user/renzheng', 'index/user/renzheng', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/renzheng",
 *   tags={"User"},
 *   summary="用户认证",
 *   @SWG\Parameter(name="real_name", type="string",in="formData",description="真实姓名"),
 *   @SWG\Parameter(name="id_card_number", type="string",in="formData",description="身份证号"),
 *   @SWG\Parameter(name="bank_name", type="string", in="formData",description="开户行"),
 *   @SWG\Parameter(name="bank_person", type="string", in="formData",description="开户人"),
 *   @SWG\Parameter(name="bank_addr", type="string", in="formData",description="开户行地址"),
 *   @SWG\Parameter(name="bank_number", type="string", in="formData",description="银行卡号"),
 *   @SWG\Parameter(name="alipay", type="string",in="formData",description="支付宝号"),
 *   @SWG\Parameter(name="wechat", type="string", in="formData",description="微信号"),
 *   @SWG\Parameter(name="id_card", type="string", in="formData",description="身份证正面"),
 *   @SWG\Parameter(name="id_card_fan", type="string", in="formData",description="身份证反面"),
 *   @SWG\Response(
 *     response=200,
 *     description="添加成功或失败"
 *   ),
 * )
 */
Route::rule('user/check', 'index/user/check', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/check",
 *   tags={"User"},
 *   summary="用户审核",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="用户id"),
 *   @SWG\Parameter(name="status", type="integer",in="formData",description="status 4审核未通过1审核通过"),
 *   @SWG\Response(
 *     response=200,
 *     description="添加成功或失败"
 *   ),
 * )
 */
Route::rule('user/edit', 'index/user/edit', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/edit",
 *   tags={"User"},
 *   summary="用户修改",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="用户id"),
 *   @SWG\Parameter(name="real_name", type="string",in="formData",description="真实姓名"),
 *   @SWG\Parameter(name="mobile", type="string",in="formData",description="手机号"),
 *   @SWG\Parameter(name="password", type="string", in="formData",description="登录密码"),
 *   @SWG\Parameter(name="safe_password", type="string", in="formData",description="安全密码"),
 *   @SWG\Parameter(name="alipay", type="string",in="formData",description="支付宝号"),
 *   @SWG\Parameter(name="wechat", type="string", in="formData",description="微信号"),
 *   @SWG\Parameter(name="bank_name", type="string", in="formData",description="银行名称"),
 *   @SWG\Parameter(name="bank_addr", type="string", in="formData",description="开户行地址"),
 *   @SWG\Parameter(name="bank_number", type="string", in="formData",description="银行账号"),
 *   @SWG\Parameter(name="bank_person", type="string", in="formData",description="收款人"),
 *   @SWG\Response(
 *     response=200,
 *     description="添加成功或失败"
 *   ),
 * )
 */
Route::rule('user/del', 'index/user/del', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/del",
 *   tags={"User"},
 *   summary="用户删除",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="id"),
 *   @SWG\Response(
 *     response=200,
 *     description="删除成功或失败"
 *   ),
 * )
 */
Route::rule('user/change', 'index/user/change', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/change",
 *   tags={"User"},
 *   summary="修改密码",
 *   @SWG\Parameter(name="key", type="integer",in="formData",description="1登录密码"),
 *   @SWG\Parameter(name="password", type="string",in="formData",description="原密码"),
 *   @SWG\Parameter(name="pass", type="string",in="formData",description="新密码"),
 *   @SWG\Parameter(name="pass1", type="string",in="formData",description="新密码二次输入"),
 *   @SWG\Response(
 *     response=200,
 *     description="删除成功或失败"
 *   ),
 * )
 */
Route::rule('user/giving', 'index/user/giving', 'post|options');
/**
 * @SWG\Post(
 *   path="/user/giving",
 *   tags={"User"},
 *   summary="赠送扣除瓜子币",
 *   @SWG\Parameter(name="id", type="integer",in="formData",description="用户id"),
 *   @SWG\Parameter(name="jine", type="integer",in="formData",description="金额 正数为加负数为减"),
 *   @SWG\Response(
 *     response=200,
 *     description="赠送扣除成功或失败"
 *   ),
 * )
 */