<script type="text/javascript" src="/js/floating-1.12.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>

<div class="panel panel-default" id="floatdiv"></div>

<script type="text/javascript">
    $("#floatdiv").css({
        "position": "absolute",
        "width": "300px",
        "height": "400px",
        "background": "#FFFFFF",
        "border": "1px solid #555",
        "z-index": "100",
        "border-radius": "5px",
        "opacity": "0.9"
    });

    $("#floatdiv").append('<div class="panel-heading" style="background-color: #555;color: #fff;"><h4><i class="fa fa-fw fa-rss fa-1x" style="color: yellowgreen"></i> 公司新闻 </h4></div><div class="panel-body"><?php echo "我是php变量"; ?></div>');
</script>
<script type="text/javascript">
    floatingMenu.add('floatdiv',
            {
                // Represents distance from left or right browser window  
                // border depending upon property used. Only one should be  
                // specified.  
                // targetLeft: 0,  
                targetRight: 20,
                // Represents distance from top or bottom browser window  
                // border depending upon property used. Only one should be  
                // specified.  
//                        targetTop: 50,
                targetBottom: 20,
                // Uncomment one of those if you need centering on  
                // X- or Y- axis.  
                // centerX: true,  
                // centerY: true,  

                // Remove this one if you don't want snap effect  
                snap: true
            });
</script> 