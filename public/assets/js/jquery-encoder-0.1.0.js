/* Simple JavaScript Inheritance
 * By John Resig http://ejohn.org/
 * MIT Licensed.
 */
// Inspired by base2 and Prototype
(function(){
  var initializing = false, fnTest = /xyz/.test(function(){xyz;}) ? /\b_super\b/ : /.*/;

  // The base Class implementation (does nothing)
  this.Class = function(){};

  // Create a new Class that inherits from this class
  Class.extend = function(prop) {
	var _super = this.prototype;

	// Instantiate a base class (but only create the instance,
	// don't run the init constructor)
	initializing = true;
	var prototype = new this();
	initializing = false;

	// Copy the properties over onto the new prototype
	for (var name in prop) {
	  // Check if we're overwriting an existing function
	  prototype[name] = typeof prop[name] == "function" &&
		typeof _super[name] == "function" && fnTest.test(prop[name]) ?
		(function(name, fn){
		  return function() {
			var tmp = this._super;

			// Add a new ._super() method that is the same method
			// but on the super-class
			this._super = _super[name];

			// The method only need to be bound temporarily, so we
			// remove it when we're done executing
			var ret = fn.apply(this, arguments);
			this._super = tmp;

			return ret;
		  };
		})(name, prop[name]) :
		prop[name];
	}

	// The dummy class constructor
	function Class() {
	  // All construction is actually done in the init method
	  if ( !initializing && this.init )
		this.init.apply(this, arguments);
	}

	// Populate our constructed prototype object
	Class.prototype = prototype;

	// Enforce the constructor to be what we expect
	Class.constructor = Class;

	// And make this class extendable
	Class.extend = arguments.callee;

	return Class;
  };
})();

/*
 * Copyright (c) 2010 - The OWASP Foundation
 *
 * The jquery-encoder is published by OWASP under the MIT license. You should read and accept the
 * LICENSE before you use, modify, and/or redistribute this software.
 */

