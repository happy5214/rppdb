var ro="/";

// CodeThatSDK - JavaScript SDK
// Version: 2.2.4 (11.19.05.1)
// Copyright (c) 2003-05 by CodeThat.Com
// http://www.codethat.com/

function Undef(o){
return typeof(o)=='undefined'||o===''||o==null};function Def(o){
return!Undef(o)};function Und(o){
return typeof(o)=='undefined'};function pI(s){
return parseInt(s)};function pB(v,d){
return Und(v)?d:v&&v!='false'};function dw(s){document.write(s)};if(!Array.prototype.push){Array.prototype.push=function(){var i,a=arguments;for(i=0;i<a.length;)this[this.length]=a[i++]};}function UA(){var t=this,nv=navigator,n=nv.userAgent.toLowerCase();t.win=n.indexOf('win')>=0;t.mac=n.indexOf('mac')>=0;t.DOM=document.getElementById?true:false;t.dynDOM=document.createElement&&document.addEventListener;t.khtml=nv.vendor=='KDE';var idx=n.indexOf('opera');t.opera=idx!=-1;if(t.opera){t.vers=parseFloat(n.substr(idx+6));t.major=Math.floor(t.vers);t.opera5=t.major==5;t.opera6=t.major==6;t.opera7=t.major==7;t.opera7up=t.vers>=7;}t.oldOpera=t.opera5||t.opera6;idx=n.indexOf('msie');if(idx>=0&&!t.opera&&!t.khtml){t.vers=parseFloat(n.substr(idx+5));t.ie3down=t.vers<4;t.ie=t.ie4up=document.all&&document.all.item&&!t.ie3down;t.ie5up=t.ie&&t.DOM;t.ie55up=t.ie&&t.vers>=5.5;t.ie6up=t.ie&&t.vers>=6}t.cm=document.compatMode;t.css1cm=t.cm=='CSS1Compat';t.nn4=nv.appName=="Netscape"&&!t.DOM&&!t.opera;if(t.nn4)t.vers=parseFloat(nv.appVersion);t.moz=t.nn6up=t.gecko=n.indexOf('gecko')!=-1;if(t.gecko)t.vers=parseFloat(n.substr(n.indexOf('rv:')+3));t.nn7up=t.gecko&&t.vers>1;t.hj=n.indexOf('hotjava')!=-1;t.aol=n.indexOf('aol')!=-1;t.aol4up=t.aol&&t.ie4up;t.major=Math.floor(t.vers);t.old=t.oldOpera||t.nn4;t.supp=t.supported=t.old||t.opera7up||t.ie||t.moz||t.DOM};var ua=new UA();function CEvent(e){var t=this,d=document;t._e=e;t.x=ua.nn4||ua.moz?e.pageX:ua.oldOpera?e.clientX:e.clientX+(d&&d.body?d.body.scrollLeft:0);t.y=ua.nn4||ua.moz?e.pageY:ua.oldOpera?e.clientY:e.clientY+(d&&d.body?d.body.scrollTop:0);t.offsetX=ua.nn4||ua.moz?e.layerX:e.offsetX;t.offsetY=ua.nn4||ua.moz?e.layerY:e.offsetY;t.screenX=e.screenX;t.screenY=e.screenY;t.target=ua.ie?e.srcElement:e.target;t.key=ua.nn4||ua.moz?e.which:e.keyCode;t.alt=ua.nn4?e.modifiers&Event.ALT_MASK:e.altKey;t.ctrl=ua.nn4?e.modifiers&Event.CONTROL_MASK:e.ctrlKey;t.shift=ua.nn4?e.modifiers&Event.SHIFT_MASK:e.shiftKey;t.spec=t.alt||t.ctrl||t.shift;var b=ua.nn4||ua.moz?e.which:e.button;t.b_left=b==1;t.b_mid=ua.nn4||ua.moz?b==2:b==4;t.b_right=ua.nn4||ua.moz?b==3:b==2};function CCodeThat(id){this._id=id;this._c=0;this.pre={};this.sz=[];this.ld=[];this.l='acdehmoptT/:.Crl() yigsnvfu'.split('');this.ch()};{var CTp=CCodeThat.prototype;CTp.findLayer=function(name,parent){
return this.findElement(name,parent)};CTp.findElement=function(name,parent){if(ua.DOM)
return document.getElementById(name);else if(ua.ie4up)
return document.all[name];else{var set=Undef(parent)?document:parent.document;if(Undef(set[name])){var i,el,len=set.layers.length;if(len==0)
return;else{for(i=0;i<len;i++){el=this.findElement(name,set.layers[i]);if(Def(el))
return el;}}}else return set[name];}};CTp.use=function(mod){dw('<script language="javascript" type="text/javascript" src="'+(this._path||'')+mod+'"><\/script>')};CTp.path=function(p){this._path=p};CTp.gets=function(a){var i,s='',t=this;a=a&&a!=1?a:[a||13,6,2,3,8,4,0,8,12,a||13,6,5];if(!t.l||!t.l.length)
return;for(i=0;i<a.length;)s+=t.l[a[i++]];
return s};CTp.regEventHandler=function(e,h,obj){if(Undef(obj))obj=document;e=e.toLowerCase();if(ua.nn4){var name=e.toUpperCase();obj.captureEvents(Event[name]);}var f=typeof(h)=="function"?function(e){var ev=ua.ie?window.event:e;if(Def(ev))ev=new CEvent(ev);
return h(ev)}:typeof(h)=="string"?new Function("e","var ev=ua.ie?window.event:e;if (Def(ev)) ev=new CEvent(ev);"+h):null;obj["on"+e]=f};CTp.clearEventHandler=function(e,obj){if(Undef(obj))obj=document;e=e.toLowerCase();if(ua.nn4){var name=e.toUpperCase();obj.releaseEvents(Event[name]);}obj["on"+e]=null};CTp.setResizeHandler=CTp.setOnResize=function(h,b){var s=this.sz,id=this._id;if(!s.length){if(ua.oldOpera){var _h=new Function(id+".saveWinSize();"+id+".checkSize()");b?_h():this.setOnLoad(_h)}else{s[0]=window.onresize;window.onresize=new Function(id+'.onresize()')}}s.push(h)};CTp.setOnLoad=function(h){var l=this.ld;if(!l.length){l[0]=window.onload;window.onload=new Function(this._id+".onload()");}l.push(h)};CTp.checkSize=function(){var t=this;if(t.getWinHeight()!=t._WH||t.getWinWidth()!=t._WW){t.saveWinSize();t.onresize()}t._resTO=setTimeout(t._id+'.checkSize()',1500)};CTp.call=function(a){for(var i=0;i<a.length;i++)if(typeof a[i]=='function')a[i]()};CTp.onload=function(){this.call(this.ld)};CTp.onresize=function(){this.call(this.sz)};CTp.saveWinSize=function(){this._WH=this.getWinHeight();this._WW=this.getWinWidth()};CTp.getWinHeight=function(){var d=document;
return ua.ie4up?ua.css1cm?d.documentElement.clientHeight:d.body.clientHeight:self.innerHeight};CTp.getWinWidth=function(){var d=document;
return ua.ie4up?ua.css1cm?d.documentElement.clientWidth:d.body.clientWidth:self.innerWidth};CTp.getScrollX=function(){
return ua.ie4up?document.body.scrollLeft:self.pageXOffset};CTp.getScrollY=function(){
return ua.ie4up?document.body.scrollTop:self.pageYOffset};CTp.cancelEvent=function(e){if(ua.nn4)
return;if(!Und(e.stopPropagation))e.stopPropagation();else e.cancelBubble=true;e.returnValue=false};CTp.newID=function(){
return 'CodeThat'+this._c++};CTp.readCookie=function(name){var str=document.cookie;var set=str.split(';');var sz=set.length;var x,pcs;var val="";for(x=0;x<sz&&val=="";x++){pcs=set[x].split('=');if(pcs[0].substring(0,1)==' ')pcs[0]=pcs[0].substring(1,pcs[0].length);if(pcs[0]==name)val=pcs[1]}
return val};CTp.writeCookie=function(name,val,exp){var expDate=new Date();if(exp){expDate.setTime(expDate.getTime()+exp);document.cookie=name+"="+val+"; expires="+expDate.toGMTString();}else{document.cookie=name+"="+val;}};CTp.preload=function(){var i,im=[],a=arguments;for(i=0;i<a.length;i++){if(Undef(a[i]))im[i]=null;else if(Def(this.pre[a[i]]))im[i]=this.pre[a[i]];else{im[i]=new Image();im[i].src=a[i];this.pre[a[i]]=im[i]}}
return a.length==1?im[0]:im};CTp.ch=function(){eval(this.gets([0,0,0,0,0,0,0,0,0,0,0])+"='"+this.gets([1,6,7,19,14,20,21,4,8,18,16,1,17,18,1,6,2,3,8,4,0,8,12,1,6,5,18,22,8,0,23,2,0,14,2,18,22,1,14,20,7,8,18,24,3,14,22,20,6,23,12]).toUpperCase()+"'");};}var CodeThat=new CCodeThat('CodeThat');function CT_el(l){if(typeof l=='string')l=CodeThat.findElement(l);var st=ua.nn4?l:l.style;
return[l,st]};function CT_HTML(l,HTML){l=CT_el(l);if(ua.nn4){var d=l[0].document;d.open();d.write(HTML);d.close()}else if(!ua.oldOpera)l[0].innerHTML=HTML;};function CT_css(l,css){if(!ua.oldOpera&&!ua.nn4){l=CT_el(l);l[0].className=css}};function CT_getWidth(l){l=CT_el(l);var w;if(ua.nn4)w=l[0].clip.width;else w=ua.oldOpera?l[1].pixelWidth:l[0].offsetWidth;
return w};function CT_getHeight(l){l=CT_el(l);var h;if(ua.nn4)h=l[0].clip.height;else h=ua.oldOpera?l[1].pixelHeight:l[0].offsetHeight;
return h};function CT_getTop(l){l=CT_el(l);
return ua.nn4?l[0].y:l[0].offsetTop};function CT_getLeft(l){l=CT_el(l);
return ua.nn4?l[0].x:l[0].offsetLeft};function CT_getAbsTop(l){l=CT_el(l);if(ua.nn4)
return l[0].pageY;else{var o=l[0],y=CT_getTop(l[0]);while(Def(o=o.offsetParent))y+=o.offsetTop;
return y}};function CT_getAbsLeft(l){l=CT_el(l);if(ua.nn4)
return l[0].pageX;else{var o=l[0],l=CT_getLeft(l[0]);while(Def(o=o.offsetParent))l+=o.offsetLeft;
return l}};function CT_lrStyle(w,h,t,l,a,v,bgc,bgi,cl,o,d,st,z,al){
return 'position:'+(a?'absolute':'relative')+';overflow:'+(o||'hidden')+';visibility:'+(v?'inherit':'hidden')+(Def(t)?";top:"+t+"px":"")+(Def(l)?";left:"+l+"px":"")+(Def(w)?";width:"+w+"px":"")+(Def(h)?";height:"+h+"px":"")+(z?";z-index:"+z:"")+(bgc?";background-color:"+bgc:"")+(bgi?";background-image:url("+bgi+")":"")+(cl?";clip:rect("+cl[0]+"px "+cl[1]+"px "+cl[2]+"px "+cl[3]+"px)":"")+(d?";display:"+d:"")+";"+(st||'')+(Def(al)?ua.ie55up?';filter:progid:DXImageTransform.Microsoft.Alpha(Opacity='+al+')':(ua.gecko?';-moz-opacity:':';opacity:')+al/100:'')};function CT_lrSource(id,w,h,t,l,a,v,css,bgc,bgi,cl,o,d,st,z,al,ev,html){var src='';if(ua.nn4){if(Undef(cl)&&Def(h)&&Def(w)&&(Undef(o)||o=='hidden'))cl=[0,w,h,0];if(st)src="<style type=text/css>#"+id+"{"+st+"}</style>";src+=(a?'<':'<i')+'layer id='+id+(Def(t)?' top='+t:"")+(Def(l)?' left='+l:"")+(Def(w)?' width='+w:"")+(z?' z-index='+z:"")+' visibility='+(v?"inherit":"hide")+(cl?' clip="'+cl[3]+','+cl[0]+','+cl[1]+','+cl[2]+'"':"")+(bgc?' bgcolor="'+bgc+'"':"")+(bgi?' background="'+bgi+'"':"")}else src='<div id="'+id+'" style="'+CT_lrStyle(w,h,t,l,a,v,bgc,bgi,cl,o,d,st,z,al)+'"';if(css)src+=' class="'+css+'"';if(Def(ev))for(var i=ev.length-1;i>=0;i-=2)src+=' on'+ev[i-1]+'="'+ev[i]+'"';
return src+">"+(html||'')+'</'+(ua.nn4?(a?'':'i')+"layer>":"div>")};function CT_createLayer(id,w,h,t,l,a,v,css,bgc,bgi,cl,o,d,st,z,al,ev,html,p){var id=id||CodeThat.newID();var src=CT_lrSource(id,w,h,t,l,a,v,css,bgc,bgi,cl,o,d,st,z,al,ev,html);var parent=p||document.body;if(!CodeThat.loaded)dw(src);else if(ua.ie)parent.insertAdjacentHTML("BeforeEnd",src);else if(ua.dynDOM){var lr=document.createElement('DIV');lr.setAttribute('id',id);if(Def(css))lr.setAttribute('className',css);lr.setAttribute('style',CT_lrStyle(w,h,t,l,a,v,bgc,bgi,cl,o,d,st,z,al));lr.innerHTML=html;if(Def(ev))for(var i=ev.length-1;i>=0;i-=2)lr.addEventListener(ev[i-1],new Function(ev[i]),0);parent.appendChild(lr)}else return;
return id};function CT_clear(l){CT_HTML(l,'')};function CT_vis(l,v){l=CT_el(l);l[1].visibility=v=='i'?"inherit":v?ua.nn4?"show":"visible":ua.nn4?"hide":"hidden"};function CT_inhvis(l,v){CT_vis(l,v?'i':0)};function CT_show(l){CT_vis(l,1)};function CT_hide(l){CT_vis(l,0)};function CT_showAt(l,x,y){l=CT_el(l);CT_moveTo(l[0],x,y);CT_show(l[0])};function CT_z(l,z){l=CT_el(l);l[1].zIndex=z};function CT_setWidth(l,w){l=CT_el(l);if(ua.nn4)l[0].resizeTo(w,CT_getHeight(l[0]));else if(ua.oldOpera)l[1].pixelWidth=w;else l[1].width=w+"px"};function CT_setHeight(l,h){l=CT_el(l);if(ua.nn4)l[0].resizeTo(CT_getWidth(l[0]),h);else if(ua.oldOpera)l[1].pixelHeight=h;else l[1].height=h+"px"};function CT_resize(l,w,h){l=CT_el(l);if(ua.nn4)l[0].resizeTo(w,h);else{CT_setHeight(l[0],h);CT_setWidth(l[0],w)}};function CT_setTop(l,y){l=CT_el(l);if(ua.nn4)l[1].y=y;else if(ua.oldOpera)l[1].pixelTop=y;else l[1].top=y+"px"};function CT_setLeft(l,x){l=CT_el(l);if(ua.nn4)l[1].x=x;else if(ua.oldOpera)l[1].pixelLeft=x;else l[1].left=x+"px"};function CT_moveTo(l,x,y){l=CT_el(l);if(ua.nn4)l[0].moveTo(x,y);else{CT_setTop(l[0],y);CT_setLeft(l[0],x)}};function CT_moveRel(l,dx,dy){l=CT_el(l);CT_moveTo(l[0],CT_getLeft(l[0])+dx,CT_getTop(l[0])+dy)};function CT_setBgColor(l,c){l=CT_el(l);if(!ua.nn4&&!ua.oldOpera)l[1].backgroundColor=c;else if(ua.nn4)l[1].bgColor=c;else if(ua.opera)l[1].background=c};function CT_setBgImage(l,url){l=CT_el(l);if(!ua.nn4&&!ua.oldOpera)l[1].backgroundImage='url('+url+')';else l[1].background.src=url};function CT_clip(l,x,y,w,h){l=CT_el(l);if(ua.nn4){var area=l[1].clip;area.top=y;area.left=x;area.width=w;area.height=h}else if(!ua.oldOpera)l[1].clip='rect('+y+'px '+(x+w)+'px '+(y+h)+'px '+x+'px)'};function CT_display(l,d){l=CT_el(l);l[1].display=d};function CT_overflow(l,o){l=CT_el(l);l[1].overflow=o};function CT_alpha(l,a){if(ua.ie){if(ua.ie55up){l=CT_el(l);l[1].filter='progid:DXImageTransform.Microsoft.Alpha(Opacity="'+a+'")'}}else l[1].opacity=al/100};function CT_getVis(l){l=CT_el(l);var v=l[1].visibility;
return Def(v)?v=="show"||v=="visible":v};function CT_getSize(l){l=CT_el(l);
return[CT_getWidth(l[0]),CT_getHeight(l[0])]};function CT_getContentWidth(l){l=CT_el(l);
return ua.nn4?l[0].document.width:ua.oldOpera?l[1].pixelWidth:ua.ie&&ua.win?l[0].scrollWidth:l[0].offsetWidth};function CT_getContentHeight(l){l=CT_el(l);
return ua.nn4?l[0].document.height:ua.oldOpera?l[1].pixelHeight:ua.ie&&ua.win?l[0].scrollHeight:l[0].offsetHeight};function CT_getPos(l){l=CT_el(l);
return[CT_getLeft(l[0]),CT_getTop(l[0])]};function CT_getAbsPos(l){l=CT_el(l);
return[CT_getAbsLeft(l[0]),CT_getAbsTop(l[0])]};function CLayer(){var a=arguments,t=this;t._ex=false;if(a.length==2&&typeof(a[0])=='number'){t._w=parseInt(a[0]);t._h=parseInt(a[1])}else if(a.length>=1&&typeof a[0]=='string')t.assignLayer(CodeThat.findLayer(a[0],a[1]));t._id=t._id||CodeThat.newID();t._HTML='';t._ev=[];};{var CLp=CLayer.prototype;CLp.assignLayer=function(oLr){var t=this;if(Undef(oLr))oLr=t._id;oLr=CT_el(oLr);t._lr=oLr[0];t._st=oLr[1];t._ex=1;
return t};CLp.setHTML=function(s){this._HTML=s;if(this._ex)CT_HTML(this._lr,s)};CLp.appendHTML=function(s){this.setHTML(this._HTML+s)};CLp.clear=function(){this.setHTML('')};CLp.setVisible=function(v){this._v=v;if(this._ex)CT_vis(this._lr,v)};CLp.show=function(){this.setVisible(1)};CLp.hide=function(){this.setVisible(0)};CLp.showAt=function(x,y){CT_showAt(this._lr,x,y)};CLp.setZIndex=function(z){this._z=z;if(this._ex)CT_z(this._lr,z)};CLp.setWidth=function(w){this._w=w;if(this._ex)CT_setWidth(this._lr,w);};CLp.setHeight=function(h){this._h=h;if(this._ex)CT_setHeight(this._lr,h)};CLp.resize=CLp.setSize=function(w,h){this.setHeight(h);this.setWidth(w)};CLp.setTop=function(y){this._t=y;if(this._ex)CT_setTop(this._lr,y)};CLp.setLeft=function(x){this._l=x;if(this._ex)CT_setLeft(this._lr,x)};CLp.moveTo=CLp.setPos=function(x,y){var t=this;t._l=x;t._t=y;if(t._ex)CT_moveTo(t._lr,x,y)};CLp.setRel=function(r){this._rel=r};CLp.moveRel=function(dx,dy){this.moveTo(this.getLeft()+dx,this.getTop()+dy)};CLp.setCSS=function(css){this._css=css;if(this._ex)CT_css(this._lr,css)};CLp.setID=function(id){if(!this._ex)this._id=id||CodeThat.newID();};CLp.setBgColor=function(c){this._bgC=c;if(this._ex)CT_setBgColor(this._lr,c)};CLp.setBgImage=function(url){this._bgI=url;if(this._ex)CT_setBgImage(this._lr,url)};CLp.clip=function(x,y,w,h){this._cl=[y,x+w,y+h,x];if(this._ex)CT_clip(this._lr,x,y,w,h)};CLp.setDisplay=function(d){this._dsp=d;if(this._ex)CT_display(this._lr,d)};CLp.setOverflow=function(o){this._ov=o;if(this._ex)CT_overflow(this._lr,o)};CLp.addEventHandler=function(ev,src){this._ev.push([ev.toLowerCase(),src]);};CLp.clearHandlers=function(){this._ev=[]};CLp.setAlpha=function(a){this._al=a;if(this._ex)CT_al(this._lr,a)};CLp.addStyle=function(st){this._sty=st};CLp.object=function(){
return this._lr};CLp.getHTML=function(){
return this._HTML};CLp.getVisible=function(){
return this._ex?CT_getVis(this._lr):this._v};CLp.getWidth=function(){var t=this;if(t._ex&&(!ua.nn4||Undef(t._w)))t._w=CT_getWidth(t._lr);
return t._w};CLp.getHeight=function(){var t=this;if(t._ex&&(!ua.nn4||Undef(t._h)))t._h=CT_getHeight(t._lr);
return t._h};CLp.getSize=function(){
return[this.getWidth(),this.getHeight()]};CLp.getContentWidth=function(){
return this._ex?CT_getContentWidth(this._lr):this._w};CLp.getContentHeight=function(){
return this._ex?CT_getContentHeight(this._lr):this._h};CLp.getTop=function(){
return this._ex?CT_getTop(this._lr):this._t};CLp.getLeft=function(){
return this._ex?CT_getLeft(this._lr):this._l};CLp.getPos=function(){
return[this.getLeft(),this.getTop()]};CLp.getAbsoluteTop=function(){
return this._ex?CT_getAbsTop(this._lr):this._t};CLp.getAbsoluteLeft=function(){
return this._ex?CT_getAbsLeft(this._lr):this._l};CLp.getAbsolutePos=function(){
return[this.getAbsoluteLeft(),this.getAbsoluteTop()]};CLp.getID=function(){
return this._ex?this._lr.id||this._lr.name:this._id};CLp.getCSS=function(){
return this._ex?this._lr.className:this._css};CLp.remapEv=function(){var i,e=this._ev,ev=[];for(i=0;i<e.length;i++){ev[2*i]=e[i][0].substr(2);ev[2*i+1]=e[i][1]}
return ev};CLp.getSource=function(){var t=this;
return CT_lrSource(t._id,t._w,t._h,t._t||0,t._l||0,!t._rel,t._v,t._css,t._bgC,t._bgI,t._cl,t._ov,t._dsp,t._st,t._z,t._al,t.remapEv(),t._HTML)};CLp.create=function(p){var t=this;if(t._ex)
return;if(Def(CT_createLayer(t._id,t._w,t._h,t._t||0,t._l||0,!t._rel,t._v,t._css,t._bgC,t._bgI,t._cl,t._ov,t._dsp,t._st,t._z,t._al,t.remapEv(),t._HTML)))t.assignLayer()};}function CTimer(p,id,sig,oS,n,ps,bef,betw,aft){this._par=p;this._id=id;this._sig=sig;this._o=oS;this._n=n;this._ps=ps||100;this._scr=[bef,betw,aft]};{var CTp=CTimer.prototype;CTp.run=function(){if(Undef(this._o))
return;this._i=0;if(Def(this._scr[0]))eval(this._scr[0]);this._to=setTimeout(this+'.step()',this._ps)};CTp.step=function(){var t=this;if(t._o)t._o.onTimer();if(Def(t._scr[1]))eval(t._scr[1]);t._i++;if(t._i<t._n)t._to=setTimeout(t+'.step()',t._ps);else t.finish()};CTp.stop=function(){this.pause();this.finish()};CTp.pause=function(){clearTimeout(this._to);this._to=null};CTp.paused=function(){
return this._to==null};CTp.on=function(){this.step()};CTp.finish=function(){if(Def(this._scr[2]))eval(this._scr[2]);if(this._sig)this._par.sig_stop(this._id)};CTp.toString=function(){
return this._par.getObjPath(this._id)};}function CSlideAnimation(oPar,id,sig,aCL,aP,df,dt,bef,betw,aft){var i,dx,dy,n,t=this;t.base=CTimer;t._l=aCL;t._x=[];t._y=[];t._st_x=[];t._st_y=[];for(i=0;i<t._l.length;i++){t._x[i]=t._l[i].getLeft();t._y[i]=t._l[i].getTop();dx=aP[i][0]-t._x[i];dy=aP[i][1]-t._y[i];if(!i)n=Math.floor(Math.sqrt(dx*dx+dy*dy)/df);t._st_x[i]=dx/n;t._st_y[i]=dy/n}t.base(oPar,id,sig,t,n,dt,bef,betw,aft)};CSlideAnimation.prototype=new CTimer;CSlideAnimation.prototype.onTimer=function(){var i,t=this;for(i=0;i<t._l.length;i++){t._x[i]+=t._st_x[i];t._y[i]+=t._st_y[i];t._l[i].moveTo(Math.round(t._x[i]),Math.round(t._y[i]))}};function CClipAnimation(oPar,id,sig,oCL,aP,n,ps,bef,betw,aft){var i,t=this;t.base=CTimer;t._l=oCL;t._c=oCL.getClip();t._st=[];for(i=0;i<4;i++)t._st[i]=(aP[i]-t._c[i])/n;this.base(oPar,id,sig,t,n,ps,bef,betw,aft)};CClipAnimation.prototype=new CTimer;CClipAnimation.prototype.onTimer=function(){var i=0,c=this._c;for(;i<4;i++)c[i]+=this._st[i];this._l.clip(c[3],c[0],c[1]-c[3],c[2]-c[0])};function CAniCollection(id){var t=this;t._id=id;t._c=0;t._a=[];t.slideAni=CSlideAnimation;t.clipAni=CClipAnimation;t.SLIDE='slideAni';t.CLIP='clipAni'};{var CCp=CAniCollection.prototype;CCp.add=function(){var id='s'+this._c++,a=arguments;var o=new this[a[0]](this,id,a[1],a[2],a[3],a[4],a[5],a[6],a[7],a[8]);this._a[id]=o;
return id};CCp.remove=function(t_id){delete this._a[t_id]};CCp.run=function(t_id){if(Undef(this._a[t_id]))
return;this._a[t_id].run()};CCp.obj=function(t_id){
return this._a[t_id]};CCp.sig_stop=function(t_id){setTimeout(this._id+".remove('"+t_id+"')",1)};CCp.getObjPath=function(t_id){
return this._id+'._a.'+t_id};var CLp=CLayer.prototype;CLp.slide=function(x,y,st,tm,bef,betw,aft){var a=arguments;var s=CodeThat.Ani.add(CodeThat.Ani.SLIDE,true,[this],[[x,y]],st,tm,bef,betw,aft);CodeThat.Ani.run(s);
return s};CLp.slideRel=function(dx,dy,st,tm,bef,betw,aft){var a=arguments;var s=CodeThat.Ani.add(CodeThat.Ani.SLIDE,true,[this],[[this.getLeft()+dx,this.getTop()+dy]],st,tm,bef,betw,aft);CodeThat.Ani.run(s);
return s};CLp.clipSlide=function(l,t,r,b,n,tm,bef,betw,aft){var s=CodeThat.Ani.add(CodeThat.Ani.CLIP,true,this,[t,r,b,l],n,tm,bef,betw,aft);CodeThat.Ani.run(s);
return s};CLp.clipMove=function(l,t,n,tm,bef,betw,aft){var c=this.getClip();var dx=l-c[3],dy=t-c[0];var s=CodeThat.Ani.add(CodeThat.Ani.CLIP,true,this,[t,c[1]+dx,c[2]+dy,l],n,tm,bef,betw,aft);CodeThat.Ani.run(s);
return s};}CodeThat.Ani=new CAniCollection('CodeThat.Ani');

