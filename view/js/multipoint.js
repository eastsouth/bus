var xmlHttp; //异步通信对象
var endStations= new Array(); //要去的站点

//初始化XMLHttpRequest
function createXMLHttpRequest() {
    if (window.ActiveXObject) {
		try{
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");}
		catch(e){}
    } 
    else if (window.XMLHttpRequest) {
		try{
        xmlHttp = new XMLHttpRequest();}
		catch(e){}
    }
    if(!xmlHttp ||typeof(xmlHttp) == 'undefined'){
            alert('创建XMLHttpRequest失败');
            return null;
    }

    return xmlHttp;
}

/* 进行异步操作
 * info 发送服务器的数据请求
 */
function do_ajax(url,info){
	createXMLHttpRequest();
	url = url+'='+info;
	xmlHttp.onreadystatechange = stateChange;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

/* readyState属性改变时的事件处理
 * data 服务器返回的文档
 */
function stateChange(){
    var data;
    if(xmlHttp.readyState ==4 ){
            if(xmlHttp.status == 200){
                if(xmlHttp.ContentType ="text/xml"){
                        data = xmlHttp.responseXML; 
                }else{
                        data = xmlHttp.responseText;
                }
            }
    }
}

/*
 * 输入框得到焦点时触发事件
 */
function OnFocusFun(element,elementvalue){
	if(element.value==elementvalue){
	element.value="";
	element.style.color="#000";
	}
} 

/*
 * 输入框失去焦点时触发事件
 */ 
function OnBlurFun(element,elementvalue){
	if(element.value==""||element.value.replace(/\s/g,"")==""){
	element.value=elementvalue;
	element.style.color="#999";
	}
}

/*增加终点站
 * 
 */
function addStations(endStation){
    endStations.push(endStation);
    var stationString='';
    for(num in endStations){
        stationString += endStations[num]+";";
    }
    document.getElementById("StationsID").innerHTML=stationString;
}

/*删除终点站
 * 
 */
function deleteStations(){
    endStations.pop();
    //输出至HTML的要去的站点
    var stationString='';
    for(num in endStations){
        stationString += endStations[num]+";";
    }
    document.getElementById("StationsID").innerHTML=stationString;
}

/*有序多点查询优化
 * 
 */
function mutipointByOredr(firststation){
    var stationString='';
    for(num in endStations){
        stationString += endStations[num]+";";
    }

    javascript:location.href='index.php?c=multisearch&a=multisearch&multi=1&firststation='+firststation+'&stations='+stationString;
}

/*无序多点查询优化
 * 
 */
function mutipointNotOrder(firststation){
    var stationString='';
    for(num in endStations){
        stationString += endStations[num]+";";
    }

    javascript:location.href='index.php?c=multisearch&a=multisearch&multi=2&firststation='+firststation+'&stations='+stationString;
}