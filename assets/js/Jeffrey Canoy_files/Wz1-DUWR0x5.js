/*!CK:1903416499!*//*1402281541,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["mpkJ7"]); }

__d("TimelineAggregatePost",["AsyncRequest","DataStore","DOM","Event","Parent","ScrollableArea","Style","cx"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n){var o={init:function(p){j.listen(p,'click',function(q){var r=q.getTarget();if(q.isDefaultRequested()||r.tagName==='A'||k.byClass(r,"_1ww"))return true;var s=k.byTag(r,'li'),t=h.get(s,'url');g.bootstrap(t,s);});},initPage:function(p){j.listen(p,'click',function(q){var r=k.byClass(q.getTarget(),'uiCloseButton');if(r)return;var s=k.byTag(q.getTarget(),'li');new g().setURI(h.get(s,'url')).send();});},poke:function(p){l.poke(p);},setScrollHeight:function(p){var q=i.find(p,'.sArea');m.set(q,'height',p.offsetHeight+'px');}};e.exports=o;},null);
__d("legacy:TimelineAggregatePost",["TimelineAggregatePost"],function(a,b,c,d){a.TimelineAggregatePost=b('TimelineAggregatePost');},3);
__d("TimelineCapsule",["Arbiter","CSS","DataStore","DOM","DOMQuery","DOMScroll","Parent","TimelineConstants","TimelineLegacySections","UserAgent","Vector","$","createArrayFrom","csx","isEmpty","queryThenMutateDOM"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v){var w=(function(){var x=45,y=15,z={},aa={};function ba(oa){return h.hasClass(oa,'fbTimelineBalancer');}function ca(oa){return oa.getAttribute('data-spine');}function da(oa){return h.hasClass(oa,'placeholderUnit');}function ea(oa,pa){if(pa)return (i.get(n.DS_SIDEORG,oa.id)||oa.getAttribute('data-side'));return oa.getAttribute('data-side');}function fa(oa,pa){i.set(n.DS_SIDEORG,oa.id,ea(oa,true));oa.setAttribute('data-side',pa);}function ga(oa){return oa.getAttribute('data-size');}function ha(oa){if(h.hasClass(oa,'fbTimelineOneColumn')&&oa.prevSibling&&h.hasClass(oa.prevSibling,'fbTimelineOneColumn'))return y*2;if(h.hasClass(oa,'fbTimelineIndeterminateContent'))return 0;return y;}function ia(oa,pa){var qa=0;if(h.shown(oa)&&!h.hasClass(oa,'placeholderUnit'))qa=oa.offsetHeight+ha(oa);i.set(n.DS_HEIGHT,oa.id,parseInt(qa,10));}function ja(oa){var pa=i.get(n.DS_HEIGHT,oa.id,null);return pa;}function ka(oa,pa){if(ga(pa)=='2'){return 0;}else if(ea(pa)=='r'){return oa+ja(pa);}else return oa-ja(pa);}function la(oa){k.scry(oa,"._3ram").forEach(function(pa){var qa=pa.getAttribute('data-endmarker'),ra=pa.getAttribute('data-pageindex'),sa=function(){if(!pa.parentNode)return;i.set(n.DS_LOADED,oa.id,ra);j.remove(pa);g.inform(n.SECTION_FULLY_LOADED,{scrubberKey:qa,pageIndex:ra,capsuleID:oa.id,childCount:oa.childNodes.length});};if(o.get(qa)){sa();}else var ta=g.subscribe(n.SECTION_REGISTERED,function(ua,va){if(va.scrubberKey===qa){sa();ta.unsubscribe();}});});g.inform('TimelineCapsule/balanced',{capsule:oa});}function ma(oa){if(u(z[oa.id]))return;var pa=ba(oa)?oa.firstChild:oa,qa=pa.childNodes.length,ra={},sa={},ta,ua=y,va=y,wa,xa=[];for(var ya=0;ya<qa;ya++){ta=pa.childNodes[ya];if(h.hasClass(ta,'fbTimelineUnit')){wa=k.scry(ta,'div.timelineUnitContainer')[0];if(wa)sa[ta.id]=wa.getAttribute('data-time');if(!da(ta)&&h.shown(ta)){if(ga(ta)=='2'){ra[ta.id]=Math.max(ua,va);ua=va=ra[ta.id]+ja(ta);}else if(ea(ta)=='r'){ra[ta.id]=va;va+=ja(ta);}else{ra[ta.id]=ua;ua+=ja(ta);}if(ea(ta,true)=='l'||ga(ta)=='2')xa.push(ta.id);}}}for(ya=0;ya<xa.length-1;++ya){var za=xa[ya],ab=xa[ya+1],bb=ra[za]+x,cb=ra[ab];for(var db in z[oa.id]){if(bb>cb)break;var eb=z[oa.id][db];if(h.shown(eb))continue;if(sa[db]<=sa[za]&&sa[db]>sa[ab]){eb.style.top=bb+"px";bb+=x;h.show(eb);}}}}function na(oa,pa){var qa=m.byAttribute(oa,'data-size');if(qa){if(h.hasClass(oa.parentNode,'timelineReportContent')){pa(oa);}else pa(qa);w.balanceCapsule(m.byClass(qa,'fbTimelineCapsule'));}}return {removeUnit:function(oa){na(oa,function(pa){j.remove(pa);});},removeUnitWithID:function(oa){w.removeUnit(r(oa));},hideUnit:function(oa){na(oa,function(pa){h.addClass(pa,'fbTimelineColumnHidden');});},undoHideUnit:function(oa,pa){j.remove(m.byClass(pa,'hiddenText'));na(oa,function(qa){h.removeClass(qa,'fbTimelineColumnHidden');});},unplacehold:function(oa){var pa=r(oa);pa.style.top=null;h.removeClass(pa,'visiblePlaceholder');h.removeClass(pa,'placeholder');var qa=m.byClass(pa,'fbTimelineCapsule');delete z[qa.id][oa];w.balanceCapsule(qa);},scrollToCapsule:function(oa){if(!aa.hasOwnProperty(oa.id)){var pa=q.getElementPosition(oa.parentNode);l.scrollTo(new q(q.getScrollPosition().x,pa.y-n.SUBSECTION_SCROLL_TO_OFFSET,'document'));aa[oa.id]=true;}},balanceCapsuleFromChild:function(oa,pa){w.balanceCapsule(m.byClass(oa,'fbTimelineCapsule'),pa);},balanceCapsuleDeferred:function(oa,pa){setTimeout(w.balanceCapsule.bind(null,oa,pa),0);},balanceCapsule:function(oa,pa){if(!oa||!oa.childNodes)return;var qa=0,ra,sa=document.createDocumentFragment(),ta=[],ua=[],va=[],wa=false,xa=pa&&pa.heights_action;if(pa&&pa.tail_balance)i.set(n.DS_TAILBALANCE,oa.id,pa.tail_balance);if(p.chrome()||p.webkit())h.toggleClass(oa,'webkitFix');for(var ya=0;ya<oa.childNodes.length;ya++){ra=oa.childNodes[ya];if(ca(ra)){continue;}else if(ba(ra)){s(ra.firstChild.childNodes).forEach(function(gb){ia(gb,xa);});continue;}ia(ra,xa);if(ea(ra,true)=='r'){ua.push(ra);}else ta.push(ra);va.push(ra);if(ga(ra)!='2')if((qa>0&&ea(ra)=='r')||(qa<0&&ea(ra)=='l'))wa=true;qa=ka(qa,ra);}var za=[],ab=[],bb=[];k.scry(oa,'li.fbTimelineBalancer').forEach(function(gb){var hb=s(gb.firstChild.childNodes);if(gb.getAttribute('data-nonunits')){bb=bb.concat(hb);}else if(ea(gb)=='left'){za=za.concat(hb);}else if(ea(gb)=='right')ab=ab.concat(hb);});if(wa){oa.style.minHeight=oa.offsetHeight;ta.forEach(function(gb){if(ga(gb)!='2')fa(gb,'l');});ua.forEach(function(gb){if(ga(gb)!='2')fa(gb,'r');});var cb=j.create('li',{className:'fbTimelineBalancer'},j.create('ol',null,ta));cb.setAttribute('data-side','left');j.prependContent(oa,cb);za=ta.concat(za);var db=j.create('li',{className:'fbTimelineBalancer'},j.create('ol',null,ua));db.setAttribute('data-side','right');j.prependContent(oa,db);ab=ua.concat(ab);qa=0;}while(bb.length)sa.appendChild(bb.shift());while((qa>=0&&za.length)||(qa<0&&ab.length)){if(qa>=0){ra=za.shift();}else ra=ab.shift();sa.appendChild(ra);qa=ka(qa,ra);}oa.appendChild(sa);k.scry(oa,'li.fbTimelineBalancer').forEach(function(gb){if(!gb.firstChild.childNodes.length)j.remove(gb);});var eb=(pa&&pa.tail_balance)||i.get(n.DS_TAILBALANCE,oa.id);if(eb)qa=w.tailBalance(oa,qa,eb);if(wa){va.forEach(function(gb){if(gb.parentNode!==oa){oa.appendChild(gb);qa=ka(qa,gb);}});oa.style.minHeight=null;}var fb=m.byClass(oa,'fbTimelineSection');if(fb)i.set(n.DS_COLUMN_HEIGHT_DIFFERENTIAL,fb.id,qa);z[oa.id]={};k.scry(oa,'li.placeholderUnit').forEach(function(gb){z[oa.id][gb.id]=gb;});ma(oa);la(oa);},tailBalance:function(oa,pa,qa){if(!oa)return pa;var ra=[],sa=[],ta=[],ua=[];k.scry(oa,'li.fbTimelineBalancer').forEach(function(wa){var xa=s(wa.firstChild.childNodes);if(wa.getAttribute('data-nonunits')){ua=ua.concat(xa);}else if(ea(wa)=='left'){sa=sa.concat(xa);}else if(ea(wa)=='right')ta=ta.concat(xa);ra=ra.concat(xa);});if((qa==n.FIXED_SIDE_RIGHT&&sa.length)||(qa==n.FIXED_SIDE_LEFT&&ta.length))return pa;var va=document.createDocumentFragment();if(ra)while(ra.length){if(qa!=n.FIXED_SIDE_NONE)if(ga(ra[0])!='2')if(pa>=0){fa(ra[0],'l');}else fa(ra[0],'r');pa=ka(pa,ra[0]);va.appendChild(ra.shift());}oa.appendChild(va);k.scry(oa,'li.fbTimelineBalancer').forEach(function(wa){if(!wa.firstChild.childNodes.length)j.remove(wa);});return pa;},loadTwoColumnUnits:function(oa){var pa=r(oa);v(function(){var qa=m.byClass(pa,'fbTimelineSection');if(qa){var ra=k.find(pa,"._3rbf"),sa=k.find(pa,"._3rbh"),ta=sa.offsetHeight-ra.offsetHeight;i.set(n.DS_COLUMN_HEIGHT_DIFFERENTIAL,qa.id,ta);}},la.bind(null,pa));}};})();e.exports=a.TimelineCapsule||w;},null);
__d("TimelineCapsuleUtilities",["CSS"],function(a,b,c,d,e,f,g){var h={setFirstUnit:function(i){var j=true;for(var k=0;k<i.childNodes.length;++k){var l=i.childNodes[k];if(l.id.indexOf('tl_unit_')===0)if(j){j=false;g.addClass(l,'firstUnit');}else{g.removeClass(l,'firstUnit');break;}}}};e.exports=h;},null);
__d("TimelineUnitSelector",["DOMQuery","Parent"],function(a,b,c,d,e,f,g,h){var i={getUnitsWithTime:function(j){return g.scry(j,'div.timelineUnitContainer').filter(function(k){return (h.byClass(k,'fbTimelineCapsule')===j&&k.getAttribute('data-time'));});}};e.exports=i;},null);
__d("TimelineComposerUtilities",["Event","Arbiter","Bootloader","CSS","DOM","DOMQuery","Parent","TimelineUnitSelector","Vector","cx","csx"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){var r=86400*31,s=86400000,t={listenToSetEstimatedDate:function(u,v){return h.subscribe('ComposerXTimelineTagger/init',function(w,x){if(l.contains(u,x.datePickerElement)){t.setEstimatedDate(x.datePickerInstance,v());x.composerTimelineTagger.switchToTagger('date');}});},listenToSetEstimatedDateOld:function(u,v){return h.subscribe('TimelineBackdatedComposerTagger/initialized',function(event,w){if(w.composer===u)w.date_picker.subscribe('initialized',function(x,y){t.setEstimatedDate(y,v());});});},listenToPublish:function(u,v){if(u.root)u=u.root;return h.subscribe('composer/publish',function(event,w){if(w.composer_id===u.id)i.loadModules(["TimelineStoryPublisher"],function(x){x.publish(w);v&&v();});});},listenToAnotherComposerOpen:function(u,v){return h.subscribe('composer/mutate',function(w,x){if(x!==u)v();});},listenToCancel:function(u,v){return g.listen(u,'click',function(event){if(m.byClass(event.getTarget(),"_306"))v();});},listenToCancelOld:function(u,v){return g.listen(u,'click',function(event){m.byClass(event.getTarget(),'cancelBtn')&&v();});},hidePlaceIfAttachmentsTooTall:function(u){var v=l.find(u,"._2_4"),w=o.getElementDimensions(v).y;if(w>50)j.hide(l.find(v,"._mg"));},hidePlaceIfAttachmentsTooTallOld:function(u){var v=k.find(u,'ul.fbTimelineComposerAttachments'),w=o.getElementDimensions(v).y;if(w>50){var x=m.byTag(k.scry(v,'span.placeAttachment')[0],'li');x&&j.hide(x);}},setEstimatedDate:function(u,v){var w,x;if(v&&j.hasClass(v,'fbTimelineCapsule')){w=v.getAttribute('data-start');x=v.getAttribute('data-end');if(w&&x){var y=new Date(x*1000),z=new Date();if(y>z){u.setDate(z.getFullYear(),z.getMonth()+1,z.getDate());}else if(x-w>2*r){u.setDate(y.getFullYear());}else u.setDate(y.getFullYear(),y.getMonth()+1);}return;}var aa=m.byClass(v,'fbTimelineCapsule');if(aa){w=aa.getAttribute('data-start');x=aa.getAttribute('data-end');var ba=o.getElementPosition(v).y,ca=[x,null],da=[w,null],ea=n.getUnitsWithTime(aa);for(var fa=0;fa<ea.length;fa++){var ga=ea[fa],ha=k.scry(ga.parentNode,'.spinePointer')[0];if(!ha)continue;var ia=o.getElementPosition(ha).y;if(ia<=ba){if(!ca[1]||ia>ca[1])ca=[ga.getAttribute('data-time'),ia];}else if(!da[1]||ia<da[1])da=[ga.getAttribute('data-time'),ia];}if(ca[0]!==null&&da[0]!==null){var ja=Math.round((parseInt(ca[0],10)+parseInt(da[0],10))/2)*1000;ja=Math.min(new Date()-s,ja);u.setDateWithTimestamp(ja);}}}};e.exports=t;},null);
__d("TimelineComposer",["Arbiter","Bootloader","ComposerXMarauderLogger","ComposerXStore","CSS","DOM","Parent","Run","TimelineCapsule","TimelineCapsuleUtilities","TimelineComposerUtilities","$","cx","getObjectValues","goURI"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u){var v;function w(){i.logCompleted(v.id);}function x(z){if(z.hidePost){w();return;}if(z.redirect){var aa=j.getAllForComposer(v.id);t(aa).forEach(function(ca){if(ca.reset)ca.reset(ca);});u(z.redirect);w();return;}if(!z.streamStory){window.location.reload();return;}if(z.backdatedTime){h.loadModules(["TimelineStoryPublisher"],function(ca){ca.publish(z);});w();return;}var ba=y.renderCapsuleBasedStory(v,z.streamStory);g.inform('TimelineComposer/on_after_publish',ba,g.BEHAVIOR_PERSISTENT);w();}var y={init:function(z){v=r(z);var aa=g.subscribe('composer/publish',function(event,ba){if(ba.composer_id===v.id)x(ba);});n.onLeave(aa.unsubscribe.bind(aa));if(k.hasClass(v,"_mj")){q.hidePlaceIfAttachmentsTooTall(v);}else q.hidePlaceIfAttachmentsTooTallOld(v);},renderCapsuleBasedStory:function(z,aa){var ba=m.byClass(z,'fbTimelineCapsule');if(!ba)return;var ca=m.byClass(z,'timelineUnitContainer').parentNode,da=ca.nextSibling;if(da&&da.getAttribute('data-spine'))ca=ca.nextSibling;var ea=l.insertAfter(ca,aa)[0],fa=l.find(ea,'div.timelineUnitContainer');h.loadModules(["Animation"],function(ga){new ga(fa).from('backgroundColor','#fff8dd').to('backgroundColor','#fff').duration(2000).ease(ga.ease.both).go();});p.setFirstUnit(ba);o.balanceCapsule(ba);return ea;}};e.exports=a.TimelineComposer||y;},null);
__d("TimelineContentLoader",["Arbiter","CSS","DOM","DOMScroll","Event","OnVisible","Parent","ScrollingPager","TimelineConstants","TimelineController","TimelineLegacySections","TimelineSmartInsert","TimelineURI","UIPagelet","Vector","$","arrayContains","copyProperties","createArrayFrom","csx","debounce","ge","startsWith","tx","userAction"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ba,ca,da,ea){var fa=false,ga,ha=null,ia={},ja=[],ka=[],la=[],ma={},na={},oa={},pa={},qa=null,ra=false,sa=null;function ta(cb,db,eb,fb,gb){"use strict";this.node=cb;this.loaded=fb;this.canScrollLoad=true;this.canUnload=db!=bb.RECENT;this.scrubberKey=db;this.historicUnitCount=gb;this._pageletLoadData=eb;this._expandPageletLoadData={};this.rightColumnFinished=false;}ta.prototype.load=function(cb,db){"use strict";if(this.loaded)return;var eb=this._pageletLoadData;g.inform(o.SECTION_LOADING,{data:eb,scrubberKey:this.scrubberKey});this.loaded=true;h.removeClass(this.node,'fbTimelineTimePeriodUnexpanded');h.removeClass(this.node,'fbTimelineTimePeriodSuppressed');var fb='ProfileTimelineSectionPagelet',gb=this.scrubberKey==bb.WAY_BACK;if(gb)fb='ProfileTimelineRemainingYearsPagelet';eb.highlight_unit_data=cb;eb.parent_key=this.parentKey;eb.force_no_friend_activity=ra;h.conditionClass(this.node,'combinedSections',eb.combine_sections);h.conditionClass(this.node,'fbTimelineSectionLoading',!eb.combine_sections);this.canScrollLoad=false;var hb=null;if(db&&!eb.combine_sections){this.node.style.minHeight=window.innerHeight+'px';hb=function(){this.node.style.minHeight='';ya(this.scrubberKey);}.bind(this);}else if(eb.combine_sections)hb=function(){ya(this.scrubberKey);bb.hideSection(this.scrubberKey);}.bind(this);var ib=eb.combine_sections&&gb;oa[this.scrubberKey]=t.loadFromEndpoint(fb,ib?eb.unit_container_id+'_left':this.node.id,eb,{usePipe:true,jsNonblock:true,constHeight:true,append:ib,finallyHandler:hb});za();};ta.prototype.preload=function(){"use strict";h.addClass(this.node,'fbTimelineTimePeriodSuppressed');h.removeClass(this.node,'fbTimelineTimePeriodUnexpanded');var cb=i.find(this.node,'span.sectionLabel');if(cb.getAttribute('data-original-label')){i.setContent(cb,cb.getAttribute('data-original-label'));cb.removeAttribute('data-original-label');}};ta.prototype.unload=function(){"use strict";if(!this.loaded||!this.canUnload)return;this.loaded=false;oa[this.scrubberKey]&&oa[this.scrubberKey].cancel();h.addClass(this.node,'fbTimelineTimePeriodUnexpanded');h.removeClass(this.node,'fbTimelineTimePeriodSuppressed');if(this.node.nextSibling&&h.hasClass(this.node.nextSibling,'fbTimelineSection')){i.setContent(this.node,this.node.nextSibling);h.show(this.node.firstChild);}else i.empty(this.node);this.deactivateScrollLoad();};ta.prototype.activateScrollLoad=function(){"use strict";this.canScrollLoad=true;h.removeClass(this.node,'fbTimelineTimePeriodSuppressed');h.addClass(this.node,'fbTimelineTimePeriodUnexpanded');na[this.scrubberKey]&&na[this.scrubberKey].reset();};ta.prototype.deactivateScrollLoad=function(){"use strict";if(!this.loaded){this.canScrollLoad=false;h.removeClass(this.node,'fbTimelineTimePeriodUnexpanded');h.addClass(this.node,'fbTimelineTimePeriodSuppressed');na[this.scrubberKey]&&na[this.scrubberKey].remove();}};ta.prototype.setExpandLoadData=function(cb){"use strict";this._expandPageletLoadData=cb;return this;};ta.prototype.appendData=function(cb){"use strict";x(this._pageleLoadData,cb);return this;};ta.prototype.expandSubSections=function(){"use strict";if(this.subSections.length)bb.navigateToSection(this.subSections[0].scrubberKey);};ta.prototype.expand=function(cb){"use strict";if(!this.loaded)return;qa.add_event('expand_'+this.scrubberKey);var db=i.find(this.node,'.fbTimelineSectionExpander');h.addClass(db.firstChild,'async_saving');cb&&h.addClass(cb,'async_saving');bb.navigateToSection(this.scrubberKey);i.scry(this.node,'.fbTimelineCapsule').forEach(i.remove);this._expandPageletLoadData.new_expand=true;oa[this.scrubberKey]&&oa[this.scrubberKey].cancel();oa[this.scrubberKey]=t.loadFromEndpoint('ProfileTimelineSectionPagelet',db.id,this._expandPageletLoadData,{usePipe:true,jsNonblock:true,constHeight:true});};ta.prototype.isPermalinkPeriod=function(){"use strict";return this._pageletLoadData.is_permalink_period;};ta.prototype.shouldCombineSections=function(){"use strict";return this._pageletLoadData.combine_sections;};function ua(){if(fa)return;p.register(p.CONTENT,bb);qa=ea('timeline').uai('init','scrubber',false);fa=true;}var va=aa(function(cb,db,eb){var fb=q.get(cb).historicUnitCount;db-=fb;eb-=1;if(fb==-1||eb<=0||db<0)return;var gb=bb.getNextSectionKey(cb);if(gb){q.get(gb).load();va(gb,db,eb);}},500);function wa(cb,db,eb,fb){var gb=bb.getNextSectionKey(db);if(gb){na[gb]=new l(cb,xa.bind(null,gb),false,eb||1000);}else if(db!==bb.WAY_BACK){fb=fb?fb:0;if(fb>80)return null;setTimeout(wa.bind(null,cb,db,eb,fb+1),250);}}function xa(cb){var db=q.get(cb);if(db&&db.canScrollLoad){qa.add_event("scroll_load_"+cb);db.load();if(sa&&!db.shouldCombineSections())va(cb,sa.required_units,sa.max_parallelism);}}function ya(cb){var db=na[cb];if(db){db.remove();na[cb]=null;i.remove(db.getElement());}}function za(){var cb,db,eb=false;for(var fb=0;fb<ja.length;fb++){var gb=ja[fb];if(!gb)continue;var hb=q.get(gb);if(hb&&(hb.canScrollLoad||hb.loaded)){if(!hb.loaded){h.removeClass(hb.node,'fbTimelineTimePeriodSuppressed');h.addClass(hb.node,'fbTimelineTimePeriodUnexpanded');}if(cb&&db){ab(cb,db);if(eb)cb.deactivateScrollLoad();eb=true;}cb=null;db=null;continue;}else if(cb){db=hb;hb.deactivateScrollLoad();}else{cb=hb;if(eb)hb.activateScrollLoad();}h.removeClass(hb.node,'fbTimelineTimePeriodSuppressed');h.addClass(hb.node,'fbTimelineTimePeriodUnexpanded');}}function ab(cb,db){h.removeClass(db.node,'fbTimelineTimePeriodUnexpanded');h.addClass(db.node,'fbTimelineTimePeriodSuppressed');var eb=i.find(cb.node,'span.sectionLabel'),fb=i.find(db.node,'span.sectionLabel');if(!fb.getAttribute('data-original-label'))fb.setAttribute('data-original-label',i.getText(fb));if(eb.getAttribute('data-month')&&fb.getAttribute('data-month')&&eb.getAttribute('data-year')==fb.getAttribute('data-year')){i.setContent(fb,da._("Show {month1} - {month2} {year}",{month1:fb.getAttribute('data-month'),month2:eb.getAttribute('data-month'),year:eb.getAttribute('data-year')}));}else if(eb.getAttribute('data-year')!==fb.getAttribute('data-year')){i.setContent(fb,da._("Show {year1} - {year2}",{year1:fb.getAttribute('data-year'),year2:eb.getAttribute('data-year')}));}else i.setContent(fb,da._("Show {year}",{year:fb.getAttribute('data-year')}));}var bb={WAY_BACK:'way_back',RECENT:'recent',HEADER_SCROLL_CUTOFF:80,CURRENT_SECTION_OFFSET:150,FOOTER_HEIGHT:60,registerTimePeriod:function(cb,db,eb,fb,gb,hb,ib){ua();if(w(la,db))return;if(ka)x(eb,ka);var jb=new ta(cb,db,eb,fb,ib);if(!gb){ja[hb]=db;ia[db]=true;}else{jb.parentKey=gb;q.get(gb).subSections=q.get(gb).subSections||[];q.get(gb).subSections[hb]=jb;}if(jb.shouldCombineSections())p.hideStickyHeaderNavSectionMenu();q.set(db,jb);bb.checkCurrentSectionChange();g.inform(o.SECTION_REGISTERED,{scrubberKey:db,period:jb});},reset:function(){for(var cb in na)na[cb]&&na[cb].remove();for(var db in oa)oa[db]&&oa[db].cancel();for(var eb in pa){pa[eb].unsubscribe();delete pa[eb];}ga&&ga.unsubscribe();ga=null;q.removeAll();ha=null;ia={};ja=[];ka=[];la=[];ma={};na={};oa={};qa=null;ra=false;fa=false;},checkCurrentSectionChange:function(){var cb=bb.getCurrentSection(),db=ha&&ha.scrubberKey;if(cb&&cb.scrubberKey!==db&&!cb.isPermalinkPeriod()){ha=cb;var eb=cb.scrubberKey,fb=cb.parentKey;if(!fb){fb=eb;eb=null;}p.sectionHasChanged(fb,eb);}},setParallelLoadConfig:function(cb){sa=cb;},getCurrentSection:function(){var cb={},db=q.getAll();for(var eb in db){var fb=db[eb];if(!fb.loaded||ma[fb.scrubberKey])continue;var gb=u.getElementPosition(fb.node,'viewport').y;if(fb.scrubberKey=='recent')gb--;if(gb<bb.CURRENT_SECTION_OFFSET)cb[gb]=fb;}var hb=Math.max.apply(null,Object.keys(cb)),ib=hb==-Infinity;if(!ib){return cb[hb];}else if(ja[0])return q.get(ja[0]);return null;},capsuleForCurrentSection:function(){var cb=bb.getCurrentSection();return cb&&i.scry(cb.node,'.fbTimelineCapsule')[0];},enableScrollLoad:function(cb,db,eb,fb){cb=v(cb);var gb=m.byClass(cb,'fbTimelineSection')||cb.parentNode,hb=gb&&i.scry(gb,'.fbTimelineCapsule')[0];if(!hb)return;if(eb===null){wa(cb,db,fb);}else p.runOnceWhenSectionFullyLoaded(wa.bind(null,cb,db,fb),db,eb);},loadNextSectionOnClick:function(cb,db){cb=v(cb);k.listen(cb,'click',function(eb){eb.prevent();i.remove(cb);xa(bb.getNextSectionKey(db));});},expandSectionOnClick:function(cb,db){k.listen(cb,'click',function(eb){eb.prevent();q.get(db).expand();});},expandSubSectionsOnClick:function(cb,db){k.listen(cb,'click',function(eb){eb.prevent();q.get(db).expandSubSections();});},getNextSectionKey:function(cb){for(var db=0;db<ja.length-1;db++)if(ja[db]==cb){while(db<ja.length-1&&!ja[db+1])db++;return ja[db+1];}var eb=q.get(cb);if(!eb||!eb.parentKey)return;var fb=q.get(eb.parentKey);if(!fb)return;for(var gb=0;gb<fb.subSections.length-1;gb++)if(fb.subSections[gb].scrubberKey==cb)return fb.subSections[gb+1].scrubberKey;},hideSection:function(cb){var db=q.get(cb);db&&h.hide(i.find(db.node,'.fbTimelineSection'));var eb=p.getCurrentScrubber();if(eb){var fb=null;if(!ia[cb]){var gb=db.parentKey;fb=p.getCurrentScrubber().getSubnav(gb,cb);}else fb=p.getCurrentScrubber().getNav(cb);fb&&h.hide(fb);}var hb=p.getCurrentStickyHeaderNav();hb&&hb.removeTimePeriod(cb);ma[cb]=true;},loadSectionOnClick:function(cb,db){k.listen(cb,'click',function(eb){eb.prevent();q.get(db).load();});},removeSection:function(cb){for(var db in ja)if(ja[db]==cb){ja[db]=null;break;}q.remove(cb);delete ia[cb];if(cb in na){na[cb].remove();delete na[cb];}var eb=p.getCurrentStickyHeaderNav();eb&&eb.removeTimePeriod(cb);la.push(cb);},removeSectionParent:function(cb){i.remove(v(cb).parentNode);},navigateToSection:function(cb,db,eb){qa.add_event("nav_"+cb);db=!!db;var fb=cb,gb=q.get(cb);if(!gb)return;if(!gb.loaded){r.enable();i.scry(v('timeline_tab_content'),'.fbTimelineShowOlderSections').forEach(i.remove);}if(!ia[cb]){if(!gb.loaded)gb.node.style.minHeight=u.getViewportDimensions().y+'px';var hb=g.subscribe(o.SECTION_FULLY_LOADED,function(pb,qb){if(qb.scrubberKey===cb){gb.node.style.minHeight='';hb.unsubscribe();}});fb=gb.parentKey;var ib=q.get(fb).node;if(!h.hasClass(ib,'fbTimelineSectionExpanded')){j.scrollTo(ib,0);h.addClass(ib,'fbTimelineSectionExpanded');i.scry(ib,'.fbTimelineCapsule').forEach(i.remove);i.scry(ib,'div.fbTimelineSectionExpandPager').forEach(i.remove);i.scry(ib,'div.fbTimelineContentHeader').forEach(i.remove);i.scry(ib,"._5vf").forEach(function(pb){if(!pb.getAttribute('data-subsection'))i.remove(pb);});}var jb=bb.getNextSectionKey(fb);if(jb&&na[jb])na[jb].setBuffer(0);}for(var kb=0;kb<ja.length;kb++){var lb=ja[kb];if(!lb)continue;if(lb==fb)break;q.get(lb).deactivateScrollLoad();i.scry(v('timeline_tab_content'),'.fbTimelineSectionExpandPager').forEach(function(pb){var qb=n.getInstance(pb.id);qb&&qb.removeOnVisible();});}bb.adjustContentPadding();gb.load(eb,true);za();var mb=u.getScrollPosition().x,nb=u.getElementPosition(gb.node).y;if(!db){var ob=ia[cb]?o.SCROLL_TO_OFFSET:o.SUBSECTION_SCROLL_TO_OFFSET;j.scrollTo(new u(mb,nb-ob,'document'),true,false,false,0,function(){var pb=u.getElementPosition(gb.node).y;j.scrollTo(new u(mb,pb-ob,'document'),false);var qb=i.scry(gb.node,'h3.uiHeaderTitle')[0];if(qb){qb.tabIndex=0;qb.focus();}});}},adjustContentPadding:function(){var cb=ba('timeline_tab_content');if(!cb)return;if(p.isOneColumnMinimal())return;var db=p.getCurrentKey()||s.TIMELINE_KEY;if(db!==s.TIMELINE_KEY)return;var eb=ja.length-1,fb=q.get(ja[eb]);cb.style.paddingBottom=fb&&fb.loaded?null:u.getViewportDimensions().y-bb.CURRENT_SECTION_OFFSET-bb.HEADER_SCROLL_CUTOFF-bb.FOOTER_HEIGHT+'px';},adjustContentPaddingAfterLoad:function(cb,db){p.runOnceWhenSectionFullyLoaded(bb.adjustContentPadding,cb,db);},appendContentAfterLoad:function(cb,db,eb){p.runOnceWhenSectionFullyLoaded(i.appendContent.bind(null,v(cb),db),eb,'0');},markSectionAsLoaded:function(cb,db,eb){p.runOnceWhenSectionFullyLoaded(function(){ba(cb)&&h.removeClass(v(cb).parentNode,'fbTimelineSectionLoading');},db,eb);},suppressSectionsAbove:function(cb){var db,eb;for(var fb=0;fb<ja.length;fb++){var gb=ja[fb];if(!gb)continue;db=q.get(gb).node;eb=null;if(y(cb.parentNode.children).indexOf(cb)<=y(db.parentNode.children).indexOf(db)){eb=gb;break;}q.get(gb).deactivateScrollLoad();}if(eb)bb.navigateToSection(eb,true);},forceNoFriendActivity:function(){ra=true;},removeDupes:function(cb){var db=ba(cb);if(!db)return;var eb=i.scry(db,'li.fbTimelineUnit'),fb={};for(var gb=0;gb<eb.length;gb++){var hb=eb[gb];if(hb.id&&ca(hb.id,'tl_unit_')){var ib=hb.id.substring(8,hb.id.length),jb=i.scry(hb,'div.timelineUnitContainer');if(jb.length>0)ib=ib+jb[0].getAttribute('data-time');if(fb.hasOwnProperty(ib)){hb.id='dupe_unit_'+Math.random();hb.className="hidden_elem";}else fb[ib]=1;}}},removeLoadingState:function(cb){ba(cb)&&h.removeClass(v(cb),'fbTimelineSectionLoading');},setExpandLoadDataForSection:function(cb,db){var eb=q.get(cb);eb&&eb.setExpandLoadData(db);},appendSectionDataForAllSections:function(cb){ka=cb;for(var db=0;db<ja.length-1;db++){var eb=ja[db];if(!eb)continue;var fb=q.get(eb);fb&&fb.appendData(cb);}},updatePagerAfterLoad:function(cb,db,eb,fb,gb){var hb=n.getInstance(cb.firstChild.id);if(!hb){pa[cb.firstChild.id]=g.subscribe(n.REGISTERED,function(ib,jb){pa[cb.firstChild.id].unsubscribe();delete pa[cb.firstChild.id];if(jb.id===cb.firstChild.id)bb.updatePagerAfterLoad(cb,db,eb,fb,gb);});return;}p.runOnceWhenSectionFullyLoaded(function(){h.removeClass(cb,'fbTimelineHiddenPager');hb.checkBuffer();},eb,fb);if(gb)p.runOnceWhenSectionFullyLoaded(p.adjustScrollingPagerBuffer.bind(null,cb.firstChild.id,db),eb,fb);},showAfterLoad:function(cb,db,eb){p.runOnceWhenSectionFullyLoaded(function(){var fb=ba(cb);fb&&h.show(fb);},db,eb);},repositionDialog:function(cb){g.subscribe(o.SECTION_LOADED,function(){cb.updatePosition();});},rightColumnFinished:function(cb){var db=q.get(cb);db.rightColumnFinished=true;},addUnrankedUnits:function(cb){var db=v(cb),eb=i.scry(db,'li.fbTimelineUnit');for(var fb=eb.length-1;fb>=0;fb--){var gb=eb[fb];i.insertAfter(db,gb);h.addClass(i.find(gb,'div.timelineUnitContainer'),'fbTimelineHighlightUnit');}i.remove(db);}};e.exports=bb;},null);
__d("TimelineLogging",["TimelineController","reportData"],function(a,b,c,d,e,f,g,h){var i=false,j=0,k=null,l=null,m={init:function(n){if(i)return;j=n;g.register(g.LOGGING,this);},reset:function(){i=false;j=0;k=null;},log:function(n,o){o.profile_id=j;h(n,{gt:o});},logSectionChange:function(n,o){var p={timeline_section_change:1,key:n};if(k&&n==k){p.timeline_scrubber=1;k=null;}if(l&&n==l){p.sticky_header_nav=1;l=null;}m.log('timeline',p);},logScrubberClick:function(n){k=n;},logStickyHeaderNavClick:function(n){l=n;}};e.exports=m;},null);
__d("TimelineSpinelessComposer",["Arbiter","Bootloader","ComposerXMarauderLogger","CSS","Run","TimelineComposer","TimelineComposerUtilities","cx"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n){var o;function p(){i.logCompleted(o.id);}function q(s){if(s.hidePost){p();return;}if(!s.streamStory){window.location.reload();return;}if(s.backdatedTime){h.loadModules(["TimelineStoryPublisher"],function(t){t.publish(s);});p();return;}l.renderCapsuleBasedStory(o,s.streamStory);p();}var r={init:function(s){o=s;var t=g.subscribe('composer/publish',function(event,u){if(u.composer_id===o.id)q(u);});k.onLeave(t.unsubscribe.bind(t));if(j.hasClass(o,"_mj")){m.hidePlaceIfAttachmentsTooTall(o);}else m.hidePlaceIfAttachmentsTooTallOld(o);}};e.exports=r;},null);
__d("TimelineStickyRightColumn",["Arbiter","CSS","DOMQuery","Event","PhotoSnowlift","Run","Style","TimelineContentLoader","Vector","csx","queryThenMutateDOM"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){var r=100,s=15,t=15,u=35,v=false,w=null,x=null,y,z,aa,ba,ca,da,ea,fa;function ga(){if(k.getInstance().isOpen)return;y=n.getCurrentSection();if(!y||!y.rightColumnFinished)return;var oa=i.scry(y.node,"._3rbf")[0],pa=i.scry(y.node,"._3rbh")[0];z=oa?oa.offsetHeight:0;aa=pa?pa.offsetHeight:0;ba=o.getViewportDimensions().y;ea=oa?o.getElementPosition(oa).y:0;fa=document.body.clientWidth<document.body.scrollWidth;}function ha(){if(!y||k.getInstance().isOpen)return;if(x&&x!==y){var oa=i.scry(x.node,"._3rbh")[0];if(oa)ja(oa,'','','');}var pa=i.scry(y.node,"._3rbh")[0];if(!pa)return;if(fa){ja(pa,'','','');return;}if(!y||!y.rightColumnFinished)return;ia(y);x=h.hasClass(pa,'fixed_always')?y:null;}function ia(oa){if(aa>=z||z<=ba)return;da=ca;ca=o.getScrollPosition().y;var pa,qa=i.scry(oa.node,"._3rbh")[0];if(!qa)return;if(ca<=ea-ka()){ja(qa,'','','');return;}if(z+ea<=ca+Math.min(aa+ka(),ba-t-u)){ja(qa,'absolute','',t+'px');return;}if(aa>ba-t-ka()){if(ca<da){var ra=false;if(qa.style.position==='absolute')if(qa.style.top!==''&&ca+ka()-ea<=parseInt(qa.style.top,10)){ra=true;}else if(qa.style.bottom!==''&&ca<=(ea+z-ka())-aa)ra=true;if(ra){ja(qa,'fixed',ka()+'px','');return;}else if(qa.style.position==='absolute'&&qa.style.top){return;}else if(h.hasClass(qa,'fixed_always')){if(parseInt(qa.style.top,10)>=ka())return;pa=ca-ea-(aa-(ba-u));if(da)pa+=da-ca;ja(qa,'absolute',pa+'px','');return;}}else{var sa=false;if(qa.style.position==='absolute'||(qa.style.position===''&&!h.hasClass(qa,'fixed_always'))){pa=qa.style.top?parseInt(qa.style.top,10):0;if(ca+ba>=ea+pa+aa+u)sa=true;}if(sa){pa=ba-aa-t-u;ja(qa,'fixed',pa+'px','');return;}else if(ca==da){return;}else if(h.hasClass(qa,'fixed_always')){if(parseInt(qa.style.top,10)>=ka()){pa=ca-ea+ka();if(da)pa+=da-ca;ja(qa,'absolute',pa+'px','');return;}}else if(qa.style.position==='absolute')return;}}else ja(qa,'fixed',ka()+'px','');}function ja(oa,pa,qa,ra){m.set(oa,'bottom',ra);if(pa==='fixed'){h.addClass(oa,'fixed_always');m.set(oa,'position','');}else{h.removeClass(oa,'fixed_always');m.set(oa,'position',pa);}m.set(oa,'top',qa);g.inform('reflow');}function ka(){return h.hasClass(document.documentElement,'tinyViewport')?s:r;}function la(){q(ga,ha);}function ma(){v=false;x=null;while(w.length)w.pop().remove();w=null;}var na={init:function(){if(v)return;v=true;w=[j.listen(window,'scroll',la),j.listen(window,'resize',la)];l.onLeave(ma);},adjust:function(){if(v){ga();ha();}}};e.exports=na;},null);