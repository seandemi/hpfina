document.write('<div id="pltsTipLayer" name="pltsTipLayer" style="display: none; position: absolute; z-index: 10001; text-align: left"></div>');var pltsPop=null;var pltsoffsetX=10;var pltsoffsetY=15;var pltsPopbg="#BBBBBB";var pltsPopfg="#FFFFFF";var pltsTitle="";function pltsinits(){document.onmouseover=plts;document.onmousemove=moveToMouseLoc;};function plts(){var o=event.srcElement;if(o.alt!=null&&o.alt!=""){o.dypop=o.alt;o.alt=""};if(o.title!=null&&o.title!=""){o.dypop=o.title;o.title=""};pltsPop=o.dypop;if(pltsPop!=null&&pltsPop!=""&&typeof(pltsPop)!="undefined"){pltsTipLayer.style.left=-1000;pltsTipLayer.style.display='';var Msg=pltsPop.replace(/\n/g,"<br>");Msg=Msg.replace(/\0x13/g,"<br>");var re=/\{(.[^\{]*)\}/ig;if(!re.test(Msg))pltsTitle="";else{re=/\{(.[^\{]*)\}(.*)/ig;pltsTitle=Msg.replace(re,"$1")+" ";re=/\{(.[^\{]*)\}/ig;Msg=Msg.replace(re,"");Msg=Msg.replace("<br>","");};var content='<table cellspacing="1" cellpadding="0" style="filter: alpha(opacity=90); background-color: '+pltsPopbg+'" id="toolTipTalbe" border="0"><tr><td style="padding-left: 10px; padding-right: 10px; padding-top: 6px; padding-bottom: 6px; line-height: 135%; background-color: '+pltsPopfg+'">'+Msg+'</td></tr></table>';pltsTipLayer.innerHTML=content;toolTipTalbe.style.width=Math.min(pltsTipLayer.clientWidth,document.documentElement.clientWidth/2.2);moveToMouseLoc();return true;}else{pltsTipLayer.innerHTML='';pltsTipLayer.style.display='none';return true;}};function moveToMouseLoc(){if(pltsTipLayer.innerHTML=='')return true;var MouseX=event.x;var MouseY=event.y;var popHeight=pltsTipLayer.clientHeight;var popWidth=pltsTipLayer.clientWidth;if(MouseY+pltsoffsetY+popHeight>document.documentElement.clientHeight){popTopAdjust=-popHeight-pltsoffsetY*1.5;}else{popTopAdjust=0;};if(MouseX+pltsoffsetX+popWidth>document.documentElement.clientWidth){popLeftAdjust=-popWidth-pltsoffsetX*2;}else{popLeftAdjust=0;};pltsTipLayer.style.left=MouseX+pltsoffsetX+document.documentElement.scrollLeft+popLeftAdjust;pltsTipLayer.style.top=MouseY+pltsoffsetY+document.documentElement.scrollTop+popTopAdjust;return true;};pltsinits();