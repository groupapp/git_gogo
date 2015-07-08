/*
 Basic Primitives orgEditor Demo v2.0.4

 (c) Basic Primitives Inc


 Dual licensed under the MIT or GPL Version 2 licenses.
 http://jquery.org/license

*/
(function(){var a=["primitives","orgeditor"],c=window,b;for(b=0;b<a.length;b+=1)c=c[a[b]]=c[a[b]]||{}})();primitives.orgeditor.updateTips=function(a,c){a.text(c).addClass("ui-state-highlight")};primitives.orgeditor.checkLength=function(a,c,b,d,e){var f=!0;if(c.val().length>e||c.val().length<d)c.addClass("ui-state-error"),primitives.orgeditor.updateTips(a,"Length of "+b+" must be between "+d+" and "+e+"."),f=!1;return f};
primitives.orgeditor.checkColor=function(a,c,b){var d=primitives.common.getColorHexValue(c.val()),e=/^#[0-9a-f]{3}([0-9a-f]{3})?$/i;null==d||!e.test(d)?(c.addClass("ui-state-error"),primitives.orgeditor.updateTips(a,b+" has wrong color value: "+d),a=!1):(c.val(d),a=!0);return a};
primitives.orgeditor.checkNumber=function(a,c,b,d){var e=c.val();d&&primitives.common.isNullOrEmpty(e)?a=!0:null==e||isNaN(parseFloat(e))||!isFinite(e)?(c.addClass("ui-state-error"),primitives.orgeditor.updateTips(a,b+" has wrong decimal value: "+e),a=!1):(c.val(e),a=!0);return a};primitives.orgeditor.TemplateName={Default:"",Contact:"contactTemplate",PlainDescription:"plainDescriptionTemplate",Invisible:"invisibleTemplate"};primitives.orgeditor.UserTemplate=function(){this.name=""};
primitives.orgeditor.UserTemplate.prototype.getTemplate=function(){return""};primitives.orgeditor.UserTemplate.prototype.onRender=function(){};primitives.orgeditor.UserTemplateContact=function(){this.name="contactTemplate"};primitives.orgeditor.UserTemplateContact.prototype=new primitives.orgeditor.UserTemplate;
primitives.orgeditor.UserTemplateContact.prototype.getTemplate=function(){var a=new primitives.orgdiagram.TemplateConfig,c;a.name=this.name;a.itemSize=new primitives.common.Size(180,120);a.minimizedItemSize=new primitives.common.Size(4,4);a.highlightPadding=new primitives.common.Thickness(2,2,2,2);c=jQuery('<div class="bp-item bp-corner-all bt-item-frame"><div name="titleBackground" class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 176px; height: 20px;"><div name="title" class="bp-item bp-title" style="top: 3px; left: 6px; width: 168px; height: 18px;"></div></div><div class="bp-item bp-photo-frame" style="top: 26px; left: 2px; width: 25px; height: 25px;"><img name="photo" style="height:25px; width:25px;" /></div><div name="phone" class="bp-item" style="top: 26px; left: 56px; width: 122px; height: 18px; font-size: 12px;"></div><div name="email" class="bp-item" style="top: 44px; left: 56px; width: 122px; height: 18px; font-size: 12px;"></div><div name="description" class="bp-item" style="top: 62px; left: 56px; width: 122px; height: 36px; font-size: 10px;"></div><a name="readmorelabel" class="bp-item bp-readmore" style="top: 102px; left: 4px; width: 172px; height: 16px; font-size: 10px;"></a></div>').css({width:a.itemSize.width+
"px",height:a.itemSize.height+"px"});a.itemTemplate=c.wrap("<div>").parent().html();return a};
primitives.orgeditor.UserTemplateContact.prototype.onRender=function(a,c,b){var a=c.context,d,e,f,g,h;h=c.element.find("[name=readmorelabel]");switch(c.renderingMode){case primitives.common.RenderingMode.Create:h.click(function(a){primitives.common.stopPropagation(a)})}c.element.find("[name=photo]").attr({src:a.image});c.element.find("[name=titleBackground]").css({background:a.itemTitleColor});c.element.find("[name=title]").css({color:primitives.common.highestContrast(a.itemTitleColor,b.itemTitleSecondFontColor,
b.itemTitleFirstFontColor)});e=["title","description","phone","email","readmorelabel"];b=0;for(d=e.length;b<d;b+=1)f=e[b],g=c.element.find("[name="+f+"]"),f=null!=a[f]?a[f]:"",g.text()!==f&&g.text(f);h.css({visibility:!primitives.common.isNullOrEmpty(a.readmorelabel)?"inherit":"hidden"});primitives.common.isNullOrEmpty(a.readmoreurl)?h.removeAttr("href"):h.attr({href:a.readmoreurl})};primitives.orgeditor.UserTemplateDescription=function(){this.name="plainDescriptionTemplate"};
primitives.orgeditor.UserTemplateDescription.prototype=new primitives.orgeditor.UserTemplate;
primitives.orgeditor.UserTemplateDescription.prototype.getTemplate=function(){var a=new primitives.orgdiagram.TemplateConfig,c;a.name=this.name;a.itemSize=new primitives.common.Size(120,100);a.minimizedItemSize=new primitives.common.Size(4,4);a.highlightPadding=new primitives.common.Thickness(2,2,2,2);c=jQuery('<div class="bp-item bp-corner-all bt-item-frame"><div name="titleBackground" class="bp-item bp-corner-all bp-title-frame" style="top: 2px; left: 2px; width: 116px; height: 20px;"><div name="title" class="bp-item bp-title" style="top: 3px; left: 6px; width: 108px; height: 18px;"></div></div><div name="description" class="bp-item" style="top: 26px; left: 4px; width: 112px; height: 56px; font-size: 10px;"></div><a name="readmorelabel" class="bp-item bp-readmore" style="top: 82px; left: 4px; width: 112px; height: 16px; font-size: 10px;"></a></div>').css({width:a.itemSize.width+"px",
height:a.itemSize.height+"px"});a.itemTemplate=c.wrap("<div>").parent().html();return a};
primitives.orgeditor.UserTemplateDescription.prototype.onRender=function(a,c,b){var a=c.context,d,e,f,g,h;h=c.element.find("[name=readmorelabel]");switch(c.renderingMode){case primitives.common.RenderingMode.Create:h.click(function(a){primitives.common.stopPropagation(a)})}c.element.find("[name=titleBackground]").css({background:a.itemTitleColor});c.element.find("[name=title]").css({color:primitives.common.highestContrast(a.itemTitleColor,b.itemTitleSecondFontColor,b.itemTitleFirstFontColor)});e=
["title","description","readmorelabel"];b=0;for(d=e.length;b<d;b+=1)f=e[b],g=c.element.find("[name="+f+"]"),f=null!=a[f]?a[f]:"",g.text()!==f&&g.text(f);h.css({visibility:!primitives.common.isNullOrEmpty(a.readmorelabel)?"inherit":"hidden"});primitives.common.isNullOrEmpty(a.readmoreurl)?h.removeAttr("href"):h.attr({href:a.readmoreurl})};primitives.orgeditor.UserTemplateInvisible=function(){this.name="invisibleTemplate"};primitives.orgeditor.UserTemplateInvisible.prototype=new primitives.orgeditor.UserTemplate;
primitives.orgeditor.UserTemplateInvisible.prototype.getTemplate=function(){var a=new primitives.orgdiagram.TemplateConfig,c;a.name=this.name;a.itemSize=new primitives.common.Size(120,100);a.minimizedItemSize=new primitives.common.Size(4,4);a.highlightPadding=new primitives.common.Thickness(2,2,2,2);c=jQuery('<div class="bp-item bp-corner-all bt-item-frame"><div class="bp-item" style="top: 4px; left: 4px; width: 112px; height: 92px; font-size: 10px;">This item is invisible to user and its children logically belong to its first visible parent.</div></div>').css({width:a.itemSize.width+
"px",height:a.itemSize.height+"px"});a.itemTemplate=c.wrap("<div>").parent().html();return a};primitives.orgeditor.UserTemplateInvisible.prototype.onRender=function(a,c){var b=c.context;c.element.find("[name=title]").text(b.title)};
primitives.orgeditor.Config=function(){this.classPrefix="bporgeditor";this.onSave=null;this.editMode=!0;this.pageFitMode=primitives.common.PageFitMode.FitToPage;this.verticalAlignment=primitives.common.VerticalAlignmentType.Middle;this.horizontalAlignment=primitives.common.HorizontalAlignmentType.Center;this.connectorType=primitives.common.ConnectorType.Angular;this.items=null;this.selectionPathMode=primitives.common.SelectionPathMode.FullStack;this.minimalVisibility=primitives.common.Visibility.Dot;
this.defaultTemplateName=null;this.itemTitleFirstFontColor=primitives.common.Colors.White;this.itemTitleSecondFontColor=primitives.common.Colors.Navy;this.childrenPlacementType=primitives.common.ChildrenPlacementType.Horizontal;this.leavesPlacementType=primitives.common.ChildrenPlacementType.Matrix;this.normalLevelShift=20;this.lineLevelShift=this.dotLevelShift=10;this.normalItemsInterval=20;this.dotItemsInterval=10;this.lineItemsInterval=5;this.showLabels=primitives.common.Enabled.Auto;this.labelSize=
new primitives.common.Size(10,24);this.labelOffset=1;this.labelOrientation=primitives.text.TextOrientationType.Horizontal;this.labelPlacement=primitives.common.PlacementType.Top};
primitives.orgeditor.Controller=function(){this.widgetEventPrefix="bporgeditor";this.timer=null;this.options=new primitives.orgeditor.Config;this.panelHeight=50;this.selectedItem=this.dlgMessage=this.dlgCodeMirror=this.dlgConfig=this.dlgItemConfig=this.dlgOrgChart=this.orgDiagram=this.formsPlaceholder=null;this.fieldsToClone="pageFitMode orientationType verticalAlignment horizontalAlignment connectorType minimalVisibility selectionPathMode leavesPlacementType childrenPlacementType normalLevelShift dotLevelShift lineLevelShift normalItemsInterval dotItemsInterval lineItemsInterval itemTitleFirstFontColor itemTitleSecondFontColor defaultTemplateName showLabels labelOrientation labelPlacement labelSize items".split(" ");
this.userTemplates={contactTemplate:new primitives.orgeditor.UserTemplateContact,plainDescriptionTemplate:new primitives.orgeditor.UserTemplateDescription,invisibleTemplate:new primitives.orgeditor.UserTemplateInvisible}};primitives.orgeditor.Controller.prototype._create=function(){this.element.addClass("bp-item");this._createLayout();this._updateLayout();this._updateWidgets()};primitives.orgeditor.Controller.prototype.destroy=function(){this._cleanLayout();this.timer=null};
primitives.orgeditor.Controller.prototype._createLayout=function(){var a;a='<div name="forms-placeholder" class="bp-item" style="overflow:hidden; display:none;"><div name="dialog-confirm" class="dialog-form" title="Delete?"><p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>This item and all its sub-items will be deleted. Are you sure?</p></div><div name="dialog-message" title="Warning"><p><span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>You cannot remove or move root item in organizational chart.</p></div><div name="config-form"></div><div name="codemirror-form" style="margin:0; padding:0;"></div><div name="itemconfig-form"></div><div name="orgchart-form"></div></div><div name="orgchart-widget" class="bp-item" style="overflow:hidden; padding: 0px; margin: 0px; border: 0px;"></div>';
a+='<div name="orgchart-panel" style="padding: 0px; margin:10px;">';a+='<div style="width:120px;" name="options-button">Options</div><div style="width:120px;" name="json-button">JSON</div>';a+='<div style="float: right;"><label for="search100">Search:&nbsp;</label><input id="search100" name="search" style="padding: 0.4em; height: 18px; margin-right: 20px;" /></div>';a+="</div>";a=jQuery(a).addClass(this.widgetEventPrefix);this.element.append(a);this._createWidgets(this.element)};
primitives.orgeditor.Controller.prototype._createWidgets=function(){var a=new primitives.common.Rect(0,this.panelHeight,this.element.innerWidth(),this.element.innerHeight()-this.panelHeight),c=new primitives.common.Rect(0,0,a.width,this.panelHeight),b=this;this.formsPlaceholder=this.element.find("[name=forms-placeholder]");this.formsPlaceholder.css(a.getCSS());this.dlgOrgChart=this.element.find("[name=orgchart-form]").bpDlgOrgDiagram();this.dlgConfig=this.element.find("[name=config-form]").bpDlgConfig();
null!=window.CodeMirror&&(this.dlgCodeMirror=this.element.find("[name=codemirror-form]").bpDlgCodeMirror());this.dlgItemConfig=this.element.find("[name=itemconfig-form]").bpDlgItemConfig();this.dlgMessage=this.element.find("[name=dialog-message]");this.dlgConfirm=this.element.find("[name=dialog-confirm]");this.orgDiagram=this.element.find("[name=orgchart-widget]");this.orgDiagram.css(a.getCSS());this.orgDiagram.orgDiagram();this.buttonsPanel=this.element.find("[name=orgchart-panel]");this.buttonsPanel.css(c.getCSS());
this.element.find("[name=options-button]").button().click(function(){b._onOptionsButtonClick()});this.element.find("[name=json-button]").button().click(function(){b._onJsonButtonClick()});this.element.find("[name=search]").on("change keyup",function(){var a=jQuery(this);a.data("last")!==a.val()&&(a.data("last",a.val()),b._onChange(a.val()))})};
primitives.orgeditor.Controller.prototype._updateWidgets=function(){this.orgDiagram.orgDiagram("option",this._getOrgDiagramConfig());this.orgDiagram.orgDiagram("update");this.element.find("[name=search]").autocomplete({source:this._getTitles(this.options.items)})};primitives.orgeditor.Controller.prototype._getTitles=function(a){var c,b,d,e=[];c=0;for(b=a.length;c<b;c+=1)d=a[c],!0==d.isVisible&&!primitives.common.isNullOrEmpty(d.title)&&e.push(d.title);return e};
primitives.orgeditor.Controller.prototype._onChange=function(){var a,c,b,d=this.options.items,e=null,f=this,g;null==f.timer&&(f.timer=window.setTimeout(function(){g=f.buttonsPanel.find("[name=search]").val();a=0;for(c=d.length;a<c;a+=1)if(b=d[a],!0==b.isVisible&&b.title==g){e=b.id;break}else 0<=b.title.indexOf(g)&&(e=b.id);null!=e&&(f.orgDiagram.orgDiagram("option",{cursorItem:e}),f.orgDiagram.orgDiagram("update",primitives.common.UpdateMode.Refresh));window.clearTimeout(f.timer);f.timer=null},300))};
primitives.orgeditor.Controller.prototype._onOptionsButtonClick=function(){var a=this,c,b,d,e;a.dlgConfig.bpDlgConfig("option",{cancel:function(){},update:function(){e={};c=0;for(b=a.fieldsToClone.length;c<b;c+=1)d=a.fieldsToClone[c],e[d]=a.options[d];a.orgDiagram.orgDiagram("option",e);a.orgDiagram.orgDiagram("update");a._trigger("onSave")}});a.dlgConfig.bpDlgConfig("open",a.options)};
primitives.orgeditor.Controller.prototype._onJsonButtonClick=function(){var a=this,c,b,d,e;if(null!=this.dlgCodeMirror){a.dlgCodeMirror.bpDlgCodeMirror("option",{cancel:function(){},update:function(f,g){e={};c=0;for(b=a.fieldsToClone.length;c<b;c+=1)d=a.fieldsToClone[c],a.options[d]=g[d],e[d]=g[d];a._updateItemConfigs(e.items);e.cursorItem=null!=e.items[0]?e.items[0].id:null;a.orgDiagram.orgDiagram("option",e);a.orgDiagram.orgDiagram("update");a._trigger("onSave")}});e={};c=0;for(b=a.fieldsToClone.length;c<
b;c+=1)d=a.fieldsToClone[c],e[d]=a.options[d];a.dlgCodeMirror.bpDlgCodeMirror("open",JSON.stringify(e,void 0,2))}else alert("In order to enable this function you have to download latest version of Basic Primitives Joomla modules.")};primitives.orgeditor.Controller.prototype._cleanLayout=function(){this.element.find("."+this.widgetEventPrefix).remove()};
primitives.orgeditor.Controller.prototype._updateItemConfigs=function(a){var c,b,d;c=0;for(b=a.length;c<b;c+=1)d=a[c],d.isVisible=!0,"invisibleTemplate"===d.templateName&&(d.isVisible=this.options.editMode)};
primitives.orgeditor.Controller.prototype._updateLayout=function(){var a=new primitives.common.Rect(0,this.panelHeight,this.element.innerWidth(),this.element.innerHeight()-this.panelHeight),c=new primitives.common.Rect(0,0,a.width,this.panelHeight),b=this.options.editMode?"inherit":"hidden";this.formsPlaceholder.css(a.getCSS());this.orgDiagram.css(a.getCSS());this.buttonsPanel.css(c.getCSS());this.buttonsPanel.find("[name=options-button]").css({visibility:b});this.buttonsPanel.find("[name=json-button]").css({visibility:b})};
primitives.orgeditor.Controller.prototype.update=function(){this._updateLayout();this._updateWidgets()};
primitives.orgeditor.Controller.prototype._getOrgDiagramConfig=function(){var a=this,c=[],b,d,e,f;for(b in this.userTemplates)this.userTemplates.hasOwnProperty(b)&&c.push(this.userTemplates[b].getTemplate());f=new primitives.orgdiagram.Config;b=0;for(d=a.fieldsToClone.length;b<d;b+=1)e=a.fieldsToClone[b],f[e]=a.options[e];this._updateItemConfigs(a.options.items);f.cursorItem=null!=a.options.items[0]?a.options.items[0].id:null;f.hasButtons=primitives.common.Enabled.False;f.hasSelectorCheckbox=primitives.common.Enabled.False;
f.templates=c;f.onItemRender=function(b,c){a.userTemplates[c.templateName].onRender(b,c,a.options)};f.onMouseClick=function(b,c){a._onMouseClick(b,c)};this.options.editMode&&(f.hasButtons=primitives.common.Enabled.Auto,f.hasSelectorCheckbox=primitives.common.Enabled.True,f.buttons=[new primitives.orgdiagram.ButtonConfig("properties","ui-icon-person","Edit"),new primitives.orgdiagram.ButtonConfig("delete","ui-icon-trash","Delete"),new primitives.orgdiagram.ButtonConfig("add","ui-icon-plus","Add"),
new primitives.orgdiagram.ButtonConfig("move","ui-icon-arrow-4","Move")],f.onButtonClick=function(b,c){a._onButtonClick(b,c)});return f};primitives.orgeditor.Controller.prototype._onMouseClick=function(a,c){if(!this.options.editMode){var b=this.orgDiagram.orgDiagram("option","cursorItem");null!=c.context&&(b===c.context.id&&!primitives.common.isNullOrEmpty(b.readmoreurl))&&(window.location.href=b.readmoreurl)}};
primitives.orgeditor.Controller.prototype._onButtonClick=function(a,c){var b=this,d,e,f,g,h,i,j;switch(c.name){case "delete":null===c.parentItem?b.dlgMessage.dialog({modal:!0,buttons:{Ok:function(){jQuery(this).dialog("close")}}}):b.dlgConfirm.dialog({resizable:!1,height:240,modal:!0,buttons:{Delete:function(){j=b._getSubItemsForParent(c.context);j[c.context.id]=!0;i=[];e=0;for(f=b.options.items.length;e<f;e+=1)h=b.options.items[e],j.hasOwnProperty(h.id)||i.push(h);b.options.items=i;b.orgDiagram.orgDiagram("option",
{items:b.options.items,cursorItem:c.context.parent});b.orgDiagram.orgDiagram("update",primitives.common.UpdateMode.Refresh);jQuery(this).dialog("close");b._trigger("onSave")},Cancel:function(){jQuery(this).dialog("close")}}});break;case "properties":b.dlgItemConfig.bpDlgItemConfig("option",{cancel:function(){},update:function(){var a=b.dlgItemConfig.bpDlgItemConfig("option","children"),c,d={},f;e=0;for(c=a.length;e<c;e+=1)f=a[e],d[f.id]=!0;i=[];e=0;for(c=b.options.items.length;e<c;e+=1)f=b.options.items[e],
d.hasOwnProperty(f.id)||i.push(f);b.options.items=i.concat(a);b.orgDiagram.orgDiagram("option",{items:b.options.items});b.orgDiagram.orgDiagram("update",primitives.common.UpdateMode.Refresh);b._trigger("onSave")},itemConfig:c.context,children:b._getChildrenForParent(c.context)});b.dlgItemConfig.bpDlgItemConfig("open");break;case "add":b.selectedItem=c.context;b.dlgItemConfig.bpDlgItemConfig("option",{cancel:function(){},update:function(){var a=b.dlgItemConfig.bpDlgItemConfig("option","itemConfig");
a.id=b._getMaximumId()+1;a.parent=b.selectedItem.id;b.options.items.push(a);b.orgDiagram.orgDiagram("option",{items:b.options.items,cursorItem:a.id});b.orgDiagram.orgDiagram("update",primitives.common.UpdateMode.Refresh);b._trigger("onSave")},itemConfig:null,children:[]});b.dlgItemConfig.bpDlgItemConfig("open");break;case "move":if(null===c.parentItem)b.dlgMessage.dialog({modal:!0,buttons:{Ok:function(){jQuery(this).dialog("close")}}});else{b.selectedItem=c.context;b.dlgOrgChart.bpDlgOrgDiagram("option",
{cancel:function(){},update:function(a,d){c.context.parent=d;b.orgDiagram.orgDiagram("update",primitives.common.UpdateMode.Refresh);b._trigger("onSave")}});d=new primitives.orgdiagram.Config;e=0;for(f=b.fieldsToClone.length;e<f;e+=1)g=b.fieldsToClone[e],d[g]=b.options[g];d.hasButtons=primitives.common.Enabled.False;d.hasSelectorCheckbox=primitives.common.Enabled.False;d.items=b.options.items;d.cursorItem=b.orgDiagram.orgDiagram("option","cursorItem");b.dlgOrgChart.bpDlgOrgDiagram("open",d,c.context)}}};
primitives.orgeditor.Controller.prototype._setOption=function(a,c){jQuery.Widget.prototype._setOption.apply(this,arguments)};primitives.orgeditor.Controller.prototype._getMaximumId=function(){var a=0,c,b,d;c=0;for(b=this.options.items.length;c<b;c+=1)d=this.options.items[c],a=Math.max(a,d.id);return a};primitives.orgeditor.Controller.prototype._getChildrenForParent=function(a){var c=[],b,d,e;b=0;for(d=this.options.items.length;b<d;b+=1)e=this.options.items[b],e.parent==a.id&&c.push(e);return c};
primitives.orgeditor.Controller.prototype._getSubItemsForParent=function(a){var c={},b,d,e,f;b=0;for(d=this.options.items.length;b<d;b+=1)e=this.options.items[b],null==c[e.parent]&&(c[e.parent]=[]),c[e.parent].push(e);a=c[a.id];d={};if(null!=a)for(;0<a.length;){f=[];for(b=0;b<a.length;b+=1)e=a[b],d[e.id]=e,null!=c[e.id]&&(f=f.concat(c[e.id]));a=f}return d};(function(a){a.widget("ui.bpOrgEditor",new primitives.orgeditor.Controller)})(jQuery);
primitives.orgeditor.DlgCodeMirrorOptions=function(){this.update=this.cancel=null};primitives.orgeditor.DlgCodeMirror=function(){this.widgetEventPrefix="bpdlgjson";this.options=new primitives.orgeditor.DlgCodeMirrorOptions;this.editor=this.content=this.placeholder=null};primitives.orgeditor.DlgCodeMirror.prototype._create=function(){this._createLayout()};primitives.orgeditor.DlgCodeMirror.prototype.destroy=function(){this._cleanLayout()};
primitives.orgeditor.DlgCodeMirror.prototype._createLayout=function(){this.placeholder=jQuery('<div style="overflow: hidden; padding:0; margin:0; border: 0px;"><form><textarea name="content"></textarea></form></div>').addClass(this.widgetEventPrefix);this.element.append(this.placeholder);this.element.addClass("dialog-form");this.content=this.element.find("[name=content]")};
primitives.orgeditor.DlgCodeMirror.prototype._updateLayout=function(){var a=new primitives.common.Rect(0,0,this.element.outerWidth(),this.element.outerHeight()),c=this.element.find(".CodeMirror");this.placeholder.css(a.getCSS());c.css(a.getCSS());this.editor.setSize(a.width+"px",a.height+"px")};primitives.orgeditor.DlgCodeMirror.prototype._cleanLayout=function(){this.element.empty();this.element.removeClass("dialog-form")};
primitives.orgeditor.DlgCodeMirror.prototype.open=function(a){var c=this;this.content.val(a);this.editor=CodeMirror.fromTextArea(this.content[0],{lineNumbers:!0,matchBrackets:!0});this.element.dialog({autoOpen:!1,minWidth:640,minHeight:480,modal:!0,title:"Organizational Chart Data",buttons:{Save:function(){a=JSON.parse(c.editor.getValue());jQuery(this).dialog("close");c._trigger("update",null,a)},Cancel:function(){jQuery(this).dialog("close");c._trigger("cancel",null)}},resizeStop:function(){c._updateLayout()},
close:function(){c.editor.toTextArea();c._trigger("cancel",null)},open:function(){c._updateLayout()}}).dialog("open")};primitives.orgeditor.DlgCodeMirror.prototype._setOption=function(a,c){jQuery.Widget.prototype._setOption.apply(this,arguments)};(function(a){a.widget("ui.bpDlgCodeMirror",new primitives.orgeditor.DlgCodeMirror)})(jQuery);primitives.orgeditor.DlgConfigOptions=function(){this.update=this.cancel=null};
primitives.orgeditor.DlgConfig=function(){this.widgetEventPrefix="bpdlgconfig";this.options=new primitives.orgeditor.DlgConfigOptions;this.tips=this.itemTitleSecondFontColor=this.itemTitleFirstFontColor=this.labelHeight=this.labelWidth=this.labelPlacement=this.labelOrientation=this.showLabels=this.defaultTemplateName=this.leavesPlacementType=this.childrenPlacementType=this.selectionPathMode=this.minimalVisibility=this.connectorType=this.horizontalAlignment=this.verticalAlignment=this.orientationType=
this.pageFitMode=null;this.enums={pageFitMode:{name:primitives.common.PageFitMode,title:"Page Fit Mode",isString:!1},orientationType:{name:primitives.common.OrientationType,title:"Orientation",isString:!1},verticalAlignment:{name:primitives.common.VerticalAlignmentType,title:"Items Vertical Alignment",isString:!1},horizontalAlignment:{name:primitives.common.HorizontalAlignmentType,title:"Items Horizontal Alignment",isString:!1},connectorType:{name:primitives.common.ConnectorType,title:"Connectors",
isString:!1},minimalVisibility:{name:primitives.common.Visibility,title:"Minimal nodes visibility",isString:!1},selectionPathMode:{name:primitives.common.SelectionPathMode,title:"Selection Path Mode",isString:!1},childrenPlacementType:{name:primitives.common.ChildrenPlacementType,title:"Children placement",isString:!1},leavesPlacementType:{name:primitives.common.ChildrenPlacementType,title:"Leaves placement",isString:!1},defaultTemplateName:{name:primitives.orgeditor.TemplateName,title:"Default item template",
isString:!0},showLabels:{name:primitives.common.Enabled,title:"Show labels",isString:!1},labelOrientation:{name:primitives.text.TextOrientationType,title:"Labels orientation",isString:!1},labelPlacement:{name:primitives.common.PlacementType,title:"Labels placement",isString:!1}}};primitives.orgeditor.DlgConfig.prototype._create=function(){this._createLayout()};primitives.orgeditor.DlgConfig.prototype.destroy=function(){this._cleanLayout()};
primitives.orgeditor.DlgConfig.prototype._createLayout=function(){var a,c,b;a='<p class="validateTips">All form fields are required.</p><form><fieldset>';for(c in this.enums)this.enums.hasOwnProperty(c)&&(b=this.enums[c],a+='<br/><label for="'+c+'">'+b.title+'</label><select class="text ui-widget-content ui-corner-all" style="padding:2px; margin:5px;" name="'+c+'"></select>');a=jQuery(a+'<br/><label for="labelWidth">Label width</label><input type="text" name="labelWidth" class="text ui-widget-content ui-corner-all" /><br/><label for="labelHeight">Label height</label><input type="text" name="labelHeight" class="text ui-widget-content ui-corner-all" /><br/><label for="itemTitleFirstFontColor">Title first font color</label><input type="text" name="itemTitleFirstFontColor" class="text ui-widget-content ui-corner-all" /><br/><label for="itemTitleSecondFontColor">Title second font color</label><input type="text" name="itemTitleSecondFontColor" class="text ui-widget-content ui-corner-all" /></fieldset></form>').addClass(this.widgetEventPrefix);
this.element.append(a);this.element.addClass("dialog-form");this._createWidgets(this.element)};
primitives.orgeditor.DlgConfig.prototype._createWidgets=function(){var a,c,b,d;d=[];this.tips=this.element.find(".validateTips");this.labelWidth=this.element.find("[name=labelWidth]");this.labelHeight=this.element.find("[name=labelHeight]");this.itemTitleFirstFontColor=this.element.find("[name=itemTitleFirstFontColor]");this.itemTitleSecondFontColor=this.element.find("[name=itemTitleSecondFontColor]");for(c in primitives.common.Colors)primitives.common.Colors.hasOwnProperty(c)&&d.push(c);this.itemTitleFirstFontColor.autocomplete({source:d});
this.itemTitleSecondFontColor.autocomplete({source:d});for(a in this.enums)if(this.enums.hasOwnProperty(a)){c=this.enums[a];this[a]=this.element.find("[name="+a+"]");for(b in c.name)c.name.hasOwnProperty(b)&&(d=c.name[b],this[a].append(jQuery("<option value='"+d+"'>"+b+"</option>")));this[a].buttonset()}};primitives.orgeditor.DlgConfig.prototype._cleanLayout=function(){this.element.empty();this.element.removeClass("dialog-form")};
primitives.orgeditor.DlgConfig.prototype.open=function(a){var c=jQuery([]).add(this.itemTitleFirstFontColor).add(this.itemTitleSecondFontColor),b=this,a=void 0!==a?a:new primitives.orgdiagram.ItemConfig;this._updateWidgets(a);this.element.dialog({autoOpen:!1,height:400,width:350,modal:!0,title:"Chart options",buttons:{Save:function(){var d=!0;c.removeClass("ui-state-error");if(d=(d=(d=(d=(d=(d=d&&primitives.orgeditor.checkLength(b.tips,b.itemTitleFirstFontColor,"Title first font color",0,20))&&primitives.orgeditor.checkLength(b.tips,
b.itemTitleSecondFontColor,"Title second font color",0,20))&&primitives.orgeditor.checkColor(b.tips,b.itemTitleFirstFontColor,"Title first font color"))&&primitives.orgeditor.checkColor(b.tips,b.itemTitleSecondFontColor,"Title second font color"))&&primitives.orgeditor.checkNumber(b.tips,b.labelWidth,"Label width"))&&primitives.orgeditor.checkNumber(b.tips,b.labelHeight,"Label height"))b._updateConfig(a),jQuery(this).dialog("close"),b._trigger("update",null,a)},Cancel:function(){jQuery(this).dialog("close");
b._trigger("cancel",null,a)}},close:function(){c.val("").removeClass("ui-state-error");b._trigger("cancel",null,a)}}).dialog("open")};
primitives.orgeditor.DlgConfig.prototype._updateWidgets=function(a){var c,b;for(c in this.enums)this.enums.hasOwnProperty(c)&&(b=a[c],null==b&&(b=this._getFirstEnumItem(this.enums[c].name)),this[c].val(b));this.itemTitleFirstFontColor.val(a.itemTitleFirstFontColor);this.itemTitleSecondFontColor.val(a.itemTitleSecondFontColor);this.labelWidth.val(a.labelSize.width);this.labelHeight.val(a.labelSize.height)};
primitives.orgeditor.DlgConfig.prototype._getFirstEnumItem=function(a){for(var c in a)if(a.hasOwnProperty(c))return a[c];return null};
primitives.orgeditor.DlgConfig.prototype._updateConfig=function(a){var c,b;for(c in this.enums)this.enums.hasOwnProperty(c)&&(b=this[c].val(),a[c]=this.enums[c].isString?b:parseInt(b,10));a.itemTitleFirstFontColor=this.itemTitleFirstFontColor.val();a.itemTitleSecondFontColor=this.itemTitleSecondFontColor.val();a.labelSize=new primitives.common.Size(parseFloat(this.labelWidth.val()),parseFloat(this.labelHeight.val()))};
primitives.orgeditor.DlgConfig.prototype._setOption=function(a,c){jQuery.Widget.prototype._setOption.apply(this,arguments)};(function(a){a.widget("ui.bpDlgConfig",new primitives.orgeditor.DlgConfig)})(jQuery);primitives.orgeditor.DlgItemConfigOptions=function(){this.itemConfig=this.update=this.cancel=null;this.children=[]};
primitives.orgeditor.DlgItemConfig=function(){this.widgetEventPrefix="bpdlgitemconfig";this.options=new primitives.orgeditor.DlgItemConfigOptions;this.defaultTemplateName=this.childrenPlacementType=this.adviserPlacementType=this.itemType=this.labelHeight=this.labelWidth=this.labelPlacement=this.labelOrientation=this.showLabels=this.sortableList=this.groupTitleColor=this.groupTitle=this.readmoreurl=this.readmorelabel=this.image=this.email=this.phone=this.description=this.itemTitleColor=this.title=
null;this.textFields={title:{title:"Title"},itemTitleColor:{title:"Title Color"},description:{title:"Description"},phone:{title:"Phone"},email:{title:"E-mail"},groupTitle:{title:"Group Title"},groupTitleColor:{title:"Group Title Color"},image:{title:"Photo"},readmorelabel:{title:"Read more label"},readmoreurl:{title:"Read more URL"},label:{title:"Label"}};this.tips=null;this.enums={itemType:{name:{Regular:0,Assistant:1,Adviser:2,SubAssistant:4,SubAdviser:5,GeneralPartner:6,LimitedPartner:7,AdviserPartner:8},
title:"Item type",isString:!1},adviserPlacementType:{name:primitives.common.AdviserPlacementType,title:"Adviser placement",isString:!1},childrenPlacementType:{name:primitives.common.ChildrenPlacementType,title:"Children placement",isString:!1},templateName:{name:primitives.orgeditor.TemplateName,title:"Item template",isString:!0},showLabel:{name:primitives.common.Enabled,title:"Show labels",isString:!1},labelOrientation:{name:primitives.text.TextOrientationType,title:"Labels orientation",isString:!1},
labelPlacement:{name:primitives.common.PlacementType,title:"Labels placement",isString:!1}}};primitives.orgeditor.DlgItemConfig.prototype._create=function(){this._createLayout()};primitives.orgeditor.DlgItemConfig.prototype.destroy=function(){this._cleanLayout()};
primitives.orgeditor.DlgItemConfig.prototype._createLayout=function(){var a,c,b;b="<ul>"+('\t<li><a href="#'+this.widgetEventPrefix+'options">Options</a></li>');b+='\t<li><a href="#'+this.widgetEventPrefix+'order">Children order</a></li>';b+="</ul>";b+='<div id="'+this.widgetEventPrefix+'options">';b+='<p class="validateTips">All form fields are required.</p><form><fieldset>';for(a in this.textFields)this.textFields.hasOwnProperty(a)&&(c=this.textFields[a],b+='<br/><label for="'+a+'">'+c.title+'</label><input type="text" name="'+
a+'" class="text ui-widget-content ui-corner-all" />');for(a in this.enums)this.enums.hasOwnProperty(a)&&(c=this.enums[a],b+='<br/><label for="'+a+'">'+c.title+'</label><select class="text ui-widget-content ui-corner-all" style="padding:2px; margin:5px;" name="'+a+'"></select>');b+='<br/><label for="labelWidth">Label width</label><input type="text" name="labelWidth" class="text ui-widget-content ui-corner-all" /><br/><label for="labelHeight">Label height</label><input type="text" name="labelHeight" class="text ui-widget-content ui-corner-all" />';
b+="</fieldset></form>";b+="</div>";b+='<div id="'+this.widgetEventPrefix+'order">';b+='<ul name="sortable" class="sortable"></ul>';b+="</div>";a=jQuery(b).addClass(this.widgetEventPrefix);this.element.append(a);this.element.addClass("dialog-form");this._createWidgets()};
primitives.orgeditor.DlgItemConfig.prototype._createWidgets=function(){var a=[],c,b,d,e,f;this.element.tabs();this.sortableList=this.element.find("[name=sortable]");this.sortableList.sortable();this.sortableList.disableSelection();for(b in this.textFields)this.textFields.hasOwnProperty(b)&&(this[b]=this.element.find("[name="+b+"]"));this.tips=this.element.find(".validateTips");for(e in this.enums)if(this.enums.hasOwnProperty(e)){f=this.enums[e];this[e]=this.element.find("[name="+e+"]");for(b in f.name)f.name.hasOwnProperty(b)&&
(d=f.name[b],this[e].append(jQuery("<option value='"+d+"'>"+b+"</option>")));this[e].buttonset()}for(c in primitives.common.Colors)primitives.common.Colors.hasOwnProperty(c)&&a.push(c);this.itemTitleColor.autocomplete({source:a});this.groupTitleColor.autocomplete({source:a});this.labelWidth=this.element.find("[name=labelWidth]");this.labelHeight=this.element.find("[name=labelHeight]")};primitives.orgeditor.DlgItemConfig.prototype._cleanLayout=function(){this.element.empty();this.element.removeClass("dialog-form")};
primitives.orgeditor.DlgItemConfig.prototype.open=function(){var a=this;this.options.itemConfig=null!=this.options.itemConfig?this.options.itemConfig:new primitives.orgdiagram.ItemConfig;this._updateWidgets(this.options.itemConfig,this.options.children);this.element.dialog({autoOpen:!1,height:400,width:350,modal:!0,title:"Item options",buttons:{Save:function(){var c=!0,b;for(b in a.textFields)a.textFields.hasOwnProperty(b)&&a[b].removeClass("ui-state-error");if(c=(c=(c=(c=(c=(c=(c=(c=c&&primitives.orgeditor.checkLength(a.tips,
a.title,"Title",1,80))&&primitives.orgeditor.checkLength(a.tips,a.description,"Description",0,400))&&primitives.orgeditor.checkLength(a.tips,a.itemTitleColor,"Title color",0,40))&&primitives.orgeditor.checkLength(a.tips,a.groupTitleColor,"Group title color",0,40))&&primitives.orgeditor.checkColor(a.tips,a.itemTitleColor,"Title color"))&&primitives.orgeditor.checkColor(a.tips,a.groupTitleColor,"Group title color"))&&primitives.orgeditor.checkNumber(a.tips,a.labelWidth,"Label width",!0))&&primitives.orgeditor.checkNumber(a.tips,
a.labelHeight,"Label height",!0))a._updateItemConfig(),jQuery(this).dialog("close"),a._trigger("update",null)},Cancel:function(){jQuery(this).dialog("close");a._trigger("cancel",null)}},close:function(){for(var c in a.textFields)a.textFields.hasOwnProperty(c)&&a[c].val("").removeClass("ui-state-error");a._trigger("cancel",null)}}).dialog("open")};
primitives.orgeditor.DlgItemConfig.prototype._updateWidgets=function(a,c){var b,d,e;for(d in this.textFields)this.textFields.hasOwnProperty(d)&&this[d].val(a[d]);for(b in this.enums)this.enums.hasOwnProperty(b)&&(d=a[b],null==d&&(d=this._getFirstEnumItem(this.enums[b].name)),this[b].val(d));this.sortableList.empty();b=0;for(d=c.length;b<d;b+=1)e=c[b],this.sortableList.append(jQuery('<li id="'+b+'" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'+e.title+"</li>"));this.labelWidth.val(null!=
a.labelSize?a.labelSize.width:"");this.labelHeight.val(null!=a.labelSize?a.labelSize.height:"")};primitives.orgeditor.DlgItemConfig.prototype._getFirstEnumItem=function(a){for(var c in a)if(a.hasOwnProperty(c))return a[c];return null};
primitives.orgeditor.DlgItemConfig.prototype._updateItemConfig=function(){var a,c,b,d;for(c in this.textFields)this.textFields.hasOwnProperty(c)&&(this.options.itemConfig[c]=this[c].val());for(a in this.enums)this.enums.hasOwnProperty(a)&&(c=this[a].val(),this.options.itemConfig[a]=this.enums[a].isString?c:parseInt(c,10));b=this.sortableList.sortable("toArray");if(0<b.length){d=[];a=0;for(c=b.length;a<c;a+=1)d.push(this.options.children[parseInt(b[a],10)]);this.options.children.length=0;this.options.children=
d}a=parseFloat(this.labelWidth.val());c=parseFloat(this.labelHeight.val());this.options.itemConfig.labelSize=0<a&&0<c?new primitives.common.Size(a,c):null};primitives.orgeditor.DlgItemConfig.prototype._setOption=function(a,c){jQuery.Widget.prototype._setOption.apply(this,arguments)};(function(a){a.widget("ui.bpDlgItemConfig",new primitives.orgeditor.DlgItemConfig)})(jQuery);primitives.orgeditor.DlgOrgDiagramOptions=function(){this.update=this.cancel=null};
primitives.orgeditor.DlgOrgDiagram=function(){this.widgetEventPrefix="bpdlgorgdiagram";this.options=new primitives.orgeditor.DlgOrgDiagramOptions;this._items={};this.orgdiagram=null};primitives.orgeditor.DlgOrgDiagram.prototype._create=function(){this._createLayout()};primitives.orgeditor.DlgOrgDiagram.prototype.destroy=function(){this._cleanLayout()};
primitives.orgeditor.DlgOrgDiagram.prototype._createLayout=function(){var a;a=jQuery('<div class="bp-item" name="dlgorgdiagram" style="overflow: hidden; padding: 0px; margin: 0px; border: 0px;"></div>').addClass(this.widgetEventPrefix);this.element.append(a);this.element.css({overflow:"hidden"});this.element.addClass("dialog-form");this._createWidgets(this.element)};primitives.orgeditor.DlgOrgDiagram.prototype._createWidgets=function(){this.orgdiagram=this.element.find("[name=dlgorgdiagram]");this.orgdiagram.orgDiagram()};
primitives.orgeditor.DlgOrgDiagram.prototype._updateWidgets=function(a){var c,b,d;this._updateLayout();c=0;for(b=a.items.length;c<b;c+=1)d=a.items[c],this._items[d.id]=d;this.orgdiagram.orgDiagram("option",a);this.orgdiagram.orgDiagram("update")};primitives.orgeditor.DlgOrgDiagram.prototype._updateLayout=function(){var a=new primitives.common.Rect(0,0,this.element.outerWidth(),this.element.outerHeight());this.orgdiagram.css(a.getCSS())};
primitives.orgeditor.DlgOrgDiagram.prototype._cleanLayout=function(){this.element.empty();this.element.removeClass("dialog-form")};
primitives.orgeditor.DlgOrgDiagram.prototype.open=function(a,c){var b=jQuery([]),d=null,e=this,a=void 0!==a?a:new primitives.orgdiagram.Config;this.element.dialog({autoOpen:!1,minWidth:640,minHeight:480,modal:!0,title:"Select new parent",buttons:{Select:function(){var a=!0;b.removeClass("ui-state-error");d=e.orgdiagram.orgDiagram("option","cursorItem");if(a=!e._isParentOf(c,d))jQuery(this).dialog("close"),e._trigger("update",null,d)},Cancel:function(){jQuery(this).dialog("close");e._trigger("cancel")}},
close:function(){b.val("").removeClass("ui-state-error");e._trigger("cancel")},resizeStop:function(){e._updateLayout();e.orgdiagram.orgDiagram("update",primitives.common.UpdateMode.Refresh)},open:function(){e._updateWidgets(a)}}).dialog("open")};primitives.orgeditor.DlgOrgDiagram.prototype._isParentOf=function(a,c){var b=!1;if(a.id==c.id)b=!0;else for(;null!=c.parent;)if(c=this._items[c.parent],c.id==a.id){b=!0;break}return b};
primitives.orgeditor.DlgOrgDiagram.prototype._setOption=function(a,c){jQuery.Widget.prototype._setOption.apply(this,arguments)};(function(a){a.widget("ui.bpDlgOrgDiagram",new primitives.orgeditor.DlgOrgDiagram)})(jQuery);