<?php
/**
 * @author: hexiaojiao@jiapinai.com
 * @todo:
 * time: 2019-08-13 10:20
 */

use yii\helpers\Html;
use app\modules\map\assets\AppAsset;

?>
<!doctype html>
<html lang="zh-CN">

<head>
    <!-- 原始地址：//webapi.amap.com/ui/1.0/ui/misc/PoiPicker/examples/index.html -->
<!--    <base href="https://webapi.amap.com/ui/1.0/ui/misc/PoiPicker/examples/" />-->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>输入框选择POI点</title>
    <style>
        html,
        body,
        #container {
            width: 100%;
            height: 100%;
            margin: 0px;
            font-size: 13px;
        }

        #pickerBox {
            position: relative;
            z-index: 9999;
            right: 30px;
            width: 300px;
            left: 0px;
        }

        #pickerInput {
            width: 200px;
            padding: 5px 5px;
        }

        #poiInfo {
            background: #fff;
        }

        .amap_lib_placeSearch .poibox.highlight {
            background-color: #CAE1FF;
        }

        .amap_lib_placeSearch .poi-more {
            display: none!important;
        }

        /* 百度地图样式 */
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
        /* 筛选框 */
        #selectpicker {
            display: none;
        }
    </style>
</head>

<body>
<div class="head">
    <div id="r-result">请输入地址：
        <div id="pickerBox">
            <input id="pickerInput" class="form-control" placeholder="输入关键字选取地点" />
            <div id="poiInfo"></div>
        </div>
    </div>
    <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
    <br />
    <button type="button" class="btn btn-success" onclick="openStylePnl()">选择标注样式</button>
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
    <button type="button" class="btn btn-success" onclick="classify()">筛选</button>
    <select id="selectpicker" class="show-tick btn btn-success" title="请选择一项" data-live-search="true">
    </select>
    <br />
    <br />
