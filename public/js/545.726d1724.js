"use strict";(self["webpackChunkkahragen"]=self["webpackChunkkahragen"]||[]).push([[545],{9545:function(A,g,C){C.r(g),C.d(g,{default:function(){return d}});var B=function(){var A=this,g=A.$createElement,B=A._self._c||g;return B("div",[B("div",{staticClass:"cover_case"},[B("v-img",{attrs:{src:""+A.getHeader[0].images[0].link,cover:""}},[B("v-overlay",{staticClass:"bottom_card",attrs:{absolute:""}},[B("v-container",[B("v-card",{staticClass:"card_background",attrs:{flat:"",color:"transparent",left:""}},[B("v-card-title",{staticClass:"title"},[B("span",[A._v("case studies")])]),B("v-card-subtitle",{staticClass:"desc"},[B("p",[A._v(" "+A._s(A.getHeader[0].full_text)+" ")])])],1),B("v-breadcrumbs",{staticClass:"broadcrumbs",attrs:{items:A.items2}})],1)],1)],1)],1),B("v-img",{attrs:{src:C(7190),"max-height":"200"}}),B("section",[B("CaseStudyList")],1)],1)},t=[],Q=function(){var A=this,g=A.$createElement,B=A._self._c||g;return B("div",A._l(A.getListCaseStudy,(function(g,t){return B("div",{key:t},[B("div",{staticClass:"back_dark2"},[B("v-layout",{class:t%2==0?"flex-row":"flex-row-reverse exchange_col_order",attrs:{"align-start":""}},[B("div",{staticClass:"ch1"},[B("div",{staticClass:"border_yellow me-2"})]),B("div",{staticClass:"ch"},[B("v-card",{staticClass:"card_service",attrs:{flat:"",color:"transparent"}},[B("v-card-title",{staticClass:"title_card"},[B("div",{staticClass:"d-flex"},[B("div",[B("span",[A._v(A._s(A.getListCaseStudy[t].title))])])])]),B("v-card-subtitle",{staticClass:"desc_card"},[B("p",[A._v(" "+A._s(A.getListCaseStudy[t].full_text)+" ")])])],1)],1),B("div",{staticClass:"ch2"},[B("div",{staticClass:"box_img"},[B("v-img",{staticClass:"img_card",attrs:{src:""+A.getListCaseStudy[t].images[0].link,"max-width":"976","max-height":"960"}}),B("v-img",{class:t%2==0?"rect_yellow":"rect_yellow2",attrs:{src:C(8e3),"max-width":"520","max-height":"119"}},[B("span",{staticClass:"briefText"},[A._v(" "+A._s(A.getListCaseStudy[t].brief_text)+" ")])])],1)])])],1),B("section",{class:t==A.getListCaseStudy.length-1?"d-none":"rect_white_points"},[B("v-img",{attrs:{src:C(t%2==0?2808:7190)}})],1)])})),0)},E=[],I=C(3822),e={name:"ServicesAbout",props:{reverse:String,keyCard:Number},methods:{...(0,I.nv)(["fetchTopics"])},computed:{...(0,I.Se)(["getListCaseStudy"])},mounted(){let A={topic_type_id:40,cat:"list"};this.fetchTopics(A),console.log(this.getListCaseStudy)}},s=e,a=C(1001),i=(0,a.Z)(s,Q,E,!1,null,null,null),c=i.exports,r={name:"CaseStudiesView",components:{CaseStudyList:c},data(){return{items2:[{text:"Home",disabled:!1,href:"/"},{text:"Case Studies",disabled:!1,href:"/casestudies"}]}},methods:{...(0,I.nv)(["fetchTopics"])},computed:{...(0,I.Se)(["getHeader"])},mounted(){let A={topic_type_id:40,cat:"header"};this.fetchTopics(A)}},o=r,l=(0,a.Z)(o,B,t,!1,null,null,null),d=l.exports},8e3:function(A){A.exports="data:image/png;base64,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"},2808:function(A,g,C){A.exports=C.p+"img/rtl-transperant-yellow-points-wide-rec.ba205290.png"},7190:function(A,g,C){A.exports=C.p+"img/transperant-yellow-points-wide-rec.32f3ae8a.png"}}]);
//# sourceMappingURL=545.726d1724.js.map