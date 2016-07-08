function countdown(obj)
{
	this.obj		= obj;
	this.Div		= "clock";
	this.BackColor		= "white";
	this.ForeColor		= "black";
	this.TargetDate		= "12/31/2020 5:00 AM";
	this.DisplayFormat	= "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
	this.CountActive	= true;
	
	this.DisplayStr;

	this.Calcage		= cd_Calcage;
	this.CountBack		= cd_CountBack;
	this.Setup		= cd_Setup;
}

function cd_Calcage(secs, num1, num2)
{
  s = ((Math.floor(secs/num1))%num2).toString();
  if (s.length < 2) s = "0" + s;
  return (s);
}
function cd_CountBack(secs)
{
  this.DisplayStr = this.DisplayFormat.replace(/%%D%%/g,	this.Calcage(secs,86400,100000));
  this.DisplayStr = this.DisplayStr.replace(/%%H%%/g,		this.Calcage(secs,3600,24));
  this.DisplayStr = this.DisplayStr.replace(/%%M%%/g,		this.Calcage(secs,60,60));
  this.DisplayStr = this.DisplayStr.replace(/%%S%%/g,		this.Calcage(secs,1,60));
  
  //additional added
  var day = this.Calcage(secs,86400,100000);
  var hour = this.Calcage(secs,3600,24);
  var minutes = this.Calcage(secs,60,60);
  var seconds = this.Calcage(secs,1,60);
  
  
    
  //var countDownTime = document.getElementById(this.Div).children;
  //var countDownTime = document.getElementsByClassName(this.Div).children;
  
    $( "."+this.Div+"  .row > div:nth-child(1)").html(day + "<br/>Days");
    $( "."+this.Div+"  .row > div:nth-child(2)").html(hour + "<br/>Hrs");
    $( "."+this.Div+"  .row > div:nth-child(3)").html(minutes + "<br/>Min");
    $( "."+this.Div+"  .row > div:nth-child(4)").html(seconds + "<br/>Sec");
    
  /*countDownTime[0].innerHTML = day + "<br/>Days";
  countDownTime[1].innerHTML = hour + "<br/>Hrs";
  countDownTime[2].innerHTML =  minutes + "<br/>Min";
  countDownTime[3].innerHTML = seconds + "<br/>Sec";
  */
   

  // additional added end

  //document.getElementById(this.Div).innerHTML = this.DisplayStr;
  if (this.CountActive)
  setTimeout(this.obj +".CountBack(" + (secs-1) + ")", 990);
  else
  document.getElementById(this.Div).innerHTML = "00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00";
}
function cd_Setup()
{
	var dthen	= new Date(this.TargetDate);
  	var dnow	= new Date();
	ddiff		= new Date(dthen-dnow);
	gsecs		= Math.floor(ddiff.valueOf()/1000);
	this.CountBack(gsecs);
}


var fadebgcolor="white"

////NO need to edit beyond here/////////////
 
var fadearray=new Array() //array to cache fadeshow instances
var fadeclear=new Array() //array to cache corresponding clearinterval pointers
 
var dom=(document.getElementById) //modern dom browsers
var iebrowser=document.all
 