// CodeThatMenu STANDARD
// Version: 2.3.1 (12.09.04.1)
// Script is FREE for non commercial use.
// Copyright (c) 2003-04 by CodeThat.Com
// http://www.codethat.com/

var CT_IMG_BLANK=ro+"images/1x1.gif";function CT_pre(src){
return CodeThat.preload(src)};function CT_FALSE(){
return false};var CT_fnv=ua.old?CT_vis:CT_inhvis;function CT_copy(src,dest,menu,box){for(var i in src)if(Und(dest[i]))if(menu||!box||i!='bgcolor'&&i!='bgimg'&&i!='border'&&i!='shadow'&&i!='itemoffset'&&i!='opacity')dest[i]=src[i]};function CT_mnuLrSource(w,h,t,l,ox,oy,z,a,v,bgc,bgi,b,html,ev,al){var i=this._l.length,lw=w,lh=h;var st,lr=this._l[i]=[CodeThat.newID(),ox,oy,0];if(b){var bw=b.width;lr[3]=bw;if(ua.moz||ua.old||ua.css1cm){lw-=2*bw;if(lh)lh-=2*bw}if(!ua.nn4&&bw>0)st="border:"+bw+"px "+(b.style||'solid')+' '+b.color;else{html=CT_lrSource('s'+lr[0],lw,lh,bw,bw,1,1,'',bgc||this._p.style.bgcolor,bgi,'','','','',z+1,'','',html);lw=w;lh=h;bgc=b.color;bgi=''}}
return CT_lrSource(lr[0],lw,lh,t+oy,l+ox,a,v,'',bgc,bgi,'','','',st,z,al,ev,html)};function CT_Border(d,b,hor,w){var bw=b.width,bc=b.color;var def=d||{},bsrc='',sz=def.size||w;if(Def(d)){var i,tdw,tblw,tblh,atr,add,diff=sz;bw=pI(def.width||bw);bc=def.color||bc;tblw=hor?sz:bw;tblh=hor?bw:sz;atr=hor?' width=':' height=';add=hor?' height='+tblh:' width='+tblw;if(Def(def.el)){var elw,elm=def.el;for(i=0;i<elm.length;i++){elw=pI(elm[i].width);if(!isNaN(elw))diff-=elw}if(diff<0)diff=0;bsrc='<table cellpadding=0 cellspacing=0 border=0 width='+tblw+' height='+tblh+'>'+(hor?'<tr>':'');for(i=0;i<elm.length;i++){var imsrc='',bgimg='';if(!hor)bsrc+='<tr>';tdw=elm[i].width;imsrc=elm[i].src||CT_IMG_BLANK;if(Undef(tdw)){tdw=diff;bgimg=imsrc;imsrc=CT_IMG_BLANK}tdw=atr+tdw;bsrc+='<td'+tdw+(Def(bgimg)?' background="'+bgimg+'"':'')+(Def(elm[i].color)?' bgcolor="'+elm[i].color+'"':'')+add+'>'+'<img src="'+imsrc+'"'+tdw+add+'></td>';if(!hor)bsrc+='</tr>';}bsrc+=(hor?'</tr>':'')+'</table>'}}
return Def(d)||Def(bw)&&Und(d)?[bsrc,hor?sz:bw,bc,pI(def.offset||(hor?-bw:0)),hor?bw:sz]:null};function CMenu(def,id){var t=this;t.id=id;t.open=[];if(Undef(def))def={};if(Undef(def.type))def.type="bar";t.dd=def.type=="dropdown";if(Undef(def.style))def.style={};var o=def.style;o.box=pB(o.box,1);if(Und(o.bgcolor))o.bgcolor='white';o.z=o.z||1;if(Undef(def.position))def.position={};o=def.position;o.pos=o.pos||[0,0];o.pos[0]=pI(o.pos[0]);o.pos[1]=pI(o.pos[1]);o.anchor_side=o.anchor_side||"nw";t.menu=new CPopupMenu(def,t,null,t.id+".menu");t.timer=def.timer||1000;t.otime=def.otime||10;t.aclose=pB(def.autoclose,0);CT_IMG_BLANK=def.imgblank||CT_IMG_BLANK;CT_pre(CT_IMG_BLANK);_CT_menus.push(t)};{var CMp=CMenu.prototype;CMp.create=function(){this.menu.createTop()};CMp.handleEvent=function(e,s1,s2,src){if(!this._dis){var t=this;t.clearTimer();if(e=='i'){var o=t.open,l=o.length;if(Undef(s1))t.hide();else if(Undef(s2)||(l!=0&&o[l-1].id!=s2.id))t.hideAfter(s1);if(Def(s2))t.showTimer(s2);if(Def(src))src.over();}else if(e=='o'){t.setTimer();if(Def(src))src.out()}}};CMp.clearTimer=function(){if(Def(this._to))clearTimeout(this._to);this._to=''};CMp.setTimer=function(){if(this._to)
return;this._to=setTimeout(this.id+'.hide()',this.timer)};CMp.showTimer=function(m){if(this._to)
return;this._to=setTimeout(this.id+'.show('+m._path+')',this.otime)};CMp.show=function(path){var t=this;path.visible(1);t.open.push(path);t._to='';if(path.type=='popup'&&t.aclose)t.setTimer()};CMp.hide=function(){if(this.open.length>0)this.hideAfter({"id":''});this._to=''};CMp.hideAfter=function(path){var i,l,o;while((l=(o=this.open).length)>0&&o[l-1].id!=path.id){i=l-1;o[i].visible(0);this.open=o.slice(0,i)}};CMp.popupAt=function(x,y){this.menu.moveRel(x,y);this.popup()};CMp.popupEv=function(e){this.popupAt(e.x,e.y)};CMp.popup=function(){this.handleEvent('i',null,this.menu)};CMp.run=function(){this.menu.create();this.menu.moveLayers();if(this.menu.type!='popup')this.menu.visible(1);this._op=1;};}function CPopupMenu(def,p,p_lvl,path){var t=this;t.id=CodeThat.newID();if(Undef(def))def={};t._p=p;t._p_lvl=p_lvl;t._top=Undef(p_lvl);t._tid=t._p._tid||t._p.id;t.dd=p_lvl&&p_lvl.dd||p.dd;t._path=path;var o=t.style=t._top?def.style||{}:{};if(Def(o.box))o.box=pB(o.box,1);if(Def(o.itemoffset)){o.itemoffset.x=pI(o.itemoffset.x||0);o.itemoffset.y=pI(o.itemoffset.y||0)}if(Def(o.size)){o.size[0]=pI(o.size[0]);o.size[1]=pI(o.size[1])}if(Def(o.shadow))o.shadow.width=pI(o.shadow.width||5);if(Def(o.border))o.border.width=pI(o.border.width||1);t.itemover=t._top?def.itemover||{}:{};o=t.position=def.position||{};if(Def(o.pos)){o.pos[0]=pI(o.pos[0]);o.pos[1]=pI(o.pos[1])}else o.pos=[0,0];if(Def(o.menuoffset)){o.menuoffset.x=pI(o.menuoffset.x||0);o.menuoffset.y=pI(o.menuoffset.y||0)}if(t._top||t.dd){t.style.direction=t.style.direction||(t._top&&t.dd?"h":"v");o.anchor=o.anchor||(p_lvl&&p_lvl._p.dd?"sw":"ne")}t.separator=def.separator||{};t.defaction=def.defaction||{};if(!t._top){t.style.z=t.style.z||(p.style.z+5);CT_copy(p_lvl.style,t.style,1);CT_copy(p_lvl.itemover,t.itemover,1);CT_copy(p_lvl.position,t.position,1);CT_copy(p_lvl.defaction,t.defaction,1);}else{t.type=def.type;t.style.z=t.style.z||1;}t.createItems(def);t._l=[];};{var CPp=CPopupMenu.prototype;CPp.createTop=function(){var mw,mh,t=this,st=t.style;var p=t.position.pos,w=t.width(),h=t.height();if(st.box){mw=w;mh=h}else{mw=pI(st.fixwidth)||w;mh=pI(st.fixheight)||h}t.createLr(mw,mh,p[1],p[0],0,0,st.z,1,0)};CPp.createLr=function(w,h,t,l,ox,oy,z,a,v,bgc,bgi,html,ev,al){var i=this._l.length;var lr=this._l[i]=[CodeThat.newID(),ox,oy];var b=this.style.box;CT_createLayer(lr[0],w,h,t+oy,l+ox,a,v,'',bgc,bgi,'',b||ua.nn4?'hidden':'visible','','',z,al,ev,html);
return i};CPp.create=(typeof CodeThat.gets=='function'&&CodeThat.gets())?(function(){var t=this;var i,b=t.style.box;var p=t.position.pos,w=t.width(),h=t.height(),st=t.style,z=st.z;t.moveItems();var itsrc=t.itSrc();t._b=t.createLr(w,h,p[1],p[0],0,0,b?z+2:z,1,0,b?st.bgcolor:'',b?st.bgimg:'',ua.nn4?'':itsrc,['mouseover',t._tid+'.clearTimer()','mouseout',t._tid+'.setTimer()']);if(ua.nn4)dw(itsrc);var iw=w,ih=h,iox=0,ioy=0;if(t._top){var ln="";t.createLr(150,20,p[1],p[0],0,(b?h:-20),z+5,1,0,'','','<a href="http://'+ln+'" target="_blank">'+ln.fontcolor('#AAAAAA').fontsize(-2)+'</a>')}if(b){var j=st.shadow;if(j){t.createLr(j.width,h,p[1],p[0],w,j.width,z,1,0,j.color,'','','');t.createLr(w,j.width,p[1],p[0],j.width,h,z,1,0,j.color,'','','')}j=st.border;if(j){var bpr,bw=w;bpr=CT_Border(j.l,j,0,h);if(bpr){iox=-bpr[1];t.createLr(bpr[1],bpr[4],p[1],p[0],-bpr[1],bpr[3],z+1,1,0,bpr[2],'',bpr[0],'');bw+=bpr[1]}bpr=CT_Border(j.r,j,0,h);if(bpr){t.createLr(bpr[1],bpr[4],p[1],p[0],w,bpr[3],z+1,1,0,bpr[2],'',bpr[0],'');bw+=bpr[1]}bpr=CT_Border(j.t,j,1,bw);if(bpr){ioy=-bpr[4];t.createLr(bpr[1],bpr[4],p[1],p[0],bpr[3],-bpr[4],z+1,1,0,bpr[2],'',bpr[0],'');}bpr=CT_Border(j.b,j,1,bw);if(bpr){ih+=bpr[4];t.createLr(bpr[1],bpr[4],p[1],p[0],bpr[3],h,z+1,1,0,bpr[2],'',bpr[0],'')}iw=bw}}else{iox=t._fx1;ioy=t._fy1;iw=Math.max(iw,t._fx2-iox);ih=Math.max(ih,t._fy2-ioy)}t._iw=iw;t._ih=ih;if(ua.ie55up)t.createLr(iw,ih,p[1],p[0],iox,ioy,z-1,1,0,'','','<iframe frameborder=0 '+(location.protocol=='https:'?' src="/blank.html"':'')+' style="filter:Alpha(Opacity=0);visibility:inherit;position:absolute;top:0px;left:0px;height:100%;width:100%"></iframe>');for(i=t.items.length;i>0;)t.items[--i].createChild();t.created=1}):function(){
return};CPp.itSrc=function(){var i=0,src='',it=this.items;for(;i<it.length;)src+=it[i++].src();
return src};CPp.AbsPos=function(){var p;if(this._top)p=this.created?CT_getAbsPos(this._l[0][0]):this.position.pos;else p=this.position.pos||[0,0];
return[p[0],p[1]]};CPp.moveItems=function(mv){var i,ap,ix,iy,ox,oy,t=this;var dh=t.hor(),it=t.items,b=t.style.box,ioff=t.style.itemoffset;t._fx1=t._fy1=t._fx2=t._fy2=ox=oy=0;if(ua.nn4)ap=t.position.pos||[0,0];if(b){ix=0;iy=0}else iy=ix=0;if(Def(ioff)){ox=pI(ioff.x||0);oy=pI(ioff.y||0);if(b){ix+=ox;iy+=oy}}for(i=0;i<it.length;i++){var p,s=it[i].style.size;if(b||!it[i].Pos()){it[i].Pos([ix,iy]);if(dh)ix+=s[0]+ox;else iy+=s[1]+oy;}if(ua.nn4)it[i].moveRel(ap[0],ap[1]);if(!b){p=it[i].Pos();t._fx1=Math.min(t._fx1,p[0]);t._fy1=Math.min(t._fy1,p[1]);t._fx2=Math.max(t._fx2,p[0]+s[0]);t._fy2=Math.max(t._fy2,p[1]+s[1])}}};CPp.moveSubs=function(){var o,p=this.AbsPos(),i=this._top?1:0;for(;i<this._l.length;){o=this._l[i++];CT_moveTo(o[0],p[0]+o[1],p[1]+o[2])}};CPp.moveLayers=function(){this.moveSubs();if(ua.nn4)this.moveItems()};CPp.imVis=function(v){var i,it=this.items;for(i=0;i<it.length;i++)it[i].visible(v)};CPp.visible=function(v){var i,t=this;t.vis=v;if(v&&t._p.width)t._p.moveChild();for(i=0;i<t._l.length;i++)CT_vis(t._l[i][0],v);if(ua.old)t.imVis(v);if(t._p.setOver)t._p.setOver(v);};CPp.moveTo=function(x,y){var i,o,p=this.position;p.pos=[x,y];if(this._l.length>0){CT_moveTo(this._l[0][0],x,y);this.moveLayers()}};CPp.moveRel=function(x,y){var w,h,off,wp,t=this,p=t.position,a=p.anchor,as=p.anchor_side;if(t._p.width){w=t._p.width();h=t._p.height();if(a=='nw'||a=='sw'||a=='w'){}else if(a=='ne'||a=='se'||a=='e')x+=w;if(a=='nw'||a=='ne'||a=='n'){}else if(a=='sw'||a=='se'||a=='s')y+=h;if(a=='n'||a=='s')x=Math.ceil(x+w/2);if(a=='e'||a=='w')y=Math.ceil(y+h/2);}w=t.width(),h=t.height();if(as=='nw'||as=='sw'||as=='w'){}else if(as=='ne'||as=='se'||as=='e')x-=w;if(as=='nw'||as=='ne'||as=='n'){}else if(as=='sw'||as=='se'||as=='s')y-=h;if(as=='n'||as=='s')x-=Math.floor(w/2);if(as=='e'||as=='w')y-=Math.floor(h/2);if(Def(off=p.menuoffset)){x+=off.x;y+=off.y}wp=CodeThat.getScrollX()+CodeThat.getWinWidth()-t._iw;if(x>wp)x=wp;if(x<0)x=0;wp=CodeThat.getScrollY()+CodeThat.getWinHeight()-t._ih;if(y>wp)y=wp;if(y<0)y=0;t.moveTo(x,y)};CPp.hor=function(){
return this.style.direction=='h'};CPp.width=function(c){var i,obj,h,r=0,ix=0,t=this,it=t.items;if(t.style.box)if(!Und(t._b)&&!c)r=CT_getWidth(t._l[t._b][0]);else{h=t.hor();if(Def(obj=t.style.itemoffset))ix=obj.x;for(i=0;i<it.length;i++){var iw=it[i].style.size[0];r=h?r+iw+ix:Math.max(r,iw)}r+=(h?1:2)*ix;}else r=it[0].style.size[0];
return r};CPp.height=function(c){var i,h,obj,r=0,iy=0,t=this,it=t.items;if(t.style.box)if(!Und(t._b)&&!c)r=CT_getHeight(t._l[t._b][0]);else{h=t.hor();if(Def(obj=t.style.itemoffset))iy=obj.y;for(i=0;i<it.length;i++){var ih=it[i].style.size[1];r=h?Math.max(r,ih):r+ih+iy}r+=(h?2:1)*iy;}else r=it[0].style.size[1];
return r};CPp.createItems=function(def){this.items=[];var i,it=def.items;if(Und(it))
return;if(Und(it.length)&&Def(it.item))it=it.item;if(Und(it.length))it=[it];for(i=0;i<it.length;i++)this.addItem(it[i]);};CPp.addItem=function(def){var it=this.items,itm=new CMenuItem(def,this,this._path+".items["+it.length+"]");it.push(itm);
return itm};}function CMenuItem(def,p,path){this._p=p;this._tid=p._tid;this._path=path;if(Def(def)&&def.type=='separator'){def=p.separator;def.type='separator';}this.initDef(def);this._l=[];};{var CMp=CMenuItem.prototype;CMp.lrSrc=CT_mnuLrSource;CMp.initDef=function(def){var t=this;if(Undef(def))def={};t.text=def.text;t.textover=def.textover;var o=t.style=def.style||{};if(Def(o.size)){o.size[0]=pI(o.size[0]);o.size[1]=pI(o.size[1])}if(Def(o.shadow))o.shadow.width=pI(o.shadow.width||5);if(Def(o.border))o.border.width=pI(o.border.width||1);o.z=o.z||(t._p.style.z+5);t.styleover=def.styleover||{};CT_copy(t._p.style,t.style,0,t._p.style.box);CT_copy(t._p.itemover,t.styleover,0);if(def.menu&&t._path.split('.').length<7)t.menu=new CPopupMenu(def.menu,t,t._p,t.child());else t.menu=null;t.action=def.action||{};CT_copy(t._p.defaction,t.action,0);var o=t.position=def.position||{};if(Def(o.pos)){o.pos[0]=pI(o.pos[0]);o.pos[1]=pI(o.pos[1])}t.type=def.type;t.sep=def.type=='separator';};CMp.src=function(){var t=this,src='';var p=t.Pos()||[0,0],st=t.style,s=st.size,_z=st.z,vis=!ua.nn4||t._p.vis,m_o=t.sep||t.frm;var w=s[0],h=s[1],x=p[0],y=p[1],ox=0,oy=0;var act=t.action,js=act.js,url=act.url,target=act.target;var anch=!m_o&&(js||url);var p_p=t._p._path;if(anch){src+='<a href="'+(url||'#')+(target?'" target="'+target:'')+'" onClick="'+(ua.nn4?'':'this.blur();')+t._tid+'.hide();'+(js?js:url?'':'return false')+'" title="'+(act.title||'')+'">'}if(!m_o){t._imid=CodeThat.newID();src=t.lrSrc(w,h,y,x,0,0,_z+5,1,vis,'','','',src+'<img border=0 '+(ua.nn4?'name=':'id=')+t._imid+' src="'+CT_IMG_BLANK+'" width='+w+' height='+s[1]+'>'+(anch?'</a>':''),['mouseover',t._tid+".handleEvent('i',"+p_p+(!m_o?","+t.child()+","+t._path:'')+");CodeThat.cancelEvent(event)",'mouseout',t._tid+".handleEvent('o',"+p_p+",null"+(!m_o?","+t._path:'')+");CodeThat.cancelEvent(event)"])}var bg=st.bgimg,bgc=st.bgcolor,brd=st.border;src+=t.lrSrc(w,h,y,x,ox,oy,_z+2,1,vis,bgc,bg,brd,t.sep?'':t.gHTML(0));if(!m_o)src+=t.lrSrc(w,h,y,x,ox,oy,_z+4,1,0,t.styleover.bgcolor||bgc,t.styleover.bgimg||bg,t.styleover.border||brd,t.gHTML(1));var v=st.shadow;if(v)src+=t.lrSrc(w,h,y,x,v.width,v.width,_z,1,vis,v.color);
return src};CMp.gHTML=function(n){var t=this;var sto,st=t.style;var im,ei,sub_ei,brd=st.border,w=st.size[0],h=st.size[1],txt=t.text;sub_ei=ei=st.imgendoff;if(t.menu)im=st.imgdir;else{im=st.imgitem;ei=st.imgitemend;if(sub_ei&&!ei)ei={src:CT_IMG_BLANK,width:sub_ei.width,height:sub_ei.height}}var al=st.align,css=st.css,tcol=st.color;if(n==0)
return t.mkHTML(w,h,tcol,css,al,t.text,im,ei,brd);if(n==1){txt=t.textover||txt;sto=t.styleover;if(t.menu){im=sto.imgdir||st.imgdiropen||im;ei=st.imgendon||ei}else{im=sto.imgitem||im;ei=sto.imgitemend||ei}}
return t.mkHTML(w,h,sto.color||tcol,sto.css||css,sto.align||al,txt,im,ei,sto.border||brd)};CMp.apply=function(){if(this._p.created)this.fillLr()};CMp.fillLr=function(){var t=this;CT_HTML(t._l[1][0],t.gHTML(0));if(!t.sep)CT_HTML(t._l[2][0],t.gHTML(1))};CMp.mkHTML=function(lw,lh,fn,css,al,txt,img,ei,b){var spc,iw,ih,w,isrc='',src='';if(txt||Def(img)||Def(ei)){src='<table border=0 cellpadding=0 cellspacing=0 width=100%><tr>';if(b){lw-=2*b.width;lh-=2*b.width;}if(img){spc=img.space||this.style.imgspace;spc=pI(spc||0);iw=pI(img.width);ih=pI(img.height);w=iw+spc*2;lw-=w;src+='<td width='+w+' height='+ih+'><img src="'+img.src+'" width='+iw+' height='+ih+' hspace='+spc+' border=0></td>'}if(ei){spc=ei.space||this.style.imgspace;spc=pI(spc||0);iw=pI(ei.width);ih=pI(ei.height);w=iw+spc*2;lw-=w;isrc='<td width='+w+' height='+ih+' align=right><img src="'+ei.src+'" width='+iw+' height='+ih+' hspace='+spc+' border=0></td>'}if(txt)src+='<td'+(al?' align='+al:'')+' height="'+lh+'" width="'+lw+'"><div'+(css?' class="'+css+'"':'')+'>'+(fn?'<font color='+fn+'>'+txt+'</font>':txt)+'</div></td>';src+=isrc+'</tr></table>';}
return src};CMp.createChild=function(){if(this.menu)this.menu.create()};CMp.child=function(){
return this._path+".menu"};CMp.visible=function(v){var i,t=this;if(t._l.length){for(i=0;i<t._l.length;)CT_fnv(t._l[i++][0],v);if(t._l[2])CT_hide(t._l[2][0]);}};CMp.Pos=function(p){
return Def(p)?this.position.pos=p:this.position.pos};CMp.Type=function(){
return this.type};CMp.AbsPos=function(){var pos=this._p.AbsPos();pos[0]+=this.Pos()[0];pos[1]+=this.Pos()[1];
return pos};CMp.width=function(){
return this.style.size[0]};CMp.height=function(){
return this.style.size[1]};CMp.moveChild=function(){if(this.menu){var ap=this.AbsPos();this.menu.moveRel(ap[0],ap[1])}};CMp.moveRel=function(x,y){var i=0,l=this._l,p=this.Pos();for(;i<l.length;i++)CT_moveTo(l[i][0],x+p[0]+l[i][1],y+p[1]+l[i][2])};CMp.over=function(){var t=this;CT_fnv(t._l[2][0],1);CT_hide(t._l[1][0]);var scr=t.action.over;if(Def(scr))eval(scr);};CMp.out=function(){if(!this.menu||!this._over){this.setBool(1);var scr=this.action.out;if(Def(scr))eval(scr)}};CMp.setOver=function(v){this._over=v;this.setBool(!v)};CMp.setBool=function(v){var t=this;if(v){CT_hide(t._l[2][0]);if(!ua.old||t._p.vis){CT_fnv(t._l[1][0],1)}}};}var _CT_menus=[];function CT_m_load(){CodeThat.setOnResize(CT_m_res,1)};function CT_m_res(){if(ua.old){if(Undef(window._CT_reloading)){window._CT_reloading=1;location.reload(1)}}};CodeThat.setOnLoad(function(){CodeThat.loaded=1});if(ua.oldOpera)CodeThat.setOnLoad(CT_m_load);else CodeThat.setOnResize(CT_m_res);