</div>
<div style="width: 100%; height: 80%;border:1px solid gray" id="container"></div>
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=9UquRjeMUCT10srAsZqSu7xychTl5PeE"></script>
<?=$this->registerJsFile("@web/static/js/MarkerTool/MarkerTool.min.js"); ?>
<script src="/static/js/MarkerTool/MarkerTool.min.js"></script>
<script type="text/javascript" src='https://webapi.amap.com/maps?v=1.4.15&key=2b946d85884b3a5ce4805d82e7aac994'></script>
<!-- UI组件库 1.0 -->
<script src="https://webapi.amap.com/ui/1.0/main.js?v=1.0.11"></script>
<script type="text/javascript">
    var map = new BMap.Map("container");
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 12);
    map.enableScrollWheelZoom();
    type = getUrlParam('type')

    this.paintMap(map, type)

    /** 百度地图选点相关begin */
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
    html.push('	     <td valign="top"><span class="star"></span></td>');
    html.push('  </tr>');
    html.push('  <tr>');
    html.push('      <td  align="left" class="common">电 话：</td>');
    html.push('      <td colspan="2"><input type="text" maxlength="30" size="18"  id="txtTel"></td>');
    html.push('	     <td valign="top"><span class="star"></span></td>');
    html.push('  </tr>');
    html.push('  <tr>');
    html.push('      <td  align="left" class="common">地 址：</td>');
    html.push('      <td  colspan="2"><input type="text" maxlength="50" size="18"  id="txtAddr"></td>');
    html.push('	     <td valign="top"><span class="star"></span></td>');
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

    /** 百度地图选点相关end */
    AMapUI.loadUI(['misc/PoiPicker'], function(PoiPicker) {

        var poiPicker = new PoiPicker({
            //city:'北京',
            input: 'pickerInput'
        });

        //初始化poiPicker
        poiPickerReady(poiPicker);
    });

    //获取url中的参数
    function getUrlParam(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r != null) return unescape(r[2]); return null; //返回参数值
    }
    /** 分类筛选 */
    function classify() {
        $.ajax({
            url : "status",
            type : 'post',
            data : {},
            dataType : 'json',
            async : false,
            success : function(data){
                $("#selectpicker").css("display","inline");
                $("#selectpicker").empty();
                let res = data.data.result;
                //添加子元素
                $("#selectpicker").append("<option>---请选择---</option><option value='all'>全部</option>");
                $.each(res, function (index, value) {
                    $("#selectpicker").append("<option value='" + value['icon'] + "'> <span><img src=\"http://api.map.baidu.com/library/MarkerTool/1.2/examples/images/transparent.gif\" style=\"width:19px;height:25px;background-position: -125px  -67px \" />" + value['chinese'] + "</span></option>");
                });
                console.log('data:', data.data.result)
            },
            error : function(){
                console.log('error:', error)
            }
        });
    }
    /**  筛选特定的点的地图 */
    $("select#selectpicker").change(function(){
        if ( $(this).val() === 'all') {
            window.location.href='gaode';
        } else {
            window.location.href='gaode?type=' + $(this).val();
        }
        // location.href();
    });
    function poiPickerReady(poiPicker) {

        window.poiPicker = poiPicker;

        var marker = new AMap.Marker();
        var infoWindow = new AMap.InfoWindow({
            offset: new AMap.Pixel(0, -20)
        });

        //选取了某个POI
        poiPicker.on('poiPicked', function(poiResult) {

            var source = poiResult.source,
                poi = poiResult.item,
                info = {
                    source: source,
                    id: poi.id,
                    name: poi.name,
                    location: poi.location.toString(),
                    address: poi.address
                };
            setLocation(poi.location);
        });
    }

    // 用经纬度设置地图中心点
    function setLocation(location){
        if(location.lng != "" && location.lat != ""){
            var new_point = new BMap.Point(location.lng, location.lat);
            map.centerAndZoom(new BMap.Point(location.lng, location.lat), 16);
            var marker = new BMap.Marker(new_point);  // 创建标注
            // console.log('marker:', marker)
            // map.openInfoWindow(infoWin);
            // curMkr = map;
            // map.addOverlay(marker);              // 将标注添加到地图中
            // map.panTo(new_point);
            var curMkr = null; // 记录当前添加的Mkr
            var mkrTool = new BMapLib.MarkerTool(map, {autoClose: true});
            mkrTool.addEventListener("markend", function(evt){
                var mkr = evt.marker;
                mkr.openInfoWindow(infoWin);
                curMkr = mkr;
            });
        }
    }
    //打开样式面板
    function openStylePnl(){
        document.getElementById("divStyle").style.display = "block";
    }

    //选择样式
    selectType = 0; // 0:正常选择样式，1:修改样式
    selectNameType = 0; // 0:按照名字修改 1：按照id修改
    selectOption = ''
    function selectStyle(index){
        if (selectType === 0) {
            mkrTool.open(); //打开工具
            this.type = index;
            var icon = BMapLib.MarkerTool.SYS_ICONS[index]; //设置工具样式，使用系统提供的样式BMapLib.MarkerTool.SYS_ICONS[0] -- BMapLib.MarkerTool.SYS_ICONS[23]
            mkrTool.setIcon(icon);
            $("#divStyle").css("display","none");
        } else {
            changeStyle(index)
            $("#divStyle").css("display","none");
            this.selectType = 0;
        }
    }

    /** 未刷新时根据名称修改logo */
    function changeStyle(index) {
        if (this.selectNameType === 0) {
            // 通过name修改type
            $.ajax({
                url : "logo",
                type : 'post',
                data : {"name": selectOption, 'type': index},
                dataType : 'json',
                async : false,
                success : function(data){
                    alert("修改成功！")
                    location.reload();
                },
                error : function(){
                    console.log('修改失败');
                }
            });
        } else {
            // 通过id修改type
            $.ajax({
                url : "logo",
                type : 'post',
                data : {"id": selectOption, 'type': index},
                dataType : 'json',
                async : false,
                success : function(data){
                    alert("修改成功！")
                    location.reload();
                },
                error : function(){
                    console.log('修改失败');
                }
            });
        }
    }

    //提交数据
    function fnOK(){
        var name = $("#txtName").val();
        var tel =  $("#txtTel").val();
        var addr = $("#txtAddr").val();
        var desc = $("#areaDesc").val();

        // if(!name || !tel || !addr){
        //     alert("星号字段必须填写");
        //     return;
        // }

        if(curMkr){
            //设置label
            var lbl = new BMap.Label(name, {offset: new BMap.Size(20, -10)});
            lbl.setStyle({border: "solid 1px gray"});
            curMkr.setLabel(lbl);
            let info = new window.BMap.InfoWindow("<p style=’font-size:12px;lineheight:1.8em;’>" + name + "</br>电话：" + tel + "</br> 地址：" + addr + "</br> 描述：" + desc + "</br><button onclick='nameDel(" + '"' + name + '"' + ")'>删除</button><br> <button onclick='changeLogo(" + '"' + name + '"' + ", 0)'>修改图标</button><br /></p>"); // 创建信息窗口对象
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

    }

    /** 根据名称删除点位，适用于刚提交但未刷新，所以没有id的点位 */
    function nameDel(name) {
        console.log('nameDel:', name)
        //将数据提交到后台数据库中
        $.ajax({
            url : "delete",
            type : 'post',
            data : {"name": name},
            dataType : 'json',
            async : false,
            success : function(data){
                console.log('data:', data)
                alert("删除成功")
                location.reload();
            },
            error : function(){
                console.log('删除失败');
            }
        });
    }

    /** 修改logo */
    function changeLogo(name, type = 1) {
        this.selectType = 1;
        this.selectNameType = type;
        this.selectOption = name
        openStylePnl()
        if (type === 0) {
            console.log('changeLogoByName:', name)
        } else {
            console.log('name:', name)
        }
    }

    /** 删除点位 */
    function del(_id) {
        //将数据提交到后台数据库中
        $.ajax({
            url : "delete",
            type : 'post',
            data : {"id": _id},
            dataType : 'json',
            async : false,
            success : function(data){
                console.log('data:', data)
                alert("删除成功")
                location.reload();
            },
            error : function(){
                console.log('删除失败');
            }
        });
    }

    /** 进入页面时绘制已存在点 */
    function paintMap(map, type) {
        let data = {}
        if (type) {
            data = {'type': type}
        }
        // 读取已存在数据
        $.ajax({
            url : "point",
            type : 'post',
            data : data,
            dataType : 'json',
            async : false,
            success : function(data){
                if(data.data)
                {
                    let res = data.data.data;
                    $.each(res, function (index, value) {
                        let mapPoint = JSON.parse(value['point'])
                        console.log('point:', JSON.parse(value['point'])['lat'])
                        var point = new BMap.Point(mapPoint['lng'],mapPoint['lat']);
                        map.centerAndZoom(point, 6);
                        var myIcon = BMapLib.MarkerTool.SYS_ICONS[value['type']];
                        var marker = new BMap.Marker(point, {icon: myIcon});  // 创建标注
                        map.addOverlay(marker);              // 将标注添加到地图中

                        var label = new BMap.Label(value['name'],{offset:new BMap.Size(20,-10)});
                        marker.setLabel(label);
                        map.addOverlay(marker);              // 将标注添加到地图中
                        let infos = new window.BMap.InfoWindow("<p style=’font-size:12px;lineheight:1.8em;’>" + value['name'] + "</br>电话：" + value['tel'] + "</br> 地址：" + value['addr'] + "</br> 描述：" + value['desc'] + "</br><button onclick='del(" + '"' + value['_id'] + '"' + ")'>删除</button><br /><button onclick='changeLogo(" + '"' + value['_id'] + '"' + ")'>修改图标</button><br /></p>"); // 创建信息窗口对象
                        // this.openInfoWindow(info);

                        marker.addEventListener("click", function () {
                            this.openInfoWindow(infos);
                        });
                    })
                }
            },
            error : function(){
                alert('保存失败')
            }
        });
    }
    jumpName = getUrlParam('name')

    /** 如果有jumpName就代表是从集团管理跳转过来的 */
    if (jumpName) {
        let desc = getUrlParam('desc');
        let name = jumpName;
        let address = getUrlParam('address');
        let mobile = getUrlParam('mobile');
        $('#pickerInput').val(address)
        selectStyle(0)
    }
</script>
</body>

</html>
