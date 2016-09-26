<script type="text/javascript" src="/js/floating-1.12.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>

<div class="panel panel-default portfolio-item" id="floatdiv"></div>

<script type="text/javascript">
    $("#floatdiv").html('<div class="panel-heading" style="background-color: #f0f0f0;">\n\
<h4><i class="fa fa-fw fa-rss-square"></i> 公司动态 </h4></div>\n\
<div class="panel-body" id="floatMsg">\n\
<p style="text-indent:2em;"><strong><?php echo "广东康盛生物科技有限公司创建于2003年12月，是经过广东省工商行政管理局及广东省食品药品监督局正式批准注册的集生物技术产品及医疗产品推广、应用、销售和服务于一身的专业化公司。"; ?></strong></p></div>');

    $("#floatdiv").css({
        "position": "absolute",
        "width": "225px",
        "height": "80px",
        "background": "#FFFFFF",
        "border": "1px solid #ccc",
        "z-index": "100",
        "border-radius": "5px",
        "opacity": "0.9"
    });

    $("#floatMsg").hide();
</script>

<script type="text/javascript">
    $("#floatdiv").hover(
            function () {
                $(this).css({
                    "border-color": "#009eae"
                });

                $('#floatdiv > .panel-heading').css({
                    "background-color": "#009eae",
                    "color": "white"
                });
            },
            function () {
                $(this).css({
                    "border-color": "#ccc"
                });

                $('#floatdiv > .panel-heading').css({
                    "background-color": "#f0f0f0",
                    "color": "black"
                });
            });

    var action = 2;

    $("#floatdiv").on("click", changeBox);

    function changeBox() {
        if (action == 1) {
            $("#floatdiv").css({
                "position": "absolute",
                "width": "225px",
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
                "width": "225px",
                "height": "300px",
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
                targetRight: 50,
                // Represents distance from top or bottom browser window  
                // border depending upon property used. Only one should be  
                // specified.  
//                        targetTop: 50,
                targetBottom: 50,
                // Uncomment one of those if you need centering on  
                // X- or Y- axis.  
                // centerX: true,  
                // centerY: true,  

                // Remove this one if you don't want snap effect  
                snap: true
            });
</script> 