//--------------------------------------------------------------------
//menus and their positions by x
var menu_coords = {"popup1":15, "popup2":115, "popup3":215, "popup4":315, "popup5":415, "popup6":515, "popup7":615, "popup8":715, "popup9":815, "popup10":915};

function menu_act (name, mode)
{
    var fr = top.frames.cont; //get the lower frame object
    if (name && (!fr || !fr[name] || !fr[name]._op)) return;
    if (mode == 1) {
        var x = fr.CodeThat.getScrollX() + menu_coords[name];
        var y = fr.CodeThat.getScrollY() + 1;
        for (var i in menu_coords)
            {fr[i].clearTimer();fr[i].hide();}
        fr[name].popupAt(x,y)
    }
    else if (!mode) {fr[name].clearTimer();fr[name].setTimer();}
}

var Sep = {"bgcolor":"black","size":[130,1]};

var MenuDef = {
    "style"    : {"css":"box","align":"middle","bgcolor":"#CCCCCC","size":[100,25],"border":{"color":"black","width":1},"direction":"h"},
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "position" : {"absolute":true,"pos":[15, 0]},
    "items" : [
        {"text":"General",  "action":{"over":"menu_act('popup1',1)","out":"menu_act('popup1',0)"}},
        {"text":"Riesel Data",  "action":{"over":"menu_act('popup2',1)","out":"menu_act('popup2',0)"}},
        {"text":"Proth Data",   "action":{"over":"menu_act('popup3',1)","out":"menu_act('popup3',0)"}},
        {"text":"RPS",      "action":{"over":"menu_act('popup4',1)","out":"menu_act('popup4',0)"}},
        {"text":"NPLB",     "action":{"over":"menu_act('popup5',1)","out":"menu_act('popup5',0)"}},
        {"text":"Free-DC",  "action":{"over":"menu_act('popup6',1)","out":"menu_act('popup6',0)"}},
        {"text":"Other Projects","action":{"over":"menu_act('popup7',1)","out":"menu_act('popup7',0)"}},
        {"text":"Related",  "action":{"over":"menu_act('popup8',1)","out":"menu_act('popup8',0)"}},
        {"text":"Aliquot Seq.", "action":{"over":"menu_act('popup9',1)","out":"menu_act('popup9',0)"}},
        {"text":"Interests",    "action":{"over":"menu_act('popup10',1)","out":"menu_act('popup10',0)"}}
        ]
};