function fadeshow(theimages, fadewidth, fadeheight, borderwidth, delay, pause, displayorder){

	this.pausecheck=pause
	this.mouseovercheck=0
	this.delay=delay
	this.degree=10 //initial opacity degree (10%)
	this.curimageindex=0
	this.nextimageindex=1
	fadearray[fadearray.length]=this
	this.slideshowid=fadearray.length-1
	this.canvasbase="canvas"+this.slideshowid
	this.curcanvas=this.canvasbase+"_0"
	if (typeof displayorder!="undefined")
		theimages.sort(function() {return 0.5 - Math.random();}) //thanks to Mike (aka Mwinter) :)
	this.theimages=theimages
	this.imageborder=parseInt(borderwidth)
	this.postimages=new Array() //preload images
	
	for (p=0;p<theimages.length;p++){
		this.postimages[p]=new Image()
		this.postimages[p].src=theimages[p][0]
	}
 
	var fadewidth=fadewidth+this.imageborder*2
	var fadeheight=fadeheight+this.imageborder*2
 
	if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
		document.write('<div id="master'+this.slideshowid+'" style="position:relative;width:'+fadewidth+'px;height:'+fadeheight+'px;overflow:hidden;"><div id="'+this.canvasbase+'_0" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div><div id="'+this.canvasbase+'_1" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div></div>')
	else
		document.write('<div><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'"></div>')
 
	if (iebrowser&&dom||dom) //if IE5+ or modern browsers such as Firefox
		this.startit()
	else{
		this.curimageindex++
		setInterval("fadearray["+this.slideshowid+"].rotateimage()", this.delay)
	}
}

function fadepic(obj){
	if (obj.degree<100){
		obj.degree+=10
		if (obj.tempobj.filters&&obj.tempobj.filters[0]){
			if (typeof obj.tempobj.filters[0].opacity=="number") //if IE6+
				obj.tempobj.filters[0].opacity=obj.degree
			else //else if IE5.5-
				obj.tempobj.style.filter="alpha(opacity="+obj.degree+")"
		}
		else if (obj.tempobj.style.MozOpacity)
			obj.tempobj.style.MozOpacity=obj.degree/101
		else if (obj.tempobj.style.KhtmlOpacity)
			obj.tempobj.style.KhtmlOpacity=obj.degree/100
		else if (obj.tempobj.style.opacity&&!obj.tempobj.filters)
			obj.tempobj.style.opacity=obj.degree/101
	}

	else{
		clearInterval(fadeclear[obj.slideshowid])
		obj.nextcanvas=(obj.curcanvas==obj.canvasbase+"_0")? obj.canvasbase+"_0" : obj.canvasbase+"_1"
		obj.tempobj=iebrowser? iebrowser[obj.nextcanvas] : document.getElementById(obj.nextcanvas)
		obj.populateslide(obj.tempobj, obj.nextimageindex)
		obj.nextimageindex=(obj.nextimageindex<obj.postimages.length-1)? obj.nextimageindex+1 : 0
		setTimeout("fadearray["+obj.slideshowid+"].rotateimage()", obj.delay)
	}
}
 
fadeshow.prototype.populateslide=function(picobj, picindex){

	var slideHTML=""
	
	if (this.theimages.length !=1 ){ //if image array is more than one
		if (this.theimages[picindex][0]!=""){ //if image exist
			slideHTML='<span class="fadehide"></span><a class="fadelink" href="'+this.theimages[picindex][1]+'" target="'+this.theimages[picindex][2]+'">'
			slideHTML+='<img src="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px">'
			slideHTML+='</a>'
                        
                        
                        // slideHTML='<a href="'+this.theimages[picindex][1]+'" target="'+this.theimages[picindex][2]+'">';
                        // slideHTML+=' <div class="img" style="background-image: url('+this.postimages[picindex].src+')"></div>'

		}
	}

	else{
		if (this.theimages[0][1]!=""){
			slideHTML='<span class="fadehide"></span><a class="fadelink" href="'+this.theimages[0][1]+'" target="'+this.theimages[0][2]+'">'
			slideHTML+='<img src="'+this.postimages[0].src+'" border="'+this.imageborder+'px">'
			slideHTML+='</a>'
                        
                         //slideHTML='<a href="'+this.theimages[picindex][0][1]+'" target="'+this.theimages[picindex][0][2]+'">';
                        // slideHTML+=' <div class="img" style="background-image: url('+this.postimages[0].src+')"></div>'
		}	
	}
	picobj.innerHTML=slideHTML
}
 
 
 
fadeshow.prototype.rotateimage=function(){
	if (this.pausecheck==1) //if pause onMouseover enabled, cache object
		var cacheobj=this
	if (this.mouseovercheck==1)
		setTimeout(function(){cacheobj.rotateimage()}, 100)
	else if (iebrowser&&dom||dom){
		this.resetit()
		var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
		crossobj.style.zIndex++
		fadeclear[this.slideshowid]=setInterval("fadepic(fadearray["+this.slideshowid+"])",50)
		this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"
	}
	else{
		var ns4imgobj=document.images['defaultslide'+this.slideshowid]
		ns4imgobj.src=this.postimages[this.curimageindex].src
	}

	this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
}
 
fadeshow.prototype.resetit=function(){
	this.degree=10
	var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)

	if (crossobj.filters&&crossobj.filters[0]){
		if (typeof crossobj.filters[0].opacity=="number") //if IE6+
			crossobj.filters(0).opacity=this.degree
		else //else if IE5.5-
			crossobj.style.filter="alpha(opacity="+this.degree+")"
	}
	else if (crossobj.style.MozOpacity)
		crossobj.style.MozOpacity=this.degree/101
	else if (crossobj.style.KhtmlOpacity)
		crossobj.style.KhtmlOpacity=this.degree/100
	else if (crossobj.style.opacity&&!crossobj.filters)
		crossobj.style.opacity=this.degree/101
}
 
 
fadeshow.prototype.startit=function(){
	var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
	this.populateslide(crossobj, this.curimageindex)
	if (this.pausecheck==1){ //IF SLIDESHOW SHOULD PAUSE ONMOUSEOVER
		var cacheobj=this
		var crossobjcontainer=iebrowser? iebrowser["master"+this.slideshowid] : document.getElementById("master"+this.slideshowid)
		crossobjcontainer.onmouseover=function(){cacheobj.mouseovercheck=1}
		crossobjcontainer.onmouseout=function(){cacheobj.mouseovercheck=0}
	}
	this.rotateimage()
}



