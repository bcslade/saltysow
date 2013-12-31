/* fancyScroll - Site & Background Scrolling Plugin
 * 
 * @author flGravity
 * @site http://codecanyon.net/user/flGravity
 * @created 06/28/11
 * @update #5
 *
*/ 

(function (undefined) {
    //check if fancyScroll is already registered
    if (typeof window.fancyScroll == 'function') {
    	return;
    }

    //fancyScroll() constructor
    window.fancyScroll = function (s) {
        this.settings = {
            scrollMode: 'vertical',          			//scroll mode ('vertical' or 'horizontal')
            startSection: '',							//scroll to section after load ("" or "#/section") 
            hashChangeScroll: false,              		//trigger scroll with "onhashchange" events
            easingRate: 15,                  			//scroll rate (ms)
            easingTime: 1000,                			//scroll time (ms)
            easingFunction: 'easeOutCubic',     		//scroll easing (string or function)
            topButton: true,                     		//enable topButton
            topButtonText: 'Top',                		//topButton text
            topButtonClass: 'fancyscroll-topButton', 	//topButton class
            topButtonShowAfter: '0px',           		//show topButton only after scrolling N pixels
            topButtonTarget: document.body,				//anchor element for topButton (DOM element or ID)
            topButtonHash: '#/',						//topButton HREF attribute (with hashChangeScroll)
            onScroll: function(){},	 	 				//scroll callback (xoffset, yoffset) 
            onScrollEnd: function(){},					//scroll end callback (section, Array[backgrounds])
            onScrollStart: function(){}					//scroll start callback (section)
        };
        
        //override basic settings
        if (s && typeof s == 'object') {
            for (var key in this.settings) {
                if (s[key] != undefined) this.settings[key] = s[key];
            }
        }
        
        //locks and temp variables
        this.tmp = new Object;
        //scroll mode
        this.tmp.horizontal = (this.settings.scrollMode == 'horizontal');
        this.tmp.vertical = !this.tmp.horizontal;
		
        //create array from divs with 'fancyscroll-background' class
        this.map = new Array();
    	var divs = document.getElementsByTagName('div');
        for (var i = 0; i < divs.length; i++) {
            if (divs[i].className.indexOf('fancyscroll-background') != -1) {
                this.map.push({
                    'self': divs[i],
                    'top': this.getAbsolutePosition(divs[i])[1],
                    'left': this.getAbsolutePosition(divs[i])[0],
                    'height': divs[i].offsetHeight,
                    'width': divs[i].offsetWidth,
                    'offset': parseInt(divs[i].getAttribute('offset') || 0),
                    'limit': parseInt(divs[i].getAttribute('limit') || 0),
                    'position': this.getBackgroundPosition(divs[i])
                });                
            }
        }
        
        //scroll event handler
        var onScrollHandler = function (e) {
            var bp, bo;
        	var px = window.pageXOffset || document.documentElement.scrollLeft;
        	var py = window.pageYOffset || document.documentElement.scrollTop;
        	        	
            for (var i = 0; i < this.map.length; i++) {
                var dv = this.map[i];
                //background offset
                if (this.tmp.horizontal) {
                	bo = dv.offset * (px - dv.left) / dv.width;
                	//apply limit to background offset
                	if(dv.limit > 0){
                		if(bo > dv.limit) bo = dv.limit;
                	}else{
                		if(dv.limit != 0 && bo < dv.limit) bo = dv.limit;
                	}
                	bp = (dv.position.x + bo) + 'px ' + dv.position.y + 'px';
                } else {
                	bo = dv.offset * (py - dv.top) / dv.height;
                	//apply limit to background offset
                	if(dv.limit > 0){
                		if(bo > dv.limit) bo = dv.limit;
                	}else{
                		if(dv.limit != 0 && bo < dv.limit) bo = dv.limit;
                	}
                    bp = dv.position.x + 'px ' + (dv.position.y + bo) + 'px';
                }
                
                //and apply inline style to fancyscroll-background element
                dv.self.style.backgroundPosition = bp;
            }

            //check if topButton button should be visible
            if (this.tmp.topButton) {
                this.tmp.topButton.style.visibility = 'hidden';
                if ((this.tmp.horizontal)?px:py > parseInt(this.settings.topButtonShowAfter,10)){ 
                	this.tmp.topButton.style.visibility = 'visible';
                }
            }
            
            //run onScroll callback function
            if(typeof this.settings.onScroll == 'function'){
            	this.settings.onScroll.call(this,px,py);
            }
        };

        addHandler(window, 'scroll', this.setScope(onScrollHandler));

        //register mouse wheel handler that stops scroll timer when mousewheel is detected
        var onMouseWheel = function (e) {
                clearInterval(this.tmp.scroll_timer);
                //run scroll end callback
                if(typeof this.settings.onScrollEnd == 'function'){
                	this.settings.onScrollEnd.call(this);
                }
        };
        if (/firefox/i.test(navigator.userAgent)) {
            //use DOMMouseScroll for Firefox
            addHandler(window, 'DOMMouseScroll', this.setScope(onMouseWheel));
        } else {
            //IE, Opera etc
            addHandler(window, 'mousewheel', this.setScope(onMouseWheel));
        }

        //check IE version and skip onhashchange event in favour of
        //addScroll() method for IE < 8
        this.tmp.hash_support = true;
        if (window.navigator.appName.indexOf('Microsoft') != -1) {
            if (/MSIE (\d+\.?\d+)/.exec(window.navigator.userAgent) != null) {
                this.tmp.hash_support = (parseFloat(RegExp.$1) < 8) ? false : true;
            }
        }

		var onURLChange = function () {
	        if (/#\/([\w-]+)/.exec(location.hash) != null) {
	            this.scroll(RegExp.$1);
	        }
		};
		
		//register hashchange event handler if supported
	    if (this.settings.hashChangeScroll && this.tmp.hash_support) {
	    	this.tmp.hashchange = this.setScope(onURLChange);
	        addHandler(window, 'hashchange', this.tmp.hashchange);
	    }
	    
	    //create topButton element
        if (this.settings.topButton) {
            this.tmp.topButton = document.createElement('a');
            this.tmp.topButton.className = this.settings.topButtonClass;
	    	this.tmp.topButton.href=this.settings.topButtonHash;
            this.tmp.topButton.appendChild(document.createTextNode(this.settings.topButtonText));
            this.addScroll(this.tmp.topButton, this.settings.topButtonTarget);
            this.tmp.topButton.style.visibility = 'hidden';
            document.body.appendChild(this.tmp.topButton);
        }
		
		//when page is loaded first time scroll to the initial location
		if(this.settings.startSection){
			if(/^#\/\w+/.test(this.settings.startSection)){
				this.changeURLHash(this.settings.startSection);
			}
			this.setScope(onURLChange)();
		}
		
    }; //end of fancyScroll() constructor


    /*
     * Public methods definition
     */

    //method scrolls page to target's top position ('target' is specified as element itself or by its id)
    fancyScroll.prototype.scroll = function (target) {
        if (typeof target == 'string') {
            target = document.getElementById(target);
        }
        
        //scroll start callback
        if(typeof this.settings.onScrollStart == 'function'){
        	this.settings.onScrollStart.call(this,target);
        }

        //check if DOM element exists
        if (target === null) return;

        //define variables that will be used in scope of scrollEz
        if (this.tmp.horizontal) {
        	//scroll start position
            var sbegin = window.pageXOffset || document.documentElement.scrollLeft;
            var send = this.getAbsolutePosition(target)[0]; //scroll end position
        } else {
        	//scroll start position
            var sbegin = window.pageYOffset || document.documentElement.scrollTop;
            var send = this.getAbsolutePosition(target)[1]; //scroll end position
        }

        var sease, scount = 0;
        if(typeof this.settings.easingFunction == 'function'){
        	sease = this.settings.easingFunction;
        } else {
        	sease = fancyScroll.easeFX[this.settings.easingFunction];
        }

        var scrollEz = function () {
            if (scount < this.settings.easingTime) {
                scount += this.settings.easingRate;
                if (this.tmp.horizontal) {
                	window.scroll(sease(scount, sbegin, send - sbegin, this.settings.easingTime), 0);	
               	} else { 
                	window.scroll(0,sease(scount, sbegin, send - sbegin, this.settings.easingTime));
                }
            } else {
                clearInterval(this.tmp.scroll_timer);
                //run callback
                var n = 0, r = new Array(), p;
                while(n < this.map.length){
                	p = (this.tmp.horizontal)?this.map[n].left:this.map[n].top;
            		if(p == send){
            			r.push(this.map[n]);
            		}
            		n++;
                }
                if(typeof this.settings.onScrollEnd == 'function'){
                	this.settings.onScrollEnd.call(this, r[0].self.parentNode, r);
                }
            }
        };

        //scroll to the target
        clearInterval(this.tmp.scroll_timer);
        this.tmp.scroll_timer = setInterval(this.setScope(scrollEz), this.settings.easingRate);
    };


    //method adds onclick listener to the given link or element
    fancyScroll.prototype.addScroll = function (link, target) {
        //exit if hashChangeScroll is enabled and 'onhashchange' is supported
        if (this.settings.hashChangeScroll && this.tmp.hash_support) {
            return this;
        }
               
        var fs = this;
        function addScrollHandler(l, t) {
            if (typeof l == 'string') {
                l = document.getElementById(l);
            }
            addHandler(l, 'click', fs.setScope(function (e) {
                fs.scroll(t);
                //stop propagation
                e = e || window.event;
                if(e.preventDefault){
                	e.preventDefault();
                }
                e.returnValue=false;
                location.hash='#/'+((t.substr)?t:t.id);
            }));
        }

        if (link instanceof Array && target instanceof Array) {
            for (var i = 0; i < link.length; i++) {
                addScrollHandler(link[i], target[i]);
            }
        } else {
            addScrollHandler(link, target);
        }

        return fs;
    };
    
    
    //method to change URL hash without page scroll
    fancyScroll.prototype.changeURLHash = function (hash) {
    	if(this.tmp.hashchange){
			removeHandler(window, 'hashchange', this.tmp.hashchange);
			//set new hash and restore hashchange listener
			window.location.hash = hash;
			clearTimeout(this.tmp.hashchange_timer);
			this.tmp.hashchange_timer = setTimeout(this.setScope(function() {
				addHandler(window, 'hashchange', this.tmp.hashchange);
			}), 100);
    	}else{
    		window.location.hash = hash;
    	}
    };
    
    //update map of background divs if their properties have changed in DOM
    fancyScroll.prototype.updateMap = function () {
        for(var i = 0; i < this.map.length; i++){
        	var b = this.map[i];
        	b.left = this.getAbsolutePosition(b.self)[0];
        	b.top = this.getAbsolutePosition(b.self)[1];
        	b.height = b.self.offsetHeight;
        	b.width = b.self.offsetWidth;
        }
    };


    /*
     * Private methods definition
     */

    //returns a function where 'this' keywork inside of function is set to the calling object
    fancyScroll.prototype.setScope = function (fn) {
        var a = this;
        return function () {
            fn.apply(a, Array.prototype.slice.call(arguments));
        };
    };


    //returns absolute position of an element as array [left,top]
    fancyScroll.prototype.getAbsolutePosition = function (t) {
        if (t == null) {
            return [0, 0];
        } else {
            var startX = t.offsetLeft;
            var startY = t.offsetTop;
            var tmp = arguments.callee(t.offsetParent);
            return [startX + tmp[0], startY + tmp[1]];
        }
    };


    //returns background-position css property for given element
    fancyScroll.prototype.getBackgroundPosition = function (e) {
    	var tmp_pos = '0 0';
        if (typeof e == 'string'){
        	e = document.getElementById(e);
        }
        if (window.getComputedStyle) { // FF,Chrome,Safari 
            tmp_pos = window.getComputedStyle(e, null).backgroundPosition;
        } else if (e.currentStyle) { // IE 
            if (e.currentStyle.backgroundPosition) { 
            	tmp_pos = e.currentStyle.backgroundPosition; 
            } else if (e.currentStyle.backgroundPositionX) { //fix for IE < 9
                tmp_pos = e.currentStyle.backgroundPositionX + ' ' + e.currentStyle.backgroundPositionY;
            }
        }

        //fix for non-numeric values for background-position
        var tmp_x = parseInt(tmp_pos.split(' ')[0], 10);
        var tmp_y = parseInt(tmp_pos.split(' ')[1], 10);

        return {
            'x': isNaN(tmp_x) ? 0 : tmp_x,
            'y': isNaN(tmp_y) ? 0 : tmp_y
        };
    };


    //easing functions
    fancyScroll.easeFX = {
        // elastic
        easeInElastic: function (t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0) return b;
            if ((t /= d) == 1) return b + c;
            if (!p) p = d * .3;
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4;
            } else var s = p / (2 * Math.PI) * Math.asin(c / a);
            return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
        },
        easeOutElastic: function (t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0) return b;
            if ((t /= d) == 1) return b + c;
            if (!p) p = d * .3;
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4;
            } else var s = p / (2 * Math.PI) * Math.asin(c / a);
            return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
        },
        easeInOutElastic: function (t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0) return b;
            if ((t /= d / 2) == 2) return b + c;
            if (!p) p = d * (.3 * 1.5);
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4;
            } else var s = p / (2 * Math.PI) * Math.asin(c / a);
            if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
            return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
        },
        // back
        easeInBack: function (t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            return c * (t /= d) * t * ((s + 1) * t - s) + b;
        },
        easeOutBack: function (t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
        },
        easeInOutBack: function (x, t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
            return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b;
        },
        // quint
        easeInQuint: function (t, b, c, d) {
            return c * (t /= d) * t * t * t * t + b;
        },
        easeOutQuint: function (t, b, c, d) {
            return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
        },
        easeInOutQuint: function (t, b, c, d) {
            if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
            return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
        },
        // cubic
        easeInCubic: function (t, b, c, d) {
            t /= d;
            return c * t * t * t + b;
        },
        easeOutCubic: function (t, b, c, d) {
            t /= d;
            t--;
            return c * (t * t * t + 1) + b;
        },
        easeInOutCubic: function (t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t * t + b;
            t -= 2;
            return c / 2 * (t * t * t + 2) + b;
        },
        // linear
        linear: function (t, b, c, d) {
            return c * t / d + b;
        }
    };
    
    
    /*
     * Help Functions
     */

    //functions to register event listener 
    function addHandler(target, event, handler) {
    	if (target !== null && arguments.length == 3) {
	        if (target.addEventListener) { //W3C DOM
	            target.addEventListener(event, handler, false);
	        } else if (target.attachEvent) { //IE
	            target.attachEvent('on' + event, handler);
	        }
        }
    }
    
    //functions to remove event listener
    function removeHandler(target, event, handler){
    	if(target !== null && arguments.length == 3){
    		if (target.removeEventListener) { //W3C DOM
    			target.removeEventListener(event, handler, false);
    		} else if (target.detachEvent) { //IE
    			target.detachEvent('on' + event, handler);
    		}
    	}
    }

})();
