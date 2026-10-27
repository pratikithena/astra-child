(function(){
  var f=document.getElementById('ithf4'); if(!f) return;
  var hdr=document.getElementById('imenu-root');
  function stored(){try{return localStorage.getItem('fbb-theme')}catch(e){}}
  function sync(){var m=(hdr&&hdr.getAttribute('data-theme'))||stored()||'dark';f.setAttribute('data-theme',m==='light'?'light':'dark');}
  sync(); if(hdr) new MutationObserver(sync).observe(hdr,{attributes:true,attributeFilter:['data-theme']});
  // Sections are accordions on phones only; markup ships open so nothing hides if this script is delayed.
  var mq=matchMedia('(max-width:720px)'), ds=f.querySelectorAll('details');
  function fit(){ds.forEach(function(d){d.open=!mq.matches;});}
  fit(); mq.addEventListener('change',fit);
  f.querySelectorAll('summary').forEach(function(s){s.addEventListener('click',function(e){if(!mq.matches&&!e.target.closest('a'))e.preventDefault();});});
})();
