/*! scrollreveal v3.3.6 */
!function(){"use strict";function e(n){return"undefined"==typeof this||Object.getPrototypeOf(this)!==e.prototype?new e(n):(O=this,O.version="3.3.6",O.tools=new E,O.isSupported()?(O.tools.extend(O.defaults,n||{}),O.defaults.container=t(O.defaults),O.store={elements:{},containers:[]},O.sequences={},O.history=[],O.uid=0,O.initialized=!1):"undefined"!=typeof console&&null!==console,O)}function t(e){if(e&&e.container){if("string"==typeof e.container)return window.document.documentElement.querySelector(e.container);if(O.tools.isNode(e.container))return e.container}return O.defaults.container}function n(e,t){return"string"==typeof e?Array.prototype.slice.call(t.querySelectorAll(e)):O.tools.isNode(e)?[e]:O.tools.isNodeList(e)?Array.prototype.slice.call(e):[]}function i(){return++O.uid}function o(e,t,n){t.container&&(t.container=n),e.config?e.config=O.tools.extendClone(e.config,t):e.config=O.tools.extendClone(O.defaults,t),"top"===e.config.origin||"bottom"===e.config.origin?e.config.axis="Y":e.config.axis="X"}function r(e){var t=window.getComputedStyle(e.domEl);e.styles||(e.styles={transition:{},transform:{},computed:{}},e.styles.inline=e.domEl.getAttribute("style")||"",e.styles.inline+="; visibility: visible; ",e.styles.computed.opacity=t.opacity,t.transition&&"all 0s ease 0s"!==t.transition?e.styles.computed.transition=t.transition+", ":e.styles.computed.transition=""),e.styles.transition.instant=s(e,0),e.styles.transition.delayed=s(e,e.config.delay),e.styles.transform.initial=" -webkit-transform:",e.styles.transform.target=" -webkit-transform:",a(e),e.styles.transform.initial+="transform:",e.styles.transform.target+="transform:",a(e)}function s(e,t){var n=e.config;return"-webkit-transition: "+e.styles.computed.transition+"-webkit-transform "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s, opacity "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s; transition: "+e.styles.computed.transition+"transform "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s, opacity "+n.duration/1e3+"s "+n.easing+" "+t/1e3+"s; "}function a(e){var t,n=e.config,i=e.styles.transform;t="top"===n.origin||"left"===n.origin?/^-/.test(n.distance)?n.distance.substr(1):"-"+n.distance:n.distance,parseInt(n.distance)&&(i.initial+=" translate"+n.axis+"("+t+")",i.target+=" translate"+n.axis+"(0)"),n.scale&&(i.initial+=" scale("+n.scale+")",i.target+=" scale(1)"),n.rotate.x&&(i.initial+=" rotateX("+n.rotate.x+"deg)",i.target+=" rotateX(0)"),n.rotate.y&&(i.initial+=" rotateY("+n.rotate.y+"deg)",i.target+=" rotateY(0)"),n.rotate.z&&(i.initial+=" rotateZ("+n.rotate.z+"deg)",i.target+=" rotateZ(0)"),i.initial+="; opacity: "+n.opacity+";",i.target+="; opacity: "+e.styles.computed.opacity+";"}function l(e){var t=e.config.container;t&&O.store.containers.indexOf(t)===-1&&O.store.containers.push(e.config.container),O.store.elements[e.id]=e}function c(e,t,n){var i={target:e,config:t,interval:n};O.history.push(i)}function f(){if(O.isSupported()){y();for(var e=0;e<O.store.containers.length;e++)O.store.containers[e].addEventListener("scroll",d),O.store.containers[e].addEventListener("resize",d);O.initialized||(window.addEventListener("scroll",d),window.addEventListener("resize",d),O.initialized=!0)}return O}function d(){T(y)}function u(){var e,t,n,i;O.tools.forOwn(O.sequences,function(o){i=O.sequences[o],e=!1;for(var r=0;r<i.elemIds.length;r++)n=i.elemIds[r],t=O.store.elements[n],q(t)&&!e&&(e=!0);i.active=e})}function y(){var e,t;u(),O.tools.forOwn(O.store.elements,function(n){t=O.store.elements[n],e=w(t),g(t)?(t.config.beforeReveal(t.domEl),e?t.domEl.setAttribute("style",t.styles.inline+t.styles.transform.target+t.styles.transition.delayed):t.domEl.setAttribute("style",t.styles.inline+t.styles.transform.target+t.styles.transition.instant),p("reveal",t,e),t.revealing=!0,t.seen=!0,t.sequence&&m(t,e)):v(t)&&(t.config.beforeReset(t.domEl),t.domEl.setAttribute("style",t.styles.inline+t.styles.transform.initial+t.styles.transition.instant),p("reset",t),t.revealing=!1)})}function m(e,t){var n=0,i=0,o=O.sequences[e.sequence.id];o.blocked=!0,t&&"onload"===e.config.useDelay&&(i=e.config.delay),e.sequence.timer&&(n=Math.abs(e.sequence.timer.started-new Date),window.clearTimeout(e.sequence.timer)),e.sequence.timer={started:new Date},e.sequence.timer.clock=window.setTimeout(function(){o.blocked=!1,e.sequence.timer=null,d()},Math.abs(o.interval)+i-n)}function p(e,t,n){var i=0,o=0,r="after";switch(e){case"reveal":o=t.config.duration,n&&(o+=t.config.delay),r+="Reveal";break;case"reset":o=t.config.duration,r+="Reset"}t.timer&&(i=Math.abs(t.timer.started-new Date),window.clearTimeout(t.timer.clock)),t.timer={started:new Date},t.timer.clock=window.setTimeout(function(){t.config[r](t.domEl),t.timer=null},o-i)}function g(e){if(e.sequence){var t=O.sequences[e.sequence.id];return t.active&&!t.blocked&&!e.revealing&&!e.disabled}return q(e)&&!e.revealing&&!e.disabled}function w(e){var t=e.config.useDelay;return"always"===t||"onload"===t&&!O.initialized||"once"===t&&!e.seen}function v(e){if(e.sequence){var t=O.sequences[e.sequence.id];return!t.active&&e.config.reset&&e.revealing&&!e.disabled}return!q(e)&&e.config.reset&&e.revealing&&!e.disabled}function b(e){return{width:e.clientWidth,height:e.clientHeight}}function h(e){if(e&&e!==window.document.documentElement){var t=x(e);return{x:e.scrollLeft+t.left,y:e.scrollTop+t.top}}return{x:window.pageXOffset,y:window.pageYOffset}}function x(e){var t=0,n=0,i=e.offsetHeight,o=e.offsetWidth;do isNaN(e.offsetTop)||(t+=e.offsetTop),isNaN(e.offsetLeft)||(n+=e.offsetLeft),e=e.offsetParent;while(e);return{top:t,left:n,height:i,width:o}}function q(e){function t(){var t=c+a*s,n=f+l*s,i=d-a*s,y=u-l*s,m=r.y+e.config.viewOffset.top,p=r.x+e.config.viewOffset.left,g=r.y-e.config.viewOffset.bottom+o.height,w=r.x-e.config.viewOffset.right+o.width;return t<g&&i>m&&n<w&&y>p}function n(){return"fixed"===window.getComputedStyle(e.domEl).position}var i=x(e.domEl),o=b(e.config.container),r=h(e.config.container),s=e.config.viewFactor,a=i.height,l=i.width,c=i.top,f=i.left,d=c+a,u=f+l;return t()||n()}function E(){}var O,T;e.prototype.defaults={origin:"bottom",distance:"20px",duration:500,delay:0,rotate:{x:0,y:0,z:0},opacity:0,scale:.9,easing:"cubic-bezier(0.6, 0.2, 0.1, 1)",container:window.document.documentElement,mobile:!0,reset:!1,useDelay:"always",viewFactor:.2,viewOffset:{top:0,right:0,bottom:0,left:0},beforeReveal:function(e){},beforeReset:function(e){},afterReveal:function(e){},afterReset:function(e){}},e.prototype.isSupported=function(){var e=document.documentElement.style;return"WebkitTransition"in e&&"WebkitTransform"in e||"transition"in e&&"transform"in e},e.prototype.reveal=function(e,s,a,d){var u,y,m,p,g,w;if(void 0!==s&&"number"==typeof s?(a=s,s={}):void 0!==s&&null!==s||(s={}),u=t(s),y=n(e,u),!y.length)return O;a&&"number"==typeof a&&(w=i(),g=O.sequences[w]={id:w,interval:a,elemIds:[],active:!1});for(var v=0;v<y.length;v++)p=y[v].getAttribute("data-sr-id"),p?m=O.store.elements[p]:(m={id:i(),domEl:y[v],seen:!1,revealing:!1},m.domEl.setAttribute("data-sr-id",m.id)),g&&(m.sequence={id:g.id,index:g.elemIds.length},g.elemIds.push(m.id)),o(m,s,u),r(m),l(m),O.tools.isMobile()&&!m.config.mobile||!O.isSupported()?(m.domEl.setAttribute("style",m.styles.inline),m.disabled=!0):m.revealing||m.domEl.setAttribute("style",m.styles.inline+m.styles.transform.initial);return!d&&O.isSupported()&&(c(e,s,a),O.initTimeout&&window.clearTimeout(O.initTimeout),O.initTimeout=window.setTimeout(f,0)),O},e.prototype.sync=function(){if(O.history.length&&O.isSupported()){for(var e=0;e<O.history.length;e++){var t=O.history[e];O.reveal(t.target,t.config,t.interval,!0)}f()}return O},E.prototype.isObject=function(e){return null!==e&&"object"==typeof e&&e.constructor===Object},E.prototype.isNode=function(e){return"object"==typeof window.Node?e instanceof window.Node:e&&"object"==typeof e&&"number"==typeof e.nodeType&&"string"==typeof e.nodeName},E.prototype.isNodeList=function(e){var t=Object.prototype.toString.call(e),n=/^\[object (HTMLCollection|NodeList|Object)\]$/;return"object"==typeof window.NodeList?e instanceof window.NodeList:e&&"object"==typeof e&&n.test(t)&&"number"==typeof e.length&&(0===e.length||this.isNode(e[0]))},E.prototype.forOwn=function(e,t){if(!this.isObject(e))throw new TypeError('Expected "object", but received "'+typeof e+'".');for(var n in e)e.hasOwnProperty(n)&&t(n)},E.prototype.extend=function(e,t){return this.forOwn(t,function(n){this.isObject(t[n])?(e[n]&&this.isObject(e[n])||(e[n]={}),this.extend(e[n],t[n])):e[n]=t[n]}.bind(this)),e},E.prototype.extendClone=function(e,t){return this.extend(this.extend({},e),t)},E.prototype.isMobile=function(){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)},T=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)},"function"==typeof define&&"object"==typeof define.amd&&define.amd?define(function(){return e}):"undefined"!=typeof module&&module.exports?module.exports=e:window.ScrollReveal=e}();

(function($){

	$(document).ready(function() { // executes when HTML-Document is loaded and DOM is ready

		$('.to-a-anchor').attr('id', 'iq-anchor');

	  $('a.a-anchor[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top - 240
	        }, 1000);
	        return false;
	      }
	    }
	  });


    // var widest = 0, tallest = 0;

    // // Loop through equalize elements
    // $('.equalize').each( function() {

    //   // Set width/height to widest/tallest elements
    //   widest = $(this).width() > widest ? $(this).width() : widest;
    //   tallest = $(this).height() > tallest ? $(this).height() : tallest;
    // }).width(widest).height(tallest);

    // http://robido.com/jquery/use-jquery-to-match-height-or-width-of-elements-equalize-to-make-them-all-the-same-uniform-height-or-width/

    spartan_wdth_div();

     $(window).resize(function(e) {

       spartan_wdth_div();

     });

    function spartan_wdth_div() {

        var greatestWidthx = $('.menu-right').width();   // Stores the greatest width
        console.log(greatestWidthx)

        $('.menu-left').width(greatestWidthx + 'px');     // Update the elements you were comparing

    }



	 // (function() {
		// 	var ev = new $.Event('classadded'),
		// 	    orig = $.fn.addClass;
		// 	$.fn.addClass = function() {
		// 	    $(this).trigger(ev, arguments);
		// 	    return orig.apply(this, arguments);
		// 	}
		// })();

		// $('#undefined-sticky-wrapper').on('classadded', function(ev, newClasses) {
		//     console.log(newClasses + ' added!');
		//     console.log(this);
		//     // Do stuff
		//     // ...

		//     $(".sticky-header-resized img.standard").animate({
		// 	    width: "150px",//HERE
		// 	    height: "80px"
		// 	  });
		// });




		// $.get("http://ipinfo.io", function (response) {

		//   $("#ip").html("IP: " + response.ip);
		//   $("#address").html("Location: " + response.city + ", " + response.region);
		//   $("#details").html(JSON.stringify(response, null, 4));

		// }, "jsonp");

    		//Start of Scroll Reveal defined Classes
    window.sr = ScrollReveal({ reset: true });
    sr.reveal('.grid', 50); //Apply on class grid
    sr.reveal('.gallery-item', 50); //Apply on class gallery-item
    sr.reveal('.sr');
    sr.reveal('.sr-sq-wrpr .sr', 100);
    sr.reveal('.sr-bottom300', {
    	origin: 'bottom',
    	delay: 300,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-bottom600', {
    	origin: 'bottom',
    	delay: 600,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-bottom900', {
    	origin: 'bottom',
    	delay: 900,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-bottom1200', {
    	origin: 'bottom',
    	delay: 1200,
    	distance: '120px',
        reset :'true'
    }, 100);

    sr.reveal('.sr-left300', {
    	origin: 'left',
    	delay: 300,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-left600', {
    	origin: 'left',
    	delay: 600,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-left900', {
    	origin: 'left',
    	delay: 900,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-left1200', {
    	origin: 'left',
    	delay: 1200,
    	distance: '120px',
        reset :'true'
    }, 100);

    sr.reveal('.sr-top300', {
    	origin: 'top',
    	delay: 300,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-top600', {
    	origin: 'top',
    	delay: 600,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-top900', {
    	origin: 'top',
    	delay: 900,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-top1200', {
    	origin: 'top',
    	delay: 1200,
    	distance: '120px',
        reset :'true'
    }, 100);


    sr.reveal('.sr-right300', {
    	origin: 'right',
    	delay: 300,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-right600', {
    	origin: 'right',
    	delay: 600,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-right900', {
    	origin: 'right',
    	delay: 900,
    	distance: '120px',
        reset :'true'
    }, 100);
      sr.reveal('.sr-right1200', {
    	origin: 'right',
    	delay: 1200,
    	distance: '120px',
        reset :'true'
    }, 100);
    //End of Scroll Reveal Classes



	}); // $(document).ready


	$(window).on("load", function() { // executes when complete page is fully loaded, including all frames, objects and images

		// $("html").addClass("loaded");

	}); // $(window).load

})(jQuery)
