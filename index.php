<?php
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="MobileOptimized" content="176"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="robots" content="noindex,nofollow"/>
    <title></title>
    <script src="https://telegram.org/js/telegram-web-app.js?1"></script>
    <script>
        function setThemeClass() {
            document.documentElement.className = Telegram.WebApp.colorScheme;
        }

        Telegram.WebApp.onEvent('themeChanged', setThemeClass);
        setThemeClass();
    </script>
    <style>
        body {
            --bg-color: var(--tg-theme-bg-color, #fff);
            font-family: sans-serif;
            background-color: var(--bg-color);
            color: var(--tg-theme-text-color, #222);
            font-size: 14px;
            margin: 0;
            padding: 0;
            color-scheme: var(--tg-color-scheme);
        }

        body.gray {
            background-color: var(--tg-theme-secondary-bg-color, #efefef);
        }

        a {
            color: var(--tg-theme-link-color, #2678b6);
        }

        .btn {
            font-size: 14px;
            padding: 10px 17px;
        }

        .btn-primary {
            background-color: var(--tg-theme-button-color, #50a8eb);
            color: var(--tg-theme-button-text-color, #fff);
            border: none;
        }

        button {
            display: block;
            width: 100%;
            font-size: 14px;
            margin: 15px 0;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            background-color: var(--tg-theme-button-color, #50a8eb);
            color: var(--tg-theme-button-text-color, #ffffff);
            cursor: pointer;
        }

        .main-container {
            padding: 15px;
        }

        .list-header {
            text-transform: uppercase;
            font-size: .92em;
            color: var(--tg-theme-hint-color, #ccc);
            margin: 0 0 10px;
        }

        a.list-group-item,
        button.list-group-item {
            color: var(--tg-theme-text-color, #222);
        }

        .main-container p {
            margin: 0 0 10px;
        }

        .main-container pre,
        .main-container > .btn {
            margin: 0 0 7px;
        }

        .main-container pre + .hint,
        .main-container > .btn + .hint {
            text-align: center;
            margin: 0 0 15px;
        }

        button[disabled] {
            opacity: 0.6;
            cursor: auto;
            pointer-events: none;
        }

        button.close_btn {
            /*position: fixed;*/
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 0;
            margin: 0;
            padding: 16px 20px;
            text-transform: uppercase;
        }

        input[type="text"],
        .input[contenteditable] {
            display: block;
            box-sizing: border-box;
            font-size: 14px;
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0;
            border: 1px solid var(--tg-theme-link-color, #000);
            background-color: var(--tg-theme-bg-color, #ffffff);
            border-radius: 4px;
            color: var(--tg-theme-text-color, #222222);
            text-align: start;
        }

        input[type="text"]::-webkit-input-placeholder {
            color: var(--tg-theme-hint-color, #ccc);
        }

        input[type="text"]::-moz-placeholder {
            color: var(--tg-theme-hint-color, #ccc);
        }

        input[type="text"]:-ms-input-placeholder {
            color: var(--tg-theme-hint-color, #ccc);
        }

        .input[data-placeholder] {
            position: relative;
        }

        .input[data-placeholder]:empty:before {
            position: absolute;
            left: 0;
            right: 0;
            content: attr(data-placeholder);
            color: var(--tg-theme-hint-color, #ccc);
            padding: 0 20px;
            font-weight: normal;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
        }

        section {
            padding: 15px;
            text-align: center;
            background-color: var(--bg-color, #ffffff);
        }

        section#top_sect {
            background-color: var(--tg-theme-bg-color, #ffffff);
        }

        section#top_sect.second {
            background-color: var(--tg-theme-secondary-bg-color, #efefef);
        }

        section .sect_row {
            margin: 10px 0;
        }

        section + section {
            padding: 0 15px 65px;
        }

        p {
            margin: 40px 0 15px;
        }

        ul {
            text-align: left;
        }

        li {
            color: var(--tg-theme-hint-color, #a8a8a8);
        }

        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 7px;
        }

        pre {
            background: rgba(0, 0, 0, .07);
            color: var(--tg-theme-text-color, #222);
            font-size: 12px;
            border: none;
            border-radius: 4px;
            padding: 8px;
            margin: 7px 0;
            word-break: break-word;
            white-space: pre-wrap;
            text-align: left;
        }

        .dark pre {
            background: rgba(255, 255, 255, .15);
        }

        .chat_img {
            width: 30px;
            border-radius: 15px;
            margin-right: 10px;
        }

        .columns {
            display: flex;
        }

        .columns > * {
            flex-grow: 1;
        }

        .hint {
            font-size: .8em;
            color: var(--tg-theme-hint-color, #a8a8a8);
        }

        .ok {
            color: green;
        }

        .err {
            color: red;
        }

        .status_need {
            display: none;
        }

        #fixed_wrap {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            transform: translateY(100vh);
        }

        .viewport-container {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            height: var(--tg-viewport-stable-height, 100vh);
            transition: height .2s ease;
        }

        .viewport-container .main-container {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .viewport-container .main-container button {
            width: auto;
        }

        .viewport-border,
        .viewport-stable_border {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            height: var(--tg-viewport-height, 100vh);
            pointer-events: none;
        }

        .viewport-stable_border {
            height: var(--tg-viewport-stable-height, 100vh);
        }

        .viewport-border:before,
        .viewport-stable_border:before {
            content: attr(text);
            display: inline-block;
            position: absolute;
            background: gray;
            right: 0;
            top: 0;
            font-size: 7px;
            padding: 2px 4px;
            vertical-align: top;
        }

        .viewport-stable_border:before {
            background: green;
            left: 0;
            right: auto;
        }

        .viewport-border:after,
        .viewport-stable_border:after {
            content: '';
            display: block;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            border: 2px dashed gray;
        }

        .viewport-stable_border:after {
            border-color: green;
        }

        small {
            font-size: 12px;
        }
    </style>
</head>

<body class="" style="visibility: hidden;">

<section id="top_sect" class="second">
    <button id="main_btn" onclick="DemoApp.sendMessage('');">Send «Hello, World!»</button>
    <button id="with_webview_btn" onclick="DemoApp.sendMessage('', true);">Send «Hello, World!» with inline webview button</button>
    <button id="data_btn" onclick="DemoApp.sendTime(true);">Send current time to bot (x10)</button>
    <button onclick="DemoApp.expand();">Expand Webview</button>
    <button onclick="DemoApp.toggleMainButton(this);">Hide Main Button</button>
    <input type="text" placeholder="Input text in regular input..." id="regular_field"/>
    <div
            class="input"
            contenteditable="true"
            data-placeholder="Input text in contenteditable field..."
            id="text_field"
    ></div>
    <div id="peer_wrap" style="display:none">
        <img id="peer_photo" class="chat_img" src="">
        <span id="peer_name"></span>
    </div>
    <div class="sect_row">Header: <select id="header_color_sel">
        <option value="bg_color" selected>bg_color</option>
        <option value="secondary_bg_color">secondary_bg_color</option>
    </select></div>
    <div class="sect_row">Background: <input type="color" id="bg_color_input"/> <select id="bg_color_sel">
        <option value="bg_color" selected>bg_color</option>
        <option value="secondary_bg_color">secondary_bg_color</option>
        <option value="custom" id="bg_color_val">custom...</option>
    </select></div>
</section>
<section>
    <div id="btn_status" class="hint" style="display: none;">
    </div>
    <p>Test links:</p>
    <ul>
        <li><a id="regular_link" href="">Regular link #2</a> (opens inside webview)</li>
        <li><a href="https://telegram.org/" target="_blank">target="_blank" link</a> (opens outside webview)</li>
        <li><a href="javascript:window.open('https://telegram.org/');">window.open() link</a> (opens outside webview)</li>
        <li><a href="https://t.me/like">LikeBot t.me link</a> (opens inside Telegram app)</li>
        <li><a href="javascript:Telegram.WebApp.openTelegramLink('https://t.me/vote');">web_app_open_tg_link()</a> (opens inside Telegram app)</li>
        <li><a href="javascript:Telegram.WebApp.openLink('https://google.com/');">web_app_open_link()</a> (opens outside webview)</li>
        <li><a href="tg://resolve?domain=vote">VoteBot tg:// link</a> (does not open)</li>
        <li><a href="javascript:Telegram.WebApp.openLink('https://telegra.ph/api',{try_instant_view:true});">web_app_open_link({try_instant_view:true})</a> (opens IV inside Telegram app)</li>
    </ul>
    <p>Test permissions:</p>
    <ul>
        <li><a href="javascript:;" onclick="return DemoApp.requestLocation(this);">Request Location</a> <span></span></li>
        <li><a href="javascript:;" onclick="return DemoApp.requestVideo(this);">Request Video</a> <span></span></li>
        <li><a href="javascript:;" onclick="return DemoApp.requestAudio(this);">Request Audio</a> <span></span></li>
        <li><a href="javascript:;" onclick="return DemoApp.requestAudioVideo(this);">Request Audio+Video</a> <span></span></li>
        <li><a href="javascript:;" onclick="return DemoApp.testClipboard(this);" id="clipboard_test">Read from clipboard</a> <span></span></li>
    </ul>
    <p>Test alerts:</p>
    <div class="columns">
        <ul>
            <li><a href="javascript:;" onclick="alert('Hello!');">alert</a></li>
            <li><a href="javascript:;" onclick="confirm('Are you sure?');">confirm</a></li>
            <li><a href="javascript:;" onclick="prompt('How old are you?');">prompt</a></li>
        </ul>
        <ul>
            <li><a href="javascript:;" onclick="DemoApp.showAlert('Hello!');">showAlert</a></li>
            <li><a href="javascript:;" onclick="DemoApp.showConfirm('Are you sure?');">showConfirm</a></li>
            <li><a href="javascript:;" onclick="DemoApp.requestWriteAccess();">requestWriteAccess</a></li>
            <li><a href="javascript:;" onclick="DemoApp.requestContact();">requestContact</a></li>
            <li><a href="javascript:;" onclick="DemoApp.showPopup();">showPopup</a></li>
            <li><a href="javascript:;" onclick="DemoApp.showScanQrPopup();">showScanQrPopup</a></li>
            <li><a href="javascript:;" onclick="DemoApp.showScanQrPopup(true);">showScanQrPopup (links only)</a></li>
        </ul>
    </div>
    <p>Haptics:</p>
    <ul>
        <li>Impact: <a href="javascript:Telegram.WebApp.HapticFeedback.impactOccurred('heavy');">heavy</a>, &nbsp; <a href="javascript:Telegram.WebApp.HapticFeedback.impactOccurred('light');">light</a>, &nbsp; <a href="javascript:Telegram.WebApp.HapticFeedback.impactOccurred('medium');">medium</a>, &nbsp; <a href="javascript:Telegram.WebApp.HapticFeedback.impactOccurred('rigid');">rigid</a>, &nbsp; <a href="javascript:Telegram.WebApp.HapticFeedback.impactOccurred('soft');">soft</a><br><br></li>
        <li>Notification: <a href="javascript:Telegram.WebApp.HapticFeedback.notificationOccurred('error');">error</a>, &nbsp; <a href="javascript:Telegram.WebApp.HapticFeedback.notificationOccurred('success');">success</a>, &nbsp; <a href="javascript:Telegram.WebApp.HapticFeedback.notificationOccurred('warning');">warning</a><br><br></li>
        <li>Selection: <a href="javascript:Telegram.WebApp.HapticFeedback.selectionChanged();">changed</a><br><br></li>
    </ul>
    <pre><code id="webview_data"></code></pre>
    <div class="hint">
        Data passed to webview.
        <span id="webview_data_status" class="status_need">Checking hash...</span>
    </div>
    <pre><code id="theme_data"></code></pre>
    <div class="hint">
        Theme params
    </div>
    <div class="hint">
        Version: <span id="ver"></span>,
        platform: <span id="platform"></span>
    </div>
</section>
<div class="viewport-border"></div>
<div class="viewport-stable_border"></div>

<script type="application/javascript" src="miniapp.js"></script>

<script type="application/javascript" src="eventHandlerMiniapp.js"></script>

</body>
</html>