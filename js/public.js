function showmenu(baseID, divID) {
    baseID = document.getElementById(baseID);
    divID = document.getElementById(divID);
    if (showmenu.timer) clearTimeout(showmenu.timer);
    hideCur();
    divID.style.display = 'block';
    showmenu.cur = divID;
    if (!divID.isCreate) {
        divID.isCreate = true;
        divID.onmouseover = function() {
            if (showmenu.timer) clearTimeout(showmenu.timer);
            hideCur();
            divID.style.display = 'block';
        };
        function hide() {
            showmenu.timer = setTimeout(function() {
                divID.style.display = 'none';
            }
            , 1000);
        }
        divID.onmouseout = hide;
        baseID.onmouseout = hide;
    }
    function hideCur() {
        showmenu.cur && (showmenu.cur.style.display = 'none');
    }
}
function MM_findObj(n, d) {
    var p, i, x;
    if (!d) d = document;
    if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document;
        n = n.substring(0, p);
    }
    if (!(x = d[n]) && d.all) x = d.all[n];
    for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
    for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
    if (!x && d.getElementById) x = d.getElementById(n);
    return x;
}
function MM_preloadImages() {
    var d = document;
    if (d.images) {
        if (!d.MM_p) d.MM_p = new Array();
        var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
        for (i = 0; i < a.length; i++)
        if (a[i].indexOf("#") != 0) {
            d.MM_p[j] = new Image;
            d.MM_p[j++].src = a[i];
        }
    }
}
function MM_swapImgRestore() {
    var i, x, a = document.MM_sr;
    for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc;
    i++) x.src = x.oSrc;
}
function MM_swapImage() {
    var i, j = 0, x, a = MM_swapImage.arguments;
    document.MM_sr = new Array;
    for (i = 0; i < (a.length - 2);
    i += 3)
    if ((x = MM_findObj(a[i])) != null) {
        document.MM_sr[j++] = x;
        if (!x.oSrc) x.oSrc = x.src;
        x.src = a[i + 2];
    }
}
var SystemPrev=1;
function ShowSystem(obj){
    document.getElementById("ShowSystem"+SystemPrev).className="aTag";
    document.getElementById("System"+SystemPrev).style.display="none";
    document.getElementById("ShowSystem"+obj).className="aTagA";
    document.getElementById("System"+obj).style.display="block";
    if(obj==1){
        document.getElementById("ThisMore").href="/Ultimate/";
    }
    else if(obj==2){
        document.getElementById("ThisMore").href="/Shop/";
    }
    else if(obj==3){
        document.getElementById("ThisMore").href="/Ultimate/";
    }
    SystemPrev=obj;
}
var TemplatePrev=1;
function ShowSystemTemplate(obj){
    document.getElementById("SystemTemplate"+TemplatePrev).className="aTag";
    document.getElementById("Template"+TemplatePrev).style.display="none";
    document.getElementById("SystemTemplate"+obj).className="aTagA";
    document.getElementById("Template"+obj).style.display="block";
    if(obj==1){
        document.getElementById("ThisTempMore").href="/Ultimate/";
    }
    else if(obj==2){
        document.getElementById("ThisTempMore").href="/Shop/";
    }
    TemplatePrev=obj;
}
var rollspeed=30
var myInter;
var ff=navigator.userAgent.indexOf("Firefox")>=0;
function MarqueeV(){
    var ooRollV=document.getElementById("oRollV");
    var ooRollV1=document.getElementById("oRollV1");
    var ooRollV2=document.getElementById("oRollV2");
    if (ooRollV.scrollTop>=(ff ? ooRollV.scrollHeight/2 : ooRollV1.scrollHeight)){
        ooRollV.scrollTop=1;
    }
    else{
        ooRollV.scrollTop++;
    }
}
function StartRollV() {
    var ooRollV=document.getElementById("oRollV");
    var ooRollV1=document.getElementById("oRollV1");
    var ooRollV2=document.getElementById("oRollV2");
    if (ooRollV) {
        if (parseInt(ooRollV.style.height)>=ooRollV1.scrollHeight) {
            ooRollV.style.height = ooRollV1.scrollHeight;
            return;
        }
        ooRollV2.innerHTML=ooRollV1.innerHTML;
        myInter=setInterval(MarqueeV,rollspeed);
        ooRollV.onmouseover=function() {
            clearInterval(myInter)};
        ooRollV.onmouseout=function() {
            myInter=setInterval(MarqueeV,rollspeed)};
    }
}
function MarqueeH(){
    var ooRollH=document.getElementById("oRollH");
    var ooRollH1=document.getElementById("oRollH1");
    var ooRollH2=document.getElementById("oRollH2");
    if(ooRollH2.offsetLeft-ooRollH.scrollLeft<=0) {
        ooRollH.scrollLeft-=ooRollH1.offsetWidth;
    }
    else{
        ooRollH.scrollLeft++;
    }
}
function StartRollH() {
    var ooRollH=document.getElementById("oRollH");
    var ooRollH1=document.getElementById("oRollH1");
    var ooRollH2=document.getElementById("oRollH2");
    if (ooRollH) {
        if (parseInt(ooRollH.style.width)>=ooRollH2.offsetLeft) {
            oRollH.style.width = oRollH2.offsetLeft;
            return;
        }
        ooRollH2.innerHTML=ooRollH1.innerHTML;
        myInter=setInterval(MarqueeH,rollspeed);
        ooRollH.onmouseover=function() {
            clearInterval(myInter)};
        ooRollH.onmouseout=function() {
            myInter=setInterval(MarqueeH,rollspeed)};
    }
}
function linkSize()
{
    var o1,o2;
    with(document){
        o1 = document.getElementById("siteNav");
        o2 = document.getElementById("oRollV");
    }
    if (o1&&o2){
        if (parseInt(o2.style.height)+25<parseInt(o1.clientHeight)){
            o2.style.height = (parseInt(o1.clientHeight) - 35) + "px";
        }
    }
}