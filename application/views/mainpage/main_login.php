<!doctype html> 
<html> 
<head><meta charset="utf-8"> 
<title>��¼��� | �Ჩ��</title><meta http-equiv="X-UA-Compatible" content="IE=100" /> 
<link rel="shortcut icon" type="image/x-icon" href="http://s.libdd.com/img/icon/favicon.$5106.ico" /><!--[if lt IE 7]>
<script>
try { document.execCommand('BackgroundImageCache', false, true); } catch (e) {}
</script>
<![endif]--> 
<script> 
window.DDformKey = '';
window.DDHostName = 'web03.dd.hn';
window.DDrev = '19896 4b49f2fd66bf 2012041920  zhouzhihua';
window.DDrequestStart = '1334839932057';
window.DDrequestEnd = '1334839932111';
</script> 
<link rel="stylesheet" href="http://s.libdd.com/css/app/startpage.$6083.less" /

> 
<script src="http://s.libdd.com/js/kissy/1.2/seed.$5860.js"></script> 
<script> 
KISSY.use("lib/feed.$6083,util.$6023", function(S, FeedList, util){
function getLoadLock(){
return ENV.__startPageLoadingLock;
}
ENV.__startPageLoadingLock = true;S.ready(function(){
ENV.__feedList = new FeedList('#feed-list', {
lazyInit: true,
ImageLazyload: { enable: true, limit: 3 },
InfiniteLoad: { enable: true, api: util.url.host + '/startpage/more/{{feedId}}', loadLock: getLoadLock, loadingContainer: '#wrap' },
ImageSupport: { enable: true },
AudioSupport: { enable: true },
VideoSupport: { enable: true },
ScrollTopButton: { enable: true, positionBottom: 30, container: '#wrap' },
KeyboardShortcut: { enable: true },
HoverLink: { enable: true },
NotLoginSupport: { enable: true },
Comment: { enable: true },
Notes: { enable: true },
FeedAction: { enable: true }
});
});
});
KISSY.use("app/startpage.$6061", function(S, startpage){
ENV.page = 'login';
S.ready(function(){
startpage.init('login');
});
});
</script> 
</head> 
<body> 
 
<div id="wrap" style="display:none"> 
<div id="header-holder" class="startpage"> 
<div id="header" class="clearfix"> 
<div id="logo-holder"> 
<h1 id="logo"><a href="http://www.diandian.com">�����</a></h1> 
<h2 id="global-slogan">�ò��ʹӴ˼�</h2> 
</div> 

</div> 
</div> 
</div> 

<div id="startpage" class="clearfix" > 
<div id="startpage-wrap"> 
<h1 id="logo-startpage">��� - ���ʹӴ˼�</h1> 
<div id="login-wrap"> 
<form id="login-form" class="clearfix" action="http://www.diandian.com/login" method="post"> 
<div class="input-wrap" id="input-login-email"> 
<span class="input-icon"></span> 
<label>����</label> 
<input class="startpage-input-text" type="text" name="account" value=""></div> 
<div class="input-wrap" id="input-login-pwd"> 
<span class="input-icon"></span> 
<label>����</label> 
<input class="startpage-input-text" type="password" name="password" > 
<div class="tip" style="display:none"></div> 
</div> 
<input type="hidden" name="nextUrl" value="" /> 
<input type="hidden" name="lcallback" value="" /> 
<input type="hidden" name="persistent" value="1" checked="checked"> 
<input type="submit" class="input-button hidden-submit" value="��¼"><div cloud="type:Button;id:login-submit;width:283;skin:willblue">��¼</div> 
</form> 
<div id="login-help" class="clearfix"> 
<span id="third-party-login">������ʽ��¼</span> 
<span class="pipe">|</span> 
<a href="http://www.diandian.com/password/forgot" id="forget-password">��������?</a> 
</div> 
</div> 
<div id="register-wrap"> 
<div id="reg-form-wrap"> 
<form id="reg-form" class="clearfix" action="http://www.diandian.com/register" method="POST" autocomplete="off"> 
<div class="input-wrap" id="input-reg-email"> 
<span class="input-icon"></span> 
<label>����</label> 
<input class="startpage-input-text" type="text" name="email" value=""></div> 
<div class="input-wrap" id="input-reg-pwd"> 
<span class="input-icon"></span> 
<label>����</label> 
<input class="startpage-input-text" type="password" name="password"></div> 
<div class="input-wrap" id="input-reg-blogurl"> 
<span class="input-icon"></span> 
<label>��������</label> 
<input class="startpage-input-text" type="text" name="blogUrl" value=""> 
<div id='blogurl-address' class="blogurl-address address-hide"> 
<span id="diandian-host">.diandian.com</span> 
<span id="blogurl"></span> 
</div></div><input type="submit" class="input-button hidden-submit" value="ע��"><div id="register-error" class="error-tip" style="display:none;"></div><div cloud="type:Button;id:reg-submit;width:283;skin:willblue">��������</div> 
</form> 
<div id="register-help" class="clearfix"> 
<span id="third-party-login-register">������ʽ��¼</span> 
</div> 
</div> 
<div id="reg-stage-wrap" style="display:none;"> 
<div id="reg-stage-choose"> 
<h5>��ѡ�����</h5> 
<label id="label-office"><input type="radio" name="reg-stage-radio" id="reg-stage-work">�ڹ���</label> 
<label id="label-student"><input type="radio" name="reg-stage-radio" id="reg-stage-student">����ѧ</label> 
<label id="label-unknow"><input type="radio" name="reg-stage-radio" id="reg-stage-unknow">����˵</label> 
</div> 
<div id="reg-stage-error" class="error-tip" style="display:none;">��ѡ�����</div> 
<div cloud="type:Button;id:stage-submit;width:283;skin:willsilver">��һ��</div> 
</div> 
</div> 
</div> 
</div> 
<iframe src="http://a.libdd.com/acl.html?1" width="0" height="0" frameborder="0"></iframe><script type="text/javascript"> 
var _ddgaq = _ddgaq || [];
_ddgaq.push(['DDGAT._setAccount', 'UA-30555696-1']);
_ddgaq.push(['DDGAT._setDomainName', '.diandian.com']);
_ddgaq.push(['DDGAT._setAllowLinker', true]);
_ddgaq.push(['DDGAT._setLocalRemoteServerMode']);
_ddgaq.push(['DDGAT._setLocalGifPath', 'http://www.diandian.com/__utm.gif']);
_ddgaq.push(['DDGAT._addOrganic', 'baidu', 'word']);
_ddgaq.push(['DDGAT._addOrganic', 'soso', 'w']);
_ddgaq.push(['DDGAT._addOrganic', 'youdao', 'q']);
_ddgaq.push(['DDGAT._addOrganic', 'sogou', 'query']);
_ddgaq.push(['DDGAT._trackPageview']);(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = 'http://s.libdd.com/js/base/ga.$5928.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script> 
 
</body> 
</html> 
 