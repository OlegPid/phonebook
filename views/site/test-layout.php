<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->registerCssFile('/css/test.css');
?>
<div class="site-test-layout">
    <div class="row">
        <div class="col-md-4" style="padding: 0px">
            <div class="card-block text-center activ">
                <div class="title">Комбо Масло</div>
                <div class="weight">30</div>
                <div class="color-bar"></div>
                <div class="footer-card-block">
                    <div class="info left_"><span>9-5</span></div><div class="time right_"><span>10:26</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding: 0px">
            <div class="card-block text-center">
                <div class="title">Комбо Сыр</div>
                <div class="weight">И30</div>
                <div class="color-bar"></div>
                <div class="footer-card-block">
                    <div class="info left_"><span>9-5</span></div><div class="time right_"><span>10:26</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding: 0px">
            <div class="card-block text-center">
                <div class="title">Комбо Бекон</div>
                <div class="weight">30</div>
                <div class="color-bar"></div>
                <div class="footer-card-block">
                    <div class="info left_"><span>9-5</span></div><div class="time right_"><span>10:26</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row data-block">
        <div class="col-md-4" style="padding: 0px">
            <div class="card-block text-center">
                <div class="title">Комбо Ветч</div>
                <div class="weight">30</div>
                <div class="color-bar"></div>
                <div class="footer-card-block">
                    <div class="info left_"><span>9-5</span></div><div class="time right_"><span>10:26</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding: 0px">
            <div class="card-block text-center">
                <div class="title">Комбо Масло</div>
                <div class="weight">30</div>
                <div class="color-bar"></div>
                <div class="footer-card-block">
                    <div class="info left_"><span>9-5</span></div><div class="time right_ time-out"><span>16:01</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding: 0px">
            <div class="card-block null-color"></div>
        </div>
    </div>
    <div class="row footer-block">
        <div class="col-md-6 text-left" style="padding: 0px; border-right: none;">
            <div class="left-txt">
                <span><b>Тесто</b></span>
            </div>

        </div>
        <div class="col-md-6 text-right" style="padding: 0px; border-left: none;">
            <span class="right-txt">В очереди: <b>0</b></span>
        </div>
    </div>
</div>
