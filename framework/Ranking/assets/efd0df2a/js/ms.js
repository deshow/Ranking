function onoff(id,mode){
	var orgid = id + "a";
	var text = "block";
	if(mode > 0){
		text = "";
	}
	if(mode == 0){
		$(id).hide();
		$(orgid).hide();
	}else{
		$(id).show();
		$(orgid).show();
	}
	if($(id).length > 1){
		list = $(id);
		for(i = 0;i < list.length;i++){
			var tmpid = "#"+list[i].id;
			$(tmpid).attr('title',text);
		}
	}else{
		$(id).attr('title',text);
		$(orgid).attr('title',text);
	}
}

function onoffEX(tagid,mode){
  list = $(tagid);
  for(i = 0;i < list.length;i++){
	  var tmpid = "#"+list[i].id;
	  if($(tmpid).attr('title') == 'block'){
		  continue;
	  }
	  if(mode == 0){
		  $(tmpid).hide();
	  }else{
		  $(tmpid).show();
	  }
  }
}
function loadSegment(cd){
	//changeTitle(cd);
    $("option[value='']").attr("selected","selected");
	initSelect();
	//国
	$("#Mf0101z2_SZCTR").val("JP");
	//取引先宛名敬称
	$("#Mf0101z2_SZAC28").val("10");
	//エリア
	$("#Mf0101z2_SZAC01").val("10");
	switch(cd.trim()){
		case "A":
			break;
		case "L":
		case "B":
		case "R":
		case "G":
			$("#Mf0101z2_SZTICKER").val("00100");
			$("#Mf0101z2_SZTICKER").attr("disabled","disabled");
			break;
		case "P":
			break;
		case "Y":
			$("#Mf0101z2_SZAC28").val("20");
			$("#Mf0101z2_SZAC28").attr("disabled","disabled");
			$("#Mf0101z2_SZTICKER").val("00100");
			$("#Mf0101z2_SZTICKER").attr("disabled","disabled");
			$("#Mf0101z2_SZAC01").attr("disabled","disabled");
			$("#Mf0101z2_SZCTR").attr("disabled","disabled");
			break;
			break;
		case ".":
			break;
	}
}
function loadSearch(cd){
	initCVSelect();
	switch(cd.trim()){
		case "C":
			paintC();
			break;
		case "V":
			paintV();
			break;
		case "CV":
			paintC();
			paintV();
			break;
	}
}

function paintC(){
	$("#Mf03012z1_VOCRCD").val("JPY");
	$("#Mf03012z1_VORYIN").val("1");
	$("#Mf03012z1_VOTXA1").val("10");
	type = $("#Mf0101z2_SZAC27").val().trim();
	if(type=='Y'){
		$("#Mf03012z1_VOTRAR").val("Z1Z");
		$("#Mf03012z1_VOTRAR").attr("disabled","disabled");
		$("#Mf03012z1_VOCRCD").attr("disabled","disabled");
		$("#Mf03012z1_VORYIN").attr("disabled","disabled");
		$("#Mf03012z1_VOTXA1").attr("disabled","disabled");
		$("#Mf03012z1_VOACL").attr("disabled","disabled");
	}
	if(type=='G'){
		$("#Mf03012z1_VOAC18").val("0");
	}
}
function paintV(){
	$("#Mf0401z1_VOCRRP").val("JPY");
	$("#Mf0101z2_SZAC05").val("1");
	$("#Mf0401z1_VOPYIN").val("1");
	$("#Mf750401_JPTY").val("7");
	$("#Mf0401z1_VOTXA2").val("13");
	type = $("#Mf0101z2_SZAC27").val().trim();
	var arr = ["L","B","R","G"]; 
	if(jQuery.inArray(type,arr) > 0){
		$("#Mf0101z2_SZCLASS03").val("1");
	}
	if(type == "Y"){
		$("#Mf0101z2_SZCLASS04").val("JPY");
		$("#Mf0401z1_VOTRAP").val("Z1Z");
		$("#Mf0030_AYCKSV").val("1");
		$("#Mf0401z1_VOCRRP").attr("disabled","disabled");
		$("#Mf0101z2_SZAN85").attr("disabled","disabled");
		$("#Mf0401z1_VOTXA2").attr("disabled","disabled");
	}
}

