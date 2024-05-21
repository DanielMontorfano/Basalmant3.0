!/**
 * Highstock JS v11.4.1 (2024-04-04)
 *
 * Advanced Highcharts Stock tools
 *
 * (c) 2010-2024 Highsoft AS
 * Author: Torstein Honsi
 *
 * License: www.highcharts.com/license
 */function(e){"object"==typeof module&&module.exports?(e.default=e,module.exports=e):"function"==typeof define&&define.amd?define("highcharts/modules/full-screen",["highcharts"],function(n){return e(n),e.Highcharts=n,e}):e("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(e){"use strict";var n=e?e._modules:{};function t(e,n,t,r){e.hasOwnProperty(n)||(e[n]=r.apply(null,t),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:n,module:e[n]}})))}t(n,"Extensions/Exporting/Fullscreen.js",[n["Core/Renderer/HTML/AST.js"],n["Core/Globals.js"],n["Core/Utilities.js"]],function(e,n,t){var r=n.composed,s=t.addEvent,o=t.fireEvent,i=t.pushUnique;function l(){this.fullscreen=new u(this)}var u=function(){function n(e){this.chart=e,this.isOpen=!1;var n=e.renderTo;!this.browserProps&&("function"==typeof n.requestFullscreen?this.browserProps={fullscreenChange:"fullscreenchange",requestFullscreen:"requestFullscreen",exitFullscreen:"exitFullscreen"}:n.mozRequestFullScreen?this.browserProps={fullscreenChange:"mozfullscreenchange",requestFullscreen:"mozRequestFullScreen",exitFullscreen:"mozCancelFullScreen"}:n.webkitRequestFullScreen?this.browserProps={fullscreenChange:"webkitfullscreenchange",requestFullscreen:"webkitRequestFullScreen",exitFullscreen:"webkitExitFullscreen"}:n.msRequestFullscreen&&(this.browserProps={fullscreenChange:"MSFullscreenChange",requestFullscreen:"msRequestFullscreen",exitFullscreen:"msExitFullscreen"}))}return n.compose=function(e){i(r,"Fullscreen")&&s(e,"beforeRender",l)},n.prototype.close=function(){var e=this,n=e.chart,t=n.options.chart;o(n,"fullscreenClose",null,function(){e.isOpen&&e.browserProps&&n.container.ownerDocument instanceof Document&&n.container.ownerDocument[e.browserProps.exitFullscreen](),e.unbindFullscreenEvent&&(e.unbindFullscreenEvent=e.unbindFullscreenEvent()),n.setSize(e.origWidth,e.origHeight,!1),e.origWidth=void 0,e.origHeight=void 0,t.width=e.origWidthOption,t.height=e.origHeightOption,e.origWidthOption=void 0,e.origHeightOption=void 0,e.isOpen=!1,e.setButtonText()})},n.prototype.open=function(){var e=this,n=e.chart,t=n.options.chart;o(n,"fullscreenOpen",null,function(){if(t&&(e.origWidthOption=t.width,e.origHeightOption=t.height),e.origWidth=n.chartWidth,e.origHeight=n.chartHeight,e.browserProps){var r=s(n.container.ownerDocument,e.browserProps.fullscreenChange,function(){e.isOpen?(e.isOpen=!1,e.close()):(n.setSize(null,null,!1),e.isOpen=!0,e.setButtonText())}),o=s(n,"destroy",r);e.unbindFullscreenEvent=function(){r(),o()};var i=n.renderTo[e.browserProps.requestFullscreen]();i&&i.catch(function(){alert("Full screen is not supported inside a frame.")})}})},n.prototype.setButtonText=function(){var n=this.chart,t=n.exportDivElements,r=n.options.exporting,s=r&&r.buttons&&r.buttons.contextButton.menuItems,o=n.options.lang;if(r&&r.menuItemDefinitions&&o&&o.exitFullscreen&&o.viewFullscreen&&s&&t){var i=t[s.indexOf("viewFullscreen")];i&&e.setElementHTML(i,this.isOpen?o.exitFullscreen:r.menuItemDefinitions.viewFullscreen.text||o.viewFullscreen)}},n.prototype.toggle=function(){this.isOpen?this.close():this.open()},n}();return u}),t(n,"masters/modules/full-screen.src.js",[n["Core/Globals.js"],n["Extensions/Exporting/Fullscreen.js"]],function(e,n){return e.Fullscreen=e.Fullscreen||n,e.Fullscreen.compose(e.Chart),e})});