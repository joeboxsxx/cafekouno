!function(){var e={184:function(e,t){var n;!function(){"use strict";var o={}.hasOwnProperty;function r(){for(var e=[],t=0;t<arguments.length;t++){var n=arguments[t];if(n){var l=typeof n;if("string"===l||"number"===l)e.push(n);else if(Array.isArray(n)){if(n.length){var c=r.apply(null,n);c&&e.push(c)}}else if("object"===l)if(n.toString===Object.prototype.toString)for(var a in n)o.call(n,a)&&n[a]&&e.push(a);else e.push(n.toString())}}return e.join(" ")}e.exports?(r.default=r,e.exports=r):void 0===(n=function(){return r}.apply(t,[]))||(e.exports=n)}()},466:function(e,t,n){"use strict";e.exports=n.p+"images/no-image.0a9958a4.png"}},t={};function n(o){var r=t[o];if(void 0!==r)return r.exports;var l=t[o]={exports:{}};return e[o](l,l.exports,n),l.exports}n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,{a:t}),t},n.d=function(e,t){for(var o in t)n.o(t,o)&&!n.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e;n.g.importScripts&&(e=n.g.location+"");var t=n.g.document;if(!e&&t&&(t.currentScript&&(e=t.currentScript.src),!e)){var o=t.getElementsByTagName("script");o.length&&(e=o[o.length-1].src)}if(!e)throw new Error("Automatic publicPath is not supported in this browser");e=e.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),n.p=e}();var o={};!function(){"use strict";function e(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,o=new Array(t);n<t;n++)o[n]=e[n];return o}function t(t,n){return function(e){if(Array.isArray(e))return e}(t)||function(e,t){var n=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=n){var o,r,l=[],_n=!0,c=!1;try{for(n=n.call(e);!(_n=(o=n.next()).done)&&(l.push(o.value),!t||l.length!==t);_n=!0);}catch(e){c=!0,r=e}finally{try{_n||null==n.return||n.return()}finally{if(c)throw r}}return l}}(t,n)||function(t,n){if(t){if("string"==typeof t)return e(t,n);var o=Object.prototype.toString.call(t).slice(8,-1);return"Object"===o&&t.constructor&&(o=t.constructor.name),"Map"===o||"Set"===o?Array.from(t):"Arguments"===o||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(o)?e(t,n):void 0}}(t,n)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}n.d(o,{u:function(){return V}});var r=window.wp.element;function l(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}var c=window.wp.i18n,a=window.wp.components;function i(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function s(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?i(Object(n),!0).forEach((function(t){l(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):i(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function u(){var e=(0,r.useContext)(V),t=e.vkBlocksOption,n=e.setVkBlocksOption;return(0,r.createElement)(r.Fragment,null,(0,r.createElement)("section",null,(0,r.createElement)("h3",{id:"license-setting"},(0,c.__)("License key","vk-blocks")),(0,r.createElement)("p",null,(0,c.__)("Enter a valid Lightning G3 Pro Pack or Lightning Pro license key.","vk-blocks")),(0,r.createElement)("p",null,(0,c.__)("Once you enter the license key you will be able to do a one click update from the administration screen.","vk-blocks")),(0,r.createElement)(a.TextControl,{id:"vk-blocks-pro-license-key",label:(0,c.__)("License key","vk-blocks"),className:"admin-text-control",name:"vk_blocks_options[vk_blocks_pro_license_key]",value:t.vk_blocks_pro_license_key?t.vk_blocks_pro_license_key:"",onChange:function(e){e=e.trim(),n(s(s({},t),{},{vk_blocks_pro_license_key:e}))}})))}var b=window.wp.mediaUtils,m=n(466);function p(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function _(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?p(Object(n),!0).forEach((function(t){l(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):p(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function k(){var e=(0,r.useContext)(V),t=e.vkBlocksOption,n=e.setVkBlocksOption,o=e.vkBlocksBalloonMeta,i=e.setVkBlocksBalloonMeta,s=vkBlocksObject.imageNumber;return(0,r.createElement)(r.Fragment,null,(0,r.createElement)("section",null,(0,r.createElement)("h3",{id:"balloon-setting"},(0,c.__)("Balloon Setting","vk-blocks")),(0,r.createElement)("h4",{id:"balloon-border-width-setting"},(0,c.__)("Balloon Border Width Setting","vk-blocks")),(0,r.createElement)(a.SelectControl,{id:"balloon-border-width-selector",className:"vk_admin_selectControl",name:"vk_blocks_options[balloon_border_width]",value:!!t.balloon_border_width&&t.balloon_border_width,onChange:function(e){n(_(_({},t),{},{balloon_border_width:e}))},options:[{label:(0,c.__)("1px","vk-blocks"),value:1},{label:(0,c.__)("2px","vk-blocks"),value:2},{label:(0,c.__)("3px","vk-blocks"),value:3},{label:(0,c.__)("4px","vk-blocks"),value:4}]})),(0,r.createElement)("h4",{id:"balloon-image-setting"},(0,c.__)("Balloon Image Setting","vk-blocks")),(0,r.createElement)("p",null,(0,c.__)("You can register frequently used icon images for speech bubble blocks.","vk-blocks"),(0,c.__)("If you change image or name that please click Save Changes button.","vk-blocks")),(0,r.createElement)("ul",{className:"balloonIconList"},function(){for(var e=[],t=function(t){e.push((0,r.createElement)("li",{key:t},(0,r.createElement)(b.MediaUpload,{label:(0,c.__)("image","vk-blocks"),onSelect:function(e){i(_(_({},o),{},{default_icons:_(_({},o.default_icons),{},l({},t,_(_({},o.default_icons[t]),{},{src:e.url})))}))},type:"image",allowedTypes:["image"],value:!o.default_icons[t].src&&o.default_icons[t].src,render:function(e){var n=e.open;return(0,r.createElement)(r.Fragment,null,o.default_icons[t].src?(0,r.createElement)(r.Fragment,null,(0,r.createElement)("div",{className:"balloonIconList_iconFrame"},(0,r.createElement)("div",{style:{width:"100px",height:"100px",objectFit:"cover"}},(0,r.createElement)("img",{id:"balloonIconList_iconFrame_src_".concat(t),className:"balloonIconList_iconFrame_src",src:""===o.default_icons[t].src||void 0===o.default_icons[t].src?m:o.default_icons[t].src,alt:""}))),(0,r.createElement)(a.Button,{onClick:n,className:"button button-block button-set"},(0,c.__)("Select","vk-blocks")),(0,r.createElement)(a.Button,{className:"button button-block button-delete",onClick:function(){i(_(_({},o),{},{default_icons:_(_({},o.default_icons),{},l({},t,_(_({},o.default_icons[t]),{},{src:""})))}))}},(0,c.__)("Delete","vk-blocks"))):(0,r.createElement)(r.Fragment,null,(0,r.createElement)("div",{className:"balloonIconList_iconFrame"},(0,r.createElement)("div",{style:{width:"100px",height:"100px",objectFit:"cover"}},(0,r.createElement)("img",{className:"balloonIconList_iconFrame_src",src:m,alt:""}))),(0,r.createElement)(a.Button,{onClick:n,className:"button button-block button-set"},(0,c.__)("Select","vk-blocks")),(0,r.createElement)(a.Button,{className:"button button-block button-delete",onClick:function(){i(_(_({},o),{},{default_icons:_(_({},o.default_icons),{},l({},t,_(_({},o.default_icons[t]),{},{src:""})))}))}},(0,c.__)("Delete","vk-blocks"))))}}),(0,r.createElement)("label",{htmlFor:"icon_title",className:"balloonIconList_nameLabel"},(0,c.__)("Balloon Image Name","vk-blocks")),(0,r.createElement)(a.TextControl,{id:"icon_title_".concat(t),className:"balloonIconList_name_input",name:"vk_blocks_balloon_meta[default_icons][".concat(t,"][name]"),onChange:function(e){i(_(_({},o),{},{default_icons:_(_({},o.default_icons),{},l({},t,_(_({},o.default_icons[t]),{},{name:e})))}))},value:""===o.default_icons[t].name||void 0===o.default_icons[t].name||null===o.default_icons[t].name?"":o.default_icons[t].name})))},n=1;n<=s;n++)t(n);return e}()))}function f(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function v(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?f(Object(n),!0).forEach((function(t){l(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):f(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var d=[{marginLabel:(0,c.__)("XS","vk-blocks"),marginValue:"xs"},{marginLabel:(0,c.__)("S","vk-blocks"),marginValue:"sm"},{marginLabel:(0,c.__)("M","vk-blocks"),marginValue:"md"},{marginLabel:(0,c.__)("L","vk-blocks"),marginValue:"lg"},{marginLabel:(0,c.__)("XL","vk-blocks"),marginValue:"xl"}],g=[{deviceLabel:(0,c.__)("PC","vk-blocks"),deviceValue:"pc"},{deviceLabel:(0,c.__)("Tablet","vk-blocks"),deviceValue:"tablet"},{deviceLabel:(0,c.__)("Mobile","vk-blocks"),deviceValue:"mobile"}];function O(){var e=(0,r.useContext)(V),t=e.vkBlocksOption,n=e.setVkBlocksOption;return(0,r.createElement)(r.Fragment,null,(0,r.createElement)("section",null,(0,r.createElement)("h3",{id:"margin-setting"},(0,c.__)("Common Margin Setting","vk-blocks")),(0,r.createElement)("p",null,(0,c.__)("Please specify the size of the common margin used for responsive spacers, etc.","vk-blocks")),(0,r.createElement)("div",{className:"vk_admin_marginUnit"},(0,r.createElement)("span",null,(0,c.__)("Unit","vk-blocks")),(0,r.createElement)(a.SelectControl,{name:"vk_blocks_options[margin_unit]",className:"vk_admin_selectControl unit-select",value:t.margin_unit,onChange:function(e){n(v(v({},t),{},{margin_unit:e}))},options:[{label:(0,c.__)("px","vk-blocks"),value:"px"},{label:(0,c.__)("em","vk-blocks"),value:"em"},{label:(0,c.__)("rem","vk-blocks"),value:"rem"}]})),(0,r.createElement)("ul",{className:"no-style spacer-input"},d.map((function(e){var o=e.marginLabel,i=e.marginValue;return(0,r.createElement)("li",{key:o},(0,r.createElement)("span",{className:"spacer-input__size-name"},(0,c.__)("Margin","vk-blocks")," [ ",o," ","]"),g.map((function(e){var o=e.deviceLabel,c=e.deviceValue;return(0,r.createElement)(a.__experimentalNumberControl,{className:"margin_size_input",key:o,label:o,name:"vk_blocks_options[margin_size][".concat(i,"][").concat(c,"]"),step:"0.05",value:t.margin_size[i][c]?t.margin_size[i][c]:"",onChange:function(e){n(v(v({},t),{},{margin_size:v(v({},t.margin_size),{},l({},i,v(v({},t.margin_size[i]),{},l({},c,e))))}))}})})))})))))}function y(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function h(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?y(Object(n),!0).forEach((function(t){l(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):y(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function E(){var e,t=(0,r.useContext)(V),n=t.vkBlocksOption,o=t.setVkBlocksOption;return e="true"===n.load_separate_option||!(!n.load_separate_option||!n.load_separate_option),(0,r.createElement)(r.Fragment,null,(0,r.createElement)("section",null,(0,r.createElement)("h3",{id:"load-separete-setting"},(0,c.__)("Load Separate Setting","vk-blocks")),(0,r.createElement)("p",null,(0,c.__)("Note that the order in which CSS/JS are loaded will change.","vk-blocks")),(0,r.createElement)(a.CheckboxControl,{name:"vk_blocks_options[load_separate_option]",label:(0,c.__)("Load Separate Option on","vk-blocks"),checked:e,onChange:function(e){o(h(h({},n),{},{load_separate_option:e}))}})))}function w(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function j(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?w(Object(n),!0).forEach((function(t){l(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):w(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function P(){var e=(0,r.useContext)(V),t=e.vkBlocksOption,n=e.setVkBlocksOption;return(0,r.createElement)(r.Fragment,null,(0,r.createElement)("section",null,(0,r.createElement)("h3",{id:"faq-setting"},(0,c.__)("FAQ Block Setting","vk-blocks")),(0,r.createElement)(a.SelectControl,{name:"vk_blocks_options[new_faq_accordion]",className:"vk_admin_selectControl",value:t.new_faq_accordion,onChange:function(e){n(j(j({},t),{},{new_faq_accordion:e}))},options:[{label:(0,c.__)("Disable accordion","vk-blocks"),value:"disable"},{label:(0,c.__)("Enable accordion and default open","vk-blocks"),value:"open"},{label:(0,c.__)("Enable accordion and default close","vk-blocks"),value:"close"}]})))}function S(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function B(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?S(Object(n),!0).forEach((function(t){l(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):S(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function C(){var e=(0,r.useContext)(V),t=e.vkBlocksOption,n=e.setVkBlocksOption;return(0,r.createElement)(r.Fragment,null,(0,r.createElement)("section",null,(0,r.createElement)("h3",{id:"custom-css-setting"},(0,c.__)("Custom CSS Setting","vk-blocks")),(0,r.createElement)(a.ToggleControl,{name:"vk_blocks_options[show_custom_css_editor_flag]",label:(0,c.__)("Show Custom CSS flag in editor","vk-blocks"),checked:"show"===t.show_custom_css_editor_flag,onChange:function(e){e=e?"show":"hide",n(B(B({},t),{},{show_custom_css_editor_flag:e}))}})))}var x=window.wp.apiFetch,L=n.n(x),D=n(184),N=n.n(D),F=function(e){var n=e.vkBlocksOption,o=e.vkBlocksBalloonMeta,l=e.classOption,i=t((0,r.useState)(!1),2),s=i[0],u=i[1],b=t((0,r.useState)(""),2),m=b[0],p=b[1];return(0,r.useEffect)((function(){m&&setTimeout((function(){p()}),3e3)}),[m]),(0,r.createElement)(r.Fragment,null,(0,r.createElement)("div",{className:N()("submit",l)},(0,r.createElement)(a.Button,{className:"update-button",isPrimary:!0,onClick:function(){u(!0),L()({path:"/vk-blocks/v1/update_vk_blocks_options",method:"POST",data:{vkBlocksOption:n,vkBlocksBalloonMeta:o}}).then((function(){setTimeout((function(){u(!1),p(!0)}),600)}))},isBusy:s},(0,c.__)("Save setting","vk-blocks")),m&&(0,r.createElement)("div",null,(0,r.createElement)(a.Snackbar,null,(0,c.__)("Save Success","vk-blocks")," "))))},V=(0,r.createContext)();(0,r.render)((0,r.createElement)((function(){var e=t((0,r.useState)(vkBlocksObject.options),2),n=e[0],o=e[1],l=t((0,r.useState)(vkBlocksObject.balloonMeta),2),c=l[0],a=l[1];return(0,r.createElement)(r.Fragment,null,(0,r.createElement)(V.Provider,{value:{vkBlocksOption:n,setVkBlocksOption:o,vkBlocksBalloonMeta:c,setVkBlocksBalloonMeta:a}},vkBlocksObject.isLicenseSetting&&(0,r.createElement)(u,null),(0,r.createElement)(k,null),(0,r.createElement)(O,null),(0,r.createElement)(E,null),vkBlocksObject.isPro&&(0,r.createElement)(P,null),vkBlocksObject.isPro&&(0,r.createElement)(C,null),(0,r.createElement)(F,{classOption:"sticky",vkBlocksOption:n,vkBlocksBalloonMeta:c})))}),null),document.getElementById("vk-blocks-admin"))}()}();