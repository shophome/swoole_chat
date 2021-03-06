﻿<?php
@session_start();
$user_id = isset($_GET['user_id'])?$_GET['user_id']:'';
if($user_id<>'') {
   $_SESSION['user_id'] = $user_id;
}
$data['list'] = [
    [
        'nick'=>'张三',
        'avatar'=> './images/user2.jpg',
        'from'=> 'right',
        'timestamp'=>  '10:10:12',
        'user_id'=> 1,
    ],
    [
        'nick'=>'李四',
        'avatar'=> './images/user1.jpg',
        'from'=> 'right',
        'timestamp'=>  '16:21:21',
        'user_id'=> 2,
    ],

];
$user = [];
foreach ($data['list'] as $key=>$value) {
    if(in_array($user_id,$value)) {
        $user = $value;
    }
}
if(count($user)==0) {
    $user = [
        'nick'=>'系统提示',
        'avatar'=> './images/userd.jpg',
        'from'=> 'right',
        'timestamp'=>  '16:21:21',
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户<?php echo $user['nick'];?></title>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/base.css" />
</head>
<body>
<!-- 聊天框开始 -->
<div class="modal" id="bjy-chat-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="bjy-top">
                <div class="bjy-t-myinfo">
                    <?php echo $user['nick'];?>                    <img class="bjy-t-avatar" src="<?php echo $user['avatar'];?>">
                </div>
                <div class="bjy-t-title">
                    <span class="bjy-tt-name"></span>
                    <span class="bjy-tt-edu"></span>
                    <!--<div class="bjy-tt-close" data-dismiss="modal" aria-hidden="true"></div>-->
                </div>
            </div>
            <div class="bjy-chat bjy-emoji-out3">

                <div class="bjy-friend-list msg-friend" id="msg-friend">
                    <div v-for="vo in friends" class="msg-frienabc">

                        <div class="bjy-fl-one" @click="selected(vo.user_id)"
                             :class="{active: activeName == vo.user_id}" id="f_user_{{vo.user_id}}"  data-edu="" data-avatar="{{vo.avatar}}" data-username="{{vo.nick}}" data-uid="{{vo.user_id}}">
                            <div class="bjy-flo-avatar">
                                <img class="bjy-floa-img" src="{{vo.avatar}}">
                                <div class="bjy-flo-count " style="display: none;">0</div>
                            </div>
                            <ul class="bjy-flo-info" >
                                <li class="bjy-flo-username">{{vo.nick}}<span class="bjy-flou-time">{{vo.timestamp}}</span></li>
                                <li class="bjy-flo-school"></li>
                            </ul>
                        </div>
                    </div>



                </div>
                <div class="bjy-chat-box bjy-show-out">
                    <div class="bjy-cb-history">


                        <div class="msg-content" id="msg-content">
                            <div class="message-feed media" v-for="msg in msgs">
                                <div class="bjy-cbh-one bjy-cbhla-{{msg.from}}">
                                    <div class="bjy-cbhl-avatar">
                                        <img class="bjy-cbhla-img" src="{{msg.avatar}}">
                                        <div class="bjy-cbhla-triangle"></div>

                                    </div>
                                    <div class="bjy-cbhl-content">
                                        {{msg.body}}
                                    </div>
                                    <div style="padding-top: 10px;">{{new Date(parseInt(msg.timestamp) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ')}}</div>
                                </div>

                            </div>
                        </div>
                        <!--<div class="bjy-cbh-one bjy-cbhla-left"><div class="bjy-cbhl-avatar"><img class="bjy-cbhla-img" src="images/user2.jpg"><div class="bjy-cbhla-triangle"></div></div><div class="bjy-cbhl-content">http://down.admin5.com/info/2016/0926/134391.html</div></div>-->
                        <!--<div class="bjy-cbh-one bjy-cbhla-right"><div class="bjy-cbhl-avatar"><img class="bjy-cbhla-img" src="images/user1.jpg"><div class="bjy-cbhla-triangle"></div></div><div class="bjy-cbhl-content">123<br><br></div></div>-->
                    </div>
                    <div class="bjy-cb-middle">
                        <button type="button" class="bjy-emoji-ico"></button>
                        <div class="bjy-emoji-box">
                            <div class="bjy-e-triangle" style="display:block;width:20px;height:20px;">
                                <div style="display:block;position:absolute;left:10px;top:10px;width:0;height:0;border-style:solid;border-width:10px;border-color:transparent transparent #eee  transparent;"></div>
                                <div style="display:block;position:absolute;left:10px;top:11px;;width:0;height:0;border-style:solid;border-width:10px;border-color:transparent transparent #fff transparent;"></div>
                            </div>
                            <div class="xb-h-10"></div>
                            <ul class="nav nav-tabs">
                                <li class="active bjy-emoji-category">
                                    <a href="#bjy-face-11" data-toggle="tab">表情</a>
                                </li>
                                <li class="bjy-emoji-category">
                                    <a href="#bjy-face-12" data-toggle="tab">动物</a>
                                </li>
                                <li class="bjy-emoji-category">
                                    <a href="#bjy-face-13" data-toggle="tab">水果</a>
                                </li>
                                <li class="bjy-emoji-category">
                                    <a href="#bjy-face-14" data-toggle="tab">国旗</a>
                                </li>
                                <li class="bjy-emoji-category">
                                    <a href="#bjy-face-15" data-toggle="tab">键盘</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade bjy-emoji-imgs in active" id="bjy-face-11"></div><div class="tab-pane fade bjy-emoji-imgs" id="bjy-face-12"></div>
                                <div class="tab-pane fade bjy-emoji-imgs" id="bjy-face-13"></div>
                                <div class="tab-pane fade bjy-emoji-imgs" id="bjy-face-14"></div>
                                <div class="tab-pane fade bjy-emoji-imgs" id="bjy-face-15"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bjy-cb-sendbox">
                        <textarea class="bjy-emoji-textarea bjy-emoji-from3 bjy-cbs-content hide" name="content"></textarea>
                        <div class="bjy-show-box bjy-emoji-box3" contenteditable="true"></div>
                        <input type="hidden" name="send_user" id="send_user" value="<?php echo  $user['user_id'];?>"/>
                        <input type="hidden" name="send_to_user" id="send_to_user" value=""/>
                    </div>
                    <ul class="bjy-cb-handle">
                        <li class="bjy-cbh-close" data-dismiss="modal" aria-hidden="true">关闭</li>
                        <li class="bjy-cbh-send" data-uid='<?php echo $user['user_id'];?>'>发送</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 聊天框结束 -->

<!-- 引入bootstrjs部分开始 -->
<script src="js/jquery.js"></script>
<script src="js/jquery.json.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vue/vue.min.js"></script>
<script type="text/javascript">
    var msgvm = new Vue({
        el: '#msg-content',
        data: {
            msgs: [
            ]
        }
    });

    $(function () {
        $.getJSON('./user.php',{user_id:<?php echo $user['user_id'];?>},function (data) {
            var friend = new Vue({
                el: '#msg-friend',
                data: {
                    friends: data,
                    activeName: ''
            },
                methods: {
                  update:function (d) {
                      console.log(d);
                      $("#f_user_"+d).addClass('bjy-flo-checked');
                  },
                    selected: function(gameName) {
                        this.activeName = gameName;
                        $("#send_to_user").val(gameName)
                       // $("#f_user_"+this.activeName).css('color','red');
                    }
                }
        });

        });
        var wsServer = 'ws://'+document.domain+':9503';
        var ws = new WebSocket(wsServer);
        $(document).keydown(function (e) {
            if (e.which === 13&&e.ctrlKey) {
                $('.bjy-cbh-send').trigger('click');
            }
        });
        ws.onopen = function (event) {
            ws.send("接入服务器");
        };
        ws.onmessage = function (event) {
            console.log(event.data);
            var data = JSON.parse(event.data);
            msgvm.msgs.push(data['msg']);
//            var jsonlist = JSON.stringify(data.list);
//            console.log(jsonlist);
//            msgvms.friends.push(jsonlist);
            $('.msg-content').animate({scrollTop:$(".msg-content").get(0).scrollHeight},'slow');  //滚动条自动到底部
            $('.bjy-cb-history').scrollTop(100000000);
        };
        $('.bjy-cbh-send').click(function () {

            var send_to_user = $("#send_to_user").val();
            var send_user = $("#send_user").val();
            if(send_to_user.length==0) {
                alert("请选择聊天用户");
                return;
            }
            var content = $('#bjy-chat-modal .bjy-cbs-content').val();
            if(content){
                ws.send(JSON.stringify({
                    send_to_user:send_to_user,
                    send_user:send_user,
                    content:content
                }));
                $(".bjy-show-box").empty();
            }
        });
        $(".msg-frienabc").click(function () {
            alert(1);
            $(".bjy-fl-one").addClass('bjy-flo-checked');

        });
        $('#bjy-chat-modal').modal({backdrop: 'static', keyboard: false});
    });
</script>

<script src="js/config.js"></script>
<script src="js/emoji-picker.js"></script>
<script src="js/jquery.emojiarea.js"></script>

<!--<script src="js/main.js"></script>-->
<script src="js/base.js"></script>
<script>
$(function(){
    // 初始化emoji
    window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: './images/emoji/images',
        'iconSize': 20
    });
    window.emojiPicker.discover();
     
 
    // 需要转emoji的选择器 表情选择、学霸秀、聊天框
    var toEmoji=['.bjy-emoji-box','.lqk-cfont-one','.bjy-cbhl-content,.lqk-sshow-info'];
    $.each(toEmoji, function(index, val) {
        $.each($(val), function(k, v) {
            var str=$(v).html();
            var newStr=window.emojiPicker.unicodeToImage(str);
            $(v).html(newStr);            
        });
 
    });
    // 评论框内的图片转换为from中utf8
    var imageDiv=['.bjy-emoji-box1','.bjy-emoji-box2','.bjy-emoji-box3'];
    var emojiFrom=['.bjy-emoji-from1','.bjy-emoji-from2','.bjy-emoji-from3'];
    $.each(imageDiv, function(index, val) {
        $(val).blur(function(event) {
            var str=emojiDeleteTag($(this).html());
            $(emojiFrom[index]).val(str);
        });
    });
 
    /**
     * 将带有emoji图片的字符串转为utf8
     * @param  {string} str 带emoji图片的字符串
     * @return {string}     utf8字符串
     */
    function emojiDeleteTag(str){
        var str=str.replace(/<img.*?src=\".*?\".*?style=\".*?\".*?alt=\"/g,'');
        var str=str.replace(/<img.*?style=\'.*?\'.*?alt=\"/g,'');
        var str=str.replace(/\".*?src=\".*?\">/g,'');
        str=str.replace(/:">/g,':');
        str=window.emojiPicker.colonToUnicode(str);
        return str;
    }
    // 显示或隐藏表情框
    $('.bjy-emoji-ico').click(function(event) {
        var parentObj=$(this).parents('.bjy-show-out').eq(0);
        parentObj.find('.bjy-emoji-box').toggleClass('show');
        parentObj.find('.bjy-emoji-category').eq(0).click();
    });
    // 点击emoji分类；获取分类下的表情
    $('.bjy-emoji-box').on('click', '.bjy-emoji-category', function(event) {
        var indexNumber=$(this).index(),
            thisEmojiConfig=Config.EmojiCategories[indexNumber],
            thisHtml='',
            colon='';
        // 将colon格式的标签转为图片格式
        $.each(thisEmojiConfig, function(index, val) {
            colon +=':'+Config.Emoji[val][1][0]+':';
            thisHtml=window.emojiPicker.colonToImage(colon);
        });
        // 将图片插入到div中
        $(this).parents('.bjy-emoji-box').eq(0).find('.bjy-emoji-imgs').eq(indexNumber).html(thisHtml);
    });
    // 点击添加表情
    $('body').on('click','.bjy-emoji-box img', function(event) {
        var str=$(this).prop("outerHTML");
        $(this).parents('.bjy-show-out').eq(0).find('.bjy-show-box').focus();
        insertHtmlAtCaret(str);
        // 选择表情后关闭表情选择框
        $(this).parents('.bjy-show-out').eq(0).find('.bjy-emoji-box').removeClass('show')
    });
     
})
 
 
/**
 * 在textarea光标后插入内容
 * @param  string  str 需要插入的内容
 */
function insertHtmlAtCaret(str) {
    var sel, range;
    if(window.getSelection){
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            var el = document.createElement("div");
            el.innerHTML = str;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
                range.insertNode(frag);
            if(lastNode){
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        document.selection.createRange().pasteHTML(str);
    }
}
</script>
</body>
</html>