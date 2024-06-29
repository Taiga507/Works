!function(e){var t={};function n(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(o,i,function(t){return e[t]}.bind(null,i));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="http://localhost:3000/assets/",n(n.s=0)}({"./src/data/index.js":function(e,t){function n(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}var o=wp.apiFetch,i=wp.data,c=i.registerStore,a=(i.withSelect,{setUserRoles:function(e){return{type:"SET_USER_ROLES",userRoles:e}},receiveUserRoles:function(e){return{type:"RECEIVE_USER_ROLES",path:e}}});c("wicked-plugins/wicked-block-conditions",{reducer:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{userRoles:{}},t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"SET_USER_ROLES":return function(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{},i=Object.keys(o);"function"==typeof Object.getOwnPropertySymbols&&(i=i.concat(Object.getOwnPropertySymbols(o).filter(function(e){return Object.getOwnPropertyDescriptor(o,e).enumerable}))),i.forEach(function(t){n(e,t,o[t])})}return e}({},e,{userRoles:t.userRoles})}return e},actions:a,selectors:{receiveUserRoles:function(e){return e.userRoles}},controls:{RECEIVE_USER_ROLES:function(e){return o({path:e.path})}},resolvers:{receiveUserRoles:regeneratorRuntime.mark(function e(t){var n;return regeneratorRuntime.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,a.receiveUserRoles("/wicked-block-conditions/v1/user-roles/");case 2:return n=e.sent,e.abrupt("return",a.setUserRoles(n));case 4:case"end":return e.stop()}},e)})}})},"./src/index.js":function(e,t,n){"use strict";n.r(t);var o=lodash,i=o.find,c=o.forEach,a=o.isUndefined,r=o.filter,l=function e(t,n){var o=!1;return(o=i(t,function(e){return e.guid==n}))||c(t,function(t){var i=e(t.conditions,n);i&&(o=i)}),o},s=function e(t,n){return t.map(function(t){return t.guid==n.guid?n:(a(t.conditions)||(t.conditions=e(t.conditions,n)),t)})},d=function(){return"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(e){var t=16*Math.random()|0;return("x"==e?t:3&t|8).toString(16)})},u=wp.i18n.__,p=wp.components.RadioControl,m=function(e){var t=e.option,n=e.onChange;return React.createElement(p,{label:u("When conditions are met:","wicked-block-conditions"),selected:t,options:[{label:u("Show this block","wicked-block-conditions"),value:"show"},{label:u("Hide this block","wicked-block-conditions"),value:"hide"}],onChange:function(e){n(e)}})},f=wp.i18n.__,k=wp.components,b=k.Button,w=k.Icon,g=function(e){var t=!1,n=e.condition,o=n.type,i=0!=e.index&&React.createElement("div",{className:"wbc-operator"},React.createElement("div",null,React.createElement("select",{defaultValue:n.operator,onChange:function(t){var n=Object.assign({},e.condition);n.operator=t.target.value,e.onChange(n)}},React.createElement("option",{value:"and"},f("And","wicked-block-conditions")),React.createElement("option",{value:"or"},f("Or","wicked-block-conditions")))));return t=n.conditions.length?React.createElement(v,{setState:e.setState,conditions:n.conditions,onChange:function(t){var n=Object.assign({},e.condition);n.conditions=t,e.onChange(n)}}):React.createElement("p",{className:"wbc-empty-group"},f("This group does not have any conditions yet.","wicked-block-conditions")),"group"==o?React.createElement("li",{className:"wbc-group-condition","data-guid":n.guid},i,React.createElement("div",{className:"wbc-content"},React.createElement("div",{className:"wbc-head"},React.createElement("h3",null,f("Condition Group","wicked-block-conditions"))),React.createElement("div",{className:"wbc-body"},t),React.createElement("div",{className:"wbc-foot"},React.createElement(b,{isLink:!0,onClick:function(){!function(t){e.setState(function(e){return{action:"select-condition",group:t.guid}})}(n)}},f("Add Condition","wicked-block-conditions")),React.createElement("span",{className:"wbc-separator"},"|"),React.createElement(b,{isLink:!0,onClick:function(){n.conditions.length?confirm(f("This will delete all conditions in the group.  Are you sure?","wicked-block-conditions"))&&e.onDelete(n):e.onDelete(n)}},f("Delete Group","wicked-block-conditions"))))):React.createElement("li",{className:"wbc-condition","data-guid":n.guid},i,React.createElement("div",{className:"wbc-content"},n.label),React.createElement("div",{className:"wbc-edit"},React.createElement(b,{onClick:function(){e.setState(function(e){return{action:"edit-condition",activeCondition:n.guid}})}},React.createElement(w,{icon:"admin-generic",size:"20"}))))};function h(){return(h=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e}).apply(this,arguments)}var v=function(e){var t=function(t){var n=e.conditions.map(function(e){return e.guid==t.guid?t:e});e.onChange(n)},n=function(t){var n=e.conditions.filter(function(e){return e.guid!=t.guid});e.onChange(n)},o=e.conditions.map(function(o,i){return React.createElement(g,h({},e,{key:o.guid,index:i,condition:o,onChange:t,onDelete:n}))});return React.createElement("ul",{className:e.className||""},o)},R=wp.i18n.__,C=lodash.assign,E=wp.element.Fragment,y=wp.components.Button,x=function(e){var t=e.attributes.wickedBlockConditions,n=t.action,o=t.conditions,i=C({},e.attributes.wickedBlockConditions);return o.length?React.createElement(E,null,React.createElement(m,{option:n,onChange:function(t){i.action=t,e.setAttributes({wickedBlockConditions:i})}}),React.createElement(v,{setState:e.setState,conditions:o,onChange:function(t){i.conditions=t,e.setAttributes({wickedBlockConditions:i})},className:"wbc-conditions"}),React.createElement("p",null,React.createElement(y,{isLink:!0,onClick:function(){var t;t={guid:d(),type:"group",label:R("Condition Group","wicked-block-conditions"),operator:"and",conditions:[]},i.conditions=i.conditions.slice(0),i.conditions.push(t),e.setAttributes({wickedBlockConditions:i})}},R("Add Condition Group","wicked-block-conditions")))):React.createElement("div",{className:"wbc-start"},React.createElement("p",null,R("Show or hide this block based on conditions.  Add a condition to get started.","wicked-block-conditions")),React.createElement("p",null,React.createElement(y,{isLink:!0,onClick:function(){e.setState(function(e){return{action:"select-condition"}})}},R("Add Condition","wicked-block-conditions"))))},_=wp.i18n.__,S=lodash,O=S.assign,P=S.chain,T=(S.find,wp.element.Fragment),N=wp.components.Button,j=function(e){var t=function(){return{guid:d(),type:"group",label:_("Condition Group","wicked-block-conditions"),operator:"and",conditions:[]}},n=P(e.wickedBlockConditions.conditions).groupBy("group").map(function(e,t){return{name:t,conditions:e}}).value().map(function(n){var o=n.conditions.map(function(n){return React.createElement("li",null,React.createElement(N,{isLink:!0,onClick:function(){!function(n){var o={action:e.attributes.wickedBlockConditions.action,conditions:e.attributes.wickedBlockConditions.conditions.slice(0)},i=l(o.conditions,e.group),c=O({guid:d(),type:n.type,label:n.label,operator:"and",conditions:[]},n.default);i||(i=t(),o.conditions.push(i)),i.conditions.push(c),o.conditions=s(o.conditions,i),e.setAttributes({wickedBlockConditions:o}),n.bypassConfig?e.setState(function(e){return{action:"view-conditions"}}):e.setState(function(e){return{action:"edit-condition",activeCondition:c.guid}})}(n)}},n.label))});return React.createElement(T,null,React.createElement("h3",null,n.name),React.createElement("ul",null,o))});return React.createElement("div",{className:"wbc-select-condition"},React.createElement("p",null,_("Select a condition to add:","wicked-block-conditions")),n,React.createElement(N,{variant:"secondary",onClick:function(){e.setState(function(e){return{action:"view-conditions"}})}},_("Cancel","wicked-block-conditions")))},B=wp.i18n.__,D=wp.components,A=D.TextControl,U=D.ToggleControl,F=D.Button,I=lodash,L=I.find,H=I.assign,G=function(e){var t=l(e.attributes.wickedBlockConditions.conditions,e.activeCondition),n=L(e.wickedBlockConditions.conditions,{type:t.type}),o=Object.assign({},e.attributes.wickedBlockConditions),i=n.edit,c=function(){o.conditions=s(o.conditions,t),e.setAttributes({wickedBlockConditions:o})};return React.createElement("div",{className:"wbc-edit-condition"},React.createElement("h3",null,e.isNew?B("Add Condition","wicked-block-conditions"):B("Edit Condition","wicked-block-conditions"),": ",n.label),React.createElement("p",null,n.description),React.createElement(A,{label:B("Label","wicked-block-conditions"),help:B("Briefly explain what this condition does.","wicked-block-conditions"),value:t.label,onChange:function(e){return n=e,t.label=n,void c();var n}}),React.createElement(U,{label:B("Negate condition","wicked-block-conditions"),checked:t.negate,help:B("Reverses the outcome of the condition.","wicked-block-conditions"),onChange:function(e){t.negate=e,c()}}),React.createElement(i,{condition:t,onChange:function(e){t=H({},t,e),c()}}),React.createElement("div",{className:"wbc-foot"},React.createElement("div",{className:"wbc-save"},React.createElement(F,{isPrimary:!0,onClick:function(){e.setState(function(e){return{action:"view-conditions",activeCondition:null}})}},B("Save","wicked-block-conditions"))),React.createElement("div",{className:"wbc-delete"},React.createElement(F,{variant:"secondary",isDestructive:!0,onClick:function(){o.conditions=function e(t,n){return r(t,function(e){return e.guid!=n.guid}).map(function(t){return a(t.conditions)||(t.conditions=e(t.conditions,n)),t})}(o.conditions,t),e.setAttributes({wickedBlockConditions:o}),e.setState(function(e){return{action:"view-conditions",activeCondition:null}})}},B("Delete","wicked-block-conditions")))))},M=wp.element.Fragment,V=function(e){var t=e.children,n=e.activePanel,o=t.map(function(e){if(n==e.props.name)return React.createElement("div",{className:"wicked-slider-panel"},e)});return React.createElement("div",{className:"wicked-slider-panels"},o)},q=function(e){var t=e.children;return React.createElement(M,null,t)},z=wp.i18n.__,Y=lodash,Q=Y.map,W=Y.filter,J=wp.data.withSelect,K=wp.components.SelectControl,X=J(function(e){var t=e("core/editor").getCurrentPost();return{post:t,taxonomies:t?e("core").getTaxonomies():void 0}})(function(e){var t=e.taxonomies,n=e.post,o=e.selectedTaxonomy,i=e.onChange;if(t){var c=W(t,function(e){return-1!==e.types.indexOf(n.type)}),a=Q(c,function(e){return{value:e.slug,label:e.name}});return a.unshift({value:"",label:z("Select a taxonomy","wicked-block-conditions")}),c.length?React.createElement(K,{label:z("Taxonomy","wicked-block-conditions"),value:o,onChange:i,options:a}):React.createElement("p",null,z("No terms can be selected because this post type does not have any taxonomies assigned to it.","wicked-block-conditions"))}return React.createElement("div",null,z("Loading...","wicked-block-conditions"))}),Z=wp.i18n.__,$=lodash,ee=$.map,te=$.filter,ne=$.find,oe=$.union,ie=$.without,ce=wp.data.withSelect,ae=wp.components,re=ae.CheckboxControl,le=ae.FormTokenField,se=ce(function(e,t){var n=t.taxonomy,o=e("core"),i=o.getTaxonomy,c=o.getEntityRecords;return{taxonomyObject:n?i(n):void 0,terms:n?c("taxonomy",n):void 0}})(function(e){e.taxonomy;var t=e.selectedTerms,n=void 0===t?[]:t,o=e.taxonomyObject,i=e.terms,c=e.onChange,a=function(e,t){var o=t?oe(n,[e]):ie(n,e);c(o)};if(o&&i){if(o.hierarchical)return React.createElement("div",{class:"wbc-terms"},React.createElement("h3",null,Z("Terms","wicked-block-conditions")),function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0;return ee(i,function(o){return o.parent==t&&React.createElement("div",{key:o.id,className:"editor-post-taxonomies__hierarchical-terms-choice"},React.createElement(re,{label:o.name,checked:-1!==n.indexOf(o.slug),onChange:function(e){return a(o.slug,e)}}),React.createElement("div",{className:"editor-post-taxonomies__hierarchical-terms-subchoices"},e(o.id)))})}());var r=ee(i,function(e){return e.name}),l=ee(te(i,function(e){return-1!==n.indexOf(e.slug)}),function(e){return e.name});return React.createElement("div",{class:"wbc-terms"},React.createElement(le,{value:l,suggestions:r,maxSuggestions:20,label:Z("Tags","wicked-block-conditions"),onChange:function(e){var t=ee(e,function(e){var t=ne(i,{name:e});return t?t.slug:e});c(t)}}))}return!1}),de=wp.element.Fragment,ue=function(e){var t=e.condition,n=e.onChange,o=t.taxonomy,i=t.terms;return React.createElement(de,null,React.createElement(X,{selectedTaxonomy:o,onChange:function(e){n({taxonomy:e,terms:i})}}),React.createElement(se,{taxonomy:o,selectedTerms:i,onChange:function(e){n({taxonomy:o,terms:e})}}))},pe=wp.i18n.__,me=wp.components.TextControl,fe=function(e){var t=e.condition,n=e.onChange,o=t.postId;return React.createElement(me,{label:pe("Post ID","wicked-block-conditions"),type:"number",min:1,step:1,value:o,onChange:function(e){n({postId:parseInt(e)})}})},ke=wp.i18n.__,be=wp.components.TextControl,we=function(e){var t=e.condition,n=e.onChange,o=t.slug;return React.createElement(be,{label:ke("Post Slug","wicked-block-conditions"),value:o,onChange:function(e){n({slug:e})}})},ge=wp.i18n.__,he=wp.components.RadioControl,ve=function(e){var t=e.condition,n=e.onChange,o=t.status,i=function(e){n({status:e})};return React.createElement(he,{label:ge("Post Status","wicked-block-conditions"),selected:o,options:[{label:ge("Published","wicked-block-conditions"),value:"publish"},{label:ge("Pending","wicked-block-conditions"),value:"pending"},{label:ge("Draft","wicked-block-conditions"),value:"draft"},{label:ge("Future","wicked-block-conditions"),value:"future"},{label:ge("Private","wicked-block-conditions"),value:"private"},{label:ge("Password Protected","wicked-block-conditions"),value:"password"}],onChange:function(e){i(e)}})},Re=wp.i18n.__,Ce=lodash.assign,Ee=wp.date,ye=Ee.dateI18n,xe=Ee.__experimentalGetSettings,_e=(wp.element.Fragment,wp.components),Se=_e.RadioControl,Oe=_e.DatePicker,Pe=_e.DateTimePicker,Te=_e.Button,Ne=_e.Dropdown,je=_e.PanelRow,Be=function(e){var t=e.onChange,n=Ce({},e.condition),o=n.compare,i=n.date,c=Re("between"==o?"Start Date":"Date","wicked-block-conditions"),a=xe(),r="same day"==o?a.formats.date:a.formats.datetimeAbbreviated,l=function(e){n.compare=e,t(n)},s=function(e){n.date=e,t(n)};return React.createElement("div",{className:"wbc-current-date-condition"},React.createElement(Se,{label:Re("Current date is:","wicked-block-conditions"),selected:o,options:[{label:Re("Before","wicked-block-conditions"),value:"before"},{label:Re("After","wicked-block-conditions"),value:"after"},{label:Re("The same as","wicked-block-conditions"),value:"same day"}],onChange:function(e){l(e)}}),React.createElement(je,null,React.createElement("span",null,c),React.createElement("div",null,React.createElement(Ne,{className:"wbc-date-popup",contentClassName:"wbc-date-popup-content",position:"bottom right",renderToggle:function(e){var t=e.isOpen,n=e.onToggle;return React.createElement(Te,{onClick:n,"aria-expanded":t,isLink:!0},ye(r,i))},renderContent:function(){return React.createElement("div",null,"same day"==o?React.createElement(Oe,{currentDate:i,is12Hour:!0,onChange:function(e){s(e)}}):React.createElement(Pe,{currentDate:i,is12Hour:!0,onChange:function(e){s(e)}}))}}))),React.createElement(je,null,React.createElement("em",null,Re("Note: Be sure that a timezone has been set for your site on the Settings > General page and that the date you select above is for that timezone.","wicked-block-conditions"))),"between"==o&&React.createElement(je,null,React.createElement("span",null,Re("End date","wicked-block-conditions")),React.createElement("div",null,React.createElement(Ne,{className:"wbc-date-popup",contentClassName:"wbc-date-popup-content",position:"bottom right",renderToggle:function(e){var t=e.isOpen,n=e.onToggle;return React.createElement(Te,{onClick:n,"aria-expanded":t,isLink:!0},ye(r,dateTwo))},renderContent:function(){return React.createElement("div",null,React.createElement(Pe,{currentDate:dateTwo,is12Hour:!0,onChange:function(e){handleChangeDateTwo(e)}}))}}))))},De=(wp.i18n.__,lodash),Ae=De.map,Ue=De.union,Fe=De.without,Ie=wp.data.withSelect,Le=wp.components,He=Le.CheckboxControl,Ge=Le.Spinner,Me=Ie(function(e,t){t.roles;return{roles:(0,e("wicked-plugins/wicked-block-conditions").receiveUserRoles)()}})(function(e){var t=e.selectedRoles,n=void 0===t?[]:t,o=e.roles,i=e.onChange,c=function(e,t){var o=t?Ue(n,[e]):Fe(n,e);i(o)};if(o){var a=Ae(o,function(e){return React.createElement(He,{label:e.label,checked:-1!==n.indexOf(e.value),onChange:function(t){return c(e.value,t)}})});return React.createElement("div",{class:"wbc-user-roles"},a)}return React.createElement(Ge,null)}),Ve=function(e){var t=e.condition,n=e.onChange,o=t.roles;return React.createElement(Me,{selectedRoles:o,onChange:function(e){n({roles:e})}})},qe=wp.i18n.__,ze=wp.components.TextControl,Ye=function(e){var t=e.condition,n=e.onChange,o=t.function,i=function(e){n({function:e})};return React.createElement(ze,{label:qe("Function","wicked-block-conditions"),help:qe("Enter the name of a PHP function to call.  Your function should return a value of true or false.  Any value other than true will be considered false.","wicked-block-conditions"),value:o,onChange:function(e){return i(e)}})},Qe=wp.i18n.__,We=wp.components.TextControl,Je=function(e){var t=e.condition,n=e.onChange,o=t.parameter,i=t.value,c=function(e){n({parameter:e,value:i})},a=function(e){n({parameter:o,value:e})};return React.createElement(React.Fragment,null,React.createElement(We,{label:Qe("Parameter","wicked-block-conditions"),help:Qe("The name of the query string parameter to check.","wicked-block-conditions"),value:o,onChange:function(e){return c(e)}}),React.createElement(We,{label:Qe("Value","wicked-block-conditions"),help:Qe("The value to check for.","wicked-block-conditions"),value:i,onChange:function(e){return a(e)}}))},Ke=wp.i18n.__,Xe=wp.date.date,Ze=function(){return!1},$e=[];$e.push({type:"user_is_logged_in",label:Ke("User Is Logged In","wicked-block-conditions"),group:Ke("User Conditions","wicked-block-conditions"),description:Ke("Returns true if a user is logged in.","wicked-block-conditions"),bypassConfig:!0,edit:Ze}),$e.push({type:"user_is_not_logged_in",label:Ke("User Is Not Logged In","wicked-block-conditions"),group:Ke("User Conditions","wicked-block-conditions"),description:Ke("Returns true if a user is not logged in.","wicked-block-conditions"),bypassConfig:!0,edit:Ze}),$e.push({type:"user_has_role",label:Ke("User Has Role","wicked-block-conditions"),group:Ke("User Conditions","wicked-block-conditions"),description:Ke("Returns true if the user is assigned to any of the selected roles.","wicked-block-conditions"),edit:Ve}),$e.push({type:"post_id",label:Ke("Check Post ID","wicked-block-conditions"),group:Ke("Post Conditions","wicked-block-conditions"),description:Ke("Returns true if the post has the specified ID.","wicked-block-conditions"),bypassConfig:!1,edit:fe}),$e.push({type:"post_slug",label:Ke("Check Post Slug","wicked-block-conditions"),group:Ke("Post Conditions","wicked-block-conditions"),description:Ke("Returns true if the post has the specified slug.","wicked-block-conditions"),bypassConfig:!1,edit:we}),$e.push({type:"post_has_term",label:Ke("Post Has a Term","wicked-block-conditions"),group:Ke("Post Conditions","wicked-block-conditions"),description:Ke("Returns true if the post has the selected term(s) assigned.","wicked-block-conditions"),bypassConfig:!1,edit:ue}),$e.push({type:"post_status",label:Ke("Check Post Status","wicked-block-conditions"),group:Ke("Post Conditions","wicked-block-conditions"),description:Ke("Returns true if post status matches the selected option.","wicked-block-conditions"),bypassConfig:!1,edit:ve,default:{status:"publish"}}),$e.push({type:"current_date",label:Ke("Check The Date","wicked-block-conditions"),group:Ke("Date Conditions","wicked-block-conditions"),description:Ke("Returns true if the current date matches the specified conditions.","wicked-block-conditions"),bypassConfig:!1,edit:Be,default:{compare:"before",date:Xe("Y-m-d H:i:00",new Date)}}),$e.push({type:"user_function",label:Ke("Check a User-Defined Function","wicked-block-conditions"),group:Ke("Advanced","wicked-block-conditions"),description:Ke("Returns the result of a user-defined function.","wicked-block-conditions"),bypassConfig:!1,edit:Ye}),$e.push({type:"query_string",label:Ke("Check a Query String Value","wicked-block-conditions"),group:Ke("Advanced","wicked-block-conditions"),description:Ke("Returns true if the specified query string parameter is matched.","wicked-block-conditions"),bypassConfig:!1,edit:Je,default:{parameter:"",value:""}});n("./src/data/index.js");function et(){return(et=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e}).apply(this,arguments)}function tt(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function nt(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var n=[],o=!0,i=!1,c=void 0;try{for(var a,r=e[Symbol.iterator]();!(o=(a=r.next()).done)&&(n.push(a.value),!t||n.length!==t);o=!0);}catch(e){i=!0,c=e}finally{try{o||null==r.return||r.return()}finally{if(i)throw c}}return n}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}var ot=wp.i18n.__,it=lodash.assign,ct=wp.element,at=ct.Fragment,rt=ct.useState,lt=wp.components.PanelBody,st=wp.compose.createHigherOrderComponent,dt=wp.blockEditor.InspectorControls,ut=wp.hooks,pt=ut.addFilter,mt=ut.applyFilters;pt("blocks.registerBlockType","wicked-block-conditions/add-attribute",function(e){return e.attributes=it(e.attributes,{wickedBlockConditions:{type:"object",default:{action:"show",conditions:[]}}}),e}),pt("blocks.getSaveContent.extraProps","wicked-block-conditions/add-props",function(e,t,n){return e.wickedBlockConditions=n.wickedBlockConditions,e});var ft=function(e){var t=nt(rt(!1),2),n=t[0],o=t[1],i=nt(rt("view-conditions"),2),c=i[0],a=i[1],r=nt(rt(null),2),l=r[0],s=r[1],d=nt(rt(null),2),u=d[0],p=d[1],m=function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{},o=Object.keys(n);"function"==typeof Object.getOwnPropertySymbols&&(o=o.concat(Object.getOwnPropertySymbols(n).filter(function(e){return Object.getOwnPropertyDescriptor(n,e).enumerable}))),o.forEach(function(t){tt(e,t,n[t])})}return e}({},e,{action:c,activeCondition:l,group:u,setState:function(e){var t=e();t.hasOwnProperty("action")&&a(t.action),t.hasOwnProperty("activeCondition")&&s(t.activeCondition),t.hasOwnProperty("group")&&p(t.group)}});return React.createElement(dt,null,React.createElement(lt,{title:ot("Display Conditions","wicked-block-conditions"),initialOpen:n,onToggle:function(){o(!n)}},React.createElement(V,{activePanel:c},React.createElement(q,{name:"view-conditions"},React.createElement(x,m)),React.createElement(q,{name:"select-condition"},React.createElement(j,m)),React.createElement(q,{name:"edit-condition"},React.createElement(G,m)))))},kt=st(function(e){var t={conditions:mt("wickedBlockConditions.conditions",$e)};return function(n){return React.createElement(at,null,React.createElement(e,n),React.createElement(ft,et({},n,{wickedBlockConditions:t})))}},"withConditions"),bt=wp.hooks,wt=bt.addFilter;bt.removeFilter;wt("editor.BlockEdit","wicked-block-conditions/with-conditions",kt)},0:function(e,t,n){e.exports=n("./src/index.js")}});