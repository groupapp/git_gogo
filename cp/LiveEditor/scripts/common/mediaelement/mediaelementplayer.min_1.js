/*!
 * MediaElementPlayer
 * http://mediaelementjs.com/
 *
 * Creates a controller bar for HTML5 <video> add <audio> tags
 * using jQuery and MediaElement.js (HTML5 Flash/Silverlight wrapper)
 *
 * Copyright 2010-2012, John Dyer (http://j.hn/)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 */if(typeof jQuery!="undefined")mejs.$=jQuery;else if(typeof ender!="undefined")mejs.$=ender;
(function(f){mejs.MepDefaults={poster:"",defaultVideoWidth:480,defaultVideoHeight:270,videoWidth:-1,videoHeight:-1,defaultAudioWidth:400,defaultAudioHeight:30,audioWidth:-1,audioHeight:-1,startVolume:0.8,loop:false,enableAutosize:true,alwaysShowHours:false,showTimecodeFrameCount:false,framesPerSecond:25,autosizeProgress:true,alwaysShowControls:false,iPadUseNativeControls:false,iPhoneUseNativeControls:false,AndroidUseNativeControls:false,features:["playpause","current","progress","duration","tracks",
"volume","fullscreen"],isVideo:true,enableKeyboard:true,pauseOtherPlayers:true,keyActions:[{keys:[32,179],action:function(a,c){c.paused||c.ended?c.play():c.pause()}},{keys:[38],action:function(a,c){c.setVolume(Math.min(c.volume+0.1,1))}},{keys:[40],action:function(a,c){c.setVolume(Math.max(c.volume-0.1,0))}},{keys:[37,227],action:function(a,c){if(!isNaN(c.duration)&&c.duration>0){if(a.isVideo){a.showControls();a.startControlsTimer()}c.setCurrentTime(Math.max(c.currentTime-c.duration*0.05,0))}}},{keys:[39,
228],action:function(a,c){if(!isNaN(c.duration)&&c.duration>0){if(a.isVideo){a.showControls();a.startControlsTimer()}c.setCurrentTime(Math.min(c.currentTime+c.duration*0.05,c.duration))}}},{keys:[70],action:function(a){if(typeof a.enterFullScreen!="undefined")a.isFullScreen?a.exitFullScreen():a.enterFullScreen()}}]};mejs.mepIndex=0;mejs.players=[];mejs.MediaElementPlayer=function(a,c){if(!(this instanceof mejs.MediaElementPlayer))return new mejs.MediaElementPlayer(a,c);this.$media=this.$node=f(a);
this.node=this.media=this.$media[0];if(typeof this.node.player!="undefined")return this.node.player;else this.node.player=this;if(typeof c=="undefined")c=this.$node.data("mejsoptions");this.options=f.extend({},mejs.MepDefaults,c);mejs.players.push(this);this.init();return this};mejs.MediaElementPlayer.prototype={hasFocus:false,controlsAreVisible:true,init:function(){var a=this,c=mejs.MediaFeatures,b=f.extend(true,{},a.options,{success:function(e,g){a.meReady(e,g)},error:function(e){a.handleError(e)}}),
d=a.media.tagName.toLowerCase();a.isDynamic=d!=="audio"&&d!=="video";a.isVideo=a.isDynamic?a.options.isVideo:d!=="audio"&&a.options.isVideo;if(c.isiPad&&a.options.iPadUseNativeControls||c.isiPhone&&a.options.iPhoneUseNativeControls){a.$media.attr("controls","controls");if(c.isiPad&&a.media.getAttribute("autoplay")!==null){a.media.load();a.media.play()}}else if(!(c.isAndroid&&a.AndroidUseNativeControls)){a.$media.removeAttr("controls");a.id="mep_"+mejs.mepIndex++;a.container=f('<div id="'+a.id+'" class="mejs-container"><div class="mejs-inner"><div class="mejs-mediaelement"></div><div class="mejs-layers"></div><div class="mejs-controls"></div><div class="mejs-clear"></div></div></div>').addClass(a.$media[0].className).insertBefore(a.$media);
a.container.addClass((c.isAndroid?"mejs-android ":"")+(c.isiOS?"mejs-ios ":"")+(c.isiPad?"mejs-ipad ":"")+(c.isiPhone?"mejs-iphone ":"")+(a.isVideo?"mejs-video ":"mejs-audio "));if(c.isiOS){c=a.$media.clone();a.container.find(".mejs-mediaelement").append(c);a.$media.remove();a.$node=a.$media=c;a.node=a.media=c[0]}else a.container.find(".mejs-mediaelement").append(a.$media);a.controls=a.container.find(".mejs-controls");a.layers=a.container.find(".mejs-layers");c=d.substring(0,1).toUpperCase()+d.substring(1);
a.width=a.options[d+"Width"]>0||a.options[d+"Width"].toString().indexOf("%")>-1?a.options[d+"Width"]:a.media.style.width!==""&&a.media.style.width!==null?a.media.style.width:a.media.getAttribute("width")!==null?a.$media.attr("width"):a.options["default"+c+"Width"];a.height=a.options[d+"Height"]>0||a.options[d+"Height"].toString().indexOf("%")>-1?a.options[d+"Height"]:a.media.style.height!==""&&a.media.style.height!==null?a.media.style.height:a.$media[0].getAttribute("height")!==null?a.$media.attr("height"):
a.options["default"+c+"Height"];a.setPlayerSize(a.width,a.height);b.pluginWidth=a.height;b.pluginHeight=a.width}mejs.MediaElement(a.$media[0],b)},showControls:function(a){var c=this;a=typeof a=="undefined"||a;if(!c.controlsAreVisible){if(a){c.controls.css("visibility","visible").stop(true,true).fadeIn(200,function(){c.controlsAreVisible=true});c.container.find(".mejs-control").css("visibility","visible").stop(true,true).fadeIn(200,function(){c.controlsAreVisible=true})}else{c.controls.css("visibility",
"visible").css("display","block");c.container.find(".mejs-control").css("visibility","visible").css("display","block");c.controlsAreVisible=true}c.setControlsSize()}},hideControls:function(a){var c=this;a=typeof a=="undefined"||a;if(c.controlsAreVisible)if(a){c.controls.stop(true,true).fadeOut(200,function(){f(this).css("visibility","hidden").css("display","block");c.controlsAreVisible=false});c.container.find(".mejs-control").stop(true,true).fadeOut(200,function(){f(this).css("visibility","hidden").css("display",
"block")})}else{c.controls.css("visibility","hidden").css("display","block");c.container.find(".mejs-control").css("visibility","hidden").css("display","block");c.controlsAreVisible=false}},controlsTimer:null,startControlsTimer:function(a){var c=this;a=typeof a!="undefined"?a:1500;c.killControlsTimer("start");c.controlsTimer=setTimeout(function(){c.hideControls();c.killControlsTimer("hide")},a)},killControlsTimer:function(){if(this.controlsTimer!==null){clearTimeout(this.controlsTimer);delete this.controlsTimer;
this.controlsTimer=null}},controlsEnabled:true,disableControls:function(){this.killControlsTimer();this.hideControls(false);this.controlsEnabled=false},enableControls:function(){this.showControls(false);this.controlsEnabled=true},meReady:function(a,c){var b=this,d=mejs.MediaFeatures,e=c.getAttribute("autoplay");e=!(typeof e=="undefined"||e===null||e==="false");var g;if(!b.created){b.created=true;b.media=a;b.domNode=c;if(!(d.isAndroid&&b.options.AndroidUseNativeControls)&&!(d.isiPad&&b.options.iPadUseNativeControls)&&
!(d.isiPhone&&b.options.iPhoneUseNativeControls)){b.buildposter(b,b.controls,b.layers,b.media);b.buildkeyboard(b,b.controls,b.layers,b.media);b.buildoverlays(b,b.controls,b.layers,b.media);b.findTracks();for(g in b.options.features){d=b.options.features[g];if(b["build"+d])try{b["build"+d](b,b.controls,b.layers,b.media)}catch(k){}}b.container.trigger("controlsready");b.setPlayerSize(b.width,b.height);b.setControlsSize();if(b.isVideo){if(mejs.MediaFeatures.hasTouch)b.$media.bind("touchstart",function(){if(b.controlsAreVisible)b.hideControls(false);
else b.controlsEnabled&&b.showControls(false)});else{(b.media.pluginType=="native"?b.$media:f(b.media.pluginElement)).click(function(){a.paused?a.play():a.pause()});b.container.bind("mouseenter mouseover",function(){if(b.controlsEnabled)if(!b.options.alwaysShowControls){b.killControlsTimer("enter");b.showControls();b.startControlsTimer(2500)}}).bind("mousemove",function(){if(b.controlsEnabled){b.controlsAreVisible||b.showControls();b.options.alwaysShowControls||b.startControlsTimer(2500)}}).bind("mouseleave",
function(){b.controlsEnabled&&!b.media.paused&&!b.options.alwaysShowControls&&b.startControlsTimer(1E3)})}e&&!b.options.alwaysShowControls&&b.hideControls();b.options.enableAutosize&&b.media.addEventListener("loadedmetadata",function(h){if(b.options.videoHeight<=0&&b.domNode.getAttribute("height")===null&&!isNaN(h.target.videoHeight)){b.setPlayerSize(h.target.videoWidth,h.target.videoHeight);b.setControlsSize();b.media.setVideoSize(h.target.videoWidth,h.target.videoHeight)}},false)}a.addEventListener("play",
function(){for(var h=0,o=mejs.players.length;h<o;h++){var n=mejs.players[h];n.id!=b.id&&b.options.pauseOtherPlayers&&!n.paused&&!n.ended&&n.pause();n.hasFocus=false}b.hasFocus=true},false);b.media.addEventListener("ended",function(){try{b.media.setCurrentTime(0)}catch(h){}b.media.pause();b.setProgressRail&&b.setProgressRail();b.setCurrentRail&&b.setCurrentRail();if(b.options.loop)b.media.play();else!b.options.alwaysShowControls&&b.controlsEnabled&&b.showControls()},false);b.media.addEventListener("loadedmetadata",
function(){b.updateDuration&&b.updateDuration();b.updateCurrent&&b.updateCurrent();if(!b.isFullScreen){b.setPlayerSize(b.width,b.height);b.setControlsSize()}},false);setTimeout(function(){b.setPlayerSize(b.width,b.height);b.setControlsSize()},50);f(window).resize(function(){b.isFullScreen||mejs.MediaFeatures.hasTrueNativeFullScreen&&document.webkitIsFullScreen||b.setPlayerSize(b.width,b.height);b.setControlsSize()});b.media.pluginType=="youtube"&&b.container.find(".mejs-overlay-play").hide()}if(e&&
a.pluginType=="native"){a.load();a.play()}if(b.options.success)typeof b.options.success=="string"?window[b.options.success](b.media,b.domNode,b):b.options.success(b.media,b.domNode,b)}},handleError:function(a){this.controls.hide();this.options.error&&this.options.error(a)},setPlayerSize:function(a,c){if(typeof a!="undefined")this.width=a;if(typeof c!="undefined")this.height=c;if(this.height.toString().indexOf("%")>0){var b=this.media.videoWidth&&this.media.videoWidth>0?this.media.videoWidth:this.options.defaultVideoWidth,
d=this.media.videoHeight&&this.media.videoHeight>0?this.media.videoHeight:this.options.defaultVideoHeight,e=this.container.parent().width();b=parseInt(e*d/b,10);if(this.container.parent()[0].tagName.toLowerCase()==="body"){e=f(window).width();b=f(window).height()}this.container.width(e).height(b);this.$media.width("100%").height("100%");this.container.find("object, embed, iframe").width("100%").height("100%");this.media.setVideoSize&&this.media.setVideoSize(e,b);this.layers.children(".mejs-layer").width("100%").height("100%")}else{this.container.width(this.width).height(this.height);
this.layers.children(".mejs-layer").width(this.width).height(this.height)}},setControlsSize:function(){var a=0,c=0,b=this.controls.find(".mejs-time-rail"),d=this.controls.find(".mejs-time-total");this.controls.find(".mejs-time-current");this.controls.find(".mejs-time-loaded");var e=b.siblings();if(this.options&&!this.options.autosizeProgress)c=parseInt(b.css("width"));if(c===0||!c){e.each(function(){if(f(this).css("position")!="absolute")a+=f(this).outerWidth(true)});c=this.controls.width()-a-(b.outerWidth(true)-
b.outerWidth(false))}b.width(c);d.width(c-(d.outerWidth(true)-d.width()));this.setProgressRail&&this.setProgressRail();this.setCurrentRail&&this.setCurrentRail()},buildposter:function(a,c,b,d){var e=f('<div class="mejs-poster mejs-layer"></div>').appendTo(b);c=a.$media.attr("poster");if(a.options.poster!=="")c=a.options.poster;c!==""&&c!=null?this.setPoster(c):e.hide();d.addEventListener("play",function(){e.hide()},false)},setPoster:function(a){var c=this.container.find(".mejs-poster"),b=c.find("img");
if(b.length==0)b=f('<img width="100%" height="100%" />').appendTo(c);b.attr("src",a)},buildoverlays:function(a,c,b,d){if(a.isVideo){var e=f('<div class="mejs-overlay mejs-layer"><div class="mejs-overlay-loading"><span></span></div></div>').hide().appendTo(b),g=f('<div class="mejs-overlay mejs-layer"><div class="mejs-overlay-error"></div></div>').hide().appendTo(b),k=f('<div class="mejs-overlay mejs-layer mejs-overlay-play"><div class="mejs-overlay-button"></div></div>').appendTo(b).click(function(){d.paused?
d.play():d.pause()});d.addEventListener("play",function(){k.hide();e.hide();g.hide()},false);d.addEventListener("playing",function(){k.hide();e.hide();g.hide()},false);d.addEventListener("pause",function(){mejs.MediaFeatures.isiPhone||k.show()},false);d.addEventListener("waiting",function(){e.show()},false);d.addEventListener("loadeddata",function(){e.show()},false);d.addEventListener("canplay",function(){e.hide()},false);d.addEventListener("error",function(){e.hide();g.show();g.find("mejs-overlay-error").html("Error loading this resource")},
false)}},buildkeyboard:function(a,c,b,d){f(document).keydown(function(e){if(a.hasFocus&&a.options.enableKeyboard)for(var g=0,k=a.options.keyActions.length;g<k;g++)for(var h=a.options.keyActions[g],o=0,n=h.keys.length;o<n;o++)if(e.keyCode==h.keys[o]){e.preventDefault();h.action(a,d);return false}return true});f(document).click(function(e){if(f(e.target).closest(".mejs-container").length==0)a.hasFocus=false})},findTracks:function(){var a=this,c=a.$media.find("track");a.tracks=[];c.each(function(b,d){d=
f(d);a.tracks.push({srclang:d.attr("srclang").toLowerCase(),src:d.attr("src"),kind:d.attr("kind"),label:d.attr("label")||"",entries:[],isLoaded:false})})},changeSkin:function(a){this.container[0].className="mejs-container "+a;this.setPlayerSize(this.width,this.height);this.setControlsSize()},play:function(){this.media.play()},pause:function(){this.media.pause()},load:function(){this.media.load()},setMuted:function(a){this.media.setMuted(a)},setCurrentTime:function(a){this.media.setCurrentTime(a)},
getCurrentTime:function(){return this.media.currentTime},setVolume:function(a){this.media.setVolume(a)},getVolume:function(){return this.media.volume},setSrc:function(a){this.media.setSrc(a)},remove:function(){if(this.media.pluginType=="flash")this.media.remove();else this.media.pluginType=="native"&&this.media.prop("controls",true);this.isDynamic||this.$node.insertBefore(this.container);this.container.remove()}};if(typeof jQuery!="undefined")jQuery.fn.mediaelementplayer=function(a){return this.each(function(){new mejs.MediaElementPlayer(this,
a)})};f(document).ready(function(){f(".mejs-player").mediaelementplayer()});window.MediaElementPlayer=mejs.MediaElementPlayer})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{playpauseText:"Play/Pause"});f.extend(MediaElementPlayer.prototype,{buildplaypause:function(a,c,b,d){var e=f('<div class="mejs-button mejs-playpause-button mejs-play" ><button type="button" aria-controls="'+this.id+'" title="'+this.options.playpauseText+'"></button></div>').appendTo(c).click(function(g){g.preventDefault();d.paused?d.play():d.pause();return false});d.addEventListener("play",function(){e.removeClass("mejs-play").addClass("mejs-pause")},false);
d.addEventListener("playing",function(){e.removeClass("mejs-play").addClass("mejs-pause")},false);d.addEventListener("pause",function(){e.removeClass("mejs-pause").addClass("mejs-play")},false);d.addEventListener("paused",function(){e.removeClass("mejs-pause").addClass("mejs-play")},false)}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{stopText:"Stop"});f.extend(MediaElementPlayer.prototype,{buildstop:function(a,c,b,d){f('<div class="mejs-button mejs-stop-button mejs-stop"><button type="button" aria-controls="'+this.id+'" title="'+this.options.stopText+'"></button></div>').appendTo(c).click(function(){d.paused||d.pause();if(d.currentTime>0){d.setCurrentTime(0);c.find(".mejs-time-current").width("0px");c.find(".mejs-time-handle").css("left","0px");c.find(".mejs-time-float-current").html(mejs.Utility.secondsToTimeCode(0));
c.find(".mejs-currenttime").html(mejs.Utility.secondsToTimeCode(0));b.find(".mejs-poster").show()}})}})})(mejs.$);
(function(f){f.extend(MediaElementPlayer.prototype,{buildprogress:function(a,c,b,d){f('<div class="mejs-time-rail"><span class="mejs-time-total"><span class="mejs-time-loaded"></span><span class="mejs-time-current"></span><span class="mejs-time-handle"></span><span class="mejs-time-float"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div>').appendTo(c);var e=c.find(".mejs-time-total");b=c.find(".mejs-time-loaded");var g=c.find(".mejs-time-current"),
k=c.find(".mejs-time-handle"),h=c.find(".mejs-time-float"),o=c.find(".mejs-time-float-current"),n=function(l){l=l.pageX;var m=e.offset(),i=e.outerWidth(),j=0;j=0;var q=l-m.left;if(l>m.left&&l<=i+m.left&&d.duration){j=(l-m.left)/i;j=j<=0.02?0:j*d.duration;p&&d.setCurrentTime(j);if(!mejs.MediaFeatures.hasTouch){h.css("left",q);o.html(mejs.Utility.secondsToTimeCode(j));h.show()}}},p=false,r=false;e.bind("mousedown",function(l){if(l.which===1){p=true;n(l);return false}});c.find(".mejs-time-total").bind("mouseenter",
function(){r=true;mejs.MediaFeatures.hasTouch||h.show()}).bind("mouseleave",function(){r=false;h.hide()});f(document).bind("mouseup",function(){p=false;h.hide()}).bind("mousemove",function(l){if(p||r)n(l)});d.addEventListener("progress",function(l){a.setProgressRail(l);a.setCurrentRail(l)},false);d.addEventListener("timeupdate",function(l){a.setProgressRail(l);a.setCurrentRail(l)},false);this.loaded=b;this.total=e;this.current=g;this.handle=k},setProgressRail:function(a){var c=a!=undefined?a.target:
this.media,b=null;if(c&&c.buffered&&c.buffered.length>0&&c.buffered.end&&c.duration)b=c.buffered.end(0)/c.duration;else if(c&&c.bytesTotal!=undefined&&c.bytesTotal>0&&c.bufferedBytes!=undefined)b=c.bufferedBytes/c.bytesTotal;else if(a&&a.lengthComputable&&a.total!=0)b=a.loaded/a.total;if(b!==null){b=Math.min(1,Math.max(0,b));this.loaded&&this.total&&this.loaded.width(this.total.width()*b)}},setCurrentRail:function(){if(this.media.currentTime!=undefined&&this.media.duration)if(this.total&&this.handle){var a=
this.total.width()*this.media.currentTime/this.media.duration,c=a-this.handle.outerWidth(true)/2;this.current.width(a);this.handle.css("left",c)}}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{duration:-1,timeAndDurationSeparator:" <span> | </span> "});f.extend(MediaElementPlayer.prototype,{buildcurrent:function(a,c,b,d){f('<div class="mejs-time"><span class="mejs-currenttime">'+(a.options.alwaysShowHours?"00:":"")+(a.options.showTimecodeFrameCount?"00:00:00":"00:00")+"</span></div>").appendTo(c);this.currenttime=this.controls.find(".mejs-currenttime");d.addEventListener("timeupdate",function(){a.updateCurrent()},false)},buildduration:function(a,
c,b,d){if(c.children().last().find(".mejs-currenttime").length>0)f(this.options.timeAndDurationSeparator+'<span class="mejs-duration">'+(this.options.duration>0?mejs.Utility.secondsToTimeCode(this.options.duration,this.options.alwaysShowHours||this.media.duration>3600,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25):(a.options.alwaysShowHours?"00:":"")+(a.options.showTimecodeFrameCount?"00:00:00":"00:00"))+"</span>").appendTo(c.find(".mejs-time"));else{c.find(".mejs-currenttime").parent().addClass("mejs-currenttime-container");
f('<div class="mejs-time mejs-duration-container"><span class="mejs-duration">'+(this.options.duration>0?mejs.Utility.secondsToTimeCode(this.options.duration,this.options.alwaysShowHours||this.media.duration>3600,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25):(a.options.alwaysShowHours?"00:":"")+(a.options.showTimecodeFrameCount?"00:00:00":"00:00"))+"</span></div>").appendTo(c)}this.durationD=this.controls.find(".mejs-duration");d.addEventListener("timeupdate",function(){a.updateDuration()},
false)},updateCurrent:function(){if(this.currenttime)this.currenttime.html(mejs.Utility.secondsToTimeCode(this.media.currentTime,this.options.alwaysShowHours||this.media.duration>3600,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25))},updateDuration:function(){if(this.media.duration&&this.durationD)this.durationD.html(mejs.Utility.secondsToTimeCode(this.media.duration,this.options.alwaysShowHours,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25))}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{muteText:"Mute Toggle",hideVolumeOnTouchDevices:true,audioVolume:"horizontal",videoVolume:"vertical"});f.extend(MediaElementPlayer.prototype,{buildvolume:function(a,c,b,d){if(!(mejs.MediaFeatures.hasTouch&&this.options.hideVolumeOnTouchDevices)){var e=this.isVideo?this.options.videoVolume:this.options.audioVolume,g=e=="horizontal"?f('<div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="'+this.id+'" title="'+this.options.muteText+
'"></button></div><div class="mejs-horizontal-volume-slider"><div class="mejs-horizontal-volume-total"></div><div class="mejs-horizontal-volume-current"></div><div class="mejs-horizontal-volume-handle"></div></div>').appendTo(c):f('<div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="'+this.id+'" title="'+this.options.muteText+'"></button><div class="mejs-volume-slider"><div class="mejs-volume-total"></div><div class="mejs-volume-current"></div><div class="mejs-volume-handle"></div></div></div>').appendTo(c),
k=this.container.find(".mejs-volume-slider, .mejs-horizontal-volume-slider"),h=this.container.find(".mejs-volume-total, .mejs-horizontal-volume-total"),o=this.container.find(".mejs-volume-current, .mejs-horizontal-volume-current"),n=this.container.find(".mejs-volume-handle, .mejs-horizontal-volume-handle"),p=function(i){if(k.is(":visible")){i=Math.max(0,i);i=Math.min(i,1);i==0?g.removeClass("mejs-mute").addClass("mejs-unmute"):g.removeClass("mejs-unmute").addClass("mejs-mute");if(e=="vertical"){var j=
h.height(),q=h.position();i=j-j*i;n.css("top",q.top+i-n.height()/2);o.height(j-i);o.css("top",q.top+i)}else{j=h.width();q=h.position();i=j*i;n.css("left",q.left+i-n.width()/2);o.width(i)}}else{k.show();p(i);k.hide()}},r=function(i){var j=null,q=h.offset();if(e=="vertical"){j=h.height();parseInt(h.css("top").replace(/px/,""),10);j=(j-(i.pageY-q.top))/j;if(q.top==0||q.left==0)return}else{j=h.width();j=(i.pageX-q.left)/j}j=Math.max(0,j);j=Math.min(j,1);p(j);j==0?d.setMuted(true):d.setMuted(false);d.setVolume(j)},
l=false,m=false;g.hover(function(){k.show();m=true},function(){m=false;!l&&e=="vertical"&&k.hide()});k.bind("mouseover",function(){m=true}).bind("mousedown",function(i){r(i);l=true;return false});f(document).bind("mouseup",function(){l=false;!m&&e=="vertical"&&k.hide()}).bind("mousemove",function(i){l&&r(i)});g.find("button").click(function(){d.setMuted(!d.muted)});d.addEventListener("volumechange",function(){if(!l)if(d.muted){p(0);g.removeClass("mejs-mute").addClass("mejs-unmute")}else{p(d.volume);
g.removeClass("mejs-unmute").addClass("mejs-mute")}},false);if(this.container.is(":visible")){p(a.options.startVolume);d.pluginType==="native"&&d.setVolume(a.options.startVolume)}}}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{usePluginFullScreen:true,newWindowCallback:function(){return""},fullscreenText:"Fullscreen"});f.extend(MediaElementPlayer.prototype,{isFullScreen:false,isNativeFullScreen:false,docStyleOverflow:null,isInIframe:false,buildfullscreen:function(a,c,b,d){if(a.isVideo){a.isInIframe=window.location!=window.parent.location;mejs.MediaFeatures.hasTrueNativeFullScreen&&a.container.bind(mejs.MediaFeatures.fullScreenEventName,function(){if(mejs.MediaFeatures.isFullScreen()){a.isNativeFullScreen=
true;a.setControlsSize()}else{a.isNativeFullScreen=false;a.exitFullScreen()}});var e=this,g=f('<div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="'+e.id+'" title="'+e.options.fullscreenText+'"></button></div>').appendTo(c);if(e.media.pluginType==="native"||!e.options.usePluginFullScreen&&!mejs.MediaFeatures.isFirefox)g.click(function(){mejs.MediaFeatures.hasTrueNativeFullScreen&&mejs.MediaFeatures.isFullScreen()||a.isFullScreen?a.exitFullScreen():a.enterFullScreen()});
else{var k=null;if(document.documentElement.style.pointerEvents===""&&!mejs.MediaFeatures.isOpera){var h=false,o=function(){if(h){n.hide();p.hide();r.hide();g.css("pointer-events","");e.controls.css("pointer-events","");h=false}},n=f('<div class="mejs-fullscreen-hover" />').appendTo(e.container).mouseover(o),p=f('<div class="mejs-fullscreen-hover"  />').appendTo(e.container).mouseover(o),r=f('<div class="mejs-fullscreen-hover"  />').appendTo(e.container).mouseover(o),l=function(){var m={position:"absolute",
top:0,left:0};n.css(m);p.css(m);r.css(m);n.width(e.container.width()).height(e.container.height()-e.controls.height());m=g.offset().left-e.container.offset().left;fullScreenBtnWidth=g.outerWidth(true);p.width(m).height(e.controls.height()).css({top:e.container.height()-e.controls.height()});r.width(e.container.width()-m-fullScreenBtnWidth).height(e.controls.height()).css({top:e.container.height()-e.controls.height(),left:m+fullScreenBtnWidth})};f(document).resize(function(){l()});g.mouseover(function(){if(!e.isFullScreen){var m=
g.offset(),i=a.container.offset();d.positionFullscreenButton(m.left-i.left,m.top-i.top,false);g.css("pointer-events","none");e.controls.css("pointer-events","none");n.show();r.show();p.show();l();h=true}});d.addEventListener("fullscreenchange",function(){o()})}else g.mouseover(function(){if(k!==null){clearTimeout(k);delete k}var m=g.offset(),i=a.container.offset();d.positionFullscreenButton(m.left-i.left,m.top-i.top,true)}).mouseout(function(){if(k!==null){clearTimeout(k);delete k}k=setTimeout(function(){d.hideFullscreenButton()},
1500)})}a.fullscreenBtn=g;f(document).bind("keydown",function(m){if((mejs.MediaFeatures.hasTrueNativeFullScreen&&mejs.MediaFeatures.isFullScreen()||e.isFullScreen)&&m.keyCode==27)a.exitFullScreen()})}},enterFullScreen:function(){var a=this;if(!(a.media.pluginType!=="native"&&(mejs.MediaFeatures.isFirefox||a.options.usePluginFullScreen))){docStyleOverflow=document.documentElement.style.overflow;document.documentElement.style.overflow="hidden";normalHeight=a.container.height();normalWidth=a.container.width();
if(a.media.pluginType==="native")if(mejs.MediaFeatures.hasTrueNativeFullScreen){mejs.MediaFeatures.requestFullScreen(a.container[0]);a.isInIframe&&setTimeout(function b(){if(a.isNativeFullScreen)f(window).width()!==screen.width?a.exitFullScreen():setTimeout(b,500)},500)}else if(mejs.MediaFeatures.hasSemiNativeFullScreen){a.media.webkitEnterFullscreen();return}if(a.isInIframe){var c=a.options.newWindowCallback(this);if(c!=="")if(mejs.MediaFeatures.hasTrueNativeFullScreen)setTimeout(function(){if(!a.isNativeFullScreen){a.pause();
window.open(c,a.id,"top=0,left=0,width="+screen.availWidth+",height="+screen.availHeight+",resizable=yes,scrollbars=no,status=no,toolbar=no")}},250);else{a.pause();window.open(c,a.id,"top=0,left=0,width="+screen.availWidth+",height="+screen.availHeight+",resizable=yes,scrollbars=no,status=no,toolbar=no");return}}a.container.addClass("mejs-container-fullscreen").width("100%").height("100%");setTimeout(function(){a.container.css({width:"100%",height:"100%"});a.setControlsSize()},500);if(a.pluginType===
"native")a.$media.width("100%").height("100%");else{a.container.find("object, embed, iframe").width("100%").height("100%");a.media.setVideoSize(f(window).width(),f(window).height())}a.layers.children("div").width("100%").height("100%");a.fullscreenBtn&&a.fullscreenBtn.removeClass("mejs-fullscreen").addClass("mejs-unfullscreen");a.setControlsSize();a.isFullScreen=true}},exitFullScreen:function(){if(this.media.pluginType!=="native"&&mejs.MediaFeatures.isFirefox)this.media.setFullscreen(false);else{if(mejs.MediaFeatures.hasTrueNativeFullScreen&&
(mejs.MediaFeatures.isFullScreen()||this.isFullScreen))mejs.MediaFeatures.cancelFullScreen();document.documentElement.style.overflow=docStyleOverflow;this.container.removeClass("mejs-container-fullscreen").width(normalWidth).height(normalHeight);if(this.pluginType==="native")this.$media.width(normalWidth).height(normalHeight);else{this.container.find("object embed").width(normalWidth).height(normalHeight);this.media.setVideoSize(normalWidth,normalHeight)}this.layers.children("div").width(normalWidth).height(normalHeight);
this.fullscreenBtn.removeClass("mejs-unfullscreen").addClass("mejs-fullscreen");this.setControlsSize();this.isFullScreen=false}}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{startLanguage:"",tracksText:"Captions/Subtitles"});f.extend(MediaElementPlayer.prototype,{hasChapters:false,buildtracks:function(a,c,b,d){if(a.isVideo)if(a.tracks.length!=0){var e;a.chapters=f('<div class="mejs-chapters mejs-layer"></div>').prependTo(b).hide();a.captions=f('<div class="mejs-captions-layer mejs-layer"><div class="mejs-captions-position"><span class="mejs-captions-text"></span></div></div>').prependTo(b).hide();a.captionsText=a.captions.find(".mejs-captions-text");
a.captionsButton=f('<div class="mejs-button mejs-captions-button"><button type="button" aria-controls="'+this.id+'" title="'+this.options.tracksText+'"></button><div class="mejs-captions-selector"><ul><li><input type="radio" name="'+a.id+'_captions" id="'+a.id+'_captions_none" value="none" checked="checked" /><label for="'+a.id+'_captions_none">None</label></li></ul></div></div>').appendTo(c).hover(function(){f(this).find(".mejs-captions-selector").css("visibility","visible")},function(){f(this).find(".mejs-captions-selector").css("visibility",
"hidden")}).delegate("input[type=radio]","click",function(){lang=this.value;if(lang=="none")a.selectedTrack=null;else for(e=0;e<a.tracks.length;e++)if(a.tracks[e].srclang==lang){a.selectedTrack=a.tracks[e];a.captions.attr("lang",a.selectedTrack.srclang);a.displayCaptions();break}});a.options.alwaysShowControls?a.container.find(".mejs-captions-position").addClass("mejs-captions-position-hover"):a.container.bind("mouseenter",function(){a.container.find(".mejs-captions-position").addClass("mejs-captions-position-hover")}).bind("mouseleave",
function(){d.paused||a.container.find(".mejs-captions-position").removeClass("mejs-captions-position-hover")});a.trackToLoad=-1;a.selectedTrack=null;a.isLoadingTrack=false;for(e=0;e<a.tracks.length;e++)a.tracks[e].kind=="subtitles"&&a.addTrackButton(a.tracks[e].srclang,a.tracks[e].label);a.loadNextTrack();d.addEventListener("timeupdate",function(){a.displayCaptions()},false);d.addEventListener("loadedmetadata",function(){a.displayChapters()},false);a.container.hover(function(){if(a.hasChapters){a.chapters.css("visibility",
"visible");a.chapters.fadeIn(200)}},function(){a.hasChapters&&!d.paused&&a.chapters.fadeOut(200,function(){f(this).css("visibility","hidden");f(this).css("display","block")})});a.node.getAttribute("autoplay")!==null&&a.chapters.css("visibility","hidden")}},loadNextTrack:function(){this.trackToLoad++;if(this.trackToLoad<this.tracks.length){this.isLoadingTrack=true;this.loadTrack(this.trackToLoad)}else this.isLoadingTrack=false},loadTrack:function(a){var c=this,b=c.tracks[a],d=function(){b.isLoaded=
true;c.enableTrackButton(b.srclang,b.label);c.loadNextTrack()};b.isTranslation?mejs.TrackFormatParser.translateTrackText(c.tracks[0].entries,c.tracks[0].srclang,b.srclang,c.options.googleApiKey,function(e){b.entries=e;d()}):f.ajax({url:b.src,success:function(e){b.entries=mejs.TrackFormatParser.parse(e);d();b.kind=="chapters"&&c.media.duration>0&&c.drawChapters(b)},error:function(){c.loadNextTrack()}})},enableTrackButton:function(a,c){if(c==="")c=mejs.language.codes[a]||a;this.captionsButton.find("input[value="+
a+"]").prop("disabled",false).siblings("label").html(c);this.options.startLanguage==a&&f("#"+this.id+"_captions_"+a).click();this.adjustLanguageBox()},addTrackButton:function(a,c){if(c==="")c=mejs.language.codes[a]||a;this.captionsButton.find("ul").append(f('<li><input type="radio" name="'+this.id+'_captions" id="'+this.id+"_captions_"+a+'" value="'+a+'" disabled="disabled" /><label for="'+this.id+"_captions_"+a+'">'+c+" (loading)</label></li>"));this.adjustLanguageBox();this.container.find(".mejs-captions-translations option[value="+
a+"]").remove()},adjustLanguageBox:function(){this.captionsButton.find(".mejs-captions-selector").height(this.captionsButton.find(".mejs-captions-selector ul").outerHeight(true)+this.captionsButton.find(".mejs-captions-translations").outerHeight(true))},displayCaptions:function(){if(typeof this.tracks!="undefined"){var a,c=this.selectedTrack;if(c!=null&&c.isLoaded)for(a=0;a<c.entries.times.length;a++)if(this.media.currentTime>=c.entries.times[a].start&&this.media.currentTime<=c.entries.times[a].stop){this.captionsText.html(c.entries.text[a]);
this.captions.show();return}this.captions.hide()}},displayChapters:function(){var a;for(a=0;a<this.tracks.length;a++)if(this.tracks[a].kind=="chapters"&&this.tracks[a].isLoaded){this.drawChapters(this.tracks[a]);this.hasChapters=true;break}},drawChapters:function(a){var c=this,b,d,e=d=0;c.chapters.empty();for(b=0;b<a.entries.times.length;b++){d=a.entries.times[b].stop-a.entries.times[b].start;d=Math.floor(d/c.media.duration*100);if(d+e>100||b==a.entries.times.length-1&&d+e<100)d=100-e;c.chapters.append(f('<div class="mejs-chapter" rel="'+
a.entries.times[b].start+'" style="left: '+e.toString()+"%;width: "+d.toString()+'%;"><div class="mejs-chapter-block'+(b==a.entries.times.length-1?" mejs-chapter-block-last":"")+'"><span class="ch-title">'+a.entries.text[b]+'</span><span class="ch-time">'+mejs.Utility.secondsToTimeCode(a.entries.times[b].start)+"&ndash;"+mejs.Utility.secondsToTimeCode(a.entries.times[b].stop)+"</span></div></div>"));e+=d}c.chapters.find("div.mejs-chapter").click(function(){c.media.setCurrentTime(parseFloat(f(this).attr("rel")));
c.media.paused&&c.media.play()});c.chapters.show()}});mejs.language={codes:{af:"Afrikaans",sq:"Albanian",ar:"Arabic",be:"Belarusian",bg:"Bulgarian",ca:"Catalan",zh:"Chinese","zh-cn":"Chinese Simplified","zh-tw":"Chinese Traditional",hr:"Croatian",cs:"Czech",da:"Danish",nl:"Dutch",en:"English",et:"Estonian",tl:"Filipino",fi:"Finnish",fr:"French",gl:"Galician",de:"German",el:"Greek",ht:"Haitian Creole",iw:"Hebrew",hi:"Hindi",hu:"Hungarian",is:"Icelandic",id:"Indonesian",ga:"Irish",it:"Italian",ja:"Japanese",
ko:"Korean",lv:"Latvian",lt:"Lithuanian",mk:"Macedonian",ms:"Malay",mt:"Maltese",no:"Norwegian",fa:"Persian",pl:"Polish",pt:"Portuguese",ro:"Romanian",ru:"Russian",sr:"Serbian",sk:"Slovak",sl:"Slovenian",es:"Spanish",sw:"Swahili",sv:"Swedish",tl:"Tagalog",th:"Thai",tr:"Turkish",uk:"Ukrainian",vi:"Vietnamese",cy:"Welsh",yi:"Yiddish"}};mejs.TrackFormatParser={pattern_identifier:/^([a-zA-z]+-)?[0-9]+$/,pattern_timecode:/^([0-9]{2}:[0-9]{2}:[0-9]{2}([,.][0-9]{1,3})?) --\> ([0-9]{2}:[0-9]{2}:[0-9]{2}([,.][0-9]{3})?)(.*)$/,
split2:function(a,c){return a.split(c)},parse:function(a){var c=0;a=this.split2(a,/\r?\n/);for(var b={text:[],times:[]},d,e;c<a.length;c++)if(this.pattern_identifier.exec(a[c])){c++;if((d=this.pattern_timecode.exec(a[c]))&&c<a.length){c++;e=a[c];for(c++;a[c]!==""&&c<a.length;){e=e+"\n"+a[c];c++}b.text.push(e);b.times.push({start:mejs.Utility.timeCodeToSeconds(d[1]),stop:mejs.Utility.timeCodeToSeconds(d[3]),settings:d[5]})}}return b}};if("x\n\ny".split(/\n/gi).length!=3)mejs.TrackFormatParser.split2=
function(a,c){var b=[],d="",e;for(e=0;e<a.length;e++){d+=a.substring(e,e+1);if(c.test(d)){b.push(d.replace(c,""));d=""}}b.push(d);return b}})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{contextMenuItems:[{render:function(a){if(typeof a.enterFullScreen=="undefined")return null;return a.isFullScreen?"Turn off Fullscreen":"Go Fullscreen"},click:function(a){a.isFullScreen?a.exitFullScreen():a.enterFullScreen()}},{render:function(a){return a.media.muted?"Unmute":"Mute"},click:function(a){a.media.muted?a.setMuted(false):a.setMuted(true)}},{isSeparator:true},{render:function(){return"Download Video"},click:function(a){window.location.href=a.media.currentSrc}}]});
f.extend(MediaElementPlayer.prototype,{buildcontextmenu:function(a){a.contextMenu=f('<div class="mejs-contextmenu"></div>').appendTo(f("body")).hide();a.container.bind("contextmenu",function(c){if(a.isContextMenuEnabled){c.preventDefault();a.renderContextMenu(c.clientX-1,c.clientY-1);return false}});a.container.bind("click",function(){a.contextMenu.hide()});a.contextMenu.bind("mouseleave",function(){a.startContextMenuTimer()})},isContextMenuEnabled:true,enableContextMenu:function(){this.isContextMenuEnabled=
true},disableContextMenu:function(){this.isContextMenuEnabled=false},contextMenuTimeout:null,startContextMenuTimer:function(){var a=this;a.killContextMenuTimer();a.contextMenuTimer=setTimeout(function(){a.hideContextMenu();a.killContextMenuTimer()},750)},killContextMenuTimer:function(){var a=this.contextMenuTimer;if(a!=null){clearTimeout(a);delete a}},hideContextMenu:function(){this.contextMenu.hide()},renderContextMenu:function(a,c){for(var b=this,d="",e=b.options.contextMenuItems,g=0,k=e.length;g<
k;g++)if(e[g].isSeparator)d+='<div class="mejs-contextmenu-separator"></div>';else{var h=e[g].render(b);if(h!=null)d+='<div class="mejs-contextmenu-item" data-itemindex="'+g+'" id="element-'+Math.random()*1E6+'">'+h+"</div>"}b.contextMenu.empty().append(f(d)).css({top:c,left:a}).show();b.contextMenu.find(".mejs-contextmenu-item").each(function(){var o=f(this),n=parseInt(o.data("itemindex"),10),p=b.options.contextMenuItems[n];typeof p.show!="undefined"&&p.show(o,b);o.click(function(){typeof p.click!=
"undefined"&&p.click(b);b.contextMenu.hide()})});setTimeout(function(){b.killControlsTimer("rev3")},100)}})})(mejs.$);
