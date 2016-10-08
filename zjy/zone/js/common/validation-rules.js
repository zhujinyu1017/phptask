var authRegExp = {
	integer: "^-?[1-9]\\d*$", //整数
	integer1: "^[1-9]\\d*$", //正整数
	integer2: "^-[1-9]\\d*$", //负整数
	number: "^([+-]?)\\d*\\.?\\d+$", //数字
	number1: "^[1-9]\\d*|0$", //正数（正整数 + 0）
	number2: "^-[1-9]\\d*|0$", //负数（负整数 + 0）
	decimal: "^([+-]?)\\d*\\.\\d+$", //浮点数
	decimal1: "^[1-9]\\d*.\\d*|0.\\d*[1-9]\\d*$", //正浮点数
	decimal2: "^-([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*)$", //负浮点数
	decimal3: "^-?([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*|0?.0+|0)$", //浮点数
	decimal4: "^[1-9]\\d*.\\d*|0.\\d*[1-9]\\d*|0?.0+|0$", //非负浮点数（正浮点数 + 0）
	decimal5: "^(-([1-9]\\d*.\\d*|0.\\d*[1-9]\\d*))|0?.0+|0$", //非正浮点数（负浮点数 + 0）
	ascii: "^[\\x00-\\xFF]+$", //仅ACSII字符
	chinese: "^[\\u4e00-\\u9fa5]+$", //仅中文
	color: "^[a-fA-F0-9]{6}$", //颜色
	date: "^\\d{4}(\\-|\\/|\.)\\d{1,2}\\1\\d{1,2}$", //日期
	email: "^\\w+((-\\w+)|(\\.\\w+))*\\@[A-Za-z0-9]+((\\.|-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]+$", //邮件
	idcard: /(^\d{15}$)|(^\d{17}([0-9]|X)$)/, //身份证
	ip4: "^(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)$", //ip地址
	letter: "^[A-Za-z]+$", //字母
	letterL: "^[a-z]+$", //小写字母
	letterU: "^[A-Z]+$", //大写字母
	mobile: "^((13[0-9])|(15[0-9])|(17[0-9])|(18[0-9]))\\d{8}$", //手机
	// mobile: "^((134[0-8])|(170[059]))\\d{7}$|^((13[0-35-9])|(145)|(147)|(15[0-35-9])|(17[6-8])|(18[0-9]))\\d{8}$", //手机
	password: "^.*[A-Za-z0-9\\w_-]+.*$", //密码
	fullNumber: "^[0-9]+$", //数字
	picture: "(.*)\\.(jpg|bmp|gif|ico|pcx|jpeg|tif|png|raw|tga)$", //图片
	qq: "^[1-9]*[1-9][0-9]*$", //QQ号码
	rar: "(.*)\\.(rar|zip|7zip|tgz)$", //压缩文件
	tel: "^[0-9\-()（）]{7,18}$", //电话号码的函数(包括验证国内区号,国际区号,分机号)
	url: "^http[s]?:\\/\\/([\\w-]+\\.)+[\\w-]+([\\w-./?%&=]*)?$", //url
	username: "^[A-Za-z0-9_\\-\\u4e00-\\u9fa5]+$", //用户名
	realname: "^[A-Za-z\\u4e00-\\u9fa5]+$", // 真实姓名
	zipcode: "^\\d{6}$", //邮编
	notempty: "^\\S+$", //非空
	bankcardno:"/^\d{16}|\d{19}$/"
};
// 验证规则
var authRules = {
	isNull: function (str) {
		return (str == "" || typeof str != "string");
	},
	betweenLength: function (str, _min, _max) {
		return (str.length >= _min && str.length <= _max);
	},
	isUid: function (str) {
		return new RegExp(authRegExp.username).test(str);
	},
	fullNumberName: function (str) {
		return new RegExp(authRegExp.fullNumber).test(str);
	},
	decimal: function (str) {
		return new RegExp(authRegExp.decimal).test(str);
	},
	isPwd: function (str) {
		return /^.*([\W_a-zA-z0-9-])+.*$/i.test(str);
	},
	isidcard: function (str) {
		return new RegExp(authRegExp.idcard).test(str);
	},
	isPwdRepeat: function (str1, str2) {
		return (str1 == str2);
	},
	isEmail: function (str) {
		return new RegExp(authRegExp.email).test(str);
	},
	isTel: function (str) {
		return new RegExp(authRegExp.tel).test(str);
	},
	isMobile: function (str) {
		return new RegExp(authRegExp.mobile).test(str);
	},
	checkType: function (element) {
		return (element.attr("type") == "checkbox" || element.attr("type") == "radio" || element.attr("rel") == "select");
	},
	isRealName: function (str) {
		return new RegExp(authRegExp.realname).test(str);
	},
	isbankcardno: function (str) {
		return new RegExp(authRegExp.bankcardno).test(str);
	},
	isChinese: function(str){
		return new RegExp(authRegExp.chinese).test(str);
	},
	//判断是不是正数
	isNumber1: function(str){
		return new RegExp(authRegExp.number1).test(str);
	},
	//判断是不是正浮点数
	isDecimal1: function(str){
		return new RegExp(authRegExp.decimal1).test(str);
	},
	//判断是否是正整数
	isIntegal1: function(str){
		return new RegExp(authRegExp.integer1).test(str);
	}


};
//判断输入的是否是正整数


