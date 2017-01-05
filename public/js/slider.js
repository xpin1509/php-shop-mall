/**
 * Created by Administrator on 2016/12/21.
 */
var Slider = function () {
    this.oBanner = document.getElementById("banner_bar");
    this.oBannerBox = document.getElementById("imgBox");
    this.oBannerLi = this.oBannerBox.getElementsByTagName("li");
    
    this.oBannerNum = document.getElementById("imgNum");
    this.oNum = this.oBannerNum.getElementsByTagName("a");
    
    this.oPrev = document.getElementsByClassName("slider_control_prev")[0];
    this.oNext = document.getElementsByClassName("slider_control_next")[0];
    var self = this;

    //初始化对象
    this.init();
    
    this.timmer;
    //绑定事件
  	this.oBanner.onmouseover = function(){
  		clearInterval(self.timmer);
  	}
  	this.oBanner.onmouseout = function(){
  		self.startAuto();
  	}
    this.oPrev.onclick = function(){
    	self.prev();
    } 
    this.oNext.onclick = function(){
    	self.next();
    } 
    for(var n = 0; n < this.oNum.length; n++){
        this.oNum[n].index = n;
        this.oNum[n].onmouseover = function(){
            self.change(this.index)
        }
    }
}
Slider.prototype.init = function(){
	this.i = 0;
	this.startAuto();
}
Slider.prototype.startAuto = function(){
	var self = this;
	this.timmer = setInterval(function(){
    	self.next();
    },3000);
}
Slider.prototype.showBanner = function () {
	var self = this;
	clearTimeout(timer);
	var timer = setTimeout(function(){
		var forEach = Array.prototype.forEach;
		forEach.call(self.oBannerLi,function(oli){
			oli.style.opacity = 0;
			oli.style.zIndex = 0;
		});
		forEach.call(self.oNum,function(oli){
			oli.className ='';
		});
		self.oBannerLi[self.i].style.opacity = 1;
	    self.oBannerLi[self.i].style.zIndex = 1;
	    self.oNum[self.i].className = "active";
	},500)
}
Slider.prototype.prev = function () {
	if(this.i){
		this.i--;
	}else{
		this.i = this.oBannerLi.length - 1;
	}
	this.showBanner();
}
Slider.prototype.next = function () {
	if(this.i === this.oBannerLi.length - 1){
		this.i = 0;
	}else{
		this.i++;
	}
	this.showBanner();
}
Slider.prototype.change = function (i) {
	this.i = i;
	this.showBanner();
}
var slider = new Slider();































