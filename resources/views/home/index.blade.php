<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/home/img/asset-favicon.ico">
    <title>在线教育网</title>
    <link rel="stylesheet" href="/home/plugins/normalize-css/normalize.css" />
    <link rel="stylesheet" href="/home/plugins/bootstrap/dist/css/bootstrap.css" />
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
        }

        body {
            overflow: hidden
        }

        .nav a {
            color: #000;
            padding: 0 5px !important;
        }

        .nav li {
            border-bottom: dashed 1px #fff;
            margin: 0 15px;
            line-height: 30px;
        }

        .nav div i {
            display: inline-block;
            border-bottom: solid 1px #fff;
            width: 100%;
            cursor: pointer;
            line-height: 40px;
            padding-left: 10px;
            margin-top: 10px;
            font-size: 16px;
        }

        .nav div i:before {
            font-size: 12px;
            position: relative;
            top: 0px;
            left: -3px;
        }

        .active a {
            color: #f00;
        }

        .title {
            color: #fff;
            background: #bebebe;
            font-size: 28px;
            line-height: 50px;
        }

        .row-left,
        .row-rit {
            height: 100%;
            float: left;
            position: relative;
        }

        .row-left {
            background: #efefef;
            padding: 0px;
            border-right: solid 2px #999;
            overflow: auto;
            width: 200px;
            position: relative;
        }

        .left-show {
            background: #999;
            color: #fff;
            top: 50%;
            left: 200px;
            z-index: 999;
            position: absolute;
            width: 10px;
            height: 60px;
            border-radius: 0px 5px 5px 0px;
        }

        .left-show:before {
            font-size: 12px;
            position: relative;
            top: 20px;
            left: -2px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- 页面头部 -->

    <div class="left-show glyphicon glyphicon-step-backward"></div>
    <div class="row-left">
        <div class="title text-center">爱游网</div>

        <div class='nav'>

            <div><i class="glyphicon glyphicon-collapse-down">主要页面</i>


                <li><a href="./learing-index.html" target="right">首页</a></li>



                <li><a href="./learing-list.html" target="right">列表页</a></li>



                <li><a href="./learing-article.html" target="right">详情页</a></li>



                <li><a href="./learing-teacher-info.html" target="right">教师信息</a></li>



                <li><a href="./learing-problem-feedback.html" target="right">问题反馈</a></li>



                <li><a href="./learing-pay.html" target="right">支付页</a></li>


            </div>

            <div><i class="glyphicon glyphicon-collapse-down">课程学习相关页面</i>


                <li><a href="./learing-course-video.html" target="right">视频学习</a></li>



                <li><a href="./learing-course-answer.html" target="right">小结测试</a></li>



                <li><a href="./learing-course-problem.html" target="right">测试反馈</a></li>



                <li><a href="./learing-course-document.html" target="right">阅读页</a></li>


            </div>

            <div><i class="glyphicon glyphicon-collapse-down">个人主页</i>


                <li><a href="./learing-personal.html" target="right">我的课程</a></li>



                <li><a href="./learing-personal-all-course.html" target="right">全部课程</a></li>



                <li><a href="./learing-setting.html" target="right">设置</a></li>


            </div>

            <div><i class="glyphicon glyphicon-collapse-down">课程主页</i>


                <li><a href="./learing-course-page.html" target="right">课程主页</a></li>



                <li><a href="./learing-course-week.html" target="right">第一周</a></li>



                <li><a href="./learing-course-score.html" target="right">成绩</a></li>



                <li><a href="./learing-course-week-info.html" target="right">课程信息</a></li>


            </div>

            <div><i class="glyphicon glyphicon-collapse-down">登录注册</i>


                <li><a href="./learing-sign.html" target="right">登录</a></li>



                <li><a href="./learing-student-register.html" target="right">学生注册</a></li>



                <li><a href="./learing-teacher-register.html" target="right">老师注册</a></li>



                <li><a href="./learing-forget-password-one.html" target="right">忘记密码1</a></li>



                <li><a href="./learing-forget-password-two.html" target="right">忘记密码2</a></li>



                <li><a href="./learing-forget-password-three.html" target="right">忘记密码3</a></li>



                <li><a href="./learing-forget-password-ok.html" target="right">完成页</a></li>


            </div>

        </div>
    </div>
    <div class="row-rit">
        <iframe name="right" id="iframepage" src="./learing-index.html" width="100%" height="100%" frameborder="0" ranat="server"></iframe>
    </div>
    <script type="text/javascript" src="/home/plugins/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="/home/plugins/bootstrap/dist/js/bootstrap.js"></script>
    <script>
        $('.nav li:first').addClass('active')
        $('.nav div i').click(function() {
            if ($(this).hasClass("glyphicon-collapse-down")) {
                $(this).removeClass('glyphicon-collapse-down').addClass('glyphicon-expand');
                $(this).parent().find('li').hide();
            } else {
                $(this).removeClass('glyphicon-expand').addClass('glyphicon-collapse-down');
                $(this).parent().find('li').show();
            }
        });
        $('.nav li').click(function() {
            $('.nav li').removeClass('active')
            $(this).addClass('active');
        });


        $(function() {
            var wd = 200;
            $(".row-rit").css('width', $('body').width() - wd + 'px');
            $(".left-show").click(function() {
                if ($(this).hasClass('glyphicon-step-backward')) {
                    $(this).removeClass('glyphicon-step-backward').addClass('glyphicon-step-forward').css("left", '0');
                    $(".row-left").hide();
                    $(".row-rit").css('width', $('body').width() + 'px');
                } else {
                    $(this).removeClass('glyphicon-step-forward').addClass('glyphicon-step-backward').css("left", wd + 'px');
                    $(".row-left").show();
                    $(".row-rit").css('width', $('body').width() - wd + 'px');
                }
            })
        })



        window.onresize = function() {
            // document.getElementById('iframepage').contentWindow.location.reload(true);
            //  document.frames("#iframepage").document.location = "./travel-index.html";
            location.reload(); //修改因缩小浏览器导致页面消失

        }
    </script>
</body>