# how to develop a telegram mini app
### How does telegram miniapp (webapp) work?
telegam miniapp (webapp) with php/js | how it works?

## The questions we answer in this repository
- How miniapp works
- How data is sent from frontend to backend in telegram miniapp
- How to ensure the authenticity of the data in telegram miniapp
- How do we know that you are the user you claim to be in telegram miniapp
- How to validate miniapp received data in php

`` First of all, I should say that this is an example with php. You can implement it in any language you like. ``
## how miniapp work
MiniApp is a feature of telegram that provides a GUI for bots.

![telegram miniapp](https://github.com/DeAref/miniapp/assets/95649368/fb255e24-5188-4601-a250-09e9ef2c6483)


1. user opens the mini app.
2. client sends a request to Telegram servers and receives the signed data.
3. client sends the user information along with the received signatures to the web app.
4. web app sends the signed data to the bot servers.
5. bot servers have the token with them.
6. Using the token, they decode this data and send the requested information to the webapp according to the chatID.
7. web app receives this data and displays it to the user.

## how to use
- set your bot token in `back.php` 
- If you want to change the path of the `back.php` file, you must also change the api path in `miniapp.js` line `308`
- in `back.php` you can return whatever you want



## Star History
if the repository was useful, star repository

[![Star History Chart](https://api.star-history.com/svg?repos=DeAref/miniapp&type=Date)](https://star-history.com/#DeAref/miniapp&Date)

## References
[revenkroz/telegram-web-app-bot-example](https://github.com/revenkroz/telegram-web-app-bot-example/)

[CrazyTapok-bit/tgWebValid](https://github.com/CrazyTapok-bit/tgWebValid)

[Oleg Koval](https://github.com/revenkroz/telegram-web-app-bot-example/discussions/5#discussioncomment-4863627)



## me
[t.me/DeAref](https://t.me/dearef)
aref@post.ir