//--------------------------------------------------------------------

// Submenu definitions

var style = {
    "css"       : "box",
    "align"     : "center",
    "bgcolor"   : "#CCCCCC",
    "size"      : [150, 25],
    "shadow"    : {"color":"#AAAAAA","width":5},
    "border"    : {"color":"black","width":1},
    "imgendon"  : {"src":ro+"images/ad.gif","width":16,"height":16},
    "imgendoff" : {"src":ro+"images/ar.gif","width":16,"height":16},
    "imgspace"  : 1,
    "direction" : "v"
};

var Popup1 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "items"    : [
        {"text":"Home",        "action":{"url":ro+"Home.htm","target":"cont"}},
        {"text":"History","menu" : {
            "items" : [{"text":"Changes","action":{"url":ro+"History.htm","target":"cont"}},
                   {"text":"1st Page 2007","action":{"url":ro+"Data/FirstVersion2007.htm","target":"cont"}},
                   {"text":"Mersenne Thread","action":{"url":"http://www.mersenneforum.org/showthread.php?t=7811","target":"_blank"}}
                  ]}},
        {"text":"Definitions", "action":{"url":ro+"Data/Defs.htm","target":"cont"}},
        {"text":"Downloads",   "action":{"url":ro+"Downloads.htm","target":"cont"}},
        {"text":"ToDo",        "action":{"url":ro+"ToDo.htm","target":"cont"}},
        {"text":"Missing Info","action":{"url":ro+"MissingInfo.htm","target":"cont"}},
        {"text":"Glossary",    "action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"More...",     "menu" : {
            "items" : [{"text" : "...", "action" : {"url" : ro+"NN.htm"}},
                   {"text" : "..", "action" : {"url" : ro+"NN.htm"}}
                  ]}
        }]
};

