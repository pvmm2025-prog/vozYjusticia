document.addEventListener('DOMContentLoaded',()=>{
 const say=t=>{if(!window.speechSynthesis)return; speechSynthesis.cancel();const u=new SpeechSynthesisUtterance(t);u.lang='es-MX';speechSynthesis.speak(u)};
 document.querySelector('#leer')?.addEventListener('click',()=>say(document.querySelector('main')?.innerText||''));
 document.querySelector('#stop')?.addEventListener('click',()=>speechSynthesis.cancel());
 document.querySelector('#a11y')?.addEventListener('click',()=>document.body.classList.toggle('large'));
 // Lectura al pasar el cursor o al enfocar con teclado.
 document.querySelectorAll('h1,h2,h3,p,label,.cards a,.btn').forEach(el=>{
   const text=(el.innerText||'').trim();
   if(text.length>2){el.addEventListener('mouseenter',()=>say(text));el.addEventListener('focus',()=>say(text));}
 });
 document.querySelectorAll('.copy').forEach(b=>b.addEventListener('click',()=>{const t=b.parentElement.querySelector('strong').innerText;navigator.clipboard?.writeText(t);b.innerText='Copiado ✓'}));
 document.querySelector('#idioma')?.addEventListener('change',()=>alert('La traducción a Náhuatl de Morelos requiere validación por hablantes nativos; el prototipo conserva los textos en español.'));
});