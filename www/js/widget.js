jQuery.extend(jQuery.easing,{easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b;}});jQuery(document).ready(function($){var isopen=false,bitHeight=$('#bitsubscribe').height(),$bit=$('#bit');setTimeout(function(){$bit.animate({bottom:'-'+bitHeight-30+'px'},200);if(document.location.href.indexOf('blogsub=')!==-1){open();}},300);var open=function(){if(isopen)return;isopen=true;$('a.bsub',$bit).addClass('open');$('#bitsubscribe',$bit).addClass('open')
$bit.stop();$bit.animate({bottom:'0px'},{duration:400,easing:"easeOutCubic"});}
var close=function(){if(!isopen)return;isopen=false;$bit.stop();$bit.animate({bottom:'-'+bitHeight-30+'px'},200,function(){$('a.bsub',$bit).removeClass('open');$('#bitsubscribe',$bit).removeClass('open');});}
$('a.bsub',$bit).click(function(){if(!isopen)
open();else
close();});var target=$bit.has('form').length?$bit:$(document);target.keyup(function(e){if(27==e.keyCode)close();});});