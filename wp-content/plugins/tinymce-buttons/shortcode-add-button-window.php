<?php

//require_once('tinymce_config.php');

global $wpdb;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lägg till ikon</title>

        <link rel="stylesheet" type="text/css" media="all" href="/wp-content/plugins/tinymce-buttons/tinymce-buttons.css" />
        <script type="text/javascript" src="/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function(){

                $ = jQuery;
                var iconHolder = $('.icon-holder');
                var iconObject = $('.icon-holder i');
                var iconClass = 'bytbil icon ';
                $('form input[name="icon-content"]').change(function(e){
                    var value = $(this).attr("value");
                    $(iconObject).attr("class","").addClass(iconClass + value);
                });

                $('form select[name="size"]').change(function(e){
                    $(iconHolder).attr('data-size',$(this).val());
                });

                $('form select[name="color"]').change(function(e){
                    $(iconHolder).attr('data-color',$(this).val());
                });

                $('form select[name="bg-color"]').change(function(e){
                    $(iconHolder).attr('data-bgcolor',$(this).val());
                });

                $('form select[name="border-color"]').change(function(e){
                    $(iconHolder).attr('data-border',$(this).val());
                });

                $('form select[name="float"]').change(function(e){
                    $(iconHolder).attr('data-float',$(this).val());
                });

                $('form a#submit_button').click(function(event){
                    event.preventDefault();

                    ButtonDialog.insert(ButtonDialog.local_ed)
                });

                var ButtonDialog = {
                    local_ed : 'ed',
                    init : function(ed){
                        ButtonDialog.local_ed = ed;
                        tinyMCEPopup.resizeToInnerSize();

                    },
                    insert : function insertButton(ed){
                        tinyMCEPopup.execCommand('mceRemoveNode', true, null);

                        var icon = $('form input[name="icon-content"]:checked').attr("value");
                        var color = $('.icon-holder').attr('data-color');
                        var bgcolor = $('.icon-holder').attr('data-bgcolor');
                        var border = $('.icon-holder').attr('data-border');
                        var size = $('.icon-holder').attr('data-size');
                        var float = $('.icon-holder').attr('data-float');

                        var output2 = "&nbsp;<i class='icon-holder bytbil icon "+icon+"' data-size='"+size+"' data-border='"+border+"' data-color='"+color+"' data-float='"+float+"' data-bgcolor='"+bgcolor+"'></i>&nbsp;";

                        tinyMCEPopup.execCommand('mceReplaceContent', false, output2);
                        tinyMCEPopup.close();

                        return false;
                    }
                };
                tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
            });
        </script>
    </head>
    <body>
        <div id="dialog">
            <form action="/" method="get" accept-charset="utf-8">
                <div class="col-xs-12 col-sm-9">
                    <input name="icon-content" type="radio" value="icon-cab">
                    <input name="icon-content" type="radio" value="icon-taxi">
                    <input name="icon-content" type="radio" value="icon-truck">
                    <input name="icon-content" type="radio" value="icon-bus">
                    <input name="icon-content" type="radio" value="icon-bus-1">
                    <input name="icon-content" type="radio" value="icon-address">
                    <input name="icon-content" type="radio" value="icon-add-to-list">
                    <input name="icon-content" type="radio" value="icon-add-user">
                    <input name="icon-content" type="radio" value="icon-adjust">
                    <input name="icon-content" type="radio" value="icon-air">
                    <input name="icon-content" type="radio" value="icon-aircraft">
                    <input name="icon-content" type="radio" value="icon-aircraft-landing">
                    <input name="icon-content" type="radio" value="icon-aircraft-take-off">
                    <input name="icon-content" type="radio" value="icon-align-bottom">
                    <input name="icon-content" type="radio" value="icon-align-horizontal-middle">
                    <input name="icon-content" type="radio" value="icon-align-left">
                    <input name="icon-content" type="radio" value="icon-align-right">
                    <input name="icon-content" type="radio" value="icon-align-top">
                    <input name="icon-content" type="radio" value="icon-align-vertical-middle">
                    <input name="icon-content" type="radio" value="icon-archive">
                    <input name="icon-content" type="radio" value="icon-area-graph">
                    <input name="icon-content" type="radio" value="icon-arrow-bold-down">
                    <input name="icon-content" type="radio" value="icon-arrow-bold-left">
                    <input name="icon-content" type="radio" value="icon-arrow-bold-right">
                    <input name="icon-content" type="radio" value="icon-arrow-bold-up">
                    <input name="icon-content" type="radio" value="icon-arrow-down">
                    <input name="icon-content" type="radio" value="icon-arrow-left">
                    <input name="icon-content" type="radio" value="icon-arrow-long-down">
                    <input name="icon-content" type="radio" value="icon-arrow-long-left">
                    <input name="icon-content" type="radio" value="icon-arrow-long-right">
                    <input name="icon-content" type="radio" value="icon-arrow-long-up">
                    <input name="icon-content" type="radio" value="icon-arrow-right">
                    <input name="icon-content" type="radio" value="icon-arrow-up">
                    <input name="icon-content" type="radio" value="icon-arrow-with-circle-down">
                    <input name="icon-content" type="radio" value="icon-arrow-with-circle-left">
                    <input name="icon-content" type="radio" value="icon-arrow-with-circle-right">
                    <input name="icon-content" type="radio" value="icon-arrow-with-circle-up">
                    <input name="icon-content" type="radio" value="icon-attachment">
                    <input name="icon-content" type="radio" value="icon-awareness-ribbon">
                    <input name="icon-content" type="radio" value="icon-back">
                    <input name="icon-content" type="radio" value="icon-back-in-time">
                    <input name="icon-content" type="radio" value="icon-bar-graph">
                    <input name="icon-content" type="radio" value="icon-battery">
                    <input name="icon-content" type="radio" value="icon-beamed-note">
                    <input name="icon-content" type="radio" value="icon-bell">
                    <input name="icon-content" type="radio" value="icon-blackboard">
                    <input name="icon-content" type="radio" value="icon-block">
                    <input name="icon-content" type="radio" value="icon-book">
                    <input name="icon-content" type="radio" value="icon-bookmark">
                    <input name="icon-content" type="radio" value="icon-bookmarks">
                    <input name="icon-content" type="radio" value="icon-bowl">
                    <input name="icon-content" type="radio" value="icon-box">
                    <input name="icon-content" type="radio" value="icon-briefcase">
                    <input name="icon-content" type="radio" value="icon-browser">
                    <input name="icon-content" type="radio" value="icon-brush">
                    <input name="icon-content" type="radio" value="icon-bucket">
                    <input name="icon-content" type="radio" value="icon-bug">
                    <input name="icon-content" type="radio" value="icon-cake">
                    <input name="icon-content" type="radio" value="icon-calculator">
                    <input name="icon-content" type="radio" value="icon-calendar">
                    <input name="icon-content" type="radio" value="icon-camera">
                    <input name="icon-content" type="radio" value="icon-ccw">
                    <input name="icon-content" type="radio" value="icon-chat">
                    <input name="icon-content" type="radio" value="icon-check">
                    <input name="icon-content" type="radio" value="icon-chevron-down">
                    <input name="icon-content" type="radio" value="icon-chevron-left">
                    <input name="icon-content" type="radio" value="icon-chevron-right">
                    <input name="icon-content" type="radio" value="icon-chevron-small-down">
                    <input name="icon-content" type="radio" value="icon-chevron-small-left">
                    <input name="icon-content" type="radio" value="icon-chevron-small-right">
                    <input name="icon-content" type="radio" value="icon-chevron-small-up">
                    <input name="icon-content" type="radio" value="icon-chevron-thin-down">
                    <input name="icon-content" type="radio" value="icon-chevron-thin-left">
                    <input name="icon-content" type="radio" value="icon-chevron-thin-right">
                    <input name="icon-content" type="radio" value="icon-chevron-thin-up">
                    <input name="icon-content" type="radio" value="icon-chevron-up">
                    <input name="icon-content" type="radio" value="icon-chevron-with-circle-down">
                    <input name="icon-content" type="radio" value="icon-chevron-with-circle-left">
                    <input name="icon-content" type="radio" value="icon-chevron-with-circle-right">
                    <input name="icon-content" type="radio" value="icon-chevron-with-circle-up">
                    <input name="icon-content" type="radio" value="icon-circle">
                    <input name="icon-content" type="radio" value="icon-circle-with-cross">
                    <input name="icon-content" type="radio" value="icon-circle-with-minus">
                    <input name="icon-content" type="radio" value="icon-circle-with-plus">
                    <input name="icon-content" type="radio" value="icon-circular-graph">
                    <input name="icon-content" type="radio" value="icon-clapperboard">
                    <input name="icon-content" type="radio" value="icon-classic-computer">
                    <input name="icon-content" type="radio" value="icon-clipboard">
                    <input name="icon-content" type="radio" value="icon-clock">
                    <input name="icon-content" type="radio" value="icon-cloud">
                    <input name="icon-content" type="radio" value="icon-code">
                    <input name="icon-content" type="radio" value="icon-cog">
                    <input name="icon-content" type="radio" value="icon-colours">
                    <input name="icon-content" type="radio" value="icon-compass">
                    <input name="icon-content" type="radio" value="icon-controller-fast-backward">
                    <input name="icon-content" type="radio" value="icon-controller-fast-forward">
                    <input name="icon-content" type="radio" value="icon-controller-jump-to-start">
                    <input name="icon-content" type="radio" value="icon-controller-next">
                    <input name="icon-content" type="radio" value="icon-controller-paus">
                    <input name="icon-content" type="radio" value="icon-controller-play">
                    <input name="icon-content" type="radio" value="icon-controller-record">
                    <input name="icon-content" type="radio" value="icon-controller-stop">
                    <input name="icon-content" type="radio" value="icon-controller-volume">
                    <input name="icon-content" type="radio" value="icon-copy">
                    <input name="icon-content" type="radio" value="icon-creative-commons">
                    <input name="icon-content" type="radio" value="icon-creative-commons-attribution">
                    <input name="icon-content" type="radio" value="icon-creative-commons-noderivs">
                    <input name="icon-content" type="radio" value="icon-creative-commons-noncommercial-eu">
                    <input name="icon-content" type="radio" value="icon-creative-commons-noncommercial-us">
                    <input name="icon-content" type="radio" value="icon-creative-commons-public-domain">
                    <input name="icon-content" type="radio" value="icon-creative-commons-remix">
                    <input name="icon-content" type="radio" value="icon-creative-commons-share">
                    <input name="icon-content" type="radio" value="icon-creative-commons-sharealike">
                    <input name="icon-content" type="radio" value="icon-credit">
                    <input name="icon-content" type="radio" value="icon-credit-card">
                    <input name="icon-content" type="radio" value="icon-crop">
                    <input name="icon-content" type="radio" value="icon-cross">
                    <input name="icon-content" type="radio" value="icon-cup">
                    <input name="icon-content" type="radio" value="icon-cw">
                    <input name="icon-content" type="radio" value="icon-cycle">
                    <input name="icon-content" type="radio" value="icon-database">
                    <input name="icon-content" type="radio" value="icon-dial-pad">
                    <input name="icon-content" type="radio" value="icon-direction">
                    <input name="icon-content" type="radio" value="icon-document">
                    <input name="icon-content" type="radio" value="icon-document-landscape">
                    <input name="icon-content" type="radio" value="icon-documents">
                    <input name="icon-content" type="radio" value="icon-dot-single">
                    <input name="icon-content" type="radio" value="icon-dots-three-horizontal">
                    <input name="icon-content" type="radio" value="icon-dots-three-vertical">
                    <input name="icon-content" type="radio" value="icon-dots-two-horizontal">
                    <input name="icon-content" type="radio" value="icon-dots-two-vertical">
                    <input name="icon-content" type="radio" value="icon-download">
                    <input name="icon-content" type="radio" value="icon-drink">
                    <input name="icon-content" type="radio" value="icon-drive">
                    <input name="icon-content" type="radio" value="icon-drop">
                    <input name="icon-content" type="radio" value="icon-edit">
                    <input name="icon-content" type="radio" value="icon-email">
                    <input name="icon-content" type="radio" value="icon-emoji-flirt">
                    <input name="icon-content" type="radio" value="icon-emoji-happy">
                    <input name="icon-content" type="radio" value="icon-emoji-neutral">
                    <input name="icon-content" type="radio" value="icon-emoji-sad">
                    <input name="icon-content" type="radio" value="icon-erase">
                    <input name="icon-content" type="radio" value="icon-eraser">
                    <input name="icon-content" type="radio" value="icon-export">
                    <input name="icon-content" type="radio" value="icon-eye">
                    <input name="icon-content" type="radio" value="icon-eye-with-line">
                    <input name="icon-content" type="radio" value="icon-feather">
                    <input name="icon-content" type="radio" value="icon-fingerprint">
                    <input name="icon-content" type="radio" value="icon-flag">
                    <input name="icon-content" type="radio" value="icon-flash">
                    <input name="icon-content" type="radio" value="icon-flashlight">
                    <input name="icon-content" type="radio" value="icon-flat-brush">
                    <input name="icon-content" type="radio" value="icon-flow-branch">
                    <input name="icon-content" type="radio" value="icon-flow-cascade">
                    <input name="icon-content" type="radio" value="icon-flower">
                    <input name="icon-content" type="radio" value="icon-flow-line">
                    <input name="icon-content" type="radio" value="icon-flow-parallel">
                    <input name="icon-content" type="radio" value="icon-flow-tree">
                    <input name="icon-content" type="radio" value="icon-folder">
                    <input name="icon-content" type="radio" value="icon-folder-images">
                    <input name="icon-content" type="radio" value="icon-folder-music">
                    <input name="icon-content" type="radio" value="icon-folder-video">
                    <input name="icon-content" type="radio" value="icon-forward">
                    <input name="icon-content" type="radio" value="icon-funnel">
                    <input name="icon-content" type="radio" value="icon-game-controller">
                    <input name="icon-content" type="radio" value="icon-gauge">
                    <input name="icon-content" type="radio" value="icon-globe">
                    <input name="icon-content" type="radio" value="icon-graduation-cap">
                    <input name="icon-content" type="radio" value="icon-grid">
                    <input name="icon-content" type="radio" value="icon-hair-cross">
                    <input name="icon-content" type="radio" value="icon-hand">
                    <input name="icon-content" type="radio" value="icon-heart">
                    <input name="icon-content" type="radio" value="icon-heart-outlined">
                    <input name="icon-content" type="radio" value="icon-help">
                    <input name="icon-content" type="radio" value="icon-help-with-circle">
                    <input name="icon-content" type="radio" value="icon-home">
                    <input name="icon-content" type="radio" value="icon-hour-glass">
                    <input name="icon-content" type="radio" value="icon-image">
                    <input name="icon-content" type="radio" value="icon-image-inverted">
                    <input name="icon-content" type="radio" value="icon-images">
                    <input name="icon-content" type="radio" value="icon-inbox">
                    <input name="icon-content" type="radio" value="icon-infinity">
                    <input name="icon-content" type="radio" value="icon-info">
                    <input name="icon-content" type="radio" value="icon-info-with-circle">
                    <input name="icon-content" type="radio" value="icon-install">
                    <input name="icon-content" type="radio" value="icon-key">
                    <input name="icon-content" type="radio" value="icon-keyboard">
                    <input name="icon-content" type="radio" value="icon-lab-flask">
                    <input name="icon-content" type="radio" value="icon-landline">
                    <input name="icon-content" type="radio" value="icon-language">
                    <input name="icon-content" type="radio" value="icon-laptop">
                    <input name="icon-content" type="radio" value="icon-layers">
                    <input name="icon-content" type="radio" value="icon-leaf">
                    <input name="icon-content" type="radio" value="icon-level-down">
                    <input name="icon-content" type="radio" value="icon-level-up">
                    <input name="icon-content" type="radio" value="icon-lifebuoy">
                    <input name="icon-content" type="radio" value="icon-light-bulb">
                    <input name="icon-content" type="radio" value="icon-light-down">
                    <input name="icon-content" type="radio" value="icon-light-up">
                    <input name="icon-content" type="radio" value="icon-line-graph">
                    <input name="icon-content" type="radio" value="icon-link">
                    <input name="icon-content" type="radio" value="icon-list">
                    <input name="icon-content" type="radio" value="icon-location">
                    <input name="icon-content" type="radio" value="icon-location-pin">
                    <input name="icon-content" type="radio" value="icon-lock">
                    <input name="icon-content" type="radio" value="icon-lock-open">
                    <input name="icon-content" type="radio" value="icon-login">
                    <input name="icon-content" type="radio" value="icon-log-out">
                    <input name="icon-content" type="radio" value="icon-loop">
                    <input name="icon-content" type="radio" value="icon-magnet">
                    <input name="icon-content" type="radio" value="icon-magnifying-glass">
                    <input name="icon-content" type="radio" value="icon-mail">
                    <input name="icon-content" type="radio" value="icon-man">
                    <input name="icon-content" type="radio" value="icon-map">
                    <input name="icon-content" type="radio" value="icon-mask">
                    <input name="icon-content" type="radio" value="icon-medal">
                    <input name="icon-content" type="radio" value="icon-megaphone">
                    <input name="icon-content" type="radio" value="icon-menu">
                    <input name="icon-content" type="radio" value="icon-merge">
                    <input name="icon-content" type="radio" value="icon-message">
                    <input name="icon-content" type="radio" value="icon-mic">
                    <input name="icon-content" type="radio" value="icon-minus">
                    <input name="icon-content" type="radio" value="icon-mobile">
                    <input name="icon-content" type="radio" value="icon-modern-mic">
                    <input name="icon-content" type="radio" value="icon-moon">
                    <input name="icon-content" type="radio" value="icon-mouse">
                    <input name="icon-content" type="radio" value="icon-mouse-pointer">
                    <input name="icon-content" type="radio" value="icon-music">
                    <input name="icon-content" type="radio" value="icon-network">
                    <input name="icon-content" type="radio" value="icon-new">
                    <input name="icon-content" type="radio" value="icon-new-message">
                    <input name="icon-content" type="radio" value="icon-news">
                    <input name="icon-content" type="radio" value="icon-newsletter">
                    <input name="icon-content" type="radio" value="icon-note">
                    <input name="icon-content" type="radio" value="icon-notification">
                    <input name="icon-content" type="radio" value="icon-notifications-off">
                    <input name="icon-content" type="radio" value="icon-old-mobile">
                    <input name="icon-content" type="radio" value="icon-old-phone">
                    <input name="icon-content" type="radio" value="icon-open-book">
                    <input name="icon-content" type="radio" value="icon-palette">
                    <input name="icon-content" type="radio" value="icon-paper-plane">
                    <input name="icon-content" type="radio" value="icon-pencil">
                    <input name="icon-content" type="radio" value="icon-phone">
                    <input name="icon-content" type="radio" value="icon-pie-chart">
                    <input name="icon-content" type="radio" value="icon-pin">
                    <input name="icon-content" type="radio" value="icon-plus">
                    <input name="icon-content" type="radio" value="icon-popup">
                    <input name="icon-content" type="radio" value="icon-power-plug">
                    <input name="icon-content" type="radio" value="icon-price-ribbon">
                    <input name="icon-content" type="radio" value="icon-price-tag">
                    <input name="icon-content" type="radio" value="icon-print">
                    <input name="icon-content" type="radio" value="icon-progress-empty">
                    <input name="icon-content" type="radio" value="icon-progress-full">
                    <input name="icon-content" type="radio" value="icon-progress-one">
                    <input name="icon-content" type="radio" value="icon-progress-two">
                    <input name="icon-content" type="radio" value="icon-publish">
                    <input name="icon-content" type="radio" value="icon-quote">
                    <input name="icon-content" type="radio" value="icon-radio">
                    <input name="icon-content" type="radio" value="icon-remove-user">
                    <input name="icon-content" type="radio" value="icon-reply">
                    <input name="icon-content" type="radio" value="icon-reply-all">
                    <input name="icon-content" type="radio" value="icon-resize-100%">
                    <input name="icon-content" type="radio" value="icon-resize-full-screen">
                    <input name="icon-content" type="radio" value="icon-retweet">
                    <input name="icon-content" type="radio" value="icon-rocket">
                    <input name="icon-content" type="radio" value="icon-round-brush">
                    <input name="icon-content" type="radio" value="icon-rss">
                    <input name="icon-content" type="radio" value="icon-ruler">
                    <input name="icon-content" type="radio" value="icon-save">
                    <input name="icon-content" type="radio" value="icon-scissors">
                    <input name="icon-content" type="radio" value="icon-select-arrows">
                    <input name="icon-content" type="radio" value="icon-share">
                    <input name="icon-content" type="radio" value="icon-shareable">
                    <input name="icon-content" type="radio" value="icon-share-alternative">
                    <input name="icon-content" type="radio" value="icon-shield">
                    <input name="icon-content" type="radio" value="icon-shop">
                    <input name="icon-content" type="radio" value="icon-shopping-bag">
                    <input name="icon-content" type="radio" value="icon-shopping-basket">
                    <input name="icon-content" type="radio" value="icon-shopping-cart">
                    <input name="icon-content" type="radio" value="icon-shuffle">
                    <input name="icon-content" type="radio" value="icon-signal">
                    <input name="icon-content" type="radio" value="icon-sound">
                    <input name="icon-content" type="radio" value="icon-sound-mix">
                    <input name="icon-content" type="radio" value="icon-sound-mute">
                    <input name="icon-content" type="radio" value="icon-sports-club">
                    <input name="icon-content" type="radio" value="icon-spreadsheet">
                    <input name="icon-content" type="radio" value="icon-squared-cross">
                    <input name="icon-content" type="radio" value="icon-squared-minus">
                    <input name="icon-content" type="radio" value="icon-squared-plus">
                    <input name="icon-content" type="radio" value="icon-star">
                    <input name="icon-content" type="radio" value="icon-star-outlined">
                    <input name="icon-content" type="radio" value="icon-stopwatch">
                    <input name="icon-content" type="radio" value="icon-suitcase">
                    <input name="icon-content" type="radio" value="icon-swap">
                    <input name="icon-content" type="radio" value="icon-sweden">
                    <input name="icon-content" type="radio" value="icon-switch">
                    <input name="icon-content" type="radio" value="icon-tablet">
                    <input name="icon-content" type="radio" value="icon-tablet-mobile-combo">
                    <input name="icon-content" type="radio" value="icon-tag">
                    <input name="icon-content" type="radio" value="icon-text">
                    <input name="icon-content" type="radio" value="icon-text-document">
                    <input name="icon-content" type="radio" value="icon-text-document-inverted">
                    <input name="icon-content" type="radio" value="icon-thermometer">
                    <input name="icon-content" type="radio" value="icon-thumbs-down">
                    <input name="icon-content" type="radio" value="icon-thumbs-up">
                    <input name="icon-content" type="radio" value="icon-thunder-cloud">
                    <input name="icon-content" type="radio" value="icon-ticket">
                    <input name="icon-content" type="radio" value="icon-time-slot">
                    <input name="icon-content" type="radio" value="icon-tools">
                    <input name="icon-content" type="radio" value="icon-traffic-cone">
                    <input name="icon-content" type="radio" value="icon-trash">
                    <input name="icon-content" type="radio" value="icon-tree">
                    <input name="icon-content" type="radio" value="icon-triangle-down">
                    <input name="icon-content" type="radio" value="icon-triangle-left">
                    <input name="icon-content" type="radio" value="icon-triangle-right">
                    <input name="icon-content" type="radio" value="icon-triangle-up">
                    <input name="icon-content" type="radio" value="icon-trophy">
                    <input name="icon-content" type="radio" value="icon-tv">
                    <input name="icon-content" type="radio" value="icon-typing">
                    <input name="icon-content" type="radio" value="icon-uninstall">
                    <input name="icon-content" type="radio" value="icon-unread">
                    <input name="icon-content" type="radio" value="icon-untag">
                    <input name="icon-content" type="radio" value="icon-upload">
                    <input name="icon-content" type="radio" value="icon-upload-to-cloud">
                    <input name="icon-content" type="radio" value="icon-user">
                    <input name="icon-content" type="radio" value="icon-users">
                    <input name="icon-content" type="radio" value="icon-wallet">
                    <input name="icon-content" type="radio" value="icon-warning">
                    <input name="icon-content" type="radio" value="icon-water">
                </div>

                <div class="col-xs-12 col-sm-3">
                    <div class="input-group">
                        <label for="color">Färg</label>
                        <select class="form-control" name="color">
                            <option value="black">Svart</option>
                            <option value="white">Vit</option>
                            <option value="red">UM Röd</option>
                            <option value="blue">UM Blå</option>
                            <option value="orange">Orange</option>
                            <option value="green">Grön</option>
                            <option value="volvo">Volvo</option>
                            <option value="ford">Ford</option>
                            <option value="dacia">Dacia</option>
                            <option value="renault">Renault</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="input-group">
                        <label for="bg-color">Bakgrund</label>
                        <select class="form-control" name="bg-color">
                            <option value="transparent">Ingen</option>
                            <option value="red">UM Röd</option>
                            <option value="blue">UM Blå</option>
                            <option value="black">Svart</option>
                            <option value="white">Vit</option>
                            <option value="orange">Orange</option>
                            <option value="green">Grön</option>
                            <option value="volvo">Volvo</option>
                            <option value="ford">Ford</option>
                            <option value="dacia">Dacia</option>
                            <option value="renault">Renault</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="input-group">
                        <label for="border-color">Kantfärg</label>
                        <select class="form-control" name="border-color">
                            <option value="transparent">Ingen</option>
                            <option value="red">UM Röd</option>
                            <option value="blue">UM Blå</option>
                            <option value="black">Svart</option>
                            <option value="white">Vit</option>
                            <option value="orange">Orange</option>
                            <option value="green">Grön</option>
                            <option value="volvo">Volvo</option>
                            <option value="ford">Ford</option>
                            <option value="dacia">Dacia</option>
                            <option value="renault">Renault</option>
                            <option value="pop-out">Pop-out</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="input-group">
                        <label for="size">Storlek</label>
                        <select class="form-control" name="size">
                            <option value="default">Standard</option>
                            <option value="small">Liten</option>
                            <option value="large">Stor</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="input-group">
                        <label for="float">Justering</label>
                        <select class="form-control" name="float">
                            <option value="default">Ingen</option>
                            <option value="left">Vänster</option>
                            <option value="right">Höger</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="icon-preview">
                        <span class="icon-holder" data-size="default" data-border="transparent" data-color="black" data-bgcolor="transparent" data-float="default">
                            <i class="bytbil icon icon-cab"></i>
                        </span>
                    </div>
                    <a class="btn btn-default btn-success" href="#submit" id="submit_button">Lägg till ikon</a>
                    <a class="btn btn-default btn-danger" href="#cancel" id="cancel_button" onclick="javascript:tinyMCEPopup.close();" />Cancel</a>
                </div>
            </form>
        </div>
    </body>
</html>
