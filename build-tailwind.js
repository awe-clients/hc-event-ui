const fs = require('fs');
const path = require('path');
const { compile } = require('/usr/local/slides_js/node_modules/tailwindcss/dist/lib.js');

const dir = __dirname;
const pages = ['index.html', 'expo.html'];
const candidates = new Set();

for (const page of pages) {
  const html = fs.readFileSync(path.join(dir, page), 'utf8');
  for (const match of html.matchAll(/class\s*=\s*["']([^"']+)["']/g)) {
    match[1].split(/\s+/).filter(Boolean).forEach(x => candidates.add(x));
  }
  for (const match of html.matchAll(/(?:add|remove|toggle)\(\s*["']([^"']+)["']/g)) {
    if (!match[1].includes(' ')) candidates.add(match[1]);
  }
}

const twBase = '/usr/local/slides_js/node_modules/tailwindcss';
const source = fs.readFileSync(path.join(twBase, 'index.css'), 'utf8');

(async () => {
  const compiler = await compile(source, {
    base: twBase,
    loadStylesheet: async (id, from) => {
      let p;
      if (id.startsWith('.')) p = path.resolve(from, id);
      else p = path.join(twBase, id.replace(/^tailwindcss\//, ''));
      if (!path.extname(p)) p += '.css';
      return { content: fs.readFileSync(p, 'utf8'), base: path.dirname(p) };
    }
  });
  const css = compiler.build([...candidates]);
  fs.writeFileSync(path.join(dir, 'tailwind.css'), css);
  console.log(`Generated shared tailwind.css from ${pages.join(' + ')} with ${candidates.size} candidates (${Math.round(css.length/1024)} KB)`);
})();
