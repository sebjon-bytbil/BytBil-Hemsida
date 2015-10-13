/**
 * @license
 * lodash 3.7.0 (Custom Build) lodash.com/license | Underscore.js 1.8.3 underscorejs.org/LICENSE
 * Build: `lodash compat -o ./lodash.js`
 */
;(function(){function n(n,t){if(n!==t){var r=n===n,e=t===t;if(n>t||!r||n===w&&e)return 1;if(n<t||!e||t===w&&r)return-1}return 0}function t(n,t,r){for(var e=n.length,u=r?e:-1;r?u--:++u<e;)if(t(n[u],u,n))return u;return-1}function r(n,t,r){if(t!==t)return p(n,r);r-=1;for(var e=n.length;++r<e;)if(n[r]===t)return r;return-1}function e(n){return typeof n=="function"||false}function u(n){return typeof n=="string"?n:null==n?"":n+""}function o(n){return n.charCodeAt(0)}function i(n,t){for(var r=-1,e=n.length;++r<e&&-1<t.indexOf(n.charAt(r)););
    return r}function a(n,t){for(var r=n.length;r--&&-1<t.indexOf(n.charAt(r)););return r}function f(t,r){return n(t.a,r.a)||t.b-r.b}function c(n){return Ln[n]}function l(n){return Pn[n]}function s(n){return"\\"+Mn[n]}function p(n,t,r){var e=n.length;for(t+=r?0:-1;r?t--:++t<e;){var u=n[t];if(u!==u)return t}return-1}function h(n){return!!n&&typeof n=="object"}function _(n){return 160>=n&&9<=n&&13>=n||32==n||160==n||5760==n||6158==n||8192<=n&&(8202>=n||8232==n||8233==n||8239==n||8287==n||12288==n||65279==n);

}function v(n,t){for(var r=-1,e=n.length,u=-1,o=[];++r<e;)n[r]===t&&(n[r]=P,o[++u]=r);return o}function g(n){for(var t=-1,r=n.length;++t<r&&_(n.charCodeAt(t)););return t}function y(n){for(var t=n.length;t--&&_(n.charCodeAt(t)););return t}function d(n){return Bn[n]}function m(_){function Ln(n){if(h(n)&&!(Uo(n)||n instanceof zn)){if(n instanceof Bn)return n;if(Ze.call(n,"__chain__")&&Ze.call(n,"__wrapped__"))return Lr(n)}return new Bn(n)}function Pn(){}function Bn(n,t,r){this.__wrapped__=n,this.__actions__=r||[],
    this.__chain__=!!t}function zn(n){this.__wrapped__=n,this.__actions__=null,this.__dir__=1,this.__filtered__=false,this.__iteratees__=null,this.__takeCount__=ku,this.__views__=null}function Mn(){this.__data__={}}function Dn(n){var t=n?n.length:0;for(this.data={hash:yu(null),set:new cu};t--;)this.push(n[t])}function qn(n,t){var r=n.data;return(typeof t=="string"||le(t)?r.set.has(t):r.hash[t])?0:-1}function Kn(n,t){var r=-1,e=n.length;for(t||(t=Te(e));++r<e;)t[r]=n[r];return t}function Vn(n,t){for(var r=-1,e=n.length;++r<e&&false!==t(n[r],r,n););
    return n}function Yn(n,t){for(var r=-1,e=n.length;++r<e;)if(!t(n[r],r,n))return false;return true}function Xn(n,t){for(var r=-1,e=n.length,u=-1,o=[];++r<e;){var i=n[r];t(i,r,n)&&(o[++u]=i)}return o}function Hn(n,t){for(var r=-1,e=n.length,u=Te(e);++r<e;)u[r]=t(n[r],r,n);return u}function Qn(n){for(var t=-1,r=n.length,e=Eu;++t<r;){var u=n[t];u>e&&(e=u)}return e}function nt(n,t){for(var r=-1,e=n.length;++r<e;)if(t(n[r],r,n))return true;return false}function tt(n,t){return n===w?t:n}function rt(n,t,r,e){return n!==w&&Ze.call(e,r)?n:t;

}function et(n,t,r){var e=Ko(t);iu.apply(e,Gu(t));for(var u=-1,o=e.length;++u<o;){var i=e[u],a=n[i],f=r(a,t[i],i,n,t);(f===f?f===a:a!==a)&&(a!==w||i in n)||(n[i]=f)}return n}function ut(n,t){for(var r=-1,e=n.length,u=Rr(e),o=t.length,i=Te(o);++r<o;){var a=t[r];i[r]=u?Or(a,e)?n[a]:w:n[a]}return i}function ot(n,t,r){r||(r={});for(var e=-1,u=t.length;++e<u;){var o=t[e];r[o]=n[o]}return r}function it(n,t,r){var e=typeof n;return"function"==e?t===w?n:zt(n,t,r):null==n?Ie:"object"==e?xt(n):t===w?Ce(n):At(n,t);

}function at(n,t,r,e,u,o,i){var a;if(r&&(a=u?r(n,e,u):r(n)),a!==w)return a;if(!le(n))return n;if(e=Uo(n)){if(a=br(n),!t)return Kn(n,a)}else{var f=Je.call(n),c=f==K;if(f!=Y&&f!=B&&(!c||u))return Nn[f]?Ar(n,f,t):u?n:{};if(Gn(n))return u?n:{};if(a=xr(c?{}:n),!t)return Lu(a,n)}for(o||(o=[]),i||(i=[]),u=o.length;u--;)if(o[u]==n)return i[u];return o.push(n),i.push(a),(e?Vn:vt)(n,function(e,u){a[u]=at(e,t,r,u,n,o,i)}),a}function ft(n,t,r){if(typeof n!="function")throw new ze(L);return lu(function(){n.apply(w,r);

},t)}function ct(n,t){var e=n?n.length:0,u=[];if(!e)return u;var o=-1,i=wr(),a=i==r,f=a&&200<=t.length?Ku(t):null,c=t.length;f&&(i=qn,a=false,t=f);n:for(;++o<e;)if(f=n[o],a&&f===f){for(var l=c;l--;)if(t[l]===f)continue n;u.push(f)}else 0>i(t,f,0)&&u.push(f);return u}function lt(n,t){var r=true;return Bu(n,function(n,e,u){return r=!!t(n,e,u)}),r}function st(n,t){var r=[];return Bu(n,function(n,e,u){t(n,e,u)&&r.push(n)}),r}function pt(n,t,r,e){var u;return r(n,function(n,r,o){return t(n,r,o)?(u=e?r:n,false):void 0;

}),u}function ht(n,t,r){for(var e=-1,u=n.length,o=-1,i=[];++e<u;){var a=n[e];if(h(a)&&Rr(a.length)&&(Uo(a)||ae(a))){t&&(a=ht(a,t,r));var f=-1,c=a.length;for(i.length+=c;++f<c;)i[++o]=a[f]}else r||(i[++o]=a)}return i}function _t(n,t){Mu(n,t,de)}function vt(n,t){return Mu(n,t,Ko)}function gt(n,t){return Du(n,t,Ko)}function yt(n,t){for(var r=-1,e=t.length,u=-1,o=[];++r<e;){var i=t[r];Fo(n[i])&&(o[++u]=i)}return o}function dt(n,t,r){if(null!=n){n=Nr(n),r!==w&&r in n&&(t=[r]),r=-1;for(var e=t.length;null!=n&&++r<e;)var u=n=Nr(n)[t[r]];

    return u}}function mt(n,t,r,e,u,o){if(n===t)return 0!==n||1/n==1/t;var i=typeof n,a=typeof t;if("function"!=i&&"object"!=i&&"function"!=a&&"object"!=a||null==n||null==t)n=n!==n&&t!==t;else n:{var i=mt,a=Uo(n),f=Uo(t),c=z,l=z;a||(c=Je.call(n),c==B?c=Y:c!=Y&&(a=ve(n))),f||(l=Je.call(t),l==B?l=Y:l!=Y&&ve(t));var s=c==Y&&!Gn(n),f=l==Y&&!Gn(t),l=c==l;if(!l||a||s){if(!e&&(c=s&&Ze.call(n,"__wrapped__"),f=f&&Ze.call(t,"__wrapped__"),c||f)){n=i(c?n.value():n,f?t.value():t,r,e,u,o);break n}if(l){for(u||(u=[]),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   o||(o=[]),c=u.length;c--;)if(u[c]==n){n=o[c]==t;break n}u.push(n),o.push(t),n=(a?vr:yr)(n,t,i,r,e,u,o),u.pop(),o.pop()}else n=false}else n=gr(n,t,c)}return n}function wt(n,t,r,e,u){for(var o=-1,i=t.length,a=!u;++o<i;)if(a&&e[o]?r[o]!==n[t[o]]:!(t[o]in n))return false;for(o=-1;++o<i;){var f=t[o],c=n[f],l=r[o];if(a&&e[o]?f=c!==w||f in n:(f=u?u(c,l,f):w,f===w&&(f=mt(l,c,u,true))),!f)return false}return true}function bt(n,t){var r=-1,e=Zu(n),u=Rr(e)?Te(e):[];return Bu(n,function(n,e,o){u[++r]=t(n,e,o)}),u}function xt(n){
    var t=Ko(n),r=t.length;if(!r)return ke(true);if(1==r){var e=t[0],u=n[e];if(Sr(u))return function(n){return null==n?false:(n=Nr(n),n[e]===u&&(u!==w||e in n))}}for(var o=Te(r),i=Te(r);r--;)u=n[t[r]],o[r]=u,i[r]=Sr(u);return function(n){return null!=n&&wt(Nr(n),t,o,i)}}function At(n,t){var r=Uo(n),e=kr(n)&&Sr(t),u=n+"";return n=$r(n),function(o){if(null==o)return false;var i=u;if(o=Nr(o),!(!r&&e||i in o)){if(o=1==n.length?o:dt(o,St(n,0,-1)),null==o)return false;i=Dr(n),o=Nr(o)}return o[i]===t?t!==w||i in o:mt(t,o[i],null,true);

}}function jt(n,t,r,e,u){if(!le(n))return n;var o=Rr(t.length)&&(Uo(t)||ve(t));if(!o){var i=Ko(t);iu.apply(i,Gu(t))}return Vn(i||t,function(a,f){if(i&&(f=a,a=t[f]),h(a)){e||(e=[]),u||(u=[]);n:{for(var c=f,l=e,s=u,p=l.length,_=t[c];p--;)if(l[p]==_){n[c]=s[p];break n}var p=n[c],v=r?r(p,_,c,n,t):w,g=v===w;g&&(v=_,Rr(_.length)&&(Uo(_)||ve(_))?v=Uo(p)?p:Zu(p)?Kn(p):[]:No(_)||ae(_)?v=ae(p)?ge(p):No(p)?p:{}:g=false),l.push(_),s.push(v),g?n[c]=jt(v,_,r,l,s):(v===v?v!==p:p===p)&&(n[c]=v)}}else c=n[f],l=r?r(c,a,f,n,t):w,
(s=l===w)&&(l=a),!o&&l===w||!s&&(l===l?l===c:c!==c)||(n[f]=l)}),n}function Ot(n){return function(t){return null==t?w:Nr(t)[n]}}function Et(n){var t=n+"";return n=$r(n),function(r){return dt(r,n,t)}}function kt(n,t){for(var r=t.length;r--;){var e=parseFloat(t[r]);if(e!=u&&Or(e)){var u=e;su.call(n,e,1)}}}function It(n,t){return n+eu(Ou()*(t-n+1))}function Rt(n,t,r,e,u){return u(n,function(n,u,o){r=e?(e=false,n):t(r,n,u,o)}),r}function St(n,t,r){var e=-1,u=n.length;for(t=null==t?0:+t||0,0>t&&(t=-t>u?0:u+t),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           r=r===w||r>u?u:+r||0,0>r&&(r+=u),u=t>r?0:r-t>>>0,t>>>=0,r=Te(u);++e<u;)r[e]=n[e+t];return r}function Ct(n,t){var r;return Bu(n,function(n,e,u){return r=t(n,e,u),!r}),!!r}function Tt(n,t){var r=n.length;for(n.sort(t);r--;)n[r]=n[r].c;return n}function Ut(t,r,e){var u=mr(),o=-1;return r=Hn(r,function(n){return u(n)}),t=bt(t,function(n){return{a:Hn(r,function(t){return t(n)}),b:++o,c:n}}),Tt(t,function(t,r){var u;n:{u=-1;for(var o=t.a,i=r.a,a=o.length,f=e.length;++u<a;){var c=n(o[u],i[u]);if(c){u=u<f?c*(e[u]?1:-1):c;

    break n}}u=t.b-r.b}return u})}function Wt(n,t){var r=0;return Bu(n,function(n,e,u){r+=+t(n,e,u)||0}),r}function Ft(n,t){var e=-1,u=wr(),o=n.length,i=u==r,a=i&&200<=o,f=a?Ku():null,c=[];f?(u=qn,i=false):(a=false,f=t?[]:c);n:for(;++e<o;){var l=n[e],s=t?t(l,e,n):l;if(i&&l===l){for(var p=f.length;p--;)if(f[p]===s)continue n;t&&f.push(s),c.push(l)}else 0>u(f,s,0)&&((t||a)&&f.push(s),c.push(l))}return c}function Nt(n,t){for(var r=-1,e=t.length,u=Te(e);++r<e;)u[r]=n[t[r]];return u}function $t(n,t,r,e){for(var u=n.length,o=e?u:-1;(e?o--:++o<u)&&t(n[o],o,n););
    return r?St(n,e?0:o,e?o+1:u):St(n,e?o+1:0,e?u:o)}function Lt(n,t){var r=n;r instanceof zn&&(r=r.value());for(var e=-1,u=t.length;++e<u;){var r=[r],o=t[e];iu.apply(r,o.args),r=o.func.apply(o.thisArg,r)}return r}function Pt(n,t,r){var e=0,u=n?n.length:e;if(typeof t=="number"&&t===t&&u<=Su){for(;e<u;){var o=e+u>>>1,i=n[o];(r?i<=t:i<t)?e=o+1:u=o}return u}return Bt(n,t,Ie,r)}function Bt(n,t,r,e){t=r(t);for(var u=0,o=n?n.length:0,i=t!==t,a=t===w;u<o;){var f=eu((u+o)/2),c=r(n[f]),l=c===c;(i?l||e:a?l&&(e||c!==w):e?c<=t:c<t)?u=f+1:o=f;

}return bu(o,Ru)}function zt(n,t,r){if(typeof n!="function")return Ie;if(t===w)return n;switch(r){case 1:return function(r){return n.call(t,r)};case 3:return function(r,e,u){return n.call(t,r,e,u)};case 4:return function(r,e,u,o){return n.call(t,r,e,u,o)};case 5:return function(r,e,u,o,i){return n.call(t,r,e,u,o,i)}}return function(){return n.apply(t,arguments)}}function Mt(n){return nu.call(n,0)}function Dt(n,t,r){for(var e=r.length,u=-1,o=wu(n.length-e,0),i=-1,a=t.length,f=Te(o+a);++i<a;)f[i]=t[i];

    for(;++u<e;)f[r[u]]=n[u];for(;o--;)f[i++]=n[u++];return f}function qt(n,t,r){for(var e=-1,u=r.length,o=-1,i=wu(n.length-u,0),a=-1,f=t.length,c=Te(i+f);++o<i;)c[o]=n[o];for(i=o;++a<f;)c[i+a]=t[a];for(;++e<u;)c[i+r[e]]=n[o++];return c}function Kt(n,t){return function(r,e,u){var o=t?t():{};if(e=mr(e,u,3),Uo(r)){u=-1;for(var i=r.length;++u<i;){var a=r[u];n(o,a,e(a,u,r),r)}}else Bu(r,function(t,r,u){n(o,t,e(t,r,u),u)});return o}}function Vt(n){return ie(function(t,r){var e=-1,u=null==t?0:r.length,o=2<u&&r[u-2],i=2<u&&r[2],a=1<u&&r[u-1];

    for(typeof o=="function"?(o=zt(o,a,5),u-=2):(o=typeof a=="function"?a:null,u-=o?1:0),i&&Er(r[0],r[1],i)&&(o=3>u?null:o,u=1);++e<u;)(i=r[e])&&n(t,i,o);return t})}function Yt(n,t){return function(r,e){var u=r?Zu(r):0;if(!Rr(u))return n(r,e);for(var o=t?u:-1,i=Nr(r);(t?o--:++o<u)&&false!==e(i[o],o,i););return r}}function Zt(n){return function(t,r,e){var u=Nr(t);e=e(t);for(var o=e.length,i=n?o:-1;n?i--:++i<o;){var a=e[i];if(false===r(u[a],a,u))break}return t}}function Gt(n,t){function r(){return(this&&this!==Zn&&this instanceof r?e:n).apply(t,arguments);

}var e=Xt(n);return r}function Jt(n){return function(t){var r=-1;t=Oe(we(t));for(var e=t.length,u="";++r<e;)u=n(u,t[r],r);return u}}function Xt(n){return function(){var t=Pu(n.prototype),r=n.apply(t,arguments);return le(r)?r:t}}function Ht(n){function t(r,e,u){return u&&Er(r,e,u)&&(e=null),r=_r(r,n,null,null,null,null,null,e),r.placeholder=t.placeholder,r}return t}function Qt(n,t){return function(r,e,u){u&&Er(r,e,u)&&(e=null);var i=mr(),a=null==e;if(i===it&&a||(a=false,e=i(e,u,3)),a){if(e=Uo(r),e||!_e(r))return n(e?r:Fr(r));

    e=o}return dr(r,e,t)}}function nr(n,r){return function(e,u,o){return u=mr(u,o,3),Uo(e)?(u=t(e,u,r),-1<u?e[u]:w):pt(e,u,n)}}function tr(n){return function(r,e,u){return r&&r.length?(e=mr(e,u,3),t(r,e,n)):-1}}function rr(n){return function(t,r,e){return r=mr(r,e,3),pt(t,r,n,true)}}function er(n){return function(){var t=arguments.length;if(!t)return function(){return arguments[0]};for(var r,e=n?t:-1,u=0,o=Te(t);n?e--:++e<t;){var i=o[u++]=arguments[e];if(typeof i!="function")throw new ze(L);var a=r?"":Yu(i);

    r="wrapper"==a?new Bn([]):r}for(e=r?-1:t;++e<t;)i=o[e],a=Yu(i),r=(u="wrapper"==a?Vu(i):null)&&Ir(u[0])?r[Yu(u[0])].apply(r,u[3]):1==i.length&&Ir(i)?r[a]():r.thru(i);return function(){var n=arguments;if(r&&1==n.length&&Uo(n[0]))return r.plant(n[0]).value();for(var e=0,n=o[e].apply(this,n);++e<t;)n=o[e].call(this,n);return n}}}function ur(n,t){return function(r,e,u){return typeof e=="function"&&u===w&&Uo(r)?n(r,e):t(r,zt(e,u,3))}}function or(n){return function(t,r,e){return(typeof r!="function"||e!==w)&&(r=zt(r,e,3)),
    n(t,r,de)}}function ir(n){return function(t,r,e){return(typeof r!="function"||e!==w)&&(r=zt(r,e,3)),n(t,r)}}function ar(n){return function(t,r,e){return(t=u(t))&&(n?t:"")+sr(t,r,e)+(n?"":t)}}function fr(n){var t=ie(function(r,e){var u=v(e,t.placeholder);return _r(r,n,null,e,u)});return t}function cr(n,t){return function(r,e,u,o){var i=3>arguments.length;return typeof e=="function"&&o===w&&Uo(r)?n(r,e,u,i):Rt(r,mr(e,o,4),u,i,t)}}function lr(n,t,r,e,u,o,i,a,f,c){function l(){for(var b=arguments.length,j=b,O=Te(b);j--;)O[j]=arguments[j];

    if(e&&(O=Dt(O,e,u)),o&&(O=qt(O,o,i)),_||y){var j=l.placeholder,E=v(O,j),b=b-E.length;if(b<c){var R=a?Kn(a):null,b=wu(c-b,0),S=_?E:null,E=_?null:E,C=_?O:null,O=_?null:O;return t|=_?k:I,t&=~(_?I:k),g||(t&=~(x|A)),O=[n,t,r,C,S,O,E,R,f,b],R=lr.apply(w,O),Ir(n)&&Ju(R,O),R.placeholder=j,R}}if(j=p?r:this,h&&(n=j[m]),a)for(R=O.length,b=bu(a.length,R),S=Kn(O);b--;)E=a[b],O[b]=Or(E,R)?S[E]:w;return s&&f<O.length&&(O.length=f),(this&&this!==Zn&&this instanceof l?d||Xt(n):n).apply(j,O)}var s=t&R,p=t&x,h=t&A,_=t&O,g=t&j,y=t&E,d=!h&&Xt(n),m=n;

    return l}function sr(n,t,r){return n=n.length,t=+t,n<t&&du(t)?(t-=n,r=null==r?" ":r+"",Ae(r,tu(t/r.length)).slice(0,t)):""}function pr(n,t,r,e){function u(){for(var t=-1,a=arguments.length,f=-1,c=e.length,l=Te(a+c);++f<c;)l[f]=e[f];for(;a--;)l[f++]=arguments[++t];return(this&&this!==Zn&&this instanceof u?i:n).apply(o?r:this,l)}var o=t&x,i=Xt(n);return u}function hr(n){return function(t,r,e,u){var o=mr(e);return o===it&&null==e?Pt(t,r,n):Bt(t,r,o(e,u,1),n)}}function _r(n,t,r,e,u,o,i,a){var f=t&A;if(!f&&typeof n!="function")throw new ze(L);

    var c=e?e.length:0;if(c||(t&=~(k|I),e=u=null),c-=u?u.length:0,t&I){var l=e,s=u;e=u=null}var p=f?null:Vu(n);return r=[n,t,r,e,u,l,s,o,i,a],p&&(e=r[1],t=p[1],a=e|t,u=t==R&&e==O||t==R&&e==S&&r[7].length<=p[8]||t==(R|S)&&e==O,(a<R||u)&&(t&x&&(r[2]=p[2],a|=e&x?0:j),(e=p[3])&&(u=r[3],r[3]=u?Dt(u,e,p[4]):Kn(e),r[4]=u?v(r[3],P):Kn(p[4])),(e=p[5])&&(u=r[5],r[5]=u?qt(u,e,p[6]):Kn(e),r[6]=u?v(r[5],P):Kn(p[6])),(e=p[7])&&(r[7]=Kn(e)),t&R&&(r[8]=null==r[8]?p[8]:bu(r[8],p[8])),null==r[9]&&(r[9]=p[9]),r[0]=p[0],
        r[1]=a),t=r[1],a=r[9]),r[9]=null==a?f?0:n.length:wu(a-c,0)||0,(p?qu:Ju)(t==x?Gt(r[0],r[2]):t!=k&&t!=(x|k)||r[4].length?lr.apply(w,r):pr.apply(w,r),r)}function vr(n,t,r,e,u,o,i){var a=-1,f=n.length,c=t.length,l=true;if(f!=c&&(!u||c<=f))return false;for(;l&&++a<f;){var s=n[a],p=t[a],l=w;if(e&&(l=u?e(p,s,a):e(s,p,a)),l===w)if(u)for(var h=c;h--&&(p=t[h],!(l=s&&s===p||r(s,p,e,u,o,i))););else l=s&&s===p||r(s,p,e,u,o,i)}return!!l}function gr(n,t,r){switch(r){case M:case D:return+n==+t;case q:return n.name==t.name&&n.message==t.message;

    case V:return n!=+n?t!=+t:0==n?1/n==1/t:n==+t;case Z:case G:return n==t+""}return false}function yr(n,t,r,e,u,o,i){var a=Ko(n),f=a.length,c=Ko(t).length;if(f!=c&&!u)return false;for(var c=u,l=-1;++l<f;){var s=a[l],p=u?s in t:Ze.call(t,s);if(p){var h=n[s],_=t[s],p=w;e&&(p=u?e(_,h,s):e(h,_,s)),p===w&&(p=h&&h===_||r(h,_,e,u,o,i))}if(!p)return false;c||(c="constructor"==s)}return c||(r=n.constructor,e=t.constructor,!(r!=e&&"constructor"in n&&"constructor"in t)||typeof r=="function"&&r instanceof r&&typeof e=="function"&&e instanceof e)?true:false;

}function dr(n,t,r){var e=r?ku:Eu,u=e,o=u;return Bu(n,function(n,i,a){i=t(n,i,a),((r?i<u:i>u)||i===e&&i===o)&&(u=i,o=n)}),o}function mr(n,t,r){var e=Ln.callback||Ee,e=e===Ee?it:e;return r?e(n,t,r):e}function wr(n,t,e){var u=Ln.indexOf||Mr,u=u===Mr?r:u;return n?u(n,t,e):u}function br(n){var t=n.length,r=new n.constructor(t);return t&&"string"==typeof n[0]&&Ze.call(n,"index")&&(r.index=n.index,r.input=n.input),r}function xr(n){return n=n.constructor,typeof n=="function"&&n instanceof n||(n=Le),new n;

}function Ar(n,t,r){var e=n.constructor;switch(t){case J:return Mt(n);case M:case D:return new e(+n);case X:case H:case Q:case nn:case tn:case rn:case en:case un:case on:return e instanceof e&&(e=Fu[t]),t=n.buffer,new e(r?Mt(t):t,n.byteOffset,n.length);case V:case G:return new e(n);case Z:var u=new e(n.source,On.exec(n));u.lastIndex=n.lastIndex}return u}function jr(n,t,r){return null==n||kr(t,n)||(t=$r(t),n=1==t.length?n:dt(n,St(t,0,-1)),t=Dr(t)),t=null==n?n:n[t],null==t?w:t.apply(n,r)}function Or(n,t){
    return n=+n,t=null==t?Tu:t,-1<n&&0==n%1&&n<t}function Er(n,t,r){if(!le(r))return false;var e=typeof t;return"number"==e?(e=Zu(r),e=Rr(e)&&Or(t,e)):e="string"==e&&t in r,e?(t=r[t],n===n?n===t:t!==t):false}function kr(n,t){var r=typeof n;return"string"==r&&dn.test(n)||"number"==r?true:Uo(n)?false:!yn.test(n)||null!=t&&n in Nr(t)}function Ir(n){var t=Yu(n);return!!t&&n===Ln[t]&&t in zn.prototype}function Rr(n){return typeof n=="number"&&-1<n&&0==n%1&&n<=Tu}function Sr(n){return n===n&&(0===n?0<1/n:!le(n))}function Cr(n,t){
    n=Nr(n);for(var r=-1,e=t.length,u={};++r<e;){var o=t[r];o in n&&(u[o]=n[o])}return u}function Tr(n,t){var r={};return _t(n,function(n,e,u){t(n,e,u)&&(r[e]=n)}),r}function Ur(n){var t,r=Ln.support;if(!h(n)||Je.call(n)!=Y||Gn(n)||!(Ze.call(n,"constructor")||(t=n.constructor,typeof t!="function"||t instanceof t))||!r.argsTag&&ae(n))return false;var e;return r.ownLast?(_t(n,function(n,t,r){return e=Ze.call(r,t),false}),false!==e):(_t(n,function(n,t){e=t}),e===w||Ze.call(n,e))}function Wr(n){for(var t=de(n),r=t.length,e=r&&n.length,u=Ln.support,u=e&&Rr(e)&&(Uo(n)||u.nonEnumStrings&&_e(n)||u.nonEnumArgs&&ae(n)),o=-1,i=[];++o<r;){
    var a=t[o];(u&&Or(a,e)||Ze.call(n,a))&&i.push(a)}return i}function Fr(n){return null==n?[]:Rr(Zu(n))?Ln.support.unindexedChars&&_e(n)?n.split(""):le(n)?n:Le(n):me(n)}function Nr(n){if(Ln.support.unindexedChars&&_e(n)){for(var t=-1,r=n.length,e=Le(n);++t<r;)e[t]=n.charAt(t);return e}return le(n)?n:Le(n)}function $r(n){if(Uo(n))return n;var t=[];return u(n).replace(mn,function(n,r,e,u){t.push(e?u.replace(An,"$1"):r||n)}),t}function Lr(n){return n instanceof zn?n.clone():new Bn(n.__wrapped__,n.__chain__,Kn(n.__actions__));

}function Pr(n,t,r){return n&&n.length?((r?Er(n,t,r):null==t)&&(t=1),St(n,0>t?0:t)):[]}function Br(n,t,r){var e=n?n.length:0;return e?((r?Er(n,t,r):null==t)&&(t=1),t=e-(+t||0),St(n,0,0>t?0:t)):[]}function zr(n){return n?n[0]:w}function Mr(n,t,e){var u=n?n.length:0;if(!u)return-1;if(typeof e=="number")e=0>e?wu(u+e,0):e;else if(e)return e=Pt(n,t),n=n[e],(t===t?t===n:n!==n)?e:-1;return r(n,t,e||0)}function Dr(n){var t=n?n.length:0;return t?n[t-1]:w}function qr(n){return Pr(n,1)}function Kr(n,t,e,u){
    if(!n||!n.length)return[];null!=t&&typeof t!="boolean"&&(u=e,e=Er(n,t,u)?null:t,t=false);var o=mr();if((o!==it||null!=e)&&(e=o(e,u,3)),t&&wr()==r){t=e;var i;e=-1,u=n.length;for(var o=-1,a=[];++e<u;){var f=n[e],c=t?t(f,e,n):f;e&&i===c||(i=c,a[++o]=f)}n=a}else n=Ft(n,e);return n}function Vr(n){for(var t=-1,r=(n&&n.length&&Qn(Hn(n,Zu)))>>>0,e=Te(r);++t<r;)e[t]=Hn(n,Ot(t));return e}function Yr(n,t){var r=-1,e=n?n.length:0,u={};for(!e||t||Uo(n[0])||(t=[]);++r<e;){var o=n[r];t?u[o]=t[r]:o&&(u[o[0]]=o[1])}
    return u}function Zr(n){return n=Ln(n),n.__chain__=true,n}function Gr(n,t,r){return t.call(r,n)}function Jr(n,t,r){var e=Uo(n)?Yn:lt;return r&&Er(n,t,r)&&(t=null),(typeof t!="function"||r!==w)&&(t=mr(t,r,3)),e(n,t)}function Xr(n,t,r){var e=Uo(n)?Xn:st;return t=mr(t,r,3),e(n,t)}function Hr(n,t,r,e){var u=n?Zu(n):0;return Rr(u)||(n=me(n),u=n.length),u?(r=typeof r!="number"||e&&Er(t,r,e)?0:0>r?wu(u+r,0):r||0,typeof n=="string"||!Uo(n)&&_e(n)?r<u&&-1<n.indexOf(t,r):-1<wr(n,t,r)):false}function Qr(n,t,r){var e=Uo(n)?Hn:bt;

    return t=mr(t,r,3),e(n,t)}function ne(n,t,r){return(r?Er(n,t,r):null==t)?(n=Fr(n),t=n.length,0<t?n[It(0,t-1)]:w):(n=te(n),n.length=bu(0>t?0:+t||0,n.length),n)}function te(n){n=Fr(n);for(var t=-1,r=n.length,e=Te(r);++t<r;){var u=It(0,t);t!=u&&(e[t]=e[u]),e[u]=n[t]}return e}function re(n,t,r){var e=Uo(n)?nt:Ct;return r&&Er(n,t,r)&&(t=null),(typeof t!="function"||r!==w)&&(t=mr(t,r,3)),e(n,t)}function ee(n,t){var r;if(typeof t!="function"){if(typeof n!="function")throw new ze(L);var e=n;n=t,t=e}return function(){
    return 0<--n&&(r=t.apply(this,arguments)),1>=n&&(t=null),r}}function ue(n,t,r){function e(){var r=t-(wo()-c);0>=r||r>t?(a&&ru(a),r=p,a=s=p=w,r&&(h=wo(),f=n.apply(l,i),s||a||(i=l=null))):s=lu(e,r)}function u(){s&&ru(s),a=s=p=w,(v||_!==t)&&(h=wo(),f=n.apply(l,i),s||a||(i=l=null))}function o(){if(i=arguments,c=wo(),l=this,p=v&&(s||!g),false===_)var r=g&&!s;else{a||g||(h=c);var o=_-(c-h),y=0>=o||o>_;y?(a&&(a=ru(a)),h=c,f=n.apply(l,i)):a||(a=lu(u,o))}return y&&s?s=ru(s):s||t===_||(s=lu(e,t)),r&&(y=true,f=n.apply(l,i)),
!y||s||a||(i=l=null),f}var i,a,f,c,l,s,p,h=0,_=false,v=true;if(typeof n!="function")throw new ze(L);if(t=0>t?0:+t||0,true===r)var g=true,v=false;else le(r)&&(g=r.leading,_="maxWait"in r&&wu(+r.maxWait||0,t),v="trailing"in r?r.trailing:v);return o.cancel=function(){s&&ru(s),a&&ru(a),a=s=p=w},o}function oe(n,t){function r(){var e=arguments,u=r.cache,o=t?t.apply(this,e):e[0];return u.has(o)?u.get(o):(e=n.apply(this,e),u.set(o,e),e)}if(typeof n!="function"||t&&typeof t!="function")throw new ze(L);return r.cache=new oe.Cache,
    r}function ie(n,t){if(typeof n!="function")throw new ze(L);return t=wu(t===w?n.length-1:+t||0,0),function(){for(var r=arguments,e=-1,u=wu(r.length-t,0),o=Te(u);++e<u;)o[e]=r[t+e];switch(t){case 0:return n.call(this,o);case 1:return n.call(this,r[0],o);case 2:return n.call(this,r[0],r[1],o)}for(u=Te(t+1),e=-1;++e<t;)u[e]=r[e];return u[t]=o,n.apply(this,u)}}function ae(n){return Rr(h(n)?n.length:w)&&Je.call(n)==B}function fe(n){return!!n&&1===n.nodeType&&h(n)&&(Ln.support.nodeTag?-1<Je.call(n).indexOf("Element"):Gn(n));

}function ce(n){return h(n)&&typeof n.message=="string"&&Je.call(n)==q}function le(n){var t=typeof n;return"function"==t||!!n&&"object"==t}function se(n){return null==n?false:Je.call(n)==K?He.test(Ye.call(n)):h(n)&&(Gn(n)?He:kn).test(n)}function pe(n){return typeof n=="number"||h(n)&&Je.call(n)==V}function he(n){return le(n)&&Je.call(n)==Z}function _e(n){return typeof n=="string"||h(n)&&Je.call(n)==G}function ve(n){return h(n)&&Rr(n.length)&&!!Fn[Je.call(n)]}function ge(n){return ot(n,de(n))}function ye(n){
    return yt(n,de(n))}function de(n){if(null==n)return[];le(n)||(n=Le(n));for(var t=n.length,r=Ln.support,t=t&&Rr(t)&&(Uo(n)||r.nonEnumStrings&&_e(n)||r.nonEnumArgs&&ae(n))&&t||0,e=n.constructor,u=-1,e=Fo(e)&&e.prototype||qe,o=e===n,i=Te(t),a=0<t,f=r.enumErrorProps&&(n===De||n instanceof We),c=r.enumPrototypes&&Fo(n);++u<t;)i[u]=u+"";for(var l in n)c&&"prototype"==l||f&&("message"==l||"name"==l)||a&&Or(l,t)||"constructor"==l&&(o||!Ze.call(n,l))||i.push(l);if(r.nonEnumShadows&&n!==qe)for(t=n===Ke?G:n===De?q:Je.call(n),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 r=Nu[t]||Nu[Y],t==Y&&(e=qe),t=Wn.length;t--;)l=Wn[t],u=r[l],o&&u||(u?!Ze.call(n,l):n[l]===e[l])||i.push(l);return i}function me(n){return Nt(n,Ko(n))}function we(n){return(n=u(n))&&n.replace(In,c).replace(xn,"")}function be(n){return(n=u(n))&&bn.test(n)?n.replace(wn,"\\$&"):n}function xe(n,t,r){return r&&Er(n,t,r)&&(t=0),ju(n,t)}function Ae(n,t){var r="";if(n=u(n),t=+t,1>t||!n||!du(t))return r;do t%2&&(r+=n),t=eu(t/2),n+=n;while(t);return r}function je(n,t,r){var e=n;return(n=u(n))?(r?Er(e,t,r):null==t)?n.slice(g(n),y(n)+1):(t+="",
    n.slice(i(n,t),a(n,t)+1)):n}function Oe(n,t,r){return r&&Er(n,t,r)&&(t=null),n=u(n),n.match(t||Cn)||[]}function Ee(n,t,r){return r&&Er(n,t,r)&&(t=null),it(n,t)}function ke(n){return function(){return n}}function Ie(n){return n}function Re(n,t,r){if(null==r){var e=le(t),u=e&&Ko(t);((u=u&&u.length&&yt(t,u))?u.length:e)||(u=false,r=t,t=n,n=this)}u||(u=yt(t,Ko(t)));var o=true,e=-1,i=Fo(n),a=u.length;false===r?o=false:le(r)&&"chain"in r&&(o=r.chain);for(;++e<a;){r=u[e];var f=t[r];n[r]=f,i&&(n.prototype[r]=function(t){
    return function(){var r=this.__chain__;if(o||r){var e=n(this.__wrapped__);return(e.__actions__=Kn(this.__actions__)).push({func:t,args:arguments,thisArg:n}),e.__chain__=r,e}return r=[this.value()],iu.apply(r,arguments),t.apply(n,r)}}(f))}return n}function Se(){}function Ce(n){return kr(n)?Ot(n):Et(n)}_=_?Jn.defaults(Zn.Object(),_,Jn.pick(Zn,Un)):Zn;var Te=_.Array,Ue=_.Date,We=_.Error,Fe=_.Function,Ne=_.Math,$e=_.Number,Le=_.Object,Pe=_.RegExp,Be=_.String,ze=_.TypeError,Me=Te.prototype,De=We.prototype,qe=Le.prototype,Ke=Be.prototype,Ve=(Ve=_.window)&&Ve.document,Ye=Fe.prototype.toString,Ze=qe.hasOwnProperty,Ge=0,Je=qe.toString,Xe=_._,He=Pe("^"+be(Je).replace(/toString|(function).*?(?=\\\()| for .+?(?=\\\])/g,"$1.*?")+"$"),Qe=se(Qe=_.ArrayBuffer)&&Qe,nu=se(nu=Qe&&new Qe(0).slice)&&nu,tu=Ne.ceil,ru=_.clearTimeout,eu=Ne.floor,uu=se(uu=Le.getOwnPropertySymbols)&&uu,ou=se(ou=Le.getPrototypeOf)&&ou,iu=Me.push,au=se(Le.preventExtensions=Le.preventExtensions)&&au,fu=qe.propertyIsEnumerable,cu=se(cu=_.Set)&&cu,lu=_.setTimeout,su=Me.splice,pu=se(pu=_.Uint8Array)&&pu,hu=se(hu=_.WeakMap)&&hu,_u=function(){
    try{var n=se(n=_.Float64Array)&&n,t=new n(new Qe(10),0,1)&&n}catch(r){}return t}(),vu=function(){var n={1:0},t=au&&se(t=Le.assign)&&t;try{t(au(n),"xo")}catch(r){}return!n[1]&&t}(),gu=se(gu=Te.isArray)&&gu,yu=se(yu=Le.create)&&yu,du=_.isFinite,mu=se(mu=Le.keys)&&mu,wu=Ne.max,bu=Ne.min,xu=se(xu=Ue.now)&&xu,Au=se(Au=$e.isFinite)&&Au,ju=_.parseInt,Ou=Ne.random,Eu=$e.NEGATIVE_INFINITY,ku=$e.POSITIVE_INFINITY,Iu=Ne.pow(2,32)-1,Ru=Iu-1,Su=Iu>>>1,Cu=_u?_u.BYTES_PER_ELEMENT:0,Tu=Ne.pow(2,53)-1,Uu=hu&&new hu,Wu={},Fu={};

    Fu[X]=_.Float32Array,Fu[H]=_.Float64Array,Fu[Q]=_.Int8Array,Fu[nn]=_.Int16Array,Fu[tn]=_.Int32Array,Fu[rn]=_.Uint8Array,Fu[en]=_.Uint8ClampedArray,Fu[un]=_.Uint16Array,Fu[on]=_.Uint32Array;var Nu={};Nu[z]=Nu[D]=Nu[V]={constructor:true,toLocaleString:true,toString:true,valueOf:true},Nu[M]=Nu[G]={constructor:true,toString:true,valueOf:true},Nu[q]=Nu[K]=Nu[Z]={constructor:true,toString:true},Nu[Y]={constructor:true},Vn(Wn,function(n){for(var t in Nu)if(Ze.call(Nu,t)){var r=Nu[t];r[n]=Ze.call(r,n)}});var $u=Ln.support={};

    !function(n){function t(){this.x=n}var r={0:n,length:n},e=[];t.prototype={valueOf:n,y:n};for(var u in new t)e.push(u);$u.argsTag=Je.call(arguments)==B,$u.enumErrorProps=fu.call(De,"message")||fu.call(De,"name"),$u.enumPrototypes=fu.call(t,"prototype"),$u.funcDecomp=/\bthis\b/.test(function(){return this}),$u.funcNames=typeof Fe.name=="string",$u.nodeTag=Je.call(Ve)!=Y,$u.nonEnumStrings=!fu.call("x",0),$u.nonEnumShadows=!/valueOf/.test(e),$u.ownLast="x"!=e[0],$u.spliceObjects=(su.call(r,0,1),!r[0]),
        $u.unindexedChars="xx"!="x"[0]+Le("x")[0];try{$u.dom=11===Ve.createDocumentFragment().nodeType}catch(o){$u.dom=false}try{$u.nonEnumArgs=!fu.call(arguments,1)}catch(i){$u.nonEnumArgs=true}}(1,0),Ln.templateSettings={escape:_n,evaluate:vn,interpolate:gn,variable:"",imports:{_:Ln}};var Lu=vu||function(n,t){return null==t?n:ot(t,Gu(t),ot(t,Ko(t),n))},Pu=function(){function n(){}return function(t){if(le(t)){n.prototype=t;var r=new n;n.prototype=null}return r||_.Object()}}(),Bu=Yt(vt),zu=Yt(gt,true),Mu=Zt(),Du=Zt(true),qu=Uu?function(n,t){
        return Uu.set(n,t),n}:Ie;nu||(Mt=Qe&&pu?function(n){var t=n.byteLength,r=_u?eu(t/Cu):0,e=r*Cu,u=new Qe(t);if(r){var o=new _u(u,0,r);o.set(new _u(n,0,r))}return t!=e&&(o=new pu(u,e),o.set(new pu(n,e))),u}:ke(null));var Ku=yu&&cu?function(n){return new Dn(n)}:ke(null),Vu=Uu?function(n){return Uu.get(n)}:Se,Yu=function(){return $u.funcNames?"constant"==ke.name?Ot("name"):function(n){for(var t=n.name,r=Wu[t],e=r?r.length:0;e--;){var u=r[e],o=u.func;if(null==o||o==n)return u.name}return t}:ke("")}(),Zu=Ot("length"),Gu=uu?function(n){
        return uu(Nr(n))}:ke([]),Ju=function(){var n=0,t=0;return function(r,e){var u=wo(),o=W-(u-t);if(t=u,0<o){if(++n>=U)return r}else n=0;return qu(r,e)}}(),Xu=ie(function(n,t){return Uo(n)||ae(n)?ct(n,ht(t,false,true)):[]}),Hu=tr(),Qu=tr(true),no=ie(function(t,r){t||(t=[]),r=ht(r);var e=ut(t,r);return kt(t,r.sort(n)),e}),to=hr(),ro=hr(true),eo=ie(function(n){return Ft(ht(n,false,true))}),uo=ie(function(n,t){return Uo(n)||ae(n)?ct(n,t):[]}),oo=ie(Vr),io=ie(function(n,t){var r=n?Zu(n):0;return Rr(r)&&(n=Fr(n)),ut(n,ht(t));

    }),ao=Kt(function(n,t,r){Ze.call(n,r)?++n[r]:n[r]=1}),fo=nr(Bu),co=nr(zu,true),lo=ur(Vn,Bu),so=ur(function(n,t){for(var r=n.length;r--&&false!==t(n[r],r,n););return n},zu),po=Kt(function(n,t,r){Ze.call(n,r)?n[r].push(t):n[r]=[t]}),ho=Kt(function(n,t,r){n[r]=t}),_o=ie(function(n,t,r){var e=-1,u=typeof t=="function",o=kr(t),i=Zu(n),a=Rr(i)?Te(i):[];return Bu(n,function(n){var i=u?t:o&&null!=n&&n[t];a[++e]=i?i.apply(n,r):jr(n,t,r)}),a}),vo=Kt(function(n,t,r){n[r?0:1].push(t)},function(){return[[],[]]}),go=cr(function(n,t,r,e){
        var u=-1,o=n.length;for(e&&o&&(r=n[++u]);++u<o;)r=t(r,n[u],u,n);return r},Bu),yo=cr(function(n,t,r,e){var u=n.length;for(e&&u&&(r=n[--u]);u--;)r=t(r,n[u],u,n);return r},zu),mo=ie(function(n,t){if(null==n)return[];var r=t[2];return r&&Er(t[0],t[1],r)&&(t.length=1),Ut(n,ht(t),[])}),wo=xu||function(){return(new Ue).getTime()},bo=ie(function(n,t,r){var e=x;if(r.length)var u=v(r,bo.placeholder),e=e|k;return _r(n,e,t,r,u)}),xo=ie(function(n,t){t=t.length?ht(t):ye(n);for(var r=-1,e=t.length;++r<e;){var u=t[r];

        n[u]=_r(n[u],x,n)}return n}),Ao=ie(function(n,t,r){var e=x|A;if(r.length)var u=v(r,Ao.placeholder),e=e|k;return _r(t,e,n,r,u)}),jo=Ht(O),Oo=Ht(E),Eo=ie(function(n,t){return ft(n,1,t)}),ko=ie(function(n,t,r){return ft(n,t,r)}),Io=er(),Ro=er(true),So=fr(k),Co=fr(I),To=ie(function(n,t){return _r(n,S,null,null,null,ht(t))});$u.argsTag||(ae=function(n){return Rr(h(n)?n.length:w)&&Ze.call(n,"callee")&&!fu.call(n,"callee")});var Uo=gu||function(n){return h(n)&&Rr(n.length)&&Je.call(n)==z};$u.dom||(fe=function(n){
        return!!n&&1===n.nodeType&&h(n)&&!No(n)});var Wo=Au||function(n){return typeof n=="number"&&du(n)},Fo=e(/x/)||pu&&!e(pu)?function(n){return Je.call(n)==K}:e,No=ou?function(n){if(!n||Je.call(n)!=Y||!Ln.support.argsTag&&ae(n))return false;var t=n.valueOf,r=se(t)&&(r=ou(t))&&ou(r);return r?n==r||ou(n)==r:Ur(n)}:Ur,$o=Vt(function(n,t,r){return r?et(n,t,r):Lu(n,t)}),Lo=ie(function(n){var t=n[0];return null==t?t:(n.push(tt),$o.apply(w,n))}),Po=rr(vt),Bo=rr(gt),zo=or(Mu),Mo=or(Du),Do=ir(vt),qo=ir(gt),Ko=mu?function(n){
        if(n)var t=n.constructor,r=n.length;return typeof t=="function"&&t.prototype===n||(typeof n=="function"?Ln.support.enumPrototypes:Rr(r))?Wr(n):le(n)?mu(n):[]}:Wr,Vo=Vt(jt),Yo=ie(function(n,t){if(null==n)return{};if("function"!=typeof t[0])return t=Hn(ht(t),Be),Cr(n,ct(de(n),t));var r=zt(t[0],t[1],3);return Tr(n,function(n,t,e){return!r(n,t,e)})}),Zo=ie(function(n,t){return null==n?{}:"function"==typeof t[0]?Tr(n,zt(t[0],t[1],3)):Cr(n,ht(t))}),Go=Jt(function(n,t,r){return t=t.toLowerCase(),n+(r?t.charAt(0).toUpperCase()+t.slice(1):t);

    }),Jo=Jt(function(n,t,r){return n+(r?"-":"")+t.toLowerCase()}),Xo=ar(),Ho=ar(true);8!=ju(Tn+"08")&&(xe=function(n,t,r){return(r?Er(n,t,r):null==t)?t=0:t&&(t=+t),n=je(n),ju(n,t||(En.test(n)?16:10))});var Qo=Jt(function(n,t,r){return n+(r?"_":"")+t.toLowerCase()}),ni=Jt(function(n,t,r){return n+(r?" ":"")+(t.charAt(0).toUpperCase()+t.slice(1))}),ti=ie(function(n,t){try{return n.apply(w,t)}catch(r){return ce(r)?r:new We(r)}}),ri=ie(function(n,t){return function(r){return jr(r,n,t)}}),ei=ie(function(n,t){
        return function(r){return jr(n,r,t)}}),ui=Qt(Qn),oi=Qt(function(n){for(var t=-1,r=n.length,e=ku;++t<r;){var u=n[t];u<e&&(e=u)}return e},true);return Ln.prototype=Pn.prototype,Bn.prototype=Pu(Pn.prototype),Bn.prototype.constructor=Bn,zn.prototype=Pu(Pn.prototype),zn.prototype.constructor=zn,Mn.prototype["delete"]=function(n){return this.has(n)&&delete this.__data__[n]},Mn.prototype.get=function(n){return"__proto__"==n?w:this.__data__[n]},Mn.prototype.has=function(n){return"__proto__"!=n&&Ze.call(this.__data__,n);

    },Mn.prototype.set=function(n,t){return"__proto__"!=n&&(this.__data__[n]=t),this},Dn.prototype.push=function(n){var t=this.data;typeof n=="string"||le(n)?t.set.add(n):t.hash[n]=true},oe.Cache=Mn,Ln.after=function(n,t){if(typeof t!="function"){if(typeof n!="function")throw new ze(L);var r=n;n=t,t=r}return n=du(n=+n)?n:0,function(){return 1>--n?t.apply(this,arguments):void 0}},Ln.ary=function(n,t,r){return r&&Er(n,t,r)&&(t=null),t=n&&null==t?n.length:wu(+t||0,0),_r(n,R,null,null,null,null,t)},Ln.assign=$o,
        Ln.at=io,Ln.before=ee,Ln.bind=bo,Ln.bindAll=xo,Ln.bindKey=Ao,Ln.callback=Ee,Ln.chain=Zr,Ln.chunk=function(n,t,r){t=(r?Er(n,t,r):null==t)?1:wu(+t||1,1),r=0;for(var e=n?n.length:0,u=-1,o=Te(tu(e/t));r<e;)o[++u]=St(n,r,r+=t);return o},Ln.compact=function(n){for(var t=-1,r=n?n.length:0,e=-1,u=[];++t<r;){var o=n[t];o&&(u[++e]=o)}return u},Ln.constant=ke,Ln.countBy=ao,Ln.create=function(n,t,r){var e=Pu(n);return r&&Er(n,t,r)&&(t=null),t?Lu(e,t):e},Ln.curry=jo,Ln.curryRight=Oo,Ln.debounce=ue,Ln.defaults=Lo,
        Ln.defer=Eo,Ln.delay=ko,Ln.difference=Xu,Ln.drop=Pr,Ln.dropRight=Br,Ln.dropRightWhile=function(n,t,r){return n&&n.length?$t(n,mr(t,r,3),true,true):[]},Ln.dropWhile=function(n,t,r){return n&&n.length?$t(n,mr(t,r,3),true):[]},Ln.fill=function(n,t,r,e){var u=n?n.length:0;if(!u)return[];for(r&&typeof r!="number"&&Er(n,t,r)&&(r=0,e=u),u=n.length,r=null==r?0:+r||0,0>r&&(r=-r>u?0:u+r),e=e===w||e>u?u:+e||0,0>e&&(e+=u),u=r>e?0:e>>>0,r>>>=0;r<u;)n[r++]=t;return n},Ln.filter=Xr,Ln.flatten=function(n,t,r){var e=n?n.length:0;

        return r&&Er(n,t,r)&&(t=false),e?ht(n,t):[]},Ln.flattenDeep=function(n){return n&&n.length?ht(n,true):[]},Ln.flow=Io,Ln.flowRight=Ro,Ln.forEach=lo,Ln.forEachRight=so,Ln.forIn=zo,Ln.forInRight=Mo,Ln.forOwn=Do,Ln.forOwnRight=qo,Ln.functions=ye,Ln.groupBy=po,Ln.indexBy=ho,Ln.initial=function(n){return Br(n,1)},Ln.intersection=function(){for(var n=[],t=-1,e=arguments.length,u=[],o=wr(),i=o==r,a=[];++t<e;){var f=arguments[t];(Uo(f)||ae(f))&&(n.push(f),u.push(i&&120<=f.length?Ku(t&&f):null))}if(e=n.length,2>e)return a;

        var i=n[0],c=-1,l=i?i.length:0,s=u[0];n:for(;++c<l;)if(f=i[c],0>(s?qn(s,f):o(a,f,0))){for(t=e;--t;){var p=u[t];if(0>(p?qn(p,f):o(n[t],f,0)))continue n}s&&s.push(f),a.push(f)}return a},Ln.invert=function(n,t,r){r&&Er(n,t,r)&&(t=null),r=-1;for(var e=Ko(n),u=e.length,o={};++r<u;){var i=e[r],a=n[i];t?Ze.call(o,a)?o[a].push(i):o[a]=[i]:o[a]=i}return o},Ln.invoke=_o,Ln.keys=Ko,Ln.keysIn=de,Ln.map=Qr,Ln.mapValues=function(n,t,r){var e={};return t=mr(t,r,3),vt(n,function(n,r,u){e[r]=t(n,r,u)}),e},Ln.matches=function(n){
        return xt(at(n,true))},Ln.matchesProperty=function(n,t){return At(n,at(t,true))},Ln.memoize=oe,Ln.merge=Vo,Ln.method=ri,Ln.methodOf=ei,Ln.mixin=Re,Ln.negate=function(n){if(typeof n!="function")throw new ze(L);return function(){return!n.apply(this,arguments)}},Ln.omit=Yo,Ln.once=function(n){return ee(2,n)},Ln.pairs=function(n){for(var t=-1,r=Ko(n),e=r.length,u=Te(e);++t<e;){var o=r[t];u[t]=[o,n[o]]}return u},Ln.partial=So,Ln.partialRight=Co,Ln.partition=vo,Ln.pick=Zo,Ln.pluck=function(n,t){return Qr(n,Ce(t));

    },Ln.property=Ce,Ln.propertyOf=function(n){return function(t){return dt(n,$r(t),t+"")}},Ln.pull=function(){var n=arguments,t=n[0];if(!t||!t.length)return t;for(var r=0,e=wr(),u=n.length;++r<u;)for(var o=0,i=n[r];-1<(o=e(t,i,o));)su.call(t,o,1);return t},Ln.pullAt=no,Ln.range=function(n,t,r){r&&Er(n,t,r)&&(t=r=null),n=+n||0,r=null==r?1:+r||0,null==t?(t=n,n=0):t=+t||0;var e=-1;t=wu(tu((t-n)/(r||1)),0);for(var u=Te(t);++e<t;)u[e]=n,n+=r;return u},Ln.rearg=To,Ln.reject=function(n,t,r){var e=Uo(n)?Xn:st;

        return t=mr(t,r,3),e(n,function(n,r,e){return!t(n,r,e)})},Ln.remove=function(n,t,r){var e=[];if(!n||!n.length)return e;var u=-1,o=[],i=n.length;for(t=mr(t,r,3);++u<i;)r=n[u],t(r,u,n)&&(e.push(r),o.push(u));return kt(n,o),e},Ln.rest=qr,Ln.restParam=ie,Ln.set=function(n,t,r){if(null==n)return n;var e=t+"";t=null!=n[e]||kr(t,n)?[e]:$r(t);for(var e=-1,u=t.length,o=u-1,i=n;null!=i&&++e<u;){var a=t[e];le(i)&&(e==o?i[a]=r:null==i[a]&&(i[a]=Or(t[e+1])?[]:{})),i=i[a]}return n},Ln.shuffle=te,Ln.slice=function(n,t,r){
        var e=n?n.length:0;return e?(r&&typeof r!="number"&&Er(n,t,r)&&(t=0,r=e),St(n,t,r)):[]},Ln.sortBy=function(n,t,r){if(null==n)return[];r&&Er(n,t,r)&&(t=null);var e=-1;return t=mr(t,r,3),n=bt(n,function(n,r,u){return{a:t(n,r,u),b:++e,c:n}}),Tt(n,f)},Ln.sortByAll=mo,Ln.sortByOrder=function(n,t,r,e){return null==n?[]:(e&&Er(t,r,e)&&(r=null),Uo(t)||(t=null==t?[]:[t]),Uo(r)||(r=null==r?[]:[r]),Ut(n,t,r))},Ln.spread=function(n){if(typeof n!="function")throw new ze(L);return function(t){return n.apply(this,t);

    }},Ln.take=function(n,t,r){return n&&n.length?((r?Er(n,t,r):null==t)&&(t=1),St(n,0,0>t?0:t)):[]},Ln.takeRight=function(n,t,r){var e=n?n.length:0;return e?((r?Er(n,t,r):null==t)&&(t=1),t=e-(+t||0),St(n,0>t?0:t)):[]},Ln.takeRightWhile=function(n,t,r){return n&&n.length?$t(n,mr(t,r,3),false,true):[]},Ln.takeWhile=function(n,t,r){return n&&n.length?$t(n,mr(t,r,3)):[]},Ln.tap=function(n,t,r){return t.call(r,n),n},Ln.throttle=function(n,t,r){var e=true,u=true;if(typeof n!="function")throw new ze(L);return false===r?e=false:le(r)&&(e="leading"in r?!!r.leading:e,
        u="trailing"in r?!!r.trailing:u),$n.leading=e,$n.maxWait=+t,$n.trailing=u,ue(n,t,$n)},Ln.thru=Gr,Ln.times=function(n,t,r){if(n=eu(n),1>n||!du(n))return[];var e=-1,u=Te(bu(n,Iu));for(t=zt(t,r,1);++e<n;)e<Iu?u[e]=t(e):t(e);return u},Ln.toArray=function(n){var t=n?Zu(n):0;return Rr(t)?t?Ln.support.unindexedChars&&_e(n)?n.split(""):Kn(n):[]:me(n)},Ln.toPlainObject=ge,Ln.transform=function(n,t,r,e){var u=Uo(n)||ve(n);return t=mr(t,e,4),null==r&&(u||le(n)?(e=n.constructor,r=u?Uo(n)?new e:[]:Pu(Fo(e)&&e.prototype)):r={}),
        (u?Vn:vt)(n,function(n,e,u){return t(r,n,e,u)}),r},Ln.union=eo,Ln.uniq=Kr,Ln.unzip=Vr,Ln.values=me,Ln.valuesIn=function(n){return Nt(n,de(n))},Ln.where=function(n,t){return Xr(n,xt(t))},Ln.without=uo,Ln.wrap=function(n,t){return t=null==t?Ie:t,_r(t,k,null,[n],[])},Ln.xor=function(){for(var n=-1,t=arguments.length;++n<t;){var r=arguments[n];if(Uo(r)||ae(r))var e=e?ct(e,r).concat(ct(r,e)):r}return e?Ft(e):[]},Ln.zip=oo,Ln.zipObject=Yr,Ln.backflow=Ro,Ln.collect=Qr,Ln.compose=Ro,Ln.each=lo,Ln.eachRight=so,
        Ln.extend=$o,Ln.iteratee=Ee,Ln.methods=ye,Ln.object=Yr,Ln.select=Xr,Ln.tail=qr,Ln.unique=Kr,Re(Ln,Ln),Ln.add=function(n,t){return(+n||0)+(+t||0)},Ln.attempt=ti,Ln.camelCase=Go,Ln.capitalize=function(n){return(n=u(n))&&n.charAt(0).toUpperCase()+n.slice(1)},Ln.clone=function(n,t,r,e){return t&&typeof t!="boolean"&&Er(n,t,r)?t=false:typeof t=="function"&&(e=r,r=t,t=false),r=typeof r=="function"&&zt(r,e,1),at(n,t,r)},Ln.cloneDeep=function(n,t,r){return t=typeof t=="function"&&zt(t,r,1),at(n,true,t)},Ln.deburr=we,
        Ln.endsWith=function(n,t,r){n=u(n),t+="";var e=n.length;return r=r===w?e:bu(0>r?0:+r||0,e),r-=t.length,0<=r&&n.indexOf(t,r)==r},Ln.escape=function(n){return(n=u(n))&&hn.test(n)?n.replace(sn,l):n},Ln.escapeRegExp=be,Ln.every=Jr,Ln.find=fo,Ln.findIndex=Hu,Ln.findKey=Po,Ln.findLast=co,Ln.findLastIndex=Qu,Ln.findLastKey=Bo,Ln.findWhere=function(n,t){return fo(n,xt(t))},Ln.first=zr,Ln.get=function(n,t,r){return n=null==n?w:dt(n,$r(t),t+""),n===w?r:n},Ln.has=function(n,t){if(null==n)return false;var r=Ze.call(n,t);

        return r||kr(t)||(t=$r(t),n=1==t.length?n:dt(n,St(t,0,-1)),t=Dr(t),r=null!=n&&Ze.call(n,t)),r||Ln.support.nonEnumStrings&&_e(n)&&Or(t,n.length)},Ln.identity=Ie,Ln.includes=Hr,Ln.indexOf=Mr,Ln.inRange=function(n,t,r){return t=+t||0,"undefined"===typeof r?(r=t,t=0):r=+r||0,n>=bu(t,r)&&n<wu(t,r)},Ln.isArguments=ae,Ln.isArray=Uo,Ln.isBoolean=function(n){return true===n||false===n||h(n)&&Je.call(n)==M},Ln.isDate=function(n){return h(n)&&Je.call(n)==D},Ln.isElement=fe,Ln.isEmpty=function(n){if(null==n)return true;

        var t=Zu(n);return Rr(t)&&(Uo(n)||_e(n)||ae(n)||h(n)&&Fo(n.splice))?!t:!Ko(n).length},Ln.isEqual=function(n,t,r,e){return r=typeof r=="function"&&zt(r,e,3),!r&&Sr(n)&&Sr(t)?n===t:(e=r?r(n,t):w,e===w?mt(n,t,r):!!e)},Ln.isError=ce,Ln.isFinite=Wo,Ln.isFunction=Fo,Ln.isMatch=function(n,t,r,e){var u=Ko(t),o=u.length;if(!o)return true;if(null==n)return false;if(r=typeof r=="function"&&zt(r,e,3),n=Nr(n),!r&&1==o){var i=u[0];if(e=t[i],Sr(e))return e===n[i]&&(e!==w||i in n)}for(var i=Te(o),a=Te(o);o--;)e=i[o]=t[u[o]],
        a[o]=Sr(e);return wt(n,u,i,a,r)},Ln.isNaN=function(n){return pe(n)&&n!=+n},Ln.isNative=se,Ln.isNull=function(n){return null===n},Ln.isNumber=pe,Ln.isObject=le,Ln.isPlainObject=No,Ln.isRegExp=he,Ln.isString=_e,Ln.isTypedArray=ve,Ln.isUndefined=function(n){return n===w},Ln.kebabCase=Jo,Ln.last=Dr,Ln.lastIndexOf=function(n,t,r){var e=n?n.length:0;if(!e)return-1;var u=e;if(typeof r=="number")u=(0>r?wu(e+r,0):bu(r||0,e-1))+1;else if(r)return u=Pt(n,t,true)-1,n=n[u],(t===t?t===n:n!==n)?u:-1;if(t!==t)return p(n,u,true);

        for(;u--;)if(n[u]===t)return u;return-1},Ln.max=ui,Ln.min=oi,Ln.noConflict=function(){return _._=Xe,this},Ln.noop=Se,Ln.now=wo,Ln.pad=function(n,t,r){n=u(n),t=+t;var e=n.length;return e<t&&du(t)?(e=(t-e)/2,t=eu(e),e=tu(e),r=sr("",e,r),r.slice(0,t)+n+r):n},Ln.padLeft=Xo,Ln.padRight=Ho,Ln.parseInt=xe,Ln.random=function(n,t,r){r&&Er(n,t,r)&&(t=r=null);var e=null==n,u=null==t;return null==r&&(u&&typeof n=="boolean"?(r=n,n=1):typeof t=="boolean"&&(r=t,u=true)),e&&u&&(t=1,u=false),n=+n||0,u?(t=n,n=0):t=+t||0,
        r||n%1||t%1?(r=Ou(),bu(n+r*(t-n+parseFloat("1e-"+((r+"").length-1))),t)):It(n,t)},Ln.reduce=go,Ln.reduceRight=yo,Ln.repeat=Ae,Ln.result=function(n,t,r){var e=null==n?w:Nr(n)[t];return e===w&&(null==n||kr(t,n)||(t=$r(t),n=1==t.length?n:dt(n,St(t,0,-1)),e=null==n?w:Nr(n)[Dr(t)]),e=e===w?r:e),Fo(e)?e.call(n):e},Ln.runInContext=m,Ln.size=function(n){var t=n?Zu(n):0;return Rr(t)?t:Ko(n).length},Ln.snakeCase=Qo,Ln.some=re,Ln.sortedIndex=to,Ln.sortedLastIndex=ro,Ln.startCase=ni,Ln.startsWith=function(n,t,r){
        return n=u(n),r=null==r?0:bu(0>r?0:+r||0,n.length),n.lastIndexOf(t,r)==r},Ln.sum=function(n,t,r){r&&Er(n,t,r)&&(t=null);var e=mr(),u=null==t;if(e===it&&u||(u=false,t=e(t,r,3)),u){for(n=Uo(n)?n:Fr(n),t=n.length,r=0;t--;)r+=+n[t]||0;n=r}else n=Wt(n,t);return n},Ln.template=function(n,t,r){var e=Ln.templateSettings;r&&Er(n,t,r)&&(t=r=null),n=u(n),t=et(Lu({},r||t),e,rt),r=et(Lu({},t.imports),e.imports,rt);var o,i,a=Ko(r),f=Nt(r,a),c=0;r=t.interpolate||Rn;var l="__p+='";r=Pe((t.escape||Rn).source+"|"+r.source+"|"+(r===gn?jn:Rn).source+"|"+(t.evaluate||Rn).source+"|$","g");

        var p="sourceURL"in t?"//# sourceURL="+t.sourceURL+"\n":"";if(n.replace(r,function(t,r,e,u,a,f){return e||(e=u),l+=n.slice(c,f).replace(Sn,s),r&&(o=true,l+="'+__e("+r+")+'"),a&&(i=true,l+="';"+a+";\n__p+='"),e&&(l+="'+((__t=("+e+"))==null?'':__t)+'"),c=f+t.length,t}),l+="';",(t=t.variable)||(l="with(obj){"+l+"}"),l=(i?l.replace(an,""):l).replace(fn,"$1").replace(cn,"$1;"),l="function("+(t||"obj")+"){"+(t?"":"obj||(obj={});")+"var __t,__p=''"+(o?",__e=_.escape":"")+(i?",__j=Array.prototype.join;function print(){__p+=__j.call(arguments,'')}":";")+l+"return __p}",
                t=ti(function(){return Fe(a,p+"return "+l).apply(w,f)}),t.source=l,ce(t))throw t;return t},Ln.trim=je,Ln.trimLeft=function(n,t,r){var e=n;return(n=u(n))?n.slice((r?Er(e,t,r):null==t)?g(n):i(n,t+"")):n},Ln.trimRight=function(n,t,r){var e=n;return(n=u(n))?(r?Er(e,t,r):null==t)?n.slice(0,y(n)+1):n.slice(0,a(n,t+"")+1):n},Ln.trunc=function(n,t,r){r&&Er(n,t,r)&&(t=null);var e=C;if(r=T,null!=t)if(le(t)){var o="separator"in t?t.separator:o,e="length"in t?+t.length||0:e;r="omission"in t?u(t.omission):r}else e=+t||0;

        if(n=u(n),e>=n.length)return n;if(e-=r.length,1>e)return r;if(t=n.slice(0,e),null==o)return t+r;if(he(o)){if(n.slice(e).search(o)){var i,a=n.slice(0,e);for(o.global||(o=Pe(o.source,(On.exec(o)||"")+"g")),o.lastIndex=0;n=o.exec(a);)i=n.index;t=t.slice(0,null==i?e:i)}}else n.indexOf(o,e)!=e&&(o=t.lastIndexOf(o),-1<o&&(t=t.slice(0,o)));return t+r},Ln.unescape=function(n){return(n=u(n))&&pn.test(n)?n.replace(ln,d):n},Ln.uniqueId=function(n){var t=++Ge;return u(n)+t},Ln.words=Oe,Ln.all=Jr,Ln.any=re,Ln.contains=Hr,
        Ln.detect=fo,Ln.foldl=go,Ln.foldr=yo,Ln.head=zr,Ln.include=Hr,Ln.inject=go,Re(Ln,function(){var n={};return vt(Ln,function(t,r){Ln.prototype[r]||(n[r]=t)}),n}(),false),Ln.sample=ne,Ln.prototype.sample=function(n){return this.__chain__||null!=n?this.thru(function(t){return ne(t,n)}):ne(this.value())},Ln.VERSION=b,Vn("bind bindKey curry curryRight partial partialRight".split(" "),function(n){Ln[n].placeholder=Ln}),Vn(["dropWhile","filter","map","takeWhile"],function(n,t){var r=t!=$,e=t==F;zn.prototype[n]=function(n,u){
        var o=this.__filtered__,i=o&&e?new zn(this):this.clone();return(i.__iteratees__||(i.__iteratees__=[])).push({done:false,count:0,index:0,iteratee:mr(n,u,1),limit:-1,type:t}),i.__filtered__=o||r,i}}),Vn(["drop","take"],function(n,t){var r=n+"While";zn.prototype[n]=function(r){var e=this.__filtered__,u=e&&!t?this.dropWhile():this.clone();return r=null==r?1:wu(eu(r)||0,0),e?t?u.__takeCount__=bu(u.__takeCount__,r):Dr(u.__iteratees__).limit=r:(u.__views__||(u.__views__=[])).push({size:r,type:n+(0>u.__dir__?"Right":"")
    }),u},zn.prototype[n+"Right"]=function(t){return this.reverse()[n](t).reverse()},zn.prototype[n+"RightWhile"]=function(n,t){return this.reverse()[r](n,t).reverse()}}),Vn(["first","last"],function(n,t){var r="take"+(t?"Right":"");zn.prototype[n]=function(){return this[r](1).value()[0]}}),Vn(["initial","rest"],function(n,t){var r="drop"+(t?"":"Right");zn.prototype[n]=function(){return this[r](1)}}),Vn(["pluck","where"],function(n,t){var r=t?"filter":"map",e=t?xt:Ce;zn.prototype[n]=function(n){return this[r](e(n));

    }}),zn.prototype.compact=function(){return this.filter(Ie)},zn.prototype.reject=function(n,t){return n=mr(n,t,1),this.filter(function(t){return!n(t)})},zn.prototype.slice=function(n,t){n=null==n?0:+n||0;var r=0>n?this.takeRight(-n):this.drop(n);return t!==w&&(t=+t||0,r=0>t?r.dropRight(-t):r.take(t-n)),r},zn.prototype.toArray=function(){return this.drop(0)},vt(zn.prototype,function(n,t){var r=Ln[t];if(r){var e=/^(?:filter|map|reject)|While$/.test(t),u=/^(?:first|last)$/.test(t);Ln.prototype[t]=function(){
        function t(n){return n=[n],iu.apply(n,o),r.apply(Ln,n)}var o=arguments,i=this.__chain__,a=this.__wrapped__,f=!!this.__actions__.length,c=a instanceof zn,l=o[0],s=c||Uo(a);return s&&e&&typeof l=="function"&&1!=l.length&&(c=s=false),c=c&&!f,u&&!i?c?n.call(a):r.call(Ln,this.value()):s?(a=n.apply(c?a:new zn(this),o),u||!f&&!a.__actions__||(a.__actions__||(a.__actions__=[])).push({func:Gr,args:[t],thisArg:Ln}),new Bn(a,i)):this.thru(t)}}}),Vn("concat join pop push replace shift sort splice split unshift".split(" "),function(n){
        var t=(/^(?:replace|split)$/.test(n)?Ke:Me)[n],r=/^(?:push|sort|unshift)$/.test(n)?"tap":"thru",e=/^(?:join|pop|replace|shift)$/.test(n),u=$u.spliceObjects||!/^(?:pop|shift|splice)$/.test(n)?t:function(){var n=t.apply(this,arguments);return 0===this.length&&delete this[0],n};Ln.prototype[n]=function(){var n=arguments;return e&&!this.__chain__?u.apply(this.value(),n):this[r](function(t){return u.apply(t,n)})}}),vt(zn.prototype,function(n,t){var r=Ln[t];if(r){var e=r.name;(Wu[e]||(Wu[e]=[])).push({
        name:t,func:r})}}),Wu[lr(null,A).name]=[{name:"wrapper",func:null}],zn.prototype.clone=function(){var n=this.__actions__,t=this.__iteratees__,r=this.__views__,e=new zn(this.__wrapped__);return e.__actions__=n?Kn(n):null,e.__dir__=this.__dir__,e.__filtered__=this.__filtered__,e.__iteratees__=t?Kn(t):null,e.__takeCount__=this.__takeCount__,e.__views__=r?Kn(r):null,e},zn.prototype.reverse=function(){if(this.__filtered__){var n=new zn(this);n.__dir__=-1,n.__filtered__=true}else n=this.clone(),n.__dir__*=-1;

        return n},zn.prototype.value=function(){var n=this.__wrapped__.value();if(!Uo(n))return Lt(n,this.__actions__);var t,r=this.__dir__,e=0>r;t=n.length;for(var u=this.__views__,o=0,i=-1,a=u?u.length:0;++i<a;){var f=u[i],c=f.size;switch(f.type){case"drop":o+=c;break;case"dropRight":t-=c;break;case"take":t=bu(t,o+c);break;case"takeRight":o=wu(o,t-c)}}t={start:o,end:t},u=t.start,o=t.end,t=o-u,u=e?o:u-1,o=bu(t,this.__takeCount__),a=(i=this.__iteratees__)?i.length:0,f=0,c=[];n:for(;t--&&f<o;){for(var u=u+r,l=-1,s=n[u];++l<a;){
        var p=i[l],h=p.iteratee,_=p.type;if(_==F){if(p.done&&(e?u>p.index:u<p.index)&&(p.count=0,p.done=false),p.index=u,!(p.done||(_=p.limit,p.done=-1<_?p.count++>=_:!h(s))))continue n}else if(p=h(s),_==$)s=p;else if(!p){if(_==N)continue n;break n}}c[f++]=s}return c},Ln.prototype.chain=function(){return Zr(this)},Ln.prototype.commit=function(){return new Bn(this.value(),this.__chain__)},Ln.prototype.plant=function(n){for(var t,r=this;r instanceof Pn;){var e=Lr(r);t?u.__wrapped__=e:t=e;var u=e,r=r.__wrapped__;

    }return u.__wrapped__=n,t},Ln.prototype.reverse=function(){var n=this.__wrapped__;return n instanceof zn?(this.__actions__.length&&(n=new zn(this)),new Bn(n.reverse(),this.__chain__)):this.thru(function(n){return n.reverse()})},Ln.prototype.toString=function(){return this.value()+""},Ln.prototype.run=Ln.prototype.toJSON=Ln.prototype.valueOf=Ln.prototype.value=function(){return Lt(this.__wrapped__,this.__actions__)},Ln.prototype.collect=Ln.prototype.map,Ln.prototype.head=Ln.prototype.first,Ln.prototype.select=Ln.prototype.filter,
        Ln.prototype.tail=Ln.prototype.rest,Ln}var w,b="3.7.0",x=1,A=2,j=4,O=8,E=16,k=32,I=64,R=128,S=256,C=30,T="...",U=150,W=16,F=0,N=1,$=2,L="Expected a function",P="__lodash_placeholder__",B="[object Arguments]",z="[object Array]",M="[object Boolean]",D="[object Date]",q="[object Error]",K="[object Function]",V="[object Number]",Y="[object Object]",Z="[object RegExp]",G="[object String]",J="[object ArrayBuffer]",X="[object Float32Array]",H="[object Float64Array]",Q="[object Int8Array]",nn="[object Int16Array]",tn="[object Int32Array]",rn="[object Uint8Array]",en="[object Uint8ClampedArray]",un="[object Uint16Array]",on="[object Uint32Array]",an=/\b__p\+='';/g,fn=/\b(__p\+=)''\+/g,cn=/(__e\(.*?\)|\b__t\))\+'';/g,ln=/&(?:amp|lt|gt|quot|#39|#96);/g,sn=/[&<>"'`]/g,pn=RegExp(ln.source),hn=RegExp(sn.source),_n=/<%-([\s\S]+?)%>/g,vn=/<%([\s\S]+?)%>/g,gn=/<%=([\s\S]+?)%>/g,yn=/\.|\[(?:[^[\]]+|(["'])(?:(?!\1)[^\n\\]|\\.)*?)\1\]/,dn=/^\w*$/,mn=/[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\n\\]|\\.)*?)\2)\]/g,wn=/[.*+?^${}()|[\]\/\\]/g,bn=RegExp(wn.source),xn=/[\u0300-\u036f\ufe20-\ufe23]/g,An=/\\(\\)?/g,jn=/\$\{([^\\}]*(?:\\.[^\\}]*)*)\}/g,On=/\w*$/,En=/^0[xX]/,kn=/^\[object .+?Constructor\]$/,In=/[\xc0-\xd6\xd8-\xde\xdf-\xf6\xf8-\xff]/g,Rn=/($^)/,Sn=/['\n\r\u2028\u2029\\]/g,Cn=RegExp("[A-Z\\xc0-\\xd6\\xd8-\\xde]+(?=[A-Z\\xc0-\\xd6\\xd8-\\xde][a-z\\xdf-\\xf6\\xf8-\\xff]+)|[A-Z\\xc0-\\xd6\\xd8-\\xde]?[a-z\\xdf-\\xf6\\xf8-\\xff]+|[A-Z\\xc0-\\xd6\\xd8-\\xde]+|[0-9]+","g"),Tn=" \t\x0b\f\xa0\ufeff\n\r\u2028\u2029\u1680\u180e\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u202f\u205f\u3000",Un="Array ArrayBuffer Date Error Float32Array Float64Array Function Int8Array Int16Array Int32Array Math Number Object RegExp Set String _ clearTimeout document isFinite parseInt setTimeout TypeError Uint8Array Uint8ClampedArray Uint16Array Uint32Array WeakMap window".split(" "),Wn="constructor hasOwnProperty isPrototypeOf propertyIsEnumerable toLocaleString toString valueOf".split(" "),Fn={};

    Fn[X]=Fn[H]=Fn[Q]=Fn[nn]=Fn[tn]=Fn[rn]=Fn[en]=Fn[un]=Fn[on]=true,Fn[B]=Fn[z]=Fn[J]=Fn[M]=Fn[D]=Fn[q]=Fn[K]=Fn["[object Map]"]=Fn[V]=Fn[Y]=Fn[Z]=Fn["[object Set]"]=Fn[G]=Fn["[object WeakMap]"]=false;var Nn={};Nn[B]=Nn[z]=Nn[J]=Nn[M]=Nn[D]=Nn[X]=Nn[H]=Nn[Q]=Nn[nn]=Nn[tn]=Nn[V]=Nn[Y]=Nn[Z]=Nn[G]=Nn[rn]=Nn[en]=Nn[un]=Nn[on]=true,Nn[q]=Nn[K]=Nn["[object Map]"]=Nn["[object Set]"]=Nn["[object WeakMap]"]=false;var $n={leading:false,maxWait:0,trailing:false},Ln={"\xc0":"A","\xc1":"A","\xc2":"A","\xc3":"A","\xc4":"A","\xc5":"A",
        "\xe0":"a","\xe1":"a","\xe2":"a","\xe3":"a","\xe4":"a","\xe5":"a","\xc7":"C","\xe7":"c","\xd0":"D","\xf0":"d","\xc8":"E","\xc9":"E","\xca":"E","\xcb":"E","\xe8":"e","\xe9":"e","\xea":"e","\xeb":"e","\xcc":"I","\xcd":"I","\xce":"I","\xcf":"I","\xec":"i","\xed":"i","\xee":"i","\xef":"i","\xd1":"N","\xf1":"n","\xd2":"O","\xd3":"O","\xd4":"O","\xd5":"O","\xd6":"O","\xd8":"O","\xf2":"o","\xf3":"o","\xf4":"o","\xf5":"o","\xf6":"o","\xf8":"o","\xd9":"U","\xda":"U","\xdb":"U","\xdc":"U","\xf9":"u","\xfa":"u",
        "\xfb":"u","\xfc":"u","\xdd":"Y","\xfd":"y","\xff":"y","\xc6":"Ae","\xe6":"ae","\xde":"Th","\xfe":"th","\xdf":"ss"},Pn={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","`":"&#96;"},Bn={"&amp;":"&","&lt;":"<","&gt;":">","&quot;":'"',"&#39;":"'","&#96;":"`"},zn={"function":true,object:true},Mn={"\\":"\\","'":"'","\n":"n","\r":"r","\u2028":"u2028","\u2029":"u2029"},Dn=zn[typeof exports]&&exports&&!exports.nodeType&&exports,qn=zn[typeof module]&&module&&!module.nodeType&&module,Kn=zn[typeof self]&&self&&self.Object&&self,Vn=zn[typeof window]&&window&&window.Object&&window,Yn=qn&&qn.exports===Dn&&Dn,Zn=Dn&&qn&&typeof global=="object"&&global&&global.Object&&global||Vn!==(this&&this.window)&&Vn||Kn||this,Gn=function(){
        try{Object({toString:0}+"")}catch(n){return function(){return false}}return function(n){return typeof n.toString!="function"&&typeof(n+"")=="string"}}(),Jn=m();typeof define=="function"&&typeof define.amd=="object"&&define.amd?(Zn._=Jn, define(function(){return Jn})):Dn&&qn?Yn?(qn.exports=Jn)._=Jn:Dn._=Jn:Zn._=Jn}).call(this);
/*
 AngularJS v1.3.14
 (c) 2010-2014 Google, Inc. http://angularjs.org
 License: MIT
*/
(function(P,X,u){'use strict';function M(b){return function(){var a=arguments[0],c;c="["+(b?b+":":"")+a+"] http://errors.angularjs.org/1.3.14/"+(b?b+"/":"")+a;for(a=1;a<arguments.length;a++){c=c+(1==a?"?":"&")+"p"+(a-1)+"=";var d=encodeURIComponent,e;e=arguments[a];e="function"==typeof e?e.toString().replace(/ \{[\s\S]*$/,""):"undefined"==typeof e?"undefined":"string"!=typeof e?JSON.stringify(e):e;c+=d(e)}return Error(c)}}function Ta(b){if(null==b||Ua(b))return!1;var a=b.length;return b.nodeType===
na&&a?!0:x(b)||E(b)||0===a||"number"===typeof a&&0<a&&a-1 in b}function s(b,a,c){var d,e;if(b)if(G(b))for(d in b)"prototype"==d||"length"==d||"name"==d||b.hasOwnProperty&&!b.hasOwnProperty(d)||a.call(c,b[d],d,b);else if(E(b)||Ta(b)){var f="object"!==typeof b;d=0;for(e=b.length;d<e;d++)(f||d in b)&&a.call(c,b[d],d,b)}else if(b.forEach&&b.forEach!==s)b.forEach(a,c,b);else for(d in b)b.hasOwnProperty(d)&&a.call(c,b[d],d,b);return b}function Ed(b,a,c){for(var d=Object.keys(b).sort(),e=0;e<d.length;e++)a.call(c,
b[d[e]],d[e]);return d}function lc(b){return function(a,c){b(c,a)}}function Fd(){return++ob}function mc(b,a){a?b.$$hashKey=a:delete b.$$hashKey}function w(b){for(var a=b.$$hashKey,c=1,d=arguments.length;c<d;c++){var e=arguments[c];if(e)for(var f=Object.keys(e),g=0,h=f.length;g<h;g++){var l=f[g];b[l]=e[l]}}mc(b,a);return b}function $(b){return parseInt(b,10)}function Pb(b,a){return w(Object.create(b),a)}function B(){}function oa(b){return b}function da(b){return function(){return b}}function z(b){return"undefined"===
typeof b}function y(b){return"undefined"!==typeof b}function J(b){return null!==b&&"object"===typeof b}function x(b){return"string"===typeof b}function V(b){return"number"===typeof b}function pa(b){return"[object Date]"===Da.call(b)}function G(b){return"function"===typeof b}function pb(b){return"[object RegExp]"===Da.call(b)}function Ua(b){return b&&b.window===b}function Va(b){return b&&b.$evalAsync&&b.$watch}function Wa(b){return"boolean"===typeof b}function nc(b){return!(!b||!(b.nodeName||b.prop&&
b.attr&&b.find))}function Gd(b){var a={};b=b.split(",");var c;for(c=0;c<b.length;c++)a[b[c]]=!0;return a}function ta(b){return R(b.nodeName||b[0]&&b[0].nodeName)}function Xa(b,a){var c=b.indexOf(a);0<=c&&b.splice(c,1);return a}function Ea(b,a,c,d){if(Ua(b)||Va(b))throw Ka("cpws");if(a){if(b===a)throw Ka("cpi");c=c||[];d=d||[];if(J(b)){var e=c.indexOf(b);if(-1!==e)return d[e];c.push(b);d.push(a)}if(E(b))for(var f=a.length=0;f<b.length;f++)e=Ea(b[f],null,c,d),J(b[f])&&(c.push(b[f]),d.push(e)),a.push(e);
else{var g=a.$$hashKey;E(a)?a.length=0:s(a,function(b,c){delete a[c]});for(f in b)b.hasOwnProperty(f)&&(e=Ea(b[f],null,c,d),J(b[f])&&(c.push(b[f]),d.push(e)),a[f]=e);mc(a,g)}}else if(a=b)E(b)?a=Ea(b,[],c,d):pa(b)?a=new Date(b.getTime()):pb(b)?(a=new RegExp(b.source,b.toString().match(/[^\/]*$/)[0]),a.lastIndex=b.lastIndex):J(b)&&(e=Object.create(Object.getPrototypeOf(b)),a=Ea(b,e,c,d));return a}function qa(b,a){if(E(b)){a=a||[];for(var c=0,d=b.length;c<d;c++)a[c]=b[c]}else if(J(b))for(c in a=a||{},
b)if("$"!==c.charAt(0)||"$"!==c.charAt(1))a[c]=b[c];return a||b}function ea(b,a){if(b===a)return!0;if(null===b||null===a)return!1;if(b!==b&&a!==a)return!0;var c=typeof b,d;if(c==typeof a&&"object"==c)if(E(b)){if(!E(a))return!1;if((c=b.length)==a.length){for(d=0;d<c;d++)if(!ea(b[d],a[d]))return!1;return!0}}else{if(pa(b))return pa(a)?ea(b.getTime(),a.getTime()):!1;if(pb(b)&&pb(a))return b.toString()==a.toString();if(Va(b)||Va(a)||Ua(b)||Ua(a)||E(a))return!1;c={};for(d in b)if("$"!==d.charAt(0)&&!G(b[d])){if(!ea(b[d],
a[d]))return!1;c[d]=!0}for(d in a)if(!c.hasOwnProperty(d)&&"$"!==d.charAt(0)&&a[d]!==u&&!G(a[d]))return!1;return!0}return!1}function Ya(b,a,c){return b.concat(Za.call(a,c))}function oc(b,a){var c=2<arguments.length?Za.call(arguments,2):[];return!G(a)||a instanceof RegExp?a:c.length?function(){return arguments.length?a.apply(b,Ya(c,arguments,0)):a.apply(b,c)}:function(){return arguments.length?a.apply(b,arguments):a.call(b)}}function Hd(b,a){var c=a;"string"===typeof b&&"$"===b.charAt(0)&&"$"===b.charAt(1)?
c=u:Ua(a)?c="$WINDOW":a&&X===a?c="$DOCUMENT":Va(a)&&(c="$SCOPE");return c}function $a(b,a){if("undefined"===typeof b)return u;V(a)||(a=a?2:null);return JSON.stringify(b,Hd,a)}function pc(b){return x(b)?JSON.parse(b):b}function ua(b){b=C(b).clone();try{b.empty()}catch(a){}var c=C("<div>").append(b).html();try{return b[0].nodeType===qb?R(c):c.match(/^(<[^>]+>)/)[1].replace(/^<([\w\-]+)/,function(a,b){return"<"+R(b)})}catch(d){return R(c)}}function qc(b){try{return decodeURIComponent(b)}catch(a){}}function rc(b){var a=
{},c,d;s((b||"").split("&"),function(b){b&&(c=b.replace(/\+/g,"%20").split("="),d=qc(c[0]),y(d)&&(b=y(c[1])?qc(c[1]):!0,sc.call(a,d)?E(a[d])?a[d].push(b):a[d]=[a[d],b]:a[d]=b))});return a}function Qb(b){var a=[];s(b,function(b,d){E(b)?s(b,function(b){a.push(Fa(d,!0)+(!0===b?"":"="+Fa(b,!0)))}):a.push(Fa(d,!0)+(!0===b?"":"="+Fa(b,!0)))});return a.length?a.join("&"):""}function rb(b){return Fa(b,!0).replace(/%26/gi,"&").replace(/%3D/gi,"=").replace(/%2B/gi,"+")}function Fa(b,a){return encodeURIComponent(b).replace(/%40/gi,
"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%3B/gi,";").replace(/%20/g,a?"%20":"+")}function Id(b,a){var c,d,e=sb.length;b=C(b);for(d=0;d<e;++d)if(c=sb[d]+a,x(c=b.attr(c)))return c;return null}function Jd(b,a){var c,d,e={};s(sb,function(a){a+="app";!c&&b.hasAttribute&&b.hasAttribute(a)&&(c=b,d=b.getAttribute(a))});s(sb,function(a){a+="app";var e;!c&&(e=b.querySelector("["+a.replace(":","\\:")+"]"))&&(c=e,d=e.getAttribute(a))});c&&(e.strictDi=null!==Id(c,"strict-di"),
a(c,d?[d]:[],e))}function tc(b,a,c){J(c)||(c={});c=w({strictDi:!1},c);var d=function(){b=C(b);if(b.injector()){var d=b[0]===X?"document":ua(b);throw Ka("btstrpd",d.replace(/</,"&lt;").replace(/>/,"&gt;"));}a=a||[];a.unshift(["$provide",function(a){a.value("$rootElement",b)}]);c.debugInfoEnabled&&a.push(["$compileProvider",function(a){a.debugInfoEnabled(!0)}]);a.unshift("ng");d=ab(a,c.strictDi);d.invoke(["$rootScope","$rootElement","$compile","$injector",function(a,b,c,d){a.$apply(function(){b.data("$injector",
d);c(b)(a)})}]);return d},e=/^NG_ENABLE_DEBUG_INFO!/,f=/^NG_DEFER_BOOTSTRAP!/;P&&e.test(P.name)&&(c.debugInfoEnabled=!0,P.name=P.name.replace(e,""));if(P&&!f.test(P.name))return d();P.name=P.name.replace(f,"");aa.resumeBootstrap=function(b){s(b,function(b){a.push(b)});return d()};G(aa.resumeDeferredBootstrap)&&aa.resumeDeferredBootstrap()}function Kd(){P.name="NG_ENABLE_DEBUG_INFO!"+P.name;P.location.reload()}function Ld(b){b=aa.element(b).injector();if(!b)throw Ka("test");return b.get("$$testability")}
function uc(b,a){a=a||"_";return b.replace(Md,function(b,d){return(d?a:"")+b.toLowerCase()})}function Nd(){var b;vc||((ra=P.jQuery)&&ra.fn.on?(C=ra,w(ra.fn,{scope:La.scope,isolateScope:La.isolateScope,controller:La.controller,injector:La.injector,inheritedData:La.inheritedData}),b=ra.cleanData,ra.cleanData=function(a){var c;if(Rb)Rb=!1;else for(var d=0,e;null!=(e=a[d]);d++)(c=ra._data(e,"events"))&&c.$destroy&&ra(e).triggerHandler("$destroy");b(a)}):C=Q,aa.element=C,vc=!0)}function Sb(b,a,c){if(!b)throw Ka("areq",
a||"?",c||"required");return b}function tb(b,a,c){c&&E(b)&&(b=b[b.length-1]);Sb(G(b),a,"not a function, got "+(b&&"object"===typeof b?b.constructor.name||"Object":typeof b));return b}function Ma(b,a){if("hasOwnProperty"===b)throw Ka("badname",a);}function wc(b,a,c){if(!a)return b;a=a.split(".");for(var d,e=b,f=a.length,g=0;g<f;g++)d=a[g],b&&(b=(e=b)[d]);return!c&&G(b)?oc(e,b):b}function ub(b){var a=b[0];b=b[b.length-1];var c=[a];do{a=a.nextSibling;if(!a)break;c.push(a)}while(a!==b);return C(c)}function fa(){return Object.create(null)}
function Od(b){function a(a,b,c){return a[b]||(a[b]=c())}var c=M("$injector"),d=M("ng");b=a(b,"angular",Object);b.$$minErr=b.$$minErr||M;return a(b,"module",function(){var b={};return function(f,g,h){if("hasOwnProperty"===f)throw d("badname","module");g&&b.hasOwnProperty(f)&&(b[f]=null);return a(b,f,function(){function a(c,d,e,f){f||(f=b);return function(){f[e||"push"]([c,d,arguments]);return t}}if(!g)throw c("nomod",f);var b=[],d=[],e=[],q=a("$injector","invoke","push",d),t={_invokeQueue:b,_configBlocks:d,
_runBlocks:e,requires:g,name:f,provider:a("$provide","provider"),factory:a("$provide","factory"),service:a("$provide","service"),value:a("$provide","value"),constant:a("$provide","constant","unshift"),animation:a("$animateProvider","register"),filter:a("$filterProvider","register"),controller:a("$controllerProvider","register"),directive:a("$compileProvider","directive"),config:q,run:function(a){e.push(a);return this}};h&&q(h);return t})}})}function Pd(b){w(b,{bootstrap:tc,copy:Ea,extend:w,equals:ea,
element:C,forEach:s,injector:ab,noop:B,bind:oc,toJson:$a,fromJson:pc,identity:oa,isUndefined:z,isDefined:y,isString:x,isFunction:G,isObject:J,isNumber:V,isElement:nc,isArray:E,version:Qd,isDate:pa,lowercase:R,uppercase:vb,callbacks:{counter:0},getTestability:Ld,$$minErr:M,$$csp:bb,reloadWithDebugInfo:Kd});cb=Od(P);try{cb("ngLocale")}catch(a){cb("ngLocale",[]).provider("$locale",Rd)}cb("ng",["ngLocale"],["$provide",function(a){a.provider({$$sanitizeUri:Sd});a.provider("$compile",xc).directive({a:Td,
input:yc,textarea:yc,form:Ud,script:Vd,select:Wd,style:Xd,option:Yd,ngBind:Zd,ngBindHtml:$d,ngBindTemplate:ae,ngClass:be,ngClassEven:ce,ngClassOdd:de,ngCloak:ee,ngController:fe,ngForm:ge,ngHide:he,ngIf:ie,ngInclude:je,ngInit:ke,ngNonBindable:le,ngPluralize:me,ngRepeat:ne,ngShow:oe,ngStyle:pe,ngSwitch:qe,ngSwitchWhen:re,ngSwitchDefault:se,ngOptions:te,ngTransclude:ue,ngModel:ve,ngList:we,ngChange:xe,pattern:zc,ngPattern:zc,required:Ac,ngRequired:Ac,minlength:Bc,ngMinlength:Bc,maxlength:Cc,ngMaxlength:Cc,
ngValue:ye,ngModelOptions:ze}).directive({ngInclude:Ae}).directive(wb).directive(Dc);a.provider({$anchorScroll:Be,$animate:Ce,$browser:De,$cacheFactory:Ee,$controller:Fe,$document:Ge,$exceptionHandler:He,$filter:Ec,$interpolate:Ie,$interval:Je,$http:Ke,$httpBackend:Le,$location:Me,$log:Ne,$parse:Oe,$rootScope:Pe,$q:Qe,$$q:Re,$sce:Se,$sceDelegate:Te,$sniffer:Ue,$templateCache:Ve,$templateRequest:We,$$testability:Xe,$timeout:Ye,$window:Ze,$$rAF:$e,$$asyncCallback:af,$$jqLite:bf})}])}function db(b){return b.replace(cf,
function(a,b,d,e){return e?d.toUpperCase():d}).replace(df,"Moz$1")}function Fc(b){b=b.nodeType;return b===na||!b||9===b}function Gc(b,a){var c,d,e=a.createDocumentFragment(),f=[];if(Tb.test(b)){c=c||e.appendChild(a.createElement("div"));d=(ef.exec(b)||["",""])[1].toLowerCase();d=ga[d]||ga._default;c.innerHTML=d[1]+b.replace(ff,"<$1></$2>")+d[2];for(d=d[0];d--;)c=c.lastChild;f=Ya(f,c.childNodes);c=e.firstChild;c.textContent=""}else f.push(a.createTextNode(b));e.textContent="";e.innerHTML="";s(f,function(a){e.appendChild(a)});
return e}function Q(b){if(b instanceof Q)return b;var a;x(b)&&(b=T(b),a=!0);if(!(this instanceof Q)){if(a&&"<"!=b.charAt(0))throw Ub("nosel");return new Q(b)}if(a){a=X;var c;b=(c=gf.exec(b))?[a.createElement(c[1])]:(c=Gc(b,a))?c.childNodes:[]}Hc(this,b)}function Vb(b){return b.cloneNode(!0)}function xb(b,a){a||yb(b);if(b.querySelectorAll)for(var c=b.querySelectorAll("*"),d=0,e=c.length;d<e;d++)yb(c[d])}function Ic(b,a,c,d){if(y(d))throw Ub("offargs");var e=(d=zb(b))&&d.events,f=d&&d.handle;if(f)if(a)s(a.split(" "),
function(a){if(y(c)){var d=e[a];Xa(d||[],c);if(d&&0<d.length)return}b.removeEventListener(a,f,!1);delete e[a]});else for(a in e)"$destroy"!==a&&b.removeEventListener(a,f,!1),delete e[a]}function yb(b,a){var c=b.ng339,d=c&&Ab[c];d&&(a?delete d.data[a]:(d.handle&&(d.events.$destroy&&d.handle({},"$destroy"),Ic(b)),delete Ab[c],b.ng339=u))}function zb(b,a){var c=b.ng339,c=c&&Ab[c];a&&!c&&(b.ng339=c=++hf,c=Ab[c]={events:{},data:{},handle:u});return c}function Wb(b,a,c){if(Fc(b)){var d=y(c),e=!d&&a&&!J(a),
f=!a;b=(b=zb(b,!e))&&b.data;if(d)b[a]=c;else{if(f)return b;if(e)return b&&b[a];w(b,a)}}}function Bb(b,a){return b.getAttribute?-1<(" "+(b.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ").indexOf(" "+a+" "):!1}function Cb(b,a){a&&b.setAttribute&&s(a.split(" "),function(a){b.setAttribute("class",T((" "+(b.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ").replace(" "+T(a)+" "," ")))})}function Db(b,a){if(a&&b.setAttribute){var c=(" "+(b.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ");
s(a.split(" "),function(a){a=T(a);-1===c.indexOf(" "+a+" ")&&(c+=a+" ")});b.setAttribute("class",T(c))}}function Hc(b,a){if(a)if(a.nodeType)b[b.length++]=a;else{var c=a.length;if("number"===typeof c&&a.window!==a){if(c)for(var d=0;d<c;d++)b[b.length++]=a[d]}else b[b.length++]=a}}function Jc(b,a){return Eb(b,"$"+(a||"ngController")+"Controller")}function Eb(b,a,c){9==b.nodeType&&(b=b.documentElement);for(a=E(a)?a:[a];b;){for(var d=0,e=a.length;d<e;d++)if((c=C.data(b,a[d]))!==u)return c;b=b.parentNode||
11===b.nodeType&&b.host}}function Kc(b){for(xb(b,!0);b.firstChild;)b.removeChild(b.firstChild)}function Lc(b,a){a||xb(b);var c=b.parentNode;c&&c.removeChild(b)}function jf(b,a){a=a||P;if("complete"===a.document.readyState)a.setTimeout(b);else C(a).on("load",b)}function Mc(b,a){var c=Fb[a.toLowerCase()];return c&&Nc[ta(b)]&&c}function kf(b,a){var c=b.nodeName;return("INPUT"===c||"TEXTAREA"===c)&&Oc[a]}function lf(b,a){var c=function(c,e){c.isDefaultPrevented=function(){return c.defaultPrevented};var f=
a[e||c.type],g=f?f.length:0;if(g){if(z(c.immediatePropagationStopped)){var h=c.stopImmediatePropagation;c.stopImmediatePropagation=function(){c.immediatePropagationStopped=!0;c.stopPropagation&&c.stopPropagation();h&&h.call(c)}}c.isImmediatePropagationStopped=function(){return!0===c.immediatePropagationStopped};1<g&&(f=qa(f));for(var l=0;l<g;l++)c.isImmediatePropagationStopped()||f[l].call(b,c)}};c.elem=b;return c}function bf(){this.$get=function(){return w(Q,{hasClass:function(b,a){b.attr&&(b=b[0]);
return Bb(b,a)},addClass:function(b,a){b.attr&&(b=b[0]);return Db(b,a)},removeClass:function(b,a){b.attr&&(b=b[0]);return Cb(b,a)}})}}function Na(b,a){var c=b&&b.$$hashKey;if(c)return"function"===typeof c&&(c=b.$$hashKey()),c;c=typeof b;return c="function"==c||"object"==c&&null!==b?b.$$hashKey=c+":"+(a||Fd)():c+":"+b}function eb(b,a){if(a){var c=0;this.nextUid=function(){return++c}}s(b,this.put,this)}function mf(b){return(b=b.toString().replace(Pc,"").match(Qc))?"function("+(b[1]||"").replace(/[\s\r\n]+/,
" ")+")":"fn"}function ab(b,a){function c(a){return function(b,c){if(J(b))s(b,lc(a));else return a(b,c)}}function d(a,b){Ma(a,"service");if(G(b)||E(b))b=q.instantiate(b);if(!b.$get)throw Ga("pget",a);return p[a+"Provider"]=b}function e(a,b){return function(){var c=r.invoke(b,this);if(z(c))throw Ga("undef",a);return c}}function f(a,b,c){return d(a,{$get:!1!==c?e(a,b):b})}function g(a){var b=[],c;s(a,function(a){function d(a){var b,c;b=0;for(c=a.length;b<c;b++){var e=a[b],f=q.get(e[0]);f[e[1]].apply(f,
e[2])}}if(!m.get(a)){m.put(a,!0);try{x(a)?(c=cb(a),b=b.concat(g(c.requires)).concat(c._runBlocks),d(c._invokeQueue),d(c._configBlocks)):G(a)?b.push(q.invoke(a)):E(a)?b.push(q.invoke(a)):tb(a,"module")}catch(e){throw E(a)&&(a=a[a.length-1]),e.message&&e.stack&&-1==e.stack.indexOf(e.message)&&(e=e.message+"\n"+e.stack),Ga("modulerr",a,e.stack||e.message||e);}}});return b}function h(b,c){function d(a,e){if(b.hasOwnProperty(a)){if(b[a]===l)throw Ga("cdep",a+" <- "+k.join(" <- "));return b[a]}try{return k.unshift(a),
b[a]=l,b[a]=c(a,e)}catch(f){throw b[a]===l&&delete b[a],f;}finally{k.shift()}}function e(b,c,f,g){"string"===typeof f&&(g=f,f=null);var h=[],k=ab.$$annotate(b,a,g),l,q,p;q=0;for(l=k.length;q<l;q++){p=k[q];if("string"!==typeof p)throw Ga("itkn",p);h.push(f&&f.hasOwnProperty(p)?f[p]:d(p,g))}E(b)&&(b=b[l]);return b.apply(c,h)}return{invoke:e,instantiate:function(a,b,c){var d=Object.create((E(a)?a[a.length-1]:a).prototype||null);a=e(a,d,b,c);return J(a)||G(a)?a:d},get:d,annotate:ab.$$annotate,has:function(a){return p.hasOwnProperty(a+
"Provider")||b.hasOwnProperty(a)}}}a=!0===a;var l={},k=[],m=new eb([],!0),p={$provide:{provider:c(d),factory:c(f),service:c(function(a,b){return f(a,["$injector",function(a){return a.instantiate(b)}])}),value:c(function(a,b){return f(a,da(b),!1)}),constant:c(function(a,b){Ma(a,"constant");p[a]=b;t[a]=b}),decorator:function(a,b){var c=q.get(a+"Provider"),d=c.$get;c.$get=function(){var a=r.invoke(d,c);return r.invoke(b,null,{$delegate:a})}}}},q=p.$injector=h(p,function(a,b){aa.isString(b)&&k.push(b);
throw Ga("unpr",k.join(" <- "));}),t={},r=t.$injector=h(t,function(a,b){var c=q.get(a+"Provider",b);return r.invoke(c.$get,c,u,a)});s(g(b),function(a){r.invoke(a||B)});return r}function Be(){var b=!0;this.disableAutoScrolling=function(){b=!1};this.$get=["$window","$location","$rootScope",function(a,c,d){function e(a){var b=null;Array.prototype.some.call(a,function(a){if("a"===ta(a))return b=a,!0});return b}function f(b){if(b){b.scrollIntoView();var c;c=g.yOffset;G(c)?c=c():nc(c)?(c=c[0],c="fixed"!==
a.getComputedStyle(c).position?0:c.getBoundingClientRect().bottom):V(c)||(c=0);c&&(b=b.getBoundingClientRect().top,a.scrollBy(0,b-c))}else a.scrollTo(0,0)}function g(){var a=c.hash(),b;a?(b=h.getElementById(a))?f(b):(b=e(h.getElementsByName(a)))?f(b):"top"===a&&f(null):f(null)}var h=a.document;b&&d.$watch(function(){return c.hash()},function(a,b){a===b&&""===a||jf(function(){d.$evalAsync(g)})});return g}]}function af(){this.$get=["$$rAF","$timeout",function(b,a){return b.supported?function(a){return b(a)}:
function(b){return a(b,0,!1)}}]}function nf(b,a,c,d){function e(a){try{a.apply(null,Za.call(arguments,1))}finally{if(n--,0===n)for(;D.length;)try{D.pop()()}catch(b){c.error(b)}}}function f(a,b){(function ca(){s(H,function(a){a()});v=b(ca,a)})()}function g(){h();l()}function h(){A=b.history.state;A=z(A)?null:A;ea(A,O)&&(A=O);O=A}function l(){if(F!==m.url()||N!==A)F=m.url(),N=A,s(W,function(a){a(m.url(),A)})}function k(a){try{return decodeURIComponent(a)}catch(b){return a}}var m=this,p=a[0],q=b.location,
t=b.history,r=b.setTimeout,S=b.clearTimeout,K={};m.isMock=!1;var n=0,D=[];m.$$completeOutstandingRequest=e;m.$$incOutstandingRequestCount=function(){n++};m.notifyWhenNoOutstandingRequests=function(a){s(H,function(a){a()});0===n?a():D.push(a)};var H=[],v;m.addPollFn=function(a){z(v)&&f(100,r);H.push(a);return a};var A,N,F=q.href,ba=a.find("base"),I=null;h();N=A;m.url=function(a,c,e){z(e)&&(e=null);q!==b.location&&(q=b.location);t!==b.history&&(t=b.history);if(a){var f=N===e;if(F===a&&(!d.history||
f))return m;var g=F&&Ha(F)===Ha(a);F=a;N=e;!d.history||g&&f?(g||(I=a),c?q.replace(a):g?(c=q,e=a.indexOf("#"),a=-1===e?"":a.substr(e+1),c.hash=a):q.href=a):(t[c?"replaceState":"pushState"](e,"",a),h(),N=A);return m}return I||q.href.replace(/%27/g,"'")};m.state=function(){return A};var W=[],va=!1,O=null;m.onUrlChange=function(a){if(!va){if(d.history)C(b).on("popstate",g);C(b).on("hashchange",g);va=!0}W.push(a);return a};m.$$checkUrlChange=l;m.baseHref=function(){var a=ba.attr("href");return a?a.replace(/^(https?\:)?\/\/[^\/]*/,
""):""};var wa={},y="",ha=m.baseHref();m.cookies=function(a,b){var d,e,f,g;if(a)b===u?p.cookie=encodeURIComponent(a)+"=;path="+ha+";expires=Thu, 01 Jan 1970 00:00:00 GMT":x(b)&&(d=(p.cookie=encodeURIComponent(a)+"="+encodeURIComponent(b)+";path="+ha).length+1,4096<d&&c.warn("Cookie '"+a+"' possibly not set or overflowed because it was too large ("+d+" > 4096 bytes)!"));else{if(p.cookie!==y)for(y=p.cookie,d=y.split("; "),wa={},f=0;f<d.length;f++)e=d[f],g=e.indexOf("="),0<g&&(a=k(e.substring(0,g)),
wa[a]===u&&(wa[a]=k(e.substring(g+1))));return wa}};m.defer=function(a,b){var c;n++;c=r(function(){delete K[c];e(a)},b||0);K[c]=!0;return c};m.defer.cancel=function(a){return K[a]?(delete K[a],S(a),e(B),!0):!1}}function De(){this.$get=["$window","$log","$sniffer","$document",function(b,a,c,d){return new nf(b,d,a,c)}]}function Ee(){this.$get=function(){function b(b,d){function e(a){a!=p&&(q?q==a&&(q=a.n):q=a,f(a.n,a.p),f(a,p),p=a,p.n=null)}function f(a,b){a!=b&&(a&&(a.p=b),b&&(b.n=a))}if(b in a)throw M("$cacheFactory")("iid",
b);var g=0,h=w({},d,{id:b}),l={},k=d&&d.capacity||Number.MAX_VALUE,m={},p=null,q=null;return a[b]={put:function(a,b){if(k<Number.MAX_VALUE){var c=m[a]||(m[a]={key:a});e(c)}if(!z(b))return a in l||g++,l[a]=b,g>k&&this.remove(q.key),b},get:function(a){if(k<Number.MAX_VALUE){var b=m[a];if(!b)return;e(b)}return l[a]},remove:function(a){if(k<Number.MAX_VALUE){var b=m[a];if(!b)return;b==p&&(p=b.p);b==q&&(q=b.n);f(b.n,b.p);delete m[a]}delete l[a];g--},removeAll:function(){l={};g=0;m={};p=q=null},destroy:function(){m=
h=l=null;delete a[b]},info:function(){return w({},h,{size:g})}}}var a={};b.info=function(){var b={};s(a,function(a,e){b[e]=a.info()});return b};b.get=function(b){return a[b]};return b}}function Ve(){this.$get=["$cacheFactory",function(b){return b("templates")}]}function xc(b,a){function c(a,b){var c=/^\s*([@&]|=(\*?))(\??)\s*(\w*)\s*$/,d={};s(a,function(a,e){var f=a.match(c);if(!f)throw ia("iscp",b,e,a);d[e]={mode:f[1][0],collection:"*"===f[2],optional:"?"===f[3],attrName:f[4]||e}});return d}var d=
{},e=/^\s*directive\:\s*([\w\-]+)\s+(.*)$/,f=/(([\w\-]+)(?:\:([^;]+))?;?)/,g=Gd("ngSrc,ngSrcset,src,srcset"),h=/^(?:(\^\^?)?(\?)?(\^\^?)?)?/,l=/^(on[a-z]+|formaction)$/;this.directive=function p(a,e){Ma(a,"directive");x(a)?(Sb(e,"directiveFactory"),d.hasOwnProperty(a)||(d[a]=[],b.factory(a+"Directive",["$injector","$exceptionHandler",function(b,e){var f=[];s(d[a],function(d,g){try{var h=b.invoke(d);G(h)?h={compile:da(h)}:!h.compile&&h.link&&(h.compile=da(h.link));h.priority=h.priority||0;h.index=
g;h.name=h.name||a;h.require=h.require||h.controller&&h.name;h.restrict=h.restrict||"EA";J(h.scope)&&(h.$$isolateBindings=c(h.scope,h.name));f.push(h)}catch(l){e(l)}});return f}])),d[a].push(e)):s(a,lc(p));return this};this.aHrefSanitizationWhitelist=function(b){return y(b)?(a.aHrefSanitizationWhitelist(b),this):a.aHrefSanitizationWhitelist()};this.imgSrcSanitizationWhitelist=function(b){return y(b)?(a.imgSrcSanitizationWhitelist(b),this):a.imgSrcSanitizationWhitelist()};var k=!0;this.debugInfoEnabled=
function(a){return y(a)?(k=a,this):k};this.$get=["$injector","$interpolate","$exceptionHandler","$templateRequest","$parse","$controller","$rootScope","$document","$sce","$animate","$$sanitizeUri",function(a,b,c,r,S,K,n,D,H,v,A){function N(a,b){try{a.addClass(b)}catch(c){}}function F(a,b,c,d,e){a instanceof C||(a=C(a));s(a,function(b,c){b.nodeType==qb&&b.nodeValue.match(/\S+/)&&(a[c]=C(b).wrap("<span></span>").parent()[0])});var f=ba(a,b,a,c,d,e);F.$$addScopeClass(a);var g=null;return function(b,
c,d){Sb(b,"scope");d=d||{};var e=d.parentBoundTranscludeFn,h=d.transcludeControllers;d=d.futureParentElement;e&&e.$$boundTransclude&&(e=e.$$boundTransclude);g||(g=(d=d&&d[0])?"foreignobject"!==ta(d)&&d.toString().match(/SVG/)?"svg":"html":"html");d="html"!==g?C(Xb(g,C("<div>").append(a).html())):c?La.clone.call(a):a;if(h)for(var l in h)d.data("$"+l+"Controller",h[l].instance);F.$$addScopeInfo(d,b);c&&c(d,b);f&&f(b,d,d,e);return d}}function ba(a,b,c,d,e,f){function g(a,c,d,e){var f,l,k,q,p,r,D;if(n)for(D=
Array(c.length),q=0;q<h.length;q+=3)f=h[q],D[f]=c[f];else D=c;q=0;for(p=h.length;q<p;)l=D[h[q++]],c=h[q++],f=h[q++],c?(c.scope?(k=a.$new(),F.$$addScopeInfo(C(l),k)):k=a,r=c.transcludeOnThisElement?I(a,c.transclude,e,c.elementTranscludeOnThisElement):!c.templateOnThisElement&&e?e:!e&&b?I(a,b):null,c(f,k,l,d,r)):f&&f(a,l.childNodes,u,e)}for(var h=[],l,k,q,p,n,r=0;r<a.length;r++){l=new Yb;k=W(a[r],[],l,0===r?d:u,e);(f=k.length?y(k,a[r],l,b,c,null,[],[],f):null)&&f.scope&&F.$$addScopeClass(l.$$element);
l=f&&f.terminal||!(q=a[r].childNodes)||!q.length?null:ba(q,f?(f.transcludeOnThisElement||!f.templateOnThisElement)&&f.transclude:b);if(f||l)h.push(r,f,l),p=!0,n=n||f;f=null}return p?g:null}function I(a,b,c,d){return function(d,e,f,g,h){d||(d=a.$new(!1,h),d.$$transcluded=!0);return b(d,e,{parentBoundTranscludeFn:c,transcludeControllers:f,futureParentElement:g})}}function W(a,b,c,d,g){var h=c.$attr,l;switch(a.nodeType){case na:ha(b,ya(ta(a)),"E",d,g);for(var k,q,p,n=a.attributes,r=0,D=n&&n.length;r<
D;r++){var S=!1,t=!1;k=n[r];l=k.name;q=T(k.value);k=ya(l);if(p=Pa.test(k))l=l.replace(Sc,"").substr(8).replace(/_(.)/g,function(a,b){return b.toUpperCase()});var A=k.replace(/(Start|End)$/,"");fb(A)&&k===A+"Start"&&(S=l,t=l.substr(0,l.length-5)+"end",l=l.substr(0,l.length-6));k=ya(l.toLowerCase());h[k]=l;if(p||!c.hasOwnProperty(k))c[k]=q,Mc(a,k)&&(c[k]=!0);Aa(a,b,q,k,p);ha(b,k,"A",d,g,S,t)}a=a.className;J(a)&&(a=a.animVal);if(x(a)&&""!==a)for(;l=f.exec(a);)k=ya(l[2]),ha(b,k,"C",d,g)&&(c[k]=T(l[3])),
a=a.substr(l.index+l[0].length);break;case qb:P(b,a.nodeValue);break;case 8:try{if(l=e.exec(a.nodeValue))k=ya(l[1]),ha(b,k,"M",d,g)&&(c[k]=T(l[2]))}catch(v){}}b.sort(ca);return b}function va(a,b,c){var d=[],e=0;if(b&&a.hasAttribute&&a.hasAttribute(b)){do{if(!a)throw ia("uterdir",b,c);a.nodeType==na&&(a.hasAttribute(b)&&e++,a.hasAttribute(c)&&e--);d.push(a);a=a.nextSibling}while(0<e)}else d.push(a);return C(d)}function O(a,b,c){return function(d,e,f,g,h){e=va(e[0],b,c);return a(d,e,f,g,h)}}function y(a,
d,e,f,g,l,k,p,n){function r(a,b,c,d){if(a){c&&(a=O(a,c,d));a.require=L.require;a.directiveName=ca;if(I===L||L.$$isolateScope)a=Y(a,{isolateScope:!0});k.push(a)}if(b){c&&(b=O(b,c,d));b.require=L.require;b.directiveName=ca;if(I===L||L.$$isolateScope)b=Y(b,{isolateScope:!0});p.push(b)}}function D(a,b,c,d){var e,f="data",g=!1,l=c,k;if(x(b)){k=b.match(h);b=b.substring(k[0].length);k[3]&&(k[1]?k[3]=null:k[1]=k[3]);"^"===k[1]?f="inheritedData":"^^"===k[1]&&(f="inheritedData",l=c.parent());"?"===k[2]&&(g=
!0);e=null;d&&"data"===f&&(e=d[b])&&(e=e.instance);e=e||l[f]("$"+b+"Controller");if(!e&&!g)throw ia("ctreq",b,a);return e||null}E(b)&&(e=[],s(b,function(b){e.push(D(a,b,c,d))}));return e}function A(a,c,f,g,h){function l(a,b,c){var d;Va(a)||(c=b,b=a,a=u);B&&(d=N);c||(c=B?W.parent():W);return h(a,b,d,c,va)}var n,r,t,v,N,gb,W,O;d===f?(O=e,W=e.$$element):(W=C(f),O=new Yb(W,e));I&&(v=c.$new(!0));h&&(gb=l,gb.$$boundTransclude=h);H&&(ba={},N={},s(H,function(a){var b={$scope:a===I||a.$$isolateScope?v:c,$element:W,
$attrs:O,$transclude:gb};t=a.controller;"@"==t&&(t=O[a.name]);b=K(t,b,!0,a.controllerAs);N[a.name]=b;B||W.data("$"+a.name+"Controller",b.instance);ba[a.name]=b}));if(I){F.$$addScopeInfo(W,v,!0,!(ja&&(ja===I||ja===I.$$originalDirective)));F.$$addScopeClass(W,!0);g=ba&&ba[I.name];var xa=v;g&&g.identifier&&!0===I.bindToController&&(xa=g.instance);s(v.$$isolateBindings=I.$$isolateBindings,function(a,d){var e=a.attrName,f=a.optional,g,h,l,k;switch(a.mode){case "@":O.$observe(e,function(a){xa[d]=a});O.$$observers[e].$$scope=
c;O[e]&&(xa[d]=b(O[e])(c));break;case "=":if(f&&!O[e])break;h=S(O[e]);k=h.literal?ea:function(a,b){return a===b||a!==a&&b!==b};l=h.assign||function(){g=xa[d]=h(c);throw ia("nonassign",O[e],I.name);};g=xa[d]=h(c);f=function(a){k(a,xa[d])||(k(a,g)?l(c,a=xa[d]):xa[d]=a);return g=a};f.$stateful=!0;f=a.collection?c.$watchCollection(O[e],f):c.$watch(S(O[e],f),null,h.literal);v.$on("$destroy",f);break;case "&":h=S(O[e]),xa[d]=function(a){return h(c,a)}}})}ba&&(s(ba,function(a){a()}),ba=null);g=0;for(n=k.length;g<
n;g++)r=k[g],Z(r,r.isolateScope?v:c,W,O,r.require&&D(r.directiveName,r.require,W,N),gb);var va=c;I&&(I.template||null===I.templateUrl)&&(va=v);a&&a(va,f.childNodes,u,h);for(g=p.length-1;0<=g;g--)r=p[g],Z(r,r.isolateScope?v:c,W,O,r.require&&D(r.directiveName,r.require,W,N),gb)}n=n||{};for(var v=-Number.MAX_VALUE,N,H=n.controllerDirectives,ba,I=n.newIsolateScopeDirective,ja=n.templateDirective,wa=n.nonTlbTranscludeDirective,ha=!1,fb=!1,B=n.hasElementTranscludeDirective,w=e.$$element=C(d),L,ca,U,R=f,
P,Q=0,Aa=a.length;Q<Aa;Q++){L=a[Q];var Pa=L.$$start,$=L.$$end;Pa&&(w=va(d,Pa,$));U=u;if(v>L.priority)break;if(U=L.scope)L.templateUrl||(J(U)?(Oa("new/isolated scope",I||N,L,w),I=L):Oa("new/isolated scope",I,L,w)),N=N||L;ca=L.name;!L.templateUrl&&L.controller&&(U=L.controller,H=H||{},Oa("'"+ca+"' controller",H[ca],L,w),H[ca]=L);if(U=L.transclude)ha=!0,L.$$tlb||(Oa("transclusion",wa,L,w),wa=L),"element"==U?(B=!0,v=L.priority,U=w,w=e.$$element=C(X.createComment(" "+ca+": "+e[ca]+" ")),d=w[0],V(g,Za.call(U,
0),d),R=F(U,f,v,l&&l.name,{nonTlbTranscludeDirective:wa})):(U=C(Vb(d)).contents(),w.empty(),R=F(U,f));if(L.template)if(fb=!0,Oa("template",ja,L,w),ja=L,U=G(L.template)?L.template(w,e):L.template,U=Tc(U),L.replace){l=L;U=Tb.test(U)?Uc(Xb(L.templateNamespace,T(U))):[];d=U[0];if(1!=U.length||d.nodeType!==na)throw ia("tplrt",ca,"");V(g,w,d);Aa={$attr:{}};U=W(d,[],Aa);var of=a.splice(Q+1,a.length-(Q+1));I&&z(U);a=a.concat(U).concat(of);Rc(e,Aa);Aa=a.length}else w.html(U);if(L.templateUrl)fb=!0,Oa("template",
ja,L,w),ja=L,L.replace&&(l=L),A=M(a.splice(Q,a.length-Q),w,e,g,ha&&R,k,p,{controllerDirectives:H,newIsolateScopeDirective:I,templateDirective:ja,nonTlbTranscludeDirective:wa}),Aa=a.length;else if(L.compile)try{P=L.compile(w,e,R),G(P)?r(null,P,Pa,$):P&&r(P.pre,P.post,Pa,$)}catch(aa){c(aa,ua(w))}L.terminal&&(A.terminal=!0,v=Math.max(v,L.priority))}A.scope=N&&!0===N.scope;A.transcludeOnThisElement=ha;A.elementTranscludeOnThisElement=B;A.templateOnThisElement=fb;A.transclude=R;n.hasElementTranscludeDirective=
B;return A}function z(a){for(var b=0,c=a.length;b<c;b++)a[b]=Pb(a[b],{$$isolateScope:!0})}function ha(b,e,f,g,h,l,k){if(e===h)return null;h=null;if(d.hasOwnProperty(e)){var q;e=a.get(e+"Directive");for(var n=0,r=e.length;n<r;n++)try{q=e[n],(g===u||g>q.priority)&&-1!=q.restrict.indexOf(f)&&(l&&(q=Pb(q,{$$start:l,$$end:k})),b.push(q),h=q)}catch(D){c(D)}}return h}function fb(b){if(d.hasOwnProperty(b))for(var c=a.get(b+"Directive"),e=0,f=c.length;e<f;e++)if(b=c[e],b.multiElement)return!0;return!1}function Rc(a,
b){var c=b.$attr,d=a.$attr,e=a.$$element;s(a,function(d,e){"$"!=e.charAt(0)&&(b[e]&&b[e]!==d&&(d+=("style"===e?";":" ")+b[e]),a.$set(e,d,!0,c[e]))});s(b,function(b,f){"class"==f?(N(e,b),a["class"]=(a["class"]?a["class"]+" ":"")+b):"style"==f?(e.attr("style",e.attr("style")+";"+b),a.style=(a.style?a.style+";":"")+b):"$"==f.charAt(0)||a.hasOwnProperty(f)||(a[f]=b,d[f]=c[f])})}function M(a,b,c,d,e,f,g,h){var l=[],k,q,p=b[0],n=a.shift(),D=Pb(n,{templateUrl:null,transclude:null,replace:null,$$originalDirective:n}),
S=G(n.templateUrl)?n.templateUrl(b,c):n.templateUrl,t=n.templateNamespace;b.empty();r(H.getTrustedResourceUrl(S)).then(function(r){var A,v;r=Tc(r);if(n.replace){r=Tb.test(r)?Uc(Xb(t,T(r))):[];A=r[0];if(1!=r.length||A.nodeType!==na)throw ia("tplrt",n.name,S);r={$attr:{}};V(d,b,A);var H=W(A,[],r);J(n.scope)&&z(H);a=H.concat(a);Rc(c,r)}else A=p,b.html(r);a.unshift(D);k=y(a,A,c,e,b,n,f,g,h);s(d,function(a,c){a==A&&(d[c]=b[0])});for(q=ba(b[0].childNodes,e);l.length;){r=l.shift();v=l.shift();var F=l.shift(),
K=l.shift(),H=b[0];if(!r.$$destroyed){if(v!==p){var O=v.className;h.hasElementTranscludeDirective&&n.replace||(H=Vb(A));V(F,C(v),H);N(C(H),O)}v=k.transcludeOnThisElement?I(r,k.transclude,K):K;k(q,r,H,d,v)}}l=null});return function(a,b,c,d,e){a=e;b.$$destroyed||(l?l.push(b,c,d,a):(k.transcludeOnThisElement&&(a=I(b,k.transclude,e)),k(q,b,c,d,a)))}}function ca(a,b){var c=b.priority-a.priority;return 0!==c?c:a.name!==b.name?a.name<b.name?-1:1:a.index-b.index}function Oa(a,b,c,d){if(b)throw ia("multidir",
b.name,c.name,a,ua(d));}function P(a,c){var d=b(c,!0);d&&a.push({priority:0,compile:function(a){a=a.parent();var b=!!a.length;b&&F.$$addBindingClass(a);return function(a,c){var e=c.parent();b||F.$$addBindingClass(e);F.$$addBindingInfo(e,d.expressions);a.$watch(d,function(a){c[0].nodeValue=a})}}})}function Xb(a,b){a=R(a||"html");switch(a){case "svg":case "math":var c=X.createElement("div");c.innerHTML="<"+a+">"+b+"</"+a+">";return c.childNodes[0].childNodes;default:return b}}function Q(a,b){if("srcdoc"==
b)return H.HTML;var c=ta(a);if("xlinkHref"==b||"form"==c&&"action"==b||"img"!=c&&("src"==b||"ngSrc"==b))return H.RESOURCE_URL}function Aa(a,c,d,e,f){var h=Q(a,e);f=g[e]||f;var k=b(d,!0,h,f);if(k){if("multiple"===e&&"select"===ta(a))throw ia("selmulti",ua(a));c.push({priority:100,compile:function(){return{pre:function(a,c,g){c=g.$$observers||(g.$$observers={});if(l.test(e))throw ia("nodomevents");var n=g[e];n!==d&&(k=n&&b(n,!0,h,f),d=n);k&&(g[e]=k(a),(c[e]||(c[e]=[])).$$inter=!0,(g.$$observers&&g.$$observers[e].$$scope||
a).$watch(k,function(a,b){"class"===e&&a!=b?g.$updateClass(a,b):g.$set(e,a)}))}}}})}}function V(a,b,c){var d=b[0],e=b.length,f=d.parentNode,g,h;if(a)for(g=0,h=a.length;g<h;g++)if(a[g]==d){a[g++]=c;h=g+e-1;for(var l=a.length;g<l;g++,h++)h<l?a[g]=a[h]:delete a[g];a.length-=e-1;a.context===d&&(a.context=c);break}f&&f.replaceChild(c,d);a=X.createDocumentFragment();a.appendChild(d);C(c).data(C(d).data());ra?(Rb=!0,ra.cleanData([d])):delete C.cache[d[C.expando]];d=1;for(e=b.length;d<e;d++)f=b[d],C(f).remove(),
a.appendChild(f),delete b[d];b[0]=c;b.length=1}function Y(a,b){return w(function(){return a.apply(null,arguments)},a,b)}function Z(a,b,d,e,f,g){try{a(b,d,e,f,g)}catch(h){c(h,ua(d))}}var Yb=function(a,b){if(b){var c=Object.keys(b),d,e,f;d=0;for(e=c.length;d<e;d++)f=c[d],this[f]=b[f]}else this.$attr={};this.$$element=a};Yb.prototype={$normalize:ya,$addClass:function(a){a&&0<a.length&&v.addClass(this.$$element,a)},$removeClass:function(a){a&&0<a.length&&v.removeClass(this.$$element,a)},$updateClass:function(a,
b){var c=Vc(a,b);c&&c.length&&v.addClass(this.$$element,c);(c=Vc(b,a))&&c.length&&v.removeClass(this.$$element,c)},$set:function(a,b,d,e){var f=this.$$element[0],g=Mc(f,a),h=kf(f,a),f=a;g?(this.$$element.prop(a,b),e=g):h&&(this[h]=b,f=h);this[a]=b;e?this.$attr[a]=e:(e=this.$attr[a])||(this.$attr[a]=e=uc(a,"-"));g=ta(this.$$element);if("a"===g&&"href"===a||"img"===g&&"src"===a)this[a]=b=A(b,"src"===a);else if("img"===g&&"srcset"===a){for(var g="",h=T(b),l=/(\s+\d+x\s*,|\s+\d+w\s*,|\s+,|,\s+)/,l=/\s/.test(h)?
l:/(,)/,h=h.split(l),l=Math.floor(h.length/2),k=0;k<l;k++)var q=2*k,g=g+A(T(h[q]),!0),g=g+(" "+T(h[q+1]));h=T(h[2*k]).split(/\s/);g+=A(T(h[0]),!0);2===h.length&&(g+=" "+T(h[1]));this[a]=b=g}!1!==d&&(null===b||b===u?this.$$element.removeAttr(e):this.$$element.attr(e,b));(a=this.$$observers)&&s(a[f],function(a){try{a(b)}catch(d){c(d)}})},$observe:function(a,b){var c=this,d=c.$$observers||(c.$$observers=fa()),e=d[a]||(d[a]=[]);e.push(b);n.$evalAsync(function(){!e.$$inter&&c.hasOwnProperty(a)&&b(c[a])});
return function(){Xa(e,b)}}};var U=b.startSymbol(),ja=b.endSymbol(),Tc="{{"==U||"}}"==ja?oa:function(a){return a.replace(/\{\{/g,U).replace(/}}/g,ja)},Pa=/^ngAttr[A-Z]/;F.$$addBindingInfo=k?function(a,b){var c=a.data("$binding")||[];E(b)?c=c.concat(b):c.push(b);a.data("$binding",c)}:B;F.$$addBindingClass=k?function(a){N(a,"ng-binding")}:B;F.$$addScopeInfo=k?function(a,b,c,d){a.data(c?d?"$isolateScopeNoTemplate":"$isolateScope":"$scope",b)}:B;F.$$addScopeClass=k?function(a,b){N(a,b?"ng-isolate-scope":
"ng-scope")}:B;return F}]}function ya(b){return db(b.replace(Sc,""))}function Vc(b,a){var c="",d=b.split(/\s+/),e=a.split(/\s+/),f=0;a:for(;f<d.length;f++){for(var g=d[f],h=0;h<e.length;h++)if(g==e[h])continue a;c+=(0<c.length?" ":"")+g}return c}function Uc(b){b=C(b);var a=b.length;if(1>=a)return b;for(;a--;)8===b[a].nodeType&&pf.call(b,a,1);return b}function Fe(){var b={},a=!1,c=/^(\S+)(\s+as\s+(\w+))?$/;this.register=function(a,c){Ma(a,"controller");J(a)?w(b,a):b[a]=c};this.allowGlobals=function(){a=
!0};this.$get=["$injector","$window",function(d,e){function f(a,b,c,d){if(!a||!J(a.$scope))throw M("$controller")("noscp",d,b);a.$scope[b]=c}return function(g,h,l,k){var m,p,q;l=!0===l;k&&x(k)&&(q=k);if(x(g)){k=g.match(c);if(!k)throw qf("ctrlfmt",g);p=k[1];q=q||k[3];g=b.hasOwnProperty(p)?b[p]:wc(h.$scope,p,!0)||(a?wc(e,p,!0):u);tb(g,p,!0)}if(l)return l=(E(g)?g[g.length-1]:g).prototype,m=Object.create(l||null),q&&f(h,q,m,p||g.name),w(function(){d.invoke(g,m,h,p);return m},{instance:m,identifier:q});
m=d.instantiate(g,h,p);q&&f(h,q,m,p||g.name);return m}}]}function Ge(){this.$get=["$window",function(b){return C(b.document)}]}function He(){this.$get=["$log",function(b){return function(a,c){b.error.apply(b,arguments)}}]}function Zb(b,a){if(x(b)){var c=b.replace(rf,"").trim();if(c){var d=a("Content-Type");(d=d&&0===d.indexOf(Wc))||(d=(d=c.match(sf))&&tf[d[0]].test(c));d&&(b=pc(c))}}return b}function Xc(b){var a=fa(),c,d,e;if(!b)return a;s(b.split("\n"),function(b){e=b.indexOf(":");c=R(T(b.substr(0,
e)));d=T(b.substr(e+1));c&&(a[c]=a[c]?a[c]+", "+d:d)});return a}function Yc(b){var a=J(b)?b:u;return function(c){a||(a=Xc(b));return c?(c=a[R(c)],void 0===c&&(c=null),c):a}}function Zc(b,a,c,d){if(G(d))return d(b,a,c);s(d,function(d){b=d(b,a,c)});return b}function Ke(){var b=this.defaults={transformResponse:[Zb],transformRequest:[function(a){return J(a)&&"[object File]"!==Da.call(a)&&"[object Blob]"!==Da.call(a)&&"[object FormData]"!==Da.call(a)?$a(a):a}],headers:{common:{Accept:"application/json, text/plain, */*"},
post:qa($b),put:qa($b),patch:qa($b)},xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN"},a=!1;this.useApplyAsync=function(b){return y(b)?(a=!!b,this):a};var c=this.interceptors=[];this.$get=["$httpBackend","$browser","$cacheFactory","$rootScope","$q","$injector",function(d,e,f,g,h,l){function k(a){function c(a){var b=w({},a);b.data=a.data?Zc(a.data,a.headers,a.status,e.transformResponse):a.data;a=a.status;return 200<=a&&300>a?b:h.reject(b)}function d(a){var b,c={};s(a,function(a,d){G(a)?(b=
a(),null!=b&&(c[d]=b)):c[d]=a});return c}if(!aa.isObject(a))throw M("$http")("badreq",a);var e=w({method:"get",transformRequest:b.transformRequest,transformResponse:b.transformResponse},a);e.headers=function(a){var c=b.headers,e=w({},a.headers),f,g,c=w({},c.common,c[R(a.method)]);a:for(f in c){a=R(f);for(g in e)if(R(g)===a)continue a;e[f]=c[f]}return d(e)}(a);e.method=vb(e.method);var f=[function(a){var d=a.headers,e=Zc(a.data,Yc(d),u,a.transformRequest);z(e)&&s(d,function(a,b){"content-type"===R(b)&&
delete d[b]});z(a.withCredentials)&&!z(b.withCredentials)&&(a.withCredentials=b.withCredentials);return m(a,e).then(c,c)},u],g=h.when(e);for(s(t,function(a){(a.request||a.requestError)&&f.unshift(a.request,a.requestError);(a.response||a.responseError)&&f.push(a.response,a.responseError)});f.length;){a=f.shift();var l=f.shift(),g=g.then(a,l)}g.success=function(a){g.then(function(b){a(b.data,b.status,b.headers,e)});return g};g.error=function(a){g.then(null,function(b){a(b.data,b.status,b.headers,e)});
return g};return g}function m(c,f){function l(b,c,d,e){function f(){n(c,b,d,e)}N&&(200<=b&&300>b?N.put(I,[b,c,Xc(d),e]):N.remove(I));a?g.$applyAsync(f):(f(),g.$$phase||g.$apply())}function n(a,b,d,e){b=Math.max(b,0);(200<=b&&300>b?v.resolve:v.reject)({data:a,status:b,headers:Yc(d),config:c,statusText:e})}function m(a){n(a.data,a.status,qa(a.headers()),a.statusText)}function t(){var a=k.pendingRequests.indexOf(c);-1!==a&&k.pendingRequests.splice(a,1)}var v=h.defer(),A=v.promise,N,F,s=c.headers,I=p(c.url,
c.params);k.pendingRequests.push(c);A.then(t,t);!c.cache&&!b.cache||!1===c.cache||"GET"!==c.method&&"JSONP"!==c.method||(N=J(c.cache)?c.cache:J(b.cache)?b.cache:q);N&&(F=N.get(I),y(F)?F&&G(F.then)?F.then(m,m):E(F)?n(F[1],F[0],qa(F[2]),F[3]):n(F,200,{},"OK"):N.put(I,A));z(F)&&((F=$c(c.url)?e.cookies()[c.xsrfCookieName||b.xsrfCookieName]:u)&&(s[c.xsrfHeaderName||b.xsrfHeaderName]=F),d(c.method,I,f,l,s,c.timeout,c.withCredentials,c.responseType));return A}function p(a,b){if(!b)return a;var c=[];Ed(b,
function(a,b){null===a||z(a)||(E(a)||(a=[a]),s(a,function(a){J(a)&&(a=pa(a)?a.toISOString():$a(a));c.push(Fa(b)+"="+Fa(a))}))});0<c.length&&(a+=(-1==a.indexOf("?")?"?":"&")+c.join("&"));return a}var q=f("$http"),t=[];s(c,function(a){t.unshift(x(a)?l.get(a):l.invoke(a))});k.pendingRequests=[];(function(a){s(arguments,function(a){k[a]=function(b,c){return k(w(c||{},{method:a,url:b}))}})})("get","delete","head","jsonp");(function(a){s(arguments,function(a){k[a]=function(b,c,d){return k(w(d||{},{method:a,
url:b,data:c}))}})})("post","put","patch");k.defaults=b;return k}]}function uf(){return new P.XMLHttpRequest}function Le(){this.$get=["$browser","$window","$document",function(b,a,c){return vf(b,uf,b.defer,a.angular.callbacks,c[0])}]}function vf(b,a,c,d,e){function f(a,b,c){var f=e.createElement("script"),m=null;f.type="text/javascript";f.src=a;f.async=!0;m=function(a){f.removeEventListener("load",m,!1);f.removeEventListener("error",m,!1);e.body.removeChild(f);f=null;var g=-1,t="unknown";a&&("load"!==
a.type||d[b].called||(a={type:"error"}),t=a.type,g="error"===a.type?404:200);c&&c(g,t)};f.addEventListener("load",m,!1);f.addEventListener("error",m,!1);e.body.appendChild(f);return m}return function(e,h,l,k,m,p,q,t){function r(){n&&n();D&&D.abort()}function S(a,d,e,f,g){v!==u&&c.cancel(v);n=D=null;a(d,e,f,g);b.$$completeOutstandingRequest(B)}b.$$incOutstandingRequestCount();h=h||b.url();if("jsonp"==R(e)){var K="_"+(d.counter++).toString(36);d[K]=function(a){d[K].data=a;d[K].called=!0};var n=f(h.replace("JSON_CALLBACK",
"angular.callbacks."+K),K,function(a,b){S(k,a,d[K].data,"",b);d[K]=B})}else{var D=a();D.open(e,h,!0);s(m,function(a,b){y(a)&&D.setRequestHeader(b,a)});D.onload=function(){var a=D.statusText||"",b="response"in D?D.response:D.responseText,c=1223===D.status?204:D.status;0===c&&(c=b?200:"file"==Ba(h).protocol?404:0);S(k,c,b,D.getAllResponseHeaders(),a)};e=function(){S(k,-1,null,null,"")};D.onerror=e;D.onabort=e;q&&(D.withCredentials=!0);if(t)try{D.responseType=t}catch(H){if("json"!==t)throw H;}D.send(l||
null)}if(0<p)var v=c(r,p);else p&&G(p.then)&&p.then(r)}}function Ie(){var b="{{",a="}}";this.startSymbol=function(a){return a?(b=a,this):b};this.endSymbol=function(b){return b?(a=b,this):a};this.$get=["$parse","$exceptionHandler","$sce",function(c,d,e){function f(a){return"\\\\\\"+a}function g(f,g,t,r){function S(c){return c.replace(k,b).replace(m,a)}function K(a){try{var b=a;a=t?e.getTrusted(t,b):e.valueOf(b);var c;if(r&&!y(a))c=a;else if(null==a)c="";else{switch(typeof a){case "string":break;case "number":a=
""+a;break;default:a=$a(a)}c=a}return c}catch(g){c=ac("interr",f,g.toString()),d(c)}}r=!!r;for(var n,D,H=0,v=[],A=[],N=f.length,F=[],s=[];H<N;)if(-1!=(n=f.indexOf(b,H))&&-1!=(D=f.indexOf(a,n+h)))H!==n&&F.push(S(f.substring(H,n))),H=f.substring(n+h,D),v.push(H),A.push(c(H,K)),H=D+l,s.push(F.length),F.push("");else{H!==N&&F.push(S(f.substring(H)));break}if(t&&1<F.length)throw ac("noconcat",f);if(!g||v.length){var I=function(a){for(var b=0,c=v.length;b<c;b++){if(r&&z(a[b]))return;F[s[b]]=a[b]}return F.join("")};
return w(function(a){var b=0,c=v.length,e=Array(c);try{for(;b<c;b++)e[b]=A[b](a);return I(e)}catch(g){a=ac("interr",f,g.toString()),d(a)}},{exp:f,expressions:v,$$watchDelegate:function(a,b,c){var d;return a.$watchGroup(A,function(c,e){var f=I(c);G(b)&&b.call(this,f,c!==e?d:f,a);d=f},c)}})}}var h=b.length,l=a.length,k=new RegExp(b.replace(/./g,f),"g"),m=new RegExp(a.replace(/./g,f),"g");g.startSymbol=function(){return b};g.endSymbol=function(){return a};return g}]}function Je(){this.$get=["$rootScope",
"$window","$q","$$q",function(b,a,c,d){function e(e,h,l,k){var m=a.setInterval,p=a.clearInterval,q=0,t=y(k)&&!k,r=(t?d:c).defer(),S=r.promise;l=y(l)?l:0;S.then(null,null,e);S.$$intervalId=m(function(){r.notify(q++);0<l&&q>=l&&(r.resolve(q),p(S.$$intervalId),delete f[S.$$intervalId]);t||b.$apply()},h);f[S.$$intervalId]=r;return S}var f={};e.cancel=function(b){return b&&b.$$intervalId in f?(f[b.$$intervalId].reject("canceled"),a.clearInterval(b.$$intervalId),delete f[b.$$intervalId],!0):!1};return e}]}
function Rd(){this.$get=function(){return{id:"en-us",NUMBER_FORMATS:{DECIMAL_SEP:".",GROUP_SEP:",",PATTERNS:[{minInt:1,minFrac:0,maxFrac:3,posPre:"",posSuf:"",negPre:"-",negSuf:"",gSize:3,lgSize:3},{minInt:1,minFrac:2,maxFrac:2,posPre:"\u00a4",posSuf:"",negPre:"(\u00a4",negSuf:")",gSize:3,lgSize:3}],CURRENCY_SYM:"$"},DATETIME_FORMATS:{MONTH:"January February March April May June July August September October November December".split(" "),SHORTMONTH:"Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),
DAY:"Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),SHORTDAY:"Sun Mon Tue Wed Thu Fri Sat".split(" "),AMPMS:["AM","PM"],medium:"MMM d, y h:mm:ss a","short":"M/d/yy h:mm a",fullDate:"EEEE, MMMM d, y",longDate:"MMMM d, y",mediumDate:"MMM d, y",shortDate:"M/d/yy",mediumTime:"h:mm:ss a",shortTime:"h:mm a"},pluralCat:function(b){return 1===b?"one":"other"}}}}function bc(b){b=b.split("/");for(var a=b.length;a--;)b[a]=rb(b[a]);return b.join("/")}function ad(b,a){var c=Ba(b);a.$$protocol=
c.protocol;a.$$host=c.hostname;a.$$port=$(c.port)||wf[c.protocol]||null}function bd(b,a){var c="/"!==b.charAt(0);c&&(b="/"+b);var d=Ba(b);a.$$path=decodeURIComponent(c&&"/"===d.pathname.charAt(0)?d.pathname.substring(1):d.pathname);a.$$search=rc(d.search);a.$$hash=decodeURIComponent(d.hash);a.$$path&&"/"!=a.$$path.charAt(0)&&(a.$$path="/"+a.$$path)}function za(b,a){if(0===a.indexOf(b))return a.substr(b.length)}function Ha(b){var a=b.indexOf("#");return-1==a?b:b.substr(0,a)}function Gb(b){return b.replace(/(#.+)|#$/,
"$1")}function cc(b){return b.substr(0,Ha(b).lastIndexOf("/")+1)}function dc(b,a){this.$$html5=!0;a=a||"";var c=cc(b);ad(b,this);this.$$parse=function(a){var b=za(c,a);if(!x(b))throw Hb("ipthprfx",a,c);bd(b,this);this.$$path||(this.$$path="/");this.$$compose()};this.$$compose=function(){var a=Qb(this.$$search),b=this.$$hash?"#"+rb(this.$$hash):"";this.$$url=bc(this.$$path)+(a?"?"+a:"")+b;this.$$absUrl=c+this.$$url.substr(1)};this.$$parseLinkUrl=function(d,e){if(e&&"#"===e[0])return this.hash(e.slice(1)),
!0;var f,g;(f=za(b,d))!==u?(g=f,g=(f=za(a,f))!==u?c+(za("/",f)||f):b+g):(f=za(c,d))!==u?g=c+f:c==d+"/"&&(g=c);g&&this.$$parse(g);return!!g}}function ec(b,a){var c=cc(b);ad(b,this);this.$$parse=function(d){d=za(b,d)||za(c,d);var e;"#"===d.charAt(0)?(e=za(a,d),z(e)&&(e=d)):e=this.$$html5?d:"";bd(e,this);d=this.$$path;var f=/^\/[A-Z]:(\/.*)/;0===e.indexOf(b)&&(e=e.replace(b,""));f.exec(e)||(d=(e=f.exec(d))?e[1]:d);this.$$path=d;this.$$compose()};this.$$compose=function(){var c=Qb(this.$$search),e=this.$$hash?
"#"+rb(this.$$hash):"";this.$$url=bc(this.$$path)+(c?"?"+c:"")+e;this.$$absUrl=b+(this.$$url?a+this.$$url:"")};this.$$parseLinkUrl=function(a,c){return Ha(b)==Ha(a)?(this.$$parse(a),!0):!1}}function cd(b,a){this.$$html5=!0;ec.apply(this,arguments);var c=cc(b);this.$$parseLinkUrl=function(d,e){if(e&&"#"===e[0])return this.hash(e.slice(1)),!0;var f,g;b==Ha(d)?f=d:(g=za(c,d))?f=b+a+g:c===d+"/"&&(f=c);f&&this.$$parse(f);return!!f};this.$$compose=function(){var c=Qb(this.$$search),e=this.$$hash?"#"+rb(this.$$hash):
"";this.$$url=bc(this.$$path)+(c?"?"+c:"")+e;this.$$absUrl=b+a+this.$$url}}function Ib(b){return function(){return this[b]}}function dd(b,a){return function(c){if(z(c))return this[b];this[b]=a(c);this.$$compose();return this}}function Me(){var b="",a={enabled:!1,requireBase:!0,rewriteLinks:!0};this.hashPrefix=function(a){return y(a)?(b=a,this):b};this.html5Mode=function(b){return Wa(b)?(a.enabled=b,this):J(b)?(Wa(b.enabled)&&(a.enabled=b.enabled),Wa(b.requireBase)&&(a.requireBase=b.requireBase),Wa(b.rewriteLinks)&&
(a.rewriteLinks=b.rewriteLinks),this):a};this.$get=["$rootScope","$browser","$sniffer","$rootElement","$window",function(c,d,e,f,g){function h(a,b,c){var e=k.url(),f=k.$$state;try{d.url(a,b,c),k.$$state=d.state()}catch(g){throw k.url(e),k.$$state=f,g;}}function l(a,b){c.$broadcast("$locationChangeSuccess",k.absUrl(),a,k.$$state,b)}var k,m;m=d.baseHref();var p=d.url(),q;if(a.enabled){if(!m&&a.requireBase)throw Hb("nobase");q=p.substring(0,p.indexOf("/",p.indexOf("//")+2))+(m||"/");m=e.history?dc:cd}else q=
Ha(p),m=ec;k=new m(q,"#"+b);k.$$parseLinkUrl(p,p);k.$$state=d.state();var t=/^\s*(javascript|mailto):/i;f.on("click",function(b){if(a.rewriteLinks&&!b.ctrlKey&&!b.metaKey&&!b.shiftKey&&2!=b.which&&2!=b.button){for(var e=C(b.target);"a"!==ta(e[0]);)if(e[0]===f[0]||!(e=e.parent())[0])return;var h=e.prop("href"),l=e.attr("href")||e.attr("xlink:href");J(h)&&"[object SVGAnimatedString]"===h.toString()&&(h=Ba(h.animVal).href);t.test(h)||!h||e.attr("target")||b.isDefaultPrevented()||!k.$$parseLinkUrl(h,
l)||(b.preventDefault(),k.absUrl()!=d.url()&&(c.$apply(),g.angular["ff-684208-preventDefault"]=!0))}});Gb(k.absUrl())!=Gb(p)&&d.url(k.absUrl(),!0);var r=!0;d.onUrlChange(function(a,b){c.$evalAsync(function(){var d=k.absUrl(),e=k.$$state,f;k.$$parse(a);k.$$state=b;f=c.$broadcast("$locationChangeStart",a,d,b,e).defaultPrevented;k.absUrl()===a&&(f?(k.$$parse(d),k.$$state=e,h(d,!1,e)):(r=!1,l(d,e)))});c.$$phase||c.$digest()});c.$watch(function(){var a=Gb(d.url()),b=Gb(k.absUrl()),f=d.state(),g=k.$$replace,
q=a!==b||k.$$html5&&e.history&&f!==k.$$state;if(r||q)r=!1,c.$evalAsync(function(){var b=k.absUrl(),d=c.$broadcast("$locationChangeStart",b,a,k.$$state,f).defaultPrevented;k.absUrl()===b&&(d?(k.$$parse(a),k.$$state=f):(q&&h(b,g,f===k.$$state?null:k.$$state),l(a,f)))});k.$$replace=!1});return k}]}function Ne(){var b=!0,a=this;this.debugEnabled=function(a){return y(a)?(b=a,this):b};this.$get=["$window",function(c){function d(a){a instanceof Error&&(a.stack?a=a.message&&-1===a.stack.indexOf(a.message)?
"Error: "+a.message+"\n"+a.stack:a.stack:a.sourceURL&&(a=a.message+"\n"+a.sourceURL+":"+a.line));return a}function e(a){var b=c.console||{},e=b[a]||b.log||B;a=!1;try{a=!!e.apply}catch(l){}return a?function(){var a=[];s(arguments,function(b){a.push(d(b))});return e.apply(b,a)}:function(a,b){e(a,null==b?"":b)}}return{log:e("log"),info:e("info"),warn:e("warn"),error:e("error"),debug:function(){var c=e("debug");return function(){b&&c.apply(a,arguments)}}()}}]}function sa(b,a){if("__defineGetter__"===
b||"__defineSetter__"===b||"__lookupGetter__"===b||"__lookupSetter__"===b||"__proto__"===b)throw ka("isecfld",a);return b}function la(b,a){if(b){if(b.constructor===b)throw ka("isecfn",a);if(b.window===b)throw ka("isecwindow",a);if(b.children&&(b.nodeName||b.prop&&b.attr&&b.find))throw ka("isecdom",a);if(b===Object)throw ka("isecobj",a);}return b}function fc(b){return b.constant}function hb(b,a,c,d,e){la(b,e);la(a,e);c=c.split(".");for(var f,g=0;1<c.length;g++){f=sa(c.shift(),e);var h=0===g&&a&&a[f]||
b[f];h||(h={},b[f]=h);b=la(h,e)}f=sa(c.shift(),e);la(b[f],e);return b[f]=d}function Qa(b){return"constructor"==b}function ed(b,a,c,d,e,f,g){sa(b,f);sa(a,f);sa(c,f);sa(d,f);sa(e,f);var h=function(a){return la(a,f)},l=g||Qa(b)?h:oa,k=g||Qa(a)?h:oa,m=g||Qa(c)?h:oa,p=g||Qa(d)?h:oa,q=g||Qa(e)?h:oa;return function(f,g){var h=g&&g.hasOwnProperty(b)?g:f;if(null==h)return h;h=l(h[b]);if(!a)return h;if(null==h)return u;h=k(h[a]);if(!c)return h;if(null==h)return u;h=m(h[c]);if(!d)return h;if(null==h)return u;
h=p(h[d]);return e?null==h?u:h=q(h[e]):h}}function xf(b,a){return function(c,d){return b(c,d,la,a)}}function yf(b,a,c){var d=a.expensiveChecks,e=d?zf:Af,f=e[b];if(f)return f;var g=b.split("."),h=g.length;if(a.csp)f=6>h?ed(g[0],g[1],g[2],g[3],g[4],c,d):function(a,b){var e=0,f;do f=ed(g[e++],g[e++],g[e++],g[e++],g[e++],c,d)(a,b),b=u,a=f;while(e<h);return f};else{var l="";d&&(l+="s = eso(s, fe);\nl = eso(l, fe);\n");var k=d;s(g,function(a,b){sa(a,c);var e=(b?"s":'((l&&l.hasOwnProperty("'+a+'"))?l:s)')+
"."+a;if(d||Qa(a))e="eso("+e+", fe)",k=!0;l+="if(s == null) return undefined;\ns="+e+";\n"});l+="return s;";a=new Function("s","l","eso","fe",l);a.toString=da(l);k&&(a=xf(a,c));f=a}f.sharedGetter=!0;f.assign=function(a,c,d){return hb(a,d,b,c,b)};return e[b]=f}function gc(b){return G(b.valueOf)?b.valueOf():Bf.call(b)}function Oe(){var b=fa(),a=fa();this.$get=["$filter","$sniffer",function(c,d){function e(a){var b=a;a.sharedGetter&&(b=function(b,c){return a(b,c)},b.literal=a.literal,b.constant=a.constant,
b.assign=a.assign);return b}function f(a,b){for(var c=0,d=a.length;c<d;c++){var e=a[c];e.constant||(e.inputs?f(e.inputs,b):-1===b.indexOf(e)&&b.push(e))}return b}function g(a,b){return null==a||null==b?a===b:"object"===typeof a&&(a=gc(a),"object"===typeof a)?!1:a===b||a!==a&&b!==b}function h(a,b,c,d){var e=d.$$inputs||(d.$$inputs=f(d.inputs,[])),h;if(1===e.length){var l=g,e=e[0];return a.$watch(function(a){var b=e(a);g(b,l)||(h=d(a),l=b&&gc(b));return h},b,c)}for(var k=[],q=0,p=e.length;q<p;q++)k[q]=
g;return a.$watch(function(a){for(var b=!1,c=0,f=e.length;c<f;c++){var l=e[c](a);if(b||(b=!g(l,k[c])))k[c]=l&&gc(l)}b&&(h=d(a));return h},b,c)}function l(a,b,c,d){var e,f;return e=a.$watch(function(a){return d(a)},function(a,c,d){f=a;G(b)&&b.apply(this,arguments);y(a)&&d.$$postDigest(function(){y(f)&&e()})},c)}function k(a,b,c,d){function e(a){var b=!0;s(a,function(a){y(a)||(b=!1)});return b}var f,g;return f=a.$watch(function(a){return d(a)},function(a,c,d){g=a;G(b)&&b.call(this,a,c,d);e(a)&&d.$$postDigest(function(){e(g)&&
f()})},c)}function m(a,b,c,d){var e;return e=a.$watch(function(a){return d(a)},function(a,c,d){G(b)&&b.apply(this,arguments);e()},c)}function p(a,b){if(!b)return a;var c=a.$$watchDelegate,c=c!==k&&c!==l?function(c,d){var e=a(c,d);return b(e,c,d)}:function(c,d){var e=a(c,d),f=b(e,c,d);return y(e)?f:e};a.$$watchDelegate&&a.$$watchDelegate!==h?c.$$watchDelegate=a.$$watchDelegate:b.$stateful||(c.$$watchDelegate=h,c.inputs=[a]);return c}var q={csp:d.csp,expensiveChecks:!1},t={csp:d.csp,expensiveChecks:!0};
return function(d,f,g){var n,D,H;switch(typeof d){case "string":H=d=d.trim();var v=g?a:b;n=v[H];n||(":"===d.charAt(0)&&":"===d.charAt(1)&&(D=!0,d=d.substring(2)),g=g?t:q,n=new hc(g),n=(new ib(n,c,g)).parse(d),n.constant?n.$$watchDelegate=m:D?(n=e(n),n.$$watchDelegate=n.literal?k:l):n.inputs&&(n.$$watchDelegate=h),v[H]=n);return p(n,f);case "function":return p(d,f);default:return p(B,f)}}}]}function Qe(){this.$get=["$rootScope","$exceptionHandler",function(b,a){return fd(function(a){b.$evalAsync(a)},
a)}]}function Re(){this.$get=["$browser","$exceptionHandler",function(b,a){return fd(function(a){b.defer(a)},a)}]}function fd(b,a){function c(a,b,c){function d(b){return function(c){e||(e=!0,b.call(a,c))}}var e=!1;return[d(b),d(c)]}function d(){this.$$state={status:0}}function e(a,b){return function(c){b.call(a,c)}}function f(c){!c.processScheduled&&c.pending&&(c.processScheduled=!0,b(function(){var b,d,e;e=c.pending;c.processScheduled=!1;c.pending=u;for(var f=0,g=e.length;f<g;++f){d=e[f][0];b=e[f][c.status];
try{G(b)?d.resolve(b(c.value)):1===c.status?d.resolve(c.value):d.reject(c.value)}catch(h){d.reject(h),a(h)}}}))}function g(){this.promise=new d;this.resolve=e(this,this.resolve);this.reject=e(this,this.reject);this.notify=e(this,this.notify)}var h=M("$q",TypeError);d.prototype={then:function(a,b,c){var d=new g;this.$$state.pending=this.$$state.pending||[];this.$$state.pending.push([d,a,b,c]);0<this.$$state.status&&f(this.$$state);return d.promise},"catch":function(a){return this.then(null,a)},"finally":function(a,
b){return this.then(function(b){return k(b,!0,a)},function(b){return k(b,!1,a)},b)}};g.prototype={resolve:function(a){this.promise.$$state.status||(a===this.promise?this.$$reject(h("qcycle",a)):this.$$resolve(a))},$$resolve:function(b){var d,e;e=c(this,this.$$resolve,this.$$reject);try{if(J(b)||G(b))d=b&&b.then;G(d)?(this.promise.$$state.status=-1,d.call(b,e[0],e[1],this.notify)):(this.promise.$$state.value=b,this.promise.$$state.status=1,f(this.promise.$$state))}catch(g){e[1](g),a(g)}},reject:function(a){this.promise.$$state.status||
this.$$reject(a)},$$reject:function(a){this.promise.$$state.value=a;this.promise.$$state.status=2;f(this.promise.$$state)},notify:function(c){var d=this.promise.$$state.pending;0>=this.promise.$$state.status&&d&&d.length&&b(function(){for(var b,e,f=0,g=d.length;f<g;f++){e=d[f][0];b=d[f][3];try{e.notify(G(b)?b(c):c)}catch(h){a(h)}}})}};var l=function(a,b){var c=new g;b?c.resolve(a):c.reject(a);return c.promise},k=function(a,b,c){var d=null;try{G(c)&&(d=c())}catch(e){return l(e,!1)}return d&&G(d.then)?
d.then(function(){return l(a,b)},function(a){return l(a,!1)}):l(a,b)},m=function(a,b,c,d){var e=new g;e.resolve(a);return e.promise.then(b,c,d)},p=function t(a){if(!G(a))throw h("norslvr",a);if(!(this instanceof t))return new t(a);var b=new g;a(function(a){b.resolve(a)},function(a){b.reject(a)});return b.promise};p.defer=function(){return new g};p.reject=function(a){var b=new g;b.reject(a);return b.promise};p.when=m;p.all=function(a){var b=new g,c=0,d=E(a)?[]:{};s(a,function(a,e){c++;m(a).then(function(a){d.hasOwnProperty(e)||
(d[e]=a,--c||b.resolve(d))},function(a){d.hasOwnProperty(e)||b.reject(a)})});0===c&&b.resolve(d);return b.promise};return p}function $e(){this.$get=["$window","$timeout",function(b,a){var c=b.requestAnimationFrame||b.webkitRequestAnimationFrame,d=b.cancelAnimationFrame||b.webkitCancelAnimationFrame||b.webkitCancelRequestAnimationFrame,e=!!c,f=e?function(a){var b=c(a);return function(){d(b)}}:function(b){var c=a(b,16.66,!1);return function(){a.cancel(c)}};f.supported=e;return f}]}function Pe(){var b=
10,a=M("$rootScope"),c=null,d=null;this.digestTtl=function(a){arguments.length&&(b=a);return b};this.$get=["$injector","$exceptionHandler","$parse","$browser",function(e,f,g,h){function l(){this.$id=++ob;this.$$phase=this.$parent=this.$$watchers=this.$$nextSibling=this.$$prevSibling=this.$$childHead=this.$$childTail=null;this.$root=this;this.$$destroyed=!1;this.$$listeners={};this.$$listenerCount={};this.$$isolateBindings=null}function k(b){if(r.$$phase)throw a("inprog",r.$$phase);r.$$phase=b}function m(a,
b,c){do a.$$listenerCount[c]-=b,0===a.$$listenerCount[c]&&delete a.$$listenerCount[c];while(a=a.$parent)}function p(){}function q(){for(;n.length;)try{n.shift()()}catch(a){f(a)}d=null}function t(){null===d&&(d=h.defer(function(){r.$apply(q)}))}l.prototype={constructor:l,$new:function(a,b){function c(){d.$$destroyed=!0}var d;b=b||this;a?(d=new l,d.$root=this.$root):(this.$$ChildScope||(this.$$ChildScope=function(){this.$$watchers=this.$$nextSibling=this.$$childHead=this.$$childTail=null;this.$$listeners=
{};this.$$listenerCount={};this.$id=++ob;this.$$ChildScope=null},this.$$ChildScope.prototype=this),d=new this.$$ChildScope);d.$parent=b;d.$$prevSibling=b.$$childTail;b.$$childHead?(b.$$childTail.$$nextSibling=d,b.$$childTail=d):b.$$childHead=b.$$childTail=d;(a||b!=this)&&d.$on("$destroy",c);return d},$watch:function(a,b,d){var e=g(a);if(e.$$watchDelegate)return e.$$watchDelegate(this,b,d,e);var f=this.$$watchers,h={fn:b,last:p,get:e,exp:a,eq:!!d};c=null;G(b)||(h.fn=B);f||(f=this.$$watchers=[]);f.unshift(h);
return function(){Xa(f,h);c=null}},$watchGroup:function(a,b){function c(){h=!1;l?(l=!1,b(e,e,g)):b(e,d,g)}var d=Array(a.length),e=Array(a.length),f=[],g=this,h=!1,l=!0;if(!a.length){var k=!0;g.$evalAsync(function(){k&&b(e,e,g)});return function(){k=!1}}if(1===a.length)return this.$watch(a[0],function(a,c,f){e[0]=a;d[0]=c;b(e,a===c?e:d,f)});s(a,function(a,b){var l=g.$watch(a,function(a,f){e[b]=a;d[b]=f;h||(h=!0,g.$evalAsync(c))});f.push(l)});return function(){for(;f.length;)f.shift()()}},$watchCollection:function(a,
b){function c(a){e=a;var b,d,g,h;if(!z(e)){if(J(e))if(Ta(e))for(f!==q&&(f=q,t=f.length=0,k++),a=e.length,t!==a&&(k++,f.length=t=a),b=0;b<a;b++)h=f[b],g=e[b],d=h!==h&&g!==g,d||h===g||(k++,f[b]=g);else{f!==m&&(f=m={},t=0,k++);a=0;for(b in e)e.hasOwnProperty(b)&&(a++,g=e[b],h=f[b],b in f?(d=h!==h&&g!==g,d||h===g||(k++,f[b]=g)):(t++,f[b]=g,k++));if(t>a)for(b in k++,f)e.hasOwnProperty(b)||(t--,delete f[b])}else f!==e&&(f=e,k++);return k}}c.$stateful=!0;var d=this,e,f,h,l=1<b.length,k=0,p=g(a,c),q=[],m=
{},n=!0,t=0;return this.$watch(p,function(){n?(n=!1,b(e,e,d)):b(e,h,d);if(l)if(J(e))if(Ta(e)){h=Array(e.length);for(var a=0;a<e.length;a++)h[a]=e[a]}else for(a in h={},e)sc.call(e,a)&&(h[a]=e[a]);else h=e})},$digest:function(){var e,g,l,m,n,t,s=b,I,W=[],y,O;k("$digest");h.$$checkUrlChange();this===r&&null!==d&&(h.defer.cancel(d),q());c=null;do{t=!1;for(I=this;S.length;){try{O=S.shift(),O.scope.$eval(O.expression,O.locals)}catch(w){f(w)}c=null}a:do{if(m=I.$$watchers)for(n=m.length;n--;)try{if(e=m[n])if((g=
e.get(I))!==(l=e.last)&&!(e.eq?ea(g,l):"number"===typeof g&&"number"===typeof l&&isNaN(g)&&isNaN(l)))t=!0,c=e,e.last=e.eq?Ea(g,null):g,e.fn(g,l===p?g:l,I),5>s&&(y=4-s,W[y]||(W[y]=[]),W[y].push({msg:G(e.exp)?"fn: "+(e.exp.name||e.exp.toString()):e.exp,newVal:g,oldVal:l}));else if(e===c){t=!1;break a}}catch(C){f(C)}if(!(m=I.$$childHead||I!==this&&I.$$nextSibling))for(;I!==this&&!(m=I.$$nextSibling);)I=I.$parent}while(I=m);if((t||S.length)&&!s--)throw r.$$phase=null,a("infdig",b,W);}while(t||S.length);
for(r.$$phase=null;u.length;)try{u.shift()()}catch(B){f(B)}},$destroy:function(){if(!this.$$destroyed){var a=this.$parent;this.$broadcast("$destroy");this.$$destroyed=!0;if(this!==r){for(var b in this.$$listenerCount)m(this,this.$$listenerCount[b],b);a.$$childHead==this&&(a.$$childHead=this.$$nextSibling);a.$$childTail==this&&(a.$$childTail=this.$$prevSibling);this.$$prevSibling&&(this.$$prevSibling.$$nextSibling=this.$$nextSibling);this.$$nextSibling&&(this.$$nextSibling.$$prevSibling=this.$$prevSibling);
this.$destroy=this.$digest=this.$apply=this.$evalAsync=this.$applyAsync=B;this.$on=this.$watch=this.$watchGroup=function(){return B};this.$$listeners={};this.$parent=this.$$nextSibling=this.$$prevSibling=this.$$childHead=this.$$childTail=this.$root=this.$$watchers=null}}},$eval:function(a,b){return g(a)(this,b)},$evalAsync:function(a,b){r.$$phase||S.length||h.defer(function(){S.length&&r.$digest()});S.push({scope:this,expression:a,locals:b})},$$postDigest:function(a){u.push(a)},$apply:function(a){try{return k("$apply"),
this.$eval(a)}catch(b){f(b)}finally{r.$$phase=null;try{r.$digest()}catch(c){throw f(c),c;}}},$applyAsync:function(a){function b(){c.$eval(a)}var c=this;a&&n.push(b);t()},$on:function(a,b){var c=this.$$listeners[a];c||(this.$$listeners[a]=c=[]);c.push(b);var d=this;do d.$$listenerCount[a]||(d.$$listenerCount[a]=0),d.$$listenerCount[a]++;while(d=d.$parent);var e=this;return function(){var d=c.indexOf(b);-1!==d&&(c[d]=null,m(e,1,a))}},$emit:function(a,b){var c=[],d,e=this,g=!1,h={name:a,targetScope:e,
stopPropagation:function(){g=!0},preventDefault:function(){h.defaultPrevented=!0},defaultPrevented:!1},l=Ya([h],arguments,1),k,m;do{d=e.$$listeners[a]||c;h.currentScope=e;k=0;for(m=d.length;k<m;k++)if(d[k])try{d[k].apply(null,l)}catch(p){f(p)}else d.splice(k,1),k--,m--;if(g)return h.currentScope=null,h;e=e.$parent}while(e);h.currentScope=null;return h},$broadcast:function(a,b){var c=this,d=this,e={name:a,targetScope:this,preventDefault:function(){e.defaultPrevented=!0},defaultPrevented:!1};if(!this.$$listenerCount[a])return e;
for(var g=Ya([e],arguments,1),h,l;c=d;){e.currentScope=c;d=c.$$listeners[a]||[];h=0;for(l=d.length;h<l;h++)if(d[h])try{d[h].apply(null,g)}catch(k){f(k)}else d.splice(h,1),h--,l--;if(!(d=c.$$listenerCount[a]&&c.$$childHead||c!==this&&c.$$nextSibling))for(;c!==this&&!(d=c.$$nextSibling);)c=c.$parent}e.currentScope=null;return e}};var r=new l,S=r.$$asyncQueue=[],u=r.$$postDigestQueue=[],n=r.$$applyAsyncQueue=[];return r}]}function Sd(){var b=/^\s*(https?|ftp|mailto|tel|file):/,a=/^\s*((https?|ftp|file|blob):|data:image\/)/;
this.aHrefSanitizationWhitelist=function(a){return y(a)?(b=a,this):b};this.imgSrcSanitizationWhitelist=function(b){return y(b)?(a=b,this):a};this.$get=function(){return function(c,d){var e=d?a:b,f;f=Ba(c).href;return""===f||f.match(e)?c:"unsafe:"+f}}}function Cf(b){if("self"===b)return b;if(x(b)){if(-1<b.indexOf("***"))throw Ca("iwcard",b);b=gd(b).replace("\\*\\*",".*").replace("\\*","[^:/.?&;]*");return new RegExp("^"+b+"$")}if(pb(b))return new RegExp("^"+b.source+"$");throw Ca("imatcher");}function hd(b){var a=
[];y(b)&&s(b,function(b){a.push(Cf(b))});return a}function Te(){this.SCE_CONTEXTS=ma;var b=["self"],a=[];this.resourceUrlWhitelist=function(a){arguments.length&&(b=hd(a));return b};this.resourceUrlBlacklist=function(b){arguments.length&&(a=hd(b));return a};this.$get=["$injector",function(c){function d(a,b){return"self"===a?$c(b):!!a.exec(b.href)}function e(a){var b=function(a){this.$$unwrapTrustedValue=function(){return a}};a&&(b.prototype=new a);b.prototype.valueOf=function(){return this.$$unwrapTrustedValue()};
b.prototype.toString=function(){return this.$$unwrapTrustedValue().toString()};return b}var f=function(a){throw Ca("unsafe");};c.has("$sanitize")&&(f=c.get("$sanitize"));var g=e(),h={};h[ma.HTML]=e(g);h[ma.CSS]=e(g);h[ma.URL]=e(g);h[ma.JS]=e(g);h[ma.RESOURCE_URL]=e(h[ma.URL]);return{trustAs:function(a,b){var c=h.hasOwnProperty(a)?h[a]:null;if(!c)throw Ca("icontext",a,b);if(null===b||b===u||""===b)return b;if("string"!==typeof b)throw Ca("itype",a);return new c(b)},getTrusted:function(c,e){if(null===
e||e===u||""===e)return e;var g=h.hasOwnProperty(c)?h[c]:null;if(g&&e instanceof g)return e.$$unwrapTrustedValue();if(c===ma.RESOURCE_URL){var g=Ba(e.toString()),p,q,t=!1;p=0;for(q=b.length;p<q;p++)if(d(b[p],g)){t=!0;break}if(t)for(p=0,q=a.length;p<q;p++)if(d(a[p],g)){t=!1;break}if(t)return e;throw Ca("insecurl",e.toString());}if(c===ma.HTML)return f(e);throw Ca("unsafe");},valueOf:function(a){return a instanceof g?a.$$unwrapTrustedValue():a}}}]}function Se(){var b=!0;this.enabled=function(a){arguments.length&&
(b=!!a);return b};this.$get=["$parse","$sceDelegate",function(a,c){if(b&&8>Ra)throw Ca("iequirks");var d=qa(ma);d.isEnabled=function(){return b};d.trustAs=c.trustAs;d.getTrusted=c.getTrusted;d.valueOf=c.valueOf;b||(d.trustAs=d.getTrusted=function(a,b){return b},d.valueOf=oa);d.parseAs=function(b,c){var e=a(c);return e.literal&&e.constant?e:a(c,function(a){return d.getTrusted(b,a)})};var e=d.parseAs,f=d.getTrusted,g=d.trustAs;s(ma,function(a,b){var c=R(b);d[db("parse_as_"+c)]=function(b){return e(a,
b)};d[db("get_trusted_"+c)]=function(b){return f(a,b)};d[db("trust_as_"+c)]=function(b){return g(a,b)}});return d}]}function Ue(){this.$get=["$window","$document",function(b,a){var c={},d=$((/android (\d+)/.exec(R((b.navigator||{}).userAgent))||[])[1]),e=/Boxee/i.test((b.navigator||{}).userAgent),f=a[0]||{},g,h=/^(Moz|webkit|ms)(?=[A-Z])/,l=f.body&&f.body.style,k=!1,m=!1;if(l){for(var p in l)if(k=h.exec(p)){g=k[0];g=g.substr(0,1).toUpperCase()+g.substr(1);break}g||(g="WebkitOpacity"in l&&"webkit");
k=!!("transition"in l||g+"Transition"in l);m=!!("animation"in l||g+"Animation"in l);!d||k&&m||(k=x(f.body.style.webkitTransition),m=x(f.body.style.webkitAnimation))}return{history:!(!b.history||!b.history.pushState||4>d||e),hasEvent:function(a){if("input"===a&&11>=Ra)return!1;if(z(c[a])){var b=f.createElement("div");c[a]="on"+a in b}return c[a]},csp:bb(),vendorPrefix:g,transitions:k,animations:m,android:d}}]}function We(){this.$get=["$templateCache","$http","$q",function(b,a,c){function d(e,f){d.totalPendingRequests++;
var g=a.defaults&&a.defaults.transformResponse;E(g)?g=g.filter(function(a){return a!==Zb}):g===Zb&&(g=null);return a.get(e,{cache:b,transformResponse:g}).finally(function(){d.totalPendingRequests--}).then(function(a){return a.data},function(a){if(!f)throw ia("tpload",e);return c.reject(a)})}d.totalPendingRequests=0;return d}]}function Xe(){this.$get=["$rootScope","$browser","$location",function(b,a,c){return{findBindings:function(a,b,c){a=a.getElementsByClassName("ng-binding");var g=[];s(a,function(a){var d=
aa.element(a).data("$binding");d&&s(d,function(d){c?(new RegExp("(^|\\s)"+gd(b)+"(\\s|\\||$)")).test(d)&&g.push(a):-1!=d.indexOf(b)&&g.push(a)})});return g},findModels:function(a,b,c){for(var g=["ng-","data-ng-","ng\\:"],h=0;h<g.length;++h){var l=a.querySelectorAll("["+g[h]+"model"+(c?"=":"*=")+'"'+b+'"]');if(l.length)return l}},getLocation:function(){return c.url()},setLocation:function(a){a!==c.url()&&(c.url(a),b.$digest())},whenStable:function(b){a.notifyWhenNoOutstandingRequests(b)}}}]}function Ye(){this.$get=
["$rootScope","$browser","$q","$$q","$exceptionHandler",function(b,a,c,d,e){function f(f,l,k){var m=y(k)&&!k,p=(m?d:c).defer(),q=p.promise;l=a.defer(function(){try{p.resolve(f())}catch(a){p.reject(a),e(a)}finally{delete g[q.$$timeoutId]}m||b.$apply()},l);q.$$timeoutId=l;g[l]=p;return q}var g={};f.cancel=function(b){return b&&b.$$timeoutId in g?(g[b.$$timeoutId].reject("canceled"),delete g[b.$$timeoutId],a.defer.cancel(b.$$timeoutId)):!1};return f}]}function Ba(b){Ra&&(Y.setAttribute("href",b),b=Y.href);
Y.setAttribute("href",b);return{href:Y.href,protocol:Y.protocol?Y.protocol.replace(/:$/,""):"",host:Y.host,search:Y.search?Y.search.replace(/^\?/,""):"",hash:Y.hash?Y.hash.replace(/^#/,""):"",hostname:Y.hostname,port:Y.port,pathname:"/"===Y.pathname.charAt(0)?Y.pathname:"/"+Y.pathname}}function $c(b){b=x(b)?Ba(b):b;return b.protocol===id.protocol&&b.host===id.host}function Ze(){this.$get=da(P)}function Ec(b){function a(c,d){if(J(c)){var e={};s(c,function(b,c){e[c]=a(c,b)});return e}return b.factory(c+
"Filter",d)}this.register=a;this.$get=["$injector",function(a){return function(b){return a.get(b+"Filter")}}];a("currency",jd);a("date",kd);a("filter",Df);a("json",Ef);a("limitTo",Ff);a("lowercase",Gf);a("number",ld);a("orderBy",md);a("uppercase",Hf)}function Df(){return function(b,a,c){if(!E(b))return b;var d;switch(typeof a){case "function":break;case "boolean":case "number":case "string":d=!0;case "object":a=If(a,c,d);break;default:return b}return b.filter(a)}}function If(b,a,c){var d=J(b)&&"$"in
b;!0===a?a=ea:G(a)||(a=function(a,b){if(J(a)||J(b))return!1;a=R(""+a);b=R(""+b);return-1!==a.indexOf(b)});return function(e){return d&&!J(e)?Ia(e,b.$,a,!1):Ia(e,b,a,c)}}function Ia(b,a,c,d,e){var f=typeof b,g=typeof a;if("string"===g&&"!"===a.charAt(0))return!Ia(b,a.substring(1),c,d);if(E(b))return b.some(function(b){return Ia(b,a,c,d)});switch(f){case "object":var h;if(d){for(h in b)if("$"!==h.charAt(0)&&Ia(b[h],a,c,!0))return!0;return e?!1:Ia(b,a,c,!1)}if("object"===g){for(h in a)if(e=a[h],!G(e)&&
(f="$"===h,!Ia(f?b:b[h],e,c,f,f)))return!1;return!0}return c(b,a);case "function":return!1;default:return c(b,a)}}function jd(b){var a=b.NUMBER_FORMATS;return function(b,d,e){z(d)&&(d=a.CURRENCY_SYM);z(e)&&(e=a.PATTERNS[1].maxFrac);return null==b?b:nd(b,a.PATTERNS[1],a.GROUP_SEP,a.DECIMAL_SEP,e).replace(/\u00A4/g,d)}}function ld(b){var a=b.NUMBER_FORMATS;return function(b,d){return null==b?b:nd(b,a.PATTERNS[0],a.GROUP_SEP,a.DECIMAL_SEP,d)}}function nd(b,a,c,d,e){if(!isFinite(b)||J(b))return"";var f=
0>b;b=Math.abs(b);var g=b+"",h="",l=[],k=!1;if(-1!==g.indexOf("e")){var m=g.match(/([\d\.]+)e(-?)(\d+)/);m&&"-"==m[2]&&m[3]>e+1?b=0:(h=g,k=!0)}if(k)0<e&&1>b&&(h=b.toFixed(e),b=parseFloat(h));else{g=(g.split(od)[1]||"").length;z(e)&&(e=Math.min(Math.max(a.minFrac,g),a.maxFrac));b=+(Math.round(+(b.toString()+"e"+e)).toString()+"e"+-e);var g=(""+b).split(od),k=g[0],g=g[1]||"",p=0,q=a.lgSize,t=a.gSize;if(k.length>=q+t)for(p=k.length-q,m=0;m<p;m++)0===(p-m)%t&&0!==m&&(h+=c),h+=k.charAt(m);for(m=p;m<k.length;m++)0===
(k.length-m)%q&&0!==m&&(h+=c),h+=k.charAt(m);for(;g.length<e;)g+="0";e&&"0"!==e&&(h+=d+g.substr(0,e))}0===b&&(f=!1);l.push(f?a.negPre:a.posPre,h,f?a.negSuf:a.posSuf);return l.join("")}function Jb(b,a,c){var d="";0>b&&(d="-",b=-b);for(b=""+b;b.length<a;)b="0"+b;c&&(b=b.substr(b.length-a));return d+b}function Z(b,a,c,d){c=c||0;return function(e){e=e["get"+b]();if(0<c||e>-c)e+=c;0===e&&-12==c&&(e=12);return Jb(e,a,d)}}function Kb(b,a){return function(c,d){var e=c["get"+b](),f=vb(a?"SHORT"+b:b);return d[f][e]}}
function pd(b){var a=(new Date(b,0,1)).getDay();return new Date(b,0,(4>=a?5:12)-a)}function qd(b){return function(a){var c=pd(a.getFullYear());a=+new Date(a.getFullYear(),a.getMonth(),a.getDate()+(4-a.getDay()))-+c;a=1+Math.round(a/6048E5);return Jb(a,b)}}function kd(b){function a(a){var b;if(b=a.match(c)){a=new Date(0);var f=0,g=0,h=b[8]?a.setUTCFullYear:a.setFullYear,l=b[8]?a.setUTCHours:a.setHours;b[9]&&(f=$(b[9]+b[10]),g=$(b[9]+b[11]));h.call(a,$(b[1]),$(b[2])-1,$(b[3]));f=$(b[4]||0)-f;g=$(b[5]||
0)-g;h=$(b[6]||0);b=Math.round(1E3*parseFloat("0."+(b[7]||0)));l.call(a,f,g,h,b)}return a}var c=/^(\d{4})-?(\d\d)-?(\d\d)(?:T(\d\d)(?::?(\d\d)(?::?(\d\d)(?:\.(\d+))?)?)?(Z|([+-])(\d\d):?(\d\d))?)?$/;return function(c,e,f){var g="",h=[],l,k;e=e||"mediumDate";e=b.DATETIME_FORMATS[e]||e;x(c)&&(c=Jf.test(c)?$(c):a(c));V(c)&&(c=new Date(c));if(!pa(c))return c;for(;e;)(k=Kf.exec(e))?(h=Ya(h,k,1),e=h.pop()):(h.push(e),e=null);f&&"UTC"===f&&(c=new Date(c.getTime()),c.setMinutes(c.getMinutes()+c.getTimezoneOffset()));
s(h,function(a){l=Lf[a];g+=l?l(c,b.DATETIME_FORMATS):a.replace(/(^'|'$)/g,"").replace(/''/g,"'")});return g}}function Ef(){return function(b,a){z(a)&&(a=2);return $a(b,a)}}function Ff(){return function(b,a){V(b)&&(b=b.toString());return E(b)||x(b)?(a=Infinity===Math.abs(Number(a))?Number(a):$(a))?0<a?b.slice(0,a):b.slice(a):x(b)?"":[]:b}}function md(b){return function(a,c,d){function e(a,b){return b?function(b,c){return a(c,b)}:a}function f(a){switch(typeof a){case "number":case "boolean":case "string":return!0;
default:return!1}}function g(a){return null===a?"null":"function"===typeof a.valueOf&&(a=a.valueOf(),f(a))||"function"===typeof a.toString&&(a=a.toString(),f(a))?a:""}function h(a,b){var c=typeof a,d=typeof b;c===d&&"object"===c&&(a=g(a),b=g(b));return c===d?("string"===c&&(a=a.toLowerCase(),b=b.toLowerCase()),a===b?0:a<b?-1:1):c<d?-1:1}if(!Ta(a))return a;c=E(c)?c:[c];0===c.length&&(c=["+"]);c=c.map(function(a){var c=!1,d=a||oa;if(x(a)){if("+"==a.charAt(0)||"-"==a.charAt(0))c="-"==a.charAt(0),a=a.substring(1);
if(""===a)return e(h,c);d=b(a);if(d.constant){var f=d();return e(function(a,b){return h(a[f],b[f])},c)}}return e(function(a,b){return h(d(a),d(b))},c)});return Za.call(a).sort(e(function(a,b){for(var d=0;d<c.length;d++){var e=c[d](a,b);if(0!==e)return e}return 0},d))}}function Ja(b){G(b)&&(b={link:b});b.restrict=b.restrict||"AC";return da(b)}function rd(b,a,c,d,e){var f=this,g=[],h=f.$$parentForm=b.parent().controller("form")||Lb;f.$error={};f.$$success={};f.$pending=u;f.$name=e(a.name||a.ngForm||
"")(c);f.$dirty=!1;f.$pristine=!0;f.$valid=!0;f.$invalid=!1;f.$submitted=!1;h.$addControl(f);f.$rollbackViewValue=function(){s(g,function(a){a.$rollbackViewValue()})};f.$commitViewValue=function(){s(g,function(a){a.$commitViewValue()})};f.$addControl=function(a){Ma(a.$name,"input");g.push(a);a.$name&&(f[a.$name]=a)};f.$$renameControl=function(a,b){var c=a.$name;f[c]===a&&delete f[c];f[b]=a;a.$name=b};f.$removeControl=function(a){a.$name&&f[a.$name]===a&&delete f[a.$name];s(f.$pending,function(b,c){f.$setValidity(c,
null,a)});s(f.$error,function(b,c){f.$setValidity(c,null,a)});s(f.$$success,function(b,c){f.$setValidity(c,null,a)});Xa(g,a)};sd({ctrl:this,$element:b,set:function(a,b,c){var d=a[b];d?-1===d.indexOf(c)&&d.push(c):a[b]=[c]},unset:function(a,b,c){var d=a[b];d&&(Xa(d,c),0===d.length&&delete a[b])},parentForm:h,$animate:d});f.$setDirty=function(){d.removeClass(b,Sa);d.addClass(b,Mb);f.$dirty=!0;f.$pristine=!1;h.$setDirty()};f.$setPristine=function(){d.setClass(b,Sa,Mb+" ng-submitted");f.$dirty=!1;f.$pristine=
!0;f.$submitted=!1;s(g,function(a){a.$setPristine()})};f.$setUntouched=function(){s(g,function(a){a.$setUntouched()})};f.$setSubmitted=function(){d.addClass(b,"ng-submitted");f.$submitted=!0;h.$setSubmitted()}}function ic(b){b.$formatters.push(function(a){return b.$isEmpty(a)?a:a.toString()})}function jb(b,a,c,d,e,f){var g=R(a[0].type);if(!e.android){var h=!1;a.on("compositionstart",function(a){h=!0});a.on("compositionend",function(){h=!1;l()})}var l=function(b){k&&(f.defer.cancel(k),k=null);if(!h){var e=
a.val();b=b&&b.type;"password"===g||c.ngTrim&&"false"===c.ngTrim||(e=T(e));(d.$viewValue!==e||""===e&&d.$$hasNativeValidators)&&d.$setViewValue(e,b)}};if(e.hasEvent("input"))a.on("input",l);else{var k,m=function(a,b,c){k||(k=f.defer(function(){k=null;b&&b.value===c||l(a)}))};a.on("keydown",function(a){var b=a.keyCode;91===b||15<b&&19>b||37<=b&&40>=b||m(a,this,this.value)});if(e.hasEvent("paste"))a.on("paste cut",m)}a.on("change",l);d.$render=function(){a.val(d.$isEmpty(d.$viewValue)?"":d.$viewValue)}}
function Nb(b,a){return function(c,d){var e,f;if(pa(c))return c;if(x(c)){'"'==c.charAt(0)&&'"'==c.charAt(c.length-1)&&(c=c.substring(1,c.length-1));if(Mf.test(c))return new Date(c);b.lastIndex=0;if(e=b.exec(c))return e.shift(),f=d?{yyyy:d.getFullYear(),MM:d.getMonth()+1,dd:d.getDate(),HH:d.getHours(),mm:d.getMinutes(),ss:d.getSeconds(),sss:d.getMilliseconds()/1E3}:{yyyy:1970,MM:1,dd:1,HH:0,mm:0,ss:0,sss:0},s(e,function(b,c){c<a.length&&(f[a[c]]=+b)}),new Date(f.yyyy,f.MM-1,f.dd,f.HH,f.mm,f.ss||0,
1E3*f.sss||0)}return NaN}}function kb(b,a,c,d){return function(e,f,g,h,l,k,m){function p(a){return a&&!(a.getTime&&a.getTime()!==a.getTime())}function q(a){return y(a)?pa(a)?a:c(a):u}td(e,f,g,h);jb(e,f,g,h,l,k);var t=h&&h.$options&&h.$options.timezone,r;h.$$parserName=b;h.$parsers.push(function(b){return h.$isEmpty(b)?null:a.test(b)?(b=c(b,r),"UTC"===t&&b.setMinutes(b.getMinutes()-b.getTimezoneOffset()),b):u});h.$formatters.push(function(a){if(a&&!pa(a))throw Ob("datefmt",a);if(p(a)){if((r=a)&&"UTC"===
t){var b=6E4*r.getTimezoneOffset();r=new Date(r.getTime()+b)}return m("date")(a,d,t)}r=null;return""});if(y(g.min)||g.ngMin){var s;h.$validators.min=function(a){return!p(a)||z(s)||c(a)>=s};g.$observe("min",function(a){s=q(a);h.$validate()})}if(y(g.max)||g.ngMax){var K;h.$validators.max=function(a){return!p(a)||z(K)||c(a)<=K};g.$observe("max",function(a){K=q(a);h.$validate()})}}}function td(b,a,c,d){(d.$$hasNativeValidators=J(a[0].validity))&&d.$parsers.push(function(b){var c=a.prop("validity")||{};
return c.badInput&&!c.typeMismatch?u:b})}function ud(b,a,c,d,e){if(y(d)){b=b(d);if(!b.constant)throw M("ngModel")("constexpr",c,d);return b(a)}return e}function jc(b,a){b="ngClass"+b;return["$animate",function(c){function d(a,b){var c=[],d=0;a:for(;d<a.length;d++){for(var e=a[d],m=0;m<b.length;m++)if(e==b[m])continue a;c.push(e)}return c}function e(a){if(!E(a)){if(x(a))return a.split(" ");if(J(a)){var b=[];s(a,function(a,c){a&&(b=b.concat(c.split(" ")))});return b}}return a}return{restrict:"AC",link:function(f,
g,h){function l(a,b){var c=g.data("$classCounts")||{},d=[];s(a,function(a){if(0<b||c[a])c[a]=(c[a]||0)+b,c[a]===+(0<b)&&d.push(a)});g.data("$classCounts",c);return d.join(" ")}function k(b){if(!0===a||f.$index%2===a){var k=e(b||[]);if(!m){var t=l(k,1);h.$addClass(t)}else if(!ea(b,m)){var r=e(m),t=d(k,r),k=d(r,k),t=l(t,1),k=l(k,-1);t&&t.length&&c.addClass(g,t);k&&k.length&&c.removeClass(g,k)}}m=qa(b)}var m;f.$watch(h[b],k,!0);h.$observe("class",function(a){k(f.$eval(h[b]))});"ngClass"!==b&&f.$watch("$index",
function(c,d){var g=c&1;if(g!==(d&1)){var k=e(f.$eval(h[b]));g===a?(g=l(k,1),h.$addClass(g)):(g=l(k,-1),h.$removeClass(g))}})}}}]}function sd(b){function a(a,b){b&&!f[a]?(k.addClass(e,a),f[a]=!0):!b&&f[a]&&(k.removeClass(e,a),f[a]=!1)}function c(b,c){b=b?"-"+uc(b,"-"):"";a(lb+b,!0===c);a(vd+b,!1===c)}var d=b.ctrl,e=b.$element,f={},g=b.set,h=b.unset,l=b.parentForm,k=b.$animate;f[vd]=!(f[lb]=e.hasClass(lb));d.$setValidity=function(b,e,f){e===u?(d.$pending||(d.$pending={}),g(d.$pending,b,f)):(d.$pending&&
h(d.$pending,b,f),wd(d.$pending)&&(d.$pending=u));Wa(e)?e?(h(d.$error,b,f),g(d.$$success,b,f)):(g(d.$error,b,f),h(d.$$success,b,f)):(h(d.$error,b,f),h(d.$$success,b,f));d.$pending?(a(xd,!0),d.$valid=d.$invalid=u,c("",null)):(a(xd,!1),d.$valid=wd(d.$error),d.$invalid=!d.$valid,c("",d.$valid));e=d.$pending&&d.$pending[b]?u:d.$error[b]?!1:d.$$success[b]?!0:null;c(b,e);l.$setValidity(b,e,d)}}function wd(b){if(b)for(var a in b)return!1;return!0}var Nf=/^\/(.+)\/([a-z]*)$/,R=function(b){return x(b)?b.toLowerCase():
b},sc=Object.prototype.hasOwnProperty,vb=function(b){return x(b)?b.toUpperCase():b},Ra,C,ra,Za=[].slice,pf=[].splice,Of=[].push,Da=Object.prototype.toString,Ka=M("ng"),aa=P.angular||(P.angular={}),cb,ob=0;Ra=X.documentMode;B.$inject=[];oa.$inject=[];var E=Array.isArray,T=function(b){return x(b)?b.trim():b},gd=function(b){return b.replace(/([-()\[\]{}+?*.$\^|,:#<!\\])/g,"\\$1").replace(/\x08/g,"\\x08")},bb=function(){if(y(bb.isActive_))return bb.isActive_;var b=!(!X.querySelector("[ng-csp]")&&!X.querySelector("[data-ng-csp]"));
if(!b)try{new Function("")}catch(a){b=!0}return bb.isActive_=b},sb=["ng-","data-ng-","ng:","x-ng-"],Md=/[A-Z]/g,vc=!1,Rb,na=1,qb=3,Qd={full:"1.3.14",major:1,minor:3,dot:14,codeName:"instantaneous-browserification"};Q.expando="ng339";var Ab=Q.cache={},hf=1;Q._data=function(b){return this.cache[b[this.expando]]||{}};var cf=/([\:\-\_]+(.))/g,df=/^moz([A-Z])/,Pf={mouseleave:"mouseout",mouseenter:"mouseover"},Ub=M("jqLite"),gf=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,Tb=/<|&#?\w+;/,ef=/<([\w:]+)/,ff=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
ga={option:[1,'<select multiple="multiple">',"</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ga.optgroup=ga.option;ga.tbody=ga.tfoot=ga.colgroup=ga.caption=ga.thead;ga.th=ga.td;var La=Q.prototype={ready:function(b){function a(){c||(c=!0,b())}var c=!1;"complete"===X.readyState?setTimeout(a):(this.on("DOMContentLoaded",a),Q(P).on("load",a))},
toString:function(){var b=[];s(this,function(a){b.push(""+a)});return"["+b.join(", ")+"]"},eq:function(b){return 0<=b?C(this[b]):C(this[this.length+b])},length:0,push:Of,sort:[].sort,splice:[].splice},Fb={};s("multiple selected checked disabled readOnly required open".split(" "),function(b){Fb[R(b)]=b});var Nc={};s("input select option textarea button form details".split(" "),function(b){Nc[b]=!0});var Oc={ngMinlength:"minlength",ngMaxlength:"maxlength",ngMin:"min",ngMax:"max",ngPattern:"pattern"};
s({data:Wb,removeData:yb},function(b,a){Q[a]=b});s({data:Wb,inheritedData:Eb,scope:function(b){return C.data(b,"$scope")||Eb(b.parentNode||b,["$isolateScope","$scope"])},isolateScope:function(b){return C.data(b,"$isolateScope")||C.data(b,"$isolateScopeNoTemplate")},controller:Jc,injector:function(b){return Eb(b,"$injector")},removeAttr:function(b,a){b.removeAttribute(a)},hasClass:Bb,css:function(b,a,c){a=db(a);if(y(c))b.style[a]=c;else return b.style[a]},attr:function(b,a,c){var d=R(a);if(Fb[d])if(y(c))c?
(b[a]=!0,b.setAttribute(a,d)):(b[a]=!1,b.removeAttribute(d));else return b[a]||(b.attributes.getNamedItem(a)||B).specified?d:u;else if(y(c))b.setAttribute(a,c);else if(b.getAttribute)return b=b.getAttribute(a,2),null===b?u:b},prop:function(b,a,c){if(y(c))b[a]=c;else return b[a]},text:function(){function b(a,b){if(z(b)){var d=a.nodeType;return d===na||d===qb?a.textContent:""}a.textContent=b}b.$dv="";return b}(),val:function(b,a){if(z(a)){if(b.multiple&&"select"===ta(b)){var c=[];s(b.options,function(a){a.selected&&
c.push(a.value||a.text)});return 0===c.length?null:c}return b.value}b.value=a},html:function(b,a){if(z(a))return b.innerHTML;xb(b,!0);b.innerHTML=a},empty:Kc},function(b,a){Q.prototype[a]=function(a,d){var e,f,g=this.length;if(b!==Kc&&(2==b.length&&b!==Bb&&b!==Jc?a:d)===u){if(J(a)){for(e=0;e<g;e++)if(b===Wb)b(this[e],a);else for(f in a)b(this[e],f,a[f]);return this}e=b.$dv;g=e===u?Math.min(g,1):g;for(f=0;f<g;f++){var h=b(this[f],a,d);e=e?e+h:h}return e}for(e=0;e<g;e++)b(this[e],a,d);return this}});
s({removeData:yb,on:function a(c,d,e,f){if(y(f))throw Ub("onargs");if(Fc(c)){var g=zb(c,!0);f=g.events;var h=g.handle;h||(h=g.handle=lf(c,f));for(var g=0<=d.indexOf(" ")?d.split(" "):[d],l=g.length;l--;){d=g[l];var k=f[d];k||(f[d]=[],"mouseenter"===d||"mouseleave"===d?a(c,Pf[d],function(a){var c=a.relatedTarget;c&&(c===this||this.contains(c))||h(a,d)}):"$destroy"!==d&&c.addEventListener(d,h,!1),k=f[d]);k.push(e)}}},off:Ic,one:function(a,c,d){a=C(a);a.on(c,function f(){a.off(c,d);a.off(c,f)});a.on(c,
d)},replaceWith:function(a,c){var d,e=a.parentNode;xb(a);s(new Q(c),function(c){d?e.insertBefore(c,d.nextSibling):e.replaceChild(c,a);d=c})},children:function(a){var c=[];s(a.childNodes,function(a){a.nodeType===na&&c.push(a)});return c},contents:function(a){return a.contentDocument||a.childNodes||[]},append:function(a,c){var d=a.nodeType;if(d===na||11===d){c=new Q(c);for(var d=0,e=c.length;d<e;d++)a.appendChild(c[d])}},prepend:function(a,c){if(a.nodeType===na){var d=a.firstChild;s(new Q(c),function(c){a.insertBefore(c,
d)})}},wrap:function(a,c){c=C(c).eq(0).clone()[0];var d=a.parentNode;d&&d.replaceChild(c,a);c.appendChild(a)},remove:Lc,detach:function(a){Lc(a,!0)},after:function(a,c){var d=a,e=a.parentNode;c=new Q(c);for(var f=0,g=c.length;f<g;f++){var h=c[f];e.insertBefore(h,d.nextSibling);d=h}},addClass:Db,removeClass:Cb,toggleClass:function(a,c,d){c&&s(c.split(" "),function(c){var f=d;z(f)&&(f=!Bb(a,c));(f?Db:Cb)(a,c)})},parent:function(a){return(a=a.parentNode)&&11!==a.nodeType?a:null},next:function(a){return a.nextElementSibling},
find:function(a,c){return a.getElementsByTagName?a.getElementsByTagName(c):[]},clone:Vb,triggerHandler:function(a,c,d){var e,f,g=c.type||c,h=zb(a);if(h=(h=h&&h.events)&&h[g])e={preventDefault:function(){this.defaultPrevented=!0},isDefaultPrevented:function(){return!0===this.defaultPrevented},stopImmediatePropagation:function(){this.immediatePropagationStopped=!0},isImmediatePropagationStopped:function(){return!0===this.immediatePropagationStopped},stopPropagation:B,type:g,target:a},c.type&&(e=w(e,
c)),c=qa(h),f=d?[e].concat(d):[e],s(c,function(c){e.isImmediatePropagationStopped()||c.apply(a,f)})}},function(a,c){Q.prototype[c]=function(c,e,f){for(var g,h=0,l=this.length;h<l;h++)z(g)?(g=a(this[h],c,e,f),y(g)&&(g=C(g))):Hc(g,a(this[h],c,e,f));return y(g)?g:this};Q.prototype.bind=Q.prototype.on;Q.prototype.unbind=Q.prototype.off});eb.prototype={put:function(a,c){this[Na(a,this.nextUid)]=c},get:function(a){return this[Na(a,this.nextUid)]},remove:function(a){var c=this[a=Na(a,this.nextUid)];delete this[a];
return c}};var Qc=/^function\s*[^\(]*\(\s*([^\)]*)\)/m,Qf=/,/,Rf=/^\s*(_?)(\S+?)\1\s*$/,Pc=/((\/\/.*$)|(\/\*[\s\S]*?\*\/))/mg,Ga=M("$injector");ab.$$annotate=function(a,c,d){var e;if("function"===typeof a){if(!(e=a.$inject)){e=[];if(a.length){if(c)throw x(d)&&d||(d=a.name||mf(a)),Ga("strictdi",d);c=a.toString().replace(Pc,"");c=c.match(Qc);s(c[1].split(Qf),function(a){a.replace(Rf,function(a,c,d){e.push(d)})})}a.$inject=e}}else E(a)?(c=a.length-1,tb(a[c],"fn"),e=a.slice(0,c)):tb(a,"fn",!0);return e};
var Sf=M("$animate"),Ce=["$provide",function(a){this.$$selectors={};this.register=function(c,d){var e=c+"-animation";if(c&&"."!=c.charAt(0))throw Sf("notcsel",c);this.$$selectors[c.substr(1)]=e;a.factory(e,d)};this.classNameFilter=function(a){1===arguments.length&&(this.$$classNameFilter=a instanceof RegExp?a:null);return this.$$classNameFilter};this.$get=["$$q","$$asyncCallback","$rootScope",function(a,d,e){function f(d){var f,g=a.defer();g.promise.$$cancelFn=function(){f&&f()};e.$$postDigest(function(){f=
d(function(){g.resolve()})});return g.promise}function g(a,c){var d=[],e=[],f=fa();s((a.attr("class")||"").split(/\s+/),function(a){f[a]=!0});s(c,function(a,c){var g=f[c];!1===a&&g?e.push(c):!0!==a||g||d.push(c)});return 0<d.length+e.length&&[d.length?d:null,e.length?e:null]}function h(a,c,d){for(var e=0,f=c.length;e<f;++e)a[c[e]]=d}function l(){m||(m=a.defer(),d(function(){m.resolve();m=null}));return m.promise}function k(a,c){if(aa.isObject(c)){var d=w(c.from||{},c.to||{});a.css(d)}}var m;return{animate:function(a,
c,d){k(a,{from:c,to:d});return l()},enter:function(a,c,d,e){k(a,e);d?d.after(a):c.prepend(a);return l()},leave:function(a,c){a.remove();return l()},move:function(a,c,d,e){return this.enter(a,c,d,e)},addClass:function(a,c,d){return this.setClass(a,c,[],d)},$$addClassImmediately:function(a,c,d){a=C(a);c=x(c)?c:E(c)?c.join(" "):"";s(a,function(a){Db(a,c)});k(a,d);return l()},removeClass:function(a,c,d){return this.setClass(a,[],c,d)},$$removeClassImmediately:function(a,c,d){a=C(a);c=x(c)?c:E(c)?c.join(" "):
"";s(a,function(a){Cb(a,c)});k(a,d);return l()},setClass:function(a,c,d,e){var k=this,l=!1;a=C(a);var m=a.data("$$animateClasses");m?e&&m.options&&(m.options=aa.extend(m.options||{},e)):(m={classes:{},options:e},l=!0);e=m.classes;c=E(c)?c:c.split(" ");d=E(d)?d:d.split(" ");h(e,c,!0);h(e,d,!1);l&&(m.promise=f(function(c){var d=a.data("$$animateClasses");a.removeData("$$animateClasses");if(d){var e=g(a,d.classes);e&&k.$$setClassImmediately(a,e[0],e[1],d.options)}c()}),a.data("$$animateClasses",m));
return m.promise},$$setClassImmediately:function(a,c,d,e){c&&this.$$addClassImmediately(a,c);d&&this.$$removeClassImmediately(a,d);k(a,e);return l()},enabled:B,cancel:B}}]}],ia=M("$compile");xc.$inject=["$provide","$$sanitizeUriProvider"];var Sc=/^((?:x|data)[\:\-_])/i,qf=M("$controller"),Wc="application/json",$b={"Content-Type":Wc+";charset=utf-8"},sf=/^\[|^\{(?!\{)/,tf={"[":/]$/,"{":/}$/},rf=/^\)\]\}',?\n/,ac=M("$interpolate"),Tf=/^([^\?#]*)(\?([^#]*))?(#(.*))?$/,wf={http:80,https:443,ftp:21},Hb=
M("$location"),Uf={$$html5:!1,$$replace:!1,absUrl:Ib("$$absUrl"),url:function(a){if(z(a))return this.$$url;var c=Tf.exec(a);(c[1]||""===a)&&this.path(decodeURIComponent(c[1]));(c[2]||c[1]||""===a)&&this.search(c[3]||"");this.hash(c[5]||"");return this},protocol:Ib("$$protocol"),host:Ib("$$host"),port:Ib("$$port"),path:dd("$$path",function(a){a=null!==a?a.toString():"";return"/"==a.charAt(0)?a:"/"+a}),search:function(a,c){switch(arguments.length){case 0:return this.$$search;case 1:if(x(a)||V(a))a=
a.toString(),this.$$search=rc(a);else if(J(a))a=Ea(a,{}),s(a,function(c,e){null==c&&delete a[e]}),this.$$search=a;else throw Hb("isrcharg");break;default:z(c)||null===c?delete this.$$search[a]:this.$$search[a]=c}this.$$compose();return this},hash:dd("$$hash",function(a){return null!==a?a.toString():""}),replace:function(){this.$$replace=!0;return this}};s([cd,ec,dc],function(a){a.prototype=Object.create(Uf);a.prototype.state=function(c){if(!arguments.length)return this.$$state;if(a!==dc||!this.$$html5)throw Hb("nostate");
this.$$state=z(c)?null:c;return this}});var ka=M("$parse"),Vf=Function.prototype.call,Wf=Function.prototype.apply,Xf=Function.prototype.bind,mb=fa();s({"null":function(){return null},"true":function(){return!0},"false":function(){return!1},undefined:function(){}},function(a,c){a.constant=a.literal=a.sharedGetter=!0;mb[c]=a});mb["this"]=function(a){return a};mb["this"].sharedGetter=!0;var nb=w(fa(),{"+":function(a,c,d,e){d=d(a,c);e=e(a,c);return y(d)?y(e)?d+e:d:y(e)?e:u},"-":function(a,c,d,e){d=d(a,
c);e=e(a,c);return(y(d)?d:0)-(y(e)?e:0)},"*":function(a,c,d,e){return d(a,c)*e(a,c)},"/":function(a,c,d,e){return d(a,c)/e(a,c)},"%":function(a,c,d,e){return d(a,c)%e(a,c)},"===":function(a,c,d,e){return d(a,c)===e(a,c)},"!==":function(a,c,d,e){return d(a,c)!==e(a,c)},"==":function(a,c,d,e){return d(a,c)==e(a,c)},"!=":function(a,c,d,e){return d(a,c)!=e(a,c)},"<":function(a,c,d,e){return d(a,c)<e(a,c)},">":function(a,c,d,e){return d(a,c)>e(a,c)},"<=":function(a,c,d,e){return d(a,c)<=e(a,c)},">=":function(a,
c,d,e){return d(a,c)>=e(a,c)},"&&":function(a,c,d,e){return d(a,c)&&e(a,c)},"||":function(a,c,d,e){return d(a,c)||e(a,c)},"!":function(a,c,d){return!d(a,c)},"=":!0,"|":!0}),Yf={n:"\n",f:"\f",r:"\r",t:"\t",v:"\v","'":"'",'"':'"'},hc=function(a){this.options=a};hc.prototype={constructor:hc,lex:function(a){this.text=a;this.index=0;for(this.tokens=[];this.index<this.text.length;)if(a=this.text.charAt(this.index),'"'===a||"'"===a)this.readString(a);else if(this.isNumber(a)||"."===a&&this.isNumber(this.peek()))this.readNumber();
else if(this.isIdent(a))this.readIdent();else if(this.is(a,"(){}[].,;:?"))this.tokens.push({index:this.index,text:a}),this.index++;else if(this.isWhitespace(a))this.index++;else{var c=a+this.peek(),d=c+this.peek(2),e=nb[c],f=nb[d];nb[a]||e||f?(a=f?d:e?c:a,this.tokens.push({index:this.index,text:a,operator:!0}),this.index+=a.length):this.throwError("Unexpected next character ",this.index,this.index+1)}return this.tokens},is:function(a,c){return-1!==c.indexOf(a)},peek:function(a){a=a||1;return this.index+
a<this.text.length?this.text.charAt(this.index+a):!1},isNumber:function(a){return"0"<=a&&"9">=a&&"string"===typeof a},isWhitespace:function(a){return" "===a||"\r"===a||"\t"===a||"\n"===a||"\v"===a||"\u00a0"===a},isIdent:function(a){return"a"<=a&&"z">=a||"A"<=a&&"Z">=a||"_"===a||"$"===a},isExpOperator:function(a){return"-"===a||"+"===a||this.isNumber(a)},throwError:function(a,c,d){d=d||this.index;c=y(c)?"s "+c+"-"+this.index+" ["+this.text.substring(c,d)+"]":" "+d;throw ka("lexerr",a,c,this.text);
},readNumber:function(){for(var a="",c=this.index;this.index<this.text.length;){var d=R(this.text.charAt(this.index));if("."==d||this.isNumber(d))a+=d;else{var e=this.peek();if("e"==d&&this.isExpOperator(e))a+=d;else if(this.isExpOperator(d)&&e&&this.isNumber(e)&&"e"==a.charAt(a.length-1))a+=d;else if(!this.isExpOperator(d)||e&&this.isNumber(e)||"e"!=a.charAt(a.length-1))break;else this.throwError("Invalid exponent")}this.index++}this.tokens.push({index:c,text:a,constant:!0,value:Number(a)})},readIdent:function(){for(var a=
this.index;this.index<this.text.length;){var c=this.text.charAt(this.index);if(!this.isIdent(c)&&!this.isNumber(c))break;this.index++}this.tokens.push({index:a,text:this.text.slice(a,this.index),identifier:!0})},readString:function(a){var c=this.index;this.index++;for(var d="",e=a,f=!1;this.index<this.text.length;){var g=this.text.charAt(this.index),e=e+g;if(f)"u"===g?(f=this.text.substring(this.index+1,this.index+5),f.match(/[\da-f]{4}/i)||this.throwError("Invalid unicode escape [\\u"+f+"]"),this.index+=
4,d+=String.fromCharCode(parseInt(f,16))):d+=Yf[g]||g,f=!1;else if("\\"===g)f=!0;else{if(g===a){this.index++;this.tokens.push({index:c,text:e,constant:!0,value:d});return}d+=g}this.index++}this.throwError("Unterminated quote",c)}};var ib=function(a,c,d){this.lexer=a;this.$filter=c;this.options=d};ib.ZERO=w(function(){return 0},{sharedGetter:!0,constant:!0});ib.prototype={constructor:ib,parse:function(a){this.text=a;this.tokens=this.lexer.lex(a);a=this.statements();0!==this.tokens.length&&this.throwError("is an unexpected token",
this.tokens[0]);a.literal=!!a.literal;a.constant=!!a.constant;return a},primary:function(){var a;this.expect("(")?(a=this.filterChain(),this.consume(")")):this.expect("[")?a=this.arrayDeclaration():this.expect("{")?a=this.object():this.peek().identifier&&this.peek().text in mb?a=mb[this.consume().text]:this.peek().identifier?a=this.identifier():this.peek().constant?a=this.constant():this.throwError("not a primary expression",this.peek());for(var c,d;c=this.expect("(","[",".");)"("===c.text?(a=this.functionCall(a,
d),d=null):"["===c.text?(d=a,a=this.objectIndex(a)):"."===c.text?(d=a,a=this.fieldAccess(a)):this.throwError("IMPOSSIBLE");return a},throwError:function(a,c){throw ka("syntax",c.text,a,c.index+1,this.text,this.text.substring(c.index));},peekToken:function(){if(0===this.tokens.length)throw ka("ueoe",this.text);return this.tokens[0]},peek:function(a,c,d,e){return this.peekAhead(0,a,c,d,e)},peekAhead:function(a,c,d,e,f){if(this.tokens.length>a){a=this.tokens[a];var g=a.text;if(g===c||g===d||g===e||g===
f||!(c||d||e||f))return a}return!1},expect:function(a,c,d,e){return(a=this.peek(a,c,d,e))?(this.tokens.shift(),a):!1},consume:function(a){if(0===this.tokens.length)throw ka("ueoe",this.text);var c=this.expect(a);c||this.throwError("is unexpected, expecting ["+a+"]",this.peek());return c},unaryFn:function(a,c){var d=nb[a];return w(function(a,f){return d(a,f,c)},{constant:c.constant,inputs:[c]})},binaryFn:function(a,c,d,e){var f=nb[c];return w(function(c,e){return f(c,e,a,d)},{constant:a.constant&&
d.constant,inputs:!e&&[a,d]})},identifier:function(){for(var a=this.consume().text;this.peek(".")&&this.peekAhead(1).identifier&&!this.peekAhead(2,"(");)a+=this.consume().text+this.consume().text;return yf(a,this.options,this.text)},constant:function(){var a=this.consume().value;return w(function(){return a},{constant:!0,literal:!0})},statements:function(){for(var a=[];;)if(0<this.tokens.length&&!this.peek("}",")",";","]")&&a.push(this.filterChain()),!this.expect(";"))return 1===a.length?a[0]:function(c,
d){for(var e,f=0,g=a.length;f<g;f++)e=a[f](c,d);return e}},filterChain:function(){for(var a=this.expression();this.expect("|");)a=this.filter(a);return a},filter:function(a){var c=this.$filter(this.consume().text),d,e;if(this.peek(":"))for(d=[],e=[];this.expect(":");)d.push(this.expression());var f=[a].concat(d||[]);return w(function(f,h){var l=a(f,h);if(e){e[0]=l;for(l=d.length;l--;)e[l+1]=d[l](f,h);return c.apply(u,e)}return c(l)},{constant:!c.$stateful&&f.every(fc),inputs:!c.$stateful&&f})},expression:function(){return this.assignment()},
assignment:function(){var a=this.ternary(),c,d;return(d=this.expect("="))?(a.assign||this.throwError("implies assignment but ["+this.text.substring(0,d.index)+"] can not be assigned to",d),c=this.ternary(),w(function(d,f){return a.assign(d,c(d,f),f)},{inputs:[a,c]})):a},ternary:function(){var a=this.logicalOR(),c;if(this.expect("?")&&(c=this.assignment(),this.consume(":"))){var d=this.assignment();return w(function(e,f){return a(e,f)?c(e,f):d(e,f)},{constant:a.constant&&c.constant&&d.constant})}return a},
logicalOR:function(){for(var a=this.logicalAND(),c;c=this.expect("||");)a=this.binaryFn(a,c.text,this.logicalAND(),!0);return a},logicalAND:function(){for(var a=this.equality(),c;c=this.expect("&&");)a=this.binaryFn(a,c.text,this.equality(),!0);return a},equality:function(){for(var a=this.relational(),c;c=this.expect("==","!=","===","!==");)a=this.binaryFn(a,c.text,this.relational());return a},relational:function(){for(var a=this.additive(),c;c=this.expect("<",">","<=",">=");)a=this.binaryFn(a,c.text,
this.additive());return a},additive:function(){for(var a=this.multiplicative(),c;c=this.expect("+","-");)a=this.binaryFn(a,c.text,this.multiplicative());return a},multiplicative:function(){for(var a=this.unary(),c;c=this.expect("*","/","%");)a=this.binaryFn(a,c.text,this.unary());return a},unary:function(){var a;return this.expect("+")?this.primary():(a=this.expect("-"))?this.binaryFn(ib.ZERO,a.text,this.unary()):(a=this.expect("!"))?this.unaryFn(a.text,this.unary()):this.primary()},fieldAccess:function(a){var c=
this.identifier();return w(function(d,e,f){d=f||a(d,e);return null==d?u:c(d)},{assign:function(d,e,f){var g=a(d,f);g||a.assign(d,g={},f);return c.assign(g,e)}})},objectIndex:function(a){var c=this.text,d=this.expression();this.consume("]");return w(function(e,f){var g=a(e,f),h=d(e,f);sa(h,c);return g?la(g[h],c):u},{assign:function(e,f,g){var h=sa(d(e,g),c),l=la(a(e,g),c);l||a.assign(e,l={},g);return l[h]=f}})},functionCall:function(a,c){var d=[];if(")"!==this.peekToken().text){do d.push(this.expression());
while(this.expect(","))}this.consume(")");var e=this.text,f=d.length?[]:null;return function(g,h){var l=c?c(g,h):y(c)?u:g,k=a(g,h,l)||B;if(f)for(var m=d.length;m--;)f[m]=la(d[m](g,h),e);la(l,e);if(k){if(k.constructor===k)throw ka("isecfn",e);if(k===Vf||k===Wf||k===Xf)throw ka("isecff",e);}l=k.apply?k.apply(l,f):k(f[0],f[1],f[2],f[3],f[4]);f&&(f.length=0);return la(l,e)}},arrayDeclaration:function(){var a=[];if("]"!==this.peekToken().text){do{if(this.peek("]"))break;a.push(this.expression())}while(this.expect(","))
}this.consume("]");return w(function(c,d){for(var e=[],f=0,g=a.length;f<g;f++)e.push(a[f](c,d));return e},{literal:!0,constant:a.every(fc),inputs:a})},object:function(){var a=[],c=[];if("}"!==this.peekToken().text){do{if(this.peek("}"))break;var d=this.consume();d.constant?a.push(d.value):d.identifier?a.push(d.text):this.throwError("invalid key",d);this.consume(":");c.push(this.expression())}while(this.expect(","))}this.consume("}");return w(function(d,f){for(var g={},h=0,l=c.length;h<l;h++)g[a[h]]=
c[h](d,f);return g},{literal:!0,constant:c.every(fc),inputs:c})}};var Af=fa(),zf=fa(),Bf=Object.prototype.valueOf,Ca=M("$sce"),ma={HTML:"html",CSS:"css",URL:"url",RESOURCE_URL:"resourceUrl",JS:"js"},ia=M("$compile"),Y=X.createElement("a"),id=Ba(P.location.href);Ec.$inject=["$provide"];jd.$inject=["$locale"];ld.$inject=["$locale"];var od=".",Lf={yyyy:Z("FullYear",4),yy:Z("FullYear",2,0,!0),y:Z("FullYear",1),MMMM:Kb("Month"),MMM:Kb("Month",!0),MM:Z("Month",2,1),M:Z("Month",1,1),dd:Z("Date",2),d:Z("Date",
1),HH:Z("Hours",2),H:Z("Hours",1),hh:Z("Hours",2,-12),h:Z("Hours",1,-12),mm:Z("Minutes",2),m:Z("Minutes",1),ss:Z("Seconds",2),s:Z("Seconds",1),sss:Z("Milliseconds",3),EEEE:Kb("Day"),EEE:Kb("Day",!0),a:function(a,c){return 12>a.getHours()?c.AMPMS[0]:c.AMPMS[1]},Z:function(a){a=-1*a.getTimezoneOffset();return a=(0<=a?"+":"")+(Jb(Math[0<a?"floor":"ceil"](a/60),2)+Jb(Math.abs(a%60),2))},ww:qd(2),w:qd(1)},Kf=/((?:[^yMdHhmsaZEw']+)|(?:'(?:[^']|'')*')|(?:E+|y+|M+|d+|H+|h+|m+|s+|a|Z|w+))(.*)/,Jf=/^\-?\d+$/;
kd.$inject=["$locale"];var Gf=da(R),Hf=da(vb);md.$inject=["$parse"];var Td=da({restrict:"E",compile:function(a,c){if(!c.href&&!c.xlinkHref&&!c.name)return function(a,c){if("a"===c[0].nodeName.toLowerCase()){var f="[object SVGAnimatedString]"===Da.call(c.prop("href"))?"xlink:href":"href";c.on("click",function(a){c.attr(f)||a.preventDefault()})}}}}),wb={};s(Fb,function(a,c){if("multiple"!=a){var d=ya("ng-"+c);wb[d]=function(){return{restrict:"A",priority:100,link:function(a,f,g){a.$watch(g[d],function(a){g.$set(c,
!!a)})}}}}});s(Oc,function(a,c){wb[c]=function(){return{priority:100,link:function(a,e,f){if("ngPattern"===c&&"/"==f.ngPattern.charAt(0)&&(e=f.ngPattern.match(Nf))){f.$set("ngPattern",new RegExp(e[1],e[2]));return}a.$watch(f[c],function(a){f.$set(c,a)})}}}});s(["src","srcset","href"],function(a){var c=ya("ng-"+a);wb[c]=function(){return{priority:99,link:function(d,e,f){var g=a,h=a;"href"===a&&"[object SVGAnimatedString]"===Da.call(e.prop("href"))&&(h="xlinkHref",f.$attr[h]="xlink:href",g=null);f.$observe(c,
function(c){c?(f.$set(h,c),Ra&&g&&e.prop(g,f[h])):"href"===a&&f.$set(h,null)})}}}});var Lb={$addControl:B,$$renameControl:function(a,c){a.$name=c},$removeControl:B,$setValidity:B,$setDirty:B,$setPristine:B,$setSubmitted:B};rd.$inject=["$element","$attrs","$scope","$animate","$interpolate"];var yd=function(a){return["$timeout",function(c){return{name:"form",restrict:a?"EAC":"E",controller:rd,compile:function(a){a.addClass(Sa).addClass(lb);return{pre:function(a,d,g,h){if(!("action"in g)){var l=function(c){a.$apply(function(){h.$commitViewValue();
h.$setSubmitted()});c.preventDefault()};d[0].addEventListener("submit",l,!1);d.on("$destroy",function(){c(function(){d[0].removeEventListener("submit",l,!1)},0,!1)})}var k=h.$$parentForm,m=h.$name;m&&(hb(a,null,m,h,m),g.$observe(g.name?"name":"ngForm",function(c){m!==c&&(hb(a,null,m,u,m),m=c,hb(a,null,m,h,m),k.$$renameControl(h,m))}));d.on("$destroy",function(){k.$removeControl(h);m&&hb(a,null,m,u,m);w(h,Lb)})}}}}}]},Ud=yd(),ge=yd(!0),Mf=/\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+([+-][0-2]\d:[0-5]\d|Z)/,
Zf=/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/,$f=/^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9]([a-z0-9-]*[a-z0-9])?(\.[a-z0-9]([a-z0-9-]*[a-z0-9])?)*$/i,ag=/^\s*(\-|\+)?(\d+|(\d*(\.\d*)))\s*$/,zd=/^(\d{4})-(\d{2})-(\d{2})$/,Ad=/^(\d{4})-(\d\d)-(\d\d)T(\d\d):(\d\d)(?::(\d\d)(\.\d{1,3})?)?$/,kc=/^(\d{4})-W(\d\d)$/,Bd=/^(\d{4})-(\d\d)$/,Cd=/^(\d\d):(\d\d)(?::(\d\d)(\.\d{1,3})?)?$/,Dd={text:function(a,c,d,e,f,g){jb(a,c,d,e,f,g);ic(e)},date:kb("date",zd,Nb(zd,["yyyy",
"MM","dd"]),"yyyy-MM-dd"),"datetime-local":kb("datetimelocal",Ad,Nb(Ad,"yyyy MM dd HH mm ss sss".split(" ")),"yyyy-MM-ddTHH:mm:ss.sss"),time:kb("time",Cd,Nb(Cd,["HH","mm","ss","sss"]),"HH:mm:ss.sss"),week:kb("week",kc,function(a,c){if(pa(a))return a;if(x(a)){kc.lastIndex=0;var d=kc.exec(a);if(d){var e=+d[1],f=+d[2],g=d=0,h=0,l=0,k=pd(e),f=7*(f-1);c&&(d=c.getHours(),g=c.getMinutes(),h=c.getSeconds(),l=c.getMilliseconds());return new Date(e,0,k.getDate()+f,d,g,h,l)}}return NaN},"yyyy-Www"),month:kb("month",
Bd,Nb(Bd,["yyyy","MM"]),"yyyy-MM"),number:function(a,c,d,e,f,g){td(a,c,d,e);jb(a,c,d,e,f,g);e.$$parserName="number";e.$parsers.push(function(a){return e.$isEmpty(a)?null:ag.test(a)?parseFloat(a):u});e.$formatters.push(function(a){if(!e.$isEmpty(a)){if(!V(a))throw Ob("numfmt",a);a=a.toString()}return a});if(y(d.min)||d.ngMin){var h;e.$validators.min=function(a){return e.$isEmpty(a)||z(h)||a>=h};d.$observe("min",function(a){y(a)&&!V(a)&&(a=parseFloat(a,10));h=V(a)&&!isNaN(a)?a:u;e.$validate()})}if(y(d.max)||
d.ngMax){var l;e.$validators.max=function(a){return e.$isEmpty(a)||z(l)||a<=l};d.$observe("max",function(a){y(a)&&!V(a)&&(a=parseFloat(a,10));l=V(a)&&!isNaN(a)?a:u;e.$validate()})}},url:function(a,c,d,e,f,g){jb(a,c,d,e,f,g);ic(e);e.$$parserName="url";e.$validators.url=function(a,c){var d=a||c;return e.$isEmpty(d)||Zf.test(d)}},email:function(a,c,d,e,f,g){jb(a,c,d,e,f,g);ic(e);e.$$parserName="email";e.$validators.email=function(a,c){var d=a||c;return e.$isEmpty(d)||$f.test(d)}},radio:function(a,c,
d,e){z(d.name)&&c.attr("name",++ob);c.on("click",function(a){c[0].checked&&e.$setViewValue(d.value,a&&a.type)});e.$render=function(){c[0].checked=d.value==e.$viewValue};d.$observe("value",e.$render)},checkbox:function(a,c,d,e,f,g,h,l){var k=ud(l,a,"ngTrueValue",d.ngTrueValue,!0),m=ud(l,a,"ngFalseValue",d.ngFalseValue,!1);c.on("click",function(a){e.$setViewValue(c[0].checked,a&&a.type)});e.$render=function(){c[0].checked=e.$viewValue};e.$isEmpty=function(a){return!1===a};e.$formatters.push(function(a){return ea(a,
k)});e.$parsers.push(function(a){return a?k:m})},hidden:B,button:B,submit:B,reset:B,file:B},yc=["$browser","$sniffer","$filter","$parse",function(a,c,d,e){return{restrict:"E",require:["?ngModel"],link:{pre:function(f,g,h,l){l[0]&&(Dd[R(h.type)]||Dd.text)(f,g,h,l[0],c,a,d,e)}}}}],bg=/^(true|false|\d+)$/,ye=function(){return{restrict:"A",priority:100,compile:function(a,c){return bg.test(c.ngValue)?function(a,c,f){f.$set("value",a.$eval(f.ngValue))}:function(a,c,f){a.$watch(f.ngValue,function(a){f.$set("value",
a)})}}}},Zd=["$compile",function(a){return{restrict:"AC",compile:function(c){a.$$addBindingClass(c);return function(c,e,f){a.$$addBindingInfo(e,f.ngBind);e=e[0];c.$watch(f.ngBind,function(a){e.textContent=a===u?"":a})}}}}],ae=["$interpolate","$compile",function(a,c){return{compile:function(d){c.$$addBindingClass(d);return function(d,f,g){d=a(f.attr(g.$attr.ngBindTemplate));c.$$addBindingInfo(f,d.expressions);f=f[0];g.$observe("ngBindTemplate",function(a){f.textContent=a===u?"":a})}}}}],$d=["$sce",
"$parse","$compile",function(a,c,d){return{restrict:"A",compile:function(e,f){var g=c(f.ngBindHtml),h=c(f.ngBindHtml,function(a){return(a||"").toString()});d.$$addBindingClass(e);return function(c,e,f){d.$$addBindingInfo(e,f.ngBindHtml);c.$watch(h,function(){e.html(a.getTrustedHtml(g(c))||"")})}}}}],xe=da({restrict:"A",require:"ngModel",link:function(a,c,d,e){e.$viewChangeListeners.push(function(){a.$eval(d.ngChange)})}}),be=jc("",!0),de=jc("Odd",0),ce=jc("Even",1),ee=Ja({compile:function(a,c){c.$set("ngCloak",
u);a.removeClass("ng-cloak")}}),fe=[function(){return{restrict:"A",scope:!0,controller:"@",priority:500}}],Dc={},cg={blur:!0,focus:!0};s("click dblclick mousedown mouseup mouseover mouseout mousemove mouseenter mouseleave keydown keyup keypress submit focus blur copy cut paste".split(" "),function(a){var c=ya("ng-"+a);Dc[c]=["$parse","$rootScope",function(d,e){return{restrict:"A",compile:function(f,g){var h=d(g[c],null,!0);return function(c,d){d.on(a,function(d){var f=function(){h(c,{$event:d})};
cg[a]&&e.$$phase?c.$evalAsync(f):c.$apply(f)})}}}}]});var ie=["$animate",function(a){return{multiElement:!0,transclude:"element",priority:600,terminal:!0,restrict:"A",$$tlb:!0,link:function(c,d,e,f,g){var h,l,k;c.$watch(e.ngIf,function(c){c?l||g(function(c,f){l=f;c[c.length++]=X.createComment(" end ngIf: "+e.ngIf+" ");h={clone:c};a.enter(c,d.parent(),d)}):(k&&(k.remove(),k=null),l&&(l.$destroy(),l=null),h&&(k=ub(h.clone),a.leave(k).then(function(){k=null}),h=null))})}}}],je=["$templateRequest","$anchorScroll",
"$animate","$sce",function(a,c,d,e){return{restrict:"ECA",priority:400,terminal:!0,transclude:"element",controller:aa.noop,compile:function(f,g){var h=g.ngInclude||g.src,l=g.onload||"",k=g.autoscroll;return function(f,g,q,s,r){var u=0,w,n,D,H=function(){n&&(n.remove(),n=null);w&&(w.$destroy(),w=null);D&&(d.leave(D).then(function(){n=null}),n=D,D=null)};f.$watch(e.parseAsResourceUrl(h),function(e){var h=function(){!y(k)||k&&!f.$eval(k)||c()},n=++u;e?(a(e,!0).then(function(a){if(n===u){var c=f.$new();
s.template=a;a=r(c,function(a){H();d.enter(a,null,g).then(h)});w=c;D=a;w.$emit("$includeContentLoaded",e);f.$eval(l)}},function(){n===u&&(H(),f.$emit("$includeContentError",e))}),f.$emit("$includeContentRequested",e)):(H(),s.template=null)})}}}}],Ae=["$compile",function(a){return{restrict:"ECA",priority:-400,require:"ngInclude",link:function(c,d,e,f){/SVG/.test(d[0].toString())?(d.empty(),a(Gc(f.template,X).childNodes)(c,function(a){d.append(a)},{futureParentElement:d})):(d.html(f.template),a(d.contents())(c))}}}],
ke=Ja({priority:450,compile:function(){return{pre:function(a,c,d){a.$eval(d.ngInit)}}}}),we=function(){return{restrict:"A",priority:100,require:"ngModel",link:function(a,c,d,e){var f=c.attr(d.$attr.ngList)||", ",g="false"!==d.ngTrim,h=g?T(f):f;e.$parsers.push(function(a){if(!z(a)){var c=[];a&&s(a.split(h),function(a){a&&c.push(g?T(a):a)});return c}});e.$formatters.push(function(a){return E(a)?a.join(f):u});e.$isEmpty=function(a){return!a||!a.length}}}},lb="ng-valid",vd="ng-invalid",Sa="ng-pristine",
Mb="ng-dirty",xd="ng-pending",Ob=new M("ngModel"),dg=["$scope","$exceptionHandler","$attrs","$element","$parse","$animate","$timeout","$rootScope","$q","$interpolate",function(a,c,d,e,f,g,h,l,k,m){this.$modelValue=this.$viewValue=Number.NaN;this.$$rawModelValue=u;this.$validators={};this.$asyncValidators={};this.$parsers=[];this.$formatters=[];this.$viewChangeListeners=[];this.$untouched=!0;this.$touched=!1;this.$pristine=!0;this.$dirty=!1;this.$valid=!0;this.$invalid=!1;this.$error={};this.$$success=
{};this.$pending=u;this.$name=m(d.name||"",!1)(a);var p=f(d.ngModel),q=p.assign,t=p,r=q,w=null,C,n=this;this.$$setOptions=function(a){if((n.$options=a)&&a.getterSetter){var c=f(d.ngModel+"()"),g=f(d.ngModel+"($$$p)");t=function(a){var d=p(a);G(d)&&(d=c(a));return d};r=function(a,c){G(p(a))?g(a,{$$$p:n.$modelValue}):q(a,n.$modelValue)}}else if(!p.assign)throw Ob("nonassign",d.ngModel,ua(e));};this.$render=B;this.$isEmpty=function(a){return z(a)||""===a||null===a||a!==a};var D=e.inheritedData("$formController")||
Lb,H=0;sd({ctrl:this,$element:e,set:function(a,c){a[c]=!0},unset:function(a,c){delete a[c]},parentForm:D,$animate:g});this.$setPristine=function(){n.$dirty=!1;n.$pristine=!0;g.removeClass(e,Mb);g.addClass(e,Sa)};this.$setDirty=function(){n.$dirty=!0;n.$pristine=!1;g.removeClass(e,Sa);g.addClass(e,Mb);D.$setDirty()};this.$setUntouched=function(){n.$touched=!1;n.$untouched=!0;g.setClass(e,"ng-untouched","ng-touched")};this.$setTouched=function(){n.$touched=!0;n.$untouched=!1;g.setClass(e,"ng-touched",
"ng-untouched")};this.$rollbackViewValue=function(){h.cancel(w);n.$viewValue=n.$$lastCommittedViewValue;n.$render()};this.$validate=function(){if(!V(n.$modelValue)||!isNaN(n.$modelValue)){var a=n.$$rawModelValue,c=n.$valid,d=n.$modelValue,e=n.$options&&n.$options.allowInvalid;n.$$runValidators(a,n.$$lastCommittedViewValue,function(f){e||c===f||(n.$modelValue=f?a:u,n.$modelValue!==d&&n.$$writeModelToScope())})}};this.$$runValidators=function(a,c,d){function e(){var d=!0;s(n.$validators,function(e,
f){var h=e(a,c);d=d&&h;g(f,h)});return d?!0:(s(n.$asyncValidators,function(a,c){g(c,null)}),!1)}function f(){var d=[],e=!0;s(n.$asyncValidators,function(f,h){var k=f(a,c);if(!k||!G(k.then))throw Ob("$asyncValidators",k);g(h,u);d.push(k.then(function(){g(h,!0)},function(a){e=!1;g(h,!1)}))});d.length?k.all(d).then(function(){h(e)},B):h(!0)}function g(a,c){l===H&&n.$setValidity(a,c)}function h(a){l===H&&d(a)}H++;var l=H;(function(){var a=n.$$parserName||"parse";if(C===u)g(a,null);else return C||(s(n.$validators,
function(a,c){g(c,null)}),s(n.$asyncValidators,function(a,c){g(c,null)})),g(a,C),C;return!0})()?e()?f():h(!1):h(!1)};this.$commitViewValue=function(){var a=n.$viewValue;h.cancel(w);if(n.$$lastCommittedViewValue!==a||""===a&&n.$$hasNativeValidators)n.$$lastCommittedViewValue=a,n.$pristine&&this.$setDirty(),this.$$parseAndValidate()};this.$$parseAndValidate=function(){var c=n.$$lastCommittedViewValue;if(C=z(c)?u:!0)for(var d=0;d<n.$parsers.length;d++)if(c=n.$parsers[d](c),z(c)){C=!1;break}V(n.$modelValue)&&
isNaN(n.$modelValue)&&(n.$modelValue=t(a));var e=n.$modelValue,f=n.$options&&n.$options.allowInvalid;n.$$rawModelValue=c;f&&(n.$modelValue=c,n.$modelValue!==e&&n.$$writeModelToScope());n.$$runValidators(c,n.$$lastCommittedViewValue,function(a){f||(n.$modelValue=a?c:u,n.$modelValue!==e&&n.$$writeModelToScope())})};this.$$writeModelToScope=function(){r(a,n.$modelValue);s(n.$viewChangeListeners,function(a){try{a()}catch(d){c(d)}})};this.$setViewValue=function(a,c){n.$viewValue=a;n.$options&&!n.$options.updateOnDefault||
n.$$debounceViewValueCommit(c)};this.$$debounceViewValueCommit=function(c){var d=0,e=n.$options;e&&y(e.debounce)&&(e=e.debounce,V(e)?d=e:V(e[c])?d=e[c]:V(e["default"])&&(d=e["default"]));h.cancel(w);d?w=h(function(){n.$commitViewValue()},d):l.$$phase?n.$commitViewValue():a.$apply(function(){n.$commitViewValue()})};a.$watch(function(){var c=t(a);if(c!==n.$modelValue){n.$modelValue=n.$$rawModelValue=c;C=u;for(var d=n.$formatters,e=d.length,f=c;e--;)f=d[e](f);n.$viewValue!==f&&(n.$viewValue=n.$$lastCommittedViewValue=
f,n.$render(),n.$$runValidators(c,f,B))}return c})}],ve=["$rootScope",function(a){return{restrict:"A",require:["ngModel","^?form","^?ngModelOptions"],controller:dg,priority:1,compile:function(c){c.addClass(Sa).addClass("ng-untouched").addClass(lb);return{pre:function(a,c,f,g){var h=g[0],l=g[1]||Lb;h.$$setOptions(g[2]&&g[2].$options);l.$addControl(h);f.$observe("name",function(a){h.$name!==a&&l.$$renameControl(h,a)});a.$on("$destroy",function(){l.$removeControl(h)})},post:function(c,e,f,g){var h=g[0];
if(h.$options&&h.$options.updateOn)e.on(h.$options.updateOn,function(a){h.$$debounceViewValueCommit(a&&a.type)});e.on("blur",function(e){h.$touched||(a.$$phase?c.$evalAsync(h.$setTouched):c.$apply(h.$setTouched))})}}}}}],eg=/(\s+|^)default(\s+|$)/,ze=function(){return{restrict:"A",controller:["$scope","$attrs",function(a,c){var d=this;this.$options=a.$eval(c.ngModelOptions);this.$options.updateOn!==u?(this.$options.updateOnDefault=!1,this.$options.updateOn=T(this.$options.updateOn.replace(eg,function(){d.$options.updateOnDefault=
!0;return" "}))):this.$options.updateOnDefault=!0}]}},le=Ja({terminal:!0,priority:1E3}),me=["$locale","$interpolate",function(a,c){var d=/{}/g,e=/^when(Minus)?(.+)$/;return{restrict:"EA",link:function(f,g,h){function l(a){g.text(a||"")}var k=h.count,m=h.$attr.when&&g.attr(h.$attr.when),p=h.offset||0,q=f.$eval(m)||{},t={},m=c.startSymbol(),r=c.endSymbol(),u=m+k+"-"+p+r,w=aa.noop,n;s(h,function(a,c){var d=e.exec(c);d&&(d=(d[1]?"-":"")+R(d[2]),q[d]=g.attr(h.$attr[c]))});s(q,function(a,e){t[e]=c(a.replace(d,
u))});f.$watch(k,function(c){c=parseFloat(c);var d=isNaN(c);d||c in q||(c=a.pluralCat(c-p));c===n||d&&isNaN(n)||(w(),w=f.$watch(t[c],l),n=c)})}}}],ne=["$parse","$animate",function(a,c){var d=M("ngRepeat"),e=function(a,c,d,e,k,m,p){a[d]=e;k&&(a[k]=m);a.$index=c;a.$first=0===c;a.$last=c===p-1;a.$middle=!(a.$first||a.$last);a.$odd=!(a.$even=0===(c&1))};return{restrict:"A",multiElement:!0,transclude:"element",priority:1E3,terminal:!0,$$tlb:!0,compile:function(f,g){var h=g.ngRepeat,l=X.createComment(" end ngRepeat: "+
h+" "),k=h.match(/^\s*([\s\S]+?)\s+in\s+([\s\S]+?)(?:\s+as\s+([\s\S]+?))?(?:\s+track\s+by\s+([\s\S]+?))?\s*$/);if(!k)throw d("iexp",h);var m=k[1],p=k[2],q=k[3],t=k[4],k=m.match(/^(?:(\s*[\$\w]+)|\(\s*([\$\w]+)\s*,\s*([\$\w]+)\s*\))$/);if(!k)throw d("iidexp",m);var r=k[3]||k[1],w=k[2];if(q&&(!/^[$a-zA-Z_][$a-zA-Z0-9_]*$/.test(q)||/^(null|undefined|this|\$index|\$first|\$middle|\$last|\$even|\$odd|\$parent|\$root|\$id)$/.test(q)))throw d("badident",q);var y,n,D,H,v={$id:Na};t?y=a(t):(D=function(a,c){return Na(c)},
H=function(a){return a});return function(a,f,g,k,m){y&&(n=function(c,d,e){w&&(v[w]=c);v[r]=d;v.$index=e;return y(a,v)});var t=fa();a.$watchCollection(p,function(g){var k,p,y=f[0],F,v=fa(),B,z,G,E,J,x,K;q&&(a[q]=g);if(Ta(g))J=g,p=n||D;else{p=n||H;J=[];for(K in g)g.hasOwnProperty(K)&&"$"!=K.charAt(0)&&J.push(K);J.sort()}B=J.length;K=Array(B);for(k=0;k<B;k++)if(z=g===J?k:J[k],G=g[z],E=p(z,G,k),t[E])x=t[E],delete t[E],v[E]=x,K[k]=x;else{if(v[E])throw s(K,function(a){a&&a.scope&&(t[a.id]=a)}),d("dupes",
h,E,G);K[k]={id:E,scope:u,clone:u};v[E]=!0}for(F in t){x=t[F];E=ub(x.clone);c.leave(E);if(E[0].parentNode)for(k=0,p=E.length;k<p;k++)E[k].$$NG_REMOVED=!0;x.scope.$destroy()}for(k=0;k<B;k++)if(z=g===J?k:J[k],G=g[z],x=K[k],x.scope){F=y;do F=F.nextSibling;while(F&&F.$$NG_REMOVED);x.clone[0]!=F&&c.move(ub(x.clone),null,C(y));y=x.clone[x.clone.length-1];e(x.scope,k,r,G,w,z,B)}else m(function(a,d){x.scope=d;var f=l.cloneNode(!1);a[a.length++]=f;c.enter(a,null,C(y));y=f;x.clone=a;v[x.id]=x;e(x.scope,k,r,
G,w,z,B)});t=v})}}}}],oe=["$animate",function(a){return{restrict:"A",multiElement:!0,link:function(c,d,e){c.$watch(e.ngShow,function(c){a[c?"removeClass":"addClass"](d,"ng-hide",{tempClasses:"ng-hide-animate"})})}}}],he=["$animate",function(a){return{restrict:"A",multiElement:!0,link:function(c,d,e){c.$watch(e.ngHide,function(c){a[c?"addClass":"removeClass"](d,"ng-hide",{tempClasses:"ng-hide-animate"})})}}}],pe=Ja(function(a,c,d){a.$watchCollection(d.ngStyle,function(a,d){d&&a!==d&&s(d,function(a,
d){c.css(d,"")});a&&c.css(a)})}),qe=["$animate",function(a){return{restrict:"EA",require:"ngSwitch",controller:["$scope",function(){this.cases={}}],link:function(c,d,e,f){var g=[],h=[],l=[],k=[],m=function(a,c){return function(){a.splice(c,1)}};c.$watch(e.ngSwitch||e.on,function(c){var d,e;d=0;for(e=l.length;d<e;++d)a.cancel(l[d]);d=l.length=0;for(e=k.length;d<e;++d){var r=ub(h[d].clone);k[d].$destroy();(l[d]=a.leave(r)).then(m(l,d))}h.length=0;k.length=0;(g=f.cases["!"+c]||f.cases["?"])&&s(g,function(c){c.transclude(function(d,
e){k.push(e);var f=c.element;d[d.length++]=X.createComment(" end ngSwitchWhen: ");h.push({clone:d});a.enter(d,f.parent(),f)})})})}}}],re=Ja({transclude:"element",priority:1200,require:"^ngSwitch",multiElement:!0,link:function(a,c,d,e,f){e.cases["!"+d.ngSwitchWhen]=e.cases["!"+d.ngSwitchWhen]||[];e.cases["!"+d.ngSwitchWhen].push({transclude:f,element:c})}}),se=Ja({transclude:"element",priority:1200,require:"^ngSwitch",multiElement:!0,link:function(a,c,d,e,f){e.cases["?"]=e.cases["?"]||[];e.cases["?"].push({transclude:f,
element:c})}}),ue=Ja({restrict:"EAC",link:function(a,c,d,e,f){if(!f)throw M("ngTransclude")("orphan",ua(c));f(function(a){c.empty();c.append(a)})}}),Vd=["$templateCache",function(a){return{restrict:"E",terminal:!0,compile:function(c,d){"text/ng-template"==d.type&&a.put(d.id,c[0].text)}}}],fg=M("ngOptions"),te=da({restrict:"A",terminal:!0}),Wd=["$compile","$parse",function(a,c){var d=/^\s*([\s\S]+?)(?:\s+as\s+([\s\S]+?))?(?:\s+group\s+by\s+([\s\S]+?))?\s+for\s+(?:([\$\w][\$\w]*)|(?:\(\s*([\$\w][\$\w]*)\s*,\s*([\$\w][\$\w]*)\s*\)))\s+in\s+([\s\S]+?)(?:\s+track\s+by\s+([\s\S]+?))?$/,
e={$setViewValue:B};return{restrict:"E",require:["select","?ngModel"],controller:["$element","$scope","$attrs",function(a,c,d){var l=this,k={},m=e,p;l.databound=d.ngModel;l.init=function(a,c,d){m=a;p=d};l.addOption=function(c,d){Ma(c,'"option value"');k[c]=!0;m.$viewValue==c&&(a.val(c),p.parent()&&p.remove());d&&d[0].hasAttribute("selected")&&(d[0].selected=!0)};l.removeOption=function(a){this.hasOption(a)&&(delete k[a],m.$viewValue===a&&this.renderUnknownOption(a))};l.renderUnknownOption=function(c){c=
"? "+Na(c)+" ?";p.val(c);a.prepend(p);a.val(c);p.prop("selected",!0)};l.hasOption=function(a){return k.hasOwnProperty(a)};c.$on("$destroy",function(){l.renderUnknownOption=B})}],link:function(e,g,h,l){function k(a,c,d,e){d.$render=function(){var a=d.$viewValue;e.hasOption(a)?(v.parent()&&v.remove(),c.val(a),""===a&&B.prop("selected",!0)):z(a)&&B?c.val(""):e.renderUnknownOption(a)};c.on("change",function(){a.$apply(function(){v.parent()&&v.remove();d.$setViewValue(c.val())})})}function m(a,c,d){var e;
d.$render=function(){var a=new eb(d.$viewValue);s(c.find("option"),function(c){c.selected=y(a.get(c.value))})};a.$watch(function(){ea(e,d.$viewValue)||(e=qa(d.$viewValue),d.$render())});c.on("change",function(){a.$apply(function(){var a=[];s(c.find("option"),function(c){c.selected&&a.push(c.value)});d.$setViewValue(a)})})}function p(e,f,g){function h(a,c,d){R[B]=d;G&&(R[G]=c);return a(e,R)}function k(a){var c;if(t)if(K&&E(a)){c=new eb([]);for(var d=0;d<a.length;d++)c.put(h(K,null,a[d]),!0)}else c=
new eb(a);else K&&(a=h(K,null,a));return function(d,e){var f;f=K?K:z?z:A;return t?y(c.remove(h(f,d,e))):a===h(f,d,e)}}function l(){n||(e.$$postDigest(p),n=!0)}function m(a,c,d){a[c]=a[c]||0;a[c]+=d?1:-1}function p(){n=!1;var a={"":[]},c=[""],d,l,r,u,v;r=g.$viewValue;u=N(e)||[];var B=G?Object.keys(u).sort():u,x,z,E,A,O={};v=k(r);var M=!1,T,V;Q={};for(A=0;E=B.length,A<E;A++){x=A;if(G&&(x=B[A],"$"===x.charAt(0)))continue;z=u[x];d=h(J,x,z)||"";(l=a[d])||(l=a[d]=[],c.push(d));d=v(x,z);M=M||d;z=h(C,x,z);
z=y(z)?z:"";V=K?K(e,R):G?B[A]:A;K&&(Q[V]=x);l.push({id:V,label:z,selected:d})}t||(w||null===r?a[""].unshift({id:"",label:"",selected:!M}):M||a[""].unshift({id:"?",label:"",selected:!0}));x=0;for(B=c.length;x<B;x++){d=c[x];l=a[d];P.length<=x?(r={element:H.clone().attr("label",d),label:l.label},u=[r],P.push(u),f.append(r.element)):(u=P[x],r=u[0],r.label!=d&&r.element.attr("label",r.label=d));M=null;A=0;for(E=l.length;A<E;A++)d=l[A],(v=u[A+1])?(M=v.element,v.label!==d.label&&(m(O,v.label,!1),m(O,d.label,
!0),M.text(v.label=d.label),M.prop("label",v.label)),v.id!==d.id&&M.val(v.id=d.id),M[0].selected!==d.selected&&(M.prop("selected",v.selected=d.selected),Ra&&M.prop("selected",v.selected))):(""===d.id&&w?T=w:(T=D.clone()).val(d.id).prop("selected",d.selected).attr("selected",d.selected).prop("label",d.label).text(d.label),u.push(v={element:T,label:d.label,id:d.id,selected:d.selected}),m(O,d.label,!0),M?M.after(T):r.element.append(T),M=T);for(A++;u.length>A;)d=u.pop(),m(O,d.label,!1),d.element.remove()}for(;P.length>
x;){l=P.pop();for(A=1;A<l.length;++A)m(O,l[A].label,!1);l[0].element.remove()}s(O,function(a,c){0<a?q.addOption(c):0>a&&q.removeOption(c)})}var v;if(!(v=r.match(d)))throw fg("iexp",r,ua(f));var C=c(v[2]||v[1]),B=v[4]||v[6],x=/ as /.test(v[0])&&v[1],z=x?c(x):null,G=v[5],J=c(v[3]||""),A=c(v[2]?v[1]:B),N=c(v[7]),K=v[8]?c(v[8]):null,Q={},P=[[{element:f,label:""}]],R={};w&&(a(w)(e),w.removeClass("ng-scope"),w.remove());f.empty();f.on("change",function(){e.$apply(function(){var a=N(e)||[],c;if(t)c=[],s(f.val(),
function(d){d=K?Q[d]:d;c.push("?"===d?u:""===d?null:h(z?z:A,d,a[d]))});else{var d=K?Q[f.val()]:f.val();c="?"===d?u:""===d?null:h(z?z:A,d,a[d])}g.$setViewValue(c);p()})});g.$render=p;e.$watchCollection(N,l);e.$watchCollection(function(){var a=N(e),c;if(a&&E(a)){c=Array(a.length);for(var d=0,f=a.length;d<f;d++)c[d]=h(C,d,a[d])}else if(a)for(d in c={},a)a.hasOwnProperty(d)&&(c[d]=h(C,d,a[d]));return c},l);t&&e.$watchCollection(function(){return g.$modelValue},l)}if(l[1]){var q=l[0];l=l[1];var t=h.multiple,
r=h.ngOptions,w=!1,B,n=!1,D=C(X.createElement("option")),H=C(X.createElement("optgroup")),v=D.clone();h=0;for(var x=g.children(),G=x.length;h<G;h++)if(""===x[h].value){B=w=x.eq(h);break}q.init(l,w,v);t&&(l.$isEmpty=function(a){return!a||0===a.length});r?p(e,g,l):t?m(e,g,l):k(e,g,l,q)}}}}],Yd=["$interpolate",function(a){var c={addOption:B,removeOption:B};return{restrict:"E",priority:100,compile:function(d,e){if(z(e.value)){var f=a(d.text(),!0);f||e.$set("value",d.text())}return function(a,d,e){var k=
d.parent(),m=k.data("$selectController")||k.parent().data("$selectController");m&&m.databound||(m=c);f?a.$watch(f,function(a,c){e.$set("value",a);c!==a&&m.removeOption(c);m.addOption(a,d)}):m.addOption(e.value,d);d.on("$destroy",function(){m.removeOption(e.value)})}}}}],Xd=da({restrict:"E",terminal:!1}),Ac=function(){return{restrict:"A",require:"?ngModel",link:function(a,c,d,e){e&&(d.required=!0,e.$validators.required=function(a,c){return!d.required||!e.$isEmpty(c)},d.$observe("required",function(){e.$validate()}))}}},
zc=function(){return{restrict:"A",require:"?ngModel",link:function(a,c,d,e){if(e){var f,g=d.ngPattern||d.pattern;d.$observe("pattern",function(a){x(a)&&0<a.length&&(a=new RegExp("^"+a+"$"));if(a&&!a.test)throw M("ngPattern")("noregexp",g,a,ua(c));f=a||u;e.$validate()});e.$validators.pattern=function(a){return e.$isEmpty(a)||z(f)||f.test(a)}}}}},Cc=function(){return{restrict:"A",require:"?ngModel",link:function(a,c,d,e){if(e){var f=-1;d.$observe("maxlength",function(a){a=$(a);f=isNaN(a)?-1:a;e.$validate()});
e.$validators.maxlength=function(a,c){return 0>f||e.$isEmpty(c)||c.length<=f}}}}},Bc=function(){return{restrict:"A",require:"?ngModel",link:function(a,c,d,e){if(e){var f=0;d.$observe("minlength",function(a){f=$(a)||0;e.$validate()});e.$validators.minlength=function(a,c){return e.$isEmpty(c)||c.length>=f}}}}};P.angular.bootstrap?console.log("WARNING: Tried to load angular more than once."):(Nd(),Pd(aa),C(X).ready(function(){Jd(X,tc)}))})(window,document);!window.angular.$$csp()&&window.angular.element(document).find("head").prepend('<style type="text/css">@charset "UTF-8";[ng\\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\\:form{display:block;}</style>');
//# sourceMappingURL=angular.min.js.map
"use strict";var directiveModule=angular.module("angularjs-dropdown-multiselect",[]);directiveModule.directive("ngDropdownMultiselect",["$filter","$document","$compile","$parse",function($filter,$document){return{restrict:"AE",scope:{selectedModel:"=",options:"=",extraSettings:"=",events:"=",searchFilter:"=?",translationTexts:"=",groupBy:"@"},template:function(element,attrs){var checkboxes=attrs.checkboxes?!0:!1,groups=attrs.groupBy?!0:!1,template='<div class="multiselect-parent btn-group dropdown-multiselect">';template+='<button type="button" class="dropdown-toggle" ng-class="settings.buttonClasses" ng-click="toggleDropdown()">{{getButtonText()}}&nbsp;<i class="icon icon-chevron-thin-down"></i></button>',template+="<ul class=\"dropdown-menu dropdown-menu-form\" ng-style=\"{display: open ? 'block' : 'none', height : settings.scrollable ? settings.scrollableHeight : 'auto' }\" style=\"overflow: scroll\" >",template+='<li ng-hide="!settings.showCheckAll || settings.selectionLimit > 0"><a data-ng-click="selectAll()"><span class="icon icon-check"></span>  {{texts.checkAll}}</a>',template+='<li ng-show="settings.showUncheckAll"><a data-ng-click="deselectAll();"><span class="glyphicon glyphicon-remove"></span>   {{texts.uncheckAll}}</a></li>',template+='<li ng-hide="(!settings.showCheckAll || settings.selectionLimit > 0) && !settings.showUncheckAll" class="divider"></li>',template+='<li ng-show="settings.enableSearch"><div class="dropdown-header"><input type="text" class="form-control" style="width: 100%;" ng-model="searchFilter" placeholder="{{texts.searchPlaceholder}}" /></li>',template+='<li ng-show="settings.enableSearch" class="divider"></li>',groups?(template+='<li ng-repeat-start="option in orderedItems track by $index | filter: searchFilter" ng-show="getPropertyForObject(option, settings.groupBy) !== getPropertyForObject(orderedItems[$index - 1], settings.groupBy)" role="presentation" class="dropdown-header">{{ getGroupTitle(getPropertyForObject(option, settings.groupBy)) }}</li>',template+='<li ng-repeat-end role="presentation">'):template+='<li role="presentation" ng-repeat="option in options track by $index | filter: searchFilter">',template+='<a role="menuitem" tabindex="-1" ng-click="setSelectedItem(getPropertyForObject(option,settings.idProp))">',template+=checkboxes?'<div class="checkbox"><label><input class="checkboxInput" type="checkbox" ng-click="checkboxClick($event, getPropertyForObject(option,settings.idProp))" ng-checked="isChecked(getPropertyForObject(option,settings.idProp))" /> {{getPropertyForObject(option, settings.displayProp)}}</label></div></a>':"<span data-ng-class=\"{'icon icon-check': isChecked(getPropertyForObject(option,settings.idProp))}\"></span> {{getPropertyForObject(option, settings.displayProp)}}</a>",template+="</li>",template+='<li class="divider" ng-show="settings.selectionLimit > 1"></li>',template+='<li role="presentation" ng-show="settings.selectionLimit > 1"><a role="menuitem">{{selectedModel.length}} {{texts.selectionOf}} {{settings.selectionLimit}} {{texts.selectionCount}}</a></li>',template+="</ul>",template+="</div>",element.html(template)},link:function($scope,$element,$attrs){function getFindObj(id){var findObj={};return""===$scope.settings.externalIdProp?findObj[$scope.settings.idProp]=id:findObj[$scope.settings.externalIdProp]=id,findObj}function clearObject(object){for(var prop in object)delete object[prop]}var $dropdownTrigger=$element.children()[0];$scope.toggleDropdown=function(){$scope.open=!$scope.open},$scope.checkboxClick=function($event,id){$scope.setSelectedItem(id),$event.stopImmediatePropagation()},$scope.externalEvents={onItemSelect:angular.noop,onItemDeselect:angular.noop,onSelectAll:angular.noop,onDeselectAll:angular.noop,onInitDone:angular.noop,onMaxSelectionReached:angular.noop},$scope.settings={dynamicTitle:!0,scrollable:!1,scrollableHeight:"300px",closeOnBlur:!0,displayProp:"label",idProp:"id",externalIdProp:"id",enableSearch:!1,selectionLimit:0,showCheckAll:!0,showUncheckAll:!0,closeOnSelect:!1,buttonClasses:"btn btn-default",closeOnDeselect:!1,groupBy:$attrs.groupBy||void 0,groupByTextProvider:null,smartButtonMaxItems:0,smartButtonTextConverter:angular.noop},$scope.texts={checkAll:"Check All",uncheckAll:"Uncheck All",selectionCount:"checked",selectionOf:"/",searchPlaceholder:"Search...",buttonDefaultText:"Select",dynamicButtonTextSuffix:"checked"},$scope.searchFilter=$scope.searchFilter||"",angular.isDefined($scope.settings.groupBy)&&$scope.$watch("options",function(newValue){angular.isDefined(newValue)&&($scope.orderedItems=$filter("orderBy")(newValue,$scope.settings.groupBy))}),angular.extend($scope.settings,$scope.extraSettings||[]),angular.extend($scope.externalEvents,$scope.events||[]),angular.extend($scope.texts,$scope.translationTexts),$scope.singleSelection=1===$scope.settings.selectionLimit,$scope.singleSelection&&angular.isArray($scope.selectedModel)&&0===$scope.selectedModel.length&&clearObject($scope.selectedModel),$scope.settings.closeOnBlur&&$document.on("click",function(e){for(var target=e.target.parentElement,parentFound=!1;angular.isDefined(target)&&null!==target&&!parentFound;)lodash.contains(target.className.split(" "),"multiselect-parent")&&!parentFound&&target===$dropdownTrigger&&(parentFound=!0),target=target.parentElement;parentFound||$scope.$apply(function(){$scope.open=!1})}),$scope.getGroupTitle=function(groupValue){return null!==$scope.settings.groupByTextProvider?$scope.settings.groupByTextProvider(groupValue):groupValue},$scope.getButtonText=function(){if($scope.settings.dynamicTitle&&($scope.selectedModel.length>0||angular.isObject($scope.selectedModel)&&lodash.keys($scope.selectedModel).length>0)){if($scope.settings.smartButtonMaxItems>0){var itemsText=[];return angular.forEach($scope.options,function(optionItem){if($scope.isChecked($scope.getPropertyForObject(optionItem,$scope.settings.idProp))){var displayText=$scope.getPropertyForObject(optionItem,$scope.settings.displayProp),converterResponse=$scope.settings.smartButtonTextConverter(displayText,optionItem);itemsText.push(converterResponse?converterResponse:displayText)}}),$scope.selectedModel.length>$scope.settings.smartButtonMaxItems&&(itemsText=itemsText.slice(0,$scope.settings.smartButtonMaxItems),itemsText.push("...")),itemsText.join(", ")}var totalSelected;return totalSelected=$scope.singleSelection?null!==$scope.selectedModel&&angular.isDefined($scope.selectedModel[$scope.settings.idProp])?1:0:angular.isDefined($scope.selectedModel)?$scope.selectedModel.length:0,0===totalSelected?$scope.texts.buttonDefaultText:totalSelected+" "+$scope.texts.dynamicButtonTextSuffix}return $scope.texts.buttonDefaultText},$scope.getPropertyForObject=function(object,property){return angular.isDefined(object)&&object.hasOwnProperty(property)?object[property]:""},$scope.selectAll=function(){$scope.deselectAll(!1),$scope.externalEvents.onSelectAll(),angular.forEach($scope.options,function(value){$scope.setSelectedItem(value[$scope.settings.idProp],!0)})},$scope.deselectAll=function(sendEvent){sendEvent=sendEvent||!0,sendEvent&&$scope.externalEvents.onDeselectAll(),$scope.singleSelection?clearObject($scope.selectedModel):$scope.selectedModel.splice(0,$scope.selectedModel.length)},$scope.setSelectedItem=function(id,dontRemove){var findObj=getFindObj(id),finalObj=null;if(finalObj=""===$scope.settings.externalIdProp?lodash.find($scope.options,findObj):findObj,$scope.singleSelection)return clearObject($scope.selectedModel),angular.extend($scope.selectedModel,finalObj),void $scope.externalEvents.onItemSelect(finalObj);dontRemove=dontRemove||!1;var exists=-1!==lodash.findIndex($scope.selectedModel,findObj);!dontRemove&&exists?($scope.selectedModel.splice(lodash.findIndex($scope.selectedModel,findObj),1),$scope.externalEvents.onItemDeselect(findObj)):!exists&&(0===$scope.settings.selectionLimit||$scope.selectedModel.length<$scope.settings.selectionLimit)&&($scope.selectedModel.push(finalObj),$scope.externalEvents.onItemSelect(finalObj))},$scope.isChecked=function(id){return $scope.singleSelection?null!==$scope.selectedModel&&angular.isDefined($scope.selectedModel[$scope.settings.idProp])&&$scope.selectedModel[$scope.settings.idProp]===getFindObj(id)[$scope.settings.idProp]:-1!==lodash.findIndex($scope.selectedModel,getFindObj(id))},$scope.externalEvents.onInitDone()}}}]);

"function"!==typeof Object.create&&(Object.create=function(f){function g(){}g.prototype=f;return new g});
(function(f,g,k){var l={init:function(a,b){this.$elem=f(b);this.options=f.extend({},f.fn.owlCarousel.options,this.$elem.data(),a);this.userOptions=a;this.loadContent()},loadContent:function(){function a(a){var d,e="";if("function"===typeof b.options.jsonSuccess)b.options.jsonSuccess.apply(this,[a]);else{for(d in a.owl)a.owl.hasOwnProperty(d)&&(e+=a.owl[d].item);b.$elem.html(e)}b.logIn()}var b=this,e;"function"===typeof b.options.beforeInit&&b.options.beforeInit.apply(this,[b.$elem]);"string"===typeof b.options.jsonPath?
(e=b.options.jsonPath,f.getJSON(e,a)):b.logIn()},logIn:function(){this.$elem.data("owl-originalStyles",this.$elem.attr("style"));this.$elem.data("owl-originalClasses",this.$elem.attr("class"));this.$elem.css({opacity:0});this.orignalItems=this.options.items;this.checkBrowser();this.wrapperWidth=0;this.checkVisible=null;this.setVars()},setVars:function(){if(0===this.$elem.children().length)return!1;this.baseClass();this.eventTypes();this.$userItems=this.$elem.children();this.itemsAmount=this.$userItems.length;
this.wrapItems();this.$owlItems=this.$elem.find(".owl-item");this.$owlWrapper=this.$elem.find(".owl-wrapper");this.playDirection="next";this.prevItem=0;this.prevArr=[0];this.currentItem=0;this.customEvents();this.onStartup()},onStartup:function(){this.updateItems();this.calculateAll();this.buildControls();this.updateControls();this.response();this.moveEvents();this.stopOnHover();this.owlStatus();!1!==this.options.transitionStyle&&this.transitionTypes(this.options.transitionStyle);!0===this.options.autoPlay&&
(this.options.autoPlay=5E3);this.play();this.$elem.find(".owl-wrapper").css("display","block");this.$elem.is(":visible")?this.$elem.css("opacity",1):this.watchVisibility();this.onstartup=!1;this.eachMoveUpdate();"function"===typeof this.options.afterInit&&this.options.afterInit.apply(this,[this.$elem])},eachMoveUpdate:function(){!0===this.options.lazyLoad&&this.lazyLoad();!0===this.options.autoHeight&&this.autoHeight();this.onVisibleItems();"function"===typeof this.options.afterAction&&this.options.afterAction.apply(this,
[this.$elem])},updateVars:function(){"function"===typeof this.options.beforeUpdate&&this.options.beforeUpdate.apply(this,[this.$elem]);this.watchVisibility();this.updateItems();this.calculateAll();this.updatePosition();this.updateControls();this.eachMoveUpdate();"function"===typeof this.options.afterUpdate&&this.options.afterUpdate.apply(this,[this.$elem])},reload:function(){var a=this;g.setTimeout(function(){a.updateVars()},0)},watchVisibility:function(){var a=this;if(!1===a.$elem.is(":visible"))a.$elem.css({opacity:0}),
g.clearInterval(a.autoPlayInterval),g.clearInterval(a.checkVisible);else return!1;a.checkVisible=g.setInterval(function(){a.$elem.is(":visible")&&(a.reload(),a.$elem.animate({opacity:1},200),g.clearInterval(a.checkVisible))},500)},wrapItems:function(){this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');this.wrapperOuter=this.$elem.find(".owl-wrapper-outer");this.$elem.css("display","block")},
baseClass:function(){var a=this.$elem.hasClass(this.options.baseClass),b=this.$elem.hasClass(this.options.theme);a||this.$elem.addClass(this.options.baseClass);b||this.$elem.addClass(this.options.theme)},updateItems:function(){var a,b;if(!1===this.options.responsive)return!1;if(!0===this.options.singleItem)return this.options.items=this.orignalItems=1,this.options.itemsCustom=!1,this.options.itemsDesktop=!1,this.options.itemsDesktopSmall=!1,this.options.itemsTablet=!1,this.options.itemsTabletSmall=
!1,this.options.itemsMobile=!1;a=f(this.options.responsiveBaseWidth).width();a>(this.options.itemsDesktop[0]||this.orignalItems)&&(this.options.items=this.orignalItems);if(!1!==this.options.itemsCustom)for(this.options.itemsCustom.sort(function(a,b){return a[0]-b[0]}),b=0;b<this.options.itemsCustom.length;b+=1)this.options.itemsCustom[b][0]<=a&&(this.options.items=this.options.itemsCustom[b][1]);else a<=this.options.itemsDesktop[0]&&!1!==this.options.itemsDesktop&&(this.options.items=this.options.itemsDesktop[1]),
a<=this.options.itemsDesktopSmall[0]&&!1!==this.options.itemsDesktopSmall&&(this.options.items=this.options.itemsDesktopSmall[1]),a<=this.options.itemsTablet[0]&&!1!==this.options.itemsTablet&&(this.options.items=this.options.itemsTablet[1]),a<=this.options.itemsTabletSmall[0]&&!1!==this.options.itemsTabletSmall&&(this.options.items=this.options.itemsTabletSmall[1]),a<=this.options.itemsMobile[0]&&!1!==this.options.itemsMobile&&(this.options.items=this.options.itemsMobile[1]);this.options.items>this.itemsAmount&&
!0===this.options.itemsScaleUp&&(this.options.items=this.itemsAmount)},response:function(){var a=this,b,e;if(!0!==a.options.responsive)return!1;e=f(g).width();a.resizer=function(){f(g).width()!==e&&(!1!==a.options.autoPlay&&g.clearInterval(a.autoPlayInterval),g.clearTimeout(b),b=g.setTimeout(function(){e=f(g).width();a.updateVars()},a.options.responsiveRefreshRate))};f(g).resize(a.resizer)},updatePosition:function(){this.jumpTo(this.currentItem);!1!==this.options.autoPlay&&this.checkAp()},appendItemsSizes:function(){var a=
this,b=0,e=a.itemsAmount-a.options.items;a.$owlItems.each(function(c){var d=f(this);d.css({width:a.itemWidth}).data("owl-item",Number(c));if(0===c%a.options.items||c===e)c>e||(b+=1);d.data("owl-roundPages",b)})},appendWrapperSizes:function(){this.$owlWrapper.css({width:this.$owlItems.length*this.itemWidth*2,left:0});this.appendItemsSizes()},calculateAll:function(){this.calculateWidth();this.appendWrapperSizes();this.loops();this.max()},calculateWidth:function(){this.itemWidth=Math.round(this.$elem.width()/
this.options.items)},max:function(){var a=-1*(this.itemsAmount*this.itemWidth-this.options.items*this.itemWidth);this.options.items>this.itemsAmount?this.maximumPixels=a=this.maximumItem=0:(this.maximumItem=this.itemsAmount-this.options.items,this.maximumPixels=a);return a},min:function(){return 0},loops:function(){var a=0,b=0,e,c;this.positionsInArray=[0];this.pagesInArray=[];for(e=0;e<this.itemsAmount;e+=1)b+=this.itemWidth,this.positionsInArray.push(-b),!0===this.options.scrollPerPage&&(c=f(this.$owlItems[e]),
c=c.data("owl-roundPages"),c!==a&&(this.pagesInArray[a]=this.positionsInArray[e],a=c))},buildControls:function(){if(!0===this.options.navigation||!0===this.options.pagination)this.owlControls=f('<div class="owl-controls"/>').toggleClass("clickable",!this.browser.isTouch).appendTo(this.$elem);!0===this.options.pagination&&this.buildPagination();!0===this.options.navigation&&this.buildButtons()},buildButtons:function(){var a=this,b=f('<div class="owl-buttons"/>');a.owlControls.append(b);a.buttonPrev=
f("<div/>",{"class":"owl-prev",html:a.options.navigationText[0]||""});a.buttonNext=f("<div/>",{"class":"owl-next",html:a.options.navigationText[1]||""});b.append(a.buttonPrev).append(a.buttonNext);b.on("touchstart.owlControls mousedown.owlControls",'div[class^="owl"]',function(a){a.preventDefault()});b.on("touchend.owlControls mouseup.owlControls",'div[class^="owl"]',function(b){b.preventDefault();f(this).hasClass("owl-next")?a.next():a.prev()})},buildPagination:function(){var a=this;a.paginationWrapper=
f('<div class="owl-pagination"/>');a.owlControls.append(a.paginationWrapper);a.paginationWrapper.on("touchend.owlControls mouseup.owlControls",".owl-page",function(b){b.preventDefault();Number(f(this).data("owl-page"))!==a.currentItem&&a.goTo(Number(f(this).data("owl-page")),!0)})},updatePagination:function(){var a,b,e,c,d,g;if(!1===this.options.pagination)return!1;this.paginationWrapper.html("");a=0;b=this.itemsAmount-this.itemsAmount%this.options.items;for(c=0;c<this.itemsAmount;c+=1)0===c%this.options.items&&
(a+=1,b===c&&(e=this.itemsAmount-this.options.items),d=f("<div/>",{"class":"owl-page"}),g=f("<span></span>",{text:!0===this.options.paginationNumbers?a:"","class":!0===this.options.paginationNumbers?"owl-numbers":""}),d.append(g),d.data("owl-page",b===c?e:c),d.data("owl-roundPages",a),this.paginationWrapper.append(d));this.checkPagination()},checkPagination:function(){var a=this;if(!1===a.options.pagination)return!1;a.paginationWrapper.find(".owl-page").each(function(){f(this).data("owl-roundPages")===
f(a.$owlItems[a.currentItem]).data("owl-roundPages")&&(a.paginationWrapper.find(".owl-page").removeClass("active"),f(this).addClass("active"))})},checkNavigation:function(){if(!1===this.options.navigation)return!1;!1===this.options.rewindNav&&(0===this.currentItem&&0===this.maximumItem?(this.buttonPrev.addClass("disabled"),this.buttonNext.addClass("disabled")):0===this.currentItem&&0!==this.maximumItem?(this.buttonPrev.addClass("disabled"),this.buttonNext.removeClass("disabled")):this.currentItem===
this.maximumItem?(this.buttonPrev.removeClass("disabled"),this.buttonNext.addClass("disabled")):0!==this.currentItem&&this.currentItem!==this.maximumItem&&(this.buttonPrev.removeClass("disabled"),this.buttonNext.removeClass("disabled")))},updateControls:function(){this.updatePagination();this.checkNavigation();this.owlControls&&(this.options.items>=this.itemsAmount?this.owlControls.hide():this.owlControls.show())},destroyControls:function(){this.owlControls&&this.owlControls.remove()},next:function(a){if(this.isTransition)return!1;
this.currentItem+=!0===this.options.scrollPerPage?this.options.items:1;if(this.currentItem>this.maximumItem+(!0===this.options.scrollPerPage?this.options.items-1:0))if(!0===this.options.rewindNav)this.currentItem=0,a="rewind";else return this.currentItem=this.maximumItem,!1;this.goTo(this.currentItem,a)},prev:function(a){if(this.isTransition)return!1;this.currentItem=!0===this.options.scrollPerPage&&0<this.currentItem&&this.currentItem<this.options.items?0:this.currentItem-(!0===this.options.scrollPerPage?
this.options.items:1);if(0>this.currentItem)if(!0===this.options.rewindNav)this.currentItem=this.maximumItem,a="rewind";else return this.currentItem=0,!1;this.goTo(this.currentItem,a)},goTo:function(a,b,e){var c=this;if(c.isTransition)return!1;"function"===typeof c.options.beforeMove&&c.options.beforeMove.apply(this,[c.$elem]);a>=c.maximumItem?a=c.maximumItem:0>=a&&(a=0);c.currentItem=c.owl.currentItem=a;if(!1!==c.options.transitionStyle&&"drag"!==e&&1===c.options.items&&!0===c.browser.support3d)return c.swapSpeed(0),
!0===c.browser.support3d?c.transition3d(c.positionsInArray[a]):c.css2slide(c.positionsInArray[a],1),c.afterGo(),c.singleItemTransition(),!1;a=c.positionsInArray[a];!0===c.browser.support3d?(c.isCss3Finish=!1,!0===b?(c.swapSpeed("paginationSpeed"),g.setTimeout(function(){c.isCss3Finish=!0},c.options.paginationSpeed)):"rewind"===b?(c.swapSpeed(c.options.rewindSpeed),g.setTimeout(function(){c.isCss3Finish=!0},c.options.rewindSpeed)):(c.swapSpeed("slideSpeed"),g.setTimeout(function(){c.isCss3Finish=!0},
c.options.slideSpeed)),c.transition3d(a)):!0===b?c.css2slide(a,c.options.paginationSpeed):"rewind"===b?c.css2slide(a,c.options.rewindSpeed):c.css2slide(a,c.options.slideSpeed);c.afterGo()},jumpTo:function(a){"function"===typeof this.options.beforeMove&&this.options.beforeMove.apply(this,[this.$elem]);a>=this.maximumItem||-1===a?a=this.maximumItem:0>=a&&(a=0);this.swapSpeed(0);!0===this.browser.support3d?this.transition3d(this.positionsInArray[a]):this.css2slide(this.positionsInArray[a],1);this.currentItem=
this.owl.currentItem=a;this.afterGo()},afterGo:function(){this.prevArr.push(this.currentItem);this.prevItem=this.owl.prevItem=this.prevArr[this.prevArr.length-2];this.prevArr.shift(0);this.prevItem!==this.currentItem&&(this.checkPagination(),this.checkNavigation(),this.eachMoveUpdate(),!1!==this.options.autoPlay&&this.checkAp());"function"===typeof this.options.afterMove&&this.prevItem!==this.currentItem&&this.options.afterMove.apply(this,[this.$elem])},stop:function(){this.apStatus="stop";g.clearInterval(this.autoPlayInterval)},
checkAp:function(){"stop"!==this.apStatus&&this.play()},play:function(){var a=this;a.apStatus="play";if(!1===a.options.autoPlay)return!1;g.clearInterval(a.autoPlayInterval);a.autoPlayInterval=g.setInterval(function(){a.next(!0)},a.options.autoPlay)},swapSpeed:function(a){"slideSpeed"===a?this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)):"paginationSpeed"===a?this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)):"string"!==typeof a&&this.$owlWrapper.css(this.addCssSpeed(a))},
addCssSpeed:function(a){return{"-webkit-transition":"all "+a+"ms ease","-moz-transition":"all "+a+"ms ease","-o-transition":"all "+a+"ms ease",transition:"all "+a+"ms ease"}},removeTransition:function(){return{"-webkit-transition":"","-moz-transition":"","-o-transition":"",transition:""}},doTranslate:function(a){return{"-webkit-transform":"translate3d("+a+"px, 0px, 0px)","-moz-transform":"translate3d("+a+"px, 0px, 0px)","-o-transform":"translate3d("+a+"px, 0px, 0px)","-ms-transform":"translate3d("+
a+"px, 0px, 0px)",transform:"translate3d("+a+"px, 0px,0px)"}},transition3d:function(a){this.$owlWrapper.css(this.doTranslate(a))},css2move:function(a){this.$owlWrapper.css({left:a})},css2slide:function(a,b){var e=this;e.isCssFinish=!1;e.$owlWrapper.stop(!0,!0).animate({left:a},{duration:b||e.options.slideSpeed,complete:function(){e.isCssFinish=!0}})},checkBrowser:function(){var a=k.createElement("div");a.style.cssText="  -moz-transform:translate3d(0px, 0px, 0px); -ms-transform:translate3d(0px, 0px, 0px); -o-transform:translate3d(0px, 0px, 0px); -webkit-transform:translate3d(0px, 0px, 0px); transform:translate3d(0px, 0px, 0px)";
a=a.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);this.browser={support3d:null!==a&&1===a.length,isTouch:"ontouchstart"in g||g.navigator.msMaxTouchPoints}},moveEvents:function(){if(!1!==this.options.mouseDrag||!1!==this.options.touchDrag)this.gestures(),this.disabledEvents()},eventTypes:function(){var a=["s","e","x"];this.ev_types={};!0===this.options.mouseDrag&&!0===this.options.touchDrag?a=["touchstart.owl mousedown.owl","touchmove.owl mousemove.owl","touchend.owl touchcancel.owl mouseup.owl"]:
!1===this.options.mouseDrag&&!0===this.options.touchDrag?a=["touchstart.owl","touchmove.owl","touchend.owl touchcancel.owl"]:!0===this.options.mouseDrag&&!1===this.options.touchDrag&&(a=["mousedown.owl","mousemove.owl","mouseup.owl"]);this.ev_types.start=a[0];this.ev_types.move=a[1];this.ev_types.end=a[2]},disabledEvents:function(){this.$elem.on("dragstart.owl",function(a){a.preventDefault()});this.$elem.on("mousedown.disableTextSelect",function(a){return f(a.target).is("input, textarea, select, option")})},
gestures:function(){function a(a){if(void 0!==a.touches)return{x:a.touches[0].pageX,y:a.touches[0].pageY};if(void 0===a.touches){if(void 0!==a.pageX)return{x:a.pageX,y:a.pageY};if(void 0===a.pageX)return{x:a.clientX,y:a.clientY}}}function b(a){"on"===a?(f(k).on(d.ev_types.move,e),f(k).on(d.ev_types.end,c)):"off"===a&&(f(k).off(d.ev_types.move),f(k).off(d.ev_types.end))}function e(b){b=b.originalEvent||b||g.event;d.newPosX=a(b).x-h.offsetX;d.newPosY=a(b).y-h.offsetY;d.newRelativeX=d.newPosX-h.relativePos;
"function"===typeof d.options.startDragging&&!0!==h.dragging&&0!==d.newRelativeX&&(h.dragging=!0,d.options.startDragging.apply(d,[d.$elem]));(8<d.newRelativeX||-8>d.newRelativeX)&&!0===d.browser.isTouch&&(void 0!==b.preventDefault?b.preventDefault():b.returnValue=!1,h.sliding=!0);(10<d.newPosY||-10>d.newPosY)&&!1===h.sliding&&f(k).off("touchmove.owl");d.newPosX=Math.max(Math.min(d.newPosX,d.newRelativeX/5),d.maximumPixels+d.newRelativeX/5);!0===d.browser.support3d?d.transition3d(d.newPosX):d.css2move(d.newPosX)}
function c(a){a=a.originalEvent||a||g.event;var c;a.target=a.target||a.srcElement;h.dragging=!1;!0!==d.browser.isTouch&&d.$owlWrapper.removeClass("grabbing");d.dragDirection=0>d.newRelativeX?d.owl.dragDirection="left":d.owl.dragDirection="right";0!==d.newRelativeX&&(c=d.getNewPosition(),d.goTo(c,!1,"drag"),h.targetElement===a.target&&!0!==d.browser.isTouch&&(f(a.target).on("click.disable",function(a){a.stopImmediatePropagation();a.stopPropagation();a.preventDefault();f(a.target).off("click.disable")}),
a=f._data(a.target,"events").click,c=a.pop(),a.splice(0,0,c)));b("off")}var d=this,h={offsetX:0,offsetY:0,baseElWidth:0,relativePos:0,position:null,minSwipe:null,maxSwipe:null,sliding:null,dargging:null,targetElement:null};d.isCssFinish=!0;d.$elem.on(d.ev_types.start,".owl-wrapper",function(c){c=c.originalEvent||c||g.event;var e;if(3===c.which)return!1;if(!(d.itemsAmount<=d.options.items)){if(!1===d.isCssFinish&&!d.options.dragBeforeAnimFinish||!1===d.isCss3Finish&&!d.options.dragBeforeAnimFinish)return!1;
!1!==d.options.autoPlay&&g.clearInterval(d.autoPlayInterval);!0===d.browser.isTouch||d.$owlWrapper.hasClass("grabbing")||d.$owlWrapper.addClass("grabbing");d.newPosX=0;d.newRelativeX=0;f(this).css(d.removeTransition());e=f(this).position();h.relativePos=e.left;h.offsetX=a(c).x-e.left;h.offsetY=a(c).y-e.top;b("on");h.sliding=!1;h.targetElement=c.target||c.srcElement}})},getNewPosition:function(){var a=this.closestItem();a>this.maximumItem?a=this.currentItem=this.maximumItem:0<=this.newPosX&&(this.currentItem=
a=0);return a},closestItem:function(){var a=this,b=!0===a.options.scrollPerPage?a.pagesInArray:a.positionsInArray,e=a.newPosX,c=null;f.each(b,function(d,g){e-a.itemWidth/20>b[d+1]&&e-a.itemWidth/20<g&&"left"===a.moveDirection()?(c=g,a.currentItem=!0===a.options.scrollPerPage?f.inArray(c,a.positionsInArray):d):e+a.itemWidth/20<g&&e+a.itemWidth/20>(b[d+1]||b[d]-a.itemWidth)&&"right"===a.moveDirection()&&(!0===a.options.scrollPerPage?(c=b[d+1]||b[b.length-1],a.currentItem=f.inArray(c,a.positionsInArray)):
(c=b[d+1],a.currentItem=d+1))});return a.currentItem},moveDirection:function(){var a;0>this.newRelativeX?(a="right",this.playDirection="next"):(a="left",this.playDirection="prev");return a},customEvents:function(){var a=this;a.$elem.on("owl.next",function(){a.next()});a.$elem.on("owl.prev",function(){a.prev()});a.$elem.on("owl.play",function(b,e){a.options.autoPlay=e;a.play();a.hoverStatus="play"});a.$elem.on("owl.stop",function(){a.stop();a.hoverStatus="stop"});a.$elem.on("owl.goTo",function(b,e){a.goTo(e)});
a.$elem.on("owl.jumpTo",function(b,e){a.jumpTo(e)})},stopOnHover:function(){var a=this;!0===a.options.stopOnHover&&!0!==a.browser.isTouch&&!1!==a.options.autoPlay&&(a.$elem.on("mouseover",function(){a.stop()}),a.$elem.on("mouseout",function(){"stop"!==a.hoverStatus&&a.play()}))},lazyLoad:function(){var a,b,e,c,d;if(!1===this.options.lazyLoad)return!1;for(a=0;a<this.itemsAmount;a+=1)b=f(this.$owlItems[a]),"loaded"!==b.data("owl-loaded")&&(e=b.data("owl-item"),c=b.find(".lazyOwl"),"string"!==typeof c.data("src")?
b.data("owl-loaded","loaded"):(void 0===b.data("owl-loaded")&&(c.hide(),b.addClass("loading").data("owl-loaded","checked")),(d=!0===this.options.lazyFollow?e>=this.currentItem:!0)&&e<this.currentItem+this.options.items&&c.length&&this.lazyPreload(b,c)))},lazyPreload:function(a,b){function e(){a.data("owl-loaded","loaded").removeClass("loading");b.removeAttr("data-src");"fade"===d.options.lazyEffect?b.fadeIn(400):b.show();"function"===typeof d.options.afterLazyLoad&&d.options.afterLazyLoad.apply(this,
[d.$elem])}function c(){f+=1;d.completeImg(b.get(0))||!0===k?e():100>=f?g.setTimeout(c,100):e()}var d=this,f=0,k;"DIV"===b.prop("tagName")?(b.css("background-image","url("+b.data("src")+")"),k=!0):b[0].src=b.data("src");c()},autoHeight:function(){function a(){var a=f(e.$owlItems[e.currentItem]).height();e.wrapperOuter.css("height",a+"px");e.wrapperOuter.hasClass("autoHeight")||g.setTimeout(function(){e.wrapperOuter.addClass("autoHeight")},0)}function b(){d+=1;e.completeImg(c.get(0))?a():100>=d?g.setTimeout(b,
100):e.wrapperOuter.css("height","")}var e=this,c=f(e.$owlItems[e.currentItem]).find("img"),d;void 0!==c.get(0)?(d=0,b()):a()},completeImg:function(a){return!a.complete||"undefined"!==typeof a.naturalWidth&&0===a.naturalWidth?!1:!0},onVisibleItems:function(){var a;!0===this.options.addClassActive&&this.$owlItems.removeClass("active");this.visibleItems=[];for(a=this.currentItem;a<this.currentItem+this.options.items;a+=1)this.visibleItems.push(a),!0===this.options.addClassActive&&f(this.$owlItems[a]).addClass("active");
this.owl.visibleItems=this.visibleItems},transitionTypes:function(a){this.outClass="owl-"+a+"-out";this.inClass="owl-"+a+"-in"},singleItemTransition:function(){var a=this,b=a.outClass,e=a.inClass,c=a.$owlItems.eq(a.currentItem),d=a.$owlItems.eq(a.prevItem),f=Math.abs(a.positionsInArray[a.currentItem])+a.positionsInArray[a.prevItem],g=Math.abs(a.positionsInArray[a.currentItem])+a.itemWidth/2;a.isTransition=!0;a.$owlWrapper.addClass("owl-origin").css({"-webkit-transform-origin":g+"px","-moz-perspective-origin":g+
"px","perspective-origin":g+"px"});d.css({position:"relative",left:f+"px"}).addClass(b).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend",function(){a.endPrev=!0;d.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");a.clearTransStyle(d,b)});c.addClass(e).on("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend",function(){a.endCurrent=!0;c.off("webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend");a.clearTransStyle(c,e)})},clearTransStyle:function(a,
b){a.css({position:"",left:""}).removeClass(b);this.endPrev&&this.endCurrent&&(this.$owlWrapper.removeClass("owl-origin"),this.isTransition=this.endCurrent=this.endPrev=!1)},owlStatus:function(){this.owl={userOptions:this.userOptions,baseElement:this.$elem,userItems:this.$userItems,owlItems:this.$owlItems,currentItem:this.currentItem,prevItem:this.prevItem,visibleItems:this.visibleItems,isTouch:this.browser.isTouch,browser:this.browser,dragDirection:this.dragDirection}},clearEvents:function(){this.$elem.off(".owl owl mousedown.disableTextSelect");
f(k).off(".owl owl");f(g).off("resize",this.resizer)},unWrap:function(){0!==this.$elem.children().length&&(this.$owlWrapper.unwrap(),this.$userItems.unwrap().unwrap(),this.owlControls&&this.owlControls.remove());this.clearEvents();this.$elem.attr("style",this.$elem.data("owl-originalStyles")||"").attr("class",this.$elem.data("owl-originalClasses"))},destroy:function(){this.stop();g.clearInterval(this.checkVisible);this.unWrap();this.$elem.removeData()},reinit:function(a){a=f.extend({},this.userOptions,
a);this.unWrap();this.init(a,this.$elem)},addItem:function(a,b){var e;if(!a)return!1;if(0===this.$elem.children().length)return this.$elem.append(a),this.setVars(),!1;this.unWrap();e=void 0===b||-1===b?-1:b;e>=this.$userItems.length||-1===e?this.$userItems.eq(-1).after(a):this.$userItems.eq(e).before(a);this.setVars()},removeItem:function(a){if(0===this.$elem.children().length)return!1;a=void 0===a||-1===a?-1:a;this.unWrap();this.$userItems.eq(a).remove();this.setVars()}};f.fn.owlCarousel=function(a){return this.each(function(){if(!0===
f(this).data("owl-init"))return!1;f(this).data("owl-init",!0);var b=Object.create(l);b.init(a,this);f.data(this,"owlCarousel",b)})};f.fn.owlCarousel.options={items:5,itemsCustom:!1,itemsDesktop:[1199,4],itemsDesktopSmall:[979,3],itemsTablet:[768,2],itemsTabletSmall:!1,itemsMobile:[479,1],singleItem:!1,itemsScaleUp:!1,slideSpeed:200,paginationSpeed:800,rewindSpeed:1E3,autoPlay:!1,stopOnHover:!1,navigation:!1,navigationText:["prev","next"],rewindNav:!0,scrollPerPage:!1,pagination:!0,paginationNumbers:!1,
responsive:!0,responsiveRefreshRate:200,responsiveBaseWidth:g,baseClass:"owl-carousel",theme:"owl-theme",lazyLoad:!1,lazyFollow:!0,lazyEffect:"fade",autoHeight:!1,jsonPath:!1,jsonSuccess:!1,dragBeforeAnimFinish:!0,mouseDrag:!0,touchDrag:!0,addClassActive:!1,transitionStyle:!1,beforeUpdate:!1,afterUpdate:!1,beforeInit:!1,afterInit:!1,beforeMove:!1,afterMove:!1,afterAction:!1,startDragging:!1,afterLazyLoad:!1}})(jQuery,window,document);
/* ng-infinite-scroll - v1.0.0 - 2013-02-23 */
var mod;mod=angular.module("infinite-scroll",[]),mod.directive("infiniteScroll",["$rootScope","$window","$timeout",function(i,n,e){return{link:function(t,l,o){var r,c,f,a;return n=angular.element(n),f=0,null!=o.infiniteScrollDistance&&t.$watch(o.infiniteScrollDistance,function(i){return f=parseInt(i,10)}),a=!0,r=!1,null!=o.infiniteScrollDisabled&&t.$watch(o.infiniteScrollDisabled,function(i){return a=!i,a&&r?(r=!1,c()):void 0}),c=function(){var e,c,u,d;return d=n.height()+n.scrollTop(),e=l.offset().top+l.height(),c=e-d,u=n.height()*f>=c,u&&a?i.$$phase?t.$eval(o.infiniteScroll):t.$apply(o.infiniteScroll):u?r=!0:void 0},n.on("scroll",c),t.$on("$destroy",function(){return n.off("scroll",c)}),e(function(){return o.infiniteScrollImmediateCheck?t.$eval(o.infiniteScrollImmediateCheck)?c():void 0:c()},0)}}}]);
//fgnass.github.com/spin.js#v2.1.0
!function(a,b){"object"==typeof exports?module.exports=b():"function"==typeof define&&define.amd?define(b):a.Spinner=b()}(this,function(){"use strict";function a(a,b){var c,d=document.createElement(a||"div");for(c in b)d[c]=b[c];return d}function b(a){for(var b=1,c=arguments.length;c>b;b++)a.appendChild(arguments[b]);return a}function c(a,b,c,d){var e=["opacity",b,~~(100*a),c,d].join("-"),f=.01+c/d*100,g=Math.max(1-(1-a)/b*(100-f),a),h=j.substring(0,j.indexOf("Animation")).toLowerCase(),i=h&&"-"+h+"-"||"";return m[e]||(k.insertRule("@"+i+"keyframes "+e+"{0%{opacity:"+g+"}"+f+"%{opacity:"+a+"}"+(f+.01)+"%{opacity:1}"+(f+b)%100+"%{opacity:"+a+"}100%{opacity:"+g+"}}",k.cssRules.length),m[e]=1),e}function d(a,b){var c,d,e=a.style;for(b=b.charAt(0).toUpperCase()+b.slice(1),d=0;d<l.length;d++)if(c=l[d]+b,void 0!==e[c])return c;return void 0!==e[b]?b:void 0}function e(a,b){for(var c in b)a.style[d(a,c)||c]=b[c];return a}function f(a){for(var b=1;b<arguments.length;b++){var c=arguments[b];for(var d in c)void 0===a[d]&&(a[d]=c[d])}return a}function g(a,b){return"string"==typeof a?a:a[b%a.length]}function h(a){this.opts=f(a||{},h.defaults,n)}function i(){function c(b,c){return a("<"+b+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',c)}k.addRule(".spin-vml","behavior:url(#default#VML)"),h.prototype.lines=function(a,d){function f(){return e(c("group",{coordsize:k+" "+k,coordorigin:-j+" "+-j}),{width:k,height:k})}function h(a,h,i){b(m,b(e(f(),{rotation:360/d.lines*a+"deg",left:~~h}),b(e(c("roundrect",{arcsize:d.corners}),{width:j,height:d.scale*d.width,left:d.scale*d.radius,top:-d.scale*d.width>>1,filter:i}),c("fill",{color:g(d.color,a),opacity:d.opacity}),c("stroke",{opacity:0}))))}var i,j=d.scale*(d.length+d.width),k=2*d.scale*j,l=-(d.width+d.length)*d.scale*2+"px",m=e(f(),{position:"absolute",top:l,left:l});if(d.shadow)for(i=1;i<=d.lines;i++)h(i,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(i=1;i<=d.lines;i++)h(i);return b(a,m)},h.prototype.opacity=function(a,b,c,d){var e=a.firstChild;d=d.shadow&&d.lines||0,e&&b+d<e.childNodes.length&&(e=e.childNodes[b+d],e=e&&e.firstChild,e=e&&e.firstChild,e&&(e.opacity=c))}}var j,k,l=["webkit","Moz","ms","O"],m={},n={lines:12,length:7,width:5,radius:10,scale:1,rotate:0,corners:1,color:"#000",direction:1,speed:1,trail:100,opacity:.25,fps:20,zIndex:2e9,className:"spinner",top:"50%",left:"50%",position:"absolute"};if(h.defaults={},f(h.prototype,{spin:function(b){this.stop();var c=this,d=c.opts,f=c.el=e(a(0,{className:d.className}),{position:d.position,width:0,zIndex:d.zIndex});if(e(f,{left:d.left,top:d.top}),b&&b.insertBefore(f,b.firstChild||null),f.setAttribute("role","progressbar"),c.lines(f,c.opts),!j){var g,h=0,i=(d.lines-1)*(1-d.direction)/2,k=d.fps,l=k/d.speed,m=(1-d.opacity)/(l*d.trail/100),n=l/d.lines;!function o(){h++;for(var a=0;a<d.lines;a++)g=Math.max(1-(h+(d.lines-a)*n)%l*m,d.opacity),c.opacity(f,a*d.direction+i,g,d);c.timeout=c.el&&setTimeout(o,~~(1e3/k))}()}return c},stop:function(){var a=this.el;return a&&(clearTimeout(this.timeout),a.parentNode&&a.parentNode.removeChild(a),this.el=void 0),this},lines:function(d,f){function h(b,c){return e(a(),{position:"absolute",width:f.scale*(f.length+f.width)+"px",height:f.scale*f.width+"px",background:b,boxShadow:c,transformOrigin:"left",transform:"rotate("+~~(360/f.lines*k+f.rotate)+"deg) translate("+f.scale*f.radius+"px,0)",borderRadius:(f.corners*f.scale*f.width>>1)+"px"})}for(var i,k=0,l=(f.lines-1)*(1-f.direction)/2;k<f.lines;k++)i=e(a(),{position:"absolute",top:1+~(f.scale*f.width/2)+"px",transform:f.hwaccel?"translate3d(0,0,0)":"",opacity:f.opacity,animation:j&&c(f.opacity,f.trail,l+k*f.direction,f.lines)+" "+1/f.speed+"s linear infinite"}),f.shadow&&b(i,e(h("#000","0 0 4px #000"),{top:"2px"})),b(d,b(i,h(g(f.color,k),"0 0 1px rgba(0,0,0,.1)")));return d},opacity:function(a,b,c){b<a.childNodes.length&&(a.childNodes[b].style.opacity=c)}}),"undefined"!=typeof document){k=function(){var c=a("style",{type:"text/css"});return b(document.getElementsByTagName("head")[0],c),c.sheet||c.styleSheet}();var o=e(a("group"),{behavior:"url(#default#VML)"});!d(o,"transform")&&o.adj?i():j=d(o,"animation")}return h});
!function(a){"use strict";function b(a,b){return a.module("angularSpinner",[]).provider("usSpinnerConfig",function(){var a={};return{setDefaults:function(b){a=b||a},$get:function(){return{config:a}}}}).factory("usSpinnerService",["$rootScope",function(a){var b={};return b.spin=function(b){a.$broadcast("us-spinner:spin",b)},b.stop=function(b){a.$broadcast("us-spinner:stop",b)},b}]).directive("usSpinner",["$window","usSpinnerConfig",function(c,d){return{scope:!0,link:function(e,f,g){function h(){e.spinner&&e.spinner.stop()}var i=b||c.Spinner;e.spinner=null,e.key=a.isDefined(g.spinnerKey)?g.spinnerKey:!1,e.startActive=a.isDefined(g.spinnerStartActive)?e.$eval(g.spinnerStartActive):e.key?!1:!0,e.spin=function(){e.spinner&&e.spinner.spin(f[0])},e.stop=function(){e.startActive=!1,h()},e.$watch(g.usSpinner,function(a){h(),a=a||{};for(var b in d.config)void 0===a[b]&&(a[b]=d.config[b]);e.spinner=new i(a),(!e.key||e.startActive)&&e.spinner.spin(f[0])},!0),e.$on("us-spinner:spin",function(a,b){b===e.key&&e.spin()}),e.$on("us-spinner:stop",function(a,b){b===e.key&&e.stop()}),e.$on("$destroy",function(){e.stop(),e.spinner=null})}}}])}"function"==typeof define&&define.amd?define(["angular","spin"],b):b(a.angular)}(window);
//# sourceMappingURL=angular-spinner.min.js.map
/* ========================================================================
 * Bytbil: range-select.js v.1
 *
 * ========================================================================
 * Copyright 2014 Byt Bil Nordic AB
 * ======================================================================== */

var bbRangeSelects = function ($) {
    'use strict';

    // RANGE SELECT CLASS DEFINITION
    // =============================
    var backdrop = '.select-range-backdrop';
    var toggleRange = '[data-toggle="range-select"]';
    var dropdown = '[data-toggle="dropdown"]';
    var RangeSelect = function (element) {
        $(element).on('click.bb.rangeSelect', this.toggle);
        //$(element).on('set.bb.rangeSelect', this.set_range)
        //$(element).on('clearRange.bb.rangeSelect', this.clear_range);
    }

    RangeSelect.prototype.set_up_html = function (context) {
        var selectElements, placeholder, rangeSelect, toggleButton, dropdownMenu, dropdownCaret, dropdownContent, dropdownFooter, $this;
        if (typeof context === 'undefined') {
            $this = $(this);
        } else {
            $this = $(context);
        }
        placeholder = $this.data("placeholder");
        selectElements = $this.children("select").prop("tabindex", 20).wrapAll('<div class="hidden" />');

        rangeSelect = $('<div class="form-group range-select" />').appendTo($this);
        toggleButton =
            $('<div class="btn-group">' +
            '<button class="form-control" type="button" data-toggle="dropdown"><span>' + placeholder + '</span><i class="fa fa-angle-down"></i></button>' +
            '</div>').appendTo(rangeSelect);
        //dropdownCaret = $('<label class="drop-select" for="price_from"></label>').insertAfter(toggleButton);
        dropdownContent = generateDropdownContent($(selectElements[0]), $(selectElements[1]), $(selectElements[2]), $this).appendTo(toggleButton);
        dropdownFooter =
            $('<div class="dropdown-footer"><div class="row">' +
            '<div class="col-xs-6"><button class="btn btn-default" id="clear_' + $this.attr("id") + '" type="button">Rensa</button></div>' +
            '<div class="col-xs-6"><button class="btn btn-primary" id="ok_' + $this.attr("id") + '" type="button" >OK</button></div>' +
            '</div></div>').appendTo(dropdownContent);

        updateLabelText($this);
        dropdownFooter.on("click", '[id^="clear_"]', RangeSelect.prototype.clear_range);
        dropdownFooter.on("click", '[id^="ok_"]', RangeSelect.prototype.toggle);
    }

    RangeSelect.prototype.toggle = function (e) {
        var $this, $dropdown;
        $this = $(this);
        $dropdown = $this.find(".btn-group");

        if ($this.is('.disabled, :disabled')) {
            return;
        }

        var isActive = $dropdown.hasClass('open');

        clearMenus();

        if (!isActive) {
            if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
                // if mobile we use a backdrop because click events don't delegate
                $('<div class="range-select-backdrop"/>').insertAfter($(this)).on('click', clearMenus);
            }

            var relatedTarget = { relatedTarget: this };
            $dropdown.trigger(e = $.Event('show.bb.rangeSelect', relatedTarget));

            if (e.isDefaultPrevented()) { return; }

            $dropdown
                .toggleClass('open')
                .trigger('shown.bb.rangeSelect', relatedTarget);

            $this.focus();
        }

        return false;
    }

    RangeSelect.prototype.set_range = function () {

        var $this, $parent, rangeEnd, isFrom, isTo, isCount, listStepSize;
        $this = $(this);
        rangeEnd = $this.data("value");
        $parent = $this.parents(".select-list");
        isFrom = $parent.is(".select-from");
        isTo = $parent.is(".select-to");
        isCount = $parent.is(".count-list");

        // Should be extracted
        if ($parent.parents(toggleRange).find("[data-select-list]").first().attr('data-select-list').indexOf('Prices') > -1) {
            listStepSize = 10000;
        }
        else if ($parent.parents(toggleRange).find("[data-select-list]").first().attr('data-select-list').indexOf('Prices') > -1) {
            listStepSize = 500;
        }


        // Escape check
        if ($this.is('.disabled, :disabled')) { return; }

        // WORK IN PROGRESS
        if (isCount) {
            /* Active/Inactive = vad har jag valt
             * Set/Unset = glöm mitt val */
            if ($this.is(".active")) {
                var $root;
                $root = getRoot($this);
                $("select", $root).val('').trigger("change");

                // Unset selected range option if clicked again
                var selects = $this.parents("[data-toggle='range-select']").find(".select-list ul li")
                    .removeClass("active disabled");
            }
            else {
                // Update textfield
                var selects = $this.parents("[data-toggle='range-select']").find(".hidden select");
                $.each(selects, function (i, list) {
                    var value = $($(list).find("option")[$this.index() + 1]).val()
                    $(list).val(value);
                })

                // Set selected range options in a row
                var selectLists = $this.parents("[data-toggle='range-select']").find(".select-list ul");
                $.each(selectLists, function (i, list) {
                    $($(list).find("li")[$this.index()]).addClass("active").siblings().removeClass('active');
                })

                // Disable out of range elements on other ranges
                selects = $this.parents("[data-toggle='range-select']").find('[data-select-list] ul');
                $.each(selects, function (ulIndex, ul) {
                    $(ul).children('li').each(function (liIndex, element) { RangeSelect.prototype.disable_list_element(ulIndex, element, rangeEnd, listStepSize) });
                });
            }
        }
        else {

            if ($this.is(".active")) {
                // Unset selected range option if clicked again
                $("#" + $parent.data("selectList")).val('').trigger("change");
                $this.removeClass("active");

                // Re-enable elements on other end of range
                var listElements = $parent.siblings().find("li");
                $.each(listElements, function () {
                    var _this = $(this);
                    var num_rangeEnd = Number(rangeEnd), num_value = Number(_this.data("value"));

                    if (isFrom ? num_value < num_rangeEnd : num_value > num_rangeEnd) {
                        _this.removeClass("disabled");
                    }
                });

            }
            else {
                // Set selected option on correct select element
                $("#" + $parent.data("selectList")).val(rangeEnd).trigger("change");

                // Set clicked element active
                $this.addClass("active").siblings().removeClass("active");

                // Disable out of range elements on other end of range
                var listElements = $parent.siblings().find("li");
                $.each(listElements, function () {
                    var _this = $(this);
                    var num_rangeEnd = Number(rangeEnd), num_value = Number(_this.data("value"));

                    _this.removeClass("disabled");
                    if (isFrom ? num_value < num_rangeEnd : num_value > num_rangeEnd) {
                        _this.addClass("disabled");
                    }
                });
            }

            activateCount($parent);
        }
        updateLabelText($this);

        $this.trigger('rangeSet.bb.rangeSelect');
        return false;
    }


    RangeSelect.prototype.disable_list_element = function (index, element, rangeEnd, listStepSize) {
        var _this = $(element);
        var num_rangeEnd = Number(rangeEnd), num_value = Number(_this.data("value"));

        _this.removeClass("disabled");

        var maxValue = num_rangeEnd;

        if(typeof listStepSize !== 'undefined') {
            maxValue += listStepSize;
        }

        if (index === 1 ? num_value < num_rangeEnd : num_value > maxValue) {
            _this.addClass("disabled");
        }

    }

    RangeSelect.prototype.clear_range = function (e) {
        var $this, $root;
        $this = $(this);
        $root = getRoot($this);
        $("select", $root).val('').trigger("change");
        clearRangeList($root);
        updateLabelText($this);
        $this.trigger('rangeCleared.bb.rangeSelect');
    }

    RangeSelect.prototype.update_values = function (e, values) {

        $(e.target).find(".count-list li").text(0);
        $(e.target).find("li:not(.active)");//.attr("disabled", "disabled").addClass("disabled");
        $.each(values, function (k, v) {
            //$(e.target).find(".count-list li[data-value='" + k + "']").text(v);
            $(e.target).find("li[data-value='" + k + "']");//.removeAttr("disabled").removeClass("disabled");
        });
    }

    // RANGE SELECT INTERNAL FUNCTIONS
    // ===============================

    function updateLabelText($updatingElement) {
        var label, from, to = "", $root, fromElement, toElement;
        $root = getRoot($updatingElement);

        var selects = $("select", $root);

        fromElement = $(selects[0]).find("option:selected");
        toElement = $(selects[1]).find("option:selected");
        from = !checkEmpty(fromElement) ? fromElement.val() : "";
        to = !checkEmpty(toElement) ? toElement.val() : "";
        if (from == "" && to == "") {
            label = $root.data("placeholder");
        } else {
            label = from + " - " + to;
        }

        $(".btn-group > button > span", $root).text(label);
    }

    function checkEmpty(selectElement) {
        return selectElement.val() == "" || selectElement.val() == 0 || typeof selectElement.val() === "undefined";
    }

    /// Generate dropdown content from select element(s)
    function generateDropdownContent(from, to, count, $context) {
        var listTemplate, fromList, toList, countList, listElements, dropdownContainer, dropdownContent;
        if (from.is(":not(select)")) {
            return;
        }
        listTemplate = $('<div class="col-xs-6 select-list"></div>');

        listElements = $('<ul />');
        $.each(from.children(), function (index, value) {

            var el = generateListElement(value);
            if (el) {
                el.appendTo(listElements);
            }
        });

        listElements.appendTo(listTemplate);
        fromList = listTemplate.clone(true);

        if (typeof to !== "undefined" && to.is("select")) {
            listTemplate = $('<div class="col-xs-6 select-list"></div>');
            listElements = $('<ul />');

            $.each(to.children(), function (index, value) {
                var el = generateListElement(value);

                if (el) {
                    el.appendTo(listElements);
                }
            });

            listElements.appendTo(listTemplate);
        }

        toList = listTemplate.clone(true);

        fromList
            .addClass("select-from")
            .attr("data-select-list", $(from).attr("id"));
        toList
            .addClass("select-to")
            .attr("data-select-list", $(to).attr("id"));

        $("<h6></h6>").text($context.data("fromTitle")).prependTo(fromList);
        $("<h6></h6>").text($context.data("toTitle")).prependTo(toList);

        dropdownContainer = $('<div class="dropdown-menu" role="menu" />');
        dropdownContent = $('<div class="dropdown-content row" /></div>').appendTo(dropdownContainer);
        fromList.appendTo(dropdownContent);
        toList.appendTo(dropdownContent);
        countList = $('<div class="col-xs-2 select-list count-list"></div>')
        listElements = $('<ul />');
        $.each(count.children(), function (index, value) {

            var el = generateListElement(value);
            if (el) {
                el.appendTo(listElements);
            }
        });
        listElements.appendTo(countList);
        countList.appendTo(dropdownContent);
        $("<h6></h6>").html("&nbsp;").prependTo(countList);

        disableOutOfRange(fromList, toList);
        activateCount(countList);
        return dropdownContainer;
    }

    function generateListElement(option) {
        var value, numerical_value, text, selected, element, active;
        text = option.text;
        value = option.value;
        selected = option.selected;
        selected ? active = "active" : active = "";

        numerical_value = Number(value);
        if (value === "" || typeof Number(value) !== "number") {
            return;
        };

        element = $('<li class="' + active + '" data-value="' + value + '">' + text + '</li>')
            .on("click", RangeSelect.prototype.set_range);

        return element;
    };

    function disableOutOfRange($fromList, $toList) {
        var activeFrom, activeTo;
        activeFrom = $fromList.find(".active").data("value");
        activeTo = $toList.find(".active").data("value");

        if(activeTo !== null) {
            $fromList.find("li").each(function (index, element) {
                var $el = $(element);
                if ($el.data("value") > activeTo) {
                    $el.addClass("disabled");
                }
            });
        }

        if(activeFrom !== null) {
            $toList.find("li").each(function (index, element) {
                var $el = $(element);
                if ($el.data("value") < activeFrom) {
                    $el.addClass("disabled");
                }
            });
        }
    }

    function activateCount($clickedList) {
        var $root = $clickedList.parent();
        $root.find('.count-list li').removeClass('active disabled')
        var $lists = $root.find("[data-select-list]");
        var idx = $lists.first().find(".active").index();
        if (idx === $lists.last().find(".active").index()) {
            $($root.find('.count-list li')[idx]).addClass("active");
        }

        // Remove from Counts active. If From value equals To value, add active on Count in the same row
        //var listCounts = $parent.find('.count-list').find("li").removeClass('active disabled');
        //var selects = $parent.siblings().find('ul');
        //var index = $(selects[0]).find('li.active').index();
        //if (index === $(selects[1]).find('li.active').index()) {
        //    $($parent.find('.count-list').find("li")[index]).addClass('active');
        //}
    }
    function clearMenus(e) {
        $(backdrop).remove()
        $(dropdown).each(function () {
            var $parent = getDropdownParent($(this));
            var relatedTarget = { relatedTarget: this };
            if (!$parent.hasClass('open')) { return; }
            $parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget));
            if (e.isDefaultPrevented()) { return; }
            $parent.removeClass('open').trigger('hidden.bs.dropdown', relatedTarget);
        })
    }

    function getDropdownParent($this) {
        var selector = $this.attr('data-target');

        if (!selector) {
            selector = $this.attr('href');
            selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, ''); //strip for ie7
        }

        var $parent = selector && $(selector);

        return $parent && $parent.length ? $parent : $this.parent();
    }

    function getRoot($this) {
        var selector = $this.parents(toggleRange);
        var $parent = selector && $(selector);

        return $parent && $parent.length ? $parent : $this.parent();
    }

    function clearRangeList(rangeId) {
        $(rangeId).find(".select-list ul li").removeClass("disabled active");
    }

    // RANGE SELECT PLUGIN DEFINITION
    // ==============================

    var old = $.fn.rangeSelect;

    $.fn.rangeSelect = function (option) {
        return this.each(function () {
            var $this = $(this);
            var data = $this.data('bb.rangeSelect');

            if (!data) { $this.data('bb.rangeSelect', (data = new RangeSelect(this))) };
            if (typeof option == 'string') { data[option].call($this); }
            data["set_up_html"].call($this);

        })
    }

    $.fn.rangeSelect.Constructor = RangeSelect;

    // RANGE SELECT NO CONFLICT
    // ========================

    $.fn.rangeSelect.noConflict = function () {
        $.fn.rangeSelect = old;
        return this;
    }

    // APPLY TO STANDARD RANGE SELECT ELEMENTS
    // =======================================

    $(document)
        .on('click.bb.rangeSelect', toggleRange, RangeSelect.prototype.toggle)
        .on('click.bb.rangeSelect', toggleRange + ' li', RangeSelect.prototype.set_range)
        .on('click.bb.rangeSelect', toggleRange + ' [id^="clear_"]', RangeSelect.prototype.clear_range)
        .on('changed.bb.rangeSelect', toggleRange, RangeSelect.prototype.update_values)

    $(function () {
        $(toggleRange).each(function () {
            var $rangeSelect = $(this);
            $rangeSelect.rangeSelect();
        })
    });

};
/*jshint -W069 */
/*global angular:false */
angular.module('ElasticAccessModule', [])
    .factory('ElasticAccessClientResource', ['$q', '$http', '$rootScope', function($q, $http, $rootScope) {
        'use strict';

        /**
         *
         * @class " || ElasticAccessClientResource || "
         * @param {string} domain - The project domain
         * @param {string} cache - An angularjs cache implementation
         */
        var ElasticAccessClientResource = (function() {
            function ElasticAccessClientResource(domain, cache) {
                this.domain = typeof(domain) === 'string' ? domain : 'http://local.elasticaccess.bytbil.dev:80/api';
                if (this.domain.length === 0) {
                    throw new Error('Domain parameter must be specified as a string.');
                }
                this.domain = domain;
                this.cache = cache;
            }

            ElasticAccessClientResource.prototype.$on = function($scope, path, handler) {
                var url = domain + path;
                $scope.$on(url, function() {
                    handler();
                });
                return this;
            };

            ElasticAccessClientResource.prototype.$broadcast = function(path) {
                var url = domain + path;
                //cache.remove(url);
                $rootScope.$broadcast(url);
                return this;
            };

            /**
             *
             * @method
             * @name ElasticAccessClientResource#getCars
             * @param {{string}} brand - Brand to filter
             * @param {{string}} dealer - Fetch cars for only one dealer
             * @param {{string}} model - Models to filter, separated by comma
             * @param {{string}} yearTo - Filter cars older than this
             * @param {{string}} fueltype - Filter by fueltype, list separated by comma
             * @param {{string}} priceFrom - Filter by price, minimum this
             * @param {{string}} towbar - Filter cars with the possibility to pull a trailer. 1 or 0
             * @param {{string}} environment - Filter environmentally friendly cars. 1 or 0
             * @param {{string}} color - Filter by color, list separated by comma
             * @param {{string}} excl_vat - Filter cars by possibility to remove VAT. 1 or 0
             * @param {{string}} fwd - Filter cars with four wheel drive. 1 or 0
             * @param {{string}} bodytype - Filter by body, list separated by comma
             * @param {{string}} milesFrom - Filter by miles, minimum this
             * @param {{string}} parking_assistance - Filter by parking assistance
             * @param {{string}} images - Filter by car images. 1 or 0
             * @param {{string}} gearbox - Filter by gearbox, list separated by comma
             * @param {{string}} priceTo - Filter by price, maximum this
             * @param {{string}} status - Filter by car status. 1 for new, 0 for used.
             * @param {{string}} city - Filter cars by city
             * @param {{string}} milesTo - Filter by miles, maximum this
             * @param {{string}} yearFrom - Filter cars newer than this
             *
             */
            ElasticAccessClientResource.prototype.getCount = function(paramUrl) {
                paramUrl = paramUrl.replace("#", "");
                var deferred = $q.defer();

                var domain = this.domain;
                var path = '/cars/_count';

                var body;
                var headers = {};
                var form = {};


                var url = domain + path + paramUrl;
                

                var options = {
                    
                    method: 'GET',
                    url: url,
                    data: body,
                    headers: headers
                };

                if (Object.keys(form).length > 0) {
                    options.data = form;
                    options.headers['Content-Type'] = 'application/x-www-form-urlencoded';
                    options.transformRequest = function(obj) {
                        var str = [];
                        for (var p in obj) {
                            var val = obj[p];
                            if (angular.isArray(val)) {
                                val.forEach(function(val) {
                                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                                });
                            } else {
                                str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                            }
                        }
                        return str.join("&");
                    }
                }
                $http(options)
                    .success(function(data, status, headers, config) {
                        deferred.resolve(data);
                    })
                    .error(function(data, status, headers, config) {
                        deferred.reject({
                            status: status,
                            headers: headers,
                            config: config,
                            body: data
                        });
                    });

                return deferred.promise;
            };

            /**
             *
             * @method
             * @name ElasticAccessClientResource#getCars
             * @param {{string}} brand - Brand to filter
             * @param {{string}} dealer - Fetch cars for only one dealer
             * @param {{string}} model - Models to filter, separated by comma
             * @param {{string}} yearTo - Filter cars older than this
             * @param {{string}} fueltype - Filter by fueltype, list separated by comma
             * @param {{string}} priceFrom - Filter by price, minimum this
             * @param {{string}} towbar - Filter cars with the possibility to pull a trailer. 1 or 0
             * @param {{string}} environment - Filter environmentally friendly cars. 1 or 0
             * @param {{string}} color - Filter by color, list separated by comma
             * @param {{string}} excl_vat - Filter cars by possibility to remove VAT. 1 or 0
             * @param {{string}} fwd - Filter cars with four wheel drive. 1 or 0
             * @param {{string}} bodytype - Filter by body, list separated by comma
             * @param {{string}} milesFrom - Filter by miles, minimum this
             * @param {{string}} parking_assistance - Filter by parking assistance
             * @param {{string}} images - Filter by car images. 1 or 0
             * @param {{string}} gearbox - Filter by gearbox, list separated by comma
             * @param {{string}} priceTo - Filter by price, maximum this
             * @param {{string}} status - Filter by car status. 1 for new, 0 for used.
             * @param {{string}} city - Filter cars by city
             * @param {{string}} milesTo - Filter by miles, maximum this
             * @param {{string}} yearFrom - Filter cars newer than this
             *
             */
            ElasticAccessClientResource.prototype.getCars = function(parameters) {
                if (parameters === undefined) {
                    parameters = {};
                }
                var deferred = $q.defer();

                var domain = this.domain;
                var path = '/cars';

                var body;
                var queryParameters = {};
                var headers = {};
                var form = {};

                if (parameters['s'] !== undefined) {
                    queryParameters['s'] = parameters['s'];
                }

                if (parameters['brand'] !== undefined) {
                    queryParameters['brand'] = parameters['brand'];
                }

                if (parameters['dealer'] !== undefined) {
                    queryParameters['dealer'] = parameters['dealer'];
                }

                if (parameters['model'] !== undefined) {
                    queryParameters['model'] = parameters['model'];
                }

                if (parameters['yearTo'] !== undefined) {
                    queryParameters['yearTo'] = parameters['yearTo'];
                }

                if (parameters['fueltype'] !== undefined) {
                    queryParameters['fueltype'] = parameters['fueltype'];
                }

                if (parameters['priceFrom'] !== undefined) {
                    queryParameters['priceFrom'] = parameters['priceFrom'];
                }

                if (parameters['towbar'] !== undefined) {
                    queryParameters['towbar'] = parameters['towbar'];
                }

                if (parameters['environment'] !== undefined) {
                    queryParameters['environment'] = parameters['environment'];
                }

                if (parameters['color'] !== undefined) {
                    queryParameters['color'] = parameters['color'];
                }

                if (parameters['excl_vat'] !== undefined) {
                    queryParameters['excl_vat'] = parameters['excl_vat'];
                }

                if (parameters['fwd'] !== undefined) {
                    queryParameters['fwd'] = parameters['fwd'];
                }

                if (parameters['bodytype'] !== undefined) {
                    queryParameters['bodytype'] = parameters['bodytype'];
                }

                if (parameters['milesFrom'] !== undefined) {
                    queryParameters['milesFrom'] = parameters['milesFrom'];
                }

                if (parameters['parking_assistance'] !== undefined) {
                    queryParameters['parking_assistance'] = parameters['parking_assistance'];
                }

                if (parameters['images'] !== undefined) {
                    queryParameters['images'] = parameters['images'];
                }

                if (parameters['gearbox'] !== undefined) {
                    queryParameters['gearbox'] = parameters['gearbox'];
                }

                if (parameters['priceTo'] !== undefined) {
                    queryParameters['priceTo'] = parameters['priceTo'];
                }

                if (parameters['status'] !== undefined) {
                    queryParameters['status'] = parameters['status'];
                }

                if (parameters['city'] !== undefined) {
                    queryParameters['city'] = parameters['city'];
                }

                if (parameters['milesTo'] !== undefined) {
                    queryParameters['milesTo'] = parameters['milesTo'];
                }

                if (parameters['yearFrom'] !== undefined) {
                    queryParameters['yearFrom'] = parameters['yearFrom'];
                }

                if (parameters['page'] !== undefined) {
                    queryParameters['page'] = parameters['page'];
                }

                if (parameters['sort'] !== undefined) {
                    queryParameters['sort'] = parameters['sort'];
                }

                if (parameters['order'] !== undefined) {
                    queryParameters['order'] = parameters['order'];
                }
                if (parameters['pageSize'] !== undefined) {
                    queryParameters['pageSize'] = parameters['pageSize'];
                }

                if (parameters.$queryParameters) {
                    Object.keys(parameters.$queryParameters)
                        .forEach(function(parameterName) {
                            var parameter = parameters.$queryParameters[parameterName];
                            queryParameters[parameterName] = parameter;
                        });
                }

                var url = domain + path;
                var cached = parameters.$cache && parameters.$cache.get(url);
                if (cached !== undefined && parameters.$refresh !== true) {
                    deferred.resolve(cached);
                    return deferred.promise;
                }
                var options = {
                    timeout: parameters.$timeout,
                    method: 'GET',
                    url: url,
                    params: queryParameters,
                    data: body,
                    headers: headers
                };

                if (Object.keys(form).length > 0) {
                    options.data = form;
                    options.headers['Content-Type'] = 'application/x-www-form-urlencoded';
                    options.transformRequest = function(obj) {
                        var str = [];
                        for (var p in obj) {
                            var val = obj[p];
                            if (angular.isArray(val)) {
                                val.forEach(function(val) {
                                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                                });
                            } else {
                                str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                            }
                        }
                        return str.join("&");
                    }
                }
                $http(options)
                    .success(function(data, status, headers, config) {
                        deferred.resolve(data);
                        if (parameters.$cache !== undefined) {
                            parameters.$cache.put(url, data, parameters.$cacheItemOpts ? parameters.$cacheItemOpts : {});
                        }
                    })
                    .error(function(data, status, headers, config) {
                        deferred.reject({
                            status: status,
                            headers: headers,
                            config: config,
                            body: data
                        });
                    });

                return deferred.promise;
            };
            /**
             *
             * @method
             * @name ElasticAccessClientResource#getSearch
             * @param {{string}} s - Free text string to search
             * @param {{string}} dealer - Filter cars by dealer
             *
             */
            ElasticAccessClientResource.prototype.getSearch = function(parameters) {
                if (parameters === undefined) {
                    parameters = {};
                }
                var deferred = $q.defer();

                var domain = this.domain;
                var path = '/cars/search';

                var body;
                var queryParameters = {};
                var headers = {};
                var form = {};

                if (parameters['s'] !== undefined) {
                    queryParameters['s'] = parameters['s'];
                }


                if (parameters['page'] !== undefined) {
                    queryParameters['page'] = parameters['page'];
                }

                if (parameters['dealer'] !== undefined) {
                    queryParameters['dealer'] = parameters['dealer'];
                }

                if (parameters['yearFrom'] !== undefined) {
                    queryParameters['yearFrom'] = parameters['yearFrom'];
                }

                if (parameters['yearTo'] !== undefined) {
                    queryParameters['yearTo'] = parameters['yearTo'];
                }

                if (parameters['fueltype'] !== undefined) {
                    queryParameters['fueltype'] = parameters['fueltype'];
                }

                if (parameters['priceFrom'] !== undefined) {
                    queryParameters['priceFrom'] = parameters['priceFrom'];
                }

                if (parameters['priceTo'] !== undefined) {
                    queryParameters['priceTo'] = parameters['priceTo'];
                }

                if (parameters['color'] !== undefined) {
                    queryParameters['color'] = parameters['color'];
                }

                if (parameters['milesFrom'] !== undefined) {
                    queryParameters['milesFrom'] = parameters['milesFrom'];
                }

                if (parameters['milesTo'] !== undefined) {
                    queryParameters['milesTo'] = parameters['milesTo'];
                }

                if (parameters['bodytype'] !== undefined) {
                    queryParameters['bodytype'] = parameters['bodytype'];
                }

                if (parameters['page'] !== undefined) {
                    queryParameters['page'] = parameters['page'];
                }

                if (parameters['sort'] !== undefined) {
                    queryParameters['sort'] = parameters['sort'];
                }

                if (parameters['order'] !== undefined) {
                    queryParameters['order'] = parameters['order'];
                }

                if (parameters.$queryParameters) {
                    Object.keys(parameters.$queryParameters)
                        .forEach(function(parameterName) {
                            var parameter = parameters.$queryParameters[parameterName];
                            queryParameters[parameterName] = parameter;
                        });
                }

                var url = domain + path;
                var cached = parameters.$cache && parameters.$cache.get(url);
                if (cached !== undefined && parameters.$refresh !== true) {
                    deferred.resolve(cached);
                    return deferred.promise;
                }
                var options = {
                    timeout: parameters.$timeout,
                    method: 'GET',
                    url: url,
                    params: queryParameters,
                    data: body,
                    headers: headers
                };
                if (Object.keys(form).length > 0) {
                    options.data = form;
                    options.headers['Content-Type'] = 'application/x-www-form-urlencoded';
                    options.transformRequest = function(obj) {
                        var str = [];
                        for (var p in obj) {
                            var val = obj[p];
                            if (angular.isArray(val)) {
                                val.forEach(function(val) {
                                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                                });
                            } else {
                                str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                            }
                        }
                        return str.join("&");
                    }
                }
                $http(options)
                    .success(function(data, status, headers, config) {
                        deferred.resolve(data);
                        if (parameters.$cache !== undefined) {
                            parameters.$cache.put(url, data, parameters.$cacheItemOpts ? parameters.$cacheItemOpts : {});
                        }
                    })
                    .error(function(data, status, headers, config) {
                        deferred.reject({
                            status: status,
                            headers: headers,
                            config: config,
                            body: data
                        });
                    });

                return deferred.promise;
            };
            /**
             *
             * @method
             * @name ElasticAccessClientResource#getSpecificCar
             * @param {{string}} carId - Id of the car
             *
             */
            ElasticAccessClientResource.prototype.getSpecificCar = function(parameters) {
                if (parameters === undefined) {
                    parameters = {};
                }
                var deferred = $q.defer();

                var domain = this.domain;
                var path = '/cars/{carId}';

                var body;
                var queryParameters = {};
                var headers = {};
                var form = {};
                path = path.replace('{carId}', parameters['carId']);

                if (parameters['carId'] === undefined) {
                    deferred.reject(new Error('Missing required  parameter: carId'));
                    return deferred.promise;
                }

                if (parameters.$queryParameters) {
                    Object.keys(parameters.$queryParameters)
                        .forEach(function(parameterName) {
                            var parameter = parameters.$queryParameters[parameterName];
                            queryParameters[parameterName] = parameter;
                        });
                }

                var url = domain + path;
                var cached = parameters.$cache && parameters.$cache.get(url);
                if (cached !== undefined && parameters.$refresh !== true) {
                    deferred.resolve(cached);
                    return deferred.promise;
                }
                var options = {
                    timeout: parameters.$timeout,
                    method: 'GET',
                    url: url,
                    params: queryParameters,
                    data: body,
                    headers: headers
                };
                if (Object.keys(form).length > 0) {
                    options.data = form;
                    options.headers['Content-Type'] = 'application/x-www-form-urlencoded';
                    options.transformRequest = function(obj) {
                        var str = [];
                        for (var p in obj) {
                            var val = obj[p];
                            if (angular.isArray(val)) {
                                val.forEach(function(val) {
                                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                                });
                            } else {
                                str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                            }
                        }
                        return str.join("&");
                    }
                }
                $http(options)
                    .success(function(data, status, headers, config) {
                        deferred.resolve(data);
                        if (parameters.$cache !== undefined) {
                            parameters.$cache.put(url, data, parameters.$cacheItemOpts ? parameters.$cacheItemOpts : {});
                        }
                    })
                    .error(function(data, status, headers, config) {
                        deferred.resolve(null);
                        deferred.reject({
                            status: status,
                            headers: headers,
                            config: config,
                            body: data
                        });
                    });

                return deferred.promise;
            };
            /**
             *
             * @method
             * @name ElasticAccessClientResource#getSimilarCars
             * @param {{string}} carId - Id of the car
             *
             */
            ElasticAccessClientResource.prototype.getSimilarCars = function(parameters) {
                if (parameters === undefined) {
                    parameters = {};
                }
                var deferred = $q.defer();

                var domain = this.domain;
                var path = '/cars/{carId}/similar-cars';

                var body;
                var queryParameters = {};
                var headers = {};
                var form = {};

                path = path.replace('{carId}', parameters['carId']);

                if (parameters['carId'] === undefined) {
                    deferred.reject(new Error('Missing required  parameter: carId'));
                    return deferred.promise;
                }

                if (parameters.$queryParameters) {
                    Object.keys(parameters.$queryParameters)
                        .forEach(function(parameterName) {
                            var parameter = parameters.$queryParameters[parameterName];
                            queryParameters[parameterName] = parameter;
                        });
                }

                var url = domain + path;
                var cached = parameters.$cache && parameters.$cache.get(url);
                if (cached !== undefined && parameters.$refresh !== true) {
                    deferred.resolve(cached);
                    return deferred.promise;
                }
                var options = {
                    timeout: parameters.$timeout,
                    method: 'GET',
                    url: url,
                    params: queryParameters,
                    data: body,
                    headers: headers
                };
                if (Object.keys(form).length > 0) {
                    options.data = form;
                    options.headers['Content-Type'] = 'application/x-www-form-urlencoded';
                    options.transformRequest = function(obj) {
                        var str = [];
                        for (var p in obj) {
                            var val = obj[p];
                            if (angular.isArray(val)) {
                                val.forEach(function(val) {
                                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                                });
                            } else {
                                str.push(encodeURIComponent(p) + "=" + encodeURIComponent(val));
                            }
                        }
                        return str.join("&");
                    }
                }
                $http(options)
                    .success(function(data, status, headers, config) {
                        deferred.resolve(data);
                        if (parameters.$cache !== undefined) {
                            parameters.$cache.put(url, data, parameters.$cacheItemOpts ? parameters.$cacheItemOpts : {});
                        }
                    })
                    .error(function(data, status, headers, config) {
                        deferred.reject({
                            status: status,
                            headers: headers,
                            config: config,
                            body: data
                        });
                    });

                return deferred.promise;
            };

            return ElasticAccessClientResource;
        })();

        return ElasticAccessClientResource;
    }]);

angular.module('address-bar', [])
    .directive('ngAddressBar', function ($browser, $timeout, $location) {
        return {
            template: 'Hash: <input id="addressBar" type="text" style="width: 400px" >',
            link: function (scope, element, attrs) {
                var input = element.children("input"), delay;
                scope._hashlock = false;
                scope.isInit = true;
                if (scope.objectPage) {
                    scope.initSearch = scope.objectHash;
                }

                //set init value
                // if lock is set to false update hash
                input.val("http://bytbil.com" + scope.initSearch);
                fireUrlChange();
                delay = (!delay ? $timeout(fireUrlChange, 0) : null);

                scope.$watch('search', function () {
                    //trigger change on input if lock is false
                    if (scope.lock === true)
                        return;

                    if (scope.isInit && window.location.hash != '') {
                        scope.isInit = false;
                        return;
                    }
                    scope._hashlock = true;
                    var inVal = input.val().replace("http://bytbil.com", "");
                    window.location.hash = inVal;

                    if ($('.bb-favorite').length > 0) {
                        var bbfavorite = $('.bb-favorite');
                        if (bbfavorite.data('type') == 'search') {
                            var hash = window.location.hash;
                            bbfavorite.attr('data-bbfavorite', 'search-' + hash);
                            bbfavorite.attr('data-url', hash);
                            bbfavorite.attr('data-search', hash);
                        }
                    }

                    scope.isInit = false;

                });

                $(window).on('hashchange', function (event) {
                    if (scope.lock)
                        return;

                    // do this if _hashlock is false
                    if (!scope._hashlock) {
                        input.val("http://bytbil.com" + window.location.hash);
                        delay = (!delay ? $timeout(fireUrlChange, 0) : null);
                        event.stopPropagation();
                    }
                    //set hashlock to false
                    scope._hashlock = false;


                });
                input.on('keypress keyup keydown', function (event) {
                    delay = (!delay ? $timeout(fireUrlChange, 250) : null);
                    event.stopPropagation();
                    //update hash in browser. and crate _hashlock = true
                })
                    .val($browser.url());

                $browser.url = function (url) {
                    return url ? input.val(url) : input.val();
                };

                function fireUrlChange() {                    
                    delay = null;
                    $browser.urlChange(input.val());
                }
            }
        };
    });

angular.module('fake-browser', [])
.config(function($provide) {
 $provide.decorator('$browser', function($delegate) {

  $delegate.onUrlChange = function(fn) {
     this.urlChange = fn;
   };

  $delegate.url = function() {
      return "http://bytbil.com";
  };

  $delegate.defer = function(fn, delay) {
     setTimeout(function() { fn(); }, delay || 0);
   };

  $delegate.baseHref = function() {
     return '/';
   };

   return $delegate;
 });
});
angular.module("ElasticAccess.adapters", ["ElasticAccessModule"])
// This is how an adapter interface should look like
.factory("BaseAdapter", ["$http", function ($http) {
    return {
        get: function (filters) {

        },
        getRelated: function (id) {

        }
    }
}])
// Adapter interface for ElasticAccess API
.factory("ElasticAccessAdapter", ["ElasticAccessClientResource", function (ApiModule) {
    var domain = "https://elasticaccess.herokuapp.com/api";
    //var domain = "http://local.elasticaccess.dev/api";
    var apiResource = new ApiModule(domain);

    return {
        get: function (filters) {
            return apiResource.getCars(filters);
        },
        getCount: function (url) {
            return apiResource.getCount(url);
        },
        getRelated: function (id) {
            return apiResource.getSimilarCars({
                carId: id
            });
        },
        //search: function (filters) {
        //    if(filters.constructor === String){
        //        filters = {
        //            s: filters
        //        };
        //    }
        //    return apiResource.getSearch(filters);
        //},
        getSingle: function (id) {
            return apiResource.getSpecificCar(id);
        }
    };
}]);

angular.module("ElasticAccess.filters", [])
.filter('BrandFilter', function () {
    return function (cars, brand) {
        if (!brand) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.brand === brand;
        });

        return retCars;
    };
})
.filter("ModelFilter", function () {
    return function (cars, model) {
        if (!model) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.model === model;
        });

        return retCars;
    };
})
.filter("TypeFilter", function () {
    return function (cars, type) {
        if (!type) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.type === type;
        });

        return retCars;
    };
})
.filter("BodyFilter", function () {
    return function (cars, body) {
        if (!body) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.body === body;
        });

        return retCars;
    };
})
.filter("FuelTypeFilter", function(){
    return function (cars, fueltype) {
        if(!fueltype){
            return cars;
        }
        var retCars = cars.filter(function (car){
            return car.fueltype === fueltype;
        })
        return retCars;
    }
})
.filter("PriceFromFilter", function () {
    return function (cars, price) {
        if (!price) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.price >= price;
        });

        return retCars;
    }
})
.filter("PriceToFilter", function () {
    return function (cars, price) {
        if (!price) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.price <= price;
        });
        return retCars;
    }
})
.filter("MilesFromFilter", function () {
    return function (cars, miles) {
        if (!miles) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.miles >= miles;
        });

        return retCars;
    }
})
.filter("MilesToFilter", function () {
    return function (cars, miles) {
        if (!miles) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.miles <= miles;
        });
        return retCars;
    }
})
.filter("YearFromFilter", function () {
    return function (cars, year) {
        if (!year) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.year >= year;
        });

        return retCars;
    }
})
.filter("YearToFilter", function () {
    return function (cars, year) {
        if (!year) {
            return cars;
        }

        var retCars = cars.filter(function (car) {
            return car.year <= year;
        });
        return retCars;
    }
})
.filter("GearBoxFilter", function(){
    return function (cars, gearbox) {
        if(!gearbox){
            return cars;
        }
        var retCars = cars.filter(function (car){
            return car.gearbox === gearbox;
        })
        return retCars;
    }
})
.filter("CityFilter", function(){
    return function (cars, city) {
        if(!city){
            return cars;
        }
        var retCars = cars.filter(function (car){
            return car.city === city;
        })
        return retCars;
    }
});
//.filter("FwdFilter", function(){
//    return function (cars, fwd) {
//        if(!fwd){
//            return cars;
//        }
//        var retCars = cars.filter(function (car){
//            return car.fwd === fwd;
//        })
//        return retCars;
//    }
//});

var lodash = _.noConflict();
var $ = jQuery.noConflict();
angular.module("ElasticAccess", ["ElasticAccess.filters", "ElasticAccess.adapters", "angularjs-dropdown-multiselect", "infinite-scroll", "angularSpinner", 'fake-browser', 'address-bar'])
    .config(function ($httpProvider, $locationProvider) {
        $httpProvider.defaults.headers.common["X-Authentication"] = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkZWFsZXIiOiJ1cHBsYW5kc21vdG9yIn0.mq-UIAa7nlZJ3Sct5XLn1N6FONKjHhCI2ePJZoakoZc";
        //$locationProvider.html5Mode(true).hashPrefix('');
        // Only works with local api
        //$httpProvider.defaults.withCredentials = true;
    })
    .service("Searches", function(){
        var service = {
            lastSearch: "",
            lastResponse: "",
            view: ""
        };
        return service;
    })
    .directive('scrollTo', function ($location, $anchorScroll) {
        return function(scope, element, attrs) {

            element.bind('click', function(event) {
                event.stopPropagation();
                var off = scope.$on('$locationChangeStart', function(ev) {
                    off();
                    ev.preventDefault();
                });
                var location = attrs.scrollTo;
                $location.hash(location);
                $anchorScroll();
            });

        };
    })
    .service("formatValues", function(){
        return function(input){
            return input+1;
        }
    });
angular.module('ElasticAccess').run(['$templateCache', function($templateCache) {
  'use strict';

  $templateCache.put('templates/500.html',
    "<div class=\"ng-500\" ng-hide=\"hideError\">\n" +
    "    <section class=\"section-block light scroll\" style=\"background: #f7f7f7 url(http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/09/long-road-large.jpg) no-repeat center center; background-size: cover; background-size: cover;;\" name=\"\">\n" +
    "        <div class=\"section-effect \" style=\"background: rgba(21,21,21,0.6); ;\">\n" +
    "            <div class=\"container-fluid wrapper large-padding\">\n" +
    "                <div class=\"row-wrapper wrapper \">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 custom\">\n" +
    "                        <h1 style=\"text-align: center;\"><span style=\"color: #ffffff; font-size: 42px;\">Vi hittar inte bilen du söker</span></h1>\n" +
    "                        <p style=\"text-align: center;\"><span style=\"color: #ffffff;\">Bilen du försöker nå kan tyvärr inte hittas.</span></p>\n" +
    "                        <p style=\"text-align: center;\"><span style=\"color: #ffffff;\">Den kan vara såld, borttagen eller så har du försökt nå oss via en gammal länk.</span></p>\n" +
    "                        <h1 style=\"text-align: center;\"></h1>\n" +
    "                        <p style=\"text-align: center;\"><a href=\"http://upplandsmotor2015.customcms.bytbil.com/bilar/bilar-i-lager/\" target=\"_self\"><span> <span class=\"button red standard\"><i class=\"icon-cab\"></i> Gå till bilar i lager</span> </span></a></p>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </section>\n" +
    "</div>\n"
  );


  $templateCache.put('templates/Compare.html',
    "<div class=\"compare-view\" ng-controller=\"CompareCtrl\">\n" +
    "    <div ng-address-bar></div>\n" +
    "    <span us-spinner spinner-key=\"spinner\" spinner-start-active=\"true\"></span>\n" +
    "\n" +
    "    <div class=\"comparison\">\n" +
    "        <div class=\"comparison_col comparison_labels\">\n" +
    "            <div class=\"comparison_cell comparison_top marked\"><span>&nbsp;</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Modellår</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Mätarställning</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Pris</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Fordonstyp</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Drivmedel</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Färg</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Växellåda</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Effekt</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Regnummer</span></div>\n" +
    "            <div class=\"comparison_cell marked\"><span>Reg.datum</span></div>\n" +
    "            <div class=\"comparison_cell\"><span>&nbsp;</span></div>\n" +
    "        </div>\n" +
    "\n" +
    "            <div class=\"comparison_col\" ng-repeat=\"c in car\">\n" +
    "                <div class=\"comparison_cell comparison_top marked\">\n" +
    "                    <span>\n" +
    "                        <a class=\"objectLink\" href=\"/bilar/bilar-i-lager/objekt/#?id={{ c.id }}\">\n" +
    "                            <div class=\"comparison_image\">\n" +
    "                                <img class=\"MainImage active\" src=\"{{c.images.image[0]}}\" alt=\"{{ c.brand }} {{ c.model }}\" title=\"{{ c.brand }} {{ c.model }}\">\n" +
    "                            </div>\n" +
    "                        </a>\n" +
    "                      {{ c.brand }} {{ c.model }} {{ c.modeldescription }}\n" +
    "                  </span>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.yearmodel }}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.miles || '-' | formatNumber }}</span></div>\n" +
    "\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c['price-active'] | formatPrice }}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.bodytype }}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.fueltype }}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.color_raw }}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.gearboxtype }}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.horsepower || '-'}}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.regno }}</span></div>\n" +
    "                <div class=\"comparison_cell marked\"><span>{{ c.firstreg || '-'}}</span></div>\n" +
    "\n" +
    "            </div>\n" +
    "\n" +
    "    </div>\n" +
    "</div>"
  );


  $templateCache.put('templates/Filter.html',
    "<!-- Mobile buttons -->\n" +
    "<div class=\"col-xs-12 visible-xs filtertoggle\">\n" +
    "    <h2 class=\"col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 count\">Filter <i class=\"glyphicon glyphicon-chevron-down\"></i><i class=\"glyphicon glyphicon-chevron-up\"></i></h2>\n" +
    "</div>\n" +
    "<!-- /Mobile buttons -->\n" +
    "<div class=\"hidden-xs filtercontroller\" ng-controller=\"SearchListCtrl\">\n" +
    "    <div class=\"col-xs-12\">\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"submenu-wrapper\">\n" +
    "                <div class=\"submenu-title\">\n" +
    "                    <h2 class=\"col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 count\">Din sökning resulterade i {{ resultCount }} fordon</h2>\n" +
    "                    <div class=\"submenu-buttons\">\n" +
    "                        <div class=\"col-xs-4 col-md-3 left-buttons\">\n" +
    "                            <div class=\"bb-back\">\n" +
    "                                <a class=\"back-link light\" ng-if=\"urlExists();\" href=\"{{ backUrl }}\">\n" +
    "                                    <span class=\"round-button\">\n" +
    "                                        <i class=\"icon icon-chevron-thin-left\"></i>\n" +
    "                                    </span>\n" +
    "                                    <p class=\"button-text back-link-title\">{{ backTitle }}</p>\n" +
    "                                </a>\n" +
    "                                <a class=\"back-link light\" ng-if=\"!urlExists();\" href=\"\" onclick=\"window.history.back();\">\n" +
    "                                    <span class=\"round-button\">\n" +
    "                                        <i class=\"icon icon-chevron-thin-left\"></i>\n" +
    "                                    </span>\n" +
    "                                    <p class=\"button-text back-link-title\">{{ backTitle }}</p>\n" +
    "                                </a>\n" +
    "                                <div style=\"clear:both;\"></div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    <div class=\"col-xs-8 col-md-3 col-md-offset-6 right-buttons\">\n" +
    "                        <div class=\"col-xs-6 bb-share\" onclick=\"getShareOptions('#shareLinks_1');\">\n" +
    "                            <div class=\"bb-share-links\" id=\"shareLinks_1\"></div>\n" +
    "                            <div class=\"round-button\">\n" +
    "                                <i class=\"icon icon-share-alternative\"></i>\n" +
    "                            </div>\n" +
    "                            <p class=\"button-text\">Dela</p>\n" +
    "                            <div style=\"clear: both;\"></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-6 bb-favorite\" data-bbfavorite=\"\" data-url=\"\" data-type=\"search\">\n" +
    "                            <div class=\"share-contain\">\n" +
    "                                <div class=\"round-button\">\n" +
    "                                    <p><strong>P</strong></p>\n" +
    "                                    <i class=\"icon icon-check\"></i>\n" +
    "                                </div>\n" +
    "                                <p class=\"button-text\">Spara</p>\n" +
    "                                <div style=\"clear: both;\"></div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <div style=\"clear: both;\"></div>\n" +
    "                    </div>\n" +
    "                    <div style=\"clear: both;\"></div>\n" +
    "                </div>\n" +
    "                <div style=\"clear: both;\"></div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"wrapper\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"filter-part\">\n" +
    "                    <label>Årsmodell</label>\n" +
    "                    <bb-range-select title=\"Årsmodell\" suffix=\"\" from=\"search.yearFrom\" to=\"search.yearTo\" options=\"data.years\"></bb-range-select>\n" +
    "                </div>\n" +
    "                <div class=\"filter-part\">\n" +
    "                    <label>Pris</label>\n" +
    "                    <bb-range-select title=\"Pris\" suffix=\"kr\" from=\"search.priceFrom\" to=\"search.priceTo\" options=\"data.prices\"></bb-range-select>\n" +
    "                </div>\n" +
    "                <div class=\"filter-part\">\n" +
    "                    <label>Miltal</label>\n" +
    "                    <bb-range-select title=\"Miltal\" suffix=\"mil\" from=\"search.milesFrom\" to=\"search.milesTo\" options=\"data.miles\"></bb-range-select>\n" +
    "                </div>\n" +
    "                <div class=\"filter-part\">\n" +
    "                    <label>Kaross</label>\n" +
    "                    <div ng-dropdown-multiselect translation-texts=\"multiselects.body.texts\" events=\"multiselects.body.events\" options=\"data.bodytype\" selected-model=\"multiselects.body.data\" extra-settings=\"multiselects.body.settings\"></div>\n" +
    "                </div>\n" +
    "                <div class=\"filter-part\">\n" +
    "                    <label>Bränsle</label>\n" +
    "                    <div ng-dropdown-multiselect translation-texts=\"multiselects.fuel.texts\" events=\"multiselects.fuel.events\" options=\"data.fueltype\" selected-model=\"multiselects.fuel.data\" extra-settings=\"multiselects.fuel.settings\"></div>\n" +
    "                </div>\n" +
    "                <div class=\"filter-part\">\n" +
    "                    <label>Färg</label>\n" +
    "                    <div ng-dropdown-multiselect translation-texts=\"multiselects.color.texts\" events=\"multiselects.color.events\" options=\"data.color\" selected-model=\"multiselects.color.data\" extra-settings=\"multiselects.color.settings\"></div>\n" +
    "                </div>\n" +
    "                <div class=\"filter-part\">\n" +
    "                    <label>Sortera efter</label>\n" +
    "                    <div id=\"range_{{ baseTitle }}\">\n" +
    "                        <a class=\"form-control\" data-toggle=\"dropdown\">{{ sortLabel }}<i class=\"icon icon-chevron-thin-down\"></i></a>\n" +
    "                        <ul class=\"dropdown-menu list-unstyled\" ng-model=\"search.sort\" style=\"width: 150px;\">\n" +
    "                            <li>\n" +
    "                                <button ng-class=\"\" ng-click=\"updateSort('')\" class=\"form-control btn-form-white\">Senast inkomna</button>\n" +
    "                            </li>\n" +
    "                            <li>\n" +
    "                                <button ng-class=\"{asc: (search.sort == 'yearmodel' && search.order == 'asc'), desc: (search.sort == 'yearmodel' && search.order == 'desc')}\" ng-click=\"updateSort('yearmodel')\" class=\"form-control btn-form-white\">År</button>\n" +
    "                            </li>\n" +
    "                            <li>\n" +
    "                                <button ng-class=\"{asc: (search.sort == 'miles' && search.order == 'asc'), desc: (search.sort == 'miles' && search.order == 'desc')}\" ng-click=\"updateSort('miles')\" class=\"form-control btn-form-white\">Mil</button>\n" +
    "                            </li>\n" +
    "                            <li>\n" +
    "                                <button ng-class=\"{asc: (search.sort == 'price-active' && search.order == 'asc'), desc: (search.sort == 'price-active' && search.order == 'desc')}\" ng-click=\"updateSort('price-active')\" class=\"form-control btn-form-white\">Pris</button>\n" +
    "                            </li>\n" +
    "                            <li>\n" +
    "                                <button ng-class=\"{asc: (search.sort == 'brand' && search.order == 'asc'), desc: (search.sort == 'brand' && search.order == 'desc')}\" ng-click=\"updateSort('brand')\" class=\"form-control btn-form-white\">Märke</button>\n" +
    "                            </li>\n" +
    "                        </ul>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "    </div>\n" +
    "</div>\n"
  );


  $templateCache.put('templates/FreeTextSearch.html',
    "<div class=\"wrapper\" ng-controller=\"FreeTextSearchCtrl\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-xs-12\">\n" +
    "            <h1>Sök bland {{ totalCount }} personbilar i lager</h1>\n" +
    "            <p>Vi vill att du ska hitta rätt bil. Det avgörande för att du ska bli nöjd är att du hittar den bil som passar dina behov. Sök och hitta din bil nedan.</p>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12\">\n" +
    "            <form>\n" +
    "                <input id=\"FreeTextSearch\" type=\"text\" placeholder=\"Vad letar du efter för bil?\" class=\"form-control\" ng-keyup=\"freeSearch(q)\" ng-model=\"q\">\n" +
    "            </form>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "\n"
  );


  $templateCache.put('templates/List.html',
    "<div class=\"car-list vehicle-result\" ng-controller=\"CarListCtrl\">\n" +
    "    <div class=\"wrapper \">\n" +
    "\n" +
    "        <span us-spinner spinner-key=\"spinner\" spinner-start-active=\"true\"></span>\n" +
    "\n" +
    "        <div infinite-scroll='ScrollList.nextPage()' infinite-scroll-disabled='ScrollList.busy' infinite-scroll-distance='0'>\n" +
    "            <div class=\"row\">\n" +
    "\n" +
    "                <div ng-repeat=\"chunk in cars\" class=\"\">\n" +
    "                    <div class=\"col-xxs-12 col-xs-6 col-sm-4 car vehicle-item\" ng-repeat=\"car in chunk\">\n" +
    "                        <ng-include src=\"'templates/partials/GridItem.html'\"></ng-include>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"col-xxs-12 col-xs-12\" ng-show=\"cars.length == 0\">\n" +
    "                    Inga fordon hittades!\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"infinite-scroll-loading\" ng-show=\"ScrollList.busy\">\n" +
    "        <div class=\"col-xs-12\">\n" +
    "            <div class=\"\">Laddar in fler fordon...</div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"more-similar\">\n" +
    "        <a class=\"button red\" ng-if=\"loadType=='Button'\" ng-click=\"fetchMoreCars()\">Se fler liknande bilar i lager</a>\n" +
    "    </div>\n" +
    "</div>"
  );


  $templateCache.put('templates/Search.html',
    "<div class=\"wrapper\" class=\"search-list\" ng-controller=\"SearchListCtrl\">\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-xs-12\">\n" +
    "            <h1>Sök bland {{ totalCount }} personbilar i lager</h1>\n" +
    "            <p>Vi vill att du ska hitta rätt bil. Det avgörande för att du ska bli nöjd är att du hittar den bil som passar dina behov. Sök och hitta din bil nedan.</p>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12\">\n" +
    "            <form id=\"SearchForm\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <label>Bilmärke</label>\n" +
    "\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "\n" +
    "                            <div ng-dropdown-multiselect translation-texts=\"multiselects.brand.texts\" events=\"multiselects.brand.events\" options=\"(data.brands) | filterBrands\" selected-model=\"multiselects.brand.data\" extra-settings=\"multiselects.brand.settings\" group-by=\"type\"></div>\n" +
    "                            <!--<select class=\"btn dropdown-toggle selectpicker btn-form-white form-control\" ng-model=\"search.brand\" ng-options=\"key as key for (key, val) in data.brands\">-->\n" +
    "                            <!--<option value=\"\">Alla Märken</option>-->\n" +
    "                            <!--</select>-->\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <label>Modell</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <div ng-dropdown-multiselect translation-texts=\"multiselects.model.texts\" events=\"multiselects.model.events\" options=\"data.brands[search.brand].models\" selected-model=\"multiselects.model.data\" extra-settings=\"multiselects.model.settings\"></div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <label>Årsmodell</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <bb-range-select title=\"Årsmodell\" suffix=\"\" from=\"search.yearFrom\" to=\"search.yearTo\" options=\"data.years\"></bb-range-select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <label>Anläggning</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <div ng-dropdown-multiselect translation-texts=\"multiselects.city.texts\" events=\"multiselects.city.events\" options=\"data.city\" selected-model=\"multiselects.city.data\" extra-settings=\"multiselects.city.settings\"></div>\n" +
    "\n" +
    "                            <!--<select class=\"btn dropdown-toggle selectpicker btn-form-white form-control\" ng-model=\"search.city\" ng-options=\"c.name as c.name for c in data.city\">-->\n" +
    "                            <!--<option value=\"\">Alla orter</option>-->\n" +
    "                            <!--</select>-->\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-12 col-sm-2\">\n" +
    "                        <label>Växellåda</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <div ng-dropdown-multiselect translation-texts=\"multiselects.gearbox.texts\" events=\"multiselects.gearbox.events\" options=\"data.gearbox\" selected-model=\"multiselects.gearbox.data\" extra-settings=\"multiselects.gearbox.settings\"></div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-2\">\n" +
    "                        <label>Bränsle</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <div ng-dropdown-multiselect translation-texts=\"multiselects.fuel.texts\" events=\"multiselects.fuel.events\" options=\"data.fueltype\" selected-model=\"multiselects.fuel.data\" extra-settings=\"multiselects.fuel.settings\"></div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "\n" +
    "                    <div class=\"col-xs-12 col-sm-2\">\n" +
    "                        <label>Färg</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <div ng-dropdown-multiselect translation-texts=\"multiselects.color.texts\" events=\"multiselects.color.events\" options=\"data.color\" selected-model=\"multiselects.color.data\" extra-settings=\"multiselects.color.settings\"></div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "\n" +
    "                    <div class=\"col-xs-12 col-sm-2\">\n" +
    "                        <label>Pris</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <bb-range-select title=\"Pris\" suffix=\"kr\" from=\"search.priceFrom\" to=\"search.priceTo\" options=\"data.prices\"></bb-range-select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "\n" +
    "                    <div class=\"col-xs-12 col-sm-2\">\n" +
    "                        <label>Miltal</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <bb-range-select title=\"Miltal\" suffix=\"mil\" from=\"search.milesFrom\" to=\"search.milesTo\" options=\"data.miles\"></bb-range-select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "\n" +
    "                    <div class=\"col-xs-12 col-sm-2\">\n" +
    "                        <label>Kaross</label>\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <div ng-dropdown-multiselect translation-texts=\"multiselects.body.texts\" events=\"multiselects.body.events\" options=\"data.bodytype\" selected-model=\"multiselects.body.data\" extra-settings=\"multiselects.body.settings\"></div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-6 col-sm-2\">\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <label>\n" +
    "                                <div class=\"checkbox\">\n" +
    "                                    <input ng-true-value=\"'1'\" ng-false-value=\"0\" type=\"checkbox\" ng-model=\"search.environment\">\n" +
    "                                    <span>Miljöbil</span>\n" +
    "                                </div>\n" +
    "                            </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-sm-2\">\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <label>\n" +
    "                                <div class=\"checkbox\">\n" +
    "                                    <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.status\" value=\"1\">\n" +
    "                                    <span>Fabriksny bil</span>\n" +
    "                                </div>\n" +
    "                            </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-sm-2\">\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <label>\n" +
    "                                <div class=\"checkbox\">\n" +
    "                                    <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.fwd\" value=\"1\">\n" +
    "                                    <span>Fyrhjulsdrift</span>\n" +
    "                                </div>\n" +
    "                            </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-sm-2\">\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <label>\n" +
    "                                <div class=\"checkbox\">\n" +
    "                                    <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.excl_vat\" value=\"1\">\n" +
    "                                    <span>Avdragsbar moms</span>\n" +
    "                                </div>\n" +
    "                            </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-sm-2\">\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <label>\n" +
    "                                <div class=\"checkbox\">\n" +
    "                                    <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.towbar\" value=\"1\">\n" +
    "                                    <span>Dragkrok</span>\n" +
    "                                </div>\n" +
    "\n" +
    "                            </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-6 col-sm-2\">\n" +
    "                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                            <label>\n" +
    "                                <div class=\"checkbox\">\n" +
    "                                    <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-checked=\"search.parking_assistance==1\" ng-model=\"search.parking_assistance\" value=\"1\">\n" +
    "                                    <span>Parkeringsassistans</span>\n" +
    "                                </div>\n" +
    "                            </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "            </form>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>"
  );


  $templateCache.put('templates/SearchList.html',
    "<div class=\"wrapper\" class=\"search-list\" ng-controller=\"SearchListCtrl\">\n" +
    "    <div ng-address-bar></div>\n" +
    "    <div class=\"row\">\n" +
    "        <div class=\"col-xs-12\">\n" +
    "            <h1>{{ titleStart }} {{ totalCount }} {{titleEnd}} </h1>\n" +
    "            <p>{{ text }}</p>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12\">\n" +
    "            <form id=\"SearchForm\">\n" +
    "                <div id=\"pageSize\">\n" +
    "                    <label>Antal fordon per sida</label>\n" +
    "                    <input type=\"text\" ng-model=\"search.pageSize\"/>\n" +
    "                </div>\n" +
    "\n" +
    "                <div id=\"Search\" class=\"search includes\">\n" +
    "                    <div id=\"first-view\">\n" +
    "                        <div class=\"row\">\n" +
    "                            <div class=\"col-xs-12 col-sm-5\">\n" +
    "                                <div class=\"row no-margin\">\n" +
    "                                    <div class=\"col-xs-12 col-sm-6\">\n" +
    "                                        <label>Status</label>\n" +
    "                                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                            <div ng-dropdown-multiselect translation-texts=\"multiselects.status.texts\" events=\"multiselects.status.events\" options='[{\"name\":\"Alla fordon\", \"value\":\"\"},{\"name\":\"Nya fordon\", \"value\":\"1\"},{\"name\":\"Begagnade fordon\", \"value\":\"0\"}]' selected-model=\"multiselects.status.data\" extra-settings=\"multiselects.status.settings\"></div>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-12 col-sm-6\">\n" +
    "                                        <label>Bilmärke</label>\n" +
    "                                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                            <div ng-dropdown-multiselect translation-texts=\"multiselects.brand.texts\" events=\"multiselects.brand.events\" options=\"(data.brands) | filterBrands\" selected-model=\"multiselects.brand.data\" extra-settings=\"multiselects.brand.settings\" group-by=\"type\"></div>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-7\">\n" +
    "                                <div class=\"row no-margin\">\n" +
    "                                    <div class=\"col-xs-12 col-sm-4\">\n" +
    "                                        <label>Modell</label>\n" +
    "                                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                            <div ng-dropdown-multiselect translation-texts=\"multiselects.model.texts\"  events=\"multiselects.model.events\" options=\"availableModels\" selected-model=\"multiselects.model.data\" extra-settings=\"multiselects.model.settings\"></div>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-12 col-sm-4\">\n" +
    "                                        <label>Årsmodell</label>\n" +
    "                                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                            <bb-range-select title=\"Årsmodell\" suffix=\"\" from=\"search.yearFrom\" to=\"search.yearTo\" options=\"data.years\"></bb-range-select>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-xs-12 col-sm-4\">\n" +
    "                                        <label>Anläggning</label>\n" +
    "                                        <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                            <div ng-dropdown-multiselect translation-texts=\"multiselects.city.texts\" events=\"multiselects.city.events\" options=\"data.city\" selected-model=\"multiselects.city.data\" extra-settings=\"multiselects.city.settings\"></div>\n" +
    "\n" +
    "                                            <!--<select class=\"btn dropdown-toggle selectpicker btn-form-white form-control\" ng-model=\"search.city\" ng-options=\"c.name as c.name for c in data.city\">-->\n" +
    "                                            <!--<option value=\"\">Alla orter</option>-->\n" +
    "                                            <!--</select>-->\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div id=\"secondary-view\">\n" +
    "                        <div class=\"row\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label>Växellåda</label>\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <div ng-dropdown-multiselect translation-texts=\"multiselects.gearbox.texts\" events=\"multiselects.gearbox.events\" options=\"data.gearbox\" selected-model=\"multiselects.gearbox.data\" extra-settings=\"multiselects.gearbox.settings\"></div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label>Bränsle</label>\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <div ng-dropdown-multiselect translation-texts=\"multiselects.fuel.texts\" events=\"multiselects.fuel.events\" options=\"data.fueltype\" selected-model=\"multiselects.fuel.data\" extra-settings=\"multiselects.fuel.settings\"></div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label>Färg</label>\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <div ng-dropdown-multiselect translation-texts=\"multiselects.color.texts\" events=\"multiselects.color.events\" options=\"data.color\" selected-model=\"multiselects.color.data\" extra-settings=\"multiselects.color.settings\"></div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label>Pris</label>\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <bb-range-select title=\"Pris\" suffix=\"kr\" from=\"search.priceFrom\" to=\"search.priceTo\" options=\"data.prices\"></bb-range-select>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label>Miltal</label>\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <bb-range-select title=\"Miltal\" suffix=\"mil\" from=\"search.milesFrom\" to=\"search.milesTo\" options=\"data.miles\"></bb-range-select>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label>Kaross</label>\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <div ng-dropdown-multiselect translation-texts=\"multiselects.body.texts\" events=\"multiselects.body.events\" options=\"data.bodytype\" selected-model=\"multiselects.body.data\" extra-settings=\"multiselects.body.settings\"></div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <div class=\"row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-2\">\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <label>\n" +
    "                                        <div class=\"checkbox\">\n" +
    "                                            <input ng-true-value=\"'1'\" ng-false-value=\"0\" type=\"checkbox\" ng-model=\"search.environment\">\n" +
    "                                            <span>Miljöbil</span>\n" +
    "                                        </div>\n" +
    "                                    </label>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-6 col-sm-2\">\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <label>\n" +
    "                                        <div class=\"checkbox\">\n" +
    "                                            <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.fwd\" value=\"1\">\n" +
    "                                            <span>Fyrhjulsdrift</span>\n" +
    "                                        </div>\n" +
    "                                    </label>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-6 col-sm-2\">\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <label>\n" +
    "                                        <div class=\"checkbox\">\n" +
    "                                            <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.excl_vat\" value=\"1\">\n" +
    "                                            <span>Avdragsbar moms</span>\n" +
    "                                        </div>\n" +
    "                                    </label>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-6 col-sm-2\">\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <label>\n" +
    "                                        <div class=\"checkbox\">\n" +
    "                                            <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.towbar\" value=\"1\">\n" +
    "                                            <span>Dragkrok</span>\n" +
    "                                        </div>\n" +
    "\n" +
    "                                    </label>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-6 col-sm-2\">\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <label>\n" +
    "                                        <div class=\"checkbox\">\n" +
    "                                            <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-checked=\"search.parking_assistance==1\" ng-model=\"search.parking_assistance\" value=\"1\">\n" +
    "                                            <span>Parkeringsassistans</span>\n" +
    "                                        </div>\n" +
    "                                    </label>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-6 col-sm-2\">\n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <label>\n" +
    "                                        <div class=\"checkbox\">\n" +
    "                                            <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"search.images\" value=\"1\">\n" +
    "                                            <span>Endast med bild</span>\n" +
    "                                        </div>\n" +
    "                                    </label>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"row\" class=\"freetextsearch\">\n" +
    "                    <!--<div class=\"col-xs-12\">-->\n" +
    "                        <!--<h1>Sök bland {{ totalCount }} personbilar i lager</h1>-->\n" +
    "                        <!--<p>Vi vill att du ska hitta rätt bil. Det avgörande för att du ska bli nöjd är att du hittar den bil som passar dina behov. Sök och hitta din bil nedan.</p>-->\n" +
    "                    <!--</div>-->\n" +
    "                    <div class=\"col-xs-12\">\n" +
    "                        <form>\n" +
    "                            <input id=\"FreeTextSearch\" type=\"text\" placeholder=\"Vad letar du efter för bil?\" class=\"form-control\" ng-keyup=\"fetchCars()\" ng-model=\"search.s\">\n" +
    "                        </form>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </form>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "\n" +
    "<!--<div ng-include=\"'templates/Filter.html'\"></div>-->\n" +
    "\n" +
    "<!--<div ng-include=\"'templates/List.html'\"></div>-->\n"
  );


  $templateCache.put('templates/SingleObject.html',
    "<div class=\"object-view\" ng-controller=\"ObjectCtrl\">\n" +
    "    <div class=\"us-spinner\">\n" +
    "        <span us-spinner spinner-key=\"spinner\" spinner-start-active=\"true\"></span>\n" +
    "    </div>\n" +
    "    <div ng-include src=\"'templates/500.html'\" ng-hide=\"hideError\"></div>\n" +
    "    <section ng-hide=\"hideContent\">\n" +
    "        <div ng-address-bar></div>\n" +
    "        <bb-owlcarousel images=\"car.images.image\" ng-hide=\"noImages\" class=\"\"></bb-owlcarousel>\n" +
    "        <section id=\"sub_menu\" class=\"scroll-menu object-menu\">\n" +
    "\n" +
    "            <div class=\"submenu-wrapper\">\n" +
    "                <div class=\"submenu-title\">\n" +
    "                    <h1 class=\"col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 share-title\">\n" +
    "                        {{ car.brand }} {{ car.model }}\n" +
    "                        {{ car.modeldescription }}\n" +
    "                    </h1>\n" +
    "                    <div class=\"submenu-buttons\">\n" +
    "                        <div class=\"col-xs-4 col-md-3 left-buttons\">\n" +
    "                            <div class=\"bb-back\" ng-click=\"goBack();\">\n" +
    "                                <div class=\"round-button\">\n" +
    "                                    <i class=\"icon icon-chevron-thin-left\"></i>\n" +
    "                                </div>\n" +
    "                                <p class=\"button-text\">Tillbaka</p>\n" +
    "                                <div style=\"clear:both;\"></div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-8 col-md-3 col-md-offset-6 right-buttons\">\n" +
    "                            <div class=\"col-xs-6 bb-share\" onclick=\"getShareOptions('#shareLinks_1');\">\n" +
    "                                <div class=\"bb-share-links\" id=\"shareLinks_1\"></div>\n" +
    "                                <div class=\"round-button\">\n" +
    "                                    <i class=\"icon icon-share-alternative\"></i>\n" +
    "                                </div>\n" +
    "                                <p class=\"button-text\">Dela</p>\n" +
    "                                <div style=\"clear: both;\"></div>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-6 bb-favorite\" data-bbfavorite=\"{{ car.id }}\" data-title=\"{{ car.brand }} {{ car.model }}\" data-price=\"{{ car['price-active'] | formatPrice }}\" data-year=\"{{ car.yearmodel }}\" data-miles=\"{{ car.miles }}\" data-color=\"{{ car.color_raw }}\" data-body=\"{{ car.modeldescription }}\" data-image=\"{{ car.images.image[0] }}\" data-type=\"car\">\n" +
    "                                <div class=\"share-contain\">\n" +
    "                                    <div class=\"round-button\">\n" +
    "                                        <p><strong>P</strong></p>\n" +
    "                                        <i class=\"icon icon-check\"></i>\n" +
    "                                    </div>\n" +
    "                                    <p class=\"button-text\">Spara</p>\n" +
    "                                    <div style=\"clear: both;\"></div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div style=\"clear: both;\"></div>\n" +
    "                        </div>\n" +
    "                        <div style=\"clear: both;\"></div>\n" +
    "                    </div>\n" +
    "                    <div style=\"clear: both;\"></div>\n" +
    "\n" +
    "                    <div class=\"submenu-mobile visible-xs\">\n" +
    "                        <div class=\"btn-group\">\n" +
    "                            <a class=\"btn button white dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">\n" +
    "                                Meny\n" +
    "                                <i class=\"icon icon-chevron-thin-down\"></i>\n" +
    "                            </a>\n" +
    "                            <ul class=\"dropdown-menu dropdown-menu-right\">\n" +
    "                                <li><a href=\"#\"></a></li>\n" +
    "                                <li><a href=\"#vehicleinfo\">Fordonsfakta</a></li>\n" +
    "                                <li><a href=\"#equipment\">Boka provkörning</a></li>\n" +
    "                                <li ng-hide=\"hideFinance\"><a href=\"#finance\">Finansiering</a></li>\n" +
    "                                <li><a href=\"#warranties\">Garantier</a></li>\n" +
    "                                <li><a href=\"#contact\">Intresseanmälan</a></li>\n" +
    "                                <li><a href=\"#similar-cars\">Liknande objekt</a></li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"hidden-xs\">\n" +
    "                    <div class=\"item first\">\n" +
    "                        <a href=\"#\">&nbsp;</a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                    <div class=\"item \">\n" +
    "                        <a href=\"#?id={{ car.id }}#vehicleinfo\">\n" +
    "                            Fordonsfakta\n" +
    "                        </a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                    <div class=\"item \">\n" +
    "                        <a href=\"#?id={{ car.id }}#equipment\">\n" +
    "                            Utrustning\n" +
    "                        </a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                    <div class=\"item \" ng-hide=\"hideFinance\">\n" +
    "                        <a href=\"#?id={{ car.id }}#finance\">\n" +
    "                            Finansiering\n" +
    "                        </a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                    <div class=\"item \">\n" +
    "                        <a href=\"#?id={{ car.id }}#warranties\">\n" +
    "                            Garantier\n" +
    "                        </a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                    <div class=\"item \">\n" +
    "                        <a href=\"#?id={{ car.id }}#contact\">\n" +
    "                            Intresseanmälan\n" +
    "                        </a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                    <div class=\"item \">\n" +
    "                        <a href=\"#?id={{ car.id }}#similar-cars\">\n" +
    "                            Liknande objekt\n" +
    "                        </a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                    <div class=\"item last\">\n" +
    "                        <a href=\"#\">&nbsp;</a>\n" +
    "                        <span></span>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </section>\n" +
    "\n" +
    "        <div id=\"vehicleinfo\" class=\"scroll\">\n" +
    "            <div class=\"wrapper\">\n" +
    "                <div class=\"row\">\n" +
    "\n" +
    "                    <div class=\"col-xs-12 col-sm-8\">\n" +
    "                        <bb-flexslider class=\"object-slider\" images=\"car.images.image\"></bb-flexslider>\n" +
    "                    </div>\n" +
    "                    <div id=\"properties\" class=\"col-xs-12 col-sm-4\">\n" +
    "                        <h3><strong>{{ car.brand }}</strong> {{ car.model }} {{ car.modeldescription }}</h3>\n" +
    "                        <h3 class=\"price\">{{ car[\"price-active\"] | formatPrice }}</h3>\n" +
    "                        Delbetala från <span class=\"monthly-from\">{{ monthly | formatNumber }} / månad</span>\n" +
    "                        <hr/>\n" +
    "\n" +
    "                        <dl class=\"dl-horizontal\">\n" +
    "                            <dt>Årsmodell</dt><dd>{{ car.yearmodel }}</dd>\n" +
    "                            <dt>Miltal</dt><dd>{{ car.miles | formatNumber }}</dd>\n" +
    "                            <dt>Växellåda</dt><dd>{{ car.gearboxtype }}</dd>\n" +
    "                            <dt>Kaross</dt><dd>{{ car.bodytype }}</dd>\n" +
    "                            <dt>Färg</dt><dd>{{ car.color_raw }}</dd>\n" +
    "                            <dt>Bränsle</dt><dd>{{ car.fueltype }}</dd>\n" +
    "                            <dt>Reg.nr</dt><dd>{{ car.regno }}</dd>\n" +
    "                            <dt>Anläggning</dt><dd>{{ car.city }}</dd>\n" +
    "                        </dl>\n" +
    "\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div id=\"equipment\" class=\"scroll col-xs-12 \">\n" +
    "            <div class=\"wrapper\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-12\">\n" +
    "                        <h2>Utrustning</h2>\n" +
    "                        <p>Läs mer om bilens utrustning nedan eller kontakta en säljare för mer information.</p>\n" +
    "                        <div class=\"row\" ng-repeat=\"chunk in car.parsed_info | limitTo:9\">\n" +
    "                            <div class=\"col-xs-12 col-sm-4\" ng-repeat=\"item in chunk\">\n" +
    "                                <span class=\"equipment-item\">{{ item }}</span>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <!--<a class=\"btn\" ng-if=\"(car.parsed_info.length > 9\">Visa mer</a>-->\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div id=\"finance\" class=\"scroll col-xs-12\" ng-hide=\"hideFinance\">\n" +
    "            <div class=\"wrapper\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-12\">\n" +
    "                        <h2>Finansiering</h2>\n" +
    "                        <p>Med ett billån hos Upplands Motor kan du låna upp till 80% av bilens pris- och även byta din nuvarande bil mot resterande kontantinsats.<br/>\n" +
    "                        Ändra alternativen nedan för att direkt se månadskostnaden för bilen.</p>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-4\">\n" +
    "                        <div class=\"vehicle-image\">\n" +
    "                            <img class=\"img-responsive\" src=\"{{ car.images.image[0] | replaceImage }}\" alt=\"\"/>\n" +
    "                            <div class=\"image-overlay\"></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"finance-image\">\n" +
    "\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-sm-8 col-xs-12 financeInfo\">\n" +
    "                        <bb-finance info=\"car\" monthly=\"monthly\"></bb-finance>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div id=\"warranties\" class=\"scroll col-xs-12\">\n" +
    "            <div class=\"wrapper\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"col-xs-12\">\n" +
    "                        <h2>Garantier</h2>\n" +
    "                        <p>Med varje ny volvo ingår garantier som ska göra ditt bilägande så tryggt och bekvämt som möjligt. Därför är en av världens säkraste bilar förmodligen även en av de tryggaste.</p>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                 <div class=\"row\">\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <div class=\"warranty\">\n" +
    "                            <strong>Garanti 1</strong>\n" +
    "                            <p>Text</p>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <div class=\"warranty\">\n" +
    "                            <strong>Garanti 1</strong>\n" +
    "                            <p>Text</p>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <div class=\"warranty\">\n" +
    "                            <strong>Garanti 1</strong>\n" +
    "                            <p>Text</p>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-3\">\n" +
    "                        <div class=\"warranty\">\n" +
    "                            <strong>Garanti 1</strong>\n" +
    "                            <p>Text</p>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "\n" +
    "        <div ng-include src=\"'templates/partials/ContactForm.html'\" class=\"scroll\"></div>\n" +
    "\n" +
    "        <div ng-include src=\"'templates/partials/SimilarCars.html'\" class=\"scroll\"></div>\n" +
    "    </section>\n" +
    "\n" +
    "</div>\n" +
    "\n"
  );


  $templateCache.put('templates/WP-Admin.html',
    "\n" +
    "<div ng-include=\"'templates/SearchList.html'\"></div>\n" +
    "\n" +
    "<div ng-include=\"'templates/Filter.html'\"></div>\n" +
    "\n" +
    "<!--<div ng-include=\"'templates/List.html'\"></div>-->\n"
  );


  $templateCache.put('templates/partials/ContactForm.html',
    "<div id=\"contact\" ng-controller=\"ContactController\">\n" +
    "    <form ng-submit=\"send(form)\" name=\"contactform\">\n" +
    "        <div class=\"wrapper\">\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"col-xs-12\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"col-sm-10 col-xs-12\">\n" +
    "                            <h2>Intresseanmälan</h2>\n" +
    "                            <p>Är du intresserad av att veta mer om bilen, eller kanske boka en provkörning? Fyll i formuläret nedan så kontaktar en säljare dig.</p>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-sm-2 col-xs-12\" style=\"text-align:right;\">\n" +
    "                            <button class=\"button green\" style=\"margin-top:20px;\">Växel</button>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12\">\n" +
    "                            <div class=\"row\">\n" +
    "                                <div class=\"col-xs-12 col-sm-8\">\n" +
    "                            <div id=\"contactForm\">\n" +
    "                                <div class=\"row\">\n" +
    "                                    <div class=\"col-sm-6 col-xs-12\">\n" +
    "                                        <input type=\"hidden\" ng-model=\"form.url\" name=\"url\" value=\"{{ car.carUrl }}\"/>\n" +
    "                                        <input type=\"hidden\" ng-model=\"form.regNr\" name=\"regNr\" value=\"{{ car.regno }}\"/>\n" +
    "                                        <input type=\"hidden\" ng-model=\"form.carInfo\" name=\"carInfo\" value=\"{{ car.brand }} {{ car.model }} {{ car.modeldescription }}\"/>\n" +
    "                                        <input type=\"hidden\" ng-model=\"form.sendTo\" name=\"emailTo\" value=\"{{ car.email }}\"/>\n" +
    "                                        <input type=\"hidden\" ng-model=\"form.carId\" name=\"carId\" value=\"{{ car.id }}\"/>\n" +
    "\n" +
    "                                        <label>Namn</label>\n" +
    "                                        <input class=\"btn-form-white\" ng-model=\"form.name\" name=\"name\" placeholder=\"Ange ditt namn\" type=\"text\" required/>\n" +
    "                                        <label>E-post</label>\n" +
    "                                        <input class=\"btn-form-white\" ng-model=\"form.email\" name=\"emailFrom\" placeholder=\"Ange din e-post\" type=\"email\" />\n" +
    "                                        <label>Telefon</label>\n" +
    "                                        <input class=\"btn-form-white\" ng-model=\"form.phone\" name=\"phone\" placeholder=\"Ange telefonnummer om du vill bli uppringd.\" type=\"text\"/>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"col-sm-6 col-xs-12\">\n" +
    "                                        <label>Meddelande</label>\n" +
    "                                        <textarea class=\"btn-form-white\" ng-model=\"form.message\" name=\"message\" id=\"\" cols=\"40\" rows=\"8\"></textarea>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                                <div class=\"row\">\n" +
    "                                <div class=\"col-xs-12\">\n" +
    "                                \n" +
    "                                <div class=\"btn-group bootstrap-select show-tick\">\n" +
    "                                    <label>\n" +
    "                                        <div class=\"checkbox\">\n" +
    "                                            <input ng-true-value=\"'1'\" ng-false-value=\"undefined\" type=\"checkbox\" ng-model=\"form.hasTradeIn\" value=\"1\">\n" +
    "                                            <span>Jag har en bil jag skulle vilja byta in</span>\n" +
    "                                            \n" +
    "                                        </div>\n" +
    "                                    </label>\n" +
    "                                </div>\n" +
    "                                </div>\n" +
    "\n" +
    "                                <div class=\"col-xs-12\" ng-show=\"form.hasTradeIn\">\n" +
    "                                    <div class=\"row\">\n" +
    "                                        <div class=\"col-xs-3\">\n" +
    "                                            <label for=\"tradeinmodelfield\">\n" +
    "                                                Vad är det för bil?\n" +
    "                                            </label>\n" +
    "                                            <input class=\"btn-form-white\" type=\"text\" ng-model=\"form.tradeInModel\" name=\"tradeinmodel\" id=\"tradeinmodelfield\" placeholder=\"Ange märke och modell\">\n" +
    "                                        </div>\n" +
    "                                        <div class=\"col-xs-3\">\n" +
    "                                            <label for=\"tradeinyearfield\">\n" +
    "                                                Årsmodell\n" +
    "                                            </label>\n" +
    "                                            <input class=\"btn-form-white\" type=\"text\" ng-model=\"form.tradeInYear\" name=\"tradeinyear\" id=\"tradeinyearfield\" placeholder=\"Ange årsmodell\">\n" +
    "                                        </div>\n" +
    "                                        <div class=\"col-xs-3\">\n" +
    "                                            <label for=\"tradeinmileagefield\">\n" +
    "                                                Mätarställning\n" +
    "                                            </label>\n" +
    "                                            <input class=\"btn-form-white\" type=\"text\" ng-model=\"form.tradeInMileage\" name=\"tradeinmileage\" id=\"tradeinmileagefield\" placeholder=\"Ange miltal\">\n" +
    "                                        </div>\n" +
    "                                        <div class=\"col-xs-3\">\n" +
    "                                            <label for=\"tradeinregfield\">\n" +
    "                                                Reg. nr.\n" +
    "                                            </label>\n" +
    "                                            <input class=\"btn-form-white\" type=\"text\" ng-model=\"form.tradeInReg\" name=\"tradeinreg\" id=\"tradeinregfield\" placeholder=\"Ange reg. nr.\">\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                                <div class=\"col-xs-12\">\n" +
    "                                    <div class=\"alert alert-success\" role=\"alert\" ng-show=\"success\"><strong>Tack för ditt intresse!</strong> Vi kommer snart att höra av oss</div>\n" +
    "                                <div class=\"alert alert-danger\" role=\"alert\" ng-show=\"error\"><strong>Något gick fel!</strong> Försök igen senare</div>\n" +
    "                                </div>\n" +
    "                                \n" +
    "                                </div>\n" +
    "                                </div>\n" +
    "\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-4\">\n" +
    "\n" +
    "                                <div class=\"vehicle-image\">\n" +
    "                                    <div class=\"image\" style=\"background: url( {{car.images.image[0] | replaceImage}});\">\n" +
    "                                        <img class=\"img-responsive\" src=\"/wp-content/themes/upplands-motor/css/img/transparent.png\" alt=\"\"/>\n" +
    "                                    </div>\n" +
    "                                    <!--<img class=\"img-responsive\" bb-lazy-load=\"'{{ car.images.image[0]}}' \" alt=\"{{ car.brand }} {{ car.model }}\">-->\n" +
    "                                    <div class=\"image-overlay\"></div>\n" +
    "                                </div>\n" +
    "\n" +
    "                                <div class=\"vehicle-information\">\n" +
    "                                    <h4 class=\"vehicle-name no-wrap\">\n" +
    "                                        <span class=\"vehicle-model\">{{ car.brand }} {{ car.model }}</span><br/>\n" +
    "                                        <span class=\"vehicle-version\">{{ car.modeldescription }}</span>\n" +
    "                                    </h4>\n" +
    "                                    <span>{{ car.yearmodel }} / {{ car.miles | formatNumber }} mil</span>\n" +
    "                                    <div class=\"row\">\n" +
    "                                        <h4 class=\"col-xs-6 vehicle-price bold\"><strong>{{ car[\"price-active\"] | formatPrice }}</strong></h4>\n" +
    "                                        <h4 class=\"col-xs-6\"></h4>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                            <div style=\"clear:both;\"></div>\n" +
    "                            <div class=\"submit-form\">\n" +
    "                                <button class=\"button gray\" type=\"submit\">Skicka intresseanmälan</button>\n" +
    "                            </div>\n" +
    "\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </form>\n" +
    "</div>\n"
  );


  $templateCache.put('templates/partials/Finance.html',
    "<!--<script src=\"js/accesspaket/Finance.js\"></script>-->\n" +
    "<div class=\"row finance-box\">\n" +
    "    <div class=\"col-xs-12 col-sm-6\">\n" +
    "        <bb-finance-slider-cash data=\"financeInfo\"></bb-finance-slider-cash>\n" +
    "        <div class=\"clear sliderDivider\"></div>\n" +
    "        <bb-finance-slider-time data=\"financeInfo\"></bb-finance-slider-time>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-6\">\n" +
    "        <span id=\"FinancePrice\" style=\"visibility: hidden\">{{ info.Price }} kr</span>\n" +
    "        <div class=\"item keyvalue\"><span class=\"finance-label\">Pris</span><span class=\"value\" id=\"Price\">{{ financeInfo.price | formatPrice }}</span></div>\n" +
    "        <div class=\"item keyvalue\"><span class=\"finance-label\">Ränta</span><span class=\"value\" id=\"FinanceRate\"> {{ financeInfo.nominalRate | formatRate }}</span></div>\n" +
    "        <div class=\"item keyvalue\"><span class=\"finance-label\">Aviavgift</span><span class=\"value\" id=\"FinanceFee\"> {{ info.finance.MonthlyFee }} kr</span></div>\n" +
    "        <div class=\"item keyvalue\"><span class=\"finance-label\">Uppläggningsavgift</span><span class=\"value\" id=\"FinanceStart\"> {{ financeInfo.setupFee }} kr</span></div>\n" +
    "        <div class=\"item keyvalue\"><span class=\"finance-label\">Effektiv ränta</span><span class=\"value\" id=\"FinanceEffectiveRate\"> {{ financeInfo.APR | formatRate }} </span></div>\n" +
    "\n" +
    "        <!--<div class=\"item keyvalue\"><span class=\"finance-label\">Kontantinsats</span><span class=\"value\" id=\"FinanceCash\"> <input type=\"number\" ng-model=\"financeInfo.downPayment\" /></span></div>\n" +
    "        <div class=\"item keyvalue\"><span class=\"finance-label\">Avbetalningstid</span><span class=\"value\" id=\"FinanceTime\"> {{ financeInfo.numberOfMonths }} månader</span></div>-->\n" +
    "\n" +
    "        <!--<div class=\"item monthly customerButton keyvalue\"><span class=\"finance-label\">Månadskostnad från</span><span class=\"value\" id=\"FinanceMonthly\"> {{ financeInfo.montlhlyPayment | formatNumber | formatPrice }} </span></div>-->\n" +
    "\n" +
    "    </div>\n" +
    "</div>\n" +
    "<div class=\"row\">\n" +
    "    <div class=\"col-xs-4 box monthly pull-right\">\n" +
    "        <span class=\"monthlyPayment\">{{ financeInfo.montlhlyPayment | formatNumber }} kr</span> / månad\n" +
    "    </div>\n" +
    "</div>\n" +
    "\n"
  );


  $templateCache.put('templates/partials/FinanceSliderCash.html',
    "<div class=\"item sliderLabel row\">\n" +
    "    <label class=\"col-sm-6\">Kontantinsats</label>\n" +
    "    <span class=\"col-sm-6\" id=\"cash-label\">{{ data.downPayment | formatNumber | formatPrice }}</span>\n" +
    "    <!--<label>Kontantinsats <span ng-model=\"financeInfo.downPayment\" id=\"cash-label\">{{financeInfo.downPayment}}</span></label>-->\n" +
    "</div>\n" +
    "<div class=\"clear\"></div>\n" +
    "<div class=\"layout-slider\">\n" +
    "    <div class=\"js__slider-el\" id=\"SliderFinanceCash\"></div>\n" +
    "</div>\n" +
    "<div class=\"static-holders\"><span class=\"value\" id=\"FinanceCashSlider\"></span></div>\n"
  );


  $templateCache.put('templates/partials/FinanceSliderTime.html',
    "<div class=\"item sliderLabel row\">\n" +
    "    <label class=\"col-sm-6\">Avbetalningstid</label>\n" +
    "    <span class=\"col-sm-6\" id=\"pay-off-label\">{{ data.numberOfMonths }} mån</span>\n" +
    "</div>\n" +
    "<div class=\"clear\"></div>\n" +
    "<div class=\"layout-slider\">\n" +
    "    <div class=\"js__slider-el\" id=\"SliderFinanceTime\"></div>\n" +
    "</div>\n" +
    "<div class=\"static-holders\"><span class=\"value\" id=\"FinanceTimeSlider\"></span></div>"
  );


  $templateCache.put('templates/partials/Flexslider.html',
    "<div class=\"slider-wrapper\">\n" +
    "    <div id=\"slider\" class=\"flexslider\">\n" +
    "        <ul class=\"slides\">\n" +
    "            <li class=\"vehicle-image image\" ng-repeat=\"image in images\">\n" +
    "                <img class=\"img-responsive\" ng-src=\"{{ image }}\" alt=\"\" style=\"\" onerror=\"this.onerror=null;this.src='http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg'\">\n" +
    "                <div class=\"image-overlay\"></div>\n" +
    "            </li>\n" +
    "        </ul>\n" +
    "    </div>\n" +
    "</div>\n"
  );


  $templateCache.put('templates/partials/GridItem.html',
    "<!--var objecturl= {-->\n" +
    "    <!--\"0\": \"/bilar/begagnade-bilar/objekt,-->\n" +
    "    <!--\"1\": \"/bilar/nya-bilar/objekt\"-->\n" +
    "<!--}-->\n" +
    "\n" +
    "<!--var SearchDefaults = {-->\n" +
    "    <!--\"brand\": \"volvo\",-->\n" +
    "    <!--\"model\": \"xc70\"-->\n" +
    "<!--}-->\n" +
    "<!--<a href=\"{{ (ObjectUrl && ObjectUrl[car.status]) ? ObjectUrl[car.status] : 'objekt.html' }}#?id={{ car.id }}\">-->\n" +
    "<a href=\"{{ objectUrl }}?object=1&ogb={{ car.brand | formatURL }}&ogm={{ car.model | formatURL }}&ogmd={{ car.modeldescription | formatURL }}&ogc={{ car.city | formatURL }}&ogy={{ car.yearmodel | formatURL }}&ogmi={{ car.miles | formatURL }}&ogf={{ car.fueltype | formatURL }}&oggb={{ car.gearboxtype | formatURL }}&ogbt={{ car.bodytype | formatURL }}&ogco={{ car.color_raw || formatURL }}&ogrn={{ car.regno | formatURL }}&ogp={{ car['price-active'] | formatURL }}&ogi={{ car.images.image[0] | formatURL }}#?id={{ car.id }}\">\n" +
    "    <div class=\"vehicle-image\">\n" +
    "        <div class=\"image\" style=\"\" bb-lazy-load=\"'{{ car.images.image[0] | replaceImage }}' \">\n" +
    "            <img class=\"img-responsive\" src=\"/wp-content/themes/upplands-motor/css/img/transparent.png\" alt=\"\"/>\n" +
    "        </div>\n" +
    "        <!--<img class=\"img-responsive\" bb-lazy-load=\"'{{ car.images.image[0]}}' \" alt=\"{{ car.brand }} {{ car.model }}\">-->\n" +
    "        <div class=\"image-overlay\"></div>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"vehicle-information\">\n" +
    "        <h4 class=\"vehicle-name no-wrap\">\n" +
    "            <span class=\"vehicle-model\">{{ car.brand }} {{ car.model }}</span>\n" +
    "            <span class=\"vehicle-version\">{{ car.modeldescription }}</span>\n" +
    "        </h4>\n" +
    "        <span class=\"vehicle-price bold\"><strong>{{ car[\"price-active\"] | formatPrice }}</strong></span>\n" +
    "    </div>\n" +
    "</a>\n"
  );


  $templateCache.put('templates/partials/Owlcarousel.html',
    "<div id=\"owl-carousel\" class=\"owl-carousel owl-theme scroll\">\n" +
    "    <div class=\"item\" ng-repeat=\"image in images\">\n" +
    "        <img ng-src=\"{{ image }}\" alt=\"\" style=\"\" class=\"img-responsive\" onerror=\"this.onerror=null;this.src='http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg'\">\n" +
    "    </div>\n" +
    "</div>\n" +
    "\n"
  );


  $templateCache.put('templates/partials/RangeSelect.html',
    "<label class=\"sr-only\">\n" +
    "    {{ baseTitle }}\n" +
    "</label>\n" +
    "<div class=\"range-select\" id=\"range_{{ baseTitle }}\">\n" +
    "    <a class=\"btn dropdown-toggle selectpicker btn-form-white form-control\" data-toggle=\"dropdown\">{{ title }} <i class=\"icon icon-chevron-thin-down\"></i></a>\n" +
    "    <ul class=\"dropdown-menu ranges\" style=\"width: 400px;\">\n" +
    "        <li class=\"row list-unstyled\">\n" +
    "            <div class=\"col-xs-6\">\n" +
    "                <label>Från</label>\n" +
    "                <ul class=\"list-unstyled left-column\">\n" +
    "                    <li class=\"range-item\" ng-repeat=\"val in options\" ng-class=\"{ disabled: val >= $parent.to, active: val == $parent.from }\">\n" +
    "                        <label class=\"filter-range\">\n" +
    "                            {{ val | formatNumber }}\n" +
    "                            <input ng-model=\"$parent.from\" ng-disabled=\"val >= $parent.to\" type=\"radio\" name=\"range-select_from_{{ baseTitle }}\" ng-value=\"val\" ng-click=\"handleCheck($event)\" />\n" +
    "                        </label>\n" +
    "                    </li>\n" +
    "                </ul>\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-6\">\n" +
    "                <label>Till</label>\n" +
    "                <ul class=\"list-unstyled right-column\">\n" +
    "                    <li class=\"range-item\" ng-repeat=\"val in options\" ng-class=\"{ disabled: val <= $parent.from, active: val == $parent.to }\">\n" +
    "                        <label class=\"filter-range\">\n" +
    "                            {{ val | formatNumber}}\n" +
    "                            <input ng-model=\"$parent.to\" ng-disabled=\"val <= $parent.from\" type=\"radio\" name=\"range-select_to_{{ baseTitle }}\" ng-value=\"val\" ng-click=\"handleCheck($event)\" />\n" +
    "                        </label>\n" +
    "                    </li>\n" +
    "                </ul>\n" +
    "            </div>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n"
  );


  $templateCache.put('templates/partials/SimilarCars.html',
    "<div id=\"similar-cars\">\n" +
    "    <div class=\"wrapper\">\n" +
    "        <div class=\"row\">\n" +
    "            <div class=\"col-xs-12\">\n" +
    "                <h2>Liknande objekt</h2>\n" +
    "                <p>Nedan ser du andra fordon vi har i lager som du kan tänkas vara intresserad av. Bläddra gärna vidare eller gör en sökning för att hitta fler bilar.</p>\n" +
    "\n" +
    "                <div class=\"row\" ng-repeat=\"chunk in car.similarCarsChunked | limitTo:similarCarsLimit\">\n" +
    "                    <div class=\"col-xxs-12 col-xs-6 col-sm-4 car\" ng-repeat=\"car in chunk\">\n" +
    "                        <ng-include src=\"'templates/partials/GridItem.html'\"></ng-include>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"more-similar\">\n" +
    "                    <a class=\"button red\" ng-if=\"similarCarsLimit==1\" ng-click=\"expandSimilarCars()\">Se fler liknande bilar i lager</a>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n"
  );

}]);

angular.module("ElasticAccess")
    .directive("bbRangeSelect", [function(){
        return {
            restrict: "E",
            scope: {
                title: "@",
                from: "=",
                to: "=",
                options: "=",
                suffix: "@"
            },
            templateUrl: "templates/partials/RangeSelect.html",
            link: function(scope, el, attrs){
                scope.baseTitle = scope.title;
                $('.dropdown-menu', el).on("click", function (e) {
                    e.stopPropagation();
                });

                scope.fromPrev = {
                    value: null,
                    checked: false
                };
                scope.toPrev = {
                    value: null,
                    checked: false
                };

                var setFromPrev = function(bool, value) {
                    scope.fromPrev.checked = bool;
                    event.target.checked = bool;
                    if (!bool) {
                        scope.from = undefined;
                    }
                    scope.fromPrev.value = value;
                };

                var setToPrev = function(bool) {
                    scope.toPrev.checked = bool;
                    event.target.checked = bool;
                    if (!bool) {
                        scope.to = undefined;
                    }
                    scope.toPrev.value = value;
                };

                scope.handleCheck = function(event){
                    name = event.target.name;
                    value = event.target.value;
                    var res = name.match(/range-select_(\w+)_/);

                    if (res[1] == 'from') {
                        if (scope.fromPrev.value == null) {
                            setFromPrev(true, value);
                        } else {
                            if (scope.fromPrev.value == value) {
                                if (scope.fromPrev.checked) {
                                    setFromPrev(false, value);
                                } else {
                                    setFromPrev(true, value);
                                }
                            } else {
                                setFromPrev(true, value);
                            }
                        }
                    } else if (res[1] == 'to') {
                        if (scope.toPrev.value == null) {
                            setToPrev(true, value);
                        } else {
                            if (scope.toPrev.value == value) {
                                if (scope.toPrev.checked) {
                                    setToPrev(false, value);
                                } else {
                                    setToPrev(true, value);
                                }
                            } else {
                                setToPrev(true, value);
                            }
                        }
                    }
                };

                var updateLabels = function(){
                    var newTitle = "";
                    if(isNaN(parseInt(scope.from, 10)) && isNaN(parseInt(scope.to, 10))){
                        newTitle = scope.baseTitle;
                    }else if(isNaN(parseInt(scope.from, 10))){
                        newTitle = "- " + scope.to + " " + scope.suffix;
                    }else if(isNaN(scope.to, 10)){
                        newTitle = scope.from + " - " + scope.suffix;
                    }else{
                        newTitle = scope.from + " - " + scope.to + " " + scope.suffix;
                    }
                    scope.title = newTitle;
                };

                scope.$watch("from", function(){
                    updateLabels();
                });

                scope.$watch("to", function(){
                    updateLabels();
                });
            }
        }
    }]);


angular.module("ElasticAccess").service("FinanceLogic", [function () {
    var service = {
        matchMaxResidualValue: function (financeData) {
            //make sure the car is not too old
            var carAgeInMoths = (new Date().getFullYear() - financeData.carYear) + (financeData.numberOfMonths / 12);
            if (carAgeInMoths > financeData.maxAgeRV) {
                financeData.currentMaxResidualValue = 0;
                return financeData;
            }
            var tempValues = financeData.residualValues.split(",");
            financeData.currentMaxResidualValue = 0;
            for (var i = 0; i < tempValues.length; i++) {
                var months, maxvalue, adjustRV = false;
                months = parseInt(tempValues[i].split(":")[0]);
                maxvalue = parseInt(tempValues[i].split(":")[1]);
                if (months === financeData.numberOfMonths) {
                    if (financeData.currentMaxResidualValue > maxvalue) {
                        adjustRV = true;
                    }
                    financeData.currentMaxResidualValue = maxvalue;
                }

            }
            return financeData;
        },
        effect: function (rate) {
            return Math.pow((1 + rate), 12) - 1;
        },
        rate: function (financeData) {
            //**payment amount shuld be rate+principal+monthly fee negative**//
            //**presentvalue is loanamount - startfees**//
            if (financeData.loanAmount == 0) {
                financeData.montlhlyPayment = 0;
                financeData.totalCreditCost = 0;
                financeData.APR = 0;
                return financeData;
            }

            var maxIterations = 256;
            var financialPrecision = 0.0000001;//1.0e-8
            var presentValue = financeData.loanAmount - financeData.setupFee;
            var montlyPayment = -(financeData.montlhlyPayment + financeData.fee);
            var y, y0, y1, x0, x1 = 0, f = 0, i = 0;
            var guessrate = financeData.nominalRate; //our best guess on where it might land

            var numberOfMonths = financeData.numberOfMonths;
            var futureValue = -financeData.residualValue;

            if (Math.abs(guessrate) < financialPrecision) {
                y = presentValue * (1 + numberOfMonths * guessrate) + montlyPayment * (1 + guessrate * financeData.financeType) * numberOfMonths + futureValue;
            }
            else {
                f = Math.exp(numberOfMonths * Math.log(1 + guessrate));
                y = presentValue * f + montlyPayment * (1 / guessrate + financeData.financeType) * (f - 1) + futureValue;
            }
            y0 = presentValue + montlyPayment * numberOfMonths + futureValue;
            y1 = presentValue * f + montlyPayment * (1 / guessrate + financeData.financeType) * (f - 1) + futureValue;

            // find root by Newton secant method
            i = x0 = 0.0;
            x1 = guessrate;
            while ((Math.abs(y0 - y1) > financialPrecision)
            && (i < maxIterations)) {
                guessrate = (y1 * x0 - y0 * x1) / (y1 - y0);
                x0 = x1;
                x1 = guessrate;

                if (Math.abs(guessrate) < financialPrecision) {
                    y = presentValue * (1 + numberOfMonths * guessrate) + montlyPayment * (1 + guessrate * financeData.financeType) * numberOfMonths + futureValue;
                }
                else {
                    f = Math.exp(numberOfMonths * Math.log(1 + guessrate));
                    y = presentValue * f + montlyPayment * (1 / guessrate + financeData.financeType) * (f - 1) + futureValue;
                }

                y0 = y1;
                y1 = y;
                ++i;
            }
            financeData.APR = service.effect(guessrate);

            if (financeData.APR < 0) {
                financeData.APR = 1; // Man kan ju för fan inte få -100% ränta! // Klart man kan! :party:
            }
            return financeData;
        },
        PMT: function (financeData) {
            var monthcost = 0;
            if (financeData.loanAmount == 0) {
                financeData.montlhlyPayment = 0;
                financeData.totalCreditCost = 0;
                financeData.APR = 0;
                return financeData;
            }
            var perdiodRate = financeData.nominalRate / 12; // rate per month (period)
            try {
                var totalrate = Math.pow((1.0 + perdiodRate), financeData.numberOfMonths); //this is compined rate for all the periods
                monthcost = -((-financeData.loanAmount * totalrate) + financeData.residualValue) / ((1.0 + (perdiodRate * financeData.financeType)) * (totalrate - 1) / perdiodRate);
                //monthcost = monthcost.toFixed(0);
                monthcost = Math.round(monthcost);
            } catch (e) {
                monthcost = 0;
            }
            financeData.montlhlyPayment = monthcost;
            financeData.totalCreditCost = (monthcost + financeData.fee) * financeData.numberOfMonths + financeData.setupFee - financeData.loanAmount;
            return financeData;
        },
        setupMinValues: function (financeData) {
            financeData.downPayment = financeData.price * financeData.minDownpayment;
            financeData.loanAmount = financeData.price - financeData.downPayment;
            var carAge = 0;
            carAge = ((new Date().getFullYear() - financeData.carYear) + (financeData.defaultRV / 12));
            var canHaveRv;
            if (financeData.maxAgeRV > carAge) {
                financeData.numberOfMonths = financeData.defaultRV;
            } else {
                financeData.numberOfMonths = financeData.defaultRV - ((carAge - financeData.maxAgeRV) * 12);
                financeData.maxMonthsRv = financeData.numberOfMonths;
            }

            if (financeData.numberOfMonths <= 0) {
                carAge = ((new Date().getFullYear() - financeData.carYear) + (financeData.defaultMonths / 12));
                if (financeData.maxAge > carAge) {
                    financeData.numberOfMonths = financeData.defaultMonths;

                } else {
                    financeData.numberOfMonths = financeData.defaultMonths - ((carAge - financeData.maxAge) * 12);
                    financeData.maxMonths = financeData.numberOfMonths;
                }
            }

            service.matchMaxResidualValue(financeData);

            if (financeData.currentMaxResidualValue > 0) {
                financeData.residualValuePerc = financeData.currentMaxResidualValue;
                financeData.residualValue = financeData.price * (financeData.currentMaxResidualValue / 100);
            }

            return financeData;
        },
        initFinance: function (settingsData) {
            settingsData = service.setupMinValues(settingsData);
            return settingsData;
        },
        calculateFinance: function (financeData) {
            financeData.loanAmount = financeData.price - financeData.downPayment;
            financeData = service.PMT(financeData);
            financeData = service.rate(financeData);

            return financeData;

        },
        parsePrice: function (priceString) { return parseInt(priceString.replace(/\./g, '')); },
        parseRate: function (rateString) { return parseFloat(rateString.replace(',', '.')); },
        formatNumber2: function (iVal) {
            var str = "";
            var sVal = iVal.toString();
            var iChrCnt = sVal.length - 1;
            var iSpaceCnt = 0;
            for (var i = iChrCnt; i >= 0; i--) {
                iSpaceCnt++;
                str = sVal.charAt(i) + str;
                if (iSpaceCnt == 3) {
                    str = ' ' + str;
                    iSpaceCnt = 0;
                }
            }
            return str;
        },
        formatNumber: function (num) {
            return Math.round(num).toFixed(0);
        },
        formatPrice: function (price) {
            //return (price > 999 ? Math.floor(price / 1000) + '.' + service.formatNumber(price % 1000, 3) : price) + ' kr';
            if (price > 999) {
                var arr = price.split("");
                arr.splice(-3,0,' ');
                return arr.join("") + ' kr';
            } else {
                return price + ' kr';
            }
        },
        formatRate: function (rate) { return (rate * 100).toFixed(2).replace('.', ',') + ' %'; },
        nearest: function (n, v) {
            n = n / v;
            //n = (n < 0 ? Math.floor(n) : Math.ceil(n)) * v;
            n = Math.round(n) * v;
            return n;
        },

        // ?
        setupDownpayment: function (financeData) {
            var downpayment = $("#downPayment");
            downpayment.attr("max", financeData.price);
            financeData.downPayment = financeData.minDownpayment * financeData.price;
            downpayment.attr("min", financeData.downPayment);
            downpayment.val(financeData.downPayment);
            financeData.loanAmount = financeData.price - financeData.downPayment;
            downpayment.on("change", function () {
                financeData.downPayment = $(this).val();
                financeData.loanAmount = financeData.price - financeData.downPayment;
            });
        }
    };

    return service;
}])
.filter("formatNumber", ["FinanceLogic", function (FinanceLogic) {
        return function (input) {
            return FinanceLogic.formatNumber(input);
        }
    }])
.filter("formatRate", ["FinanceLogic", function (FinanceLogic) {
        return function (input) {
            return FinanceLogic.formatRate(input);
        }
    }])
.filter("formatPrice", ["FinanceLogic", function (FinanceLogic) {
        return function (input) {
            return FinanceLogic.formatPrice(input);
        }
    }]);

angular.module("ElasticAccess")
.factory("SearchService", ["ElasticAccessAdapter", function (Adapter) {
    var carsPerPage = 20;

    var createRange = function (start, min, max, step, reverse) {
        var range = [start];

        if (lodash.isNull(start)) {
            range = [];
        }

        for (var i = min; i < max; i += step) {
            var val = Math.ceil(i / step) * step;
            range.push(val);
        }

        if (reverse) {
            range = range.reverse();
        }
        return range;
    };

    var parseAggs = function (aggs) {
        if (!lodash.isPlainObject(aggs.prices)) {
            return aggs;
        }

        aggs.miles = createRange(0, aggs.miles.min, aggs.miles.max, 1000);
        aggs.prices = createRange(0, aggs.prices.min, 300000, 10000);
        aggs.years = createRange(null, aggs.years.min, aggs.years.max, 1, true);

        return aggs;
    };

    var getList = function (params) {
        return Adapter.get(params);
    };

    var getCount = function (url) {
        return Adapter.getCount(url);
    };

    var get = function (id) {
        return Adapter.getSingle({carId: id});
    };

    var getSimilar = function (id, limit) {
        return Adapter.getSimilarCars({carId: id});
    };

    return {
        getList: getList,
        get: get,
        getCount: getCount,
        getSimilar: getSimilar,
        parseAggs: parseAggs
    };
}]);

angular.module("ElasticAccess")
    .directive('bbFinance', ["FinanceLogic", function (FinanceLogic) {
        return {
            restrict: "E",
            scope: {
                info: "=",
                monthly: "="
            },
            templateUrl: "templates/partials/Finance.html",
            link: function (scope, el, attrs) {
                scope.$watch('info', function () {
                    if (scope.info) {
    
                        var financeData = scope.info.finance;
    
                        scope.financeInfo = {
                            price: scope.info["price-active"],
                            nominalRate: financeData.Rate/100.0, //Rate per year expressed in 0.0597 for 5.97%,
                            fee: financeData.MontlyFee || 0,
                            carYear: scope.info.yearmodel,
                            setupFee: financeData.StartFee,
                            minDownpayment: financeData.MinUpfrontInPercent/100, //percentage ie 0.1 for 10%
                            minMonths: financeData.MinMonths,
                            maxMonths: financeData.MaxMonths,
                            maxAgeRV: financeData.MaxYearRV, // maximum age of car after finance is complete
                            maxAge: financeData.MaxYear, // maximum age of car after finance is complete
                            maxMonthsRv: financeData.MaxMonthsRV, //maximum number of months finance with RV
                            defaultMonths: financeData.DefaultMonths,
                            defaultRV: financeData.DefaultMonthsRV,
                            currentMaxResidualValue:0,
                            residualValues: financeData.RestValues || '',
                            residualValue: 0,
                            residualValuePerc:0,
                            minFinanceAmount: financeData.MinPrice,
                            montlhlyPayment: 0,
                            numberOfMonths: financeData.DefaultMonths,
                            downPayment: 0,
                            loanAmount: 0, // price- chosen downpayment
                            APR: 0,
                            financeType: 0, //**(begining or end of period (lease=1 or loan=0),
                            totalCreditCost: 0
                        };
    
    
                        scope.financeInfo = FinanceLogic.initFinance(scope.financeInfo);
                        scope.$watch("financeInfo", function (val) {
                            scope.financeInfo = FinanceLogic.calculateFinance(scope.financeInfo);

                        });
                        scope.$watch("financeInfo.downPayment", function (val) {
                            scope.financeInfo = FinanceLogic.calculateFinance(scope.financeInfo);
                            scope.monthly = FinanceLogic.formatPrice(FinanceLogic.formatNumber(scope.financeInfo.montlhlyPayment));
                        });
                    }
                });
            }
        }
    }])
    .directive("bbFinanceSliderCash", ["FinanceLogic", function (FinanceLogic) {
        return {
            restrict: "E",
            scope: {
                data: "="
            },
            templateUrl: 'templates/partials/FinanceSliderCash.html',
            link: function (scope, el, attrs) {
                scope.$watch("data", function () {
                    if (scope.data) {
                        var sliderCash = $("#SliderFinanceCash");
                        sliderCash.slider({
                            range: "min",
                            value: scope.data.downPayment,
                            min: scope.data.downPayment,
                            max: scope.data.price - scope.data.minFinanceAmount,
                            step: 1,
                            slide: function (e, ui) {
                                var value = (ui.value < $(this).slider("option", "max")) ? ui.value : $(this).slider("option", "max");
                                scope.data.downPayment = value;
                                scope.data = FinanceLogic.calculateFinance(scope.data);
                                scope.$apply();
                            }
                        });
                    }
                });
            }
        }
    }])
    .directive("bbFinanceSliderTime", ["FinanceLogic", function (FinanceLogic) {
        return {
            restrict: "E",
            scope: {
                data: "="
            },
            templateUrl: 'templates/partials/FinanceSliderTime.html',
            link: function (scope, el, attrs) {
                scope.$watch("data", function () {
                    if (scope.data) {
                        var sliderTime = $("#SliderFinanceTime");

                        sliderTime.slider({
                            range: "min",
                            value: scope.data.numberOfMonths,
                            min: scope.data.minMonths,
                            max: scope.data.maxMonths,
                            step: 12,
                            slide: function (e, ui) {
                                scope.data.numberOfMonths = ui.value;
                                scope.data = FinanceLogic.calculateFinance(scope.data);
                                scope.$apply();
                            }
                        });
                    }
                });
            }
        }
    }]);
   

angular.module("ElasticAccess")
.service("ImageService", ["$q", function ($q) {
        var checkImage = function (src) {
            return $q(function (resolve, reject) {
                if (!src) {
                    return reject();
                }
                var i = new Image();

                i.onload = resolve;
                i.onerror = reject;
                i.src = src;
            });
        };

        return {
            check: checkImage
        };
    }])
.directive("bbLazyLoad", ["ImageService", function (ImageService) {
        return {
            restrict: "A",
            link: function (scope, el, attrs) {
                scope.$watch(attrs.bbLazyLoad, function () {
                    var src = attrs.bbLazyLoad.replace(/(^')/, "").replace(/'$/, "");
                    ImageService.check(src).then(function () {
                        // Loaded
                        el.css("background", "url(" + src + ")");
                    }, function () {
                        // Not loaded
                        el.css("background", "url(http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg)");
                    });
                });
            }
        }
    }])
.directive('bbFlexslider', [function () {
        return {
            restrict: "E",
            scope: {
                images: "="
            },
            templateUrl: "templates/partials/Flexslider.html",
            link: function (scope, el, attrs) {
                scope.$watch('images', function () {
                    var object_slider = $(".object-slider #slider");
                    object_slider.removeData("flexslider");
                    if (scope.images !== undefined) {
                        if (scope.images.length > 0) {
                            var header_slider = $(".header-slider #slider");
                            header_slider.removeData("flexslider");
                            header_slider.flexslider({
                                minItems: 3,
                                itemMargin: 15,
                                itemWidth: 500
                            });
                            object_slider.flexslider();
                        } else {
                            $('#slider .slides').html('<li class="vehicle-image image"><img class="img-responsive" src="http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg" alt="" style=""><div class="image-overlay"></div>');
                            object_slider.flexslider();
                        }
                    }
                });
            }
        }
    }])
.directive('bbOwlcarousel', [function () {
        return {
            restrict: "E",
            scope: {
                images: "="
            },
            templateUrl: "templates/partials/Owlcarousel.html",
            link: function (scope, el, attrs) {
                scope.$watch('images', function () {
                    if (scope.images) {
                        var owl_carousel = $('#owl-carousel');
                        owl_carousel.owlCarousel({
                            navigation: true,
                            pagination: true,
                            items: 2,
                            itemsDesktop: [1199, 2],
                            itemsTablet: [979, 1],
                            itemsMobile: [768, 1],
                            navigationText: [
                                '<i class="icon icon-chevron-thin-left"></i>',
                                '<i class="icon icon-chevron-thin-right"></i>'
                            ],
                        })
                    }
                });
            }
        }
    }]);


angular.module("ElasticAccess").controller("SetupCtrl", function($location, $scope, $rootScope) {
    $scope.search = false;
    $scope.filter = false;
    $scope.list = false;

    $scope.init = function (search, filter, list, loadType, loadPage, initSearch){
        if(search){
            $scope.search = true;
        }
        if(filter){
            $scope.filter = true;
        }
        if(list){
            $scope.search = true;
            $scope.filter = true;
            $scope.list = true;
        }
        $rootScope.loadPage = loadPage;
        $rootScope.loadMoreCars = loadType;
        $rootScope.initSearch = initSearch;
        $rootScope.pageSearch = initSearch;
    };
    $scope.showList = function (){
        return $scope.list;
    };
    $scope.showFilter = function (){
        return $scope.filter;
    };
    $scope.showSearch = function (){
        return $scope.search;
    };

    $scope.lock = function (lock){
        $rootScope.lock = lock === "true";
    };
    $scope.title = function (title){
        $rootScope.title = title;
    };
    $scope.text = function(text){
        $rootScope.text = text;
    };
    $scope.back = function(title, url){
        if(title !== ""){
            $rootScope.backTitle = title;
        }else{
            $rootScope.backTitle = "Tillbaka"
        }
        $rootScope.backUrl = url;
    };
});

angular.module("ElasticAccess")
.controller("SearchListCtrl", ["$location", "$scope", "SearchService", "$rootScope", "Searches", "usSpinnerService", "$element",function ($location, $scope, SearchService, $rootScope, Searches, usSpinnerService, $element) {
    var self = this;
    //$rootScope.startSpin = function(){
    //    usSpinnerService.spin('spinner');
    //};
    //$rootScope.stopSpin = function(){
    //    usSpinnerService.stop('spinner');
    //};

    $scope.lock = $rootScope.lock;

    $scope.backTitle = $rootScope.backTitle;
    $scope.backUrl = $rootScope.backUrl;
    $scope.urlExists = function(){
        if($rootScope.backUrl){
            return true;
        }else{
            return false;
        }
    };

    var initSearch = "";
    //get total count for init search
    fetchCount($rootScope.pageSearch.replace('http://bytibil.com',''));

    if ($scope.lock === false && window.location.hash !== "") {
        $rootScope.initSearch = window.location.hash;
    }
    $scope.initSearch = $rootScope.initSearch;
    $scope.objectUrl = "objekt";

    if($rootScope.title){
        $scope.title = $rootScope.title;
    }else{
        $scope.title =  "Sök bland {{totalCount}} personbilar i lager";
    }

    if($rootScope.text){
        $scope.text = $rootScope.text;
    }else{
        $scope.text = "Vi vill att du ska hitta rätt bil. Det avgörande för att du ska bli nöjd är att du hittar den bil som passar dina behov. Sök och hitta din bil nedan.";
    }
    $scope.title = $scope.title.split("{{totalCount}}");
    $scope.titleStart = $scope.title[0];
    $scope.titleEnd = $scope.title[1];

    Searches.view = "searchlist";

    $scope.search = {
        s: $location.search().s,
        brand: $location.search().brand, // || SearchDefaults,
        model: $location.search().model,
        type: $location.search().type,
        bodytype: $location.search().bodytype,
        fueltype: $location.search().fueltype,
        gearbox: $location.search().gearbox,
        city: $location.search().city,
        color: $location.search().color,
        priceFrom: $location.search().priceFrom,
        priceTo: $location.search().priceTo,
        milesFrom: $location.search().milesFrom,
        milesTo: $location.search().milesTo,
        yearFrom: $location.search().yearFrom,
        yearTo: $location.search().yearTo,
        sort: $location.search().sort,
        order: $location.search().order,
        environment: $location.search().environment,
        status: $location.search().status,
        fwd: $location.search().fwd,
        excl_vat: $location.search().excl_vat,
        towbar: $location.search().towbar,
        parking_assistance: $location.search().parking_assistance,
        images: $location.search().images,
        pageSize: $location.search().pageSize
    };

    var multiselectDefaults = {
        data: [],
        settings: {
            displayProp: "name",
            idProp: "name",
            externalIdProp: "name",
            showCheckAll: false,
            showUncheckAll: false,
            //enableSearch: true,
            buttonClasses: "form-control btn-form-white",
            smartButtonMaxItems: 3,
            smartButtonTextConverter: function (itemText) {
                return itemText;
            }
        }
    };
    var singleselectDefaults = getSingleSelectDefaults("name");
    var statusselectDefaults = getSingleSelectDefaults("value");

    function getSingleSelectDefaults(idProp){
        return {
            data: [],
            settings: {
                displayProp: "name",
                idProp: idProp,
                externalIdProp: "name",
                showCheckAll: false,
                showUncheckAll: false,
                //selectionLimit: 2,
                //enableSearch: true,
                buttonClasses: "form-control btn-form-white",
                smartButtonMaxItems: 3,
                smartButtonTextConverter: function (itemText) {
                    return itemText;
                },
                groupByTextProvider: function(val) {
                    if (val === 'auctorized') {
                        return 'Våra märken';
                    } else {
                        return 'Övriga';
                    }
                }
            }
        };
    }

    var multiselectEvents = {
        onItemSelect: function (prop) {
            return function (item) {
                var items = ($scope.search[prop] || "").split(",");
                if (items.indexOf(item.name) === -1) {
                    items.unshift(item.name);
                }
                $scope.search[prop] = items.join(",").replace(/,$/, "");
            }
        },
        onSingleItemSelect: function(prop) {
            return function (item) {
                var itemData = $scope.multiselects.brand.data;
                if (itemData.length > 1)
                {
                    $scope.multiselects.brand.data = itemData = [itemData.pop()];
                }
                $scope.search[prop] = itemData[0].name || null;
            }
        },
        onStatusItemSelect: function(prop){
            return function (item) {
                var itemData = $scope.multiselects.status.data;
                if (itemData.length > 1)
                {
                    $scope.multiselects.status.data = itemData = [itemData.pop()];
                }
                $scope.search[prop] = itemData[0].name || null;

            }
        },
        onItemDeselect: function (prop) {
            return function (item) {

                var items = $scope.search[prop].split(",");
                var index = items.indexOf(item.name);
                if (items.indexOf(item.name) > -1) {
                    items.splice(index, 1);
                }
                $scope.search[prop] = items.join(",") || null;
            }
        },
        getData: function (prop) {
            return ($scope.search[prop] || "").split(",").filter(function (item) {
                return item.length !== 0;
            }).map(function (item) {
                return {
                    name: item
                };
            });
        },
        getSingleData: function (prop){
            var brand = $scope.search[prop];
            return ({
                name: ($scope.search[prop])
            });
        }
    };

    $scope.multiselects = {
        brand: function () {
            return lodash.extend(angular.copy(singleselectDefaults), {
                data: multiselectEvents.getData("brand"),
                texts: {
                    buttonDefaultText: "Alla märken"
                },
                events: {
                    onItemSelect: multiselectEvents.onSingleItemSelect("brand")
                    , onItemDeselect: multiselectEvents.onItemDeselect("brand")
                }
            });

        }(),
        model: function () {
            return lodash.extend(angular.copy(multiselectDefaults), {
                data: multiselectEvents.getData("model"),
                texts: {
                    buttonDefaultText: "Alla modeller"
                },
                events: {
                    onItemSelect: multiselectEvents.onItemSelect("model"),
                    onItemDeselect: multiselectEvents.onItemDeselect("model")
                }
            });
        }(),
        gearbox: function () {
            return lodash.extend(angular.copy(multiselectDefaults), {
                data: multiselectEvents.getData("gearbox"),
                texts: {
                    buttonDefaultText: "Alla växellådor"
                },
                events: {
                    onItemSelect: multiselectEvents.onItemSelect("gearbox"),
                    onItemDeselect: multiselectEvents.onItemDeselect("gearbox")
                }
            });
        }(),
        body: function () {
            return lodash.extend(angular.copy(multiselectDefaults), {
                data: multiselectEvents.getData("bodytype"),
                texts: {
                    buttonDefaultText: "Alla karosserier"
                },
                events: {
                    onItemSelect: multiselectEvents.onItemSelect("bodytype"),
                    onItemDeselect: multiselectEvents.onItemDeselect("bodytype")
                }
            });
        }(),
        fuel: function () {
            return lodash.extend(angular.copy(multiselectDefaults), {
                data: multiselectEvents.getData("fueltype"),
                texts: {
                    buttonDefaultText: "Alla drivmedel"
                },
                events: {
                    onItemSelect: multiselectEvents.onItemSelect("fueltype"),
                    onItemDeselect: multiselectEvents.onItemDeselect("fueltype")
                }
            });
        }(),
        color: function () {
            return lodash.extend(angular.copy(multiselectDefaults), {
                data: multiselectEvents.getData("color"),
                texts: {
                    buttonDefaultText: "Alla färger"
                },
                events: {
                    onItemSelect: multiselectEvents.onItemSelect("color"),
                    onItemDeselect: multiselectEvents.onItemDeselect("color")
                }
            });
        }(),
        city: function () {
            return lodash.extend(angular.copy(multiselectDefaults), {
                data: multiselectEvents.getData("city"),
                texts: {
                    buttonDefaultText: "Alla anläggningar"
                },
                events: {
                    onItemSelect: multiselectEvents.onItemSelect("city"),
                    onItemDeselect: multiselectEvents.onItemDeselect("city")
                }
            });
        }(),
        status: function () {
            return lodash.extend(angular.copy(statusselectDefaults), {
                data: multiselectEvents.getData("status"),
                texts: {
                    buttonDefaultText: "Alla fordon"
                },
                events: {
                    onItemSelect: multiselectEvents.onStatusItemSelect("status"),
                    onItemDeselect: multiselectEvents.onItemDeselect("status")
                }
            });
        }()
    };

    var fetchCars = function () {
        usSpinnerService.spin('spinner');
        $location.search($scope.search);
        Searches.lastSearch = angular.copy($scope.search);
        SearchService.getList($scope.search).then(function (res) {
            Searches.lastResponse = angular.copy(res);
            $scope.data = SearchService.parseAggs(res.aggs);
            $scope.updateModels();
        
            $scope.resultCount = res.total;
            $rootScope.$broadcast("cars:new", res);
        });

    };

    function fetchCount(url) {
        if ($scope.lock == false) {
            SearchService.getCount(url).then(function (res) {
                $scope.totalCount = res;
            });    
        };
    };


    //fetchCars();
    $scope.$watch("search", function (val) {
        //$rootScope.startSpin();
        $scope.multiselects.brand.data = multiselectEvents.getData("brand");
        $scope.multiselects.gearbox.data = multiselectEvents.getData("gearbox");
        $scope.multiselects.model.data = multiselectEvents.getData("model");
        $scope.multiselects.fuel.data = multiselectEvents.getData("fueltype");
        $scope.multiselects.body.data = multiselectEvents.getData("bodytype");
        $scope.multiselects.color.data = multiselectEvents.getData("color");
        $scope.multiselects.city.data = multiselectEvents.getData("city");
        $scope.multiselects.status.data = multiselectEvents.getData("status");
        //$scope.multiselects.brand.data = [{0: val.brand}];

        if(!$scope.search.brand) {
            $scope.availableModels = [{name: 'Välj märke först'}];
        }

        fetchCars();
    }, true);


    $scope.$on("$locationChangeSuccess", function () {
        $scope._hashlock = true;
        $scope.search = $location.search();

    });

    $scope.updateModels = function(){
        if (!$scope.data) {
            return;
        }
        var val = $scope.search.brand;
        if (!$scope.data.brands[val] || !$scope.data.brands[val].models.length) {
            return $scope.search.model = null;
        }
        var existing = $scope.data.brands[val].models.filter(function (model) {
            return model.name === $scope.search.model;
        });

        if (existing.length === 0) {
            $scope.search.model = null;
        }

        $scope.availableModels = $scope.data.brands[$scope.search.brand].models;
    }



    $scope.updateSort = function(val){
        var order = $scope.search.order || "asc";
        if(val == ""){
            val = undefined;
        }
        if($scope.search.sort == val) {
            order = (order == "asc") ? "desc" : "asc";
        }else{
            order = "asc";
        }
        $scope.search.sort = val;
        $scope.search.order = order;

        setSortLabel(val);
    };

    var setSortLabel = function(val){
        switch(val){
            case "latest":
                $scope.sortLabel = "Senast inkomna";
                break;
            case "yearmodel":
                $scope.sortLabel = "År";
                break;
            case "miles":
                $scope.sortLabel = "Mil";
                break;
            case "price-active":
                $scope.sortLabel = "Pris";
                break;
            case "brand":
                $scope.sortLabel = "Märke";
                break;
        }
    };

    if($scope.search.sort){
        setSortLabel($scope.search.sort);
    }else{
        setSortLabel("latest");
    }
}])
.filter("filterBrands", function(){
    return lodash.memoize(function(input, all){
        if(!input){
            return;
        }
        var other_brands = [];
        var auctorized_brands = [];
        for(var k in input){
            if(input.hasOwnProperty(k)){
                if(k == "Volvo" || k == "Renault" || k == "Dacia" || k == "Ford"){
                    auctorized_brands.push({name: k, type: "auctorized"});
                }else{
                    other_brands.push({name: k, type: "others"});
                }
            }
        }
        other_brands = other_brands.sort(function(a, b) {
            var nameA = a.name.toLowerCase(), nameB = b.name.toLowerCase();
            if (nameA < nameB)
                return -1;
            if (nameA > nameB)
                return 1;
            return 0;
        });

        var brandarr = auctorized_brands.concat(other_brands);
        return brandarr;
    });
})
.filter("formatNumber", function(){
    return function(input){
        return input.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
    };
});

angular.module("ElasticAccess")
    .controller("CarListCtrl", ["ScrollList", "$scope", "Searches", "CarFetcher", "SearchService", "$location", "$rootScope", "usSpinnerService", function (ScrollList, $scope, Searches, CarFetcher, SearchService, $location, $rootScope, usSpinnerService) {
        $scope.objectUrl = $rootScope.loadPage;
        $scope.ScrollList = new ScrollList();
        $scope.loadType = $rootScope.loadMoreCars;

        $scope.fetchMoreCars = function(){
            CarFetcher.fetch(Searches, SearchService, $rootScope, usSpinnerService);
        };

        $scope.$on("cars:new", function (e, val, append) {
            var newCars = lodash.chunk(val.cars, 3);
            if(append){
                $scope.cars = $scope.cars.concat(newCars);
            }else{
                $scope.cars = newCars;
            }
            usSpinnerService.stop('spinner');
        });
    }])
    .factory('ScrollList', ["$location", "Searches", "CarFetcher", "SearchService", "$rootScope", "usSpinnerService", function($location, Searches, CarFetcher, SearchService, $rootScope, usSpinnerService){

        var ScrollList = function(){
            this.items = [];
            this.busy = false;
            this.after = '';
        };
        ScrollList.prototype.nextPage = function() {
            //usSpinnerService.start('spinner');
            if($(window).scrollTop() + $(window).height() != $(document).height()) {
                return;
            }
            var loadType = $rootScope.loadMoreCars;
            if(loadType !== "Button") {
                CarFetcher.fetch(Searches, SearchService, $rootScope, usSpinnerService);
                //usSpinnerService.stop('spinner');
            }
        };
        return ScrollList;
    }])
    .filter("formatNumber", function(){
        return function(input){
            if(!input){
                return;
            }
            return input.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
        };
    })
    .service("CarFetcher", function(){
        return {
            fetch: function(Searches, SearchService, $rootScope, usSpinnerService){
                usSpinnerService.spin('spinner');
                var loadType = $rootScope.loadMoreCars;

                if(loadType === "None"){
                    return;
                }
                var self = this;
                if(this.busy){
                    return;
                }
                this.busy = true;

                //HÄMTA IN FLER BILAR
                var search = angular.copy(Searches.lastSearch);

                if(Searches.lastResponse && Searches.lastResponse.pagination.next !== false){
                    search.page = Searches.lastResponse.pagination.next;
                    Searches.lastSearch = angular.copy(search);

                    //refactor-time?!
                    if(Searches.view == "searchlist"){
                        SearchService.getList(search).then(function (res) {
                            $rootScope.$broadcast("cars:new", res, true);
                            Searches.lastResponse = angular.copy(res);
                            self.busy = false;
                        });
                    }else if(Searches.view == "freetextsearch"){
                        SearchService.search(search).then(function (res) {
                            $rootScope.$broadcast("cars:new", res, true);
                            Searches.lastResponse = angular.copy(res);
                            self.busy = false;
                        });
                    }

                }else{
                    this.busy = false;
                }
                usSpinnerService.stop('spinner');
            }
        }
    });
angular.module("ElasticAccess")
    .controller("ObjectCtrl", ["$rootScope", "$scope", "SearchService", "$location", "usSpinnerService", function ($rootScope, $scope, SearchService, $location, usSpinnerService) {
        $scope.objectUrl = "/objekt/";
        $scope.monthly = 0;
        $scope.similarCarsLimit = 1;
        $scope.expandSimilarCars = function(){
            $scope.similarCarsLimit = 12;
        };
        $scope.objectPage = true;
        $scope.objectHash = window.location.hash;
        $scope.hideContent = true;
        $scope.hideError = true;
        
        $scope.backCount = 1;

        $scope.$watch("id", function (val) {
            var id = $location.search().id;
            SearchService.get(id).then(function (data) {
                if (data === null) {
                    toggleContent(true);
                } else {
                    toggleContent(false);
                    if (data.images.image.length == 0) {
                        $scope.noImages = true;
                        data.images.image[0] = 'http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg';
                    }
                    data.carUrl = window.location.href;
                    $scope.car = data;
                    if (data.finance.IsValid == false) {
                        $scope.hideFinance = true;
                    }
                    if(data.info) {
                        $scope.car.parsed_info = lodash.chunk(data.info.split(','), 3);
                    }
                    $scope.car.similarCarsChunked = lodash.chunk(data.similarCars, 3);
                }
                //Stop spinner
                //$rootScope.stopSpin();
                usSpinnerService.stop('spinner');
                
                
            });
        });
        function toggleContent(hasError){
            hasError = hasError !== true ? false : true;
            if (hasError) {
                $scope.hideContent = true;
                $scope.hideError = false;
            }else{
                $scope.hideContent = false;
                $scope.hideError = true;
            };

        };
        $scope.goBack = function(){
            window.history.go($scope.backCount);
        };
        $scope.$on("$locationChangeSuccess", function () {
            //usSpinnerService.start('spinner');
            if($scope.id == $location.search().id){
                $scope.backCount--;
            }
            $scope.id = $location.search().id;
        });

    }])
    .filter("formatNumber", function(){
        return function(input){
            if(!input){
                return;
            }
            return input.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
        };
    })
    .filter("formatURL", function(){
        return function(input){
            if(!input){
                return;
            }
            return encodeURIComponent(input);
        };
    })
    .filter('replaceImage', function() {
        return function(input) {
            if (input !== undefined) {
                return input.replace(/(\-\d{3})(4)(\.)/, '$16$3');
            }
            return input;
        };
    });

angular.module("ElasticAccess")
    .controller("CompareCtrl", ["$rootScope", "$scope", "SearchService", "$location", "usSpinnerService", function ($rootScope, $scope, SearchService, $location, usSpinnerService) {
        $scope.objectUrl = "/jamfor/";
        $scope.monthly = 0;

        $scope.objectPage = true;
        $scope.objectHash = window.location.hash;
        $scope.car = [];
        $scope.backCount = 1;

        $scope.$watch("id", function (val) {
            var id = $location.search().id;

            SearchService.get(id).then(function (data) {

                lodash.forEach(data, function(value, key){
                    $scope.carCount = data.length;

                    if (value.images.image.length == 0) {
                        $scope.noImages[key] = true;
                        //data.images.image[0] = 'http://customcms.bytbil.com/wp-content/uploads/sites/22/2015/07/upplands-no-image.jpg';
                    }
                    $scope.car[key] = value;
                    if (value.finance.IsValid == false) {
                        $scope.hideFinance[key] = true;
                    }
                    if(value.info) {
                        $scope.car[key].parsed_info = lodash.chunk(value.info.split(','), 3);
                    }
                    //$scope.car.similarCarsChunked = lodash.chunk(data.similarCars, 3);
                });
                //Stop spinner
                //$rootScope.stopSpin();
                usSpinnerService.stop('spinner');
            });
        });
        $scope.goBack = function(){
            window.history.go($scope.backCount);
        };
        $scope.$on("$locationChangeSuccess", function () {
            //usSpinnerService.start('spinner');
            if($scope.id == $location.search().id){
                $scope.backCount--;
            }
            $scope.id = $location.search().id;
        });

    }])
    .filter("formatNumber", function(){
        return function(input){
            if(!input){
                return;
            }
            return input.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
        };
    });

angular.module("ElasticAccess").controller("ContactController", ["$scope", "$http", function ($scope, $http){
    

    $scope.send = function(contactform){
        $scope.form;
        $scope.success = false;
        $scope.error = false;
        var jsonField = angular.element('#formData');
        var json = decodeURIComponent(jsonField[0].value);
        var obj = angular.fromJson(json);
        var car = $scope.$parent.$parent.car;

        contactform.url = car.
        contactform.regNr = car.regNr;
        contactform.carInfo = car.brand + " " + car.model + " " + car.modeldescription;
        contactform.sendTo = car.email;
        contactform.carId = car.id;

        contactform.wp_nonce = obj.wp_nonce;
        contactform.action = obj.action;
          $http({
              method: 'POST',
              url: obj.ajaxUrl, // derived from the rootScope
              params: contactform
            }).
            success(function(data, status, headers, config) {
              $scope.success = true;
              $scope.error = false;
            }).
            error(function(data, status, headers, config) {
              $scope.success = false;
              $scope.error = true;
            });

        return false;
    }
}]);
(function(){
	$("body").on('click', '.filtertoggle', function(){
		var parent = $(this).parent();
		parent.toggleClass('filteropen');
	});
})();