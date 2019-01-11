$(document).ready(function () {
function deleteIt(param, call) {
    console.log(call);
    $.ajax({
        type: 'POST',
        url: "../code/app/views/inc/ajax/ajaxHandling.php",
        dataType: 'text',
        data: {'name': param, 'function': call},
        success: (function(data){
            alert(data);
        })
    })
}

    $('body').on('click', 'td[data-cel]', function () {
        $('#personalPostTable').data($(this).data('cel'));
        $('#test').text('Selected cell: ' + $(this).data('cel'));
        //event when clicking on delete button
    });
    $('.delete').click(function (e) {
        var cel, txt;
        cel = $('#personalPostTable').data('cel');
        txt = $(this).parent().siblings(cel);
        var param = txt[0].innerText;
        var call = 'delete';
        e.preventDefault();
        deleteIt(param, call);
    });

    $('#connect').click(function () {

        init()
});
    var wsUri = "wss://echo.websocket.org/";
    var output;

    function init()
    {
        output = document.getElementById("output");
        testWebSocket();
    }

    function testWebSocket()
    {
        websocket = new WebSocket(wsUri);
        websocket.onopen = function(evt) { onOpen(evt) };
        websocket.onclose = function(evt) { onClose(evt) };
        websocket.onmessage = function(evt) { onMessage(evt) };
        websocket.onerror = function(evt) { onError(evt) };
    }

    function onOpen(evt)
    {
        writeToScreen("CONNECTED");
        doSend("WebSocket rocks");
    }

    function onClose(evt)
    {
        writeToScreen("DISCONNECTED");
    }

    function onMessage(evt)
    {
        writeToScreen('<span style="color: blue;">RESPONSE: ' + evt.data+'</span>');
        websocket.close();
    }

    function onError(evt)
    {
        writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
    }

    function doSend(message)
    {
        writeToScreen("SENT: " + message);
        websocket.send(message);
    }

    function writeToScreen(message)
    {
        var pre = document.createElement("p");
        pre.style.wordWrap = "break-word";
        pre.innerHTML = message;
        output.appendChild(pre);
    }

    //window.addEventListener("load", init, false);

});

/*! modernizr 3.6.0 (Custom Build) | MIT *
* https://modernizr.com/download/?-websockets-setclasses !*/
!function(e,n,s){function o(e,n){return typeof e===n}function a(){var e,n,s,a,t,l,c;for(var r in f)if(f.hasOwnProperty(r)){if(e=[],n=f[r],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(s=0;s<n.options.aliases.length;s++)e.push(n.options.aliases[s].toLowerCase());for(a=o(n.fn,"function")?n.fn():n.fn,t=0;t<e.length;t++)l=e[t],c=l.split("."),1===c.length?Modernizr[c[0]]=a:(!Modernizr[c[0]]||Modernizr[c[0]]instanceof Boolean||(Modernizr[c[0]]=new Boolean(Modernizr[c[0]])),Modernizr[c[0]][c[1]]=a),i.push((a?"":"no-")+c.join("-"))}}function t(e){var n=c.className,s=Modernizr._config.classPrefix||"";if(r&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+s+"no-js(\\s|$)");n=n.replace(o,"$1"+s+"js$2")}Modernizr._config.enableClasses&&(n+=" "+s+e.join(" "+s),r?c.className.baseVal=n:c.className=n)}var i=[],f=[],l={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var s=this;setTimeout(function(){n(s[e])},0)},addTest:function(e,n,s){f.push({name:e,fn:n,options:s})},addAsyncTest:function(e){f.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=l,Modernizr=new Modernizr;var c=n.documentElement,r="svg"===c.nodeName.toLowerCase(),u=!1;try{u="WebSocket"in e&&2===e.WebSocket.CLOSING}catch(d){}Modernizr.addTest("websockets",u),a(),t(i),delete l.addTest,delete l.addAsyncTest;for(var p=0;p<Modernizr._q.length;p++)Modernizr._q[p]();e.Modernizr=Modernizr}(window,document);