var Popup2 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "separator": {"style":{"src":ro+"images/horline.gif","size":[150, 2],"bgcolor":"black"}},
    "items"    : [
        {"text":"<i> k </i> &lt; 300","action":{"url":ro+"Data/00001.htm","target":"cont"}},
        {"text":"300 &lt; <i>k</i> &lt; 2000","action":{"url":ro+"Data/00300.htm","target":"cont"}},
        {"text":"2000 &lt; <i>k</i> &lt; 4000","action":{"url":ro+"Data/02000.htm","target":"cont"}},
        {"text":"4000 &lt; <i>k</i> &lt; 6000","action":{"url":ro+"Data/04000.htm","target":"cont"}},
        {"text":"6000 &lt; <i>k</i> &lt; 8000","action":{"url":ro+"Data/06000.htm","target":"cont"}},
        {"text":"8000 &lt; <i>k</i> &lt; 10000","action":{"url":ro+"Data/08000.htm","target":"cont"}},
        {"text":"10<sup>4</sup> &lt; <i>k</i> &lt; 10<sup>5</sup>","action":{"url":ro+"Data/10e04.htm","target":"cont"}},
        {"text":"10<sup>5</sup> &lt; <i>k</i> &lt; 10<sup>6</sup>","action":{"url":ro+"Data/10e05.htm","target":"cont"}},
        {"text":"10<sup>6</sup> &lt; <i>k</i> &lt; 10<sup>7</sup>","action":{"url":ro+"Data/10e06.htm","target":"cont"}},
        {"text":"10<sup>7</sup> &lt; <i>k</i> &lt; 10<sup>8</sup>","action":{"url":ro+"Data/10e07.htm","target":"cont"}},
        {"text":"10<sup>8</sup> &lt; <i>k</i> &lt; 10<sup>9</sup>","action":{"url":ro+"Data/10e08.htm","target":"cont"}},
        {"text":"10<sup>9</sup> &lt; <i>k</i> &lt; 10<sup>10</sup>","action":{"url":ro+"Data/10e09.htm","target":"cont"}},
        {"text":"10<sup>10</sup> &lt; <i>k</i> &lt; Infin.","action":{"url":ro+"Data/10e10.htm","target":"cont"}},
        {"type":"separator"},
        {"text":"Condensed<br>10000 &lt; <i>k</i> &lt; 100000","style":{"size":[150,50]}, "action":{"url":ro+"Data/10e04a.txt", "target":"_blank"}},
        {"text":"Statistics","action":{"url":ro+"Data/Statistics.htm","target":"cont"}},
        {"text":"Constant-<i>n</i> search","action":{"url":ro+"Data/Constant_n.htm","target":"cont"}}
        ]
};

