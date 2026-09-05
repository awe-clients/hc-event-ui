const fs = require('fs');
const path = require('path');
const tw = require('/opt/nvm/versions/node/v22.16.0/lib/node_modules/tailwindcss/dist/lib.js');
const root = __dirname;
const pkgRoot = '/opt/nvm/versions/node/v22.16.0/lib/node_modules/tailwindcss';
function candidatesFrom(text) {
  const set = new Set();
  for (const re of [/class\s*=\s*"([^"]+)"/g, /class\s*=\s*'([^']+)'/g]) {
    let m; while ((m = re.exec(text))) m[1].split(/\s+/).filter(Boolean).forEach(x=>set.add(x));
  }
  // JS runtime toggles
  for (const re of [/classList\.(?:add|remove|toggle)\(\s*'([^']+)'/g, /classList\.(?:add|remove|toggle)\(\s*"([^"]+)"/g]) {
    let m; while ((m = re.exec(text))) set.add(m[1]);
  }
  return set;
}
(async()=>{
  const files = fs.readdirSync(root).filter(f => f.endsWith('.html') || f.endsWith('.js'));
  const candidates = new Set(['hidden','block','bg-[#e5187e]','bg-[#082f72]','text-white','ph-list','ph-x']);
  for (const file of files) for (const c of candidatesFrom(fs.readFileSync(path.join(root,file),'utf8'))) candidates.add(c);
  const compiler = await tw.compile('@import "tailwindcss";', {
    loadStylesheet: async (id, base) => ({content: fs.readFileSync(path.join(pkgRoot,'index.css'),'utf8'), base: pkgRoot})
  });
  let css = compiler.build([...candidates]);
  css += `\n/* Corrida do Empreendedor — shared project layer */\n:root{--blue:#0a3d91;--navy:#082f72;--pink:#e5187e;--green:#79c143;--yellow:#ffd51f;--ink:#101827;--paper:#f6f3ed}\nhtml{scroll-padding-top:92px}\nbody{font-family:"Barlow",ui-sans-serif,system-ui,sans-serif}\n.font-display{font-family:"Barlow Condensed","Arial Narrow",sans-serif}\n.track-grid{background-image:linear-gradient(rgba(255,255,255,.07) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.07) 1px,transparent 1px);background-size:56px 56px}\n.reveal-ready [data-reveal]{opacity:0;transform:translateY(24px);transition:opacity .65s ease,transform .65s cubic-bezier(.2,.75,.2,1)}\n.reveal-ready [data-reveal].is-visible{opacity:1;transform:translateY(0)}\n[role="tabpanel"][hidden],[data-filter-item][hidden],[data-accordion-item][hidden]{display:none!important}\na:focus-visible,button:focus-visible,input:focus-visible,select:focus-visible,textarea:focus-visible{outline:3px solid var(--yellow);outline-offset:3px}\n@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;animation-iteration-count:1!important;scroll-behavior:auto!important;transition-duration:.01ms!important}.reveal-ready [data-reveal]{opacity:1;transform:none}}\n`;
  fs.writeFileSync(path.join(root,'tailwind.css'), css);
  console.log(`Built ${candidates.size} candidates -> ${Buffer.byteLength(css)} bytes`);
})();
