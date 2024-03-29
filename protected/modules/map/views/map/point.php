<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-09 18:01
 */
use yii\helpers\Html;
use app\modules\map\assets\AppAsset;

//AppAsset::register($this);
?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加点标注工具--高级示例</title>
    <script>
        window.HOST_TYPE = "2";
    </script>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=9UquRjeMUCT10srAsZqSu7xychTl5PeE"></script>
    <?=$this->registerJsFile("@web/static/js/MarkerTool/MarkerTool.min.js"); ?>
    <script src="/static/js/MarkerTool/MarkerTool.min.js"></script>
    <style type="text/css">
        /* 样式选择面板相关css */
        #divStyle {
            width: 280px;
            height: 160px;
            border: solid 1px gray;
            display:block;
            margin: 4px; 0px;
            display:none;
            float: left;
        }
        #divStyle ul{
            list-style-type: none;
            padding: 2px 2px;
            margin: 2px 2px
        }
        #divStyle ul li a{
            cursor: pointer;
            margin: 2px 2px;
            width: 30px;
            height: 30px;
            display: inline-block;
            border: solid 1px #ffffff;
            text-align: center;
        }

        #divStyle ul li a:hover{
            background:none;
            border: solid 1px gray;
        }

        #divStyle ul li img{
            border: none;
            background:url('https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/icon.gif');
        }

        /* infowindow相关css */
        .common {
            font-size: 12px;
        }
        .star {
            color: #ff0000;
        }

        .head {
            width: 80%;
            height: 86px;
            margin: 20px auto;
        }

        #r-result{width:100%;}
    </style>
</head>
<body>
<div class="head">
    <div id="r-result">请输入地址：<input type="text" id="suggestId" size="40" value="成都" style="width:300px;" /></div>
    <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
    <br />
    <input type="button" value="选择标注样式" onclick="openStylePnl()" />&nbsp;&nbsp;&nbsp;
    <div id="divStyle" >
        <ul>
            <li>
                <a onclick="selectStyle(0)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:12px;height:21px;background-position: 0 0" /></a>
                <a onclick="selectStyle(1)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:12px;height:21px;background-position: -23px 0" /></a>
                <a onclick="selectStyle(2)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:12px;height:21px;background-position: -46px 0" /></a>
                <a onclick="selectStyle(3)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:12px;height:21px;background-position: -69px 0" /></a>
                <a onclick="selectStyle(4)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:12px;height:21px;background-position: -92px 0" /></a>
                <a onclick="selectStyle(5)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:12px;height:21px;background-position: -115px 0" /></a>
            </li>
            <li>
                <a onclick="selectStyle(6)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:19px;height:25px;background-position: 0 -21px" /></a>
                <a onclick="selectStyle(7)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:19px;height:25px;background-position: -23px -21px" /></a>
                <a onclick="selectStyle(8)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:19px;height:25px;background-position: -46px  -21px " /></a>
                <a onclick="selectStyle(9)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:19px;height:25px;background-position: -69px  -21px " /></a>
                <a onclick="selectStyle(10)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:19px;height:25px;background-position: -92px  -21px " /></a>
                <a onclick="selectStyle(11)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:19px;height:25px;background-position: -115px  -21px " /></a>
            </li>
            <li>
                <a onclick="selectStyle(12)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:17px;height:21px;background-position: 0 -46px " /></a>
                <a onclick="selectStyle(13)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:17px;height:21px;background-position: -23px  -46px " /></a>
                <a onclick="selectStyle(14)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:17px;height:21px;background-position: -46px  -46px " /></a>
                <a onclick="selectStyle(15)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:17px;height:21px;background-position: -69px  -46px " /></a>
                <a onclick="selectStyle(16)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:17px;height:21px;background-position: -92px  -46px " /></a>
                <a onclick="selectStyle(17)" href = 'javascript:void(0)'><img src="https://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:17px;height:21px;background-position: -115px  -46px " /></a>
            </li>
            <li>
                <a onclick="selectStyle(18)" href = 'javascript:void(0)'><img src="http://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:25px;height:25px;background-position: 0 -67px " /></a>
                <a onclick="selectStyle(19)" href = 'javascript:void(0)'><img src="http://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:25px;height:25px;background-position: -25px  -67px " /></a>
                <a onclick="selectStyle(20)" href = 'javascript:void(0)'><img src="http://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:25px;height:25px;background-position: -50px  -67px " /></a>
                <a onclick="selectStyle(21)" href = 'javascript:void(0)'><img src="http://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:25px;height:25px;background-position: -75px  -67px " /></a>
                <a onclick="selectStyle(22)" href = 'javascript:void(0)'><img src="http://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:25px;height:25px;background-position: -100px  -67px " /></a>
                <a onclick="selectStyle(23)" href = 'javascript:void(0)'><img src="http://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif" style="width:19px;height:25px;background-position: -125px  -67px " /></a>
            </li>
        </ul>
    </div>
    <input type="button" value="关闭" onclick="mkrTool.close()" />
    <br />