var Popup3 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "separator": {"style":{"src":ro+"images/horline.gif","size":[150, 2],"bgcolor":"black"}},
    "items"    : [
        {"text":"<i> k </i> &lt; 300","action":{"url":ro+"Data/P00001.htm","target":"cont"}},
        {"text":"300 &lt; <i>k</i> &lt; 2000","action":{"url":ro+"Data/P00300.htm","target":"cont"}},
        {"text":"2000 &lt; <i>k</i> &lt; 4000","action":{"url":ro+"Data/P02000.htm","target":"cont"}},
        {"text":"4000 &lt; <i>k</i> &lt; 6000","action":{"url":ro+"Data/P04000.htm","target":"cont"}},
        {"text":"6000 &lt; <i>k</i> &lt; 8000","action":{"url":ro+"Data/P06000.htm","target":"cont"}},
        {"text":"8000 &lt; <i>k</i> &lt; 10000","action":{"url":ro+"Data/P08000.htm","target":"cont"}},
//      {"text":"10<sup>4</sup> &lt; <i>k</i> &lt; 10<sup>5</sup>","action":{"url":ro+"Data/10e04.htm","target":"cont"}},
//      {"text":"10<sup>5</sup> &lt; <i>k</i> &lt; 10<sup>6</sup>","action":{"url":ro+"Data/10e05.htm","target":"cont"}},
//      {"text":"10<sup>6</sup> &lt; <i>k</i> &lt; 10<sup>7</sup>","action":{"url":ro+"Data/10e06.htm","target":"cont"}},
//      {"text":"10<sup>7</sup> &lt; <i>k</i> &lt; 10<sup>8</sup>","action":{"url":ro+"Data/10e07.htm","target":"cont"}},
//      {"text":"10<sup>8</sup> &lt; <i>k</i> &lt; 10<sup>9</sup>","action":{"url":ro+"Data/10e08.htm","target":"cont"}},
//      {"text":"10<sup>9</sup> &lt; <i>k</i> &lt; 10<sup>10</sup>","action":{"url":ro+"Data/10e09.htm","target":"cont"}},
//      {"text":"10<sup>10</sup> &lt; <i>k</i> &lt; Infin.","action":{"url":ro+"Data/10e10.htm","target":"cont"}},
        {"type":"separator"},
        {"text":"Statistics","action":{"url":ro+"Data/PStatistics.htm","target":"cont"}},
        {"type":"separator"},
        {"text":"Status <i>k</i> &lt; 50","action":{"url":ro+"Data/PRanges50.htm","target":"cont"}},
        {"text":"Status <i>k</i> &lt; 300","action":{"url":ro+"Data/PRanges300.htm","target":"cont"}},
        {"text":"Status 300 &lt;<i>k</i>&lt; 1200","action":{"url":ro+"Data/PRanges1200.htm","target":"cont"}}
//      {"text":"Constant-<i>n</i> search","action":{"url":ro+"Data/Constant_n.htm","target":"cont"}}
        ]
};