function check_int(num,name){

	if(num == '' || num== null){
		layer.msg(name+'输入不可为空');
		return false;
	} else if(!authRules.isIntegal1(num)){
		layer.msg('请输入正确的'+name+'格式');
		return false;
	} else {
		return true;
	}

}

// 判断输入价格是否合法
function check_num(num,name) {

	console.log(!authRules.isNumber1(num));
	if (num == '' || num == null) {
		layer.msg(name+'输入不可为空');
		return false;
	}else if (!authRules.isNumber1(num)&&!authRules.isDecimal1(num)) {
		layer.msg('请输入正确的'+name+'格式');
		return false;
	} else {
		return true;
	}
}
// 判断输入手机号是否合法
function check_mobile() {
	var mobile = $("#mobile").val();
	if (mobile == '' || mobile == null) {
		layer.msg('请输入11位手机号码');
		return false;
	}
	else if (mobile.length != 11) {
		layer.msg('请输入11位手机号码');
		return false;
	} else if (!authRules.isMobile(mobile)) {
		layer.msg('手机号码不正确');
		return false;
	} else {
		return true;
	}
}
// 判断输入密码是否合法
function check_password() {
	var pwd = $("#password").val();
	if (pwd == null || pwd == "") {
		layer.msg('请输入密码');
		return false;
	} else if (pwd.length < 6 || pwd.length > 12) {
		layer.msg('密码为6-12位');
		return false;
	} else {
		return true;
	}
}
// 判断新输入密码是否合法
function check_newpassword() {
	var newpassword = $("#newpassword").val();
	    console.log(newpassword);
	if (newpassword == null || newpassword == "") {
		layer.msg('请输入密码');
		return false;
	} else if (newpassword.length < 6 || newpassword.length > 12) {
		layer.msg('密码为6-12位');
		return false;
	} else {
		return true;
	}
}
// 检查手机验证码
function check_smscode() {
	var smscode = $("#smscode").val();
	if (smscode == '' || smscode == null) {
		layer.msg('请输入验证码');
		return false;
	} else if (smscode.length != 6) {
		layer.msg('验证码为6位数字');
		return false;
	} else {
		return true;
	}
}
/*检查真实姓名*/
function check_realname() {
	var realname = $("#realname").val();
	if (realname == '' || realname == null) {
		layer.msg('真实姓名不可为空!');
		return false;
	} else if (!authRules.isRealName(realname)) {
		layer.msg('请输入真实姓名！');
		return false;
	} else {
		return true;
	}
}
//检查不可为空
function check_null(obj,string) {
	if (obj == '' || obj == null) {
		layer.msg(string);
		return false;
	} else {
		return true;
	}
}
function check_null_new(obj,string) {
	if (obj == '' || obj == null) {
		layer.msg(string);
		return false;
	} else {
		//$('.tip-error').html('').hide();
		return true;
	}
}
// 检查身份证号
function check_idcardno() {
	var idcardno = $("#idcardno").val();
	idcardno = idcardno.toUpperCase();
	if (idcardno == '' || idcardno == null) {
		layer.msg('身份证号不可为空!');
		return false;
	} else if (!authRules.isidcard(idcardno)) {
		layer.msg('请输入正确的身份证号！');
		return false;
	} else {
		return true;
	}
}
//验证再次出入密码
function check_reppwd() {
	var pwd = $("#password").val();
	var reppwd = $("#repasswd").val();
	if (!authRules.isPwdRepeat(pwd, reppwd)) {
		layer.msg("两次输入的密码不一致");
		return false;
	} else {
		return true;
	}
}
/*验证银行卡号是否合法*/
function check_bankCardNumber() {
	var bankcardno = $("#bankcardno").val();
	if (bankcardno == '' || bankcardno == null) {
		layer.msg('请输入银行卡号！');
		return false;
	}
	else if (!authRules.fullNumberName(bankcardno)) {
		layer.msg('请输入数字！');
		return false;
	} else if (bankcardno.length < 16 || bankcardno.length > 19) {
		layer.msg('银行卡号长度必须在16到19之间！');
		return false;
	} else {
		return true;
	}
}
/*判断充值金额是否合法*/
function check_chargeNumber() {
	var chargeNumber=$("#OrderMoney").val();
	if (isNaN(chargeNumber * 1) || chargeNumber * 1 <= 0) {
		layer.msg('请输入正确的充值金额！');
		return false;
	}else {
		return true;
	}
}
/*判断是不是手机号和固定电话*/
function check_phone($phone,$message){
	if($phone=='' || $phone == null){
		layer.msg($message);
		return false;
	}
	else if(!authRules.isMobile($phone)&&!authRules.isTel($phone)){
		layer.msg($message);
		return false;
	}else{
		return true;
	}
}
/*验证码时间间隔提示*/
function countDown(b1) {
	var count = 60, clear;
	var time = function () {
		if (count == 0) {
			b1.html('获取验证码');
			clearInterval(clear);
		} else {
			b1.html(count + '秒后重新获取');
			count--;
			clear = setTimeout(function () {
				time();
			}, 1000);
		}
	};
	time();
}
