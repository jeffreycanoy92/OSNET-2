/*!CK:152140599!*//*1401158051,178167347*/

if (self.CavalryLogger) { CavalryLogger.start_js(["vxsWQ"]); }

__d("BirthdayReminder",["Animation","AsyncDialog","AsyncRequest","DOM","DOMQuery","Event","Parent","tx","XBirthdayMessagePostControllerURIBuilder"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){var p={registerMessageHandler:function(q,r,s){l.listen(q,'click',function(event,t){var u=(new i()).setURI('/ajax/messaging/composer.php').setData({ids:[r],ref:s}).setMethod('POST');h.send(u,function(v){v.subscribe('Messenger/message-sent',function(){var w=new o().getURI();new i().setURI(w).setData({id:r}).setMethod('POST').send();});});});},registerWallpostHandler:function(q){l.listen(q,'error',function(event,r){j.setContent(q,"There was an error submitting your post.");return false;});l.listen(q,'submit',function(event,r){var s,t,u;s=m.byTag(q,'li');if(s)for(t=s.nextSibling;t;t=t.nextSibling){u=k.scry(t,'textarea');if(u.length){u[0].focus();break;}}return true;});},registerCommentHandler:function(q,r){l.listen(q,'error',function(event,s){j.setContent(q,"There was an error submitting your comment.");return false;});l.listen(q,'success',function(event,s){j.replace(q,r);new g(r).duration(1000).checkpoint().to('backgroundColor','#FFFFFF').from('borderColor','#FFE222').to('borderColor','#FFFFFF').go();});}};e.exports=p;},null);