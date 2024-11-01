function do_sliding(btime,etime,h,d,u){
setTimeout(function(){jQuery("#smart_main").animate({height:h+'px'},d*100);},btime*1000);
setTimeout(function(){jQuery("#smart_main").animate({height:'0px'},u*100);},etime*1000);
}