function segmentCTR(cd){
	onoff("div[id^='head']",1);
	onoff("div[id^='base']",1);
	onoff("div[id^='bill']",1);
	onoff("div[id^='game']",1);
	onoff("div[id^='pay']",1);
	switch(cd.trim()){
		case "A":
		case "B":
			onoff("div[id^='game']",0);
			onoff("#head5",0);
			onoff("#head7",0);
			onoff("#head8",0);
			onoff("#base3",0);
			onoff("#base8",0);
			onoff("#bill13",0);
			onoff("#bill14",0);
			onoff("#bill15",0);
			onoff("#bill16",0);
			onoff("#bill17",0);
			onoff("#pay11",0);
			onoff("#pay24",0);
			break; 
		case "L":
			onoff("div[id^='game']",0);
			onoff("#head5",0);
			onoff("#head7",0);
			onoff("#head8",0);
			onoff("#base3",0);
			onoff("#base8",0);
			onoff("#bill17",0);
			onoff("#pay11",0);
			onoff("#pay24",0);
			break; 
		case "R":
			onoff("div[id^='game']",0);
			onoff("#head5",0);
			onoff("#head7",0);
			onoff("#head8",0);
			onoff("#base3",0);
			onoff("#bill13",0);
			onoff("#bill14",0);
			onoff("#bill15",0);
			onoff("#bill16",0);
			onoff("#bill17",0);
			break; 
		case "P":
			onoff("div[id^='bill']",0);
			onoff("div[id^='game']",0);
			onoff("#head5",0);
			onoff("#head7",0);
			onoff("#head8",0);
			onoff("#base8",0);
			onoff("#pay3",0);
			onoff("#pay4",0);
			onoff("#pay5",0);
			onoff("#pay6",0);
			onoff("#pay7",0);
			onoff("#pay9",0);
			onoff("#pay11",0);
			onoff("#pay24",0);
			break; 
		case "Y":
			onoff("div[id^='game']",0);
			onoff("div[id^='bill']",0);
			onoff("#head5",0);
			onoff("#head7",0);
			onoff("#head8",0);
			onoff("#base3",0);
			onoff("#bill1",1);
			onoff("#bill2",1);
			onoff("#bill9",1);
			onoff("#bill10",1);
			onoff("#bill11",1);
			onoff("#bill12",1);
			onoff("#pay9",0);
			break; 
		case "G":
			onoff("div[id^='game']",1);
			onoff("div[id^='bill']",0);
			onoff("#head9",0);
			onoff("#base2",0);
			onoff("#base3",0);
			onoff("#bill1",1);
			onoff("#bill2",1);
			onoff("#bill8",1);
			onoff("#bill9",1);
			onoff("#bill10",1);
			onoff("#bill11",1);
			onoff("#bill12",1);
			onoff("#pay3",0);
			onoff("#pay4",0);
			onoff("#pay5",0);
			onoff("#pay6",0);
			onoff("#pay7",0);
			onoff("#pay11",0);
			onoff("#pay24",0);
			break; 
		case ".":
			onoff("div[id^='head']",0);
			onoff("div[id^='base']",0);
			onoff("div[id^='bill']",0);
			onoff("div[id^='game']",0);
			onoff("div[id^='pay']",0);
			onoff("#head1",1);
			onoff("#head2",1);
			onoff("#head3",1);
			onoff("#head4",1);
			onoff("#base5",1);
			onoff("#base6",1);
			onoff("#base7",1);
			break; 
	}
}
function searchCTR(cd){
	switch(cd.trim()){
		case "C":
			onoffEX("div[id^='bill']",1);
			onoffEX("div[id^='pay']",0);
			onoffEX("div[id^='game']",1);
			break;
		case "V":
			onoffEX("div[id^='bill']",0);
			onoffEX("div[id^='pay']",1);
			onoffEX("div[id^='game']",0);
			break; 
		case "CV":
			onoffEX("div[id^='bill']",1);
			onoffEX("div[id^='pay']",1);
			onoffEX("div[id^='game']",1);
			break;
		case "R":
		case "M":
			onoffEX("div[id^='game']",0);
			onoffEX("div[id^='bill']",0);
			onoffEX("div[id^='pay']",0);
			break;
	}
}
function mark(cd){
	//$("#head1").find('label').css('color', 'red');
	//$("#head2").find('label').css('color', 'red');
	//$("#head4").find('label').css('color', 'red');
	bc = '';
	pc = '';
	switch(cd){
		case "C":
			bc = 'red';
			pc = '';
			if($("#Mf0101z2_SZAC27").val() == "G"){
				$("#head5").find('label').css('color', bc);
				$("#game3").find('label').css('color', bc);
				$("#game6").find('label').css('color', bc);
			}
			break;
		case "V":
			bc = '';
			pc = 'red';
		case "CV":
			bc = 'red';
			pc = 'red';
			break;
	}
	$("#bill2").find('label').css('color', bc);
	$("#bill9").find('label').css('color', bc);
	$("#bill10").find('label').css('color', bc);
	$("#bill11").find('label').css('color', bc);
	$("#bill12").find('label').css('color', bc);
	
	$("#pay14").find('label').css('color', pc);
	$("#pay15").find('label').css('color', pc);
	$("#pay17").find('label').css('color', pc);
	if($("#Mf0101z2_SZAC27").val() == "Y"){
		$("#pay17").find('label').css('color', '');
	}
}
function initSelect(){
    $("select").removeAttr("disabled", "disabled");
    $("input").removeAttr("disabled", "disabled");
}
function initCVSelect(){
    $("div[id^='bill']").removeAttr("disabled", "disabled");
    $("div[id^='pay']").removeAttr("disabled", "disabled");
}
function disableOrg(){
	$("input[id^=F0101]").attr("disabled","disabled");
	$("input[id^=F0111]").attr("disabled","disabled");
	$("input[id^=F0115]").attr("disabled","disabled");
	$("input[id^=F03012]").attr("disabled","disabled");
	$("input[id^=F0401]").attr("disabled","disabled");
	$("input[id^=F0030]").attr("disabled","disabled");
	$("input[id^=F750401]").attr("disabled","disabled");
	$("input[id^=F01151]").attr("disabled","disabled");
	$("input[id^=F0116]").attr("disabled","disabled");
	$("input[id^=F0150]").attr("disabled","disabled");
}
//form load
$(function(){
	$("#btnChild").click(function(){
		var cd = $.fn.yiiGridView.getSelection('search-grid');
	    var id = $("#searchFrom").val();
	    id = "#" + id;
	    $(id).val(cd);
		$(".searchDIV").dialog("close");
	});
	$("#btnParent").click(function(){
		var cd = $.fn.yiiGridView.getSelection('searchParent-grid');
	    var id = $("#searchFrom").val();
	    id = "#" + id;
	    $(id).val(cd);
		$(".searchDIV").dialog("close");
	});
	
	$(".searchBox").focusin(function(event){
		$("#searchFrom").val($(this).attr("id"));
		if($(this).attr("id") == "Mf0101z2_SZPA8"){
			$("#dialogParent").dialog("open");
		}else{
			$("#dialog").dialog("open");
		}
	});
	
	$(".btnClear").click(function(){
		$(this).parent().children("input[type='text']").val("");
	});
	
	$( "#dialog" ).dialog({
		height:340,
		width:600,
		resizable: false,
	});
	
	$( "#dialogParent" ).dialog({
		height:340,
		width:600,
		resizable: false,
	});
	
	//for setting default layout
	$(window).on('load',function(){
		disableOrg();
		segmentCTR($("#Mf0101z2_SZAC27").val());
		searchCTR($("#Mf0101z2_SZAT1").val());
		$(".searchDIV").dialog("close");
		if($("#Mf0101z2_SZTNAC").val() == "C"){
			if($("#Mf0101z2_SZAC27").val() == "P"){
				$("#Mf0101z2_SZAT1").attr("disabled","disabled");
			}
			if($("#Mf0101z2_SZAC27").val() == "."){
				$("#Mf0101z2_SZTICKER").attr("disabled","disabled");
			}
			$("#Mf0101z2_SZAC27").attr("disabled","disabled");
		}
		if($("#Mf0101z2_SZTNAC").val() == "A" && $("#Mf0101z2_SZAC27").val() != "."){
			$("#Mf0101z2_SZAC27").attr("disabled","disabled");
		}
		$('.searchBox').attr('readonly', true);
	});
	//for zenkaku hankaku convert
    $('.fhconvert').focusout(function() {
  	   var rs = FHConvert.hgtokk($(this).val());
  	   rs = FHConvert.fkktohkk(rs,{jaCode: true, space: true});
  	   $(this).val(rs);
  	});
	//for zenkaku hankaku convert tip
    $('.fhconvert').mouseover(function() {
    	$(this).attr('title','ひらがなで入力すると半角カナに変換されます。');
  	});
    
	$("#Mf0101z2_SZAC27").change(function(){
		try{
			segmentCTR($(this).val());
			loadSegment($(this).val());
			if($(this).val().trim() == "P"){
				searchCTR("V");
				return;
			}
			if($(this).val().trim() == "."){
				return;
			}
			searchCTR("C");
			loadSearch("C");
			mark("C");
		}finally{
			setCode("V");
		}
	});
	$("#Mf0101z2_SZAT1").change(function(){
		searchCTR($(this).val());
		loadSearch($(this).val());
		mark($(this).val());
		setCode(null);
	});
	$("#Mf0101z2_SZTICKER").change(function(){
		setCode(null);
	});
	$("form").submit(function() {
		initSelect();
	});
});
function setCode(code){
	if($("#Mf0101z2_SZAN8").attr('disabled') != "disabled"){
		$("#Mf0101z2_SZAN8").val('');
	}
	var cd = $("#Mf0101z2_SZAC27").val();
	var text = "";
	switch (cd) {
	case ".":
		text = "19xxxxxx";
		if($("#Mf0101z2_SZTICKER").val().trim() == "00200"){
			text = "29xxxxxx";
		}
		break;
	case "A":
		text = "1xxxxxxx";
		break;
	case "L":
		text = "2xxxxxxx";
		break;
	case "B":
		text = "3xxxxxxx";
		break;
	case "Y":
		text = "6xxxxxxx";
		break;
	case "G":
		text = "9xxxxxxx";
		break;
	case "R":
		text = "421xxxxx";
		break;
	}
	if(cd == "P"){
		if(code != null){
			text = "51xxxxxx";
		}
		switch($("#Mf0101z2_SZAT1").val().trim()){
			case "V":
				text = "51xxxxxx";
				break;
			case "R":
				text = "52xxxxxx";
				break;
			case "M":
				text = "53xxxxxx";
				break;
		}
	}
	$("#Mf0101z2_SZAN8").val(text);
}