</div>
<div style="width: 100%; height: 500px;border:1px solid gray" id="container"></div>
</body>
</html>
<script type="text/javascript">
    var map = new BMap.Map("container");
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 5);
    map.enableScrollWheelZoom();
    this.paintMap(map)
    // 开始：搜索
    function G(id) {
        return document.getElementById(id);
    }
    var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
        {"input" : "suggestId"
            ,"location" : map
        });
    ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
        var str = "";
        var _value = e.fromitem.value;
        var value = "";
        if (e.fromitem.index > -1) {
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

        value = "";
        if (e.toitem.index > -1) {
            _value = e.toitem.value;
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }
        str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
        G("searchResultPanel").innerHTML = str;
    });
    var myValue;
    ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
        var _value = e.item.value;
        myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

        setPlace();
    });

    function setPlace(){
        function myFun(){
            var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
            map.centerAndZoom(pp, 18);
            var marker = new BMap.Marker(pp);
            // map.addOverlay(marker);    //添加标注
            marker.enableDragging();
            map.enableDragging();
        }
        var local = new BMap.LocalSearch(map, { //智能搜索
            onSearchComplete: myFun
        });
        local.search(myValue);
    }
    // 结束：搜索
    //向地图中添加比例尺控件
    var ctrlSca = new window.BMap.ScaleControl({
        anchor: BMAP_ANCHOR_BOTTOM_LEFT
    });

    //拼接infowindow内容字串
    var html = [];
    html.push('<span style="font-size:12px">属性信息: </span><br/>');
    html.push('<table border="0" cellpadding="1" cellspacing="1" >');
    html.push('  <tr>');
    html.push('      <td align="left" class="common">名 称：</td>');
    html.push('      <td colspan="2"><input type="text" maxlength="50" size="18"  id="txtName"></td>');
    html.push('	     <td valign="top"><span class="star">*</span></td>');
    html.push('  </tr>');
    html.push('  <tr>');
    html.push('      <td  align="left" class="common">电 话：</td>');
    html.push('      <td colspan="2"><input type="text" maxlength="30" size="18"  id="txtTel"></td>');
    html.push('	     <td valign="top"><span class="star">*</span></td>');
    html.push('  </tr>');
    html.push('  <tr>');
    html.push('      <td  align="left" class="common">地 址：</td>');
    html.push('      <td  colspan="2"><input type="text" maxlength="50" size="18"  id="txtAddr"></td>');
    html.push('	     <td valign="top"><span class="star">*</span></td>');
    html.push('  </tr>');
    html.push('  <tr>');
    html.push('      <td align="left" class="common">描 述：</td>');
    html.push('      <td colspan="2"><textarea rows="2" cols="15"  id="areaDesc"></textarea></td>');
    html.push('	     <td valign="top"></td>');
    html.push('  </tr>');
    html.push('  <tr>');
    html.push('	     <td  align="center" colspan="3">');
    html.push('          <input type="button" name="btnOK"  onclick="fnOK()" value="确定">&nbsp;&nbsp;');
    html.push('		     <input type="button" name="btnClear" onclick="fnClear();" value="重填">');
    html.push('	     </td>');
    html.push('  </tr>');
    html.push('</table>');

    var infoWin = new BMap.InfoWindow(html.join(""), {offset: new BMap.Size(0, -10)});
    var curMkr = null; // 记录当前添加的Mkr

    var mkrTool = new BMapLib.MarkerTool(map, {autoClose: true});
    mkrTool.addEventListener("markend", function(evt){
        var mkr = evt.marker;
        mkr.openInfoWindow(infoWin);
        curMkr = mkr;
    });
    console.log('document.getElementsByClassName(\'BMapLabel\').valueOf()', document.getElementsByClassName('BMapLabel').length)

    //打开样式面板
    function openStylePnl(){
        document.getElementById("divStyle").style.display = "block";
    }
    let type = 0;
    //选择样式
    function selectStyle(index){
        mkrTool.open(); //打开工具
        this.type = index;
        var icon = BMapLib.MarkerTool.SYS_ICONS[index]; //设置工具样式，使用系统提供的样式BMapLib.MarkerTool.SYS_ICONS[0] -- BMapLib.MarkerTool.SYS_ICONS[23]
        mkrTool.setIcon(icon);
        document.getElementById("divStyle").style.display = "none";
    }

    //提交数据
    function fnOK(){
        var name = $("#txtName").val();
        var tel =  $("#txtTel").val();
        var addr = $("#txtAddr").val();
        var desc = $("#areaDesc").val();

        if(!name || !tel || !addr){
            alert("星号字段必须填写");
            return;
        }

        if(curMkr){
            //设置label
            var lbl = new BMap.Label(name, {offset: new BMap.Size(20, -10)});
            lbl.setStyle({border: "solid 1px gray"});
            curMkr.setLabel(lbl);
            let info = new window.BMap.InfoWindow("<p style=’font-size:12px;lineheight:1.8em;’>" + name + "</br>电话：" + tel + "</br> 地址：" + addr + "</br> 描述：" + desc + "</br></p>"); // 创建信息窗口对象
            // this.openInfoWindow(info);

            curMkr.addEventListener("click", function () {
                console.log('click');
                this.openInfoWindow(info);
            });
            // lbl.addEventListener("click", function () {
            //     this.openInfoWindow(info);
            // });
            //设置title
            var title = "电话: " + tel + "\n\r" + "地址: " +addr + "\n\r" + "描述: " + desc;
            curMkr.setTitle(title);
        }
        if(infoWin.isOpen()){
            map.closeInfoWindow();
        }
        console.log('type of lbl', typeof lbl.map);
        console.log('lbl:', lbl.map)
        console.log('lbl:', JSON.stringify(lbl.map.Oe))

        //将数据提交到后台数据库中
        $.ajax({
            url : "save",
            type : 'post',
            data : {"name": name, 'tel': tel, 'addr': addr, 'desc': desc, 'point': JSON.stringify(lbl.map.Oe), 'type': this.type},
            dataType : 'json',
            async : false,
            success : function(data){
                if(data.result)
                    console.log("保存成功")
            },
            error : function(){
                console.log('保存失败');
            }
        });

        console.log('title:', title)
        console.log('document.getElementsByClassName(\'BMapLabel\').valueOf()', $(".BMapLabel").length)
    }

    function showMessage() {
    }
    //输入校验
    function encodeHTML(a){
        return a.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
    }

    //展示数据
    function showInfo(thisMarker,point) {
        //获取点的信息
        var sContent =
            '<ul style="margin:0 0 5px 0;padding:0.2em 0">'
            +'<li style="line-height: 26px;font-size: 15px;">'
            +'<span style="width: 50px;display: inline-block;">id：</span>' + point.name + '</li>'
            +'<li style="line-height: 26px;font-size: 15px;">'
            +'<span style="width: 50px;display: inline-block;">名称：</span>' + point.tel + '</li>'
            +'<li style="line-height: 26px;font-size: 15px;"><span style="width: 50px;display: inline-block;">查看：</span><a href="'+point.addr+'">详情</a></li>'
            +'</ul>';
        var infoWindow = new BMap.InfoWindow(sContent); //创建信息窗口对象
        thisMarker.openInfoWindow(infoWindow); //图片加载完后重绘infoWindow
    }
    //重填数据
    function fnClear(){
        document.getElementById("txtName").value = "";
        document.getElementById("txtTel").value = "";
        document.getElementById("txtAddr").value = "";
        document.getElementById("areaDesc").value = "";
    }
    // 进入页面绘制已存在点
    function paintMap(map) {
        // 读取已存在数据
        $.ajax({
            url : "point",
            type : 'post',
            data : {},
            dataType : 'json',
            async : false,
            success : function(data){
                if(data.data)
                {
                    let res = data.data.data;
                    $.each(res, function (index, value) {
                        console.log('index:', index)
                        console.log('value:', value)
                        let mapPoint = JSON.parse(value['point'])
                        console.log('point:', JSON.parse(value['point'])['lat'])
                        var point = new BMap.Point(mapPoint['lng'],mapPoint['lat']);
                        map.centerAndZoom(point, 12);
                        var myIcon = BMapLib.MarkerTool.SYS_ICONS[value['type']];
                        var marker = new BMap.Marker(point, {icon: myIcon});  // 创建标注
                        map.addOverlay(marker);              // 将标注添加到地图中

                        var label = new BMap.Label(value['name'],{offset:new BMap.Size(20,-10)});
                        marker.setLabel(label);
                        map.addOverlay(marker);              // 将标注添加到地图中
                        let infos = new window.BMap.InfoWindow("<p style=’font-size:12px;lineheight:1.8em;’>" + value['name'] + "</br>电话：" + value['tel'] + "</br> 地址：" + value['addr'] + "</br> 描述：" + value['desc'] + "</br></p>"); // 创建信息窗口对象
                        // this.openInfoWindow(info);

                        marker.addEventListener("click", function () {
                            console.log('click1111');
                            this.openInfoWindow(infos);
                        });
                    })
                }
            },
            error : function(){
                console.log('保存失败');
            }
        });
    }
</script>

