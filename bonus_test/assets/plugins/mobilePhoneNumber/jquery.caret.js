!function(a,b){var c=document.createElement("input"),d={setSelectionRange:"setSelectionRange"in c||"selectionStart"in c,createTextRange:"createTextRange"in c||"selection"in document},e=/\r\n/g,f=/\r/g,g=function(b){return"undefined"!=typeof b.value?b.value:a(b).text()},h=function(b,c){"undefined"!=typeof b.value?b.value=c:a(b).text(c)},i=function(a,b){var c=g(a).replace(f,""),d=c.length;return"undefined"==typeof b&&(b=d),b=Math.floor(b),0>b&&(b=d+b),0>b&&(b=0),b>d&&(b=d),b},j=function(a,b){return a.hasAttribute?a.hasAttribute(b):"undefined"!=typeof a[b]},k=function(a,b,c,d){this.start=a||0,this.end=b||0,this.length=c||0,this.text=d||""};k.prototype.toString=function(){return JSON.stringify(this,null,"    ")};var l=function(a){return a.selectionStart},m=function(a){var b,c,d,f,h,i;return a.focus(),a.focus(),c=document.selection.createRange(),c&&c.parentElement()===a?(f=g(a),h=f.length,d=a.createTextRange(),d.moveToBookmark(c.getBookmark()),i=a.createTextRange(),i.collapse(!1),b=d.compareEndPoints("StartToEnd",i)>-1?f.replace(e,"\n").length:-d.moveStart("character",-h)):0},n=function(a){return a?d.setSelectionRange?l(a):d.createTextRange?m(a):b:b},o=function(a,b){a.setSelectionRange(b,b)},p=function(a,b){var c=a.createTextRange();c.move("character",b),c.select()},q=function(a,b){a.focus(),b=i(a,b),d.setSelectionRange?o(a,b):d.createTextRange&&p(a,b)},r=function(a,b){var c=n(a),d=g(a).replace(f,""),e=+(c+b.length+(d.length-c)),i=+a.getAttribute("maxlength");if(j(a,"maxlength")&&e>i){var k=b.length-(e-i);b=b.substr(0,k)}h(a,d.substr(0,c)+b+d.substr(c)),q(a,c+b.length)},s=function(a){var b=new k;b.start=a.selectionStart,b.end=a.selectionEnd;var c=Math.min(b.start,b.end),d=Math.max(b.start,b.end);return b.length=d-c,b.text=g(a).substring(c,d),b},t=function(a){var b=new k;a.focus();var c=document.selection.createRange();if(c&&c.parentElement()===a){var d,e,f,h,i=0,j=0,l=g(a);d=l.length,e=l.replace(/\r\n/g,"\n"),f=a.createTextRange(),f.moveToBookmark(c.getBookmark()),h=a.createTextRange(),h.collapse(!1),f.compareEndPoints("StartToEnd",h)>-1?i=j=d:(i=-f.moveStart("character",-d),i+=e.slice(0,i).split("\n").length-1,f.compareEndPoints("EndToEnd",h)>-1?j=d:(j=-f.moveEnd("character",-d),j+=e.slice(0,j).split("\n").length-1)),i-=l.substring(0,i).split("\r\n").length-1,j-=l.substring(0,j).split("\r\n").length-1,b.start=i,b.end=j,b.length=b.end-b.start,b.text=e.substr(b.start,b.length)}return b},u=function(a){return a?d.setSelectionRange?s(a):d.createTextRange?t(a):b:b},v=function(a,b,c){a.setSelectionRange(b,c)},w=function(a,b,c){var d,f=a.createTextRange(),h=g(a),i=b;for(d=0;i>d;d++)-1!==h.substr(d,1).search(e)&&(b-=1);for(i=c,d=0;i>d;d++)-1!==h.substr(d,1).search(e)&&(c-=1);f.moveEnd("textedit",-1),f.moveStart("character",b),f.moveEnd("character",c-b),f.select()},x=function(a,b,c){b=i(a,b),c=i(a,c),d.setSelectionRange?v(a,b,c):d.createTextRange&&w(a,b,c)},y=function(b,c){var d=a(b),e=d.val(),f=u(b),g=+(f.start+c.length+(e.length-f.end)),h=+d.attr("maxlength");if(d.is("[maxlength]")&&g>h){var i=c.length-(g-h);c=c.substr(0,i)}var j=e.substr(0,f.start),k=e.substr(f.end);d.val(j+c+k);var l=f.start,m=l+c.length;x(b,f.length?l:m,m)},z=function(a){var b=window.getSelection(),c=document.createRange();c.selectNodeContents(a),b.removeAllRanges(),b.addRange(c)},A=function(a){var b=document.body.createTextRange();b.moveToElementText(a),b.select()},B=function(b){var c=a(b);return c.is("input, textarea")||b.select?(c.select(),void 0):(d.setSelectionRange?z(b):d.createTextRange&&A(b),void 0)},C=function(){document.selection?document.selection.empty():window.getSelection&&window.getSelection().removeAllRanges()};a.fn.extend({caret:function(){var a=this.filter("input, textarea");if(0===arguments.length){var b=a.get(0);return n(b)}if("number"==typeof arguments[0]){var c=arguments[0];a.each(function(a,b){q(b,c)})}else{var d=arguments[0];a.each(function(a,b){r(b,d)})}return this},range:function(){var a=this.filter("input, textarea");if(0===arguments.length){var b=a.get(0);return u(b)}if("number"==typeof arguments[0]){var c=arguments[0],d=arguments[1];a.each(function(a,b){x(b,c,d)})}else{var e=arguments[0];a.each(function(a,b){y(b,e)})}return this},selectAll:function(){return this.each(function(a,b){B(b)})}}),a.extend({deselectAll:function(){return C(),this}})}(jQuery);
