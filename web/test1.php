<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test 1</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/site1.css" rel="stylesheet">
    <link href="/css/test1.css" rel="stylesheet">
</head>

<body>

<div class="wrap">
    <nav id="w0" class="navbar-fixed-top navbar" role="navigation" style="border-radius: 0;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Что будете заказывать?</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Пиццы</a></li>
                    <li><a href="#">Закуски</a></li>
                    <li><a href="#">Напитки</a></li>
                    <li><a href="#">Соусы</a></li>
                    <li><a href="#">Другое</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="site-test-layout">
            <div class="row" style="margin: 0px">
                <?php
                    for ($i =0; $i<4; $i++){
                        echo '<div class="col-sm-6 col-md-4 col-lg-3" style="padding: 5px">
                                <div class="card-block" id="cd1'.$i.'">
                                <div class="title"><b>Морская</b> <span class="badge" data-toggle="tooltip" data-title="Охотничьи колбаски, ветчина, сыр, грибы, курица, морепродукты"><i>i</i></span>
                                </div>
                                <div class="chois">
                                    <div class="left-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 25<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 35</div>
                                    <div class="right-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> И30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> И35<br>
                                            <br>
                                            <br>
                                    </div>

                                </div>

                                <div class="footer-card-block">
                                    <div class="btn btn-info pull-left">Редактировать</div>
                                    <div class="btn btn-warning pull-right">В корзину</div>
                                </div>
                            </div>
                        </div>'; 

                        echo '<div class="col-sm-6 col-md-4 col-lg-3" style="padding: 5px">
                                <div class="card-block" id="cd2'.$i.'">
                                <div class="title"><b>Доддо</b>  <span class="badge" data-toggle="tooltip" data-title="Охотничьи колбаски, ветчина, сыр, грибы, курица, морепродукты"><i>i</i></span>
                                </div>
                                <div class="chois">
                                    <div class="left-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 25<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 35</div>
                                    <div class="right-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> И30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> И35<br>
                                            <br>
                                            <br>
                                    </div>

                                </div>

                                <div class="footer-card-block">
                                    <div class="btn btn-info pull-left">Редактировать</div>
                                    <div class="btn btn-warning pull-right">В корзину</div>
                                </div>
                            </div>
                        </div>'; 

                        echo '<div class="col-sm-6 col-md-4 col-lg-3" style="padding: 5px">
                                <div class="card-block" id="cd3'.$i.'">
                                <div class="title"><b>Итальянска</b>  <span class="badge" data-toggle="tooltip" data-title="Охотничьи колбаски, ветчина, сыр, грибы, курица, морепродукты"><i>i</i></span>
                                </div>
                                <div class="chois">
                                    <div class="left-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 25<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 35</div>
                                    <div class="right-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> И30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> И35<br>
                                            <br>
                                            <br>
                                    </div>

                                </div>

                                <div class="footer-card-block">
                                    <div class="btn btn-info pull-left">Редактировать</div>
                                    <div class="btn btn-warning pull-right">В корзину</div>
                                </div>
                            </div>
                        </div>';   

                        echo '<div class="col-sm-6 col-md-4 col-lg-3" style="padding: 5px">
                                <div class="card-block" id="cd4'.$i.'">
                                <div class="title"><b>Чили</b>  <span class="badge" data-toggle="tooltip" data-title="Охотничьи колбаски, ветчина, сыр, грибы, курица, морепродукты"><i>i</i></span>
                                </div>
                                <div class="chois">
                                    <div class="left-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 25<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 35</div>
                                    <div class="right-col">
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> И30<br>
                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> И35<br>
                                            <br>
                                            <br>
                                    </div>

                                </div>

                                <div class="footer-card-block">
                                    <div class="btn btn-info pull-left">Редактировать</div>
                                    <div class="btn btn-warning pull-right">В корзину</div>
                                </div>
                            </div>
                        </div>';                         
                    }
                ?>
               
            </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company 2017</p>

        <p class="pull-right">Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a></p>
    </div>
</footer>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script>
function simple_tooltip(target_items){
    var my_tooltip;
    $(target_items).each(function(i){
        $(this).hover(function(kmouse){
            var offsetLeft = $(this).position().left;
            var width = $(this).outerWidth();
            var widthParent = $(this).closest('.card-block').width();
            var lPos = $(this).position().left;
            var tPos = $(this).position().top-5;
            var widthTT = 130;
            var div = '<div class="';
            if ((offsetLeft+width/2) > widthParent/2) {
                name = "tt-left";
                widthTT = lPos + width-5;
                lPos = 5;
                div = div + name+'" id="'+name+i+'"><div class="tt-inner">'+$(this).data('title')+'</div>'+
                    '<div class="tt-arrow"></div></div>';
            } else {
                name = "tt-right";
                lPos += width/2;
                widthTT = widthParent - lPos;
                div = div + name+'" id="'+name+i+'"><div class="tt-arrow"></div>'+
                    '<div class="tt-inner">'+$(this).data('title')+'</div></div>';
            }
            $(this).closest('.title').append(div);
            my_tooltip = $("#"+name+i);
            my_tooltip.css({left:lPos, top:tPos, width: widthTT});
            my_tooltip.css({opacity:1, display:"none"}).fadeIn(1);
        },function(){
            var pr = $(this).closest('.title');
            var chL= pr.children(".tt-left");
            var chR= pr.children(".tt-right");
                chL.remove();
                chR.remove();
        });
    });
}

$(document).ready(function(){
    simple_tooltip(".badge");
});
</script>
</body>
</html>
