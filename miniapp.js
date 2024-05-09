   /*
     * This is a demo code for Telegram WebApp for Bots
     * It contains basic examples of how to use the API
     */
    const DemoApp = {
        initData      : Telegram.WebApp.initData || '',
        initDataUnsafe: Telegram.WebApp.initDataUnsafe || {},
        MainButton    : Telegram.WebApp.MainButton,

        init(options) {
            document.body.style.visibility = '';
            Telegram.WebApp.ready();
            Telegram.WebApp.MainButton.setParams({
                text      : 'CLOSE WEBVIEW',
                is_visible: true
            }).onClick(DemoApp.close);
        },
        expand() {
            Telegram.WebApp.expand();
        },
        close() {
            Telegram.WebApp.close();
        },
        toggleMainButton(el) {
            const mainButton = Telegram.WebApp.MainButton;
            if (mainButton.isVisible) {
                mainButton.hide();
                el.innerHTML = 'Show Main Button';
            } else {
                mainButton.show();
                el.innerHTML = 'Hide Main Button';
            }
        },

        // actions
        sendMessage(msg_id, with_webview) {
            if (!DemoApp.initDataUnsafe.query_id) {
                alert('WebViewQueryId not defined');
                return;
            }

            document.querySelectorAll('button').forEach((btn) => btn.disabled = true);

            const btn       = document.querySelector('#btn_status');
            btn.textContent = 'Sending...';

            DemoApp.apiRequest('sendMessage', {
                msg_id      : msg_id || '',
                with_webview: !DemoApp.initDataUnsafe.receiver && with_webview ? 1 : 0
            }, function (result) {
                document.querySelectorAll('button').forEach((btn) => btn.disabled = false);

                if (result.response) {
                    if (result.response.ok) {
                        btn.textContent   = 'Message sent successfully!';
                        btn.className     = 'ok';
                        btn.style.display = 'block';
                    } else {
                        btn.textContent   = result.response.description;
                        btn.className     = 'err';
                        btn.style.display = 'block';
                        alert(result.response.description);
                    }
                } else if (result.error) {
                    btn.textContent   = result.error;
                    btn.className     = 'err';
                    btn.style.display = 'block';
                    alert(result.error);
                } else {
                    btn.textContent   = 'Unknown error';
                    btn.className     = 'err';
                    btn.style.display = 'block';
                    alert('Unknown error');
                }
            });
        },
        changeMenuButton(close) {
            document.querySelectorAll('button').forEach((btn) => btn.disabled = true);
            const btnStatus       = document.querySelector('#btn_status');
            btnStatus.textContent = 'Changing button...';

            DemoApp.apiRequest('changeMenuButton', {}, function (result) {
                document.querySelectorAll('button').forEach((btn) => btn.disabled = false);

                if (result.response) {
                    if (result.response.ok) {
                        btnStatus.textContent   = 'Button changed!';
                        btnStatus.className     = 'ok';
                        btnStatus.style.display = 'block';
                        Telegram.WebApp.close();
                    } else {
                        btnStatus.textContent   = result.response.description;
                        btnStatus.className     = 'err';
                        btnStatus.style.display = 'block';
                        alert(result.response.description);
                    }
                } else if (result.error) {
                    btnStatus.textContent   = result.error;
                    btnStatus.className     = 'err';
                    btnStatus.style.display = 'block';
                    alert(result.error);
                } else {
                    btnStatus.textContent   = 'Unknown error';
                    btnStatus.className     = 'err';
                    btnStatus.style.display = 'block';
                    alert('Unknown error');
                }
            });
            if (close) {
                setTimeout(function () {
                    Telegram.WebApp.close();
                }, 50);
            }
        },
        checkInitData() {
            const webViewStatus = document.querySelector('#webview_data_status');
            if (DemoApp.initDataUnsafe.query_id &&
                DemoApp.initData &&
                webViewStatus.classList.contains('status_need')
            ) {
                webViewStatus.classList.remove('status_need');
                DemoApp.apiRequest('checkInitData', {}, function (result) {
                    if (result.ok) {
                        webViewStatus.textContent = 'Hash is correct (async)';
                        webViewStatus.className   = 'ok';
                    } else {
                        webViewStatus.textContent = result.error + ' (async)';
                        webViewStatus.className   = 'err';
                    }
                });
            }
        },
        sendText(spam) {
            const textField = document.querySelector('#text_field');
            const text      = textField.value;
            if (!text.length) {
                return textField.focus();
            }
            if (byteLength(text) > 4096) {
                return alert('Text is too long');
            }

            const repeat = spam ? 10 : 1;
            for (let i = 0; i < repeat; i++) {
                Telegram.WebApp.sendData(text);
            }
        },
        sendTime(spam) {
            const repeat = spam ? 10 : 1;
            for (let i = 0; i < repeat; i++) {
                Telegram.WebApp.sendData(new Date().toString());
            }
        },

        // Alerts
        showAlert(message) {
            Telegram.WebApp.showAlert(message);
        },
        showConfirm(message) {
            Telegram.WebApp.showConfirm(message);
        },
        requestWriteAccess() {
            Telegram.WebApp.requestWriteAccess(function (result) {
                if (result) {
                    DemoApp.showAlert('Write access granted');
                } else {
                    DemoApp.showAlert('Write access denied');
                }
            });
        },
        requestContact() {
            Telegram.WebApp.requestContact(function (result) {
                if (result) {
                    DemoApp.showAlert('Contact granted');
                } else {
                    DemoApp.showAlert('Contact denied');
                }
            });
        },
        isVersionAtLeast(version) {
            return Telegram.WebApp.isVersionAtLeast(version);
        },
        //version to string Example: '6.9'
        doesntSupport(version) {
            // console.log("version: " + version);
            // console.log("realVersion: " + this.version());
            // console.log("doesntSupport: " + this.isVersionAtLeast(version));
            if (!this.isVersionAtLeast(version)) {
                Telegram.WebApp.showAlert('This feature is not supported in this version of Telegram', function () {
                    Telegram.WebApp.close();
                });
                throw new Error('This feature is not supported in this version of Telegram');
            }
        },
        showPopup() {
            Telegram.WebApp.showPopup({
                title  : 'Popup title',
                message: 'Popup message',
                buttons: [
                    {id: 'delete', type: 'destructive', text: 'Delete all'},
                    {id: 'faq', type: 'default', text: 'Open FAQ'},
                    {type: 'cancel'},
                ]
            }, function (buttonId) {
                if (buttonId === 'delete') {
                    DemoApp.showAlert("'Delete all' selected");
                } else if (buttonId === 'faq') {
                    Telegram.WebApp.openLink('https://telegram.org/faq');
                }
            });
        },
        showScanQrPopup: function (linksOnly) {
            Telegram.WebApp.showScanQrPopup({
                text: linksOnly ? 'with any link' : 'for test purposes'
            }, function (text) {
                if (linksOnly) {
                    const lowerText = text.toString().toLowerCase();
                    if (lowerText.substring(0, 7) === 'http://' ||
                        lowerText.substring(0, 8) === 'https://'
                    ) {
                        setTimeout(function () {
                            Telegram.WebApp.openLink(text);
                        }, 50);

                        return true;
                    }
                } else {
                    DemoApp.showAlert(text);

                    return true;
                }
            });
        },

        // Permissions
        requestLocation(el) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    el.nextElementSibling.innerHTML = '(' + position.coords.latitude + ', ' + position.coords.longitude + ')';
                    el.nextElementSibling.className = 'ok';
                });
            } else {
                el.nextElementSibling.innerHTML = 'Geolocation is not supported in this browser.';
                el.nextElementSibling.className = 'err';
            }
            return false;
        },
        requestVideo(el) {
            if (navigator.mediaDevices) {
                navigator.mediaDevices.getUserMedia({audio: false, video: true}).then(function (stream) {
                    el.nextElementSibling.innerHTML = '(Access granted)';
                });
            } else {
                el.nextElementSibling.innerHTML = 'Media devices is not supported in this browser.';
                el.nextElementSibling.className = 'err';
            }
            return false;
        },
        requestAudio(el) {
            if (navigator.mediaDevices) {
                navigator.mediaDevices.getUserMedia({audio: true, video: false}).then(function (stream) {
                    el.nextElementSibling.innerHTML = '(Access granted)';
                    el.nextElementSibling.className = 'ok';
                });
            } else {
                el.nextElementSibling.innerHTML = 'Media devices is not supported in this browser.';
                el.nextElementSibling.className = 'err';
            }
            return false;
        },
        requestAudioVideo(el) {
            if (navigator.mediaDevices) {
                navigator.mediaDevices.getUserMedia({audio: true, video: true}).then(function (stream) {
                    el.nextElementSibling.innerHTML = '(Access granted)';
                    el.nextElementSibling.className = 'ok';
                });
            } else {
                el.nextElementSibling.innerHTML = 'Media devices is not supported in this browser.';
                el.nextElementSibling.className = 'err';
            }
            return false;
        },
        testClipboard(el) {
            Telegram.WebApp.readTextFromClipboard(function (clipText) {
                if (clipText === null) {
                    el.nextElementSibling.innerHTML = 'Clipboard text unavailable.';
                    el.nextElementSibling.className = 'err';
                } else {
                    el.nextElementSibling.innerHTML = '(Read from clipboard: Â«' + clipText + 'Â»)';
                    el.nextElementSibling.className = 'ok';
                }
            });
            return false;
        },

        apiRequest(method, data, onCallback) {
            const authData = DemoApp.initData || '';
            fetch('back.php', {
                method: 'POST',
                body: JSON.stringify(Object.assign(data, {
                    _auth: authData,
                    method: method,
                })),
                credentials: 'include',
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function(response) {
                return response.json();
            }).then(function(result) {
                onCallback && onCallback(result);
            }).catch(function(error) {
                onCallback && onCallback({error: 'Server error'});
            });
        }
    }

    const DemoAppMenu = {
        init() {
            DemoApp.init();
            document.body.classList.add('gray');
            Telegram.WebApp.setHeaderColor('secondary_bg_color');
        }
    };

    const DemoAppInitData = {
        init() {
            DemoApp.init();
            Telegram.WebApp.onEvent('themeChanged', function () {
                document.getElementById('theme_data').innerHTML = JSON.stringify(Telegram.WebApp.themeParams, null, 2);
            });
            document.getElementById('webview_data').innerHTML = JSON.stringify(DemoApp.initDataUnsafe, null, 2);
            document.getElementById('theme_data').innerHTML   = JSON.stringify(Telegram.WebApp.themeParams, null, 2);
            DemoApp.checkInitData();
        }
    };

    const DemoAppViewport = {
        init() {
            DemoApp.init();
            Telegram.WebApp.onEvent('viewportChanged', DemoAppViewport.setData);
            DemoAppViewport.setData();
        },
        setData() {
            document.querySelector('.viewport-border').setAttribute('text', window.innerWidth + ' x ' + round(Telegram.WebApp.viewportHeight, 2))
            document.querySelector('.viewport-stable_border').setAttribute('text', window.innerWidth + ' x ' + round(Telegram.WebApp.viewportStableHeight, 2) +
                ' | is_expanded: ' + (Telegram.WebApp.isExpanded ? 'true' : 'false'));
        }
    };

    function byteLength(str) {
        if (window.Blob) {
            try {
                return new Blob([str]).size;
            } catch (e) {
            }
        }

        let s = str.length;
        for (let i = str.length - 1; i >= 0; i--) {
            const code = str.charCodeAt(i);
            if (code > 0x7f && code <= 0x7ff) {
                s++;
            } else if (code > 0x7ff && code <= 0xffff) {
                s += 2;
            }

            if (code >= 0xDC00 && code <= 0xDFFF) {
                i--;
            }
        }
        return s;
    }

    function round(val, d) {
        const k = Math.pow(10, d || 0);
        return Math.round(val * k) / k;
    }
