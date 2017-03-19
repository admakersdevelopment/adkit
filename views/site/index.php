<?php

/* @var $this yii\web\View */

$this->title = 'Admakers Adkit';
?>
<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
echo '<div class="alert alert-' . $key . '">' . $message . '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>';
}
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-md-12">
                <h2>Welcome to Admakers Adkit</h2>

                <p>This is an online resource for clients falling under the GMSA Dealership network. The library contains current                       advert examples, previous campaigns and new material - as well as a variety of template-based layouts. All of these ads                 can be customised to suit individual client needs. .</p>
            	<p>GM Dealers can login and then access all the content.</p>
            	<p>Once logged in, begin by clicking "Browse all Collections" in the right side menu.</p>
            	<p>Online briefing: Click on the tab "Sumbit Online Brief" in the top menu.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Client Service Ambassadors</h3>
                <p>OJ van Jaarsveld: <a class="color-blue" href="mailto:oj@admakers.com">oj@admakers.com</a> (Account Director)</p>
                <p>Danwine Liebenberg: <a class="color-blue" href="mailto:danwine@admakers.com">danwine@admakers.com</a> (Account Manager)</p>
                <p>Gloria Kula: <a class="color-blue" href="mailto:gloria@admakers.com">gloria@admakers.com</a></p>
                <p>Neil Britz-Allers: <a class="color-blue" href="mailto:neil@admakers.com">neil@admakers.com</a></p>
                <p>Zaida Cottle: <a class="color-blue" href="mailto:zaida@admakers.com">zaida@admakers.com</a></p>
            </div>
            <div class="col-md-6">
                <h3>Sharecall line: 0861 GMSA AD (4672 23)</h3>
                <p>Telephone: +27 (0)21 448 7074</p>
                <p>Fax: +27 (0)21 448 7095</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Disclaimer</h4>
                <p>Please note that the ad templates shown on Adkit are of low resolution/quality and are to be used for reference purposes only. All changes must be requested via AdMakers. AdMakers will create the artwork for you and supply it to publications.</p>
            </div>
        </div>
    </div>
</div>