var Popup4 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "items"    : [
        {"text":"Overview","action":{"url":ro+"RPS/Overview.htm","target":"cont"}},
        {"text":"Statistics","action":{"url":ro+"RPS/Statistics.htm","target":"cont"}},
        {"text":"Drives","menu" : {
            "items" : [{"text":"Overview","action":{"url":ro+"RPS/Drives/RPS_Drives.htm","target":"cont"}},
                       {"text":"Drive #1 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Drives/RPS_Drive1.htm","target":"cont"}},
                   {"text":"Drive #2 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Drives/RPS_Drive2.htm","target":"cont"}},
                   {"text":"Drive #3 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Drives/RPS_Drive3.htm","target":"cont"}},
                   {"text":"Drive #4 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Drives/RPS_Drive4.htm","target":"cont"}},
                   {"text":"Drive #5 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Drives/RPS_Drive5.htm","target":"cont"}},
                   {"text":"Drive #6 - 65.25%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_Drive6.htm","target":"cont"}},
                   {"text":"Drive #7 - ?%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_Drive7.htm","target":"cont"}},
                   {"text":"Drive #8 - 55.40%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_Drive8.htm","target":"cont"}},
                   {"text":"Drive #9 - 99.33%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_Drive9.htm","target":"cont"}},
                   {"text":"Drive #10 - 41.69%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_Drive10.htm","target":"cont"}},
                   {"text":"Drive #11 - .%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_Drive11.htm","target":"cont"}},
                   {"text":"MBitDrive #1 - ?%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_MBDrive1.htm","target":"cont"}},
                   {"text":"MBitDrive #2 - 22%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Drives/RPS_MBDrive2.htm","target":"cont"}}
                  ]}},
        {"text":"<i>k</i>-Efforts","menu" : {
            "items" : [{"text":"<i>k</i> = 5 - 62.04%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Efforts/k5.htm","target":"cont"}},
                   {"text":"<i>k</i> = 15 - 58.20%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Efforts/k15.htm","target":"cont"}},
                   {"text":"<i>k</i> = 17 - 67.80%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Efforts/k17.htm","target":"cont"}},
                   {"text":"<i>k</i> = 65 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Efforts/k65.htm","target":"cont"}},
                   {"text":"<i>k</i> = 105 - 48.38%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"RPS/Efforts/k105.htm","target":"cont"}},
                   {"text":"<i>k</i> = 125 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Efforts/k125.htm","target":"cont"}},
                   {"text":"9 <i>k</i>'s - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"RPS/Efforts/9ks.htm","target":"cont"}},
                   {"text":"...","action":{"url":ro+"NN.htm","target":"cont"}}
                  ]}},
        {"text":"...","action":{"url":ro+"NN.htm","target":"cont"}}
        ]
};

var Popup5 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "items"    : [
        {"text":"Overview","action":{"url":ro+"NPLB/Overview.htm","target":"cont"}},
        {"text":"All Drives","action":{"url":ro+"NPLB/Drives/NPLB_DrivesSum.htm","target":"cont"}},
        {"text":"Drives","menu" : {
            "items" : [{"text":"Drive #1 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive1.htm","target":"cont"}},
                {"text":"Drive #2 - Done","style":{"bgcolor":"#00CC00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive2.htm","target":"cont"}},
                {"text":"Drive #3 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive3.htm","target":"cont"}},
                {"text":"Drive #4","action":{"url":ro+"NN.htm","target":"cont"}},
                {"text":"Drive #5 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive5.htm","target":"cont"}},
                {"text":"Drive #6 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive6.htm","target":"cont"}},
                {"text":"Drive #7 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive7.htm","target":"cont"}},
                {"text":"Drive #8 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive8.htm","target":"cont"}},
                {"text":"Drive #9","style":{"bgcolor":"#00cc00"},"menu" : {
                    "items" : [{"text":"Section A - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive9A.htm","target":"cont"}},
                        {"text":"Section B - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive9B.htm","target":"cont"}},
                        {"text":"Section C - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive9C.htm","target":"cont"}},
                        {"text":"Section D - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive9D.htm","target":"cont"}}
                    ]}},
                {"text":"Drive #10 - 32.60%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive10.htm","target":"cont"}},
                {"text":"Drive #11 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive11.htm","target":"cont"}},
                {"text":"Drive #12 - Done","style":{"bgcolor":"#00cc00"},"menu" : {
                    "items" : [{"text":"Section A - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive12A.htm","target":"cont"}},
                        {"text":"Section B - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive12B.htm","target":"cont"}},
                        {"text":"Section C - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive12C.htm","target":"cont"}}
                    ]}},
                {"text":"Drive #13 - .%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive13.htm","target":"cont"}},
                {"text":"Drive #14 - .%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"NPLB/Drives/NPLB_Drive14.htm","target":"cont"}}
                  ]}},
        {"text":"Mini-Drives","menu" : {
            "items" : [{"text":"Mini #1 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_MiniDrive1.htm","target":"cont"}},
                {"text":"Mini #2 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_MiniDrive2.htm","target":"cont"}},
                {"text":"Mini #3 - 38.80%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"NPLB/Drives/NPLB_MiniDrive3.htm","target":"cont"}},
                {"text":"Mini #4 - Done","style":{"bgcolor":"#00cc00"},"action":{"url":ro+"NPLB/Drives/NPLB_MiniDrive4.htm","target":"cont"}},
                {"text":"Mini #5 - %","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"NPLB/Drives/NPLB_MiniDrive5.htm","target":"cont"}},
                {"text":"Maxi #1 - ?%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"NPLB/Drives/NPLB_MaxiDrive1.htm","target":"cont"}}
                  ]}},
        {"text":"Races","menu" : {
            "items" : [{"text":"Overview","action":{"url":ro+"NPLB/Races/RaceOverview.htm","target":"cont"}},
                {"text":"Race #1","action":{"url":ro+"NPLB/Races/Race20080209.htm","target":"cont"}},
                {"text":"Race #2","action":{"url":ro+"NPLB/Races/Race20080308.htm","target":"cont"}},
                {"text":"Race #3","action":{"url":ro+"NPLB/Races/Race20080503.htm","target":"cont"}},
                {"text":"Race #4","action":{"url":ro+"NPLB/Races/Race20080523.htm","target":"cont"}},
                {"text":"Race #5","action":{"url":ro+"NPLB/Races/Race20080620.htm","target":"cont"}},
                {"text":"Race #6","action":{"url":ro+"NPLB/Races/Race20080808.htm","target":"cont"}},
                {"text":"Race #7","action":{"url":ro+"NPLB/Races/Race20080905.htm","target":"cont"}},
                {"text":"Race #8","action":{"url":ro+"NPLB/Races/Race20081121.htm","target":"cont"}},
                {"text":"Race #9","action":{"url":ro+"NPLB/Races/Race20090123.htm","target":"cont"}}
                  ]}},
        {"text":"Efforts","menu" : {
            "items" : [{"text":"Individual <i>k</i>","action":{"url":ro+"NPLB/Efforts/Individual-k.htm","target":"cont"}},
                   {"text":"Double Checks","action":{"url":ro+"NPLB/Efforts/Doublechecks.htm","target":"cont"}}
                  ]}},
        {"text":"...","action":{"url":ro+"NN.htm","target":"cont"}}
        ]
};