(function($){var default_immune={'js':[',','.','_',' ']};var attr_whitelist_classes={'default':[',','.','-','_',' ']};var attr_whitelist={'width':['%'],'height':['%']};var css_whitelist_classes={'default':['-',' ','%'],'color':['#',' ','(',')'],'image':['(',')',':','/','?','&','-','.','"','=',' ']};var css_whitelist={'background':['(',')',':','%','/','?','&','-',' ','.','"','=','#'],'background-image':css_whitelist_classes['image'],'background-color':css_whitelist_classes['color'],'border-color':css_whitelist_classes['color'],'border-image':css_whitelist_classes['image'],'color':css_whitelist_classes['color'],'icon':css_whitelist_classes['image'],'list-style-image':css_whitelist_classes['image'],'outline-color':css_whitelist_classes['color']};var unsafeKeys={'attr_name':['on[a-z]{1,}','style','href','src'],'attr_val':['javascript:'],'css_key':['behavior','-moz-behavior','-ms-behavior'],'css_val':['expression']};var options={blacklist:true};var hasBeenInitialized=false;$.encoder={author:'Chris Schmidt (chris.schmidt@owasp.org)',version:'${project.version}',init:function(opts){if(hasBeenInitialized)
throw"jQuery Encoder has already been initialized - cannot set options after initialization";hasBeenInitialized=true;$.extend(options,opts);},encodeForHTML:function(input){hasBeenInitialized=true;var div=document.createElement('div');$(div).text(input);return $(div).html();},encodeForHTMLAttribute:function(attr,input,omitAttributeName){hasBeenInitialized=true;attr=$.encoder.canonicalize(attr).toLowerCase();input=$.encoder.canonicalize(input);if($.inArray(attr,unsafeKeys['attr_name'])>=0){throw"Unsafe attribute name used: "+attr;}
for(var a=0;a<unsafeKeys['attr_val'];a++){if(input.toLowerCase().match(unsafeKeys['attr_val'][a])){throw"Unsafe attribute value used: "+input;}}
immune=attr_whitelist[attr];if(!immune)immune=attr_whitelist_classes['default'];var encoded='';if(!omitAttributeName){for(var p=0;p<attr.length;p++){var pc=attr.charAt(p);if(!pc.match(/[a-zA-Z\-0-9]/)){throw"Invalid attribute name specified";}
encoded+=pc;}
encoded+='="';}
for(var i=0;i<input.length;i++){var ch=input.charAt(i),cc=input.charCodeAt(i);if(!ch.match(/[a-zA-Z0-9]/)&&$.inArray(ch,immune)<0){var hex=cc.toString(16);encoded+='&#x'+hex+';';}else{encoded+=ch;}}
if(!omitAttributeName){encoded+='"';}
return encoded;},encodeForCSS:function(propName,input,omitPropertyName){hasBeenInitialized=true;propName=$.encoder.canonicalize(propName).toLowerCase();input=$.encoder.canonicalize(input);if($.inArray(propName,unsafeKeys['css_key'])>=0){throw"Unsafe property name used: "+propName;}
for(var a=0;a<unsafeKeys['css_val'].length;a++){if(input.toLowerCase().indexOf(unsafeKeys['css_val'][a])>=0){throw"Unsafe property value used: "+input;}}
immune=css_whitelist[propName];if(!immune)immune=css_whitelist_classes['default'];var encoded='';if(!omitPropertyName){for(var p=0;p<propName.length;p++){var pc=propName.charAt(p);if(!pc.match(/[a-zA-Z\-]/)){throw"Invalid Property Name specified";}
encoded+=pc;}
encoded+=': ';}
for(var i=0;i<input.length;i++){var ch=input.charAt(i),cc=input.charCodeAt(i);if(!ch.match(/[a-zA-Z0-9]/)&&$.inArray(ch,immune)<0){var hex=cc.toString(16);var pad='000000'.substr((hex.length));encoded+='\\'+pad+hex;}else{encoded+=ch;}}
return encoded;},encodeForURL:function(input,attr){hasBeenInitialized=true;var encoded='';if(attr){if(attr.match(/^[A-Za-z\-0-9]{1,}$/)){encoded+=$.encoder.canonicalize(attr).toLowerCase();}else{throw"Illegal Attribute Name Specified";}
encoded+='="';}
encoded+=encodeURIComponent(input);encoded+=attr?'"':'';return encoded;},encodeForJavascript:function(input){hasBeenInitialized=true;if(!immune)immune=default_immune['js'];var encoded='';for(var i=0;i<input.length;i++){var ch=input.charAt(i),cc=input.charCodeAt(i);if($.inArray(ch,immune)>=0||hex[cc]==null){encoded+=ch;continue;}
var temp=cc.toString(16),pad;if(cc<256){pad='00'.substr(temp.length);encoded+='\\x'+pad+temp.toUpperCase();}else{pad='0000'.substr(temp.length);encoded+='\\u'+pad+temp.toUpperCase();}}
return encoded;},canonicalize:function(input,strict){hasBeenInitialized=true;if(input===null)return null;var out=input,cycle_out=input;var decodeCount=0,cycles=0;var codecs=[new HTMLEntityCodec(),new PercentCodec(),new CSSCodec()];while(true){cycle_out=out;for(var i=0;i<codecs.length;i++){var new_out=codecs[i].decode(out);if(new_out!=out){decodeCount++;out=new_out;}}
if(cycle_out==out){break;}
cycles++;}
if(strict&&decodeCount>1){throw"Attack Detected - Multiple/Double Encodings used in input";}
return out;}};var hex=[];for(var c=0;c<0xFF;c++){if(c>=0x30&&c<=0x39||c>=0x41&&c<=0x5a||c>=0x61&&c<=0x7a){hex[c]=null;}else{hex[c]=c.toString(16);}}
var methods={html:function(opts){return $.encoder.encodeForHTML(opts.unsafe);},css:function(opts){var work=[];var out=[];if(opts.map){work=opts.map;}else{work[opts.name]=opts.unsafe;}
for(var k in work){if(!(typeof work[k]=='function')&&work.hasOwnProperty(k)){out[k]=$.encoder.encodeForCSS(k,work[k],true);}}
return out;},attr:function(opts){var work=[];var out=[];if(opts.map){work=opts.map;}else{work[opts.name]=opts.unsafe;}
for(var k in work){if(!(typeof work[k]=='function')&&work.hasOwnProperty(k)){out[k]=$.encoder.encodeForHTMLAttribute(k,work[k],true);}}
return out;}};$.fn.encode=function(){hasBeenInitialized=true;var argCount=arguments.length;var opts={'context':'html','unsafe':null,'name':null,'map':null,'setter':null,'strict':true};if(argCount==1&&typeof arguments[0]=='object'){$.extend(opts,arguments[0]);}else{opts.context=arguments[0];if(arguments.length==2){if(opts.context=='html'){opts.unsafe=arguments[1];}
else if(opts.content=='attr'||opts.content=='css'){opts.map=arguments[1];}}else{opts.name=arguments[1];opts.unsafe=arguments[2];}}
if(opts.context=='html'){opts.setter=this.html;}
else if(opts.context=='css'){opts.setter=this.css;}
else if(opts.context=='attr'){opts.setter=this.attr;}
return opts.setter.call(this,methods[opts.context].call(this,opts));};var PushbackString=Class.extend({_input:null,_pushback:null,_temp:null,_index:0,_mark:0,_hasNext:function(){if(this._input==null)return false;if(this._input.length==0)return false;return this._index<this._input.length;},init:function(input){this._input=input;},pushback:function(c){this._pushback=c;},index:function(){return this._index;},hasNext:function(){if(this._pushback!=null)return true;return this._hasNext();},next:function(){if(this._pushback!=null){var save=this._pushback;this._pushback=null;return save;}
return(this._hasNext())?this._input.charAt(this._index++):null;},nextHex:function(){var c=this.next();if(c==null)return null;if(c.match(/[0-9A-Fa-f]/))return c;return null;},peek:function(c){if(c){if(this._pushback&&this._pushback==c)return true;return this._hasNext()?this._input.charAt(this._index)==c:false;}
if(this._pushback)return this._pushback;return this._hasNext()?this._input.charAt(this._index):null;},mark:function(){this._temp=this._pushback;this._mark=this._index;},reset:function(){this._pushback=this._temp;this._index=this._mark;},remainder:function(){var out=this._input.substr(this._index);if(this._pushback!=null){out=this._pushback+out;}
return out;}});var Codec=Class.extend({decode:function(input){var out='',pbs=new PushbackString(input);while(pbs.hasNext()){var c=this.decodeCharacter(pbs);if(c!=null){out+=c;}else{out+=pbs.next();}}
return out;},decodeCharacter:function(pbs){return pbs.next();}});var HTMLEntityCodec=Codec.extend({decodeCharacter:function(input){input.mark();var first=input.next();if(first==null||first!='&'){input.reset();return null;}
var second=input.next();if(second==null){input.reset();return null;}
var c;if(second=='#'){c=this._getNumericEntity(input);if(c!=null)return c;}else if(second.match(/[A-Za-z]/)){input.pushback(second);c=this._getNamedEntity(input);if(c!=null)return c;}
input.reset();return null;},_getNamedEntity:function(input){var possible='',entry,len;len=Math.min(input.remainder().length,ENTITY_TO_CHAR_TRIE.getMaxKeyLength());for(var i=0;i<len;i++){possible+=input.next().toLowerCase();}
entry=ENTITY_TO_CHAR_TRIE.getLongestMatch(possible);if(entry==null)
return null;input.reset();input.next();len=entry.getKey().length;for(var j=0;j<len;j++){input.next();}
if(input.peek(';'))
input.next();return entry.getValue();},_getNumericEntity:function(input){var first=input.peek();if(first==null)return null;if(first=='x'||first=='X'){input.next();return this._parseHex(input);}
return this._parseNumber(input);},_parseHex:function(input){var out='';while(input.hasNext()){var c=input.peek();if(!isNaN(parseInt(c,16))){out+=c;input.next();}else if(c==';'){input.next();break;}else{break;}}
var i=parseInt(out,16);if(!isNaN(i)&&isValidCodePoint(i))return String.fromCharCode(i);return null;},_parseNumber:function(input){var out='';while(input.hasNext()){var ch=input.peek();if(!isNaN(parseInt(ch,10))){out+=ch;input.next();}else if(ch==';'){input.next();break;}else{break;}}
var i=parseInt(out,10);if(!isNaN(i)&&isValidCodePoint(i))return String.fromCharCode(i);return null;}});var PercentCodec=Codec.extend({decodeCharacter:function(input){input.mark();var first=input.next();if(first==null){input.reset();return null;}
if(first!='%'){input.reset();return null;}
var out='';for(var i=0;i<2;i++){var c=input.nextHex();if(c!=null)out+=c;}
if(out.length==2){var p=parseInt(out,16);if(isValidCodePoint(p))
return String.fromCharCode(p);}
input.reset();return null;}});var CSSCodec=Codec.extend({decodeCharacter:function(input){input.mark();var first=input.next();if(first==null||first!='\\'){input.reset();return null;}
var second=input.next();if(second==null){input.reset();return null;}
switch(second){case'\r':if(input.peek('\n')){input.next();}
case'\n':case'\f':case'\u0000':return this.decodeCharacter(input);}
if(parseInt(second,16)=='NaN'){return second;}
var out=second;for(var j=0;j<5;j++){var c=input.next();if(c==null||isWhiteSpace(c)){break;}
if(parseInt(c,16)!='NaN'){out+=c;}else{input.pushback(c);break;}}
var p=parseInt(out,16);if(isValidCodePoint(p))
return String.fromCharCode(p);return'\ufffd';}});var Trie=Class.extend({root:null,maxKeyLen:0,size:0,init:function(){this.clear();},getLongestMatch:function(key){return(this.root==null&&key==null)?null:this.root.getLongestMatch(key,0);},getMaxKeyLength:function(){return this.maxKeyLen;},clear:function(){this.root=null,this.maxKeyLen=0,this.size=0;},put:function(key,val){var len,old;if(this.root==null)
this.root=new Trie.Node();if((old=this.root.put(key,0,val))!=null)
return old;if((len=key.length)>this.maxKeyLen)
this.maxKeyLen=key.length;this.size++;return null;}});Trie.Entry=Class.extend({_key:null,_value:null,init:function(key,value){this._key=key,this._value=value;},getKey:function(){return this._key;},getValue:function(){return this._value;},equals:function(other){if(!(other instanceof Trie.Entry)){return false;}
return this._key==other._key&&this._value==other._value;}});Trie.Node=Class.extend({_value:null,_nextMap:null,setValue:function(value){this._value=value;},getNextNode:function(ch){if(!this._nextMap)return null;return this._nextMap[ch];},put:function(key,pos,value){var nextNode,ch,old;if(key.length==pos){old=this._value;this.setValue(value);return old;}
ch=key.charAt(pos);if(this._nextMap==null){this._nextMap=Trie.Node.newNodeMap();nextNode=new Trie.Node();this._nextMap[ch]=nextNode;}else if((nextNode=this._nextMap[ch])==null){nextNode=new Trie.Node();this._nextMap[ch]=nextNode;}
return nextNode.put(key,pos+1,value);},get:function(key,pos){var nextNode;if(key.length<=pos)
return this._value;if((nextNode=this.getNextNode(key.charAt(pos)))==null)
return null;return nextNode.get(key,pos+1);},getLongestMatch:function(key,pos){var nextNode,ret;if(key.length<=pos){return Trie.Entry.newInstanceIfNeeded(key,this._value);}
if((nextNode=this.getNextNode(key.charAt(pos)))==null){return Trie.Entry.newInstanceIfNeeded(key,pos,this._value);}
if((ret=nextNode.getLongestMatch(key,pos+1))!=null){return ret;}
return Trie.Entry.newInstanceIfNeeded(key,pos,this._value);}});Trie.Entry.newInstanceIfNeeded=function(){var key=arguments[0],value,keyLength;if(typeof arguments[1]=='string'){value=arguments[1];keyLength=key.length;}else{keyLength=arguments[1];value=arguments[2];}
if(value==null||key==null){return null;}
if(key.length>keyLength){key=key.substr(0,keyLength);}
return new Trie.Entry(key,value);};Trie.Node.newNodeMap=function(){return{};};var isValidCodePoint=function(codepoint){return codepoint>=0x0000&&codepoint<=0x10FFFF;};var isWhiteSpace=function(input){return input.match(/[\s]/);};var MAP_ENTITY_TO_CHAR=[];var MAP_CHAR_TO_ENTITY=[];var ENTITY_TO_CHAR_TRIE=new Trie();(function(){MAP_ENTITY_TO_CHAR["&quot"]="34";MAP_ENTITY_TO_CHAR["&amp"]="38";MAP_ENTITY_TO_CHAR["&lt"]="60";MAP_ENTITY_TO_CHAR["&gt"]="62";MAP_ENTITY_TO_CHAR["&nbsp"]="160";MAP_ENTITY_TO_CHAR["&iexcl"]="161";MAP_ENTITY_TO_CHAR["&cent"]="162";MAP_ENTITY_TO_CHAR["&pound"]="163";MAP_ENTITY_TO_CHAR["&curren"]="164";MAP_ENTITY_TO_CHAR["&yen"]="165";MAP_ENTITY_TO_CHAR["&brvbar"]="166";MAP_ENTITY_TO_CHAR["&sect"]="167";MAP_ENTITY_TO_CHAR["&uml"]="168";MAP_ENTITY_TO_CHAR["&copy"]="169";MAP_ENTITY_TO_CHAR["&ordf"]="170";MAP_ENTITY_TO_CHAR["&laquo"]="171";MAP_ENTITY_TO_CHAR["&not"]="172";MAP_ENTITY_TO_CHAR["&shy"]="173";MAP_ENTITY_TO_CHAR["&reg"]="174";MAP_ENTITY_TO_CHAR["&macr"]="175";MAP_ENTITY_TO_CHAR["&deg"]="176";MAP_ENTITY_TO_CHAR["&plusmn"]="177";MAP_ENTITY_TO_CHAR["&sup2"]="178";MAP_ENTITY_TO_CHAR["&sup3"]="179";MAP_ENTITY_TO_CHAR["&acute"]="180";MAP_ENTITY_TO_CHAR["&micro"]="181";MAP_ENTITY_TO_CHAR["&para"]="182";MAP_ENTITY_TO_CHAR["&middot"]="183";MAP_ENTITY_TO_CHAR["&cedil"]="184";MAP_ENTITY_TO_CHAR["&sup1"]="185";MAP_ENTITY_TO_CHAR["&ordm"]="186";MAP_ENTITY_TO_CHAR["&raquo"]="187";MAP_ENTITY_TO_CHAR["&frac14"]="188";MAP_ENTITY_TO_CHAR["&frac12"]="189";MAP_ENTITY_TO_CHAR["&frac34"]="190";MAP_ENTITY_TO_CHAR["&iquest"]="191";MAP_ENTITY_TO_CHAR["&Agrave"]="192";MAP_ENTITY_TO_CHAR["&Aacute"]="193";MAP_ENTITY_TO_CHAR["&Acirc"]="194";MAP_ENTITY_TO_CHAR["&Atilde"]="195";MAP_ENTITY_TO_CHAR["&Auml"]="196";MAP_ENTITY_TO_CHAR["&Aring"]="197";MAP_ENTITY_TO_CHAR["&AElig"]="198";MAP_ENTITY_TO_CHAR["&Ccedil"]="199";MAP_ENTITY_TO_CHAR["&Egrave"]="200";MAP_ENTITY_TO_CHAR["&Eacute"]="201";MAP_ENTITY_TO_CHAR["&Ecirc"]="202";MAP_ENTITY_TO_CHAR["&Euml"]="203";MAP_ENTITY_TO_CHAR["&Igrave"]="204";MAP_ENTITY_TO_CHAR["&Iacute"]="205";MAP_ENTITY_TO_CHAR["&Icirc"]="206";MAP_ENTITY_TO_CHAR["&Iuml"]="207";MAP_ENTITY_TO_CHAR["&ETH"]="208";MAP_ENTITY_TO_CHAR["&Ntilde"]="209";MAP_ENTITY_TO_CHAR["&Ograve"]="210";MAP_ENTITY_TO_CHAR["&Oacute"]="211";MAP_ENTITY_TO_CHAR["&Ocirc"]="212";MAP_ENTITY_TO_CHAR["&Otilde"]="213";MAP_ENTITY_TO_CHAR["&Ouml"]="214";MAP_ENTITY_TO_CHAR["&times"]="215";MAP_ENTITY_TO_CHAR["&Oslash"]="216";MAP_ENTITY_TO_CHAR["&Ugrave"]="217";MAP_ENTITY_TO_CHAR["&Uacute"]="218";MAP_ENTITY_TO_CHAR["&Ucirc"]="219";MAP_ENTITY_TO_CHAR["&Uuml"]="220";MAP_ENTITY_TO_CHAR["&Yacute"]="221";MAP_ENTITY_TO_CHAR["&THORN"]="222";MAP_ENTITY_TO_CHAR["&szlig"]="223";MAP_ENTITY_TO_CHAR["&agrave"]="224";MAP_ENTITY_TO_CHAR["&aacute"]="225";MAP_ENTITY_TO_CHAR["&acirc"]="226";MAP_ENTITY_TO_CHAR["&atilde"]="227";MAP_ENTITY_TO_CHAR["&auml"]="228";MAP_ENTITY_TO_CHAR["&aring"]="229";MAP_ENTITY_TO_CHAR["&aelig"]="230";MAP_ENTITY_TO_CHAR["&ccedil"]="231";MAP_ENTITY_TO_CHAR["&egrave"]="232";MAP_ENTITY_TO_CHAR["&eacute"]="233";MAP_ENTITY_TO_CHAR["&ecirc"]="234";MAP_ENTITY_TO_CHAR["&euml"]="235";MAP_ENTITY_TO_CHAR["&igrave"]="236";MAP_ENTITY_TO_CHAR["&iacute"]="237";MAP_ENTITY_TO_CHAR["&icirc"]="238";MAP_ENTITY_TO_CHAR["&iuml"]="239";MAP_ENTITY_TO_CHAR["&eth"]="240";MAP_ENTITY_TO_CHAR["&ntilde"]="241";MAP_ENTITY_TO_CHAR["&ograve"]="242";MAP_ENTITY_TO_CHAR["&oacute"]="243";MAP_ENTITY_TO_CHAR["&ocirc"]="244";MAP_ENTITY_TO_CHAR["&otilde"]="245";MAP_ENTITY_TO_CHAR["&ouml"]="246";MAP_ENTITY_TO_CHAR["&divide"]="247";MAP_ENTITY_TO_CHAR["&oslash"]="248";MAP_ENTITY_TO_CHAR["&ugrave"]="249";MAP_ENTITY_TO_CHAR["&uacute"]="250";MAP_ENTITY_TO_CHAR["&ucirc"]="251";MAP_ENTITY_TO_CHAR["&uuml"]="252";MAP_ENTITY_TO_CHAR["&yacute"]="253";MAP_ENTITY_TO_CHAR["&thorn"]="254";MAP_ENTITY_TO_CHAR["&yuml"]="255";MAP_ENTITY_TO_CHAR["&OElig"]="338";MAP_ENTITY_TO_CHAR["&oelig"]="339";MAP_ENTITY_TO_CHAR["&Scaron"]="352";MAP_ENTITY_TO_CHAR["&scaron"]="353";MAP_ENTITY_TO_CHAR["&Yuml"]="376";MAP_ENTITY_TO_CHAR["&fnof"]="402";MAP_ENTITY_TO_CHAR["&circ"]="710";MAP_ENTITY_TO_CHAR["&tilde"]="732";MAP_ENTITY_TO_CHAR["&Alpha"]="913";MAP_ENTITY_TO_CHAR["&Beta"]="914";MAP_ENTITY_TO_CHAR["&Gamma"]="915";MAP_ENTITY_TO_CHAR["&Delta"]="916";MAP_ENTITY_TO_CHAR["&Epsilon"]="917";MAP_ENTITY_TO_CHAR["&Zeta"]="918";MAP_ENTITY_TO_CHAR["&Eta"]="919";MAP_ENTITY_TO_CHAR["&Theta"]="920";MAP_ENTITY_TO_CHAR["&Iota"]="921";MAP_ENTITY_TO_CHAR["&Kappa"]="922";MAP_ENTITY_TO_CHAR["&Lambda"]="923";MAP_ENTITY_TO_CHAR["&Mu"]="924";MAP_ENTITY_TO_CHAR["&Nu"]="925";MAP_ENTITY_TO_CHAR["&Xi"]="926";MAP_ENTITY_TO_CHAR["&Omicron"]="927";MAP_ENTITY_TO_CHAR["&Pi"]="928";MAP_ENTITY_TO_CHAR["&Rho"]="929";MAP_ENTITY_TO_CHAR["&Sigma"]="931";MAP_ENTITY_TO_CHAR["&Tau"]="932";MAP_ENTITY_TO_CHAR["&Upsilon"]="933";MAP_ENTITY_TO_CHAR["&Phi"]="934";MAP_ENTITY_TO_CHAR["&Chi"]="935";MAP_ENTITY_TO_CHAR["&Psi"]="936";MAP_ENTITY_TO_CHAR["&Omega"]="937";MAP_ENTITY_TO_CHAR["&alpha"]="945";MAP_ENTITY_TO_CHAR["&beta"]="946";MAP_ENTITY_TO_CHAR["&gamma"]="947";MAP_ENTITY_TO_CHAR["&delta"]="948";MAP_ENTITY_TO_CHAR["&epsilon"]="949";MAP_ENTITY_TO_CHAR["&zeta"]="950";MAP_ENTITY_TO_CHAR["&eta"]="951";MAP_ENTITY_TO_CHAR["&theta"]="952";MAP_ENTITY_TO_CHAR["&iota"]="953";MAP_ENTITY_TO_CHAR["&kappa"]="954";MAP_ENTITY_TO_CHAR["&lambda"]="955";MAP_ENTITY_TO_CHAR["&mu"]="956";MAP_ENTITY_TO_CHAR["&nu"]="957";MAP_ENTITY_TO_CHAR["&xi"]="958";MAP_ENTITY_TO_CHAR["&omicron"]="959";MAP_ENTITY_TO_CHAR["&pi"]="960";MAP_ENTITY_TO_CHAR["&rho"]="961";MAP_ENTITY_TO_CHAR["&sigmaf"]="962";MAP_ENTITY_TO_CHAR["&sigma"]="963";MAP_ENTITY_TO_CHAR["&tau"]="964";MAP_ENTITY_TO_CHAR["&upsilon"]="965";MAP_ENTITY_TO_CHAR["&phi"]="966";MAP_ENTITY_TO_CHAR["&chi"]="967";MAP_ENTITY_TO_CHAR["&psi"]="968";MAP_ENTITY_TO_CHAR["&omega"]="969";MAP_ENTITY_TO_CHAR["&thetasym"]="977";MAP_ENTITY_TO_CHAR["&upsih"]="978";MAP_ENTITY_TO_CHAR["&piv"]="982";MAP_ENTITY_TO_CHAR["&ensp"]="8194";MAP_ENTITY_TO_CHAR["&emsp"]="8195";MAP_ENTITY_TO_CHAR["&thinsp"]="8201";MAP_ENTITY_TO_CHAR["&zwnj"]="8204";MAP_ENTITY_TO_CHAR["&zwj"]="8205";MAP_ENTITY_TO_CHAR["&lrm"]="8206";MAP_ENTITY_TO_CHAR["&rlm"]="8207";MAP_ENTITY_TO_CHAR["&ndash"]="8211";MAP_ENTITY_TO_CHAR["&mdash"]="8212";MAP_ENTITY_TO_CHAR["&lsquo"]="8216";MAP_ENTITY_TO_CHAR["&rsquo"]="8217";MAP_ENTITY_TO_CHAR["&sbquo"]="8218";MAP_ENTITY_TO_CHAR["&ldquo"]="8220";MAP_ENTITY_TO_CHAR["&rdquo"]="8221";MAP_ENTITY_TO_CHAR["&bdquo"]="8222";MAP_ENTITY_TO_CHAR["&dagger"]="8224";MAP_ENTITY_TO_CHAR["&Dagger"]="8225";MAP_ENTITY_TO_CHAR["&bull"]="8226";MAP_ENTITY_TO_CHAR["&hellip"]="8230";MAP_ENTITY_TO_CHAR["&permil"]="8240";MAP_ENTITY_TO_CHAR["&prime"]="8242";MAP_ENTITY_TO_CHAR["&Prime"]="8243";MAP_ENTITY_TO_CHAR["&lsaquo"]="8249";MAP_ENTITY_TO_CHAR["&rsaquo"]="8250";MAP_ENTITY_TO_CHAR["&oline"]="8254";MAP_ENTITY_TO_CHAR["&frasl"]="8260";MAP_ENTITY_TO_CHAR["&euro"]="8364";MAP_ENTITY_TO_CHAR["&image"]="8365";MAP_ENTITY_TO_CHAR["&weierp"]="8472";MAP_ENTITY_TO_CHAR["&real"]="8476";MAP_ENTITY_TO_CHAR["&trade"]="8482";MAP_ENTITY_TO_CHAR["&alefsym"]="8501";MAP_ENTITY_TO_CHAR["&larr"]="8592";MAP_ENTITY_TO_CHAR["&uarr"]="8593";MAP_ENTITY_TO_CHAR["&rarr"]="8594";MAP_ENTITY_TO_CHAR["&darr"]="8595";MAP_ENTITY_TO_CHAR["&harr"]="8596";MAP_ENTITY_TO_CHAR["&crarr"]="8629";MAP_ENTITY_TO_CHAR["&lArr"]="8656";MAP_ENTITY_TO_CHAR["&uArr"]="8657";MAP_ENTITY_TO_CHAR["&rArr"]="8658";MAP_ENTITY_TO_CHAR["&dArr"]="8659";MAP_ENTITY_TO_CHAR["&hArr"]="8660";MAP_ENTITY_TO_CHAR["&forall"]="8704";MAP_ENTITY_TO_CHAR["&part"]="8706";MAP_ENTITY_TO_CHAR["&exist"]="8707";MAP_ENTITY_TO_CHAR["&empty"]="8709";MAP_ENTITY_TO_CHAR["&nabla"]="8711";MAP_ENTITY_TO_CHAR["&isin"]="8712";MAP_ENTITY_TO_CHAR["&notin"]="8713";MAP_ENTITY_TO_CHAR["&ni"]="8715";MAP_ENTITY_TO_CHAR["&prod"]="8719";MAP_ENTITY_TO_CHAR["&sum"]="8721";MAP_ENTITY_TO_CHAR["&minus"]="8722";MAP_ENTITY_TO_CHAR["&lowast"]="8727";MAP_ENTITY_TO_CHAR["&radic"]="8730";MAP_ENTITY_TO_CHAR["&prop"]="8733";MAP_ENTITY_TO_CHAR["&infin"]="8734";MAP_ENTITY_TO_CHAR["&ang"]="8736";MAP_ENTITY_TO_CHAR["&and"]="8743";MAP_ENTITY_TO_CHAR["&or"]="8744";MAP_ENTITY_TO_CHAR["&cap"]="8745";MAP_ENTITY_TO_CHAR["&cup"]="8746";MAP_ENTITY_TO_CHAR["&int"]="8747";MAP_ENTITY_TO_CHAR["&there4"]="8756";MAP_ENTITY_TO_CHAR["&sim"]="8764";MAP_ENTITY_TO_CHAR["&cong"]="8773";MAP_ENTITY_TO_CHAR["&asymp"]="8776";MAP_ENTITY_TO_CHAR["&ne"]="8800";MAP_ENTITY_TO_CHAR["&equiv"]="8801";MAP_ENTITY_TO_CHAR["&le"]="8804";MAP_ENTITY_TO_CHAR["&ge"]="8805";MAP_ENTITY_TO_CHAR["&sub"]="8834";MAP_ENTITY_TO_CHAR["&sup"]="8835";MAP_ENTITY_TO_CHAR["&nsub"]="8836";MAP_ENTITY_TO_CHAR["&sube"]="8838";MAP_ENTITY_TO_CHAR["&supe"]="8839";MAP_ENTITY_TO_CHAR["&oplus"]="8853";MAP_ENTITY_TO_CHAR["&otimes"]="8855";MAP_ENTITY_TO_CHAR["&perp"]="8869";MAP_ENTITY_TO_CHAR["&sdot"]="8901";MAP_ENTITY_TO_CHAR["&lceil"]="8968";MAP_ENTITY_TO_CHAR["&rceil"]="8969";MAP_ENTITY_TO_CHAR["&lfloor"]="8970";MAP_ENTITY_TO_CHAR["&rfloor"]="8971";MAP_ENTITY_TO_CHAR["&lang"]="9001";MAP_ENTITY_TO_CHAR["&rang"]="9002";MAP_ENTITY_TO_CHAR["&loz"]="9674";MAP_ENTITY_TO_CHAR["&spades"]="9824";MAP_ENTITY_TO_CHAR["&clubs"]="9827";MAP_ENTITY_TO_CHAR["&hearts"]="9829";MAP_ENTITY_TO_CHAR["&diams"]="9830";for(var entity in MAP_ENTITY_TO_CHAR){if(!(typeof MAP_ENTITY_TO_CHAR[entity]=='function')&&MAP_ENTITY_TO_CHAR.hasOwnProperty(entity)){MAP_CHAR_TO_ENTITY[MAP_ENTITY_TO_CHAR[entity]]=entity;}}
for(var c in MAP_CHAR_TO_ENTITY){if(!(typeof MAP_CHAR_TO_ENTITY[c]=='function')&&MAP_CHAR_TO_ENTITY.hasOwnProperty(c)){var ent=MAP_CHAR_TO_ENTITY[c].toLowerCase().substr(1);ENTITY_TO_CHAR_TRIE.put(ent,String.fromCharCode(c));}}})();if(Object.freeze){$.encoder=Object.freeze($.encoder);$.fn.encode=Object.freeze($.fn.encode);}else if(Object.seal){$.encoder=Object.seal($.encoder);$.fn.encode=Object.seal($.fn.encode);}else if(Object.preventExtensions){$.encoder=Object.preventExtensions($.encoder);$.fn.encode=Object.preventExtensions($.fn.encode);}})(jQuery);