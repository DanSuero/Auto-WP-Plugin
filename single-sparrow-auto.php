<?php
get_header();

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

setlocale(LC_MONETARY, 'en_US.UTF-8');

global $post;

$grab = get_post_meta($post->ID, "about_the_truck_vin-number", true);

$trucks = new ImportXML();
$trucks->set_xml_URL("https://clients.automanager.com/0254448e2be24576857eb0d1e26a96bf/inventory.xml?ID=ee30fb1027&VehicleCategory=Passenger&Photos=1&Features=1");
$xmlQuery = array();
foreach(ImportXML::$converted_xml->Vehicle as $data){
    array_push($xmlQuery, "$data->VIN");
}

$found = array_search($grab, $xmlQuery);

//var_dump(get_post_meta($post->ID,"vdw_gallery_id",true));
?>

<style>
    .elementor-341 .elementor-element.elementor-element-c9e194e:not(.elementor-motion-effects-element-type-background),
    .elementor-341 .elementor-element.elementor-element-c9e194e>.elementor-motion-effects-container>.elementor-motion-effects-layer {
        background-color: #ededed;
    }

    .elementor-341 .elementor-element.elementor-element-c9e194e {
        transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
        padding: 20px 0px 20px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-c9e194e>.elementor-background-overlay {
        transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    }

    .elementor-341 .elementor-element.elementor-element-3f63c50.elementor-widget-heading .elementor-heading-title {
        color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-3f63c50 .elementor-heading-title {
        font-family: "Rubik", Sans-serif;
        font-size: 55px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-408c62b.elementor-widget-heading .elementor-heading-title {
        color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-408c62b .elementor-heading-title {
        font-family: "Rubik", Sans-serif;
        font-size: 27px;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-4319a6c.elementor-widget-heading .elementor-heading-title {
        color: #154d80;
    }

    .elementor-341 .elementor-element.elementor-element-4319a6c .elementor-heading-title {
        font-family: "Rubik", Sans-serif;
        font-size: 15px;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-bd77dac>.elementor-column-wrap>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
        margin-bottom: 0px;
    }

    .elementor-341 .elementor-element.elementor-element-30afc2c .elementor-text-editor {
        text-align: center;
    }

    .elementor-341 .elementor-element.elementor-element-30afc2c {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        font-size: 17px;
        font-weight: 400;
        text-transform: capitalize;
    }

    .elementor-341 .elementor-element.elementor-element-30afc2c>.elementor-widget-container {
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-1101212 .elementor-button .elementor-align-icon-right {
        margin-left: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-1101212 .elementor-button .elementor-align-icon-left {
        margin-right: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-1101212 a.elementor-button,
    .elementor-341 .elementor-element.elementor-element-1101212 .elementor-button {
        font-size: 14px;
        text-transform: uppercase;
        fill: #545454;
        color: #545454;
        background-color: #fdd247;
        border-radius: 5px 5px 5px 5px;
        padding: 10px 20px 10px 20px;
    }

    .elementor-341 .elementor-element.elementor-element-1101212 a.elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-1101212 .elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-1101212 a.elementor-button:focus,
    .elementor-341 .elementor-element.elementor-element-1101212 .elementor-button:focus {
        background-color: #6ec1e4;
    }

    .elementor-341 .elementor-element.elementor-element-0a41b57 {
        padding: 40px 40px 20px 40px;
    }

    .elementor-341 .elementor-element.elementor-element-d0544ae .elementor-swiper-button.elementor-swiper-button-prev,
    .elementor-341 .elementor-element.elementor-element-d0544ae .elementor-swiper-button.elementor-swiper-button-next {
        font-size: 30px;
        color: #154d80;
    }

    .elementor-341 .elementor-element.elementor-element-4ef2fbd .elementor-button .elementor-align-icon-right {
        margin-left: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-4ef2fbd .elementor-button .elementor-align-icon-left {
        margin-right: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-4ef2fbd a.elementor-button,
    .elementor-341 .elementor-element.elementor-element-4ef2fbd .elementor-button {
        font-size: 14px;
        text-transform: uppercase;
        background-color: #154d80;
        border-radius: 5px 5px 5px 5px;
        padding: 15px 30px 15px 30px;
    }

    .elementor-341 .elementor-element.elementor-element-4ef2fbd a.elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-4ef2fbd .elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-4ef2fbd a.elementor-button:focus,
    .elementor-341 .elementor-element.elementor-element-4ef2fbd .elementor-button:focus {
        background-color: #6ec1e4;
    }

    .elementor-341 .elementor-element.elementor-element-b0ee951 .elementor-heading-title {
        font-size: 24px;
    }

    .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child) {
        padding-bottom: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child) {
        margin-top: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item {
        margin-right: calc(9px/2);
        margin-left: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-items.elementor-inline-items {
        margin-right: calc(-9px/2);
        margin-left: calc(-9px/2);
    }

    body.rtl .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        left: calc(-9px/2);
    }

    body:not(.rtl) .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        right: calc(-9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-icon i {
        font-size: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-icon svg {
        width: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-a245d8e .elementor-icon-list-item {
        line-height: 1.4em;
    }

    .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child) {
        padding-bottom: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child) {
        margin-top: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item {
        margin-right: calc(9px/2);
        margin-left: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-items.elementor-inline-items {
        margin-right: calc(-9px/2);
        margin-left: calc(-9px/2);
    }

    body.rtl .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        left: calc(-9px/2);
    }

    body:not(.rtl) .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        right: calc(-9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-icon i {
        font-size: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-icon svg {
        width: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-a407f95 .elementor-icon-list-item {
        line-height: 1.4em;
    }

    .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child) {
        padding-bottom: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child) {
        margin-top: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item {
        margin-right: calc(9px/2);
        margin-left: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-items.elementor-inline-items {
        margin-right: calc(-9px/2);
        margin-left: calc(-9px/2);
    }

    body.rtl .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        left: calc(-9px/2);
    }

    body:not(.rtl) .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        right: calc(-9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-icon i {
        font-size: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-icon svg {
        width: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-6944981 .elementor-icon-list-item {
        line-height: 1.4em;
    }

    .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child) {
        padding-bottom: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child) {
        margin-top: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item {
        margin-right: calc(9px/2);
        margin-left: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-items.elementor-inline-items {
        margin-right: calc(-9px/2);
        margin-left: calc(-9px/2);
    }

    body.rtl .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        left: calc(-9px/2);
    }

    body:not(.rtl) .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        right: calc(-9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-icon i {
        font-size: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-icon svg {
        width: 23px;
    }

    .elementor-341 .elementor-element.elementor-element-05cf03a .elementor-icon-list-item {
        line-height: 1.4em;
    }

    .elementor-341 .elementor-element.elementor-element-676890b:not(.elementor-motion-effects-element-type-background),
    .elementor-341 .elementor-element.elementor-element-676890b>.elementor-motion-effects-container>.elementor-motion-effects-layer {
        background-color: transparent;
        background-image: linear-gradient(180deg, #f4f4f4 0%, #ffffff 100%);
    }

    .elementor-341 .elementor-element.elementor-element-676890b {
        transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
        padding: 60px 0px 0px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-676890b>.elementor-background-overlay {
        transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    }

    .elementor-341 .elementor-element.elementor-element-e79f4c5.elementor-widget-heading .elementor-heading-title {
        color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-e79f4c5 .elementor-heading-title {
        font-family: "Rubik", Sans-serif;
        font-size: 35px;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-983529a {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        font-size: 20px;
        font-weight: 400;
        text-transform: capitalize;
    }

    .elementor-341 .elementor-element.elementor-element-983529a>.elementor-widget-container {
        margin: 0px 0px 10px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-37810fa>.elementor-column-wrap>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
        margin-bottom: 0px;
    }

    .elementor-341 .elementor-element.elementor-element-d11ca66 .elementor-text-editor {
        text-align: center;
    }

    .elementor-341 .elementor-element.elementor-element-d11ca66 {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        font-size: 17px;
        font-weight: 400;
        text-transform: capitalize;
    }

    .elementor-341 .elementor-element.elementor-element-d11ca66>.elementor-widget-container {
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-0ba9d5d .elementor-button .elementor-align-icon-right {
        margin-left: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-0ba9d5d .elementor-button .elementor-align-icon-left {
        margin-right: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-0ba9d5d a.elementor-button,
    .elementor-341 .elementor-element.elementor-element-0ba9d5d .elementor-button {
        font-size: 18px;
        text-transform: uppercase;
        fill: #ffffff;
        color: #ffffff;
        background-color: #6ec1e4;
        border-radius: 5px 5px 5px 5px;
        padding: 15px 25px 15px 25px;
    }

    .elementor-341 .elementor-element.elementor-element-0ba9d5d a.elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-0ba9d5d .elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-0ba9d5d a.elementor-button:focus,
    .elementor-341 .elementor-element.elementor-element-0ba9d5d .elementor-button:focus {
        background-color: #154d80;
    }

    .elementor-341 .elementor-element.elementor-element-7c40171 {
        padding: 40px 0px 40px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-a534664 .elementor-tab-title,
    .elementor-341 .elementor-element.elementor-element-a534664 .elementor-tab-title:before,
    .elementor-341 .elementor-element.elementor-element-a534664 .elementor-tab-title:after,
    .elementor-341 .elementor-element.elementor-element-a534664 .elementor-tab-content,
    .elementor-341 .elementor-element.elementor-element-a534664 .elementor-tabs-content-wrapper {
        border-width: 1px;
    }

    .elementor-341 .elementor-element.elementor-element-ec96e0e {
        padding: 0px 0px 60px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-ef781f1 {
        color: #4f4f4f;
        font-weight: 600;
        line-height: 1.6em;
    }

    .elementor-341 .elementor-element.elementor-element-ef781f1>.elementor-widget-container {
        margin: 0px 0px 30px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-f864957 {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        font-size: 20px;
        font-weight: 400;
        text-transform: capitalize;
    }

    .elementor-341 .elementor-element.elementor-element-f864957>.elementor-widget-container {
        margin: 0px 0px 0px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child) {
        padding-bottom: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child) {
        margin-top: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item {
        margin-right: calc(9px/2);
        margin-left: calc(9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-items.elementor-inline-items {
        margin-right: calc(-9px/2);
        margin-left: calc(-9px/2);
    }

    body.rtl .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        left: calc(-9px/2);
    }

    body:not(.rtl) .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after {
        right: calc(-9px/2);
    }

    .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-icon i {
        font-size: 14px;
    }

    .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-icon svg {
        width: 14px;
    }

    .elementor-341 .elementor-element.elementor-element-f0743ce .elementor-icon-list-item {
        line-height: 1.4em;
    }

    .elementor-341 .elementor-element.elementor-element-78af672 {
        padding: 60px 0px 0px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-5464b88f {
        text-align: center;
    }

    .elementor-341 .elementor-element.elementor-element-5464b88f.elementor-widget-heading .elementor-heading-title {
        color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-5464b88f .elementor-heading-title {
        font-family: "Rubik", Sans-serif;
        font-size: 35px;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-29d46e9e .elementor-text-editor {
        text-align: center;
    }

    .elementor-341 .elementor-element.elementor-element-29d46e9e {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        font-size: 20px;
        font-weight: 400;
        text-transform: capitalize;
    }

    .elementor-341 .elementor-element.elementor-element-29d46e9e>.elementor-widget-container {
        margin: -10px 0px 40px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-60d05812 {
        padding: 0px 0px 60px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913.elementor-view-stacked .elementor-icon {
        background-color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913.elementor-view-framed .elementor-icon,
    .elementor-341 .elementor-element.elementor-element-78a82913.elementor-view-default .elementor-icon {
        fill: #000000;
        color: #000000;
        border-color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913.elementor-position-right .elementor-icon-box-icon {
        margin-left: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913.elementor-position-left .elementor-icon-box-icon {
        margin-right: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913.elementor-position-top .elementor-icon-box-icon {
        margin-bottom: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913 .elementor-icon {
        font-size: 26px;
        padding: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913 .elementor-icon i {
        transform: rotate(0deg);
    }

    .elementor-341 .elementor-element.elementor-element-78a82913 .elementor-icon-box-content .elementor-icon-box-title {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-78a82913 .elementor-icon-box-content .elementor-icon-box-description {
        line-height: 1.6em;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f.elementor-view-stacked .elementor-icon {
        background-color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f.elementor-view-framed .elementor-icon,
    .elementor-341 .elementor-element.elementor-element-2658762f.elementor-view-default .elementor-icon {
        fill: #000000;
        color: #000000;
        border-color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f.elementor-position-right .elementor-icon-box-icon {
        margin-left: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f.elementor-position-left .elementor-icon-box-icon {
        margin-right: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f.elementor-position-top .elementor-icon-box-icon {
        margin-bottom: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f .elementor-icon {
        font-size: 26px;
        padding: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f .elementor-icon i {
        transform: rotate(0deg);
    }

    .elementor-341 .elementor-element.elementor-element-2658762f .elementor-icon-box-content .elementor-icon-box-title {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-2658762f .elementor-icon-box-content .elementor-icon-box-description {
        line-height: 1.6em;
    }

    .elementor-341 .elementor-element.elementor-element-b165306.elementor-view-stacked .elementor-icon {
        background-color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-b165306.elementor-view-framed .elementor-icon,
    .elementor-341 .elementor-element.elementor-element-b165306.elementor-view-default .elementor-icon {
        fill: #000000;
        color: #000000;
        border-color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-b165306.elementor-position-right .elementor-icon-box-icon {
        margin-left: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-b165306.elementor-position-left .elementor-icon-box-icon {
        margin-right: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-b165306.elementor-position-top .elementor-icon-box-icon {
        margin-bottom: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-b165306 .elementor-icon {
        font-size: 26px;
        padding: 20px;
    }

    .elementor-341 .elementor-element.elementor-element-b165306 .elementor-icon i {
        transform: rotate(0deg);
    }

    .elementor-341 .elementor-element.elementor-element-b165306 .elementor-icon-box-content .elementor-icon-box-title {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-b165306 .elementor-icon-box-content .elementor-icon-box-description {
        line-height: 1.6em;
    }

    .elementor-341 .elementor-element.elementor-element-2dccb01d>.elementor-container>.elementor-row>.elementor-column>.elementor-column-wrap>.elementor-widget-wrap {
        align-content: center;
        align-items: center;
    }

    .elementor-341 .elementor-element.elementor-element-2dccb01d:not(.elementor-motion-effects-element-type-background),
    .elementor-341 .elementor-element.elementor-element-2dccb01d>.elementor-motion-effects-container>.elementor-motion-effects-layer {
        background-color: #ffffff;
        background-image: url("http://routemasters.flywheelsites.com/wp-content/uploads/2019/11/Harrisburg_Hershey_Lancaster_Commercial_Photographer-18.jpg");
        background-position: center center;
    }

    .elementor-341 .elementor-element.elementor-element-2dccb01d>.elementor-background-overlay {
        background-color: #ffffff;
        opacity: 0.87;
        transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    }

    .elementor-341 .elementor-element.elementor-element-2dccb01d {
        transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
        padding: 100px 0px 100px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-5d94658c.elementor-widget-heading .elementor-heading-title {
        color: #000000;
    }

    .elementor-341 .elementor-element.elementor-element-5d94658c .elementor-heading-title {
        font-family: "Rubik", Sans-serif;
        font-size: 35px;
        text-transform: uppercase;
    }

    .elementor-341 .elementor-element.elementor-element-7767d574 {
        color: #6087c9;
        font-family: "Rubik", Sans-serif;
        font-size: 20px;
        font-weight: 400;
        text-transform: capitalize;
    }

    .elementor-341 .elementor-element.elementor-element-7767d574>.elementor-widget-container {
        margin: -10px 0px 40px 0px;
    }

    .elementor-341 .elementor-element.elementor-element-4c105d75 .elementor-button .elementor-align-icon-right {
        margin-left: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-4c105d75 .elementor-button .elementor-align-icon-left {
        margin-right: 10px;
    }

    .elementor-341 .elementor-element.elementor-element-4c105d75 a.elementor-button,
    .elementor-341 .elementor-element.elementor-element-4c105d75 .elementor-button {
        font-size: 14px;
        text-transform: uppercase;
        background-color: #6087c9;
        border-radius: 5px 5px 5px 5px;
        padding: 15px 30px 15px 30px;
    }

    .elementor-341 .elementor-element.elementor-element-4c105d75 a.elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-4c105d75 .elementor-button:hover,
    .elementor-341 .elementor-element.elementor-element-4c105d75 a.elementor-button:focus,
    .elementor-341 .elementor-element.elementor-element-4c105d75 .elementor-button:focus {
        background-color: #6ec1e4;
    }
    
    pre,
    #elementor-tab-content-1733 p,
    #elementor-tab-content-1735 p{
        font-family: "Roboto", sans-serif;
        font-weight: 400;
    }
    
    @media(max-width:1024px) {
        .elementor-341 .elementor-element.elementor-element-3f63c50 .elementor-heading-title {
            font-size: 36px;
        }

        .elementor-341 .elementor-element.elementor-element-408c62b {
            text-align: right;
        }

        .elementor-341 .elementor-element.elementor-element-408c62b .elementor-heading-title {
            font-size: 20px;
        }

        .elementor-341 .elementor-element.elementor-element-4319a6c {
            text-align: right;
        }

        .elementor-341 .elementor-element.elementor-element-30afc2c .elementor-text-editor {
            text-align: right;
        }

        .elementor-341 .elementor-element.elementor-element-1101212 a.elementor-button,
        .elementor-341 .elementor-element.elementor-element-1101212 .elementor-button {
            font-size: 13px;
            padding: 7px 5px 5px 15px;
        }

        .elementor-341 .elementor-element.elementor-element-d11ca66 .elementor-text-editor {
            text-align: right;
        }

        .elementor-341 .elementor-element.elementor-element-0ba9d5d a.elementor-button,
        .elementor-341 .elementor-element.elementor-element-0ba9d5d .elementor-button {
            font-size: 13px;
            
        }

        .elementor-341 .elementor-element.elementor-element-5d94658c {
            text-align: center;
        }

        .elementor-341 .elementor-element.elementor-element-7767d574 .elementor-text-editor {
            text-align: center;
        }
    }

    @media(min-width:768px) {
        .elementor-341 .elementor-element.elementor-element-b10b3ea {
            width: 56.754%;
        }

        .elementor-341 .elementor-element.elementor-element-64a6332 {
            width: 24.122%;
        }

        .elementor-341 .elementor-element.elementor-element-bd77dac {
            width: 19.12%;
        }

        .elementor-341 .elementor-element.elementor-element-c010795 {
            width: 64.737%;
        }

        .elementor-341 .elementor-element.elementor-element-ff19fdd {
            width: 35.263%;
        }

        .elementor-341 .elementor-element.elementor-element-a9c9390 {
            width: 60%;
        }

        .elementor-341 .elementor-element.elementor-element-37810fa {
            width: 40%;
        }
    }

    @media(max-width:1024px) and (min-width:768px) {
        .elementor-341 .elementor-element.elementor-element-b10b3ea {
            width: 60%;
        }

        .elementor-341 .elementor-element.elementor-element-64a6332 {
            width: 20%;
        }

        .elementor-341 .elementor-element.elementor-element-bd77dac {
            width: 20%;
        }

        .elementor-341 .elementor-element.elementor-element-37810fa {
            width: 20%;
        }

        .elementor-341 .elementor-element.elementor-element-f1afb24 {
            width: 100%;
        }

        .elementor-341 .elementor-element.elementor-element-129fcd2 {
            width: 100%;
        }

        .elementor-341 .elementor-element.elementor-element-15d9f0d2 {
            width: 100%;
        }

        .elementor-341 .elementor-element.elementor-element-41893a26 {
            width: 50%;
        }

        .elementor-341 .elementor-element.elementor-element-47bf794 {
            width: 50%;
        }

        .elementor-341 .elementor-element.elementor-element-5259f804 {
            width: 100%;
        }

        .elementor-341 .elementor-element.elementor-element-254267bb {
            width: 100%;
        }
    }

    @media(max-width:767px) {
        .elementor-341 .elementor-element.elementor-element-3f63c50 {
            text-align: right;
        }

        .elementor-341 .elementor-element.elementor-element-64a6332>.elementor-column-wrap>.elementor-widget-wrap>.elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute) {
            margin-bottom: 4px;
        }

        .elementor-341 .elementor-element.elementor-element-0a41b57 {
            padding: 5px 5px 5px 5px;
        }

        .elementor-341 .elementor-element.elementor-element-78a82913 .elementor-icon-box-icon {
            margin-bottom: 20px;
        }

        .elementor-341 .elementor-element.elementor-element-2658762f .elementor-icon-box-icon {
            margin-bottom: 20px;
        }

        .elementor-341 .elementor-element.elementor-element-b165306 .elementor-icon-box-icon {
            margin-bottom: 20px;
        }
    }
    
    #elementor-tab-content-1732 a{
        overflow: hidden;
        height: 113px;
        width: 150px;
        display: inline-block;
    }
    
    #elementor-tab-content-1732 a img{
        max-width: 150px;
    }

</style>

<div data-elementor-type="wp-page" data-elementor-id="341" class="elementor elementor-341" data-elementor-settings="[]">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section class="elementor-element elementor-element-c9e194e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="c9e194e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;],&quot;sticky_offset&quot;:0,&quot;sticky_effects_offset&quot;:0}">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-b10b3ea elementor-column elementor-col-33 elementor-top-column" data-id="b10b3ea" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-3f63c50 elementor-invisible elementor-widget elementor-widget-heading" data-id="3f63c50" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default"><?php echo get_the_title(); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-64a6332 elementor-column elementor-col-33 elementor-top-column" data-id="64a6332" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-408c62b elementor-invisible elementor-widget elementor-widget-heading" data-id="408c62b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">Internet Price: $<?php $cost = get_post_meta($post->ID,'about_the_truck_internet-price', true); echo number_format($cost, 2, '.',','); ?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-4319a6c elementor-invisible elementor-widget elementor-widget-heading" data-id="4319a6c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <?php 
                                            $check = get_post_meta($post->ID,'about_the_truck_monthly-payment', true);
                                            if( isset($check) && $check != 0 ): ?>                                            
                                            <h2 class="elementor-heading-title elementor-size-default"><?php echo get_post_meta($post->ID,'about_the_truck_monthly-payment', true); ?>/mo*</h2>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-bd77dac elementor-column elementor-col-33 elementor-top-column" data-id="bd77dac" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-30afc2c elementor-invisible elementor-widget elementor-widget-text-editor" data-id="30afc2c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                                <p>We can Hold it for you!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-1101212 elementor-align-center elementor-tablet-align-right elementor-widget elementor-widget-button" data-id="1101212" data-element_type="widget" data-widget_type="button.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-button-wrapper">
                                                <a href="/place-a-deposit/" class="elementor-button-link elementor-button elementor-size-sm elementor-animation-sink" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-icon elementor-align-icon-right">
                                                            <i aria-hidden="true" class="fas fa-comment-dollar"></i> </span>
                                                        <span class="elementor-button-text">Place a deposit!</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element elementor-element-0a41b57 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="0a41b57" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-c010795 elementor-column elementor-col-50 elementor-top-column" data-id="c010795" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-b1e70c6 elementor-widget elementor-widget-image" data-id="b1e70c6" data-element_type="widget" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-image">
                                                <img width="800" height="600" src="<?php echo ImportXML::$converted_xml->Vehicle[$found]->PhotoURLs->PhotoURL[0]; ?>" class="attachment-large size-large" alt="" /> </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-d0544ae elementor-arrows-position-outside elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel" data-id="d0544ae" data-element_type="widget" data-settings="{&quot;slides_to_show&quot;:&quot;5&quot;,&quot;slides_to_show_tablet&quot;:&quot;3&quot;,&quot;slides_to_show_mobile&quot;:&quot;3&quot;,&quot;navigation&quot;:&quot;both&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;direction&quot;:&quot;ltr&quot;}" data-widget_type="image-carousel.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-image-carousel-wrapper swiper-container" dir="ltr">
                                                <div class="elementor-image-carousel swiper-wrapper">
                                                    <?php foreach( ImportXML::$converted_xml->Vehicle[$found]->PhotoURLs->PhotoURL as $img){ ?>
                                                    <div class="swiper-slide"><a href="<?php echo $img; ?>" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="d0544ae" data-elementor-lightbox-index="0">
                                                            <figure class="swiper-slide-inner"><img class="swiper-slide-image" src="<?php echo $img; ?>" alt="88c37fae62_1280" /></figure>
                                                        </a></div>
                                                    <?php }?>
                                                </div>
                                                
                                                <div class="elementor-swiper-button elementor-swiper-button-prev">
                                                    <i class="eicon-chevron-left" aria-hidden="true"></i>
                                                    <span class="elementor-screen-only">Previous</span>
                                                </div>
                                                <div class="elementor-swiper-button elementor-swiper-button-next">
                                                    <i class="eicon-chevron-right" aria-hidden="true"></i>
                                                    <span class="elementor-screen-only">Next</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-ff19fdd elementor-column elementor-col-50 elementor-top-column" data-id="ff19fdd" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-4ef2fbd elementor-align-left elementor-widget elementor-widget-button" data-id="4ef2fbd" data-element_type="widget" data-widget_type="button.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-button-wrapper">
                                                <a href="/finance-options/" class="elementor-button-link elementor-button elementor-size-sm elementor-animation-sink" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-icon elementor-align-icon-right">
                                                            <i aria-hidden="true" class="fas fa-money-check-alt"></i> </span>
                                                        <span class="elementor-button-text">Finance options</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-b0ee951 elementor-widget elementor-widget-heading" data-id="b0ee951" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">Quick Facts:</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-a245d8e elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="a245d8e" data-element_type="widget" data-widget_type="icon-list.default">
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon-list-items">
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-road"></i> </span>
                                                    <span class="elementor-icon-list-text">Mileage: <?php echo get_post_meta($post->ID,'about_the_truck_mileage', true); ?></span>
                                                    
                                                </li>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-cogs"></i> </span>
                                                    <span class="elementor-icon-list-text">Transmission: <?php echo get_post_meta($post->ID,'about_the_truck_transmission', true); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-a407f95 elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="a407f95" data-element_type="widget" data-widget_type="icon-list.default">
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon-list-items">
                                                
                                            <?php 
                                                $check = get_post_meta($post->ID,'about_the_truck_carfax-url', true);
                                                if( $check != "" ):?>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-clipboard-check"></i> </span>
                                                    <span class="elementor-icon-list-text">Carfax: <a href="<?php echo get_post_meta($post->ID, 'about_the_truck_carfax-url',true); ?>" target="_blank">Click Here</a></span>
                                                </li>
                                            <?php endif; ?>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-truck"></i> </span>
                                                    <span class="elementor-icon-list-text">Engine: <?php echo get_post_meta($post->ID,'about_the_truck_engine', true); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-6944981 elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="6944981" data-element_type="widget" data-widget_type="icon-list.default">
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon-list-items">
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="far fa-newspaper"></i> </span>
                                                    <span class="elementor-icon-list-text">Title: <?php echo get_post_meta($post->ID,'about_the_truck_vehicle-title', true); ?></span>
                                                </li>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-check-circle"></i> </span>
                                                    <span class="elementor-icon-list-text">VIN #: <?php echo get_post_meta($post->ID,'about_the_truck_vin-number', true); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-05cf03a elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="05cf03a" data-element_type="widget" data-widget_type="icon-list.default">
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon-list-items">
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-gas-pump"></i> </span>
                                                    <span class="elementor-icon-list-text">Fuel: <?php echo get_post_meta($post->ID,'about_the_truck_fuel-type', true); ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element elementor-element-676890b elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="676890b" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-a9c9390 elementor-column elementor-col-50 elementor-top-column" data-id="a9c9390" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-e79f4c5 elementor-invisible elementor-widget elementor-widget-heading" data-id="e79f4c5" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">the details</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-983529a elementor-invisible elementor-widget elementor-widget-text-editor" data-id="983529a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                                <p>Keeping the facts in front of you:</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-37810fa elementor-column elementor-col-50 elementor-top-column" data-id="37810fa" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-d11ca66 elementor-invisible elementor-widget elementor-widget-text-editor" data-id="d11ca66" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                                <p>Need Financing?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-0ba9d5d elementor-align-center elementor-tablet-align-right elementor-widget elementor-widget-button" data-id="0ba9d5d" data-element_type="widget" data-widget_type="button.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-button-wrapper">
                                                <a href="https://myascentium.com/ApplyNow/CommCredit?ad=PaulMacDonald" class="elementor-button-link elementor-button elementor-size-sm elementor-animation-sink" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-icon elementor-align-icon-right">
                                                            <i aria-hidden="true" class="fas fa-pencil-alt"></i> </span>
                                                        <span class="elementor-button-text">Apply Now!</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element elementor-element-7c40171 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="7c40171" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-fce4fa5 elementor-column elementor-col-100 elementor-top-column" data-id="fce4fa5" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-a534664 elementor-tabs-view-horizontal elementor-widget elementor-widget-tabs" data-id="a534664" data-element_type="widget" data-widget_type="tabs.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-tabs" role="tablist">
                                                <div class="elementor-tabs-wrapper">
                                                    <div id="elementor-tab-title-1731" class="elementor-tab-title elementor-tab-desktop-title" data-tab="1" role="tab" aria-controls="elementor-tab-content-1731"><a href="">Info</a></div>
                                                    <div id="elementor-tab-title-1732" class="elementor-tab-title elementor-tab-desktop-title" data-tab="2" role="tab" aria-controls="elementor-tab-content-1732"><a href="">Photos</a></div>
                                                    <div id="elementor-tab-title-1733" class="elementor-tab-title elementor-tab-desktop-title" data-tab="3" role="tab" aria-controls="elementor-tab-content-1733"><a href="">Specifications</a></div>
                                                    <?php //<div id="elementor-tab-title-1734" class="elementor-tab-title elementor-tab-desktop-title" data-tab="4" role="tab" aria-controls="elementor-tab-content-1734"><a href="">Options</a></div> ?>
                                                    <div id="elementor-tab-title-1735" class="elementor-tab-title elementor-tab-desktop-title" data-tab="5" role="tab" aria-controls="elementor-tab-content-1735"><a href="">Finance Now</a></div>
                                                </div>
                                                <div class="elementor-tabs-content-wrapper">
                                                    <div class="elementor-tab-title elementor-tab-mobile-title" data-tab="1" role="tab">Info</div>
                                                    <div id="elementor-tab-content-1731" class="elementor-tab-content elementor-clearfix" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-1731">
                                                        <pre><?php echo get_post_meta($post->ID,'about_the_truck_description', true); ?></pre>
                                                    </div>
                                                    <div class="elementor-tab-title elementor-tab-mobile-title" data-tab="2" role="tab">Photos</div>
                                                    <div id="elementor-tab-content-1732" class="elementor-tab-content elementor-clearfix" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-1732">
                                                        <?php foreach( ImportXML::$converted_xml->Vehicle[$found]->PhotoURLs->PhotoURL as $img){ ?>
                                                            <a href="<?php echo $img; ?>" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="d0544ac" data-elementor-lightbox-index="0">
                                                                <img class="swiper-slide-image" src="<?php echo $img; ?>" alt="88c37fae62_1280" />
                                                            </a>
                                                        <?php }?>
                                                    </div>
                                                    <div class="elementor-tab-title elementor-tab-mobile-title" data-tab="3" role="tab">Specifications</div>
                                                    <div id="elementor-tab-content-1733" class="elementor-tab-content elementor-clearfix" data-tab="3" role="tabpanel" aria-labelledby="elementor-tab-title-1733">
                                                        <p>
                                                            <b>Body Style:</b> <?php echo get_post_meta($post->ID,'about_the_truck_body-type',true); ?><br>
                                                            <b>Condition:</b> <?php echo get_post_meta($post->ID,'about_the_truck_condition',true); ?><br>
                                                            <b>Number Of Doors:</b> <?php echo get_post_meta($post->ID,'about_the_truck_doors',true); ?><br>
                                                            <b>Cylinders:</b> <?php echo get_post_meta($post->ID,'about_the_truck_cylinders',true); ?><br>
                                                            <b>Drivetrain:</b> <?php echo get_post_meta($post->ID,'about_the_truck_drivetrain',true); ?><br>
                                                            <b>Exterior Color:</b> <?php echo get_post_meta($post->ID,'about_the_truck_exterior-color',true); ?><br>
                                                            <b>Interior Color:</b> <?php echo get_post_meta($post->ID,'about_the_truck_interior-color',true); ?>
                                                            
                                                        </p>
                                                    </div>
                                                    <?php 
                                                    /*<div class="elementor-tab-title elementor-tab-mobile-title" data-tab="4" role="tab">Options</div>
                                                    <div id="elementor-tab-content-1734" class="elementor-tab-content elementor-clearfix" data-tab="4" role="tabpanel" aria-labelledby="elementor-tab-title-1734">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                                    </div>*/
                                                    ?>
                                                    <div class="elementor-tab-title elementor-tab-mobile-title" data-tab="5" role="tab">Finance Now</div>
                                                    <div id="elementor-tab-content-1735" class="elementor-tab-content elementor-clearfix" data-tab="5" role="tabpanel" aria-labelledby="elementor-tab-title-1735">
                                                        <p>Ascentium offers affordable payment options and their 100% Financing Program enables you to include shipping, tax and other soft costs. This makes acquiring a complete solution even easier. Ascentium Capital has also streamlined the finance process for Routemaster Ltd. customers.</p>
                                                        <p>Through A Consultative Approach, Your Finance Specialist Will Develop A Payment Option To Match Your Cash Flow Needs. Some To The Benefits Of Financing With Ascentium Capital Include: </p>
                                                        <ul>
                                                            <li>No Or Low Upfront Costs</li>
                                                            <li>Delayed Payment Options</li>
                                                            <li>Potential Tax Savings*</li>
                                                        </ul><br>
                                                        <div class="elementor-element elementor-element-0ba9d5d elementor-widget elementor-widget-button" data-id="0ba9d5d" data-element_type="widget" data-widget_type="button.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-button-wrapper">
                                                                            <a href="https://myascentium.com/ApplyNow/CommCredit?ad=PaulMacDonald" class="elementor-button-link elementor-button elementor-size-sm elementor-animation-sink" role="button">
                                                                        <span class="elementor-button-content-wrapper">
                                                                            <span class="elementor-button-icon elementor-align-icon-right">
                                                                                <i aria-hidden="true" class="fas fa-pencil-alt"></i> </span>
                                                                            <span class="elementor-button-text">Start Now!</span>
                                                                        </span>
                                                                    </a>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element elementor-element-ec96e0e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="ec96e0e" data-element_type="section">
                <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-f1afb24 elementor-column elementor-col-50 elementor-top-column" data-id="f1afb24" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-726398d elementor-aspect-ratio-169 elementor-widget elementor-widget-video" data-id="726398d" data-element_type="widget" data-settings="{&quot;aspect_ratio&quot;:&quot;169&quot;}" data-widget_type="video.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-wrapper elementor-fit-aspect-ratio elementor-open-inline">
                                                <?php 
                                                    $YTUrl = parse_url(get_post_meta($post->ID, 'about_the_truck_youtube-url', true));
                                                    
                                                    if(isset($YTUrl['query'])){
                                                        parse_str($YTUrl['query'], $query);
                                                        $videoID = $query['v'];
                                                    }else{
                                                        $videoID = str_replace('/','',$YTUrl['path']);
                                                    }
                                                
                                                    if($videoID != ''):
                                                ?>
                                                
                                                <iframe class="elementor-video-iframe" allowfullscreen src="https://www.youtube.com/embed/<?php echo $videoID ?>?feature=oembed&amp;start&amp;end&amp;wmode=opaque&amp;loop=0&amp;controls=1&amp;mute=0&amp;rel=0&amp;modestbranding=0"></iframe> 
                                                <?php else: ?>
                                                    <img class="attachment-large size-large" src="/wp-content/uploads/2019/11/Harrisburg_Hershey_Lancaster_Commercial_Photographer-2.jpg" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-129fcd2 elementor-column elementor-col-50 elementor-top-column" data-id="129fcd2" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-ef781f1 elementor-widget elementor-widget-text-editor" data-id="ef781f1" data-element_type="widget" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">If it&#8217;s on our lot, it&#8217;s a truck you can trust for your business.</div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f864957 elementor-invisible elementor-widget elementor-widget-text-editor" data-id="f864957" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                                <p>Routemasters means you can trust:</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f0743ce elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="f0743ce" data-element_type="widget" data-widget_type="icon-list.default">
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon-list-items">
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-check"></i> </span>
                                                    <span class="elementor-icon-list-text">Excellent Service</span>
                                                </li>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-check"></i> </span>
                                                    <span class="elementor-icon-list-text">Honest Answers</span>
                                                </li>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <i aria-hidden="true" class="fas fa-check"></i> </span>
                                                    <span class="elementor-icon-list-text">Reliable Trucks</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element elementor-element-78af672 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="78af672" data-element_type="section">
                <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-df00039 elementor-column elementor-col-100 elementor-top-column" data-id="df00039" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-5464b88f elementor-invisible elementor-widget elementor-widget-heading" data-id="5464b88f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">all our vehicles pass PA INSPECTION:</h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-29d46e9e elementor-invisible elementor-widget elementor-widget-text-editor" data-id="29d46e9e" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                                <p>If it&#8217;s on the lot, it&#8217;s passed the following inspections&#8230;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element elementor-element-60d05812 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="60d05812" data-element_type="section">
                <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-15d9f0d2 elementor-column elementor-col-33 elementor-top-column" data-id="15d9f0d2" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-78a82913 elementor-view-stacked elementor-position-left elementor-vertical-align-middle elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="78a82913" data-element_type="widget" data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">
                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon elementor-animation-">
                                                        <i aria-hidden="true" class="fas fa-road"></i> </span>
                                                </div>
                                                <div class="elementor-icon-box-content">
                                                    <h3 class="elementor-icon-box-title">
                                                        <span>road tested and approved</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-41893a26 elementor-column elementor-col-33 elementor-top-column" data-id="41893a26" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-2658762f elementor-view-stacked elementor-position-left elementor-vertical-align-middle elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="2658762f" data-element_type="widget" data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">
                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon elementor-animation-">
                                                        <i aria-hidden="true" class="fas fa-shower"></i> </span>
                                                </div>
                                                <div class="elementor-icon-box-content">
                                                    <h3 class="elementor-icon-box-title">
                                                        <span>washed and detailed</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-47bf794 elementor-column elementor-col-33 elementor-top-column" data-id="47bf794" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-b165306 elementor-view-stacked elementor-position-left elementor-vertical-align-middle elementor-shape-circle elementor-widget elementor-widget-icon-box" data-id="b165306" data-element_type="widget" data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">
                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon elementor-animation-">
                                                        <i aria-hidden="true" class="fas fa-star"></i> </span>
                                                </div>
                                                <div class="elementor-icon-box-content">
                                                    <h3 class="elementor-icon-box-title">
                                                        <span>PA Inspected &amp; Serviced</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-element elementor-element-2dccb01d elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="2dccb01d" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-background-overlay"></div>
                <div class="elementor-container elementor-column-gap-extended">
                    <div class="elementor-row">
                        <div class="elementor-element elementor-element-5259f804 elementor-column elementor-col-50 elementor-top-column" data-id="5259f804" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-5d94658c elementor-invisible elementor-widget elementor-widget-heading" data-id="5d94658c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">need it but can't come see it today? </h2>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-7767d574 elementor-invisible elementor-widget elementor-widget-text-editor" data-id="7767d574" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                                <p>We will hold it for you for 14 days with a $500 non-refundable deposit.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-254267bb elementor-column elementor-col-50 elementor-top-column" data-id="254267bb" data-element_type="column">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-4c105d75 elementor-align-right elementor-tablet-align-center elementor-invisible elementor-widget elementor-widget-button" data-id="4c105d75" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:400}" data-widget_type="button.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-button-wrapper">
                                                <a href="/place-a-deposit/" class="elementor-button-link elementor-button elementor-size-sm elementor-animation-sink" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-icon elementor-align-icon-right">
                                                            <i aria-hidden="true" class="fas fa-arrow-circle-right"></i> </span>
                                                        <span class="elementor-button-text">Place A Deposit!</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php

get_footer();