var Popup6 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "items"    : [
        {"text":"Overview","action":{"url":ro+"FreeDC/Overview.htm","target":"cont"}},
        {"text":"Drives","menu" : {
            "items" : [{"text":"Drive #1 - ?%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"FreeDC/Drives/FreeDC_Drive1.htm","target":"cont"}},
                {"text":"Drive #2 - ?%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"FreeDC/Drives/FreeDC_Drive2.htm","target":"cont"}},
                {"text":"Drive #3 - ?%","style":{"bgcolor":"#FF9900"},"action":{"url":ro+"FreeDC/Drives/FreeDC_Drive3.htm","target":"cont"}}
                  ]}},
        {"text":"Races","menu" : {
            "items" : [{"text":"Overview","action":{"url":ro+"NN.htm","target":"cont"}},
                {"text":"Race #1","action":{"url":ro+"NN.htm","target":"cont"}}
                  ]}},
        {"text":"...","action":{"url":ro+"NN.htm","target":"cont"}}
        ]
};

var Popup7 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover"},
    "items"    : [
        {"text":"GIMPS","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"PrimeGrid","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"RieselSieve","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"15<i>k</i>","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"321Search","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"2721","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"12121","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"PrimeSearch","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"...","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"TPS","action":{"url":ro+"Others/TPSProject.htm","target":"cont"}}
        ]
};

var Popup8 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover","action":"status()"},
    "items"    : [
        {"text":"(Near)Woodall","action":{"url":ro+"Related/Woodall.htm","target":"cont"}},
        {"text":"Riesel","action":{"url":ro+"Related/Riesel.htm","target":"cont"}},
        {"text":"even Riesel","action":{"url":ro+"Related/EvenRiesel.htm","target":"cont"}},
        {"text":"Riesel Twin/SG","action":{"url":ro+"Related/RieselTwinSG.htm","target":"cont"}},
        {"text":"Liskovets/Gallot","action":{"url":ro+"Related/LiskovetsGallot.htm","target":"cont"}},
        {"text":"First P-Prime <i>k</i>","action":{"url":ro+"Related/FirstKPrimeProth.htm","target":"cont"}},
        {"text":"First R-Prime <i>k</i>","action":{"url":ro+"Related/FirstKPrime.htm","target":"cont"}},
        {"text":"First Twin <i>k</i>","action":{"url":ro+"Related/FirstKTwin.htm","target":"cont"}},
        {"text":"First SG <i>k</i>","action":{"url":ro+"Related/FirstSG.htm","target":"cont"}},
        {"text":"Riesel-Payam","action":{"url":ro+"Related/RieselPayam.htm","target":"cont"}},
        {"text":"...","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"PRPnet / LLRnet servers","style":{"size":[150,50]}, "action":{"url":ro+"Related/PublicServers.htm","target":"cont"}}
        ]
};

var Popup9 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover","action":"status()"},
    "items"    : [
        {"text":"Introduction","action":{"url":ro+"Others/AliquotIntro.htm","target":"cont"}},
        {"text":"Statistics","action":{"url":ro+"Others/AliquotStatistics.htm","target":"cont"}},
        {"text":"Records","action":{"url":ro+"Others/AliquotRecords.htm","target":"cont"}},
        {"text":"Table 000k","action":{"url":ro+"Others/Aliquot000.htm","target":"cont"}},
        {"text":"Table 100k","action":{"url":ro+"Others/Aliquot100.htm","target":"cont"}},
        {"text":"Table 200k","action":{"url":ro+"Others/Aliquot200.htm","target":"cont"}},
        {"text":"Table 300k","action":{"url":ro+"Others/Aliquot300.htm","target":"cont"}},
        {"text":"Table 400k","action":{"url":ro+"Others/Aliquot400.htm","target":"cont"}},
        {"text":"Table 500k","action":{"url":ro+"Others/Aliquot500.htm","target":"cont"}},
        {"text":"Table 600k","action":{"url":ro+"Others/Aliquot600.htm","target":"cont"}},
        {"text":"Table 700k","action":{"url":ro+"Others/Aliquot700.htm","target":"cont"}},
        {"text":"Table 800k","action":{"url":ro+"Others/Aliquot800.htm","target":"cont"}},
        {"text":"Table 900k","action":{"url":ro+"Others/Aliquot900.htm","target":"cont"}},
        {"text":"Table Others","action":{"url":ro+"Others/AliquotXXX.htm","target":"cont"}},
        {"text":"...","action":{"url":ro+"NN.htm","target":"cont"}},
        {"text":"All Open","action":{"url":ro+"Others/Aliquot01.htm","target":"cont"}}
        ]
};

var Popup10 = {
    "type"     : "popup",
    "style"    : style,
    "itemover" : {"bgcolor":"#DDDDDD","css":"boxover","action":"status()"},
    "items"    : [
        {"text":"Home Prime<br>Overview","style":{"size":[150,50]},"action":{"url":ro+"Others/HomePrime0.htm","target":"cont"}},
        {"text":"Home Prime Base 2","action":{"url":ro+"Others/HomePrime2.htm","target":"cont"}},
        {"text":"Home Prime Base 3","action":{"url":ro+"Others/HomePrime3.htm","target":"cont"}},
        {"text":"Home Prime Base 4","action":{"url":ro+"Others/HomePrime4.htm","target":"cont"}},
        {"text":"Home Prime Base 5","action":{"url":ro+"Others/HomePrime5.htm","target":"cont"}},
        {"text":"Home Prime Base 6","action":{"url":ro+"Others/HomePrime6.htm","target":"cont"}},
        {"text":"Home Prime Base 7","action":{"url":ro+"Others/HomePrime7.htm","target":"cont"}},
        {"text":"Home Prime Base 8","action":{"url":ro+"Others/HomePrime8.htm","target":"cont"}},
        {"text":"Home Prime Base 9","action":{"url":ro+"Others/HomePrime9.htm","target":"cont"}},
        {"text":"Home Prime Base 10","action":{"url":ro+"Others/HomePrime10.htm","target":"cont"}},
        {"text":"Inverse Home<br>Prime Base 8","style":{"size":[150,50]}, "action":{"url":ro+"Others/InverseHomePrime8.htm","target":"cont"}},
        {"text":"Euclid-Mullin seq.","action":{"url":ro+"Others/EuclidMullin.htm","target":"cont"}},
        {"text":"CRUS Table","action":{"url":ro+"Others/CRUS_tab.htm","target":"cont"}},
        {"text":"General. Fermat","action":{"url":ro+"Others/GeneralizedFermat.htm","target":"cont"}},
        {"text":"Primes k*b^b+1","action":{"url":ro+"Others/kbbp.htm","target":"cont"}},
        {"text":"Primes k*b^b-1","action":{"url":ro+"Others/kbbm.htm","target":"cont"}},
        {"text":"Smarandache Types","action":{"url":ro+"Others/Smarandache.htm","target":"cont"}},
        {"text":"OEIS A057207","action":{"url":ro+"Others/A057207.htm","target":"cont"}}
    ]
};


//--------------------------------------------------------------------

var popup1 = new CMenu( Popup1, 'popup1' );
var popup2 = new CMenu( Popup2, 'popup2' );
var popup3 = new CMenu( Popup3, 'popup3' );
var popup4 = new CMenu( Popup4, 'popup4' );
var popup5 = new CMenu( Popup5, 'popup5' );
var popup6 = new CMenu( Popup6, 'popup6' );
var popup7 = new CMenu( Popup7, 'popup7' );
var popup8 = new CMenu( Popup8, 'popup8' );
var popup9 = new CMenu( Popup9, 'popup9' );
var popup10 = new CMenu( Popup10, 'popup10' );
popup1.create();
popup2.create();
popup3.create();
popup4.create();
popup5.create();
popup6.create();
popup7.create();
popup8.create();
popup9.create();
popup10.create();
popup1.run();
popup2.run();
popup3.run();
popup4.run();
popup5.run();
popup6.run();
popup7.run();
popup8.run();
popup9.run();
popup10.run();

//--------------------------------------------------------------------