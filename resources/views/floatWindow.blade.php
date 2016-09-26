<script type="text/javascript" src="/js/floating-1.12.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>

<div class="panel panel-default" id="floatdiv"></div>

<script type="text/javascript">
    $("#floatdiv").html('<div class="panel-heading" style="background-color: #009eae;color: white;">\n\
<h4><i class="fa fa-fw fa-rss"></i> 公司动态 </h4></div>\n\
<div class="panel-body" id="floatMsg">\n\
<strong><?php echo "我是php变量"; ?></strong></div>');

    $("#floatdiv").css({
        "position": "absolute",
        "width": "270px",
        "height": "80px",
        "background": "#FFFFFF",
        "border": "1px solid #009eae",
        "z-index": "100",
        "border-radius": "5px",
        "opacity": "0.9"
    });

    $("#floatMsg").hide();
</script>

<script type="text/javascript">
    var action = 2;

    $("#floatdiv").on("click", changeBox);

    function changeBox() {
        if (action == 1) {
            $("#floatdiv").css({
                "position": "absolute",
                "width": "270px",
                "height": "80px",
                "background": "#FFFFFF",
                "border": "1px solid #009eae",
                "z-index": "100",
                "border-radius": "5px",
                "opacity": "0.9"
            });

            $("#floatMsg").hide();
            action = 2;
        } else {
            $("#floatdiv").css({
                "position": "absolute",
                "width": "270px",
                "height": "360px",
                "background": "#FFFFFF",
                "border": "1px solid #009eae",
                "z-index": "100",
                "border-radius": "5px",
                "opacity": "0.9"
            });

            $("#floatMsg").show();
            action = 1;
        }
    }

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